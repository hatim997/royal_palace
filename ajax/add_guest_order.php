<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$created_id = $_SESSION['username'];
$restid = $_SESSION['restid'];
$name = $_POST['name'];
$day = $_POST['day'];
$month = $_POST['month'];
$cell = $_POST['cell'];
$email = $_POST['email'];
$city = $_POST['city'];
$pro_type = $_POST['pro_type'];
$tableno = $_POST['tableno'];
$total_guest = $_POST['total_guest'];

$dob = $day . "-" . $month;

$query1 = "SELECT max(GUEST_ID) FROM guest_master_tab";
$result1 = mysqli_query($conn, $query1);
$num1 = mysqli_num_rows($result1);
$i = 0;
while ($i < $num1) {
	mysqli_data_seek($result1, $i);
	$row = mysqli_fetch_assoc($result1);
	$guest_id = $row['max(GUEST_ID)'];
	$i++;
}
$guest_id++;

$query1 = "SELECT max(ORDER_NO) FROM order_master_tab";
$result1 = mysqli_query($conn, $query1);
$num1 = mysqli_num_rows($result1);
$i = 0;
while ($i < $num1) {
	mysqli_data_seek($result1, $i);
	$row = mysqli_fetch_assoc($result1);
	$orderno = $row['max(ORDER_NO)'];
	$i++;
}
$orderno++;

$query = "INSERT INTO guest_master_tab
	(GUEST_ID, GUEST_NAME, DATE_OF_BIRTH, GUEST_MOBILE_NO, GUEST_EMAIL, GUEST_CITY, PROFESSION_ID, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
	VALUES('$guest_id','$name','$dob','$cell','$email','$city','$pro_type','$created_id','$date_time','$created_id','$date_time')";
mysqli_query($conn, $query) or die('Insertion Failed:' . mysqli_error($conn));

$query = "INSERT INTO order_master_tab
	(REST_ID, ORDER_NO, GUEST_ID, NO_OF_GUEST, TABLE_NO, VISITED_DATE, VISITED_TIME, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
	VALUES('$restid','$orderno','$guest_id','$total_guest','$tableno','$current_date','$current_time','$created_id','$date_time','$created_id','$date_time')";
mysqli_query($conn, $query) or die('Insertion1 Failed:' . mysqli_error($conn));

$query = "SELECT guest_master_tab.GUEST_ID,guest_master_tab.GUEST_NAME, 
				order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,order_master_tab.NO_OF_GUEST
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
	$gtid = $row['GUEST_ID'];
	$gname = $row['GUEST_NAME'];
	$on = $row['ORDER_NO'];
	$tn = $row['TABLE_NO'];
	$nog = $row['NO_OF_GUEST'];
	$i++;
}


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

//echo "Record Defined Successfully";
//echo '<span class="style2"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Guest ID is '.$guest_id.' and Order No is '.$orderno.'<br><br></strong></span>';
//echo "Record Defined Successfully ".$var10;

echo '<form name="testform" action="de_client_master.php" method="post">
          <table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr>
    <td width="120" align="left">Food Type:</td>
    <td width="250" align="left">
	<select id="food" name="food" onchange="show_dish(this.value);">
      <option value="">Select Food Type</option>';
$query = "SELECT * FROM food_type_tab WHERE REST_ID = '$restid' ORDER BY FOOD_TYPE_DETAIL ASC";
$result = mysqli_query($conn, $query) or die('Not Found:' . mysqli_error($conn));
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
  </form>';
/*
  echo '<div id="confirm">
  <form>
  
  <table width="370" align="right" border="0" cellpadding="0" cellspacing="0">
  <tr align="center">                    
    <td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
    <td align="right" width="250" valign="bottom"><input type="button" onclick="confirm_order('.$orderno.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Confirm" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Cancel"></td>
  </tr>
  <input type="hidden" id="order_no" name="order_no" value="'.$orderno.'" />
  </table>
  
  </form>
  </div>';
  */
?>