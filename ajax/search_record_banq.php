<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$value = $_POST['pid'];
$type = $_POST['type'];
//echo $value.'<br><br>'.$type;
?>
<form name="form1" method="post" action="reception_book.php">
	<table width="1014" border="0">
		<?php
if ($type == "id") {

	$sql = "SELECT ORDER_NO, GUEST_NAME, CONTACT_NO, DIFFERENCE_AMOUNT, CNIC, grand_total, total_received, FUNCTION_DATE, BANQ_ID, TIME_FROM, TIME_TO
	FROM banq_order_master WHERE ORDER_NO='$value'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if ($count != "") {
?>

				<tr style="background-color:#CCC;">
					<th width="70">Select </th>
					<th width="138">Guest Name</th>
					<th width="138">CNIC</th>
					<th width="97">Contact No</th>
					<th width="101">Total Bill</th>
					<th width="127">Recieved Amount</th>
					<th width="107">Net Amount</th>
					<th width="95">Function Date</th>
					<th width="103">Booked Hall</th>
				</tr>



				<?php
while ($row = mysqli_fetch_array($result)) {  ?>


					<input name="banq_id" type="hidden" value="<?php echo $row['BANQ_ID']; ?>">
					<input name="time_from" type="hidden" value="<?php echo $row['TIME_FROM']; ?>">
					<input name="time_to" type="hidden" value="<?php echo $row['TIME_TO']; ?>">
					<input name="date" type="hidden" value="<?php echo $row['FUNCTION_DATE']; ?>">
					<?php

					echo "<tr>"; ?>
					<td><input name="radiobox[]" type="radio" value="<?php echo $row['ORDER_NO']; ?>"></td>
				<?php
					echo "<td>" . $row['GUEST_NAME'] . "</td>";
					echo "<td>" . $row['CNIC'] . "</td>";
					echo "<td>" . $row['CONTACT_NO'] . "</td>";
					echo "<td>" . $row['grand_total'] . "</td>";
					echo "<td>" . $row['total_received'] . "</td>";
					echo "<td>" . $row['DIFFERENCE_AMOUNT'] . "</td>";
					echo "<td>" . $row['FUNCTION_DATE'] . "</td>";
					$b_id = $row['BANQ_ID'];
					$sql1 = "SELECT BANQ_NAME FROM banq_master_tab WHERE BANQ_ID = $b_id";
$result1 = mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_array($result1)) {
	echo "<td>" . $row1['BANQ_NAME'] . "</td>";
}

					echo "</tr>";
				} ?>
				<tr>
					<td width="70" valign="top">
						<input name="view" type="submit" value="View" style="background: #CCC; font-size:14px; font-weight:500; border:groove; border-color:#CCC;">

					</td>
				</tr>
			<?php
			} else {
				echo "No such record exists";
			}
			?>
		<?php
		}
		?>
		<?php
