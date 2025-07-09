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
	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />
	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">
	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

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
			xmlhttp.open("POST", "ajax1/show_demand_details.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("demandno=" + demandno);
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

	<script type="text/javascript">
		function add_demand() {
			//alert("Hello");
			var d_id = "";
			var d_demand = "";
			var blank = 0;
			var demand = "";
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
					document.getElementById("inventory").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/add_invoice.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("total_ing=" + total_ing + "&d_id=" + d_id + "&d_demand=" + d_demand + "&demandno=" + demandno + "&date=" + date);
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
			<li style="width:50px;"><a href="logout.php">Logout</a></li>
		</ul>
		<script type="text/javascript">
			var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {
				imgDown: "SpryAssets/SpryMenuBarDownHover.gif",
				imgRight: "SpryAssets/SpryMenuBarRightHover.gif"
			});
		</script>
	</div>
	<br><br>

	<h1 style="font-size:20px; color:#013c54; margin-left:10px;">View Requisitions:</h1>
	<div style="width:1200px;" id="inventory">
		<div style="width:400px; margin-left:10px; float:left;">

			<?php
			$blank = 0;

			//echo $rest_id." and date ".$current_date;
			$query = "SELECT * FROM restaurant_demand WHERE REST_ID = '$rest_id' 
							AND INVOICE_NO = '$blank' GROUP BY DEMAND_NO ASC";

			$result1 = mysqli_query($conn, $query) or die('Query failed!' . mysqli_error($conn));
			$num = mysqli_num_rows($result1);
			if ($num != 0) {
				echo '<div id="del_dish" align="center" style="overflow:auto; height:200px; width:400px">
						  <table width="370" border="1" cellpadding="0" cellspacing="0" align="center">
							<thead>
							<tr>
								<td width="90" align="center"><strong>Demand No</strong></td>
								<td width="180" align="center"><strong>Department</strong></td>
								<td width="90" align="center"><strong>Details</strong></td>
							</tr>
							</thead>';
				$i = 0;
				while ($i < $num) {
					mysqli_data_seek($result1, $i);
					$row = mysqli_fetch_assoc($result1);
					$demand_no = $row['DEMAND_NO'];
					$display_name = $row['DISPLAY_NAME'];

					echo '<tr>
								<td width="90" align="left">&nbsp;' . $demand_no . '</td>
								<td width="180" align="left">&nbsp;' . $display_name . '</td>
								<td width="90" align="center"><a href="javascript:order_details(' . $demand_no . ')" alt="Details" title="Details"><img src="images/Details.png" height="35" width="90" alt="Details" border="0" /></a></td>  
							  </tr>';
					$i++;
				} // while ends here
				echo '</table></div><br>';
			} // if ends here
			else {
				echo '<h1 class="style1" style=" font-size:14px;">Currently no Demands Raised</h1>';
			}
			?>
		</div>

		<div id="demand_detail" style="width:780px; float:right; height:500px;">

		</div>

	</div>

</body>

</html>