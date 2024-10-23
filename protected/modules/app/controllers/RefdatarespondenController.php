<?php

class RefdatarespondenController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
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
			refsex.refsex_nama
			FROM
			tblhasilsurvei
			LEFT JOIN refjenisizinikm ON refjenisizinikm.refjenisizinikm_id = tblhasilsurvei.refjenisizinikm_id
			LEFT JOIN reftingkatpendidikan ON reftingkatpendidikan.reftingkatpendidikan_id = tblhasilsurvei.reftingkatpendidikan_id
			LEFT JOIN refsex ON refsex.refsex_id = tblhasilsurvei.refsex_id
			ORDER BY tblhasilsurvei.tblhasilsurvei_id DESC
			LIMIT 1000

		');

		$dataresponden = $model->queryAll();
		$this->renderPartial('index', array(
			'dataresponden'=>$dataresponden
			));
	}

	public function actionGetTabelResponden()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = $_REQUEST['id'];
		$jawaban = Yii::app()->db->createCommand('SELECT * FROM	tblhasilsurvei WHERE tblhasilsurvei_id='.$id)->queryRow();
		$model = Tblpertanyaan::model()->findAll();

		$data = Yii::app()->db->createCommand('SELECT * 
			FROM
			tblpertanyaan
			WHERE
			tblpertanyaan.tblpertanyaan_isaktif = "T"	
		');

		$datapertanyaan = $data->queryAll();
		$this->renderPartial('tabel', array(
		'datapertanyaan'=>$datapertanyaan
		,'id'=>$id 
		,'jawaban'=>$jawaban
		));

	}

	public function actionSimpan()
	{

		$data = Yii::app()->db->createCommand();
		$id = $_REQUEST['id'];
		$nilai = $_REQUEST['nilai'];
		$kolom = $_REQUEST['kolom'];

		$insert = array();
		$insert[$kolom] = $nilai;
		$simpan = $data->update('tblhasilsurvei',$insert, 'tblhasilsurvei_id=:id', array(':id'=>$id));
		


	}


	public function actionHapus()
	{
		$id = $_REQUEST['id'];
		$data = Tblhasilsurvei::model()->findByPK($id);

		if($data->delete()){
			echo "success";
		}else{
			echo "gagal";
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