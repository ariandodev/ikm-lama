<?php define('ASSETS_URL', $data['theme_baseurl']) ?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> <?php echo CHtml::encode($this->pageTitle); ?> </title>
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Use the correct meta names below for your web application
			 Ref: http://davidbcalhoun.com/2010/viewport-metatag 
			 
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">-->
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/bootstrap.min.css">	
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Please note (smartadmin-production.css) was created using LESS variables -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-production.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/smartadmin-skins.css">	
		
		<!-- SmartAdmin RTL Support is under construction
			<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.css"> -->
		
		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/demo.css">

		<!-- page related CSS -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ASSETS_URL; ?>/css/lockscreen.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php //echo ASSETS_URL; ?>/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo ASSETS_URL; ?>/img/favicon/favicon.ico" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<!--link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700"-->


	</head>
	<body style="background: url(<?php echo ASSETS_URL; ?>/img/mybg.png)" onload="window.isLogin = false;">

		<div id="main" role="main">

			<!-- MAIN CONTENT -->

			<form class="lockscreen animated flipInY client-form" action="unlock" id="login-form" method="post">
				<div class="logo">
					<h1 class="semi-bold">
					<img src="<?php echo ASSETS_URL; ?>/img/images/logo.png" alt="" style="width: 80%;" />
					</h1>
				</div>
				<div>
					<img src="../uploads/pengguna/<?php echo $lock['tblpengguna_foto']; ?>" alt="" width="120" height="120" />
					<div>
						<h1>
						<i class="fa fa-user fa-3x text-muted air air-top-right hidden-mobile"></i>
						<?php echo $lock['tblpengguna_nama']; ?>
						 <small>
						<i class="fa fa-lock text-muted"></i> &nbsp;Terkunci</small></h1>
						<p class="text-muted">
							<a href="mailto:<?php echo $lock['tblpengguna_email']; ?>"><?php echo $lock['tblpengguna_email']; ?></a>
						</p>

						<div class="input-group">
							<input class="form-control" type="hidden" name="LoginForm[username]" id="LoginForm_username" value="<?php echo $lock['tblpengguna_username']; ?>">
							<input class="form-control" type="password" name="LoginForm[password]" id="LoginForm_password" placeholder="Masukan Password">
							<div class="input-group-btn">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-key"></i>
								</button>
							</div>
						</div>
						<p class="no-margin margin-top-5">
							Login dengan akun Lain ? <a href="login"> Klik disini</a>
						</p>
					</div>

				</div>
				<p class="font-xs margin-top-5">
					<?php echo ucwords( AppConfig::model()->getValue('APLIKASI_INSTANSI') ); ?> <?php echo ucwords( AppConfig::model()->getValue('APLIKASI_WILAYAH') ); ?>
				</p>
			</form>

		</div>

		<!--================================================== -->	

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/pace/pace.min.js"></script>

	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.0.2.min.js"><\/script>');} </script>

	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		<script src="<?php echo ASSETS_URL; ?>/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo ASSETS_URL; ?>/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo ASSETS_URL; ?>/js/smartwidgets/jarvis.widget.min.js"></script>
		
		<!-- EASY PIE CHARTS -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		
		<!-- SPARKLINES -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/sparkline/jquery.sparkline.min.js"></script>
		
		<!-- JQUERY VALIDATE -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-validate/jquery.validate.min.js"></script>
		
		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/masked-input/jquery.maskedinput.min.js"></script>
		
		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>
		
		<!-- browser msie issue fix -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>
		
		<!-- FastClick: For mobile devices -->
		<script src="<?php echo ASSETS_URL; ?>/js/plugin/fastclick/fastclick.js"></script>
		
		<!--[if IE 7]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->
		
		<!-- MAIN APP JS FILE -->
		<script src="<?php echo ASSETS_URL; ?>/js/app.js"></script>

	</body>
</html>