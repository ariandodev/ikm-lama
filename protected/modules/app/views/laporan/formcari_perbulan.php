<h1>Pencarian Data Responden IKM Per Bulan </h1>
<form  id="form_cari">
<div class="well well-sm well-light">
<h2>Silahkan isi data pencarian terlebih dahulu.</h2>
    <div>
     <div class="row">
      <section class="col-md-2">
       Tahun
     </section>
     <section class="col-md-3">
       <div>
        <select class="form-control" id="tahun" name="tahun" type="text">
         <option value="">=== Pilih Tahun ===</option>
         <?php foreach ($gettahun2 as $list) {
           echo '<option value="'.$list['tahun'].'">'.$list['tahun'].'</option>';
         }
         ?>
       </select>
     </div>
   </section>
  </div>
  </div><br />

  <div>
    <div class="row">
      <section class="col-md-2">
        Bulan
      </section>
      <section class="col-md-3">
        <div>
          <select class="form-control" id="bulan" name="bulan"  type="text">
            <option value="">=== Pilih Bulan ===</option>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
      </section>
    </div>
  </div><br />

    <button type="button" onclick="tampil()" class="btn btn-labeled btn-primary">
       <span class="btn-label">
          <i class="fa fa-desktop "></i>
       </span>Tampil
    </button>
    Klik tombol Tampil untuk melihat hasil pencarian
</div>

<div id="data_laporan">

</div>
</form>

<script type="text/javascript">

  function tampil() {
      if ($("#tahun").val()=='') {
        //alert('blablablaba');
        notifikasi('Informasi','Mohon pilih Tahun','failed',1,0);
      }
      else{
            
      $("html, body").animate({ scrollTop: 800 }, "slow");
      $("#data_laporan").slideDown(600);
      $.ajax({
        url: 'app/laporan/GetDataLaporanPerBulan',
        type: 'POST',
        data: {
          tahun: $("#tahun").val(),
          bulan: $("#bulan").val(),
        },
        success:function (respon) {
            $("#data_laporan").html(respon);
          }
      });
    }
  }

  loadScript("<?php echo Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);
        function runFormValidation() {
            var $FormDaftar = $("#form_cari").validate({
                // Rules for form validation
                rules : {
                    "tahun" : {
                        required : true
                    }
                    ,"bulan" : {
                        required : true
                    }
                },

                // Messages for form validation
                messages : {
                    "tahun" : {
                        required : 'Mohon pilih tahun laporan ikm'
                    }
                    ,"bulan" : {
                        required : 'Mohon pilih bulan'
                    }
                },

                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                },
                submitHandler : function(form) {
                    // saat validasi benar semua, jalankan simpan()
                    return tampil();
                }
            });
    }

    

</script>
<style type="text/css">
  em.invalid {
    color: red;
  }
</style>


