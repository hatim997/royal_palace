<?php session_start(); ?>
<?php 
include('config.php');
//include('time_settings.php');
include('time_calculation.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Royal Palace</title>

<meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. "Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
<meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Royal Palace</title>

<link href="templatemo_style16.css" rel="stylesheet" type="text/css" />


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
			
			document.getElementById("entry").innerHTML= xmlhttp.responseText;
			
		}
	  }
	xmlhttp.open("POST","ajax/search_slot.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("&date="+date);
}
</script>



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
<script type="text/javascript">
 
function bgColor(A,B,C)
{



var  x =Math.round(255*Math.random());

var num1 =getHex(x);

var  y =Math.round(255*Math.random());

var num2 =getHex(y);

var  z =Math.round(255*Math.random());

var num3 =getHex(z);

document.getElementById(A).style.backgroundColor="#"+num1+num2+num3;
document.getElementById(B).style.backgroundColor="#"+num1+num2+num3;
document.getElementById(C).style.backgroundColor="#"+num1+num2+num3;
}
 
/* Method To Convert  Decimal To Hexadecimal */

function getHex(dec)
{
var hexArray = new Array( "0", "1", "2", "3","4", "5", "6", "7","8", "9", "A", "B","C", "D", "E", "F" );
var code1 = Math.floor(dec / 16);
 
var code2 = dec - code1 * 16;
 
var decToHex = hexArray[code2];
 
return (decToHex);
}
</script>
</head>



<body>
   
<!-- start of content -->
<center>
<div id="templatemo_content">
<div id="main">
</div><br>

  <form action="dish_item_delete1.php" name="form1" id="form1" method="post" >
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

    <table width="40%" border="0" style="margin-top:40px;" >
    
    <tr>
    	<td><center>Dish Item</center></td>
    	<td><select name="dish_id" id="dish_id" class="tb9"  >
      	<option value=""> Select Dish </option>
      	<?php
		$query1 = mysql_query("SELECT * FROM `dish_master_tab` ORDER BY DISH_NAME ");
    	while($fetch_info = mysql_fetch_array($query1))
		{
		?>
      	<option value="<?php echo "$fetch_info[DISH_ID]"; ?>"><?php echo"$fetch_info[DISH_NAME]"; ?></option>
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
    	<td><center>Are you sure?</center></td>
    	<td><select name="flag_yn" id="flag_yn" class="tb9"  >
      	<option value=""> Select [Y/N] </option>
      	<?php
		$query2 = mysql_query("SELECT * FROM `confirm_tab` ");
    	while($fetch_info2 = mysql_fetch_array($query2))
		{
		?>
      	<option value="<?php echo "$fetch_info2[CONFIRM_ID]"; ?>"><?php echo"$fetch_info2[CONFIRM_TITLE]"; ?></option>
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
        <input type="submit" class="button" name="Submit" value="Submit"  /> 
            <!--    &nbsp;<input type="reset" class="button" name="Reset" value="Reset"  onmousemove="passw_check();"/>-->
   		</td>
  	</tr>
    

    
	</table>    
   
    
  
  </form>
</div>
</center>

</body>
</html>
