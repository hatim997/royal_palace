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
	<title>Web Saucer</title>
	<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
	<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />

	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

	<script language="JavaScript">
		new tcal({
			'formname': 'expense',
			'controlname': 'expense_date'
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
		function show_expense_item(value) {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);

			if (value == "") {
				document.getElementById("qty_inhand").innerHTML = "";
				//alert("Please select correct status.");
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
					document.getElementById("qty_inhand").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/show_expense_item.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("value=" + value);
		}
	</script>

	<script type="text/javascript">
		function payment_type(value) {
			//var p_mode = encodeURIComponent(document.getElementById("pay_mode").value);
			//alert(value);

			var xmlhttp;
			/*
		if (value == "" || value == "C")
  		{
			document.getElementById("mode").innerHTML="";
			//alert(advance);
			return;
  		}
		*/
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
			xmlhttp.open("POST", "ajax/payment_type.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("value=" + value);
		}
	</script>

	<script type="text/javascript">
		function validate(form) {
			//alert("Hello 1");
			var voucher = encodeURIComponent(document.getElementById("voucher").value);
			var expense_type = encodeURIComponent(document.getElementById("expense_type").value);
			var item_type = encodeURIComponent(document.getElementById("expense_item").value);
			var amount = encodeURIComponent(document.getElementById("amount").value);
			var amount_type = encodeURIComponent(document.getElementById("amount_type").value);
			//alert("Hello 2");
			if (parseInt(amount) <= 0) {
				alert("Please enter Correct Amount.");
				return;
			}
			//alert("Hello 3");
			var director = encodeURIComponent(document.getElementById("director").value);
			var date = encodeURIComponent(document.getElementById("expense_date").value);
			var detail = encodeURIComponent(document.getElementById("detail").value);
			var pay_mode = encodeURIComponent(document.getElementById("pay_mode").value);
			var closing_date = encodeURIComponent(document.getElementById("last_closing").value);
			//alert("Hello 4");

			if (expense_type == "" || amount == "" || amount_type == "" || director == "" || date == "" || pay_mode == "") {
				alert("Please Enter Information in required fields");
				return;
			}
			if (pay_mode == "C") {
				var bank = 0;
				var account_no = 0;
			} else {
				var bank = encodeURIComponent(document.getElementById("bank").value);
				var account_no = encodeURIComponent(document.getElementById("account_no").value);
				if (bank == "" || account_no == "") {
					alert("Please Enter Information in required fields");
					return;
				}
			}
			if (date <= closing_date) {
				alert("It is beyond closing date " + closing_date);
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
					var frm_elements = form.elements;
					for (i = 0; i < frm_elements.length; i++) {
						field_type = frm_elements[i].type.toLowerCase();
						switch (field_type) {
							case "text":
							case "password":
							case "textarea":
								//case "hidden":
								frm_elements[i].value = "";
								break;
							case "radio":
							case "checkbox":
								if (frm_elements[i].checked) {
									frm_elements[i].checked = false;
								}
								break;
							case "select-one":
							case "select-multi":
								frm_elements[i].selectedIndex = 0;
								break;
							default:
								break;
						}
					}
					//document.getElementById("inventory").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/add_expense_transaction.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("voucher=" + voucher + "&expense_type=" + expense_type + "&item_type=" + item_type + "&amount=" + amount + "&amount_type=" + amount_type + "&director=" + director + "&date=" + date + "&detail=" + detail + "&pay_mode=" + pay_mode + "&bank=" + bank + "&account_no=" + account_no);
		}
	</script>

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

<body onclick="clicked=true;" onbeforeunload="CheckBrowser()">
	<div id="templatemo_container">



		<?php include("includes/header2.php"); ?>



		<!-- start of content -->

		<div id="templatemo_content">

			<!-- start of left column -->

			<div id="templatemo_left_column">
				<h2 style="font-size:18px;">
					<BLINK>&nbsp;&nbsp;<?php echo $_SESSION['username']; ?></BLINK>
				</h2>
				<div id="leftcolumn_box01">
					<div class="leftcolumn_box01_top">
						<h2 style="color:#FFF;">Working Options</h2>
					</div>
					<div class="leftcolumn_box01_bottom">
						<div id="menu2" class="form_row">
							<ul>
								<li><a href="login.php">Back to Main</a></li>
								<li><a href="logout.php">Logout</a></li><br>

							</ul>
						</div>
					</div>
				</div>

				<div id="abc1">
					<div class="abc">
						<object id="FlashID3" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="225" height="40">
							<param name="movie" value="images/updates.swf" />
							<param name="quality" value="high" />
							<param name="wmode" value="opaque" />
							<param name="swfversion" value="9.0.45.0" />
							<!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
							<param name="expressinstall" value="Scripts/expressInstall.swf" />
							<!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
							<!--[if !IE]>-->
							<object type="application/x-shockwave-flash" data="images/updates.swf" width="225" height="40">
								<!--<![endif]-->
								<param name="quality" value="high" />
								<param name="wmode" value="opaque" />
								<param name="swfversion" value="9.0.45.0" />
								<param name="expressinstall" value="Scripts/expressInstall.swf" />
								<!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
								<div>
									<h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
									<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
								</div>
								<!--[if !IE]>-->
							</object>
							<!--<![endif]-->
						</object>
						<br><?php include("includes/right.php"); ?><br><br>
					</div>
				</div>

				<div id="imagebutton"></div>

			</div>

			<!-- end of left column -->

			<!-- start of middle column -->

			<div id="templatemo_middle_column">

				<h1 class="style1" style="font-size:16px;">Expense Management&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
				<br>

				<?php

				$query = "SELECT * FROM expense_closing_tab";
				$result = mysqli_query($conn, $query) or die("Failed :" . mysqli_error($conn));
				$num = mysqli_num_rows($result);
				$i = 0;
				while ($i < $num) {
					$row = mysqli_fetch_assoc($result);
					$closing_date = $row["LAST_EXPENSE_CLOSING_DATE"];
					$i++;
				}

				?>


				<div id="inventory">
					<form name="expense" id="expense" method="post">
						<input type="hidden" id="last_closing" name="last_closing" value="<?php echo $closing_date; ?>" />
						<table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="140">Voucher No:</td>
								<td width="210"><input type="text" id="voucher" name="voucher" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="140">Expense Type:</td>
								<td width="210"><select id="expense_type" name="expense_type" onchange="show_expense_item(this.value)">
										<option value="">Select Expense Type</option>
										<?php

										$query = "SELECT * FROM expense_type_tab ORDER BY EXPENSE_TYPE_NAME ASC";
										$result = mysqli_query($conn, $query) or die("Failed :" . mysqli_error($conn));
										$num = mysqli_num_rows($result);
										$i = 0;
										while ($i < $num) {
											$row = mysqli_fetch_assoc($result);
											$ingredient_name = $row["EXPENSE_TYPE_NAME"];
											$ingredient_id = $row["EXPENSE_TYPE_ID"];
										?>

											<option value="<?php echo $ingredient_id; ?>"><?php echo $ingredient_name; ?></option>
										<?php

											$i++;
										}  // while loop ends here

										?>
									</select></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>

						<div id="qty_inhand">

						</div>

						<table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="140">Amount:</td>
								<td width="210"><input type="text" id="amount" name="amount" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="140">Amount Type:</td>
								<td width="210"><select id="amount_type" name="amount_type">
										<option value="">Select Type</option>
										<option value="C">Credit</option>
										<option value="D">Debit</option>
									</select></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="140">Expense Pocket:</td>
								<td width="210"><select id="director" name="director">
										<option value="">Expense Pocket</option>
										<option value="0">None</option>
										<?php

										$query = "SELECT * FROM directors_tab WHERE DIRECTOR_ID != '0' ORDER BY DIRECTOR_NAME ASC";
										$result = mysqli_query($conn, $query) or die("Failed :" . mysqli_error($conn));
										$num = mysqli_num_rows($result);
										$i = 0;
										while ($i < $num) {
											$row = mysqli_fetch_assoc($result);
											$ingredient_name = $row["DIRECTOR_NAME"];
											$ingredient_id = $row["DIRECTOR_ID"];
										?>

											<option value="<?php echo $ingredient_id; ?>"><?php echo $ingredient_name; ?></option>
										<?php

											$i++;
										}  // while loop ends here

										?>
									</select></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td width="140">Date:</td>
								<td width="210"><input type="text" class="tcal" id="expense_date" name="expense_date" /></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="140">Detail</td>
								<td width="210">&nbsp;<textarea cols="20" id="detail" name="detail" rows="4"></textarea></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="140">Payment Mode:</td>
								<td width="210"><select name="pay_mode" id="pay_mode" onchange="payment_type(this.value)">
										<option value="">Select Mode</option>
										<option value="C">Cash</option>
										<option value="B">Bank</option>
									</select></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</table>

						<div id="mode">

						</div>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="143">&nbsp;</td>
								<td width="207"><input class="button" align="left" onclick="validate(this.form)" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
							</tr>
						</table>
					</form>
				</div>
				<br>
			</div>
			<!-- end of middle column -->

			<!-- start of right column -->

			<div id="templatemo_right_column" style="padding-top: 1px;">
			</div>

			<!-- end of right column -->


			<!-- end of content -->


			<?php include("includes/footer.php"); ?>
</body>

</html>