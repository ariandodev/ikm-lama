<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<h2>Pencarian Data IKM berdasarkan Saran</h2>
<div class="well">
<form  id="form-cari" class="smart-form">
    <div class="row" >
        <section class="col col-2">
            <label for="label" class="input">Tanggal Awal </label>
        </section>
        <section class="col col-3">
           <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            <input type="text" id="tanggal_awal" name="lname" placeholder="Klik di sini untuk memilih tanggal" class="datepicker" data-dateformat="dd-mm-yy">
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
            <input type="text" id="tanggal_akhir" name="mname" placeholder="Klik di sini untuk memilih tanggal" class="datepicker" data-dateformat="dd-mm-yy">
            <b class="tooltip tooltip-top-left">
              <i class="fa fa-info txt-color-teal"></i> 
              Tanggal Akhir</b>
          </label>
        </section>
    </div>
    <footer class="demo-btns">
        <a><button class="btn btn-success pull-left" type="submit" id="btncari">
            <i class="fa  fa-search ">&nbsp;</i>Cari
        </button></a>
    </footer>
</form>
</div>

<section id="widget-grid" class="">
    <!-- row -->
    <div class="row">
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-12">
        <h3 class="page-title txt-color-blueDark"> 
          <center>Grafik Saran Tahun <?php echo date("Y"); ?></center>
        </h3>
      </div>
    </div>
    <hr>
    <div class="row">
        
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            
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
                    <h2>Laporan Saran</h2>                
                    
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
                        <table id="" class="table table-hover table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th data-class="expand">No</th>
                                    <th data-hide="tablet">Jenis Saran</th>
                                    <th data-hide="tablet, phone">Jumlah</th>
                                </tr>
                            </thead>
                             
                            <tbody id="tabelsaran">
                                
                            </tbody>
                            
                            <tfoot>
                                 <tr>
                                    <td colspan="2">Total</td>
                                    <td id="totalsaran"></td>
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
                    <h2>Grafik Laporan Saran</h2>                
                    
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
    </div>
</section>

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

            
            //if (awal=='' || akhir=='')

            var options = {
                chart: {
                    renderTo: '3d-pie7',
                    type: 'column',
                    margin: 75,
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
                    '#00ff00',
                    '#ff0000',
                    '#747474'
                ],
                title: {
                    text: 'Grafik Laporan Saran' //judul chart
                },
                xAxis: {
                    categories: [
                    'Positif',
                    'Negatif',
                    'Abstain'
                     ]
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
                        return '<b>'+ this.x +'</b><br/>'+
                            'Saran: '+ Highcharts.numberFormat(this.y, 1) +
                            ' jumlah';
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

            $.getJSON('app/grafik/AjxGrfSaran', {
                tanggal_awal : awal,
                tanggal_akhir : akhir
            }, function(data) {
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
            });
            if (awal=='' || akhir=='') {
                // JIKA tahun kosong maka data = [] /kosong
                $.getJSON('app/grafik/AjxGrfSaran', {
                    tanggal_awal : awal,
                    tanggal_akhir : akhir
                }, function(data) {
                    options.series[0].data = [];
                    var chart = new Highcharts.Chart(options);
                });
            }

            $('#grfcetak').click(function() {
                    var chart = new Highcharts.Chart(options);
                    chart.exportChart({type: 'application/pdf', filename: 'grafiksaran'}, {subtitle: {text:''}});
                });
        }

        function cari() {
            $("#dt_basic").DataTable().destroy();
            generate_chart( $("#tanggal_awal").val() ,$('#tanggal_akhir').val() );
             getTabel($("#tanggal_awal").val(),$('#tanggal_akhir').val());
             getTotal($("#tanggal_awal").val(),$('#tanggal_akhir').val());
             setTimeout(function() {
                
                $("#dt_basic").DataTable();
             }, 400);
             
        }

        function getTabel(awal,akhir) {
            $.ajax({
                url: 'app/grafik/GetTabelSaran',
                type: 'POST',
                dataType: 'html',
                data: {tanggal_awal: awal,tanggal_akhir: akhir},
                success : function (respon) {
                    window.respon_tbl = respon;
                    $("#tabelsaran").html(respon);
                    $("#widget-grid").show();
                }
            });
        }
        

        function getTotal(awal,akhir) {
            $.ajax({
                url: 'app/grafik/GetTotalSaran',
                type: 'POST',
                data: {tanggal_awal: awal,tanggal_akhir: akhir},
                success : function (respon) {
                    $("#totalsaran").html(respon);
                }
            });
        }


        function cetak (tipe) {
            var tanggal_awal = $("#tanggal_awal").val();
            var tanggal_akhir = $("#tanggal_akhir").val();
            window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/grafik/CetakSaran?tipe='+tipe+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir);
          }

          loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
        function runFormValidation() {
            var $FormDaftar = $("#form-cari").validate({
                // Rules for form validation
                rules : {
                    "lname" : {
                        required : true
                    }
                    ,"mname" : {
                        required : true
                    }
                },

                // Messages for form validation
                messages : {
                    "lname" : {
                        required : 'Mohon pilih tanggal awal'
                    }
                    ,"mname" : {
                        required : 'Mohon pilih tanggal akhir'
                    }
                },

                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                },
                submitHandler : function(form) {
                    // saat validasi benar semua, jalankan simpan()
                    return cari();
                }
            });
    }

    </script>


