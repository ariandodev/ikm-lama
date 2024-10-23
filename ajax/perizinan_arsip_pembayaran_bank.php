<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {font-weight: bold; font-size: 14px; }
-->
</style>

<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Arsip Pembayaran
		</h1>
	</div>
</div>
<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-21" data-widget-editbutton="false" data-widget-deletebutton="false">
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
					<span class="widget-icon"> <i class="fa fa-check"></i> </span>
					<h2>Alur Pendaftaran Izin</h2>

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

						<div class="row">
							<form id="wizard-1" novalidate>
								<div id="bootstrap-wizard-1" class="col-sm-12">
									<div class="form-bootstrapWizard" align="center">
										<ul class="bootstrapWizard form-wizard">
											<li data-target="#step1">
												<span class="step">1</span> <span class="title">Pendaftaran</span>
											</li>
											<li data-target="#step2">
												<span class="step">2</span> <span class="title">Pencetakan</span>
											</li>
											<li class="active" data-target="#step3">
												<span class="step">3</span> <span class="title">Kasir</span>
											</li>
											<li data-target="#step4">
												<span class="step">4</span> <span class="title">Pengambilan SK</span>
											</li>
											<li data-target="#step5">
												<span class="step">5</span> <span class="title">Laporan</span>
											</li>
											<li data-target="#step6">
												<span class="step">6</span> <span class="title">Grafik</span>
											</li>
											
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="tab-content">
										<div class="tab-pane" id="tab1">
											<br>
											<h3><strong>Step 1 </strong> - Pendaftaran</h3>
										</div>
										<div class="tab-pane" id="tab2">
											<br>
											<h3><strong>Step 2</strong> - Pencetakan</h3>
										</div>
										<div class="tab-pane active" id="tab3">
											<br>
											<h3><strong>Step 3</strong> - Kasir</h3>
										</div>
										<div class="tab-pane" id="tab4">
											<br>
											<h3><strong>Step 4</strong> - Pengambilan SK<br>
										</h3>
										</div>
										<div class="tab-pane" id="tab5">
											<br>
											<h3><strong>Step 5</strong> - Laporan</h3>
										</div>
										<div class="tab-pane" id="tab6">
											<br>
											<h3><strong>Step 6</strong> - Grafik</h3>
										</div>
									</div>
								</div>
							</form>
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

	  </div>
			<!-- end widget -->
	</div>
</div>




<div class="row">
	<div class="col-sm-12">
		
	  <div class="well">
			<button class="close" data-dismiss="alert">
					x
			</button>
			<h1 class="semi-bold">C.2. Apa itu &quot;Arsip Pembayaran&quot; ?</h1>
		<p class="text-justify">Survey disini merupakan kegiatan survey pemeriksaan lapangan sesuai dengan jadwal yang telah ditentukan terhadap permohonan suatu izin untuk mengumpulkan dan mendapatkan informasi terkait. Pada halaman ini terdapat daftar suatu form survey yang dilengkapi fitur pengeditan dan penghapusan data. Adapun pada form ini dilengkapi fasilitas pencarian cepat, yang memungkinkan dalam melakukan pencarian data secara cepat dan tepat pada sejumlah data yang banyak.</p>
	  </div>	
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		
		<form action=""  class="smart-form">
			<div class="well" style="padding:10px;">
				

				<section class=" col col-4">
					<label class="input"> <i class="icon-append fa fa-calendar "></i>
						<input type="text" name="tgl1" placeholder="Dari Tanggal" class="datepicker" data-dateformat="dd/mm/yy">
						<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal</b>
					</label>
				</section>

				<section class=" col col-4">
					<label class="input"> <i class="icon-append fa fa-calendar "></i>
						<input type="text" name="tgl2" placeholder="Sampai Tanggal" class="datepicker" data-dateformat="dd/mm/yy">
						<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal</b>
					</label>
				</section>

				<div>
					<a type="button" class="btn btn-primary btn-sm" target="_blank" href="http://192.168.0.7/RISET/rian/aplikasi_perizinan/#ajax/arsip_pembayaran_bank.php">
						Cetak
					</a>				
				</div>
				
			</div>      
		</form>
	</div>
