<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$created_id = $_SESSION['username'];
$rest_id = $_SESSION['restid'];

$main = $_POST['main'];
$control = $_POST['control'];
$scat1 = $_POST['scat1'];
$scat_code = $_POST['scat2_code'];
$scat_title = strtoupper(strtolower($_POST['scat2_title']));
$opening = $_POST['opening'];

$code = $main . $control . $scat1 . $scat_code;
//echo $code3."<br><br>";
$query = "SELECT * FROM scat2_acct_tab WHERE MAIN_ACCT_CODE = '$main' AND CTRL_ACCT_CODE = '$control' 
          AND SCAT1_ACCT_CODE = '$scat1' AND SCAT2_ACCT_CODE = '$scat_code'";
$result = mysqli_query($conn, $query) or die('Query Failed: ' . mysqli_error($conn));
$num = mysqli_num_rows($result);

if ($num == 0) {
    $query = "INSERT INTO scat2_acct_tab 
              VALUES('$rest_id','$main','$control','$scat1','$scat_code','$scat_title','','','','$created_id','$date_time','$created_id','$date_time')";
    mysqli_query($conn, $query) or die('Master Insertion Failed: ' . mysqli_error($conn));

    $query = "INSERT INTO voucher_transaction 
              (VOUCHER_ID, TRANSACTION_ID, VOUCHER_DATE, ACCOUNT_CODE, ACCOUNT_TITLE, TRN_AMOUNT, RECORD_FLAG, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
              VALUES('XX', 'XX', '$current_date', '$code', '$scat_title', '$opening', 'O', '$created_id', '$created_on', '$edited_id', '$edited_on')";
    mysqli_query($conn, $query) or die("Failed: " . mysqli_error($conn));

    echo '<h4 class="style9">Sub Category 2 Defined Successfully</h4><br><br>';
} else {
    echo '<h4 class="style9">Sub Category 2 Code ' . $scat_code . ' already exists</h4><br><br>';
}

?>