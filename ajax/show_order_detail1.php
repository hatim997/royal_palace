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
	
	$query = "SELECT guest_master_tab.GUEST_ID,guest_master_tab.GUEST_NAME, 
				order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,order_master_tab.NO_OF_GUEST
				FROM guest_master_tab, order_master_tab
				WHERE guest_master_tab.GUEST_ID = order_master_tab.GUEST_ID
				AND order_master_tab.ORDER_NO = '$orderno'
				ORDER BY guest_master_tab.GUEST_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());
	
	$num = mysql_num_rows($result);
	$i = 0;
	while ($i < $num)
	{
		$gtid = mysql_result($result,$i, "guest_master_tab.GUEST_ID" );
		$gname = mysql_result($result,$i, "guest_master_tab.GUEST_NAME" );
		$on = mysql_result($result,$i, "order_master_tab.ORDER_NO" );
		$tn = mysql_result($result,$i, "order_master_tab.TABLE_NO" );
		$nog = mysql_result($result,$i, "order_master_tab.NO_OF_GUEST" );
		$i++;
	} // while ends here
		
		echo '<table width="600" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="70" align="left"><strong>Guest ID:</strong></td>
			<td width="70" align="left"><strong>'.$gtid.'</strong></td>
			<td width="150" align="left"><strong>'.$gname.'</strong></td>
			<td width="150" align="left"><strong>with&nbsp;&nbsp;&nbsp;'.$nog.'&nbsp;&nbsp;&nbsp;guests</strong></td>
			</tr>
			<tr>
			<td width="70" align="left"><strong>Order No:</strong></td>
			<td width="70" align="left"><strong>'.$on.'</strong></td>
			</tr>
			<tr>
			<td width="70" align="left"><strong>Table No:</strong></td>
			<td width="70" align="left"><strong>'.$tn.'</strong></td>
			</tr></table><br>';
	
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
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	
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
			$i=0;
			while($i < $num)
			{
				$f = mysql_result($result1,$i, "food_type_tab.FOOD_TYPE_DETAIL" );
				$di = mysql_result($result1,$i, "dish_master_tab.DISH_ID" );
				$d = mysql_result($result1,$i, "dish_master_tab.DISH_NAME" );
				$s = mysql_result($result1,$i, "dish_master_tab.DISH_SERVING" );
				$q = mysql_result($result1,$i, "order_history_tab.DISH_QTY" );
				$c = mysql_result($result1,$i, "dish_charges_history.DISH_CHARGES" );
				$total = $total + ($c*$q);
				
				echo '<tr>
				  <td width="210" align="left">&nbsp;'.$d.'</td>                            
				  <td width="80" align="left">&nbsp;'.$s.'</td>
				  <td width="80" align="left">&nbsp;'.$c.'</td>
				  <td width="80" align="right">&nbsp;'.$q.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:edit_quantity('.$orderno.','.$di.')" alt="Edit" title="Edit"><img src="images/edit.png" height="25" width="25" alt="Delete" /></a></td>
				  <td width="80" align="left">&nbsp;'.$c*$q.'</td>
				  <td width="80" align="center"><a href="javascript:delete_dish('.$orderno.','.$di.')" alt="Delete" title="Delete"><img src="images/delete.png" height="25" width="25" alt="Delete" /></a></td>  
				</tr>';
				$i++;
			} // while ends here
			echo '</table>
			<table width="200" align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="70" align="left"><strong>Total Amount:</strong></td>
				<td width="70" align="left"><strong>'.$total.'</strong></td>
			</tr></table></div><br>';
	
	echo '<form name="testform" action="de_client_master.php" method="post">
          <table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr>
    <td width="120" align="left">Food Type:</td>
    <td width="250" align="left">
	<select id="food" name="food" onchange="show_dish(this.value);">
      <option value="">Select Food Type</option>';
      $query = "SELECT * FROM food_type_tab WHERE REST_ID = '$restid' ORDER BY FOOD_TYPE_DETAIL ASC";
	  $result = mysql_query($query) or die('Not Found:'.mysql_error());
	  $num = mysql_numrows($result);
	  $i=0;
	  while($i < $num)
	  {
		  $foodid = mysql_result($result,$i, "FOOD_TYPE_ID" );
		  $food_detail = mysql_result($result,$i, "FOOD_TYPE_DETAIL" );
		  echo '<option value="'.$foodid.'">'.$food_detail.'</option>';
          $i++;
      }  // while loop ends here
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
  <input type="hidden" id="orderno" name="orderno" value="'.$orderno.'" />
  </table>
  </form>';
  
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
?>