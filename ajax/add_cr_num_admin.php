
<?php
include('../config.php');
include('../time_settings.php');
//$userid = $_SESSION['username'];
//$password = $_SESSION['password'];
//var_dump($_POST);
//echo $time_from;
?>
 
 
 
<?php
$query6 = "SELECT max(CR_NO) FROM payment_serial_admin";
$ans6 = mysqli_query($conn, $query6) or die("Query Failed");
while ($q = mysqli_fetch_array($ans6)) {
  echo $q['max(CR_NO)'] + 1;
}
?>
