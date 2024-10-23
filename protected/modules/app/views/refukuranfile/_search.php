<?php
/* @var $this RefukuranfileController */
/* @var $model Refukuranfile */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'refukuranfile_id'); ?>
		<?php echo $form->textField($model,'refukuranfile_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refukuranfile_width'); ?>
		<?php echo $form->textField($model,'refukuranfile_width',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refukuranfile_height'); ?>
		<?php echo $form->textField($model,'refukuranfile_height',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->