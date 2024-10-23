
<?php define('ASSETS_URL', 'themes/smartadmin'); ?>


<div class="row">
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-4">
    <h3 class="page-title txt-color-blueDark">
      <i class="fa fa-group  fa-fw "></i> 
      Jenis Izin
    </h3>
  </div>
</div>
<hr>
<div class="well well-sm well-light">	

	<button onclick="tambah()" type="button" class="btn btn-labeled btn-primary">
		<span class="btn-label">
			<i class="fa fa-plus "></i>
		</span>Tambah Jenis Izin
	</button>
</div>


<!-- widget grid -->

<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START --><!-- WIDGET END -->

        <!-- NEW WIDGET START -->
        <article class="col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
           
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
           

            <!-- widget div-->
            <div style="display:none" id="form-jenis">
             <header>
                <h2>Form Jenis Izin </h2>
            </header>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->
                   
                   <div class="well no-padding">
                   <form  id="jenis_kelamin" class="smart-form">
					<div id="attachement" style="padding: 20px;">
						<div class="row" >
							<section class="col col-2">
							<label for="label" >Nama Loket </label>
							</section>
							<section class="col col-5">
								<select class="form-control" id="nama_loket">
									<option value="">===Pilih Nama Loket===</option>
									<?php foreach ($comboloket as $loket){
										echo '<option value="'.$loket['refloket_id'].'">'.$loket['refloket_nama'].'</option>';
											}
									?>
								</select>
							</section>
						</div>
						<div class="row">
							<section class="col col-2">
								<label for="label">Nama Izin </label>
							</section>
							<section class="col col-5">
								 <input class="form-control" placeholder="Nama Izin" type="text" id="nama_izin">
							</section>
						</div>
						<div class="row">
						    <section class="col col-2">
						          <label>Aktif</label>
						    </section>
						    <section class="col col-5">
						    	<label class="select">
						    	<select name="nama_aktif" id="nama_aktif">
						    		<option value="">===Silahkan Pilih===</option>
						    		<option value="T">Ya</option>
						    		<option value="F">Tidak</option>
						    	</select>
						    	</label>
						    </section>
						</div>

                        <footer>
                            <button class="btn btn-success btn-sm pull-left" type="button" onclick="simpan()">
                            <i class="fa  fa-save ">&nbsp;</i>Simpan
                            </button>
                            <button class="btn btn-default btn-sm pull-left" type="button" onclick="batal()">
                            <i class="fa  fa-ban ">&nbsp;</i>Batal
                            </button>
                        </footer>
                    </form>
                    </div>

                    </div>
               </article>

               <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1432" data-widget-custombutton="false" data-widget-fullscreenbutton="false"  data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false">


                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2>Jenis Izin </h2>

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


                                      <table id="datatable_tabletools" class="table table-striped table-bordered smart-form">
                                        <thead>
                                            <tr>
                                              <th><div align="center">No</div></th>
                                              <th><div align="center">Nama Loket</div></th>
                                              <th><div align="center">Nama Jenis Izin</div></th>
                                              <th><div align="center">Aktif</div></th>
                                              <th>&nbsp;</th>
                                          </tr>
                             
                                    </thead>
                                    <tbody>
                                    	<php <?php $no=1; foreach ($dataizin as $izin): ?>
                                    		
                               
                                        <tr class="odd gradeX">
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $izin['refloket_nama'];?></td>
                                            <td><?php echo $izin['refjenisizinikm_nama'];?> </td>
                                            <td><?php echo $izin['refjenisizinikm_isaktif']=='T' ? 'Ya' : 'Tidak';?> </td>
                                           
                                        	<td><button onclick="edit(<?php echo $izin['refjenisizinikm_id']; ?>)" type="button" class="btn btn-labeled btn-success btn-sm" style="width:65px; height:30px;">
								    		
										    			<i class="fa fa-edit"></i>
										    		Edit
										    	</button>

										    	<button  onclick="hapus(<?php echo $izin['refjenisizinikm_id']; ?>)" type='button' class='btn btn-labeled btn-danger btn-sm' style="width:65px; height:30px;">
										    		
										    			<i class="fa fa-trash-o"></i>
										    		Hapus
										 		</button></td>
                                        </tr>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                           </div>
                      </div>
                 
            </div>
            </article>

                         
                            
</section>

<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    pageSetUp();

    loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#form_kecamatan").validate({
				// Rules for form validation
				rules : {
					data_kecamatan : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					data_kecamatan : {
						required : 'Mohon isikan Nama Kecamatan'
					}

				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				},
				submitHandler : function(form) {
					// saat validasi benar semua, jalankan simpan()
					return simpan();
				}
			});
}
	 
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


function simpan () {
		//$("#eg7").click();
		$.ajax({
			url: 'app/refjenisizinikm/simpan',
			type: 'POST',
			data: {
				cmd: window.cmd,
				id: window.id,
				nama_loket: $('#nama_loket').val(),
				nama_izin: $('#nama_izin').val(),
				nama_aktif: $('#nama_aktif').val(),

			}
			,success: function  (respon) {
				if (respon=='success') {
					
					notifikasi("Sukses","Data berhasil disimpan","success");
				}
				else
					notifikasi("Gagal","Data gagal disimpan","failed");
			}
			});
		$("#form-jenis").show();
		
	}
function tambah () {
	window.cmd = "tambah";
	$("#form-jenis").show();
	$("#nama_loket").val('');
	$('#nama_izin').val('');
	$('#nama_aktif').val('');
}
function batal () {
	$("#form-jenis").hide();
}

function edit(id) {
	window.id = id;
	window.cmd = "edit";
	$.ajax({
		url: 'app/refjenisizinikm/GetDataJenisIzin',
		type: 'POST',
		data: {id: id},
		success : function (respon) {
			$("#nama_loket").val(respon.namaloket);
			$("#nama_izin").val(respon.namaizin);
			$("#nama_aktif").val(respon.namaaktif);

		}
	});

	$("#form-jenis").show();
	

}


function hapus(id) {
	window.id = id;
	window.cmd = "hapus";

	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Jenis Izin ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			
	$.ajax({
		url: 'app/refjenisizinikm/HapusDataJenisIzin',
		type: 'POST',
		data: {id: id},
			success: function  (respon) {
				if (respon=='success') 
					notifikasi("Sukses","Data berhasil dihapus","success");
				else
					notifikasi("Gagal","Data gagal dihapus","failed");
			}
		});

	}

	});
	
}
</script>