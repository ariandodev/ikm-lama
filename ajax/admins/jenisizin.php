<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Jenis Izin
		</h1>
	</div>
</div>

<div class="well well-sm">
        <a data-toggle="modal" href="#tambahModal" class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah baru</a>        
        <a data-toggle="modal" href="#editModal" class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit yang dipilih</a>
        <a class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-trash-o"></i></span>Hapus dipilih</a>               
        <a class="btn btn-success btn-labeled"><span class="btn-label"><i class="fa fa-download"></i></span>Import</a>
        <a class="btn btn-success btn-labeled"><span class="btn-label"><i class="fa fa-upload"></i></span>Ekspor hasil</a>
</div>

<div class="well well-sm">
        <a data-toggle="modal" href="#tambahModal" class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah baru</a>        
        <a class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-plus"></i></span>Tambah baru</a>
        <a data-toggle="modal" href="#editModal" class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-edit"></i></span>Edit yang dipilih</a>
        <a class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-trash-o"></i></span>Hapus dipilih</a>               
        <a class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-download"></i></span>Pilihan Ekspor</a>
        <a class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-upload"></i></span>Pilihan Print / cetakan</a>
</div>

<div class="row">

<article class="col-sm-12 col-md-12 col-lg-12">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
<!-- widget options:
usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">


-->
<header>
	<span class="widget-icon"> <i class="fa fa-table"></i> </span>
	<h2>Tabel Pengambilan SK</h2>

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
	
		
		<table id="datatable_tabletools" class="table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
					<th data-hide="phone">&nbsp;</th>
					<th><input type="checkbox" id="selectall"></th>
					<th data-class="expand">&nbsp;</th>
					<th data-hide="phone,tablet">Nama Jenis Izin </th>
					<th data-hide="phone,tablet">Lama Proses </th>
					<th data-hide="phone,tablet">Berbayar</th>
					<th data-hide="phone,tablet">Icon</th>
					<th data-hide="phone,tablet">Terstruktur</th>
					<th data-hide="phone">Isaktif</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><a class="btn btn-primary btn-labeled" data-toggle="modal" href="#editModal"><span class="btn-label"><i class="fa fa-edit"></span></i>Edit</a></td>
					<td><input type="checkbox" id="selectA"></td>
					<td><a href="#" class="btn btn-link">Jenis Izin Permohonan</a></td>
					<td>IJIN MENDIRIKAN BANGUNAN (IMB) </td>
					<td>&nbsp;</td>
					<td>T</td>
					<td>&nbsp;</td>
					<td>T</td>
					<td>T</td>
				</tr>
				<tr>
					<td><a class="btn btn-primary btn-labeled" data-toggle="modal" href="#editModal"><span class="btn-label"><i class="fa fa-edit"></span></i>Edit</a></td>
					<td><input type="checkbox" id="selectB"></td>
					<td><a href="#" class="btn btn-link">Jenis Izin Permohonan</a></td>
					<td>IJIN REKLAME  </td>
					<td>&nbsp;</td>
					<td>F</td>
					<td>&nbsp;</td>
					<td>T</td>
					<td>T</td>
				</tr>
			</tbody>
		</table>

</div>

  </div>
	<!-- end widget content -->

</div>
<!-- end widget div -->

