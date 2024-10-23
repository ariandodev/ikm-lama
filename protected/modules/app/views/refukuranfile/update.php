<?php
/* @var $this RefukuranfileController */
/* @var $model Refukuranfile */

$this->breadcrumbs=array(
	'Refukuranfiles'=>array('index'),
	$model->refukuranfile_id=>array('view','id'=>$model->refukuranfile_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Refukuranfile', 'url'=>array('index')),
	array('label'=>'Create Refukuranfile', 'url'=>array('create')),
	array('label'=>'View Refukuranfile', 'url'=>array('view', 'id'=>$model->refukuranfile_id)),
	array('label'=>'Manage Refukuranfile', 'url'=>array('admin')),
);
?>

<h1>Update Refukuranfile <?php echo $model->refukuranfile_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>