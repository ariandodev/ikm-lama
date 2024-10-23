<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<section id="widget-grid2" class="">
    <!-- row -->
    <div class="row">
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-12">
        <h1 class="page-title txt-color-blueDark">
          <center> Saran Responden SKM Terhadap Pelayanan Kepegawaian <?php echo $bulan;?> <?php echo date("Y"); ?>
          </center>
        </h1>

        <h3 class="page-title txt-color-blueDark">
          <center><?php echo $izin['refjenisizinikm_nama']; ?>
          </center>
        </h3>

      </div>
    </div>
       <hr>
    <div class="row">
        
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-grafik" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
                <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                    
                    data-widget-colorbutton="false" 
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true" 
                    data-widget-sortable="false"
                    
                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                    <h2>Laporan Saran Positif
                    </h2>                
                    
                </header>

                <!-- widget div-->
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
                                  <th width="30"><div align="center">No</div></th>
                                  <th><div align="center">Saran</div></th>
                                </tr>
                            </thead>

                                <tbody>
                                  <?php $no=1; foreach ($positif as $data) : ?>
                                    <tr>
                                      <td align="center"><?php echo $no++; ?></td>
                                      <td><div align="left"><?php echo $data['tblhasilsurvei_saran'];?></div></td>
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
        <!-- WIDGET END -->

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-table" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
                <!-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
                    
                    data-widget-colorbutton="false" 
                    data-widget-editbutton="false"
                    data-widget-togglebutton="false"
                    data-widget-deletebutton="false"
                    data-widget-fullscreenbutton="false"
                    data-widget-custombutton="false"
                    data-widget-collapsed="true" 
                    data-widget-sortable="false"
                    
                -->
                <header>
                    <span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
                    <h2>Laporan Saran Negatif</h2>                
                    
                </header>

                <!-- widget div-->
                <div>
                    
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                        
                    </div>
                    <!-- end widget edit box -->
                    
                    <!-- widget content -->
                    <div class="widget-body no-padding" >
                      <div class="widget-body-toolbar">
                        <button class="btn btn-warning" onclick="cetaknegatif('html')"><i class="fa fa-print"></i> Cetak</button>
                      </div>

                      <table id="dt_saran" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                  <th width="30"><div align="center">No</div></th>
                                  <th><div align="center">Saran</div></th>
                                </tr>
                            </thead>

                                <tbody>
                                    <?php $no=1; foreach ($negatif as $neg) : ?>
                                        <tr>
                                          <td width="30"><div align="center"><?php echo $no++;?></div></td>
                                          <td><div align="left"><?php echo $neg['tblhasilsurvei_saran'];?></div></td>
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
        <!-- WIDGET END -->
</div>
</section>


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

       $('#dt_saran').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
          "t"+
          "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth" : true,
        "preDrawCallback" : function() {
          // Initialize the responsive datatables helper once.
          if (!responsiveHelper_dt_basic) {
            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_saran'), breakpointDefinition);
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
    var jenis_izin=$("#jenis_izin").val();
    var bulan=$("#bulan").val();
    window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/laporan/CetakSaranPositif?tipe='+tipe+"&jenis_izin="+jenis_izin+"&bulan="+bulan);
  }

  function cetaknegatif (tipe) {
    var jenis_izin=$("#jenis_izin").val();
    var bulan=$("#bulan").val();
    window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/laporan/CetakSaranNegatif?tipe='+tipe+"&jenis_izin="+jenis_izin+"&bulan="+bulan);
  }

  
</script>
