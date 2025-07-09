<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Hotel Royal Palace</title>
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
 <link type="text/css" rel="stylesheet" media="all" href="style.css" />-->
	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />
	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		#updates {
			float: right;
			padding-right: 20;
			padding-left: 20;
			padding-top: 20;
			margin-top: 20;
			margin-right: 30;
			border: ridge;
			width: 180;
			border-color: #333;
			background: #DFDFDF;

		}
	</style>

	<script type="text/javascript">
		var clicked = false;

		function CheckBrowser() {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
			if (clicked == false) {
				//alert("Browser closed");
				var xmlhttp;

				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else { // code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("none").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST", "logout.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send();
			} // if ends here
		}
	</script>
	<script>
		//Call the yourAjaxCall() function every 10000 millisecond
		setInterval("unread_updates()", 1000);

		function unread_updates() {
			var xmlhttp;

			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("updates").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "unread_updates.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send();
		}
	</script>
</head>

<body onclick="clicked=true;" onbeforeunload="CheckBrowser()">
	<div id="main">
		<ul id="MenuBar1" class="MenuBarHorizontal">
			<li><a class="MenuBarItemSubmenu" href="#">Swimming Pool</a>
				<ul>
					<li><a href="pool_token.php">Token</a></li>
				</ul>
			</li>
			<li><a class="MenuBarItemSubmenu" href="#">Membership</a>
				<ul>
					<li><a href="pool_reg_form.php">Membership form</a></li>
					<li><a href="pool_mem_type.php">Add/Edit Membership Type</a></li>
				</ul>
			</li>
			<li><a class="MenuBarItemSubmenu" href="#">Charges Plan</a>
				<ul>
					<li><a href="pool_charges.php">Charges Plan</a></li>

				</ul>
			</li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<script type="text/javascript">
			var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {
				imgDown: "SpryAssets/SpryMenuBarDownHover.gif",
				imgRight: "SpryAssets/SpryMenuBarRightHover.gif"
			});
		</script>
	</div>

	<div id="process">

	</div>


</body>

</html>