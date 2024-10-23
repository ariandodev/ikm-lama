<?php

class RefstatustindaklanjutController extends Controller
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
				'actions'=>array('index','view', 'simpandata', 'tambahdata', 'ajxgetdata', 'hapusdata'),
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
		$model=new Refstatustindaklanjut;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Refstatustindaklanjut']))
		{
			$model->attributes=$_POST['Refstatustindaklanjut'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->refstatustindaklanjut_id));
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

		if(isset($_POST['Refstatustindaklanjut']))
		{
			$model->attributes=$_POST['Refstatustindaklanjut'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->refstatustindaklanjut_id));
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
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$getlistdata= Yii::app()->db->createCommand(
			"SELECT
				refstatustindaklanjut_id,
				refstatustindaklanjut_jenis,
				refstatustindaklanjut_jenisuraian,
				refstatustindaklanjut_keterangan,
				refstatustindaklanjut_isaktif
				FROM
				refstatustindaklanjut
			"
			);
		$listdata = $getlistdata->queryAll();
		$this->renderPartial('ref_stat_tindaklanjut',array(
			//'dataProvider'=>$dataProvider,
			'listdata'=>$listdata,
			'data'=>$data
		));
	}

	public function actionAjxGetData()
	{
		if(!Yii::app()->request->isPostRequest) // cegah controller hanya bisa diakses via method POST
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_REQUEST['id']); // ambil id yg dikirim
		$field = trim($_REQUEST['field']); // ambil field yg dikirim
		$get = Refstatustindaklanjut::model()->findByPk($id);
		echo $get[$field];

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Refstatustindaklanjut('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Refstatustindaklanjut']))
			$model->attributes=$_GET['Refstatustindaklanjut'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Refstatustindaklanjut the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Refstatustindaklanjut::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Refstatustindaklanjut $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='refstatustindaklanjut-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTambahData() 
	{
		$tambahdata = new Refstatustindaklanjut;

		$tambahdata->refstatustindaklanjut_jenis = trim($_POST['refstatustindaklanjut_jenis']);
		$tambahdata->refstatustindaklanjut_jenisuraian = trim($_POST['refstatustindaklanjut_jenisuraian']);
		$tambahdata->refstatustindaklanjut_keterangan = trim($_POST['refstatustindaklanjut_keterangan']);
		$tambahdata->refstatustindaklanjut_isaktif= trim($_POST['refstatustindaklanjut_isaktif']);

		if ($tambahdata->save()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionSimpanData()
	{
		if (!Yii::app()->request->isPostRequest) 
			throw new CHttpException(403, "Forbiden, Error Processing Request");
			$call = trim($_REQUEST['call']); // tangkap perintah yg dikirim
		
		if ($call=='tambah') {
			$model= new Refstatustindaklanjut;
			$model->refstatustindaklanjut_id='';
		} elseif ($call=='edit') {
			$id = trim($_REQUEST['id']); // ambil id yg dikirim
			$model=Refstatustindaklanjut::model()->findByPk($id);
		} else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->refstatustindaklanjut_jenis=($_POST['refstatustindaklanjut_jenis']);
		$model->refstatustindaklanjut_jenisuraian=($_POST['refstatustindaklanjut_jenisuraian']);
		$model->refstatustindaklanjut_keterangan=($_POST['refstatustindaklanjut_keterangan']);
		$model->refstatustindaklanjut_isaktif=($_POST['refstatustindaklanjut_isaktif']);
	
		if($model->save())
			echo "success";
		else echo "failed";
	}

	public function actionHapusData()
	{
		$id = trim($_POST['id']);

		$hapusdata = Refstatustindaklanjut::model()->findByPk($id);
		if ($hapusdata->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}
}
