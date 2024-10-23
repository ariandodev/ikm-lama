<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i>Pembayaran Retribusi </h1>
	</div>
</div>

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
												<span class="step">3</span> <span class="title">Bank</span>
											</li>
											<li data-target="#step4">
												<span class="step">4</span> <span class="title">Pengambilan SK</span>
											</li>
											<li data-target="#step5">
												<span class="step">5</span> <span class="title">Pengaduan</span>
											</li>
											<li data-target="#step6">
												<span class="step">6</span> <span class="title">Laporan</span>
											</li>
											<li data-target="#step7">
												<span class="step">7</span> <span class="title">Grafik</span>
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
											<h3><strong>Step 3</strong> - Bank</h3>
										</div>
										<div class="tab-pane" id="tab4">
											<br>
											<h3><strong>Step 4</strong> - Pengambilan SK<br>
										</h3>
										</div>
										<div class="tab-pane" id="tab5">
											<br>
											<h3><strong>Step 5 </strong> - Pengaduan</h3>
										</div>
										<div class="tab-pane" id="tab6">
											<br>
											<h3><strong>Step 6</strong> - Laporan</h3>
										</div>
										<div class="tab-pane" id="tab7">
											<br>
											<h3><strong>Step 7</strong> - Grafik</h3>
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

<!-- row -->
<div class="row">
	<div class="col-sm-12">
		
	  <div class="well">
			<button class="close" data-dismiss="alert">
					x
			</button>
			<h1 class="semi-bold">C.1.  Apa itu "Pembayaran Retribusi " ?</h1>
		    <p class="text-justify">Pada halaman ini terdapat daftar suatu form pembayaran retribusi yang dilengkapi fitur pencetakan dan pencarian data. Pembayaran Retribusi merupakan form pembayaran yang tercatat untuk diserahkan ke pihak pemohon izin.</p>
	  </div>

		
	</div>
</div>




<!-- widget grid -->
<section id="widget-grid" class="">


  <!-- row -->
<div class="row">

