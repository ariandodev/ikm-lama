<?php define('ASSETS_URL', 'themes/smartadmin'); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light">
			<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-book"></i> 
				<strong>Laporan Survey Indeks Kepuasan Masyarakat</strong></h1>
				<p class="alert alert-info">
					Berikut ini adalah rekapitulasi hasil Survey Indeks Kepuasan Masyarakat (IKM) pelayanan kepegawaian pada Kabupaten Wonogiri.
					<br>Pilih salah satu untuk menampilkan data yang akan ditampilkan.
				</p>


	  </div>
	</div>
</div>
	
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
		<div class="well well-sm well-light">
			<section>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Responden" type="button" class="btn btn-labeled btn-primary" onclick="formresponden()" style="width: 169px;">
					<span class="btn-label" style="margin-left: -42px;">
						<i class="fa fa-book "></i>
					</span>Responden
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Tahun" type="button" class="btn btn-labeled btn-success" onclick="formtahun()" style="width: 169px;">
					<span class="btn-label" style="margin-left: -46px;">
						<i class="fa fa-book "></i>
					</span>Per Tahun
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Unsur Pelayanan" type="button" class="btn btn-labeled btn-warning" onclick="tabelcari()" style="width: 169px;">
					<span class="btn-label">
						<i class="fa fa-book "></i>
					</span><span style="margin-left: -7px;">Per Unsur Pelayanan</span>
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Rekapitulasi Laporan Indeks Kepuasan Masyarakat" type="button" class="btn btn-labeled btn-danger" onclick="formrekapitulasi()" style="width: 169px;">
					<span class="btn-label" style="margin-left: -10px;">
						<i class="fa fa-book "></i>
					</span>Rekapitulasi IKM
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Nilai Indeks Kepuasan Masyarakat" type="button" class="btn btn-labeled btn-info" onclick="formnnilaiikm()" style="width: 169px;">
					<span class="btn-label" style="margin-left: -58px;">
						<i class="fa fa-book "></i>
					</span>Nilai IKM
				</button>

				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat Per Jenis Pelayanan" type="button" class="btn btn-labeled btn-default" onclick="formperjenislayanan()" style="width: 169px;">
					<span class="btn-label">
						<i class="fa fa-book "></i>
					</span><span style="margin-left: -9px;">Per Jenis Pelayanan</span>
				</button>
				
				<button rel="tooltip" data-placement="bottom" data-original-title="Laporan Indeks Kepuasan Masyarakat" type="button" class="btn btn-labeled btn-success" onclick="formpersaran()" style="width: 169px;">
					<span class="btn-label" style="margin-left: -73px;">
						<i class="fa fa-book "></i>
					</span>Saran
				</button>


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
			}
		});
		
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
	}


</script>


		