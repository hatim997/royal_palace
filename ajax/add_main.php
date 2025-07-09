<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$created_id = $_SESSION['username'];
$rest_id = $_SESSION['restid'];

$assets_code = $_POST['main_code'];
$assets_title = strtoupper(strtolower($_POST['main_title']));

$query = "SELECT * FROM main_acct_tab WHERE MAIN_ACCT_CODE = '$assets_code'";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
if ($num == 0) {
	$query = "INSERT INTO main_acct_tab VALUES('$rest_id','$assets_code','$assets_title','','','','$created_id','$date_time','$created_id','$date_time')";
	mysqli_query($conn, $query) or die('Master Insertion Failed:' . mysqli_error($conn));

	echo '<h4 class="style9">Main Successfully Added</h4><br><br>';
} else {
	echo '<h4 class="style9">Main Code ' . $assets_code . ' already exists</h4><br><br>';
}

?>