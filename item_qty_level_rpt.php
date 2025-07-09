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
		<h1 style="font-size:18px; color:#013c54;">Item Quantity Report</h1>
		<div id="inventory">

			<?php
			$blank = 0;

			//echo $rest_id." and date ".$current_date;
			$query = "SELECT * FROM store_master_tab WHERE REST_ID = '$rest_id' ORDER BY INGREDIENT_NAME ASC";

			$result1 = mysqli_query($conn, $query) or die('Query failed! ' . mysqli_error($conn));
			$num = mysqli_num_rows($result1);
			if ($num != 0) {
				echo '<table width="700" align="left" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
		<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Item Information</i></b></td></tr>
		</table>';
				echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:730px">
				<table width="700" border="1" cellpadding="0" cellspacing="0" align="left">
							<thead>
							<tr>
								<td width="90" align="center"><strong>Code</strong></td>
								<td width="200" align="center"><strong>Name</strong></td>
								<td width="90" align="center"><strong>Re-Order Level</strong></td>
								<td width="90" align="center"><strong>Quantity Inhand</strong></td>
								<td width="90" align="center"><strong>Max. Level</strong></td>
							</tr>
							</thead>';
				$i = 0;
				while ($i < $num) {
					mysqli_data_seek($result1, $i);
					$row = mysqli_fetch_assoc($result1);

					$code     = $row['INGREDIENT_ID'];
					$name     = $row['INGREDIENT_NAME'];
					$re_order = $row['RE_ORDER_LEVEL'];
					$qty      = $row['QTY_INHAND'];
					$max      = $row['MAX_LEVEL'];
					echo '<tr>
								<td width="90" align="left">&nbsp;' . $code . '</td>
								<td width="200" align="left">&nbsp;' . $name . '</td>
								<td width="90" align="left">&nbsp;' . $re_order . '</td>
								<td width="90" align="left">&nbsp;' . $qty . '</td>
								<td width="90" align="left">&nbsp;' . $max . '</td>
							  </tr>';
					$i++;
				} // while ends here
				echo '</table></div><br>';
			} // if ends here
			else {
				echo '<h1 class="style1" style=" font-size:14px;">Currently no item below re-order level</h1>';
			}
			?>
		</div>
		<a href="" class="style8" onclick="printSelection(document.getElementById('del_dish'));return false"><strong>Print Out</strong></a>
	</div>
	</div>
</body>

</html>