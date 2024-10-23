<?php
/* @var $this RefkodepermasalahanController */
/* @var $model Refkodepermasalahan */

$this->breadcrumbs=array(
	'Refkodepermasalahans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Refkodepermasalahan', 'url'=>array('index')),
	array('label'=>'Manage Refkodepermasalahan', 'url'=>array('admin')),
);
?>

<h1>Create Refkodepermasalahan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>