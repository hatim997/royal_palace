<?php
session_start(); ?>
<?php
include('config.php');
//include('time_settings.php');
//include('update_activity.php');
//$userid =  $_SESSION['username'];
//$password = $_SESSION['password'];
//search the record and view

$mem_id = $_POST['mem_id'];
$gym_type = $_POST['gym_type'];
$mem_date = $_POST['mem_date'];
$mem_type = $_POST['mem_type'];
$f_date = $_POST['f_date'];
$t_date = $_POST['t_date'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$father_name = $_POST['father_name'];
$husband_name = $_POST['husband_name'];
$dob = $_POST['dob'];
$father_name = $_POST['father_name'];
$husband_name = $_POST['husband_name'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$svc_id = $_POST['svc_id'];
$CNIC = $_POST['CNIC'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$c_name = $_POST['c_name'];
$contact_no_off = $_POST['contact_no_off'];
$contact_no_res = $_POST['contact_no_res'];
$mob_no = $_POST['mob_no'];
$emergency_no = $_POST['emergency_no'];
$gym = $_POST['gym'];
$mem_fee = $_POST['mem_fee'];
$fee_flag = $_POST['fee_flag'];
$author_person = $_POST['author_person'];
$med_clear = $_POST['med_clear'];
$doc_name = $_POST['doc_name'];
$doc_contact = $_POST['doc_contact'];

$image_path = "images/gym_mem/" . $_FILES["image_path"]["name"];
$img1 = $_POST['img1'];
if ($_FILES["image_path"]["name"] == "") {
	$image_path = $img1;
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Web Saucer</title>
	<meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. " Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
	<meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />

	<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
	<link href="view.css" rel="stylesheet" type="text/css" />



	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


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


<div id="form_container">
	<div id="mydiv">
		<img src="images/header_report.jpg" width="998" height="210" align="absmiddle" />
		<form id="form1" class="appnitro" enctype="multipart/form-data" method="post" action="" onsubmit="return validateForm(); ">
			<div class="form_description" align="center">
				<h2>Gym</h2>
				<p>Membership Registration form</p>
			</div>

			<?php
			$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
			?>
			<table width="945">

				<tr>
					<td width="115">
						<label class="description" for="element_1">Membership ID </label>
					</td>
					<td width="190"><input name="1" type="text" value="<?php echo $mem_id; ?>" /> </td>

					<td width="107"><label class="description" for="element_31">Gym Type </label></td>

					<td width="201">

						<?php

						$s_id = $gym_type;
						$query = "SELECT * FROM GYM_TYPE_TAB WHERE GYM_TYPE_ID = '$s_id'";
						$result = mysqli_query($conn, $query) or die('Not Found:' . mysqli_error($conn));
						$num = mysqli_num_rows($result);
						$i = 0;
						while ($i < $num) {
							$row = mysqli_fetch_assoc($result);
							$gymid = $row["GYM_TYPE_ID"];
							$gym_detail = $row["GYM_TYPE_TITLE"];
						?>
							<input name="1" type="text" value="<?php echo $gym_detail; ?>" />
						<?php
							$i++;
						} ?>


					</td>

					<td width="112"> <label class="description" for="element_3">Date </label></td>
					<td width="192"><input name="1" type="text" value="<?php echo $mem_date; ?>" /></td>
				</tr>
				<tr>
					<td><label class="description" for="element_27">Membership Type </label></td>
					<td>
						<?php
						$m_id = $mem_type;

						$query1 = "SELECT * FROM GYM_MEMBERSHIP_PERIOD_TAB WHERE MEMBER_PERIOD_ID = '$m_id' ";
						$result1 = mysqli_query($conn, $query1) or die('Not Found:' . mysqli_error($conn));
						$num1 = mysqli_num_rows($result1);
						$i1 = 0;
						while ($i1 < $num1) {
							$row = mysqli_fetch_assoc($result1);
							$memid = $row["MEMBER_PERIOD_ID"];
							$mem_detail = $row["MEMBER_PERIOD_TITLE"];
						?>

							<input name="1" type="text" value="<?php echo $mem_detail; ?>" />

						<?php
							$i1++;
						}  // while loop ends here
						?>
					</td>
					<td><label class="description" for="element_18">From Date</label></td>
					<td><input name="1" type="text" value="<?php echo $f_date; ?>" />
					</td>

					<td><label class="description" for="element_19">To Date</label></td>
					<td><input name="1" type="text" value="<?php echo $t_date; ?>" /></td>
				</tr>
				<tr>
					<td><label class="description" for="element_4">First Name </label></td>
					<td>
						<input name="1" type="text" value="<?php echo $f_name; ?>" />
					</td>
					<td><label class="description" for="element_6">Last Name </label></td>
					<td>
						<input name="1" type="text" value="<?php echo $l_name; ?>" />
					</td>
					<td><label class="description" for="element_24">Member Image </label></td>

					<td><img src="<?php echo $image_path; ?>" height="114" width="114" /></td>
				</tr>
				<tr>
					<td>
						<label class="description" for="element_7">Father Name </label>
					</td>
					<td>
						<input name="1" type="text" value="<?php echo $father_name; ?>" />
					</td>
					<td>
						<label class="description" for="element_8">Husband Name </label>
					</td>
					<td>
						<input name="1" type="text" value="<?php echo $husband_name; ?>" />
					</td>
				</tr>
				<tr>
					<td><label class="description" for="element_9">Date of Birth </label></td>
					<td>
						<input name="1" type="text" value="<?php echo $dob; ?>" />
					</td>
					<td>
						<label class="description" for="element_5">Age </label>
					</td>

					<td> <input name="1" type="text" value="<?php echo $age ?>" /></td>
					<td>
						<label class="description" for="element_25">Gender </label>
					</td>
					<td>
						<?php if ($gender == "M") { ?>
							<input name="1" type="text" value="<?php echo "Male"; ?>" />
						<?php } else if ($gender == "F") {

						?>
							<input name="1" type="text" value="<?php echo "Female"; ?>" />
						<?php

						} ?>
					</td>
				</tr>
				<tr>
					<td><label class="description" for="element_10">SVC ID </label></td>
					<td>
						<input name="1" type="text" value="<?php echo $svc_id; ?>" />
					</td>
					<td>
						<label class="description" for="element_11">CNIC </label>
					</td>
					<td>
						<input name="1" type="text" value="<?php echo $CNIC; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label class="description" for="element_2">Address </label>
					</td>
					<td><textarea name="ad" cols="" rows=""><?php echo $address; ?></textarea>

					</td>


					<td>
						<label class="description" for="element_2">City </label>
					</td>
					<td><input name="1" type="text" value="<?php echo $city; ?>" />

					</td>
					<td>
						<label class="description" for="element_2">Country</label>
					</td>
					<td>

						<input name="1" type="text" value="<?php echo $country; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label class="description" for="element_12">Company Name </label>
					</td>
					<td>
						<input name="1" type="text" value="<?php echo $c_name; ?>" />
					</td>
				</tr>
			</table>
			<h3>Contact Details </h3>
			<table width="947">
				<tr>
					<td width="189">
						<label class="description" for="element_14">Office Contact No. </label>
					</td>
					<td width="162"> <input name="1" type="text" value="<?php echo $contact_no_off; ?>" />
					</td>
					<td width="166">
						<label class="description" for="element_15">Residential Contact No. </label>
					</td>
					<td width="162"> <input name="1" type="text" value="<?php echo $contact_no_res; ?>" />
					</td>

					<td width="76">
						<label class="description" for="element_13">Mobile No. </label>
					</td>
					<td width="164"><input name="1" type="text" value="<?php echo $mob_no; ?>" />
					</td>
				</tr>
				<tr>
					<td>
						<label class="description" for="element_16">In emergency, Contact No. </label>
					</td>
					<td><?php echo $emergency_no; ?>
					</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<table width="945">
				<tr>
					<td width="187"><label class="description" for="element_26"></label></td>
					<td width="164">
						<?php if ($gym == "Y") { ?>
							<input name="1" type="text" value="<?php echo "YES"; ?>" />
						<?php
						} else if ($gym == "N") {
						?>
							<input name="1" type="text" value="<?php echo "NO"; ?>" />
						<?php
						} ?>
					</td>
					<td width="167">
						<label class="description" for="element_20">Membership Fee </label>
					</td>
					<td width="159">
						<input name="1" type="text" value="<?php echo $mem_fee; ?>" />
					</td>
					<td width="84">
						<label class="description" for="element_28">Fee Status </label>
					</td>
					<td width="156">

						<?php if ($fee_flag == "P") {
						?>
							<input name="1" type="text" value="<?php echo "Paid"; ?>" />
						<?php
						} else if ($fee_flag == "U") {
						?>
							<input name="1" type="text" value="<?php echo "Unpaid"; ?>" />
						<?php
						} ?>
					</td>
				</tr>
			</table>
			<h3>Authorized By </h3>
			<table width="412">
				<tr>
					<td width="186">
						<label class="description" for="element_29">Relation </label>
					</td>
					<td width="214">
						<input name="1" type="text" value="<?php echo $author_person; ?>" />
					</td>
				</tr>
			</table>
			<h3>Medical Fitness </h3>
			<table width="947">
				<td width="184">
					<label class="description" for="element_30">Medical Clearance </label>
				</td>
				<td width="172">
					<?php if ($med_clear == "Y") {
					?>
						<input name="1" type="text" value="<?php echo "YES"; ?>" />
					<?php
					} else if ($med_clear == "N") {
					?>
						<input name="1" type="text" value="<?php echo "NO"; ?>" />
					<?php
					} ?>

					</select>
				</td>
				<td width="158">
					<label class="description" for="element_23">Doctor Name </label>
				</td>
				<td width="173"><input name="1" type="text" value="<?php echo $doc_name; ?>" />
				</td>
				<td width="82">
					<label class="description" for="element_22">Contact No: </label>
				</td>
				<td width="150"><input name="1" type="text" value="<?php echo $doc_contact; ?>" />
				</td>
				</tr>
			</table>
			<p>&nbsp;</p>
			<table width="947">
				<tr>
					<td width="204"></td>
					<td width="107"><textarea name="h_sign" rows="4" cols="15"></textarea></td>
					<td width="295"></td>
					<td width="107"><textarea name="m_sign" rows="4" cols="15"></textarea></td>
					<td width="210"></td>
				</tr>

				<tr>
					<td width="204"></td>
					<th width="107"><label>Member Signature</label></th>
					<td width="295"></td>
					<th width="107">Manager Signature</th>

				</tr>
			</table>
		</form>
	</div>
	<div id="bottomcolumn_box">
		<p></p>
		<input name="print" type="button" value="Print Out" onclick="printSelection(document.getElementById('mydiv'));return false" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
		<input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='gym_token.php'" />
	</div>



</div>


<!-- end of content -->

</body>

</html>