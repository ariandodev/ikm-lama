<style type="text/css">
  table {
    border-collapse: collapse;
    font-size: 15px;
  }
  thead {
    background-color: #AFE4E2;
  }
</style>

    
      <h3 id="tahun1" align="center" class="page-title txt-color-blueDark"  style="margin: 10px;">
         Saran Negatif Responden IKM Terhadap Pelayanan Kepegawaian <?php echo $bulan;?> <?php echo date("Y"); ?>
      </h3>    

    
      <h3 id="tahun1" align="center" class="page-title txt-color-blueDark"  style="margin: 10px;">
        <?php echo $izin['refjenisizinikm_nama'];?>
      </h3>
    

<table border="1" cellspacing="5" cellpadding="5" align="center" width="100%" class="tblikm">
  <thead>
    <tr>
      <th width="30"><div align="center">No</div></th>
      <th><div align="center">Saran</div></th>
    </tr>
  </thead>

  <tbody>
    <?php $no=1; foreach ($negatif as $data) : ?>
    <tr>
      <td align="center"><?php echo $no++; ?></td>
      <td><div align="left"><?php echo $data['tblhasilsurvei_saran'];?></div></td>
    </tr>
  <?php endforeach ?>
</tbody>
</table>

<!-- <table width="100%" id="tbl-ttd">
  <tr>
    <td>
      <div id="ttd_pihak_1">

        <div id="mengetahui">
          <p>Mengetahui</p>
          <p>Ka. Bid Regulasi & Pengembangan Kinerja</p>
        </div>

        <div id="tertanda">
          <u>Gatot Sudarmono, SH</u><br>
          NIP. 196809081996031002
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
          <u>Darsana, SH</u><br>
          NIP. 196501141986121001
        </div>
      </div>
    </td>    
  </tr>
</table> -->

<style type="text/css">
  #tbl-ttd{
    margin-top: 50px;
    text-align: center;
  }
  #tertanda{
    margin-top: 100px;
  }

</style>