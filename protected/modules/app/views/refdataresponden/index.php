<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<div class="row">
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
		<h3 class="page-title txt-color-blueDark">
			<i class="fa fa-group  fa-fw "></i> 
			Responden
		</h3>
	</div>
</div>
<hr>

<div class="row">
	<div class="col-sm-12">
		
		<div class="well">
			<button class="close" data-dismiss="alert">
				x
			</button>
			<h1 class="semi-bold">B.  Apa itu "Laporan Responden" ?			</h1>
			<p class="text-justify">Merupakan laporan data daftar pengisian pertanyaan IKM yang diberikan saat melakukan pengambilan SK Izin <BR>
			</p>
		</div>

		
	</div>
</div>

<section id="widget-grid">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-respon" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-fullscreenbutton="false"  data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false">
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
					<h2> Responden </h2>

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
									<th width="10"><div align="center">No</div></th>
									<th width="25">Nama Responden </th>
									<th width="25"><div align="center">Jenis Izin </div></th>
									<th width="25"><div align="center">&nbsp;</div></th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($dataresponden as $responden) :?>
								<tr class="odd gradeX">
									<td><?php echo $no++;?></td>
									<td><?php echo $responden['tblhasilsurvei_nama'];?></td>
									<td><?php echo $responden['refjenisizinikm_nama'];?></td>
									<td>
										<button onclick="edit(<?php echo $responden['tblhasilsurvei_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:130px; height:30px;">
											<i class="fa fa-edit"></i>
											Edit Jawaban
										</button>
										<button onclick="hapus(<?php echo $responden['tblhasilsurvei_id']; ?>)" type="button" class="btn btn-labeled btn-danger btn-sm" style="width:130px; height:30px;">
											<i class="fa fa-trash"></i>
											Hapus Jawaban
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

<div class="row" id="tabel" style="display:none">


</div>


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
	    
	    /* END COLUMN SHOW - HIDE */

	    /* TABLETOOLS */
	    /*$('#datatable_tabletools').dataTable({
	    	
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
		});*/

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

})*/


	/*function simpan () {
		$("#eg7").click();
	};*/

	//MODAL
	$('#modal_link').click(function() {
		$('#dialog-message').dialog('open');
		return false;
	});	




	// With Callback
	/*$("#smart-mod-eg1").click(function(e) {
		$.SmartMessageBox({
			title : "Anda yakin ingin menghapus data ini!",
			content : "Data Yang sudah dihapus tidak dapat dikembalikan lagi",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {

				$.smallBox({
					title : "Callback function",
					content : "<i class='fa fa-clock-o'></i> <i>Data Berhasil Di Hapus</i>",
					color : "#659265",
					iconSmall : "fa fa-check fa-2x fadeInRight animated",
					timeout : 4000
				});
			}
			if (ButtonPressed === "No") {
				$.smallBox({
					title : "Callback function",
					content : "<i class='fa fa-clock-o'></i> <i>Data batal di hapus</i>",
					color : "#C46A69",
					iconSmall : "fa fa-times fa-2x fadeInRight animated",
					timeout : 4000
				});
			}

		});
		e.preventDefault();
		$.SmartMessageBox({
			title : "Anda yakin ingin menghapus data ini!",
			content : "Data Yang sudah dihapus tidak dapat dikembalikan lagi",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {

				$.smallBox({
					title : "Callback function",
					content : "<i class='fa fa-clock-o'></i> <i>Data Berhasil Di Hapus</i>",
					color : "#659265",
					iconSmall : "fa fa-check fa-2x fadeInRight animated",
					timeout : 4000
				});
			}
			if (ButtonPressed === "No") {
				$.smallBox({
					title : "Callback function",
					content : "<i class='fa fa-clock-o'></i> <i>Data batal di hapus</i>",
					color : "#C46A69",
					iconSmall : "fa fa-times fa-2x fadeInRight animated",
					timeout : 4000
				});
			}

		});
		e.preventDefault();
	});	*/
/*function hapus() {
	$.SmartMessageBox({
		title : "Anda yakin ingin menghapus data ini!",
		content : "Data Yang sudah dihapus tidak dapat dikembalikan lagi",
		buttons : '[No][Yes]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Yes") {

			$.smallBox({
				title : "Callback function",
				content : "<i class='fa fa-clock-o'></i> <i>Data Berhasil Di Hapus</i>",
				color : "#659265",
				iconSmall : "fa fa-check fa-2x fadeInRight animated",
				timeout : 4000
			});
		}
		if (ButtonPressed === "No") {
			$.smallBox({
				title : "Callback function",
				content : "<i class='fa fa-clock-o'></i> <i>Data batal di hapus</i>",
				color : "#C46A69",
				iconSmall : "fa fa-times fa-2x fadeInRight animated",
				timeout : 4000
			});
		}

	});
}*/




function edit(idsurvey) {

	$("html, body").animate({ scrollTop: 800 }, "slow");
	$("#tabel").slideDown(300);

	$.ajax({
		url: 'app/refdataresponden/GetTabelResponden',
		type: 'POST',
		data: {id: idsurvey},
		success : function (respon) {
			$('#tabel').html(respon);	
		}

	});
	

}

function hapus(idsurvey) {
	$.ajax({
		url: 'app/refdataresponden/Hapus',
		type: 'POST',
		data: {id: idsurvey},
		success : function (respon) {
			if (respon=='success') {
				notifikasi("Sukses","Data berhasil dihapus","success");
			}
			else{
				notifikasi("Gagal","Data gagal dihapus","failed");
			}
		}	
	});	

}



function simpan(id, kolom, nilai) {
	$.ajax({
		url: 'app/refdataresponden/simpan',
		type: 'POST',
		data: {	
			id : id,
			kolom : kolom,
			nilai : nilai,
			
		},
		success: function  (respon) {
			if (respon!='success') {

				notifikasi("Sukses","Data berhasil disimpan","success");
			}
			else
				notifikasi("Gagal","Data gagal disimpan","failed");
		}
	});
}



</script>