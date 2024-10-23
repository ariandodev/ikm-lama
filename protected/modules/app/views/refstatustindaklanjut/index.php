<?php
/* @var $this RefstatustindaklanjutController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Refstatustindaklanjuts',
);

$this->menu=array(
	array('label'=>'Create Refstatustindaklanjut', 'url'=>array('create')),
	array('label'=>'Manage Refstatustindaklanjut', 'url'=>array('admin')),
);
?>

<h1>Refstatustindaklanjuts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
