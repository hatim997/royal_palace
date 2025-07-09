<?php session_start(); ?>
<?php
include('config.php');
//include('time_settings.php');
//include('update_activity.php');

$created_id = $_SESSION['username'];
$created_on = $_POST['b_date'];
//$restid = $_SESSION['restid'];
$b_num = $_POST['b_num'];
$b_date = $_POST['b_date'];
$b_time = $_POST['b_time'];
$book_status = $_POST['book_status'];
$c_name = $_POST['c_name'];
$c_client = $_POST['c_client'];
$tel = $_POST['tel'];
$cnic = $_POST['cnic'];
$check_in = $_POST['check_in'];
$cc_date = $_POST['check_out'];

$cc_date = trim($cc_date);

$stay_days = $_POST['stay_days'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Room Booking</title>
<link rel="stylesheet" href="css/screen00.css" type="text/css" media="screen" title="default" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
 <script src="http://malsup.github.com/jquery.form.js"></script>


<script type="text/javascript">
    function payment_mode(value)
    {
		//var total = encodeURIComponent(document.getElementById("total_charges").value);
		//alert(value);
		
		var xmlhttp;
		if (value == "")
  		{
			//document.getElementById("mode").innerHTML="";
			alert("Please select the value");
			return;
  		}
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("mode").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/payment_mode_room.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("value="+value);
	}
</script>
<script type="text/javascript">


function n_days()
{

	var check_out = encodeURIComponent(document.getElementById("check_out").value);
	var l_date = encodeURIComponent(document.getElementById("check_in").value);
	var n_day = encodeURIComponent(document.getElementById("stay_days").value);
	if(check_out == "")
	{
		alert("Please select date");
		return;
	}

	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("stay_days").value=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/n_days.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("&check_out="+check_out+"&l_date="+l_date);
}
</script>
<script type="text/javascript">

function calculate_discount(A,B) {
	var discount= encodeURIComponent(document.getElementById(A).value);
	var tot=  encodeURIComponent(document.getElementById(B).value);
	var dif= Number(tot)- Number(discount);
	if (dif<=0)
	{
		document.getElementById(A).value =0;
		alert("Discount must be less than Grand Total");
		return;
	}
	else
	{
  var one = document.getElementById(A).value;
  var two = document.getElementById(B).value; 
var discount_total= two - one;
document.getElementById("t_charge").value = discount_total;
	}
}
</script>

<script type="text/javascript">

function netamount(A) {
	var rec= encodeURIComponent(document.getElementById(A).value);
	var tot=  encodeURIComponent(document.getElementById("t_charge").value);
	var dif= Number(rec)- Number(tot);
	if (dif<=0)
	{
		document.getElementById(A).value =0;
		alert("please pay the full Bill");
		return;
	}
	else
	{

document.getElementById("bal_return").value = dif;
	}
}
</script>
<script>
$(function() {
    $( "#check_in" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
	 $( "#check_out" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
});

</script>
    <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#form').ajaxForm(function() { 
                alert("Booking is successful!");
				
            }); 
        }); 
		
    </script>
</head>


<body>
<div id="logo"  >
<h1>Hotel Royal Palace </h1>
</div>

<div id="content">

<div id="page-heading">
  <h1>&nbsp;</h1>
  <h1>Rooms Reservation</h1>
</div>

<div id="step-holder">
	<div class="step-no-off">1</div>
	<div class="step-light-left"><a href="rooms_booking.php">Reservation</a></div>
	<div class="step-light-right">&nbsp;</div>
	<div class="step-no">2</div>
	<div class="step-dark-left"><a href="rooms_booking_2.php">Complete Bill</a></div>
	<div class="clear"></div>
	
</div>

<div id="content-inner">   
<?php
if(isset($_REQUEST['submit']))
	{
//book the room
$query70="INSERT INTO booking_tab(BOOKING_NO, CUSTOMER_NAME, CUSTOMER_CELL_NO, CUSTOMER_CNIC, BOOKING_DATE, 
BOOKING_TIME, BOOKING_FLAG, NO_OF_DAYS, LEAVING_DATE, CHECK_IN_DATE, CREATED_ID, CREATED_ON)
	 VALUES ('$b_num','$c_name','$tel', '$cnic','$b_date', '$b_time', '$book_status', '$stay_days', 
	 '$cc_date',
	 '$check_in', '$created_id' , '$created_on')";
