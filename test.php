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
	<link href="templatemo_style6.css" rel="stylesheet" type="text/css" />

	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<link rel="stylesheet" type="text/css" href="images/css.css">
	<link rel="stylesheet" type="text/css" href="images/css_002.css">


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


	<script type="text/javascript">
		function show_order_detail1(orderno) {
			if (orderno == "") {
				document.getElementById("entry").innerHTML = "";
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
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/show_order_detail1.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno);
		}
	</script>

	<script type="text/javascript">
		function save_dish_quantity(form) {
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
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/save_dish_quantity.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno + "&dish=" + dish + "&qty=" + qty);
		}
	</script>

	<script type="text/javascript">
		function edit_quantity(orderno, dish) {
			//alert("Edit Dish Quantity with "+orderno+" and "+dish);

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/edit_quantity.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno + "&dish=" + dish);
		}
	</script>

	<script type="text/javascript">
		function old_guest_form(id) {
			//alert(id);

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/old_guest_form.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("id=" + id);
		}
	</script>

	<script type="text/javascript">
		function search_guest(guest) {
			//alert(" Order no is "+orderno);
			if (guest.length == 0) {
				document.getElementById("results").innerHTML = "";
				document.getElementById("results").style.border = "0px";
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
					document.getElementById("results").style.border = "1px solid #A5ACB2";
				}
			}
			xmlhttp.open("POST", "ajax/search_guest.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("guest=" + guest);
		}
	</script>

	<script type="text/javascript">
		function confirm_order(orderno) {
			//alert(" Order no is "+orderno);

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/confirm_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno);
		}
	</script>

	<script type="text/javascript">
		function delete_dish(orderno, dish) {
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
						document.getElementById("entry").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST", "ajax/delete_dish.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send("orderno=" + orderno + "&dish=" + dish);
			} // if ends here
			else {
				return;
			}
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
			xmlhttp.open("POST", "ajax/show_dish.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("value=" + value);
		}
	</script>

	<script type="text/javascript">
		function order_form(value) {
			if (value == "") {
				document.getElementById("entry").innerHTML = "";
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
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/show_order_form.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("value=" + value);
		}
	</script>

	<script type="text/javascript">
		function add_guest(form) {
			var name = encodeURIComponent(document.getElementById("name").value);
			var fname = encodeURIComponent(document.getElementById("fname").value);
			var day = encodeURIComponent(document.getElementById("day").value);
			var month = encodeURIComponent(document.getElementById("month").value);
			var cell = encodeURIComponent(document.getElementById("cell").value);
			var email = encodeURIComponent(document.getElementById("email").value);
			var city = encodeURIComponent(document.getElementById("city").value);
			var pro_type = encodeURIComponent(document.getElementById("pro_type").value);
			var tableno = encodeURIComponent(document.getElementById("tableno").value);
			var total_guest = encodeURIComponent(document.getElementById("total_guest").value);
			if (name == "" || fname == "" || day == "" || month == "" || cell == "" || city == "" || pro_type == "" || tableno == "" || total_guest == "") {
				alert("Please Enter Information in required fields");
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
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/add_guest_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("name=" + name + "&cell=" + cell + "&fname=" + fname + "&day=" + day + "&month=" + month + "&email=" + email + "&city=" + city + "&pro_type=" + pro_type + "&tableno=" + tableno + "&total_guest=" + total_guest);
		}
	</script>

	<script type="text/javascript">
		function old_guest_order(form) {
			var gid = encodeURIComponent(document.getElementById("gid").value);
			var tableno = encodeURIComponent(document.getElementById("tableno").value);
			var total_guest = encodeURIComponent(document.getElementById("total_guest").value);
			if (tableno == "" || total_guest == "") {
				alert("Please Enter Information in required fields");
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
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/old_guest_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("gid=" + gid + "&tableno=" + tableno + "&total_guest=" + total_guest);
		}
	</script>

	<script type="text/javascript">
		function add_order(form) {
			//var guest = encodeURIComponent(document.getElementById("guest").value);
			//var guest_id = encodeURIComponent(document.getElementById("guestid").value);
			var orderno = encodeURIComponent(document.getElementById("orderno").value);
			var food = encodeURIComponent(document.getElementById("food").value);
			var dish = encodeURIComponent(document.getElementById("dish").value);
			var serving = encodeURIComponent(document.getElementById("serving").value);
			var qty = encodeURIComponent(document.getElementById("qty").value);
			//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);

			if (food == "" || dish == "" || serving == "" || qty == "") {
				alert("Please Enter Information in required fields");
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
					document.getElementById("entry").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/add_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno + "&food=" + food + "&dish=" + dish + "&serving=" + serving + "&qty=" + qty);
		}
	</script>
	<script type="text/javascript">
		function CheckBrowser() {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
			if (window.event.clientX <= 0 || window.event.clientY <= 0) {
				alert("Browser closed");
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

			<!-- start of left column --><!-- end of left column -->

			<!-- start of middle column -->

			<div id="templatemo_middle_column">

				<h1 class="style1" style=" font-size:16px;">New Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
				<p>&nbsp;</p>
				<div class="rating5 nonsticky">
					<div id="threadinfo" style="width: 400px; position:fixed; display: table-row; height:auto;">
						<br><br><br><br>
					</div>
					<div id="abc" style="width: 150px; position:fixed; margin-left: 402px; margin-top: -36px; height:auto;">
						<br><br><br><br>
					</div>
					<div id="def" style="width: 150px; position:fixed; margin-left: 552px; margin-top: -36px; height:auto;">
						<br><br><br><br>
					</div>
					<div id="jhi" style="width: 150px; position: static; margin-left: 703px; margin-top: -36px; height:auto;">
						<br><br><br><br>
					</div>
				</div><br><br> <!-- end of master division -->

				<div id="entry">

				</div> <!-- end of entry division -->

			</div>
			<!-- end of middle column -->

			<!-- start of right column -->


			<!-- end of right column -->

		</div>

		<!-- end of content -->


		<?php include("includes/footer.php"); ?>
</body>

</html>