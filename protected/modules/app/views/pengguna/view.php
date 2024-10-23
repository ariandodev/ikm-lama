<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */

$this->breadcrumbs=array(
	'Penggunas'=>array('index'),
	$model->tblpengguna_id,
);

$this->menu=array(
	array('label'=>'List Pengguna', 'url'=>array('index')),
	array('label'=>'Create Pengguna', 'url'=>array('create')),
	array('label'=>'Update Pengguna', 'url'=>array('update', 'id'=>$model->tblpengguna_id)),
	array('label'=>'Delete Pengguna', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tblpengguna_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pengguna', 'url'=>array('admin')),
);
?>

<h1>View Pengguna #<?php echo $model->tblpengguna_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tblpengguna_id',
		'tblpengguna_nama',
		'tblpengguna_username',
		'tblpengguna_password',
		'tblrole_id',
		'tblpengguna_idsubunit',
		'tblpengguna_status',
		'tblpengguna_modified',
		'tblpengguna_created',
	),
)); ?>
