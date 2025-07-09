<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Royal Palace</title>
	<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
	<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

	<script language="JavaScript">
		new tcal({
			'formname': 'dish',
			'controlname': 'charges_on_date'
		});
	</script>

	<script language="JavaScript">
		new tcal({
			'formname': 'dish',
			'controlname': 'charges_off_date'
		});
	</script>

	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	<style type="text/css">
		<!--
		.style1 {
			color: #013c54
		}

		.style8 {
			color: #FF0000;
			font-style: italic;
		}

		h2 {
			margin: 0px;
			padding: 0px 0px 0px 0px;
			font-size: 15px;
			font-weight: bold;
			color: #013c54;
		}
		-->
	</style>
	<style type="text/css">
		/*- Menu 2--------------------------- */

		#menu2 {
			width: 225px;
			margin: -20px;
			border-color: #D8D5D1;

		}

		#menu2 li a {
			voice-family: "\"}\"";
			voice-family: inherit;
			height: 18px;
			text-decoration: none;
		}

		#menu2 li a:link,
		#menu2 li a:visited {
			color: #013c54;
			display: block;
			background: url(EBmenus/Vertical%20Menus/menu2.png);
			padding: 4px 0 0 30px;
		}

		#menu2 li a:hover {
			color: #FFFFFF;
			background: url(EBmenus/Vertical%20Menus/menu2.png) 0 -32px;
			padding: 8px 0 0 32px;
		}

		.style3 {
			color: #013c54;
			font-size: 12px;
		}
	</style>

	<style>
		body {
			background-color: #eeeeee;
			padding: 0;
			margin: 0 auto;

			font-size: 12px;
		}
	</style>


	<script type="text/javascript">
		function change_status(c_status) {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);

			if (c_status == "") {
				//document.getElementById("info").innerHTML="";
				alert("Please select correct status.");
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
					document.getElementById("status_c").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/change_status.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("c_status=" + c_status);
		}
	</script>

	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<script type="text/javascript">
		var clicked = false;

		function CheckBrowser() {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
			if (clicked == false) {
				//alert("Browser closed");
				var xmlhttp;

				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else { // code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("none").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST", "logout.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send();
			} // if ends here
		}
	</script>

</head>

<!-- end of left column -->

<!-- start of middle column -->

<div id="templatemo_middle_column">

	<h1 class="style1" style="font-size:18px;">New Dish &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br>


	<!--   START  of Dish ID query   -->
	<?php
	$query = "SELECT max(DISH_ID) FROM dish_master_tab";
	$result = mysqli_query($conn, $query);
	$num1 = mysqli_num_rows($result);

	$i = 0;
	while ($i < $num1) {
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_assoc($result);
		$dish_id = $row['max(DISH_ID)'];
		$i++;
	}

	$dish_id++;
	?>


	<!--   END  of Dish ID query   -->

	<?php
	if (isset($_POST['submit'])) {
		//$time = date('H:i:s');
		//$date_time = date('Y-m-d H:i:s');
		$created_id = $_SESSION['username'];
		$rest_id = $_SESSION['restid'];
		//$kit_id = $_SESSION['kitid'];
		$kitchen = $_POST['kitchen'];
		$food = $_POST['food'];
		$dish = $_POST['dish'];
		$dish_detail = $_POST['dish_detail'];
		$serving = $_POST['serving'];
		$hour = $_POST['hour'];
		$min = $_POST['min'];
		$charges = $_POST['charges'];
		$charges_on_date = $_POST['charges_on_date'];
		$charges_off_date = $_POST['charges_off_date'];
		$cook_time = $hour . ":" . $min;

		$query = "SELECT max(DISH_ID) FROM dish_master_tab";
		$result = mysqli_query($conn, $query);
		$num1 = mysqli_num_rows($result);

		$i = 0;
		while ($i < $num1) {
			mysqli_data_seek($result, $i);
			$row = mysqli_fetch_assoc($result);
			$dish_id = $row['max(DISH_ID)'];
			$i++;
		}

		$dish_id++;

		$query = "INSERT INTO dish_master_tab VALUES(
    '1','1','20','$dish_id','$dish','$dish_detail','1','00:12:00','99',
    '$created_id','$date_time',' ','00:00:00')";

		mysqli_query($conn, $query) or die('Insertion Failed: ' . mysqli_error($conn));


		echo '<h4 class="style9">Dish Successfully Added </h4>';

	?>


		<form name="dish" method="post" action="" id="dish" onsubmit="return validate();">
			<table width="450" align="center" border="0" cellspacing="0" cellpadding="0">


				<!--   START  of Dish ID query   -->
				<?php
				$query = "SELECT max(DISH_ID) FROM dish_master_tab";
				$result = mysqli_query($conn, $query);
				$num1 = mysqli_num_rows($result);

				$i = 0;
				while ($i < $num1) {
					mysqli_data_seek($result, $i);
					$row = mysqli_fetch_assoc($result);
					$dish_id = $row['max(DISH_ID)'];
					$i++;
				}

				$dish_id++;
				?>

				<!--   END  of Dish ID query   -->

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Dish ID </td>
					<td><span class="style3" style="font-size:14px;"><?php echo $dish_id; ?></span><br></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>

				<!--  END     Dish ID   -->



				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Dish Name</td>
					<td><input type="text" name="dish" style=" min-width:300px" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>


				<tr>
					<td>Dish Detail</td>
					<td><input type="text" name="dish_detail" style=" min-width:300px" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>


				<!--   START Cooking Time    -->

				<!--   END   Charges on Date and Charges Off Date   -->


				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input class="button" align="left" onclick="return validate();" name="submit" style="cursor:pointer" type="submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
				</tr>
			</table>
		</form>
	<?php
	} //if ends here
	else {
	?>


		<form name="dish" method="post" action="" id="dish" onsubmit="return validate();">
			<table width="450" align="center" border="0" cellspacing="0" cellpadding="0">
				<tr>

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td>Dish ID </td>
					<td><span class="style3" style="font-size:14px;"><?php echo $dish_id; ?></span><br></td>
				</tr>

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>

				<!--  END     Dish ID   -->





				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Dish Name</td>
					<td><input type="text" name="dish" style=" min-width:300px" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Dish Detail</td>
					<td><input type="text" name="dish_detail" style=" min-width:300px" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>




				<tr>
					<td>&nbsp;</td>
					<td><input class="button" align="left" onclick="return validate();" name="submit" style="cursor:pointer" type="submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
				</tr>
			</table>
		</form>

	<?php
	} //else ends here
	?>
	<br>
</div>
<!-- end of middle column -->

<!-- start of right column -->

<div id="templatemo_right_column" style="padding-top: 1px;">
</div>

<!-- end of right column -->


<!-- end of content -->

<script type="text/javascript">
	swfobject.registerObject("FlashID3");
</script>
</body>

</html>