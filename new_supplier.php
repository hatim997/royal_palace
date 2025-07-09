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
		function add_supplier() {
			//alert("Hello");
			var name = encodeURIComponent(document.getElementById("name").value);
			var city = encodeURIComponent(document.getElementById("city").value);
			var contact_person = encodeURIComponent(document.getElementById("contact_person").value);
			var status = encodeURIComponent(document.getElementById("status").value);
			var mob = encodeURIComponent(document.getElementById("mob").value);
			var work_flag = encodeURIComponent(document.getElementById("work_flag").value);
			var ptcl_no = encodeURIComponent(document.getElementById("ptcl_no").value);
			var address = encodeURIComponent(document.getElementById("address").value);
			//var serving = encodeURIComponent(document.getElementById("serving").value);
			//var qty = encodeURIComponent(document.getElementById("qty").value);
			//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);
			//alert("Total Dishes are "+t_dish);
			if (name == "") {
				alert("Please enter supplier name");
				return;
			}
			if (city == "") {
				alert("Please select correct city");
				return;
			}
			if (contact_person == "") {
				alert("Please enter contact person name");
				return;
			}
			if (status == "") {
				alert("Please select status");
				return;
			}
			if (mob == "") {
				alert("Please enter mobile no");
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
					document.getElementById("inventory").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/add_new_supplier.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("name=" + name + "&city=" + city + "&contact_person=" + contact_person + "&status=" + status + "&mob=" + mob + "&work_flag=" + work_flag +
				"&ptcl_no=" + ptcl_no + "&address=" + address);
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
		<h1 style="font-size:18px; color:#013c54; margin-left:10px;">Suppliers</h1>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Add Supplier</a></li>
				<li><a href="ajax/show_all_suppliers.php">View All</a></li>
				<li><a href="ajax/content3-slow.php">Edit/Delete</a></li>
			</ul>
			<div id="tabs-1">
				<div id="inventory">
					<form name="supplier" method="post" action="" id="supplier">
						<table width="650" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>Name:</td>
								<td><input type="text" id="name" /></td>
								<td>City:</td>
								<td><select name="city" id="city">
										<option value="">Select City</option>
										<?php
										$query = "SELECT * FROM city_tab ORDER BY CITY_NAME ASC";
										$result = mysqli_query($conn, $query);
										$num = mysqli_num_rows($result);
										$i = 0;
										while ($i < $num) {
											mysqli_data_seek($result, $i);
											$row = mysqli_fetch_assoc($result);
											$city1 = $row['CITY_NAME'];
										?>
											<option value="<?php echo $city1; ?>"><?php echo $city1; ?></option>
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
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Contact Person:</td>
								<td><input type="text" id="contact_person" /></td>
								<td>Status:</td>
								<td><select name="status" id="status">
										<option value="">Select Status</option>
										<option value="E">Enable</option>
										<option value="S">Suspended</option>
										<option value="D">Discarded</option>
									</select></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Mobile No:</td>
								<td><input type="text" id="mob" /></td>
								<td>Working Flag:</td>
								<td><select name="work_flag" id="work_flag">
										<option value="">Select Flag</option>
										<option value="E">Efficient</option>
										<option value="N">Normal</option>
										<option value="S">Slow</option>
									</select></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>PTCL No:</td>
								<td><input type="text" id="ptcl_no" /></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>Address:</td>
								<td><textarea cols="20" name="address" id="address" rows="5"></textarea></td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td><input class="button" align="left" onclick="add_supplier();" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
							</tr>
						</table>
					</form>
				</div>

			</div>

		</div>

</body>

</html>