$result70=mysql_query($query70) or die('Insertion1 Failed'.mysql_error());;

//add rooms history in booking_history_tab table 

foreach ($_POST['b_room'] as $value) 
	{
$room=explode("#",$value);
$rm=$room[1];
	$query3="INSERT INTO booking_history_tab(BOOKING_NO, ROOM_ID, CUSTOMER_NAME, CUSTOMER_CELL_NO, 
	CUSTOMER_CNIC, CHECK_IN_DATE, ROOM_FLAG,CREATED_ID, CREATED_ON)
	 VALUES ('$b_num', '$rm', '$c_name','$tel', '$cnic', '$check_in', '$book_status' , '$created_id' , '$created_on')";
	$result3=mysql_query($query3) or die('Insertion2 Failed'.mysql_error());
	}

?>
	
<form name="form" id="form"  method="post" action="rooms_booking_3.php">  

<table width="764" frame="hsides" bgcolor="#FFFFD2">
		
    <tr height="50" >
		<td width="95">Booking no.</td>
		<td width="145"><input type="text" name="b_num" id="b_num" size="2" value="<?php echo $b_num; ?>"  readonly="readonly"/></td>
	
		<td width="95">Booking Date:</td>
         <td width="175"><input type="text" name="b_date" id="b_date" size="8" value="<?php echo $b_date; ?>" readonly="readonly"></td>
        <td width="97">Booking Time: </td>
		<td width="129">	<input type="text" name="b_time" id="b_time" size="6"  value="<?php echo $b_time; ?>" readonly="readonly"/></td>
	</tr>
    </table>
    <table width="765" bgcolor="#FFFFD2" frame="box">
       

  
  
  <?php if($book_status == "B")
  { ?>
  <tr height="65">
  <td width="128">Booking Status:</td>
  <td width="103"><input name="book_status" type="radio" value="C" /> Cancelled
  </td><td width="89"><input name="book_status" type="radio" value="T"/> Tentative
  </td><td width="425"><input name="book_status" type="radio" value="B" checked="checked"/> Booked</td>
  </tr>
  <?php }  ?>
   <?php if($book_status == "C")
  { ?>
  <tr height="65">
  <td width="128">Booking Status:</td>
  <td width="103"><input name="book_status" type="radio" value="C" checked="checked" /> Cancelled
  </td><td width="89"><input name="book_status" type="radio" value="T"/> Tentative
  </td><td width="425"><input name="book_status" type="radio" value="B" /> Booked</td>
  </tr>
  <?php }  ?>
   <?php if($book_status == "T")
  { ?>
  <tr height="65">
  <td width="128">Booking Status:</td>
  <td width="103"><input name="book_status" type="radio" value="C" /> Cancelled
  </td><td width="89"><input name="book_status" type="radio" value="T" checked="checked"/> Tentative
  </td><td width="425"><input name="book_status" type="radio" value="B" checked="checked"/> Booked</td>
  </tr>
  <?php }  ?>
  
  </tr>


</table>
    <table width="763" bgcolor="#FFFFD2" frame="above">
    <tr height="20">
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    	<tr>
		<td width="104" height="28">Customer Name</td>
		<td width="316"><input type="text" name="c_name" id="c_name" size="15" value="<?php echo $c_name; ?>" /> </td>
        <td width="106"> Corperate Client </td>
        <td width="217"><select name="c_client" id="c_client">
        <option value="">Select the client </option>
        
        
        </select> </td>
	</tr>
    	<tr >
		<td width="104" height="29">Cell Number</td>
		<td width="316"><input type="text" name="tel" id="tel" size="15" pattern="[0-9]+" value="<?php echo $tel; ?>" /></td>
        
		<td width="106" height="29">CNIC</td>
		<td width="217"><input type="text" name="cnic" id="cnic" size="15" value="<?php echo $cnic; ?>" pattern="[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}" maxlength="15"/> </td>
	</tr>
    </table>
    <table width="762" bgcolor="#FFFFD2">
    	<tr >
		<td width="103"  height="29">Check in</td>
		<td width="319">	
       <input type="text" name="check_in" id="check_in" size="15" value="<?php echo $check_in; ?>" onchange="leave_date();"/>
       
       
       </td>

		<td width="105">No. of Days</td>
		<td width="36" align="right">	
        <input type="text" name="stay_days" id="stay_days" value="<?php echo $stay_days; ?>" size="2"  onchange="leave_date();" onkeydown="leave_date()"/></td>
        <td width="175">
        

