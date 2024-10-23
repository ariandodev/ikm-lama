<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
		<h1 class="page-title txt-color-blueDark"><i class="fa fa-file-text fa-fw "></i> 
			Surat Tugas
		</h1>
	</div>
</div>
<!-- row -->
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
			<h1 class="semi-bold">B.1.  Apa itu Pencetakan "Surat Tugas" ?</h1>
		<p class="text-justify">Pencetakan Surat Tugas merupakan cetak data penugasan jadwal peninjauan lapangan suatu izin.</p>
	  </div>

		
	</div>
</div>
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
					<h2>Standard Data Tables </h2>

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
									<th data-class="expand">Nama Pemohon</th>
									<th data-hide="phone">Nama Usaha / Bangunan</th>
								 	<th data-hide="phone,tablet">Lokasi Izin</th>
									<th data-hide="phone,tablet">Jenis Izin</th>
									<th data-hide="phone,tablet">Nomor SPM</th>
									<th data-hide="phone,tablet" >Tanggal SPM</th>
									<th data-hide="phone,tablet,desktop">Nilai Retribusi</th>
									<th data-hide="phone,tablet,desktop"> Denda</th>
									<th data-hide="phone,tablet,desktop">Kenaikan</th>
									<th data-hide="phone,tablet,desktop">Total Retribusi</th>
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
				</div>
			</div>
		</article>
	</div>
</section>



<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Edit Data</h4>
			</div>
			<form action="" id="order-form" class="smart-form" novalidate>
							

							<fieldset>

								<div class="row">
									<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-list-ol"></i>
											<input type="text" name="nosurat" placeholder="Nomor surat Tugas">
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Nomor surat Tugas</b>
										</label>
									</section>
									
								</div>

								<div class="row">
									<section class="col col-6">
									  <label class="input"> <i class="icon-append fa fa-user "></i>
											<input class="form-control" id="title" name="title" placeholder="Pemohon Izin" type="text"
									data-autocomplete='[
									"000123 / PT. Medika / Jatinegara, Bali",
									"000124 / PT. Jaya Trans / Margarana, Bali",
									"000125 / CV. Semarak / Jombor, Sleman",
									"000126 / CV. Adi Sentosa / Pluit, Jakarta",
									"000127 / PT. Era Jaya / Yogyakarta"]'>
											<b class="tooltip tooltip-bottom-right">Ketikkan Nomor Pendaftaran atau Nama Pemohon atau Nama Usaha, Kemudian Klik</b>
										</label>
									</section>
								</div>

								<div class="row">
								<section class="col col-10">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>No</th>
												<th>No. Pendaftaran</th>
												<th>Nama Pemohon</th>
												<th>Alamat Pemohon</th>
												<th>Jenis Izin</th>
												<th>Jenis Permohonan</th>
												<th>Lokasi Ijin / Kelurahan / Kecamatan </th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Row 1</td>
												<td>Row 2</td>
												<td>Row 3</td>
												<td>Row 4</td>
												<td>Row 2</td>
												<td>Row 3</td>
												<td>Row 4</td>
											</tr>
											<tr>
												<td>Row 1</td>
												<td>Row 2</td>
												<td>Row 3</td>
												<td>Row 4</td>
												<td>Row 2</td>
												<td>Row 3</td>
												<td>Row 4</td>
											</tr>
										</tbody>
									</table>
									</section>
								</div>
							
								<div class="row">
									<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-group"></i>
											<input class="form-control" id="title" name="title" placeholder="Tim Pemeriksa" type="text"
									data-autocomplete='[
									"000123 / PT. Medika / Jatinegara, Bali",
									"000124 / PT. Jaya Trans / Margarana, Bali",
									"000125 / CV. Semarak / Jombor, Sleman",
									"000126 / CV. Adi Sentosa / Pluit, Jakarta",
									"000127 / PT. Era Jaya / Yogyakarta"]'>
											<b class="tooltip tooltip-bottom-right">Ketikkan Nama SKPD</b>
										</label>
									</section>
									
								</div>

								<div class="row">
								<section class="col col-10">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Jabatan</th>
												
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Row 1</td>
												<td>Row 2</td>
												<td>Row 3</td>
												
											</tr>
											<tr>
												<td>Row 1</td>
												<td>Row 2</td>
												<td>Row 3</td>
												
											</tr>
						
										</tbody>
									</table>
									</section>
								</div>

								</fieldset>

								<fieldset>

								<div class="row">
									<section class="col col-5">
										<label class="input"> <i class="icon-append fa fa-calendar "></i>
											<input class="form-control datepicker" data-dateformat="dd/mm/yy" type="text" placeholder="Tanggal Tinjau Awal">
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal awal</b>
										</label>
									</section>
                                    <section class="col col-1">
                                    s/d
                                    </section>
									<section class="col col-5">
										<label class="input"> <i class="icon-append fa fa-calendar "></i>
											<input class="form-control datepicker" data-dateformat="dd/mm/yy" type="text" placeholder="Tanggal Tinjau Awal">
											<b class="tooltip tooltip-bottom-right">Mohon Isikan Tanggal Akhir</b>
										</label>
									</section>
								</div>
								
								<div class="row">
									<section class="col col-6">
									<label class="select">
											<select name="jenis-izin">
												<option value="0" selected="" disabled="">Ditandatangani Oleh :</option>
												<option value="47">Drs. Hendro Susilo, MAP.</option>
												<option value="47">Drs. Hendro Susilo, MAP.</option>
												<option value="47">Drs. Hendro Susilo, MAP.</option>
												<option value="47">Drs. Hendro Susilo, MAP.</option>
											</select>
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-10">
									<label class="textarea"> <i class="icon-append fa fa-th-list"></i>
											<textarea class="form-control" required rows="4" placeholder="Keterangan"></textarea>

											<b class="tooltip tooltip-bottom-right">Mohon Isikan keterangan </b>
										</label>
									</section>
								</div>

								

							</fieldset>							
						</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Batal
				</button>
				<button type="button" class="btn btn-primary" id="eg7">
					<i class="fa fa-floppy"></i>Update Jadwal
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
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
				desktop:1360,
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
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'l>r>"+
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

	function runMaxLength() {
	    $('input[maxlength]').maxlength({
	        warningClass: "label label-success",
	        limitReachedClass: "label label-important",
	    });

	}
	 // START AND FINISH DATE
	$('#startdate').datepicker({
	    dateFormat: 'dd.mm.yy',
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onSelect: function (selectedDate) {
	        $('#finishdate').datepicker('option', 'minDate', selectedDate);
	    }
	});
	$('#finishdate').datepicker({
	    dateFormat: 'dd.mm.yy',
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onSelect: function (selectedDate) {
	        $('#startdate').datepicker('option', 'maxDate', selectedDate);
	    }
	});

	 // Date Range Picker
	$("#from").datepicker({
	    defaultDate: "+1w",
	    changeMonth: true,
	    numberOfMonths: 3,
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onClose: function (selectedDate) {
	        $("#to").datepicker("option", "maxDate", selectedDate);
	    }

	});
	$("#to").datepicker({
	    defaultDate: "+1w",
	    changeMonth: true,
	    numberOfMonths: 3,
	    prevText: '<i class="fa fa-chevron-left"></i>',
	    nextText: '<i class="fa fa-chevron-right"></i>',
	    onClose: function (selectedDate) {
	        $("#from").datepicker("option", "minDate", selectedDate);
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
	
		$('#modal_link').click(function() {
		$('#dialog-message').dialog('open');
		return false;
	});

</script>