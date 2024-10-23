<?php define('ASSETS_URL', 'themes/smartadmin'); ?>


<div>
<div class="well" style="padding: 1px;">
<h1 align="center" class="page-title txt-color-blueDark">
Hasil Rekapitulasi Indeks Kepuasan Masyarakat <?php echo $bulan; ?> <?php echo $tahun; ?></h1>
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
         <h2>
           <?php echo $izin['refjenisizinikm_nama']; ?>
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
              <th rowspan="2" data-class="phone"><div align="center">Unsur Pertanyaan </div></th>
              <th colspan="13" data-class="phone, tablet"><div align="center">Bulan </div></th>
            </tr>
            <tr>    
             
              <th data-hide="phone,tablet"><div align="center">Jan</div></th>
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
              <th data-hide="phone,tablet"><div align="center">Rata-rata</div></th>
            </tr>
          </thead>

          <tbody>
          <?php $no=1; foreach ($nilai as $list) : ?>

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
                 $arr = array();
                  for ($i=1; $i <= 12; $i++) { 
                    $arr[] = $list['bulan_'.$i];
                  }
                  // var_dump($arr);
                  // Yii::app()->end();
                  $jml_kosong = array_count_values($arr);
                
                $jumlah_terisia = 12-$jml_kosong["0.0000"];
                   // var_dump($jml_kosong);
                   // Yii::app()->end();

                // $jumlah_terisib = 12-$jml_kosong['0.00000'];
                 $jumlah_terisib = 0;

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
              <td><?php echo $no++;?></td>
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
              <td><?php echo $ratarata==0 ? "-" : number_format($ratarata,2,',','.');?></td>
            </tr>
          <?php endforeach ?>
          </tbody>

          <tfoot>
            <tr>
              <td colspan="2"><div align="center">Jumlah Responden</div></td>
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
              <td colspan="2"><div align="center">Nilai IKM</div></td>
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
              <td colspan="10">&nbsp;</td>
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

      $('#dt_basic1').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });


      $('#dt_basic2').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });


      $('#dt_basic3').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });


      $('#dt_basic4').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

      $('#dt_basic5').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

        $('#dt_basic6').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

      $('#dt_basic7').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });


      $('#dt_basic8').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });


      $('#dt_basic9').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });


      $('#dt_basic10').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

        $('#dt_basic11').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

        $('#dt_basic12').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

        $('#dt_basic13').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

        $('#dt_basic14').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });
        $('#dt_basic15').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
          }
        },
        "rowCallback" : function(nRow) {
          responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback" : function(oSettings) {
          responsiveHelper_dt_basic.respond();
        }
      });

        $('#dt_basic16').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basics'), breakpointDefinition);
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
    
    /* COLUMN FILTER  */
      var otable = $('#datatable_fixed_column').DataTable({
        //"bFilter": false,
        //"bInfo": false,
        //"bLengthChange": false
        //"bAutoWidth": false,
        //"bPaginate": false,
        //"bStateSave": true // saves sort state using localStorage
      "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
      "autoWidth" : true,
      "preDrawCallback" : function() {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_datatable_fixed_column) {
          responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
        }
      },
      "rowCallback" : function(nRow) {
        responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
      },
      "drawCallback" : function(oSettings) {
        responsiveHelper_datatable_fixed_column.respond();
      }   
    
      });
      
      // custom toolbar
      $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
           
      // Apply the filter
      $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
        
          otable
              .column( $(this).parent().index()+':visible' )
              .search( this.value )
              .draw();
              
      } );
      /* END COLUMN FILTER */   
    
    /* COLUMN SHOW - HIDE */
    $('#datatable_col_reorder').dataTable({
      "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
      "autoWidth" : true,
      "preDrawCallback" : function() {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_datatable_col_reorder) {
          responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
        }
      },
      "rowCallback" : function(nRow) {
        responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
      },
      "drawCallback" : function(oSettings) {
        responsiveHelper_datatable_col_reorder.respond();
      }     
    });
    
    /* END COLUMN SHOW - HIDE */

    /* TABLETOOLS */
    $('#datatable_tabletools').dataTable({
      
      // Tabletools options: 
      //   https://datatables.net/extensions/tabletools/button_options
      "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
          "oTableTools": {
             "aButtons": [
               "copy",
               "csv",
               "xls",
                  {
                      "sExtends": "pdf",
                      "sTitle": "SmartAdmin_PDF",
                      "sPdfMessage": "SmartAdmin PDF Export",
                      "sPdfSize": "letter"
                  },
                {
                      "sExtends": "print",
                      "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                  }
               ],
              "sSwfPath": "<?php echo ASSETS_URL; ?>/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
          },
      "autoWidth" : true,
      "preDrawCallback" : function() {
        // Initialize the responsive datatables helper once.
        if (!responsiveHelper_datatable_tabletools) {
          responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
        }
      },
      "rowCallback" : function(nRow) {
        responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
      },
      "drawCallback" : function(oSettings) {
        responsiveHelper_datatable_tabletools.respond();
      }
    });
    
    /* END TABLETOOLS */

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
    var bulan=$("#bulan").val();bulan
    var jenisizin=$("#jenisizin").val();
    window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/laporan/CetakRekapitulasi?tipe='+tipe+"&tahun="+tahun+"&jenisizin="+jenisizin+"&bulan="+bulan);
  }


</script>
