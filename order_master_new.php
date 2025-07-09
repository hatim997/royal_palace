<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$restid = $_SESSION['restid'];
//echo "<br>Username is ".$userid."<br>";
//echo "<br>Password is ".$password."<br>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Web Saucer</title>
	<!--<link href="templatemo_style6.css" rel="stylesheet" type="text/css" />-->

	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<style type="text/css">
		<!--
		.style1 {
			color: #013c54;
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

		.overlay {
			position: fixed;
			top: 0%;
			left: 0%;
			width: 100%;
			height: 100%;
			background: #000;
			display: none;
			opacity: .5;
			filter: alpha(opacity=10);
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";

		}

		.popup {
			position: fixed;
			top: 50%;
			left: 45%;
			margin-left: -50px;
			margin-top: -10px;
			width: 300px;
			height: 90px;
			display: none;
			background: #FFF;
			border: 1px solid #F00;
			z-index: 1000;
		}

		.new_popup {
			position: fixed;
			top: 20%;
			left: 30%;
			margin-left: -50px;
			margin-top: -10px;
			width: 50%;
			height: auto;
			display: none;
			background: #FFF;
			border: 1px solid #F00;
			z-index: 1000;
		}
		-->
	</style>
	<style type="text/css">
		a.table {
			color: #753A00;
			text-decoration: none;
		}

		a.table:hover {
			text-decoration: none;
			color: #ECBA52;
		}

		a.table:visited {
			background-color: #666;
			color: #753A00;
		}

		a.table:active {
			color: #000;
		}

		a.table2 {
			color: #FFF;
			text-decoration: none;
		}

		a.table2:hover {
			text-decoration: none;
			color: #FFF;
		}

		a.table2:visited {
			background-color: #666;
			color: #FFF;
		}

		a.table2:active {
			color: #FFF;
		}

		.highlight {

			background-color: #EEB631;
		}

		.highlight2 {
			background-color: #2083AC;
		}

		a.dishes {
			color: #BB870F;
			text-decoration: none;
			font: bolder;
			font-size: 18px;
		}

		a.dishes:hover {
			color: #753A00;
			text-decoration: none;
		}

		a.dishes:visited,
		a.dishes:active {
			color: #F00;
		}
	</style>
	<style type="text/css">
		table.altrowstable tr:nth-child(even) {
			background-color: #EAF0F6;
		}

		.padding1 {
			padding-left: 9px;
		}
	</style>

	<script type="text/javascript">
		function showPopup(ID) {
			// alert(ID);
			document.getElementById("overlay").style.display = "block";
			document.getElementById("popup" + ID).style.display = "block";
		}

		function closePopup(ID) {
			document.getElementById("overlay").style.display = "none";
			document.getElementById("popup" + ID).style.display = "none";
		}

		function show_new_Popup() {
			// alert(ID);
			document.getElementById("overlay").style.display = "block";
			document.getElementById("new_popup").style.display = "block";
		}

		function close_new_Popup() {
			document.getElementById("overlay").style.display = "none";
			document.getElementById("new_popup").style.display = "none";
		}

		function add_guests(table_id) {
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}

			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('order').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/no_guests_form.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("table_id=" + table_id);
		}
	</script>

	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	<script language="javaScript" type="text/javascript">
		$(document).ready(function() {
			$("a").click(function() {
				$(this).fadeTo("fast", .5).removeAttr("href");
			});
		});

		function add_orders(dish_id) {
			show_new_Popup();
			var order_no = document.getElementById("order_no").value;
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("data_popup").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/add_orders.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("dish_id=" + dish_id + "&order_no=" + order_no);
		}
	</script>

	<script language="javaScript" type="text/javascript">
		function save_order(dish_id) {
			//alert("Ok");
			close_new_Popup();
			var order_no = document.getElementById("order_no").value;
			var dish_qty = document.getElementById("dish_qty").value;
			var dish_name = document.getElementById("dish_name").value;
			var dish_charges = document.getElementById("dish_charges").value;

			if (dish_qty == "") {
				alert("Please enter Dish Quantity");
				return;
			} else if (dish_qty == 0) {
				alert("Quantity can never zero");
				return;
			} else if (isDigits(dish_qty) == false) {
				alert("Required quantity is not numeric");
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
					document.getElementById("master").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/save_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("dish_id=" + dish_id + "&dish_charges=" + dish_charges + "&dish_qty=" + dish_qty + "&order_no=" + order_no + "&dish_name=" + dish_name);
		}
	</script>

	<script language="javaScript" type="text/javascript">
		function save_order_flag(order_no) {
			//alert("Ok");
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("master").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/save_order_flag.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("order_no=" + order_no);
		}
	</script>

	<script language="javaScript" type="text/javascript">
		function cancel_order(order_no) {
			//alert("Ok");
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("master").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/cancel_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("order_no=" + order_no);
		}
	</script>

	<script language="javaScript" type="text/javascript">
		function edit_dish_qty(order_no, dish_qty, dish_id) {
			show_new_Popup();
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("data_popup").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/edit_dish_qty.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("order_no=" + order_no + "&dish_qty=" + dish_qty + "&dish_id=" + dish_id);
		}
	</script>
	<script language="javaScript" type="text/javascript">
		function edit_save_qty(order_no, dish_id) {
			//alert("Ok");
			close_new_Popup();
			var new_req_quantity = document.getElementById("new_req_quantity").value;
			if (new_req_quantity == "") {
				alert("Please enetr required quantity");
				return;
			} else if (isDigits(new_req_quantity) == false) {
				alert("Required quantity is not numeric");
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
					document.getElementById("master").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/edit_save_qty.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("order_no=" + order_no + "&new_req_quantity=" + new_req_quantity + "&dish_id=" + dish_id);
		}
	</script>
	<script language="javaScript" type="text/javascript">
		function delete_dish_order(order_no, dish_id) {

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("master").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/delete_dish_order.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("order_no=" + order_no + "&dish_id=" + dish_id);
		}
	</script>


	<script language="javaScript" type="text/javascript">
		function save_guests(table_id) {
			//alert("Ok");
			//alert(document.getElementById("total_guests"+table_id).value);
			var total_guests = document.getElementById("total_guests" + table_id).value;
			//var order_no = document.getElementById("order_no").value;
			if (total_guests == "") {
				alert("Please enter Number of Guests");
				return;
			} else if (isDigits(total_guests + table_id) == false) {
				alert("Required quantity is not numeric");
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
					document.getElementById("master").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/save_guests.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("table_id=" + table_id + "&total_guests=" + total_guests + table_id);
		}

		function isDigits(argvalue) {
			argvalue = argvalue.toString();
			var validChars = "0123456789";
			var startFrom = 0;
			if (argvalue.substring(0, 2) == "0x") {
				validChars = "0123456789abcdefABCDEF";
				startFrom = 2;
			} else if (argvalue.charAt(0) == "0") {
				validChars = "01234567";
				startFrom = 1;
			}
			for (var n = 0; n < argvalue.length; n++) {
				if (validChars.indexOf(argvalue.substring(n, n + 1)) == -1) return false;
			}
			return true;
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

<body onclick="clicked=true;" onbeforeunload="CheckBrowser()" style="background-color:#FFF;">

	<div id="templatemo_container" style="background-color:#FFF;">

		<?php //include("includes/header2.php"); 
		?>


		<!-- start of content -->

		<div id="templatemo_content" align="center">

			<!-- start of left column --><!-- end of left column -->

			<!-- start of middle column -->

			<div>
				<table>
					<tr>
						<td width="590" align="left">
							<h1 class="style1" style=" font-size:16px;">New Order</h1>
						</td>
						<td width="590" align="right"><a href="login.php" style="font-size:18px; font-style:oblique;">Back</a></td>
					</tr>
				</table>


				<div id="master">
					<!--
            <table width="1200" cellspacing="0" cellpadding="0" border="1">
  <tr>
  	<td width="1200" style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Order Taking</i></b></td>
  </tr>
  </table>
  -->
					<table width="1200" align="center" border="1" cellspacing="0" cellpadding="0">
						<thead style="background:#2083AC; font-style:italic; color:#FFF;">
							<td align="center" width="596"><b>Tables</b></td>
							<td align="center" width="596"><b>Dishes </b></td>
						</thead>
						<tr>
							<td>
								<div id="tables" style="width:596px; height:280px; overflow: auto;">
									<table width="590" align="center" border="0" cellspacing="0" cellpadding="0" style='font-size:14px; text-decoration:none; color:#FFF;'>

										<?php

										$query = "SELECT * FROM tables_tab ORDER BY TABLE_NO ASC";
										$result = mysqli_query($conn, $query);
										$num1 = mysqli_num_rows($result);
										$i = 0;

										while ($i < $num1) {
											$row = mysqli_fetch_array($result);
											$table_id = $row['TABLE_ID'];
											$table_no = $row['TABLE_NO'];

											if ($i % 6 == 0) echo '<tr>';
											echo "<td height='50px' align='center'>";

											$query2 = "SELECT * FROM order_master_tab WHERE TABLE_NO='$table_id'
		AND PAYMENT_FLAG=' '
		AND CREATED_ON LIKE '$current_date%'";
											$result2 = mysqli_query($conn, $query2);
											$num = mysqli_num_rows($result2);
											if ($num == 0) {



												echo "<td height='50px' align='center'>";
												echo '<a class="table" href="javascript:showPopup(' . $table_id . ')" alt="Table" title="Table"><img width="55" height="45" SRC="images/table.png" alt="Table" border="0" />';
												echo '<font style="font-size:18px;">';
												echo '<br>' . $table_no;
												echo '</font>';
												echo '</a>';
												echo "</td>";
											} else {
												echo "<td height='50px' align='center'>";
												echo '<a class="table" href="javascript:showPopup(' . $table_id . ')" alt="Table" title="Table"><img width="65" height="55" SRC="images/table_booked.png" alt="Table" border="0" />';
												echo '<font style="font-size:18px;">';
												echo '<br>' . $table_no;
												echo '</font>';
												echo '</a>';
												echo "</td>";
											}

											//				echo '<a class="table" href="javascript:showPopup('.$table_id.')" alt="Table" title="Table"><img width="60" height="60" SRC="images/table.png" alt="Table" border="0" />';
											//				echo '<font style="font-size:18px;">';
											//				echo '<br>'.$table_no;
											//				echo '</font>';
											//				 echo '</a>';
											//				 echo "</td>";
											$i++;
											if ($i % 6 == 0) echo '</tr>';
											echo "<div id='overlay' class='overlay'></div>";
											echo '<div id=popup' . $table_id . ' class=popup>';
											echo '<a href=javascript:closePopup(' . $table_id . ')>
				<img width=25 height=25  align="right" SRC=images/remove.png alt=Delete/></a>';
											echo '
				<br>
				Number of Guests:
					<input type="text" id="total_guests' . $table_id . '" name="total_guests"/></br>
			        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" align="right" onclick="save_guests(' . $table_id . ')" class="button" style="cursor:pointer" name="Submit" value="Save" />
 				 </div>';
										}
										//echo "</tr>";

										?>
									</table>
								</div>
							</td>
							<td>
								<div id="dishes" style="width:596px; height:280px; overflow: auto;">
									<table width="590" align="center" border="0" cellspacing="0" cellpadding="0">

										<?php

										$query2 = "SELECT * FROM food_type_tab ORDER BY FOOD_TYPE_DETAIL ASC";
										$result2 = mysqli_query($conn, $query2);
										$num2 = mysqli_num_rows($result2);
										$i = 0;

										echo "<tr valign='top'>";
										while ($i < $num2) {
											mysqli_data_seek($result2, $i);
											$row2 = mysqli_fetch_array($result2);
											$food_type_id = $row2['FOOD_TYPE_ID'];
											$food_type_detail = $row2['FOOD_TYPE_DETAIL'];

											echo "<td align='left' style='font-size:16px; color:#2083AC;' >";

											echo '<table border="0" >';
											echo '<tr>';
											echo '<td class="padding1">';
											echo $food_type_detail;
											echo '</td>';
											echo '</tr>';
											echo '</table>';

											$query3 = "SELECT * FROM dish_master_tab WHERE FOOD_TYPE_ID='$food_type_id' ORDER BY DISH_NAME ASC";
											$result3 = mysqli_query($conn, $query3);
											$num3 = mysqli_num_rows($result3);
											$j = 0;

											echo "<table border='0' width='200' style='font-size:14px; color:#FFF;' >";

											while ($j < $num3) {
												mysqli_data_seek($result3, $j);
												$row3 = mysqli_fetch_array($result3);
												$food_id = $row3['FOOD_TYPE_ID'];
												$dish_name = $row3['DISH_NAME'];
												$dish_id = $row3['DISH_ID'];

												echo "<tr>";
												echo "<td class='padding1'>";
												echo '<a class="dishes" href="javascript:showPopup(' . $dish_id . ')" alt="Dish" title="Dish" >';
												echo $dish_name;






												echo '</a>';

												echo "</td>";

												echo "</tr>";
												$j++;
											}

											echo "</table>";

											echo "</td>";

											$i++;
										}
										echo "</tr>";

										?>
									</table>
								</div>
							</td>
						</tr>
						<!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
					</table>

					<table width="1200" align="center" cellspacing="0" cellpadding="0" BORDER=1 RULES=NONE FRAME=BOX>
						<tr>
							<td width="1200" align="center">

								<div id="order" style="width:945px; height:186px; overflow: auto;" align="center">

								</div>
							</td>
						</tr>
					</table>
				</div><!-- end of master division -->
				<br><br>

				<div id="entry">

				</div> <!-- end of entry division -->

			</div>
			<!-- end of middle column -->

			<!-- start of right column -->


			<!-- end of right column -->

		</div>
		<div id='overlay' class='overlay'></div>
		<div id="new_popup" class="new_popup">
			<a href=javascript:close_new_Popup()>
				<img width=25 height=25 align="right" SRC=images/remove.png alt=Delete /></a>
			<div id="data_popup">

			</div>

		</div>
		<!-- end of content -->


		<?php //include("includes/footer.php"); 
		?>
</body>

</html>