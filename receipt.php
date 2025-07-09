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
	<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Web Saucer</title>
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
		function printSelection(node) {

			var content = node.innerHTML
			var pwin = window.open('', 'print_content', 'width=800,height=700');

			pwin.document.open();
			pwin.document.write('<html><body onload="window.print()">' + content + '</body></html>');
			pwin.document.close();

			setTimeout(function() {
				pwin.close();
			}, 1000);

		}
	</script>

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

	<SCRIPT LANGUAGE="JavaScript">
		function validate() {
			if (document.unit.unit_detail.value.length < 1) {
				alert("Please enter Unit Detail Field .");
				return false;
			}

			return true;
		}
	</SCRIPT>
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
								<li><a href="order_payment.php">Orders Payment</a></li>
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

				<h1 class="style1" style="font-size:16px;">Bill Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br>

				<div align="left" class="story" id="mydiv" style="width:380px;">
					<img src="images/header.jpg" width="352" height="109" /><br />
					<?php

					$gid = $_GET['gid'];
					$orderno = $_GET['on'];
					$total_discount = $_GET['dis'];

					$query1 = "SELECT * FROM order_master_tab WHERE ORDER_NO = '$orderno'";
					$result1 = mysqli_query($conn, $query1);
					$num1 = mysqli_num_rows($result1);
					$i = 0;
					while ($i < $num1) {
						mysqli_data_seek($result1, $i);
						$row1 = mysqli_fetch_array($result1);
						$table_no = $row1["TABLE_NO"];
						$i++;
					}

					/* ########## Tax Calculation ######## */
					$query1 = "SELECT * FROM tax_charges_history WHERE CHARGES_ON_DATE <= '$current_date' 
	AND CHARGES_OFF_DATE >= '$current_date' AND REST_ID = '$restid' ORDER BY TAX_ID ASC";
					$result1 = mysqli_query($conn, $query1);
					$num1 = mysqli_num_rows($result1);
					$i = 0;
					while ($i < $num1) {
						mysqli_data_seek($result1, $i);
						$row1 = mysqli_fetch_array($result1);
						$tax_id = $row1["TAX_ID"];
						$tax_detail = $row1["TAX_DETAIL"];
						$tax_value = $row1["TAX_VALUE"];
						$i++;
					}

					/* ########## Service Charges Calculation ########## */
					$query1 = "SELECT * FROM service_charges_history WHERE CHARGES_ON_DATE <= '$current_date' 
	AND CHARGES_OFF_DATE >= '$current_date' AND REST_ID = '$restid' ORDER BY SERVICE_ID ASC";
					$result1 = mysqli_query($conn, $query1);
					$num1 = mysqli_num_rows($result1);
					$i = 0;
					while ($i < $num1) {
						mysqli_data_seek($result1, $i);
						$row1 = mysqli_fetch_array($result1);
						$service_id = $row1["SERVICE_ID"];
						$service_detail = $row1["SERVICE_DETAIL"];
						$service_value = $row1["SERVICE_VALUE"];
						$i++;
					}

					/* ########## Discount Calculation ######## */
					$query1 = "SELECT * FROM order_master_tab WHERE ORDER_NO = '$orderno' ORDER BY ORDER_NO ASC";
					$result1 = mysqli_query($conn, $query1) or die("Discount Failed: " . mysqli_error($conn));
					$num1 = mysqli_num_rows($result1);
					if ($num1 != 0) {
						$i = 0;
						while ($i < $num1) {
							mysqli_data_seek($result1, $i);
							$row1 = mysqli_fetch_array($result1);
							$discount = $row1["TOTAL_DISCOUNT"];
							$i++;
						}
					} else {
						$discount = 0;
					}

					$query = "SELECT * FROM guest_master_tab WHERE GUEST_ID = '$gid'";
					$result = mysqli_query($conn, $query) or die('Query failed!' . mysqli_error($conn));
					$num = mysqli_num_rows($result);

					?>

					<table width="353" border="0" cellpadding="0" cellspacing="5" align="left">
						<?php
						$i = 0;
						while ($i < $num) {
							mysqli_data_seek($result, $i);
							$row = mysqli_fetch_array($result);

							$id = $row["GUEST_ID"];
							$name = $row["GUEST_NAME"];
							$cell = $row["GUEST_MOBILE_NO"];
							$dob = $row["DATE_OF_BIRTH"];


						?>
							<tr><!--<td width="59" align="left"><strong>Name</strong></td><td width="155" align="left"><?php echo $name; ?></td>-->
								<td width="34" align="left"><strong>Date:</strong></td>
								<td width="80" align="left"><?php echo $today; ?></td>
							</tr>
							<!--<tr><td width="59" align="left"><strong>Cell No</strong></td><td align="left"><?php echo $cell; ?></td></tr>-->
						<?php
							$i++;
						}  //while loop end
						?>
						<tr>
							<td width="59" align="left"><strong>Order No</strong></td>
							<td align="left"><span class="style8" style="font-size:16px;"><?php echo $orderno; ?></span></td>
						</tr>
					</table><br><br>
					<?php
					$query = "SELECT order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,dish_master_tab.DISH_ID,
						  dish_master_tab.DISH_NAME,dish_master_tab.DISH_SERVING,
						  food_type_tab.FOOD_TYPE_DETAIL,
						  dish_charges_history.DISH_CHARGES,
						  order_history_tab.DISH_QTY, order_history_tab.DISH_STATUS 
						  FROM order_master_tab, dish_master_tab, food_type_tab, dish_charges_history, order_history_tab 
						  WHERE order_master_tab.ORDER_NO =  order_history_tab.ORDER_NO 
						  AND order_history_tab.DISH_ID = dish_master_tab.DISH_ID 
						  AND dish_master_tab.DISH_ID = dish_charges_history.DISH_ID
						  AND dish_master_tab.FOOD_TYPE_ID = food_type_tab.FOOD_TYPE_ID 
						  AND order_master_tab.ORDER_NO = '$orderno' 
						  AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
						  AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' 
						  ORDER BY order_master_tab.ORDER_NO ASC";

					$result1 = mysqli_query($conn, $query) or die('Query failed! ' . mysqli_error($conn));
					$num = mysqli_num_rows($result1);


					echo '<br><br><br><br><table width="350" border="0" cellpadding="0" cellspacing="0" align="left">
						<thead>
						<tr>
							<td width="150" align="left"><strong>Dish</strong></td>
							<td width="70" align="left"><strong>Unit Price</strong></td>
							<td width="60" align="left"><strong>Qty</strong></td>
							<td width="70" align="left"><strong>Dish Price</strong></td>
							<!--<td width="90" align="left"><strong>Status</strong></td>-->
						</tr>
						</thead>';
					$i = 0;
					$j = 1;
					while ($i < $num) {
						mysqli_data_seek($result1, $i);
						$row = mysqli_fetch_array($result1);

						$id = $row["DISH_ID"];
						$dish = $row["DISH_NAME"];
						$charges = $row["DISH_CHARGES"];
						$qty = $row["DISH_QTY"];
						$status = $row["DISH_STATUS"];

						$gross = $gross + ($charges * $qty);

						if ($status == "O") {
							echo '<tr>
							<td width="150" align="left">' . $j . ')&nbsp;' . $dish . '</td>                            
							<td width="70" align="left">&nbsp;' . $charges . '</td>
							<td width="60" align="left">&nbsp;' . $qty . '</td>
							<td width="70" align="left">&nbsp;' . $qty * $charges . '</td>
							<!--<td width="100" align="left">&nbsp;Ordered</td>-->
						  </tr>';
						} else if ($status == "C") {
							echo '<tr>
									<td width=150" align="left">' . $j . ')&nbsp;' . $dish . '</td>                            
									<td width="70" align="left">&nbsp;' . $charges . '</td>
									<td width="60" align="left">&nbsp;' . $qty . '</td>
									<td width="70" align="left">&nbsp;' . $qty * $charges . '</td>
									<!--<td width="100" align="left">&nbsp;Cooking</td>-->
							  </tr>';
						} else if ($status == "R") {
							echo '<tr>
									<td width="150" align="left">' . $j . ')&nbsp;' . $dish . '</td>                            
									<td width="70" align="left">&nbsp;' . $charges . '</td>
									<td width="60" align="left">&nbsp;' . $qty . '</td>
									<td width="70" align="left">&nbsp;' . $qty * $charges . '</td>
									<!--<td width="100" align="left">&nbsp;Ready</td>-->
							  </tr>';
						} else {
							echo '<tr>
									<td width="150" align="left">' . $j . ')&nbsp;' . $dish . '</td>                            
									<td width="70" align="left">&nbsp;' . $charges . '</td>
									<td width="60" align="left">&nbsp;' . $qty . '</td>
									<td width="70" align="left">&nbsp;' . $qty * $charges . '</td>
									<!--<td width="100" align="left">&nbsp;Served</td>-->
							  </tr>';
						}
						$i++;
						$j++;
					} // while ends here
					echo '</table><br><br>';
					//echo '<h1 class="style1" style=" font-size:14px;">Gross amount is :'.$gross.'</h1>';

					$service_charges = ($gross / 100) * $service_value;
					$total_tax = ($gross / 100) * $tax_value;
					//$total_discount = ($gross/100)*$discount;
					//$rec_amount = ($gross + $service_charges +$total_tax) - $total_discount;
					//$rec_amount = $gross - $total_discount;
					$rec_amount = ($gross + $service_charges + $total_tax) - $total_discount;
					?>

					</table><br><br><br><br><br><br><br><br><br>
					<table width="349" border="0" cellpadding="0" cellspacing="5" align="left">
						<tr>
							<td width="111" align="left"><strong>Gross Charges:</strong></td>
							<td width="70" align="left"><?php echo $gross; ?></td>
						</tr>
						<tr>

							<td width="111" align="left"><strong>Service Charges:</strong></td>
							<td width="70" align="left"><?php echo $service_charges; ?></td>
							<td width="148"><?php echo $service_value; ?>%</td>
						</tr>
						<tr>
							<td width="111" align="left"><strong>Total Tax:</strong></td>
							<td width="70" align="left"><?php echo $total_tax; ?></td>
							<td><?php echo $tax_value; ?>%</td>
						</tr>
						<?php

						if ($total_discount != 0) {
						?>
							<tr>
								<td width="111" align="left"><strong>Total Discount:</strong></td>
								<td width="70" align="left"><?php echo $total_discount; ?></td>
								<td><?php echo number_format(($total_discount / $gross) * 100); ?>%</td>
							</tr>
						<?php

						} // if ends here
						else {
						}
						?>
						<tr>
							<td width="111" align="left"><strong>Total Amount:</strong></td>
							<td width="70" align="left"><span class="style8" style="font-size:16px;"><?php echo $rec_amount; ?></span></td>
						</tr>

					</table>

				</div>
				<br /><br /><br />
				<a href="" class="style8" onclick="printSelection(document.getElementById('mydiv'));return false"><strong>Print Out</strong></a>
			</div>

		</div><br><br><br>
		<!-- end of middle column -->

		<!-- start of right column -->

		<div id="templatemo_right_column" style="padding-top: 1px;">
		</div><br><br><br><br>

		<!-- end of right column -->


		<!-- end of content -->


		<?php include("includes/footer.php"); ?>
</body>

</html>