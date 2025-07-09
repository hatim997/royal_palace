<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$created_id = $_SESSION['username'];
$restid = $_SESSION['restid'];
//$guest = $_POST['guest'];
//$guest_id = $_POST['guest_id'];
$orderno = $_POST['orderno'];
$food = $_POST['food'];
$total_dish = $_POST['t_dish'];
$dish_ids = $_POST['d_id'];
$dish_qtys = $_POST['d_qty'];

$dish_id = explode(":", $dish_ids);
$dish_qty = explode(":", $dish_qtys);
$no = count($dish_id);

for ($a = 0; $a < $no; $a++) {
    $dish = $dish_id[$a];
    $qty = $dish_qty[$a];

    $query = "SELECT * FROM dish_charges_history WHERE REST_ID = '$restid' AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
                    AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' AND DISH_ID = '$dish' ORDER BY DISH_ID ASC";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    $i = 0;
    while ($i < $num) {
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_assoc($result);
        $d_charge_id = $row["DISH_CHARGES_ID"];
        $i++;
    }  // while loop ends here

    $query = "INSERT INTO order_history_tab
        (REST_ID, ORDER_NO, DISH_ID, DISH_CHARGES_ID, DISH_QTY, DISH_STATUS, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
        VALUES('$restid','$orderno','$dish','$d_charge_id','$qty','O','$created_id','$date_time','$created_id','$date_time')";
    mysqli_query($conn, $query) or die('Insertion Failed:' . mysqli_error($conn));
}

$query = "SELECT guest_master_tab.GUEST_ID,guest_master_tab.GUEST_NAME, 
                order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,order_master_tab.NO_OF_GUEST,
                order_master_tab.ORDER_TYPE_ID
                FROM guest_master_tab, order_master_tab
                WHERE guest_master_tab.GUEST_ID = order_master_tab.GUEST_ID
                AND order_master_tab.ORDER_NO = '$orderno'
                ORDER BY guest_master_tab.GUEST_ID ASC";
$result = mysqli_query($conn, $query) or die("Failed: " . mysqli_error($conn));

$num = mysqli_num_rows($result);
$i = 0;
while ($i < $num) {
    mysqli_data_seek($result, $i);
    $row = mysqli_fetch_assoc($result);
    $gtid = $row["GUEST_ID"];
    $gname = $row["GUEST_NAME"];
    $order_type = $row["ORDER_TYPE_ID"];
    $on = $row["ORDER_NO"];
    $tn = $row["TABLE_NO"];
    $nog = $row["NO_OF_GUEST"];
    $i++;
}
 // while ends here

echo '<table width="600" align="left" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
		<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Guest Information</i></b></td></tr>
		</table>';
echo '<table width="600" align="left" cellpadding="0" cellspacing="5" BORDER=1 RULES=NONE FRAME=BOX>
		<tr>
			<td width="70" align="left" style="font-size:14px;"><strong>&nbsp;Guest ID:</strong></td>
			<td width="70" align="left" style="font-size:14px;"><strong>' . $gtid . '</strong></td>
			<td width="150" align="left" style="font-size:14px;"><strong>' . $gname . '</strong></td>
			<td width="150" align="left" style="font-size:14px;"><strong>with&nbsp;&nbsp;&nbsp;' . $nog . '&nbsp;&nbsp;&nbsp;guests</strong></td>
			</tr>
			<tr>
			<td width="70" align="left" style="font-size:14px;"><strong>&nbsp;Order No:</strong></td>
			<td width="70" align="left" style="font-size:14px;"><strong>' . $on . '</strong></td>
			<td width="150" align="left" style="font-size:14px;">&nbsp;</td>
			<td width="150" align="left" style="font-size:14px;">&nbsp;</td>
			</tr>
			<tr>
			<td width="70" align="left" style="font-size:14px;"><strong>&nbsp;Table No:</strong></td>
			<td width="70" align="left" style="font-size:14px;"><strong>' . $tn . '</strong></td>
			<td width="150" align="left" style="font-size:14px;">&nbsp;</td>
			<td width="150" align="left" style="font-size:14px;">&nbsp;</td>
			</tr></table><br><br><br><br><br><br>';

$query = "SELECT dish_master_tab.DISH_ID, dish_master_tab.DISH_NAME,dish_master_tab.DISH_SERVING,
				  food_type_tab.FOOD_TYPE_DETAIL,
				  order_history_tab.DISH_QTY,
				  dish_charges_history.DISH_CHARGES 
				  FROM dish_master_tab, food_type_tab, order_history_tab, dish_charges_history 
				  WHERE order_history_tab.DISH_ID = dish_master_tab.DISH_ID
				  AND dish_charges_history.DISH_ID = dish_master_tab.DISH_ID
				  AND dish_master_tab.FOOD_TYPE_ID = food_type_tab.FOOD_TYPE_ID 
				  AND order_history_tab.REST_ID = '$restid' 
				  AND order_history_tab.ORDER_NO = '$orderno'
				  AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
				  AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' 
				  ORDER BY food_type_tab.FOOD_TYPE_DETAIL ASC";

$result1 = mysqli_query($conn, $query) or die('Query failed! ' . mysqli_error($conn));
$num = mysqli_num_rows($result1);


echo '<div id="del_dish" align="center" style="overflow:auto; height:150px; width:620px">
              <table width="600" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="210" align="center"><strong>Dish</strong></td>
					<td width="80" align="center"><strong>Serving</strong></td>
					<td width="80" align="center"><strong>Unit Price</strong></td>
					<td width="80" align="center"><strong>Quantity</strong></td>
					<td width="80" align="center"><strong>Total Price</strong></td>
					<td width="80" align="center"><strong>Remove</strong></td>
                </tr>
                </thead>';
$i = 0;
while ($i < $num) {
	mysqli_data_seek($result1, $i);
    $row = mysqli_fetch_assoc($result1);

    $f = $row['FOOD_TYPE_DETAIL'];
    $di = $row['DISH_ID'];
    $d = $row['DISH_NAME'];
    $s = $row['DISH_SERVING'];
    $q = $row['DISH_QTY'];
    $c = $row['DISH_CHARGES'];
	$total = $total + ($c * $q);

	echo '<tr>
				  <td width="210" align="left">&nbsp;' . $d . '</td>                            
				  <td width="80" align="left">&nbsp;' . $s . '</td>
				  <td width="80" align="left">&nbsp;' . $c . '</td>
				  <td width="80" align="right">&nbsp;' . $q . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:edit_quantity(' . $orderno . ',' . $di . ')" alt="Edit" title="Edit"><img src="images/edit.png" height="25" width="25" alt="Delete" /></a></td>
				  <td width="80" align="left">&nbsp;' . $c * $q . '</td>
				  <td width="80" align="center"><a href="javascript:delete_dish(' . $orderno . ',' . $di . ')" alt="Delete" title="Delete"><img src="images/delete.png" height="25" width="25" alt="Delete" /></a></td>  
				</tr>';
	$i++;
} // while ends here
echo '</table>
			<table width="200" align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="70" align="left"><strong>Total Amount:</strong></td>
				<td width="70" align="left"><strong>' . $total . '</strong></td>
			</tr></table></div><br>';

echo '<form name="testform" action="de_client_master.php" method="post">
          <table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr> 
    <td width="120" align="left">Food Type:</td>
    <td width="250" align="left">
	<select id="food" name="food" onchange="show_dish(this.value);">
      <option value="">Select Food Type</option>';
if ($order_type_id == 1) {
	$query = "SELECT * FROM food_type_tab WHERE REST_ID = '$restid' AND FOOD_TYPE_ID != '18' ORDER BY FOOD_TYPE_DETAIL ASC";
} else if ($order_type_id == 2) {
	$query = "SELECT * FROM food_type_tab WHERE REST_ID = '$restid' ORDER BY FOOD_TYPE_DETAIL ASC";
} else if ($order_type_id == 3) {
	$query = "SELECT * FROM food_type_tab WHERE REST_ID = '$restid' AND FOOD_TYPE_ID = '19' ORDER BY FOOD_TYPE_DETAIL ASC";
} else {
	$query = "SELECT * FROM food_type_tab WHERE REST_ID = '$restid' AND FOOD_TYPE_ID != '18' AND FOOD_TYPE_ID != '19' ORDER BY FOOD_TYPE_DETAIL ASC";
}
//$query = "SELECT * FROM food_type_tab WHERE REST_ID = '$restid' ORDER BY FOOD_TYPE_DETAIL ASC";
$result = mysqli_query($conn, $query) or die('Not Found: ' . mysqli_error($conn));
$num = mysqli_num_rows($result);
$i = 0;
while ($i < $num) {
    mysqli_data_seek($result, $i);
    $row = mysqli_fetch_assoc($result);
    $foodid = $row['FOOD_TYPE_ID'];
    $food_detail = $row['FOOD_TYPE_DETAIL'];
    echo '<option value="' . $foodid . '">' . $food_detail . '</option>';
    $i++;
}
  // while loop ends here
echo '</select></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  
  <div id="show_dish">
  </div>
  
  <table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr align="center">                    
    <td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
    <td align="left" width="250" valign="bottom"><input type="button" onclick="add_order(this.form)" class="button" align="left" style="cursor:pointer"name="Submit" value="Add Dish" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
  <input type="hidden" id="orderno" name="orderno" value="' . $orderno . '" />
  </table>
  </form><br><br>';

echo '<div id="confirm">
  <form>
  
  <table width="370" align="right" border="0" cellpadding="0" cellspacing="0">
  <tr align="center">                    
    <td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
    <td align="right" width="250" valign="bottom"><input type="button" onclick="confirm_order(' . $orderno . ')" class="button" align="left" style="cursor:pointer"name="Submit" value="Confirm" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Cancel"></td>
  </tr>
  <input type="hidden" id="order_no" name="order_no" value="' . $orderno . '" />
  </table>
  
  </form>
  </div>';
?>