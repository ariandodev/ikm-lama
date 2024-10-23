<style type="text/css">
  table {
    border-collapse: collapse;
  }
  thead {
    background-color: #AFE4E2;
  }
</style>
<center>
  <h3>Hasil Akhir Survei SKM Tahun <?php echo $tahun;?></h3>
  <h3><?php echo $izin['refjenisizinikm_nama'];?></h3>
</center>

<table class="tableikm" border="1" cellspacing="5" cellpadding="5" align="center" width="100%">
  <thead>  
    <tr>
      <th rowspan="2" data-class="expand"><div align="center">No</div></th>
      <th rowspan="2" data-hide="phone"><div align="center">Unsur Pelayanan </div></th>
      <th height="21" colspan="13"><div align="center">Bulan</div></th>
    </tr>
    <tr>    
      <th><div align="center">Jan</div></th>
      <th data-hide="phone,tablet"><div align="center">Feb</div></th>
      <th data-hide="phone,tablet"><div align="center">Mar</div></th>
      <th data-hide="phone,tablet"><div align="center">Apr</div></th>
      <th data-hide="phone,tablet"><div align="center">Mei</div></th>
      <th data-hide="phone,tablet"><div align="center">Jun</div></th>
      <th data-hide="phone,tablet"><div align="center">Jul</div></th>
      <th data-hide="phone,tablet"><div align="center">Ags</div></th>
      <th data-hide="phone,tablet"><div align="center">Sep</div></th>
      <th data-hide="phone,tablet"><div align="center">Okt</div></th>
      <th data-hide="phone,tablet"><div align="center">Nov</div></th>
      <th data-hide="phone,tablet"><div align="center">Des</div></th>
      <th data-hide="phone,tablet"><div align="center">Rata-Rata</div></th>
    </tr>
  </thead>

  <tbody>
    <?php $no=1; foreach ($nilai as $list): ?>
    <?php $total = $list['bulan_1']+
      $list['bulan_2']+
      $list['bulan_3']+
      $list['bulan_4']+
      $list['bulan_5']+
      $list['bulan_6']+
      $list['bulan_7']+
      $list['bulan_8']+
      $list['bulan_9']+
      $list['bulan_10']+
      $list['bulan_11']+
      $list['bulan_12'];
      
		$jml_kosong = array_count_values($list);

	   $jumlah_terisia = 12-$jml_kosong["0.0000"];
      $jumlah_terisib = 12-$jml_kosong["0"];

      if ($jumlah_terisia>0) {
        $jumlah_terisi = $jumlah_terisia;
      }else{
        $jumlah_terisi = $jumlah_terisib;
      }

      if ($jumlah_terisi==0) {
        $jumlah_terisi = 12;
      }
      $ratarata = $total / ($jumlah_terisi);
   //print_r($jml_kosong);
    ?>
      <tr>
        <td><div align="center"><?php echo $no++;?></div></td>
        <td><?php echo $list['tblpertanyaan_point'];?></td>
        <td><?php echo $list['bulan_1']==0 ? "-" : number_format($list['bulan_1'],2,',','.');?></td>
        <td><?php echo $list['bulan_2']==0 ? "-" : number_format($list['bulan_2'],2,',','.');?></td>
        <td><?php echo $list['bulan_3']==0 ? "-" : number_format($list['bulan_3'],2,',','.');?></td>
        <td><?php echo $list['bulan_4']==0 ? "-" : number_format($list['bulan_4'],2,',','.');?></td>
        <td><?php echo $list['bulan_5']==0 ? "-" : number_format($list['bulan_5'],2,',','.');?></td>
        <td><?php echo $list['bulan_6']==0 ? "-" : number_format($list['bulan_6'],2,',','.');?></td>
        <td><?php echo $list['bulan_7']==0 ? "-" : number_format($list['bulan_7'],2,',','.');?></td>
        <td><?php echo $list['bulan_8']==0 ? "-" : number_format($list['bulan_8'],2,',','.');?></td>
        <td><?php echo $list['bulan_9']==0 ? "-" : number_format($list['bulan_9'],2,',','.');?></td>
        <td><?php echo $list['bulan_10']==0 ? "-" : number_format($list['bulan_10'],2,',','.');?></td>
        <td><?php echo $list['bulan_11']==0 ? "-" : number_format($list['bulan_11'],2,',','.');?></td>
        <td><?php echo $list['bulan_12']==0 ? "-" : number_format($list['bulan_12'],2,',','.');?></td>
        <td><?php echo number_format($ratarata,2,',','.');?></td>
      </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="15">&nbsp;</td>
      </tr>
    </tfoot>
      <tfoot>
      <tr>
        <td colspan="2"><div align="center">Nilai Indeks Unit Pelayanan</div></td>
        <td><?php echo $list['tertimbang_1']==0 ? "-" : number_format($list['tertimbang_1'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_2']==0 ? "-" : number_format($list['tertimbang_2'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_3']==0 ? "-" : number_format($list['tertimbang_3'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_4']==0 ? "-" : number_format($list['tertimbang_4'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_5']==0 ? "-" : number_format($list['tertimbang_5'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_6']==0 ? "-" : number_format($list['tertimbang_6'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_7']==0 ? "-" : number_format($list['tertimbang_7'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_8']==0 ? "-" : number_format($list['tertimbang_8'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_9']==0 ? "-" : number_format($list['tertimbang_9'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_10']==0 ? "-" : number_format($list['tertimbang_10'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_11']==0 ? "-" : number_format($list['tertimbang_11'],2,',','.');?></td>
        <td><?php echo $list['tertimbang_12']==0 ? "-" : number_format($list['tertimbang_12'],2,',','.');?></td>
        <td>&nbsp;</td>
      </tr>
    </tfoot>

    <tfoot>
      <tr>
        <td colspan="2"><div align="center">Nilai SKM</div></td>
          <td><?php echo $list['ikm_1']==0 ? "-" : number_format($list['ikm_1'],2,',','.');?></td>
          <td><?php echo $list['ikm_2']==0 ? "-" : number_format($list['ikm_2'],2,',','.');?></td>
          <td><?php echo $list['ikm_3']==0 ? "-" : number_format($list['ikm_3'],2,',','.');?></td>
          <td><?php echo $list['ikm_4']==0 ? "-" : number_format($list['ikm_4'],2,',','.');?></td>
          <td><?php echo $list['ikm_5']==0 ? "-" : number_format($list['ikm_5'],2,',','.');?></td>
          <td><?php echo $list['ikm_6']==0 ? "-" : number_format($list['ikm_6'],2,',','.');?></td>
          <td><?php echo $list['ikm_7']==0 ? "-" : number_format($list['ikm_7'],2,',','.');?></td>
          <td><?php echo $list['ikm_8']==0 ? "-" : number_format($list['ikm_8'],2,',','.');?></td>
          <td><?php echo $list['ikm_9']==0 ? "-" : number_format($list['ikm_9'],2,',','.');?></td>
          <td><?php echo $list['ikm_10']==0 ? "-" : number_format($list['ikm_10'],2,',','.');?></td>
          <td><?php echo $list['ikm_11']==0 ? "-" : number_format($list['ikm_11'],2,',','.');?></td>
          <td><?php echo $list['ikm_12']==0 ? "-" : number_format($list['ikm_12'],2,',','.');?></td>
          <td>&nbsp;</td>
      </tr>
    </tfoot>

    <tfoot>
      <tr>
        <td colspan="2"><div align="center">Jumlah rata-rata responden </div></td>
        <td><?php echo $list['responden_1']==0 ? "-" : number_format($list['responden_1'],2,',','.');?></td>
        <td><?php echo $list['responden_2']==0 ? "-" : number_format($list['responden_2'],2,',','.');?></td>
        <td><?php echo $list['responden_3']==0 ? "-" : number_format($list['responden_3'],2,',','.');?></td>
        <td><?php echo $list['responden_4']==0 ? "-" : number_format($list['responden_4'],2,',','.');?></td>
        <td><?php echo $list['responden_5']==0 ? "-" : number_format($list['responden_5'],2,',','.');?></td>
        <td><?php echo $list['responden_6']==0 ? "-" : number_format($list['responden_6'],2,',','.');?></td>
        <td><?php echo $list['responden_7']==0 ? "-" : number_format($list['responden_7'],2,',','.');?></td>
        <td><?php echo $list['responden_8']==0 ? "-" : number_format($list['responden_8'],2,',','.');?></td>
        <td><?php echo $list['responden_9']==0 ? "-" : number_format($list['responden_9'],2,',','.');?></td>
        <td><?php echo $list['responden_10']==0 ? "-" : number_format($list['responden_10'],2,',','.');?></td>
        <td><?php echo $list['responden_11']==0 ? "-" : number_format($list['responden_11'],2,',','.');?></td>
        <td><?php echo $list['responden_12']==0 ? "-" : number_format($list['responden_12'],2,',','.');?></td>
        <td>&nbsp;</td>
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
</table> -->

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