<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
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
					<h2>Form Referensi Status Tindak Lanjut </h2>

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
						<button onclick="tambah()" type="button" class="btn btn-labeled btn-primary" name="modalFormAdd" data-target="#tambah">
						<span class="btn-label">
						<i class="fa fa-plus"></i>
						</span>Tambah
						</button>
						</div>

						<table id="datatable_fixed_column" class="table table-striped table-bordered smart-form">
							<thead>                              
								<tr>
								  <th width="21">No</th>
								  <th width="156"><div align="center">Jenis</div></th>
								  <th width="144"><div align="center">Jenis Uraian </div></th>
								  <th width="155"><div align="center">Keterangan</div></th>
								  <th width="155"><div align="center">Status Aktif</div></th>
								  <th width="89">&nbsp;</th>
							  </tr>
								<tr class="second">
									<td>
										<label class="input">
											<input type="hidden"/>
										</label>
									</td>

									<td>
										<label class="select">
											<span class="input">
												<input type="text" name="search_119gra13" value="Filter Jenis Status Tindak Lanjut" class="search_init" />
											</span>
										</label>
									</td>

									<td>
										<label class="select">
											<span class="input">
												<input type="text" name="search_119gra14" value="Filter Jenis Uraian" class="search_init" />
											</span>
										</label>
									</td>

									<td>
										<label class="select">
											<span class="input">
												<input type="text" name="search_119gra15" value="Filter Keterangan" class="search_init" />
											</span>
										</label>
									</td>

									<td>
										<label class="select">
											<span class="input">
												<input type="text" name="search_119gra16" value="Filter Status Aktif" class="search_init" />
											</span>
										</label>
									</td>
							        
							        <td>&nbsp;</td>
								</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
							foreach ($listdata as $datatabel1) {
								if ($datatabel1['refstatustindaklanjut_isaktif']=='T') {
									$stts='Aktif';
								}
								else $stts='Tidak Aktif';
							echo '
								<tr>
									<td>'.$i++.'</td>';
									?>
									<?php echo '
									<td><div align="center">'.$datatabel1['refstatustindaklanjut_jenis'].'</div></td>
									<td><div align="center">'.$datatabel1['refstatustindaklanjut_jenisuraian'].'</div></td>
									<td><div align="center">'.$datatabel1['refstatustindaklanjut_keterangan'].'</div></td>
									<td><div align="center">'.$stts.'</div></td>
							        ';?>
							        <td><a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
                                    data-content="
                                        <div class='row'><div class='col-md-12'><div class='well'>                                        
                                        	<a  data-toggle='modal' data-target='#editPengadu'>
                                        		<button onclick='edit(<?php echo $datatabel1['refstatustindaklanjut_id']; ?>)' class='btn btn-labeled btn-success btn-sm' type='submit'><span class='btn-label'>
                                        			<i class='fa fa-edit'></i></span>Edit</button></a>
                                        		<button onclick='hapus(<?php echo $datatabel1['refstatustindaklanjut_id']; ?>)' class='btn btn-labeled btn-danger btn-sm'><span class='btn-label'>
                                        			<i class='fa fa-trash-o'></i></span>Hapus</button>                                                         
                                        		</div>
                                        	</div>
                                        </div>" 
                                    data-html="true"><i class="fa fa-gear"></i></a>                                    </td>
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

<div class="modal fade" id="modalFormAdd" tabindex="-1" role="dialog" aria-labelledby="editPengadu" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">			
			<div class="modal-body no-padding">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i>&nbsp;Tambah Data</h4>
			</div>
				<form action="" name="formStatusTindakLanjut" id="formStatusTindakLanjut" class="smart-form">
					<fieldset>
						<div class="row">
							<section class="col col-3">
								<input type="hidden" id="call">
									<p>Jenis</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-8">
								<label class="input"> <i class="icon-append fa fa-th-list"></i>
									<input id="refstatustindaklanjut_jenis" name="refstatustindaklanjut_jenis" placeholder="Isikan Status Jenis Tindak Lanjut di sini">
										<b class="tooltip tooltip-bottom-right">Mohon Isikan Status Jenis Tindak Lanjut</b>
								</label>
							</section>
						</div>
					<hr>
					<br />
						<div class="row">
							<section class="col col-3">
								<input type="hidden" id="call">
									<p>Jenis Uraian</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-8">
								<label class="input"> <i class="icon-append fa fa-th-list"></i>
									<input id="refstatustindaklanjut_jenisuraian" name="refstatustindaklanjut_jenisuraian" placeholder="Isikan Status Jenis Uraian Tindak Lanjut di sini">
										<b class="tooltip tooltip-bottom-right">Mohon Isikan Status Jenis Uraian Tindak Lanjut</b>
								</label>
							</section>
						</div>
					<hr>
					<br />
						<div class="row">
							<section class="col col-3">
								<input type="hidden" id="call">
									<p>Keterangan</p>
							</section>
							<section class="col col-1">:
							</section>
							<section class="col col-8">
								<label class="textarea"> <i class="icon-append fa fa-th-list"></i>
									<textarea id="refstatustindaklanjut_keterangan" name="refstatustindaklanjut_keterangan" placeholder="Isikan Keterangan Tindak Lanjut di sini"></textarea>
										<b class="tooltip tooltip-bottom-right">Mohon Isikan Keterangan</b>
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
										<select name="refstatustindaklanjut_isaktif" id="refstatustindaklanjut_isaktif">
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
				<!-- <form name="formStatusTindakLanjut" id="formStatusTindakLanjut" action="" class="smart-form">

							<fieldset>
								<section>
									<div class="row">
									<input type="hidden" id="call">
										<label class="label col col-3">Jenis </label>
									  <div class="col col-8">
											<label class="input"> <i class="icon-append fa fa-calendar"></i></label>
										    <span class="input"> <i class="icon-append fa fa-square"></i>
										    <input type="text" name="text2" id="refstatustindaklanjut_jenis" name="refstatustindaklanjut_jenis" placeholder="Isikan Status Jenis Tindak Lanjut di sini">
										    <b class="tooltip tooltip-bottom-right">Mohon Isikan Status Jenis Tindak Lanjut</b>
									    </span></div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Jenis Uraian </label>
										<div class="col col-8">
											<label class="input"> <i class="icon-append fa fa-square"></i>
												<input type="text" name="text" id="refstatustindaklanjut_jenisuraian" name="refstatustindaklanjut_jenisuraian" placeholder="Isikan Status Jenis Uraian Tindak Lanjut di sini">
												<b class="tooltip tooltip-bottom-right">Mohon Isikan Status Jenis Uraian Tindak Lanjut</b>
											</label>
										</div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Keterangan</label>
									  <div class="col col-8">
									    <label class="textarea"> <i class="icon-append fa fa-square"></i>
										<textarea name="textarea2" id="refstatustindaklanjut_keterangan" name="refstatustindaklanjutketerangan" placeholder="Isikan Keterangan Tindak Lanjut di sini"></textarea>
										<b class="tooltip tooltip-bottom-right">Mohon Isikan Keterangan Tindak Lanjut</b>
										</label>
									  </div>
									</div>
								</section>

								<section>
									<div class="row">
										<label class="label col col-3">Status Aktif</label>
									  <div class="col col-3">
									    <label class="select"> <i class="icon-append fa fa-square"></i>
										<select name="refstatustindaklanjut_isaktif" id="refstatustindaklanjut_isaktif">
										<b class="tooltip tooltip-bottom-right">Mohon Isikan Status</b>
											<option value="T">Aktif</option>
											<option value="F">Tidak Aktif</option>
										</select>
										</label>
									  </div>
									</div>
								</section>

								<section></section>
								<section><div class="row"></div>
								</section>
								<!-- <section>
									<div class="row">
										<div class="col col-2"></div>
										<div class="col col-10">
											<label class="checkbox">
												<input type="checkbox" name="remember" checked="">
												<i></i>Keep me logged in</label>
										</div>
									</div>
								</section>
							</fieldset>
							
							<footer>
								<button type="submit" id="eg8" class="btn btn-primary">
									<i class="fa fa-floppy-o"></i>&nbsp;Simpan</button>
								<button class="btn btn-default" data-dismiss="modal">
									<i class="fa fa-ban"></i>&nbsp;Batal</button>
							</footer>
						</form>	 -->					
				</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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

</script>

<script>
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
	function runFormValidation() {
		var $orderForm = $("#formStatusTindakLanjut").validate({
				// Rules for form validation
				rules : {
					refstatustindaklanjut_jenis : {
						required : true,
						digits : true
					},
					refstatustindaklanjut_jenisuraian : {
						required : true,
					},
					refstatustindaklanjut_keterangan : {
						required : true
					},
					refstatustindaklanjut_isaktif : {
						required : true
					}
				},

				// Messages for form validation
				messages : {
					refstatustindaklanjut_jenis : {
						required : 'Mohon Isikan Jenis Status Tindak Lanjut',
						digits : 'Mohon Isikan Angka'
					},
					refstatustindaklanjut_jenisuraian : {
						required : 'Mohon Isikan Jenis Uraian'
					},
					refstatustindaklanjut_keterangan : {
						required : 'Mohon Isikan Keterangan'
					},
					refstatustindaklanjut_isaktif : {
						required : 'Mohon Isikan Status Aktif'
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
		$("#call").val('tambah');
		$("#refstatustindaklanjut_jenis").val();
		$("#refstatustindaklanjut_jenisuraian").val();
		$("#refstatustindaklanjut_keterangan").val();
		$("#refstatustindaklanjut_isaktif").val();

	}

	function edit(id) {
		window.refstatustindaklanjut_id = id;
		$("#modalFormAdd").modal('show'); // panggil modal
		$("#tambahData").modal('show'); // panggil modal
		$("#call").val('edit');
		$("#refstatustindaklanjut_jenis").val(getdata(id,'refstatustindaklanjut_jenis'));
		$("#refstatustindaklanjut_jenisuraian").val(getdata(id,'refstatustindaklanjut_jenisuraian'));
		$("#refstatustindaklanjut_keterangan").val(getdata(id,'refstatustindaklanjut_keterangan'));
		$("#refstatustindaklanjut_isaktif").val(getdata(id,'refstatustindaklanjut_isaktif'));
	}

	function simpan() {
		$.ajax({
			url: 'app/refstatustindaklanjut/simpandata',
			type: 'post',
			data: {
				'call' : $("#call").val(),
				'id' : window.refstatustindaklanjut_id,
				'refstatustindaklanjut_jenis' : $("#refstatustindaklanjut_jenis").val(),
				'refstatustindaklanjut_jenisuraian' : $("#refstatustindaklanjut_jenisuraian").val(),
				'refstatustindaklanjut_keterangan' : $("#refstatustindaklanjut_keterangan").val(),
				'refstatustindaklanjut_isaktif' : $("#refstatustindaklanjut_isaktif").val()
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
			url: 'app/refstatustindaklanjut/ajxgetdata',
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
					url: 'app/refstatustindaklanjut/hapusdata',
					type: 'post',
					data: {id: id},
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
