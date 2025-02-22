<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
 
 <h2>Pencarian Data Jumlah Responden per Jenis Izin</h2>
    <div class="well">
        <form id="form-pencarian"  class="smart-form">
            <div class="row" >
                <section class="col col-2">
                    <label for="label" class="input">Tanggal Awal </label>
                </section>

                <section class="col col-3">
                 <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
                    <input type="text" name="lname" placeholder="Klik di sini untuk memilih tanggal" id="tanggal_awal" class="datepicker" data-dateformat="dd-mm-yy">
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
                        <input type="text" name="mname" placeholder="Klik di sini untuk memilih tanggal" id="tanggal_akhir" class="datepicker" data-dateformat="dd-mm-yy">
                            <b class="tooltip tooltip-top-left">
                            <i class="fa fa-info txt-color-teal"></i> 
                                Tanggal Akhir</b>
                    </label>
                </section>
            </div>

            <div style="display:none" class="row">
                <section class="col col-2">
                    <label for="label" class="input">Loket</label>
                </section>

                <section class="col col-3">
                    <label class="select">
                    <select name="loket" id="loket">
                        <option selected="" disabled="">=== Pilih Loket ===</option> 
                        <?php 
                            foreach ($model as $list) {
                                echo '<option value="'.$list['refloket_id'].'">'.$list['refloket_nama'].'</option>';
                            }
                        ?>            
                    </select><i></i>
                    </label>
                </section>
            </div>
            

              <footer class="demo-btns">
                <a>
                    <button class="btn btn-success pull-left" type="submit" id="btncari">
                        <i class="fa  fa-search ">&nbsp;</i>Cari
                    </button>
                </a>
              </footer>
        </form>
    </div>

<section id="widget-grid2" style="display:none" class="">
    <!-- row -->
    <div class="row">
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-12">
        <h3 class="page-title txt-color-blueDark">
          <center> Laporan Jumlah Responden Per Jenis Izin Tahun <?php echo date("Y"); ?></center>
        </h3>
      </div>
    </div>
       <hr>
    <div class="row">
        
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
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
                    <h2>Tabel Jumlah Responden Per Jenis Izin
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
                    <div class="widget-body no-padding">
                        <div class="widget-body-toolbar">
                          <button class="btn btn-warning" id="cetakgrafik" onclick="cetak('html')"><i class="fa fa-print"></i> Cetak</button>
                        </div>
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
</div>
<div class="row">
        <!-- NEW WIDGET START -->
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
                    <h2>Grafik Jumlah Responden Per Jenis Izin</h2>                
                    
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
                        <div style="overflow: scroll;">
                            <div id="grfjenisizin" style="min-width: 6000px; height: 400px; margin: 0 auto"></div> 
                        </div>                 
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
    
    loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
        loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
            loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
                loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
                    loadScript("<?php echo ASSETS_URL; ?>/ajs/datatable-responsive/datatables.responsive.min.js", pagefunction)
                });
            });
        });
    });

    /*function untuk menggenerate chart*/
        function generate_chart(awal, akhir, loket) {

            
            //if (awal=='' || akhir=='')

            var options = {
                chart: {
                renderTo: 'grfjenisizin',
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
                    '#FF7070',
                    '#FFF670',
                    '#8EFF70',
                    '#70FFE9',
                    '#7270FF',
                    '#DE70FF',
                    '#FF7070',
                    '#00B3C4',
                    '#18C400',

                    '#FFFF38',
                    '#FF9C38',
                    '#FF3838',
                    '#38A8FF',
                    '#3847FF',
                    '#B138FF',
                    '#FF38F3',
                    '#C82C3A',
                    '#13FC00',

                    '#FCF500',
                    '#FC9900',
                    '#088E02',
                    '#03CBC8',
                    '#0343CB',
                    '#C82CC1',
                    '#8fed36',
                    '#FF0000',
                    '#3e3d1a',

                    '#15baca',
                    '#f8f59b',
                    '#FF5500',
                    '#a119c2',
                    '#FFDC00',
                    '#9a222b',
                    '#3af899',
                    '#7EAC03'
                ],

                title: {
                    text: 'Grafik Laporan Jenis Izin' //judul chart
                },

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

                tooltip: {
                    formatter: function() {
                        return 'Jumlah: '+ Highcharts.numberFormat(this.y) +
                               ' Responden';
                    }
                },
                
                series: [{
                    type: 'column',
                    name: 'Jumlah'
                }]

            };


            $.getJSON('app/grafik/AjxGrfJenisIzin', {
                tanggal_awal : awal,
                tanggal_akhir : akhir
                //loket : 1
            }, function(data) {
                options.series[0].data = data;
                var chart = new Highcharts.Chart(options);
            });
            if (awal=='' || akhir=='') {
                // JIKA tahun kosong maka data = [] /kosong
                $.getJSON('app/grafik/AjxGrfJenisIzin', {
                    tanggal_awal : awal,
                    tanggal_akhir : akhir
                    //loket : 1
                }, function(data) {
                    options.series[0].data = [];
                    var chart = new Highcharts.Chart(options);
                });
            }

            $('#grfcetak').click(function() {
                    var chart = new Highcharts.Chart(options);
                    chart.exportChart({type: 'application/pdf', filename: 'grafikperjenispelayanan'}, {subtitle: {text:''}});
                });
        }

        function cari() {
            $("#dt_basic").DataTable().destroy();
            generate_chart( $("#tanggal_awal").val() ,$('#tanggal_akhir').val() );
             getTabel($("#tanggal_awal").val(),$('#tanggal_akhir').val());
             getTotal($("#tanggal_awal").val(),$('#tanggal_akhir').val());
			 
			 $("html, body").animate({ scrollTop: 550 }, "slow");
			 $("#wid-id-grafik").slideDown(600);
             
             
        }

        function getTabel(awal,akhir,loket) {
            $.ajax({
                url: 'app/grafik/GetTable',
                type: 'POST',
                data: {tanggal_awal: awal,tanggal_akhir: akhir},
                success : function (respon) {
                    $("#tabel-jenis-izin").html(respon);
                    $("#widget-grid2").show();
                }
            });
        }

        function getTotal(awal,akhir,loket) {
            $.ajax({
                url: 'app/grafik/GetTotal',
                type: 'POST',
                data: {tanggal_awal: awal,tanggal_akhir: akhir},
                success : function (respon) {
                    $("#total").html(respon);
                }
            });
        }

        function cetak (tipe) {
            var tanggal_awal = $("#tanggal_awal").val();
            var tanggal_akhir = $("#tanggal_akhir").val();

            window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/grafik/CetakGrafikJenisIzin?tipe='+tipe+"&tanggal_awal="+tanggal_awal+"&tanggal_akhir="+tanggal_akhir);
          }

            loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
        function runFormValidation() {
            var $FormDaftar = $("#form-pencarian").validate({
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


