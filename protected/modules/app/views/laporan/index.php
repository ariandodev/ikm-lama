<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light">
			<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-book"></i> 
				<strong>Laporan Indeks Kepuasan Masyarakat</strong>
			</h1>
			<p class="alert alert-info">
				Berikut ini adalah laporan rekapitulasi hasil Indeks Kepuasan Masyarakat (IKM) pelayanan perizinan pada DPMPTSP Kabupaten Pulang Pisau.
			</p>
	  	</div>
	</div>
</div>
	
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
		<div class="well well-sm well-light">
			<section>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Bulan" type="button" class="btn btn-labeled btn-primary" onclick="formperbulan()" id="btn_per_bulan" style="width: 148px;">
					<span class="btn-label" style="margin-left: -28px;">
						<i class="fa fa-book "></i>
					</span>Per Bulan
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Sampai Bulan" type="button" class="btn btn-labeled btn-primary" onclick="formsampaibulan()" id="btn_sampai_bulan" style="width: 169px;">
					<span class="btn-label" style="margin-left: -28px;">
						<i class="fa fa-book "></i>
					</span>Sampai Bulan
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Tahun" type="button" class="btn btn-labeled btn-primary" onclick="formtahun()" id="btn_tahun" style="width: 150px;">
					<span class="btn-label" style="margin-left: -28px;">
						<i class="fa fa-book "></i>
					</span>Per Tahun
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Unsur Pertanyaan" type="button" class="btn btn-labeled btn-primary btndefault" onclick="formresponden()" id="btn_responden" style="width: 190px;">
					<span class="btn-label" style="margin-left: 0px;">
						<i class="fa fa-book "></i>
					</span>Per Unsur Pertanyaan
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Jenis Izin" type="button" class="btn btn-labeled btn-primary" onclick="tabelcari()" id="btn_unsur" style="width: 145px;">
					<span class="btn-label">
						<i class="fa fa-book "></i>
					</span><span style="margin-left: 2px;">Per Jenis Izin</span>
				</button>

				<button style="display:none;width: 169px;" rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Jenis Izin" type="button" class="btn btn-labeled btn-primary" onclick="formperjenislayanan()" id="btn_jenis">
					<span class="btn-label">
						<i class="fa fa-book "></i>
					</span><span style="margin-left: -9px;">Per Jenis Izin</span>
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Rekapitulasi Laporan Indeks Kepuasan Masyarakat" type="button" class="btn btn-labeled btn-primary" onclick="formrekapitulasi()" id="btn_rekapitulasi" style="width: 169px;">
					<span class="btn-label" style="margin-left: -10px;">
						<i class="fa fa-book "></i>
					</span>Rekapitulasi IKM
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Nilai Indeks Kepuasan Masyarakat" type="button" class="btn btn-labeled btn-primary" onclick="formnnilaiikm()" id="btn_nilai" style="width: 169px;">
					<span class="btn-label" style="margin-left: -58px;">
						<i class="fa fa-book "></i>
					</span>Nilai IKM
				</button>
				
				<!-- <button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat" type="button" class="btn btn-labeled btn-primary" onclick="formpersaran()" id="btn_saran" style="width: 169px;">
					<span class="btn-label" style="margin-left: -73px;">
						<i class="fa fa-book "></i>
					</span>Saran
				</button> -->


			</section>
		</div>
		</div>
	</div>

	<div id="tabellaporan">
	
	</div>


    

<script type="text/javascript">

