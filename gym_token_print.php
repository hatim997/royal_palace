<?php session_start(); ?>
<?php
include('config.php');
//include('time_settings.php');
//include('update_activity.php');
//$userid =  $_SESSION['username'];
//$password = $_SESSION['password'];
//search the record and view
?>
<?php

$created_id = $_SESSION['username'];

date_default_timezone_set('Asia/Karachi');
$ttdate = mktime(date("h"), date("i"), date("s"), date("m"), date("d"), date("Y"));
$created_on = date("Y-m-d h:i:s", $ttdate);;
$date = $_POST['mem_date2'];
$time = $_POST['mem_time2'];
$mem_id = $_POST['t_id'];
$mem_id2 = $_POST['mem_id2'];
$swim_type2 = $_POST['gym_type2'];
$charge_id = $_POST['charge_id'];
$charge_type_id = $_POST['charge_type_id'];
$charge = $_POST['charge'];
$charge_flag = $_POST['c_status'];


$p_mode = $_POST['pay_mode'];
if ($p_mode == ("N" || "C")) {
	$chequeno = "";
	$card_no = "";
	$bank = "";
}
if ($p_mode == "Q") {
	$chequeno = $_POST['chequeno'];
	$card_no = "";
	$bank = strtoupper($_POST['bank']);
}
if ($p_mode == "R") {
	$chequeno = "";
	$card_no = $_POST['cardno'];
	$bank = "";
}
if ($p_mode == "") {
	$chequeno = "";
	$card_no = "";
	$bank = "";
}


if ($charge_flag == "U") {
	$due = $_POST['charge'];
} else $due = "";

if (isset($_REQUEST['submit'])) {
    $query0 = "INSERT INTO gym_payment_token (TOKEN_ID, MEMBERSHIP_ID, GYM_TYPE_ID, CHARGES_ID, CHARGES_TYPE_ID, CHARGES_DUE, 
        CHARGES_FLAG, PAYMENT_MODE, CREDIT_CARD_NO, BANK_NAME, CHEQUE_NO, CREATED_ID, CREATED_ON) 
        VALUES ('$mem_id', '$mem_id2', '$swim_type2', '$charge_id', '$charge_type_id', '$due', '$charge_flag',
        '$p_mode', '$card_no', '$bank', '$chequeno', '$created_id', '$created_on')";
    $result0 = mysqli_query($conn, $query0) or die("error: " . mysqli_error($conn));
} else if (isset($_REQUEST['update'])) {
    $query0 = "UPDATE gym_payment_token SET TOKEN_ID = '$mem_id', MEMBERSHIP_ID = '$mem_id2', GYM_TYPE_ID = '$swim_type2',
        CHARGES_ID = '$charge_id', CHARGES_TYPE_ID = '$charge_type_id', CHARGES_DUE = '$due', 
        CHARGES_FLAG = '$charge_flag', PAYMENT_MODE = '$p_mode', CREDIT_CARD_NO = '$card_no', BANK_NAME = '$bank', CHEQUE_NO = '$chequeno', 
        EDITED_ID = '$created_id', EDITED_ON = '$created_on' WHERE TOKEN_ID = '$mem_id'";
    $result0 = mysqli_query($conn, $query0) or die("error: " . mysqli_error($conn));
}
if ($charge_flag == "P") {
	$status = "Paid";
} else if ($charge_flag == "U") {
	$status = "Unpaid";
} else if ($charge_flag == "B") {
	$status = "Bill to room";
} else if ($charge_flag == "C") {
	$status = "Complementry";
}


$query = "SELECT * FROM GYM_TYPE_TAB WHERE GYM_TYPE_ID = '$swim_type2'";
$result = mysqli_query($conn, $query) or die('Not Found: ' . mysqli_error($conn));
$row = mysqli_fetch_array($result);
$swim_type_det = $row['GYM_TYPE_TITLE'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Gym Token</title>

	<style type="text/css">
		.watermark {
			background: url(images/logo.png);
			list-style-position: inside;



		}

		#c_content {
			width: 390px;
			float: left;
			margin: 0px 0px 5px 0px;
			padding: 0px;



			/*padding: 5px;
	margin: 0px 0px 10px 0px;*/
		}
	</style>
	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" media="print" href="css/print_styles.css" />

	<script type="text/javascript">
		function printSelection(node) {

			var content = node.innerHTML;

			var pwin = window.open('', 'print_content', 'width=800,height=700');

			pwin.document.open();

			pwin.document.write('<html><body onload="window.print()">' + content + '</body></html>');
			pwin.document.close();

			setTimeout(function() {
				pwin.close();
			}, 1000);

		}
	</script>

</head>

<body>
	<div id="c_content">
		<div id="mydiv">
			<img src="images/logo.png" width="388" height="125" /><br />

			<table width="391" frame="hsides">
				<tr>
					<th></th>
					<td></td>
				</tr>
				<tr>
					<th></th>
					<td></td>
				</tr>

				<tr>
					<th width="59">
						<div align="justify">Token #</div>
					</th>
					<td width="36">
						<div align="justify"><?php echo $mem_id; ?></div>
					</td>
					<th width="40">
						<div align="justify">Date:</div>
					</th>
					<td width="108">
						<div align="justify"><?php echo $date; ?></div>
					</td>
					<th width="42">
						<div align="justify">Time:</div>
					</th>
					<td width="78">
						<div align="justify"><?php echo $time; ?></div>
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
				</tr>
				<tr>
					<th></th>
					<td></td>
				</tr>
			</table>


			<table width="392" height="179" frame="box" background="images/watermark.png">
				<tr>

				</tr>
				<tr>
					<th width="77">
						<div align="justify">ID</div>
					</th>
					<td width="178">
						<div align="justify"><?php echo $mem_id2; ?></div>
					</td>
				</tr>

				<tr>
					<th width="77">
						<div align="justify">Gym Type</div>
					</th>
					<td width="178">
						<div align="justify"><?php echo $swim_type_det; ?></div>
					</td>
				</tr>

				<tr>
					<th width="272">
						<div align="justify">Charges</div>
					</th>
					<td width="250">
						<div align="justify"><?php echo $charge; ?></div>
					</td>
				</tr>

				<tr>
					<th width="272">
						<div align="justify">Status</div>
					</th>
					<td width="250">
						<div align="justify"><?php echo $status; ?></div>
					</td>
				</tr>

			</table>
		</div>

		<p></p>
		<input name="print" type="submit" value="Print Out" onclick="printSelection(document.getElementById('mydiv'));return false" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
		<input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='gym_token.php'" />
	</div>
</body>

</html>