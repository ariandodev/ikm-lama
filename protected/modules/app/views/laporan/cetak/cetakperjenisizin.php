<style type="text/css">
  table {
    border-collapse: collapse;
  }
  thead {
    background-color: #AFE4E2;
  }
</style>

    <div class="well" style="padding: 0px;">
      <h3 id="judul" align="center" class="page-title txt-color-blueDark">
        Hasil Akhir Survei SKM Per Jenis Pelayanan Tahun <?php echo $tahun;?></h1>
      </h3>
    </div>

    <div class="well" style="padding: 0px; margin-left: 80px">
    <table>
    	<tr>
        	<td>Jenis Pelayanan</td><td>&nbsp;&nbsp;&nbsp;</td>
        	<td>:</td></td><td>&nbsp;&nbsp;&nbsp;</td>
        	<td><?php echo $getizin['refjenisizinikm_nama'];?></td>
        </tr>
        <tr>
        	<td>Bulan</td><td>&nbsp;&nbsp;&nbsp;</td>
        	<td>:</td></td><td>&nbsp;&nbsp;&nbsp;</td>
        	<td><?php echo $bulan;?></td>
        </tr>
    </table>
    </div>

<table class="tableikm" border="1" cellspacing="5" cellpadding="5" align="center" width="100%">
	<thead>
		<tr>
			<th width="20%" rowspan="2"><div align="center">NOMOR URUT RESPONDEN</div></th>
			<th height="21" colspan="15"><div align="center">NILAI PER UNSUR PELAYANAN</div></th>
		</tr>
		<tr>    
			<th><div align="center">U 1</div></th>
			<th data-hide="phone,tablet"><div align="center">U 2 </div></th>
			<th data-hide="phone,tablet"><div align="center">U 3 </div></th>
			<th data-hide="phone,tablet"><div align="center">U 4 </div></th>
			<th data-hide="phone,tablet"><div align="center">U 5 </div></th>
			<th data-hide="phone,tablet"><div align="center">U 6 </div></th>
			<th data-hide="phone,tablet"><div align="center">U 7 </div></th>
			<th data-hide="phone,tablet"><div align="center">U 8 </div></th>
			<th data-hide="phone,tablet"><div align="center">U 9 </div></th>
			<th data-hide="phone,tablet"><div align="center">U 10 </div></th>
			<th data-hide="phone,tablet">Hasil Akhir</th>
		</tr>
	</thead>

	<tbody>
      <?php $no=1; foreach ($nilai as $laporan_a) : ?>
        <tr>
          <td width="20"><div align="center"><?php echo $no++;?></div></td>
          
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan1']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan1'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan2']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan2'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan3']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan3'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan4']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan4'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan5']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan5'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan6']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan6'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan7']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan7'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan8']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan8'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan9']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan9'];?></div></td>
          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan10']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan10'];?></div></td>
          <td>&nbsp;</td>
        </tr>
      <?php endforeach ?> 
    </tbody>

   <tfoot>
      <tr>
        <td colspan="11">SKM Unit Pelayanan</td>
        <td><?php echo $hasilakhir['hasilakhir']==0 ? "-" : number_format($hasilakhir['hasilakhir'],2,',','.');?></td>
      </tr>
    </tfoot>

     <tfoot>
        <tr>
          <td height="28" colspan="1"><div align="left">Jumlah Nilai per Unsur</div></td>
        <?php foreach ($jumlah as $jumlah_a) : ?>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan1']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan1'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan2']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan2'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan3']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan3'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan4']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan4'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan5']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan5'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan6']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan6'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan7']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan7'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan8']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan8'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan9']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan9'];?></div></td>
          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan10']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan10'];?></div></td>
          <td>&nbsp;</td>
      	<?php endforeach ?>
        </tr>
     </tfoot>

  

     <tfoot>
        <tr>
          <td colspan="1"><div align="left">NRR per Unsur = Jumlah nilai per unsur : Jumlah kuesioner yang terisi</div></td>
          <?php foreach ($nrr as $nrr_a) : ?>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan1']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan1'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan2']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan2'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan3']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan3'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan4']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan4'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan5']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan5'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan6']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan6'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan7']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan7'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan8']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan8'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan9']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan9'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan10']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan10'],2,',','.');?></div></td>
          <td></td>
      <?php endforeach ?>
        </tr>
     </tfoot>

     <tfoot>
        <tr>
          <td colspan="1"><div align="left">NRR tertimbang per unsur = NRR per unsur x 0.1</div></td>
          <?php foreach ($nrrtertimbang as $tertimbang) : ?>
			<?php 
     		$totaltertimbang = 0;
     		$total = 0;
     		$totaltertimbang = $tertimbang['tblhasilsurvei_pertanyaan1']+
     						   $tertimbang['tblhasilsurvei_pertanyaan2']+
     						   $tertimbang['tblhasilsurvei_pertanyaan3']+
     						   $tertimbang['tblhasilsurvei_pertanyaan4']+
     						   $tertimbang['tblhasilsurvei_pertanyaan5']+
     						   $tertimbang['tblhasilsurvei_pertanyaan6']+
     						   $tertimbang['tblhasilsurvei_pertanyaan7']+
     						   $tertimbang['tblhasilsurvei_pertanyaan8']+
     						   $tertimbang['tblhasilsurvei_pertanyaan9']+
     						   $tertimbang['tblhasilsurvei_pertanyaan10'];

     		?>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan1']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan1'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan2']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan2'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan3']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan3'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan4']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan4'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan5']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan5'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan6']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan6'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan7']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan7'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan8']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan8'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan9']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan9'],2,',','.');?></div></td>
          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan10']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan10'],2,',','.');?></div></td>
          <td><?php echo $totaltertimbang==0 ? "-" : number_format($totaltertimbang,2,',','.'); ?></td>
      <?php endforeach ?>
        </tr>
      </tfoot>

