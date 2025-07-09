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
	
	echo '<table width="690" align="center" border="0" cellpadding="0" cellspacing="0">
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
		<td width="100" align="left"><strong>Date:</strong></td>
		<td width="240" align="left">'.$today.'</td>
	</tr>
	<tr>
		<td width="120" align="left"><strong>Report ID:</strong></td>
		<td width="300" align="left">rpt_expense.php</td>
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
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:720px">
			<table width="690" border="1" cellpadding="0" cellspacing="0" align="center">
			  <thead>
			  <tr>
				  <td width="50" align="center"><strong>Serial No</strong></td>
				  <td width="90" align="center"><strong>Day</strong></td>
				  <td width="90" align="center"><strong>Date</strong></td>
				  <td width="70" align="center"><strong>No Of Transactions</strong></td>
				  <td width="70" align="center"><strong>Amount</strong></td>
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
	$d = 0;
	while($from < $to)
	{
		//$check_date = 
		$total_transaction = 0;
		$total_expense = 0;
		$total_serv = 0;
		$from = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$show_date = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$day = date("l", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$start = $from."&nbsp;00:00:00";
		$end = $from."&nbsp;23:59:59";
		$query = "SELECT * FROM expense_transaction_tab WHERE EXPENSE_DATE = '$from' ORDER BY TRANSACTION_ID ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$j = $d +1;
		$i=0;
		while($i < $num)
		{
			$amount = mysql_result($result1,$i, "AMOUNT" );
			$pflag = mysql_result($result1,$i, "PAYMENT_TYPE" );
			$total_transaction++;
			
			if($pflag == "C")
			{
				$total_cash = $total_cash + $amount;
			}
			else
			{
				$total_cheque = $total_cheque + $amount;
			}
			$total_expense = $total_expense + $amount;
			$i++;
		} // while ends here
		echo '<tr>
			  <td width="50" align="left">&nbsp;'.$j.'</td>
			  <td width="90" align="left">&nbsp;'.$day.'</td>
			  <td width="90" align="left">&nbsp;'.$from.'</td>
			  <td width="70" align="left">&nbsp;'.$total_transaction.'</td>
			  <td width="70" align="left">&nbsp;'.$total_expense.'</td>
			  <!--
			  <td width="80" align="left">&nbsp;'.$total_serv.'</td>
			  <td width="80" align="left">&nbsp;'.$total_tax.'</td>
			  <td width="80" align="left">'.$total_discount.'</td>
			  <td width="120" align="left">'.$complementary.'</td>
			  <td width="80" align="left">0</td>
			  <td width="80" align="left">'.$net_rec.'</td>
			  -->
			</tr>';
			$gtotal_expense = $gtotal_expense + $total_expense;
			$d++;
	}
	$a++;
}
		
		echo '</table>
		<table width="690" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			  <td width="50" align="left">&nbsp;</td>
			  <td width="90" align="left">&nbsp;</td>
			  <td width="90" align="left">&nbsp;</td>
			  <td width="70" align="left">&nbsp;</td>
			  <td width="70" align="center">Total =&nbsp;'.$gtotal_expense.'</td>
			</tr>
			</table><br><br>';
			
		echo '<table width="300" align="right" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="200" align="left"><strong>Total Cash Amount:</strong></td>
			<td width="100" align="left"><strong>'.$total_cash.'</strong></td>
		</tr>
		<tr>
			<td width="200" align="left"><strong>Total Bank Amount:</strong></td>
			<td width="100" align="left"><strong>'.$total_cheque.'</strong></td>
		</tr></table><br></div><br>';
?>