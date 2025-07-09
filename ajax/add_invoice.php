<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$created_id = $_SESSION['username'];
$rest_id = $_SESSION['restid'];
//$guest = $_POST['guest'];
$date = $_POST['date'];
$total_ing = $_POST['total_ing'];
$dish_ids = $_POST['d_id'];
$dish_qtys = $_POST['d_demand'];
$demandno = $_POST['demandno'];

//echo "Dish IDs are ".$dish_ids."<br>";
//echo "Quantities are ".$dish_qtys."<br>";

$query1 = "SELECT max(INVOICE_NO) FROM restaurant_demand";
$result1 = mysqli_query($conn, $query1);
$num1 = mysqli_num_rows($result1);
$i = 0;

while ($i < $num1) {
	mysqli_data_seek($result1, $i);
	$row = mysqli_fetch_assoc($result1);
	$invoice_no = $row['max(INVOICE_NO)'];
	$i++;
}
$invoice_no++;

$dish_id = explode(":", $dish_ids);
$dish_qty = explode(":", $dish_qtys);
$no = count($dish_id);
for ($a = 0; $a < $no; $a++) {
	$dish = $dish_id[$a];
	$qty = $dish_qty[$a];
	//echo $dish."<br>";

	$query = "SELECT * FROM store_master_tab WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$dish' ORDER BY INGREDIENT_ID ASC";
	$result = mysqli_query($conn, $query);
	$num = mysqli_num_rows($result);
	$i = 0;

	while ($i < $num) {
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_assoc($result);
		$price = $row['LAST_PURCHASED_PRICE'];
		//echo '<option value="'.$d_id.'">'.$d_name.'</option>';
		$i++;
	}

	$invoice_amount = $qty * $price;

	$query = "UPDATE restaurant_demand SET INVOICE_NO = '$invoice_no', INVOICE_QTY = '$qty', INVOICE_AMOUNT = '$invoice_amount', INVOICE_DATE = '$date' WHERE REST_ID = '$rest_id' AND DEMAND_NO = '$demandno' AND INGREDIENT_ID = '$dish'";
	mysqli_query($conn, $query) or die('Insertion Failed:' . mysqli_error($conn));

	$query = "UPDATE restaurant_inventory SET QTY_INHAND = QTY_INHAND + '$qty', LAST_RECEIVED_QTY = '$qty', LAST_RECEIVED_DATE = '$current_date' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$dish'";
	mysqli_query($conn, $query) or die('Restaurant Inventory Update Failed:' . mysqli_error($conn));

	$query = "UPDATE store_master_tab SET QTY_INHAND = QTY_INHAND - '$qty', LAST_ISSUED_QTY = '$qty', LAST_ISSUED_DATE = '$current_date' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$dish'";
	mysqli_query($conn, $query) or die('Store Update Failed:' . mysqli_error($conn));
}

echo '<div style="width:400px; margin-left:10px; float:left;">';

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

echo '</div>
		<div id="demand_detail" style="width:780px; float:right; height:500px;">
		
		</div>';


echo '<span class="style2"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Invoice No is ' . $invoice_no . '<br><br></strong></span>';
echo '<a class="style1" style="font-size:16px;" href="http://localhost/royal_palace/accounts/invoice_print.php?dn=' . $demandno . '&in=' . $invoice_no . '" target="_blank">Print Invoice</a>';
?>