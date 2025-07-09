<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config.php');
include('time_settings.php');

$firm = isset($_SESSION['firm']) ? $_SESSION['firm'] : null;
$usename = $_SESSION['username'];

$update = "UPDATE login_tab SET LAST_ACTIVITY = '$current_time' WHERE USER_ID = '$usename'";
mysqli_query($conn, $update) or die('Query failed! ' . mysqli_error($conn));
?>
