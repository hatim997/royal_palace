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

	<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
	<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

	<script language="JavaScript">
		new tcal({
			'formname': 'testform',
			'controlname': 'date'
		});
	</script>

	<style type="text/css">
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

			var content = document.getElementById(node).innerHTML;

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

	<div>
		<?php
		$q6 = "SELECT DISH_ID FROM banq_order_history_tab WHERE ORDER_NO = '$order_id'";
		$r6 = mysqli_query($conn, $q6) or die('Insertion Failed' . mysqli_error($conn));

		$num6 = mysqli_num_rows($r6);
		if ($num6 != "") { ?>
			<div id="div2">
				<p>
					<span style="font-size:22px; font-weight:900; color:#F00;">
						Function Bill(
						<?php
						echo $func_time . "-";
						$query12 = "SELECT distinct(BANQ_NAME) FROM banq_master_tab WHERE BANQ_ID='$banq_id'";
						$result12 = mysqli_query($conn, $query12);
						while ($row = mysqli_fetch_array($result12)) {
						?>
							<?php echo $row['BANQ_NAME']; ?>
						<?php } ?>

						<?php
						// ADDITIONAL HALLS
						$q4 = "SELECT BANQ_ID FROM banq_order_master WHERE ORDER_NO='$order_id' AND FUNCTION_DATE='$function_date;'";
						$r4 = mysqli_query($conn, $q4) or die("Query Failed");

						$num = mysqli_num_rows($r4);

						if ($num > 1) {
							foreach ($_POST['add_hall'] as $hall) {
								$query12 = "SELECT distinct(BANQ_NAME) FROM banq_master_tab WHERE BANQ_ID='$hall'";
								$result12 = mysqli_query($conn, $query12);
								while ($row = mysqli_fetch_array($result12)) {
						?>
									, <?php echo $row['BANQ_NAME']; ?>
									<?php
								}
							}
						}

						if ($function_date2 != "") {
							if (!empty($_POST['add_hall1'])) {
								foreach ($_POST['add_hall1'] as $hall1) {
									$query12 = "SELECT distinct(BANQ_NAME) FROM banq_master_tab WHERE BANQ_ID='$hall1'";
									$result12 = mysqli_query($conn, $query12);
									while ($row = mysqli_fetch_array($result12)) {
									?>
										, <?php echo $row['BANQ_NAME']; ?>
						<?php
									}
								}
							}
						}
						?>
						)
					</span>
				</p>

				<table width="710" border="0">
					<tr>
						<th width="163">
							<div align="justify">Function Id</div>
						</th>
						<td width="191">
							<div align="justify">

								<input name="order_i" id="order_i" type="text" size="4" value="<?php echo $order_id; ?>" readonly />

							</div>
						</td>

						<th>
							<div align="justify">B. rate Charges</div>
						</th>
						<td width="144">
							<div align="left">
								<input name="b_rate_total" type="text" id="result" class="total" readonly="readonly" value="<?php echo $b_rate . " X " . $guest_guranted . " = " . $b_rate_total; ?>" />
							</div>
						</td>


					</tr>
					<tr>
						<th width="163">
							<div align="justify">Booking Date</div>
						</th>
						<td width="191">
							<div align="justify">
								<input type="text" name="date" value="<?php echo $booking_date; ?>" />
							</div>
						</td>

						<th>
							<div align="justify">Hall Rental Charges</div>
						</th>
						<td>
							<div align="left">
								<input name="hall_rate" type="text" id="result6" class="total" pattern="[0-9]+" value="<?php echo $hall_rate; ?>" />
							</div>
						</td>

					</tr>
					<tr>
						<th width="163">
							<div align="justify">Function</div>
						</th>

						<td width="191" align="left">
							<div align="justify">
								<?php
								$q3_1 = "SELECT * FROM function_type_tab WHERE FUNCTION_TYPE_ID = '$function_type_id'";
								$r3_1 = mysqli_query($conn, $q3_1) or die('Query Failed');

								while ($ans = mysqli_fetch_array($r3_1)) {
								?>
									<input type="text" name="func" value="<?php echo $ans['FUNCTION_TYPE_NAME']; ?>" />
							</div>
						</td>
					<?php } ?>
					<th width="194">
						<div align="justify">Cold Drinks Charges</div>
					</th>
					<td width="144">
						<div align="left">
							<input name="drinks_total" type="text" readonly="readonly" id="result1" class="total" value="<?php echo $drinks_rate . " X " . $drinks . " = " . $drinks_total; ?>" />
						</div>
					</td>

					</tr>
					<tr>
						<th width="163">
							<div align="justify">Function Time</div>
						</th>
						<td width="191">
							<div align="justify">

								<input type="text" name="time" value="<?php echo $func_time; ?>" />

							</div>
						</td>


						<th>
							<div align="justify">Tea Charges</div>
						</th>
						<td width="144">
							<div align="left">
								<input name="tea_total" type="text" readonly="readonly" id="result2" class="total" value="<?php echo $tea_rate . " X " . $tea . " = " . $tea_total; ?>" />
							</div>
						</td>

					</tr>
					<tr>

						<th width="163">
							<div align="justify">Function Date</div>
						</th>
						<td width="191">
							<div align="justify">



								<input type="text" name="date1" value="<?php echo $function_date; ?>" />


							</div>
						</td>

						<th>
							<div align="justify">Mineral Water Charges</div>
						</th>
						<td width="144">
							<div align="left">
								<input name="water_total" type="text" readonly="readonly" id="result3" class="total" value="<?php echo $water_rate . " X " . $water . " = " . $water_total; ?>" />
							</div>
						</td>
					</tr>
					<tr>
						<th width="163">
							<div align="justify">Halls</div>
						</th>
						<td width="191">
							<div align="left" style=" border:ridge;">
								<?php
								$query12 = "SELECT distinct(BANQ_NAME) FROM banq_master_tab WHERE BANQ_ID='$banq_id'";
								$result12 = mysqli_query($conn, $query12);
								while ($row = mysqli_fetch_array($result12)) {
								?>
									<input type="text" name="banquet" value="<?php echo $row['BANQ_NAME']; ?>" />
								<?php } ?>

								<?php
								// ADDITIONAL HALLS
								$q4 = "SELECT BANQ_ID FROM banq_order_master WHERE ORDER_NO='$order_id' AND FUNCTION_DATE='$function_date;'";
								$r4 = mysqli_query($conn, $q4) or die("Query Failed");

								$num = mysqli_num_rows($r4);

								if ($num > 1) {
									foreach ($_POST['add_hall'] as $hall) {
										$query12 = "SELECT distinct(BANQ_NAME) FROM banq_master_tab WHERE BANQ_ID='$hall'";
										$result12 = mysqli_query($conn, $query12);
										while ($row = mysqli_fetch_array($result12)) {
								?>
											<input type="text" name="hall" value="<?php echo $row['BANQ_NAME']; ?>" />
								<?php
										}
									}
								}
								?>
							</div>
						</td>


						<th height="24">
							<div align="justify">Table Setting Charges</div>
						</th>
						<td width="144">
							<div align="left">
								<input name="tset_total" type="text" readonly="readonly" id="result4" class="total" value="<?php echo $tset_rate . " X " . $tset . " = " . $tset_total; ?>" />
							</div>
						</td>

					</tr>
					<tr>
						<?php if ($function_date2 != "") {
						?>
							<th>
								<div align="justify">Other Function Date</div>
							</th>
							<td>

								<input type="text" name="date3" value="<?php echo $function_date2; ?>" />
							</td>
						<?php } else { ?>

							<th></th>
							<td></td>

						<?php   } ?>
						<th width="194">
							<div align="justify">Extra's Charges</div>
						</th>
						<td width="144">
							<div align="left">
								<input name="extra" type="text" id="result5" class="total" pattern="[0-9]+" value="<?php echo $extra; ?>" />
							</div>
						</td>

					</tr>

					<?php
					if ($function_date2 != "") {
					?>
						<tr>
							<th width="163">
								<div align="justify">Halls(Second date)</div>
							</th>
							<td width="191">
								<?php

								//ADDITIONAL HALLS
								if ($_POST['add_hall1'] != "") { ?>
									<div align="justify" style="border:ridge;">
										<?php
										foreach ($_POST['add_hall1'] as $hall1) {
										?>

											<?php
											$query12 = "SELECT distinct(BANQ_NAME) FROM banq_master_tab WHERE BANQ_ID='$hall1'";
											$result12 = mysqli_query($conn, $query12);
											while ($row = mysqli_fetch_array($result12)) {
											?>
												<input type="text" name="hall1" value="<?php echo $row['BANQ_NAME']; ?>" />
									<?php  }
										}
									} ?>
									</div>
							</td>
							<th width="194">
								<div align="justify">Tax</div>
							</th>

							<td width="144">
								<div align="left">
									<input name="tax" type="text" pattern="[0-9]+" id="tax" value="<?php echo $tax . "% = " . $tax_percent; ?>" />
								</div>
							</td>


						</tr><?php } else { ?>
						<tr>
							<td></td>
							<td></td>
							<th width="194">
								<div align="justify">Tax</div>
							</th>

							<td width="144">
								<div align="left">
									<input name="tax" type="text" pattern="[0-9]+" id="tax" value="<?php echo $tax . "% = " . $tax_percent; ?>" />
								</div>
							</td>

						</tr>
					<?php } ?>
					<th width="163">
						<div align="justify">Guest Expected</div>
					</th>
					<td width="191">
						<div align="justify">

							<input type="text" name="guest_expected" id="g_exp" value="<?php echo $guest_expected; ?>" />
						</div>
					</td>

					<th>
						<div align="justify">Service Charges</div>
					</th>
					<td>
						<div align="left">
							<input name="ser_charge" id="ser_charge" type="text" pattern="[0-9]+" value="<?php echo $ser_charge . "% = " . $ser_percent; ?>" />
						</div>
					</td>


					</tr>
					<tr>
						<th>
							<div align="justify">Guest Guranted</div>
						</th>
						<td>
							<div align="justify">
								<input name="guest_gaurante" type="text" id="g_grn" value="<?php echo $guest_guranted; ?>" />
							</div>
						</td>
						<th width="194">
							<div align="justify">Stage Charges</div>
						</th>
						<td width="144">
							<div align="left">
								<input name="stage_charge" type="text" class="total" pattern="[0-9]+" value="<?php echo $stage_charge; ?>" />
							</div>
						</td>

					</tr>
					</tr>
					<tr>
						<th width="163">
							<div align="justify">Host Name</div>
						</th>
						<td width="191">
							<div align="justify">
								<input name="host_name" type="text" pattern="[A-Z a-z]+" id="host" value="<?php echo $guest_name; ?>" />
							</div>
						</td>
						<th>
							<div align="justify">Sound Charges</div>
						</th>
						<td>
							<div align="left">
								<input name="sound_charge" type="text" class="total" pattern="[0-9]+" value="<?php echo $sound_charge; ?>" />
							</div>
						</td>

					</tr>

					<tr>
						<th>
							<div align="justify">Tele No.</div>
						</th>
						<td>
							<div align="justify">
								<input name="telephone" type="text" pattern="[0-9]+" id="tel" value="<?php echo $contact_no; ?>" />
							</div>
						</td>
						<th>
							<div align="justify">Video Charges</div>
						</th>
						<td>
							<div align="left">
								<input name="vid_charge" type="text" class="total" pattern="[0-9]+" value="<?php echo $vid_charge; ?>" />
							</div>
						</td>

					</tr>
					<tr>
						<th>
							<div align="justify">CNIC</div>
						</th>
						<td>
							<div align="justify">
								<input name="telephone" type="text" id="tel" value="<?php echo $cnic; ?>" />
							</div>
						</td>
						<th>
							<div align="justify">Additional Items Charges</div>
						</th>
						<td>
							<div align="left">
								<input name="vid_charge" type="text" class="total" value="<?php //echo $add_item; 
																							?>" />
							</div>
						</td>

					</tr>
					<tr>
						<th>
							<div align="justify">Contact Person</div>
						</th>
						<td>
							<div align="justify">
								<input name="care_person" type="text" pattern="[A-Z a-z]+" value="<?php echo $contact_person; ?>" />
							</div>
						</td>
						<th>
							<div align="justify">Misc Charges</div>
						</th>
						<td>
							<div align="left">
								<input name="misc_charge" type="text" class="total" pattern="[0-9]+" value="<?php echo $misc_charge; ?>" />
							</div>
						</td>

					</tr>
					<tr>

						<th>
							<div align="justify">Address</div>
						</th>
						<td>
							<div align="justify">
								<textarea name="address" cols="15"><?php echo $guest_address; ?></textarea>
							</div>
						</td>
						<th>
							<div align="justify">Discount</div>
						</th>
						<td>
							<div align="left">
								<input name="discount" type="text" id="discount" pattern="[0-9]+" value="<?php echo $discount; ?>" />
							</div>
						</td>


					</tr>
					<?php
					$q6 = "SELECT DISH_ID FROM banq_order_history_tab WHERE ORDER_NO= '$order_id'";
					$r6 = mysqli_query($conn, $q6) or die('Insertion Failed' . mysqli_error($conn));

					$num6 = mysqli_num_rows($r6);

					if ($num6 != "") { ?>
						<tr>
							<th width="163">
								<div align="justify">Order Dishes</div>
							</th>
							<td width="191">
								<select name="menu_order[]" id="menu_order1" size="12" multiple="multiple">
									<?php
									while ($r6_1 = mysqli_fetch_array($r6)) {
										$dish_id = $r6_1['DISH_ID'];
										$q7 = "SELECT DISH_NAME FROM dish_master_tab WHERE DISH_ID='$dish_id'";
										$r7 = mysqli_query($conn, $q7) or die('Query Failed' . mysqli_error($conn));
										while ($r7_1 = mysqli_fetch_array($r7)) {
											$dish_item_name = $r7_1['DISH_NAME'];
									?>
											<option value="<?php echo $dish_item_name; ?>"><?php echo $dish_item_name; ?></option>
									<?php
										}
									}
									?>
								</select>

							</td>
						</tr>
					<?php } ?>
					<tr>
						<th>
							<div align="justify" class="red1">Grand Total</div>
						</th>
						<td>
							<div align="justify"><input name="grand_total" type="text" id="grand_tot" readonly="readonly" value="<?php echo $grand_total; ?>" /></div>
						</td>





					</tr>
					<tr>
						<th>
							<div align="justify" class="red1">Received Amount</div>
						</th>
						<td>
							<div align="left">
								<input name="received" type="text" readonly="readonly" value="<?php echo $received_amount; ?>" />
							</div>
						</td>
						<th>
							<h1 style=" font-size:12px; color:#F00;"> Net Payable</h1>
						</th>
						<td>
							<div align="left">
								<input name="net" type="text" readonly="readonly" size="8" id="net" style="font-size:22px; font-weight:900; color:#F00;" value="<?php echo $net; ?>" />
							</div>
						</td>


				</table>
				<table width="710">
					<tr>
						<td width="123"></td>
						<td width="107"><textarea name="h_sign" rows="4" cols="15"></textarea></td>
						<td width="232"></td>
						<td width="107"><textarea name="m_sign" rows="4" cols="15">Yasir</textarea></td>
						<td width="117"></td>
					</tr>

					<tr>
						<td width="123"></td>
						<th width="107"><label>Host Signature</label></th>
						<td width="232"></td>
						<th width="107">Manager Signature</th>

					</tr>
				</table>

			</div>
			<div id="bottomcolumn_box">
				<p></p>
				<input name="print" type="submit" value="Print Out Complete Bill" onclick="printSelection('div2');" style="background: #F30; color:#000; height:35px; width:auto; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" />
				<input name="exit" type="button" value="Exit" style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" onclick="window.location.href='banq_order_master_reception.php'" />

			</div>

	</div>
<?php } ?>
</div>


<!-- end of content -->

</body>

</html>