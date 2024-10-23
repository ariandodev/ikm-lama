<?php
/* @var $this TblizinController */
/* @var $model Tblizin */

$this->breadcrumbs=array(
	'Tblizins'=>array('index'),
	$model->tblizin_id=>array('view','id'=>$model->tblizin_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tblizin', 'url'=>array('index')),
	array('label'=>'Create Tblizin', 'url'=>array('create')),
	array('label'=>'View Tblizin', 'url'=>array('view', 'id'=>$model->tblizin_id)),
	array('label'=>'Manage Tblizin', 'url'=>array('admin')),
);
?>

<h1>Update Tblizin <?php echo $model->tblizin_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>