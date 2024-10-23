<?php
/* @var $this PenggunaController */
/* @var $model Pengguna */

$this->breadcrumbs=array(
	'Penggunas'=>array('index'),
	$model->tblpengguna_id=>array('view','id'=>$model->tblpengguna_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pengguna', 'url'=>array('index')),
	array('label'=>'Create Pengguna', 'url'=>array('create')),
	array('label'=>'View Pengguna', 'url'=>array('view', 'id'=>$model->tblpengguna_id)),
	array('label'=>'Manage Pengguna', 'url'=>array('admin')),
);
?>

<h1>Update Pengguna <?php echo $model->tblpengguna_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>