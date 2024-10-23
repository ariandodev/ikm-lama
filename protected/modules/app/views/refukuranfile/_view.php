<?php
/* @var $this RefukuranfileController */
/* @var $data Refukuranfile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('refukuranfile_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->refukuranfile_id), array('view', 'id'=>$data->refukuranfile_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refukuranfile_width')); ?>:</b>
	<?php echo CHtml::encode($data->refukuranfile_width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refukuranfile_height')); ?>:</b>
	<?php echo CHtml::encode($data->refukuranfile_height); ?>
	<br />


</div>