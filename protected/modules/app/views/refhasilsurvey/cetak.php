<center>
	<h3>
		Saran Responden
	</h3>
</center>
<table width="100%" cellpadding="1" cellspacing="1" style="border-collapse:collapse;" border="1">
	<thead>
		<tr>
			<th width="1%"><div align="center">No</div></th>
			<th width="20%"><div align="center">Saran</div></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($data['saran'] as $saran) : ?>
		<tr>
			<td align="center"><?php echo $no++;?></td>
			<td><?php echo $saran['tblhasilsurvei_saran'];?></td>
		</tr>
	<?php endforeach ?>

</tbody>
</table>