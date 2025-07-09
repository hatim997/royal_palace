<?php session_start(); ?>
<?php
include('config.php');
//include('time_settings.php');
//include('update_activity.php');
$userid =  $_SESSION['username'];
$password = $_SESSION['password'];
//search the record and view
if (isset($_REQUEST['view'])) {
	foreach ($_REQUEST['radiobox'] as $t_id) {
		$sql1 = "SELECT * FROM gym_payment_token WHERE TOKEN_ID = '$t_id'";
		$result1 = mysqli_query($conn, $sql1) or die("error: " . mysqli_error($conn));
	}
	$row = mysqli_fetch_array($result1);

	$t_num = $row['TOKEN_ID'];
} else $t_num = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Gym</title>
	<link rel="stylesheet" type="text/css" href="viewgym.css" media="all">
	<script type="text/javascript" src="viewgym.js"></script>
	<!--for jquery datepicker -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<style type="text/css">
		.overlay {
			position: fixed;
			top: 0%;
			left: 0%;
			width: 100%;
			height: 100%;
			background: #000;
			display: none;
			opacity: .5;
			filter: alpha(opacity=10);
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";

		}

		.new_popup {
			position: fixed;
			top: 10%;
			left: 15%;
			margin-left: -50px;
			margin-top: -10px;
			width: 80%;
			height: auto;
			display: none;
			background: #FFF;
			border: 1px solid #F00;
			z-index: 1000;
		}
	</style>

	<script>
		$(function() {
			$("#f_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
			$("#t_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
			$("#dob").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
		});
	</script>
	<script type="text/javascript">
		function show_new_Popup() {
			// alert(ID);
			document.getElementById("overlay").style.display = "block";
			document.getElementById("new_popup").style.display = "block";
		}

		function close_new_Popup() {
			document.getElementById("overlay").style.display = "none";
			document.getElementById("new_popup").style.display = "none";
		}
	</script>

	<script type="text/javascript">
		function generate_id(value) {

			if (value != "1") {
				document.getElementById("mem_id2").value = "";
			} else {
				var mem_id = document.getElementById("m1").value;
				document.getElementById("mem_id2").value = mem_id;
			}
		}
	</script>
	<script type="text/javascript">
		function payment_mode(value) {
			//var total = encodeURIComponent(document.getElementById("total_charges").value);
			//alert(value);

			var xmlhttp;
			if (value == "") {
				//document.getElementById("mode").innerHTML="";
				alert("Please select the value");
				return;
			}
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("mode").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/payment_mode_gym.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("value=" + value);
		}
	</script>
	<script type="text/javascript">
		function netamount(A) {
			var rec = encodeURIComponent(document.getElementById(A).value);
			var tot = encodeURIComponent(document.getElementById("charge").value);
			var dif = Number(rec) - Number(tot);
			if (dif = 0) {
				document.getElementById(A).value = 0;
				alert("please pay the full Bill");
				return;
			} else {

				document.getElementById("bal_return").value = dif;
			}
		}
	</script>
	<script type="text/javascript">
		function validateForm() {

			if ((document.getElementById("mem_id2").value && document.getElementById("gym_type2").value && document.getElementById("c_status").value) == "") {
				alert("Necessary Fields must be entered");
				return false;
			}
		}
	</script>


	<script type="text/javascript">
		function search_gym_token() {
			show_new_Popup();
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("data_popup").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "search_gym_token.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send();
		}
	</script>
	<script type="text/javascript">
		function search_token_gym() {
			var pid = encodeURIComponent(document.getElementById("pid").value);
			var type = encodeURIComponent(document.getElementById("type").value);
			//document.write(type);

			var xmlhttp;

			if (pid == "" || type == "") {
				//document.getElementById("info").innerHTML="";
				alert("Please fill all values:");
				return;
			}
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("mydiv").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/search_token_gym.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("pid=" + pid + "&type=" + type);
		}
	</script>

</head>

<body id="main_body">

	<img id="top" src="top.png" alt="">
	<div id="form_container">

		<h1><a></a></h1>
		<a style="color:#91400F; font-family: Tahoma; font-size: 22px; line-height: 24px; font-weight: normal;">Hotel Royal Palace</a>
		<?php
		$query2 = "SELECT * FROM gym_payment_token WHERE TOKEN_ID = '$t_num'";
		$result2 = mysqli_query($conn, $query2) or die('Query Failed00');
		if (mysqli_num_rows($result2) == 0) {
		?>

			<form id="form1" class="appnitro" enctype="multipart/form-data" method="post" action="gym_token_print.php" onsubmit="return validateForm(); ">
				<div class="form_description">
					<h2>Gym</h2>
					<p>Token Form</p>
				</div>

				<?php

				$query33 = "SELECT MAX(TOKEN_ID) AS max_token_id FROM gym_payment_token";
				$result33 = mysqli_query($conn, $query33);
				$row33 = mysqli_fetch_assoc($result33);
				$max_token_id = $row33['max_token_id'];

				$query3 = "SELECT MAX(MEMBERSHIP_ID) AS max_membership_id FROM gym_payment_token";
				$result3 = mysqli_query($conn, $query3);
				$row3 = mysqli_fetch_assoc($result3);
				$max_membership_id = $row3['max_membership_id'];

				date_default_timezone_set('Asia/Karachi');
				$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
				$ttime = time(date("h"), date("i"), date("s"), 0, 0, 0);
				?>
				<table width="945">
					<tr>
						<td width="135"><label class="description" for="element_47">Token # </label></td>
						<td width="218"><input id="t_id" name="t_id" type="text" size="2" readonly="readonly" value="<?php echo $T_NUM = $row33 + 1; ?>" /></td>
						<td width="135"><label class="description" for="element_47">Date </label></td>
						<td width="218"><input id="mem_date2" name="mem_date2" type="text" value="<?php echo date("Y-m-d", $tdate); ?>" /></td>
						<td width="135"><label class="description" for="element_47">Time </label></td>
						<td width="218"><input id="mem_time2" name="mem_time2" type="text" value="<?php echo date("h:i:s", $ttime); ?>" /></td>
					</tr>
				</table>
				<li class="section_break">
					<h3>Gym Info</h3>
				</li>
				<li class="section_break"></li>
				<table>
					<tr>
						<td width="113"><label class="description" for="element_46">Gym Type* </label></td>
						<td width="179"><select id="gym_type2" name="gym_type2" onchange="generate_id(this.value);">
								<?php
								$query = "SELECT * FROM gym_type_tab";
								$result = mysqli_query($conn, $query) or die('Not Found: ' . mysqli_error($conn));
								$num = mysqli_num_rows($result);
								$i = 0;
								while ($i < $num) {
									$row = mysqli_fetch_assoc($result);
									$swimmerid = $row['GYM_TYPE_ID'];
									$swimmer_detail = $row['GYM_TYPE_TITLE'];
									echo '<option value="' . $swimmerid . '">' . $swimmer_detail . '</option>';
									$i++;
								}
								?>
							</select>
						</td>
						<td width="125"><label class="description" for="element_45">Membership ID* </label></td>
						<td width="242"><input id="mem_id2" name="mem_id2" type="text" size="2" value="<?php echo $B_NUM = $row3 + 1; ?>" /></td>
						<input id="m1" name="m1" type="hidden" value="<?php echo $B_NUM = $row3 + 1; ?>" />

					</tr>

				</table>
				<li class="section_break">
					<h3>Charges</h3>
				</li>
				<li class="section_break"></li>

				<?php
				$dd = date("Y-m-d", $tdate);
				$query4 = "SELECT CHARGES_ID, CHARGES_TYPE_ID, GYM_CHARGES FROM gym_charges_plan 
           WHERE CHARGES_ON_DATE <= '$dd' AND CHARGES_OFF_DATE >= '$dd' AND CHARGES_TYPE_ID = '2'";
				$result4 = mysqli_query($conn, $query4);
				$row4 = mysqli_fetch_array($result4);


				?>
				<table width="945">
					<tr>
						<td width="177"><label class="description" for="element_52">Charges</label></td>
						<td width="287"><input id="charge" name="charge" type="text" value="<?php echo $row4['GYM_CHARGES']; ?>" />
							<input name="charge_id" type="hidden" value="<?php echo $row4['CHARGES_ID']; ?>" />
							<input name="charge_type_id" type="hidden" value="<?php echo $row4['CHARGES_TYPE_ID']; ?>" />

						</td>
						<td width="177"><label class="description" for="element_53">Status*</label></td>
						<td width="284"> <select id="c_status" name="c_status">
								<option value="">Select the option</option>
								<option value="P">Paid</option>
								<option value="U">Unpaid</option>
								<option value="B">Bill to room</option>
								<option value="C">Complementry</option>
							</select></td>
					</tr>
				</table>


				<li class="section_break">


					<h3>Payment Mode</h3>
				</li>
				<li class="section_break"></li>
				<table width="372">
					<td width="174">
						<label class="description" for="element_30">Select Mode</label>
					</td>
					<td width="186">
						<select name="pay_mode" id="pay_mode" onchange="payment_mode(this.value);">
							<option value="">Select Mode</option>
							<option value="N">None</option>
							<option value="C">Cash</option>
							<option value="Q">Cheque</option>
							<option value="R">Credit Card</option>
						</select>
					</td>
					</tr>
				</table>
				<div id="mode"></div>
				<li class="section_break"></li>
				<table>
					<tr>
						<td>

							<input class="button_text" type="submit" name="submit" value="Submit" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
						</td>
						<td width="116"><input name="search" type="button" value="Search" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_gym_token();" /></td>
						<td width="518"><input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='gym_admin.php'" />
						</td>
					</tr>
				</table>
			</form>
		<?php } else {
		?>

			<form id="form1" class="appnitro" method="post" action="gym_token_print.php" onsubmit="return validateForm(); ">
				<div class="form_description">
					<h2>Gym</h2>
					<p>Token Form</p>
				</div>

				<?php

				date_default_timezone_set('Asia/Karachi');
				$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
				$ttime = time(date("h"), date("i"), date("s"), 0, 0, 0);
				?>
				<table width="945">
					<tr>
						<td width="135"><label class="description" for="element_47">Token # </label></td>
						<td width="218"><input id="t_id" name="t_id" type="text" size="2" readonly="readonly" value="<?php echo $row['TOKEN_ID']; ?>" /></td>
						<td width="135"><label class="description" for="element_47">Date </label></td>
						<td width="218"><input id="mem_date2" name="mem_date2" type="text" value="<?php echo date("Y-m-d", $tdate); ?>" /></td>
						<td width="135"><label class="description" for="element_47">Time </label></td>
						<td width="218"><input id="mem_time2" name="mem_time2" type="text" value="<?php echo date("h:i:s", $ttime); ?>" /></td>
					</tr>
				</table>
				<li class="section_break">
					<h3>Gymer Info</h3>
				</li>
				<li class="section_break"></li>
				<table>
					<tr>
						<td width="113"><label class="description" for="element_46">Gym Type* </label></td>
						<td width="179"><select id="swim_type2" name="swim_type2" onchange="generate_id(this.value);">
								<?php
								$s_id = $row['GYM_TYPE_ID'];

								$query = "SELECT * FROM gym_type_tab WHERE GYM_TYPE_ID = '$s_id'";
								$result = mysqli_query($conn, $query) or die('Not Found: ' . mysqli_error($conn));
								$num = mysqli_num_rows($result);
								$i = 0;
								while ($i < $num) {
									$row_data = mysqli_fetch_assoc($result);
									$swimmerid = $row_data['GYM_TYPE_ID'];
									$swimmer_detail = $row_data['GYM_TYPE_TITLE'];
									echo '<option value="' . $swimmerid . '">' . $swimmer_detail . '</option>';
									$i++;
								}

								$query1 = "SELECT * FROM gym_type_tab WHERE GYM_TYPE_ID != '$s_id'";
								$result1 = mysqli_query($conn, $query1) or die('Not Found: ' . mysqli_error($conn));
								$num1 = mysqli_num_rows($result1);
								$i1 = 0;
								while ($i1 < $num1) {
									$row_data1 = mysqli_fetch_assoc($result1);
									$swimmerid1 = $row_data1['GYM_TYPE_ID'];
									$swimmer_detail1 = $row_data1['GYM_TYPE_TITLE'];
									echo '<option value="' . $swimmerid1 . '">' . $swimmer_detail1 . '</option>';
									$i1++;
								}
								?>
							</select>
						</td>
						<td width="125"><label class="description" for="element_45">Membership ID* </label></td>
						<td width="242"><input id="mem_id2" name="mem_id2" type="text" size="2" value="<?php echo $row['MEMBERSHIP_ID']; ?>" /></td>
						<input id="m1" name="m1" type="hidden" value="<?php echo $row['MEMBERSHIP_ID']; ?>" />

					</tr>

				</table>
				<li class="section_break">
					<h3>Charges</h3>
				</li>
				<li class="section_break"></li>

				<?php
				$dd = $row['CHARGES_ID'];
				$query4 = "SELECT CHARGES_ID, CHARGES_TYPE_ID, GYM_CHARGES FROM gym_charges_plan WHERE CHARGES_ID = '$dd'";
				$result4 = mysqli_query($conn, $query4);
				$row4 = mysqli_fetch_array($result4);
				?>

				<table width="945">
					<tr>
						<td width="177"><label class="description" for="element_52">Charges</label></td>
						<td width="287"><input id="charge" name="charge" type="text" value="<?php echo $row4['GYM_CHARGES']; ?>" />
							<input name="charge_id" type="hidden" value="<?php echo $row4['CHARGES_ID']; ?>" />
							<input name="charge_type_id" type="hidden" value="<?php echo $row4['CHARGES_TYPE_ID']; ?>" />

						</td>
						<td width="177"><label class="description" for="element_53">Status*</label></td>
						<td width="284"> <select id="c_status" name="c_status">
								<?php
								$charge_flag = $row['CHARGES_FLAG'];
								if ($charge_flag == "P") { ?>

									<option value="P">Paid</option>
									<option value="U">Unpaid</option>
									<option value="B">Bill to room</option>
									<option value="C">Complementry</option>
								<?php
								} else if ($charge_flag == "U") {
								?>

									<option value="P">Unpaid</option>
									<option value="U">Paid</option>
									<option value="B">Bill to room</option>
									<option value="C">Complementry</option>
								<?php
								} else if ($charge_flag == "B") {
								?>
									<option value="B">Bill to room</option>
									<option value="P">Paid</option>
									<option value="U">Unpaid</option>

									<option value="C">Complementry</option>
								<?php
								} else if ($charge_flag == "C") {
								?>
									<option value="C">Complementry</option>
									<option value="P">Paid</option>
									<option value="U">Unpaid</option>
									<option value="B">Bill to room</option>

								<?php
								}
								?>
							</select></td>
					</tr>
				</table>


				<li class="section_break">


					<h3>Payment Mode</h3>
				</li>
				<li class="section_break"></li>
				<table width="372">
					<td width="174">
						<label class="description" for="element_30">Select Mode</label>
					</td>
					<td width="186">
						<select name="pay_mode" id="pay_mode" onchange="payment_mode(this.value);">
							<option value="">Select Mode</option>
							<option value="N">None</option>
							<option value="C">Cash</option>
							<option value="Q">Cheque</option>
							<option value="R">Credit Card</option>
						</select>
					</td>
					</tr>
					<?php
					if ($row['CREDIT_CARD_NO'] != "") { ?>
						<tr>
							<th align="justify" width="113">Credit Card No:</th>
							<td width="170"><input type="text" name="cardno" id="cardno" value="<?php echo $row['CREDIT_CARD_NO']; ?>" /></td>
						</tr>
					<?php
					} else if (($row['CHEQUE_NO'] != "") && ($row['BANK_NAME'] != "")) {
					?>
						<tr>
							<th align="justify" width="113"> Cheque No:</th>
							<td width="170"><input type="text" name="chequeno" id="chequeno" value="<?php echo $row['CHEQUE_NO']; ?>" /></td>
						</tr>

						<tr>
							<th align="justify" width="113">Concerned Bank:</th>
							<td width="170"><input type="text" name="bank" id="bank" value="<?php echo $row['BANK_NAME']; ?>" /></td>
						</tr>
					<?php
					} else {
					}
					?>
				</table>
				<div id="mode"></div>
				<li class="section_break"></li>
				<table>
					<tr>
						<td>

							<input class="button_text" type="submit" name="update" value="Update" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
						</td>
						<td><input name="new_member" type="button" value="New Token" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='gym_token.php'" /></td>

						<td width="116"><input name="search" type="button" value="Search" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_gym_token();" /></td>
						<td width="518"><input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='gym_admin.php'" />
						</td>
					</tr>
				</table>
			</form>


		<?php
		}

		?>

		<div id="footer"> Designed & Developed by: Wi-Tech Mill (Pvt) Ltd.</div>
	</div>
	<img id="bottom" src="bottom.png" alt="">
	<div id='overlay' class='overlay'></div>
	<div id="new_popup" class="new_popup">
		<a href=javascript:close_new_Popup()><img width=25 height=25 align="right" SRC=images/remove.png alt=Delete /></a>
		<div id="data_popup">
		</div>
	</div>
</body>

</html>