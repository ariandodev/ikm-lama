<?php
/* @var $this RefkodepermasalahanController */
/* @var $model Refkodepermasalahan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'refkodepermasalahan_id'); ?>
		<?php echo $form->textField($model,'refkodepermasalahan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refkodepermasalahan_keterangan'); ?>
		<?php echo $form->textField($model,'refkodepermasalahan_keterangan',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->