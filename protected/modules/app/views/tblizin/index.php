<?php
/* @var $this TblizinController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tblizins',
);

$this->menu=array(
	array('label'=>'Create Tblizin', 'url'=>array('create')),
	array('label'=>'Manage Tblizin', 'url'=>array('admin')),
);
?>

<h1>Tblizins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
