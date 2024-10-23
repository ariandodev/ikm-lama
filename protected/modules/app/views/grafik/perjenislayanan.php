<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<h2>Pencarian Data IKM berdasarkan Responden</h2>
<div class="well">
<form  id="form_cari" class="smart-form">
    <div class="row" >
        <section class="col col-2">
            <label for="label" class="input">Tahun </label>
        </section>
        <section class="col col-3">
           <label class="select">
                <select name="tahun" id="tahun">
                    <option selected="" disabled="">
                        === Pilih Tahun Laporan IKM ===
                    </option>
                    <?php foreach ($gettahun as $list) {
                     echo '<option value="'.$list['tahun'].'">'.$list['tahun'].'</option>';
                   }
                   ?>
                </select><i></i>
            <b class="tooltip tooltip-top-left">
              <i class="fa fa-info txt-color-teal"></i> 
              Tahun Laporan IKM</b>
          </label>
        </section>
         <section class="col col-2">
            <label for="label" class="input">Jenis Pelayanan </label>
        </section>
        <section class="col col-3">
           <label class="select">
                <select name="jenis_izin" id="jenis_izin">
                    <option selected="" disabled="">
                        === Pilih Jenis Pelayanan ===
                    </option>
                    <?php foreach ($getizin as $list) {
                          echo '<option value="'.$list['refjenisizinikm_id'].'">'.$list['refjenisizinikm_nama'].'</option>';
                    }
                    ?>
                </select><i></i>
            <b class="tooltip tooltip-top-left">
              <i class="fa fa-info txt-color-teal"></i> 
              Jenis Izin IKM</b>
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

<section id="widget-grid" style="display:none" class="">
    <!-- row -->
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-12">
        <h3 class="page-title txt-color-blueDark"> 
          <center>Grafik Responden Per Jenis Layanan Tahun <?php echo date("Y"); ?><br></center>
        </h3>
      </div>
    </div>
    <hr>
    <div class="row">
        
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-8023471" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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
                    <h2>Laporan Jumlah Responden Per Jenis Layanan</h2>                
                    
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
                        
                        <table id="dt_basic" class="table table-hover table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th data-class="expand">No</th>
                                    <th data-hide="tablet">Bulan</th>
                                    <th data-hide="tablet, phone">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="tabel-total">
                            
                                
                            </tbody>
                            <tfoot>
                                 <tr>
                                    <td colspan="2">Total</td>
                                    <td id="totalrekapikm"></td>
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
            <div class="jarviswidget" id="wid-id-01293875" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
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
                    <h2>Grafik Laporan Jumlah Responden Per Jenis Layanan</h2>                
                    
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
                        <div id="3d-pie6" class="chart has-legend" style="height:300px; width: 100%; margin: 0px;"></div>
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
    <!--<script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/exporting.js"></script>-->
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

                scrollY: 192,
                /*"iDisplayLength" : 12,*/
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
        function generate_chart(tahun, izin) {

            
            //if (tahun=='' || jenis_izin=='')

            var options = {
                chart: {
                    renderTo: '3d-pie6',
                    type: 'column',
                    margin: 50,
                  /*  options3d: {
                        enabled: true,
                        alpha: 8,
                        beta: 3,
                        depth: 50,
                        viewDistance: 25
                    }*/
                },
                plotOptions: {
                    column: {
                        colorByPoint: true,
                        depth: 25
                    }
                },
                colors: [
                    '#ff0000',
                    '#00ff00',
                    '#0000ff',
                    '#0f0f0f',
                    '#f0f0f0',
                    '#234907',
                    '#341093',
                    '#673249',
                    '#029348',
                    '#982937'
                ],

                title: {
                    text: 'Grafik Laporan Jumlah Responden Per Jenis Layanan' //judul chart
                },
                /*tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },*/

                xAxis: {
                categories: [
                       
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

            $.getJSON('app/grafik/AjxGrfperjenislayanan', {
                tahun : tahun,
                jenis_izin : izin
            }, function(data) {
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
            });
            if (tahun=='' || jenis_izin=='') {
                // JIKA tanggal kosong maka data = [] /kosong
                $.getJSON('app/grafik/AjxGrfperjenislayanan', {
                    tahun : tahun,
                    jenis_izin : jenis_izin
                }, function(data) {
                    options.series[0].data = [];
                    var chart = new Highcharts.Chart(options);
                });
            }

            $('#grfcetak').click(function() {
                    var chart = new Highcharts.Chart(options);
                    chart.exportChart({type: 'application/pdf', filename: 'grafikjenislayanan'}, {subtitle: {text:''}});
                });
        }

        function cari() {
            $("#dt_basic").DataTable().destroy();
            generate_chart( $("#tahun").val() ,$('#jenis_izin').val() );
             getTabel($("#tahun").val(),$('#jenis_izin').val());
             getTotal($("#tahun").val(),$('#jenis_izin').val());
             setTimeout(function() {
                
                $("#dt_basic").DataTable();
            4}, 700);
             
        }

        function getTabel(tahun,izin) {
            $.ajax({
                url: 'app/grafik/GetTabelperjenislayanan',
                type: 'POST',
                dataType: 'html',
                data: {tahun: tahun,jenis_izin: izin},
                success : function (respon) {
                    window.respon_tbl = respon;
                    $("#tabel-total").html(respon);
                    $("#widget-grid").show();
                }
            });
        }

        function getTotal(tahun,izin) {
            $.ajax({
                url: 'app/grafik/GetTotalperjenislayanan',
                type: 'POST',
                data: {tahun: tahun,jenis_izin: izin},
                success : function (respon) {
                    $("#totalrekapikm").html(respon);
                }
            });
        }

        function cetak (tipe) {
            var tahun = $("#tahun").val();
            var jenis_izin = $("#jenis_izin").val();
            window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/grafik/CetakJenisLayanan?tipe='+tipe+"&tahun="+tahun+"&jenis_izin="+jenis_izin);
          }

          loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
        function runFormValidation() {
            var $FormDaftar = $("#form_cari").validate({
                // Rules for form validation
                rules : {
                    "tahun" : {
                        required : true
                    }
                    ,"jenis_izin" : {
                        required : true
                    }
                },

                // Messages for form validation
                messages : {
                    "tahun" : {
                        required : 'Mohon pilih tahun laporan ikm'
                    }
                    ,"jenis_izin" : {
                        required : 'Mohon pilih jenis pelayanan'
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


