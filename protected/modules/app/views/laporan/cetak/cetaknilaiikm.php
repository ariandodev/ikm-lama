<style type="text/css">
  table {
    border-collapse: collapse;
  }
  thead {
    background-color: #AFE4E2;
  }
</style>

  <h3 id="tahun1" align="center" class="page-title txt-color-blueDark">
    Nilai Kepuasan Masyarakat Per Jenis Izin<?php echo $bulan;?> <?php echo $tahun;?>
  </h3>


<table border="1" width="100%" cellspacing="5" cellpadding="5" align="center" class="tblikm">
  <thead>
    <tr>
      <th rowspan="2" data-class="expand"><div align="center">No</div></th>
      <th rowspan="2" data-hide="phone"><div align="center">Jenis Izin</div></th>
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
    <?php $total = $list['jan']+
                   $list['feb']+
                   $list['mar']+
                   $list['apr']+
                   $list['mei']+
                   $list['jun']+
                   $list['jul']+
                   $list['agt']+
                   $list['sep']+
                   $list['okt']+
                   $list['nov']+
                   $list['des'];
          $jml_kosong = array_count_values($list);
          //var_dump( array_keys($jml_kosong) ); die;
          //echo $jml_kosong["0.0000"];die();
            //print_r($jml_kosong);
            if(array_key_exists('0.0000', $jml_kosong)) {
              $jumlah_terisi = 12-$jml_kosong["0.0000"]; 
            } else {
              $jumlah_terisi = 12-$jml_kosong["0"]; 

            }
          if ($jumlah_terisi==0) {
            $jumlah_terisi = 12;
          }
          $ratarata = $total / ($jumlah_terisi);

    ?>
      <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $list['refjenisizinikm_nama'];?></td>
        <td><div align="right"><?php echo $list['jan']==0 ? "-" : number_format($list['jan'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['feb']==0 ? "-" : number_format($list['feb'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['mar']==0 ? "-" : number_format($list['mar'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['apr']==0 ? "-" : number_format($list['apr'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['mei']==0 ? "-" : number_format($list['mei'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['jun']==0 ? "-" : number_format($list['jun'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['jul']==0 ? "-" : number_format($list['jul'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['agt']==0 ? "-" : number_format($list['agt'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['sep']==0 ? "-" : number_format($list['sep'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['okt']==0 ? "-" : number_format($list['okt'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['nov']==0 ? "-" : number_format($list['nov'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $list['des']==0 ? "-" : number_format($list['des'],2,',','.');?></div></td>
        <td><div align="right"><?php echo $ratarata==0 ? "-" : number_format($ratarata,2,',','.');?></div></td>
      </tr>
    <?php endforeach ?>               
    </tbody>                                                                             
</table>

<p align="center">KETERANGAN :<br>
  Nilai Persepsi, Interval IKM, Mutu Pelayanan, & Kinerja Unit Pelayanan.</p>
  <center><table border="1" width="100%" class="tblikm">
  <thead>
    <tr>
      <th data-hide="phone,tablet"><div align="center">NILAI PERSEPSI</div></th>
      <th data-hide="phone,tablet"><div align="center">NILAI INTERVAL IKM</div></th>
      <th data-hide="phone,tablet"><div align="center">NILAI KONVERSI INTERVAL IKM</div></th>
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

<!-- <table width="100%" id="tbl-ttd" >
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
    margin-top: 20px;
    text-align: center;
    font-size: 15px;
  }
  #tertanda{
    margin-top: 50px;
  }
  table.tblikm tr {
    font-size: 12px;
  }
</style>