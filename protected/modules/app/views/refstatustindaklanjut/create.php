<?php
/* @var $this RefstatustindaklanjutController */
/* @var $model Refstatustindaklanjut */

$this->breadcrumbs=array(
	'Refstatustindaklanjuts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Refstatustindaklanjut', 'url'=>array('index')),
	array('label'=>'Manage Refstatustindaklanjut', 'url'=>array('admin')),
);
?>

<h1>Create Refstatustindaklanjut</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>