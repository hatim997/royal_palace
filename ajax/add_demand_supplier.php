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
$supplier = $_POST['supplier'];
$dish_ids = $_POST['d_id'];
$dish_qtys = $_POST['d_demand'];

//echo "Dish IDs are ".$dish_ids."<br>";
//echo "Quantities are ".$dish_qtys."<br>";

$query1 = "SELECT max(DEMAND_NO) FROM supplier_demand";
$result1 = mysqli_query($conn, $query1);
$num1 = mysqli_num_rows($result1);
$i = 0;
while ($i < $num1) {
	mysqli_data_seek($result1, $i);
	$row = mysqli_fetch_assoc($result1);
	$demand_no = $row['max(DEMAND_NO)'];
	$i++;
}

$demand_no++;

$dish_id = explode(":", $dish_ids);
$dish_qty = explode(":", $dish_qtys);
$no = count($dish_id);
for ($a = 0; $a < $no; $a++) {
	$dish = $dish_id[$a];
	$qty = $dish_qty[$a];
	//echo $dish."<br>";

	$query = "INSERT INTO supplier_demand
		(REST_ID, SUPPLIER_ID, INGREDIENT_ID, DEMAND_NO, DEMAND_QTY, DEMAND_DATE, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		VALUES('$rest_id','$supplier','$dish','$demand_no','$qty','$date','$created_id','$date_time','$created_id','$date_time')";
	mysqli_query($conn, $query) or die('Insertion Failed:' . mysqli_error($conn));

	$query = "UPDATE store_master_tab SET LAST_DEMAND_QTY = '$qty', LAST_DEMAND_DATE = '$date', DEMAND_FLAG = 'ON' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$dish'";
	mysqli_query($conn, $query) or die('Updation Failed:' . mysqli_error($conn));
}
echo '<span class="style2"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Demand No is ' . $demand_no . '<br><br></strong></span>';
echo '<a class="style1" style="font-size:16px;" href="http://www.wiitechmill.com/dev/royalpalace/accounts/store_demand_print.php?dn=' . $demand_no . '" target="_blank">Print Demand</a>';
/*
	echo '<form name="ingredient" id="ingredient">
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
  		<option value="">Select Supplier</option>';
		  $query = "SELECT * FROM supplier_master WHERE REST_ID = '$rest_id' ORDER BY SUPPLIER_NAME ASC";
		  $result = mysql_query($query)or die("Failed :".mysql_error());
		  $num = mysql_numrows($result);
		  $i=0;
		  while($i < $num)
		  {
			  $unit_detail = mysql_result($result,$i, "SUPPLIER_NAME");
			  $unit_id = mysql_result($result,$i, "SUPPLIER_ID");
			  echo '<option value="'.$unit_id.'">'.$unit_detail.'</option>';
			  $i++;
		  }  // while loop ends here
		  
    echo '</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  
  <div id="supplier_item">
  
  </div>
  
  <table width="450" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="129">&nbsp;</td>
  <td width="254"><input class="button" align="left" onclick="add_demand(this.form)" name="submit" style="cursor:pointer" type="button" value="Demand" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>';
*/
?>