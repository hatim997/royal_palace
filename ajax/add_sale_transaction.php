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
$sale_date = $_POST['sale_date'];
$sale_type = $_POST['sale_type'];
$amount = $_POST['amount'];
$detail = $_POST['detail'];

$query1 = "SELECT max(SALE_ID) as max_sale_id FROM sale_transaction_tab";
$result1 = mysqli_query($conn, $query1) or die("Query Failed: " . mysqli_error($conn));

$row = mysqli_fetch_assoc($result1);
$sale_id = $row['max_sale_id'] + 1;

$query = "INSERT INTO sale_transaction_tab (REST_ID, SALE_ID, SALE_TYPE_ID, SALE_AMOUNT, SALE_DATE, SALE_DETAIL, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
          VALUES ('$rest_id', '$sale_id', '$sale_type', '$amount', '$sale_date', '$detail', '$created_id', '$date_time', '$created_id', '$date_time')";
mysqli_query($conn, $query) or die('Sale Insertion Failed: ' . mysqli_error($conn));

echo 'Hello Umer';

?>