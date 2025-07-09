<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	$created_id = $_SESSION['username'];
	//$restid = $_SESSION['restid'];
	
	$total_cash = 0;
	$total_card = 0;
	$total_cheque = 0;
	
	//$rest = $_POST['rest'];
	$from = $_POST['from'];
	$to = $_POST['to'];
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
	
	echo '<table width="900" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="70" align="left"><strong>From:</strong></td>
		<td width="90" align="left">'.$from.'</td>
		<td width="400" align="left">&nbsp;</td>
		<td width="100" align="left"><strong>Restaurant:</strong></td>
		<td width="240" align="left">'.$rname.'</td>
	</tr>
	<tr>
		<td width="70" align="left"><strong>To:</strong></td>
		<td width="90" align="left">'.$to.'</td>
		<td width="400" align="left">&nbsp;</td>
		<td width="100" align="left">Date:</td>
		<td width="240" align="left">'.$today.'</td>
	</tr>
	<tr>
		<td width="90" align="left"><strong>Report ID:</strong></td>
		<td width="300" align="left">cash_ledger.php</td>
	</tr></table><br>';
	
$query = "SELECT * FROM restaurant_master_tab WHERE REST_ID = '$restid'";
$result = mysql_query($query);
$num1 = mysql_num_rows($result);
//mysql_close();
//$num1--;
$a = 0;
while($a < $num1)
{
	$rid = mysql_result($result,$a, "REST_ID" );
	$rname = mysql_result($result,$a, "REST_NAME" );
	
	$st_date = explode("-", $from);
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:920px">
			<table width="890" border="1" cellpadding="0" cellspacing="0" align="center">
			  <thead>
			  <tr>
				  <td width="50" align="center"><strong>Serial No</strong></td>
				  <td width="90" align="center"><strong>Day</strong></td>
				  <td width="90" align="center"><strong>Date</strong></td>
				  <td width="70" align="center"><strong>No Of Orders</strong></td>
				  <td width="70" align="center"><strong>Gross Sale</strong></td>
				  <td width="80" align="center"><strong>Service Charges</strong></td>
				  <td width="80" align="center"><strong>Sales Tax GST</strong></td>
				  <td width="120" align="center"><strong>Complimentary</strong></td>
				  <td width="80" align="center"><strong>Discount</strong></td>
				  <td width="80" align="center"><strong>Expenses</strong></td>
				  <td width="80" align="center"><strong>Net Cash</strong></td>
			  </tr>
			  </thead>';
	$d = 0;
	while($from < $to)
	{
		//$check_date = 
		$total_orders = 0;
		$total_sale = 0;
		$total_serv = 0;
		$t_tax = 0;
		$total_tax = 0;
		$total_discount = 0;
		$complementary = 0;
		$net_rec = 0;
		$from = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$show_date = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$day = date("l", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$start = $from."&nbsp;00:00:00";
		$end = $from."&nbsp;23:59:59";
		$query = "SELECT order_master_tab.ORDER_NO,order_master_tab.TOTAL_CHARGES,
					order_master_tab.TOTAL_DISCOUNT,order_master_tab.TOTAL_SERV_CHARGES,
					order_master_tab.PAYMENT_MODE,order_master_tab.PAYMENT_FLAG,order_master_tab.PAYMENT_REC,
					tax_charges_history.TAX_VALUE
					FROM order_master_tab, tax_charges_history
					WHERE order_master_tab.REST_ID = '$restid'
					AND order_master_tab.TAX_ID = tax_charges_history.TAX_ID 
					AND order_master_tab.VISITED_DATE = '$from' 
					ORDER BY order_master_tab.ORDER_NO ASC";
									
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$j = $d +1;
		$i=0;
		while($i < $num)
		{
			$on = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
			$tserv = mysql_result($result1,$i, "order_master_tab.TOTAL_SERV_CHARGES" );
			$tc = mysql_result($result1,$i, "order_master_tab.TOTAL_CHARGES" );
			$tax = mysql_result($result1,$i, "tax_charges_history.TAX_VALUE" );
			$discount = mysql_result($result1,$i, "order_master_tab.TOTAL_DISCOUNT" );
			$trec = mysql_result($result1,$i, "order_master_tab.PAYMENT_REC" );
			$pflag = mysql_result($result1,$i, "order_master_tab.PAYMENT_FLAG" );
			$pmode = mysql_result($result1,$i, "order_master_tab.PAYMENT_MODE" );
			$total_orders++;
			
			if($pflag == "Y")
			{
				$complementary = $complementary + $trec;	
			}
			else
			{
				"Simple Order";
			}
			if($pmode == "C")
			{
				$total_cash = $total_cash + $trec;
			}
			else if($pmode == "Q")
			{
				$total_cheque = $total_cheque + $trec;
			}
			else
			{
				$total_card = $total_card + $trec;
			}
			//$total = $total + ($c*$q);
			$total_sale = $total_sale + $tc;
			$total_serv = $total_serv + $tserv;
			$t_tax = ($tc/100)*$tax;
			$total_tax = $total_tax + $t_tax;
			
			$total_discount = $total_discount + $discount;
			$net_rec = $net_rec + $trec;
			$i++;
		} // while ends here
		echo '<tr>
			  <td width="50" align="left">&nbsp;'.$j.'</td>
			  <td width="90" align="left">&nbsp;'.$day.'</td>
			  <td width="90" align="left">&nbsp;'.$from.'</td>
			  <td width="70" align="left">&nbsp;'.$total_orders.'</td>
			  <td width="70" align="left">&nbsp;'.$total_sale.'</td>
			  <td width="80" align="left">&nbsp;'.$total_serv.'</td>
			  <td width="80" align="left">&nbsp;'.$total_tax.'</td>
			  <td width="80" align="left">'.$total_discount.'</td>
			  <td width="120" align="left">'.$complementary.'</td>
			  <td width="80" align="left">0</td>
			  <td width="80" align="left">'.$net_rec.'</td>  
			</tr>';
			$gtotal_sale = $gtotal_sale + $total_sale;
			$gtotal_serv = $gtotal_serv + $total_serv;
			$gt_tax = $gt_tax + $total_tax;
			$gtotal_discount = $gtotal_discount + $total_discount;
			$gnet_rec = $gnet_rec + $net_rec;
		
			$d++;
	}
	$a++;
}
		
		echo '</table>
		<table width="890" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			  <td width="50" align="left">&nbsp;</td>
			  <td width="90" align="left">&nbsp;</td>
			  <td width="80" align="left">&nbsp;</td>
			  <td width="70" align="left">&nbsp;Total =</td>
			  <td width="80" align="left">&nbsp;'.$gtotal_sale.'</td>
			  <td width="90" align="left">&nbsp;'.$gtotal_serv.'</td>
			  <td width="80" align="left">&nbsp;'.$gt_tax.'</td>
			  <td width="80" align="left">'.$gtotal_discount.'</td>
			  <td width="120" align="left">0</td>
			  <td width="80" align="left">0</td>
			  <td width="80" align="left">'.$gnet_rec.'</td>
			</tr>
			</table><br><br>';
			
		echo '<table width="300" align="right" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="200" align="left"><strong>Total Cash Amount:</strong></td>
			<td width="100" align="left"><strong>'.$total_cash.'</strong></td>
		</tr>
		<tr>
			<td width="200" align="left"><strong>Total Credit Card Amount:</strong></td>
			<td width="100" align="left"><strong>'.$total_card.'</strong></td>
		</tr>
		<tr>
			<td width="200" align="left"><strong>Total Cheque Amount:</strong></td>
			<td width="100" align="left"><strong>'.$total_cheque.'</strong></td>
		</tr></table><br></div><br>';
?>