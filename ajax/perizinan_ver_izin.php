<?php define('ASSETS_URL', 'themes/smartadmin'); ?>


<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Verifikasi Izin
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
			<h1 class="semi-bold">B.3. Apa itu "Verifikasi Izin" ?</h1>
		<p class="text-justify">Verikfikasi Izin berfungsi untuk memverifikasi suatu izin, apakah izin itu diterima atau ditolak.</p>
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
		<a  class="btn btn-primary"> <!-- data-target='#edit' data-toggle='modal' -->
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

<div class="row">
					<article class="col-sm-12 col-md-12 col-lg-12">						
						<form action="" id="order-form" class="smart-form" novalidate>
							<header>
							</header>
							<table width="47%" class="table table-bordered table-striped" id="user" style="clear: both">
							<tbody>
								<tr>
									<td width="33%" style="width:35%;">Nomor Pendaftaran</td>
									<td colspan="2" style="width:65%">1107/08/2014</td>
								</tr>
								<tr>
									<td>Jenis Izin</td>
									<td colspan="2">Izin Ganguan / HO</td>
								</tr>
								<tr>
									<td>Jenis Permohonan</td>
									<td colspan="2">BARU</td>
								</tr>

								<tr>
									<td>Nomor KTP</td>
									<td colspan="2">3327060908570003</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td colspan="2">-</td>
								</tr>
								<tr>
									<td>Nomor Telepon</td>
									<td colspan="2">087764208181</td>
								</tr>

								<tr>
									<td>Lokasi/ Usaha / Bangunan</td>
									<td colspan="2">RT. 03 RW. 01</td>
								</tr>

								<tr>
									<td>Kecamatan
									<td colspan="2">-</td>
								</tr>

								<tr>
								  <td>Kelurahan</td>
								  <td colspan="2">-</td>
							  </tr>
								<tr>
								  <td>Keterangan</td>
								  <td colspan="2">-</td>
							  </tr>
								<tr>
								  <td>Multi Daftar Dengan </td>
								  <td colspan="2">&nbsp;</td>
							  </tr>
								<tr>
								  <td colspan="3">1. 1149/08/2014 untuk BARU ( Izin Gangguan / HO )</td>
							  </tr>
								<tr>
								  <td colspan="3">2. 1151/08/2014 untuk TDP PERORANGAN BARU ( Tanda Daftar Perusahaan (TDP) )</td>
							  </tr>
								<tr>
								  <td colspan="2">Hasil</td>
							      <td width="53%">
								  <section class="">
									<label class="select">
											<select name="Hasil">
												<option value="0">--Pilih Hasil--</option>
												<option value="Diterima">Diterima</option>
												<option value="Ditolak">Ditolak</option>
												<option value="Ditangguhkan">Ditangguhkan</option>
											</select>
									</label>
									</section>
								  </td>
						      </tr>
								<tr>
								  <td colspan="2">Keterangan</td>
							      <td><section>
									<label class="textarea"> <i class="icon-append fa fa-comment"></i> 										
									<textarea rows="4" name="comment"></textarea> </label>
								</section></td>
						      </tr>
								<tr>
									<td colspan="2">Kasi Perizian/Yang memeriksa </td>
								    <td>
									<section class="">
									<label class="select">
											<select name="Pegawai">
												<option value="0">--Pilih Pegawai--</option>
												<option value=" Drs. Hendro Susilo, MAP."> Drs. Hendro Susilo, MAP.</option>
												<option value="Moh. Ramdon, S.IP">Moh. Ramdon, S.IP</option>
												<option value="SUYONO, SH. MP">SUYONO, SH. MP</option>
												<option value="Suheti, SE">Suheti, SE</option>
											</select>
									  </label>
									</section>
									</td>
							    </tr>
							</tbody>
						</table>
							<footer>
								<a href="#" class="btn btn-success" target="_blank" id="eg8">
									<i class="fa fa-print"></i> Simpan & Cetak</a>
						        <button type="submit" class="btn btn-success" id="eg7"> 
								<i class="fa fa-pencil"></i> Simpan </button>
						  </footer>
						</form>				
					</article>
