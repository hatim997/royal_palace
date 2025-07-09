<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php

$from = $_POST['from_date'];
$to = $_POST['to_date'];
//echo $value."<br>";
//echo '<h1 class="style1" style=" font-size:16px;">New Guest</h1>';
echo '<br><h2 style="font-size:18px; color:#8e3f2b;">Banquet</h2><br>';
echo '<div width="850">
	  <table width="820" border="0" cellpadding="0" cellspacing="0" align="left" style="border:1px solid #8e3f2b;">
		<thead>
		<tr style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px">
				<td width="70" align="center"><strong>Sr NO</strong></td>
				<td width="80" align="center"><strong>Today</strong></td>
				<td width="80" align="center"><strong>Date</strong></td>
				<td width="80" align="center"><strong>Cash</strong></td>
				<td width="100" align="center"><strong>Credit</strong></td>
				<td width="110" align="center"><strong>Total</strong></td>
				
		</tr>
		</thead>';

$from1 = $from;
$st_date = explode("-", $from1);
$d = 0;
$grand_cash = 0;
$grand_credit = 0;
$grand_total = 0;
$banq_cash = 0;
$banq_credit = 0;
$banq_total = 0;
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
	$num = mysqli_num_rows($result1);

	$i = 0;
	while ($i < $num) {
		mysqli_data_seek($result1, $i);
		$row = mysqli_fetch_assoc($result1);

		$total = $row['grand_total'];
		$cash = $row['total_received'];
		$credit = $total - $cash;

		$day_total  = $day_total + $total;
		$day_cash   = $day_cash + $cash;
		$day_credit = $day_credit + $credit;

		$i++;
	} // sale query while ends here
	$banq_cash = $banq_cash + $day_cash;
	$banq_credit = $banq_credit + $day_credit;
	$banq_total = $banq_total + $day_total;
?>
	<tr style="background-color:<?php if ($d % 2 == 0) echo "#FFF799";
								else echo "#FFB06E"; ?>; height:30px; font-size:14px;">
		<td width="70" align="center"><?php echo $j; ?></td>
		<td width="80" align="center"><?php echo $day; ?></td>
		<td width="80" align="center"><?php echo $show_date; ?></td>
		<td width="100" align="center"><?php echo $day_cash; ?></td>
		<td width="80" align="center"><?php echo $day_credit; ?></td>
		<td width="110" align="center"><?php echo $day_total; ?></td>
	</tr>
<?php

	$d++; // outer Date while ends here
}
$grand_cash = $grand_cash + $banq_cash;
$grand_credit = $grand_credit + $banq_credit;
$grand_total = $grand_total + $banq_total;
//}   //else ends here
?>
</table>
<table width="820" border="0" cellpadding="0" cellspacing="0" align="left">
	<tr style="height:30px; font-size:14px;">
		<td width="70" align="center">&nbsp;</td>
		<td width="80" align="center">&nbsp;</td>
		<td width="80" align="center">Total</td>
		<td width="100" align="center"><?php echo $banq_cash; ?></td>
		<td width="80" align="center"><?php echo $banq_credit; ?></td>
		<td width="110" align="center"><?php echo $banq_total; ?></td>
	</tr>
</table>
</div>

<!-- RESTAURANT CODE GOES HERE -->
<?php
echo '<br><h2 style="font-size:18px; color:#8e3f2b;">Restaurant</h2><br>';
echo '<div width="850">
	  <table width="820" border="0" cellpadding="0" cellspacing="0" align="left" style="border:1px solid #8e3f2b;">
		<thead>
		<tr style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px">
				<td width="70" align="center"><strong>Sr NO</strong></td>
				<td width="80" align="center"><strong>Today</strong></td>
				<td width="80" align="center"><strong>Date</strong></td>
				<td width="80" align="center"><strong>Cash</strong></td>
				<td width="100" align="center"><strong>Credit</strong></td>
				<td width="110" align="center"><strong>Total</strong></td>
				
		</tr>
		</thead>';
