<?php
/* @var $this RefstatustindaklanjutController */
/* @var $data Refstatustindaklanjut */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('refstatustindaklanjut_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->refstatustindaklanjut_id), array('view', 'id'=>$data->refstatustindaklanjut_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refstatustindaklanjut_jenis')); ?>:</b>
	<?php echo CHtml::encode($data->refstatustindaklanjut_jenis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refstatustindaklanjut_jenisuraian')); ?>:</b>
	<?php echo CHtml::encode($data->refstatustindaklanjut_jenisuraian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refstatustindaklanjut_keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->refstatustindaklanjut_keterangan); ?>
	<br />


</div>