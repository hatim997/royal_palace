<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	$created_id = $_SESSION['username'];
	//$restid = $_SESSION['restid'];
	
	$grand_amount = 0;
	$grand_discount = 0;
	$grand_after_discount = 0;
	$grand_tax = 0;
	$grand_total = 0;
	//$rest = $_POST['rest'];
	$date = $_POST['date'];
	//echo "Rest ID is ".$restid;
	//$start = $from."00:00:00";
	//$end = $to."23:59:59";	
	$query = "SELECT REST_NAME FROM restaurant_master_tab WHERE REST_ID = '$restid'";
	$result = mysql_query($query);
	$num1 = mysql_numrows($result);
	//mysql_close();
	//$num1--;
	$i = 0;
	while($i < $num1)
	{
		$rname = mysql_result($result,$i, "REST_NAME" );
		$i++;
	}
	
	echo '<div id="report" align="center" style="overflow:auto; height:450px; width:720px">
	<table width="690" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="70" align="left">&nbsp;</td>
		<td width="90" align="left">&nbsp;</td>
		<td width="400" align="center"><h2 class="style1" style=" font-size:18px;">Daily Sales Summary</h2></td>
		<td width="70" align="left">&nbsp;</td>
		<td width="90" align="left">&nbsp;</td>
	</tr>
	<tr>
		<td width="70" align="left">&nbsp;</td>
		<td width="90" align="left">&nbsp;</td>
		<td width="400" align="center">&nbsp;</td>
		<td width="70" align="left">&nbsp;</td>
		<td width="90" align="left">&nbsp;</td>
	</tr>
	<tr>
		<td width="70" align="left"><strong>Date:</strong></td>
		<td width="90" align="left">'.$date.'</td>
		<td width="400" align="left">&nbsp;</td>
		<td width="100" align="left"><strong>Restaurant:</strong></td>
		<td width="240" align="left">'.$rname.'</td>
	</tr>
	<tr>
		<td width="120" align="left"><strong>Report ID:</strong></td>
		<td width="90" align="left">rpt_sale_summary.php</td>
		<td width="400" align="left">&nbsp;</td>
		<td width="100" align="left"><strong>Print Date:</strong></td>
		<td width="240" align="left">'.$today.'</td>
	</tr>
	</table><br>';
	
