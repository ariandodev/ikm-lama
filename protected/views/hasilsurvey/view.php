<?php
/* @var $this HasilsurveyController */
/* @var $model HasilSurvey */

$this->breadcrumbs=array(
	'Hasil Surveys'=>array('index'),
	$model->tblhasilsurvei_id,
);

$this->menu=array(
	array('label'=>'List HasilSurvey', 'url'=>array('index')),
	array('label'=>'Create HasilSurvey', 'url'=>array('create')),
	array('label'=>'Update HasilSurvey', 'url'=>array('update', 'id'=>$model->tblhasilsurvei_id)),
	array('label'=>'Delete HasilSurvey', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tblhasilsurvei_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HasilSurvey', 'url'=>array('admin')),
);
?>

<h1>View HasilSurvey #<?php echo $model->tblhasilsurvei_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tblhasilsurvei_id',
		'refjenisizinikm_id',
		'refjenisizinikm_nama',
		'tblhasilsurvei_nama',
		'tblhasilsurvei_pertanyaan1',
		'tblhasilsurvei_pertanyaan2',
		'tblhasilsurvei_pertanyaan3',
		'tblhasilsurvei_pertanyaan4',
		'tblhasilsurvei_pertanyaan5',
		'tblhasilsurvei_pertanyaan6',
		'tblhasilsurvei_pertanyaan7',
		'tblhasilsurvei_pertanyaan8',
		'tblhasilsurvei_pertanyaan9',
		'tblhasilsurvei_pertanyaan10',
		'tblhasilsurvei_pertanyaan11',
		'tblhasilsurvei_pertanyaan12',
		'tblhasilsurvei_pertanyaan13',
		'tblhasilsurvei_pertanyaan14',
		'tblhasilsurvei_saran',
		'tblhasilsurvei_total',
		'tblhasilsurvei_syscreate',
	),
)); ?>
