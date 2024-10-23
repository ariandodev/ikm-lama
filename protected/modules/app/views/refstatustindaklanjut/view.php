<?php
/* @var $this RefstatustindaklanjutController */
/* @var $model Refstatustindaklanjut */

$this->breadcrumbs=array(
	'Refstatustindaklanjuts'=>array('index'),
	$model->refstatustindaklanjut_id,
);

$this->menu=array(
	array('label'=>'List Refstatustindaklanjut', 'url'=>array('index')),
	array('label'=>'Create Refstatustindaklanjut', 'url'=>array('create')),
	array('label'=>'Update Refstatustindaklanjut', 'url'=>array('update', 'id'=>$model->refstatustindaklanjut_id)),
	array('label'=>'Delete Refstatustindaklanjut', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->refstatustindaklanjut_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Refstatustindaklanjut', 'url'=>array('admin')),
);
?>

<h1>View Refstatustindaklanjut #<?php echo $model->refstatustindaklanjut_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'refstatustindaklanjut_id',
		'refstatustindaklanjut_jenis',
		'refstatustindaklanjut_jenisuraian',
		'refstatustindaklanjut_keterangan',
	),
)); ?>
