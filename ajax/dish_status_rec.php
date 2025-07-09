<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
$kitid = $_SESSION['kitid'];
?>
<?php

	$order = $_POST['orderno'];
	$status = $_POST['status'];
	//echo $status;
	if($status == 1)
	{
		$query = "UPDATE order_master_tab SET SWITCH = 'S' WHERE ORDER_NO = '$order'";
		mysql_query($query) or die('Updation1:'.mysql_error());
	}
	else
	{
		$query = "UPDATE order_master_tab SET SWITCH = 'H' WHERE ORDER_NO = '$order'";
		mysql_query($query) or die('Updation2:'.mysql_error());
	}
	
	$query = "SELECT * FROM order_master_tab WHERE SWITCH = 'S' OR SWITCH = '' ORDER BY ORDER_NO ASC";							
	$result1 = mysql_query($query) or die ('Query 1 failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		$orderno = mysql_result($result1,$i, "ORDER_NO" );
		
		$query = "UPDATE order_master_tab SET ORDER_SERIAL = (Select max(ORDER_SERIAL)) + 1 WHERE ORDER_NO = '$orderno'";
		mysql_query($query) or die('Updation3:'.mysql_error());
		
		$i++;
	}
	//echo 'Hello';
	$hide = 0;
	$show = 1;
	
	$show_total_gross = 0;
	$show_total_discount = 0;
	$show_total_service = 0;
	$show_total_tax = 0;
	$show_total_charges = 0;
	
	$hide_total_gross = 0;
	$hide_total_discount = 0;
	$hide_total_service = 0;
	$hide_total_tax = 0;
	$hide_total_charges = 0;
	
	$query = "SELECT order_master_tab.ORDER_NO, order_master_tab.TABLE_NO, order_master_tab.TOTAL_CHARGES, 
				order_master_tab.TOTAL_DISCOUNT, order_master_tab.TOTAL_SERV_CHARGES, order_master_tab.SWITCH, 
				tax_charges_history.TAX_VALUE
				FROM order_master_tab, tax_charges_history
				WHERE order_master_tab.TAX_ID = tax_charges_history.TAX_ID
				AND (order_master_tab.PAYMENT_FLAG = 'C' OR order_master_tab.PAYMENT_FLAG = 'P') 
				AND order_master_tab.REST_ID = '$restid'
				AND order_master_tab.VISITED_DATE = '$current_date'
				ORDER BY order_master_tab.ORDER_NO DESC";
									
	$result1 = mysql_query($query) or die ('Query 2 failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	//echo $num;
	if($num != 0)
	{
	echo '<div id="del_dish" align="center" style="overflow:auto; height:350px; width:830px">
              <table width="800" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="80" align="center"><strong>Order No</strong></td>
					<td width="80" align="center"><strong>Table No</strong></td>
					<td width="90" align="center"><strong>Gross</strong></td>
					<td width="90" align="center"><strong>Discount</strong></td>
					<td width="90" align="center"><strong>Service Charges</strong></td>
					<td width="90" align="center"><strong>Total Tax</strong></td>
					<td width="90" align="center"><strong>Total Charges</strong></td>
					<td width="90" align="center"><strong>Status</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$orderno = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
				$tableno = mysql_result($result1,$i, "order_master_tab.TABLE_NO" );
				$charges = mysql_result($result1,$i, "order_master_tab.TOTAL_CHARGES" );
				$discount = mysql_result($result1,$i, "order_master_tab.TOTAL_DISCOUNT" );
				$service = mysql_result($result1,$i, "order_master_tab.TOTAL_SERV_CHARGES" );
				$switch = mysql_result($result1,$i, "order_master_tab.SWITCH" );
				$tax = mysql_result($result1,$i, "tax_charges_history.TAX_VALUE" );
				$total_tax = ($charges/100)*$tax;
				
				echo '<tr>
					<td width="80" align="center">'.$orderno.'</td>
					<td width="80" align="center">'.$tableno.'</td>
					<td width="90" align="center">'.$charges.'</td>
					<td width="90" align="center">'.$discount.'</td>
					<td width="80" align="center">'.$service.'</td>
					<td width="80" align="center">'.$total_tax.'</td>
					<td width="90" align="center">'.$total_charges = ($charges + $discount + $total_tax + $service).'</td>';
					if($switch == "S" || $switch == "")
					{
						$show_total_gross = $show_total_gross + $charges;
						$show_total_discount = $show_total_discount + $discount;
						$show_total_service = $show_total_service + $service;
						$show_total_tax = $show_total_tax + $total_tax;
						$show_total_charges = $show_total_charges + $total_charges;
						echo '<td width="90" align="center"><input type="button" onclick="dish_status('.$orderno.','.$hide.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Hide" /></td>';
					}
					else
					{
						$hide_total_gross = $hide_total_gross + $charges;
						$hide_total_discount = $hide_total_discount + $discount;
						$hide_total_service = $hide_total_service + $service;
						$hide_total_tax = $hide_total_tax + $total_tax;
						$hide_total_charges = $hide_total_charges + $total_charges;
						echo '<td width="90" align="center"><input type="button" onclick="dish_status('.$orderno.''.$show.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Show" /></td>';
					}
					echo '</tr>';
				$i++;
			} // while ends here
			echo '</table></div>
			<table width="800" align="right" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="200" align="left"><strong>Show Gross Amount:</strong></td>
				<td width="100" align="left"><strong>'.$show_total_gross.'</strong></td>
				<td width="100" align="left">&nbsp;</td>
				<td width="100" align="left">&nbsp;</strong></td>
				<td width="200" align="left"><strong>Hide Gross Amount:</strong></td>
				<td width="100" align="left"><strong>'.$hide_total_gross.'</strong></td>
			</tr>
			<tr>
				<td width="200" align="left"><strong>Show Total Discount:</strong></td>
				<td width="100" align="left"><strong>'.$show_total_discount.'</strong></td>
				<td width="100" align="left">&nbsp;</td>
				<td width="100" align="left">&nbsp;</strong></td>
				<td width="200" align="left"><strong>Hide Total Discount:</strong></td>
				<td width="100" align="left"><strong>'.$hide_total_discount.'</strong></td>
			</tr>
			<tr>
				<td width="200" align="left"><strong>Show Total Service:</strong></td>
				<td width="100" align="left"><strong>'.$show_total_service.'</strong></td>
				<td width="100" align="left">&nbsp;</td>
				<td width="100" align="left">&nbsp;</strong></td>
				<td width="200" align="left"><strong>Hide Total Service:</strong></td>
				<td width="100" align="left"><strong>'.$hide_total_service.'</strong></td>
			</tr>
			<tr>
				<td width="200" align="left"><strong>Show Total Tax:</strong></td>
				<td width="100" align="left"><strong>'.$show_total_tax.'</strong></td>
				<td width="100" align="left">&nbsp;</td>
				<td width="100" align="left">&nbsp;</strong></td>
				<td width="200" align="left"><strong>Hide Total Tax:</strong></td>
				<td width="100" align="left"><strong>'.$hide_total_tax.'</strong></td>
			</tr>
			<tr>
				<td width="200" align="left"><strong>Show Total Amount:</strong></td>
				<td width="100" align="left"><strong>'.$show_total_charges.'</strong></td>
				<td width="100" align="left">&nbsp;</td>
				<td width="100" align="left">&nbsp;</strong></td>
				<td width="200" align="left"><strong>Hide Total Amount:</strong></td>
				<td width="100" align="left"><strong>'.$hide_total_charges.'</strong></td>
			</tr>
			</table>';
	} // if ends here
	else
	{
		echo '<h1 class="style1" style=" font-size:14px;">No Order</h1>';	
	}
?>