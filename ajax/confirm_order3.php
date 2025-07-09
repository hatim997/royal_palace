<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
$kit_id = $_SESSION['kitid'];
//$gross = ($total_guest)*999;
$gross_new = ($total_guest)*999;
$orderno = $_POST['orderno'];
$other_charges = $_POST['other_charges'];
$total_gross =($other_charges + $total_amount + $other_charges);
$gross = $total_gross;

?>
<?php

	
	$created_id = $_SESSION['username'];
	$orderno = $_POST['orderno'];
												


	
	$query = "UPDATE order_master_tab SET PAYMENT_FLAG = 'O', EDITED_ID = '$created_id', EDITED_ON = '$date_time' WHERE ORDER_NO = '$orderno'";
	mysql_query($query) or die('Insertion Failed:'.mysql_error());
	
	echo '<h1 class="style1" style=" font-size:16px;">Your Order No is '.$orderno.'.</h1><br><br>';


	
$orderno = $_POST['orderno'];
	$guest = $_POST['guest'];
	//$gross = ($gross_new);
	$service_charges = 0;
	$total_tax = 0;
	$total_discount = 0;
	$rec_amount = 0;
	/*   ##########    Guest Name Search    ########*/
	$query1 = "SELECT * FROM guest_master_tab WHERE GUEST_ID = '$guest'";
	$result1 = mysql_query($query1);
	$num1 = mysql_numrows($result1);
	$i = 0;
	while($i < $num1)
	{
		$g_name = mysql_result($result1,$i, "GUEST_NAME" );
		$i++;
	}
	/*   ##########    Table No Search   ########*/
	$query1 = "SELECT * FROM order_master_tab WHERE ORDER_NO = '$orderno'";
	$result1 = mysql_query($query1);
	$num1 = mysql_numrows($result1);
	$i = 0;
	while($i < $num1)
	{
		$table_no = mysql_result($result1,$i, "TABLE_NO" );
		$i++;
	}
	/*   ##########    Tax Calculation   ########*/
	$query1 = "SELECT * FROM tax_charges_history WHERE CHARGES_ON_DATE <= '$current_date' 
				AND CHARGES_OFF_DATE >= '$current_date' AND REST_ID = '$restid' ORDER BY TAX_ID ASC";
	$result1 = mysql_query($query1);
	$num1 = mysql_numrows($result1);
	$i = 0;
	while($i < $num1)
	{
		$tax_id = mysql_result($result1,$i, "TAX_ID" );
		$tax_detail = mysql_result($result1,$i, "TAX_DETAIL" );
		$tax_value = mysql_result($result1,$i, "TAX_VALUE" );
		$i++;
	}
	
	/*   ##########    Service Charges Calculation   ##########   */
	$query1 = "SELECT * FROM service_charges_history WHERE CHARGES_ON_DATE <= '$current_date' 
				AND CHARGES_OFF_DATE >= '$current_date' AND REST_ID = '$restid' ORDER BY SERVICE_ID ASC";
	$result1 = mysql_query($query1);
	$num1 = mysql_numrows($result1);
	$i = 0;
	while($i < $num1)
	{
		$service_id = mysql_result($result1,$i, "SERVICE_ID" );
		$service_detail = mysql_result($result1,$i, "SERVICE_DETAIL" );
		$service_value = mysql_result($result1,$i, "SERVICE_VALUE" );
		$i++;
	}
	
	/*   ##########    Discount Calculation   ########*/
	$query1 = "SELECT * FROM order_master_tab WHERE ORDER_NO = '$orderno' ORDER BY ORDER_NO ASC";
	$result1 = mysql_query($query1) or die("Discount Failed: ".mysql_error());;
	$num1 = mysql_num_rows($result1);
	if($num1 != 0)
	{
		$i = 0;
		while($i < $num1)
		{
			$discount = mysql_result($result1,$i, "TOTAL_DISCOUNT" );
			$i++;
		}
	}
	else
	{
		$discount = 0;	
	}
	//echo '<h1 class="style1" style=" font-size:14px;">Discount:&nbsp;'.$discount.'</h1>';
	//echo '<h1 class="style1" style=" font-size:14px;">Guest Name:&nbsp;'.$g_name.'</h1>';
	//echo '<h1 class="style1" style=" font-size:14px;">Order No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;'.$orderno.'</h1>';
	//echo '<h1 class="style1" style=" font-size:14px;">Table No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;'.$table_no.'</h1><br>';
	
	$query = "SELECT order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,dish_master_tab.DISH_ID,
				dish_master_tab.DISH_NAME,dish_master_tab.DISH_SERVING,
				food_type_tab.FOOD_TYPE_DETAIL, order_master_tab.ORDER_NO, 
				dish_charges_history.DISH_CHARGES, order_master_tab.TOTAL_CHARGES, 
				order_history_tab.DISH_QTY, order_history_tab.DISH_STATUS 
				FROM order_master_tab, dish_master_tab, food_type_tab, dish_charges_history, order_history_tab 
				WHERE order_master_tab.ORDER_NO =  order_history_tab.ORDER_NO 
				AND order_history_tab.DISH_ID = dish_master_tab.DISH_ID 
				AND dish_master_tab.DISH_ID = dish_charges_history.DISH_ID
				AND dish_master_tab.FOOD_TYPE_ID = food_type_tab.FOOD_TYPE_ID 
				AND order_master_tab.PAYMENT_FLAG = 'O' 
				AND order_master_tab.REST_ID = '$restid' 
				AND order_master_tab.ORDER_NO = '$orderno'
				AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
				AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date'
				ORDER BY order_master_tab.ORDER_NO ASC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	if($num != 0)
	{
	echo '<table width="910" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="400" align="center"><strong>Dish</strong></td>
					<td width="80" align="center"><strong>Unit Price</strong></td>
					<td width="80" align="center"><strong>Ordered Quantity</strong></td>
					<td width="100" align="center"><strong>Dish Price</strong></td>
					<td width="90" align="center"><strong>Status</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$id = mysql_result($result1,$i, "dish_master_tab.DISH_ID" );
				$dish = mysql_result($result1,$i, "dish_master_tab.DISH_NAME" );
				$charges = mysql_result($result1,$i, "dish_charges_history.DISH_CHARGES" );
				$qty = mysql_result($result1,$i, "order_history_tab.DISH_QTY" );
				$status = mysql_result($result1,$i, "order_history_tab.DISH_STATUS" );
				$gross = mysql_result($result1,$i, "order_master_tab.TOTAL_CHARGES" );
				$gross = $gross + ($charges * $gross_new + $other_charges);
				
				if($status == "O")
			  	{
				  	echo '<tr>
					<td width="400" align="left">&nbsp;'.$dish.'</td>                            
					<td width="80" align="left">&nbsp;'.$charges.'</td>
					<td width="80" align="left">&nbsp;'.$qty.'</td>
					<td width="100" align="left">&nbsp;'.$gross_new*$charges.'</td>
					<td width="100" align="left">&nbsp;Ordered</td>
	
	
				  </tr>';
				}
				else if($status == "C")
			  	{
				  	echo '<tr>
							<td style="color:#0000FF" width="400" align="left">&nbsp;'.$dish.'</td>                            
							<td style="color:#0000FF" width="80" align="left">&nbsp;'.$charges.'</td>
							<td style="color:#0000FF" width="80" align="left">&nbsp;'.$qty.'</td>
							<td style="color:#0000FF" width="100" align="left">&nbsp;'.$gross_new*$charges.'</td>
							<td style="color:#0000FF" width="100" align="left">&nbsp;Cooking</td>
					  </tr>';
				}
				else if($status == "R")
				{
					echo '<tr>
							<td style="color:#800080" width="400" align="left">&nbsp;'.$dish.'</td>                            
							<td style="color:#800080" width="80" align="left">&nbsp;'.$charges.'</td>
							<td style="color:#800080" width="80" align="left">&nbsp;'.$qty.'</td>
							<td style="color:#800080" width="100" align="left">&nbsp;'.$gross_new*$charges.'</td>
							<td style="color:#800080" width="100" align="left">&nbsp;Ready</td>
					  </tr>';
				}
				else
				{
					echo '<tr>
							<td style="color:#FF0000" width="400" align="left">&nbsp;'.$dish.'</td>                            
							<td style="color:#FF0000" width="80" align="left">&nbsp;'.$charges.'</td>
							<td style="color:#FF0000" width="80" align="left">&nbsp;'.$qty.'</td>
							<td style="color:#FF0000" width="100" align="left">&nbsp;'.$gross_new*$charges.'</td>
							<td style="color:#FF0000" width="100" align="left">&nbsp;Served</td>
					  </tr>';
				}
				$i++;
			} // while ends here
			echo '</table><br><br>';
			//echo '<h1 class="style1" style=" font-size:14px;">Gross amount is :'.$gross.'</h1>';
			$service_charges = ($gross/100)*$service_value;
			$total_tax = ($gross/100)*$tax_value;
			$total_discount = ($gross/100)*$discount;
			//$rec_amount = ($gross + $service_charges +$total_tax) - $total_discount;
			
			//$rec_amount = $gross - $total_discount;
			
			$rec_amount = ($gross + $service_charges +$total_tax) - $discount;
			
			$query1 = "SELECT * FROM order_history_tab WHERE ORDER_NO = '$orderno' AND DISH_STATUS = 'S'";
			$result1 = mysql_query($query1);
			$num1 = mysql_numrows($result1);
			if($num1 == $num)
			{
			
			echo '<form name="testform" action="de_client_master.php" method="post">
          <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr>
    <td width="120" align="left">Gross Amount:</td>
    <td width="380" align="left"><input type="text" id="gross" name="gross" value="'.$gross.'" readonly="readonly" /></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  ';
  echo '<tr>
    <td width="120" align="left">Due Amount:</td>
    <td width="380" align="left"><input type="text" id="received" name="received" value="'.$gross.'" readonly="readonly" /></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120">Payment Mode:</td>
    <td width="380"><select name="pay_mode" id="pay_mode" onchange="payment_mode(this.value)">
      <option value="">Select Mode</option>
      <option value="C">Cash</option>
      <option value="Q">Cheque</option>
	  <option value="R">Credit Card</option>
    </select></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  
  <div id="mode">
  
  </div>
  
  <table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">                    
    <td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
    <td align="left" width="380" valign="bottom"><input type="button" onclick="payment_reception(this.form)" class="button" align="left" style="cursor:pointer"name="Submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="style1" style="font-size:16px;" href="http://www.wiitechmill.com/dev/royalpalace/accounts/receipt1.php?gid='.$guest.'&on='.$orderno.'">Print Bill</a></td>
  </tr>
  </table>
  <input type="hidden" id="orderno" name="orderno" value="'.$orderno.'" />
  <input type="hidden" id="gid" name="gid" value="'.$guest.'" />
  <input type="hidden" id="taxid" name="taxid" value="'.$tax_id.'" />
 	</form>';
		} // inner if ends here
		else
		{
			echo '<h1 class="style1" style=" font-size:14px;">Some of your Dishes are not yet Served</h1>';
		}
	} // if ends here
	else
	{
		echo '<h1 class="style1" style=" font-size:14px;">No dish for Order</h1>';
	}


?>
 	