</div>
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
									<th data-hide="phone,tablet">Nomor Verifikasi </th>
									<th data-class="expand">Nama Pemohon </th>
									<th data-hide="phone">Jenis Izin </th>
									<th data-hide="phone">Jenis Permohonan </th>
									<th data-hide="phone,tablet">Hasil</th>
									<th data-hide="phone,tablet">Keterangan / Catatan</th>
									<th data-hide="phone,tablet">Tanggal Cetak </th>
									<th data-hide="phone,tablet">Kasi Perizinan </th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>431/VIII/KPPT-3/2014</td>
									<td>JOHAN FUADI</td>
									<td>Surat Izin Usaha Perdagangan ( SIUP )&nbsp;</td>
									<td>BARU</td>
									<td>Diterima</td>
									<td>&nbsp;</td>
									<td>&nbsp;25 Agustus 2014</td>
									<td>&nbsp;</td>
									<td>
										<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
									    	data-content="
									        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
									        <a data-target='#edit' data-toggle='modal' class='btn btn-primary btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-pencil'></i></span>Edit</a>
									        <a class='btn btn-success btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-print'></i></span>Cetak</a>
									        </div></div></div>" 
									    data-html="true"><i class="fa fa-gear"></i></a>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>430/VIII/KPPT-3/2014</td>
									<td>ANGGRAENI SULISTYANINGSIH</td>
									<td>Ijin Usaha Pariwisata</td>
									<td>DAFTAR ULANG</td>
									<td>Diterima</td>
									<td>&nbsp;</td>
									<td>&nbsp;21 Agustus 2014</td>
									<td>&nbsp;</td>
									<td>
										<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
									    	data-content="
									        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
									        <a data-target='#edit' data-toggle='modal' class='btn btn-primary btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-pencil'></i></span>Edit</a>
									        <a class='btn btn-success btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-print'></i></span>Cetak</a>
									        </div></div></div>" 
									    data-html="true"><i class="fa fa-gear"></i></a>
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>429/VIII/KPPT-3/2014</td>
									<td>SUNTORO ADY TANTRA</td>
									<td>Izin Gangguan / HO</td>
									<td>DAFTAR ULANG</td>
									<td>Diterima</td>
									<td>&nbsp;</td>
									<td>&nbsp;21 Agustus 2014</td>
									<td>&nbsp;</td>
									<td>
										<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
									    	data-content="
									        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
									        <a class='btn btn-primary btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-pencil'></i></span>Edit</a>
									        <a class='btn btn-success btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-print'></i></span>Cetak</a>
									        </div></div></div>" 
									    data-html="true"><i class="fa fa-gear"></i></a>
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td>428/VIII/KPPT-3/2014</td>
									<td>SUNTORO ADY TANTRA</td>
									<td>Tanda Daftar Perusahaan (TDP)</td>
									<td>TDP PERORANGAN DU</td>
									<td>Diterima</td>
									<td>&nbsp;</td>
									<td>&nbsp;21 Agustus 2014</td>
									<td>&nbsp;</td>
									<td>
										<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
									    	data-content="
									        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
									        <a data-target='#edit' data-toggle='modal' class='btn btn-primary btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-pencil'></i></span>Edit</a>
									        <a class='btn btn-success btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-print'></i></span>Cetak</a>
									        </div></div></div>" 
									    data-html="true"><i class="fa fa-gear"></i></a>
									</td>
								</tr>
								<tr>
									<td>5</td>
									<td>427/VIII/KPPT-3/2014</td>
									<td>SUNTORO ADY TANTRA</td>
									<td>Surat Izin Usaha Perdagangan ( SIUP )&nbsp;</td>
									<td>DAFTAR ULANG</td>
									<td>Diterima</td>
									<td>&nbsp;</td>
									<td>&nbsp;21 Agustus 2014</td>
									<td>&nbsp;</td>
									<td>
										<a  class="btn btn-default btn-sm" rel="popover" data-placement="left"                                      
									    	data-content="
									        <div class='row'><div class='col-md-12'><div class='well'>                                                                                
									        <a data-target='#edit' data-toggle='modal' class='btn btn-primary btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-pencil'></i></span>Edit</a>
									        <a class='btn btn-success btn-labeled btn-sm'><span class='btn-label'><i class='fa fa-print'></i></span>Cetak</a>
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
		
		

</script>-->
<script type="text/javascript">
/*
	 * AUTO COMPLETE AJAX
	 */


	/*function log(message) {
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
    });*/
	
	function editBOX() {
		$('#edit').modal('show');
	}
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
				desktop:1280,
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

				