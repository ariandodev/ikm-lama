<?php
/* @var $this RefstatuspengaduanController */
/* @var $model Refstatuspengaduan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'refstatuspengaduan_id'); ?>
		<?php echo $form->textField($model,'refstatuspengaduan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refstatuspengaduan_keterangan'); ?>
		<?php echo $form->textField($model,'refstatuspengaduan_keterangan',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->