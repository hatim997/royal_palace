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
				$('#orders').load('ajax/show_kitchen_orders_rec.php').fadeIn("slow");
			}, 60000); // refresh every 10000 milliseconds
	</script>

	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
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
		function dish_status(orderno) {
			//alert("Status is "+orderno);
			//alert("Order is "+orderno+" and dish is "+dish+" and status is "+status);

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("orders").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/dish_status_rec1.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno);
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

					$query = "SELECT * FROM order_master_tab 
          WHERE PAYMENT_FLAG = 'O' 
          AND REST_ID = '$restid'
          AND VISITED_DATE = '$current_date'
          ORDER BY ORDER_NO DESC";

					$result1 = mysqli_query($conn, $query) or die('Query failed! ' . mysqli_error($conn));
					$num = mysqli_num_rows($result1);

					//echo $num;
					if ($num != 0) {
						echo '<div id="del_dish" align="center" style="overflow:auto; height:650px; width:530px">
              <table width="500" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="80" align="center"><strong>Order No</strong></td>
					<td width="80" align="center"><strong>Table No</strong></td>
					<td width="90" align="center"><strong>No Of Guests</strong></td>
					<td width="90" align="center"><strong>Visit Time</strong></td>
					<td width="90" align="center"><strong>Status</strong></td>
                </tr>
                </thead>';
						$i = 0;
						while ($i < $num) {
							mysqli_data_seek($result1, $i); // Move to the i-th row
							$row1 = mysqli_fetch_assoc($result1);

							$orderno = $row1['ORDER_NO'];

							$query = "SELECT * FROM order_history_tab WHERE ORDER_NO = '$orderno' AND DISH_STATUS != 'S' ORDER BY ORDER_NO DESC";
							$res = mysqli_query($conn, $query) or die('Query failed! ' . mysqli_error($conn));
							$num_row = mysqli_num_rows($res);

							if ($num_row == 0) {
								// No matching order history
							} else {
								$tableno = $row1['TABLE_NO'];
								$nog = $row1['NO_OF_GUEST'];
								$vtime = $row1['VISITED_TIME'];
								echo '<tr>
						<td width="80" align="center">' . $orderno . '</td>
						<td width="80" align="center">' . $tableno . '</td>
						<td width="90" align="center">' . $nog . '</td>
						<td width="90" align="center">' . $vtime . '</td>
						<td width="90" align="center"><input type="button" onclick="dish_status(' . $orderno . ')" class="button" align="left" style="cursor:pointer"name="Submit" value="Served" /></td>  
					  </tr>';
							}
							$i++;
						} // while ends here
						echo '</table></div>';
					} // if ends here
					else {
						echo '<h1 class="style1" style=" font-size:14px;">No Order</h1>';
					}
					?>
				</div>

			</div>
		</div>
		<!-- end of middle column -->

		<!-- start of right column --><!-- end of content -->


		<?php include("includes/footer.php"); ?>
</body>

</html>