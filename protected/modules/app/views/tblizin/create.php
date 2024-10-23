<?php
/* @var $this TblizinController */
/* @var $model Tblizin */

$this->breadcrumbs=array(
	'Tblizins'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tblizin', 'url'=>array('index')),
	array('label'=>'Manage Tblizin', 'url'=>array('admin')),
);
?>

<h1>Create Tblizin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>