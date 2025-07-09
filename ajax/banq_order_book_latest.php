<?php
session_start();

include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
$display_name = $_SESSION['dname'];
$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

$created_id = $_SESSION['username'];
$created_on = $_POST['date'];
$edited_id = $_SESSION['username'];
$edited_on = date("Y-m-d", $tdate);
$id = $_POST['order_i'];
$booking_date = $_POST['date'];
$function_date = $_POST['date1'];
$function_date2 = $_POST['date2'];
$function_type_id = $_POST['func'];
$mbanq_old_id = $_POST['banq_old_id'];

$func_time = $_POST['time'];
if ($func_time == "dinner") {
	$slot_from = '18:00:00';
	$slot_to = '23:00:00';
}
if ($func_time == "lunch") {
	$slot_from = '12:00:00';
	$slot_to = '17:00:00';
}
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

$color_scheme = $_POST['color_scheme1'];
$at_qty = $_POST['at_qty'];




//FIRST BOOKING FUNCTIONALITY
if (isset($_REQUEST['book'])) {
	//generate the cr numbers for stage,sound,video and misc
	$stage_charge = $_POST['stage_charge'];
	if ($stage_charge != "") {
		$query6 = "SELECT max(stage_id) FROM banq_order_master";
		$result6 = mysql_query($query6);
		while ($max1 = mysql_fetch_array($result6))
			$stage_cr = $max1['max(stage_id)'] + 1;
	} else $stage_cr = "";


	$sound_charge = $_POST['sound_charge'];
	if ($sound_charge != "") {
		$query7 = "SELECT max(sound_id) FROM banq_order_master";
		$result7 = mysql_query($query7);
		while ($max2 = mysql_fetch_array($result7))
			$sound_cr = $max2['max(sound_id)'] + 1;
	} else $sound_cr = "";


	$vid_charge = $_POST['vid_charge'];
	if ($vid_charge != "") {
		$query7 = "SELECT max(video_id) FROM banq_order_master";
		$result7 = mysql_query($query7);
		while ($max2 = mysql_fetch_array($result7))
			$vid_cr = $max2['max(video_id)'] + 1;
	} else $vid_cr = "";


	$misc_charge = $_POST['misc_charge'];
	if ($misc_charge != "") {
		$query7 = "SELECT max(misc_id) FROM banq_order_master";
		$result7 = mysql_query($query7);
		while ($max2 = mysql_fetch_array($result7))
			$misc_cr = $max2['max(misc_id)'] + 1;
	} else $misc_cr = "";
	//book the order with first selected date and default banquet
	$query = "INSERT INTO banq_order_master 
(`ORDER_NO`, `BANQ_ID`, `FUNCTION_TYPE_ID`, `GUEST_NAME`, `GUEST_ADDRESS`, 
`CONTACT_PERSON`, `CONTACT_NO`, `FUNCTION_DATE`, `BOOKING_STATUS`, `TIME_FROM`, 
`TIME_TO`, `TOTAL_CHARGES_BANQ`, `PAYMENT_MODE_BANQ`, `CHEQUE_NO_BANQ`, `BANK_BANQ`, `CREDIT_CARD_NO_BANQ`, 
`DIFFERENCE_AMOUNT`, `DISCOUNT_DETAIL`, `BOOKING_DATE`, `guest_expected`, `guest_guranteed`, `function_incharge`, `CNIC`, `taste`, 
`SPL_notes`, `notes`,`add_notes`,`Stage_no`, `Sound`, `Video`, `Misc`, `b_rate`, `b_rate_total`, `Drink_no`, `Drink_rate`, 
`Drink_rate_total`, `tea_no`, `tea_rate`, `tea_rate_total`, `water_no`, `water_rate`, `water_rate_total`, 
`tableset_no`, `tableset_rate`, `tableset_rate_total`, `extra`, `tax`, `tax_total`, `service`, `service_total`, 
`stage_amount`, `stage_id`, `sound_amount`, `sound_id`, `video_amount`, `video_id`, 
`misc_amount`, `misc_id`, `grand_total`, `hall_adv`, `adv_total`, `total_received`, `CREATED_ID`, `CREATED_ON`) 

VALUES ('$id', '$banq_id', '$function_type_id', '$guest_name', '$guest_address', 
'$contact_person', '$contact_no','$function_date', '$b_status', '$slot_from', 
'$slot_to', '$b_rate_total', '$p_mode', '$chequeno', '$bank', '$card_no',
'$net', '$discount', '$booking_date', '$guest_expected', '$guest_guranted', '$function_incharge', '$cnic', '$taste',
  '$spl_notes','$extra_notes','$add_notes', '$stage_no', '$sound', '$video', '$misc', '$b_rate', '$b_rate_total', '$drinks', '$drinks_rate', 
'$drinks_total', '$tea', '$tea_rate', '$tea_total', '$water', '$water_rate', '$water_total',
 '$tset', '$tset_rate', '$tset_total', '$extra', '$tax', '$tax_percent', '$ser_charge', '$ser_percent', 
 '$stage_charge', '$stage_cr', '$sound_charge', '$sound_cr','$vid_charge', '$vid_cr',
 '$misc_charge', '$misc_cr','$grand_total', '$hall_rate','$adv_total','$received_amount', '$created_id' , '$created_on')";

	mysql_query($query) or die('Insertion Failed:' . mysql_error());
	//add the scheme of color
	$query77 = "INSERT INTO `banq_color_scheme_history`(`FUNCTION_ID`, `FUNCTION_DATE`, `FUNCTION_TIME`, `SCHEME_ID`, `SCHEME_QTY`)
VALUES ('$id', '$function_date','$func_time', '$color_scheme' , '$at_qty')";

	mysql_query($query77) or die('Insertion Failed:' . mysql_error());


	//add order dishes in banq_order_history_tab table 

	foreach ($_POST['menu_order'] as $value) {

		$query2 = "SELECT DISH_ID,DISH_CHARGES_ID FROM dish_master_tab WHERE DISH_NAME='$value'";
		$result2 = mysql_query($query2) or die('Query Failed' . mysql_error());
		while ($r2 = mysql_fetch_array($result2)) {
			$dish_item_id = $r2['DISH_ID'];
			$dish_item_charges = $r2['DISH_CHARGES_ID'];
		}


		$query3 = "INSERT INTO banq_order_history_tab(`ORDER_NO`, `DISH_ID`, `DISH_CHARGES_ID`, `CREATED_ID`, `CREATED_ON`) VALUES ('$id', '$dish_item_id', '$dish_item_charges', '$created_id' , '$created_on')";
		// WHERE ORDER_NO!='$id' AND DISH_ID!='$dish_item_id'";
		$result3 = mysql_query($query3) or die('Insertion Failed' . mysql_error());
	}

	//additional halls on first selcted date
	if ($_POST['add_hall'] != "") {
		foreach ($_POST['add_hall'] as $hall) {

			$query4 = "INSERT INTO banq_order_master 
(`ORDER_NO`, `BANQ_ID`, `FUNCTION_TYPE_ID`, `GUEST_NAME`, `GUEST_ADDRESS`, 
`CONTACT_PERSON`, `CONTACT_NO`, `FUNCTION_DATE`, `BOOKING_STATUS`, `TIME_FROM`, 
`TIME_TO`, `TOTAL_CHARGES_BANQ`, `PAYMENT_MODE_BANQ`, `CHEQUE_NO_BANQ`, `BANK_BANQ`, `CREDIT_CARD_NO_BANQ`, 
`DIFFERENCE_AMOUNT`, `DISCOUNT_DETAIL`, `BOOKING_DATE`, `guest_expected`, `guest_guranteed`, `function_incharge`, `CNIC`, `taste`, 
`SPL_notes`, `notes`,`add_notes`, `Stage_no`, `Sound`, `Video`, `Misc`, `b_rate`, `b_rate_total`, `Drink_no`, `Drink_rate`, 
`Drink_rate_total`, `tea_no`, `tea_rate`, `tea_rate_total`, `water_no`, `water_rate`, `water_rate_total`, 
`tableset_no`, `tableset_rate`, `tableset_rate_total`, `extra`, `tax`, `tax_total`, `service`, `service_total`, 
`stage_amount`, `stage_id`, `sound_amount`, `sound_id`, `video_amount`, `video_id`, 
`misc_amount`, `misc_id`, `grand_total` , `hall_adv`, `adv_total` ,`total_received`, `CREATED_ID`, `CREATED_ON`) 

VALUES ('$id', '$hall', '$function_type_id', '$guest_name', '$guest_address', 
'$contact_person', '$contact_no','$function_date', '$b_status', '$slot_from', 
'$slot_to', '$b_rate_total', '$p_mode', '$chequeno', '$bank', '$card_no',
'$net', '$discount', '$booking_date', '$guest_expected', '$guest_guranted', '$function_incharge', '$cnic', '$taste',
  '$spl_notes', '$extra_notes','$add_notes', '$stage_no', '$sound', '$video', '$misc', '$b_rate', '$b_rate_total', '$drinks', '$drinks_rate', 
'$drinks_total', '$tea', '$tea_rate', '$tea_total', '$water', '$water_rate', '$water_total',
 '$tset', '$tset_rate', '$tset_total', '$extra', '$tax', '$tax_percent', '$ser_charge', '$ser_percent', 
 '$stage_charge', '$stage_cr', '$sound_charge', '$sound_cr','$vid_charge', '$vid_cr',
 '$misc_charge', '$misc_cr','$grand_total', '$hall_rate','$adv_total','$received_amount', '$created_id' , '$created_on')";

			mysql_query($query4) or die('Insertion Failed:' . mysql_error());
		}
	}
	//Book THE SECOND DATE 


	if ($function_date2 != "") {
		//ADDITIONAL HALLS ON SECOND DATE
		if ($_POST['add_hall1'] != "") {
			foreach ($_POST['add_hall1'] as $hall1) {

				$query11 = "INSERT INTO banq_order_master 
(`ORDER_NO`, `BANQ_ID`, `FUNCTION_TYPE_ID`, `GUEST_NAME`, `GUEST_ADDRESS`, 
`CONTACT_PERSON`, `CONTACT_NO`, `FUNCTION_DATE`, `BOOKING_STATUS`, `TIME_FROM`, 
`TIME_TO`, `TOTAL_CHARGES_BANQ`, `PAYMENT_MODE_BANQ`, `CHEQUE_NO_BANQ`, `BANK_BANQ`, `CREDIT_CARD_NO_BANQ`, 
`DIFFERENCE_AMOUNT`, `DISCOUNT_DETAIL`, `BOOKING_DATE`, `guest_expected`, `guest_guranteed`, `function_incharge`, `CNIC`, `taste`, 
`SPL_notes`, `notes`,`add_notes`, `Stage_no`, `Sound`, `Video`, `Misc`, `b_rate`, `b_rate_total`, `Drink_no`, `Drink_rate`, 
`Drink_rate_total`, `tea_no`, `tea_rate`, `tea_rate_total`, `water_no`, `water_rate`, `water_rate_total`, 
`tableset_no`, `tableset_rate`, `tableset_rate_total`, `extra`, `tax`, `tax_total`, `service`, `service_total`, 
`stage_amount`, `stage_id`, `sound_amount`, `sound_id`, `video_amount`, `video_id`, 
`misc_amount`, `misc_id`, `grand_total` , `hall_adv`, `adv_total` ,`total_received`, `CREATED_ID`, `CREATED_ON`) 

VALUES ('$id', '$hall1', '$function_type_id', '$guest_name', '$guest_address', 
'$contact_person', '$contact_no','$function_date2', '$b_status', '$slot_from', 
'$slot_to', '$b_rate_total', '$p_mode', '$chequeno', '$bank', '$card_no',
'$net', '$discount', '$booking_date', '$guest_expected', '$guest_guranted', '$function_incharge', '$cnic', '$taste',
  '$spl_notes', '$extra_notes','$add_notes', '$stage_no', '$sound', '$video', '$misc', '$b_rate', '$b_rate_total', '$drinks', '$drinks_rate', 
'$drinks_total', '$tea', '$tea_rate', '$tea_total', '$water', '$water_rate', '$water_total',
 '$tset', '$tset_rate', '$tset_total', '$extra', '$tax', '$tax_percent', '$ser_charge', '$ser_percent', 
 '$stage_charge', '$stage_cr', '$sound_charge', '$sound_cr','$vid_charge', '$vid_cr',
 '$misc_charge', '$misc_cr','$grand_total', '$hall_rate','$adv_total','$received_amount', '$created_id' , '$created_on')";

				mysql_query($query11) or die('Insertion Failed:' . mysql_error());
			}
		}
	}
	// INSTALLEMENTS RECORD SAVED
	$ins1 = $_POST['adv1'];
	$adv_cr1 = $_POST['adv_cr1'];
	if ($ins1 != "") {
		$query12 = "INSERT INTO payment_serial
(`CR_NO`,`ORDER_ID`, `INSTALMENT_NO`, `INSTALMENT_AMOUNT`, `CREATED_ID`, `CREATED_ON`) 
VALUES ('$adv_cr1', '$id', '1', '$ins1', '$created_id' , '$created_on')";

		mysql_query($query12) or die('Insertion Failed:' . mysql_error());
	}


	$ins2 = $_POST['adv2'];
	$adv_cr2 = $_POST['adv_cr2'];
	if ($ins2 != "") {
		$query13 = "INSERT INTO payment_serial_admin
(`CR_NO`,`ORDER_ID`, `INSTALMENT_NO`, `INSTALMENT_AMOUNT`, `CREATED_ID`, `CREATED_ON`) 
VALUES ('$adv_cr2', '$id', '2', '$ins2', '$created_id' , '$created_on')";

		mysql_query($query13) or die('Insertion Failed:' . mysql_error());
	}


	$ins3 = $_POST['adv3'];
	$adv_cr3 = $_POST['adv_cr3'];

	if ($ins3 != "") {
		$query14 = "INSERT INTO payment_serial_admin
(`CR_NO`,`ORDER_ID`, `INSTALMENT_NO`, `INSTALMENT_AMOUNT`, `CREATED_ID`, `CREATED_ON`) 
VALUES ('$adv_cr3', '$id', '3', '$ins3', '$created_id' , '$created_on')";

		mysql_query($query14) or die('Insertion Failed:' . mysql_error());
	}



	//Generate Demand to store 
	$val = 0;
	foreach ($_POST['menu_order'] as $val) {
		$val++;
	}
	if ($val > '0') {
		$q11 = "SELECT * FROM banq_order_history_tab WHERE ORDER_NO = '$id'";
		$r11 = mysql_query($q11) or die('Query Failed' . mysql_error());
		if (!mysql_num_rows($r11)) {

			$q22 = "SELECT max(DEMAND_NO) FROM restaurant_demand";
			$r22 = mysql_query($q22) or die('Query Failed' . mysql_error());
			$i = 0;
			$ans22 = mysql_result($r22, $i, "max(DEMAND_NO)");
			$d_num = $ans22 + 1;
			while ($ans11 = mysql_fetch_array($r11)) {
				$d_id = $ans11['DISH_ID'];
				$q33 = "SELECT * FROM recipe_tab WHERE DISH_ID='$d_id'";
				$r33 = mysql_query($q33) or die('Query Failed' . mysql_error());
				while ($ans33 = mysql_fetch_array($r33)) {
					$ind_code = $ans33['INGREDIENT_CODE'];
					$unit_id = $ans33['UNIT_ID'];
					$req_qty = $ans33['REQUIRED_QUANTITY'];
					$total_demand = $guest_guranted * $req_qty;
					$query44 = "INSERT INTO restaurant_demand(`REST_ID`, `DISPLAY_NAME`, `INGREDIENT_ID`, `DEMAND_NO`, `DEMAND_QTY`, `DEMAND_DATE`, `UNIT_ID`, `CREATED_ID`, `CREATED_ON`,`READ_FLAG`)
			 VALUES ('$restid','$display_name','$ind_code','$d_num','$total_demand','$function_date','$unit_id','$created_id','$created_on','0')";
					$result44 = mysql_query($query44) or die('Demand Insertion Failed' . mysql_error());
				}
			}
			$query55 = "UPDATE banq_order_history_tab SET DEMAND_NO = '$d_num' WHERE ORDER_NO = '$id'";
			$result55 = mysql_query($query55) or die('Demand Insertion Failed' . mysql_error());
		}
	} //Generate Demand to store 
	$val = 0;
	foreach ($_POST['menu_order'] as $val) {
		$val++;
	}
	if ($val > '0') {
		$q11 = "SELECT * FROM banq_order_history_tab WHERE ORDER_NO = '$id'";
		$r11 = mysql_query($q11) or die('Query Failed' . mysql_error());
		if (mysql_num_rows($r11)) {
			$q22 = "SELECT max(DEMAND_NO) FROM restaurant_demand";
			$r22 = mysql_query($q22) or die('Query Failed' . mysql_error());
			$i = 0;
			$ans22 = mysql_result($r22, $i, "max(DEMAND_NO)");
			$d_num = $ans22 + 1;
			while ($ans11 = mysql_fetch_array($r11)) {
				$d_id = $ans11['DISH_ID'];
				$q33 = "SELECT * FROM recipe_tab WHERE DISH_ID='$d_id'";
				$r33 = mysql_query($q33) or die('Query Failed' . mysql_error());
				while ($ans33 = mysql_fetch_array($r33)) {
					$ind_code = $ans33['INGREDIENT_CODE'];
					$unit_id = $ans33['UNIT_ID'];
					$req_qty = $ans33['REQUIRED_QUANTITY'];
					$total_demand = $guest_guranted * $req_qty;
					$query44 = "INSERT INTO restaurant_demand(`REST_ID`, `DISPLAY_NAME`, `INGREDIENT_ID`, `DEMAND_NO`, `DEMAND_QTY`, `DEMAND_DATE`, `UNIT_ID`, `CREATED_ID`, `CREATED_ON`,`READ_FLAG`)
			 VALUES ('$restid','$display_name','$ind_code','$d_num','$total_demand','$function_date','$unit_id','$created_id','$created_on','0')";
					$result44 = mysql_query($query44) or die('Demand Insertion Failed' . mysql_error());
				}
			}
			$query55 = "UPDATE banq_order_history_tab SET DEMAND_NO = '$d_num' WHERE ORDER_NO = '$id'";
			$result55 = mysql_query($query55) or die('Demand Insertion Failed' . mysql_error());
		}
	}
}


