<?php //print_r($jawaban); ?>
<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<th width="10"><div align="center">No</div></th>
			<th width="128"><div align="center">Pertanyaan</div></th>
			<th width="45"><div align="center">Jawaban Responden</div></th>
			<th width="25"><div align="center">Jawaban </div></th>
		</tr>
	</thead>
	<tbody>
		
		<?php $no=1; foreach ($datapertanyaan as $a) :?>
		<tr class="odd gradeX">
			<td><?php $i = $no++; echo $i;?></td>
			<td><?php echo $a['tblpertanyaan_uraian'];?></td>
			<td><?php 
				switch($jawaban['tblhasilsurvei_pertanyaan'.$i]) {
					case 4 :
						$jawab = $a['tblpertanyaan_ketjawabanA'];
						break;
					case 3 :
						$jawab = $a['tblpertanyaan_ketjawabanB'];
						break;
					case 2 :
						$jawab = $a['tblpertanyaan_ketjawabanC'];
						break;
					case 1 :
						$jawab = $a['tblpertanyaan_ketjawabanD'];
						break;
				}
				echo $jawab;
			?></td>
			<td>

			<div class="col-md-12">
				<label id="bigs" class="btn btn-success"style="width: 240px; padding: 9px;">
				<div align="center">
				  <input <?php echo ($jawaban['tblhasilsurvei_pertanyaan'.$i]==4) ? ' checked="checked" ': ""; ?> onclick="simpan(<?php echo $id;?>,'tblhasilsurvei_pertanyaan<?php echo $i; ?>',4)" class="radiobox" name="nilai(<?php echo $a['tblpertanyaan_id'];?>" type="radio">
				  <span class="pull-left" style="margin-top: 7px;">A. <?php echo $a['tblpertanyaan_ketjawabanA'];?></span>
				</div>
				</label>
				
				<label id="bigs" class="btn btn-primary" style="width: 240px; padding: 9px;">
				<div align="center">
				  <input <?php echo ($jawaban['tblhasilsurvei_pertanyaan'.$i]==3) ? ' checked="checked" ': ""; ?> onclick="simpan(<?php echo $id;?>,'tblhasilsurvei_pertanyaan<?php echo $i; ?>',3)" class="radiobox" name="nilai(<?php echo $a['tblpertanyaan_id'];?>" type="radio">
				  <span class="pull-left" style="margin-top: 7px;">B. <?php echo $a['tblpertanyaan_ketjawabanB'];?></span>
				</div>
				</label>
				
				<label id="bigs" class="btn btn-warning" style="width: 240px; padding: 9px;">
				<div align="center">
				  <input <?php echo ($jawaban['tblhasilsurvei_pertanyaan'.$i]==2) ? ' checked="checked" ': ""; ?> onclick="simpan(<?php echo $id;?>,'tblhasilsurvei_pertanyaan<?php echo $i; ?>',2)" class="radiobox" name="nilai(<?php echo $a['tblpertanyaan_id'];?>" type="radio">
				  <span class="pull-left" style="margin-top: 7px;">C. <?php echo $a['tblpertanyaan_ketjawabanC'];?> </span>
				</div>
				</label>
				
				<label id="bigs" class="btn btn-danger"style="width: 240px; padding: 9px;">
				<div align="center">
				  <input <?php  echo ($jawaban['tblhasilsurvei_pertanyaan'.$i]==1) ? ' checked="checked" ': ""; ?> onclick="simpan(<?php echo $id;?>,'tblhasilsurvei_pertanyaan<?php echo $i; ?>',1)" class="radiobox" name="nilai(<?php echo $a['tblpertanyaan_id'];?>" type="radio">
				  <span class="pull-left" style="margin-top: 7px;">D. <?php echo $a['tblpertanyaan_ketjawabanD'];?> </span>
				</div>
				</label>
			</div>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<footer>
    <button class="btn btn-default btn-sm pull-right" type="button" onclick="batal()">
    <i class="fa  fa-ban ">&nbsp;</i>Batal
    </button>
</footer>
<script type="text/javascript">
	
	function batal () {
	$('#tabel').hide();
	
}
</script>



