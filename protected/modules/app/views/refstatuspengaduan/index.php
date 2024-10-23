<?php
/* @var $this RefstatuspengaduanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Refstatuspengaduans',
);

$this->menu=array(
	array('label'=>'Create Refstatuspengaduan', 'url'=>array('create')),
	array('label'=>'Manage Refstatuspengaduan', 'url'=>array('admin')),
);
?>

<h1>Refstatuspengaduans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
