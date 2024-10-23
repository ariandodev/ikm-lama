<?php define('ASSETS_URL', 'themes/smartadmin'); ?>


  

<div class="well well-sm well-light">
  <div class="well" style="padding: 1px;">
      <h1 align="center" class="page-title txt-color-blueDark">
        Hasil Akhir IKM Per Jenis Izin Tahun <?php echo $tahun;?></h1>
    </div>
    
<div>
	<div class="row">
      <section class="col-md-2">
       JENIS IZIN
      </section>
      <section class="col-md-1">
        :
      </section>
      <section class="col-md-4">
       <?php echo $getizin['refjenisizinikm_nama'];?>
      </section>
    </div>

    <div class="row">
      <section class="col-md-2">
        BULAN
      </section>
      <section class="col-md-1">
        :
      </section>
      <section class="col-md-4">
       <?php echo $bulan;?>
     </section>
   </div>
   </div>
</div><hr>

	<!-- widget grid -->
<section id="widget-grid" class="" >

  <!-- row -->
  <div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <!-- Widget ID (each widget will need unique ID)-->
      <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-1" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false">
        
          <header>
          <span class="widget-icon"> <i class="fa fa-table"></i> </span>
          <h2><?php echo $getizin['refjenisizinikm_nama'];?>
            <!-- widget div-->
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
	            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
	                    <thead>
	                      <tr>
	                        <th colspan="1" rowspan="2" data-class="expand"><div align="center">NOMOR URUT RESPONDEN</div></th>
	                        <th height="21" colspan="15"><div align="center">NILAI PER UNSUR PERTANYAAN</div></th>
	                      </tr>
	                      <tr>    
	                      	<th><div align="center">U 1</div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 2 </div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 3 </div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 4 </div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 5 </div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 6 </div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 7 </div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 8 </div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 9 </div></th>
	                        <th data-hide="phone,tablet"><div align="center">U 10 </div></th>
	                        <th data-hide="phone,tablet">Hasil Akhir</th>
	                      </tr>
	                    </thead>

	                    <tbody>
	                      <?php $no=1; foreach ($nilai as $laporan_a) : ?>
	                        <tr>
	                          <td width="20"><div align="center"><?php echo $no++;?></div></td>
	                          
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan1']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan1'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan2']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan2'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan3']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan3'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan4']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan4'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan5']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan5'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan6']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan6'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan7']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan7'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan8']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan8'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan9']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan9'];?></div></td>
	                          <td><div align="right"><?php echo $laporan_a['tblhasilsurvei_pertanyaan10']==0 ? "-" : $laporan_a['tblhasilsurvei_pertanyaan10'];?></div></td>
	                          <td>&nbsp;</td>
	                        </tr>
	                      <?php endforeach ?> 
	                    </tbody>

                       <tfoot>
                          <tr>
                            <td colspan="11">IKM Unit Pelayanan</td>
                            <td><?php echo $hasilakhir['hasilakhir']==0 ? "-" : number_format($hasilakhir['hasilakhir'],2,',','.');?></td>
                          </tr>
                        </tfoot>

	                     <tfoot>
	                        <tr>
	                          <td height="28" colspan="1"><div align="left">Jumlah Nilai per Unsur</div></td>
	                        <?php foreach ($jumlah as $jumlah_a) : ?>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan1']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan1'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan2']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan2'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan3']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan3'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan4']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan4'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan5']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan5'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan6']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan6'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan7']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan7'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan8']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan8'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan9']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan9'];?></div></td>
	                          <td><div align="right"><?php echo $jumlah_a['tblhasilsurvei_pertanyaan10']==0 ? "-" : $jumlah_a['tblhasilsurvei_pertanyaan10'];?></div></td>
	                          <td>&nbsp;</td>
	                      	<?php endforeach ?>
	                        </tr>
	                     </tfoot>

                      

	                     <tfoot>
	                        <tr>
	                          <td colspan="1"><div align="left">NRR per Unsur = Jumlah nilai per unsur : Jumlah kuesioner yang terisi</div></td>
	                          <?php foreach ($nrr as $nrr_a) : ?>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan1']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan1'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan2']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan2'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan3']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan3'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan4']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan4'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan5']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan5'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan6']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan6'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan7']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan7'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan8']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan8'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan9']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan9'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $nrr_a['tblhasilsurvei_pertanyaan10']==0 ? "-" : number_format($nrr_a['tblhasilsurvei_pertanyaan10'],2,',','.');?></div></td>
	                          <td></td>
	                      <?php endforeach ?>
	                        </tr>
	                     </tfoot>

	                     <tfoot>
	                        <tr>
	                          <td colspan="1"><div align="left">NRR tertimbang per unsur = NRR per unsur x 0.1</div></td>
	                          <?php foreach ($nrrtertimbang as $tertimbang) : ?>
								<?php 
	                     		$totaltertimbang = 0;
	                     		$total = 0;
	                     		$totaltertimbang = $tertimbang['tblhasilsurvei_pertanyaan1']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan2']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan3']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan4']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan5']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan6']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan7']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan8']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan9']+
	                     						   $tertimbang['tblhasilsurvei_pertanyaan10'];

	                     		?>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan1']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan1'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan2']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan2'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan3']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan3'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan4']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan4'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan5']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan5'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan6']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan6'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan7']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan7'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan8']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan8'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan9']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan9'],2,',','.');?></div></td>
	                          <td><div align="right"><?php echo $tertimbang['tblhasilsurvei_pertanyaan10']==0 ? "-" : number_format($tertimbang['tblhasilsurvei_pertanyaan10'],2,',','.');?></div></td>
	                          <td><?php echo $totaltertimbang==0 ? "-" : number_format($totaltertimbang,2,',','.'); ?></td>
	                      <?php endforeach ?>
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
    var jenis_izin=$("#jenis_izin").val();
    var bulan=$("#bulan").val();
    window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/laporan/CetakPerJenisIzin?tipe='+tipe+"&tahun="+tahun+"&jenis_izin="+jenis_izin+"&bulan="+bulan);
  }

</script>     

	