<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">		

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
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
					<h2>Pembayaran</h2>

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
									<th data-hide="phone,tablet">Nomor Daftar </th>
									<th data-hide="phone">Nama Izin </th>
									<th data-class="expand">Nama Pemohon </th>
								  	<th data-hide="phone,tablet,desktop">KTP</th>
								  	<th data-hide="phone,tablet,desktop">Alamat</th>
								  	<th data-hide="phone,tablet,desktop">Tanggal SKRD </th>
									<th data-hide="phone,tablet">Keterlambatan Pembayaran</th>
								  	<th data-hide="phone,tablet,desktop">Denda</th>
								  	<th data-hide="phone,tablet,desktop">Retribusi</th>
									<th data-hide="phone,tablet">Total Retribusi</th>
								  	<th ></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>4768/747/3/04/2014&nbsp;</td>
									<td>Surat Izin Tempat Usaha / HO Golongan A&nbsp;</td>
									<td>ASPIAN SITORUS&nbsp;</td>
									<td>6472060812740001</td>
									<td>-</td>
									<td>04/04/2014</td>
									<td> 4 bln      &nbsp;</td>
									<td>Rp. 162.000,-</td>
									<td>Rp. 300.000,-</td>
									<td>Rp. 462.000,-</td>
									<td>
										<button class="btn btn-default btn-md" data-toggle="modal" data-target="#modalku">
											<i class="fa fa-money"></i> Bayar
										</button>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>4739/744/3/04/2014&nbsp;</td>
									<td>Surat Izin Tempat Usaha / HO Golongan A&nbsp;</td>
									<td>M. AMIN&nbsp;</td>
									<td>-</td>
									<td>-</td>
									<td>3 April 2014</td>
									<td> 4 bln      &nbsp;</td>
									<td>Rp. 0,-</td>
									<td>Rp. 300.000,-</td>
									<td>Rp. 300.000,-</td>
									<td>
										<button class="btn btn-default btn-md" data-toggle="modal" data-target="#modalku">
											<i class="fa fa-money"></i> Bayar
										</button>
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>4659/724/3/03/2014&nbsp;</td>
									<td>Surat Izin Tempat Usaha / HO Golongan A&nbsp;</td>
									<td>RULAN &nbsp;</td>
									<td>6472050808740003</td>
									<td>-</td>
									<td>2 April 2014</td>
									<td> 4 bln      &nbsp;</td>
									<td>Rp. 0,-</td>
									<td>Rp. 300.000,-</td>
									<td>Rp. 300.000,-</td>
									<td>
										<button class="btn btn-default btn-md" data-toggle="modal" data-target="#modalku">
											<i class="fa fa-money"></i> Bayar
										</button>
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td>4448/249/4/03/2014&nbsp;</td>
									<td>Surat Izin Tempat Usaha / HO Golongan B&nbsp;</td>
									<td>H. PANIJAN&nbsp;</td>
									<td>-</td>
									<td>-</td>
									<td>28 Maret 2014</td>
									<td> 4 bln      &nbsp;</td>
									<td>Rp. 780.000,-</td>
									<td>Rp. 1.500.000,-</td>
									<td>Rp. 2.280.000,-</td>
									<td>
										<button class="btn btn-default btn-md" data-toggle="modal" data-target="#modalku">
											<i class="fa fa-money"></i> Bayar
										</button>
									</td>
								</tr>
								<tr>
									<td>5</td>
									<td>4451/250/4/03/2014&nbsp;</td>
									<td>Surat Izin Tempat Usaha / HO Golongan B&nbsp;</td>
									<td>HERLINA&nbsp;</td>
									<td>-</td>
									<td>-</td>
									<td>27 Maret 2014</td>
									<td> 4 bln      &nbsp;</td>
									<td>Rp. 60.000,-</td>
									<td>Rp. 1.500.000,-</td>
									<td>Rp. 1.560.000,-</td>
									<td>
										<button class="btn btn-default btn-md" data-toggle="modal" data-target="#modalku">
											<i class="fa fa-money"></i> Bayar
										</button>
									</td>
								</tr>
							</tbody>
						</table>

			      </div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>			
      		</article>
  	</div>

	<!-- end row -->

	<!-- end row -->

</section>
<!-- end widget grid -->
<!-- Modal -->
<div class="modal fade" id="modalku" tabindex="-1" role="dialog" aria-labelledby="modalkuLabel" aria-hidden="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="modalkuLabel">Konfirmasi Pembayaran</h4>
			</div>
			<div class="modal-body">

				<table id="user" class="table table-bordered table-striped" style="clear: both">
							<tbody>
								<tr>
									<td style="width:35%;">Nomor Pendaftaran</td>
									<td style="width:65%">0344/055/3/05/2014</td>
								</tr>
								<tr>
									<td>Nama Pemohon</td>
									<td>MOH. MAHYUDDIN, SE </td>
								</tr>
								<tr>
									<td>Nomor Pembayaran</td>
									<td>
										<input class="form-control" placeholder="Nomor pembayaran" type="text">
									</td>
								</tr>
								<tr>
									<td>Retribusi</td>
									<td>Rp. 1.605.000 </td>
								</tr>
								<tr>
									<td>Denda</td>
									<td>Rp. 0 </td>
								</tr>

								<tr>
									<td>Keterlambatan</td>
									<td>2 Bulan</td>
								</tr>
								<tr>
									<td>Denda Keterlambatan</td>
									<td>4 bln x 2% x 300.000,-=24.000,- </td>
								</tr>
								<tr>
									<td>Total</td>
									<td>486.000,-</td>
								</tr>

								
							</tbody>
						</table>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Batal
				</button>
				<button type="button" class="btn btn-primary" id="eg7" data-dismiss="modal">
					Simpan
				</button>
			</div>
		</div><!-- /.modal-content -->
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
/*$('#eg7').click(function() {

		$.smallBox({
			title : "Data Berhasil Disimpan",
			content : "<i class='fa fa-save'></i><i> Klik disini untuk lihat data</i>",
			color : "#739E73",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 4000			
		});

	})
	}*/

		

</script>