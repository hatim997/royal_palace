<?php
session_start();
include('config.php');
include('time_settings.php');
$username = $_SESSION['username'];
$firm = $_SESSION['firm'];
$logout_redirect_url = "index.php";
//echo $username;
/*
mysql_connect("localhost", "witechmi_sqkhan", "sqkhan99") 
 or die('Connection to database failed: ' . mysql_error());
mysql_select_db("witechmi_dtox") or die ('select_db failed!');
*/
$update = "UPDATE login_tab SET RECORD_STATUS = 'logout' WHERE USER_ID like '$username'";

mysql_query($update) or die ('Query failed!'.mysql_error());

$update = "UPDATE logfile_tab SET LOGOUT_DATE = '$current_date',LOGOUT_TIME = '$current_time' 
			WHERE USER_ID like '$username' 
			AND LOGOUT_DATE = '0000-00-00' 
			AND LOGOUT_TIME = '00:00:00'";
mysql_query($update) or die ('Query failed!'.mysql_error());
/*echo '<script language="javascript">alert("You are Successfully Logged Out.")</script>';*/
session_destroy();
/*echo '<script language="javascript">alert("You are Successfully Logged Out.")</script>';*/
header("Location: $logout_redirect_url");
?>
