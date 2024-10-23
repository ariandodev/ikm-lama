<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<style type="text/css">
    .img-fp {
        cursor: pointer;
        border: 2px solid transparent;
    }

    .img-fp:hover {
        border: 2px solid #333;
        transition: all 0.5s;
    }
    .img-modal {
        width: 100%;
        height: auto;
        margin-bottom: 30px;
        text-align: center;
        box-shadow: 2px 3px 3px #333;
        -moz-box-shadow: 2px 3px 3px #333;
        -webkit-box-shadow: 2px 3px 3px #333;
        -ms-box-shadow: 2px 3px 3px #333;
        -o-box-shadow: 2px 3px 3px #333;
    }
    .price-features
        {
            min-height: 200px;    
        }
</style>
<section>
<div class="row">

    <div class="col-sm-12">


            <div class="well well-sm">

                <div class="row">

                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="well well-light well-sm no-margin no-padding">

                            <div class="row">

                                <div class="col-sm-12">
                                    <div id="myCarousel" class="carousel fade profile-carousel">
                                        
                                        <div class="air air-top-left padding-10">
                                            <h4 class="txt-color-blueDark font-md">
                                            	<?php 
                                                Yii::import('ext.TanggalIndonesia');
                                                $tgl = new TanggalIndonesia;
                                                $tglhari = $tgl->TanggalHari(date("Y-m-d"));

                                                echo $tglhari; 
                                            	?>
                                            </h4>
                                        </div>
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <!-- Slide 1 -->
                                            <div class="item active">
                                                <img src="images/gbr3.jpg" alt="">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="item">
                                                <img src="images/gbr2.jpg" alt="">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="item">
                                                <img src="images/gbr1.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-3 profile-pic">
                                            <img src="uploads/pengguna/<?php echo $pengguna['foto']; ?>" onclick="editfp()" class="img-fp" title="Ganti Foto Profil"> 
                                        </div>
                                        <div class="col-sm-6">
                                            <h1><?php echo $pengguna['nama']; ?> 
                                            <br>
                                            <small> <?php echo $level['tblrole_code']; ?></small></h1>

                                            <ul class="list-unstyled">
                                                <li>
                                                    <p class="text-muted">
                                                        <i class="fa fa-phone"></i> <?php echo $pengguna['telp']; ?>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="text-muted">
                                                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?php echo $pengguna['email']; ?>"><?php echo $pengguna['email']; ?></a>
                                                    </p>
                                                </li>
                                                
                                            </ul>
                                        </div>                                                                                            
                                        

                                    </div>

                                </div>

                            </div>
                            <!-- end row -->

                        </div>
                        <!-- <div style="height: 36p"></div>

                        <div class="well well-light well-sm no-margin no-padding bg-color-teal">

                        	<div class="row">
                        		<div class="col-md-12">
                                    
                        		</div>
                        	</div>

                        </div> -->
                        <br>
                    </div>
                    <br>
<div class="col-sm-12 col-md-12 col-lg-6">

