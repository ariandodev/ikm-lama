<?php
/* @var $this RefukuranfileController */
/* @var $model Refukuranfile */

$this->breadcrumbs=array(
	'Refukuranfiles'=>array('index'),
	$model->refukuranfile_id,
);

$this->menu=array(
	array('label'=>'List Refukuranfile', 'url'=>array('index')),
	array('label'=>'Create Refukuranfile', 'url'=>array('create')),
	array('label'=>'Update Refukuranfile', 'url'=>array('update', 'id'=>$model->refukuranfile_id)),
	array('label'=>'Delete Refukuranfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->refukuranfile_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Refukuranfile', 'url'=>array('admin')),
);
?>

<h1>View Refukuranfile #<?php echo $model->refukuranfile_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'refukuranfile_id',
		'refukuranfile_width',
		'refukuranfile_height',
	),
)); ?>
