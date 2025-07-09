<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	
	/*echo 'Hello Umer';
	
	$query = "UPDATE expense_closing_tab SET LAST_EXPENSE_CLOSING_DATE = '2012-08-31'";
	mysql_query($query) or die('Updation Failed:'.mysql_error());
	*/
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	$voucher = $_POST['voucher'];
	$expense_type = $_POST['expense_type'];
	$item_type = $_POST['item_type'];
	$amount = $_POST['amount'];
	$amount_type = $_POST['amount_type'];
	$date = $_POST['date'];
	$detail = $_POST['detail'];
	$pay_mode = $_POST['pay_mode'];
	$bank = $_POST['bank'];
	$account_no = $_POST['account_no'];
	$director = $_POST['director'];
	
	$query1 = "SELECT max(TRANSACTION_ID) FROM expense_transaction_tab";
	$result1 = mysql_query($query1);
	$num1 = mysql_numrows($result1);
	$i = 0;
	while($i < $num1)
	{
		$transaction_id = mysql_result($result1,$i, "max(TRANSACTION_ID)" );
		$i++;
	}
	$transaction_id++;
	
	if($pay_mode == "C")
	{
		$query = "INSERT INTO expense_transaction_tab(REST_ID, TRANSACTION_ID, VOUCHER_ID, EXPENSE_TYPE_ID, EXPENSE_ITEM_ID, EXPENSE_TYPE_FLAG, AMOUNT, AMOUNT_TYPE, EXPENSE_DATE, EXPENSE_DETAIL, PAYMENT_TYPE, DIRECTOR_ID, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) VALUES('$rest_id','$transaction_id','$voucher','$expense_type','$item_type','E','$amount','$amount_type','$date','$detail','$pay_mode','$director','$created_id','$date_time','$created_id','$date_time')";
		mysql_query($query) or die('Transaction Insertion Cash Failed:'.mysql_error());
	}
	else
	{
		$query = "INSERT INTO expense_transaction_tab(REST_ID, TRANSACTION_ID, VOUCHER_ID, EXPENSE_TYPE_ID, EXPENSE_ITEM_ID, EXPENSE_TYPE_FLAG, AMOUNT, AMOUNT_TYPE, EXPENSE_DATE, EXPENSE_DETAIL, PAYMENT_TYPE, BANK, ACCOUNT_NO, DIRECTOR_ID, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) VALUES('$rest_id','$transaction_id','$voucher','$expense_type','$item_type','E','$amount','$amount_type','$date','$detail','$pay_mode','$bank','$account_no','$director','$created_id','$date_time','$created_id','$date_time')";
		mysql_query($query) or die('Transaction Insertion Bank Failed:'.mysql_error());
	}
?>