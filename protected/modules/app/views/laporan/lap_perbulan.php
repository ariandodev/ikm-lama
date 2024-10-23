<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<?php Yii::import('ext.LokalIndonesia'); ?>
<section id="widget-grid" class="" >

  <!-- row -->
  <div class="row" >

    <div class="well" style="padding: 1px;">
      <h1 align="center" class="page-title txt-color-blueDark">
        Hasil Akhir Indeks Kepuasan Masyarakat <?php echo LokalIndonesia::getBulan($bulan);?> <?php echo $tahun;?></h1>
    </div>

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <!-- Widget ID (each widget will need unique ID)-->
      <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
        
        <header>
          <span class="widget-icon"> <i class="fa fa-table"></i> </span>
          <h2>Tahun <?php echo $tahun;?></h2>
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

				    <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                  <thead>
                      <tr>
                        <th rowspan="2" data-class="expand"><div align="center">No</div></th>
                        <th rowspan="2" data-hide="phone"><div align="center">Jenis Izin </div></th>
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
                      <?php $postbulan = $bulan; ?>
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
                                  $jumlah_terisi = 12-$jml_kosong["0"];
                                  if ($jumlah_terisi==0) {
                                    $jumlah_terisi = 12;
                                  }
                                  $ratarata = $a / ($jumlah_terisi);
                                  //print_r($list);
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
    var bulan=$("#bulan").val();
    window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/laporan/CetakPerbulan?tipe='+tipe+"&tahun="+tahun+"&bulan="+bulan);
  }

  
</script>
