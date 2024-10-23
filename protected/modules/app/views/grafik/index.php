<?php define('ASSETS_URL', 'themes/smartadmin'); ?>

<div class="well">
  <h1 class="semi-bold"  align="center" > <i class="fa fa-cogs"> &nbsp;</i>Laporan Jumlah Responden per Jenis Izin, per Tingkat Pendidikan, per Jenis Kelamin, dan per Usia <!-- Loket, --></h1>

  <p class="alert alert-info">
    Berikut ini adalah Laporan Jumlah Responden per Jenis Izin, per Tingkat Pendidikan, per Jenis Kelamin dan per Usia pada Kabupaten Pulang Pisau. 
    <br><strong class="inverted">
    <span class="word-rotate">
      <span class="word-rotate-items">
       <span>Pilih</span>
       <span>salah satu</span>
     </span>
   </span>
 </strong> untuk menampilkan data yang akan ditampilkan.
</p>
</div>


<div class="well well-sm well-light" align="center">
	
	<button rel="tooltip" data-placement="bottom" data-original-title="Digunakan untuk cetak dan menampilkan grafik laporan jumlah responden per Jenis Izin " 
  onclick="jenisizin()" id="btn_pelayanan" type="button" class="btn btn-labeled btn-primary" style="width: 190px;">
  <span class="btn-label" style="margin-left: -48px;">
    <i class="fa fa-book"></i>
  </span>per Jenis Izin
</button>

<button rel="tooltip" data-placement="bottom" data-original-title="Digunakan untuk cetak dan menampilkan grafik laporan jumlah responden per Tingkat Pendidikan " 
onclick="tingkatpendidikan()" id="btn_pendidikan" type="button" class="btn btn-labeled btn-primary" style="width: 190px;">
<span class="btn-label">
  <i class="fa fa-pencil"></i>
</span>per Tingkat Pendidikan
</button>

<button rel="tooltip" data-placement="bottom" data-original-title="Digunakan untuk cetak dan menampilkan grafik laporan jumlah responden per Jenis Kelamin " 
onclick="jeniskelamin()" id="btn_jenis" type="button" class="btn btn-labeled btn-primary" style="width: 190px;">
<span class="btn-label" style="margin-left: -29px;">
  <i class="fa fa-user"></i>
</span>per Jenis Kelamin
</button>

<button rel="tooltip" data-placement="bottom" data-original-title="Digunakan untuk cetak dan menampilkan grafik laporan jumlah responden per usia " 
onclick="usia()" id="btn_usia" type="button" class="btn btn-labeled btn-primary" style="width: 190px;">
<span class="btn-label" style="margin-left: -83px;">
  <i class="fa fa-paperclip"></i>
</span>per Usia
</button>

   	<!-- <button onclick="loket()" type="button" class="btn btn-labeled btn-default">
   		<span class="btn-label">
    		<i class="fa fa-location-arrow"></i>
   		</span>Loket
     </button> -->

     <!-- <button rel="tooltip" data-placement="bottom" data-original-title="digunakan untuk cetak dan menampilkan grafik laporan jumlah saran " 
     onclick="saran()" id="btn_saran" type="button" class="btn btn-labeled btn-primary" style="width: 150px;">
     <span class="btn-label" style="margin-left: -73px;">
      <i class="fa fa-comment"></i>
    </span>Saran
  </button> -->

 <!--  <button rel="tooltip" data-placement="bottom" data-original-title="digunakan untuk cetak dan menampilkan grafik laporan jumlah nilai IKM " 
  onclick="nilaiikm()" id="btn_nilai" type="button" class="btn btn-labeled btn-primary" style="width: 150px;">
  <span class="btn-label" style="margin-left: -54px;">
    <i class="fa fa-list-ol"></i>
  </span>Nilai IKM
</button> -->

<!-- <button rel="tooltip" data-placement="bottom" data-original-title="digunakan untuk cetak dan menampilkan grafik laporan jumlah responden" 
onclick="perjenis()" id="btn_responden" type="button" class="btn btn-labeled btn-primary" style="width: 129px;">
<span class="btn-label">
  <i class="fa fa-tasks"></i>
</span><span style="margin-left: -1px;">Responden</span>
</button> -->

</div>

<div id="grafikikm">

</div>
<!-- 
<script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/highcharts.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/highcharts-3d.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/highcharts/exporting.js"></script>
 -->


