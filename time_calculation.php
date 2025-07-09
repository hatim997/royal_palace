<?php

$date = date('Y-m-d H:i:s');
$datetime = date("M j,Y", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
$check_time = date("H:i:s", mktime(date("H") + 11, date("i") - 5, date("s"), 0, 0, 0));
$current_time = date("H:i:s", mktime(date("H") + 11, date("i"), date("s"), 0, 0, 0));
$current_date = date("Y-m-d", mktime(date("H") + 11, 0, 0, date("m"), date("d"), date("Y")));
$date_time = date("Y-m-d H:i:s", mktime(date("H") + 11, date("i"), date("s"), date("m"), date("d") + 2, date("Y")));

$acc_date_time = date("Y-m-d H:i:s", mktime(date("H") + 10, date("i"), date("s"), date("m"), date("d"), date("Y")));

$today1 = date("M j,Y H:i:s", mktime(date("H") + 11, date("i"), date("s"), date("m"), date("d"), date("Y")));
$today = date("F j, Y H:i:s", mktime(date("H") + 11, date("i"), date("s"), date("m"), date("d"), date("Y")));
$todayy = date("F j, Y", mktime(date("m"), date("d"), date("Y")));
$day = date("l", mktime(date("H") + 11, date("i"), date("s"), date("m"), date("d"), date("Y")));


$date1 = strtotime($date);
$date_time1 = strtotime($date_time);
$time_dif = ($date_time1 - $date1);

echo $date . "<br>";
echo $date_time . "<br>";
echo $acc_date_time . "<br>"; // Accurate current date and time
echo $time_dif . "<br>";


//	echo $check_time."<br>";
//	echo $current_time."<br>";
//	echo $current_date."<br>";
//	echo $date_time."<br>";
//
//	echo $today1."<br>";
//	echo $today."<br>";
//	echo $todayy."<br>";
//	echo $day."<br>";

$a = "5";
$b = "22";
$x = ($b - $a);
//	echo $x."<br>";

// =================

//echo $datetime."&nbsp;&nbsp;&nbsp;&nbsp;".$current_time;

//
