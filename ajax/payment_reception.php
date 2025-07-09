<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	$created_id = $_SESSION['username'];
	$orderno = $_POST['orderno'];
	$gid = $_POST['gid'];
	$gross = $_POST['gross'];
	$service = $_POST['service'];
	$discount = $_POST['discount'];
	$head = $_POST['head'];
	$discount_details = $_POST['discount_details'];
	$taxid = $_POST['taxid'];
	$rec_amount = $_POST['rec_amount'];
	$p_mode = $_POST['p_mode'];
	$chequeno = $_POST['chequeno'];
	$card_no = $_POST['cardno'];
	$bank = $_POST['bank'];
	$all = ($gross*$discount)/100;
	$total = $gross - $all;
	
	if($p_mode == "C")
	{
	  	$que = "UPDATE order_master_tab SET TOTAL_CHARGES = '$gross', TOTAL_DISCOUNT = '$all', TAX_ID = '$taxid', TOTAL_SERV_CHARGES = '$service', PAYMENT_MODE = '$p_mode', PAYMENT_FLAG = 'C', PAYMENT_REC = '$total', DIRECTOR_ID = '$head', DISCOUNT_DETAIL = '$discount_details' WHERE ORDER_NO = '$orderno'";
		mysql_query($que) or die ('Update failed!'.mysql_error());
	}
	else if($p_mode == "Q")
	{
	  	$que = "UPDATE order_master_tab SET TOTAL_CHARGES = '$gross', TOTAL_DISCOUNT = '$all', TAX_ID = '$taxid', TOTAL_SERV_CHARGES = '$service', PAYMENT_MODE = '$p_mode', PAYMENT_FLAG = 'P', PAYMENT_REC = '$total', CHEQUE_NO = '$chequeno', BANK = '$bank', DIRECTOR_ID = '$head', DISCOUNT_DETAIL = '$discount_details' WHERE ORDER_NO = '$orderno'";
		mysql_query($que) or die ('Update failed!'.mysql_error());
	}
	else
	{
	  	$que = "UPDATE order_master_tab SET TOTAL_CHARGES = '$gross', TOTAL_DISCOUNT = '$all', TAX_ID = '$taxid', TOTAL_SERV_CHARGES = '$service', PAYMENT_MODE = '$p_mode', PAYMENT_FLAG = 'C', PAYMENT_REC = '$total', CREDIT_CARD_NO = '$card_no', DIRECTOR_ID = '$head', DISCOUNT_DETAIL = '$discount_details' WHERE ORDER_NO = '$orderno'";
		mysql_query($que) or die ('Update failed!'.mysql_error());
	}
	
	/* ##########  Updating Guest Master Table  #########*/
	
	$que = "UPDATE guest_master_tab SET TOTAL_VISITS = TOTAL_VISITS + 1, LAST_VISIT_REST_ID = '$restid', LAST_VISIT_DATE = '$current_date', LAST_VISIT_TIME = '$current_time' WHERE GUEST_ID  = '$gid'";
	mysql_query($que) or die ('Update failed!'.mysql_error());
	
	
	echo '<a class="style1" style="font-size:16px;" href="http://www.wiitechmill.com/dev/royalpalace/accounts/receipt.php?gid='.$gid.'&on='.$orderno.'&dis='.$all.'">Print Bill</a>';
	
	
?>