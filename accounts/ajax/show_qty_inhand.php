<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	$value = $_POST['value'];
	//echo $value."<br>";
	//echo '<h1 class="style1" style=" font-size:16px;">New Guest</h1>';
	$query = "SELECT store_master_tab.QTY_INHAND, unit_tab.UNIT_DETAIL 
				FROM store_master_tab, ingredient_tab, unit_tab 
				WHERE store_master_tab.UNIT_ID = unit_tab.UNIT_ID 
				AND store_master_tab.REST_ID = '$restid' 
				AND store_master_tab.INGREDIENT_ID = '$value' 
				ORDER BY store_master_tab.INGREDIENT_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());;
	$num = mysql_numrows($result);
	while($i < $num)
	{
		$inhand = mysql_result($result,$i, "store_master_tab.QTY_INHAND" );
		$unit = mysql_result($result,$i, "unit_tab.UNIT_DETAIL" );
		//echo '<option value="'.$d_id.'">'.$d_name.'</option>';
		$i++;
	}  // while loop ends here
		
		echo '<table width="350" align="center" border="0" cellpadding="0" cellspacing="0">
			  
	  <tr>
		<td width="140" align="left">Quantity Inhand:</td>
		<td width="210" align="left"><input type="text" id="inhand" name="inhand" readonly="readonly" value="'.$inhand.'" />  '.$unit.'</td>
	  </tr>
	  <tr height="3%">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  </table>';
?>