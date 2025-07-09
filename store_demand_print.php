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

				<h1 class="style1" style="font-size:16px;">Demand Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br>

				<div align="left" class="story" id="mydiv" style="width:660px;">
					<img src="images/header_report.jpg" /><br />
					<?php

					$demandno = $_GET['dn'];
					//echo $pid."<br><br>";
					//echo $tid."<br><br>";
					//echo $sid."<br><br>";
					?><br>
					<table width="650" border="0" cellpadding="0" cellspacing="5" align="left">
						<tr><!--<td width="59" align="left"><strong>Name</strong></td><td width="155" align="left"><?php echo $name; ?></td>-->
							<td width="110" align="left"><strong>Date:</strong></td>
							<td width="525" align="left"><?php echo $today; ?></td>
						</tr>
						<!--<tr><td width="59" align="left"><strong>Cell No</strong></td><td align="left"><?php echo $cell; ?></td></tr>-->
						<tr>
							<td width="110" align="left"><strong>Demand No</strong></td>
							<td align="left"><span class="style8" style="font-size:16px;"><?php echo $demandno; ?></span></td>
						</tr>
					</table><br><br>
					<?php
					$query = "SELECT store_master_tab.QTY_INHAND, store_master_tab.LAST_PURCHASED_PRICE,  
						store_master_tab.INGREDIENT_ID, store_master_tab.INGREDIENT_NAME, 
						supplier_demand.DEMAND_QTY, supplier_demand.DEMAND_DATE
						FROM store_master_tab, supplier_demand
						WHERE store_master_tab.INGREDIENT_ID = store_master_tab.INGREDIENT_ID 
						AND supplier_demand.INGREDIENT_ID = store_master_tab.INGREDIENT_ID
						AND supplier_demand.DEMAND_NO = '$demandno'
						ORDER BY store_master_tab.INGREDIENT_NAME ASC";
					$result = mysqli_query($conn, $query) or die("Query Failed: " . mysqli_error($conn));
					$num = mysqli_num_rows($result);


					echo '<br><br><br><table width="650" cellpadding="0" cellspacing="0" align="left" BORDER=1>
						<thead>
						<tr>
							<td width="80" align="center"><strong>Item ID</strong></td>
							<td width="200" align="center"><strong>Item Name</strong></td>
							<td width="100" align="center"><strong>Store Qty Inhand</strong></td>
							<td width="100" align="center"><strong>Demand</strong></td>
							<td width="100" align="center"><strong>Last Pur. Price</strong></td>
							<td width="100" align="center"><strong>Expected Price</strong></td>
							<td width="100" align="center"><strong>Demand Date</strong></td>
							<!--<td width="90" align="left"><strong>Status</strong></td>-->
						</tr>
						</thead>
						</table>
						<table width="650" cellpadding="0" cellspacing="0" align="left" BORDER=2 RULES=NONE FRAME=BOX>';
					$i = 0;
					while ($i < $num) {
						mysqli_data_seek($result, $i);
						$row = mysqli_fetch_assoc($result);

						$d_id       = $row['INGREDIENT_ID'];
						$d_name     = $row['INGREDIENT_NAME'];
						$inhand     = $row['QTY_INHAND'];
						$last_price = $row['LAST_PURCHASED_PRICE'];
						$demand     = $row['DEMAND_QTY'];
						$date       = $row['DEMAND_DATE'];

						//$serving = mysql_result($result,$i, "dish_master_tab.DISH_SERVING" );
						//$price = mysql_result($result,$i, "dish_charges_history.DISH_CHARGES" );
						echo '<tr>
								<td width="80" align="center">&nbsp;' . $d_id . '</td>                            
								<td width="200" align="left">&nbsp;' . $d_name . '</td>
								<td width="100" align="center">&nbsp;' . $inhand . '</td>
								<td width="100" align="center">&nbsp;' . $demand . '</td>
								<td width="100" align="center">&nbsp;' . $last_price . '</td>
								<td width="100" align="center">&nbsp;' . ($demand * $last_price) . '</td>
								<td width="100" align="center">&nbsp;' . $date . '</td>
						  </tr>';
						$i++;
					} // while ends here
					echo '</table>
					<table width="650" cellpadding="0" cellspacing="0" align="left" BORDER=2 RULES=NONE FRAME=BOX>
					
					<tr>
						<td width="100" align="left">Total Demand Items&nbsp;' . $num . '</td>
					</tr>
					</table><br><br><br><br>';
					//echo '<h1 class="style1" style=" font-size:14px;">Gross amount is :'.$gross.'</h1>';
					?>
				</div>
				<br><br><br><br><br><br>
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