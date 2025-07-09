<?php
include('../config.php');

$sql1 = "SELECT max(DEMAND_NO) FROM restaurant_demand";
$result1 = mysql_query($sql1)or die("error".mysql_error());

 while($row=mysql_fetch_array($result1))
  {
 
  echo $row['max(DEMAND_NO)']+1;
   } 
?>