$query = "SELECT * FROM sale_type_tab ORDER BY SALE_TYPE_NAME ASC";
$result = mysql_query($query);
$num1 = mysql_num_rows($result);
//mysql_close();
//$num1--;
$j =0;
$a = 0;
while($a < $num1)
{
	$id = mysql_result($result,$a, "SALE_TYPE_ID" );
	$name = mysql_result($result,$a, "SALE_TYPE_NAME" );
	$total_amount = 0;
	$total_discount = 0;
	$total_after_discount = 0;
	$total_tax = 0;
	$total = 0;
	
	echo '<table width="690" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
			  <td width="50" align="left"><h2 class="style1" style=" font-size:16px;">'.$name.'</h2></td>
			</tr>
			</table><br>
			<table width="690" border="1" cellpadding="0" cellspacing="0" align="center">
			  <thead>
			  <tr>
				  <td width="50" align="center"><strong>S. No</strong></td>
				  <td width="70" align="center"><strong>Order No</strong></td>
				  <td width="90" align="center"><strong>Bill Date</strong></td>
				  <td width="70" align="center"><strong>Bill Amount</strong></td>
				  <td width="70" align="center"><strong>Discount</strong></td>
				  <td width="90" align="center"><strong>Bill After Discount</strong></td>
				  <td width="70" align="center"><strong>G.S.T</strong></td>
				  <td width="70" align="center"><strong>Total</strong></td>
				  <!--
				  <td width="80" align="center"><strong>Service Charges</strong></td>
				  <td width="80" align="center"><strong>Sales Tax GST</strong></td>
				  <td width="120" align="center"><strong>Complimentary</strong></td>
				  <td width="80" align="center"><strong>Discount</strong></td>
				  <td width="80" align="center"><strong>Expenses</strong></td>
				  <td width="80" align="center"><strong>Net Cash</strong></td>
				  -->
			  </tr>
			  </thead>';
			  
		$query = "SELECT order_master_tab.ORDER_NO, order_master_tab.TOTAL_CHARGES, order_master_tab.TOTAL_DISCOUNT,
					tax_charges_history.TAX_VALUE 
					FROM order_master_tab, tax_charges_history
					WHERE order_master_tab.TAX_ID = tax_charges_history.TAX_ID
					AND order_master_tab.SALE_TYPE_ID = '$id' 
					AND order_master_tab.VISITED_DATE = '$date' 
					AND tax_charges_history.CHARGES_ON_DATE <= '$current_date' 
					AND tax_charges_history.CHARGES_OFF_DATE >= '$current_date' 
					ORDER BY order_master_tab.ORDER_NO ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		while($i < $num)
		{
			$after_discount = 0;
			$gst = 0;
			$amount_total = 0;
			$orderno = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
			$amount = mysql_result($result1,$i, "order_master_tab.TOTAL_CHARGES" );
			$discount = mysql_result($result1,$i, "order_master_tab.TOTAL_DISCOUNT" );
			$tax_value = mysql_result($result1,$i, "tax_charges_history.TAX_VALUE" );
			$after_discount = $amount - $discount;
			$gst = (($amount/100)*$tax_value);
			$amount_total = $amount + $gst;
			
			$total_amount = $total_amount + $amount;
			$total_discount = $total_discount + $discount;
			$total_after_discount = $total_after_discount + $after_discount;
			$total_tax = $total_tax + $gst;
			$total = $total + $amount_total;
			
			$grand_amount = $grand_amount + $total_amount;
			$grand_discount = $grand_discount + $total_discount;
			$grand_after_discount = $grand_after_discount + $total_after_discount;
			$grand_tax = $grand_tax + $total_tax;
			$grand_total = $grand_total + $total;
			$plus = $i + 1;
			$j = $j + $plus;
			echo '<tr>
				  <td width="50" align="left">&nbsp;'.$j.'</td>
				  <td width="70" align="left">&nbsp;'.$orderno.'</td>
				  <td width="90" align="left">&nbsp;'.$date.'</td>
				  <td width="70" align="left">&nbsp;'.$amount.'</td>
				  <td width="70" align="left">&nbsp;'.$discount.'</td>
				  <td width="90" align="left">&nbsp;'.$after_discount.'</td>
				  <td width="70" align="left">&nbsp;'.$gst.'</td>
				  <td width="70" align="left">&nbsp;'.$amount_total.'</td>
				</tr>';
			$i++;
		} // while ends here
		echo '</table>
		<table width="690" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			  <td width="50" align="left">&nbsp;</td>
			  <td width="70" align="left">&nbsp;</td>
			  <td width="90" align="left">Total =&nbsp;</td>
			  <td width="70" align="center">'.$total_amount.'</td>
			  <td width="70" align="center">'.$total_discount.'</td>
			  <td width="90" align="center">'.$total_after_discount.'</td>
			  <td width="70" align="center">'.$total_tax.'</td>
			  <td width="70" align="center">'.$total.'</td>
			</tr>
			</table><br>';
	$a++;
}
		$div = 'report';	
		echo '<table width="690" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			  <td width="50" align="left">&nbsp;</td>
			  <td width="70" align="left">&nbsp;</td>
			  <td width="90" align="left">Grand Total =&nbsp;</td>
			  <td width="70" align="center">'.$grand_amount.'</td>
			  <td width="70" align="center">'.$grand_discount.'</td>
			  <td width="90" align="center">'.$grand_after_discount.'</td>
			  <td width="70" align="center">'.$grand_tax.'</td>
			  <td width="70" align="center">'.$grand_total.'</td>
			</tr>
			</table></div>
			<a href="javascript:printSelection()"><strong>Print Report</strong></a>';
?>