//"UPDATE FUNCTIONALITY
if (isset($_REQUEST['update'])) {



	//UPDATE the order with first selected date and default banquet
	$stage_charge = $_POST['stage_charge'];
	if ($stage_charge != "") {
		$query6_0 = "SELECT stage_id FROM banq_order_master WHERE ORDER_NO = '$id'";
		$result6_0 = mysql_query($query6_0);
		if (mysql_num_rows($result6_0) > 0) {
			$ans6_0 = mysql_fetch_array($result6_0);
			$stage_cr = $ans6_0['stage_id'];
		} else if (!mysql_num_rows($result6_0)) {
			$query6 = "SELECT max(stage_id) FROM banq_order_master";
			$result6 = mysql_query($query6);
			while ($max1 = mysql_fetch_array($result6))
				$stage_cr = $max1['max(stage_id)'] + 1;
		}
	} else $stage_cr = "";


	$sound_charge = $_POST['sound_charge'];
	if ($sound_charge != "") {
		$query7_0 = "SELECT sound_id FROM banq_order_master WHERE ORDER_NO = '$id'";
		$result7_0 = mysql_query($query7_0);
		if (mysql_num_rows($result7_0) > 0) {
			$ans7_0 = mysql_fetch_array($result7_0);
			$sound_cr = $ans7_0['sound_id'];
		} else if (!mysql_num_rows($result7_0)) {
			$query7 = "SELECT max(sound_id) FROM banq_order_master";
			$result7 = mysql_query($query7);
			while ($max2 = mysql_fetch_array($result7))
				$sound_cr = $max2['max(sound_id)'] + 1;
		}
	} else $sound_cr = "";


	$vid_charge = $_POST['vid_charge'];
	if ($vid_charge != "") {
		$query8_0 = "SELECT video_id FROM banq_order_master WHERE ORDER_NO = '$id'";
		$result8_0 = mysql_query($query8_0);
		if (mysql_num_rows($result8_0) > 0) {
			$ans8_0 = mysql_fetch_array($result8_0);
			$vid_cr = $ans8_0['video_id'];
		} else if (!mysql_num_rows($result8_0)) {
			$query8 = "SELECT max(video_id) FROM banq_order_master";
			$result8 = mysql_query($query8);
			while ($max2 = mysql_fetch_array($result8))
				$vid_cr = $max2['max(video_id)'] + 1;
		}
	} else $vid_cr = "";


	$misc_charge = $_POST['misc_charge'];
	if ($misc_charge != "") {
		$query8_0 = "SELECT misc_id FROM banq_order_master WHERE ORDER_NO = '$id'";
		$result8_0 = mysql_query($query8_0);
		if (mysql_num_rows($result8_0) > 0) {
			$ans8_0 = mysql_fetch_array($result8_0);
			$misc_cr = $ans8_0['misc_id'];
		} else if (!mysql_num_rows($result8_0)) {
			$query7 = "SELECT max(misc_id) FROM banq_order_master";
			$result7 = mysql_query($query7);
			while ($max2 = mysql_fetch_array($result7))
				$misc_cr = $max2['max(misc_id)'] + 1;
		}
	} else $misc_cr = "";

	// ++++++  SHIFT OF FUNCTION    January 31, 2015   ++++++++++++++++++++++
	// ++++++  Function date, Lunch/Dinner, Function hall change can be done by this update query     ++++++++  
	$query5 = "UPDATE banq_order_master SET
ORDER_NO = '$id', BANQ_ID = '$banq_id', FUNCTION_TYPE_ID = '$function_type_id', GUEST_NAME = '$guest_name', 
GUEST_ADDRESS = '$guest_address', CONTACT_PERSON = '$contact_person' , CONTACT_NO = '$contact_no',
BOOKING_STATUS = '$b_status' , TIME_FROM = '$slot_from', TIME_TO = '$slot_to' , TOTAL_CHARGES_BANQ = '$b_rate_total',
PAYMENT_MODE_BANQ = '$p_mode', CHEQUE_NO_BANQ = '$chequeno', BANK_BANQ = '$bank', CREDIT_CARD_NO_BANQ = '$card_no', 
DIFFERENCE_AMOUNT = '$net', DISCOUNT_DETAIL = '$discount', BOOKING_DATE = '$booking_date', guest_expected = '$guest_expected', 
guest_guranteed = '$guest_guranted', function_incharge = '$function_incharge', CNIC = '$cnic', taste = '$taste', 
SPL_notes = '$spl_notes', notes = '$extra_notes', add_notes = '$add_notes', Stage_no = '$stage_no', Sound = '$sound', Video = '$video',
Misc = '$misc', b_rate = '$b_rate', b_rate_total = '$b_rate_total', Drink_no = '$drinks', Drink_rate = '$drinks_rate', 
Drink_rate_total = '$drinks_total', tea_no = '$tea' , tea_rate = '$tea_rate', tea_rate_total= '$tea_total', water_no = '$water' ,
water_rate = '$water_rate', water_rate_total = '$water_total', tableset_no = '$tset', tableset_rate = '$tset_rate',
tableset_rate_total = '$tset_total', extra = '$extra', tax = '$tax', tax_total = '$tax_percent', service = '$ser_charge',
service_total = '$ser_percent', stage_amount = '$stage_charge', stage_id = '$stage_cr', sound_amount =  '$sound_charge' ,
sound_id = '$sound_cr', video_amount = '$vid_charge', video_id = '$vid_cr', misc_amount = '$misc_charge',
misc_id = '$misc_cr', grand_total = '$grand_total', hall_adv = '$hall_rate', adv_total = '$adv_total', 
total_received = '$received_amount', EDITED_ID = '$edited_id', EDITED_ON  ='$edited_on', FUNCTION_DATE = '$function_date'
WHERE ORDER_NO = '$id' AND BANQ_ID = '$mbanq_old_id'";
	/*<!-- '$banq_id'"; -->*/

	mysql_query($query5) or die('Updation Failed:' . mysql_error());
	//update the theme
	$query77 = "UPDATE banq_color_scheme_history SET FUNCTION_ID = '$id', FUNCTION_DATE = '$function_date', FUNCTION_TIME = '$func_time',
SCHEME_ID = '$color_scheme' , SCHEME_QTY = '$at_qty' 
WHERE FUNCTION_ID = '$id'";

	mysql_query($query77) or die('Insertion Failed:' . mysql_error());


	//update order dishes in banq_order_history_tab table 


	foreach ($_POST['menu_order'] as $value) {



		if (!in_array($value, $_POST['menu_order1'], true)) {



			$query6 = "SELECT DISH_ID,DISH_CHARGES_ID FROM dish_master_tab WHERE DISH_NAME='$value'";
			$result6 = mysql_query($query6) or die('Query Failed' . mysql_error());
			while ($r6 = mysql_fetch_array($result6)) {
				$dish_item_id = $r6['DISH_ID'];
				$dish_item_charges = $r6['DISH_CHARGES_ID'];

				/*   START DELETION firsT for menu record which are already Exist   */
				$queryd2 = "DELETE FROM banq_order_history_tab WHERE ORDER_NO = '$id' AND DISH_ID = '$dish_item_id'";
				//  AND DISH_ID = '$dish_item_id'";
				$resultd2 = mysql_query($queryd2) or die('Updation Failed' . mysql_error());
				/*   END DELETION FIRST  firsT for menu record which are already Exist */
			}



			$query7 = "INSERT INTO banq_order_history_tab(`ORDER_NO`,`DEMAND_NO`, `DISH_ID`, `DISH_CHARGES_ID`,`EDITED_ID`, `EDITED_ON`) VALUES ('$id','11', '$dish_item_id', '$dish_item_charges', '$edited_id' , '$edited_on')";
			//  WHERE ORDER_NO!='$id' AND DISH_ID!='$dish_item_id'"; 

			$result7 = mysql_query($query7) or die('Updation Failed' . mysql_error());
		}
	}

	foreach ($_POST['menu_order1'] as $value) {
		if (!(in_array($value, $_POST['menu_order'], true))) {

			$query6 = "SELECT DISH_ID,DISH_CHARGES_ID FROM dish_master_tab WHERE DISH_NAME='$value'";
			$result6 = mysql_query($query6) or die('Query Failed' . mysql_error());
			while ($r6 = mysql_fetch_array($result6)) {
				$dish_item_id = $r6['DISH_ID'];
				$dish_item_charges = $r6['DISH_CHARGES_ID'];
			}

			$query8 = "DELETE FROM banq_order_history_tab WHERE ORDER_NO = '$id' AND DISH_ID = '$dish_item_id'";
			$result8 = mysql_query($query8) or die('Updation Failed' . mysql_error());
		}
	}
	//Update Generated Demand to store 
	$order_count = 0;
	foreach ($_POST['menu_order'] as $value) {

		if (!in_array($value, $_POST['menu_order1'], true)) {
			$order_count++;
		}
	}
	if ($order_count > 0) {
		$q11 = "SELECT * FROM banq_order_history_tab WHERE ORDER_NO = '$id'";
		$r11 = mysql_query($q11) or die('Query Failed' . mysql_error());
		if (mysql_num_rows($r11) > 0) {
			$q22_1 = "SELECT DEMAND_NO FROM banq_order_history_tab WHERE ORDER_NO = '$id' AND DEMAND_NO != '0'";
			$r22_1 = mysql_query($q22_1) or die('Query Failed' . mysql_error());
			$i = 0;
			if (!mysql_num_rows($r22_1)) {
				$q22 = "SELECT max(DEMAND_NO) FROM restaurant_demand";
				$r22 = mysql_query($q22) or die('Query Failed' . mysql_error());
				$ans22 = mysql_result($r22, $i, "max(DEMAND_NO)");
				$d_num = $ans22 + 1;

				while ($ans11 = mysql_fetch_array($r11)) {
					$d_id = $ans11['DISH_ID'];
					$q33 = "SELECT * FROM recipe_tab WHERE DISH_ID='$d_id'";
					$r33 = mysql_query($q33) or die('Query Failed' . mysql_error());
					while ($ans33 = mysql_fetch_array($r33)) {
						$ind_code = $ans33['INGREDIENT_CODE'];
						$unit_id = $ans33['UNIT_ID'];
						$req_qty = $ans33['REQUIRED_QUANTITY'];
						$total_demand = $guest_guranted * $req_qty;
						$query44 = "INSERT INTO restaurant_demand(`REST_ID`, `DISPLAY_NAME`, `INGREDIENT_ID`, `DEMAND_NO`, `DEMAND_QTY`, `DEMAND_DATE`, `UNIT_ID`, `CREATED_ID`, `CREATED_ON`, `READ_FLAG`)
							 VALUES ('$restid','$display_name','$ind_code','$d_num','$total_demand','$function_date','$unit_id','$created_id','$created_on','0')";
						$result44 = mysql_query($query44) or die('Demand Insertion Failed' . mysql_error());
					}
				}
				$query55 = "UPDATE banq_order_history_tab SET DEMAND_NO = '$d_num' WHERE ORDER_NO = '$id'";
				$result55 = mysql_query($query55) or die('Demand Insertion Failed' . mysql_error());
			} else {
				$d_num = mysql_result($r22_1, $i, "DEMAND_NO");

				$query22_2 = "DELETE FROM restaurant_demand WHERE DEMAND_NO = '$d_num'";
				$result22_2 = mysql_query($query22_2) or die('Demand Deletion Failed' . mysql_error());
				while ($ans11 = mysql_fetch_array($r11)) {
					$d_id = $ans11['DISH_ID'];
					$q33 = "SELECT * FROM recipe_tab WHERE DISH_ID='$d_id'";
					$r33 = mysql_query($q33) or die('Query Failed' . mysql_error());
					while ($ans33 = mysql_fetch_array($r33)) {
						$ind_code = $ans33['INGREDIENT_CODE'];
						$unit_id = $ans33['UNIT_ID'];
						$req_qty = $ans33['REQUIRED_QUANTITY'];
						$total_demand = $guest_guranted * $req_qty;
						$query44 = "INSERT INTO restaurant_demand(`REST_ID`, `DISPLAY_NAME`, `INGREDIENT_ID`, `DEMAND_NO`, `DEMAND_QTY`, `DEMAND_DATE`, `UNIT_ID`, `EDITED_ID`, `EDITED_ON`,`READ_FLAG`)
							 VALUES ('$restid','$display_name','$ind_code','$d_num','$total_demand','$function_date','$unit_id','$edited_id','$edited_on','0')";
						$result44 = mysql_query($query44) or die('Demand Insertion Failed' . mysql_error());
					}
				}
			}
		}
	}
	//update the additional halls record of first selected date
	$query20 = "DELETE FROM banq_order_master WHERE ORDER_NO = '$id' AND FUNCTION_DATE = '$function_date' AND BANQ_ID !='$banq_id' ";
	$result20 = mysql_query($query20) or die('Deletion Failed' . mysql_error());
	if ($_POST['add_hall'] != "") {
		foreach ($_POST['add_hall'] as $hall) {
			//Update the exisiting records
			$query15 = "SELECT BANQ_ID FROM banq_order_master WHERE ORDER_NO = '$id' AND FUNCTION_DATE = '$function_date' AND BANQ_ID = '$hall'";
			$result15 = mysql_query($query15);
			while ($h1 = mysql_fetch_array($result15)) {
				if ($hall == $h1['BANQ_ID']) {
					$query9 = "UPDATE banq_order_master SET
ORDER_NO = '$id', BANQ_ID = '$hall', FUNCTION_TYPE_ID = '$function_type_id', GUEST_NAME = '$guest_name', 
GUEST_ADDRESS = '$guest_address', CONTACT_PERSON = '$contact_person' , CONTACT_NO = '$contact_no', FUNCTION_DATE = '$function_date',
BOOKING_STATUS = '$b_status' , TIME_FROM = '$slot_from', TIME_TO = '$slot_to' , TOTAL_CHARGES_BANQ = '$b_rate_total',
PAYMENT_MODE_BANQ = '$p_mode', CHEQUE_NO_BANQ = '$chequeno', BANK_BANQ = '$bank', CREDIT_CARD_NO_BANQ = '$card_no', 
DIFFERENCE_AMOUNT = '$net', DISCOUNT_DETAIL = '$discount', BOOKING_DATE = '$booking_date', guest_expected = '$guest_expected', 
guest_guranteed = '$guest_guranted', function_incharge = '$function_incharge', CNIC = '$cnic', taste = '$taste', 
SPL_notes = '$spl_notes', notes = '$extra_notes', add_notes = '$add_notes', Stage_no = '$stage_no', Sound = '$sound', Video = '$video',
Misc = '$misc', b_rate = '$b_rate', b_rate_total = '$b_rate_total', Drink_no = '$drinks', Drink_rate = '$drinks_rate', 
Drink_rate_total = '$drinks_total', tea_no = '$tea' , tea_rate = '$tea_rate', tea_rate_total= '$tea_total', water_no = '$water' ,
water_rate = '$water_rate', water_rate_total = '$water_total', tableset_no = '$tset', tableset_rate = '$tset_rate',
tableset_rate_total = '$tset_total', extra = '$extra', tax = '$tax', tax_total = '$tax_percent', service = '$ser_charge',
service_total = '$ser_percent', stage_amount = '$stage_charge', stage_id = '$stage_cr', sound_amount =  '$sound_charge' ,
sound_id = '$sound_cr', video_amount = '$vid_charge', video_id = '$vid_cr', misc_amount = '$misc_charge',
misc_id = '$misc_cr', grand_total = '$grand_total', 
hall_adv = '$hall_rate', adv_total = '$adv_total', total_received = '$received_amount', EDITED_ID = '$edited_id', EDITED_ON  ='$edited_on'
 WHERE ORDER_NO = '$id' AND FUNCTION_DATE = '$function_date' AND BANQ_ID = '$hall'";
					mysql_query($query9) or die('Updation Failed:' . mysql_error());
				}
			}
			$num4 = mysql_num_rows($result15);
			if (!$num4) {
				//insert the new selections
				$query16 = "INSERT INTO banq_order_master 
(`ORDER_NO`, `BANQ_ID`, `FUNCTION_TYPE_ID`, `GUEST_NAME`, `GUEST_ADDRESS`, 
`CONTACT_PERSON`, `CONTACT_NO`, `FUNCTION_DATE`, `BOOKING_STATUS`, `TIME_FROM`, 
`TIME_TO`, `TOTAL_CHARGES_BANQ`, `PAYMENT_MODE_BANQ`, `CHEQUE_NO_BANQ`, `BANK_BANQ`, `CREDIT_CARD_NO_BANQ`, 
`DIFFERENCE_AMOUNT`, `DISCOUNT_DETAIL`, `BOOKING_DATE`, `guest_expected`, `guest_guranteed`, `function_incharge`, `CNIC`, `taste`, 
`SPL_notes`, `notes`,`add_notes`, `Stage_no`, `Sound`, `Video`, `Misc`, `b_rate`, `b_rate_total`, `Drink_no`, `Drink_rate`, 
`Drink_rate_total`, `tea_no`, `tea_rate`, `tea_rate_total`, `water_no`, `water_rate`, `water_rate_total`, 
`tableset_no`, `tableset_rate`, `tableset_rate_total`, `extra`, `tax`, `tax_total`, `service`, `service_total`, 
`stage_amount`, `stage_id`, `sound_amount`, `sound_id`, `video_amount`, `video_id`, 
`misc_amount`, `misc_id`, `grand_total` , `hall_adv`, `adv_total` ,`total_received`, `EDITED_ID`, `EDITED_ON`) 

VALUES ('$id', '$hall', '$function_type_id', '$guest_name', '$guest_address', 
'$contact_person', '$contact_no','$function_date', '$b_status', '$slot_from', 
'$slot_to', '$b_rate_total', '$p_mode', '$chequeno', '$bank', '$card_no',
'$net', '$discount', '$booking_date', '$guest_expected', '$guest_guranted', '$function_incharge', '$cnic', '$taste',
  '$spl_notes', '$extra_notes','$add_notes', '$stage_no', '$sound', '$video', '$misc', '$b_rate', '$b_rate_total', '$drinks', '$drinks_rate', 
'$drinks_total', '$tea', '$tea_rate', '$tea_total', '$water', '$water_rate', '$water_total',
 '$tset', '$tset_rate', '$tset_total', '$extra', '$tax', '$tax_percent', '$ser_charge', '$ser_percent', 
 '$stage_charge', '$stage_cr', '$sound_charge', '$sound_cr','$vid_charge', '$vid_cr',
 '$misc_charge', '$misc_cr','$grand_total', '$hall_rate','$adv_total','$received_amount', '$edited_id' , '$edited_on')";

				mysql_query($query16) or die('Insertion Failed:' . mysql_error());
			}
		}
	}

	if ($function_date2 != "") {

		//UPDATE ADDITIONAL HALLS ON SECOND DATE
		$query20 = "DELETE FROM banq_order_master WHERE ORDER_NO = '$id' AND FUNCTION_DATE = '$function_date2'";
		$result20 = mysql_query($query20) or die('Deletion Failed' . mysql_error());
		if ($_POST['add_hall1'] != "") {
			foreach ($_POST['add_hall1'] as $hall1) {
				//UPDATE THE EXISTING Hall and dates
				$query18 = "SELECT BANQ_ID FROM banq_order_master WHERE ORDER_NO = '$id' AND FUNCTION_DATE = '$function_date2' AND BANQ_ID = '$hall1'";
				$result18 = mysql_query($query18);
				while ($h2 = mysql_fetch_array($result18)) {
					if ($hall1 == $h2['BANQ_ID']) {
						$query14 = "UPDATE banq_order_master SET
ORDER_NO = '$id', BANQ_ID = '$hall1', FUNCTION_TYPE_ID = '$function_type_id', GUEST_NAME = '$guest_name', 
GUEST_ADDRESS = '$guest_address', CONTACT_PERSON = '$contact_person' , CONTACT_NO = '$contact_no', FUNCTION_DATE = '$function_date2',
BOOKING_STATUS = '$b_status' , TIME_FROM = '$slot_from', TIME_TO = '$slot_to' , TOTAL_CHARGES_BANQ = '$b_rate_total',
PAYMENT_MODE_BANQ = '$p_mode', CHEQUE_NO_BANQ = '$chequeno', BANK_BANQ = '$bank', CREDIT_CARD_NO_BANQ = '$card_no', 
DIFFERENCE_AMOUNT = '$net', DISCOUNT_DETAIL = '$discount', BOOKING_DATE = '$booking_date', guest_expected = '$guest_expected', 
guest_guranteed = '$guest_guranted', function_incharge = '$function_incharge', CNIC = '$cnic', taste = '$taste', 
SPL_notes = '$spl_notes', notes = '$extra_notes', add_notes = '$add_notes', Stage_no = '$stage_no', Sound = '$sound', Video = '$video',
Misc = '$misc', b_rate = '$b_rate', b_rate_total = '$b_rate_total', Drink_no = '$drinks', Drink_rate = '$drinks_rate', 
Drink_rate_total = '$drinks_total', tea_no = '$tea' , tea_rate = '$tea_rate', tea_rate_total= '$tea_total', water_no = '$water' ,
water_rate = '$water_rate', water_rate_total = '$water_total', tableset_no = '$tset', tableset_rate = '$tset_rate',
tableset_rate_total = '$tset_total', extra = '$extra', tax = '$tax', tax_total = '$tax_percent', service = '$ser_charge',
service_total = '$ser_percent', stage_amount = '$stage_charge', stage_id = '$stage_cr', sound_amount =  '$sound_charge' ,
sound_id = '$sound_cr', video_amount = '$vid_charge', video_id = '$vid_cr', misc_amount = '$misc_charge',
misc_id = '$misc_cr', grand_total = '$grand_total',
hall_adv = '$hall_rate', adv_total = '$adv_total', total_received = '$received_amount', EDITED_ID = '$edited_id', EDITED_ON  ='$edited_on'
 WHERE ORDER_NO = '$id' AND FUNCTION_DATE = '$function_date2'";

						mysql_query($query14) or die('Updation Failed:' . mysql_error());
					}
				}
				$num5 = mysql_num_rows($result18);
				if (!$num5) {
					//insert the new selections

					$query17 = "INSERT INTO banq_order_master 
(`ORDER_NO`, `BANQ_ID`, `FUNCTION_TYPE_ID`, `GUEST_NAME`, `GUEST_ADDRESS`, 
`CONTACT_PERSON`, `CONTACT_NO`, `FUNCTION_DATE`, `BOOKING_STATUS`, `TIME_FROM`, 
`TIME_TO`, `TOTAL_CHARGES_BANQ`, `PAYMENT_MODE_BANQ`, `CHEQUE_NO_BANQ`, `BANK_BANQ`, `CREDIT_CARD_NO_BANQ`, 
`DIFFERENCE_AMOUNT`, `DISCOUNT_DETAIL`, `BOOKING_DATE`, `guest_expected`, `guest_guranteed`, `function_incharge`, `CNIC`, `taste`, 
`SPL_notes`, `notes`,`add_notes`, `Stage_no`, `Sound`, `Video`, `Misc`, `b_rate`, `b_rate_total`, `Drink_no`, `Drink_rate`, 
`Drink_rate_total`, `tea_no`, `tea_rate`, `tea_rate_total`, `water_no`, `water_rate`, `water_rate_total`, 
`tableset_no`, `tableset_rate`, `tableset_rate_total`, `extra`, `tax`, `tax_total`, `service`, `service_total`, 
`stage_amount`, `stage_id`, `sound_amount`, `sound_id`, `video_amount`, `video_id`, 
`misc_amount`, `misc_id`, `grand_total` , `hall_adv`, `adv_total` ,`total_received`, `EDITED_ID`, `EDITED_ON`) 

VALUES ('$id', '$hall1', '$function_type_id', '$guest_name', '$guest_address', 
'$contact_person', '$contact_no','$function_date2', '$b_status', '$slot_from', 
'$slot_to', '$b_rate_total', '$p_mode', '$chequeno', '$bank', '$card_no',
'$net', '$discount', '$booking_date', '$guest_expected', '$guest_guranted', '$function_incharge', '$cnic', '$taste',
  '$spl_notes', '$extra_notes','$add_notes', '$stage_no', '$sound', '$video', '$misc', '$b_rate', '$b_rate_total', '$drinks', '$drinks_rate', 
'$drinks_total', '$tea', '$tea_rate', '$tea_total', '$water', '$water_rate', '$water_total',
 '$tset', '$tset_rate', '$tset_total', '$extra', '$tax', '$tax_percent', '$ser_charge', '$ser_percent', 
 '$stage_charge', '$stage_cr', '$sound_charge', '$sound_cr','$vid_charge', '$vid_cr',
 '$misc_charge', '$misc_cr','$grand_total', '$hall_rate','$adv_total','$received_amount', '$edited_id' , '$edited_on')";

					mysql_query($query17) or die('Insertion Failed:' . mysql_error());
				}
			}
		}
	}
	// INSTALLEMENTS RECORD SAVED

	//first installment
	$ins1 = $_POST['adv1'];
	$adv_cr1 = $_POST['adv_cr1'];
	if ($ins1 != "") {
		$query19 = "SELECT CR_NO FROM payment_serial WHERE ORDER_ID = '$id' AND INSTALMENT_NO = '1'";
		$result19 = mysql_query($query19);
		while ($h19 = mysql_fetch_array($result19)) {
			if ($adv_cr1 == $h19['CR_NO']) {
				$query24 = "UPDATE payment_serial SET
INSTALMENT_AMOUNT = '$ins1'
WHERE ORDER_ID = '$id' AND INSTALMENT_NO = '1'";

				mysql_query($query24) or die('Updation Failed:' . mysql_error());
			}
		}
		$num9 = mysql_num_rows($result19);
		if (!$num9) {
			$query12 = "INSERT INTO payment_serial
(`CR_NO`,`ORDER_ID`, `INSTALMENT_NO`, `INSTALMENT_AMOUNT`, `CREATED_ID`, `CREATED_ON`) 
VALUES ('$adv_cr1', '$id', '1', '$ins1', '$created_id' , '$created_on')";

			mysql_query($query12) or die('Insertion Failed:' . mysql_error());
		}
	}

	//second installment
	$ins2 = $_POST['adv2'];
	$adv_cr2 = $_POST['adv_cr2'];
	if ($ins2 != "") {
		$query20 = "SELECT CR_NO FROM payment_serial_admin WHERE ORDER_ID = '$id' AND INSTALMENT_NO = '2'";
		$result20 = mysql_query($query20);
		while ($h20 = mysql_fetch_array($result20)) {
			if ($adv_cr2 == $h20['CR_NO']) {
				$query25 = "UPDATE payment_serial_admin SET
INSTALMENT_AMOUNT = '$ins2'
WHERE ORDER_ID = '$id' AND INSTALMENT_NO = '2'";

				mysql_query($query25) or die('Updation Failed:' . mysql_error());
			}
		}
		$num20 = mysql_num_rows($result20);
		if (!$num20) {
			$query13 = "INSERT INTO payment_serial_admin
(`CR_NO`,`ORDER_ID`, `INSTALMENT_NO`, `INSTALMENT_AMOUNT`, `CREATED_ID`, `CREATED_ON`) 
VALUES ('$adv_cr2', '$id', '2', '$ins2', '$created_id' , '$created_on')";

			mysql_query($query13) or die('Insertion Failed:' . mysql_error());
		}
	}

	//third insatllment
	$ins3 = $_POST['adv3'];
	$adv_cr3 = $_POST['adv_cr3'];

	if ($ins3 != "") {

		$query21 = "SELECT CR_NO FROM payment_serial_admin WHERE ORDER_ID = '$id' AND INSTALMENT_NO = '3'";
		$result21 = mysql_query($query21);
		while ($h21 = mysql_fetch_array($result21)) {
			if ($adv_cr3 == $h21['CR_NO']) {
				$query25 = "UPDATE payment_serial_admin SET
INSTALMENT_AMOUNT = '$ins3'
WHERE ORDER_ID = '$id' AND INSTALMENT_NO = '3'";

				mysql_query($query25) or die('Updation Failed:' . mysql_error());
			}
		}
		$num25 = mysql_num_rows($result25);
		if (!$num25) {
			$query14 = "INSERT INTO payment_serial_admin
(`CR_NO`,`ORDER_ID`, `INSTALMENT_NO`, `INSTALMENT_AMOUNT`, `CREATED_ID`, `CREATED_ON`) 
VALUES ('$adv_cr3', '$id', '3', '$ins3', '$created_id' , '$created_on')";

			mysql_query($query14) or die('Insertion Failed:' . mysql_error());
		}
	}
}
