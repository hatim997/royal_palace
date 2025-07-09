<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$restid = $_SESSION['restid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Web Saucer</title>
	<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
	<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
	<link href="templatemo_style7.css" rel="stylesheet" type="text/css" />

	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript">
		var auto_refresh = setInterval(
			function() {
				$('#orders').load('ajax/reception_orders.php').fadeIn("slow");
			}, 600000); // refresh every 10000 milliseconds
	</script>

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

	<script type="text/javascript">
		function netamount(value) {
			//document.write("Its Ok");
			if (value == "13") {
				//var total = 0;
				var gross = encodeURIComponent(document.getElementById("received").value);
				var rec_amount = encodeURIComponent(document.getElementById("rec_amount").value);
				var net = Number(rec_amount) - Number(gross);
				if (net < 0) {
					alert("Received Amount cannot be less than Gross Amount");
					return;
				} else {
					encodeURIComponent(document.getElementById("bal_return").value = net.toFixed(2));
				}
			} else {
				document.myform.submit();
			}
		}
	</script>

	<script type="text/javascript">
		function order_details_new(orderno, guest) {
			//alert("Order No is "+orderno);
			//alert("Order is "+orderno+" and dish is "+dish+" and status is "+status);
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("details").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/order_details1.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno + "&guest=" + guest);
		}
	</script>

	<script type="text/javascript">
		function payment_mode(value) {
			//var p_mode = encodeURIComponent(document.getElementById("pay_mode").value);
			//alert(value);

			var xmlhttp;
			/*
		if (value == "" || value == "C")
  		{
			document.getElementById("mode").innerHTML="";
			//alert(advance);
			return;
  		}
		*/
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("mode").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/payment_mode.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("value=" + value);
		}
	</script>

	<script type="text/javascript">
		function payment_reception1(form) {
			//alert("Hello");
			var guest = encodeURIComponent(document.getElementById("guest").value);
			var orderno = encodeURIComponent(document.getElementById("orderno").value);
			var gross = encodeURIComponent(document.getElementById("gross").value);
			var discount = encodeURIComponent(document.getElementById("discount").value);

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("details").innerHTML = "Payment added Successfully";
					document.getElementById("orders").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/payment_reception1.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("guest=" + guest + "&orderno=" + orderno + "&gross=" + gross + "&discount=" + discount);
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

			<!-- start of left column --><!-- end of left column -->

			<!-- start of middle column -->

			<div id="templatemo_middle_column">
				<h1 class="style1" style=" font-size:16px;">Current Orders&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
				<br>

				<div id="orders" align="center" style=" font-size:14px;">
					<?php

					$query = "SELECT order_master_tab.ORDER_NO, order_master_tab.TABLE_NO, order_master_tab.NO_OF_GUEST,
			guest_master_tab.GUEST_ID, guest_master_tab.GUEST_NAME
			FROM order_master_tab, guest_master_tab 
			WHERE order_master_tab.GUEST_ID = guest_master_tab.GUEST_ID 
			AND order_master_tab.PAYMENT_FLAG = 'O' 
			AND order_master_tab.TOTAL_DISCOUNT = '0' 
			AND order_master_tab.REST_ID = '$restid' 
			ORDER BY order_master_tab.ORDER_NO DESC";

					$result1 = mysqli_query($conn, $query) or die('Query failed! ' . mysqli_error($conn));
					$num = mysqli_num_rows($result1);

					if ($num != 0) {
						echo '<div id="del_dish" align="center" style="overflow:auto; height:300px; width:940px">
						  <table width="910" border="1" cellpadding="0" cellspacing="0" align="center">
							<thead>
							<tr>
								<td width="80" align="center"><strong>Order No</strong></td>
								<td width="80" align="center"><strong>Table No</strong></td>
								<td width="400" align="center"><strong>Guest</strong></td>
								<td width="80" align="center"><strong>No of Guests</strong></td>
								<td width="80" align="center"><strong>Details</strong></td>
							</tr>
							</thead>';
						$i = 0;
						while ($i < $num) {
							mysqli_data_seek($result1, $i);
							$row = mysqli_fetch_array($result1);

							$orderno = $row['ORDER_NO'];
							$tableno = $row['TABLE_NO'];
							//$f = $row['FOOD_TYPE_DETAIL']; // Uncomment if needed
							$gid = $row['GUEST_ID'];
							$name = $row['GUEST_NAME'];
							$g_no = $row['NO_OF_GUEST'];

							echo '<tr>
								<td width="80" align="left">&nbsp;' . $orderno . '</td>
								<td width="80" align="left">&nbsp;' . $tableno . '</td>
								<td width="400" align="left">&nbsp;' . $name . '</td>                            
								<td width="80" align="left">&nbsp;' . $g_no . '</td>
								<td width="90" align="center"><a href="javascript:order_details_new(' . $orderno . ',' . $gid . ')" alt="Details" title="Details"><img src="images/Details.png" height="35" width="90" alt="Details" /></a></td>  
							  </tr>';
							$i++;
						} // while ends here
						echo '</table></div><br><br><br><br>';
					} // if ends here
					else {
						echo '<h1 class="style1" style=" font-size:14px;">Currently no order in Progress</h1>';
					}
					?>

				</div>
				<div id="details">

				</div>

			</div><br><br><br>
			<!-- end of middle column -->

			<!-- start of right column --><!-- end of content -->


			<?php include("includes/footer.php"); ?>
</body>

</html>