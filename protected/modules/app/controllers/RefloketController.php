<?php

class RefloketController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$model = Yii::app()->db->createCommand('SELECT
			refloket.refloket_id,
			refloket.refloket_nama,
			refloket.refloket_petugas,
			refloket.refloket_isaktif
			FROM
			refloket
		');

		$dataloket = $model->queryAll();
		$this->renderPartial('index', array(
			'dataloket'=>$dataloket
			));
	}

	public function actionGetDataLoket()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Refloket::model()->findByPk($id);
		$result = array();

		$obj['namaloket'] = $model['refloket_nama'];
		$obj['namapetugas'] = $model['refloket_petugas'];
		$obj['namaaktif'] = $model['refloket_isaktif'];

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
		$nama_petugas=trim($_POST['nama_petugas']);
		$nama_aktif=trim($_POST['nama_aktif']);

		if ($cmd=="tambah"){
			$model = new Refloket;
			$model->refloket_id = "";
		}
		elseif($cmd="edit"){
			$id = trim($_POST['id']);
			$model = Refloket::model()->findByPk($id);
		}
		else{
			echo "Invalid Command";
			yii::app()->end();
		}
			$model->refloket_nama = $nama_loket;
			$model->refloket_petugas = $nama_petugas;
			$model->refloket_isaktif = $nama_aktif;

			if($model->save()) 
				echo "success";
			else
				echo "failed";
	}

	public function actionHapusDataLoket()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Refloket::model()->findByPk($id);
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