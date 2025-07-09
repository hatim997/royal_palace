<?php
include('config.php');

$q1 = "SELECT MAX(DEMAND_NO) AS max_demand FROM restaurant_demand";
$r1 = mysqli_query($conn, $q1) or die("query failed");
$i = 0;
mysqli_data_seek($r1, $i);
$row1 = mysqli_fetch_assoc($r1);
$max = $row1['max_demand'];

$q = "SELECT DISTINCT DEMAND_NO FROM restaurant_demand WHERE READ_FLAG = '0'";
$r = mysqli_query($conn, $q) or die("query failed");

while ($ans = mysqli_fetch_assoc($r)) {
	if ($ans['DEMAND_NO'] < $max) {
		echo "DEMAND NO " . $ans['DEMAND_NO'] . " has been updated. For details, see "; ?>
		<a href="view_reqs.php">Requisitions</a><br><br>
	<?php
	}
	if ($ans['DEMAND_NO'] >= $max) {
		echo "NEW DEMAND: NO " . $ans['DEMAND_NO'] . " has been generated. For details, see "; ?>
		<a href="view_reqs.php">Requisitions</a><br><br>
<?php
	}
}
?>
