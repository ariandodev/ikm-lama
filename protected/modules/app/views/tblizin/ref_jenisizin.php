<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<!-- row -->
<div class="row">
<article class="col-sm-12 col-md-12 col-lg-12">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<!-- end widget -->
</article>

<div class="col-md-12">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-12" data-widget-editbutton="false">
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
					<h2>Form Input Jenis Izin</h2>

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
						<div class="widget-body-toolbar">
							<a  data-toggle="modal" onclick="tambah()" name="modalFormAdd" data-target="#tambahData">
                                <button class="btn btn-labeled btn-primary btn-sm" ><span class="btn-label">
                                <i class="fa fa-plus"></i></span>Tambah Data</button>
                            </a>
						</div>

						<table id="datatable_fixed_column" class="table table-striped table-bordered smart-form">
							<thead>
								
								<tr>
								  <th width="20">No</th>
								  <th width="155"><div align="center">Nama Izin </div></th>
								  <th width="89">Status Izin</th>
								  <th width="89">&nbsp;</th>
							  </tr>
								<tr class="second">
									<td>
										<label class="input"><input type="hidden"/></label>									</td>
									<td><label class="select">
									<span class="input">
									<input type="text" name="search_119gra13" value="Filter Status Pengaduan" class="search_init" />
									</span></label></td>
							        <td><label class="select">
									<span class="input">
									<input type="text" name="search_119gra13" value="Filter Status" class="search_init" />
									</span></label></td>
							        <td>&nbsp;</td>
								</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
							foreach ($listdata as $datatabel1) {
								if ($datatabel1['tblizin_isaktif']=='T') {
									$stts='Aktif';
								}
								else $stts='Tidak Aktif';
							echo '
								<tr>
									<td>'.$i++.'</td>';
									?>
									<?php echo '
									<td>
						            <div align="center">'.$datatabel1['tblizin_nama'].'</div></td>
							        <td><div align="center">'.$stts.'</div></td>
							        ';?>
							        <td><a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
                                    data-content="
                                        <div class='row'>
                                        	<div class='col-md-12'>
                                        		<div class='well'>                                        
                                        			<a  data-toggle='modal' data-target='#editData'>
                                        				<button onclick='edit(<?php echo $datatabel1['tblizin_id']; ?>)' class='btn btn-labeled btn-success btn-sm' type='submit'><span class='btn-label'>
                                        					<i class='fa fa-edit'></i></span>Edit</button></a>
                                        				<button onclick='hapus(<?php echo $datatabel1['tblizin_id']; ?>)' class='btn btn-labeled btn-danger btn-sm' type='submit'><span class='btn-label'>
                                        					<i class='fa fa-trash-o'></i></span>Hapus</button>                                                    
                                       			</div>
                                       		</div>
                                       	</div>" 
                                    data-html="true"><i class="fa fa-gear"></i></a> 
                                    </td>
								<?php echo '</tr>
								';
								}?>
							</tbody>
						</table>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
</div>
</section>



<!-- INI MODAL TAMBAH DATA-->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i>&nbsp;Tambah Data</h4>
			</div>
			<form action="" name="formKJenisIzin" id="formKJenisIzin" class="smart-form">
				<fieldset>
					<div class="row">
						<section class="col col-3">
							<input type="hidden" id="call1">
								<p>Nama Izin</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<label class="input"> <i class="icon-append fa fa-th-list"></i>
								<input class="form-control" name="tblizin_nama" id="tblizin_nama" required rows="1" placeholder="Masukan Nama Izin">
									<b class="tooltip tooltip-bottom-right">Mohon Isikan Kode Permasalahan di sini</b>
							</label>
						</section>
					</div>
				<hr>
				<br />
					<div class="row">
						<section class="col col-3">
							<p>Status Izin</p>
						</section>
						<section class="col col-1">:
						</section>
						<section class="col col-8">
							<div>
								<label class="select"> <i class="icon-append fa fa-square"></i>
									<select name="tblizin_isaktif" id="tblizin_isaktif">
										<option value="T">Aktif</option>
										<option value="F">Tidak Aktif</option>
									</select>
								</label>	
							</div>
						</section>
					</div>
				</fieldset>	
					<footer>
						<button id="eg7" type="submit" class="btn btn-primary">
							<i class="fa fa-floppy-o"></i>&nbsp;Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							<i class="fa fa-ban"></i>&nbsp;Batal
						</button>
					</footer>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<!-- INI AKHIR MODAL TAMBAH DATA-->


