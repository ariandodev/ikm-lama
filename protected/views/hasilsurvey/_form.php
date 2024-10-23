<?php
/* @var $this HasilsurveyController */
/* @var $model HasilSurvey */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hasil-survey-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'refjenisizinikm_id'); ?>
		<?php echo $form->textField($model,'refjenisizinikm_id'); ?>
		<?php echo $form->error($model,'refjenisizinikm_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refjenisizinikm_nama'); ?>
		<?php echo $form->textField($model,'refjenisizinikm_nama',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'refjenisizinikm_nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_nama'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tblhasilsurvei_nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan1'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan1'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan2'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan2'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan3'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan3'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan4'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan4'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan5'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan5'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan6'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan6'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan6'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan7'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan7'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan7'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan8'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan8'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan8'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan9'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan9'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan9'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan10'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan10'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan10'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan11'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan11'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan11'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan12'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan12'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan12'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan13'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan13'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan13'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_pertanyaan14'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_pertanyaan14'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_pertanyaan14'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_saran'); ?>
		<?php echo $form->textArea($model,'tblhasilsurvei_saran',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tblhasilsurvei_saran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_total'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_total',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tblhasilsurvei_total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblhasilsurvei_syscreate'); ?>
		<?php echo $form->textField($model,'tblhasilsurvei_syscreate'); ?>
		<?php echo $form->error($model,'tblhasilsurvei_syscreate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->