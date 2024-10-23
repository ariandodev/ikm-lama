<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
    <h3 class="page-title txt-color-blueDark">
      <i class="fa fa-group  fa-fw "></i> 
      Usia
    </h3>
  </div>
</div>
<hr>

<div class="well">
<form  id="jenis_izin" class="smart-form">
    <div class="row" >
        <section class="col col-2">
            <label for="label" class="input">Tanggal Awal </label>
        </section>
        <section class="col col-3">
           <label class="input"> <i class="icon-prepend fa fa-calendar"></i>
            <input type="text" name="lname" placeholder="Tanggal Usia" class="datepicker" data-dateformat="dd/mm/yy">
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
            <input type="text" name="lname" placeholder="Tanggal Usia" class="datepicker" data-dateformat="dd/mm/yy">
            <b class="tooltip tooltip-top-left">
              <i class="fa fa-info txt-color-teal"></i> 
              Tanggal Akhir</b>
          </label>
        </section>
    </div>
    <footer class="demo-btns">
        <button class="btn btn-success pull-left" type="button">
            <i class="fa  fa-search ">&nbsp;</i>Cari
        </button>
    </footer>
</form>
</div>

<section id="widget-grid" class="">
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
                    <h2>Laporan Usia</h2>                
                    
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
                        <table id="dt_basic" class="table table-hover table-striped table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th data-class="expand">No</th>
                                    <th data-hide="tablet">Usia</th>
                                    <th data-hide="tablet, phone">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>15-20</td>
                                    <td>1</td>
                                </tr>
                                 <tr>
                                    <td>2</td>
                                    <td>20-25</td>
                                    <td>2</td>
                                </tr>
                                 <tr>
                                    <td>3</td>
                                    <td>25-30</td>
                                    <td>10</td>
                                </tr>
                                 <tr>
                                    <td>4</td>
                                    <td>30-35</td>
                                    <td>40</td>
                                </tr>
                                 <tr>
                                    <td>5</td>
                                    <td>35-40</td>
                                    <td>60</td>
                                </tr>
                                 <tr>
                                    <td>6</td>
                                    <td>40-45</td>
                                    <td>15</td>
                                </tr>
                                 <tr>
                                    <td>7</td>
                                    <td>45-50</td>
                                    <td>15</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                 <tr>
                                    <td colspan="2">Total</td>
                                    <td>33</td>
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
                    <h2>Grafik Laporan Usia</h2>                
                    
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
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/exporting.js"></script>
    <script>
    $(function () {
    $('#3d-pie6').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1,//null,
            plotShadow: false
        },
        title: {
            text: 'Grafik Laporan Usia'
        },
        tooltip: {
            pointFormat: '{}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: '',
            data: [
                
                ['15-20',     1],
                {
                    name: '20-25',
                    y: 2,
                    sliced: true,
                    selected: true,
                    color : 'red'
                },
                ['25-30',      10],
                ['30-35',      40],
                ['35-40',      60],
                ['40-45',      15],
                ['45-50',      15],
            ]
        }]
    });
});



    pageSetUp();
    
    function showdetail () {
        $("#detailikm").show();
    }

    function kosong(elemen) {
 $("#"+elemen).html('');
 $("#"+elemen).hide(500);
}

    
    function ambildata(alamat,elemen) {
  $.get(alamat, function(data) {
  $("#"+elemen).html(data);
  $("#"+elemen).show(500);
 });
}

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
    </script>


