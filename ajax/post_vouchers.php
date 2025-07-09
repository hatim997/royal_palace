<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$posting_date = $_POST['trn_date'];
	$last_date = $_POST['last_date'];
	//echo "ID is ".$transactionid;
	//echo $last_date."<br>".$posting_date;
	$query =  "UPDATE voucher_master SET RECORD_FLAG = 'P' WHERE CREATED_ON > '$last_date' AND CREATED_ON <= '$posting_date' 
				AND RECORD_FLAG = 'S'";
	mysql_query($query) or die("Failed 2: ".mysql_error());
	
	$query =  "UPDATE voucher_transaction SET RECORD_FLAG = 'P' WHERE TRN_DATE > '$last_date' AND TRN_DATE <= '$posting_date' 
				AND RECORD_FLAG = 'S'";
	mysql_query($query) or die("Failed 2: ".mysql_error());
	
	$query =  "UPDATE posting_master_tab SET LAST_POSTING_DATE = '$posting_date'";
	mysql_query($query) or die("Failed 2: ".mysql_error());
	
	echo '<h2>Vouchers Posted Successfully</h2>';
?>