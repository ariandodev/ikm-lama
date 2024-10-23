<?php define('ASSETS_URL', $data['theme_baseurl']); ?>
<link rel="stylesheet" href="themes/smartadmin/js/plugin/multi-keyboard/jquery.ml-keyboard.css" type="text/css" media="screen"/>
<style type="text/css">
	#kolom-pertanyaan
	{
		font-size: 19px !important;
	}
	#bigs
	{
		width: 24% !important;
		padding: 1% 1%;
		font-size: 89% !important;
	}

	.mobile-view-activated #bigs

	{
		width: 24% !important; 
		padding: 1% 1%;
		font-size: 80% !important;
	}

	.MessageBoxButtonSection button {	
		font-size: 26px !important;
		padding: 2px 22px !important;
	}
</style>

<div style="position:fixed; z-index: 999; right: 0px;">
	<a onclick="keatas()" class="btn btn-circle btn-primary btn-lg" ><i class="fa fa-caret-square-o-up"></i></a>
</div>
<div style="position:fixed; z-index: 999; right: 0px; bottom: 40px;">
	<a onclick="kebawah()" class="btn btn-circle btn-primary btn-lg" ><i class="fa fa-caret-square-o-down"></i></a>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START --><!-- WIDGET END -->

		<!-- NEW WIDGET START -->
		<article class="col-sm-12 col-md-12 col-lg-12" style="width: 97%;">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-ikuskpd"  data-widget-sortable="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
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
				<h2>Indek Kepuasan Masyarakat </h2>

			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body fuelux">

					<div class="wizard">
						<ul class="steps">
							<li data-target="#step1" class="active complete">
								<!-- <span class="badge">1</span> -->Input IKM<span class="chevron"></span>									
							</li>
								<!-- <li data-target="#step2" id="formpertanyaan" class="active complete">
									<span class="badge">2</span>Input Pertanyaan<span class="chevron"></span>
									</a>
								</li> 
                                <li data-target="#step3" class="" >
									<span class="badge">3</span>Pendapat Responden<span class="chevron"></span>
									</a>
								</li>-->          
							</ul>
							<!-- <div class="actions" style="visibility:hidden"><style="visibility:hidden">
								<button id="btn-back" type="button" class="btn btn-sm btn-primary btn-prev">
									<i class="fa fa-arrow-left"></i>Prev
								</button>
								<button id="btn-neks" type="button" class="btn btn-sm btn-success btn-next" data-last="Finish">
									Next<i class="fa fa-arrow-right"></i>
								</button>
							</div>-->
						</div>


						<div class="well" style="background-color: #FFFFFF; border-color: #bfbfbf;">
							<form id="form-ikm" class="form-horizontal">
								<div class="row">
									<div id="form-identitas">

										<div class="form-group">
											<label class="col-md-3 control-label" style="font-size: 24px;">Nama Anda</label>
											<div class="col-md-5">
												<input class="form-control input-lg" placeholder="Masukan nama anda" type="text" id="namaresponden" name="namaresponden" style="font-size: 20px;">
											</div>
											<div class="col-md-1">
												<button type="button" onclick="$('#namaresponden').focus();" class="btn-keyboard btn btn-circle btn-default btn-lg" rel="tooltip" data-original-title="Tampilkan Keyboard"><i class="fa fa-keyboard-o"></i></button>
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-3 control-label" style="font-size: 24px;">Jenis izin</label>
											<div class="col-md-5">
												<select class="select2" id="jenisizin" name="jenisizin" style="font-size: 20px;">
													<option value="0" selected="" disabled="">=== Pilih Jenis Izin ===</option>
													<?php foreach ($data['jenis_izin'] as $jenis_izin): ?>
														<option value="<?php echo $jenis_izin['refjenisizinikm_id']; ?>">
															[<?php echo $jenis_izin['refjenisizinikm_id']; ?>]
															<?php echo $jenis_izin['refjenisizinikm_nama']; ?>
														</option>

													<?php endforeach ?>
												</select>
											</div>
										</div>							  	

										<div class="form-group">
											<label class="col-md-3 control-label" style="font-size: 24px;">Jenis Kelamin</label>
											<div class="col-md-5">
												<select class="form-control input-lg" id="jeniskelamin" name="jeniskelamin" style="font-size: 20px;">
													<option value="0" selected="" disabled="">=== Pilih Jenis Kelamin ===</option>
													<option value="1">Laki-Laki</option>
													<option value="2">Perempuan</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-3 control-label" style="font-size: 24px;">Umur</label>
											<div class="col-md-5">
												<input class="format-rupiah form-control input-lg" placeholder="Masukan usia anda" type="text" id="usia" name="usia" style="font-size: 20px;">
											</div>
											<div class="col-md-1">
												<button type="button" onclick="$('#usia').focus();" class="btn-keyboard btn btn-circle btn-default btn-lg" rel="tooltip" data-original-title="Tampilkan Keyboard"><i class="fa fa-keyboard-o"></i></button>
											</div>
										</div>

										<!--<div class="form-group">
											<label class="col-md-3 control-label" style="font-size: 24px;">Status Responden</label>
											<div class="col-md-5">
												<select class="form-control input-lg" id="statusresponden" name="statusresponden" style="font-size: 20px;">
													<option value="0" selected="" disabled="">=== Pilih Status Responden ===</option>
													<option value="1">Pemilik</option>
													<option value="2">Kuasa</option>
												</select>
											</div>
										</div> -->

										<div class="form-group">
											<label class="col-md-3 control-label" style="font-size: 24px;">Tingkat Pendidikan</label>
											<div class="col-md-5">
												<select class="select2" id="tingkatpend" name="tingkatpend" style="font-size: 20px;">
													<option value="0" selected="" disabled="">=== Pilih Tingkat Pendidikan ===</option>
													<?php foreach ($datapendidikan as $pendidikan): ?>
														<option value="<?php echo $pendidikan['reftingkatpendidikan_id']; ?>">
															<?php echo $pendidikan['reftingkatpendidikan_nama']; ?>
														</option>

													<?php endforeach ?>
												</select>
											</div>
										</div>

										<!--<div class="form-group">
											<label class="col-md-3 control-label" style="font-size: 24px;">Pendaftaran</label>
											<div class="col-md-5">
												<select class="form-control input-lg" id="statuspendaftaran" name="statuspendaftaran" style="font-size: 20px;">
													<option value="0" selected="" disabled="">=== Pilih Pendaftaran ===</option>
													<option value="1">Loket</option>
													<option value="2">Online</option>
												</select>
											</div>
										</div>-->
										<div class="row">
											<div class="col col-sm-6 col-md-6 col-lg-6 text-right">
												<a class="btn btn-primary btn-lg" onclick="tampil_ikm()" id="tombol-input">Input IKM</a> &nbsp;
											</div>
											<div class="col col-sm-6 col-md-6 col-lg-6 text-left">
												<a class="btn btn-danger btn-lg" href="<?php echo Yii::app()->getBaseUrl(1); ?>/site/landing" id="tombol-kembali">Kembali</a>
											</div>
										</div>

									</div>
									<br>
									<div id="formpertanyaan" style="display:none;">
										<div>
											<table width="100%" class="table table-bordered" style="font-family: Narrow,'Open Sans',Arial,Helvetica,sans-serif; font-size: 188%; font-weight: bold;">  
												<thead>
													<tr class="bg-color-blueDark ">
														<th><div align="center" style="font-size: 188%;">No</div></th>
														<th><div align="left" style="font-size: 188%;">Silahkan isi pertanyaan berikut :</div></th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($datapertanyaan as $pertanyaan): ?>
														<tr style="background-color: beige;">
															<a class="editable editable-click" data-original-title="Please, fill address">
																<td id="kolom-pertanyaan"><div align="center"><?php echo $pertanyaan['tblpertanyaan_urut'];?></div></td>
																<td id="kolom-pertanyaan"><p><?php echo $pertanyaan['tblpertanyaan_uraian'];?></p>					        </td></a></tr>

																<tr>
																	<td>&nbsp;</td>
																	<td id="pertanyaan-nya">
																		<?php $jwb = Tblpertanyaan::model()->getjawaban($pertanyaan['tblpertanyaan_id']); ?>

																		<div class="col-md-12">
																			<label id="bigs" class="btn btn-danger" style="width: 246px;">
																				<input class="radiobox" name="soal<?php echo $jwb->tblpertanyaan_id; ?>" id="<?php echo $jwb->tblpertanyaan_id; ?>1" type="radio" value="1">
																				<span class="pull-left">A. <?php echo $jwb->tblpertanyaan_ketjawabanA; ?> </span></label>


																				<label id="bigs" class="btn btn-warning" style="width: 246px;">
																					<input class="radiobox" name="soal<?php echo $jwb->tblpertanyaan_id; ?>" id="<?php echo $jwb->tblpertanyaan_id; ?>2" type="radio" value="2">
																					<span class="pull-left">B. <?php echo $jwb->tblpertanyaan_ketjawabanB; ?> </span></label>


																					<label id="bigs" class="btn btn-info" style="width: 246px;">
																						<input class="radiobox" name="soal<?php echo $jwb->tblpertanyaan_id; ?>" id="<?php echo $jwb->tblpertanyaan_id; ?>3" type="radio" value="3">
																						<span class="pull-left">C. <?php echo $jwb->tblpertanyaan_ketjawabanC; ?> </span></label>


																						<label id="bigs" class="btn btn-success" style="width: 246px;">
																							<input class="radiobox" name="soal<?php echo $jwb->tblpertanyaan_id; ?>" id="<?php echo $jwb->tblpertanyaan_id; ?>4" type="radio" value="4">
																							<span class="pull-left">D. <?php echo $jwb->tblpertanyaan_ketjawabanD; ?> </span></label>
																						</div>

																					</td>
																				</tr>
																			<?php endforeach ?>


																			<tr>
																				<td colspan="2">Saran / masukan :</td>
																			</tr>
																			<tr>
																				<td colspan="2">
																					<textarea style="width: 100%;" rows="3" name="masukan" id="masukan"></textarea>
																				</td>
																			</tr> 
																		</tbody>
																	</table>
																</div>
																<div class="modal-footer">
																	<button style="padding:17px;" class="btn btn-primary btn-lg pull-left" type="button" onclick="simpan()">			  	
																		<i class="fa fa-save"></i> Selesai
																	</button>
																	<button style="padding:17px;" class="btn btn-danger btn-lg pull-left" type="button" onclick="batalkan()">			  	
																		<i class="fa fa-times"></i> Batal
																	</button>
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

								</article>
								<!-- WIDGET END -->

							</div>

							<!-- end row -->

						</section>

						<script type="text/javascript">
	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();

	jQuery(document).ready(function($) {
		$("#wid-id-ikuskpd .jarviswidget-fullscreen-btn").hide();
		
		$('#content input').mlKeyboard({layout: 'en_US', active_shift:false});
		$('#content textarea').mlKeyboard({layout: 'en_US', active_shift:false});
		$('#btn-keyboard').mlKeyboard({layout: 'en_US', active_shift:false});

		// $(document).idle({
		// 	  onIdle: function(){
		// 		window.location='<?php echo Yii::app()->getBaseUrl(1); ?>/site/landing';
		// 	  },
		// 	  idle: 30000
		// });
});
	

		/*setTimeout(function () {
		   window.location.href= '<?php //echo Yii::app()->getBaseUrl(1); ?>/site/landing'; // the redirect goes here
		
		},600000);*/