<div class="row" style="margin-top: -17px;">
    
    <div class="col-sm-12">
        
        <div class="well well-light">
            
            
            <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="panel panel-greenDark pricing-big">
                        
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Web Browser</h3>
                        </div>
                        <div class="panel-body no-padding text-align-center">
                            <div class="the-price">
                                <h1>
                                    (Free)</h1>
                            </div>
                            <div class="price-features">
                                <ul class="list-unstyled text-left">
                                  <li><i class="fa fa-check text-success"></i> Silakan mengunduh aplikasi web browser dibawah ini untuk menggunakan aplikasi lebih baik.</li>  
                                  <li><i class="fa fa-check text-success"></i> Klik pada link tombol download berwarna hijau untuk men-download Google Chrome installer.</li>
                                  <!-- <li><i class="fa fa-check text-success"></i> Tergantung pada kecepatan koneksi Anda , download bisa memakan waktu hingga beberapa menit.</li> -->
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="panel-footer text-align-center" style="background-color:#333 !important;">
                            <a href="#" class="btn btn-primary btn-block" style="background-color:#496949 !important;border-color:#496949!important" role="button">Download</a>                            
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="panel panel-teal pricing-big">
                        
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Buku Manual</h3>
                        </div>
                        <div class="panel-body no-padding text-align-center">
                            <div class="the-price">
                                <h1>
                                    (Penggunaan Aplikasi)</h1>
                            </div>
                            <div class="price-features">
                                <ul class="list-unstyled text-left">
                                  <li><i class="fa fa-check text-success"></i> Silakan mengunduh petunjuk penggunaan aplikasi (buku manual) dibawah ini.</li>
                                  <li><i class="fa fa-check text-success"></i> Klik pada link tombol download berwarna biru untuk men-download Buku Manual.</li>                                  
                                </ul>
                                
                           </div>
                        </div>
                        <div class="panel-footer text-align-center" style="background-color:#333 !important;">
                            <a href="" class="btn bg-color-teal btn-block" style="color:#fff !important" role="button">Download</a>                            
                        </div>
                    </div>
                </div>

                        </div>


                    </div>
                </div>

            </div>


    </div>

</div>

<!-- end row -->

</section>
<!-- end widget grid -->

<!-- Modal Upload -->
<div class="modal fade" id="updatefoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" align="center">
                    Ganti Foto Profil
                </h4>
            </div>
            <div class="modal-body no-padding">
                <form method="post" enctype="multipart/form-data" class="smart-form" action="app/tblpengguna/gantifp" id="form-simpanfile">

                    <fieldset>
                        <section>
                            <div class="row">
                            <div class="col col-md-12" align="center">
                            <span>Foto Profil lama</span>
                                <div align="center">
                                 <img src="uploads/pengguna/<?php echo $pengguna['foto']; ?>" onclick="editfp()" style="width: 50%;" class="img-modal" title="Foto Profil Lama"> 
                                </div>
                            </div>
                               
                                <div class="col col-md-12">
                                <input type="hidden" name="id" id="id" value="<?php echo Yii::app()->user->getId(); ?>">
                                    <label for="file" class="input input-file">
                                        <div class="button">
                                            <input type="file" name="fotoprofil" id="fotoprofil" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Pilih Foto" readonly="">

                                    </label>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="progress progress-lg progress-striped active" id="progress">
                                <div class="progress-bar bg-color-green"  id="bar"  role="progressbar" style="width: 0%;"></div>
                            </div>
                        </section>  
                    </fieldset>

                    <footer>
                        <button type="submit" class="btn btn-success">
                            Simpan
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Batal
                        </button>

                    </footer>
                </form>                     
                        

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
pageSetUp();

//cek();
//cekproses();
loadScript("<?php echo ASSETS_URL; ?>/js/jquery.form.js",defineAjaxForm);
    function defineAjaxForm() {
        var options = { 
            beforeSend: function() 
            {
                $("#progress").show();
                var cek = $("#fotoprofil").val();
                if (cek == "") {
                    $("#updatefoto").modal("hide");
                    notifikasi('Batal','Batal Upload Foto, foto kosong','cancel');
                    complete.die();
                }

                //clear everything
                $("#bar").width('0%');

            },
            uploadProgress: function(event, position, total, percentComplete) 
            {
                $("#bar").width(percentComplete+'%');

            },
            success: function() 
            {
                $("#bar").width('100%');

            },
            complete: function(response) 
            {
                //alert("Sukses diupload");
                //window.responsefile = response.responseText;
                $("#updatefoto").modal("hide");
              
                notifikasi('Berhasil','Foto Profil berhasil diperbaharui','success');
                //window.location.reload();
            },
            error: function()
            {
                notifikasi('Error','File gagal diupload','fail');

            }

        }; 

        $("#form-simpanfile").ajaxForm(options);
    }

// PAGE RELATED SCRIPTS

function editfp () {
    $("#updatefoto").modal("show");
}

</script>
