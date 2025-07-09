<?php session_start(); ?>
<?php
include('config.php');
//include('time_settings.php');
//include('update_activity.php');
$userid =  $_SESSION['username'];
$password = $_SESSION['password'];
//search the record and view
if (isset($_REQUEST['add'])) {
	$created_id = $_SESSION['username'];

	date_default_timezone_set('Asia/Karachi');
	$ttdate = mktime(date("h"), date("i"), date("s"), date("m"), date("d"), date("Y"));
	$created_on = date("Y-m-d h:i:s", $ttdate);
	$charge_id = $_POST['charge_id'];
	$charge_type = $_POST['charge_type'];
	$s_charge = $_POST['s_charge'];
	$f_date = $_POST['f_date'];
	$t_date = $_POST['t_date'];

	$query0 = "INSERT INTO gym_charges_plan(CHARGES_ID, CHARGES_TYPE_ID, GYM_CHARGES,
	CHARGES_ON_DATE, CHARGES_OFF_DATE, CREATED_ID, CREATED_ON) 
	VALUES ('$charge_id','$charge_type','$s_charge','$f_date','$t_date','$created_id' , '$created_on')";

	$result0 = mysqli_query($conn, $query0) or die("error" . mysqli_error($conn));

	$m_num = "";
} else if (isset($_REQUEST['update'])) {
	$edited_id = $_SESSION['username'];

	date_default_timezone_set('Asia/Karachi');
	$ttdate = mktime(date("h"), date("i"), date("s"), date("m"), date("d"), date("Y"));
	$edited_on = date("Y-m-d h:i:s", $ttdate);
	$charge_id = $_POST['charge_id'];
	$charge_type = $_POST['charge_type'];
	$s_charge = $_POST['s_charge'];
	$f_date = $_POST['f_date'];
	$t_date = $_POST['t_date'];

	$query0 = "UPDATE gym_charges_plan SET 
	CHARGES_ID = '$charge_id',
	CHARGES_TYPE_ID = '$charge_type',
	GYM_CHARGES = '$s_charge',
	CHARGES_ON_DATE = '$f_date',
	CHARGES_OFF_DATE = '$t_date',
	EDITED_ID = '$edited_id',
	EDITED_ON = '$edited_on' 
	WHERE CHARGES_ID = '$charge_id'";

	$result0 = mysqli_query($conn, $query0) or die("error: " . mysqli_error($conn));

	$sql1 = "SELECT * FROM gym_charges_plan WHERE CHARGES_ID = '$charge_id'";
	$result1 = mysqli_query($conn, $sql1) or die("error: " . mysqli_error($conn));

	$row = mysqli_fetch_array($result1);

	$m_num = $row['CHARGES_ID'];
} else if (isset($_REQUEST['delete'])) {

	$charge_id = $_POST['charge_id'];
	$charge_type = $_POST['charge_type'];
	$s_charge = $_POST['s_charge'];
	$f_date = $_POST['f_date'];
	$t_date = $_POST['t_date'];

	$query0 = "DELETE FROM gym_charges_plan WHERE CHARGES_ID = '$charge_id'";
	$result0 = mysqli_query($conn, $query0) or die("error: " . mysqli_error($conn));


	$m_num = "";
} else if (isset($_REQUEST['view'])) {
	foreach ($_REQUEST['radiobox'] as $c_id) {

		$sql1 = "SELECT * FROM gym_charges_plan WHERE CHARGES_ID = '$c_id'";
		$result1 = mysqli_query($conn, $sql1) or die("error: " . mysqli_error($conn));
	}
	$row = mysqli_fetch_array($result1);


	$m_num = $row['CHARGES_ID'];
} else $m_num = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Gym</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<script type="text/javascript" src="view.js"></script>
	<!--for jquery datepicker -->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
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
	<!--Date Picker-->
	<script>
		$(function() {

			$("#f_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				minDate: 0
			});
			$("#t_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				minDate: 0
			});
			$("#dob").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				yearRange: '-100:+0'
			});
		});
	</script>
	<!--Show new POPup-->
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
		function search_gym_charge() {
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
			xmlhttp.open("POST", "search_gym_charge.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send();
		}
	</script>
	<script type="text/javascript">
		function search_cplan_value_gym() {
			var type = encodeURIComponent(document.getElementById("type").value);
			//document.write(type);

			var xmlhttp;

			if (type == "") {
				//document.getElementById("info").innerHTML="";
				alert("Please select the type:");
				return;
			}
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("div1").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/search_cplan_value_gym.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("type=" + type);
		}
	</script>
	<script type="text/javascript">
		function search_gym_charge_plan() {
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
			xmlhttp.open("POST", "ajax/search_gym_charge1.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("pid=" + pid + "&type=" + type);
		}
	</script>
	<!--validateForm-->
	<script type="text/javascript">
		function validateForm() {

			if ((document.getElementById("mem_title").value) == "") {
				alert("Membership Type Title must be entered");
				return false;
			}
		}
	</script>
</head>

<body id="main_body">

	<img id="top" src="top.png" alt="">
	<div id="form_container">

		<h1><a></a></h1>
		<a style="color:#91400F; font-family: Tahoma; font-size: 22px; line-height: 24px; font-weight: normal;">Hotel Royal Palace</a>

		<form id="form1" class="appnitro" method="post" action="" onsubmit="return validateForm(); ">
			<div class="form_description">
				<h2>Gym</h2>
				<p>Charges Plan</p>
			</div>

			<?php

			date_default_timezone_set('Asia/Karachi');
			$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
			$ttime = time(date("h"), date("i"), date("s"), 0, 0, 0);
			?>
			<table width="945">
				<tr>

					<td width="42" height="26"><label class="description" for="element_47">Date: </label></td>
					<td width="891"><?php echo date("Y-m-d", $tdate); ?></td>
				</tr>
				<tr>
					<td width="42"><label class="description" for="element_47">Time: </label></td>
					<td width="891"><?php echo date("h:i:s", $ttime); ?></td>

				</tr>

			</table>
			<li class="section_break">
				<h3>Charges Plan</h3>
			</li>
			<li class="section_break"></li>
			<?php
			$query2 = "SELECT * FROM gym_charges_plan WHERE CHARGES_ID = '$m_num'";
			$result2 = mysqli_query($conn, $query2) or die('Query Failed00');

			if (mysqli_num_rows($result2) == 0) {
				$query3 = "SELECT max(CHARGES_ID) AS max_id FROM gym_charges_plan";
				$result3 = mysqli_query($conn, $query3);
				$i = 0;
				$row3 = mysqli_fetch_assoc($result3);
				$charges_id = $row3['max_id'];
			?>

				<table width="945">
					<tr>
						<td width="134"><label class="description" for="element_45">Charges ID </label></td>
						<td width="328"><input id="charge_id" name="charge_id" type="text" size="2" value="<?php echo $B_NUM = $row3 + 1; ?>" readonly="readonly" /></td>
					</tr>
					<tr>
						<td width="134"><label class="description" for="element_45">Charges Type *</label></td>
						<td width="328"> <select id="charge_type" name="charge_type">
								<option value="">Select Type</option>
								<?php
								$query1 = "SELECT * FROM gym_charges_type_tab";
								$result1 = mysqli_query($conn, $query1) or die('Not Found: ' . mysqli_error($conn));
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
						</td>
					</tr>
					<tr>
						<td><label class="description" for="element_18">Start Date* </label></td>

						<td><input id="f_date" name="f_date" type="text" value="" />
						</td>

						<td width="105"><label class="description" for="element_19">End Date* </label></td>
						<td width="358"> <input id="t_date" name="t_date" type="text" value="" /> </td>
					</tr>
					<tr>
						<td width="105"><label class="description" for="element_19">Charges </label></td>
						<td width="358"> <input id="s_charge" name="s_charge" type="text" value="" /> </td>
					</tr>
				</table>
				<div id="mode"></div>
				<li class="section_break"></li>
				<table>
					<tr>
						<td>

							<input class="button_text" type="submit" name="add" value="Add" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
						</td>

						<td width="116"><input name="search" type="button" value="Search" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_gym_charge();" /></td>
						<td width="518"><input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='gym_admin.php'" />
						</td>
					</tr>
				</table>
			<?php } else if (mysqli_num_rows($result2) > 0) { ?>

				<table width="945">
					<tr>
						<td width="134"><label class="description" for="element_45">Charges ID </label></td>
						<td width="328"><input id="charge_id" name="charge_id" type="text" size="2" value="<?php echo $row['CHARGES_ID']; ?>" readonly="readonly" /></td>
					</tr>
					<tr>
						<td width="134"><label class="description" for="element_45">Charges Type *</label></td>
						<td width="328"> <select id="charge_type" name="charge_type">
								<?php
								$ii = $row['CHARGES_TYPE_ID'];
								$query11 = "SELECT * FROM gym_charges_type_tab WHERE CHARGES_TYPE_ID = '$ii'";
								$result11 = mysqli_query($conn, $query11) or die('Not Found:' . mysqli_error($conn));
								while ($row11 = mysqli_fetch_array($result11)) {
								?>

									<option value="<?php echo $row['CHARGES_TYPE_ID']; ?>"><?php echo $row11['CHARGES_TITLE']; ?></option>

								<?php
								}
								$query1 = "SELECT * FROM gym_charges_type_tab WHERE CHARGES_TYPE_ID != '$ii'";
								$result1 = mysqli_query($conn, $query1) or die('Not Found:' . mysqli_error($conn));
								$num1 = mysqli_num_rows($result1);
								$i1 = 0;
								while ($i1 < $num1) {
									$row1 = mysqli_fetch_array($result1);
									$memid = $row1["CHARGES_TYPE_ID"];
									$mem_detail = $row1["CHARGES_TITLE"];
									echo '<option value="' . $memid . '">' . $mem_detail . '</option>';
									$i1++;
								}  // while loop ends here
								?>

							</select></td>
					</tr>
					<tr>
						<td><label class="description" for="element_18">Start Date* </label></td>

						<td><input id="f_date" name="f_date" type="text" value="<?php echo $row['CHARGES_ON_DATE']; ?>" />
						</td>

						<td width="105"><label class="description" for="element_19">End Date* </label></td>
						<td width="358"> <input id="t_date" name="t_date" type="text" value="<?php echo $row['CHARGES_OFF_DATE']; ?>" /> </td>
					</tr>
					<tr>
						<td width="105"><label class="description" for="element_19">Charges </label></td>
						<td width="358"> <input id="s_charge" name="s_charge" type="text" value="<?php echo $row['GYM_CHARGES']; ?>" /> </td>
					</tr>
				</table>
				<div id="mode"></div>
				<li class="section_break"></li>
				<table>
					<tr>
						<td>

							<input class="button_text" type="submit" name="update" value="Update" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
						</td>
						<td>

							<input class="button_text" type="submit" name="delete" value="Delete" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
						</td>
						<td width="116"><input name="search" type="button" value="Search" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_gym_charge();" /></td>
						<td width="518"><input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='gym_admin.php'" />
						</td>
					</tr>
				</table>
			<?php } ?>
		</form>

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