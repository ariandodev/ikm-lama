<?php

class RefpertanyaanController extends Controller
{

	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
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
			'datapertanyaan'=>$datapertanyaan
			));

	}

	public function actionGetDataPertanyaan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Tblpertanyaan::model()->findByPk($id);
		$result = array();

		$obj['nomor'] = $model['tblpertanyaan_urut'];
		$obj['pertanyaan'] = $model['tblpertanyaan_uraian'];
		$obj['jawabanA'] = $model['tblpertanyaan_ketjawabanA'];
		$obj['jawabanB'] = $model['tblpertanyaan_ketjawabanB'];
		$obj['jawabanC'] = $model['tblpertanyaan_ketjawabanC'];
		$obj['jawabanD'] = $model['tblpertanyaan_ketjawabanD'];

		$result = $obj;

		header('Content-type: text/json');
		header('Content-type: application/json');
		echo json_encode($result);

	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$nomor_urut=trim($_POST['nomor_urut']);
		$pertanyaan_uraian=trim($_POST['pertanyaan_uraian']);
		$jawaban_a=trim($_POST['jawaban_a']);
		$jawaban_b=trim($_POST['jawaban_b']);
		$jawaban_c=trim($_POST['jawaban_c']);
		$jawaban_d=trim($_POST['jawaban_d']);

		if ($cmd=="tambah"){
			$model = new Tblpertanyaan;
			$model->tblpertanyaan_id = "";
		}
		elseif($cmd="edit"){
			$id = trim($_POST['id']);
			$model = Tblpertanyaan::model()->findByPk($id);
		}
		else{
			echo "Invalid Command";
			yii::app()->end();
		}
			$model->tblpertanyaan_urut = $nomor_urut;
			$model->tblpertanyaan_uraian = $pertanyaan_uraian;
			$model->tblpertanyaan_ketjawabanA = $jawaban_a;
			$model->tblpertanyaan_ketjawabanB = $jawaban_b;
			$model->tblpertanyaan_ketjawabanC = $jawaban_c;
			$model->tblpertanyaan_ketjawabanD = $jawaban_d;

			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataPertanyaan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Tblpertanyaan::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	/*public function actionHapusDataJenisProdukHukum()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Refprodukhukumjenis::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}*/


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}