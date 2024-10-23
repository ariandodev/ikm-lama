<?php

class RefjenisizinikmController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$comboloket = yii::app()->db->createCommand('SELECT
			refloket.refloket_id,
			refloket.refloket_nama
			FROM
			refloket

		')->queryAll();

		$model = Yii::app()->db->createCommand('SELECT
			refjenisizinikm.refjenisizinikm_id,
			refjenisizinikm.refloket_id,
			refjenisizinikm.refjenisizinikm_nama,
			refjenisizinikm.refjenisizinikm_isaktif,
			refloket.refloket_nama
			FROM
			refjenisizinikm
			LEFT JOIN refloket ON refloket.refloket_id = refjenisizinikm.refloket_id
		');

		$dataizin = $model->queryAll();
		$this->renderPartial('index', array(
			'dataizin'=>$dataizin,
			'comboloket'=>$comboloket
			));
	}

	public function actionGetDataJenisIzin()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Refjenisizinikm::model()->findByPk($id);
		$result = array();

		$obj['namaloket'] = $model['refloket_id'];
		$obj['namaizin'] = $model['refjenisizinikm_nama'];
		$obj['namaaktif'] = $model['refjenisizinikm_isaktif'];

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

		$nama_loket=trim($_POST['nama_loket']);
		$nama_izin=trim($_POST['nama_izin']);
		$nama_aktif=trim($_POST['nama_aktif']);

		if ($cmd=="tambah"){
			$model = new Refjenisizinikm;
			$model->refjenisizinikm_id = "";
		}
		elseif($cmd="edit"){
			$id = trim($_POST['id']);
			$model = Refjenisizinikm::model()->findByPk($id);
		}
		else{
			echo "Invalid Command";
			yii::app()->end();
		}
			$model->refloket_id = $nama_loket;
			$model->refjenisizinikm_nama = $nama_izin;
			$model->refjenisizinikm_isaktif = $nama_aktif;

			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataJenisIzin()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Refjenisizinikm::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}


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