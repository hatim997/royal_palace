<?php
session_start();
include('config.php');
include('time_settings.php');

$firm = $_SESSION['firm'];
$usename = $_SESSION['username'];

$update = "UPDATE login_tab SET RECORD_STATUS = 'logout' WHERE RECORD_STATUS != 'logout'";
mysqli_query($conn, $update) or die('Query failed! ' . mysqli_error($conn));

echo " Successfully Completed.. . . .";
?>
