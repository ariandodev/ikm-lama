<?php

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Login";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
define('LOGIN', true);

$page_css[] = "your_style.css";
$no_main_header = true;
$page_body_prop = array(
	"id"=>"login",
	 "class"=>"animated fadeInDown bg",
	 "style"=>"min-height: 618px; background: url('<?php echo APP_URL; ?>/img/images/bg.jpg');background-size:cover;"
	 );
require_once("themes/smartadmin/views/layouts/header.php");

?>
<style type="text/css">
	#login
	{	
		background-color: rgba(211, 219, 211, 0.61);
		background-size:cover !important;
		background-repeat: no-repeat !important;
	}
	.bg {
		background-size:cover !important;
		background-repeat: no-repeat !important;
	}
	#login #header {
		border-bottom: 2px solid #F4E599!important;
	}
	/*#main {
		background: none !important;
	}*/
	/*.redaksional-header
	{
		-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=117, Color=#000000)";
		text-shadow: 3px 6px 9px rgba(0,0,0,0.7);
		filter: progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000); 
	}*/
	.blink_me {
    -webkit-animation-name: blinker;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
    
    -moz-animation-name: blinker;
    -moz-animation-duration: 1s;
    -moz-animation-timing-function: linear;
    -moz-animation-iteration-count: infinite;
    
    animation-name: blinker;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
	}

	@-moz-keyframes blinker {  
	    0% { opacity: 1.0; }
	    50% { opacity: 0.0; }
	    100% { opacity: 1.0; }
	}

	@-webkit-keyframes blinker {  
	    0% { opacity: 1.0; }
	    50% { opacity: 0.0; }
	    100% { opacity: 1.0; }
	}

	@keyframes blinker {  
	    0% { opacity: 1.0; }
	    50% { opacity: 0.0; }
	    100% { opacity: 1.0; }
	}
	/*.col-sm-12
	{
		margin-left: 0px !important;
		margin-top: 20% !important;
	}*/
	.box-shadow {
		-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000)";/*IE 8*/
		-moz-box-shadow: 8px 8px 9px 1px rgba(0,0,0,0.7);/*FF 3.5+*/
		-webkit-box-shadow: 8px 8px 9px 1px rgba(0,0,0,0.7);/*Saf3-4, Chrome, iOS 4.0.2-4.2, Android 2.3+*/
		box-shadow: 8px 8px 9px 1px rgba(0,0,0,0.7);/* FF3.5+, Opera 9+, Saf1+, Chrome, IE10 */
		filter: progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000); /*IE 5.5-7*/
	}
</style>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->


<div id="main" role="main">
	<div class="login-container">
		<div class="login-bg">
			<div id="slider">
				<div class="slide" style="background-image: url('<?php echo APP_URL; ?>/themes/smartadmin/login/img/slide-1.jpg'); position: absolute; top: 0px; z-index: 2; opacity: 1; display: block;"></div>
			</div>
		</div>
		<div class="login-form">
			<div class="client-logo" align="center"><img src="<?php echo APP_URL; ?>/themes/smartadmin/login/img/logo.png" alt="" style="width: 30%;"></div>
			<h1>Aplikasi IKM</h1>
			<h5 align="center">Indek Kepuasan Masyarakat</h5>
			<h4 align="center">Kabupaten Pulang Pisau</h4>
			<div id="notification" class="information">
				<p class="text-center" style="color: white;">Silahkan masukkan username dan password anda!</p>
				<label style="display:none" id="info" class="label txt-color-red blink_me text-center">Username atau Password salah.</label>
			</div>
			<form id="myform" method="post" role="form">
				<input type="hidden" name="_csrf" value="UFcxMjNuSW00PEQHSggfHREuBEBaPjkiBGRcSkErAxk3BHltfyMrMg==">                
				<input type="hidden" name="guest" value="0">
				<div class="control">
					<div class=" field-loginform-username required">
						<input type="text" name="LoginForm[username]" id="LoginForm_username" class="inputbox" value="" placeholder="username...">
					</div>                    
					<div class=" field-loginform-username required">
						<p class="help-block help-block-error"></p>
					</div>                
				</div>
				<div class="control">
					<div class=" field-loginform-password required">
						<input type="password" name="LoginForm[password]" id="LoginForm_password" class="inputbox" value="" placeholder="password...">
					</div>					
					<div class=" field-loginform-password required">
						<p class="help-block help-block-error"></p>
					</div>                
				</div>
				<div class="buttonset">
					<button type="submit" id="btn-login" class="button button-block button-submit">Masuk</button>                	                		   	                
				</div>
			</form>            
			<!-- <div class="link">
				<a href="#" data-toggle="popup" data-target="#regulasi-box"><img src="/themes/smartadmin/login/img/chrome.png"> Chrome</a>
				<a href="#" data-toggle="popup" data-target="#manual-box"><img src="/themes/smartadmin/login/img/apk.png"> APK</a>
				<a href="#" data-toggle="popup" data-target="#infographic-box"><img src="/themes/smartadmin/login/img/infographic.png"> Infographic</a>
			</div> -->
			<p align="center">© 2018 - Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Pulang Pisau.</p>
		</div>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/login/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/login/login.css">
<style type="text/css"></style>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	require_once("themes/smartadmin/views/layouts/scripts.php");
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script type="text/javascript">
	window.isLogin = false;
	runAllForms();

	$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				"LoginForm[username]" : {
					required : true
				},
				"LoginForm[password]" : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			// Messages for form validation
			messages : {
				"LoginForm[username]" : {
					required : 'Tolong masukkan nama pengguna Anda'
				},
				"LoginForm[password]": {
					required : 'Masukkan kata sandi Anda'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler : function(form) {
				// saat validasi benar semua, lakukan proses login
				doLogin();
			}
		});
	});

	function doLogin() {
		str = $("#login-form").serialize() + "&ajax=login-form";
		$.ajax({
            type: "POST",
            url: "",
            data: str,
            dataType: "json",
            beforeSend : function() {
                //$("#btn-login").attr("disabled",true);
            },
            success: function(data, status) {
            	window.data = data;
                if(data.authenticated)
                {
                    window.location = data.redirectUrl;
                }
                else
                {
                    $.each(data, function(key, value) {
                       /* var div = "#"+key+"_em_";
                        $(div).text(value);
                        $(div).show();*/
                        $("#info").html(value);
                        $("#info").show(400);
                    });
                   // $("#btn-login").attr("disabled",false);
                }
            },
        });
	}
</script>

<?php 
	//include footer
	// require_once(Yii::app()->theme->baseUrl."/smartadmin/views/layouts/footer.php");
?>