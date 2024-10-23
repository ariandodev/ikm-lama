<?php
/* @var $this RefkodepermasalahanController */
/* @var $model Refkodepermasalahan */

$this->breadcrumbs=array(
	'Refkodepermasalahans'=>array('index'),
	$model->refkodepermasalahan_id,
);

$this->menu=array(
	array('label'=>'List Refkodepermasalahan', 'url'=>array('index')),
	array('label'=>'Create Refkodepermasalahan', 'url'=>array('create')),
	array('label'=>'Update Refkodepermasalahan', 'url'=>array('update', 'id'=>$model->refkodepermasalahan_id)),
	array('label'=>'Delete Refkodepermasalahan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->refkodepermasalahan_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Refkodepermasalahan', 'url'=>array('admin')),
);
?>

<h1>View Refkodepermasalahan #<?php echo $model->refkodepermasalahan_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'refkodepermasalahan_id',
		'refkodepermasalahan_keterangan',
	),
)); ?>
