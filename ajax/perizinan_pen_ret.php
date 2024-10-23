<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Perhitungan Retribusi
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
			<h1 class="semi-bold">B.4.  Apa itu "Perhitungan Retribusi" ? </h1>
		<p class="text-justify">Pada halaman perhitungan retribusi akan ditampilkan model penghitungan secara sistem untuk izin-izin yang memiliki retribusi.</p>
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
								
							Perhitungan Retribusi 
							</header>
							<table id="user" class="table table-bordered table-striped" style="clear: both">
							<tbody>
								<tr>
									<td style="width:35%;">Nomor Pendaftaran</td>
									<td style="width:65%"><a href="#" >	1107/08/2014  LOG</a></td>
								</tr>
								<tr>
									<td>Jenis Izin</td>
									<td>Izin Ganguan / HO</td>
								</tr>
								<tr>
									<td>Jenis Permohonan</td>
									<td>BARU</td>
								</tr>
								<tr>
									<td>Nama Pemohon</td>
									<td>TOHARI</td>
								</tr>
								<tr>
									<td>Nama Usaha</td>
									<td>WONG TANI</td>
								</tr>

								<tr>
									<td>Nomor KTP</td>
									<td>3327060908570003</td>
								</tr>
								<tr>
									<td>Nomor NPWP</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Nomor Telepon</td>
									<td>087764208181</td>
								</tr>

								<tr>
									<td>Lokasi/ Usaha / Bangunan</td>
									<td>-</td>
								</tr>

								<tr>
									<td>Kecamatan
									<td>-</td>
								</tr>
								<tr>
									<td>Kelurahan</td>
									<td>-</td>
								</tr>
								<tr>
									<td>Multi Daftar Dengan</td>
									<td></td>
								</tr>
								<tr>
									<td colspan="2">1. 1108/08/2014 untuk BARU ( Surat Izin Usaha Perdagangan ( SIUP ) )</td>
								</tr>
								<tr>
									<td colspan="2">2. 1109/08/2014 untuk TDP PERORANGAN BARU ( Tanda Daftar Perusahaan (TDP) )</td>
								</tr>
							</tbody>
						</table>
						<div class="col-md-4">
							<form action="" class="smart-form">
							<header>Form Perhitungan</header>
							
							<fieldset>					
								<section>
									<label class="label">Indeks Peruntukan</label>
									<label class="input">
										<select name="index_peruntukan" class="form-control" style="margin-top: 10px">
											<option value="">== Silahkan Pilih == </option>
											<option>Letak sesuai peruntukan [1.00]</option>
										</select>
									</label>
								</section>
								
								<section>
									<label class="label">Indeks Letak</label>
									<label for="file" class="input">
										<select name="refindeksletak_id" class="form-control">
											<option value="">== Silahkan Pilih == </option>
											<option value="1">Jalan Protokol /Jalan Utama Kota[3.00]</option>
											<option value="2">Jalan Arteri[2.50]</option>
											<option value="3">Jalan Kolektor[2.00]</option>
											<option value="4">Jalan Antar Lingkungan[1.50]</option>
											<option value="5">Jalan Lokal/Setapak/Kampung[1.00]</option>
										</select>
									</label>
								</section>

								<section>
									<label class="label">Indeks Gangguan</label>
									<label for="file" class="input">
										<select name="refindeksletak_id" class="form-control">
											<option value="">== Silahkan Pilih == </option>
											<option value="1">Gangguan Terhadap Lingkungan</option>
											<option value="2">Gangguan Terhadap Sosial Kemasyarakatan</option>
											<option value="3">Gangguan Terhadap Ekonomi</option>
										</select>
									</label>
								</section>

								<section>
									<label class="label">Jenis Izin</label>
									<label for="file" class="input">
										<select name="jenis_izin" class="form-control">
											<option value="">== Silahkan Pilih == </option>
											<option value="1">Daftar Ulang[50.00%]</option>
											<option value="2">Baru[100.00%]</option>
											<option value="3">Balik Nama[50.00%]</option>
										</select>
									</label>
								</section>

								<section>
									<label class="label">Luas</label>
									<label for="file" class="input">
										<input type="text" class="form-control" />
									</label>
								</section>

								<section>
									<label class="label">Jenis Lantai</label>
									<label for="file" class="input">
										<select name="jenis_izin" class="form-control">
											<option value="">== Silahkan Pilih == </option>
											<option value="1">Lantai Tertutup[2000.00]</option>
											<option value="2">Lantai Terbuka[1000.00]</option>											
										</select>
									</label>
								</section>
							</fieldset>
							
							<footer>
								<button type="submit" class="btn btn-primary">Hitung</button>
							</footer>
						</form>
						</div>
							<footer>
								<!-- <button type="submit" class="btn btn-success">
									<i class="fa fa-save"></i> Update Jadwal
								</button> -->
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

<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<!-- Widget ID (each widget will need unique ID)-->
<div class="jarviswidget jarviswidget-color-darken" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
<!-- widget options:
usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">


-->
<header>
	<span class="widget-icon"> <i class="fa fa-table"></i> </span>
	<h2>Tabel Perhitungan Retribusi</h2>

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
					<th  data-hide="phone">No</th>
					<th data-hide="phone">Luas </th>
					<th data-class="expand">Jenis Lantai Tarif/m<sup>2</sup></th>
					<th data-hide="phone,tablet,desktop">Indeks Peruntukan </th>
					<th data-hide="phone,tablet,desktop">Indeks Strategis</th>
					<th data-hide="phone,tablet,desktop">Indeks Gangguan </th>
					<th data-hide="phone,tablet">Perkalian Indeks </th>
					<th data-hide="phone,tablet">Tarif Retribusi (Luas x Tarif x Indeks) </th>
					<th data-hide="phone">Jenis Permohonan </th>
					<th data-hide="phone,tablet">Nilai Retribusi </th>
					<th  ></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>100.00</td>
					<td>Lantai Tertutup (Rp. 2.000)</td>
					<td>1.00</td>
					<td>3.00</td>
					<td>1.00</td>
					<td>3</td>
					<td>Rp. 600.000 </td>
					<td>Daftar Ulang (50.00%) </td>
					<td>Rp. 300.000 </td>
					<td><div class="btn-group">
						<button class="btn btn-danger btn-sm">
						<i class="fa fa-trash-o"></i> Hapus
						</button>
					</div></td>
				</tr>				
			</tbody>
			<tfoot>
				<tr>
				  <td colspan="9" align="center"><strong>Total</strong></td>
				  <td>Rp. 300.000</td>
				  <td>
				  	<a href="#ajax/perizinan_ctk_skrd.php" class="btn btn-success btn-sm">
				  		<i class="fa fa-check"></i> Selesai
				  	</a>
				  </td>
			  </tr>
			</tfoot>
		</table>



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
				desktop: 1367,
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'><'col-sm-6 col-xs-12 hidden-xs'>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'><'col-xs-12 col-sm-6'>>",
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