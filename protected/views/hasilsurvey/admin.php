<?php
/* @var $this HasilsurveyController */
/* @var $model HasilSurvey */

$this->breadcrumbs=array(
	'Hasil Surveys'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HasilSurvey', 'url'=>array('index')),
	array('label'=>'Create HasilSurvey', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#hasil-survey-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Hasil Surveys</h1>

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
	'id'=>'hasil-survey-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'tblhasilsurvei_id',
		'refjenisizinikm_id',
		'refjenisizinikm_nama',
		'tblhasilsurvei_nama',
		'tblhasilsurvei_pertanyaan1',
		'tblhasilsurvei_pertanyaan2',
		/*
		'tblhasilsurvei_pertanyaan3',
		'tblhasilsurvei_pertanyaan4',
		'tblhasilsurvei_pertanyaan5',
		'tblhasilsurvei_pertanyaan6',
		'tblhasilsurvei_pertanyaan7',
		'tblhasilsurvei_pertanyaan8',
		'tblhasilsurvei_pertanyaan9',
		'tblhasilsurvei_pertanyaan10',
		'tblhasilsurvei_pertanyaan11',
		'tblhasilsurvei_pertanyaan12',
		'tblhasilsurvei_pertanyaan13',
		'tblhasilsurvei_pertanyaan14',
		'tblhasilsurvei_saran',
		'tblhasilsurvei_total',
		'tblhasilsurvei_syscreate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
