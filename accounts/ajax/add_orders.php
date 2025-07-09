<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
//$userid = $_SESSION['username'];
//$password = $_SESSION['password'];
?>
<?php
	
	$created_id = $_SESSION['username'];
	$restid = $_SESSION['restid'];
	$dish_id = $_POST['dish_id'];
	$order_no = $_POST['order_no'];
	$query1 = "SELECT * FROM dish_charges_history WHERE DISH_ID = '$dish_id'
	AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
	AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$dish_charges = mysql_result($result1,$i, "DISH_CHARGES" );
		$i++;
	}
	$query2 = "SELECT * FROM dish_master_tab WHERE DISH_ID = '$dish_id'";
	$result2 = mysql_query($query2)or die("Failed :".mysql_error());
	$num2 = mysql_numrows($result2);
	$i=0;
	while($i < $num2)
	{
		$dish_name = mysql_result($result2,$i, "DISH_NAME" );
		$i++;
	} 
	//echo $id."<br>";
	######## TRANSACTION INFORMATION CODE ########
	//echo "Name is ".$g_name."<br>";
	//echo '<h1 class="style1" style=" font-size:14px;">Edit Dish Quantity</h1>';
		
	echo '<form name="editform" id="editform">
		  <table width="280" align="center" border="0" cellpadding="0" cellspacing="0">	  
  <tr>
	<td width="120" height="40" align="left"></td>
	<td width="100" align="left"><input type="hidden" id="dish_id" name="dish_id" value="'.$dish_id.'" />
	<input type="hidden" name="order_no" id="order_no" value="'.$order_no.'" />
	</td>
  </tr>
  
  <tr>
	<td width="120" align="left">Select Dish:</td>
	<td width="100" align="left">
	<input type="text" name="dish_name" id="dish_name" value="'.$dish_name.'" readonly="readonly"/>
	</td>
  </tr>
   <tr>
	<td width="120" height="10" align="left"></td>
	<td width="100" align="left">
	
	</td>
  </tr>
  
  <tr>
	<td width="120" align="left">Dish Charges:</td>
	<td width="100" align="left">
	<input type="text" id="dish_charges" name="dish_charges" value="'.$dish_charges.'" readonly="readonly"/>
	</td>
  </tr>
  
  <tr>
	<td width="120" height="10" align="left"></td>
	<td width="100" align="left">
	
	</td>
  </tr>
   <tr>
	<td width="120" align="left">Select Quantity:</td>
	<td width="100" align="left">
  <input type="text" id="dish_qty" name="dish_qty" />
	</td>
  </tr>
 
  <tr>
	<td width="120" height="10" align="left"></td>
	<td width="100" align="left">
	
	</td>
  </tr>
   <tr align="center">                    
	<td align="left" width="120" valign="top">&nbsp;</td>
	<td align="center" width="100"><input type="button" onclick="save_order('.$dish_id.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Save" /></td>
  </tr>
  </table>
  </form>';
?>