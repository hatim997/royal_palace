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
	$total_expense = 0;
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
	
	echo '<table width="870" align="center" border="0" cellpadding="0" cellspacing="0">
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
		<td width="300" align="left">rpt_expense_history.php</td>
	</tr></table><br>';
	
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:890px">
			<table width="870" border="1" cellpadding="0" cellspacing="0" align="center">
			  <thead>
			  <tr>
				  <td width="70" align="center"><strong>Transaction ID</strong></td>
				  <td width="70" align="center"><strong>Voucher No</strong></td>
				  <td width="180" align="center"><strong>Expense Type</strong></td>
				  <td width="180" align="center"><strong>Expense Item</strong></td>
				  <td width="90" align="center"><strong>Expense Date</strong></td>
				  <td width="100" align="center"><strong>Amount</strong></td>
				  <td width="180" align="center"><strong>Expense Pocket</strong></td>
			  </tr>
			  </thead>';
	$query = "SELECT expense_transaction_tab.TRANSACTION_ID, expense_transaction_tab.VOUCHER_ID, expense_transaction_tab.AMOUNT, 
					expense_transaction_tab.EXPENSE_DATE, expense_transaction_tab.PAYMENT_TYPE, 
					expense_type_tab.EXPENSE_TYPE_NAME, 
					expense_item_tab.EXPENSE_ITEM_NAME, 
					directors_tab.DIRECTOR_NAME 
					FROM expense_transaction_tab, expense_type_tab, expense_item_tab, directors_tab 
					WHERE expense_transaction_tab.EXPENSE_TYPE_ID = expense_type_tab.EXPENSE_TYPE_ID 
					AND expense_transaction_tab.EXPENSE_ITEM_ID = expense_item_tab.EXPENSE_ITEM_ID 
					AND expense_transaction_tab.DIRECTOR_ID = directors_tab.DIRECTOR_ID 
					AND expense_transaction_tab.EXPENSE_DATE >= '$from' 
					AND expense_transaction_tab.EXPENSE_DATE <= '$to'
					ORDER BY expense_transaction_tab.EXPENSE_DATE, expense_transaction_tab.TRANSACTION_ID ASC";
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		$tran_id = mysql_result($result1,$i, "expense_transaction_tab.TRANSACTION_ID" );
		$voucher = mysql_result($result1,$i, "expense_transaction_tab.VOUCHER_ID" );
		$amount = mysql_result($result1,$i, "expense_transaction_tab.AMOUNT" );
		$edate = mysql_result($result1,$i, "expense_transaction_tab.EXPENSE_DATE" );
		$pflag = mysql_result($result1,$i, "expense_transaction_tab.PAYMENT_TYPE" );
		$e_type = mysql_result($result1,$i, "expense_type_tab.EXPENSE_TYPE_NAME" );
		$item = mysql_result($result1,$i, "expense_item_tab.EXPENSE_ITEM_NAME" );
		$e_pocket = mysql_result($result1,$i, "directors_tab.DIRECTOR_NAME" );
		
		if($pflag == "C")
		{
			$total_cash = $total_cash + $amount;
		}
		else
		{
			$total_cheque = $total_cheque + $amount;
		}
		$total_expense = $total_expense + $amount;
	echo '<tr>
		  <td width="70" align="left">&nbsp;'.$tran_id.'</td>
		  <td width="70" align="left">&nbsp;'.$voucher.'</td>
		  <td width="180" align="left">&nbsp;'.$e_type.'</td>
		  <td width="180" align="left">&nbsp;'.$item.'</td>
		  <td width="90" align="left">'.$edate.'</td>
		  <td width="100" align="left">'.$amount.'</td>
		  <td width="180" align="left">'.$e_pocket.'</td>
		</tr>';
		$i++;
	} // while ends here
		
		echo '</table>
		<table width="770" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			  <td width="70" align="left">&nbsp;</td>
			  <td width="70" align="left">&nbsp;</td>
			  <td width="180" align="left">&nbsp;</td>
			  <td width="180" align="left">&nbsp;</td>
			  <td width="90" align="left">&nbsp;</td>
			  <td width="100" align="center">Total =&nbsp;'.$total_expense.'</td>
			  <td width="180" align="left">&nbsp;</td>
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