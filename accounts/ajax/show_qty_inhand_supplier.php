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
				FROM store_master_tab, unit_tab 
				WHERE store_master_tab.UNIT_ID = unit_tab.UNIT_ID 
				AND store_master_tab.REST_ID = '$restid' 
				AND store_master_tab.INGREDIENT_ID = '$value' 
				ORDER BY store_master_tab.INGREDIENT_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());;
	$num = mysql_num_rows($result);
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
	  <tr>
	  <td>Supplier:</td>
	  <td><select id="supplier" name="supplier">
		  <option value="">Select Supplier</option>';
		  $query = "SELECT supplier_master.SUPPLIER_ID, supplier_master.SUPPLIER_NAME, 
					  supplier_item.INGREDIENT_ID 
					  FROM supplier_master, supplier_item
					  WHERE supplier_master.SUPPLIER_ID = supplier_item.SUPPLIER_ID
					  AND supplier_item.INGREDIENT_ID = '$value'
					  AND supplier_master.REST_ID = '$restid'
					  AND supplier_master.STATUS = 'E'
					  ORDER BY supplier_master.SUPPLIER_NAME ASC";
		  $result = mysql_query($query)or die("Failed :".mysql_error());
		  $num = mysql_numrows($result);
		  $i=0;
		  while($i < $num)
		  {
			  $unit_detail = mysql_result($result,$i, "supplier_master.SUPPLIER_NAME");
			  $unit_id = mysql_result($result,$i, "supplier_master.SUPPLIER_ID");
			  echo '<option value="'.$unit_id.'">'.$unit_detail.'</option>';
			  $i++;
		  }  // while loop ends here
		  echo '</select></td>
	</tr>
	<tr height="3%">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	  </table>';
?>