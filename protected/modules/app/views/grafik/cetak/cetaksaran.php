<style type="text/css">
  table {
    border-collapse: collapse;
  }
  thead {
    background-color: #AFE4E2;
  }
</style>

<div class="well" style="padding: 1px;">
  <h1 id="tahun1" align="center" class="page-title txt-color-blueDark">
    Laporan Grafik Saran Tahun <?php echo date('Y'); ?>
  </h1>
</div>
<table border="1" cellspacing="5" cellpadding="5" align="center" width="500">
	<thead>
		<tr>
			<th data-class="expand">No</th>
			<th data-hide="tablet">Jenis Saran</th>
			<th data-hide="tablet, phone">Jumlah</th>
		</tr>
	</thead>

	<tbody id="tabelsaran">
		<tr>
			<td>1</td>
			<td>Positif</td>
			<td><?php echo $chart_rekap['positif'];?></td>
		</tr>

		<tr>
			<td>2</td>
			<td>Negatif</td>
			<td><?php echo $chart_rekap['negatif'];?></td>
		</tr>
		<tr>
			<td>3</td>
			<td>Abstain</td>
			<td><?php echo $chart_rekap['abstrak'];?></td>
		</tr>
	</tbody>

	<tfoot>
		<tr>
			<td colspan="2">Total</td>
			<?php $total = 0; ?>
			<?php $total = $chart_rekap['positif']+
						   $chart_rekap['negatif']+
						   $chart_rekap['abstrak'];
			?>	
			
			<td><?php echo $total;?></td>
		</tr>
	</tfoot>
</table>

<table width="100%" id="tbl-ttd" style="display:none;">
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

<style type="text/css">
  #tbl-ttd{
    margin-top: 30px;
    text-align: center;
  }
  #tertanda{
    margin-top: 70px;
  }
</style>
