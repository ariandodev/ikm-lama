<?php
/* @var $this TblizinController */
/* @var $model Tblizin */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tblizin_id'); ?>
		<?php echo $form->textField($model,'tblizin_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblizin_nama'); ?>
		<?php echo $form->textField($model,'tblizin_nama',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblizin_lama'); ?>
		<?php echo $form->textField($model,'tblizin_lama'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblizin_icon'); ?>
		<?php echo $form->textField($model,'tblizin_icon',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblizin_adaretribusi'); ?>
		<?php echo $form->textField($model,'tblizin_adaretribusi',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblizin_terstruktur'); ?>
		<?php echo $form->textField($model,'tblizin_terstruktur',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblizin_isaktif'); ?>
		<?php echo $form->textField($model,'tblizin_isaktif',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->