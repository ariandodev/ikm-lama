<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<div class="well">
      <h1 class="semi-bold"  align="center" > <i class="fa fa-cogs"> &nbsp;</i>Laporan Jumlah Responden/Per Jenis Izin, Tingkat Pendidikan, Jenis Kelamin, Usia, Loket, Saran  dan Grafik</h1>
</div>


<div class="well well-sm well-light">
<a  data-toggle="modal" data-target="#tambah">
  <button  onclick="ambildata('ajax/grafik/jenis_izin','misi')" type="button" class="btn btn-labeled btn-primary">
   <span class="btn-label">
    <i class="fa fa-book"></i>
   </span>Jenis Izin
  </button>
  </a>
  <button onclick="ambildata('ajax/grafik/tingkat_pendidikan','misi')" type="button" class="btn btn-labeled btn-info">
   <span class="btn-label">
    <i class="fa fa-pencil"></i>
   </span>Tingkat Pendidikan
  </button>
   <button onclick="ambildata('ajax/grafik/jenis_kelamin','misi')" type="button" class="btn btn-labeled btn-danger">
   <span class="btn-label">
    <i class="fa fa-user"></i>
   </span>Jenis Kelamin
  </button>
   <button onclick="ambildata('ajax/grafik/usia','misi')" type="button" class="btn btn-labeled btn-success">
   <span class="btn-label">
    <i class="fa fa-paperclip"></i>
   </span>Usia
  </button>
   <button onclick="ambildata('ajax/grafik/loket','misi')" type="button" class="btn btn-labeled btn-default">
   <span class="btn-label">
    <i class="fa fa-location-arrow"></i>
   </span>Loket
  </button>
   <button onclick="ambildata('ajax/grafik/saran','misi')" type="button" class="btn btn-labeled btn-warning">
   <span class="btn-label">
    <i class="fa fa-comment"></i>
   </span>Saran
  </button>
</div>
<div id="misi">
</div>
<div id="detailikm"  style="display:none">

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
            text: 'HASIL IKM TOTAL JASA LAYANAN UMUM'
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
                
                ['HO',      31.3],
                {
                    name: 'IMB',
                    y: 18.7,
                    sliced: true,
                    selected: true,
                    color : 'red'
                },
               
               
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

                scrollY:        230,
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


