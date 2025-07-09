<?php
include('config.php');
$order_id = $_POST['order_i'];
$booking_date = $_POST['date'];
$function_date = $_POST['date1'];
$function_date2 = $_POST['date2'];
$function_type_id = $_POST['func'];
$func_time = $_POST['time'];
$b_status = $_POST['book_status'];
$banq_id = $_POST['banquet'];
$guest_name = ucwords(strtolower($_POST['host_name']));
$guest_expected = ucwords(strtolower($_POST['guest_expected']));
$guest_guranted = ucwords(strtolower($_POST['guest_gaurante']));
$function_incharge = ucwords(strtolower($_POST['incharge']));
$guest_address = ucwords(strtolower($_POST['address']));
$contact_no = $_POST['telephone'];
$cnic = $_POST['cnic'];
$contact_person = $_POST['care_person'];
$taste = $_POST['food_taste'];
$spl_notes = $_POST['notes'];
$extra_notes = $_POST['extra_notes'];
$add_notes = $_POST['add_notes'];
$stage_no = $_POST['stage_num'];
$sound = $_POST['sound'];
$video = $_POST['video'];
$misc = $_POST['misc'];
$b_rate = $_POST['b_rate'];
$b_rate_total = $_POST['b_rate_total'];
$hall_rate = $_POST['hall_rate'];
$water = $_POST['water'];
$water_rate = $_POST['water_rate'];
$water_total = $_POST['water_total'];
$tset = $_POST['tset'];
$tset_rate = $_POST['tset_rate'];
$tset_total = $_POST['tset_total'];

$drinks = $_POST['drinks'];
$drinks_rate = $_POST['drinks_rate'];
$drinks_total = $_POST['drinks_total'];
$tea = $_POST['tea'];
$tea_rate = $_POST['tea_rate'];
$tea_total = $_POST['tea_total'];
$extra = $_POST['extra'];
$tax = $_POST['tax'];
$tax_percent = $_POST['tax_percent'];
$ser_charge = $_POST['ser_charge'];
$ser_percent = $_POST['ser_percent'];

$stage_charge = $_POST['stage_charge'];
$sound_charge = $_POST['sound_charge'];
$vid_charge = $_POST['vid_charge'];
$misc_charge = $_POST['misc_charge'];
$discount = $_POST['discount'];
$grand_total = $_POST['grand_total'];
$adv_total = $_POST['adv_total'];
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
$received_amount = $_POST['recieved_total'];
$net = $_POST['net'];
$ins1 = $_POST['adv1'];
$adv_cr1 = $_POST['adv_cr1'];
$ins2 = $_POST['adv2'];
$adv_cr2 = $_POST['adv_cr2'];
$ins3 = $_POST['adv3'];
$adv_cr3 = $_POST['adv_cr3'];


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Web Saucer</title>
	<meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. " Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
	<meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />

	<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
	<link href="templatemo_style16.css" rel="stylesheet" type="text/css" />

	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">
	<link rel="stylesheet" href="css/print.css" type="text/css" media="print" charset="utf-8" />

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

		.red {
			color: #F00;
			font-size: x-large;
			font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
			font-weight: bold;
		}

		.red1 {
			color: #F00;
		}

		body {
			background-color: #eeeeee;
			padding: 0;
			margin: 0 auto;
			font-size: 12.5px;
			margin-left: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
			width: auto;
		}
	</style>

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
<div id="templatemo_content">



	<div id="mydiv">

		<table width="533" frame="hsides">
			<tr>
				<th></th>
				<td></td>
			</tr>
			<tr>
				<th></th>
				<td></td>
			</tr>
			<tr>
				<th width="121">
					<div align="justify">Booking Date</div>
				</th>
				<td width="137">
					<div align="justify">
						<?php echo $booking_date; ?>
					</div>
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
		<table width="534" frame="box">


			<tr>
				<th width="272">
					<div align="justify">Function Time</div>
				</th>
				<td width="250">
					<div align="justify">
						<p><?php echo $func_time; ?> </p>
					</div>
				</td>

			</tr>
			<tr>
				<th width="272">
					<div align="justify">Function Date</div>
				</th>
				<td width="250">
					<div align="justify">
						<p><?php echo $function_date; ?> </p>
					</div>
				</td>
			</tr>
			<tr>
				<th width="272">
					<div align="justify">Function</div>
				</th>
				<td width="250" align="left">
					<div align="justify">

						<p>
							<?php
							$q3_1 = "SELECT * FROM function_type_tab WHERE FUNCTION_TYPE_ID ='$function_type_id' ";
							$r3_1 = mysqli_query($conn, $q3_1) or die('Query Failed');

							while ($ans = mysqli_fetch_array($r3_1)) {
							?>

								<?php echo $ans['FUNCTION_TYPE_NAME']; ?>
						</p>
					</div>
				</td>
			<?php } ?>

			</tr>

			<th width="272">
				<div align="justify">Client Name</div>
			</th>
			<td width="250">
				<div align="justify">
					<p><?php echo $guest_name; ?> </p>
				</div>
			</td>

			</tr>
			<tr>
				<th>
					<div align="justify">Tele No.</div>
				</th>
				<td>
					<div align="justify">
						<p><?php echo $contact_no; ?> </p>
					</div>
				</td>

			</tr>

		</table>

	</div>
	<div>
		<p></p>
		<input name="print" type="submit" value="Print Out" onclick="printSelection(document.getElementById('mydiv'));return false" style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" />
		<input name="exit" type="button" value="Exit" style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" onclick="window.location.href='banq_order_master_reception.php'" />
	</div>

</div>


<!-- end of content -->

</body>

</html>