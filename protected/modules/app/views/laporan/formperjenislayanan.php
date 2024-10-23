<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
  
<div>
    <div class="well" style="padding: 1px;">
      <h1 id="tahun1" align="center" class="page-title txt-color-blueDark">
        Jumlah Responden Per Jenis Pelayanan  <?php echo $bulan;?> <?php echo $tahun;?>
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
                  <h2>Data Responden Per Jenis Pelayanan
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
                              <?php 
                              $jumlah_jan=""; 
                              $jumlah_feb=""; 
                              $jumlah_mar=""; 
                              $jumlah_apr=""; 
                              $jumlah_mei=""; 
                              $jumlah_jun=""; 
                              $jumlah_jul=""; 
                              $jumlah_agu=""; 
                              $jumlah_sep=""; 
                              $jumlah_okt=""; 
                              $jumlah_nov=""; 
                              $jumlah_des="";
                              $jumlah_rata=0;
                              $total=0;
                              $total_rata=0; 

                              $no=1; foreach ($nilai as $list): ?>
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
                                  $jumlah_terisi = 12-$jml_kosong["0"];
                                  if ($jumlah_terisi==0) {
                                    $jumlah_terisi = 12;
                                  }
                                  $ratarata = $total / ($jumlah_terisi);

                                            $jumlah_jan += $list['jan'];
                                            $jumlah_feb += $list['feb'];
                                            $jumlah_mar += $list['mar'];
                                            $jumlah_apr += $list['apr'];
                                            $jumlah_mei += $list['mei'];
                                            $jumlah_jun += $list['jun'];
                                            $jumlah_jul += $list['jul'];
                                            $jumlah_agu += $list['agt'];
                                            $jumlah_sep += $list['sep'];
                                            $jumlah_okt += $list['okt'];
                                            $jumlah_nov += $list['nov'];
                                            $jumlah_des += $list['des'];
                                            $jumlah_rata += $total;
                                            $total_rata += $ratarata;
                              ?>                       
                              <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $list['refjenisizinikm_nama'];?></td>
                                <td><div align="right"><?php echo $list['jan']==0 ? "-" : $list['jan'];?></div></td>
                                <td><div align="right"><?php echo $list['feb']==0 ? "-" : $list['feb'];?></div></td>
                                <td><div align="right"><?php echo $list['mar']==0 ? "-" : $list['mar'];?></div></td>
                                <td><div align="right"><?php echo $list['apr']==0 ? "-" : $list['apr'];?></div></td>
                                <td><div align="right"><?php echo $list['mei']==0 ? "-" : $list['mei'];?></div></td>
                                <td><div align="right"><?php echo $list['jun']==0 ? "-" : $list['jun'];?></div></td>
                                <td><div align="right"><?php echo $list['jul']==0 ? "-" : $list['jul'];?></div></td>
                                <td><div align="right"><?php echo $list['agt']==0 ? "-" : $list['agt'];?></div></td>
                                <td><div align="right"><?php echo $list['sep']==0 ? "-" : $list['sep'];?></div></td>
                                <td><div align="right"><?php echo $list['okt']==0 ? "-" : $list['okt'];?></div></td>
                                <td><div align="right"><?php echo $list['nov']==0 ? "-" : $list['nov'];?></div></td>
                                <td><div align="right"><?php echo $list['des']==0 ? "-" : $list['des'];?></div></td>
                                <td><div align="right"><?php echo $ratarata==0 ? "-" : number_format($ratarata,2,',','.');?></div></td>
                              </tr>
                            <?php endforeach ?>                       
                            </tbody>
                            <tfoot>
                                                         
                              <tr> 
                                <td></td>                               
                                <td>Jumlah</td>
                                <td><div align="right"><?php echo $jumlah_jan==0 ? "-" : $jumlah_jan; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_feb==0 ? "-" : $jumlah_feb; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_mar==0 ? "-" : $jumlah_mar; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_apr==0 ? "-" : $jumlah_apr; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_mei==0 ? "-" : $jumlah_mei; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_jun==0 ? "-" : $jumlah_jun; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_jul==0 ? "-" : $jumlah_jul; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_agu==0 ? "-" : $jumlah_agu; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_sep==0 ? "-" : $jumlah_sep; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_okt==0 ? "-" : $jumlah_okt; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_nov==0 ? "-" : $jumlah_nov; ?></div></td>
                                <td><div align="right"><?php echo $jumlah_des==0 ? "-" : $jumlah_des; ?></div></td>
                                <td><div align="right"><?php echo $total_rata==0 ? "-" : $total_rata;?></div></td>
                              </tr>
                              <tr> 
                                <td></td>                               
                                <td>Total Responden</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><div align="right"><?php echo $jumlah_rata==0 ? "-" : $jumlah_rata;?></div></td>                                
                              </tr>                              
                            </tfoot>
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
  Nilai Persepsi, Interval SKM, Mutu Pelayanan, & Kinerja Unit Pelayanan.</p>
  <table align="center" class="table table-striped table-bordered table-hover" width="50%">
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
  
  loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables.min.js", function(){
    loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.colVis.min.js", function(){
      loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.tableTools.min.js", function(){
        loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/dataTables.bootstrap.min.js", function(){
          loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
        });
      });
    });
  });


  function cetak (tipe) {
    var tahun=$("#tahun").val();
    var bulan=$("#bulan").val();
    window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/laporan/CetakJenisLayanan?tipe='+tipe+"&tahun="+tahun+"&bulan="+bulan);
  }

  
</script>