</td>

	</tr>
    <tr >
		<td width="103"  height="29">Check out</td>
		<td width="319">	
        <input type="hidden" name="l_date" id="l_date" value="<?php echo $cc_date; ?>"/>
       <input type="text" name="check_out" id="check_out" size="15" value="<?php echo $cc_date; ?>" onchange="n_days();" />
  
       
       </td>

	<td>

</td>

	</tr>
</table>
    
    <table width="763" bgcolor="#FFFFD2" border="3">
    
    <tr style=" font-style:italic;">
<td width="112"><div align="justify">Booked Rooms</div></td>
<td width="251"><div align="justify">Charges</div></td>
<td width="120"><div align="justify">Services Availed</div></td>
<td width="248"><div align="justify">Charges</div></td>
</tr>


<?php
foreach ($_POST['b_room'] as $value) 
	{?>
    <tr>
    <td><?php echo $value; ?></td>
    <?php
		$room=explode("#",$value);
$rm=$room[1];
	$query3="SELECT ROOM_TYPE_ID FROM rooms_tab WHERE ROOM_ID = $rm";
	$result33=mysql_query($query3);
	$row33=mysql_fetch_array($result33);
	$type=$row33['ROOM_TYPE_ID'];
	$query4="SELECT CHARGES_ON_DATE FROM room_charges_history WHERE ROOM_TYPE_ID = $type";
	$result4=mysql_query($query4);
	$row4=mysql_fetch_array($result4);
	$charges=$row4['CHARGES_ON_DATE'];
		?>
<td><?php echo $charges." X ".$stay_days." = ".$stay_days*$charges;?></td>
<td></td>
<td></td>
</tr>
<?php } ?>

</table>
    
    <table width="763" bgcolor="#FFFFD2" >
    
<tr>
		<td width="120" height="29">Grand Total</td>
		<td width="252">
        <?php
		$total_charges=0;
foreach ($_POST['b_room'] as $value) 
	{?>
  
    <?php
		$room=explode("#",$value);
	$rm=$room[1];
	$query3="SELECT ROOM_TYPE_ID FROM rooms_tab WHERE ROOM_ID = $rm";
	$result33=mysql_query($query3);
	$row33=mysql_fetch_array($result33);
	$type=$row33['ROOM_TYPE_ID'];
	$query4="SELECT CHARGES_ON_DATE FROM room_charges_history WHERE ROOM_TYPE_ID = $type";
	$result4=mysql_query($query4);
	while($row4=mysql_fetch_array($result4))
	{
	$charges=$row4['CHARGES_ON_DATE'];
		 $total_charges = $total_charges+($stay_days*$charges); 
	}
	}?>
        
        
        <input type="text" name="g_charge" id="g_charge" size="15" value="<?php echo $total_charges; ?>" /> </td>
        <td width="124"> Total Discount </td>
        <td width="247"><input type="text" name="t_disc" id="t_disc" size="15"  value="0" onchange="calculate_discount('t_disc','g_charge')" />
        </td>
	</tr>
    <tr>
		
        <td width="120"  height="29"> Payment Mode </td>
        <td width="252"><select name="pay_mode" id="pay_mode" onchange="payment_mode(this.value);">
      <option value="">Select Mode</option>
      <option value="N">None</option>
	  <option value="C">Cash</option>
      <option value="Q">Cheque</option>
	  <option value="R">Credit Card</option>
    </select>
        </td>
        <td width="124" height="28">Total Charges</td>
		<td width="247">
        <input type="text" name="t_charge" id="t_charge" size="15" value="<?php echo $total_charges; ?>" /> </td>
	</tr>
        </table>
        <div id="mode"></div>
        </br>

        <table width="763">
    
    	<tr>
		<td width="115" valign="top">
        <input type="submit"  name="update" value="Save Payment" style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="selectAll();" >

		</td>
        <td width="118"><input name="search" type="button" value="Back"  style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='rooms_booking.php'"/></td>
		<td width="514"><input name="exit" type="button" value="Exit"  style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='reception_admin.php'" />