$from1 = $from;
$st_date = explode("-", $from1);
$d = 0;
$rest_cash = 0;
$rest_credit = 0;
$rest_total = 0;
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

	$query = "SELECT * FROM order_master_tab WHERE VISITED_DATE >= '$start' AND VISITED_DATE <= '$end' ORDER BY ORDER_NO ASC";
	$result1 = mysqli_query($conn, $query) or die('Restaurant failed! ' . mysqli_error($conn));
	$num = mysqli_num_rows($result1);

	$i = 0;
	while ($i < $num) {
		mysqli_data_seek($result1, $i);
		$row = mysqli_fetch_assoc($result1);

		$total  = $row['TOTAL_CHARGES'];
		$cash   = $row['PAYMENT_REC'];
		$credit = $total - $cash;

		$day_total  = $day_total + $total;
		$day_cash   = $day_cash + $cash;
		$day_credit = $day_credit + $credit;

		$i++;
	} // sale query while ends here
	$rest_cash = $rest_cash + $day_cash;
	$rest_credit = $rest_credit + $day_credit;
	$rest_total = $rest_total + $day_total;
?>
	<tr style="background-color:<?php if ($d % 2 == 0) echo "#FFF799";
								else echo "#FFB06E"; ?>; height:30px; font-size:14px;">
		<td width="70" align="center"><?php echo $j; ?></td>
		<td width="80" align="center"><?php echo $day; ?></td>
		<td width="80" align="center"><?php echo $show_date; ?></td>
		<td width="100" align="center"><?php echo $day_cash; ?></td>
		<td width="80" align="center"><?php echo $day_credit; ?></td>
		<td width="110" align="center"><?php echo $day_total; ?></td>
	</tr>
<?php

	$d++; // outer Date while ends here
}
$grand_cash = $grand_cash + $rest_cash;
$grand_credit = $grand_credit + $rest_credit;
$grand_total = $grand_total + $rest_total;
//}   //else ends here
?>
</table>
<table width="820" border="0" cellpadding="0" cellspacing="0" align="left">
	<tr style="height:30px; font-size:14px;">
		<td width="70" align="center">&nbsp;</td>
		<td width="80" align="center">&nbsp;</td>
		<td width="80" align="center">Total</td>
		<td width="100" align="center"><?php echo $banq_cash; ?></td>
		<td width="80" align="center"><?php echo $banq_credit; ?></td>
		<td width="110" align="center"><?php echo $banq_total; ?></td>
	</tr>
</table>
</div>

<!-- ROOM SERVICE -->

<?php
echo '<br><h2 style="font-size:18px; color:#8e3f2b;">RoomService</h2><br>';
echo '<div width="850">
	  <table width="820" border="0" cellpadding="0" cellspacing="0" align="left" style="border:1px solid #8e3f2b;">
		<thead>
		<tr style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px">
				<td width="70" align="center"><strong>Sr NO</strong></td>
				<td width="80" align="center"><strong>Today</strong></td>
				<td width="80" align="center"><strong>Date</strong></td>
				<td width="80" align="center"><strong>Cash</strong></td>
				<td width="100" align="center"><strong>Credit</strong></td>
				<td width="110" align="center"><strong>Total</strong></td>
				
		</tr>
		</thead>';
$from1 = $from;
$st_date = explode("-", $from1);
$d = 0;
$room_cash = 0;
$room_credit = 0;
$room_total = 0;
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
	/*
	$query = "SELECT * FROM order_master_tab WHERE VISITED_DATE >= '$start' AND VISITED_DATE <= '$end' ORDER BY ORDER_NO ASC";
	$result1 = mysql_query($query) or die ('Restaurant failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		$total = mysql_result($result1,$i, "grand_total" );
		$cash = mysql_result($result1,$i, "total_received" );
		$credit = $total - $cash;
		
		$day_total = $day_total + $total;
		$day_cash = $day_cash + $received;
		$day_credit = $day_credit + $credit;
		
		$i++;
	} // sale query while ends here
	*/
	$room_cash = $room_cash + $day_cash;
	$room_credit = $room_credit + $day_credit;
	$room_total = $room_total + $day_total;
