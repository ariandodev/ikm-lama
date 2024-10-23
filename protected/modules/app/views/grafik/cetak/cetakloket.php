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
    Laporan Grafik Loket Tahun <?php echo date('Y'); ?>
  </h1>
</div>
<table border="1" cellspacing="5" cellpadding="5" align="center" width="500">
    <thead>
        <tr>
            <th data-class="expand">No</th>
            <th data-hide="tablet">LOKET</th>
            <th data-hide="tablet, phone">Jumlah</th>
        </tr>
    </thead>
    <tbody id="tabel_loket">
    <?php $i=1; foreach ($getloket as $list) : ?>
        <tr>
            <td align="center"><?php echo $i++; ?></td>
            <td><?php echo $list['refloket_nama']; ?></td>
            <td align="right"><?php echo $list['jumlah']; ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
       <tr>
        <td colspan="2">Total</td>
        <?php $total = 0; ?>
        <?php 
        foreach ($getloket as $list) {
            $total += $list['jumlah'];
            }
        ?>
        <td align="right"><?php echo $total; ?></td>
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