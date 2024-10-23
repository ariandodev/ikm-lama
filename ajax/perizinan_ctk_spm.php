<?php define('ASSETS_URL', 'themes/smartadmin'); ?>


<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Cetak SPM
		</h1>
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
											<li class="active" data-target="#step2">
												<span class="step">2</span> <span class="title">Pencetakan</span>
											</li>
											<li data-target="#step3">
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
										<div class="tab-pane active" id="tab2">
											<br>
											<h3><strong>Step 2</strong> - Pencetakan</h3>
										</div>
										<div class="tab-pane" id="tab3">
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
<div class="row">
	<div class="col-sm-12">
		
	  <div class="well">
			<button class="close" data-dismiss="alert">
					x
			</button>
			<h1 class="semi-bold">B.5.  Apa itu "Cetak SPM" ?</h1>
		<p class="text-justify">Pada aplikasi ini memungkinkan kita dalam melakkan pembuatan SPM, dimana terdapat fitur cetak untuk melakukan pencetakannya.</p>
	  </div>

		
	</div>
</div>

<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
		<span class="widget-icon"> <i class="fa fa-search"></i> </span>
		<h2>Pencarian</h2>

	</header>

<!-- widget div-->
<div>
<!-- widget content -->
	<div>
	<form class="form-inline" role="form">
		<div class="row">
		<div class="col-md-6">				  
		  <label class="input"> 
			<input class="form-control" id="title" name="title" placeholder="Pencarian Cepat" type="text" style="margin-top: -5px; width: 407px;">						
			</label>			
		</div>
		</div>
		<a data-target="#edit" data-toggle="modal" class="btn btn-primary">
			Cari
		</a>
		<label class="hidden-sm">
		(Ketikkan Nama Pemohon atau Nama Jenis Permohonan)		
		</label>
		</form>
	</div><br />
<!-- end widget content -->
</div>
<!-- end widget div -->

