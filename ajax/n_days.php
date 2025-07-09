
<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$check_out = $_POST['check_out'];
$l_date = $_POST['l_date'];

//increment 2 days
$date1 = strtotime($check_out);
$date2 = strtotime($l_date);
echo ($date1-$date2)/86400;

	?>

