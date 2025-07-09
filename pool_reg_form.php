<?php session_start(); ?>
<?php
include('config.php');
//include('time_settings.php');
//include('update_activity.php');
//$userid =  $_SESSION['username'];
//$password = $_SESSION['password'];
//search the record and view
if (isset($_REQUEST['view'])) {
	foreach ($_REQUEST['radiobox'] as $m_id) {
		$sql1 = "SELECT * FROM pool_membership_master_tab WHERE MEMBERSHIP_ID = '$m_id'";
		$result1 = mysqli_query($conn, $sql1) or die("error" . mysqli_error($conn));
	}
	$row = mysqli_fetch_array($result1);


	$m_num = $row['MEMBERSHIP_ID'];
}

//submit the membership form
else if (isset($_REQUEST['submit'])) {
	$created_id = $_SESSION['username'];

	$created_on = $_POST['mem_date'];
	$mem_id = $_POST['mem_id'];
	$swim_type = $_POST['swim_type'];
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
	$swimmer = $_POST['swimmer'];
	$mem_fee = $_POST['mem_fee'];
	$fee_flag = $_POST['fee_flag'];
	$author_person = $_POST['author_person'];
	$med_clear = $_POST['med_clear'];
	$doc_name = $_POST['doc_name'];
	$doc_contact = $_POST['doc_contact'];
	/*Uploading Image*/
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$extension = end(explode(".", $_FILES["image_path"]["name"]));

	if ((($_FILES["image_path"]["type"] == "image/gif")
			|| ($_FILES["image_path"]["type"] == "image/jpeg")
			|| ($_FILES["image_path"]["type"] == "image/png")
			|| ($_FILES["image_path"]["type"] == "image/pjpeg"))
		&& ($_FILES["image_path"]["size"] < 204800)
		&& in_array($extension, $allowedExts)
	) {
		if ($_FILES["image_path"]["error"] > 0) {
			// echo "Return Code: " . $_FILES["image_path"]["error"] ;
		} else {

			$target = "images/pool_mem/" . $_FILES["image_path"]["name"];
			if (file_exists($target)) {
				// echo $_FILES["image_path"]["name"] . " already exists. ";
			} else {
				move_uploaded_file($_FILES["image_path"]["tmp_name"], $target);
				// echo "Image successfully stored in: " .$target;
			}
		}
	}
	$image_path = "images/pool_mem/" . $_FILES["image_path"]["name"];
	$query0 = "INSERT INTO pool_membership_master_tab (
    MEMBERSHIP_ID, SWIMMER_TYPE_ID, FIRST_NAME, LAST_NAME, FATHER_NAME,
    HUSBAND_NAME, DATE_OF_BIRTH, AGE_YEAR, GENDER, SVC_ID, CNIC_NO, ADDRESS, CITY, COUNTRY, COMPANY_NAME,
    OFFICE_FIXED_LINE, RESID_FIXED_LINE, MOBILE_NO, EMERGENCY_MOBILE, SWIMMER_FLAG, MEMBER_APPLIED_ON, MEMBER_PERIOD_ID, 
    PERIOD_FROM, PERIOD_TO, MEMBERSHIP_FEE, FEE_FLAG, AUTHORISED_BY, MEDICAL_CLEARANCE, DOCTOR_NAME, DOCTOR_MOBILE, 
    MEMBER_IMAGE, CREATED_ID, CREATED_ON
) VALUES (
    '$mem_id', '$swim_type', '$f_name', '$l_name', '$father_name',
    '$husband_name', '$dob', '$age', '$gender', '$svc_id', '$CNIC', '$address', '$city', '$country', '$c_name',
    '$contact_no_off', '$contact_no_res', '$mob_no', '$emergency_no', '$swimmer', '$mem_date', '$mem_type',
    '$f_date', '$t_date', '$mem_fee', '$fee_flag', '$author_person', '$med_clear', '$doc_name', '$doc_contact',
    '$image_path', '$created_id', '$created_on'
)";
	$result0 = mysqli_query($conn, $query0) or die("error" . mysqli_error($conn));

	$sql1 = "SELECT * FROM pool_membership_master_tab WHERE MEMBERSHIP_ID = '$mem_id'";
	$result1 = mysqli_query($conn, $sql1) or die("error" . mysqli_error($conn));
	$row = mysqli_fetch_array($result1);


	$m_num = $row['MEMBERSHIP_ID'];
}

