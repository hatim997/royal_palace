<?php session_start();
include('config.php');
//include('time_settings.php');
//include('time_calculation.php');
//include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Royal Palace</title>

	<meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. " Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
	<meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />

	<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

	<link href="templatemo_style16.css" rel="stylesheet" type="text/css" />


	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css" />

	<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
	<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

	<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
	<style type="text/css">
		.style1 {
			color: #013c54
		}

		.style8 {
			color: #FF0000;
			font-style: italic;
		}

		.red {
			color: #F00;
			font-size: x-large;
			font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
			font-weight: bold;
		}

		h2 {
			margin: 0px;
			padding: 0px 0px 0px 0px;
			font-size: 15px;
			font-weight: bold;
			color: #013c54;
		}
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
			color: #000;
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


</head>



<body>

	<!-- start of content -->
	<center>
		<div id="templatemo_content">
			<div id="main">
			</div><br>

			<form action="dish_item_delete1.php" name="form1" id="form1" method="post">
				<center>
					<div id="templatemo_content2">

						<table width="30%" border="0" cellpadding="0" cellspacing="0" style="font-size:24px; 
      font-family:Arial, Helvetica, sans-serif; ">
							<tr>
								<td width="489" align="left" style="text-align: justify">

									<p align="center">Deletion of Dish Item</p>
									<p align="center">&nbsp;</p>
								</td>
							</tr>
						</table>
					</div>
				</center>




				<center>
					<div id="templatemo_content2">

						<table width="40%" border="0" style="margin-top:40px;">

							<tr>
								<td>
									<center>Dish Item</center>
								</td>
								<td>
									<select name="dish_id" id="dish_id" class="tb9">
										<option value=""> Select Dish </option>
										<?php
										$query = "SELECT * FROM `dish_master_tab` ORDER BY DISH_NAME";
										$result = mysqli_query($conn, $query);

										while ($fetch_info = mysqli_fetch_assoc($result)) {
										?>
											<option value="<?php echo htmlspecialchars($fetch_info['DISH_ID']); ?>">
												<?php echo htmlspecialchars($fetch_info['DISH_ID']) . " &nbsp;&nbsp; " . htmlspecialchars($fetch_info['DISH_NAME']); ?>
											</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>

							<tr>
								<td>
									<center>Are you sure?</center>
								</td>
								<td>
									<select name="flag_yn" id="flag_yn" class="tb9">
										<option value=""> Select [Y/N] </option>
										<?php
										$query2 = "SELECT * FROM `confirm_tab`";
										$result2 = mysqli_query($conn, $query2);

										while ($fetch_info2 = mysqli_fetch_assoc($result2)) {
										?>
										<option value="<?php echo htmlspecialchars($fetch_info2['CONFIRM_ID']); ?>">
											<?php echo htmlspecialchars($fetch_info2['CONFIRM_TITLE']); ?>
										</option>
										<?php } ?>
									</select>
								</td>
							</tr>

							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>
							<tr></tr>

							<tr>
								<td>&nbsp;</td>

								<td>
									<?php
									if ($userid == 'yasir' || $userid == 'nasir') {
									?>
										<a href="banq_admin.php"><img src="images/back.png" width="37px" height="37px"
												style="border:double; border-color: #BD7509;" title="Back to Previous form" /></a>
									<?php
									} else {
									?>

										<a href="banq_emp.php"><img src="images/back.png" width="37px" height="37px"
												style="border:double; border-color: #BD7509;" title="Back to Previous form" /></a>
									<?php
									}
									?>

									<a href=""> <input type="image" src="images/crosses.png" width="37px" height="37px"
											style="border:double; border-color: #BD7509;" title="Delete Dish" /> </a>

									<!--<input type="submit" class="button" name="Submit" value="Submit"  /> -->

								</td>
							</tr>



						</table>



			</form>
		</div>
	</center>

</body>

</html>