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
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css" />
	<script>
		$(function() {
			$("#tabs").tabs({
				beforeLoad: function(event, ui) {
					ui.jqXHR.error(function() {
						ui.panel.html(
							"This option is under construction.");
					});
				}
			});
		});
	</script>
	<script>
		$(function() {
			$("#transaction_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
			});
		});
	</script>

	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />
	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript">
		function supplier_item(value) {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);

			if (value == "") {
				document.getElementById("supplier_item").innerHTML = "";
				//alert("Please select correct status.");
				return;
			}
			var xmlhttp;

			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			document.getElementById("supplier_item").innerHTML = '<div align="center"><img src="images/ajax-loader.gif" alt="Loading Please wait....." title="Loading Please wait....." /></div>';
			xmlhttp.onreadystatechange = function() {
				/*if (xmlhttp.readyState==3)
			{
				document.getElementById("supplier_item").innerHTML= '<img src="ajax-loader.gif />"';
			}
		  else */
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("supplier_item").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/show_supplier_item.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("value=" + value);
		}
	</script>

	<script type="text/javascript">
		function add_demand(form) {
			//alert("Hello");
			var d_id = "";
			var d_demand = "";
			var blank = 0;
			var demand = "";
			//var guest = encodeURIComponent(document.getElementById("guest").value);
			var date = encodeURIComponent(document.getElementById("transaction_date").value);
			var supplier = encodeURIComponent(document.getElementById("supplier").value);
			var total_ing = encodeURIComponent(document.getElementById("total_ing").value);
			//var serving = encodeURIComponent(document.getElementById("serving").value);
			//var qty = encodeURIComponent(document.getElementById("qty").value);
			//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);
			//alert("Total Dishes are "+t_dish);
			if (date == "") {
				alert("Please select valid date");
				return;
			}
			if (supplier == "") {
				alert("Please select valid supplier");
				return;
			}
			for (var i = 0; i < total_ing; i++) {
				var demand = encodeURIComponent(document.getElementById("demand" + i).value);
				//alert(qty);
				//alert("Name is "+encodeURIComponent(document.getElementById("demand"+i).name));
				if (demand != "") {
					if (d_id == "") {
						d_id += encodeURIComponent(document.getElementById("demand" + i).name);
					} else {
						d_id = d_id + ":" + encodeURIComponent(document.getElementById("demand" + i).name);
					}
					if (d_demand == "") {
						d_demand += encodeURIComponent(document.getElementById("demand" + i).value);
					} else {
						d_demand = d_demand + ":" + encodeURIComponent(document.getElementById("demand" + i).value);
					}
					//alert(d_id+" and quntities are "+d_demand);
				} else {
					blank = blank + 1;
				}
				//alert("Blank is "+blank);
			}
			if (total_ing == blank) {
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
					var frm_elements = form.elements;
					for (i = 0; i < frm_elements.length; i++) {
						field_type = frm_elements[i].type.toLowerCase();
						switch (field_type) {
							case "text":
							case "password":
							case "textarea":
								//case "hidden":
								frm_elements[i].value = "";
								break;
							case "radio":
							case "checkbox":
								if (frm_elements[i].checked) {
									frm_elements[i].checked = false;
								}
								break;
							case "select-one":
							case "select-multi":
								frm_elements[i].selectedIndex = 0;
								break;
							default:
								break;
						}
					}
					document.getElementById("inventory_new").innerHTML = xmlhttp.responseText;
					document.getElementById("supplier_item").innerHTML = "";
				}
			}
			xmlhttp.open("POST", "ajax/add_demand_supplier.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("total_ing=" + total_ing + "&d_id=" + d_id + "&d_demand=" + d_demand + "&date=" + date + "&supplier=" + supplier);
		}
	</script>

	<script type="text/javascript">
		function order_details(demandno) {
			//alert("Demand No is "+demandno);
			//alert("Order is "+orderno+" and dish is "+dish+" and status is "+status);
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("demand_detail").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/show_store_demand.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("demandno=" + demandno);
		}
	</script>

	<script type="text/javascript">
		function add_demand1() {
			//alert("Hello");
			var d_id = "";
			var d_demand = "";
			var blank = 0;
			var demand = "";
			var price = "";
			var receive = "";
			var date = encodeURIComponent(document.getElementById("date").value);
			var demandno = encodeURIComponent(document.getElementById("demandno").value);
			var total_ing = encodeURIComponent(document.getElementById("total_ing").value);
			//var serving = encodeURIComponent(document.getElementById("serving").value);
			//var qty = encodeURIComponent(document.getElementById("qty").value);
			//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);
			//alert("Total Dishes are "+t_dish);

			for (var i = 0; i < total_ing; i++) {
				var demand = encodeURIComponent(document.getElementById("demand" + i).value);
				//alert(qty);
				//alert("Name is "+encodeURIComponent(document.getElementById("demand"+i).name));
				if (demand != "") {
					var pri = encodeURIComponent(document.getElementById("price" + i).value);
					if (pri == "" || parseInt(pri) == 0) {
						alert("Please enter the valid price against each item");
						return;
					}
					if (d_id == "") {
						d_id += encodeURIComponent(document.getElementById("demand" + i).name);
					} else {
						d_id = d_id + ":" + encodeURIComponent(document.getElementById("demand" + i).name);
					}
					if (d_demand == "") {
						d_demand += encodeURIComponent(document.getElementById("demand" + i).value);
						receive += encodeURIComponent(document.getElementById("receive" + i).value);
						price += encodeURIComponent(document.getElementById("price" + i).value);
					} else {
						d_demand = d_demand + ":" + encodeURIComponent(document.getElementById("demand" + i).value);
						receive = receive + ":" + encodeURIComponent(document.getElementById("receive" + i).value);
						price = price + ":" + encodeURIComponent(document.getElementById("price" + i).value);
					}
					//alert(d_id+" and quntities are "+d_demand);
				} else {
					blank = blank + 1;
				}
				//alert("Blank is "+blank);
			}
			if (total_ing == blank) {
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
					document.getElementById("inventory1").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/add_demand_receiving.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("total_ing=" + total_ing + "&d_id=" + d_id + "&d_demand=" + d_demand + "&demandno=" + demandno + "&date=" + date + "&price=" + price + "&receive=" + receive);
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
	<div id="main">
		<ul id="MenuBar1" class="MenuBarHorizontal">
			<li><a class="MenuBarItemSubmenu" href="#">Store Management</a>
				<ul>
					<li><a href="store_dept_demand.php">Department Demand</a></li>
					<li><a href="view_reqs.php">Requisitions</a></li>
					<li><a href="supplier.php">Supplier Demand</a></li>
					<li><a href="units.php">Unit</a></li>
					<li><a href="new_supplier.php">Suppliers</a></li>
					<li><a href="order_supplier_items.php">Order Items</a></li>
				</ul>
			</li>
			<li><a href="#">Restaurant</a></li>
			<li><a class="MenuBarItemSubmenu" href="#">Reports</a>
				<ul>
					<!--<li><a class="MenuBarItemSubmenu" href="#">Item 3.1</a>
        <ul>
          <li><a href="#">Item 3.1.1</a></li>
          <li><a href="#">Item 3.1.2</a></li>
        </ul>
      </li>-->
					<li><a href="item_qty_level_rpt.php">Item Quantity</a></li>
					<li><a href="purchase_orders.php">Purchase Orders</a></li>
					<li><a href="reorder_level_rpt.php">Re-Order Level</a></li>
					<li><a href="sale_report.php">Sale Report</a></li>
				</ul>
			</li>
			<li><a href="#">Room Service</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<script type="text/javascript">
			var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {
				imgDown: "SpryAssets/SpryMenuBarDownHover.gif",
				imgRight: "SpryAssets/SpryMenuBarRightHover.gif"
			});
		</script>
	</div>
	<br><br><br>
	<div id="process">
		<h1 style="font-size:18px; color:#013c54; margin-left:10px;">Demands to Supplier</h1>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Add Demand</a></li>
				<li><a href="ajax/receive_supplier_demand.php">Receive Demand</a></li>
				<li><a href="ajax/content1.html">View All</a></li>
				<li><a href="ajax/content3-slow.php">Edit/Delete</a></li>
			</ul>
			<div id="tabs-1">
				<div id="inventory">
					<div id="inventory_new">
					</div>
					<form name="ingredient" id="ingredient">
						<table width="450" align="center" border="0" cellspacing="0" cellpadding="0">

							<tr>
								<td width="140">Transaction Date:</td>
								<td width="246"><input type="text" class="tcal" id="transaction_date" name="transaction_date" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="140">Select Supplier:</td>
								<td width="246"><select id="supplier" name="supplier" onchange="supplier_item(this.value)">
										<option value="">Select Supplier</option>
										<?php
										$query = "SELECT * FROM supplier_master WHERE REST_ID = '$rest_id' ORDER BY SUPPLIER_NAME ASC";
										$result = mysqli_query($conn, $query) or die("Failed: " . mysqli_error($conn));
										$num = mysqli_num_rows($result);
										$i = 0;
										while ($i < $num) {
											mysqli_data_seek($result, $i);
											$row = mysqli_fetch_assoc($result);
											$unit_detail = $row["SUPPLIER_NAME"];
											$unit_id = $row["SUPPLIER_ID"];
										?>
											<option value="<?php echo $unit_id; ?>"><?php echo $unit_detail; ?></option>
										<?php
											$i++;
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>

						<div id="supplier_item" align="center">

						</div>

						<table width="450" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="129">&nbsp;</td>
								<td width="254"><input class="button" align="left" onclick="add_demand(this.form)" name="submit" style="cursor:pointer" type="button" value="Demand" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>