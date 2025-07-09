<?php
session_start();
include('config.php');
include('time_settings.php');

$acc_date_time = date("Y-m-d H:i:s", mktime(date("H")+10, date("i"), date("s"), date("m"), date("d"), date("Y")));

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$firm = isset($_SESSION['firm']) ? $_SESSION['firm'] : '';
$logout_redirect_url = "index.php";

if ($username) {
    // 1. Update login_tab
    $stmt1 = mysqli_prepare($conn, "UPDATE login_tab SET RECORD_STATUS = 'logout', LAST_ACTIVITY = ? WHERE USER_ID = ?");
    mysqli_stmt_bind_param($stmt1, "ss", $acc_date_time, $username);
    mysqli_stmt_execute($stmt1);

    // 2. Update logfile_tab
    $stmt2 = mysqli_prepare($conn, "UPDATE logfile_tab SET LOGOUT_DATE = ?, LOGOUT_TIME = ? 
                                    WHERE USER_ID = ? 
                                    AND LOGOUT_DATE = '0000-00-00' 
                                    AND LOGOUT_TIME = '00:00:00'");
    mysqli_stmt_bind_param($stmt2, "sss", $current_date, $current_time, $username);
    mysqli_stmt_execute($stmt2);
}

// Destroy session
session_destroy();

// Redirect to login page
header("Location: $logout_redirect_url");
exit();
?>
