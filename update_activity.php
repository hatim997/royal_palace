<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('config.php'); // Make sure it sets $conn = mysqli_connect(...)
include('time_settings.php');

$firm = isset($_SESSION['firm']) ? $_SESSION['firm'] : null;
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

// if (!$username) {
//     die("Session data missing. Please login again.");
// }

$update = "UPDATE login_tab SET LAST_ACTIVITY = '$acc_date_time' WHERE USER_ID = '$username'";
mysqli_query($conn, $update) or die('Query failed! ' . mysqli_error($conn));
