<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
$kit_id = $_SESSION['kitid'];
//$gross = ($total_guest)*999;
$gross_new = ($total_guest)*999;
$orderno = $_POST['orderno'];
$other_charges = $_POST['other_charges'];
$total_gross =($other_charges + $total_amount);
$gross = $total_gross;

?>
<?php

	
	$created_id = $_SESSION['username'];
	$orderno = $_POST['orderno'];									
	$other_charges = $_POST['other_charges'];
	$gross = $_POST['gross'];
	
	$total_amount = $other_charges + $gross;
							
	$query = "UPDATE order_master_tab SET PAYMENT_FLAG = 'O', TOTAL_CHARGES = '$total_amount', PAYMENT_REC = '$total_amount', EDITED_ID = '$created_id', EDITED_ON = '$date_time' WHERE ORDER_NO = '$orderno'";
	mysql_query($query) or die('Insertion Failed:'.mysql_error());

	echo '<a class="style1" style="font-size:16px;" href="http://www.wiitechmill.com/dev/royalpalace/accounts/receipt1.php?gid=1&on='.$orderno.'">Print Bill</a>';

?>