<?php
/* @var $this RefstatuspengaduanController */
/* @var $data Refstatuspengaduan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('refstatuspengaduan_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->refstatuspengaduan_id), array('view', 'id'=>$data->refstatuspengaduan_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refstatuspengaduan_keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->refstatuspengaduan_keterangan); ?>
	<br />


</div>