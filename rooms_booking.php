<?php session_start(); ?>
<?php
include('config.php');
//include('time_settings.php');
//include('update_activity.php');
$userid =  $_SESSION['username'];
$password = $_SESSION['password'];

if (isset($_REQUEST['view'])) {
	foreach ($_REQUEST['radiobox'] as $b_id) {

		$sql1 = "SELECT * FROM booking_tab WHERE BOOKING_NO ='$b_id'";
		$result1 = mysqli_query($conn, $sql1) or die("error" . mysqli_error($conn));
	}
	$row = mysqli_fetch_array($result1);

	$b_num = $row['BOOKING_NO'];
} else $b_num = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Room Booking</title>
	<link rel="stylesheet" href="css/screen00.css" type="text/css" media="screen" title="default" />
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
			$("#check_in").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
			$("#check_out").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
		});
	</script>
	<script type="text/javascript">
		function leave_date() {

			var check_in = encodeURIComponent(document.getElementById("check_in").value);
			var n_day = encodeURIComponent(document.getElementById("stay_days").value);
			if (check_in == "") {
				alert("Please select date");
				return;
			}
			if (n_day < 1) {
				alert("Please enter atleast one day to stay");
				return;
			}
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("check_out").value = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/leave_date.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("&check_in=" + check_in + "&n_day=" + n_day);
		}
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
		function search_r_booked() {
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
			xmlhttp.open("POST", "search_r_booked.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send();
		}
	</script>
	<script type="text/javascript">
		function search_record_room() {
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
			xmlhttp.open("POST", "ajax/search_record_room.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("pid=" + pid + "&type=" + type);
		}
	</script>
	<script type="text/javascript">
		function available_rooms() {

			var check_in = encodeURIComponent(document.getElementById("check_in").value);
			var n_day = encodeURIComponent(document.getElementById("stay_days").value);
			var check_out = encodeURIComponent(document.getElementById("check_out").value); < br / >

				if (n_day = 1) {
					leave_date();
					var check_out = encodeURIComponent(document.getElementById("check_out").value);

				}
			if (check_in == "") {
				alert("Please select the check_in");
				return;
			}
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("room").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/rooms_available.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("&check_in=" + check_in + "&check_out=" + check_out);
		}
	</script>
	<script type="text/javascript">
		function add_room() {

			var optionValue = document.getElementById("rooms");

			var htmlSelect = document.getElementById("b_room"); //HTML select box
			var selectBoxOption = document.createElement("option");
			selectBoxOption.value = optionValue.value; //set option value 
			selectBoxOption.text = optionValue.value; //set option display text 
			htmlSelect.add(selectBoxOption, null); //add created option to select box.	


		}
	</script>
	<script type="text/javascript">
		function del_b_room() {
			var htmlSelect = document.getElementById("b_room"); //HTML select box
			var optionToRemove = htmlSelect.options.selectedIndex; //get the selected index 
			htmlSelect.remove(optionToRemove); //remove option from list box


		}
	</script>

	<script type="text/javascript">
		function validateForm() {

			if ((document.getElementById("c_name").value || document.getElementById("c_client").value) == "") {
				alert("Please specify the customer name or select the corporate client");
				return false;
			}


			if ((document.getElementById("cnic").value) == "") {
				alert("Enter the customer CNIC!");
				return false;
			}
			if ((document.getElementById("tel").value) == "") {
				alert("Enter the customer cell number!");
				return false;
			}

			if ((document.getElementById("check_in").value) == "") {
				alert("Select the date!");
				return false;
			}
			if ((document.getElementById("b_room").options.value) == "") {
				alert("Please book atleast one room");
				return false;
			}
		}
	</script>
	<script type="text/javascript">
		function selectAll() {
			var box = document.getElementById("b_room");
			for (var i = 0; i < box.length; i++) {
				box[i].selected = true;
			}
		}
	</script>
</head>

<body>

	<div id="logo">
		<h1>Hotel Royal Palace </h1>
	</div>

	<div id="content">

		<div id="page-heading">
			<h1>&nbsp;</h1>
			<h1>Rooms Reservation</h1>
		</div>
		<div id="cont">
			<div id="step-holder">
				<div class="step-no">1</div>
				<div class="step-dark-left"><a href="rooms_booking.php">Reservation</a></div>
				<div class="step-dark-right">&nbsp;</div>
				<div class="step-no-off">2</div>
				<div class="step-light-left"><a href="#">Complete Bill</a></div>
				<div class="clear"></div>
			</div>

			<div id="content-inner">
				<?php
				$query2 = "SELECT * FROM booking_tab WHERE BOOKING_NO = '$b_num'";
				$result2 = mysqli_query($conn, $query2) or die('Query Failed00');
				if (mysqli_num_rows($result2) == 0) { ?>
					<form name="form" action="rooms_booking_2.php" method="post" onsubmit="return validateForm();">
						<?php
						$query3 = "SELECT max(BOOKING_NO) AS max_booking_no FROM booking_tab";
						$result3 = mysqli_query($conn, $query3);
						$row3 = mysqli_fetch_assoc($result3);
						$maxBookingNo = $row3['max_booking_no'];




						?>
						<table width="764" frame="hsides" bgcolor="#FFFFD2">

							<tr height="50">
								<td width="95">Booking no.</td>
								<td width="145"><input type="text" name="b_num" id="b_num" size="2" value="<?php echo $B_NUM = $row3 + 1; ?>" readonly="readonly" /></td>

								<td width="95">Booking Date:</td>
								<?php
								date_default_timezone_set('Asia/Karachi');
								$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
								$ttime = time(date("h"), date("i"), date("s"), 0, 0, 0);



								?>
								<td width="175"><input type="text" name="b_date" id="b_date" size="8" value="<?php echo date("Y-m-d", $tdate); ?>" readonly="readonly"></td>
								<td width="97">Booking Time: </td>
								<td width="129"> <input type="text" name="b_time" id="b_time" size="6" value="<?php echo date("h:i:s", $ttime); ?>" readonly="readonly" /></td>
							</tr>
						</table>
						<table width="763" bgcolor="#FFFFD2" frame="box">


							<tr height="65">
								<td width="119">Booking Status:</td>
								<td width="82"><input name="book_status" type="radio" value="C" /> Cancelled
								</td>
								<td width="88"><input name="book_status" type="radio" value="T" /> Tentative
								</td>
								<td width="454"><input name="book_status" type="radio" value="B" checked="checked" /> Booked</td>
							</tr>


						</table>
						<table width="763" bgcolor="#FFFFD2" frame="above">
							<tr height="20">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td width="104" height="28">Customer Name</td>
								<td width="316"><input type="text" name="c_name" id="c_name" size="15" /> </td>
								<td width="106"> Corperate Client </td>
								<td width="217"><select name="c_client" id="c_client">
										<option value="">Select the client </option>


									</select> </td>
							</tr>
							<tr>
								<td width="104" height="29">Cell Number</td>
								<td width="316"><input type="text" name="tel" id="tel" size="15" pattern="[0-9]+" /></td>

								<td width="106" height="31">CNIC</td>
								<td width="217"><input type="text" name="cnic" id="cnic" size="15" pattern="[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}" maxlength="15" /> </td>
							</tr>
						</table>
						<table width="762" bgcolor="#FFFFD2" frame="below">
							<tr>
								<td width="104">Check in</td>
								<td width="319">
									<input type="text" name="check_in" id="check_in" size="15" onchange="leave_date(); available_rooms();" />
									<input type="hidden" name="check_out" id="check_out" />

								</td>

								<td width="104">No. of Days</td>
								<td width="38" align="right">
									<input type="text" name="stay_days" id="stay_days" size="2" value="1" onchange="leave_date(); available_rooms();" onkeydown="leave_date(); available_rooms();" />
								</td>
								<td width="173">
									<input type="button" value=" /\ " onclick="this.form.stay_days.value++; leave_date(); available_rooms();" style="font-size:7px;margin:0;padding:0;width:20px;height:13px;"><br>

									<input type=button value=" \/ " onclick="this.form.stay_days.value--; leave_date(); available_rooms();" style="font-size:7px;margin:0;padding:0;width:20px;height:12px;">


								</td>

							</tr>

							<tr height="150">
								<td>
									<div align="justify">Booked Rooms</div>
								</td>
								<td>
									<select name="b_room[]" id="b_room" style=" min-width:120px; min-height:100px;" multiple>

									</select></br>
									<input name="del_room" type="button" value="Unbook Room" onclick="del_b_room();" style="background-color:#D69170; color:#91400F; font-weight:700;" />
								</td>
							</tr>
							<tr height="20">
								<td></td>
								<td>
								</td>
								<td>
								</td>
								<td>
								</td>
								<td></td>


							</tr>
						</table>
						</br>
						<table width="763">
							<tr>

								<td width="113" valign="top">
									<input type="submit" name="submit" value="Book Room(s)" style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="selectAll();">

								</td>
								<td width="116"><input name="search" type="button" value="Search" style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_r_booked();" /></td>
								<td width="518"><input name="exit" type="button" value="Exit" style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='reception_admin.php'" />
								</td>
							</tr>
						</table>
					</form>
			</div>
			<div id="room">
			</div>
		<?php



				} else {
		?>
			<form name="form" action="rooms_booking_2.php" method="post" onsubmit="return validateForm();">
				<table width="764" frame="hsides" bgcolor="#FFFFD2">

					<tr height="50">
						<td width="95">Booking no.</td>
						<td width="145"><input type="text" name="b_num" id="b_num" size="2" value="<?php echo $b_num; ?>" readonly="readonly" /></td>

						<td width="95">Booking Date:</td>
						<?php
						date_default_timezone_set('Asia/Karachi');
						$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
						$ttime = time(date("h"), date("i"), date("s"), 0, 0, 0);



						?>
						<td width="175"><input type="text" name="b_date" id="b_date" size="8" value="<?php echo $row['BOOKING_DATE']; ?>" readonly="readonly"></td>
						<td width="97">Booking Time: </td>
						<td width="129"> <input type="text" name="b_time" id="b_time" size="6" value="<?php echo $row['BOOKING_TIME']; ?>" readonly="readonly" /></td>
					</tr>
				</table>
				<table width="763" bgcolor="#FFFFD2" frame="box">


					<?php if ($row['BOOKING_FLAG'] == "B") { ?>
						<tr height="65">
							<td width="128">Booking Status:</td>
							<td width="103"><input name="book_status" type="radio" value="C" /> Cancelled
							</td>
							<td width="89"><input name="book_status" type="radio" value="T" /> Tentative
							</td>
							<td width="425"><input name="book_status" type="radio" value="B" checked="checked" /> Booked</td>
						</tr>
					<?php }  ?>
					<?php if ($row['BOOKING_FLAG'] == "C") { ?>
						<tr height="65">
							<td width="128">Booking Status:</td>
							<td width="103"><input name="book_status" type="radio" value="C" checked="checked" /> Cancelled
							</td>
							<td width="89"><input name="book_status" type="radio" value="T" /> Tentative
							</td>
							<td width="425"><input name="book_status" type="radio" value="B" /> Booked</td>
						</tr>
					<?php }  ?>
					<?php if ($row['BOOKING_FLAG'] == "T") { ?>
						<tr height="65">
							<td width="128">Booking Status:</td>
							<td width="103"><input name="book_status" type="radio" value="C" /> Cancelled
							</td>
							<td width="89"><input name="book_status" type="radio" value="T" checked="checked" /> Tentative
							</td>
							<td width="425"><input name="book_status" type="radio" value="B" checked="checked" /> Booked</td>
						</tr>
					<?php }  ?>


				</table>
				<table width="763" bgcolor="#FFFFD2" frame="above">
					<tr height="20">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td width="104" height="28">Customer Name</td>
						<td width="316"><input type="text" name="c_name" id="c_name" size="15" value="<?php echo $row['CUSTOMER_NAME']; ?>" /> </td>
						<td width="106"> Corperate Client </td>
						<td width="217"><select name="c_client" id="c_client">
								<option value="">Select the client </option>


							</select> </td>
					</tr>
					<tr>
						<td width="104" height="29">Cell Number</td>
						<td width="316"><input type="text" name="tel" id="tel" size="15" pattern="[0-9]+" value="<?php echo $row['CUSTOMER_CELL_NO']; ?>" /></td>

						<td width="106" height="31">CNIC</td>
						<td width="217"><input type="text" name="cnic" id="cnic" size="15" pattern="[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}" maxlength="15" value="<?php echo $row['CUSTOMER_CNIC']; ?>" /> </td>
					</tr>
				</table>
				<table width="762" bgcolor="#FFFFD2" frame="below">
					<tr>
						<td width="104">Check in</td>
						<td width="319">
							<input type="text" name="check_in" id="check_in" size="15" onchange="leave_date(); available_rooms();" value="<?php echo $row['CHECK_IN_DATE']; ?>" />
							<input type="hidden" name="check_out" id="check_out" value="<?php echo $row['LEAVING_DATE']; ?>" />

						</td>

						<td width="104">No. of Days</td>
						<td width="38" align="right">
							<input type="text" name="stay_days" id="stay_days" size="2" value="<?php echo $row['NO_OF_DAYS']; ?>" onchange="leave_date(); available_rooms();" onkeydown="leave_date(); available_rooms();" />
						</td>
						<td width="173">
							<input type="button" value=" /\ " onclick="this.form.stay_days.value++; leave_date(); available_rooms();" style="font-size:7px;margin:0;padding:0;width:20px;height:13px;"><br>

							<input type=button value=" \/ " onclick="this.form.stay_days.value--; leave_date(); available_rooms();" style="font-size:7px;margin:0;padding:0;width:20px;height:12px;">


						</td>

					</tr>

					<tr height="150">
						<td>
							<div align="justify">Booked Rooms</div>
						</td>
						<td>
							<select name="b_room[]" id="b_room" style="min-width:120px; min-height:100px;" multiple>
								<?php
								$sql1 = "SELECT ROOM_ID FROM booking_history_tab WHERE BOOKING_NO = $b_num";
								$result1 = mysqli_query($conn, $sql1);
								while ($row1 = mysqli_fetch_array($result1)) {
								?>
									<option value="<?php echo "Room # " . $row1['ROOM_ID']; ?>">
										<?php echo "Room # " . $row1['ROOM_ID']; ?>
									</option>
								<?php
								}
								?>
							</select>
							</br>
							<input name="del_room" type="button" value="Unbook Room" onclick="del_b_room();" style="background-color:#D69170; color:#91400F; font-weight:700;" />
						</td>
					</tr>
					<tr height="20">
						<td></td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
						<td></td>


					</tr>
				</table>
				</br>
				<table width="763">
					<tr>
						<td width="98">
							<input type="submit" name="updated1" value="Update" style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="selectAll();">

						</td>
						<td width="59"><input name="search" type="button" value="Search" style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_r_booked();" /></td>
						<td width="590"><input name="exit" type="button" value="Exit" style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='reception_admin.php'" />
						</td>
					</tr>
				</table>
			</form>

		</div>
		<div id="room">
			<?php
					$s_date = $row['CHECK_IN_DATE'];
					$e_date = $row['LEAVING_DATE'];
					if ($e_date == "") {
						$e_date = $s_date;
					}
			?>
			<table height="540" border="0">
				<tr>
					<td height="20">
						<div align="justify">
							<h2><strong>Available Rooms</strong></h2>
						</div>
					</td>
				</tr>
				<tr>
					<td height="486">
						<div align="justify">
							<select name="rooms" id="rooms" size="30">
								<?php
								$query1 = "SELECT * FROM rooms_tab";
								$result1 = mysqli_query($conn, $query1);
								while ($ans1 = mysqli_fetch_array($result1)) {
									$rm = $ans1['ROOM_ID'];
									$qq = "SELECT * FROM booking_history_tab WHERE booking_history_tab.ROOM_ID = '$rm'";
									$rr = mysqli_query($conn, $qq);
									$aa = mysqli_fetch_array($rr);
									if ($aa == "") {
										$id = $ans1['ROOM_TYPE_ID'];
										$query2_1 = "SELECT * FROM room_type_tab WHERE ROOM_TYPE_ID= '$id'";
										$result2_1 = mysqli_query($conn, $query2_1);
										$ans2_1 = mysqli_fetch_array($result2_1);
										$query4 = "SELECT `CHARGES_ON_DATE` FROM `room_charges_history` WHERE `ROOM_TYPE_ID` = $id";
										$result4 = mysqli_query($conn, $query4);
										$row4 = mysqli_fetch_array($result4);
										$charges = $row4['CHARGES_ON_DATE'];
								?>
										<option value="<?php echo "Room #" . $ans1['ROOM_NO']; ?>">
											<?php echo "Room # " . $ans1['ROOM_NO'] . "-" . $ans2_1['ROOM_TYPE_TITLE'] . " (Rs/-" . $charges . ")"; ?>
										</option>
										<?php
									} else if ($aa != "") {
										$query2 = "SELECT * FROM booking_history_tab WHERE booking_history_tab.ROOM_ID = '$rm' AND 
             ((CHECK_IN_DATE > '$s_date' AND CHECK_IN_DATE > '$e_date') 
             OR (CHECK_OUT_DATE < '$s_date' AND CHECK_OUT_DATE < '$e_date'))";
										$result2 = mysqli_query($conn, $query2);
										$ans2 = mysqli_fetch_array($result2);
										if ($ans2 != "") {
											$id = $ans1['ROOM_TYPE_ID'];
											$query2_1 = "SELECT * FROM room_type_tab WHERE ROOM_TYPE_ID= '$id'";
											$result2_1 = mysqli_query($conn, $query2_1);
											$ans2_1 = mysqli_fetch_array($result2_1);
											$query4 = "SELECT `CHARGES_ON_DATE` FROM `room_charges_history` WHERE `ROOM_TYPE_ID` = $id";
											$result4 = mysqli_query($conn, $query4);
											$row4 = mysqli_fetch_array($result4);
											$charges = $row4['CHARGES_ON_DATE'];
										?>
											<option value="<?php echo "Room #" . $ans1['ROOM_NO']; ?>">
												<?php echo "Room # " . $ans1['ROOM_NO'] . "-" . $ans2_1['ROOM_TYPE_TITLE'] . " (Rs/-" . $charges . ")"; ?>
											</option>
								<?php
										}
									}
								}
								?>
							</select>
							</br>
							<input name="add_dish" type="button" value="Book Room" onclick="add_room();" height="55" style=" background-color:#D69170; color:#91400F; font-weight:700;" />
						</div>


					</td>
				</tr>

				<tr>
					<td height="26">
						<div align="justify">

						</div>
					</td>
				</tr>
			</table>
		</div>
	<?php
				}
	?>
	<div id='overlay' class='overlay'></div>
	<div id="new_popup" class="new_popup">
		<a href=javascript:close_new_Popup()><img width=25 height=25 align="right" SRC=images/remove.png alt=Delete /></a>
		<div id="data_popup">
		</div>
	</div>
	</div>
	</div>
</body>

</html>