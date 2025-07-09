<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php

$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
//echo $value."<br>";
//echo '<h1 class="style1" style=" font-size:16px;">New Guest</h1>';

$query = "SELECT store_master_tab.INGREDIENT_ID, store_master_tab.QTY_INHAND, store_master_tab.INGREDIENT_NAME,
          supplier_demand.DEMAND_QTY, supplier_demand.DEMAND_DATE, supplier_demand.INVOICE_DATE,
          supplier_demand.INVOICE_QTY, supplier_demand.INVOICE_AMOUNT,
          supplier_master.SUPPLIER_ID, supplier_master.SUPPLIER_NAME, 
          unit_tab.UNIT_ID, unit_tab.UNIT_DETAIL
          FROM supplier_demand, store_master_tab, supplier_master, unit_tab
          WHERE store_master_tab.INGREDIENT_ID = supplier_demand.INGREDIENT_ID 
          AND supplier_demand.SUPPLIER_ID = supplier_master.SUPPLIER_ID 
          AND supplier_demand.UNIT_ID = unit_tab.UNIT_ID
          AND supplier_demand.DEMAND_DATE >= '$from_date' 
          AND supplier_demand.DEMAND_DATE <= '$to_date' 
          ORDER BY store_master_tab.INGREDIENT_NAME ASC";

$result = mysqli_query($conn, $query) or die("Query Failed: " . mysqli_error($conn));
$num = mysqli_num_rows($result);
if ($num != 0) {
	echo '<br><table width="800" align="left" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
			<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Purchase Orders</i></b></td></tr>
			</table>';

	if ($num <= 8) {
		echo '<div id="sup_demand" align="left" style="width:837px;">';
	} else if ($num > 10 && $num < 30) {
		echo '<div id="sup_demand" align="left" style="overflow:auto; height:200px; width:837px">';
	} else if ($num > 30 && $num < 60) {
		echo '<div id="sup_demand" align="left" style="overflow:auto; height:400px; width:837px">';
	} else {
		echo '<div id="sup_demand" align="left" style="overflow:auto; height:400px; width:837px">';
	}
	echo '<table width="800" border="1" cellpadding="0" cellspacing="0" align="left">
				<thead>
				<tr>
					<td width="90" align="center"><strong>Item ID</strong></td>
					<td width="200" align="center"><strong>Item Name</strong></td>
					<td width="100" align="center"><strong>Unit</strong></td>
					<td width="110" align="center"><strong>Quantity</strong></td>
					<td width="110" align="center"><strong>Amount</strong></td>
					<td width="110" align="center"><strong>Date</strong></td>
					<td width="200" align="center"><strong>Supplier</strong></td>
				</tr>
				</thead>';

	$i = 0;
	while ($i < $num) {
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_assoc($result);

		$d_id     = $row['INGREDIENT_ID'];
		$d_name   = $row['INGREDIENT_NAME'];
		$inhand   = $row['QTY_INHAND'];
		$demand   = $row['DEMAND_QTY'];
		$date     = $row['DEMAND_DATE'];
		$amount   = $row['INVOICE_AMOUNT'];
		$supplier = $row['SUPPLIER_NAME'];
		$unit     = $row['UNIT_DETAIL'];
		//$serving = mysql_result($result,$i, "dish_master_tab.DISH_SERVING" );
		//$price = mysql_result($result,$i, "dish_charges_history.DISH_CHARGES" );

		echo '<tr>
					<td width="90" align="left">&nbsp;' . $d_id . '</td>
					<td width="200" align="left">&nbsp;' . $d_name . '</td>
					<td width="100" align="left">&nbsp;' . $unit . '</td>
					<td width="110" align="left">&nbsp;' . $demand . '</td>
					<td width="110" align="left">&nbsp;' . $amount . '</td>
					<td width="110" align="left">&nbsp;' . $date . '</td>
					<td width="200" align="left">&nbsp;' . $supplier . '</td>
				  </tr>';
		$i++;
	}
	echo '</table></div><br><br><br><br><br>';
?>

	<a href="" class="style8" onclick="printSelection(document.getElementById('sup_demand'));return false"><strong>Print Out</strong></a>
<?php
} else {
	echo '<h1 class="style1" style=" font-size:16px;">No purchase orders</h1>';
}

?>