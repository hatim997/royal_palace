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
	$scat_code = $_POST['scat_code'];
	$scat_title = strtoupper(strtolower($_POST['scat_title']));
	
	$query = "SELECT * FROM scat1_acct_tab WHERE MAIN_ACCT_CODE = '$main' AND CTRL_ACCT_CODE = '$control' AND SCAT1_ACCT_CODE = '$scat_code'";
	$result = mysql_query($query);
	$num = mysql_numrows($result);
	if($num == 0)
	{	
		$query = "INSERT INTO scat1_acct_tab VALUES('$rest_id','$main','$control','$scat_code','$scat_title','','','','$created_id','$date_time','$created_id','$date_time')";
		mysql_query($query) or die('Master Insertion Failed:'.mysql_error());
		
		echo '<h4 class="style9">Sub Category 1 Defined Successfully</h4><br><br>';
	}
	else
	{
		echo '<h4 class="style9">Sub Category 1 Code '.$scat_code.' already exists</h4><br><br>';
	}
	
?>