<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
//$restid = $_SESSION['restid'];
?>
<?php

$from = $_POST['from_date'];
$to = $_POST['to_date'];


echo '<div style="margin-left:750px; font-weight:800; font-size:16px; "><a href="rpt_banq_collection_by_booking.php"><strong>Refresh</strong></a>
</div>';

//echo '<div style="float:right; font-weight:800; font-size:16px; "><a href="rpt_banq_collection.php"><strong>Back</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="banq_admin.php"><strong>Main Menu</strong></a></div>';

//echo '<div style="float:right; font-weight:800; font-size:16px; "><a href="banq_admin.php"><strong>Main</strong></a>
//</div';


echo '<div width="1300">
	  <table width="1300" border="0" cellpadding="0" cellspacing="0" align="left" style="border:1px solid #8e3f2b;">
		<thead>
		<tr style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px">
				<td width="50" align="center"><strong>Sr NO</strong></td>
				<td width="60" align="center"><strong>Today</strong></td>
				<td width="70" align="center"><strong>Booking<br>Date</td>
				<td width="70" align="center"><strong>Payment<br>Date</strong></td>
				<td width="60" align="center"><strong>Order No</strong></td>
				<td width="70" align="center"><strong>Banquet<br>Name</strong></td>
				<td width="60" align="center"><strong>Function<br>Type</strong></td>
				<td width="70" align="center"><strong>Function<br>Date</strong></td>
				<td width="120" align="center"><strong>Guest<br>Name</strong></td>
				<td width="60" align="center"><strong>Contact<br>No</strong></td>
				<td width="70" align="center"><strong>Total<br>Payable</strong></td>
				<td width="50" align="center"><strong>CR-No</strong></td>
				<td width="70" align="center"><strong>Received<br>Amount</strong></td>
				<td width="70" align="center"><strong>To-Date<br>Received</strong></td>
				<td width="80" align="center"><strong>Net Payable</strong></td>
				
		</tr>
		</thead>';

$from1 = $from;
$st_date = explode("-", $from1);
$d = 0;
$j1 = 0;

$order_no = 0;
$morder_no2 = 0;
$banq_id = 0;
$function_id = 0;
$function_date = 0;
$host_name = 0;
$contact_no = 0;

$grand_cash = 0;
$grand_credit = 0;
$grand_total = 0;
$banq_cash = 0;
$banq_credit = 0;
$banq_total = 0;
$BANQ_NAME = 0;
$FUNCTION_TYPE_NAME = 0;
$CREATED_ON = "0000-00-00";
$CR_NO = 0;
$INSTALMENT_AMOUNT = 0;

