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
	$query = "SELECT store_master_tab.INGREDIENT_NAME, store_master_tab.RE_ORDER_LEVEL, store_master_tab.LEAD_TIME, 
				store_master_tab.MAINTAINING_METHOD, store_master_tab.QTY_INHAND, unit_tab.UNIT_DETAIL, unit_tab.UNIT_ID 
				FROM store_master_tab, unit_tab 
				WHERE store_master_tab.UNIT_ID = unit_tab.UNIT_ID 
				AND store_master_tab.REST_ID = '$restid' 
				AND store_master_tab.INGREDIENT_ID = '$value' 
				ORDER BY store_master_tab.INGREDIENT_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());;
	$num = mysql_numrows($result);
	while($i < $num)
	{
		$name = mysql_result($result,$i, "store_master_tab.INGREDIENT_NAME" );
		$level = mysql_result($result,$i, "store_master_tab.RE_ORDER_LEVEL" );
		$lead = mysql_result($result,$i, "store_master_tab.LEAD_TIME" );
		$method = mysql_result($result,$i, "store_master_tab.MAINTAINING_METHOD" );
		$inhand = mysql_result($result,$i, "store_master_tab.QTY_INHAND" );
		$unit = mysql_result($result,$i, "unit_tab.UNIT_DETAIL" );
		$id = mysql_result($result,$i, "unit_tab.UNIT_ID" );
		//echo '<option value="'.$d_id.'">'.$d_name.'</option>';
		$i++;
	}  // while loop ends here
		
		echo '<table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>';
  if($inhand == "")
  {
	  echo '<td width="140">Brought Forward:</td>
	  <td width="210"><input type="text" id="brought_forward" name="brought_forward" value="'.$inhand.'" /></td>
	  <input type="hidden" id="flag" name="flag" value="insert" />';
  }
  else
  {
	  echo '<td width="140">Quantity Inhand:</td>
	  <td width="210"><input type="text" id="brought_forward" name="brought_forward" readonly="readonly" value="'.$inhand.'" /></td>
	  <input type="hidden" id="flag" name="flag" value="update" />';
  }
  
  echo '</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Re-Order Level:</td>
    <td width="210"><input type="text" id="reorder" name="reorder" value="'.$level.'" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Lead Time:</td>
    <td width="210"><input type="text" id="lead_time" name="lead_time" value="'.$lead.'" />&nbsp;&nbsp;(days)</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Inventory Rule:</td>
    <td width="210"><select id="inventory_rule" name="inventory_rule">
    <option value="'.$method.'">'.$method.'</option>
	<option value="">Select Rule</option>
    <option value="FIFO">FIFO</option>
    <option value="LIFO">LIFO</option>
    <option value="Average">Average</option>
    <option value="No Method">No Rule Apply</option>
	</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Unit:</td>
    <td><select id="unit_id" name="unit_id">
  		<option value="'.$id.'">'.$unit.'</option>
		<option value="">Select Unit</option>';
		$query = "SELECT * FROM unit_tab ORDER BY UNIT_DETAIL ASC";
		$result = mysql_query($query)or die("Failed :".mysql_error());
		$num = mysql_numrows($result);
		$i=0;
		while($i < $num)
		{
			$unit_detail = mysql_result($result,$i, "UNIT_DETAIL");
			$unit_id = mysql_result($result,$i, "UNIT_ID");
			echo '<option value="'.$unit_id.'">'.$unit_detail.'</option>';
            $i++;
        }  // while loop ends here
       echo '</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>';
?>