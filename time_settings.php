<?php
// Set your timezone (e.g., Pakistan Standard Time)
date_default_timezone_set('Asia/Karachi');

// Current full timestamp
$date = date('Y-m-d H:i:s');

// Date in readable format
$datetime = date("M j, Y");

// Exact current time and date
$current_time = date("H:i:s");
$current_date = date("Y-m-d");
$acc_date_time = date("Y-m-d H:i:s");

// Future timestamp example (2 days ahead)
$date_time = date("Y-m-d H:i:s", strtotime("+2 days"));

// Alternate readable formats
$today1 = date("M j, Y H:i:s");
$today = date("F j, Y H:i:s");
$todayy = date("F j, Y");
$day = date("l");

// Compare future time with now
$date1 = strtotime($date);
$date_time1 = strtotime($date_time);
$time_dif = $date_time1 - $date1;

// Examples (for testing)
// echo $date . "<br>";
// echo $acc_date_time . "<br>";
// echo $current_date . " " . $current_time . "<br>";
// echo $day . "<br>";
