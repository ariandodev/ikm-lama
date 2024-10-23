<?php
/* @var $this RefstatustindaklanjutController */
/* @var $model Refstatustindaklanjut */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'refstatustindaklanjut-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'refstatustindaklanjut_jenis'); ?>
		<?php echo $form->textField($model,'refstatustindaklanjut_jenis'); ?>
		<?php echo $form->error($model,'refstatustindaklanjut_jenis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refstatustindaklanjut_jenisuraian'); ?>
		<?php echo $form->textField($model,'refstatustindaklanjut_jenisuraian',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'refstatustindaklanjut_jenisuraian'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refstatustindaklanjut_keterangan'); ?>
		<?php echo $form->textField($model,'refstatustindaklanjut_keterangan',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'refstatustindaklanjut_keterangan'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->