</td>
	</tr>
    </table>
</form>
<?php
	}
if(isset($_REQUEST['updated1']))
	{


	
		//book the room
		$query77="UPDATE booking_tab SET BOOKING_NO = '$b_num', CUSTOMER_NAME = '$c_name', CUSTOMER_CELL_NO = '$tel',
		 CUSTOMER_CNIC = '$cnic', BOOKING_DATE = '$b_date', BOOKING_TIME = '$b_time',
		BOOKING_FLAG = '$book_status' , NO_OF_DAYS = '$stay_days', LEAVING_DATE = '$cc_date', CHECK_IN_DATE = '$check_in',
		CREATED_ID = '$created_id', CREATED_ON = '$created_on' WHERE BOOKING_NO = '$b_num'";

mysql_query($query77) or die('Update1 Failed:'.mysql_error());
//delete previous rooms
$query71="DELETE FROM booking_history_tab WHERE BOOKING_NO = '$b_num'";

mysql_query($query71) or die('Del1 Failed:'.mysql_error());
//add rooms history in booking_history_tab table 

foreach ($_POST['b_room'] as $value) 
	{
$room=explode("#",$value);
$rm=$room[1];
	$query3="INSERT INTO booking_history_tab(BOOKING_NO, ROOM_ID, CUSTOMER_NAME, CUSTOMER_CELL_NO, 
	CUSTOMER_CNIC, CHECK_IN_DATE, ROOM_FLAG,EDITED_ID, EDITED_ON)
	 VALUES ('$b_num', '$rm', '$c_name','$tel', '$cnic', '$check_in', '$book_status' , '$created_id' , '$created_on')";
	$result3=mysql_query($query3) or die('update2 Failed'.mysql_error());
	}
	//select booking
	$query00="SELECT * FROM booking_tab WHERE BOOKING_NO = '$b_num'";

$r11=mysql_query($query00) or die('select1 Failed:'.mysql_error());
	
	$a11=mysql_fetch_array($r11);
	?>
    
<form name="form" id="form"  method="post" action="rooms_booking_3.php">  

<table width="764" frame="hsides" bgcolor="#FFFFD2">
		
    <tr height="50" >
		<td width="95">Booking no.</td>
		<td width="145"><input type="text" name="b_num" id="b_num" size="2" value="<?php echo $b_num; ?>"  readonly="readonly"/></td>
	
		<td width="95">Booking Date:</td>
         <td width="175"><input type="text" name="b_date" id="b_date" size="8" value="<?php echo $b_date; ?>" readonly="readonly"></td>
        <td width="97">Booking Time: </td>
		<td width="129">	<input type="text" name="b_time" id="b_time" size="6"  value="<?php echo $b_time; ?>" readonly="readonly"/></td>
	</tr>
    </table>
    <table width="765" bgcolor="#FFFFD2" frame="box">
       

  
  
  <?php if($book_status == "B")
  { ?>
  <tr height="65">
  <td width="128">Booking Status:</td>
  <td width="103"><input name="book_status" type="radio" value="C" /> Cancelled
  </td><td width="89"><input name="book_status" type="radio" value="T"/> Tentative
  </td><td width="425"><input name="book_status" type="radio" value="B" checked="checked"/> Booked</td>
  </tr>
  <?php }  ?>
   <?php if($book_status == "C")
  { ?>
  <tr height="65">
  <td width="128">Booking Status:</td>
  <td width="103"><input name="book_status" type="radio" value="C" checked="checked" /> Cancelled
  </td><td width="89"><input name="book_status" type="radio" value="T"/> Tentative
  </td><td width="425"><input name="book_status" type="radio" value="B" /> Booked</td>
  </tr>
  <?php }  ?>
   <?php if($book_status == "T")
  { ?>
  <tr height="65">
  <td width="128">Booking Status:</td>
  <td width="103"><input name="book_status" type="radio" value="C" /> Cancelled
  </td><td width="89"><input name="book_status" type="radio" value="T" checked="checked"/> Tentative
  </td><td width="425"><input name="book_status" type="radio" value="B" checked="checked"/> Booked</td>
  </tr>
  <?php }  ?>
  
  </tr>


