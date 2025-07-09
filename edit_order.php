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
	<title>Web Saucer</title>
	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />
	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

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
	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


	<script type="text/javascript">
		function save_quantity(form) {
			var orderno = encodeURIComponent(document.getElementById("orderno").value);
			var dish = encodeURIComponent(document.getElementById("dish").value);
			var qty = encodeURIComponent(document.getElementById("qty").value);
			//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);

			if (qty == "" || qty <= 0) {
				alert("Please Enter correct Quantity");
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
					document.getElementById("results").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/save_quantity.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno + "&dish=" + dish + "&qty=" + qty);
		}
	</script>

	<script type="text/javascript">
		function edit_dish_qty(orderno, dish) {
			//alert("Edit Dish Quantity with "+orderno+" and "+dish);

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("results").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/edit_dish_qty_old.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno + "&dish=" + dish);
		}
	</script>

	<script type="text/javascript">
		function show_dish_detail(dish_id) {
			if (dish_id == "") {
				document.getElementById("dish_detail").innerHTML = "";
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
					document.getElementById("dish_detail").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/show_dish_detail.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("dish_id=" + dish_id);
		}
	</script>

	<script type="text/javascript">
		function guest_edit_order(guest) {
			//alert(" Order no is "+orderno);
			if (guest.length == 0) {
				document.getElementById("results").innerHTML = "";
				//document.getElementById("results").style.border="0px";
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
					document.getElementById("results").innerHTML = xmlhttp.responseText;
					//document.getElementById("results").style.border="1px solid #A5ACB2";
				}
			}
			xmlhttp.open("POST", "ajax/guest_edit_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("guest=" + guest);
		}
	</script>

	<script type="text/javascript">
		function edit_delete_dish(orderno, dish) {
			//alert(orderno+" and "+dish);
			var a = confirm("Do you want to remove this Dish?");
			if (a) {
				var xmlhttp;
				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else { // code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("results").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST", "ajax/edit_delete_dish.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("orderno=" + orderno + "&dish=" + dish);
			} // if ends here
			else {
				return;
			}
		}
	</script>

	<script type="text/javascript">
		function show_order_detail(orderno) {
			if (orderno == "") {
				document.getElementById("results").innerHTML = "";
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
					document.getElementById("results").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/show_order_detail.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno);
		}
	</script>

	<script type="text/javascript">
		function show_dish(value) {
			if (value == "") {
				document.getElementById("show_dish").innerHTML = "";
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
					document.getElementById("show_dish").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/show_dish1.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("value=" + value);
		}
	</script>

	<script type="text/javascript">
		function edit_add_order(form) {
			//alert("Hello");
			var d_id = "";
			var d_qty = "";
			var blank = 0;
			//var guest = encodeURIComponent(document.getElementById("guest").value);
			//var guest_id = encodeURIComponent(document.getElementById("guestid").value);
			var orderno = encodeURIComponent(document.getElementById("orderno").value);
			var food = encodeURIComponent(document.getElementById("food").value);
			var t_dish = encodeURIComponent(document.getElementById("total_dishes").value);
			//var serving = encodeURIComponent(document.getElementById("serving").value);
			//var qty = encodeURIComponent(document.getElementById("qty").value);
			//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);
			//alert("Total Dishes are "+t_dish);

			if (food == "") {
				alert("Please Enter Information in required fields");
				return;
			}
			for (var i = 0; i < t_dish; i++) {
				var qty = encodeURIComponent(document.getElementById("qty" + i).value);
				//alert(qty);
				//alert("Name is "+encodeURIComponent(document.getElementById("qty"+i).name));
				if (qty != "") {
					if (d_id == "") {
						d_id += encodeURIComponent(document.getElementById("qty" + i).name);
					} else {
						d_id = d_id + ":" + encodeURIComponent(document.getElementById("qty" + i).name);
					}
					if (d_qty == "") {
						d_qty += encodeURIComponent(document.getElementById("qty" + i).value);
					} else {
						d_qty = d_qty + ":" + encodeURIComponent(document.getElementById("qty" + i).value);
					}
					//alert(d_id+" and quntities are "+d_qty);
				} else {
					blank = blank + 1;
				}
				//alert("Blank is "+blank);
			}
			if (t_dish == blank) {
				alert("Please enter valid Quantity");
				return;
			}
			//alert(d_id+" and quntities are "+d_qty);

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("results").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/edit_add_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno + "&food=" + food + "&t_dish=" + t_dish + "&d_id=" + d_id + "&d_qty=" + d_qty);
		}
	</script>
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

</head>

<body onclick="clicked=true;" onbeforeunload="CheckBrowser()">
	<div id="templatemo_container">

		<?php include("includes/header2.php"); ?>

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
								<li><a href="login.php">Back to Main</a></li>
								<li><a href="logout.php">Logout</a></li><br>

							</ul>
						</div>
					</div>
				</div>

				<div id="abc1">
					<div class="abc">
						<object id="FlashID3" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="225" height="40">
							<param name="movie" value="images/updates.swf" />
							<param name="quality" value="high" />
							<param name="wmode" value="opaque" />
							<param name="swfversion" value="9.0.45.0" />
							<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
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

			<div id="templatemo_middle_column">

				<h1 class="style1" style=" font-size:16px;">New Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
				<p>&nbsp;</p>
				<div id="master" align="left">
					<form name="myform" method="post">
						<h4>Search By Table No</h4><br>

						Table No:&nbsp;&nbsp;
						<input type="text" name="cname" size="30" value="" id="inputString" onkeyup="guest_edit_order(this.value);" />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</form><br><br>

					<div id="results">

					</div><!-- end of master division -->

				</div> <!-- end of master division -->

			</div>
			<!-- end of middle column -->

			<!-- start of right column -->


			<!-- end of right column -->

		</div>

		<!-- end of content -->


		<?php include("includes/footer.php"); ?>
</body>

</html>