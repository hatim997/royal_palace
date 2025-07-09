<?php
include('../config.php');
//$booking_date = $_POST['booking_date'];
$hall = $_POST['hall'];
$function_date = $_POST['function_date'];
$function_time = $_POST['function_time'];
if($function_time=='lunch')
{
$time_from = '12:00:00';
$time_to = '17:00:00';
}
else
{
$time_from = '18:00:00';
$time_to = '23:00:00';	
}

$query2 = "SELECT BANQ_ID, FUNCTION_DATE, TIME_FROM, TIME_TO FROM banq_order_master
			WHERE BANQ_ID='$hall'
			AND FUNCTION_DATE='$function_date'
			AND TIME_FROM='$time_from'
			AND TIME_TO='$time_to'";
$result2 = mysql_query($query2) or die('Query Failed');
$record = mysql_num_rows($result2);
if($record == 0)
{
	echo "HA";
}
else
{
echo "HNA";
}
?>