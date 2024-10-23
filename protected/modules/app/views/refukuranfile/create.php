<?php
/* @var $this RefukuranfileController */
/* @var $model Refukuranfile */

$this->breadcrumbs=array(
	'Refukuranfiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Refukuranfile', 'url'=>array('index')),
	array('label'=>'Manage Refukuranfile', 'url'=>array('admin')),
);
?>

<h1>Create Refukuranfile</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>