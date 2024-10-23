<?php
/* @var $this RefukuranfileController */
/* @var $model Refukuranfile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'refukuranfile-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'refukuranfile_id'); ?>
		<?php echo $form->textField($model,'refukuranfile_id'); ?>
		<?php echo $form->error($model,'refukuranfile_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refukuranfile_width'); ?>
		<?php echo $form->textField($model,'refukuranfile_width',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'refukuranfile_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refukuranfile_height'); ?>
		<?php echo $form->textField($model,'refukuranfile_height',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'refukuranfile_height'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->