<!-- end widget grid -->
<script type="text/javascript">
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();
	
	// PAGE RELATED SCRIPTS
	
	
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
			"sDom" : "<'dt-top-row'>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"oTableTools" : {
				"aButtons" : ["copy", "print", {
					"sExtends" : "collection",
					"sButtonText" : 'Save <span class="caret" />',
					"aButtons" : ["csv", "xls", "pdf"]
				}],
				"sSwfPath" : "<?php echo ASSETS_URL; ?>/js/plugin/datatables/media/swf/copy_csv_xls_pdf.swf"
			},
			//"sDom" : "t<'row dt-wrapper'<'col-sm-6'i><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'>>",
			"oLanguage" : {
				"sSearch" : "Search all columns:",
				"oPaginate": {
			        "sNext": "Selanjutnya",
			        "sPrevious": "Sebelumnya",
			        "sEmptyTable": "Belum ada data",
			        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entrian"
			    }
			},
			"bSortCellsTop" : true,
			"bDestroy" : true
		});		
	
	}

	$('#tanggal_izin').datepicker({
		dateFormat : 'dd/mm/yy'
	});


		//MODAL
		$('#modal_link').click(function() {
		$('#dialog-message').dialog('open');
		return false;
	});	

	$('#datepicker').datepicker({
	    dateFormat: 'dd/mm/yy',
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onSelect: function (selectedDate) {
	        $('#finishdate').datepicker('option', 'minDate', selectedDate);
	    }
	});	

// With Callback


</script>

<script>
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#formKJenisIzin").validate({
				// Rules for form validation
				rules : {
					tblizin_nama : {
						required : true
					},
					tblizin_isaktif : {
						required : true,
					}
				},

				// Messages for form validation
				messages : {
					tblizin_nama : {
						required : 'Mohon Isikan Nama Izin'
					},
					tblizin_isaktif : {
						required : 'Mohon Isikan Status'
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

	function notifikasi(title, msg, type) {
		if (type=='success') {
			var warna = '#296191';
			var icon = 'fa-save';
		} else {
			var warna = '#B61F1F;';
			var icon = 'fa-warning';
		}
		$.smallBox({
			title : title,
			content : "<i class='fa fa-clock-o'></i><i>"+msg+"</i>",
			color : warna, // warna background
			iconSmall : "fa "+ icon +" bounce animated", // dengan animasi bounce
			timeout : 4000 // lama alert ditampilkan
		});
	}

	function tambah() {
		$("#modalFormAdd").modal('show'); // panggil modal
		$("#call1").val('tambah');
		$("#tblizin_nama").val();
		$("#tblizin_isaktif").val();

	}

	function edit(id) {
		window.id_jenisizin = id;
		$("#modalForm").modal('show'); // panggil modal
		$("#tambahData").modal('show'); // panggil modal
		$("#call1").val('edit');
		$("#tblizin_nama").val(getdata(id,'tblizin_nama'));
		$("#tblizin_isaktif").val(getdata(id,'tblizin_isaktif'));
	}

	function simpan() {
		$.ajax({
			url: 'app/tblizin/simpandata',
			type: 'post',
			data: {
				'call1' : $("#call1").val(),
				'id' : window.id_jenisizin,
				'tblizin_nama' : $("#tblizin_nama").val(),
				'tblizin_isaktif' : $("#tblizin_isaktif").val(),
			},
			success: function (data) {
				if(data=='success') {
					notifikasi('Sukses','Data Berhasil Disimpan', 'success');
					window.location.reload();
				} else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail');
				}
			}
		});
		return false;
	}

	function getdata(id,field) {
		var get = $.ajax({
			url: 'app/tblizin/ajxgetdata',
			type: 'post',
			async: false,
			data: {id: id,field:field},
			success: function (data) {
				var get = data;
			}
		});
		return get.responseText;
	}

	function hapus(id) {
		/*konfirmasi dahulu*/
		$.SmartMessageBox({
			title : "Anda yakin ingin menghapus data ini?",
			content : "Data Yang sudah dihapus tidak dapat dikembalikan lagi",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {

				/*jalankan ajax hapus*/
				$.ajax({
					url: 'app/tblizin/hapusdata',
					type: 'post',
					data: {id: id}, // kirim parameter tbljadwalsurvey_id
					success: function (data) {
						if(data=='success') {
							notifikasi('Sukses','Data Berhasil Dihapus', 'success');
							window.location.reload();
						} else {
							notifikasi('Gagal','Data Gagal Dihapus', 'fail');
						}
					}
				});
				/*end jalankan ajax hapus*/
			}

		});
}
</script>