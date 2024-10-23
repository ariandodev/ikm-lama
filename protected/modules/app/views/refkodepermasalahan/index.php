<?php
/* @var $this RefkodepermasalahanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Refkodepermasalahans',
);

$this->menu=array(
	array('label'=>'Create Refkodepermasalahan', 'url'=>array('create')),
	array('label'=>'Manage Refkodepermasalahan', 'url'=>array('admin')),
);
?>

<h1>Refkodepermasalahans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