function tampil_ikm () {
	if ($("#usia").val()=='' || $("#namaresponden").val()=='' || $("#jeniskelamin option:selected").val()=='0' || $("#jenisizin option:selected").val()=='0' || $("#tingkatpend option:selected").val()=='0' || $("#statuspendaftaran option:selected").val()=='0' || $("#statusresponden option:selected").val()=='0') {
		$.SmartMessageBox({
				title : "Peringatan<br> Terdapat isian yang masih kosong, silakan lengkapi kembali", // judul Smart Alert
				content : "", // konten dari smart alert
				buttons : '[Ok]' // pengaturan tombol
			},function(ButtonPressed) {
				if (ButtonPressed === "Ok") {
					//nothing to do here
					return false;
				}

			});
	}
	else {
		$("#form-identitas").slideUp('slow');
		$("#formpertanyaan").slideDown('slow');
		$("#tombol-input").html('Kembali Input IKM');
			/*setTimeout(function() {			
				if ($("#jenisizin").val()!='1') {
					disablebtn();
				} else {
					$("input[name=soal4]").removeAttr('disabled');
				}
			}, 100);*/
}
}

function disablebtn () {
	if ($("#jenisizin").val()!='5') {			
		$("input#44").click();
		$("input[name=soal4]").attr('disabled', 'disabled');
	}else {
		$("input[name=soal4]").removeAttr('disabled');
	}
}
function batalkan () {
	$("#form-identitas").slideDown('slow');
	$("#formpertanyaan").slideUp('slow');
}



	// PAGE RELATED SCRIPT

	/*
	 * Load bootstrap wizard dependency
	 */
	 loadScript("<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js", runBootstrapWizard);

	 <?php $jml = Tblpertanyaan::model()->findAll(); $data = count($jml); ?>
	 function simpan () {
	 	$("input[name=soal4]").removeAttr('disabled');
		//alert("simpan");
		if ($(":radio:checked").length<<?php echo $data; ?> || $("#namaresponden").val()=='' ||  $("#usia").val()=='' || $("#jeniskelamin").val()==0 || $("#jenisizin option:selected").text()=='' || $("#masukan").val()=='' || $("#tingkatpend").val()=='' ||  $("#statusresponden").val()=='') {
			$.SmartMessageBox({
				title : "Peringatan<br> Terdapat isian yang masih kosong, silakan lengkapi kembali", // judul Smart Alert
				content : "", // konten dari smart alert
				buttons : '[Ok]' // pengaturan tombol
			},function(ButtonPressed) {
				if (ButtonPressed === "Ok") {
					//nothing to do here
				}

			});
			
		}
		else {
			<?php $jml = Tblpertanyaan::model()->findAll(); ?>
			<?php $n=1; $n2 = 1; foreach ($jml as $jumlah): ?>
			<?php echo 'var soal'.$n++.'= $(":radio[name=\'soal'.$n2++.'\']:checked").val();'."\n"; ?>
		<?php endforeach; ?>

		var dataForm = $("#form-ikm").serialize(); 
		$.ajax({
			url: 'hasilsurvey/simpan',
			type: 'post',
			data: dataForm,
			success:function(data) {
				sound_finish();
				$.bigBox({
					title : "<h1>Data tersimpan</h1>",
					content : "<h2>Terimakasih Anda telah melakukan pengisian Indeks Kepuasan Masyarakat</h2>",
					color : "#3276B1",
					timeout: 3000,
					icon : "",				
				});		
				setTimeout(function() {
						//myLoop();
						window.location.reload();
					}, 6000);
			}
		});
	}
	
}

