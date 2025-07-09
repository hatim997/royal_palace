<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('config.php'); // Make sure it sets up the $conn = mysqli_connect(...)
include('time_settings.php');

// Assuming $conn is your mysqli connection
$query1 = "SELECT * FROM login_tab WHERE RECORD_STATUS = 'logedin'";
$result1 = mysqli_query($conn, $query1);

if (!$result1) {
    die('Query failed! ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result1)) {
    $id = $row['USER_ID'];
    $last_activity = $row['LAST_ACTIVITY'];

    $mlast_activity = strtotime($last_activity);
    $macc_date_time = strtotime($acc_date_time);
    $mactivity_differ = $macc_date_time - $mlast_activity;

    if ($mactivity_differ > 1300) {
        $update1 = "UPDATE login_tab SET RECORD_STATUS = 'logout' WHERE USER_ID = '$id'";
        mysqli_query($conn, $update1) or die('Query failed! ' . mysqli_error($conn));

        $update2 = "UPDATE logfile_tab 
                    SET LOGOUT_DATE = '$current_date', LOGOUT_TIME = '$current_time'
                    WHERE USER_ID = '$id' 
                    AND LOGOUT_DATE = '0000-00-00' 
                    AND LOGOUT_TIME = '00:00:00'";
        mysqli_query($conn, $update2) or die('Query failed! ' . mysqli_error($conn));
    }
}

echo "End of Check Activity Program <br>";
echo "Now login again<br>";
