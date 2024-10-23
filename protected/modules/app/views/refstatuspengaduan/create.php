<?php
/* @var $this RefstatuspengaduanController */
/* @var $model Refstatuspengaduan */

$this->breadcrumbs=array(
	'Refstatuspengaduans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Refstatuspengaduan', 'url'=>array('index')),
	array('label'=>'Manage Refstatuspengaduan', 'url'=>array('admin')),
);
?>

<h1>Create Refstatuspengaduan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>