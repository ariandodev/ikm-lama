<?php
/* @var $this RefkodepermasalahanController */
/* @var $model Refkodepermasalahan */

$this->breadcrumbs=array(
	'Refkodepermasalahans'=>array('index'),
	$model->refkodepermasalahan_id=>array('view','id'=>$model->refkodepermasalahan_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Refkodepermasalahan', 'url'=>array('index')),
	array('label'=>'Create Refkodepermasalahan', 'url'=>array('create')),
	array('label'=>'View Refkodepermasalahan', 'url'=>array('view', 'id'=>$model->refkodepermasalahan_id)),
	array('label'=>'Manage Refkodepermasalahan', 'url'=>array('admin')),
);
?>

<h1>Update Refkodepermasalahan <?php echo $model->refkodepermasalahan_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>