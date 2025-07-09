<?PHP session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$firm = $_SESSION['firm'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="shortcut icon" href="images/gp.jpg" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Gavel Power</title>
	<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
	<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />

	<link href="templatemo_style3.css" rel="stylesheet" type="text/css" />

	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	<style type="text/css">
		<!--
		.style1 {
			color: #013c54
		}

		.style8 {
			color: #FF0000;
			font-style: italic;
		}

		h2 {
			margin: 0px;
			padding: 0px 0px 0px 0px;
			font-size: 15px;
			font-weight: bold;
			color: #013c54;
		}
		-->
	</style>
	<style type="text/css">
		/*- Menu 2--------------------------- */

		#menu2 {
			width: 225px;
			margin: -20px;
			border-color: #D8D5D1;

		}

		#menu2 li a {
			voice-family: "\"}\"";
			voice-family: inherit;
			height: 18px;
			text-decoration: none;
		}

		#menu2 li a:link,
		#menu2 li a:visited {
			color: #013c54;
			display: block;
			background: url(EBmenus/Vertical%20Menus/menu2.png);
			padding: 4px 0 0 30px;
		}

		#menu2 li a:hover {
			color: #FFFFFF;
			background: url(EBmenus/Vertical%20Menus/menu2.png) 0 -32px;
			padding: 8px 0 0 32px;
		}

		.style3 {
			color: #013c54;
			font-size: 12px;
		}
	</style>

	<style>
		body {
			background-color: #eeeeee;
			padding: 0;
			margin: 0 auto;

			font-size: 12px;
		}
	</style>
	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">


</head>

<body>
	<div id="templatemo_container">

		<?php include("includes/header1.php"); ?>



		<!-- start of content -->

		<div id="templatemo_content">

			<!-- start of left column -->

			<div id="templatemo_left_column">

				<div id="leftcolumn_box01">
					<div class="leftcolumn_box01_top">
						<h2>Login</h2>
					</div>
					<div align="center" class="leftcolumn_box01_bottom">
						<form method="post" action="login.php">

							<div class="form_row" style="height: 24px;"><label>User ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="inputfield" size="12" name="username" type="text" id="email_addremss" /></div>
							<div class="form_row" style="height: 24px;"><label>Password</label>&nbsp;<input class="inputfield" size="12" name="password" type="password" id="password" /></div>
							<input class="button" style=" cursor: pointer;" type="submit" name="Submit" value="Login" />
						</form>

					</div>
				</div>

				<div id="abc1">
					<div class="abc">
						<object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="225" height="40">
							<param name="movie" value="images/updates.swf" />
							<param name="quality" value="high" />
							<param name="wmode" value="opaque" />
							<param name="swfversion" value="9.0.45.0" />
							<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
							<param name="expressinstall" value="Scripts/expressInstall.swf" />
							<!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
							<!--[if !IE]>-->
							<object type="application/x-shockwave-flash" data="images/updates.swf" width="225" height="40">
								<!--<![endif]-->
								<param name="quality" value="high" />
								<param name="wmode" value="opaque" />
								<param name="swfversion" value="9.0.45.0" />
								<param name="expressinstall" value="Scripts/expressInstall.swf" />
								<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
								<div>
									<h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
									<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
								</div>
								<!--[if !IE]>-->
							</object>
							<!--<![endif]-->
						</object>
						<br><?php include("includes/right.php"); ?><br><br>
					</div>
				</div>

				<div id="imagebutton"></div>

			</div>

			<!-- end of left column -->

			<!-- start of middle column -->

			<div id="templatemo_middle_column"><br>

				<h1 class="style1" style=" font-size:16px;">Welcome to Gavel Power&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
				<p>Welcome</p><br><br>
				<TABLE border=0 cellSpacing=0 cellPadding=0 width="80%"
					height="169">
					<TBODY>
						<TR>
							<TD height=22 colSpan=3 align=left><?php include("securimage/securimage.php");
																$img = new Securimage();
																$valid = $img->check($_POST['code']);

																if ($valid == true) { ?><p>Thank you for your valuable comments. </p>
									<p><a href="" style="color:#FF9900;"></a></p>
									<p><span class="sds"> </span></p>
									<p class=""></p>
									<p>&nbsp;</p>
									<p>&nbsp;</p>
									<p>&nbsp;</p>

								<?php

																	$to = "query@gavelpower.com";

																	$subject = $_POST['name'];
																	$message = "<p><strong>Message:</strong><br>";
																	$message = $message . "<p>" . $_POST['comments'] . "<p>";

																	// To send HTML mail, the Content-type header must be set
																	$headers = "";
																	$headers = "From: ";
																	$headers = $headers . "" . $_POST['client_email'] . "\n";

																	//WitechMail\n";

																	$headers .= "MIME-Version: 1.0\n";
																	$headers .= "Content-type: text/html; charset=iso-8859-1";

																	// Mail it
																	mail($to, $subject, $message, $headers);

																	$to = $_POST['client_email'];
																	$headers = "";
																	$headers = "From: ";
																	$headers = $headers . "GavelPower\n";
																	$headers .= "MIME-Version: 1.0\n";
																	$headers .= "Content-type: text/html; charset=iso-8859-1";

																	$message = "<HTML>";
																	$message = $message . "<BODY>";
																	$message = $message . "<P1>";
																	$message = $message . "<font color=BROWN>";
																	$message = $message . "<b>";
																	$message = $message . "<p>Dear Client,</p>";
																	$message = $message . "<p>We welcome you at Gavel Power Site  and thanks for emailing us with your valuable comments  / query(s).</p>";
																	$message = $message . "<p>Your required information will be furnished in 12 working hours, if any. </p>";
																	$message = $message . "<p>Regards,</p>";
																	$message = $message . "<p>Gavel Power Team </p>";
																	/*
			$message = $message ."<img src=";
			$message = $message ."'images/picture_doctor2.JPG'";
			$message = $message .">";
			*/
																	$message = $message . "</b>";
																	//$message = $message ."</font color>";
																	$message = $message . "</P1>";
																	$message = $message . "</BODY>";
																	$message = $message . "</HTML>";


																	mail($to, $subject, $message, $headers);
																} else {

																	echo "<h1>We are Sorry</h1><p>Sorry, the Code was invalid.  <a href=\"javascript:history.go(-1)\"  style=\"color:#FF9900;\">Go back</a> to try again.</p>";
																}


																// include("footer.php");
								?>
							</td>
				</table><br>

			</div>
			<!-- end of middle column -->

			<!-- start of right column -->

			<div id="templatemo_right_column"><br><br><br><br />
			</div>

			<!-- end of right column -->

		</div>

		<!-- end of content -->


		<?php include("includes/footer.php"); ?>
		<script type="text/javascript">
			swfobject.registerObject("FlashID2");
		</script>
</body>

</html>