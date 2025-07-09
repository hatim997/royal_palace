<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	$item_id = $_POST['item_id'];
	$b_forward = $_POST['b_forward'];
	$reorder = $_POST['reorder'];
	$lead_time = $_POST['lead_time'];
	$inventory_rule = $_POST['inventory_rule'];
	$unit_id = $_POST['unit_id'];
	$flag = $_POST['flag'];
	
	if($flag == "insert")
	{
		$query = "UPDATE store_master_tab SET RE_ORDER_LEVEL = '$reorder', LEAD_TIME = '$lead_time', MAINTAINING_METHOD = '$inventory_rule', QTY_INHAND = '$b_forward', UNIT_ID = '$unit_id' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$item_id'";
		mysql_query($query) or die('Transaction Insertion Failed:'.mysql_error());
		
		$query = "INSERT INTO store_transaction_tab(REST_ID, INGREDIENT_ID, TRAN_TYPE_ID, TRAN_QTY, TRAN_DATE, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		VALUES('$rest_id','$item_id','B','$b_forward','$current_date','$created_id','$date_time','$created_id','$date_time')";
		mysql_query($query) or die('Transaction Insertion Failed:'.mysql_error());
	}
	else
	{
		$query = "UPDATE store_master_tab SET RE_ORDER_LEVEL = '$reorder', LEAD_TIME = '$lead_time', MAINTAINING_METHOD = '$inventory_rule', QTY_INHAND = '$b_forward', UNIT_ID = '$unit_id' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$item_id'";
		mysql_query($query) or die('Transaction Insertion Failed:'.mysql_error());
	}
	echo '<h4 class="style9">Item Edited Successful</h4><br><br>';
	
	echo '<form>
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140">Item Name:</td>
    <td width="210"><select id="item_id" name="item_id" onchange="show_form(this.value)">
  		<option value="">Select Item</option>';
		$query = "SELECT * FROM store_master_tab WHERE REST_ID = '$rest_id' ORDER BY INGREDIENT_NAME ASC";
		$result = mysql_query($query)or die("Failed :".mysql_error());
		$num = mysql_numrows($result);
		$i=0;
		while($i < $num)
		{
			$unit_detail = mysql_result($result,$i, "INGREDIENT_NAME");
			$unit_id = mysql_result($result,$i, "INGREDIENT_ID");
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
  
  <div id="show_form">
  
  </div>
  
  <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="146">&nbsp;</td>
  <td width="204"><input class="button" align="left" onclick="edit_item(this.form)" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>';
?>