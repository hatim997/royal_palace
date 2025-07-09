<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	$head = $_POST['head'];
	$sub_head = $_POST['sub_head'];
	$name = $_POST['name'];
	$name = ucwords(strtolower($name));
	$b_forward = $_POST['b_forward'];
	$reorder = $_POST['reorder'];
	$lead_time = $_POST['lead_time'];
	$inventory_rule = $_POST['inventory_rule'];
	$unit_id = $_POST['unit_id'];
	$max_level = $_POST['max_level'];
	
	$query = "SELECT max(INGREDIENT_ID) FROM store_master_tab WHERE REST_ID	= '$rest_id' AND SUB_HEAD_ID = '$sub_head' ORDER BY SUB_HEAD_ID";
	$result = mysql_query($query);
	$num1 = mysql_numrows($result);
	$i = 0;
	while($i < $num1)
	{
		$ingredient_id = mysql_result($result,$i, "max(INGREDIENT_ID)" );
		$i++;
	}
	$ingredient_id++;
	
	$query = "INSERT INTO store_master_tab(REST_ID, SUB_HEAD_ID, INGREDIENT_ID, INGREDIENT_NAME, RE_ORDER_LEVEL, MAX_LEVEL, LEAD_TIME, MAINTAINING_METHOD, QTY_INHAND, UNIT_ID, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) VALUES('$rest_id','$sub_head','$ingredient_id','$name','$reorder','$max_level','$lead_time','$inventory_rule','$b_forward','$unit_id','$created_id','$date_time','$created_id','$date_time')";
	mysql_query($query) or die('Transaction Insertion Failed:'.mysql_error());
	
	$query = "INSERT INTO restaurant_inventory(REST_ID, SUB_HEAD_ID, INGREDIENT_ID, OPENING_QTY, QTY_INHAND, UNIT_ID, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
	VALUES('$rest_id','$sub_head','$ingredient_id','$b_forward','$b_forward','$unit_id','$created_id','$date_time','$created_id','$date_time')";
	mysql_query($query) or die('Transaction Insertion Failed:'.mysql_error());
	
	echo '<h4 class="style9">Item "'.$name.'" is defined Successfully with Code "'.$ingredient_id.'"</h4><br><br>';
	
	echo '<form name="ingredient" id="ingredient">
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140">Select Head:</td>
    <td width="210"><select id="head" name="head" onchange="show_sub_head(this.value)">
  		<option value="">Select Head</option>';
		$query = "SELECT * FROM item_head WHERE REST_ID = '$rest_id' ORDER BY HEAD_NAME ASC";
		$result = mysql_query($query)or die("Failed :".mysql_error());
		$num = mysql_numrows($result);
		$i=0;
		while($i < $num)
		{
			$unit_detail = mysql_result($result,$i, "HEAD_NAME");
			$unit_id = mysql_result($result,$i, "HEAD_ID");
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
  
  <div id="show_sub_head">
  
  </div>
			
<table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140">Item Name:</td>
    <td width="210"><input type="text" id="name" name="name" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Brought Forward:</td>
    <td width="210"><input type="text" id="brought_forward" name="brought_forward" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Re-Order Level:</td>
    <td width="210"><input type="text" id="reorder" name="reorder" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Lead Time:</td>
    <td width="210"><input type="text" id="lead_time" name="lead_time" />&nbsp;&nbsp;(days)</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Inventory Rule:</td>
    <td width="210"><select id="inventory_rule" name="inventory_rule">
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
    <td>
    <select id="unit_id" name="unit_id">
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
  <tr>
  <td>&nbsp;</td>
  <td><input class="button" align="left" onclick="add_inventory(this.form)" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>';
?>