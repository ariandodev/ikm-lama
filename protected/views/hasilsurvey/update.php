<?php
/* @var $this HasilsurveyController */
/* @var $model HasilSurvey */

$this->breadcrumbs=array(
	'Hasil Surveys'=>array('index'),
	$model->tblhasilsurvei_id=>array('view','id'=>$model->tblhasilsurvei_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List HasilSurvey', 'url'=>array('index')),
	array('label'=>'Create HasilSurvey', 'url'=>array('create')),
	array('label'=>'View HasilSurvey', 'url'=>array('view', 'id'=>$model->tblhasilsurvei_id)),
	array('label'=>'Manage HasilSurvey', 'url'=>array('admin')),
);
?>

<h1>Update HasilSurvey <?php echo $model->tblhasilsurvei_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>