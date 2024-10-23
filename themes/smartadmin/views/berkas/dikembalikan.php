<ul class="notification-body">

	<li>
		<span>
			<a class="msg"  data-toggle="modal" data-target="#myModal">
				<!-- <img src="img/avatars/male.png" alt="" class="air air-top-left margin-top-5" width="40" height="40" /> -->
				<span class="from">-291-3007<i class="icon-paperclip"></i></span>
				<span class="from">BAYU INDRAWAN <i class="icon-paperclip"></i></span>
				<time>2014-06-26 12:18:58 </time>
				<span class="subject">CV. ZATIKA MEDIA KARYA </span>
				<span class="msg-body">Izin Mendirikan Bangunan (IMB)</span>
			</a>
		</span>
	</li>
	<li>
		<span>
			<a class="msg"  data-toggle="modal" data-target="#myModal">
				<!-- <img src="img/avatars/male.png" alt="" class="air air-top-left margin-top-5" width="40" height="40" /> -->
				<span class="from">-291-3007<i class="icon-paperclip"></i></span>
				<span class="from">HARRY ANDRIYAN <i class="icon-paperclip"></i></span>
				<time>2014-06-26 12:18:58 </time>
				<span class="subject">PT. SINGLE SEJAHTERA </span>
				<span class="msg-body">Izin Gangguan (HO)</span>
			</a>
		</span>
	</li>
	<li>
		<span>
			<a class="msg"  data-toggle="modal" data-target="#myModal">
				<!-- <img src="img/avatars/male.png" alt="" class="air air-top-left margin-top-5" width="40" height="40" /> -->
				<span class="from">-291-3007<i class="icon-paperclip"></i></span>
				<span class="from">NUR HALIM <i class="icon-paperclip"></i></span>
				<time>2014-06-26 12:18:58 </time>
				<span class="subject">CV. HARAPAN RAKYAT </span>
				<span class="msg-body">Izin Mendirikan Bangunan (IMB)</span>
			</a>
		</span>
	</li>
	<li>
		<span>
			<a class="msg"  data-toggle="modal" data-target="#myModal">
				<!-- <img src="img/avatars/male.png" alt="" class="air air-top-left margin-top-5" width="40" height="40" /> -->
				<span class="from">-291-3007<i class="icon-paperclip"></i></span>
				<span class="from">CHRISTOPER INDRA <i class="icon-paperclip"></i></span>
				<time>2014-06-26 12:18:58 </time>
				<span class="subject">PT. YARANAIKA FOUNDATION </span>
				<span class="msg-body">Izin Mendirikan Bangunan (IMB)</span>
			</a>
		</span>
	</li>
	<li>
		<span>
			<a class="msg"  data-toggle="modal" data-target="#myModal">
				<!-- <img src="img/avatars/male.png" alt="" class="air air-top-left margin-top-5" width="40" height="40" /> -->
				<span class="from">-291-3007<i class="icon-paperclip"></i></span>
				<span class="from">SURYO PRABOWO <i class="icon-paperclip"></i></span>
				<time>2014-06-26 12:18:58 </time>
				<span class="subject">PT. MAJU JAYA</span>
				<span class="msg-body">Izin Mendirikan Bangunan (IMB)</span>
			</a>
		</span>
	</li>
	<li>
		<span>
			<a class="msg"  data-toggle="modal" data-target="#myModal">
				<!-- <img src="img/avatars/male.png" alt="" class="air air-top-left margin-top-5" width="40" height="40" /> -->
				<span class="from">-291-3007<i class="icon-paperclip"></i></span>
				<span class="from">AHMAD FAHRUDIN <i class="icon-paperclip"></i></span>
				<time>2014-06-26 12:18:58 </time>
				<span class="subject">CV. KASMARAN ZAITUN </span>
				<span class="msg-body">Izin Gangguan (HO)</span>
			</a>
		</span>
	</li>
</ul>






<script type="text/javascript">

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
			"sDom" : "<'dt-top-row'><'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
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
			"sDom" : "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
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
		
		/* END TABLE TOOLS */

	}

</script>