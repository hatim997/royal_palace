<?php

$date = date('Y-m-d H:i:s');
$datetime = date("M j,Y", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
$check_time = date("H:i:s", mktime(date("H")+11, date("i")-5, date("s"), 0, 0, 0));
$current_time = date("H:i:s", mktime(date("H")+11, date("i"), date("s"), 0, 0, 0));
$current_date = date("Y-m-d", mktime(date("H")+11, 0, 0, date("m"), date("d"), date("Y")));
$date_time = date("Y-m-d H:i:s", mktime(date("H")+11, date("i"), date("s"), date("m"), date("d"), date("Y")));

$today1 = date("M j,Y H:i:s", mktime(date("H")+11, date("i"), date("s"), date("m"), date("d"), date("Y")));
$today = date("F j, Y H:i:s", mktime(date("H")+11, date("i"), date("s"), date("m"), date("d"), date("Y")));
$todayy = date("F j, Y", mktime(date("m"), date("d"), date("Y")));
$day = date("l", mktime(date("H")+11, date("i"), date("s"), date("m"), date("d"), date("Y")));

	echo $date."<br>";
echo $datetime."<br>";
echo $check_time."<br>";
echo $current_time."<br>";
$current_time = strtotime($current_time);
$check_time   = strtotime($check_time);
	$cur = ($current_time - $check_time);
echo $cur."<br>"; 
echo $current_date."<br>";
	echo $date_time."<br>";
	$final = ($date_time-$date);
	echo $final."<br>";
	$a = "5";
	$b = "22";
	$x = ($b-$a);
	echo $x."<br>";
	
echo $today1."<br>";
echo $today."<br>";
echo $todayy."<br>";
echo $day."<br>";
	echo $date."<br>";
	
	$lastWeek = new DateTime('last thursday');
$now = new DateTime();
$xyz = var_dump($now->diff($lastWeek, true));
echo $xyz;
	
	
//echo $datetime."&nbsp;&nbsp;&nbsp;&nbsp;".$current_time;

//

?>