<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
  



<div>
    <div class="well" style="padding: 1px;">
      <h1 id="tahun1" align="center" class="page-title txt-color-blueDark">
        Nilai Kepuasan Masyarakat Per Jenis Izin <?php echo $bulan; ?> <?php echo $tahun; ?>
      </h1>
    </div>

<!-- widget grid -->
      <section id="widget-grid" class="" >

        <!-- row -->
        <div class="row" >

          <!-- NEW WIDGET START -->
          <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-1" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
              
                <header>
                  <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                  <h2>Data Nilai Kepuasan Masyarakat Per Jenis Izin
                  </h2>
                </header>
              <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                  <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding" >

                  <div class="widget-body-toolbar">
                    <button class="btn btn-warning" onclick="cetak('html')"><i class="fa fa-print"></i> Cetak</button>
                  </div>
                  
                  <table id="dt_basic"  class="table table-striped table-bordered table-hover" width="100%">
                          <thead>
                            <tr>
                              <th rowspan="2" data-class="expand"><div align="center">No</div></th>
                              <th rowspan="2" data-hide="phone"><div align="center">Jenis Pelayanan </div></th>
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
                </div>
                <!-- end widget content -->

              </div>
              <!-- end widget div -->

            </div>
            <!-- end widget -->
          </article>
        </div>
      </section>
</div>

<div class="row">
  <div class="widget-body no-padding" >
  <p align="center">KETERANGAN :<br>
  Nilai Persepsi, Interval IKM, Mutu Pelayanan, & Kinerja Unit Pelayanan.</p>
  <table align="center" class="table table-striped table-bordered table-hover" width="50%">
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
  </table>
  </div>
</div>

<script type="text/javascript">
  
  var pagefunction = function() {

    /* BASIC ;*/
      var responsiveHelper_dt_basic = undefined;
      var responsiveHelper_datatable_fixed_column = undefined;
      var responsiveHelper_datatable_col_reorder = undefined;
      var responsiveHelper_datatable_tabletools = undefined;
      
      var breakpointDefinition = {
        tablet : 1024,
        phone : 480
      };

      $('#dt_basic').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

    /* END BASIC */
        

  };

  // load related plugins
    
    loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
        loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
            loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
                loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
                    loadScript("<?php echo ASSETS_URL; ?>/ajs/datatable-responsive/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });

  function cetak (tipe) {
    var tahun=$("#tahun").val();
    var bulan=$("#bulan").val();
    window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/laporan/CetakNilaiIkm?tipe='+tipe+"&tahun="+tahun+"&bulan="+bulan);
  }

  
</script>