?>
	<tr style="background-color:<?php if ($d % 2 == 0) echo "#FFF799";
								else echo "#FFB06E"; ?>; height:30px; font-size:14px;">
		<td width="70" align="center"><?php echo $j; ?></td>
		<td width="80" align="center"><?php echo $day; ?></td>
		<td width="80" align="center"><?php echo $show_date; ?></td>
		<td width="100" align="center"><?php echo $day_cash; ?></td>
		<td width="80" align="center"><?php echo $day_credit; ?></td>
		<td width="110" align="center"><?php echo $day_total; ?></td>
	</tr>
<?php

	$d++; // outer Date while ends here
}
$grand_cash = $grand_cash + $room_cash;
$grand_credit = $grand_credit + $room_credit;
$grand_total = $grand_total + $room_total;
//}   //else ends here
?>
</table>
<table width="820" border="0" cellpadding="0" cellspacing="0" align="left">
	<tr style="height:30px; font-size:14px;">
		<td width="70" align="center">&nbsp;</td>
		<td width="80" align="center">&nbsp;</td>
		<td width="80" align="center">Total</td>
		<td width="100" align="center"><?php echo $banq_cash; ?></td>
		<td width="80" align="center"><?php echo $banq_credit; ?></td>
		<td width="110" align="center"><?php echo $banq_total; ?></td>
	</tr>
</table>
</div>

<!-- SWIMMING POOL -->

<?php
echo '<br><h2 style="font-size:18px; color:#8e3f2b;">Swimming Pool</h2><br>';
echo '<div width="850">
	  <table width="820" border="0" cellpadding="0" cellspacing="0" align="left" style="border:1px solid #8e3f2b;">
		<thead>
		<tr style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px">
				<td width="70" align="center"><strong>Sr NO</strong></td>
				<td width="80" align="center"><strong>Today</strong></td>
				<td width="80" align="center"><strong>Date</strong></td>
				<td width="80" align="center"><strong>Cash</strong></td>
				<td width="100" align="center"><strong>Credit</strong></td>
				<td width="110" align="center"><strong>Total</strong></td>
				
		</tr>
		</thead>';
$from1 = $from;
$st_date = explode("-", $from1);
$d = 0;
$room_cash = 0;
$room_credit = 0;
$room_total = 0;
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
	/*
	$query = "SELECT * FROM order_master_tab WHERE VISITED_DATE >= '$start' AND VISITED_DATE <= '$end' ORDER BY ORDER_NO ASC";
	$result1 = mysql_query($query) or die ('Restaurant failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		$total = mysql_result($result1,$i, "grand_total" );
		$cash = mysql_result($result1,$i, "total_received" );
		$credit = $total - $cash;
		
		$day_total = $day_total + $total;
		$day_cash = $day_cash + $received;
		$day_credit = $day_credit + $credit;
		
		$i++;
	} // sale query while ends here
	*/
	$room_cash = $room_cash + $day_cash;
	$room_credit = $room_credit + $day_credit;
	$room_total = $room_total + $day_total;
?>
	<tr style="background-color:<?php if ($d % 2 == 0) echo "#FFF799";
								else echo "#FFB06E"; ?>; height:30px; font-size:14px;">
		<td width="70" align="center"><?php echo $j; ?></td>
		<td width="80" align="center"><?php echo $day; ?></td>
		<td width="80" align="center"><?php echo $show_date; ?></td>
		<td width="100" align="center"><?php echo $day_cash; ?></td>
		<td width="80" align="center"><?php echo $day_credit; ?></td>
		<td width="110" align="center"><?php echo $day_total; ?></td>
	</tr>