</table>
    <table width="763" bgcolor="#FFFFD2" frame="above">
    <tr height="20">
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    	<tr>
		<td width="104" height="28">Customer Name</td>
		<td width="316"><input type="text" name="c_name" id="c_name" size="15" value="<?php echo $c_name; ?>" /> </td>
        <td width="106"> Corperate Client </td>
        <td width="217"><select name="c_client" id="c_client">
        <option value="">Select the client </option>
        
        
        </select> </td>
	</tr>
    	<tr >
		<td width="104" height="29">Cell Number</td>
		<td width="316"><input type="text" name="tel" id="tel" size="15" pattern="[0-9]+" value="<?php echo $tel; ?>" /></td>
        
		<td width="106" height="29">CNIC</td>
		<td width="217"><input type="text" name="cnic" id="cnic" size="15" value="<?php echo $cnic; ?>" pattern="[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}" maxlength="15"/> </td>
	</tr>
    </table>
    <table width="762" bgcolor="#FFFFD2">
    	<tr >
		<td width="103"  height="29">Check in</td>
		<td width="319">	
       <input type="text" name="check_in" id="check_in" size="15" value="<?php echo $check_in; ?>" onchange="leave_date();"/>
       
       
       </td>

		<td width="105">No. of Days</td>
		<td width="36" align="right">	
        <input type="text" name="stay_days" id="stay_days" value="<?php echo $stay_days; ?>" size="2"  onchange="leave_date();" onkeydown="leave_date()"/></td>
        <td width="175">
        

</td>

	</tr>
    <tr >
		<td width="103"  height="29">Check out</td>
		<td width="319">	
        <input type="hidden" name="l_date" id="l_date" value="<?php echo $cc_date; ?>"/>
       <input type="text" name="check_out" id="check_out" size="15" value="<?php echo $cc_date; ?>" onchange="n_days();" />
  
       
       </td>

	<td>

</td>

	</tr>
</table>
    
    <table width="763" bgcolor="#FFFFD2" border="3">
    
    <tr style=" font-style:italic;">
<td width="112"><div align="justify">Booked Rooms</div></td>
<td width="251"><div align="justify">Charges</div></td>
<td width="120"><div align="justify">Services Availed</div></td>
<td width="248"><div align="justify">Charges</div></td>
</tr>


<?php
foreach ($_POST['b_room'] as $value) 
	{?>
    <tr>
    <td><?php echo $value; ?></td>
    <?php
		$room=explode("#",$value);
$rm=$room[1];
	$query3="SELECT ROOM_TYPE_ID FROM rooms_tab WHERE ROOM_ID = $rm";
	$result33=mysql_query($query3);
	$row33=mysql_fetch_array($result33);
	$type=$row33['ROOM_TYPE_ID'];
	$query4="SELECT CHARGES_ON_DATE FROM room_charges_history WHERE ROOM_TYPE_ID = $type";
	$result4=mysql_query($query4);
	$row4=mysql_fetch_array($result4);
	$charges=$row4['CHARGES_ON_DATE'];
		?>
<td><?php echo $charges." X ".$stay_days." = ".$stay_days*$charges;?></td>
<td></td>
<td></td>
</tr>
<?php } ?>

</table>
    
    <table width="763" bgcolor="#FFFFD2" >
    
<tr>
		<td width="120" height="29">Grand Total</td>
		<td width="252">
        <?php
		$total_charges=0;
