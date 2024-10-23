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
    Laporan Grafik Nilai Index Kepuasan Masyarakat Tahun <?php echo date('Y'); ?>
  </h1><br>
  <h3 align="center">
	<?php echo $izin['refjenisizinikm_nama']; ?>
  </h3>
</div>

<table border="1" cellspacing="5" cellpadding="5" align="center" width="500">
    <thead>
        <tr>
            <th data-class="expand">No</th>
            <th data-hide="tablet">Bulan</th>
            <th data-hide="tablet, phone">Jumlah</th>
        </tr>
    </thead>
    <tbody id="tabel-total">
        <tr>
            <td>1</td>
            <td>Januari</td>
            <td><?php echo $chart_rekap['jan']; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Februari</td>
            <td><?php echo $chart_rekap['feb'];?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Maret</td>
            <td><?php echo $chart_rekap['mar'];?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>April</td>
            <td><?php echo $chart_rekap['apr'];?></td>
        </tr>
        <tr>
            <td>5</td>
            <td>Mei</td>
            <td><?php echo $chart_rekap['mei'];?></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Juni</td>
            <td><?php echo $chart_rekap['jun'];?></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Juli</td>
            <td><?php echo $chart_rekap['jul'];?></td>
        </tr>
        <tr>
            <td>8</td>
            <td>Agustus</td>
            <td><?php echo $chart_rekap['agt'];?></td>
        </tr>
        <tr>
            <td>9</td>
            <td>September</td>
            <td><?php echo $chart_rekap['sep'];?></td>
        </tr>
        <tr>
            <td>10</td>
            <td>Oktober</td>
            <td><?php echo $chart_rekap['okt'];?></td>
        </tr>
        <tr>
            <td>11</td>
            <td>November</td>
            <td><?php echo $chart_rekap ['nov'];?></td>
        </tr>
        <tr>
            <td>12</td>
            <td>Desember</td>
            <td><?php echo $chart_rekap ['des'];?></td>
        </tr>

    </tbody>
    <tfoot>
     <tr>
        <td colspan="2">Total</td>
        <?php
            $total = 0;
            $total = $chart_rekap['jan']+
                     $chart_rekap['feb']+
                     $chart_rekap['mar']+
                     $chart_rekap['apr']+
                     $chart_rekap['mei']+
                     $chart_rekap['jun']+
                     $chart_rekap['jul']+
                     $chart_rekap['agt']+
                     $chart_rekap['sep']+
                     $chart_rekap['okt']+
                     $chart_rekap['nov']+
                     $chart_rekap['des'];
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