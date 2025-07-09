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
	$mem_id = $_POST['mem_id'];
	$mem_type = $_POST['mem_title'];

	$query0 = "INSERT INTO gym_membership_period_tab(MEMBER_PERIOD_ID, MEMBER_PERIOD_TITLE, CREATED_ID, CREATED_ON) 
	VALUES ('$mem_id','$mem_type','$created_id' , '$created_on')";
	$result0 = mysqli_query($conn, $query0) or die("error" . mysqli_error($conn));

	$m_num = "";
} else if (isset($_REQUEST['update'])) {
	$edited_id = $_SESSION['username'];

	date_default_timezone_set('Asia/Karachi');
	$ttdate = mktime(date("h"), date("i"), date("s"), date("m"), date("d"), date("Y"));
	$edited_on = date("Y-m-d h:i:s", $ttdate);
	$mem_id = $_POST['mem_id'];
	$mem_type = $_POST['mem_title'];

	$query0 = "UPDATE gym_membership_period_tab SET MEMBER_PERIOD_ID = '$mem_id', MEMBER_PERIOD_TITLE = '$mem_type', EDITED_ID = '$edited_id',
	EDITED_ON = '$edited_on' WHERE MEMBER_PERIOD_ID = '$mem_id'";
	$result0 = mysqli_query($conn, $query0) or die("error" . mysqli_error($conn));

	$sql1 = "SELECT * FROM gym_membership_period_tab WHERE MEMBER_PERIOD_ID = '$mem_id'";
	$result1 = mysqli_query($conn, $sql1) or die("error" . mysqli_error($conn));
	$row = mysqli_fetch_array($result1);

	$m_num = $row['MEMBER_PERIOD_ID'];
} else if (isset($_REQUEST['delete'])) {

	$mem_id = $_POST['mem_id'];
	$mem_type = $_POST['mem_title'];

	$query0 = "DELETE FROM gym_membership_period_tab WHERE MEMBER_PERIOD_ID = '$mem_id'";
	$result0 = mysqli_query($conn, $query0) or die("error" . mysqli_error($conn));


	$m_num = "";
} else if (isset($_REQUEST['view'])) {
	foreach ($_REQUEST['radiobox'] as $m_id) {

		$sql1 = "SELECT * FROM gym_membership_period_tab WHERE MEMBER_PERIOD_ID ='$m_id'";
		$result1 = mysqli_query($conn, $sql1) or die("error" . mysqli_error($conn));
	}
	$row = mysqli_fetch_array($result1);


	$m_num = $row['MEMBER_PERIOD_ID'];
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
	<!--search_mem-->
	<script type="text/javascript">
		function search_mem_gym_type() {
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
			xmlhttp.open("POST", "search_mem_gym_type.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send();
		}
	</script>
	<script type="text/javascript">
		function search_m_gym_type() {
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
			xmlhttp.open("POST", "ajax/search_m_gym_type.php", true);
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
				<p>Add/Edit Membership Types</p>
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
				<h3>Membership Type</h3>
			</li>
			<li class="section_break"></li>
			<?php
			$query2 = "SELECT * FROM gym_membership_period_tab WHERE MEMBER_PERIOD_ID = '$m_num'";
			$result2 = mysqli_query($conn, $query2) or die('Query Failed00');
			if (mysqli_num_rows($result2) == 0) {
				$query3 = "SELECT max(MEMBER_PERIOD_ID) AS max_id FROM gym_membership_period_tab";
				$result3 = mysqli_query($conn, $query3);
				$row3 = mysqli_fetch_assoc($result3);
				$member_period_id = $row3['max_id'];
			?>

				<table width="945">
					<tr>
						<td width="158"><label class="description" for="element_45">Membership Type ID </label></td>
						<td width="775"><input id="mem_id" name="mem_id" type="text" size="2" value="<?php echo $B_NUM = $row3 + 1; ?>" readonly="readonly" /></td>
					</tr>
					<tr>
						<td width="158"><label class="description" for="element_45">Membership Type Title*</label></td>
						<td width="775"><input id="mem_title" name="mem_title" type="text" value="" /></td>
					</tr>
				</table>
				<div id="mode"></div>
				<li class="section_break"></li>
				<table>
					<tr>
						<td>

							<input class="button_text" type="submit" name="add" value="Add" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
						</td>

						<td width="116"><input name="search" type="button" value="Search" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_mem_gym_type();" /></td>
						<td width="518"><input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='gym_admin.php'" />
						</td>
					</tr>
				</table>
			<?php } else { ?>
				<table width="945">
					<tr>
						<td width="158"><label class="description" for="element_45">Membership Type ID </label></td>
						<td width="775"><input id="mem_id" name="mem_id" type="text" size="2" value="<?php echo $row['MEMBER_PERIOD_ID']; ?>" readonly="readonly" /></td>
					</tr>
					<tr>
						<td width="158"><label class="description" for="element_45">Membership Type Title*</label></td>
						<td width="775"><input id="mem_title" name="mem_title" type="text" value="<?php echo $row['MEMBER_PERIOD_TITLE']; ?>" /></td>
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
						<td width="116"><input name="search" type="button" value="Search" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_mem_gym_type();" /></td>
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