foreach ($_POST['b_room'] as $value) 
	{?>
  
    <?php
		$room=explode("#",$value);
	$rm=$room[1];
	$query3="SELECT ROOM_TYPE_ID FROM rooms_tab WHERE ROOM_ID = $rm";
	$result33=mysql_query($query3);
	$row33=mysql_fetch_array($result33);
	$type=$row33['ROOM_TYPE_ID'];
	$query4="SELECT CHARGES_ON_DATE FROM room_charges_history WHERE ROOM_TYPE_ID = $type";
	$result4=mysql_query($query4);
	while($row4=mysql_fetch_array($result4))
	{
	$charges=$row4['CHARGES_ON_DATE'];
		 $total_charges = $total_charges+($stay_days*$charges); 
	}
	}?>
        
        
        <input type="text" name="g_charge" id="g_charge" size="15" value="<?php echo $total_charges; ?>" /> </td>
        <td width="124"> Total Discount </td>
        <td width="247"><input type="text" name="t_disc" id="t_disc" size="15"  value="<?php echo $a11['TOTAL_DISCOUNT']; ?>" onchange="calculate_discount('t_disc','g_charge')" />
        </td>
	</tr>
    <tr>
		
        <td width="120"  height="29"> Payment Mode </td>
        <td width="252"><select name="pay_mode" id="pay_mode" onchange="payment_mode(this.value);">
        <?php
		$n_mode = "";
		if($a11['PAYMENT_MODE'] == "Q")
		$n_mode = "Cheque";
		else if($a11['PAYMENT_MODE'] == "C")
		$n_mode = "Cash";
		else if($a11['PAYMENT_MODE'] == "R")
		$n_mode = "Credit Card";
		else if($a11['PAYMENT_MODE'] == "N")
		$n_mode = "None";
		?>
      <option value="<?php echo $a11['PAYMENT_MODE']; ?>"><?php echo $n_mode; ?></option>
      <option value="N">None</option>
	  <option value="C">Cash</option>
      <option value="Q">Cheque</option>
	  <option value="R">Credit Card</option>
    </select>
        </td>
        <td width="124" height="28">Total Charges</td>
		<td width="247">
        <input type="text" name="t_charge" id="t_charge" size="15" value="<?php echo $a11['PAYMENT_REC']; ?>" /> </td>
	</tr>
        </table>
        <div id="mode">
             <table width="763" bgcolor="#FFFFD2">
	<?php
	$p_mode=$a11['PAYMENT_MODE'];
	if($p_mode == "Q")
	{
		?>
        
	  
	  <tr>
		<td width="120" align="left" height="29">Cheque No:</td>
		<td width="252" align="left"><input type="text" name="chequeno" id="chequeno" size="15" value="<?php echo $a11['CHEQUE_NO']; ?>" /></td>
	  
		<td width="124" align="left" height="29" >Concerned Bank:</td>
		<td width="247" align="left"><input type="text" name="bank" id="bank" size="15" value="<?php echo $a11['BANK']; ?>" /></td>
	  </tr>
	  
	  <?php
	}
	else if($p_mode == "R")
	{
		?>
	  
	  <tr>
		<td width="120" align="left" height="29" >Credit Card No:</td>
		<td width="252" align="left"><input type="text" name="cardno" id="cardno" size="15" value="<?php echo $a11['CREDIT_CARD_N0']; ?>" /></td>
        <td width="124"></td>
        <td width="247"></td>
	  </tr>
     
	<?php
	}
?>
</table></div>
        </br>

        <table width="763">
    
    	<tr>
		<td width="115" valign="top">
        <input type="submit"  name="update" value="Save Payment" style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="selectAll();" >

		</td>
        <td width="118"><input name="search" type="button" value="Back"  style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='rooms_booking.php'"/></td>
		<td width="514"><input name="exit" type="button" value="Exit"  style="background:#D69170; color:#91400F; height:30px; width:115px; font-weight:700;" onclick="window.location.href='reception_admin.php'" />
</td>
	</tr>
    </table>
</form>
<?php
	}	
	

?>
  </div>
    
	
<div class="clear">&nbsp;</div>
</div>

</body>
</html>