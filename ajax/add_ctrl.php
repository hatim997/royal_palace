<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	
	$main = $_POST['main'];
	$ctrl_assets_code = $_POST['ctrl_code'];
	$ctrl_assets_tittle = strtoupper(strtolower($_POST['ctrl_title']));
	
	$query = "SELECT * FROM ctrl_acct_tab WHERE MAIN_ACCT_CODE = '$main' AND CTRL_ACCT_CODE = '$ctrl_assets_code'";
	$result = mysqli_query($conn, $query);
	$num = mysqli_num_rows($result);
	if($num == 0)
	{
		$query = "INSERT INTO ctrl_acct_tab VALUES('$rest_id','$main','$ctrl_assets_code','$ctrl_assets_tittle','','','','$created_id','$date_time','$created_id','$date_time')";
		mysqli_query($conn, $query) or die('Master Insertion Failed:'.mysqli_error($conn));
		
		echo '<h4 class="style9">Control Defined Successfully</h4><br><br>';
	}
	else
	{
		echo '<h4 class="style9">Control Code '.$ctrl_assets_code.' already exists</h4><br><br>';
	}
?>
