<?php

class RefhasilsurveyController extends Controller
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
			tblhasilsurvei.tblhasilsurvei_id,
			tblhasilsurvei.refjenisizinikm_id,
			tblhasilsurvei.reftingkatpendidikan_id,
			tblhasilsurvei.refsex_id,
			tblhasilsurvei.tblhasilsurvei_usia,
			tblhasilsurvei.tblhasilsurvei_caradaftar,
			tblhasilsurvei.tblhasilsurvei_pengurusan,
			tblhasilsurvei.refjenisizinikm_nama,
			tblhasilsurvei.tblhasilsurvei_nama,
			tblhasilsurvei.tblhasilsurvei_pertanyaan1,
			tblhasilsurvei.tblhasilsurvei_pertanyaan2,
			tblhasilsurvei.tblhasilsurvei_pertanyaan3,
			tblhasilsurvei.tblhasilsurvei_pertanyaan4,
			tblhasilsurvei.tblhasilsurvei_pertanyaan5,
			tblhasilsurvei.tblhasilsurvei_pertanyaan6,
			tblhasilsurvei.tblhasilsurvei_pertanyaan7,
			tblhasilsurvei.tblhasilsurvei_pertanyaan8,
			tblhasilsurvei.tblhasilsurvei_pertanyaan9,
			tblhasilsurvei.tblhasilsurvei_penilaian,
			tblhasilsurvei.tblhasilsurvei_saran,
			tblhasilsurvei.tblhasilsurvei_total,
			tblhasilsurvei.tblhasilsurvei_syscreate,
			tblhasilsurvei.tblhasilsurvei_sysupdate,
			refjenisizinikm.refjenisizinikm_nama,
			reftingkatpendidikan.reftingkatpendidikan_nama,
			refsex.refsex_nama,
			tblhasilsurvei_penilaian
			FROM
			tblhasilsurvei
			LEFT JOIN refjenisizinikm ON refjenisizinikm.refjenisizinikm_id = tblhasilsurvei.refjenisizinikm_id
			LEFT JOIN reftingkatpendidikan ON reftingkatpendidikan.reftingkatpendidikan_id = tblhasilsurvei.reftingkatpendidikan_id
			LEFT JOIN refsex ON refsex.refsex_id = tblhasilsurvei.refsex_id

			');

$datasaran = $model->queryAll();
$this->renderPartial('index', array(
	'datasaran'=>$datasaran
	));
}

public function actionSimpan()
{
	if(!Yii::app()->request->isPostRequest)
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		@$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$id = trim($_POST['id']);
		$tblhasilsurvei_saran = trim($_POST['tblhasilsurvei_saran']);
		$model = Tblhasilsurvei::model()->findByPk($id);
		$model->tblhasilsurvei_saran = $tblhasilsurvei_saran;

		if($model->save()){
			echo "success";	
		} 
		else{
			echo "failed";
		}
	}

	public function actionGetdata(){
		$id = trim($_POST['id']);
		$result = array();

		$data = Yii::app()->db->createCommand()
		->select('*')
		->from('tblhasilsurvei')
		->where('tblhasilsurvei_id=:id',array(':id'=>$id))
		->queryRow();

		$obj['tblhasilsurvei_saran'] = $data['tblhasilsurvei_saran'];
		$result = $obj;
		echo CJSON::encode($result);
	}

	public function actionCetak()
	{
		$data['saran'] = Yii::app()->db->createCommand("SELECT
			tblhasilsurvei.tblhasilsurvei_id,
			tblhasilsurvei.refjenisizinikm_id,
			tblhasilsurvei.reftingkatpendidikan_id,
			tblhasilsurvei.refsex_id,
			tblhasilsurvei.tblhasilsurvei_usia,
			tblhasilsurvei.tblhasilsurvei_caradaftar,
			tblhasilsurvei.tblhasilsurvei_pengurusan,
			tblhasilsurvei.refjenisizinikm_nama,
			tblhasilsurvei.tblhasilsurvei_nama,
			tblhasilsurvei.tblhasilsurvei_pertanyaan1,
			tblhasilsurvei.tblhasilsurvei_pertanyaan2,
			tblhasilsurvei.tblhasilsurvei_pertanyaan3,
			tblhasilsurvei.tblhasilsurvei_pertanyaan4,
			tblhasilsurvei.tblhasilsurvei_pertanyaan5,
			tblhasilsurvei.tblhasilsurvei_pertanyaan6,
			tblhasilsurvei.tblhasilsurvei_pertanyaan7,
			tblhasilsurvei.tblhasilsurvei_pertanyaan8,
			tblhasilsurvei.tblhasilsurvei_pertanyaan9,
			tblhasilsurvei.tblhasilsurvei_penilaian,
			tblhasilsurvei.tblhasilsurvei_saran,
			tblhasilsurvei.tblhasilsurvei_total,
			tblhasilsurvei.tblhasilsurvei_syscreate,
			tblhasilsurvei.tblhasilsurvei_sysupdate,
			refjenisizinikm.refjenisizinikm_nama,
			reftingkatpendidikan.reftingkatpendidikan_nama,
			refsex.refsex_nama,
			tblhasilsurvei_penilaian
			FROM
			tblhasilsurvei
			LEFT JOIN refjenisizinikm ON refjenisizinikm.refjenisizinikm_id = tblhasilsurvei.refjenisizinikm_id
			LEFT JOIN reftingkatpendidikan ON reftingkatpendidikan.reftingkatpendidikan_id = tblhasilsurvei.reftingkatpendidikan_id
			LEFT JOIN refsex ON refsex.refsex_id = tblhasilsurvei.refsex_id")->queryAll();

$this->renderPartial('cetak', array('data'=>$data));
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