</div><!-- widget grid -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editmodal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>				
				<h4 class="modal-title" id="myModalLabel">Cetak SPM</h4>				
			</div>
			<div class="modal-body no-padding">

				<form action="" id="login-form" class="smart-form">

							<fieldset>
								<section>
									<div class="row">
										<label class="label col col-3">Nomor SPM</label>
										<div class="col col-5">
											<label class="input"> <i class="icon-append fa fa-list"></i>
												<input type="text" name="nospm">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Tanggal Jatuh Tempo</label>
										<div class="col col-5">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="tgl1" class="datepicker" data-dateformat="dd/mm/yy">
											</label>
										</div>
									</div>
								</section>
								
								<section>
									<div class="row">
										<label class="label col col-3">Tanggal SPM</label>
										<div class="col col-5">
											<label class="input"> <i class="icon-append fa fa-calendar"></i>
												<input type="text" name="tgl2" class="datepicker" data-dateformat="dd/mm/yy">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Tahun</label>
										<div class="col col-5">
											<label class="input"> <i class="icon-append fa fa-calendar-o"></i>
												<input type="text" name="tahun">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">NPWP</label>
										<div class="col col-6">
											<label class="input"> <i class="icon-append fa fa-list"></i>
												<input type="text" name="npwp">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Nilai Retribusi</label>
										<div class="col col-6">
											<label class="input"> <i class="icon-append fa fa-money"></i>
												<input type="text" name="nilret">
											</label>
										</div>
									</div>
								</section>

								<section>								
									<div class="row">
										<label class="label col col-3">Denda</label>
										<div class="col col-3">
											<label class="input"> <i class="icon-append fa fa-credit-card"></i>
												<input type="text" name="denda">
											</label>
										</div>
										<label style="margin-top: 5px;">
											Bulan
										</label>
									</div>																									
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Kenaikan</label>
										<div class="col col-5">
											<label class="input"> <i class="icon-append fa fa-caret-square-o-up "></i>
												<input type="text" name="nospm">
											</label>
										</div>
									</div>
								</section>
							</fieldset>
							<footer>
							
								<a class="btn btn-primary" data-dismiss="modal" id="eg7">
									Simpan
								</a>

							
							</footer>
						</form>						
						

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-12" data-widget-togglebutton="false" data-widget-colorbutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false" data-widget-deletebutton="false" data-widget-editbutton="false">
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
					<h2>Tabel Cetak SPM </h2>

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

						<table id="dt_basic" class="table table-striped table-bordered smart-form" width="100%">
							<thead>
								<tr>
									<th data-hide="phone">No</th>
									<th data-class="expand">Nama Pemohon</th>
									<th data-hide="phone">Nama Usaha / Bangunan</th>
									<th data-hide="phone,tablet">Lokasi Izin</th>
									<th data-hide="phone">Jenis Izin</th>
									<th data-hide="phone,tablet,desktop">Nomor SPM</th>
									<th data-hide="phone,tablet,desktop">Tanggal SPM</th>
									<th data-hide="phone,tablet">Nilai Retribusi</th>
									<th data-hide="phone,tablet"> Denda</th>
									<th data-hide="phone,tablet">Kenaikan</th>
									<th data-hide="phone,tablet">Total Retribusi</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>WARDONO</td>
									<td>SINAR LAUT</td>
									<td>&nbsp;</td>
									<td>Izin Gangguan / HO</td>
									<td>0793 </td>
									<td>04/12/2012</td>
									<td>Rp. 288.000</td>
									<td>Rp. 0</td>
									<td>Rp. 0</td>
									<td>&nbsp;</td>
								  <td>
									<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
								    	data-content="
								        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
								        <button class='btn btn-primary btn-sm' type='submit'>Cetak HTML</button>
								        <button class='btn btn-success btn-sm' type='submit'>Cetak Excel</button>
								        <button class='btn btn-warning btn-sm' type='button'>Sistem Proses</button>                                                            
								        </div></div></div>" 
								    data-html="true"><i class="fa fa-gear"></i></a>
								</td>
								</tr>
								<tr>
									<td>2</td>
									<td>WARDONO</td>
									<td>SINAR LAUT</td>
									<td>&nbsp;</td>
									<td>Izin Gangguan / HO</td>
									<td>0049 </td>
									<td>03/02/2013</td>
									<td>Rp. 2.227.500</td>
									<td>Rp. 0</td>
									<td>Rp. 0</td>
									<td>&nbsp;</td>
									<td>
									<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
								    	data-content="
								        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
								        <button class='btn btn-primary btn-sm' type='submit'>Cetak HTML</button>
								        <button class='btn btn-success btn-sm' type='submit'>Cetak Excel</button>
								        <button class='btn btn-warning btn-sm' type='button'>Sistem Proses</button>                                                            
								        </div></div></div>" 
								    data-html="true"><i class="fa fa-gear"></i></a>
								</td>
								</tr>
								<tr>
									<td>3</td>
									<td>WARDONO</td>
									<td>LANCAR JAYA</td>
									<td>&nbsp;</td>
									<td>Izin Gangguan / HO</td>
									<td>1069</td>
									<td>02/10/2014</td>
									<td>Rp. 306.000</td>
									<td>Rp. 0</td>
									<td>Rp. 0</td>
									<td>&nbsp;</td>
									<td>
									<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
								    	data-content="
								        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
								        <button class='btn btn-primary btn-sm' type='submit'>Cetak HTML</button>
								        <button class='btn btn-success btn-sm' type='submit'>Cetak Excel</button>
								        <button class='btn btn-warning btn-sm' type='button'>Sistem Proses</button>                                                            
								        </div></div></div>" 
								    data-html="true"><i class="fa fa-gear"></i></a>
								</td>
								</tr>
								<tr>
									<td>4</td>
									<td>SUHARDI</td>
									<td>LANCAR JAYA</td>
									<td>&nbsp;</td>
									<td>SIPI (Surat Izin Penangkapan Ikan) </td>
									<td>1059 </td>
									<td>01/01/2013</td>
									<td>Rp. 484.500</td>
									<td>Rp. 0</td>
									<td>Rp. 0</td>
									<td>&nbsp;</td>
									<td>
									<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
								    	data-content="
								        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
								        <button class='btn btn-primary btn-sm' type='submit'>Cetak HTML</button>
								        <button class='btn btn-success btn-sm' type='submit'>Cetak Excel</button>
								        <button class='btn btn-warning btn-sm' type='button'>Sistem Proses</button>                                                            
								        </div></div></div>" 
								    data-html="true"><i class="fa fa-gear"></i></a>
								</td>
								</tr>
								<tr>
								  <td>5</td>
								  <td>SUHARDI</td>
								  <td>LANCAR JAYA</td>
								  <td>&nbsp;</td>
								  <td>SIPI (Surat Izin Penangkapan Ikan) </td>
								  <td>1116</td>
								  <td>16/02/2013</td>
								  <td>Rp. 50.000</td>
								  <td>Rp. 0</td>
								  <td>Rp. 0</td>
								  <td>&nbsp;</td>
								  <td>
									<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
								    	data-content="
								        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
								        <button class='btn btn-primary btn-sm' type='submit'>Cetak HTML</button>
								        <button class='btn btn-success btn-sm' type='submit'>Cetak Excel</button>
								        <button class='btn btn-warning btn-sm' type='button'>Sistem Proses</button>                                                            
								        </div></div></div>" 
								    data-html="true"><i class="fa fa-gear"></i></a>
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
</section>		

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

