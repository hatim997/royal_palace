<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<!-- Javascript goes in the document HEAD -->



<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable tr:nth-child(odd){    background-color: #a7dbf0; }
</style>

<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$voucher_id = $_POST['voucherid'];
	$voucher_date = $_POST['voucher_date'];
	//echo "ID is ".$transactionid;
	$query = "DELETE from voucher_transaction where VOUCHER_ID = '$voucher_id' AND VOUCHER_DATE = '$voucher_date'";
	mysql_query($query) or die("Delete Failed: ".mysql_error());
	
	$query =  "UPDATE voucher_master SET RECORD_FLAG = 'D' WHERE VOUCHER_ID = '$voucher_id' AND CREATED_ON LIKE '$voucher_date%'";
	mysql_query($query) or die("Failed 1: ".mysql_error());
	
	echo '<h2>Vouchers Canceled.</h2>';
?>