<?php

	$d++; // outer Date while ends here
}
$grand_cash = $grand_cash + $room_cash;
$grand_credit = $grand_credit + $room_credit;
$grand_total = $grand_total + $room_total;
//}   //else ends here
?>
</table>
<table width="820" border="0" cellpadding="0" cellspacing="0" align="left">
	<tr style="height:30px; font-size:14px;">
		<td width="70" align="center">&nbsp;</td>
		<td width="80" align="center">&nbsp;</td>
		<td width="80" align="center">Total</td>
		<td width="100" align="center"><?php echo $banq_cash; ?></td>
		<td width="80" align="center"><?php echo $banq_credit; ?></td>
		<td width="110" align="center"><?php echo $banq_total; ?></td>
	</tr>
</table>
</div>

<!-- GYM -->

<?php
echo '<br><h2 style="font-size:18px; color:#8e3f2b;">Gym<span style="color:#FFFFFF;">Gym</span></h2><br>';
echo '<div width="850">
	  <table width="820" border="0" cellpadding="0" cellspacing="0" align="left" style="border:1px solid #8e3f2b;">
		<thead>
		<tr style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px">
				<td width="70" align="center"><strong>Sr NO</strong></td>
				<td width="80" align="center"><strong>Today</strong></td>
				<td width="80" align="center"><strong>Date</strong></td>
				<td width="80" align="center"><strong>Cash</strong></td>
				<td width="100" align="center"><strong>Credit</strong></td>
				<td width="110" align="center"><strong>Total</strong></td>
				
		</tr>
		</thead>';
$from1 = $from;
$st_date = explode("-", $from1);
$d = 0;
$room_cash = 0;
$room_credit = 0;
$room_total = 0;
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
	/*
	$query = "SELECT * FROM order_master_tab WHERE VISITED_DATE >= '$start' AND VISITED_DATE <= '$end' ORDER BY ORDER_NO ASC";
	$result1 = mysql_query($query) or die ('Restaurant failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		$total = mysql_result($result1,$i, "grand_total" );
		$cash = mysql_result($result1,$i, "total_received" );
		$credit = $total - $cash;
		
		$day_total = $day_total + $total;
		$day_cash = $day_cash + $received;
		$day_credit = $day_credit + $credit;
		
		$i++;
	} // sale query while ends here
	*/
	$room_cash = $room_cash + $day_cash;
	$room_credit = $room_credit + $day_credit;
	$room_total = $room_total + $day_total;
?>
	<tr style="background-color:<?php if ($d % 2 == 0) echo "#FFF799";
								else echo "#FFB06E"; ?>; height:30px; font-size:14px;">
		<td width="70" align="center"><?php echo $j; ?></td>
		<td width="80" align="center"><?php echo $day; ?></td>
		<td width="80" align="center"><?php echo $show_date; ?></td>
		<td width="100" align="center"><?php echo $day_cash; ?></td>
		<td width="80" align="center"><?php echo $day_credit; ?></td>
		<td width="110" align="center"><?php echo $day_total; ?></td>
	</tr>
<?php

	$d++; // outer Date while ends here
}
$grand_cash = $grand_cash + $room_cash;
$grand_credit = $grand_credit + $room_credit;
$grand_total = $grand_total + $room_total;
//}   //else ends here
?>
</table>
<table width="820" border="0" cellpadding="0" cellspacing="0" align="left">
	<tr style="height:30px; font-size:14px;">
		<td width="70" align="center">&nbsp;</td>
		<td width="80" align="center">&nbsp;</td>
		<td width="80" align="center">Total</td>
		<td width="100" align="center"><?php echo $banq_cash; ?></td>
		<td width="80" align="center"><?php echo $banq_credit; ?></td>
		<td width="110" align="center"><?php echo $banq_total; ?></td>
	</tr>
</table>
</div>