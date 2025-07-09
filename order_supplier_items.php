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
		function add_demand(form) {
			//alert("Hello");
			var d_id = "";
			var d_demand = "";
			var blank = 0;
			var demand = "";
			var supplier = "";
			//var guest = encodeURIComponent(document.getElementById("guest").value);
			//var date = encodeURIComponent(document.getElementById("transaction_date").value);
			//var supplier = encodeURIComponent(document.getElementById("supplier").value);
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
					if (supplier == "") {
						supplier += encodeURIComponent(document.getElementById("supplier" + i).value);
					} else {
						supplier = supplier + ":" + encodeURIComponent(document.getElementById("supplier" + i).value);
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
					//document.getElementById("supplier_item").innerHTML="";
				}
			}
			xmlhttp.open("POST", "ajax/order_supplier_items.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("total_ing=" + total_ing + "&d_id=" + d_id + "&d_demand=" + d_demand + "&supplier=" + supplier);
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
	</div><br><br>
	<div id="process" style="margin-left:10px;">
		<h1 style="font-size:18px; color:#013c54;">Demand Items</h1>
		<div id="inventory" style="width:750px;">

			<?php
			$blank = 0;

			//echo $rest_id." and date ".$current_date;
			$query = "SELECT * FROM store_master_tab WHERE REST_ID = '$rest_id' AND QTY_INHAND <= RE_ORDER_LEVEL ORDER BY INGREDIENT_NAME ASC";

			$result1 = mysqli_query($conn, $query) or die('Query failed! ' . mysqli_error($conn));
			$num = mysqli_num_rows($result1);

			if ($num != 0) {
				/*
				echo '<table width="700" align="left" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
		<tr><td style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px" align="center"><b><i>Item Information</i></b></td></tr>
		</table>';
		*/
				echo '<table width="700" border="1" cellpadding="0" cellspacing="0" align="left"  BORDER=1 RULES=NONE FRAME=BOX>
							<thead>
							<tr style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px">
								<td width="90" align="left"><strong>&nbsp;Code</strong></td>
								<td width="200" align="left"><strong>Name</strong></td>
								<td width="120" align="center"><strong>Qty. Inhand</strong></td>
								<td width="90" align="left"><strong>Quantity</strong></td>
								<td width="90" align="center"><strong>Supplier</strong></td>
							</tr>
							</thead>
							</table><br>';
				echo '<div id="del_dish" align="center" style="overflow:auto; height:400px; width:730px;">
				<table width="700" border="1" cellpadding="0" cellspacing="0" align="left"  BORDER=1 RULES=NONE FRAME=BOX>';

				$i = 0;
				while ($i < $num) {
					mysqli_data_seek($result1, $i);
					$row = mysqli_fetch_array($result1);

					$code = $row['INGREDIENT_ID'];
					$name = $row['INGREDIENT_NAME'];
					$re_order = $row['RE_ORDER_LEVEL'];
					$qty = $row['QTY_INHAND'];
					$max = $row['MAX_LEVEL'];

					echo '<tr style="height:30px; background-color:';
					if ($i % 2 == 0) echo "#FFF799";
					else echo "#FFB06E";
					echo ';">
								<td width="90" align="left">&nbsp;<strong>' . $code . '</strong></td>
								<td width="200" align="left">&nbsp;<strong>' . $name . '</strong></td>
								<td width="120" align="center">&nbsp;<strong>' . $qty . '</strong></td>
								<td width="90" align="left">&nbsp;<input type="text" style="background:#FFFFFF;" name="' . $code . '" id="demand' . $i . '" size="5" value="" /></td>
								<td width="90" align="left">&nbsp;
								<select id="supplier' . $i . '" name="supplier">
  									<option value="">Select Supplier</option>';
					$query1 = "SELECT * FROM supplier_master WHERE REST_ID = '$rest_id' ORDER BY SUPPLIER_NAME ASC";
					$result = mysqli_query($conn, $query1) or die("Failed: " . mysqli_error($conn));
					$num1 = mysqli_num_rows($result);
					$j = 0;
					while ($j < $num1) {
						mysqli_data_seek($result, $j);
						$row = mysqli_fetch_array($result);
						$unit_detail = $row['SUPPLIER_NAME'];
						$unit_id = $row['SUPPLIER_ID'];
			?>
						<option value="<?php echo $unit_id; ?>"><?php echo $unit_detail; ?></option>
			<?php

						$j++;
					}  // while loop ends here
					echo '</td>
							  </tr>';
					$i++;
				} // while ends here
				echo '</table></div><br>';
				echo '<table width="450" align="left" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="129">&nbsp;</td>
  <td width="254"><input class="button" align="left" onclick="add_demand(this.form)" name="submit" style="cursor:pointer" type="button" value="Demand" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table><input type="hidden" name="total_ing" id="total_ing" value="' . $i . '" />';
			} // if ends here
			else {
				echo '<h1 class="style1" style=" font-size:14px;">Currently no item below re-order level</h1>';
			}
			?>
		</div>


	</div>
	</div>
</body>

</html>