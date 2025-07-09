<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Hotel Royal Palace</title>
	<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
	<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />

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


	<script type="text/javascript">
		function change_status(c_status) {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);

			if (c_status == "") {
				//document.getElementById("info").innerHTML="";
				alert("Please select correct status.");
				return;
			}
			var xmlhttp;

			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("status_c").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/change_status.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("c_status=" + c_status);
		}
	</script>

	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

	<!-- <script language="JavaScript">
		new tcal({
			'formname': 'dish',
			'controlname': 'charges_on_date'
		});
	</script>

	<script language="JavaScript">
		new tcal({
			'formname': 'dish',
			'controlname': 'charges_off_date'
		});
	</script> -->

</head>

<body>
	<div id="templatemo_container">



		<?php /*?><?php include("includes/header2.php"); ?>
<?php */ ?>


		<!-- start of content -->

		<div id="templatemo_content">

			<!-- start of left column -->

			<div id="templatemo_left_column">
				<h2 style="font-size:18px;">
					<BLINK>&nbsp;&nbsp;<?php echo $_SESSION['username']; ?></BLINK>
				</h2>
				<div id="leftcolumn_box01">
					<div class="leftcolumn_box01_top">
						<h2 style="color:#FFF;">Working Options</h2>
					</div>
					<div class="leftcolumn_box01_bottom">
						<div id="menu2" class="form_row">
							<ul>
								<li><a href="banq_admin.php">Back to Main</a></li>
								<li><a href="logout.php">Logout</a></li><br>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<!--<div id="imagebutton"></div>-->

			<!--  </div>-->

			<!-- end of left column -->

			<!-- start of middle column -->

			<div id="templatemo_middle_column">

				<h1 class="style1" style="font-size:16px;">Password Change&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br>

				<?php

				if (!isset($_POST['Submit'])) {
				?>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="pwdchange" id="pwdchange" method="post">

						<table width="330" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="149">Old Password</td>
								<td width="181"><input type="password" name="pwd" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>New Password</td>
								<td><input type="password" name="newpwd" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Confirm New Password</td>
								<td><input type="password" name="confirmnewpwd" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" class="button" name="Submit" onclick="return validate();" value="Submit" />
									&nbsp;<input type="reset" class="button" name="Reset" value="Reset" /></td>
							</tr>

						</table>

					</form><br>

				<?php

				} // if ends here
				else {
					//$date_time = date('Y-m-d H:i:s');
					//$username = $_GET['username'];
					//$time_slot_id = $_POST['timeslotid'];
					$user = $_SESSION['username'];
					$pwd = $_POST['pwd'];
					$newpwd = $_POST['newpwd'];
					$confirmnewpwd = $_POST['confirmnewpwd'];

					if ($newpwd != $confirmnewpwd) {
						echo '<script>alert("New Password and Confirm New Password Fields must have same values. Please try again.")</script>';
					} else {
						// Replace with your active connection variable
						// $conn = mysqli_connect(...);

						$query = "SELECT * FROM login_tab WHERE USER_ID = '$user' AND PASSWORD = '$pwd'";
						$result = mysqli_query($conn, $query);

						if (mysqli_num_rows($result) == 0) {
							echo '<script>alert("Password Incorrect. Please try again.")</script>';
						} else {
							while ($row = mysqli_fetch_assoc($result)) {
								$pswd = $row["PASSWORD"];
								$created_id = $row["CREATED_ID"];
								$created_on = $row["CREATED_ON"];
							}

							$update = "UPDATE login_tab SET PASSWORD = '$newpwd', EDITED_ID = '$user', EDITED_ON = '$date_time' WHERE USER_ID = '$user'";
							mysqli_query($conn, $update) or die('Query failed! ' . mysqli_error($conn));

							echo '<script>alert("Password Changed Successfully.")</script>';
							$_SESSION['password'] = $newpwd;
						}
					}

				?>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="pwdchange" id="pwdchange" method="post">

						<table width="330" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="149">Old Password</td>
								<td width="181"><input type="password" name="pwd" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>New Password</td>
								<td><input type="password" name="newpwd" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Confirm New Password</td>
								<td><input type="password" name="confirmnewpwd" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input type="submit" class="button" name="Submit" onclick="return validate();" value="Submit" />
									&nbsp; <input type="reset" class="button" name="Reset" value="Reset" /></td>
							</tr>

						</table>

					</form>

				<?php

				} // else if ends here

				?>
				<br>
			</div>
			<!-- end of middle column -->

			<!-- start of right column -->

			<div id="templatemo_right_column" style="padding-top: 1px;">
			</div>

			<!-- end of right column -->


			<!-- end of content -->

			<script>
				function validate() {
					var pwd = document.forms["pwdchange"]["pwd"].value;
					var newpwd = document.forms["pwdchange"]["newpwd"].value;
					var confirmnewpwd = document.forms["pwdchange"]["confirmnewpwd"].value;

					if (pwd == "" || newpwd == "" || confirmnewpwd == "") {
						alert("All fields are required.");
						return false;
					}

					if (newpwd !== confirmnewpwd) {
						alert("New Password and Confirm New Password must match.");
						return false;
					}

					return true;
				}
			</script>

			<?php include("includes/footer.php"); ?>
			<!-- <script type="text/javascript">
				swfobject.registerObject("FlashID3");
			</script> -->
</body>

</html>