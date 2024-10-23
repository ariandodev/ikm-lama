<?php define('ASSETS_URL', 'themes/smartadmin'); ?>



<div class="well">
<form class="smart-form">
    <div class="row" >
        <section class="col col-2">
            <label for="label" class="input">Tanggal Awal </label>
        </section>

        <section class="col col-3">
           <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            <input type="text" id="tanggal_awal" name="lname" placeholder="Tanggal Awal" class="datepicker" data-dateformat="yy/mm/dd">
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
            <input type="text" id="tanggal_akhir" name="lname" placeholder="Tanggal Akhir" class="datepicker" data-dateformat="yy/mm/dd">
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

<section id="widget-grid" class="">
    <!-- row -->
    <div class="row">
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-12">
        <h3 class="page-title txt-color-blueDark">
          <center>Grafik Loket Tahun <?php echo date("Y"); ?></center>
        </h3>
      </div>
    </div>
    <hr>
    <div class="row">
        
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-grafik1" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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
                    <h2>Laporan Loket</h2>                
                    
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
                        <div class="widget-body-toolbar">
                          <button class="btn btn-warning" onclick="cetak('html')"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    <form>
                        <table id="dt_basic" class="table table-hover table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th data-class="expand">No</th>
                                    <th data-hide="tablet">LOKET</th>
                                    <th data-hide="tablet, phone">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="tabel_loket">
                                
                            </tbody>
                            <tfoot>
                                 <tr>
                                    <td colspan="2">Total</td>
                                    <td id="total_loket"></td>
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
        </div>
        </section>

        <!-- WIDGET END -->

        <!-- NEW WIDGET START -->
        <div class="row">
            <section>
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

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
                    <h2>Grafik Laporan Loket</h2>                
                    
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
                        <div class="widget-body-toolbar">
                            <button class="btn btn-warning" id="grfcetak"><i class="fa fa-print"></i>
                                Cetak
                            </button>
                        </div>
                        <div id="3d-pie7" class="chart has-legend" style="height:300px; width: 100%; margin: 0px;"></div>                        
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
                
            </div>
            <!-- end widget -->

        </article>
        <!-- WIDGET END -->
</section>
</div>

    <script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/highcharts.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/highcharts-3d.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/exporting.js"></script>
    <script>
 
    pageSetUp();

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

            var options = {
                chart: {
                    renderTo: '3d-pie7',
                    type: 'column',
                    margin: [ 50, 50, 100, 80],
                     /*options3d: {
                        enabled: true,
                        alpha: 8,
                        beta: 3,
                        depth: 50,
                        viewDistance: 25
                    }*/
                },
                 plotOptions: {
                    column: {
                        colorByPoint: true
                    }
                },
                colors: [
                    '#ff0000',
                    '#00ff00',
                    '#0000ff',
                    '#0f0f0f',
                    '#f0f0f0'
                ],

                title: {
                    text: 'Grafik Laporan Loket' //judul chart
                },
                xAxis: {
                    categories: [
                         
                    ],
                    labels: {
                        rotation: -45,
                        align: 'right',
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },

                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah'
                    }
                },
                legend: {
                    enabled: false
                },

                tooltip: {
                    formatter: function() {
                        return 'Jumlah: '+ Highcharts.numberFormat(this.y);
                    }
                },

                series: [{
                    type: 'column',
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

            $.getJSON('app/grafik/AjxGrfLoket', {
                tanggal_awal : awal,
                tanggal_akhir : akhir
            }, function(data) {
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
            });
            if (awal=='' || akhir=='') {
                // JIKA tahun kosong maka data = [] /kosong
                $.getJSON('app/grafik/AjxGrfLoket', {
                    tanggal_awal : awal,
                    tanggal_akhir : akhir
                }, function(data) {
                    options.series[0].data = [];
                    var chart = new Highcharts.Chart(options);
                });
            }

            $('#grfcetak').click(function() {
                    var chart = new Highcharts.Chart(options);
                    chart.exportChart({type: 'application/pdf', filename: 'grafikloket'}, {subtitle: {text:''}});
                });
        }

        $("#btncari").click(function () {
            $("#dt_basic").DataTable().destroy();
            generate_chart( $("#tanggal_awal").val(),$('#tanggal_akhir').val() );
             getTabel($("#tanggal_awal").val(),$('#tanggal_akhir').val());
             getTotal($("#tanggal_awal").val(),$('#tanggal_akhir').val());
             setTimeout(function() {
                
                $("#dt_basic").DataTable();
             }, 400);
             
        });

        function getTabel(awal,akhir) {
            $.ajax({
                url: 'app/grafik/GetTableLoket',
                type: 'POST',
                data: {tanggal_awal: awal,tanggal_akhir: akhir},
                success : function (respon) {
                    $("#tabel_loket").html(respon);
                }
            });
        }

        function getTotal(awal,akhir) {
            $.ajax({
                url: 'app/grafik/GetTotalLoket',
                type: 'POST',
                data: {tanggal_awal: awal,tanggal_akhir: akhir},
                success : function (respon) {
                    $("#total_loket").html(respon);
                }
            });
        }


        function cetak (tipe) {
            var tanggal_awal = $("#tanggal_awal").val();
            var tanggal_akhir = $("#tanggal_akhir").val();
            window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/grafik/CetakLoket?tipe='+tipe+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir);
          }


    </script>