//updation of record
else if (isset($_REQUEST['update'])) {
	$edited_id = $_SESSION['username'];

	$edited_on = $_POST['edit_date'];
	$mem_id = $_POST['mem_id'];
	$swim_type = $_POST['swim_type'];
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
	$swimmer = $_POST['swimmer'];
	$mem_fee = $_POST['mem_fee'];
	$fee_flag = $_POST['fee_flag'];
	$author_person = $_POST['author_person'];
	$med_clear = $_POST['med_clear'];
	$doc_name = $_POST['doc_name'];
	$doc_contact = $_POST['doc_contact'];
	/*Uploading Image*/
	$image_path = "images/pool_mem/" . $_FILES["image_path"]["name"];
	$img1 = $_POST['img1'];
	if ($_FILES["image_path"]["name"] == "") {
		$image_path = $img1;
	}
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$extension = end(explode(".", $_FILES["image_path"]["name"]));

	if ((($_FILES["image_path"]["type"] == "image/gif")
			|| ($_FILES["image_path"]["type"] == "image/jpeg")
			|| ($_FILES["image_path"]["type"] == "image/png")
			|| ($_FILES["image_path"]["type"] == "image/pjpeg"))
		&& ($_FILES["image_path"]["size"] < 204800)
		&& in_array($extension, $allowedExts)
	) {
		if ($_FILES["image_path"]["error"] > 0) {
			//    echo "Return Code: " . $_FILES["image_path"]["error"] ;
		} else {

			$target = "images/pool_mem/" . $_FILES["image_path"]["name"];
			if (file_exists($target)) {
				//   echo $_FILES["image_path"]["name"] . " already exists. ";
			} else {
				move_uploaded_file($_FILES["image_path"]["tmp_name"], $target);
				// echo  "Image successfully stored in: " . $target;
			}
		}
	}


	$query0 = "UPDATE pool_membership_master_tab SET 
	MEMBERSHIP_ID = '$mem_id',
	SWIMMER_TYPE_ID = '$swim_type',
	FIRST_NAME = '$f_name',
	LAST_NAME = '$l_name',
	FATHER_NAME = '$father_name',
	HUSBAND_NAME = '$husband_name',
	DATE_OF_BIRTH = '$dob',
	AGE_YEAR = '$age',
	GENDER = '$gender',
	SVC_ID = '$svc_id',
	CNIC_NO = '$CNIC',
	ADDRESS = '$address',
	CITY = '$city',
	COUNTRY = '$country',
	COMPANY_NAME = '$c_name',
	OFFICE_FIXED_LINE = '$contact_no_off',
	RESID_FIXED_LINE = '$contact_no_res',
	MOBILE_NO = '$mob_no',
	EMERGENCY_MOBILE = '$emergency_no',
	SWIMMER_FLAG = '$swimmer',
	MEMBER_APPLIED_ON = '$mem_date',
	MEMBER_PERIOD_ID = '$mem_type',
	PERIOD_FROM = '$f_date',
	PERIOD_TO = '$t_date',
	MEMBERSHIP_FEE = '$mem_fee',
	FEE_FLAG = '$fee_flag',
	AUTHORISED_BY = '$author_person',
	MEDICAL_CLEARANCE = '$med_clear',
	DOCTOR_NAME = '$doc_name',
	DOCTOR_MOBILE = '$doc_contact',
	MEMBER_IMAGE = '$image_path',
	EDITED_ID = '$edited_id',
	EDITED_ON = '$edited_on'
	WHERE MEMBERSHIP_ID = '$mem_id'";

	$result0 = mysqli_query($conn, $query0) or die("error" . mysqli_error($conn));

	$sql1 = "SELECT * FROM pool_membership_master_tab WHERE MEMBERSHIP_ID = '$mem_id'";
	$result1 = mysqli_query($conn, $sql1) or die("error" . mysqli_error($conn));
	$row = mysqli_fetch_array($result1);


	$m_num = $row['MEMBERSHIP_ID'];
} else $m_num = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Swimming Pool</title>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
	<script type="text/javascript" src="view.js"></script>
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
				dateFormat: "yy-mm-dd",
				yearRange: '-100:+0'
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
		function search_pool_member() {
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
			xmlhttp.open("POST", "search_pool_member.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send();
		}
	</script>
	<script type="text/javascript">
		function search_member_pool() {
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
			xmlhttp.open("POST", "ajax/search_member_pool.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("pid=" + pid + "&type=" + type);
		}
	</script>
	<script type="text/javascript">
		function validateForm() {

			if ((document.getElementById("mem_type").value && document.getElementById("swim_type2").value && document.getElementById("f_date").value &&
					document.getElementById("t_date").value && document.getElementById("f_name").value && document.getElementById("l_name").value &&
					document.getElementById("CNIC").value && document.getElementById("mob_no").value && document.getElementById("swimmer").value &&
					document.getElementById("fee_flag").value && document.getElementById("med_clear").value) == "") {
				alert("Necessary Fields must be entered");
				return false;
			}
		}
	</script>
	<script>
		function submitMe(obj) {
			if (obj.value == "Print") {
				document.getElementById('form1').action = 'pool_print_reg_form.php'
			}

			document.getElementById('form1').submit();
		}
	</script>
</head>

<body id="main_body">

	<img id="top" src="top.png" alt="">
	<div id="form_container">

		<h1><a></a></h1>
		<a style="color:#91400F; font-family: Tahoma; font-size: 22px; line-height: 24px; font-weight: normal;">Hotel Royal Palace</a>
		<?php
		$query2 = "SELECT * FROM pool_membership_master_tab WHERE MEMBERSHIP_ID = '$m_num'";
		$result2 = mysqli_query($conn, $query2) or die('Query Failed00');
		if (mysqli_num_rows($result2) == 0) {
		?>

			<form id="form1" class="appnitro" enctype="multipart/form-data" method="post" action="" onsubmit="return validateForm(); ">
				<div class="form_description">
					<h2>Swimming Pool</h2>
					<p>Member Registration form</p>
				</div>

				<?php
				$query3 = "SELECT MAX(MEMBERSHIP_ID) AS max_id FROM pool_membership_master_tab";
				$result3 = mysqli_query($conn, $query3);
				$row3 = mysqli_fetch_array($result3);
				$row3 = $row3['max_id'];
				$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
				?>

				<table width="945">

					<tr>
						<td width="134">
							<label class="description" for="element_1">Membership ID </label>
						</td>
						<td width="218"><input id="mem_id" name="mem_id" type="text" size="2" value="<?php echo $B_NUM = $row3 + 1; ?>" readonly="readonly" /> </td>

						<td width="103"><label class="description" for="element_31">Swimmer Type* </label></td>

						<td width="144">

							<select id="swim_type" name="swim_type">
								<option value="">Select Type</option>
								<?php
								$query = "SELECT * FROM swimmer_type_tab";
								$result = mysqli_query($conn, $query) or die('Not Found: ' . mysqli_error($conn));
								$num = mysqli_num_rows($result);
								$i = 0;
								while ($i < $num) {
									mysqli_data_seek($result, $i);
									$row = mysqli_fetch_array($result);
									$swimmerid = $row['SWIMMER_TYPE_ID'];
									$swimmer_detail = $row['SWIMMER_TYPE_TITLE'];
									echo '<option value="' . $swimmerid . '">' . $swimmer_detail . '</option>';
									$i++;
								}
								?>
							</select>


						</td>

						<td width="88"> <label class="description" for="element_3">Date </label></td>

						<td width="230"><input id="mem_date" name="mem_date" type="text" value="<?php echo date("Y-m-d", $tdate); ?>" /> </td>
					</tr>
					<tr>
						<td><label class="description" for="element_27">Membership Type* </label></td>
						<td>
							<select id="mem_type" name="mem_type">
								<option value="">Select Type</option>
								<?php
								$query1 = "SELECT * FROM pool_membership_period_tab";
								$result1 = mysqli_query($conn, $query1) or die('Not Found: ' . mysqli_error($conn));
								$num1 = mysqli_num_rows($result1);
								$i1 = 0;
								while ($i1 < $num1) {
									mysqli_data_seek($result1, $i1);
									$row1 = mysqli_fetch_array($result1);
									$memid = $row1['MEMBER_PERIOD_ID'];
									$mem_detail = $row1['MEMBER_PERIOD_TITLE'];
									echo '<option value="' . $memid . '">' . $mem_detail . '</option>';
									$i1++;
								}
								?>
							</select>

						</td>
						<td><label class="description" for="element_18">From Date* </label></td>
						<td><input id="f_date" name="f_date" type="text" value="" />
						</td>

						<td><label class="description" for="element_19">To Date* </label></td>
						<td> <input id="t_date" name="t_date" type="text" value="" /> </td>
					</tr>
					<tr>
						<td><label class="description" for="element_4">First Name* </label></td>
						<td>
							<input id="f_name" name="f_name" type="text" value="" />
						</td>
						<td><label class="description" for="element_6">Last Name* </label></td>
						<td>
							<input id="l_name" name="l_name" type="text" value="" />
						</td>
					</tr>
					<tr>
						<td><label class="description" for="element_24">Upload Image </label></td>

						<td><input id="image_path" name="image_path" class="element file" type="file" /></td>
					</tr>
					<tr>
						<td>
							<label class="description" for="element_7">Father Name </label>
						</td>
						<td>
							<input id="father_name" name="father_name" type="text" value="" />
						</td>
						<td>
							<label class="description" for="element_8">Husband Name </label>
						</td>
						<td>
							<input id="husband_name" name="husband_name" type="text" maxlength="255" value="" />
						</td>
					</tr>
					<tr>
						<td><label class="description" for="element_9">Date of Birth </label></td>
						<td>
							<input id="dob" name="dob" type="text" value="" />
						</td>
						<td>
							<label class="description" for="element_5">Age </label>
						</td>

						<td> <input id="age" name="age" type="text" value="" /> </td>
						<td>
							<label class="description" for="element_25">Gender </label>
						</td>
						<td><select id="gender" name="gender">
								<option value="">Choose Gender</option>
								<option value="M">Male</option>
								<option value="F">Female</option>

							</select>
						</td>
					</tr>
					<tr>
						<td><label class="description" for="element_10">SVC ID </label></td>
						<td>
							<input id="svc_id" name="svc_id" type="text" value="" />
						</td>
						<td>
							<label class="description" for="element_11">CNIC* </label>
						</td>
						<td>
							<input id="CNIC" name="CNIC" type="text" pattern="[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}" maxlength="15" />
						</td>
					</tr>
					<tr>
						<td>
							<label class="description" for="element_2">Address </label>
						</td>
						<td>
							<textarea name="address" id="address" cols="15"></textarea>

						</td>


						<td>
							<label class="description" for="element_2">City </label>
						</td>
						<td>
							<input id="city" name="city" value="" type="text">

						</td>
						<td>
							<label class="description" for="element_2">Country</label>
						</td>
						<td>
							<select class="element select medium" id="country" name="country">
								<option value="" selected="selected"></option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="Andorra">Andorra</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Côte d'Ivoire">Côte d'Ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Greece">Greece</option>
								<option value="Grenada">Grenada</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-Bissau">Guinea-Bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="North Korea">North Korea</option>
								<option value="South Korea">South Korea</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia">Micronesia</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montenegro">Montenegro</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines">Philippines</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint Lucia">Saint Lucia</option>
								<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia and Montenegro">Serbia and Montenegro</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Vatican City">Vatican City</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Yemen">Yemen</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>

							</select>

						</td>
					</tr>
					<tr>
						<td>
							<label class="description" for="element_12">Company Name </label>
						</td>
						<td>
							<input id="c_name" name="c_name" type="text" value="" />
						</td>
					</tr>
				</table>
				<li class="section_break">
					<h3>Contact Details</h3>
				</li>
				<li class="section_break"></li>
				<table width="947">
					<tr>
						<td width="189">
							<label class="description" for="element_14">Office Contact No. </label>
						</td>
						<td width="162">
							<input id="contact_no_off" name="contact_no_off" type="text" value="" />
						</td>
						<td width="166">
							<label class="description" for="element_15">Residential Contact No. </label>
						</td>
						<td width="162">
							<input id="contact_no_res" name="contact_no_res" type="text" value="" />
						</td>

						<td width="76">
							<label class="description" for="element_13">Mobile No.* </label>
						</td>
						<td width="164">
							<input id="mob_no" name="mob_no" type="text" value="" />
						</td>
					</tr>
					<tr>
						<td>
							<label class="description" for="element_16">In emergency, Contact No. </label>
						</td>
						<td>
							<input id="emergency_no" name="emergency_no" type="text" value="" />
						</td>
					</tr>
				</table>
				<li class="section_break"></li>

				<table width="945">
					<tr>
						<td width="187"><label class="description" for="element_26">Swimmer* </label></td>
						<td width="164">
							<select id="swimmer" name="swimmer">

								<option value="">Select the option</option>
								<option value="Y">Yes</option>
								<option value="N">No</option>

							</select>
						</td>
						<?php
						$dd = date("Y-m-d", $tdate);
						$query4 = "SELECT CHARGES_ID, CHARGES_TYPE_ID, SWIMMING_CHARGES FROM pool_charges_plan 
	WHERE CHARGES_ON_DATE <= '$dd' AND CHARGES_OFF_DATE >= '$dd' AND CHARGES_TYPE_ID = '1'";
						$result4 = mysqli_query($conn, $query4);
						$row4 = mysqli_fetch_array($result4);


						?>
						<td width="167">
							<label class="description" for="element_20">Membership Fee </label>
						</td>
						<td width="164">
							<input id="mem_fee" name="mem_fee" type="text" value="<?php echo $row4['SWIMMING_CHARGES']; ?>" />
							<input name="charge_id" type="hidden" value="<?php echo $row4['CHARGES_ID']; ?>" />
							<input name="charge_type_id" type="hidden" value="<?php echo $row4['CHARGES_TYPE_ID']; ?>" />
						</td>
						<td width="79">
							<label class="description" for="element_28">Fee Status* </label>
						</td>
						<td width="156">
							<select id="fee_flag" name="fee_flag">
								<option value="">Select the option</option>
								<option value="P">Paid</option>
								<option value="U">Unpaid</option>

							</select>
						</td>
					</tr>
				</table>
				<li class="section_break">
					<h3>Authorized By</h3>
				</li>
				<li class="section_break"></li>
				<table width="412">
					<tr>
						<td width="186">
							<label class="description" for="element_29">Relation </label>
						</td>
						<td width="214">
							<select id="author_person" name="author_person">
								<option value="">Select the Authorized Personel</option>
								<option value="Company">Company</option>
								<option value="Father">Father</option>
								<option value="Husband">Husband</option>
								<option value="Gaurdian">Gaurdian</option>

							</select>
						</td>
					</tr>
				</table>
				<li class="section_break">
					<h3>Medical Fitness</h3>
				</li>
				<li class="section_break"></li>
				<table width="947">
					<td width="184">
						<label class="description" for="element_30">Medical Clearance* </label>
					</td>
					<td width="172">
						<select id="med_clear" name="med_clear">
							<option value="">Select the option</option>
							<option value="Y">Yes</option>
							<option value="N">No</option>

						</select>
					</td>
					<td width="158">
						<label class="description" for="element_23">Doctor Name </label>
					</td>
					<td width="173">
						<input id="doc_name" name="doc_name" type="text" value="" />
					</td>
					<td width="82">
						<label class="description" for="element_22">Contact No: </label>
					</td>
					<td width="150">
						<input id="doc_contact" name="doc_contact" type="text" value="" />
					</td>
					</tr>
				</table>
				<li class="section_break"></li>
				<table>
					<tr>
						<td>

							<input class="button_text" type="submit" name="submit" value="Submit" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
						</td>
						<td width="116"><input name="print" type="button" value="Print" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="submitMe(this);" /></td>
						<td width="116"><input name="search" type="button" value="Search" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_pool_member();" /></td>

						<td width="518"><input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='pool_admin.php'" />
						</td>
					</tr>
				</table>
			</form>
		<?php
		} else {
		?>
			<form id="form2" class="appnitro" enctype="multipart/form-data" method="post" action="" onsubmit="validateForm();">
				<div class="form_description">
					<h2>Swimming Pool</h2>
					<p>Member Registration form</p>
				</div>

				<?php
				$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
				?>
				<table width="945">

					<tr>
						<td width="115">
							<label class="description" for="element_1">Membership ID </label>
						</td>
						<td width="167"><input id="mem_id" name="mem_id" type="text" size="2" value="<?php echo $row['MEMBERSHIP_ID']; ?>" readonly="readonly" /> </td>

						<td width="107"><label class="description" for="element_31">Swimmer Type* </label></td>

						<td width="218">

							<select id="swim_type" name="swim_type">
								<?php
								$s_id = $row['SWIMMER_TYPE_ID'];
								$query = "SELECT * FROM swimmer_type_tab WHERE SWIMMER_TYPE_ID = '$s_id'";
								$result = mysqli_query($conn, $query) or die('Not Found: ' . mysqli_error($conn));
								$num = mysqli_num_rows($result);
								$i = 0;
								while ($i < $num) {
									mysqli_data_seek($result, $i);
									$row_swim = mysqli_fetch_array($result);
									$swimmerid = $row_swim['SWIMMER_TYPE_ID'];
									$swimmer_detail = $row_swim['SWIMMER_TYPE_TITLE'];
									echo '<option value="' . $swimmerid . '">' . $swimmer_detail . '</option>';
									$i++;
								}
								?>
							</select>


						</td>

						<td width="81"> <label class="description" for="element_3">Date </label></td>
						<input id="edit_date" name="edit_date" type="hidden" value="<?php echo date("Y-m-d", $tdate); ?>" />
						<td width="229"><input id="mem_date" name="mem_date" type="text" value="<?php echo $row['MEMBER_APPLIED_ON']; ?>" /> </td>
					</tr>
					<tr>
						<td><label class="description" for="element_27">Membership Type* </label></td>
						<td>
							<select id="mem_type" name="mem_type">
								<option value="">Select Type</option>
								<?php
								$m_id = $row['MEMBER_PERIOD_ID'];

								$query1 = "SELECT * FROM pool_membership_period_tab";
								$result1 = mysqli_query($conn, $query1) or die('Not Found: ' . mysqli_error($conn));
								$num1 = mysqli_num_rows($result1);
								$i1 = 0;
								while ($i1 < $num1) {
									mysqli_data_seek($result1, $i1);
									$row1 = mysqli_fetch_array($result1);
									$memid = $row1['MEMBER_PERIOD_ID'];
									$mem_detail = $row1['MEMBER_PERIOD_TITLE'];

									if ($memid == $m_id) {
										echo '<option value="' . $memid . '" selected="selected">' . $mem_detail . '</option>';
									} else {
										echo '<option value="' . $memid . '">' . $mem_detail . '</option>';
									}
									$i1++;
								}
								?>
							</select>

						</td>
						<td><label class="description" for="element_18">From Date* </label></td>
						<td><input id="f_date" name="f_date" type="text" value="<?php echo $row['PERIOD_FROM']; ?>" />
						</td>

						<td><label class="description" for="element_19">To Date* </label></td>
						<td> <input id="t_date" name="t_date" type="text" value="<?php echo $row['PERIOD_TO']; ?>" /> </td>
					</tr>
					<tr>
						<td><label class="description" for="element_4">First Name* </label></td>
						<td>
							<input id="f_name" name="f_name" type="text" value="<?php echo $row['FIRST_NAME']; ?>" />
						</td>
						<td><label class="description" for="element_6">Last Name* </label></td>
						<td>
							<input id="l_name" name="l_name" type="text" value="<?php echo $row['LAST_NAME']; ?>" />
						</td>
						<td><label class="description" for="element_24">Member Image </label></td>

						<td><img src="<?php echo $row['MEMBER_IMAGE']; ?>" height="114" width="114" /></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><label class="description" for="element_24">New Image </label></td>

						<td><input id="image_path" name="image_path" class="element file" type="file" /></td>

						<input type="hidden" name="img1" value="<?php echo $row['MEMBER_IMAGE']; ?>" />

					</tr>
					<tr>
						<td>
							<label class="description" for="element_7">Father Name </label>
						</td>
						<td>
							<input id="father_name" name="father_name" type="text" value="<?php echo $row['FATHER_NAME']; ?>" />
						</td>
						<td>
							<label class="description" for="element_8">Husband Name </label>
						</td>
						<td>
							<input id="husband_name" name="husband_name" type="text" maxlength="255" value="<?php echo $row['HUSBAND_NAME']; ?>" />
						</td>
					</tr>
					<tr>
						<td><label class="description" for="element_9">Date of Birth </label></td>
						<td>
							<input id="dob" name="dob" type="text" value="<?php echo $row['DATE_OF_BIRTH']; ?>" />
						</td>
						<td>
							<label class="description" for="element_5">Age </label>
						</td>

						<td> <input id="age" name="age" type="text" value="<?php echo $row['AGE_YEAR']; ?>" /> </td>
						<td>
							<label class="description" for="element_25">Gender </label>
						</td>
						<td><select id="gender" name="gender">
								<option value="">Choose Gender</option>
								<?php if ($row['GENDER'] == "M") { ?>
									<option value="M" selected="selected">Male</option>
									<option value="F">Female</option>
								<?php } else if ($row['GENDER'] == "F") { ?>
									<option value="F" selected="selected">Female</option>
									<option value="M">Male</option>
								<?php } ?>



							</select>
						</td>
					</tr>
					<tr>
						<td><label class="description" for="element_10">SVC ID </label></td>
						<td>
							<input id="svc_id" name="svc_id" type="text" value="<?php echo $row['SVC_ID']; ?>" />
						</td>
						<td>
							<label class="description" for="element_11">CNIC* </label>
						</td>
						<td>
							<input id="CNIC" name="CNIC" type="text" pattern="[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}" maxlength="15" value="<?php echo $row['CNIC_NO']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label class="description" for="element_2">Address </label>
						</td>
						<td>
							<textarea name="address" id="address" cols="15"><?php echo $row['ADDRESS']; ?></textarea>

						</td>


						<td>
							<label class="description" for="element_2">City </label>
						</td>
						<td>
							<input id="city" name="city" value="<?php echo $row['CITY']; ?>" type="text">

						</td>
						<td>
							<label class="description" for="element_2">Country</label>
						</td>
						<td>
							<select class="element select medium" id="country" name="country">
								<option value="<?php echo $row['COUNTRY']; ?>" selected="selected"><?php echo $row['COUNTRY']; ?></option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="Andorra">Andorra</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								<option value="Botswana">Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Côte d'Ivoire">Côte d'Ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Greece">Greece</option>
								<option value="Grenada">Grenada</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-Bissau">Guinea-Bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="North Korea">North Korea</option>
								<option value="South Korea">South Korea</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia">Micronesia</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montenegro">Montenegro</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines">Philippines</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint Lucia">Saint Lucia</option>
								<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia and Montenegro">Serbia and Montenegro</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Vatican City">Vatican City</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Yemen">Yemen</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>

							</select>

						</td>
					</tr>
					<tr>
						<td>
							<label class="description" for="element_12">Company Name </label>
						</td>
						<td>
							<input id="c_name" name="c_name" type="text" value="<?php echo $row['COMPANY_NAME']; ?>" />
						</td>
					</tr>
				</table>
				<li class="section_break">
					<h3>Contact Details</h3>
				</li>
				<li class="section_break"></li>
				<table width="947">
					<tr>
						<td width="189">
							<label class="description" for="element_14">Office Contact No. </label>
						</td>
						<td width="162">
							<input id="contact_no_off" name="contact_no_off" type="text" value="<?php echo $row['OFFICE_FIXED_LINE']; ?>" />
						</td>
						<td width="166">
							<label class="description" for="element_15">Residential Contact No. </label>
						</td>
						<td width="162">
							<input id="contact_no_res" name="contact_no_res" type="text" value="<?php echo $row['RESID_FIXED_LINE']; ?>" />
						</td>

						<td width="76">
							<label class="description" for="element_13">Mobile No.* </label>
						</td>
						<td width="164">
							<input id="mob_no" name="mob_no" type="text" value="<?php echo $row['MOBILE_NO']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label class="description" for="element_16">In emergency, Contact No. </label>
						</td>
						<td>
							<input id="emergency_no" name="emergency_no" type="text" value="<?php echo $row['EMERGENCY_MOBILE']; ?>" />
						</td>
					</tr>
				</table>
				<li class="section_break"></li>

				<table width="945">
					<tr>
						<td width="187"><label class="description" for="element_26">Swimmer* </label></td>
						<td width="164">
							<select id="swimmer" name="swimmer">
								<option value="">Select the option</option>
								<?php if ($row['SWIMMER_FLAG'] == "Y") { ?>
									<option value="Y" selected="selected">Yes</option>
									<option value="N">No</option>
								<?php } else if ($row['SWIMMER_FLAG'] == "N") { ?>
									<option value="Y">Yes</option>
									<option value="N" selected="selected">No</option>
								<?php } ?>




							</select>
						</td>
						<td width="167">
							<label class="description" for="element_20">Membership Fee </label>
						</td>
						<td width="159">
							<input id="mem_fee" name="mem_fee" type="text" value="<?php echo $row['MEMBERSHIP_FEE']; ?>" />
						</td>
						<td width="84">
							<label class="description" for="element_28">Fee Status* </label>
						</td>
						<td width="156">
							<select id="fee_flag" name="fee_flag">
								<option value="">Select the option</option>
								<?php if ($row['FEE_FLAG'] == "P") { ?>
									<option value="P" selected="selected">Paid</option>
									<option value="U">Unpaid</option>
								<?php } else if ($row['FEE_FLAG'] == "U") { ?>
									<option value="P">Paid</option>
									<option value="U" selected="selected">Unpaid</option>
								<?php } ?>
							</select>
						</td>
					</tr>
				</table>
				<li class="section_break">
					<h3>Authorized By</h3>
				</li>
				<li class="section_break"></li>
				<table width="412">
					<tr>
						<td width="186">
							<label class="description" for="element_29">Relation </label>
						</td>
						<td width="214">
							<select id="author_person" name="author_person">
								<option value="<?php echo $row['AUTHORISED_BY']; ?>" selected="selected"><?php echo $row['AUTHORISED_BY']; ?></option>
								<option value="Company">Company</option>
								<option value="Father">Father</option>
								<option value="Husband">Husband</option>
								<option value="Gaurdian">Gaurdian</option>

							</select>
						</td>
					</tr>
				</table>
				<li class="section_break">
					<h3>Medical Fitness</h3>
				</li>
				<li class="section_break"></li>
				<table width="947">
					<td width="184">
						<label class="description" for="element_30">Medical Clearance* </label>
					</td>
					<td width="172">
						<select id="med_clear" name="med_clear">
							<option value="">Select the option</option>
							<?php if ($row['MEDICAL_CLEARANCE'] == "Y") { ?>
								<option value="Y" selected="selected">Yes</option>
								<option value="N">No</option>
							<?php } else if ($row['MEDICAL_CLEARANCE'] == "N") { ?>
								<option value="N" selected="selected">No</option>
								<option value="Y">Yes</option>

							<?php } ?>

						</select>
					</td>
					<td width="158">
						<label class="description" for="element_23">Doctor Name </label>
					</td>
					<td width="173">
						<input id="doc_name" name="doc_name" type="text" value="<?php echo $row['DOCTOR_NAME']; ?>" />
					</td>
					<td width="82">
						<label class="description" for="element_22">Contact No: </label>
					</td>
					<td width="150">
						<input id="doc_contact" name="doc_contact" type="text" value="<?php echo $row['DOCTOR_MOBILE']; ?>" />
					</td>
					</tr>
				</table>
				<li class="section_break"></li>
				<table>
					<tr>
						<td>

							<input class="button_text" type="submit" name="update" value="Update" style="background:#91400F; height:30px; width:115px; font-weight:700;" />
						</td>
						<td><input name="new_member" type="button" value="New Member" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='pool_reg_form.php'" /></td>
						<td width="116"><input name="print" type="button" value="Print" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="submitMe(this);" /></td>
						<td width="116"><input name="search" type="button" value="Search" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="search_pool_member();" /></td>
						<td width="518"><input name="exit" type="button" value="Exit" style="background:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='pool_admin.php'" />
						</td>
					</tr>
				</table>
			</form>
		<?php } ?>
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