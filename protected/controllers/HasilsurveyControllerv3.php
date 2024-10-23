<?php

class HasilsurveyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','simpan'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new HasilSurvey;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HasilSurvey']))
		{
			$model->attributes=$_POST['HasilSurvey'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tblhasilsurvei_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HasilSurvey']))
		{
			$model->attributes=$_POST['HasilSurvey'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tblhasilsurvei_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		/*$dataProvider=new CActiveDataProvider('HasilSurvey');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['jenis_izin'] = Jenisikm::model()->findAll();
		$datapendidikan = Pendidikan::model()->findAll();
		$model = Yii::app()->db->createCommand('SELECT
			tblpertanyaan.tblpertanyaan_id,
			tblpertanyaan.tblpertanyaan_urut,
			tblpertanyaan.tblpertanyaan_uraian,
			tblpertanyaan.tblpertanyaan_ketjawabanA,
			tblpertanyaan.tblpertanyaan_ketjawabanB,
			tblpertanyaan.tblpertanyaan_ketjawabanC,
			tblpertanyaan.tblpertanyaan_ketjawabanD,
			tblpertanyaan.tblpertanyaan_isaktif
			FROM
			tblpertanyaan

		');
		$datapertanyaan = $model->queryAll();
		$this->renderPartial('index', array(
			'data'=>$data,
			'datapertanyaan'=>$datapertanyaan,
			'datapendidikan'=>$datapendidikan
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new HasilSurvey('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['HasilSurvey']))
			$model->attributes=$_GET['HasilSurvey'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return HasilSurvey the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=HasilSurvey::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param HasilSurvey $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='hasil-survey-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionSimpan()
	{

		$jenisizin = trim($_POST['jenisizin']);
		
		$loket = Jenisikm::model()->findByPk($jenisizin);


		$kodeloket=0;
		if($loket){
			$kodeloket=$loket->refloket_id;
		}
		$jawaban4 = (int) trim($_POST['soal4']);
		$get = $loket->refjenisizinikm_nama;

		$name = $get;
		$name = strtolower($name);
		$findme1 = 'imb'; // cari kata2 apa
		$findme2 = 'ho'; // cari kata2 apa
		$pos = strpos($name, $findme1);
		$pos2 = strpos($name, $findme2);
		if ($pos=== false && $pos2===false) {
		    // jika TIDAK ada kata2 IMB & HO di jenis izin, maka jalankan koding ... 
		    $jawaban4 = 4;
		} 
		    // jika ADA kata2 IMB & HO di jenis izin, maka jalankan koding ... 
		    
		

		$namaresponden = trim($_POST['namaresponden']);
		$jeniskelamin = trim($_POST['jeniskelamin']);
		$tingkatpend = trim($_POST['tingkatpend']);
		$statuspendaftaran = trim($_POST['statuspendaftaran']);
		$statusresponden = trim($_POST['statusresponden']);
		$usia = trim($_POST['usia']);
		$saran = trim($_POST['masukan']);
		$tanggal = date('Y-m-d H:i:s');

		$soal1 = (int) trim($_POST['soal1']);
		$soal2 = (int) trim($_POST['soal2']);
		$soal3 = (int) trim($_POST['soal3']);
		$soal4 = $jawaban4;
		$soal5 = (int) trim($_POST['soal5']);
		$soal6 = (int) trim($_POST['soal6']);
		$soal7 = (int) trim($_POST['soal7']);
		$soal8 = (int) trim($_POST['soal8']);
		$soal9 = (int) trim($_POST['soal9']);

		$data = Yii::app()->db->createCommand();
		$simpan = $data->insert('tblhasilsurvei',array(

			'refjenisizinikm_id'=>$jenisizin,
			'reftingkatpendidikan_id'=>$tingkatpend,
			'refsex_id'=>$jeniskelamin,
			'refloket_id'=>$kodeloket,
			'tblhasilsurvei_nama'=>$namaresponden,
			'tblhasilsurvei_usia'=>$usia,
			'refjenisizinikm_nama'=>$jenisizin,
			'tblhasilsurvei_penilaian'=>'',
			'tblhasilsurvei_saran'=>$saran,
			'tblhasilsurvei_caradaftar'=>$statuspendaftaran,
			'tblhasilsurvei_pengurusan'=>$statusresponden,
			'tblhasilsurvei_pertanyaan1'=>$soal1,
			'tblhasilsurvei_pertanyaan2'=>$soal2,
			'tblhasilsurvei_pertanyaan3'=>$soal3,
			'tblhasilsurvei_pertanyaan4'=>$soal4,
			'tblhasilsurvei_pertanyaan5'=>$soal5,
			'tblhasilsurvei_pertanyaan6'=>$soal6,
			'tblhasilsurvei_pertanyaan7'=>$soal7,
			'tblhasilsurvei_pertanyaan8'=>$soal8,
			'tblhasilsurvei_pertanyaan9'=>$soal9,
			'tblhasilsurvei_syscreate'=>$tanggal,
			'tblhasilsurvei_total'=>$soal1+
									$soal2+
									$soal3+
									$soal4+
									$soal5+
									$soal6+
									$soal7+
									$soal8+
									$soal9,
				)
			);


										

		if ($simpan>0) {
			echo "success";
		}
		else {
			echo "gagal";
		}
		
	}
}
