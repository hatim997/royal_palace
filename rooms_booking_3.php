<?php session_start(); ?>
<?php
include('config.php');
//include('time_settings.php');
//include('update_activity.php');

$edited_id = $_SESSION['username'];
$tdate = mktime(date("m"),date("d"),date("Y"),date("H"),date("i"),date("s"));
$edited_on = date("Y-m-d-H-i-s", $tdate);
if(isset($_REQUEST['update']))
	{

$b_num = $_POST['b_num'];
$b_date = $_POST['b_date'];
$b_time = $_POST['b_time'];
$book_status = $_POST['book_status'];
$c_name = $_POST['c_name'];
$c_client = $_POST['c_client'];
$tel = $_POST['tel'];
$cnic = $_POST['cnic'];
$check_in = $_POST['check_in'];
$l_date = $_POST['check_out'];
$check_out = $_POST['check_out'];
$stay_days = $_POST['stay_days'];
$g_charge = $_POST['g_charge'];
$t_disc= $_POST['t_disc'];
$pay_mode=$_POST['pay_mode'];
$t_charge = $_POST['t_charge'];
if($pay_mode == "N" || "C")
{
	$chequeno = "";
	$bank = "";
	$cardno = "";
}
else if($pay_mode == "Q")
{
$chequeno= $_POST['chequeno'];
$bank= $_POST['bank'];
$cardno= "";
}
else if($pay_mode == "R")
{
$chequeno= "";
$bank= "";
$cardno= $_POST['cardno'];
}
		//update room
			$query5="UPDATE booking_tab SET `BOOKING_NO`= '$b_num',`CUSTOMER_NAME`='$c_name',`CUSTOMER_CELL_NO`='$tel',
			`CUSTOMER_CNIC`= '$cnic',`BOOKING_FLAG`='$book_status',`NO_OF_DAYS`= '$stay_days',
			`LEAVING_DATE`= '$l_date',`TOTAL_CHARGES`= '$g_charge',`TOTAL_DISCOUNT`='$t_disc',`CHECK_IN_DATE`='$check_in',
			`CHECK_OUT_DATE`='$check_out',`PAYMENT_MODE`='$pay_mode',`PAYMENT_FLAG`= '$pay_mode',
			`PAYMENT_REC`='$t_charge',`CHEQUE_NO`='$chequeno',`BANK`='$bank',`CREDIT_CARD_N0`='$cardno',
			`EDITED_ID`='$edited_id',`EDITED_ON`='$edited_on'
			WHERE BOOKING_NO = '$b_num'";

mysql_query($query5) or die('Updation Failed:'.mysql_error());
$q1="SELECT `ROOM_ID` FROM `booking_history_tab` WHERE `BOOKING_NO` = '$b_num'";
$r1=mysql_query($q1);
while($a1=mysql_fetch_array($r1))
	{

$rm=$a1['ROOM_ID'];
	$query3="UPDATE booking_history_tab SET `CUSTOMER_NAME`='$c_name',
	`CUSTOMER_CELL_NO`='$tel',`CUSTOMER_CNIC`='$cnic',`CHECK_IN_DATE`='$check_in',
	`CHECK_OUT_DATE`='$check_out',`ROOM_FLAG`='$book_status',`EDITED_ID`='$edited_id',`EDITED_ON`= '$edited_on' 
	WHERE `BOOKING_NO`='$b_num' AND `ROOM_ID`='$rm'";
	$result3=mysql_query($query3) or die('Updation Failed'.mysql_error());
	}
	}
	?>