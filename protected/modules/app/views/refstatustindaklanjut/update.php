<?php
/* @var $this RefstatustindaklanjutController */
/* @var $model Refstatustindaklanjut */

$this->breadcrumbs=array(
	'Refstatustindaklanjuts'=>array('index'),
	$model->refstatustindaklanjut_id=>array('view','id'=>$model->refstatustindaklanjut_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Refstatustindaklanjut', 'url'=>array('index')),
	array('label'=>'Create Refstatustindaklanjut', 'url'=>array('create')),
	array('label'=>'View Refstatustindaklanjut', 'url'=>array('view', 'id'=>$model->refstatustindaklanjut_id)),
	array('label'=>'Manage Refstatustindaklanjut', 'url'=>array('admin')),
);
?>

<h1>Update Refstatustindaklanjut <?php echo $model->refstatustindaklanjut_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>