<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Penomoran SK
		</h1>
	</div>
</div>
<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-28" data-widget-editbutton="false" data-widget-deletebutton="false">
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
											<li data-target="#step3">
												<span class="step">3</span> <span class="title">Kasir</span>
											</li>
											<li class="active" data-target="#step4">
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
										<div class="tab-pane" id="tab3">
											<br>
											<h3><strong>Step 3</strong> - Kasir</h3>
										</div>
										<div class="tab-pane active" id="tab4">
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
	<article class="col-sm-12 col-md-12 col-lg-12">
		<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-3" data-widget-editbutton="false" data-widget-custombutton="false">
				<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-23" data-widget-editbutton="false">
					
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
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>PENOMORAN SK</h2>				
					
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
						
						<form action="" id="order-form" class="smart-form" novalidate>
							<header>
							Nomor Pendaftaran : <label class="input"> <i class="icon-append fa fa-search"></i>
											<input class="form-control" id="title" name="title" placeholder="Ketikan Nomor Pendaftaran untuk mencari cepat" type="text"
									data-autocomplete='[
									"1150/08/2014 ( JOHAN FUADI ) ( SABDA JAYA )",
									"1144/08/2014 ( ANGGRAENI SULISTYANINGSIH ) ( PONDOK WISATA WISMA HS )",
									"1124/08/2014 ( DR. HERMAWAN ) ( RUMAH MAKAN PRIMA )",
									"1117/08/2014 ( KODAR ) ( LAEKO COLLECTION )",
									"1115/08/2014 ( PRISTIYANTO ) ( ZIDAN JAYA )"]'>
											
										</label>
							</header>
							<table id="user" class="table table-bordered table-striped" style="clear: both">
							<tbody>
								<tr>
									<td style="width:35%;">Nomor Pendaftaran</td>
									<td style="width:65%"><a href="form-x-editable.html#" id="username" data-type="text" data-pk="1" data-original-title="Enter username">1117/08/2014  LOG</a></td>
								</tr>
								<tr>
									<td>Jenis Izin</td>
									<td>Tanda Daftar Industri (TDI)</td>
								</tr>
								<tr>
									<td>Jenis Permohonan</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Nama Pemohon</td>
									<td>-</td>
								</tr>
								<tr>
									<td>SNama Usaha</td>
									<td>-</td>
								</tr>

								<tr>
									<td>Nomor KTP/NPWP</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Nomor Telepon</td>
									<td>-</td>
								</tr>

								<tr>
									<td>Lokasi/ Usaha / Bangunan</td>
									<td>-</td>
								</tr>

								<tr>
									<td>Kecamatan</td>
									<td>-</td>
								</tr>

								<tr>
									<td>Kelurahan</td>
									<td>-</td>
								</tr>

								<tr>
									<td>Keterangan</td>
									<td> - </td>
								</tr>

								<tr>
									<td>Multi Daftar dengan</td>
									<td>-</td>
								</tr>

								
							</tbody>
						</table>


			<form action="" id="order-form" class="smart-form" novalidate>

							<fieldset>
                            
                            <div class="row">
									<section class="col col-6">
                                 <label class="input"> <i class="icon-append fa fa-list-ol"></i>
											<input type="text" name="nosk" placeholder="Nomor SK" >
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Nomor SK</b>
								   </label>
                                  </section>
                                </div>
                            
                            <div class="row">
									<section class="col col-6">
                                 <label class="input"> <i class="icon-append fa fa-calendar "></i>
											<input type="text" name="tgl1" placeholder="Tanggal Pengesahan" class="datepicker" data-dateformat="dd/mm/yy">
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal Pengesahan</b>
								   </label>
                                  </section>
                                </div>
                                
                                <div class="row">
									<section class="col col-6">
                                 <label class="input"> <i class="icon-append fa fa-calendar "></i>
											<input type="text" name="tgl2" placeholder="Tanggal Berlaku" class="datepicker" data-dateformat="dd/mm/yy">
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal Berlaku</b>
								   </label>
                                  </section>
                                </div>
                                
                                <div class="row">
										<div class="col col-6">
                                        <section>
											<label class="checkbox">
												<input type="checkbox" name="checkbox">
												<i></i>Selamanya</label>
                                        </section>
                                </div>
                                
                                </fieldset>                            			
							<footer>
								<button type="submit" class="btn btn-success" id="eg7">
									<i class="fa fa-save"></i> Update Jadwal
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->		
	</article>
