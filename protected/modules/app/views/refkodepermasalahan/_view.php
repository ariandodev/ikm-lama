<?php
/* @var $this RefkodepermasalahanController */
/* @var $data Refkodepermasalahan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('refkodepermasalahan_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->refkodepermasalahan_id), array('view', 'id'=>$data->refkodepermasalahan_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refkodepermasalahan_keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->refkodepermasalahan_keterangan); ?>
	<br />


</div>