<style type="text/css">
  table {
    border-collapse: collapse;
  }
  thead {
    background-color: #AFE4E2;
  }
</style>

  <div class="well" style="padding: 0px;">
    <h3 id="tahun1" align="center" class="page-title txt-color-blueDark">
      Hasil Akhir Survey Kepuasan Masyarakat <?php echo $bulan;?> <?php echo $tahun;?>
    </h3>
  </div>

<table border="1" cellspacing="5" cellpadding="5" align="center" width="100%">
  <thead>
    <tr>
      <th rowspan="2" data-class="expand"><div align="center">No</div></th>
      <th rowspan="2" data-hide="phone"><div align="center">Jenis Pelayanan </div></th>
      <th height="21" colspan="13"><div align="center">Bulan</div></th>
    </tr>
    <tr>    <th><div align="center">Jan</div></th>
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
                      <?php $total = array();
                        $total['jan'] = 0;
                        $total['feb'] = 0;
                        $total['mar'] = 0;
                        $total['apr'] = 0;
                        $total['mei'] = 0;
                        $total['jun'] = 0;
                        $total['jul'] = 0;
                        $total['agt'] = 0;
                        $total['sep'] = 0;
                        $total['okt'] = 0;
                        $total['nov'] = 0;
                        $total['des'] = 0;

                       ?>
                      <?php $no=1; foreach ($nilai as $list): ?>
                      <?php 
                                  $a = $list['jan']+
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
                                  $jumlah_terisi = 12-$jml_kosong[0];
                                  if ($jumlah_terisi==0) {
                                    $jumlah_terisi = 12;
                                  }
                                  $ratarata = $a / ($jumlah_terisi);
                        ?>
                        <tr>
                          <td><?php echo $no++;?></td>
                          <td><?php echo $list['refjenisizinikm_nama'];?></td>
                          <td><div align="right"><?php $total['jan']+=$list['jan']; echo $list['jan']==0 ? "-" : $list['jan'];?></div></td>
                          <td><div align="right"><?php $total['feb']+=$list['feb']; echo $list['feb']==0 ? "-" : $list['feb'];?></div></td>
                          <td><div align="right"><?php $total['mar']+=$list['mar']; echo $list['mar']==0 ? "-" : $list['mar'];?></div></td>
                          <td><div align="right"><?php $total['apr']+=$list['apr']; echo $list['apr']==0 ? "-" : $list['apr'];?></div></td>
                          <td><div align="right"><?php $total['mei']+=$list['mei']; echo $list['mei']==0 ? "-" : $list['mei'];?></div></td>
                          <td><div align="right"><?php $total['jun']+=$list['jun']; echo $list['jun']==0 ? "-" : $list['jun'];?></div></td>
                          <td><div align="right"><?php $total['jul']+=$list['jul']; echo $list['jul']==0 ? "-" : $list['jul'];?></div></td>
                          <td><div align="right"><?php $total['agt']+=$list['agt']; echo $list['agt']==0 ? "-" : $list['agt'];?></div></td>
                          <td><div align="right"><?php $total['sep']+=$list['sep']; echo $list['sep']==0 ? "-" : $list['sep'];?></div></td>
                          <td><div align="right"><?php $total['okt']+=$list['okt']; echo $list['okt']==0 ? "-" : $list['okt'];?></div></td>
                          <td><div align="right"><?php $total['nov']+=$list['nov']; echo $list['nov']==0 ? "-" : $list['nov'];?></div></td>
                          <td><div align="right"><?php $total['des']+=$list['des']; echo $list['des']==0 ? "-" : $list['des'];?></div></td>
                          <td><div align="right"><?php echo $ratarata==0 ? "-" : number_format($ratarata,2,',','.');?></div></td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2"><div align="center">Jumlah Responden </div></td>
                          <td><div align="right"><?php echo $total['jan']==0 ? "-" : $total['jan']; ?></div></td>
                          <td><div align="right"><?php echo $total['feb']==0 ? "-" : $total['feb']; ?></div></td>
                          <td><div align="right"><?php echo $total['mar']==0 ? "-" : $total['mar']; ?></div></td>
                          <td><div align="right"><?php echo $total['apr']==0 ? "-" : $total['apr']; ?></div></td>
                          <td><div align="right"><?php echo $total['mei']==0 ? "-" : $total['mei']; ?></div></td>
                          <td><div align="right"><?php echo $total['jun']==0 ? "-" : $total['jun']; ?></div></td>
                          <td><div align="right"><?php echo $total['jul']==0 ? "-" : $total['jul']; ?></div></td>
                          <td><div align="right"><?php echo $total['agt']==0 ? "-" : $total['agt']; ?></div></td>
                          <td><div align="right"><?php echo $total['sep']==0 ? "-" : $total['sep']; ?></div></td>
                          <td><div align="right"><?php echo $total['okt']==0 ? "-" : $total['okt']; ?></div></td>
                          <td><div align="right"><?php echo $total['nov']==0 ? "-" : $total['nov']; ?></div></td>
                          <td><div align="right"><?php echo $total['des']==0 ? "-" : $total['des']; ?></div></td>
                          <?php
                            $jmltotal = 0;
                            $jmltotal = $total['jan']+
                                        $total['feb']+
                                        $total['mar']+
                                        $total['apr']+
                                        $total['mei']+
                                        $total['jun']+
                                        $total['jul']+
                                        $total['agt']+
                                        $total['sep']+
                                        $total['okt']+
                                        $total['nov']+
                                        $total['des'];
                          ?>
                      <td><div align="right"><?php echo $jmltotal;?></div></td>
                    </tr>
                  </tfoot>
</table>

<p align="center">KETERANGAN :<br>
  Nilai Persepsi, Interval SKM, Mutu Pelayanan, & Kinerja Unit Pelayanan.</p>
  <center><table border="1" width="100%">
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
</style>