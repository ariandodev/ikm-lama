<?php
/* @var $this RefstatuspengaduanController */
/* @var $model Refstatuspengaduan */

$this->breadcrumbs=array(
	'Refstatuspengaduans'=>array('index'),
	$model->refstatuspengaduan_id=>array('view','id'=>$model->refstatuspengaduan_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Refstatuspengaduan', 'url'=>array('index')),
	array('label'=>'Create Refstatuspengaduan', 'url'=>array('create')),
	array('label'=>'View Refstatuspengaduan', 'url'=>array('view', 'id'=>$model->refstatuspengaduan_id)),
	array('label'=>'Manage Refstatuspengaduan', 'url'=>array('admin')),
);
?>

<h1>Update Refstatuspengaduan <?php echo $model->refstatuspengaduan_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>