<!-- skrip lama -->
<!--<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();
	
	// PAGE RELATED SCRIPTS

	/* remove previous elems */
	
	if($('.DTTT_dropdown.dropdown-menu').length){
		$('.DTTT_dropdown.dropdown-menu').remove();
	}

	loadDataTableScripts();
	function loadDataTableScripts() {

		loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables-cust.min.js", dt_2);

		function dt_2() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/ColReorder.min.js", dt_3);
		}

		function dt_3() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/FixedColumns.min.js", dt_4);
		}

		function dt_4() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/ColVis.min.js", dt_5);
		}

		function dt_5() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/ZeroClipboard.js", dt_6);
		}

		function dt_6() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/media/js/TableTools.min.js", dt_7);
		}

		function dt_7() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/DT_bootstrap.js", runDataTables);
		}

	}

	function runDataTables() {

		/*
		 * BASIC
		 */
		$('#dt_basic').dataTable({
			"sPaginationType" : "bootstrap_full"
		});

		/* END BASIC */

		/* Add the events etc before DataTables hides a column */
		$("#datatable_fixed_column thead input").keyup(function() {
			oTable.fnFilter(this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $("thead input").index(this)));
		});

		$("#datatable_fixed_column thead input").each(function(i) {
			this.initVal = this.value;
		});
		$("#datatable_fixed_column thead input").focus(function() {
			if (this.className == "search_init") {
				this.className = "";
				this.value = "";
			}
		});
		$("#datatable_fixed_column thead input").blur(function(i) {
			if (this.value == "") {
				this.className = "search_init";
				this.value = this.initVal;
			}
		});		
		

		var oTable = $('#datatable_fixed_column').dataTable({
			"sDom" : "<'dt-top-row'l><'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			//"sDom" : "t<'row dt-wrapper'<'col-sm-6'i><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'>>",
			"oLanguage" : {
				"sSearch" : "Search all columns:"
			},
			"bSortCellsTop" : true
		});		
		


		/*
		 * COL ORDER
		 */
		$('#datatable_col_reorder').dataTable({
			"sPaginationType" : "bootstrap",
			"sDom" : "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"fnInitComplete" : function(oSettings, json) {
				$('.ColVis_Button').addClass('btn btn-default btn-sm').html('Columns <i class="icon-arrow-down"></i>');
			}
		});
		
		/* END COL ORDER */

		/* TABLE TOOLS */
		$('#datatable_tabletools').dataTable({
			"sDom" : "<'dt-top-row'Tl>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"oTableTools" : {
				"aButtons" : [  {
					"sExtends" : "collection",
					"sButtonText" : 'Save <span class="caret" />',
					"aButtons" : ["xls", "pdf"]
				}],
				"sSwfPath" : "<?php echo ASSETS_URL; ?>/js/plugin/datatables/media/swf/copy_csv_xls_pdf.swf"
			},
			"fnInitComplete" : function(oSettings, json) {
				$(this).closest('#dt_table_tools_wrapper').find('.DTTT.btn-group').addClass('table_tools_group').children('a.btn').each(function() {
					$(this).addClass('btn-sm btn-default');
				});
			}
		});
		
		/* END TABLE TOOLS */
		
		/*
	 * AUTO COMPLETE AJAX
	 */


	function log(message) {
		$("<div>").text(message).prependTo("#log");
		$("#log").scrollTop(0);
	}

	$("#city").autocomplete({
		source : function(request, response) {
			$.ajax({
				url : "http://ws.geonames.org/searchJSON",
				dataType : "jsonp",
				data : {
					featureClass : "P",
					style : "full",
					maxRows : 12,
					name_startsWith : request.term
				},
				success : function(data) {
					response($.map(data.geonames, function(item) {
						return {
							label : item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
							value : item.name
						}
					}));
				}
			});
		},
		minLength : 2,
		select : function(event, ui) {
			log(ui.item ? "Selected: " + ui.item.label : "Nothing selected, input was " + this.value);
		}
	});
	
	$('#eg7').click(function() {

		$.smallBox({
			title : "Data Berhasil Disimpan",
			content : "<i class='fa fa-save'></i><i> Klik disini untuk lihat data</i>",
			color : "#739E73",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 4000			
		});

	})

		
	}
	 var data_autocomplete = [
		{
		value: "1150/08/2014 ( WARDONO) ( SINAR LAUT )"
		},
		{
		value: "1124/08/2014 ( DR. HERMAWAN ) ( RUMAH MAKAN PRIMA )"
		},
		{
		value: "1117/08/2014 ( KODAR ) ( LAEKO COLLECTION )"
		}
	];
		
	$( "#title" ).autocomplete({
      source: data_autocomplete,
      minLength: 0,
      select: function( event, ui ) {
		  $("#title").val(this.value);
		  editBOX();
      },
      open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    });
	
	function editBOX() {
		$('#edit').modal('show');
	}

</script>-->
<!-- skrip lama -->