while ($from1 < $to) {
	//$check_date = 
	$day_cash = 0;
	$day_credit = 0;
	$day_total = 0;

	$j = $d + 1;
	$sale = 0;
	$from1 = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2] + $d, $st_date[0]));
	$show_date = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2] + $d, $st_date[0]));
	$day = date("l", mktime(0, 0, 0, $st_date[1], $st_date[2] + $d, $st_date[0]));
	$start = $from1;
	$end = $from1;

	$query = "SELECT * FROM banq_order_master WHERE BOOKING_DATE >= '$start' AND BOOKING_DATE <= '$end' ORDER BY ORDER_NO ASC";
	$result1 = mysqli_query($conn, $query) or die('Banquet failed! ' . mysqli_error($conn));
	$result1_fetch = mysqli_fetch_array($result1);
	$num = mysqli_num_rows($result1);

	$i = 0;

	//echo $result1_fetch[0];
	if ('$result1_fetch[0]' != ""); {
		while ($i < $num) {
			mysqli_data_seek($result1, $i);
			$row = mysqli_fetch_assoc($result1);

			$morder_no = $row['ORDER_NO'];
			if ($morder_no != $morder_no2) {
				$banq_id = $row['BANQ_ID'];
				$function_id = $row['FUNCTION_TYPE_ID'];
				$function_date = $row['FUNCTION_DATE'];
				$host_name = $row['GUEST_NAME'];
				$contact_no = $row['CONTACT_NO'];
				$total = $row['grand_total'];
				$cash = $row['total_received'];
				$credit = $total - $cash;
			}

			if ($morder_no == $morder_no2) {
				$banq_id = $row['BANQ_ID'];
				$function_id = $row['FUNCTION_TYPE_ID'];
				$function_date = $row['FUNCTION_DATE'];
				$host_name = $row['GUEST_NAME'];
				$contact_no = $row['CONTACT_NO'];
				$total = 0;
				$cash = 0;
				$credit = $total - $cash;
			}

			if ($banq_id != 0) {
				$query2 = "SELECT BANQ_NAME FROM banq_master_tab WHERE BANQ_ID = '$banq_id'";
				$result2 = mysqli_query($conn, $query2) or die('Banquet failed!' . mysqli_error($conn));
				$row2 = mysqli_fetch_assoc($result2);
				$BANQ_NAME = $row2["BANQ_NAME"];
			}

			if ($function_id != 0) {
				$query4 = "SELECT FUNCTION_TYPE_NAME FROM function_type_tab WHERE FUNCTION_TYPE_ID = '$function_id'";
				$result4 = mysqli_query($conn, $query4) or die('Banquet failed!' . mysqli_error($conn));
				$row4 = mysqli_fetch_assoc($result4);
				$FUNCTION_TYPE_NAME = $row4["FUNCTION_TYPE_NAME"];
			}

			if ($morder_no != 0) {
				$query3 = "SELECT INSTALMENT_AMOUNT, CR_NO, CREATED_ON FROM payment_serial WHERE ORDER_ID = '$morder_no'";
				$result3 = mysqli_query($conn, $query3) or die('Banquet failed!' . mysqli_error($conn));
				$num3 = mysqli_num_rows($result3);
				$result3_fetch = mysqli_fetch_array($result3);

				if (isset($result3_fetch[2]) && $result3_fetch[2] != 0) {
					if ($morder_no != $morder_no2) {
						$row3 = mysqli_fetch_assoc($result3);
						$CR_NO = $row3["CR_NO"];
						$INSTALMENT_AMOUNT = $row3["INSTALMENT_AMOUNT"];
						$CREATED_ON = $row3["CREATED_ON"];
					}
				}
			}

			$j1 = $j1 + 1;


?>
			<tr style="background-color:<?php if ($d % 2 == 0) echo "#9C9";
										else echo "#2CC"; ?>; height:30px; font-size:14px;">
				<td width="70" align="center"><?php echo $j1; ?></td>
				<td width="80" align="center"><?php echo $day; ?></td>
				<td width="80" align="center"><?php echo $result1_fetch[24]; ?></td>

				<!--<td width="80" align="center"><?php echo $show_date; ?></td>-->
				<td width="80" align="center"><?php echo $CREATED_ON; ?></td>
				<!--<td width="80" align="center"><?php echo $result1_fetch[0]; ?></td>-->
				<td width="80" align="center"><?php echo $morder_no; ?></td>
				<td width="80" align="left"><?php echo $BANQ_NAME; ?></td>
				<td width="80" align="center"><?php echo $FUNCTION_TYPE_NAME; ?></td>
				<td width="80" align="center"><?php echo $function_date; ?></td>
				<td width="80" align="left"><?php echo $host_name; ?></td>
				<td width="80" align="center"><?php echo $contact_no; ?></td>
				<td width="80" align="center"><?php echo $total; ?></td>
				<td width="50" align="center"><?php echo $CR_NO; ?></td>
				<td width="80" align="center"><?php echo $INSTALMENT_AMOUNT; ?></td>
				<td width="80" align="center"><?php echo $cash; ?></td>
				<td width="80" align="center"><?php echo $total - $cash; ?></td>
			</tr>

		<?php
			$day_total = $day_total + $total;
			$day_cash = $day_cash + $cash;
			$day_credit = $day_credit + $credit;

			$CREATED_ON = "0000-00-00";
			$CR_NO = 0;
			$INSTALMENT_AMOUNT = 0;
			mysqli_data_seek($result1, $i);
			$row = mysqli_fetch_assoc($result1);
			$morder_no2 = $row["ORDER_NO"];

			$i++;
		} // sale query while ends here
		$banq_cash = $banq_cash + $day_cash;
		$banq_credit = $banq_credit + $day_credit;
		$banq_total = $banq_total + $day_total;

		?>
		<!--
		if($num==0){
?>
		<tr style="background-color:<?php if ($d % 2 == 0) echo "#9C9";
									else echo "#999"; ?>; height:30px; font-size:14px;">
            <td width="70" align="center"><?php echo $j; ?></td>
            <td width="80" align="center"><?php echo $day; ?></td>
            <td width="80" align="center"><?php echo $show_date; ?></td>
            <td width="80" align="center"><?php echo $CREATED_ON; ?></td>
            <td width="80" align="center"><?php echo $morder_no; ?></td>
            <td width="80" align="center"><?php echo $BANQ_NAME; ?></td>
            <td width="80" align="center"><?php echo $FUNCTION_TYPE_NAME; ?></td>
            <td width="80" align="center"><?php echo $function_date; ?></td>
            <td width="80" align="center"><?php echo $host_name; ?></td>
            <td width="80" align="center"><?php echo $contact_no; ?></td>
            <td width="80" align="center"><?php echo $day_total; ?></td>
            <td width="50" align="center"><?php echo $CR_NO; ?></td>
            <td width="80" align="center"><?php echo $INSTALMENT_AMOUNT; ?></td>
            <td width="80" align="center"><?php echo $day_cash; ?></td>
            <td width="80" align="center"><?php echo $day_credit; ?></td>
		</tr>
-->
		<!--
		}
		-->


<?php


		$FUNCTION_TYPE_NAME = 0;
		$function_id = 0;
		$BANQ_NAME   = 0;
		$banq_id = 0;
		$host_name = 0;
		$contact_no = 0;
		$function_date = 0;
		$order_no = 0;

		$CREATED_ON = "0000-00-00";
		$CR_NO = 0;
		$INSTALMENT_AMOUNT = 0;
	} // if order !=0 ends here

	$d++; // outer Date while ends here
}
$grand_cash = $grand_cash + $banq_cash;
$grand_credit = $grand_credit + $banq_credit;
$grand_total = $grand_total + $banq_total;
//}   //else ends here
?>
</table>
<table width="1350" border="0" cellpadding="0" cellspacing="0" align="left">
	<tr style="height:30px; font-size:14px;">
		<td width="80" align="center">&nbsp;</td>
		<td width="80" align="center">&nbsp;</td>
		<td width="80" align="center">&nbsp;</td>
		<td width="80" align="center">&nbsp;</td>
		<td width="50" align="center">&nbsp;</td>
		<!--<td width="80" align="center">&nbsp;</td>
            <td width="80" align="center">&nbsp;</td>
            <td width="80" align="center">&nbsp;</td>
            <td width="0" align="center">&nbsp;</td> -->
		<td width="60" align="left"><strong>Total</strong></td>
		<td width="50" align="left"><?php echo $banq_total; ?></td>
		<td width="30" align="center">&nbsp;</td>
		<td width="10" align="center">&nbsp;</td>
		<td width="50" align="center"><?php echo $banq_cash; ?></td>
		<td width="50" align="left"><?php echo $banq_credit; ?></td>
	</tr>
</table>
</div>