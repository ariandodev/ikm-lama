<?php
/* @var $this HasilsurveyController */
/* @var $model HasilSurvey */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_id'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refjenisizinikm_id'); ?>
		<?php echo $form->textField($model,'refjenisizinikm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refjenisizinikm_nama'); ?>
		<?php echo $form->textField($model,'refjenisizinikm_nama',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_nama'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_nama',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan1'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan2'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan3'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan4'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan5'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan5'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan6'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan6'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan7'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan7'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan8'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan8'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan9'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan9'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan10'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan10'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan11'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan11'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan12'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan12'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan13'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan13'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_pertanyaan14'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan14'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_saran'); ?>
		<?php echo $form->textArea($model,'tblhasilsurvei_saran',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_total'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_total',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblhasilsurvei_syscreate'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_syscreate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->