</div>

<div class="row">

<article class="col-sm-12 col-md-12 col-lg-12">

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
	<h2> Laporan Penomoran SK </h2>

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
					<th data-hide="phone">Jenis Izin </th>
					<th data-hide="phone,tablet">Nomor Daftar </th>
					<th data-class="expand">Nama Pemohon </th>
					<th data-hide="phone">Nama Usaha </th>
					<th data-hide="phone,tablet">Alamat Usaha </th>
					<th data-hide="phone">Nomor. SK / TDP / IPPSBW</th>
					<th data-hide="phone,tablet,desktop">Tanggal Pengesahan</th>
					<th data-hide="phone,tablet,desktop">Tanggal Berlaku</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Tanda Daftar Perusahaan (TDP)</td>
					<td>1159/08/2014&nbsp;</td>
					<td>ADITYA RAKATAMA&nbsp;&nbsp;</td>
					<td>RUMAH TEMPAT TINGGAL&nbsp;</td>
					<td>-</td>
					<td>112234701227</td>
					<td>25 Agustus 2014&nbsp; 2019&nbsp;&nbsp;</td>
					<td>25 Agustus 2014&nbsp; 2019&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Tanda Daftar Perusahaan (TDP)</td>
					<td>1152/08/2014&nbsp;</td>
					<td>ANGGRAENI SULISTYANINGSIH&nbsp;</td>
					<td>PONDOK WISATA WISMA HS&nbsp;</td>
					<td>-</td>
					<td>112234701227</td>
					<td>25 Agustus 2014&nbsp;&nbsp;</td>
					<td>25 Agustus 2014&nbsp; 2019&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Tanda Daftar Perusahaan (TDP)</td>
					<td>1144/08/2014&nbsp;</td>
					<td>Hj. DARI TAROJI&nbsp;</td>
					<td>BINTANG GARUDA&nbsp;</td>
					<td>-</td>
					<td>112234701227</td>
					<td>25 25 Agustus 2014&nbsp; 2014&nbsp;</td>
					<td>25 Agustus 2014&nbsp; 2019&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>4</td>
					<td>Tanda Daftar Perusahaan (TDP)</td>
					<td>1140/08/2014&nbsp;</td>
					<td>MUTMAINAH&nbsp;</td>
					<td>RUMAH TEMPAT TINGGAL DAN GARASI&nbsp;</td>
					<td>-</td>
					<td>112234701227</td>
					<td>25 Agustus 2014&nbsp;</td>
					<td>25 Agustus 2014&nbsp; 2019&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>5</td>
					<td>Tanda Daftar Perusahaan (TDP)</td>
					<td>1133/08/2014&nbsp;</td>
					<td>NAVRIZAL RIVA&nbsp;</td>
					<td>GUDANG&nbsp;</td>
					<td>-</td>
					<td>112234701227</td>
					<td>25 25 Agustus 2014&nbsp; 2014&nbsp;&nbsp;</td>
					<td>25 Agustus 2014&nbsp; 2019&nbsp;&nbsp;</td>
				</tr>
			</tbody>
		</table>

  </div>
	<!-- end widget content -->

</div>
<!-- end widget div -->

</div>
<!-- end widget -->

<!-- Widget ID (each widget will need unique ID)-->
<!-- end widget -->
<!-- Widget ID (each widget will need unique ID)-->
<!-- end widget -->
<!-- Widget ID (each widget will need unique ID)-->
<!-- end widget -->

</article>
</div>

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
			"sDom" : "<'dt-top-row'><'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
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
			"sDom" : "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"oTableTools" : {
				"aButtons" : ["copy", "print", {
					"sExtends" : "collection",
					"sButtonText" : 'Save <span class="caret" />',
					"aButtons" : ["csv", "xls", "pdf"]
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

	}
	
	$('#eg7').click(function() {

		$.smallBox({
			title : "Jadwal Telah Terupdate",
			content : "<i class='fa fa-save'></i><i> Klik disini untuk lihat jadwal</i>",
			color : "#739E73",
			iconSmall : "fa fa-thumbs-up bounce animated",
			timeout : 4000			
		});

	})	

</script>-->
<!-- skrip lama -->