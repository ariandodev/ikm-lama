<?php
/* @var $this TblizinController */
/* @var $model Tblizin */

$this->breadcrumbs=array(
	'Tblizins'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tblizin', 'url'=>array('index')),
	array('label'=>'Create Tblizin', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tblizin-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tblizins</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tblizin-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tblizin_id',
		'tblizin_nama',
		'tblizin_lama',
		'tblizin_icon',
		'tblizin_adaretribusi',
		'tblizin_terstruktur',
		/*
		'tblizin_isaktif',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
