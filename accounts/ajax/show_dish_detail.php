<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	$dish_id = $_POST['dish_id'];
	//echo $value."<br>";
	//echo '<h1 class="style1" style=" font-size:16px;">New Guest</h1>';
	$query = "SELECT * FROM dish_master_tab WHERE REST_ID = '$restid' AND DISH_ID = '$dish_id' ORDER BY DISH_NAME ASC";
	$result = mysql_query($query);
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$serving = mysql_result($result,$i, "DISH_SERVING" );
		//echo '<option value="'.$d_id.'">'.$d_name.'</option>';
		$i++;
	}  // while loop ends here
	
	$query = "SELECT * FROM dish_charges_history WHERE REST_ID = '$restid' AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
				AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' AND DISH_ID = '$dish_id' ORDER BY DISH_ID ASC";
	$result = mysql_query($query);
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$charges = mysql_result($result,$i, "DISH_CHARGES" );
		//echo '<option value="'.$d_id.'">'.$d_name.'</option>';
		$i++;
	}  // while loop ends here
	
	
	echo '<table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr>
    <td width="120" align="left">Dish Serving:</td>
    <td width="250" align="left"><input type="text" id="serving" name="serving" readonly="readonly" value="'.$serving.'" /></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="left">Price:</td>
    <td width="250" align="left"><input type="text" id="charges" name="charges" value="'.$charges.'" readonly="readonly" /></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="left">Quantity:</td>
    <td width="250" align="left"><input type="text" value="1" id="qty" name="qty" /></td>
  </tr>
  </table>';
?>