pageSetUp();

		jQuery(document).ready(function($) {
			$.fn.modal.Constructor.prototype.enforceFocus = function () {}; //paksa select2 bisa search
		  
		});

		 LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';
	
	function tabelcari () {
		$.ajax({
			url: 'app/laporan/GetFormCari',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});

		$('#btn_responden').removeClass('btn-success');
		$('#btn_tahun').removeClass('btn-success');
		$('#btn_unsur').addClass('btn-success');
		$('#btn_rekapitulasi').removeClass('btn-success');
		$('#btn_nilai').removeClass('btn-success');
		$('#btn_jenis').removeClass('btn-success');
		$('#btn_saran').removeClass('btn-success');
		$('#btn_sampai_bulan').removeClass('btn-success');
		$('#btn_per_bulan').removeClass('btn-success');
	}

	function formresponden () {
		$.ajax({
			url: 'app/laporan/GetFormCariTahunResponden',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});


		$('#btn_responden').addClass('btn-success');
		$('#btn_tahun').removeClass('btn-success');
		$('#btn_unsur').removeClass('btn-success');
		$('#btn_rekapitulasi').removeClass('btn-success');
		$('#btn_nilai').removeClass('btn-success');
		$('#btn_jenis').removeClass('btn-success');
		$('#btn_saran').removeClass('btn-success');
		$('#btn_sampai_bulan').removeClass('btn-success');
		$('#btn_per_bulan').removeClass('btn-success');
	}

	function formperbulan () {
		$.ajax({
			url: 'app/laporan/GetFormCariPerBulan',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});

		
		$('#btn_responden').removeClass('btn-success');
		$('#btn_tahun').removeClass('btn-success');
		$('#btn_unsur').removeClass('btn-success');
		$('#btn_rekapitulasi').removeClass('btn-success');
		$('#btn_nilai').removeClass('btn-success');
		$('#btn_jenis').removeClass('btn-success');
		$('#btn_saran').removeClass('btn-success');
		$('#btn_sampai_bulan').removeClass('btn-success');
		$('#btn_per_bulan').addClass('btn-success');
	}

	function formsampaibulan () {
		$.ajax({
			url: 'app/laporan/GetFormCariSampaiBulan',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});

		
		$('#btn_responden').removeClass('btn-success');
		$('#btn_tahun').removeClass('btn-success');
		$('#btn_unsur').removeClass('btn-success');
		$('#btn_rekapitulasi').removeClass('btn-success');
		$('#btn_nilai').removeClass('btn-success');
		$('#btn_jenis').removeClass('btn-success');
		$('#btn_saran').removeClass('btn-success');
		$('#btn_sampai_bulan').addClass('btn-success');
		$('#btn_per_bulan').removeClass('btn-success');
	}

	function formtahun () {
		$.ajax({
			url: 'app/laporan/GetFormCariTahun',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});

		
		$('#btn_responden').removeClass('btn-success');
		$('#btn_tahun').addClass('btn-success');
		$('#btn_unsur').removeClass('btn-success');
		$('#btn_rekapitulasi').removeClass('btn-success');
		$('#btn_nilai').removeClass('btn-success');
		$('#btn_jenis').removeClass('btn-success');
		$('#btn_saran').removeClass('btn-success');
		$('#btn_sampai_bulan').removeClass('btn-success');
		$('#btn_per_bulan').removeClass('btn-success');
	}
		

	function formrekapitulasi () {
		$.ajax({
			url: 'app/laporan/GetFormCariRekapitulasi',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});

		$('#btn_responden').removeClass('btn-success');
		$('#btn_tahun').removeClass('btn-success');
		$('#btn_unsur').removeClass('btn-success');
		$('#btn_rekapitulasi').addClass('btn-success');
		$('#btn_nilai').removeClass('btn-success');
		$('#btn_jenis').removeClass('btn-success');
		$('#btn_saran').removeClass('btn-success');
		$('#btn_sampai_bulan').removeClass('btn-success');
		$('#btn_per_bulan').removeClass('btn-success');
	}

	function formnnilaiikm () {
		$.ajax({
			url: 'app/laporan/GetFormCariNilaiIkm',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});

		$('#btn_responden').removeClass('btn-success');
		$('#btn_tahun').removeClass('btn-success');
		$('#btn_unsur').removeClass('btn-success');
		$('#btn_rekapitulasi').removeClass('btn-success');
		$('#btn_nilai').addClass('btn-success');
		$('#btn_jenis').removeClass('btn-success');
		$('#btn_saran').removeClass('btn-success');
		$('#btn_sampai_bulan').removeClass('btn-success');
		$('#btn_per_bulan').removeClass('btn-success');
	}

	function formperjenislayanan () {
		$.ajax({
			url: 'app/laporan/GetFormCariPerjenisLayanan',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});

		$('#btn_responden').removeClass('btn-success');
		$('#btn_tahun').removeClass('btn-success');
		$('#btn_unsur').removeClass('btn-success');
		$('#btn_rekapitulasi').removeClass('btn-success');
		$('#btn_nilai').removeClass('btn-success');
		$('#btn_jenis').addClass('btn-success');
		$('#btn_saran').removeClass('btn-success');
		$('#btn_sampai_bulan').removeClass('btn-success');
		$('#btn_per_bulan').removeClass('btn-success');
	}

	function formpersaran() {
		$.ajax({
			url: 'app/laporan/GetFormCariPerSaran',
			type: 'POST',
			data: {

			},
			success: function (respon) {
				$("#tabellaporan").html(respon);
				$("#tabellaporan").prepend('<div align="center">'+LOADER+'');
		        $(".loader_img").fadeOut(1000);
			}
		});
		$('#btn_responden').removeClass('btn-success');
		$('#btn_tahun').removeClass('btn-success');
		$('#btn_unsur').removeClass('btn-success');
		$('#btn_rekapitulasi').removeClass('btn-success');
		$('#btn_nilai').removeClass('btn-success');
		$('#btn_jenis').removeClass('btn-success');
		$('#btn_saran').addClass('btn-success');
		$('#btn_sampai_bulan').addClass('btn-success');
		$('#btn_per_bulan').addClass('btn-success');
	}


</script>


		