if ($type == "name") {
	$sql = "SELECT ORDER_NO, GUEST_NAME, CONTACT_NO, DIFFERENCE_AMOUNT, CNIC, grand_total, total_received, FUNCTION_DATE, BANQ_ID, TIME_FROM, TIME_TO
	FROM banq_order_master WHERE GUEST_NAME='$value'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if ($count != "") {
?>

				<tr style="background-color:#CCC;">
					<th width="70">Select</th>
					<th width="138">Guest Name</th>
					<th width="138">CNIC</th>
					<th width="97">Contact No</th>
					<th width="101">Total Bill</th>
					<th width="127">Recieved Amount</th>
					<th width="107">Net Amount</th>
					<th width="95">Function Date</th>
					<th width="103">Booked Hall</th>

				</tr>



				<?php
while ($row = mysqli_fetch_array($result)) {  ?>

					<input name="banq_id" type="hidden" value="<?php echo $row['BANQ_ID']; ?>">
					<input name="time_from" type="hidden" value="<?php echo $row['TIME_FROM']; ?>">
					<input name="time_to" type="hidden" value="<?php echo $row['TIME_TO']; ?>">
					<input name="date" type="hidden" value="<?php echo $row['FUNCTION_DATE']; ?>">
					<?php

					echo "<tr>"; ?>
					<td><input name="radiobox[]" type="radio" value="<?php echo $row['ORDER_NO']; ?>"></td>
					<?php
					echo "<td>" . $row['GUEST_NAME'] . "</td>";
					echo "<td>" . $row['CNIC'] . "</td>";
					echo "<td>" . $row['CONTACT_NO'] . "</td>";
					echo "<td>" . $row['grand_total'] . "</td>";
					echo "<td>" . $row['total_received'] . "</td>";
					echo "<td>" . $row['DIFFERENCE_AMOUNT'] . "</td>";
					echo "<td>" . $row['FUNCTION_DATE'] . "</td>";
					$b_id = $row['BANQ_ID'];
					$sql1 = "SELECT BANQ_NAME FROM banq_master_tab WHERE BANQ_ID = $b_id";
$result1 = mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_array($result1)) {
	echo "<td>" . $row1['BANQ_NAME'] . "</td>";
}

					?>
					<td></td>

				<?php
					echo "</tr>";
				} ?>
				<tr>
					<td width="70" valign="top">
						<input name="view" type="submit" value="View" style="background: #CCC; font-size:14px; font-weight:500; border:groove; border-color:#CCC;">

					</td>
				</tr>

			<?php
			} else {
				echo "No such record exists";
			}
			?>

		<?php
		}
		?>
		<?php
		if ($type == "cnic") {
	$sql = "SELECT ORDER_NO, GUEST_NAME, CONTACT_NO, DIFFERENCE_AMOUNT, CNIC, grand_total, total_received, FUNCTION_DATE, BANQ_ID, TIME_FROM, TIME_TO
	FROM banq_order_master WHERE CNIC='$value'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if ($count != "") {
?>

				<tr style="background-color:#CCC;">
					<th width="70">Select</th>
					<th width="138">Guest Name</th>
					<th width="138">CNIC</th>
					<th width="97">Contact No</th>
					<th width="101">Total Bill</th>
					<th width="127">Recieved Amount</th>
					<th width="107">Net Amount</th>
					<th width="95">Function Date</th>
					<th width="103">Booked Hall</th>
				</tr>

				<?php
while ($row = mysqli_fetch_array($result)) {  ?>

					<input name="banq_id" type="hidden" value="<?php echo $row['BANQ_ID']; ?>">
					<input name="time_from" type="hidden" value="<?php echo $row['TIME_FROM']; ?>">
					<input name="time_to" type="hidden" value="<?php echo $row['TIME_TO']; ?>">
					<input name="date" type="hidden" value="<?php echo $row['FUNCTION_DATE']; ?>">
					<?php

					echo "<tr>"; ?>
					<td><input name="radiobox[]" type="radio" value="<?php echo $row['ORDER_NO']; ?>"></td>
					<?php
					echo "<td>" . $row['GUEST_NAME'] . "</td>";
					echo "<td>" . $row['CNIC'] . "</td>";
					echo "<td>" . $row['CONTACT_NO'] . "</td>";
					echo "<td>" . $row['grand_total'] . "</td>";
					echo "<td>" . $row['total_received'] . "</td>";
					echo "<td>" . $row['DIFFERENCE_AMOUNT'] . "</td>";
					echo "<td>" . $row['FUNCTION_DATE'] . "</td>";
					$b_id = $row['BANQ_ID'];
					$sql1 = "SELECT BANQ_NAME FROM banq_master_tab WHERE BANQ_ID = $b_id";
$result1 = mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_array($result1)) {
	echo "<td>" . $row1['BANQ_NAME'] . "</td>";
}

					?>
					<td></td>

				<?php
					echo "</tr>";
				} ?>
				<tr>
					<td width="70" valign="top">
						<input name="view" type="submit" value="View" style="background: #CCC; font-size:14px; font-weight:500; border:groove; border-color:#CCC;">

					</td>
				</tr>
			<?php
			} else {
				echo "No such record exists";
			}
			?>

		<?php
		}

		?>
		<?php
if ($type == "cellno") {
	$sql = "SELECT ORDER_NO, GUEST_NAME, CONTACT_NO, DIFFERENCE_AMOUNT, CNIC, grand_total, total_received, FUNCTION_DATE, BANQ_ID, TIME_FROM, TIME_TO
	FROM banq_order_master WHERE CONTACT_NO='$value'";
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if ($count != "") {
?>

				<tr style="background-color:#CCC;">
					<th width="70">Select</th>
					<th width="138">Guest Name</th>
					<th width="138">CNIC</th>
					<th width="97">Contact No</th>
					<th width="101">Total Bill</th>
					<th width="127">Recieved Amount</th>
					<th width="107">Net Amount</th>
					<th width="95">Function Date</th>
					<th width="103">Booked Hall</th>

				</tr>

				<?php
while ($row = mysqli_fetch_array($result)) {  ?>
					<input name="banq_id" type="hidden" value="<?php echo $row['BANQ_ID']; ?>">
					<input name="time_from" type="hidden" value="<?php echo $row['TIME_FROM']; ?>">
					<input name="time_to" type="hidden" value="<?php echo $row['TIME_TO']; ?>">
					<input name="date" type="hidden" value="<?php echo $row['FUNCTION_DATE']; ?>">
					<?php

					echo "<tr>"; ?>
					<td><input name="radiobox[]" type="radio" value="<?php echo $row['ORDER_NO']; ?>"></td>
					<?php
					echo "<td>" . $row['GUEST_NAME'] . "</td>";
					echo "<td>" . $row['CNIC'] . "</td>";
					echo "<td>" . $row['CONTACT_NO'] . "</td>";
					echo "<td>" . $row['grand_total'] . "</td>";
					echo "<td>" . $row['total_received'] . "</td>";
					echo "<td>" . $row['DIFFERENCE_AMOUNT'] . "</td>";
					echo "<td>" . $row['FUNCTION_DATE'] . "</td>";
					$b_id = $row['BANQ_ID'];
					$sql1 = "SELECT BANQ_NAME FROM banq_master_tab WHERE BANQ_ID = $b_id";
$result1 = mysqli_query($conn, $sql1);
while ($row1 = mysqli_fetch_array($result1)) {
	echo "<td>" . $row1['BANQ_NAME'] . "</td>";
}

					?>
					<td></td>

				<?php
					echo "</tr>";
				} ?>
				<tr>
					<td width="70" valign="top">
						<input name="view" type="submit" value="View" style="background: #CCC; font-size:14px; font-weight:500; border:groove; border-color:#CCC;">

					</td>
				</tr>
			<?php
			} else {
				echo "No such record exists";
			}
			?>

		<?php
		}

		?>
	</table>
</form>