<?php

//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Login";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$no_main_header = true;
$page_body_prop = array("id"=>"login", "class"=>"animated fadeInDown","style"=>"background:url('http://192.168.0.7/RISET/rian/IKMDINZINJOGJA/img/images/dinzin_baru.jpg'); background-size:cover;");
include("inc/header.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<header id="header">
	<!--<span id="logo"></span>-->

	<div id="logo-group">
		<span id="logo"> <img src="http://192.168.0.7/RISET/rian/IKMDINZINJOGJA/img/images/banner.png" alt="Logo" style="width: 249%; margin-top: -22px; margin-left: -2px; font-weight: bold"> </span>

		<!-- END AJAX-DROPDOWN -->
	</div>


</header>

<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">

		<div class="row" style="margin-top:95px;">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
				<h1 class="txt-color-red login-header-big" style="font-size: 36px; "><b class="label label-danger">Aplikasi IKM BPMPPT Kabupaten Paser</b></h1>
				<div class="hero" style="height:90px;">

				       <!-- <footer>
							<button type="submit" class="btn btn-primary" style="margin-left: 82%; margin-top: 87px;">
								Mengisi IKM
							</button>
						</footer>-->

					<img src="<?php echo ASSETS_URL; ?>/img/images/" class="pull-right display-image" alt="" style="width:210px">

				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-15 col-md-30 col-lg-6 well well-sm" style="border-radius:0px 30px 0px 30px; width:690px;">
						<h5 class="about-heading"><b>Support Smartphone dan Tablet</b></h5>
						<p class="text-justify">
							Aplikasi ini dirancang khusus untuk menjawab kegunaan penggunaan smartphone, dimana aplikasi ini bersifat responsive screen yang mampu diakses menggunakan smartphone dan tablet dengan tampilan yang oke.
						</p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h5 class="about-heading"></h5>
						<p>
							
						</p>
					</div>
				</div>

			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
				<div class="well no-padding">
					<form action="<?php echo APP_URL; ?>" id="login-form" class="smart-form client-form">
						<header>
							Form IKM
						</header>

						<fieldset>
						<section>
						<button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
								Mengisi IKM
							</button>
						</section>
							
							<!--<section>
								<--<label class="label">Username</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="email">
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Masukan Username</b></label>
							</section>-->
							<footer>
							
						   </footer>

							<!--<section>
								<label class="label">Password</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Masukan Password</b> </label>
								
							</section>

							<section>
								<label class="checkbox">
									<input type="checkbox" name="remember" checked="">
									<i></i>Stay signed in</label>
							</section>-->
						</fieldset>

					</form>

				</div>

				
				<a href="http://192.168.0.7/RISET/rian/IKMDINZINJOGJA/login2.php" class="btn btn-primary "style="margin-left: 72%;" >
								Login Admin
				</a>
			</div>
		</div>
	</div>

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script type="text/javascript">
	runAllForms();

	$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				email : {
					required : true,
					email : false
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			// Messages for form validation
			messages : {
				email : {
					required : 'Please enter your email address',
					email : 'Please enter a VALID email address'
				},
				password : {
					required : 'Please enter your password'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
	});
</script>

<?php 
	//include footer
	include("inc/footer.php"); 
?>