</div>
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
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'Tl>r>"+
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
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'Tl>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
	        "oTableTools": {
	        	 "aButtons": [	             
	             "xls",
	                {
	                    "sExtends": "pdf",
	                    "sTitle": "Jenis Izin",
	                    "sPdfMessage": "Ekspor Jenis Izin",
	                    "sPdfSize": "letter"
	                },
	             	{
                    	"sExtends": "print",
                    	"sMessage": "Tekan ESC untuk kembali"
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


<!-- Modal Tambah-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Jenis Izin, Tambah catatan baru
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form action="" id="login-form" class="smart-form">

							<fieldset>
								<section>
									<div class="row">
										<label class="label col col-2">Nama Jenis Izin</label>
										<div class="col col-10">
											<label class="input"> <i class="icon-append fa fa-file-text-o"></i>
												<input type="text" name="jenisiizin">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Lama Proses</label>
										<div class="col col-10">
											<label class="input"> <i class="icon-append fa fa-clock-o"></i>
												<input type="text" name="lamaproses">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Berbayar</label>
										<div class="col col-1">
											<label class="toggle">
											<input name="checkbox-toggle" checked="checked" type="checkbox">
											<i data-swchon-text="T" data-swchoff-text="F"></i></label>
										</div>										
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Icon</label>
										<div class="col col-10">
											<label for="file" class="input input-file">
												<div class="button"><input name="file" onchange="this.parentNode.nextSibling.value = this.value" type="file">Browse</div><input placeholder="Upload file" readonly="" type="text">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Terstruktur</label>
										<div class="col col-1">
											<label class="toggle">
											<input name="checkbox-toggle" checked="checked" type="checkbox">
											<i data-swchon-text="T" data-swchoff-text="F"></i></label>
										</div>										
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Isaktif</label>
										<div class="col col-1">
											<label class="toggle">
											<input name="checkbox-toggle" checked="checked" type="checkbox">
											<i data-swchon-text="T" data-swchoff-text="F"></i></label>
										</div>										
									</div>
								</section>
							</fieldset>
							
							<footer>
								<button type="submit" class="btn btn-primary" data-dismiss="modal">
									<i class="fa fa-save"></i> Simpan
								</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">
									<i class="fa fa-times"></i> Batal
								</button>

							</footer>
						</form>						
						

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Edit-->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="tambahModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Jenis Izin, Edit catatan
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form action="" id="login-form" class="smart-form">

							<fieldset>
								<section>
									<div class="row">
										<label class="label col col-2">Nama Jenis Izin</label>
										<div class="col col-10">
											<label class="input"> <i class="icon-append fa fa-file-text-o"></i>
												<input type="text" name="jenisiizin">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Lama Proses</label>
										<div class="col col-10">
											<label class="input"> <i class="icon-append fa fa-clock-o"></i>
												<input type="text" name="lamaproses">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Berbayar</label>
										<div class="col col-1">
											<label class="toggle">
											<input name="checkbox-toggle" checked="checked" type="checkbox">
											<i data-swchon-text="T" data-swchoff-text="F"></i></label>
										</div>										
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Icon</label>
										<div class="col col-10">
											<label for="file" class="input input-file">
												<div class="button"><input name="file" onchange="this.parentNode.nextSibling.value = this.value" type="file">Browse</div><input placeholder="Upload file" readonly="" type="text">
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Terstruktur</label>
										<div class="col col-1">
											<label class="toggle">
											<input name="checkbox-toggle" checked="checked" type="checkbox">
											<i data-swchon-text="T" data-swchoff-text="F"></i></label>
										</div>										
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-2">Isaktif</label>
										<div class="col col-1">
											<label class="toggle">
											<input name="checkbox-toggle" checked="checked" type="checkbox">
											<i data-swchon-text="T" data-swchoff-text="F"></i></label>
										</div>										
									</div>
								</section>
							</fieldset>
							
							<footer>
								<button type="submit" class="btn btn-primary" data-dismiss="modal">
									<i class="fa fa-save"></i> Simpan
								</button>
								<button type="button" class="btn btn-danger" >
									<i class="fa fa-refresh"></i> Reset
								</button>
								<div class="pull-left">
								<a class="btn btn-default"><i class=" fa fa-chevron-right"></i></a>
								<a class="btn btn-warning"><i class="fa fa-mail-reply"></i> Kembali</a>
								<a class="btn btn-default"><i class=" fa fa-chevron-left"></i></a>
								</div>
							</footer>
						</form>						
						

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->