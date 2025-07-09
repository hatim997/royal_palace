<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php


$query = "UPDATE order_master_tab SET ORDER_SERIAL = max(ORDER_SERIAL) + 1 
			WHERE SWITCH = 'S' 
			OR SWITCH = '' 
			ORDER BY ORDER_NO ASC";
mysql_query($query) or die('Insertion Failed:'.mysql_error());
echo "Updated Successfully";
?>