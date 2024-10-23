<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
    <div class="row">
      <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h3 class="page-title txt-color-blueDark">
          <i class="fa fa-group  fa-fw "></i> 
          Jenis Izin
        </h3>
      </div>
    </div>
    <hr>

    <div class="well">
        <form  class="smart-form">
            <div class="row" >
                <section class="col col-2">
                    <label for="label" class="input">Tanggal Awal </label>
                </section>

                <section class="col col-3">
                 <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="date" name="lname" placeholder="Tanggal Awal" id="tanggal_awal" class="datepicker" data-dateformat="dd/mm/yy">
                    <b class="tooltip tooltip-top-left">
                      <i class="fa fa-info txt-color-teal"></i> 
                      Tanggal Awal</b>
                  </label>
                </section>

                <section class="col col-2">
                    <label for="label" class="input">Tanggal Akhir </label>
                </section>

                <section class="col col-3">
                    <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                        <input type="date" name="lname" placeholder="Tanggal Akhir" id="tanggal_akhir" class="datepicker" data-dateformat="dd/mm/yy">
                            <b class="tooltip tooltip-top-left">
                            <i class="fa fa-info txt-color-teal"></i> 
                                Tanggal Akhir</b>
                    </label>
                </section>
            </div>

              <footer class="demo-btns">
                <a>
                    <button class="btn btn-success pull-left" type="button" id="btncari">
                        <i class="fa  fa-search ">&nbsp;</i>Cari
                    </button>
                </a>
              </footer>
        </form>
    </div>

<section id="widget-grid2" class="">
    <!-- row -->
    <div class="row">
        
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            
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
                    <h2>Laporan Jenis Izin</h2>                
                    
                </header>

                <!-- widget div-->
                <div>
                    
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                        
                    </div>
                    <!-- end widget edit box -->
                    
                    <!-- widget content -->
                    <div class="widget-body no-padding">
                    <form>
                        <table id="dt_basic" class="table table-hover table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th data-class="expand">No</th>
                                    <th data-hide="tablet">Jenis Izin</th>
                                    <th data-hide="tablet, phone">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="tabel-jenis-izin">
                                
                            </tbody>
                            <tfoot>
                                 <tr>
                                    <td colspan="2">Total</td>
                                    <td id="total"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                        
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->
                
            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->

        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            
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
                    <h2>Grafik Laporan Jenis Izin</h2>                
                    
                </header>

                <!-- widget div-->
                <div>
                    
                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                        
                    </div>
                    <!-- end widget edit box -->
                    
                    <!-- widget content -->
                    <div class="widget-body">
                        <div id="grfjenisizin" class="chart has-legend" style="height:300px; width: 100%; margin: 0px;"></div>  
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
</div>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/highcharts.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/highcharts-3d.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/exporting.js"></script>
    <script>


    


    // pagefunction 
    var pagefunction = function() {
        //console.log("cleared");
        
     
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
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'l>r>"+
                    "t"+
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "oTableTools": {
                 "aButtons": [
                 
                 
                 "xls"
                  
                 ],
                "sSwfPath": "<?php echo ASSETS_URL; ?>/js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
            },
                "autoWidth" : true,

                scrollY:        192,
                //"Height" : 200,
                "bDestroy" : true,
                "bSort": false,
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
                    // paksa remove overflow
                    $('.dataTables_scrollHead').css({overflow: ''});
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

    /*function untuk menggenerate chart*/
        function generate_chart(awal, akhir) {

            
            //if (awal=='' || akhir=='')

            var options = {
                chart: {
                    type: 'pie',
                renderTo: 'grfjenisizin', // letak div chart
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
                },
                title: {
                    text: 'Grafik Laporan Jenis Izin' //judul chart
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Jumlah'
                }]
            };

            /* data yg diterima dari JSON harus berformat seperti dibawah
             data: [
                        
                ['HO',      31.3],
                {
                    name: 'IMB',
                    y: 18.7,
                    sliced: true,
                    selected: true,
                    color : 'red'
                },
               
            ]*/

            $.getJSON('app/grafik/AjxGrfJenisIzin', {
                tanggal_awal : awal,
                tanggal_akhir : akhir
            }, function(data) {
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
            });
            if (awal=='' || akhir=='') {
                // JIKA tahun kosong maka data = [] /kosong
                $.getJSON('app/grafik/AjxGrfJenisIzin', {
                    tanggal_awal : awal,
                    tanggal_akhir : akhir
                }, function(data) {
                    options.series[0].data = [];
                    var chart = new Highcharts.Chart(options);
                });
            }
        }

        $("#btncari").click(function () {
            $("#dt_basic").DataTable().destroy();
            generate_chart( $("#tanggal_awal").val() ,$('#tanggal_akhir').val() );
             getTabel($("#tanggal_awal").val(),$('#tanggal_akhir').val());
             getTotal($("#tanggal_awal").val(),$('#tanggal_akhir').val());
             setTimeout(function() {
                
                $("#dt_basic").DataTable();
             }, 400);
             
        });

        function getTabel(awal,akhir) {
            $.ajax({
                url: 'app/grafik/GetTable',
                type: 'POST',
                data: {tanggal_awal: awal,tanggal_akhir: akhir},
                success : function (respon) {
                    $("#tabel-jenis-izin").html(respon);
                }
            });
        }

        function getTotal(awal,akhir) {
            $.ajax({
                url: 'app/grafik/GetTotal',
                type: 'POST',
                data: {tanggal_awal: awal,tanggal_akhir: akhir},
                success : function (respon) {
                    $("#total").html(respon);
                }
            });
        }
        

    </script>


