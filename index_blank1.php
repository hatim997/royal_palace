<?php session_start();
include('config.php');
//$action = isset($_POST['submit']) ? $_POST['submit']:'';
//$error_message='';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
	<!--  jquery core -->
	<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

	<!-- Custom jquery scripts -->
	<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

	<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
	<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(document).pngFix();
		});
	</script>
</head>

<body id="login-bg">

	<!-- Start: login-holder -->
	<div id="login-holder">

		<!-- start logo -->
		<div id="logo-login">
			<!--	<a href="index.html"> <font size="+3" color="#FF6600">Hotel Royal Palace</font></a> -->
		</div>
		<!-- end logo -->

		<div class="clear"></div>

		<!--  start loginbox ................................................................................. -->
		<!--  end loginbox -->

		<!--  start forgotbox ................................................................................... -->

		<!--  end forgot-inner -->
		<div class="clear"></div>
	</div>
	<!--  end forgotbox -->

	</div>
	<!-- End: login-holder -->
</body>

</html>