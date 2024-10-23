<?php
/* @var $this TblizinController */
/* @var $model Tblizin */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblizin-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tblizin_nama'); ?>
		<?php echo $form->textField($model,'tblizin_nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tblizin_nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblizin_lama'); ?>
		<?php echo $form->textField($model,'tblizin_lama'); ?>
		<?php echo $form->error($model,'tblizin_lama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblizin_icon'); ?>
		<?php echo $form->textField($model,'tblizin_icon',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tblizin_icon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblizin_adaretribusi'); ?>
		<?php echo $form->textField($model,'tblizin_adaretribusi',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tblizin_adaretribusi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblizin_terstruktur'); ?>
		<?php echo $form->textField($model,'tblizin_terstruktur',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tblizin_terstruktur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblizin_isaktif'); ?>
		<?php echo $form->textField($model,'tblizin_isaktif',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tblizin_isaktif'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->