</div><br />
<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
	    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false"
        data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-togglebutton="false" data-widget-sortable="false">
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
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Arsip Pembayaran</h2>

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
					
						
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th data-hide="phone">No</th>
									<th data-hide="phone,tablet">Nomor Daftar</th>
									<th data-hide="phone">Nama Izin</th>
									<th data-class="expand">Nama Permohonan</th>
									<th data-hide="phone,tablet,desktop">KTP</th>
									<th data-hide="phone,tablet">Alamat</th>
									<th data-hide="phone,tablet,desktop">Denda</th>
									<th data-hide="phone,tablet,desktop">Retribusi</th>
									<th data-hide="phone,tablet,desktop">Rupiah Bayar</th>
									<th data-hide="phone,tablet,desktop">Tanggal Bayar</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>2577/695/44/11/2013 </td>
									<td>Izin Mendirikan Bangunan (IMB) </td>
									<td>WARDONO</td>
									<td>-</td>
									<td>-</td>
									<td>Rp. 0</td>
									<td>Rp. 1.000.000</td>
									<td>Rp. 1.000.000</td>
									<td>04/12/2012</td>
									<td><div class="btn-group"> <a class="btn btn-default btn-sm" href="http://192.168.0.7/RISET/rian/aplikasi_perizinanberau/#ajax/arsip_pembayaran_bank.php" target="_blank">Cetak Bukti Bayar</a> <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalku">Pembatalan </div></td>
								</tr>
								<tr>
									<td>2</td>
									<td>2577/695/44/11/2013 </td>
									<td>SIUP (Surat Izin Usaha Perikanan).</td>
									<td>PRIHANDOKO</td>
									<td>-</td>
									<td>-</td>
									<td>Rp. 0</td>
									<td>Rp. 1.000.000</td>
									<td>Rp. 1.000.000</td>
									<td>03/02/2013</td>
									<td><div class="btn-group"> <a class="btn btn-default btn-sm" href="http://192.168.0.7/RISET/rian/aplikasi_perizinanberau/#ajax/arsip_pembayaran_bank.php" target="_blank">Cetak Bukti Bayar</a> <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalku">Pembatalan </div></td>
								</tr>
								<tr>
									<td>3</td>
									<td>2577/695/44/11/2013 </td>
									<td>SIPI (Surat Izin Penangkapan Ikan)</td>
									<td>SURYO</td>
									<td>-</td>
									<td>-</td>
									<td>Rp. 0</td>
									<td>Rp. 1.000.000</td>
									<td>Rp. 1.000.000</td>
									<td>02/10/2014</td>
									<td><div class="btn-group">
										<a class="btn btn-default btn-sm" href="http://192.168.0.7/RISET/rian/aplikasi_perizinanberau/#ajax/arsip_pembayaran_bank.php" target="_blank">Cetak Bukti Bayar</a>																												
									    <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalku">Pembatalan
									</div></td>
								</tr>
								<tr>
									<td>4</td>
									<td>2577/695/44/11/2013 </td>
									<td>SIUP (Surat Izin Usaha Perikanan)</td>
									<td>BAYU</td>
									<td>-</td>
									<td>-</td>
									<td>Rp. 0</td>
									<td>Rp. 1.000.000</td>
									<td>Rp. 1.000.000</td>
									<td>01/01/2013</td>
									<td><div class="btn-group">
										<a class="btn btn-default btn-sm" href="http://192.168.0.7/RISET/rian/aplikasi_perizinanberau/#ajax/arsip_pembayaran_bank.php" target="_blank">Cetak Bukti Bayar</a>																												
									    <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalku">Pembatalan
									</div></td>
								</tr>
								<tr>
									<td>5</td>
									<td>2577/695/44/11/2013 </td>
									<td>SIPI (Surat Izin Penangkapan Ikan)</td>
									<td>HALIM</td>
									<td>-</td>
									<td>-</td>
									<td>Rp. 0</td>
									<td>Rp. 1.000.000</td>
									<td>Rp. 1.000.000</td>
									<td>16/02/2013</td>
									<td><div class="btn-group">
										<a class="btn btn-default btn-sm" href="http://192.168.0.7/RISET/rian/aplikasi_perizinanberau/#ajax/arsip_pembayaran_bank.php" target="_blank">Cetak Bukti Bayar</a>																												
									    <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalku">Pembatalan
									</div></td>
								</tr>
							</tbody>
						</table>

				  </div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

	  </div>
		  <!-- end widget -->

		  <!-- Widget ID (each widget will need unique ID)--><!-- end widget -->

		  <!-- Widget ID (each widget will need unique ID)--><!-- end widget -->

		  <!-- Widget ID (each widget will need unique ID)--><!-- end widget -->

		
		<!-- WIDGET END -->
		</article>

	</div>

	<!-- end row -->

	<!-- end row -->

</section>
<!-- end widget grid -->
<div class="modal fade" id="modalku" tabindex="-1" role="dialog" aria-labelledby="modalkuLabel" aria-hidden="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
&times;				</button>
				<h4 class="modal-title" id="modalkuLabel"></h4>
			</div>
			<p align="left" class="style1">
		  
			<table width="438" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><p class="style2">Pembatalan Pembayaran. </p>
                <p class="style2"><strong>Apakah Anda yakin Melakukan Pembatalan? </strong></p></td>
              </tr>
            </table>
            <p align="left">
            
            <div class="modal-footer">
			    <button type="button" class="btn btn-primary">
					ok			</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cencel				</button>
				
			</div>
		</div>
		<!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 */
	
	// PAGE RELATED SCRIPTS
	
	// pagefunction	
	var pagefunction = function() {
		//console.log("cleared");
		
		/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
		*/	

		/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				desktop: 1366,
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
	            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
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
					loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});


</script>