<script>

  pageSetUp();

  jQuery(document).ready(function($) {
      $.fn.modal.Constructor.prototype.enforceFocus = function () {}; //paksa select2 bisa search
      
    });

  LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

  function jenisizin () {
    $("#grafikikm").html('<div align="center">'+LOADER+'').fadeIn(400);
    $.ajax({
     url: 'app/grafik/JenisIzin',
     type: 'POST',
     data: {
  				/*tanggal_awal: $("#tanggal_awal").val(),
  				tanggal_akhir: $("#tanggal_akhir").val(),*/
  			},
  			success: function (respon) {
  				$("#grafikikm").html(respon);
  			}
  		});

    $('#btn_pelayanan').addClass('btn-success');
    $('#btn_pendidikan').removeClass('btn-success');
    $('#btn_jenis').removeClass('btn-success');
    $('#btn_usia').removeClass('btn-success');
    $('#btn_saran').removeClass('btn-success');
    $('#btn_nilai').removeClass('btn-success');
    $('#btn_responden').removeClass('btn-success');

  }

  function tingkatpendidikan() {
    $("#grafikikm").html('<div align="center">'+LOADER+'').fadeIn(400);
    $.ajax({
      url: 'app/grafik/TingkatPendidikan',
      type: 'POST',
      data: {

      },
      success: function (respon) {
        $("#grafikikm").html(respon);
      }
    });

    $('#btn_pelayanan').removeClass('btn-success');
    $('#btn_pendidikan').addClass('btn-success');
    $('#btn_jenis').removeClass('btn-success');
    $('#btn_usia').removeClass('btn-success');
    $('#btn_saran').removeClass('btn-success');
    $('#btn_nilai').removeClass('btn-success');
    $('#btn_responden').removeClass('btn-success');

  }

  function jeniskelamin () {
    $("#grafikikm").html('<div align="center">'+LOADER+'').fadeIn(400);
    $.ajax({
      url: 'app/grafik/JenisKelamin',
      type: 'POST',
      data: {

      },
      success: function (respon) {
        $("#grafikikm").html(respon);
      }
    });

    $('#btn_pelayanan').removeClass('btn-success');
    $('#btn_pendidikan').removeClass('btn-success');
    $('#btn_jenis').addClass('btn-success');
    $('#btn_usia').removeClass('btn-success');
    $('#btn_saran').removeClass('btn-success');
    $('#btn_nilai').removeClass('btn-success');
    $('#btn_responden').removeClass('btn-success');

  }

  function loket() {
    $("#grafikikm").html('<div align="center">'+LOADER+'').fadeIn(400);
    $.ajax({
      url: 'app/grafik/Loket',
      type: 'POST',
      data: {

      },
      success: function (respon) {
        $("#grafikikm").html(respon);
      }
    });

  }

  function usia () {
    $("#grafikikm").html('<div align="center">'+LOADER+'').fadeIn(400);
    $.ajax({
      url: 'app/grafik/Usia',
      type: 'POST',
      data: {

      },
      success: function (respon) {
        $("#grafikikm").html(respon);
      }
    });

    $('#btn_pelayanan').removeClass('btn-success');
    $('#btn_pendidikan').removeClass('btn-success');
    $('#btn_jenis').removeClass('btn-success');
    $('#btn_usia').addClass('btn-success');
    $('#btn_saran').removeClass('btn-success');
    $('#btn_nilai').removeClass('btn-success');
    $('#btn_responden').removeClass('btn-success');

  }

  function saran() {
    $("#grafikikm").html('<div align="center">'+LOADER+'').fadeIn(400);
    $.ajax({
      url: 'app/grafik/Saran',
      type: 'POST',
      data: {

      },
      success: function (respon) {
        $("#grafikikm").html(respon);
      }
    });

    $('#btn_pelayanan').removeClass('btn-success');
    $('#btn_pendidikan').removeClass('btn-success');
    $('#btn_jenis').removeClass('btn-success');
    $('#btn_usia').removeClass('btn-success');
    $('#btn_saran').addClass('btn-success');
    $('#btn_nilai').removeClass('btn-success');
    $('#btn_responden').removeClass('btn-success');

  }

  function nilaiikm () {
    $("#grafikikm").html('<div align="center">'+LOADER+'').fadeIn(400);
    $.ajax({
      url: 'app/grafik/Nilaiikm',
      type: 'POST',
      data: {

      },
      success: function (respon) {
        $("#grafikikm").html(respon);
      }
    });

    $('#btn_pelayanan').removeClass('btn-success');
    $('#btn_pendidikan').removeClass('btn-success');
    $('#btn_jenis').removeClass('btn-success');
    $('#btn_usia').removeClass('btn-success');
    $('#btn_saran').removeClass('btn-success');
    $('#btn_nilai').addClass('btn-success');
    $('#btn_responden').removeClass('btn-success');

  }

  function perjenis() {
    $("#grafikikm").html('<div align="center">'+LOADER+'').fadeIn(400);
    $.ajax({
      url: 'app/grafik/Perjenislayanan',
      type: 'POST',
      data: {

      },
      success: function (respon) {
        $("#grafikikm").html(respon);
      }
    });

    $('#btn_pelayanan').removeClass('btn-success');
    $('#btn_pendidikan').removeClass('btn-success');
    $('#btn_jenis').removeClass('btn-success');
    $('#btn_usia').removeClass('btn-success');
    $('#btn_saran').removeClass('btn-success');
    $('#btn_nilai').removeClass('btn-success');
    $('#btn_responden').addClass('btn-success');

  }

</script>
