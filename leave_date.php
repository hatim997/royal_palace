
<?php
include('../config.php');

?>
<?php

$check_in = $_POST['check_in'];
$n_day = $_POST['n_day'];

$date = $check_in;
//increment 2 days
$mod_date = strtotime($date . "+" . $n_day . "days");
echo date("Y-m-d", $mod_date);
?>

