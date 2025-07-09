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
	$query = "SELECT * FROM dish_charges_history WHERE REST_ID = '$restid' AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
				AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' AND DISH_ID = '$dish_id' ORDER BY DISH_ID ASC";
	$result = mysql_query($query);
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$chargesid = mysql_result($result,$i, "DISH_CHARGES_ID" );
		$charges = mysql_result($result,$i, "DISH_CHARGES" );
		$ondate = mysql_result($result,$i, "CHARGES_ON_DATE" );
		$offdate = mysql_result($result,$i, "CHARGES_OFF_DATE" );
		//echo '<option value="'.$d_id.'">'.$d_name.'</option>';
		$i++;
	}  // while loop ends here
	
	
	echo '<table width="350" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr>
    <td width="300" align="left">Charges:&nbsp;&nbsp;'.$charges.'&nbsp;&nbsp;&nbsp;from&nbsp;&nbsp;'.$ondate.'&nbsp;&nbsp;to&nbsp;&nbsp;'.$offdate.'</td>
    <input type="hidden" id="charges" name="charges" value="'.$chargesid.'" />
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>';
?>