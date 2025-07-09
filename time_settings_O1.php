<?php

//$date = date('Y-m-d H:i:s');
//$datetime = date("M j,Y", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
$check_time = date("H:i:s", mktime(date("H")+11, date("i")-5, date("s"), 0, 0, 0));
$current_time = date("H:i:s", mktime(date("H")+11, date("i"), date("s"), 0, 0, 0));
$current_date = date("Y-m-d", mktime(date("H")+11, 0, 0, date("m"), date("d"), date("Y")));
$date_time = date("Y-m-d H:i:s", mktime(date("H")+11, date("i"), date("s"), date("m"), date("d"), date("Y")));

$today1 = date("M j,Y H:i:s", mktime(date("H")+11, date("i"), date("s"), date("m"), date("d"), date("Y")));
$today = date("F j, Y H:i:s", mktime(date("H")+11, date("i"), date("s"), date("m"), date("d"), date("Y")));
$day = date("l", mktime(date("H")+11, date("i"), date("s"), date("m"), date("d"), date("Y")));
//echo $datetime."&nbsp;&nbsp;&nbsp;&nbsp;".$current_time;

?>