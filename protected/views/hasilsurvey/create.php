<?php
/* @var $this HasilsurveyController */
/* @var $model HasilSurvey */

$this->breadcrumbs=array(
	'Hasil Surveys'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HasilSurvey', 'url'=>array('index')),
	array('label'=>'Manage HasilSurvey', 'url'=>array('admin')),
);
?>

<h1>Create HasilSurvey</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>