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
			<h1 class="semi-bold">C.  Apa itu "Laporan Responden" ?			</h1>
		    <p class="text-justify">Merupakan laporan data daftar pengisian pertanyaan IKM yang diberikan saat melakukan pengambilan SK Izin <BR>
		</p>
	  </div>

		
	</div>
</div>
<!-- row -->
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
							<table id="datatable_tabletools" class="table table-striped table-bordered smart-form">
								<thead>
									<tr>
										<th width="10"><div align="center">No</div></th>
										<th width="25">Nama Responden </th>
										<th width="25"><div align="center">Jenis Izin </div></th>
										<th width="148"><div align="center">Pertanyaan</div></th>
										<th width="25"><div align="center">Jawaban </div></th>
									</tr>
								</thead>
								<tbody>
									<tr class="odd gradeX">
										<td>1</td>
										<td>Budy Santoso </td>
										<td>IMB</td>
										<td>Bagaimana pemahaman saudara tentang kemudahan prosedur pelayanan perizinan</td>
										<td><div class="col-md-12">
										<label id="bigs" class="btn btn-success"style="width: 240px; padding: 11px;">
										<div align="center">
										  <input class="radiobox" name="soal1" type="radio" value="4">
										  <span class="pull-left">A. Sangat mudah </span></div>
										</label>
										<label id="bigs" class="btn btn-primary" style="width: 240px; padding: 11px;">
										<div align="center">
										  <input class="radiobox" name="soal1" type="radio" value="3">
										  <span class="pull-left">B. Mudah</span></div>
										</label>
										<label id="bigs" class="btn btn-warning" style="width: 240px; padding: 11px;">
										<div align="center">
										  <input class="radiobox" name="soal1" type="radio" value="2">
										  <span class="pull-left">C. Kurang mudah </span></div>
										</label>
										<label id="bigs" class="btn btn-danger"style="width: 240px; padding: 11px;">
										<div align="center">
										  <input class="radiobox" name="soal1" type="radio" value="1">
										  <span class="pull-left">D. Tidak mudah </span></div>
										</label>
										</div>
										</td>
									</tr>
									<tr class="even gradeC">
										<td>2</td>
										<td>Ahmad Fahrudin </td>
										<td>HO</td>
										<td>Bagaimana pendapat saudara tentang kemudahan persyaratan perizinan yang harus dipenuhi</td>
										<td>
										<div class="col-md-12">
										<label id="bigs2" class="btn btn-success"style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal2" type="radio" value="4">
										<span class="pull-left">A. Sangat Sesuai </span></label>
										<label id="bigs2" class="btn btn-primary" style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal2" type="radio" value="3">
										<span class="pull-left">B. Sesuai</span></label>
										<label id="bigs2" class="btn btn-warning" style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal2" type="radio" value="2">
										<span class="pull-left">C. Kurang sesuai </span></label>
										<label id="bigs2" class="btn btn-danger"style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal2" type="radio" value="1">
										<span class="pull-left">D. Tidak sesuai </span></label>
										</div>
										</td>
									</tr>
									<tr class="odd gradeA">
										<td>3</td>
										<td>Riski Perdana </td>
										<td>IMB</td>
										<td>Bagimana pendapat saudara tentang kejelasan informasi pelayanan yang diberikan di kantor ini</td>
										<td>
										<div class="col-md-12">
										<label id="bigs3" class="btn btn-success"style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal3" type="radio" value="4">
										<span class="pull-left">A. Selalu ada </span></label>
										<label id="bigs3" class="btn btn-primary" style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal3" type="radio" value="3">
										<span class="pull-left">B. Ada</span></label>
										<label id="bigs3" class="btn btn-warning" style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal3" type="radio" value="2">
										<span class="pull-left">C. Kadang-kadang </span></label>
										<label id="bigs3" class="btn btn-danger"style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal3" type="radio" value="1">
										<span class="pull-left">D. Tidak pernah </span></label>
										</div>	
										</td>
									</tr>
									<tr class="even gradeA">
										<td>4</td>
										<td>Prasetyo</td>
										<td>IMB</td>
										<td>Bagaimana pendapat saudara tentang kedisiplinan petugas front office di kantor ini</td>
										<td>
										<div class="col-md-12">
										<label id="bigs4" class="btn btn-success"style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal4" type="radio" value="4">
										<span class="pull-left">A. Sangat disiplin </span></label>
										<label id="bigs4" class="btn btn-primary" style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal4" type="radio" value="3">
										<span class="pull-left">B. Disiplin</span></label>
										<label id="bigs4" class="btn btn-warning" style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal4" type="radio" value="2">
										<span class="pull-left">C. Kurang disiplin </span></label>
										<label id="bigs4" class="btn btn-danger"style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal4" type="radio" value="1">
										<span class="pull-left">D. Tidak disiplin </span></label>
										</div>
										</td>
									</tr>
									<tr class="odd gradeA">
										<td>5</td>
										<td>Imam Prasetyo </td>
										<td>HO</td>
										<td>Bagaimana pendapat saudara tentang tanggung jawab petugas dalam memberikan pelayanan</td>
										<td>
										<div class="col-md-12">
										<label id="bigs5" class="btn btn-success"style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal5" type="radio" value="4">
										<span class="pull-left">A. Sangat bertanggung-jawab </span></label>
										<label id="bigs5" class="btn btn-primary" style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal5" type="radio" value="3">
										<span class="pull-left">B. Bertanggung-jawab</span></label>
										<label id="bigs5" class="btn btn-warning" style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal5" type="radio" value="2">
										<span class="pull-left">C. Kurang bertanggung-jawab </span></label>
										<label id="bigs5" class="btn btn-danger"style="width: 240px; padding: 11px;">
										<input class="radiobox" name="soal5" type="radio" value="1">
										<span class="pull-left">D. Tidak bertanggung-jawab </span></label>
										</div>
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
			"sDom" : "<'dt-top-row'Tl>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"oTableTools" : {
				"aButtons" : ["print", {
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

		$('#datatable_tabletools').dataTable({
			"sDom" : "<'dt-top-row'Tl>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
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
		


	
	}

</script>