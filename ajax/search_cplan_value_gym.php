<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$type = $_POST['type'];
if ($type == "id") {
?>
	<input type="text" id="pid" />
<?php
} else if ($type == "name") {
?>
	<select id="pid" name="charge_type">
		<option value="">Select Type</option>
		<?php
		$query1 = "SELECT * FROM gym_charges_type_tab";
		$result1 = mysqli_query($conn, $query1) or die('Not Found:' . mysqli_error($conn));
		$num1 = mysqli_num_rows($result1);
		$i1 = 0;
		while ($i1 < $num1) {
			mysqli_data_seek($result1, $i1);
			$row = mysqli_fetch_assoc($result1);
			$memid = $row["CHARGES_TYPE_ID"];
			$mem_detail = $row["CHARGES_TITLE"];
			echo '<option value="' . $memid . '">' . $mem_detail . '</option>';
			$i1++;
		}
		?>
	</select>

<?php
}
?>