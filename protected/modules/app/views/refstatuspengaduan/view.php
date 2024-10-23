<?php
/* @var $this RefstatuspengaduanController */
/* @var $model Refstatuspengaduan */

$this->breadcrumbs=array(
	'Refstatuspengaduans'=>array('index'),
	$model->refstatuspengaduan_id,
);

$this->menu=array(
	array('label'=>'List Refstatuspengaduan', 'url'=>array('index')),
	array('label'=>'Create Refstatuspengaduan', 'url'=>array('create')),
	array('label'=>'Update Refstatuspengaduan', 'url'=>array('update', 'id'=>$model->refstatuspengaduan_id)),
	array('label'=>'Delete Refstatuspengaduan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->refstatuspengaduan_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Refstatuspengaduan', 'url'=>array('admin')),
);
?>

<h1>View Refstatuspengaduan #<?php echo $model->refstatuspengaduan_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'refstatuspengaduan_id',
		'refstatuspengaduan_keterangan',
	),
)); ?>
