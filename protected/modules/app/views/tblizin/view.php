<?php
/* @var $this TblizinController */
/* @var $model Tblizin */

$this->breadcrumbs=array(
	'Tblizins'=>array('index'),
	$model->tblizin_id,
);

$this->menu=array(
	array('label'=>'List Tblizin', 'url'=>array('index')),
	array('label'=>'Create Tblizin', 'url'=>array('create')),
	array('label'=>'Update Tblizin', 'url'=>array('update', 'id'=>$model->tblizin_id)),
	array('label'=>'Delete Tblizin', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tblizin_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tblizin', 'url'=>array('admin')),
);
?>

<h1>View Tblizin #<?php echo $model->tblizin_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tblizin_id',
		'tblizin_nama',
		'tblizin_lama',
		'tblizin_icon',
		'tblizin_adaretribusi',
		'tblizin_terstruktur',
		'tblizin_isaktif',
	),
)); ?>
