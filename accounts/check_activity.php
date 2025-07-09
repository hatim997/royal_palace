<?php
session_start();
include('config.php');
include('time_settings.php');
//echo $username;

$query1 = "SELECT * FROM login_tab WHERE RECORD_STATUS = 'logedin'";
$result1 = mysql_query($query1);
$num1 = mysql_num_rows($result1);
$i = 0;
while($i < $num1)
{
	$id = mysql_result($result1,$i, "USER_ID" );
	$last_time = mysql_result($result1,$i, "LAST_ACTIVITY" );
	/*
	$c_time = explode(":", $current_time);
	$l_time = explode(":", $last_time);
	for($i = 0; $i <= 2; $i++)
	{
		$sub[$i] = $c_time[$i] - $l_time[$i];
	}
	$diff = $sub[0].":".$sub[1];
	$diff_hour = $sub[0];
	$diff_min = $sub[1];
	$diff_sec = $sub[2];
	*/
	if($check_time >= $last_time)
	{
		$update = "UPDATE login_tab SET RECORD_STATUS = 'logout' WHERE USER_ID = '$id'";
			
		mysql_query($update) or die ('Query failed!'.mysql_error());
		
		$update = "UPDATE logfile_tab SET LOGOUT_DATE = '$current_date',LOGOUT_TIME = '$current_time' 
					WHERE USER_ID like '$id' 
					AND LOGOUT_DATE = '0000-00-00' 
					AND LOGOUT_TIME = '00:00:00'";
		mysql_query($update) or die ('Query failed!'.mysql_error());
	}
	else
	{
		//echo "outer else executed<br>";
		//echo $diff;
		//echo $current_time."<br>";
		$update = "UPDATE login_tab SET LAST_ACTIVITY = '$current_time' WHERE USER_ID like '$id'";
		
		mysql_query($update) or die ('Query failed!'.mysql_error());
	}
		
	$i++;
} // whiile ends here
?>