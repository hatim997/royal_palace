<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$orderno = $_POST['orderno'];
	
	$query = "UPDATE order_master_tab SET PAYMENT_FLAG = 'O', EDITED_ID = '$created_id', EDITED_ON = '$date_time' WHERE ORDER_NO = '$orderno'";
	mysql_query($query) or die('Insertion Failed:'.mysql_error());
	
	echo '<h1 class="style1" style=" font-size:16px;">Your Order No is '.$orderno.'.</h1>';	
?>