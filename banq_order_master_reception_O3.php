<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
//include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. "Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
<meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<link href="templatemo_style16.css" rel="stylesheet" type="text/css" />

<!--
<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

<script language="JavaScript">
	new tcal ({
		'formname': 'testform',
		'controlname': 'date', 
	});
	</script>
    -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
    $( "#date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
    });
});
</script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {
	color: #013c54
}
.style8 {color: #FF0000; font-style: italic; }
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
	color:#013c54;
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
	
#menu2 li a:link, #menu2 li a:visited {
	color: #013c54;
	display: block;
	background:url(EBmenus/Vertical%20Menus/menu2.png);
	padding: 4px 0 0 30px;
		}
	
#menu2 li a:hover {
	color: #FFFFFF;
	background:  url(EBmenus/Vertical%20Menus/menu2.png) 0 -32px;
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
	padding:0;
	margin:0 auto;
	
	font-size:12px;
}
</style>


<script type="text/javascript">


function search_slot()
{

	var date = encodeURIComponent(document.getElementById("date").value);
	if(date == "")
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
			document.getElementById("entry").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/search_slot.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("&date="+date);
}
</script>
<!--
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#members').load('ajax/show_members.php').fadeIn("slow");
}, 5000); // refresh every 10000 milliseconds
</script>
-->

