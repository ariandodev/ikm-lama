<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<div class="row">
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
		<h3 class="page-title txt-color-blueDark">
			<i class="fa fa-group  fa-fw "></i> 
			Saran
		</h3>
	</div>
</div>
<hr>
<section id="widget-grid">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-saran" data-widget-custombutton="false" data-widget-fullscreenbutton="false"  data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false">
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
				<h2> Saran </h2>

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
					<button class="btn btn-sm btn-warning" onclick="cetak()"><i class="fa fa-print"></i> Cetak Saran</button>	
					<table id="dt_basic" class="table table-striped table-bordered smart-form">
						<thead>
							<tr>
								<th width="5"><div align="center">No</div></th>
								<th><div align="center">Nama Pengirim</div></th>
								<th><div align="center">Saran</div></th>
								<th><div align="center">Tanggal Kirim</div></th>
								<th><div align="center">&nbsp;</div></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($datasaran as $saran) : ?>
							<tr class="odd gradeX">
								<td><?php echo $no++;?></td>
								<td><?php echo $saran['tblhasilsurvei_nama'];?></td>
								<td><?php echo $saran['tblhasilsurvei_saran'];?></td>
								<td><?php echo $saran['tblhasilsurvei_syscreate'];?></td>
								<td>
									<button onclick="edit(<?php echo $saran['tblhasilsurvei_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:130px; height:30px;">
										<i class="fa fa-edit"></i>
										Edit Saran
									</button>

								</td>
							</tr>
						<?php endforeach ?>

					</tbody>
				</table>
			</div>
			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>
</article>
</div>

<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" aria-hidden="false" data-keyboard="false" data-backdrop="static" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<i class="fa  fa-fw fa-file"></i> Form Isian Saran
				</h4>
			</div>
			<div class="modal-body no-padding">
				<form class="smart-form" id="kecamatan_form_isian" novalidate="novalidate">
					<fieldset>
						<div id="form-edit">
							<div class="row">
								<section class="col col-md col-2" >
									<p>Saran</p>
								</section>
								<section class="col col-md col-10">
									<label class="input">
										<input class="form-control" type="text" name="tblhasilsurvei_saran" id="tblhasilsurvei_saran">
									</label>
								</section>
							</div>
						</div>
					</fieldset>
					<footer>
						<button onclick="simpansaran()" class="btn btn-primary">
							<i class="fa fa-save"></i> Simpan
						</button>
						<button type="button" class="btn btn-default"  data-dismiss="modal">
							<i class="fa fa-times"></i> Batal
						</button>
					</footer>
				</form>             
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal urusan-->
</section>



<script type="text/javascript">
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();
	
	// PAGE RELATED SCRIPTS
	

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


	

	//MODAL
	$('#modal_link').click(function() {
		$('#dialog-message').dialog('open');
		return false;
	});	

	function cetak () {
		window.open('<?php echo Yii::app()->getbaseUrl(true); ?>/app/refhasilsurvey/Cetak');
	}

	function simpansaran () {
		$.ajax({
			url: 'app/refhasilsurvey/simpan',
			type: 'POST',
			data: {	
				id : window.idsaran,
				tblhasilsurvei_saran: $("#tblhasilsurvei_saran").val(),
			},
			success: function  (respon) {
				if (respon=='success') {
					notifikasi("Sukses","Data berhasil disimpan","success");
				}
				else{
					notifikasi("Gagal","Data gagal disimpan","failed");
				}
			}
		});
		$('#modaledit').modal('hide');
	}

	function edit(idsurvey) {
		window.idsaran = idsurvey;
		$.ajax({
			url: 'app/refhasilsurvey/GetData',
			type: 'POST',
			dataType: 'json',
			data: {
				id: idsurvey
			},
			success: function(respon) {
				$('#tblhasilsurvei_saran').val(respon.tblhasilsurvei_saran);
			}
		});
		$('#modaledit').modal('show');
	}

</script>