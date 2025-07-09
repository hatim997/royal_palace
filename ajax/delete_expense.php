<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	//$restid = $_SESSION['restid'];
	$transaction_id = $_POST['transaction_id'];
	$query = "DELETE FROM expense_transaction_tab WHERE TRANSACTION_ID = '$transaction_id'";
	mysql_query($query) or die('Deletion Failed:'.mysql_error());
	$created_id = $_SESSION['username'];
	//$restid = $_SESSION['restid'];
	//echo "Rest ID is ".$restid;
	//$start = $from."00:00:00";
	//$end = $to."23:59:59";	
	$query = "SELECT * FROM expense_closing_tab";
	$result = mysql_query($query)or die("Failed :".mysql_error());
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$closing_date = mysql_result($result,$i, "LAST_EXPENSE_CLOSING_DATE");
		$i++;
	}
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
				  <td width="80" align="center"><strong>Delete</strong></td>
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
					AND expense_transaction_tab.EXPENSE_DATE > '$closing_date' 
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
		  <td width="80" align="center"><a href="javascript:delete_expense('.$tran_id.')" alt="Delete" title="Delete"><img src="images/delete.png" height="25" width="25" alt="Delete" /></a></td>
		</tr>';
		$i++;
	} // while ends here
		
		echo '</table>';
?>