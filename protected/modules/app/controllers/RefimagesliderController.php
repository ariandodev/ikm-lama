<?php

class RefimagesliderController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$dataimageslider = Slider::model()->findAll();
		$this->renderPartial('index', array(
			'dataimageslider'=>$dataimageslider
			));
	}

	public function actionGetDataImageSlider()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Slider::model()->findByPk($id);
		echo CJSON::encode($model);
	}	


	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$tblslider_text = trim($_POST['tblslider_text']);
		$tblslider_status = trim($_POST['tblslider_status']);
		$tblslider_gambar = trim($_POST['tblslider_gambar']);

		if ($cmd=="tambah") {
			$model = new Slider;
			$model->tblslider_id = "";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Slider::model()->findByPk($id);

		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblslider_text = $tblslider_text;
			$model->tblslider_status = $tblslider_status;
			$model->tblslider_gambar = $tblslider_gambar;
			

			if($model->save()){	
				echo "success";
			} 
			else{
				print_r($model);
				echo "failed";
			}
	}

	public function actionHapusDataImageSlider()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Slider::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionSimpanFileImageSlider()
	{
		$folder = "uploads/slider";
		$filertf = $_FILES['upload_file']['tmp_name']; 
		$namafileimage = md5(microtime()).'_'.$_FILES['upload_file']['name'];
		$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafileimage;
		
		if(isset($_FILES["upload_file"]))
		{
			//Filter the file types , if you want.
			if ($_FILES["upload_file"]["error"] > 0)
			{
			  echo "error ";
			}
			else
			{
				//move the uploaded file to uploads folder;
		    	//move_uploaded_file($filertf,$target);


				if (move_uploaded_file($filertf,$target)) {
					echo $namafileimage;
					chmod($target, 0777);
				}
				else {
					echo "failed";
				}
		    	
			}

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