function sound_finish () {
	var audio = new Audio('<?php echo ASSETS_URL;?>/sound/notif_ikm_selesai.mp3');
	audio.play();
}
	function myLoop () {           //  create a loop function
		   setTimeout(function () {    //  call a 3s setTimeout when the loop is called
		      window.location.reload();          //  your code here
		      i++;                     //  increment the counter
		      if (i < 5) {            //  if the counter < 10, call the loop function
		         myLoop();             //  ..  again which will trigger another 
		      }                        //  ..  setTimeout()
		  }, 1000)
		}
		"soal1=3&soal2=3&soal3=3&soal4=2&soal5=3&soal6=3&soal7=2&soal8=3&soal9=4&masukan=bla+bla"
	//Bootstrap Wizard Validations
	function kliknext () {
		$("#btn-neks").click();
	}
	function klikback () {
		$("#btn-back").click();
	}
	function runBootstrapWizard() {
		

		var $validator = $("#wizard-1").validate({

			rules: {
				email: {
					required: true,
					email: "Your email address must be in the format of name@domain.com"
				},
				fname: {
					required: true
				},
				lname: {
					required: true
				},
				country: {
					required: true
				},
				city: {
					required: true
				},
				postal: {
					required: true,
					minlength: 4
				},
				wphone: {
					required: true,
					minlength: 10
				},
				hphone: {
					required: true,
					minlength: 10
				}
			},

			messages: {
				fname: "Please specify your First name",
				lname: "Please specify your Last name",
				email: {
					required: "We need your email address to contact you",
					email: "Your email address must be in the format of name@domain.com"
				}
			},

			highlight: function (element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			unhighlight: function (element) {
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			},
			errorElement: 'span',
			errorClass: 'help-block',
			errorPlacement: function (error, element) {
				if (element.parent('.input-group').length) {
					error.insertAfter(element.parent());
				} else {
					error.insertAfter(element);
				}
			}
		});

$('#bootstrap-wizard-1').bootstrapWizard({
	'tabClass': 'form-wizard',
	'onNext': function (tab, navigation, index) {
		var $valid = $("#wizard-1").valid();
		if (!$valid) {
			$validator.focusInvalid();
			return false;
		} else {
			$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
				'complete');
			$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
			.html('<i class="fa fa-check"></i>');
		}
	}
});

}

	/*$('#statuspendaftaran').change(function() {
  		$("#formpertanyaan").show();
  	});*/

