<?php session_start();
include('config.php');
include('check_activity.php');
//$action = isset($_POST['submit']) ? $_POST['submit']:'';
//$error_message='';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Hotel Royal Palace</title>
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
			<a href="index.html">
				<font size="+3" color="#FF6600">Hotel Royal Palace</font>
			</a>
		</div>
		<!-- end logo -->

		<div class="clear"></div>

		<!--  start loginbox ................................................................................. -->
		<div id="loginbox">

			<!--  start login-inner -->
			<div id="login-inner">
				<form action="login.php" method="post">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<th>Username</th>
							<td><input type="text" name="username" id="username" class="login-inp" /></td>
						</tr>
						<tr>
							<th>Password</th>
							<td><input type="password" value="" name="password" id="password" onfocus="this.value=''" class="login-inp" /></td>
						</tr>
						<tr>
							<th></th>
							<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" name="remember" />
								<label for="login-check">Remember me</label>
							</td>
						</tr>
						<tr>
							<th></th>
							<td><input type="submit" class="submit-login" name="submit" id="submit" value="submit" /></td>
						</tr>
						<tr>
							<td colspan="2">
								<div style="text-align:center">
									<?php if (isset($error_message)) echo $error_message; ?>
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>


			<!--  end login-inner -->
			<div class="clear"></div>
			<a href="" class="forgot-pwd">Forgot Password?</a>
		</div>

		<!--  end loginbox -->

		<!--  start forgotbox ................................................................................... -->
		<div id="forgotbox">
			<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
			<!--  start forgot-inner -->
			<div id="forgot-inner">
				<table border="0" cellpadding="0" cellspacing="0">
					<tr>
						<th>Email address:</th>
						<td><input type="text" value="" class="login-inp" /></td>
					</tr>
					<tr>
						<th> </th>
						<td><input type="button" class="submit-login" /></td>
					</tr>
				</table>

			</div>

			<!--  end forgot-inner -->
			<div class="clear"></div>
			<a href="" class="back-login">Back to login</a>
		</div>
		<!--  end forgotbox -->

	</div>
	<!-- End: login-holder -->
</body>

</html>