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
				$('#orders').load('ajax/show_kitchen_orders.php').fadeIn("slow");
			}, 60000); // refresh every 10000 milliseconds
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

	<style>
		body {
			background-color: #eeeeee;
			padding: 0;
			margin: 0 auto;

			font-size: 12px;
		}
	</style>

	<script type="text/javascript">
		function dish_status(orderno, dish, status) {
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
			xmlhttp.open("POST", "ajax/dish_status.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("orderno=" + orderno + "&dish=" + dish + "&status=" + status);
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
				<?php
				$restid = $_SESSION['restid'];
				$kitid = $_SESSION['kitid'];

				$query1 = "SELECT * FROM kitchen_master_tab WHERE KITCHEN_ID = '$kitid'";
				$result1 = mysqli_query($conn, $query1);
				$num1 = mysqli_num_rows($result1);
				$i = 0;

				while ($i < $num1) {
					mysqli_data_seek($result1, $i);
					$row = mysqli_fetch_assoc($result1);
					$k_name = $row['KITCHEN_NAME'];
					$i++;
				}
				?>

				<h1 class="style1" style=" font-size:16px;"><?php echo $k_name; ?></h1>
				<br><br>
				<div id="orders" align="left" style=" font-size:14px; width:1000px; float:left;">
					<?php

					$cooking = 1;
					$ready = 2;
					$served = 3;
					$s_date = $current_date . " 00:00:00";
					$e_date = $current_date . " 23:59:59";
					$query = "SELECT order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,dish_master_tab.DISH_ID,
				dish_master_tab.DISH_NAME,dish_master_tab.DISH_SERVING,dish_master_tab.COOKING_TIME,
				food_type_tab.FOOD_TYPE_DETAIL,
				order_history_tab.DISH_QTY, order_history_tab.DISH_STATUS, order_history_tab.CREATED_ON 
				FROM order_master_tab, dish_master_tab, food_type_tab, order_history_tab 
				WHERE order_master_tab.ORDER_NO =  order_history_tab.ORDER_NO 
				AND order_history_tab.DISH_ID = dish_master_tab.DISH_ID 
				AND dish_master_tab.FOOD_TYPE_ID = food_type_tab.FOOD_TYPE_ID 
				AND order_master_tab.PAYMENT_FLAG = 'O' 
				AND order_master_tab.REST_ID = '$restid'
				AND order_master_tab.VISITED_DATE >= '$current_date'
				AND order_master_tab.VISITED_DATE <= '$current_date' 
				AND dish_master_tab.KITCHEN_ID = '$kitid' 
				ORDER BY order_master_tab.ORDER_NO, dish_master_tab.DISH_NAME ASC";

					$result1 = mysqli_query($conn, $query) or die('Query failed! ' . mysqli_error($conn));
					$num = mysqli_num_rows($result1);

					if ($num != 0) {
						echo '<div id="del_dish" align="center" style="overflow:auto; height:650px; width:980px">
              <table width="940" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="80" align="center"><strong>Order No</strong></td>
					<td width="80" align="center"><strong>Table No</strong></td>
					<td width="400" align="center"><strong>Dish</strong></td>
					<td width="80" align="center"><strong>Serving</strong></td>
					<td width="80" align="center"><strong>Quantity</strong></td>
					<td width="80" align="center"><strong>Order Time</strong></td>
					<td width="80" align="center"><strong>Cooking Time</strong></td>
					<td width="80" align="center"><strong>Serving Time</strong></td>
					<td width="100" align="center"><strong>Current Status</strong></td>
					<td width="90" align="center"><strong>Update Status</strong></td>
                </tr>
                </thead>';
						$i = 0;
						while ($i < $num) {
							mysqli_data_seek($result1, $i); // Move to the $i-th row
							$row = mysqli_fetch_assoc($result1);

							$orderno     = $row['ORDER_NO'];
							$tableno     = $row['TABLE_NO'];
							$di          = $row['DISH_ID'];
							$d           = $row['DISH_NAME'];
							$s           = $row['DISH_SERVING'];
							$t           = $row['COOKING_TIME'];
							$q           = $row['DISH_QTY'];
							$status      = $row['DISH_STATUS'];
							$created_on  = $row['CREATED_ON'];
							$order_time  = explode(" ", $created_on);
							$otime = $order_time[1];
							$time = explode(":", $otime);
							$ctime = explode(":", $t);
							/*
				$a = 0;
				while($a < count($ctime))
				{
					$stime[$a] = $time[$a] + $ctime[$a];
					$a++;
				}
				$served_time = $stime[0].":".$stime[1].":".$stime[2];
				*/
							if ($otime > $t) {
								$served_time = "Lesser";
							} else {
								$served_time = "Greater";
							}

							$served_time = date("H:i:s", mktime($time[0] + $ctime[0], $time[1] + $ctime[1], $time[2] + $ctime[2], 0, 0, 0));
							if ($status == "O") {
								if ($served_time < $current_time) {
									echo '<tr>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $orderno . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $tableno . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;"width="400" align="left"><strong>&nbsp;' . $d . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $s . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $q . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $otime . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $t . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $served_time . '</strong></td>
					<td width="100" align="left">&nbsp;Ordered</td>
					<td width="90" align="left"><input type="button" onclick="dish_status(' . $orderno . ',' . $di . ',' . $cooking . ')" class="button" align="left" style="cursor:pointer"name="Submit" value="Cooking" /></td>  
				  </tr>';
								} else {
									echo '<tr>
						<td width="80" align="left">&nbsp;' . $orderno . '</td>
						<td width="80" align="left">&nbsp;' . $tableno . '</td>
						<td width="400" align="left">&nbsp;' . $d . '</td>                            
						<td width="80" align="left">&nbsp;' . $s . '</td>
						<td width="80" align="left">&nbsp;' . $q . '</td>
						<td width="80" align="left">&nbsp;' . $otime . '</td>
						<td width="80" align="left">&nbsp;' . $t . '</td>
						<td width="80" align="left">&nbsp;' . $served_time . '</td>
						<td width="100" align="left">&nbsp;Ordered</td>
						<td width="90" align="left"><input type="button" onclick="dish_status(' . $orderno . ',' . $di . ',' . $cooking . ')" class="button" align="left" style="cursor:pointer"name="Submit" value="Cooking" /></td>  
					  </tr>';
								}
							} else if ($status == "C") {
								if ($served_time < $current_time) {
									echo '<tr>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $orderno . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $tableno . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;"width="400" align="left"><strong>&nbsp;' . $d . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $s . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $q . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $otime . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $t . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $served_time . '</strong></td>
					<td style="color:#0000FF" width="100" align="left">&nbsp;Cooking</td>
					<td width="90" align="left"><input type="button" onclick="dish_status(' . $orderno . ',' . $di . ',' . $ready . ')" class="button" align="left" style="cursor:pointer"name="Submit" value="Ready" /></td>  
				  </tr>';
								} else {
									echo '<tr>
						<td style="color:#0000FF" width="80" align="left">&nbsp;' . $orderno . '</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;' . $tableno . '</td>
						<td style="color:#0000FF" width="400" align="left">&nbsp;' . $d . '</td>                            
						<td style="color:#0000FF" width="80" align="left">&nbsp;' . $s . '</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;' . $q . '</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;' . $otime . '</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;' . $t . '</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;' . $served_time . '</td>
						<td style="color:#0000FF" width="100" align="left">&nbsp;Cooking</td>
						<td width="90" align="left"><input type="button" onclick="dish_status(' . $orderno . ',' . $di . ',' . $ready . ')" class="button" align="left" style="cursor:pointer"name="Submit" value="Ready" /></td>  
					  </tr>';
								}
							} else if ($status == "R") {
								if ($served_time < $current_time) {
									echo '<tr>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $orderno . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $tableno . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;"width="400" align="left"><strong>&nbsp;' . $d . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $s . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $q . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $otime . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $t . '</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $served_time . '</strong></td>
					<td style="color:#800080" width="100" align="left">&nbsp;Ready</td>
						<td width="90" align="left"><input type="button" onclick="dish_status(' . $orderno . ',' . $di . ',' . $served . ')" class="button" align="left" style="cursor:pointer"name="Submit" value="Served" /></td>  
				  </tr>';
								} else {
									echo '<tr>
						<td style="color:#800080" width="80" align="left">&nbsp;' . $orderno . '</td>
						<td style="color:#800080" width="80" align="left">&nbsp;' . $tableno . '</td>
						<td style="color:#800080" width="400" align="left">&nbsp;' . $d . '</td>                            
						<td style="color:#800080" width="80" align="left">&nbsp;' . $s . '</td>
						<td style="color:#800080" width="80" align="left">&nbsp;' . $q . '</td>
						<td style="color:#800080" width="80" align="left">&nbsp;' . $otime . '</td>
						<td style="color:#800080" width="80" align="left">&nbsp;' . $t . '</td>
						<td style="color:#800080" width="80" align="left">&nbsp;' . $served_time . '</td>
						<td style="color:#800080" width="100" align="left">&nbsp;Ready</td>
						<td width="90" align="left"><input type="button" onclick="dish_status(' . $orderno . ',' . $di . ',' . $served . ')" class="button" align="left" style="cursor:pointer"name="Submit" value="Served" /></td>  
					  </tr>';
								}
							} else {
								echo '<tr>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $orderno . '</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $tableno . '</strong></td>
					<td style="color:#007236" style=" font-size:14px;"width="400" align="left"><strong>&nbsp;' . $d . '</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $s . '</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $q . '</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $otime . '</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $t . '</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;' . $served_time . '</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="100" align="left"><strong>&nbsp;Served</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="90" align="left"><strong>&nbsp;Served</strong></td>  
				  </tr>';
							}
							$i++;
						} // while ends here
						echo '</table></div>';
					} // if ends here
					else {
						echo '<h1 class="style1" style=" font-size:14px;">No dish for Order</h1>';
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