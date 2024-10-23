<?php
/* @var $this TblizinController */
/* @var $data Tblizin */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblizin_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tblizin_id), array('view', 'id'=>$data->tblizin_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblizin_nama')); ?>:</b>
	<?php echo CHtml::encode($data->tblizin_nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblizin_lama')); ?>:</b>
	<?php echo CHtml::encode($data->tblizin_lama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblizin_icon')); ?>:</b>
	<?php echo CHtml::encode($data->tblizin_icon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblizin_adaretribusi')); ?>:</b>
	<?php echo CHtml::encode($data->tblizin_adaretribusi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblizin_terstruktur')); ?>:</b>
	<?php echo CHtml::encode($data->tblizin_terstruktur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblizin_isaktif')); ?>:</b>
	<?php echo CHtml::encode($data->tblizin_isaktif); ?>
	<br />


</div>