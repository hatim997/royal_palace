
<?php
include('../config.php');
include('../time_settings.php');
//$userid = $_SESSION['username'];
//$password = $_SESSION['password'];
//var_dump($_POST);
	//echo $time_from;
?>
 
 
 
  <?php
$query6 = "SELECT MAX(CR_NO) AS max_cr_no FROM payment_serial";
$ans6 = mysqli_query($conn, $query6) or die("Query Failed: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($ans6);
echo ($row['max_cr_no'] ?? 0) + 1;
?>