</table>
<p align="center">KETERANGAN :<br>
	Nilai Persepsi, Interval SKM, Mutu Pelayanan, & Kinerja Unit Pelayanan.</p>
	<center><table class="tableikm" border="1" width="100%">
	<thead>
		<tr>
			<th data-hide="phone,tablet"><div align="center">NILAI PERSEPSI</div></th>
			<th data-hide="phone,tablet"><div align="center">NILAI INTERVAL SKM</div></th>
			<th data-hide="phone,tablet"><div align="center">NILAI KONVERSI INTERVAL SKM</div></th>
			<th data-hide="phone,tablet"><div align="center">PELAYANAN MUTU</div></th>
			<th data-hide="phone,tablet"><div align="center">KINERJA UNIT PELAYANAN</div></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-hide="phone,tablet"><div align="center">1</div></td>
			<td data-hide="phone,tablet"><div align="center">1.00 - 1.75</div></td>
			<td data-hide="phone,tablet"><div align="center">25 - 43.75</div></td>
			<td data-hide="phone,tablet"><div align="center">D</div></td>
			<td data-hide="phone,tablet"><div align="center">Tidak Baik</div></td>
		</tr>
		<tr>
			<td data-hide="phone,tablet"><div align="center">2</div></td>
			<td data-hide="phone,tablet"><div align="center">1.76 - 2.50</div></td>
			<td data-hide="phone,tablet"><div align="center">43.75 - 62.50</div></td>
			<td data-hide="phone,tablet"><div align="center">C</div></td>
			<td data-hide="phone,tablet"><div align="center">Kurang Baik</div></td>
		</tr>
		<tr>
			<td data-hide="phone,tablet"><div align="center">3</div></td>
			<td data-hide="phone,tablet"><div align="center">2.51 - 3.25</div></td>
			<td data-hide="phone,tablet"><div align="center">62.51 - 81.25</div></td>
			<td data-hide="phone,tablet"><div align="center">B</div></td>
			<td data-hide="phone,tablet"><div align="center">Baik</div></td>
		</tr>
		<tr>
			<td data-hide="phone,tablet"><div align="center">4</div></td>
			<td data-hide="phone,tablet"><div align="center">3.26 - 4.00</div></td>
			<td data-hide="phone,tablet"><div align="center">81.26 - 100.00</div></td>
			<td data-hide="phone,tablet"><div align="center">A</div></td>
			<td data-hide="phone,tablet"><div align="center">Sangat Baik</div></td>
		</tr>
	</tbody>
	</table></center>

<!-- <table width="100%" id="tbl-ttd">
  <tr>
    <td>
      <div id="ttd_pihak_1">

        <div id="mengetahui">
          <p>Mengetahui</p>
          <p>Ka. Bid Regulasi & Pengembangan Kinerja</p>
        </div>

        <div id="tertanda">
          <u>Gatot Sudarmono, SH</u>
          <br>NIP. 196809081996031002
        </div>
      </div>
    </td>
    <td>
      <div id="ttd_pihak_2">
        <div id="mengetahui">
          <p>Mengetahui</p>
          <p>Ka. Sie Pengembangan Kinerja</p>
        </div>

        <div id="tertanda">
          <u>Darsana, SH</u>
          <br>NIP. 196501141986121001
        </div>
      </div>
    </td>    
  </tr>
</table>
 -->
<style type="text/css">
  #tbl-ttd{
    margin-top: 50px;
    text-align: center;
  }
  #tertanda{
    margin-top: 100px;
  }
  table.tableikm tr {
  	font-size: 12px;
  }
</style>