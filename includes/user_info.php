<?php
include('config.php');
$current_date = date('Y-m-d');


$query = "SELECT * FROM login_tab WHERE RECORD_STATUS = 'logedin'";
$result = mysql_query($query) or die("error: ". mysql_error());
$num = mysql_numrows($result);

echo "<p style='color: #7a4b1f;'>&nbsp;Connected Online Members: ".$num."</p>";

$query = "SELECT * FROM login_tab";
$result1 = mysql_query($query) or die("error: ". mysql_error());
$num1 = mysql_numrows($result1);

echo "<p style='color: #7a4b1f;'>&nbsp;Total Operating Persons: ".$num."</p>";

echo "<br><p style='color: #7a4b1f;'>&nbsp;Total Membership Holders: ".$num1."</p>";

$query = "SELECT * FROM user_tab ORDER BY CREATED_ON ASC";
$result = mysql_query($query) or die("error: ". mysql_error());
$num = mysql_numrows($result);

$num--;

$fid = mysql_result($result,$num,"FIRM_ID");
$name = mysql_result($result,$num,"USER_NAME");

$query = "SELECT * FROM firm_tab WHERE FIRM_ID = '$fid'";
$result = mysql_query($query) or die("error: ". mysql_error());
$num = mysql_numrows($result);
$i = 0;
while($i < $num)
{
	$city = mysql_result($result,$i,"FIRM_CITY");
	$i++;
}

echo "<br><p style='color: #7a4b1f;'>&nbsp;Welcome to our Newest Member: <i><b>&nbsp;".$name."</b></i><br>&nbsp;From: <i><b>&nbsp;".$city."</b></i></p>";

?>