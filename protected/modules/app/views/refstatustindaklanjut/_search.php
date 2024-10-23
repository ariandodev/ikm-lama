<?php
/* @var $this RefstatustindaklanjutController */
/* @var $model Refstatustindaklanjut */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'refstatustindaklanjut_id'); ?>
		<?php echo $form->textField($model,'refstatustindaklanjut_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refstatustindaklanjut_jenis'); ?>
		<?php echo $form->textField($model,'refstatustindaklanjut_jenis'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refstatustindaklanjut_jenisuraian'); ?>
		<?php echo $form->textField($model,'refstatustindaklanjut_jenisuraian',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refstatustindaklanjut_keterangan'); ?>
		<?php echo $form->textField($model,'refstatustindaklanjut_keterangan',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->