<script type="text/javascript">
    var clicked= false;
	function CheckBrowser()
    {
		//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
		if(clicked==false)
		{
			//alert("Browser closed");
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
					document.getElementById("none").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("POST","logout.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send();
		} // if ends here
	}
</script>


<script type="text/javascript">
function buttonA_clickHandler() {
    document.getElementById('time_from').value = "12:00:00";
	document.getElementById('time_to').value = "17:00:00";
	document.getElementById('date').value;
	document.getElementById('button1').name;
    //document.getElementById('form1').submit();
}
</script>
<script type="text/javascript">
function buttonB_clickHandler() {
    document.getElementById('time_from').value = "18:00:00";
	document.getElementById('time_to').value = "23:00:00";
	document.getElementById('date').value;
	document.getElementById('button').name;
    //document.getElementById('form1').submit();
}
</script>

</head>



<body>
   
<!-- start of content -->
<div id="templatemo_content">
<div id="main">
<ul id="MenuBar1" class="MenuBarHorizontal">
  <!--
  <li><a class="MenuBarItemSubmenu" href="#">Store Management</a>
    <ul>
      <li><a href="#">New Unit</a></li>
      <li><a href="#">New Supplier</a></li>
      <li><a href="view_reqs.php">View Requisitions</a></li>
    </ul>
  </li>
  <li><a href="#">Restaurant</a></li>
  -->
  <li><a class="MenuBarItemSubmenu" href="#">Banquet</a>
    <ul>
      <li><a href="banq_order_master_reception.php">Bookings</a></li>
    </ul>
  </li>
  
  <!--<li><a href="#">Room Service</a></li>-->
  <li><a href="logout.php">Logout</a></li>
</ul>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</div><br>
  <form name="form1" id="form1" method="post" action="reception_book2.php">
    <div id="templatemo_content2">
      <h1 align="justify"><span class="style3"><?php echo $todayy." ".$day; ?></span></h1>
      <h1 align="justify" class="red" style=" font-size:16px;"><span style="text-align: left"></span>Welcome <BLINK><?php echo $_SESSION['username']; ?></BLINK></h1>
      <div align="justify"><p style=" font-size:16px;">&nbsp;</p>
  
      <table width="800" border="0" cellpadding="0" cellspacing="0" style="">
        <th width="142" valign="top" style="text-align: justify"><div align="center">Date:</div></th>
          <td width="489" align="left" style="text-align: justify"><p align="center">
          <?php 
		  $tdate = mktime(0,0,0,date("m"),date("d"),date("Y"));
		  ?>
            <input type="text" name="date" style="border:groove" id="date" value="<?php echo $date=date("Y-m-d", $tdate); ?>" onchange="search_slot();"/>
          <input name="time_from" type="hidden" id="time_from" value="">
			<input name="time_to" type="hidden" id="time_to" value="">
          </p>
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p></td>
        </tr>
      </table>
      <div id="entry">
      <table width="800" border="0" cellpadding="0" cellspacing="0" style="">    
<tr>
  <th width="179" valign="top" style="text-align: justify"><div align="center">Lunch</div></th>
  <td width="621" style="text-align: justify"><div align="left">
  

    <?php 

$query1 = "SELECT BANQ_ID, BANQ_NAME FROM banq_master_tab";
$result1 = mysql_query($query1) or die ('Query failed!'.mysql_error());
$num1 = mysql_num_rows($result1);
			//echo $num1."<br>";
//while($row1 = mysql_fetch_array($result))
//{
while($row = mysql_fetch_array($result1))
{

$id=$row['BANQ_ID'];
$query2 = "SELECT * FROM banq_order_master WHERE BANQ_ID = '$id' AND FUNCTION_DATE = '$date' AND TIME_FROM = '12:00:00'";									
$result2 = mysql_query($query2) or die ('Query failed!'.mysql_error());	
$row2 = mysql_fetch_array($result2);
$num2 = mysql_num_rows($result2);
if($row['BANQ_ID']==$row2['BANQ_ID'])
{
if($row2['BOOKING_STATUS']=='B' && ($row2['TIME_FROM']=='12:00:00' && $row2['TIME_TO']=='17:00:00'))
{
	$f_id = $row2['ORDER_NO'];
	$query3 = "SELECT count(*) FROM banq_order_master WHERE ORDER_NO = '$f_id'";									
$result3 = mysql_query($query3) or die ('Query failed!'.mysql_error());	
$row3 = mysql_fetch_array($result3);
$cc=$row3['count(*)'];

if ($cc== "1")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#F00;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "2")
{

?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#66F;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "3")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#363;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "4")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#09F;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc >= "5")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#FF0;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
} 
else if($row2['BOOKING_STATUS']== 'T' && ($row2['TIME_FROM']=='12:00:00' && $row2['TIME_TO']=='17:00:00'))
{
?>

    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#F9C;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php  
}
else	
{?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name= $row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php  
}	
}
else{?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php  }
	
}?><p></p>
  </div></td></tr>
  
  <tr>
  <th width="179" valign="top" style="text-align: justify"><div align="center">Dinner</div></th>
  <td style="text-align: justify"><div align="left">
    <?php
	
$result1 = mysql_query($query1) or die ('Query failed!'.mysql_error());
while($row = mysql_fetch_array($result1))
{
$id=$row['BANQ_ID'];
$query2 = "SELECT * FROM banq_order_master WHERE BANQ_ID = '$id' AND FUNCTION_DATE = '$date' AND TIME_FROM = '18:00:00'";									
$result2 = mysql_query($query2) or die ('Query failed!'.mysql_error());	
$row2 = mysql_fetch_array($result2);
$num2 = mysql_num_rows($result2);
if($row['BANQ_ID']==$row2['BANQ_ID'])
{
if($row2['BOOKING_STATUS']=='B' && ($row2['TIME_FROM']=='18:00:00' && $row2['TIME_TO']=='23:00:00'))
{
$f_id = $row2['ORDER_NO'];
	$query3 = "SELECT count(*) FROM banq_order_master WHERE ORDER_NO = '$f_id'";									
$result3 = mysql_query($query3) or die ('Query failed!'.mysql_error());	
$row3 = mysql_fetch_array($result3);
$cc=$row3['count(*)'];

if ($cc== "1")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#F00;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php 
}
else if ($cc== "2")
{

?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#66F;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php 
}
else if ($cc== "3")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#363;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php 
}
else if ($cc== "4")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#09F;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php 
}
else if ($cc >= "5")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#FF0;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php 
} } 
else if($row2['BOOKING_STATUS']== 'T' && ($row2['TIME_FROM']=='18:00:00' && $row2['TIME_TO']=='23:00:00'))
{
?>

    <input name="<?php echo $row['BANQ_ID']; ?>" id="button" type="submit" value="<?php echo $row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#F9C;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php  }
else	{?>
    <input name="<?php echo $row['BANQ_ID']; ?>" id="button" type="submit" value="<?php echo $row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php  }	
	}
else	
{?>
    <input name="<?php echo $row['BANQ_ID']; ?>" id="button" type="submit" value="<?php echo $row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php  }
	
	}?>
  </div></td></tr>
</table>    
      </div>
    </div></div>
  </form>
</div>
</body>
</html>