</script>
<style type="text/css">
	label input[type=radio][disabled].radiobox+span, label input[type=radio][disabled].radiobox:checked+span, label:hover input[type=radio][disabled].radiobox:checked+span:before {
		color: #FFFFFF !important;
	}
</style>
<!-- <div rel="tooltip" data-placement="left" data-original-title="Klik untuk scroll ke atas" id="back-top" style="display: block;">
			<a href="#top">
				<span style="color:white;">
					
					<i style="margin-top:5px;" class="fa fa-arrow-up fa-2x"></i></span>
			</a>
		</div> -->

		<style type="text/css">
			#back-top {
				position: fixed;
				bottom: 40px;
				right: -45px;
				/*margin-left: -40px;*/
			}

			#back-top a {
				width: 108px;
				display: block;
				text-align: center;
				font: 11px/100% Arial, Helvetica, sans-serif;
				text-transform: uppercase;
				text-decoration: none;
				color: #bbb;

				/* transition */
				-webkit-transition: 1s;
				-moz-transition: 1s;
				transition: 1s;
			}
			#back-top a:hover {
				color: #000;
			}

			/* arrow icon (span tag) */
			#back-top span {
				width: 30px;
				height: 30px;
				display: block;
				margin-bottom: 7px;
				background: #0C3E77;

				/* rounded corners */
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				border-radius: 5px;

				/* transition */
				-webkit-transition: 1s;
				-moz-transition: 1s;
				transition: 1s;
			}
			#back-top a:hover span {
				background-color: #3778C3;
			}
		</style>

		<script type="text/javascript">
			jQuery(document).ready(function(){

		    // hide #back-top first
		    jQuery("#back-top").hide();
		    
		    // fade in #back-top
		    jQuery(function () {
		    	jQuery(window).scroll(function () {
		    		if (jQuery(this).scrollTop() > 100) {
		    			jQuery('#back-top').fadeIn();
		    		} else {
		    			jQuery('#back-top').fadeOut();
		    		}
		    	});

		        // scroll body to 0px on click
		        jQuery('#back-top a').click(function () {
		        	jQuery('body,html').animate({
		        		scrollTop: 0
		        	}, 800);
		        	return false;
		        });
		    });

		});
			var scrolled=0;
			function keatas() {
				scrolled=scrolled-300;
				$('body,html').animate({
					scrollTop:  scrolled
				});
			}
			function kebawah() {
				scrolled=scrolled+300;
				$('body,html').animate({
					scrollTop:  scrolled
				});
			}
		</script>
