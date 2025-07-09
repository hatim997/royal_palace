<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid =  $_SESSION['username'];
$password = $_SESSION['password'];

$restid = $_SESSION['restid'];
//$userid	 = $_SESSION['username'] ;
$logout_redirect_url = "index.php";
if ($userid == "")

{
header("Location: $logout_redirect_url");
}




if(isset($_REQUEST['view']))
{ 
foreach ($_REQUEST['radiobox'] as $order_id) 
		{
		
$sql1 = "SELECT * FROM banq_order_master WHERE ORDER_NO = '$order_id'";
$result1 = mysql_query($sql1)or die("error".mysql_error());
}
$row=mysql_fetch_array($result1);

$id=$row['BANQ_ID']; 
$date = $row['FUNCTION_DATE'];
$time_from=$row['TIME_FROM'];
$time_to=$row['TIME_TO']; 
$mbooking_status=$row['BOOKING_STATUS'];
}
else
{
for ($i=1 ; $i<=8 ; $i++) {
 if (isset($_POST[$i])) {
    $id=$i; 
	$date = $_POST['date'];
	$time_from=$_POST['time_from'];
	$time_to=$_POST['time_to']; 
	$mbooking_status=$_POST['booking_status'];
	}}
}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Web Saucer</title>
 <meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. "Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
 <meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />
 
 <link href="templatemo_style16.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="/resources/demos/style.css" />
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
 <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
 <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
 <script src="http://malsup.github.com/jquery.form.js"></script>
 
 <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

 
 <style type="text/css">
.overlay {
	position: fixed;
	top: 0%;
	left: 0%;
	width:100%;
	height:100%;
	background: #000;
	display: none;
	opacity: .5;
	filter: alpha(opacity=10);
	-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
}
.new_popup {
	position:fixed;
	top: 10%;
	left: 15%;
	margin-left: -50px;
	margin-top: -10px;
	width: 80%;
	height: auto;
	display: none;
	background:#FFF;
	border:1px solid #F00;
	z-index:1000;
}
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
	color:#013c54;
}
</style>
 <style type="text/css">
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
	padding:0;
	font-family:Arial, Helvetica, sans-serif;
	/*margin:0 auto;*/
	font-size:11px;
	margin-left: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	width:auto;
}
</style>
 <style>
.field1 {
	font-size:16px;
}
.field2 {
	height:25px;
	width:200px;
}
#result11 {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
.suggestionsBox {
	position: absolute;
	left: 0px;
	top:40px;
	margin: 0px 0px 0px 73px;
	width: 247px;
	padding:0px;
	background-color: #000;
	border-top: 3px solid #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}
.load {
	background-image:url(images/loader.gif);
	background-position:right;
	background-repeat:no-repeat;
}
#suggest {
	position:relative;
}
</style>
 <script type='text/javascript'>
	function suggest(inputString){
        if(inputString.length == 0) {
            $('#suggestions').fadeOut();
        } else {
        $('#country').addClass('load');
            $.post("ajax/search_dish.php", {queryString: ""+inputString+""}, function(data){
                if(data.length >0) {
                    $('#suggestions').fadeIn();
                    $('#suggestionsList').html(data);
                    $('#country').removeClass('load');
                }
            });
        }
    }
 
    function fill(thisValue) {
		
        //$('#menu_order1').val(thisValue);
		var htmlSelect = document.getElementById("menu_order1");//HTML select box
		var optionValue= thisValue;
		
		var selectBoxOption = document.createElement("option");
		selectBoxOption.value = optionValue;//set option value 
		selectBoxOption.text = optionValue;//set option display text 
		htmlSelect.add(selectBoxOption,null);//add created option to select box.	
		
        setTimeout("$('#suggestions').fadeOut();", 100);
    }
</script>
 <script type="text/javascript">
function hall_availability()
    {
	var shift_func = document.getElementById("shift_func").value;
	//alert(shift_func); return false;
	if (shift_func=="")
	{
	var shift_func = document.getElementById("shift_func").value = document.getElementById("date11").value;
	}
	var function_time = document.getElementById("func_time").value;
	var hall = document.getElementById("banquet").value;
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
			document.getElementById("testing").value=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/hall_status.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("function_date="+shift_func+"&function_time="+function_time+"&hall="+hall);
	}
</script>
 <script type="text/javascript">
function hall_availability_book()
    {
	var shift_func = document.getElementById("date11").value;
	var function_time = document.getElementById("func_time").value;
	var hall = document.getElementById("banquet").value;
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
			document.getElementById("testing").value=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/hall_status.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("function_date="+shift_func+"&function_time="+function_time+"&hall="+hall);
	}
</script>
 <script type="text/javascript">
	  function show_new_Popup() {
		 // alert(ID);
          document.getElementById("overlay").style.display = "block";
          document.getElementById("new_popup").style.display = "block";
      }
      function close_new_Popup() {
          document.getElementById("overlay").style.display = "none";
          document.getElementById("new_popup").style.display = "none";
      }
	  </script>
 <script type="text/javascript">
function search_banq()
{
	show_new_Popup();
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

			document.getElementById("data_popup").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","search_banq.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
}
</script>
 <script type="text/javascript">
    function search_record()
    {
		var pid = encodeURIComponent(document.getElementById("pid").value);
		var type = encodeURIComponent(document.getElementById("type").value);
		//document.write(type);
		
		var xmlhttp;
		
		if (pid=="" || type=="")
  		{
			//document.getElementById("info").innerHTML="";
			alert("Please fill all values:");
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
				document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/search_record_banq.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("pid="+pid+"&type="+type);		
	}
</script>
 <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
 <script type="text/javascript" >
function selectAll() {
	var box = document.getElementById("menu_order1");
    for (var i = 0; i < box.length; i++) {
        box[i].selected = true;
    }
}  
 </script>
 <script type="text/javascript" >
function pass_validation() {
var pass = document.getElementById("password").value;
var name=prompt("Please enter your password");

while (name != pass)
{
	
	var name=prompt("Please enter your correct password");
}
return true;
}  
 </script>

 <script type="text/javascript" >
	function validateForm()
	{
	//hall_availability_book();
	var avail = document.getElementById("testing").value;
	if(avail=='HNA')
		{
			alert("Hall is Already Booked, please choose any other Hall");
			return false;
		}
 if((document.getElementById("host_name").value&& document.getElementById("cnic").value&& document.getElementById("tel").value
 && document.getElementById("func").value)=="") 
		{
			alert("Necessary Fields must be entered");
			return false; 
		}
		//alert(avail); return false;	
	}
	</script>

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

    
<script type="text/javascript" >
function date_check(value)
	{		
//var tdate = document.getElementById("today").value;
var tdate = encodeURIComponent(document.getElementById("today").value);

if(value > tdate)
{
alert("You cannot select the future date");
document.getElementById("date").value=tdate;
return;
}
	}
</script>

<script type="text/javascript" >
function date_check1(value)
	{
//var date = encodeURIComponent(document.getElementById("date").value);  it is working in "bank_order_master_reception.php"		
//var tdate = document.getElementById("f_date").value;
var tdate = encodeURIComponent(document.getElementById("f_date").value);

if(value != tdate)
{
alert("You have selected the wrong date");
document.getElementById("date1").value=tdate;
return;
}
	}
</script>


 <script type="text/javascript">
    function addhall()
    {
		
		var date = document.getElementById("date2").value;
		var time_from = document.getElementById("tim").value;
		//alert(time_from);
		var order_id = document.getElementById("order_i").value;
		var xmlhttp;
		if (date == "")
  		{
			//document.getElementById("mode").innerHTML="";
			alert("Please select the date first");
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
				document.getElementById("add_hall_div").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/add_hall.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("date="+date+"&time_from="+time_from+"&order_id="+order_id);
	}
</script>
 <script type="text/javascript">
function netamount(value)
{
/*	if(value == "13")
	{*/
		//var total = 0;
		var gross = encodeURIComponent(document.getElementById("advance_total").value);
		var rec_amount = encodeURIComponent(document.getElementById("rec_amount").value);
	
		var net = Number(rec_amount) - Number(gross);
		if(net < 0)
		{
			alert("Received Amount cannot be less than Gross Advance Amount");
			return;	
		}
		else
		{
			encodeURIComponent(document.getElementById("bal_return").value = net.toFixed(2));	
		}
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
		xmlhttp.open("POST","ajax/payment_mode_banq.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("value="+value);
	}
</script>
 <script type="text/javascript">
    function color_scheme(value)
    {

		var f_date = document.getElementById("date1").value;
		var xmlhttp;
		if (value == "")
  		{
			//document.getElementById("mode").innerHTML="";
			alert("Please select the scheme");
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
				document.getElementById("mode1").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/color_scheme_banq.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("value="+value+"&f_date="+f_date);
	}
</script>
 <script type="text/javascript">

function calc1(A,B,SUM) {
  var one = document.getElementById(A).value;
  var two = document.getElementById(B).value; 
  document.getElementById(SUM).value = one * two;
  
  var op9 = document.getElementById('op9').value;
  document.getElementById('result4').value = op9 * one;
}
</script>
 <script type="text/javascript">

function calc(A,B,SUM) {
  var one = document.getElementById(A).value;
  var two = document.getElementById(B).value; 
  document.getElementById(SUM).value = one * two;
}
</script>
 <script type="text/javascript">

function diff(A,B,DIFF) {
	//alert("ok");
  var one = document.getElementById(A).value;
  var two = document.getElementById(B).value; 
  var net = one-two;
  if(net < 0)
		{
			
			alert("Received Amount cannot be more than Gross Amount");
			var three= document.getElementById("tot_rec").value;
			var four = document.getElementById("rec_money").value;
			document.getElementById("tot_rec").value=three- four;
			return;	
		}
else
{
  document.getElementById(DIFF).value = net;
}
}
</script>
 <script type="text/javascript">

function generate_cr(B) 
{
  var xmlhttp;
  var ins1 = document.getElementById("ins1").value;
  //alert(B); return false;
  	if(ins1==""){
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
				  document.getElementById(B).value=xmlhttp.responseText;
			
			}
		  }
		xmlhttp.open("POST","ajax/add_cr_num.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send();
	}
	else
	return true;
	
}
</script>
 <script type="text/javascript">

function recieved_amount(A,B) {
  var one = document.getElementById("advance_total").value;
  var two = document.getElementById("rec_money").value; 
  var total= Number(one)+ Number(two);
  document.getElementById(B).value = total;
}
</script>
 <script type="text/javascript">

function same_amount(A,B,C)
 {
  if(document.getElementById(A).value != "")
  { 
  document.getElementById(B).value = document.getElementById(A).value;
  document.getElementById(C).value = document.getElementById(A).value;
  }
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
document.getElementById(B).value = discount_total;
	}
}
</script>
 <script language="javascript">
function calculate_total(className,ResultID){
                var elements = document.getElementsByClassName(className);
                var total = 0;
                
                for(var i = 0; i < elements.length; ++i){
                        total += parseInt(elements[i].value || 0);
                }
               // alert(total);
                document.getElementById(ResultID).value = total;
        }
</script>
 <script type="text/javascript">
function tax_calc() {
//var price = document.getElementById("basic_total").value;
var tax = document.getElementById("tax").value;

if(document.getElementById("tax_p").checked)
{
  //var g = document.getElementById("grand_tot").value;
 var one = document.getElementById("result").value- 0;
  var two = document.getElementById("result1").value- 0; 
   var three = document.getElementById("result2").value- 0; 
    var four = document.getElementById("result3").value- 0; 
	 var five = document.getElementById("result4").value- 0; 
	  var six = document.getElementById("result5").value- 0; 
	   var seven = document.getElementById("result6").value- 0; 
  var price = one + two + three + four + five + six + seven;
	
    var tot= parseFloat(price) * parseFloat(tax) / 100;
	//document.getElementById("percent_tax111").value = '';
	if(tax =='')
	{
	document.getElementById("percent_tax111").value = '';
	document.getElementById("tax_tot").value = 0;
	}
	else
	{
	document.getElementById("percent_tax111").value = '';
	document.getElementById("tax_tot").value = tot;
	}
}
else
	{
 	var total = document.getElementById("grand_tot").value;
	var percent_tax1 = (parseFloat(tax) /  parseFloat(total)) * 100;
	//alert(percent_tax);
	var percent_tax = Math.round(percent_tax1);
	document.getElementById("percent_tax111").value = percent_tax+"%";
	document.getElementById("tax_tot").value = tax;
	}
}
</script>
 <script type="text/javascript">
function service_calc() {
//var price = document.getElementById("basic_total").value;
var service = document.getElementById("ser_charge").value;
if(document.getElementById("ser_p").checked)
{
var one = document.getElementById("result").value- 0;
  var two = document.getElementById("result1").value- 0; 
   var three = document.getElementById("result2").value- 0; 
    var four = document.getElementById("result3").value- 0; 
	 var five = document.getElementById("result4").value- 0; 
	  var six = document.getElementById("result5").value- 0; 
	   var seven = document.getElementById("result6").value- 0; 
  var price = (one + two + three + four + five + six + seven);
  var tot= parseInt(price)/ 100 * parseInt(service) ;
  if(service =='')
	{
	document.getElementById("percent_service").value = '';
	document.getElementById("ser_tot").value = 0;
	}
	else
	{
	document.getElementById("percent_service").value = '';
	document.getElementById("ser_tot").value = tot;
	}
  //document.getElementById("percent_service").value = '';
  //document.getElementById("ser_tot").value = tot;
}
else
	{
	var total = document.getElementById("grand_tot").value;
	var percent_service1 = (parseFloat(service) /  parseFloat(total)) * 100;
	//alert(percent_tax);
	var percent_service = Math.round(percent_service1);
	document.getElementById("percent_service").value = percent_service+"%";
	document.getElementById("ser_tot").value = service;
	}
}
</script>
 <script type="text/javascript">
function menu_detail()
{
var htmlSelect = document.getElementById("menu_order1");//HTML select box
var optionValue=document.getElementById("dishes");

var selectBoxOption = document.createElement("option");
selectBoxOption.value = optionValue.value;//set option value 
selectBoxOption.text = optionValue.value;//set option display text 
htmlSelect.add(selectBoxOption,null);//add created option to select box.	
	
	
}
</script>
 <script type="text/javascript">
function del_dish_order()
{
var htmlSelect = document.getElementById("menu_order1");//HTML select box
var optionToRemove=htmlSelect.options.selectedIndex;//get the selected index 
htmlSelect.remove(optionToRemove);//remove option from list box
	
	
}
</script>
 <script type="text/javascript">
function menu_load()
    {
	var menu_name = document.getElementById("menu_num").value;
	//alert(menu_name);
	//return;	
		var xmlhttp;
		if (menu_name == "")
  		{
			//document.getElementById("mode").innerHTML="";
			alert("Please select the menu");
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
				document.getElementById("menu_order1").innerHTML=xmlhttp.responseText;
			
			}
		  }
		xmlhttp.open("POST","ajax/menu_load.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("menu_name="+menu_name);
	}
</script>
 <script> 
        // wait for the DOM to be loaded 
        $(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#form1').ajaxForm(function() { 
                alert("Booking is successful!");
				window.location="banq_order_master_reception.php";
				
            }); 
        }); 
		$(document).ready(function() { 
            // bind 'myForm' and provide a simple callback function 
            $('#form2').ajaxForm(function() { 
                alert("Record has been updated!"); 
            }); 
        });
    </script>
 <script>
function submitMe(obj){
  if(obj.value == "Print"){
   document.getElementById('form2').action = 'dishes_receipt2.php'
  }
   if(obj.value == "Print Out Complete Bill"){
   document.getElementById('form2').action = 'complete_bill2.php'
  }
  if(obj.value == "Print Info"){
   document.getElementById('form2').action = 'reference_reciept2.php'
  }
 document.getElementById('form2').submit();
}
</script>
 <script>
function submitMe1(obj){
  if(obj.value == "Print"){
   document.getElementById('form1').action = 'dishes_receipt2.php'
  }
   if(obj.value == "Print Out Complete Bill"){
   document.getElementById('form1').action = 'complete_bill2.php'
  }
  if(obj.value == "Print Info"){
   document.getElementById('form1').action = 'reference_reciept2.php'
  }
 document.getElementById('form1').submit();
}
</script>

<!--
<script>
$(function() {
    $( "#date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
    });
});
</script>
-->

 <script>
$(function() {
    $( "#date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
    });
	 $( "#date1" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
	 $( "#date2" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
    });
});

</script>
 <script>
 function shift_function_date()
 {
	//var function_date = document.getElementById("date1").value;
	document.getElementById("shift_func").value = document.getElementById("date1").value;
 }
 </script>
 
 
 


<!--    OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO    Date Function  start  OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->
<script type="text/javascript">
  function get_t(val){
	
}
function ch_dt(endDate)
{
            var startDate = document.getElementById("rrdate").value;
            
			var syear = startDate.substring(0, 4);
            var smonth = startDate.substring(5, 7);
            var sdate = startDate.substring(8, 10);
       
            var mysDate = new Date(syear, smonth - 1, sdate);

            var eyear = endDate.substring(6, 10);
            var emonth = endDate.substring(3, 5);
            var edate = endDate.substring(0, 2);
       
            var myeDate = new Date(eyear, emonth - 1, edate);
            

            if (mysDate > myeDate) {
                alert("Date Must be greater than or Equal to Today's date ");
				document.getElementById("date_pr").value="";
				
            }
	
	
}
function chh_dt(endDate)
{
            var startDate = document.getElementById("rrdate").value;
            var nwDate = document.getElementById("date_pr").value;
			if(nwDate=='')
			{
			alert("First Select The Pr Date");
			document.getElementById('date_pr').focus();	
			document.getElementById('required_on').value='';	
			}
			var nyear = nwDate.substring(6, 10);
            var nmonth = nwDate.substring(3, 5);
            var ndate = nwDate.substring(0, 2);
       
            var nnwDate = new Date(nyear, nmonth - 1, ndate);
			
			
			var syear = startDate.substring(0, 4);
            var smonth = startDate.substring(5, 7);
            var sdate = startDate.substring(8, 10);
       
            var mysDate = new Date(syear, smonth - 1, sdate);

            var eyear = endDate.substring(6, 10);
            var emonth = endDate.substring(3, 5);
            var edate = endDate.substring(0, 2);
       
            var myeDate = new Date(eyear, emonth - 1, edate);
            

            if (mysDate > myeDate && nnwDate <= myeDate) {
                alert("Required on Date Must be greater than or Equal to Today's date ");
				document.getElementById("required_on").value="";
            }
			 if (nnwDate > myeDate && mysDate <= myeDate) {
                alert("Required on Date Must be greater than or equal to Pr date");
				document.getElementById("required_on").value="";
            }
			 if (nnwDate > myeDate && mysDate > myeDate) {
                alert("Required on Date Must be greater than or equal to Pr date and Today's date");
				document.getElementById("required_on").value="";
            }
	
	
}

$(function() {
      $('#date_pr').datepicker({dateFormat: 'dd/mm/yy'});
});
</script>


<script type="text/javascript">
var winCal;
var dtToday;
var Cal;
var MonthName;
var WeekDayName1;
var WeekDayName2;
var exDateTime;//Existing Date and Time
var selDate;//selected date. version 1.7
var calSpanID = "calBorder"; // span ID
var domStyle = null; // span DOM object with style
var cnLeft = "0";//left coordinate of calendar span
var cnTop = "0";//top coordinate of calendar span
var xpos = 0; // mouse x position
var ypos = 0; // mouse y position
var calHeight = 0; // calendar height
var CalWidth = 208;// calendar width
var CellWidth = 30;// width of day cell.
var TimeMode = 24;// TimeMode value. 12 or 24
var StartYear = 1940; //First Year in drop down year selection
var EndYear = 5; // The last year of pickable date. if current year is 2011, the last year that still picker will be 2016 (2011+5)
var CalPosOffsetX = -1; //X position offset relative to calendar icon, can be negative value
var CalPosOffsetY = 0; //Y position offset relative to calendar icon, can be negative value

//Configurable parameters start
var SpanBorderColor = "#000000";//span border color
var SpanBgColor = "#FFFFFF"; //span background color
var MonthYearColor = "#cc0033"; //Font Color of Month and Year in Calendar header.
var WeekHeadColor = "#18861B"; //var WeekHeadColor="#18861B";//Background Color in Week header.
var SundayColor = "#C0F64F"; //var SundayColor="#C0F64F";//Background color of Sunday.
var SaturdayColor = "#C0F64F"; //Background color of Saturday.
var WeekDayColor = "#FFEDA6"; //Background color of weekdays.
var FontColor = "blue"; //color of font in Calendar day cell.
var TodayColor = "#ffbd35"; //var TodayColor="#FFFF33";//Background color of today.
var SelDateColor = "#8DD53C"; //var SelDateColor = "#8DD53C";//Backgrond color of selected date in textbox.
var YrSelColor = "#cc0033"; //color of font of Year selector.
var MthSelColor = "#cc0033"; //color of font of Month selector if "MonthSelector" is "arrow".
var HoverColor = "#E0FF38"; //color when mouse move over.
var DisableColor = "#999966"; //color of disabled cell.
var CalBgColor = "#ffffff"; //Background color of Calendar window.

var WeekChar = 2;//number of character for week day. if 2 then Mo,Tu,We. if 3 then Mon,Tue,Wed.
var DateSeparator = "-";//Date Separator, you can change it to "-" if you want.
var ShowLongMonth = true;//Show long month name in Calendar header. example: "January".
var ShowMonthYear = true;//Show Month and Year in Calendar header.
var ThemeBg = "";//Background image of Calendar window.
var PrecedeZero = true;//Preceding zero [true|false]
var MondayFirstDay = true;//true:Use Monday as first day; false:Sunday as first day. [true|false]  //added in version 1.7
var UseImageFiles = true;//Use image files with "arrows" and "close" button
var imageFilesPath = "images/";
//Configurable parameters end

//use the Month and Weekday in your preferred language.
var MonthName = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var WeekDayName1 = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var WeekDayName2 = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];


//end Configurable parameters

//end Global variable


// Calendar prototype
function Calendar(pDate, pCtrl)
{
	//Properties
	this.Date = pDate.getDate();//selected date
	this.Month = pDate.getMonth();//selected month number
	this.Year = pDate.getFullYear();//selected year in 4 digits
	this.Hours = pDate.getHours();

	if (pDate.getMinutes() < 10)
	{
		this.Minutes = "0" + pDate.getMinutes();
	}
	else
	{
		this.Minutes = pDate.getMinutes();
	}

	if (pDate.getSeconds() < 10)
	{
		this.Seconds = "0" + pDate.getSeconds();
	}
	else
	{
		this.Seconds = pDate.getSeconds();
	}
	this.MyWindow = winCal;
	this.Ctrl = pCtrl;
	this.Format = "ddMMyyyy";
	this.Separator = DateSeparator;
	this.ShowTime = false;
	this.Scroller = "DROPDOWN";
	if (pDate.getHours() < 12)
	{
		this.AMorPM = "AM";
	}
	else
	{
		this.AMorPM = "PM";
	}
	this.ShowSeconds = false;
	this.EnableDateMode = ""
}

Calendar.prototype.GetMonthIndex = function (shortMonthName)
{
	for (var i = 0; i < 12; i += 1)
	{
		if (MonthName[i].substring(0, 3).toUpperCase() === shortMonthName.toUpperCase())
		{
			return i;
		}
	}
};

Calendar.prototype.IncYear = function () {
    if (Cal.Year <= dtToday.getFullYear()+EndYear)
	    Cal.Year += 1;
};

Calendar.prototype.DecYear = function () {
    if (Cal.Year > StartYear)
	    Cal.Year -= 1;
};

Calendar.prototype.IncMonth = function() {
    if (Cal.Year <= dtToday.getFullYear() + EndYear) {
        Cal.Month += 1;
        if (Cal.Month >= 12) {
            Cal.Month = 0;
            Cal.IncYear();
        }
    }
};

Calendar.prototype.DecMonth = function() {
    if (Cal.Year >= StartYear) {
        Cal.Month -= 1;
        if (Cal.Month < 0) {
            Cal.Month = 11;
            Cal.DecYear();
        }
    }
};

Calendar.prototype.SwitchMth = function (intMth)
{
	Cal.Month = parseInt(intMth, 10);
};

Calendar.prototype.SwitchYear = function (intYear)
{
	Cal.Year = parseInt(intYear, 10);
};

Calendar.prototype.SetHour = function(intHour) {
    var MaxHour,
	MinHour,
	HourExp = new RegExp("^\\d\\d"),
	SingleDigit = new RegExp("^\\d{1}$");


    if (TimeMode === 24) {
        MaxHour = 23;
        MinHour = 0;
    }
    else if (TimeMode === 12) {
        MaxHour = 12;
        MinHour = 1;
    }
    else {
        alert("TimeMode can only be 12 or 24");
    }

    if ((HourExp.test(intHour) || SingleDigit.test(intHour)) && (parseInt(intHour, 10) > MaxHour)) {
        intHour = MinHour;
    }

    else if ((HourExp.test(intHour) || SingleDigit.test(intHour)) && (parseInt(intHour, 10) < MinHour)) {
        intHour = MaxHour;
    }

    intHour = parseInt(intHour, 10);
    if (SingleDigit.test(intHour)) {
        intHour = "0" + intHour;
    }

    if (HourExp.test(intHour) && (parseInt(intHour, 10) <= MaxHour) && (parseInt(intHour, 10) >= MinHour)) {
        if ((TimeMode === 12) && (Cal.AMorPM === "PM")) {
            if (parseInt(intHour, 10) === 12) {
                Cal.Hours = 12;
            }
            else {
                Cal.Hours = parseInt(intHour, 10) + 12;
            }
        }

        else if ((TimeMode === 12) && (Cal.AMorPM === "AM")) {
            if (intHour === 12) {
                intHour -= 12;
            }

            Cal.Hours = parseInt(intHour, 10);
        }

        else if (TimeMode === 24) {
            Cal.Hours = parseInt(intHour, 10);
        }
    }

};

Calendar.prototype.SetMinute = function (intMin)
{
	var MaxMin = 59,
	MinMin = 0,

	SingleDigit = new RegExp("\\d"),
	SingleDigit2 = new RegExp("^\\d{1}$"),
	MinExp = new RegExp("^\\d{2}$"),

	strMin = 0;

	if ((MinExp.test(intMin) || SingleDigit.test(intMin)) && (parseInt(intMin, 10) > MaxMin))
	{
		intMin = MinMin;
	}

	else if ((MinExp.test(intMin) || SingleDigit.test(intMin)) && (parseInt(intMin, 10) < MinMin))
	{
		intMin = MaxMin;
	}

	strMin = intMin + "";
	if (SingleDigit2.test(intMin))
	{
		strMin = "0" + strMin;
	}

	if ((MinExp.test(intMin) || SingleDigit.test(intMin)) && (parseInt(intMin, 10) <= 59) && (parseInt(intMin, 10) >= 0))
	{
		Cal.Minutes = strMin;
	}
};

Calendar.prototype.SetSecond = function (intSec)
{
	var MaxSec = 59,
	MinSec = 0,

	SingleDigit = new RegExp("\\d"),
	SingleDigit2 = new RegExp("^\\d{1}$"),
	SecExp = new RegExp("^\\d{2}$"),

	strSec = 0;

	if ((SecExp.test(intSec) || SingleDigit.test(intSec)) && (parseInt(intSec, 10) > MaxSec))
	{
		intSec = MinSec;
	}

	else if ((SecExp.test(intSec) || SingleDigit.test(intSec)) && (parseInt(intSec, 10) < MinSec))
	{
		intSec = MaxSec;
	}

	strSec = intSec + "";
	if (SingleDigit2.test(intSec))
	{
		strSec = "0" + strSec;
	}

	if ((SecExp.test(intSec) || SingleDigit.test(intSec)) && (parseInt(intSec, 10) <= 59) && (parseInt(intSec, 10) >= 0))
	{
		Cal.Seconds = strSec;
	}

};

Calendar.prototype.SetAmPm = function (pvalue)
{
	this.AMorPM = pvalue;
	if (pvalue === "PM")
	{
		this.Hours = parseInt(this.Hours, 10) + 12;
		if (this.Hours === 24)
		{
			this.Hours = 12;
		}
	}

	else if (pvalue === "AM")
	{
		this.Hours -= 12;
	}
};

Calendar.prototype.getShowHour = function() {
    var finalHour;

    if (TimeMode === 12) {
        if (parseInt(this.Hours, 10) === 0) {
            this.AMorPM = "AM";
            finalHour = parseInt(this.Hours, 10) + 12;
        }

        else if (parseInt(this.Hours, 10) === 12) {
            this.AMorPM = "PM";
            finalHour = 12;
        }

        else if (this.Hours > 12) {
            this.AMorPM = "PM";
            if ((this.Hours - 12) < 10) {
                finalHour = "0" + ((parseInt(this.Hours, 10)) - 12);
            }
            else {
                finalHour = parseInt(this.Hours, 10) - 12;
            }
        }
        else {
            this.AMorPM = "AM";
            if (this.Hours < 10) {
                finalHour = "0" + parseInt(this.Hours, 10);
            }
            else {
                finalHour = this.Hours;
            }
        }
    }

    else if (TimeMode === 24) {
        if (this.Hours < 10) {
            finalHour = "0" + parseInt(this.Hours, 10);
        }
        else {
            finalHour = this.Hours;
        }
    }

    return finalHour;
};

Calendar.prototype.getShowAMorPM = function ()
{
	return this.AMorPM;
};

Calendar.prototype.GetMonthName = function (IsLong)
{
	var Month = MonthName[this.Month];
	if (IsLong)
	{
		return Month;
	}
	else
	{
		return Month.substr(0, 3);
	}
};

Calendar.prototype.GetMonDays = function() { //Get number of days in a month

    var DaysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if (Cal.IsLeapYear()) {
        DaysInMonth[1] = 29;
    }

    return DaysInMonth[this.Month];
};

Calendar.prototype.IsLeapYear = function ()
{
	if ((this.Year % 4) === 0)
	{
		if ((this.Year % 100 === 0) && (this.Year % 400) !== 0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	else
	{
		return false;
	}
};

Calendar.prototype.FormatDate = function (pDate)
{
	var MonthDigit = this.Month + 1;
	if (PrecedeZero === true)
	{
		if ((pDate < 10) && String(pDate).length===1) //length checking added in version 2.2
		{		
			pDate = "0" + pDate;
		}
		if (MonthDigit < 10)
		{
			MonthDigit = "0" + MonthDigit;
		}
	}

	switch (this.Format.toUpperCase())
	{
		case "DDMMYYYY":
		return (pDate + DateSeparator + MonthDigit + DateSeparator + this.Year);
		case "DDMMMYYYY":
		return (pDate + DateSeparator + this.GetMonthName(false) + DateSeparator + this.Year);
		case "MMDDYYYY":
		return (MonthDigit + DateSeparator + pDate + DateSeparator + this.Year);
		case "MMMDDYYYY":
		return (this.GetMonthName(false) + DateSeparator + pDate + DateSeparator + this.Year);
		case "YYYYMMDD":
		return (this.Year + DateSeparator + MonthDigit + DateSeparator + pDate);
		case "YYMMDD":
		return (String(this.Year).substring(2, 4) + DateSeparator + MonthDigit + DateSeparator + pDate);
		case "YYMMMDD":
		return (String(this.Year).substring(2, 4) + DateSeparator + this.GetMonthName(false) + DateSeparator + pDate);
		case "YYYYMMMDD":
		return (this.Year + DateSeparator + this.GetMonthName(false) + DateSeparator + pDate);
		default:
		return (pDate + DateSeparator + (this.Month + 1) + DateSeparator + this.Year);
	}
};

// end Calendar prototype

function GenCell(pValue, pHighLight, pColor, pClickable)
{ //Generate table cell with value
	var PValue,
	PCellStr,
	PClickable,
	vTimeStr;

	if (!pValue)
	{
		PValue = "";
	}
	else
	{
		PValue = pValue;
	}

	if (pColor === undefined)
	    pColor = CalBgColor;
	
	if (pClickable !== undefined){
		PClickable = pClickable;
	}
	else{
		PClickable = true;
	}

	if (Cal.ShowTime)
	{
		vTimeStr = ' ' + Cal.Hours + ':' + Cal.Minutes;
		if (Cal.ShowSeconds)
		{
			vTimeStr += ':' + Cal.Seconds;
		}
		if (TimeMode === 12)
		{
			vTimeStr += ' ' + Cal.AMorPM;
		}
	}

	else
	{
		vTimeStr = "";
	}

	if (PValue !== "")
	{
		if (PClickable === true) {
		    if (Cal.ShowTime === true)
		    { PCellStr = "<td id='c" + PValue + "' class='calTD' style='text-align:center;cursor:pointer;background-color:"+pColor+"' onmousedown='selectDate(this," + PValue + ");'>" + PValue + "</td>"; }
		    else { PCellStr = "<td class='calTD' style='text-align:center;cursor:pointer;background-color:" + pColor + "' onmouseover='changeBorder(this, 0);' onmouseout=\"changeBorder(this, 1, '" + pColor + "');\" onClick=\"javascript:callback('" + Cal.Ctrl + "','" + Cal.FormatDate(PValue) + "');\">" + PValue + "</td>"; }
		}
		else
		{ PCellStr = "<td style='text-align:center;background-color:"+pColor+"' class='calTD'>"+PValue+"</td>"; }
	}
	else
	{ PCellStr = "<td style='text-align:center;background-color:"+pColor+"' class='calTD'>&nbsp;</td>"; }

	return PCellStr;
}

function RenderCssCal(bNewCal)
{
	if (typeof bNewCal === "undefined" || bNewCal !== true)
	{
		bNewCal = false;
	}
	var vCalHeader,
	vCalData,
	vCalTime = "",
	vCalClosing = "",
	winCalData = "",
	CalDate,

	i,
	j,

	SelectStr,
	vDayCount = 0,
	vFirstDay,

	WeekDayName = [],//Added version 1.7
	strCell,

	showHour,
	ShowArrows = false,
	HourCellWidth = "35px", //cell width with seconds.

	SelectAm,
	SelectPm,

	funcCalback,

	headID,
	e,
	cssStr,
	style,
	cssText,
	span;

	calHeight = 0; // reset the window height on refresh

	// Set the default cursor for the calendar

	winCalData = "<span style='cursor:auto;'>";
	vCalHeader = "<table style='background-color:"+CalBgColor+";width:200px;padding:0;margin:5px auto 5px auto'><tbody>";

	//Table for Month & Year Selector

	vCalHeader += "<tr><td colspan='7'><table border='0' width='200px' cellpadding='0' cellspacing='0'><tr>";
	//******************Month and Year selector in dropdown list************************

	if (Cal.Scroller === "DROPDOWN")
	{
	    vCalHeader += "<td align='center'><select name='MonthSelector' onChange='javascript:Cal.SwitchMth(this.selectedIndex);RenderCssCal();'>";
		for (i = 0; i < 12; i += 1)
		{
			if (i === Cal.Month)
			{
				SelectStr = "Selected";
			}
			else
			{
				SelectStr = "";
			}
			vCalHeader += "<option " + SelectStr + " value=" + i + ">" + MonthName[i] + "</option>";
		}

		vCalHeader += "</select></td>";
		//Year selector

		vCalHeader += "<td align='center'><select name='YearSelector' size='1' onChange='javascript:Cal.SwitchYear(this.value);RenderCssCal();'>";
		for (i = StartYear; i <= (dtToday.getFullYear() + EndYear); i += 1)
		{
			if (i === Cal.Year)
			{
				SelectStr = 'selected="selected"';
			}
			else
			{
				SelectStr = '';
			}
			vCalHeader += "<option " + SelectStr + " value=" + i + ">" + i + "</option>\n";
		}
		vCalHeader += "</select></td>\n";
		calHeight += 30;
	}

	//******************End Month and Year selector in dropdown list*********************

	//******************Month and Year selector in arrow*********************************

	else if (Cal.Scroller === "ARROW")
	{
		if (UseImageFiles)
		{
			vCalHeader += "<td><img onmousedown='javascript:Cal.DecYear();RenderCssCal();' src='"+imageFilesPath+"cal_fastreverse.gif' width='13px' height='9' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td>\n";//Year scroller (decrease 1 year)
			vCalHeader += "<td><img onmousedown='javascript:Cal.DecMonth();RenderCssCal();' src='" + imageFilesPath + "cal_reverse.gif' width='13px' height='9' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td>\n"; //Month scroller (decrease 1 month)
			vCalHeader += "<td width='70%' class='calR' style='color:"+YrSelColor+"'>"+ Cal.GetMonthName(ShowLongMonth) + " " + Cal.Year + "</td>"; //Month and Year
			vCalHeader += "<td><img onmousedown='javascript:Cal.IncMonth();RenderCssCal();' src='" + imageFilesPath + "cal_forward.gif' width='13px' height='9' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td>\n"; //Month scroller (increase 1 month)
			vCalHeader += "<td><img onmousedown='javascript:Cal.IncYear();RenderCssCal();' src='" + imageFilesPath + "cal_fastforward.gif' width='13px' height='9' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td>\n"; //Year scroller (increase 1 year)
			calHeight += 22;
		}
		else
		{
			vCalHeader += "<td><span id='dec_year' title='reverse year' onmousedown='javascript:Cal.DecYear();RenderCssCal();' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white; color:" + YrSelColor + "'>-</span></td>";//Year scroller (decrease 1 year)
			vCalHeader += "<td><span id='dec_month' title='reverse month' onmousedown='javascript:Cal.DecMonth();RenderCssCal();' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'>&lt;</span></td>\n";//Month scroller (decrease 1 month)
			vCalHeader += "<td width='70%' class='calR' style='color:" + YrSelColor + "'>" + Cal.GetMonthName(ShowLongMonth) + " " + Cal.Year + "</td>\n"; //Month and Year
			vCalHeader += "<td><span id='inc_month' title='forward month' onmousedown='javascript:Cal.IncMonth();RenderCssCal();' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'>&gt;</span></td>\n";//Month scroller (increase 1 month)
			vCalHeader += "<td><span id='inc_year' title='forward year' onmousedown='javascript:Cal.IncYear();RenderCssCal();'  onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white; color:" + YrSelColor + "'>+</span></td>\n";//Year scroller (increase 1 year)
			calHeight += 22;
		}
	}

	vCalHeader += "</tr></table></td></tr>";

	//******************End Month and Year selector in arrow******************************

	//Calendar header shows Month and Year
	if (ShowMonthYear && Cal.Scroller === "DROPDOWN")
	{
	    vCalHeader += "<tr><td colspan='7' class='calR' style='color:" + MonthYearColor + "'>" + Cal.GetMonthName(ShowLongMonth) + " " + Cal.Year + "</td></tr>";
		calHeight += 19;
	}

	//Week day header

	vCalHeader += "<tr><td colspan=\"7\"><table style='border-spacing:1px;border-collapse:separate;'><tr>";
	if (MondayFirstDay === true)
	{
		WeekDayName = WeekDayName2;
	}
	else
	{
		WeekDayName = WeekDayName1;
	}
	for (i = 0; i < 7; i += 1)
	{
	    vCalHeader += "<td style='background-color:"+WeekHeadColor+";width:"+CellWidth+"px;color:#FFFFFF' class='calTD'>" + WeekDayName[i].substr(0, WeekChar) + "</td>";
	}

	calHeight += 19;
	vCalHeader += "</tr>";
	//Calendar detail
	CalDate = new Date(Cal.Year, Cal.Month);
	CalDate.setDate(1);

	vFirstDay = CalDate.getDay();

	//Added version 1.7
	if (MondayFirstDay === true)
	{
		vFirstDay -= 1;
		if (vFirstDay === -1)
		{
			vFirstDay = 6;
		}
	}

	//Added version 1.7
	vCalData = "<tr>";
	calHeight += 19;
	for (i = 0; i < vFirstDay; i += 1)
	{
		vCalData = vCalData + GenCell();
		vDayCount = vDayCount + 1;
	}

	//Added version 1.7
	for (j = 1; j <= Cal.GetMonDays(); j += 1)
	{
		if ((vDayCount % 7 === 0) && (j > 1))
		{
			vCalData = vCalData + "<tr>";
		}

		vDayCount = vDayCount + 1;
		//added version 2.1.2
		if (Cal.EnableDateMode === "future" && ((j < dtToday.getDate()) && (Cal.Month === dtToday.getMonth()) && (Cal.Year === dtToday.getFullYear()) || (Cal.Month < dtToday.getMonth()) && (Cal.Year === dtToday.getFullYear()) || (Cal.Year < dtToday.getFullYear())))
		{
			strCell = GenCell(j, false, DisableColor, false); //Before today's date is not clickable
        }
        else if (Cal.EnableDateMode === "past" && ((j >= dtToday.getDate()) && (Cal.Month === dtToday.getMonth()) && (Cal.Year === dtToday.getFullYear()) || (Cal.Month > dtToday.getMonth()) && (Cal.Year === dtToday.getFullYear()) || (Cal.Year > dtToday.getFullYear()))) {
            strCell = GenCell(j, false, DisableColor, false); //After today's date is not clickable
        }
		//if End Year + Current Year = Cal.Year. Disable.
		else if (Cal.Year > (dtToday.getFullYear()+EndYear))
		{
		    strCell = GenCell(j, false, DisableColor, false); 
		}
		else if ((j === dtToday.getDate()) && (Cal.Month === dtToday.getMonth()) && (Cal.Year === dtToday.getFullYear()))
		{
			strCell = GenCell(j, true, TodayColor);//Highlight today's date
		}
		else
		{
			if ((j === selDate.getDate()) && (Cal.Month === selDate.getMonth()) && (Cal.Year === selDate.getFullYear())){
			     //modified version 1.7
				strCell = GenCell(j, true, SelDateColor);
            }
			else
			{
				if (MondayFirstDay === true)
				{
					if (vDayCount % 7 === 0)
					{
						strCell = GenCell(j, false, SundayColor);
					}
					else if ((vDayCount + 1) % 7 === 0)
					{
						strCell = GenCell(j, false, SaturdayColor);
					}
					else
					{
						strCell = GenCell(j, null, WeekDayColor);
					}
				}
				else
				{
					if (vDayCount % 7 === 0)
					{
						strCell = GenCell(j, false, SaturdayColor);
					}
					else if ((vDayCount + 6) % 7 === 0)
					{
						strCell = GenCell(j, false, SundayColor);
					}
					else
					{
						strCell = GenCell(j, null, WeekDayColor);
					}
				}
			}
		}

		vCalData = vCalData + strCell;

		if ((vDayCount % 7 === 0) && (j < Cal.GetMonDays()))
		{
			vCalData = vCalData + "</tr>";
			calHeight += 19;
		}
	}

	// finish the table proper

	if (vDayCount % 7 !== 0)
	{
		while (vDayCount % 7 !== 0)
		{
			vCalData = vCalData + GenCell();
			vDayCount = vDayCount + 1;
		}
	}

	vCalData = vCalData + "</table></td></tr>";


	//Time picker
	if (Cal.ShowTime === true)
	{
		showHour = Cal.getShowHour();

		if (Cal.ShowSeconds === false && TimeMode === 24)
		{
			ShowArrows = true;
			HourCellWidth = "10px";
		}

		vCalTime = "<tr><td colspan='7' style=\"text-align:center;\"><table border='0' width='199px' cellpadding='0' cellspacing='0'><tbody><tr><td height='5px' width='" + HourCellWidth + "'>&nbsp;</td>";

		if (ShowArrows && UseImageFiles) //this is where the up and down arrow control the hour.
		{
		    vCalTime += "<td style='vertical-align:middle;'><table cellspacing='0' cellpadding='0' style='line-height:0pt;width:100%;'><tr><td style='text-align:center;'><img onclick='nextStep(\"Hour\", \"plus\");' onmousedown='startSpin(\"Hour\", \"plus\");' onmouseup='stopSpin();' src='" + imageFilesPath + "cal_plus.gif' width='13px' height='9px' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td></tr><tr><td style='text-align:center;'><img onclick='nextStep(\"Hour\", \"minus\");' onmousedown='startSpin(\"Hour\", \"minus\");' onmouseup='stopSpin();' src='" + imageFilesPath + "cal_minus.gif' width='13px' height='9px' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td></tr></table></td>\n";
		}

		vCalTime += "<td width='22px'><input type='text' name='hour' maxlength=2 size=1 style=\"WIDTH:22px\" value=" + showHour + " onkeyup=\"javascript:Cal.SetHour(this.value)\">";
		vCalTime += "</td><td style='font-weight:bold;text-align:center;'>:</td><td width='22px'>";
		vCalTime += "<input type='text' name='minute' maxlength=2 size=1 style=\"WIDTH: 22px\" value=" + Cal.Minutes + " onkeyup=\"javascript:Cal.SetMinute(this.value)\">";

		if (Cal.ShowSeconds)
		{
		    vCalTime += "</td><td style='font-weight:bold;'>:</td><td width='22px'>";
			vCalTime += "<input type='text' name='second' maxlength=2 size=1 style=\"WIDTH: 22px\" value=" + Cal.Seconds + " onkeyup=\"javascript:Cal.SetSecond(parseInt(this.value,10))\">";
		}

		if (TimeMode === 12)
		{
			SelectAm = (Cal.AMorPM === "AM") ? "Selected" : "";
			SelectPm = (Cal.AMorPM === "PM") ? "Selected" : "";

			vCalTime += "</td><td>";
			vCalTime += "<select name=\"ampm\" onChange=\"javascript:Cal.SetAmPm(this.options[this.selectedIndex].value);\">\n";
			vCalTime += "<option " + SelectAm + " value=\"AM\">AM</option>";
			vCalTime += "<option " + SelectPm + " value=\"PM\">PM<option>";
			vCalTime += "</select>";
		}

		if (ShowArrows && UseImageFiles) //this is where the up and down arrow to change the "Minute".
		{
		    vCalTime += "</td>\n<td style='vertical-align:middle;'><table cellspacing='0' cellpadding='0' style='line-height:0pt;width:100%'><tr><td style='text-align:center;'><img onclick='nextStep(\"Minute\", \"plus\");' onmousedown='startSpin(\"Minute\", \"plus\");' onmouseup='stopSpin();' src='" + imageFilesPath + "cal_plus.gif' width='13px' height='9px' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td></tr><tr><td style='text-align:center;'><img onmousedown='startSpin(\"Minute\", \"minus\");' onmouseup='stopSpin();' onclick='nextStep(\"Minute\",\"minus\");' src='" + imageFilesPath + "cal_minus.gif' width='13px' height='9px' onmouseover='changeBorder(this, 0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td></tr></table>";
		}

		vCalTime += "</td>\n<td align='right' valign='bottom' width='" + HourCellWidth + "px'></td></tr>";
		vCalTime += "<tr><td colspan='8' style=\"text-align:center;\"><input style='width:60px;font-size:12px;' onClick='javascript:closewin(\"" + Cal.Ctrl + "\");'  type=\"button\" value=\"OK\">&nbsp;<input style='width:60px;font-size:12px;' onClick='javascript: winCal.style.visibility = \"hidden\"' type=\"button\" value=\"Cancel\"></td></tr>";
	}
	else //if not to show time.
	{
	    vCalTime += "\n<tr>\n<td colspan='7' style=\"text-align:right;\">";
	    //close button
	    if (UseImageFiles) {
	        vCalClosing += "<img onmousedown='javascript:closewin(\"" + Cal.Ctrl + "\"); stopSpin();' src='"+imageFilesPath+"cal_close.gif' width='16px' height='14px' onmouseover='changeBorder(this,0)' onmouseout='changeBorder(this, 1)' style='border:1px solid white'></td>";
	    }
	    else {
	        vCalClosing += "<span id='close_cal' title='close'onmousedown='javascript:closewin(\"" + Cal.Ctrl + "\");stopSpin();' onmouseover='changeBorder(this, 0)'onmouseout='changeBorder(this, 1)' style='border:1px solid white; font-family: Arial;font-size: 10pt;'>x</span></td>";
	    }
	    vCalClosing += "</tr>";
	}
	vCalClosing += "</tbody></table></td></tr>";
	calHeight += 31;
	vCalClosing += "</tbody></table>\n</span>";

	//end time picker
	funcCalback = "function callback(id, datum) {";
	funcCalback += " var CalId = document.getElementById(id);if (datum=== 'undefined') { var d = new Date(); datum = d.getDate() + '/' +(d.getMonth()+1) + '/' + d.getFullYear(); } window.calDatum=datum;CalId.value=datum;";
	funcCalback += " if(Cal.ShowTime){";
	funcCalback += " CalId.value+=' '+Cal.getShowHour()+':'+Cal.Minutes;";
	funcCalback += " if (Cal.ShowSeconds)  CalId.value+=':'+Cal.Seconds;";
	funcCalback += " if (TimeMode === 12)  CalId.value+=''+Cal.getShowAMorPM();";
	funcCalback += "}if(CalId.onchange!=undefined) CalId.onchange();CalId.focus();winCal.style.visibility='hidden';}";


	// determines if there is enough space to open the cal above the position where it is called
	if (ypos > calHeight)
	{
		ypos = ypos - calHeight;
	}

	if (!winCal)
	{
		headID = document.getElementsByTagName("head")[0];

		// add javascript function to the span cal
		e = document.createElement("script");
		e.type = "text/javascript";
		e.language = "javascript";
		e.text = funcCalback;
		headID.appendChild(e);
		// add stylesheet to the span cal

		cssStr = ".calTD {font-family: verdana; font-size: 12px; text-align: center; border:0; }\n";
		cssStr += ".calR {font-family: verdana; font-size: 12px; text-align: center; font-weight: bold;}";

		style = document.createElement("style");
		style.type = "text/css";
		style.rel = "stylesheet";
		if (style.styleSheet)
		{ // IE
			style.styleSheet.cssText = cssStr;
		}

		else
		{ // w3c
			cssText = document.createTextNode(cssStr);
			style.appendChild(cssText);
		}

		headID.appendChild(style);
		// create the outer frame that allows the cal. to be moved
		span = document.createElement("span");
		span.id = calSpanID;
		span.style.position = "absolute";
		span.style.left = (xpos + CalPosOffsetX) + 'px';
		span.style.top = (ypos - CalPosOffsetY) + 'px';
		span.style.width = CalWidth + 'px';
		span.style.border = "solid 1pt " + SpanBorderColor;
		span.style.padding = "0";
		span.style.cursor = "move";
		span.style.backgroundColor = SpanBgColor;
		span.style.zIndex = 100;
		document.body.appendChild(span);
		winCal = document.getElementById(calSpanID);
	}

	else
	{
		winCal.style.visibility = "visible";
		winCal.style.Height = calHeight;

		// set the position for a new calendar only
		if (bNewCal === true)
		{
			winCal.style.left = (xpos + CalPosOffsetX) + 'px';
			winCal.style.top = (ypos - CalPosOffsetY) + 'px';
		}
	}

	winCal.innerHTML = winCalData + vCalHeader + vCalData + vCalTime + vCalClosing;
	return true;
}


function NewCssCal(pCtrl, pFormat, pScroller, pShowTime, pTimeMode, pShowSeconds, pEnableDateMode)
{
	// get current date and time

	dtToday = new Date();
	Cal = new Calendar(dtToday);

	if (pShowTime !== undefined)
	{
	    if (pShowTime) {
	        Cal.ShowTime = true;
	    }
	    else {
	        Cal.ShowTime = false;
	    }

		if (pTimeMode)
		{
			pTimeMode = parseInt(pTimeMode, 10);
		}
		if (pTimeMode === 12 || pTimeMode === 24)
		{
			TimeMode = pTimeMode;
		}
		else
		{
			TimeMode = 24;
		}

		if (pShowSeconds !== undefined)
		{
			if (pShowSeconds)
			{
				Cal.ShowSeconds = true;
			}
			else
			{
				Cal.ShowSeconds = false;
			}
		}
		else
		{
			Cal.ShowSeconds = false;
		}

	}

	if (pCtrl !== undefined)
	{
		Cal.Ctrl = pCtrl;
	}

	if (pFormat!== undefined && pFormat !=="")
	{
		Cal.Format = pFormat.toUpperCase();
	}
	else
	{
		Cal.Format = "MMDDYYYY";
	}

	if (pScroller!== undefined && pScroller!=="")
	{
		if (pScroller.toUpperCase() === "ARROW")
		{
			Cal.Scroller = "ARROW";
		}
		else
		{
			Cal.Scroller = "DROPDOWN";
		}
    }

    if (pEnableDateMode !== undefined && (pEnableDateMode === "future" || pEnableDateMode === "past")) {
        Cal.EnableDateMode= pEnableDateMode;
    }

	exDateTime = document.getElementById(pCtrl).value; //Existing Date Time value in textbox.

	if (exDateTime)
	{ //Parse existing Date String
		var Sp1 = exDateTime.indexOf(DateSeparator, 0),//Index of Date Separator 1
		Sp2 = exDateTime.indexOf(DateSeparator, parseInt(Sp1, 10) + 1),//Index of Date Separator 2
		tSp1,//Index of Time Separator 1
		tSp2,//Index of Time Separator 2
		strMonth,
		strDate,
		strYear,
		intMonth,
		YearPattern,
		strHour,
		strMinute,
		strSecond,
		winHeight,
		offset = parseInt(Cal.Format.toUpperCase().lastIndexOf("M"), 10) - parseInt(Cal.Format.toUpperCase().indexOf("M"), 10) - 1,
		strAMPM = "";
		//parse month

		if (Cal.Format.toUpperCase() === "DDMMYYYY" || Cal.Format.toUpperCase() === "DDMMMYYYY")
		{
			if (DateSeparator === "")
			{
				strMonth = exDateTime.substring(2, 4 + offset);
				strDate = exDateTime.substring(0, 2);
				strYear = exDateTime.substring(4 + offset, 8 + offset);
			}
			else
			{
				if (exDateTime.indexOf("D*") !== -1)
				{   //DTG
					strMonth = exDateTime.substring(8, 11);
					strDate  = exDateTime.substring(0, 2);
					strYear  = "20" + exDateTime.substring(11, 13);  //Hack, nur für Jahreszahlen ab 2000
				}
				else
				{
					strMonth = exDateTime.substring(Sp1 + 1, Sp2);
					strDate = exDateTime.substring(0, Sp1);
					strYear = exDateTime.substring(Sp2 + 1, Sp2 + 5);
				}
			}
		}

		else if (Cal.Format.toUpperCase() === "MMDDYYYY" || Cal.Format.toUpperCase() === "MMMDDYYYY"){
			if (DateSeparator === ""){
				strMonth = exDateTime.substring(0, 2 + offset);
				strDate = exDateTime.substring(2 + offset, 4 + offset);
				strYear = exDateTime.substring(4 + offset, 8 + offset);
			}
			else{
				strMonth = exDateTime.substring(0, Sp1);
				strDate = exDateTime.substring(Sp1 + 1, Sp2);
				strYear = exDateTime.substring(Sp2 + 1, Sp2 + 5);
			}
		}

		else if (Cal.Format.toUpperCase() === "YYYYMMDD" || Cal.Format.toUpperCase() === "YYYYMMMDD")
		{
			if (DateSeparator === ""){
				strMonth = exDateTime.substring(4, 6 + offset);
				strDate = exDateTime.substring(6 + offset, 8 + offset);
				strYear = exDateTime.substring(0, 4);
			}
			else{
				strMonth = exDateTime.substring(Sp1 + 1, Sp2);
				strDate = exDateTime.substring(Sp2 + 1, Sp2 + 3);
				strYear = exDateTime.substring(0, Sp1);
			}
		}

		else if (Cal.Format.toUpperCase() === "YYMMDD" || Cal.Format.toUpperCase() === "YYMMMDD")
		{
			if (DateSeparator === "")
			{
				strMonth = exDateTime.substring(2, 4 + offset);
				strDate = exDateTime.substring(4 + offset, 6 + offset);
				strYear = exDateTime.substring(0, 2);
			}
			else
			{
				strMonth = exDateTime.substring(Sp1 + 1, Sp2);
				strDate = exDateTime.substring(Sp2 + 1, Sp2 + 3);
				strYear = exDateTime.substring(0, Sp1);
			}
		}

		if (isNaN(strMonth)){
			intMonth = Cal.GetMonthIndex(strMonth);
		}
		else{
			intMonth = parseInt(strMonth, 10) - 1;
		}
		if ((parseInt(intMonth, 10) >= 0) && (parseInt(intMonth, 10) < 12))	{
			Cal.Month = intMonth;
		}
		//end parse month

		//parse year
		YearPattern = /^\d{4}$/;
		if (YearPattern.test(strYear)) {
		    if ((parseInt(strYear, 10)>=StartYear) && (parseInt(strYear, 10)<= (dtToday.getFullYear()+EndYear)))
		        Cal.Year = parseInt(strYear, 10);
		}
		//end parse year
		
		//parse Date
		if ((parseInt(strDate, 10) <= Cal.GetMonDays()) && (parseInt(strDate, 10) >= 1)) {
			Cal.Date = strDate;
		}
		//end parse Date

		//parse time

		if (Cal.ShowTime === true)
		{
			//parse AM or PM
			if (TimeMode === 12)
			{
				strAMPM = exDateTime.substring(exDateTime.length - 2, exDateTime.length);
				Cal.AMorPM = strAMPM;
			}

			tSp1 = exDateTime.indexOf(":", 0);
			tSp2 = exDateTime.indexOf(":", (parseInt(tSp1, 10) + 1));
			if (tSp1 > 0)
			{
				strHour = exDateTime.substring(tSp1, tSp1 - 2);
				Cal.SetHour(strHour);

				strMinute = exDateTime.substring(tSp1 + 1, tSp1 + 3);
				Cal.SetMinute(strMinute);

				strSecond = exDateTime.substring(tSp2 + 1, tSp2 + 3);
				Cal.SetSecond(strSecond);

			}
			else if (exDateTime.indexOf("D*") !== -1)
			{   //DTG
				strHour = exDateTime.substring(2, 4);
				Cal.SetHour(strHour);
				strMinute = exDateTime.substring(4, 6);
				Cal.SetMinute(strMinute);

			}
		}

	}
	selDate = new Date(Cal.Year, Cal.Month, Cal.Date);//version 1.7
	RenderCssCal(true);
}

function closewin(id) {
    if (Cal.ShowTime === true) {
        var MaxYear = dtToday.getFullYear() + EndYear;
        var beforeToday =
                    (Cal.Date < dtToday.getDate()) &&
                    (Cal.Month === dtToday.getMonth()) &&
                    (Cal.Year === dtToday.getFullYear())
                    ||
                    (Cal.Month < dtToday.getMonth()) &&
                    (Cal.Year === dtToday.getFullYear())
                    ||
                    (Cal.Year < dtToday.getFullYear());

        if ((Cal.Year <= MaxYear) && (Cal.Year >= StartYear) && (Cal.Month === selDate.getMonth()) && (Cal.Year === selDate.getFullYear())) {
            if (Cal.EnableDateMode === "future") {
                if (beforeToday === false) {
                    callback(id, Cal.FormatDate(Cal.Date));
                }
            }
            else
                callback(id, Cal.FormatDate(Cal.Date));
        }
    }
    
	var CalId = document.getElementById(id);
	CalId.focus();
	winCal.style.visibility = 'hidden';
}

function changeBorder(element, col, oldBgColor)
{
	if (col === 0)
	{
		element.style.background = HoverColor;
		element.style.borderColor = "black";
		element.style.cursor = "pointer";
	}

	else
	{
		if (oldBgColor)
		{
			element.style.background = oldBgColor;
		}
		else
		{
			element.style.background = "white";
		}
		element.style.borderColor = "white";
		element.style.cursor = "auto";
	}
}

function selectDate(element, date) {
    Cal.Date = date;
    selDate = new Date(Cal.Year, Cal.Month, Cal.Date);
    element.style.background = SelDateColor;
    RenderCssCal();
}

function pickIt(evt)
{
	var objectID,
	dom,
	de,
	b;
	// accesses the element that generates the event and retrieves its ID
	if (document.addEventListener)
	{ // w3c
		objectID = evt.target.id;
		if (objectID.indexOf(calSpanID) !== -1)
		{
			dom = document.getElementById(objectID);
			cnLeft = evt.pageX;
			cnTop = evt.pageY;

			if (dom.offsetLeft)
			{
				cnLeft = (cnLeft - dom.offsetLeft);
				cnTop = (cnTop - dom.offsetTop);
			}
		}

		// get mouse position on click
		xpos = (evt.pageX);
		ypos = (evt.pageY);
	}

	else
	{ // IE
		objectID = event.srcElement.id;
		cnLeft = event.offsetX;
		cnTop = (event.offsetY);

		// get mouse position on click
		de = document.documentElement;
		b = document.body;

		xpos = event.clientX + (de.scrollLeft || b.scrollLeft) - (de.clientLeft || 0);
		ypos = event.clientY + (de.scrollTop || b.scrollTop) - (de.clientTop || 0);
	}

	// verify if this is a valid element to pick
	if (objectID.indexOf(calSpanID) !== -1)
	{
		domStyle = document.getElementById(objectID).style;
	}

	if (domStyle)
	{
		domStyle.zIndex = 100;
		return false;
	}

	else
	{
		domStyle = null;
		return;
	}
}



function dragIt(evt)
{
	if (domStyle)
	{
		if (document.addEventListener)
		{ //for IE
			domStyle.left = (event.clientX - cnLeft + document.body.scrollLeft) + 'px';
			domStyle.top = (event.clientY - cnTop + document.body.scrollTop) + 'px';
		}
		else
		{  //Firefox
			domStyle.left = (evt.clientX - cnLeft + document.body.scrollLeft) + 'px';
			domStyle.top = (evt.clientY - cnTop + document.body.scrollTop) + 'px';
		}
	}
}

// performs a single increment or decrement
function nextStep(whatSpinner, direction)
{
	if (whatSpinner === "Hour")
	{
		if (direction === "plus")
		{
			Cal.SetHour(Cal.Hours + 1);
			RenderCssCal();
		}
		else if (direction === "minus")
		{
			Cal.SetHour(Cal.Hours - 1);
			RenderCssCal();
		}
	}
	else if (whatSpinner === "Minute")
	{
		if (direction === "plus")
		{
			Cal.SetMinute(parseInt(Cal.Minutes, 10) + 1);
			RenderCssCal();
		}
		else if (direction === "minus")
		{
			Cal.SetMinute(parseInt(Cal.Minutes, 10) - 1);
			RenderCssCal();
		}
	}

}

// starts the time spinner
function startSpin(whatSpinner, direction)
{
	document.thisLoop = setInterval(function ()
	{
		nextStep(whatSpinner, direction);
	}, 125); //125 ms
}

//stops the time spinner
function stopSpin()
{
	clearInterval(document.thisLoop);
}

function dropIt()
{
	stopSpin();

	if (domStyle)
	{
		domStyle = null;
	}
}

// Default events configuration

document.onmousedown = pickIt;
document.onmousemove = dragIt;
document.onmouseup = dropIt;
</script>
</head>

<!--    OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO    Date Function   end  OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->




 
 
 
 </head>

 <body>
<?php
    		$query2 = "SELECT * FROM banq_order_master WHERE FUNCTION_DATE='$date' AND BANQ_ID='$id' AND TIME_FROM='$time_from' AND TIME_TO='$time_to' AND BOOKING_STATUS!='C'";
            $result2 = mysql_query($query2) or die('Query Failed');
			
			//$order_id =0;//new declaration
			
			if(mysql_num_rows($result2)==0)
			{//echo 'first';	?>
 			
<?php
	       $query3 = "SELECT max(ORDER_NO) FROM banq_order_master";
            $result3 = mysql_query($query3);
		$i=0;			
	$row3=mysql_result($result3,$i,"max(ORDER_NO)");
	

	
			?>
            <input type="hidden" name="banq_old_id" id="banq_old_id" value="<?php echo $id; ?>"/>
           
<div id="templatemo_content">
   <p><span class="red">Function	Booking</span></p>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <?php
		$query1234 = "SELECT * FROM banq_master_tab WHERE BANQ_ID='$id'";
        $result1234 = mysql_query($query1234);
		$row11=mysql_fetch_array($result1234)
		?>
   <span class="red"><?php echo $row11['BANQ_NAME'];if($time_from=="12:00:00" && $time_to =="17:00:00") { echo '&nbsp;(LUNCH)';}
 else
 {
 echo '&nbsp;(DINNER)';
 }?></span>
   <h1 class="style1"  align="left" style=" font-size:12px;"><?php echo $todayy." ".$day; ?></h1>
   <form name="form1" id="form1" action="ajax/banq_order_book.php" method="post" onsubmit="return validateForm()">
   <div align="center">
    <table border="2">
       <tr>
        <td><input name="book_status" type="radio" value="C" />
           Cancelled
           &nbsp;
           <input name="book_status" type="radio" value="T"/>
           Tentative
           &nbsp;
           <input name="book_status" type="radio" value="B" checked="checked"/>
           Booked</td>
      </tr>
     </table>
  </div>
   <div  id="leftcolumn_box">
    <table width="231" border="0">
       <tr>
        <th width="94"><div align="justify">Function Id</div></th>
        <input type="hidden" id="testing" value="" />
        <td width="127"><div align="justify">
            <input name="order_i" id="order_i" type="text" size="4" value="<?php echo $order_id = $row3+1; ?>" readonly/>
          </div></td>
      </tr>
       <tr>
        <th width="94"><div align="justify">Booking Date</div></th>
        <td width="127"><div align="justify">
        <?php 
		 // $tdate = mktime(0,0,0,date("m"),date("d"),date("Y"));
		  ?>
          <!--
            <input type="text" name="date" style="border:groove" id="date" value="<?php echo $date=date("Y-m-d", $tdate); ?>" onchange="search_slot();"/>
          -->
        
        
         
         
        
        
            <?php
$tdate = mktime(0,0,0,date("m"),date("d"),date("Y"));

?>
            <input type="hidden" name="today" id="today"  style="border:groove" value="<?php  echo $date=date("Y-m-d", $tdate); ?>" />
            
           <!-- <input type="text" size="10"  style="border:groove" name="date" id="date" value="<?php echo $date=date("Y-m-d", $tdate); ?>"  onchange="date_check(this.value);"/>-->
           
     <!--<input type="text" id="checkup_date" name="checkup_date" class="tb8" value="<?php echo $d_date; ?>" readonly required />
        <img src="images/cal.gif"  onclick="javascript:NewCssCal ('checkup_date','ddMMyyyy')" style="cursor:pointer"/>-->
    <!--value="<?php // echo $mcheckup_date; ?>"  class="tb8" readonly>-->
   <!--       *************************************************************************************************      -->
        <input type="text" id="date" name="date" value="<?php echo $date=date("Y-m-d", $tdate); ?>"  />
        <img onchange="date_check(this.value)  ('date','yyyyMMdd')" />
        
   <!--value="<?php // echo $mcheckup_date; ?>"  class="tb8" readonly>-->
   <!--       *************************************************************************************************      -->
   
            
             <!--<input type="text" name="date" style="border:groove" id="date" value="<?php echo $date=date("Y-m-d", $tdate); ?>" 
             onchange="search_slot();"/>-->
          
          </div></td>
      </tr>
       <tr>
        <th width="94"><div align="justify">Function*</div></th>
        <td width="127" align="left"><div align="justify">
            <select id="func" name="func" >
              <option value="">Function Type</option>
              <?php $query = "SELECT * FROM function_type_tab ORDER BY FUNCTION_TYPE_NAME ASC";
	  $result = mysql_query($query) or die('Not Found:'.mysql_error());
	  $num = mysql_num_rows($result);
	  $i=0;
	  while($i < $num)
	  {
		  $foodid = mysql_result($result,$i, "FUNCTION_TYPE_ID" );
		  $food_detail = mysql_result($result,$i, "FUNCTION_TYPE_NAME" );
		  echo '<option value="'.$foodid.'">'.$food_detail.'</option>';
		  $i++;
	  }  // while loop ends here?>
            </select>
          </div></td>
      </tr>
       <tr>
        <th width="94"><div align="justify">Function Date</div></th>
        <td width="127"><div align="justify">
            <input type="hidden" name="f_date" id="f_date" value="<?php echo $date; ?>"/>
            <input readonly="readonly" type="text" size="10" name="date1" id="date1" value="<?php echo $date; ?>" onchange="date_check1(this.value);"/>
            <input type="hidden" name="shift_func" id="shift_func" value=""/>
            <input type="hidden" size="10" name="date2" id="date2" value="" onchange="addhall();" />
          </div></td>
      </tr>
       <tr>
        <th width="94"><div align="justify">Function Time</div></th>
        <td width="127"><div align="justify">
            <input name="time_from" type="hidden" id="tim" value="<?php echo $time_from; ?>" />
            <select id="func_time" name="time" onchange="hall_availability_book()" />
            
            <?php  if($time_from=="12:00:00" && $time_to =="17:00:00") {?>
            <option value="lunch">Lunch</option>
            <option value="dinner">Dinner</option>
            <?php } else if($time_from=="18:00:00" && $time_to =="23:00:00") { ?>
            <option value="dinner">Dinner</option>
            <option value="lunch">Lunch</option>
            <?php } ?>
            </select>
          </div></td>
      </tr>
       <tr>
        <th width="94"><div align="justify">Hall</div></th>
        <td width="127"><div align="justify">
    	<!-- /////////////////////////////////////////////////////////////////////////   Changes January 26, 2015 -->
            <input name="banq_old_id" type="hidden" id="banq_old_id" value="<?php echo $id; ?>" />
    	<!-- /////////////////////////////////////////////////////////////////////////   Changes January 26, 2015 -->
            <select id="banquet" name="banquet" onchange="hall_availability_book()">
              <?php
		$query123 = "SELECT * FROM banq_master_tab WHERE BANQ_ID='$id'";
        $result123 = mysql_query($query123);
		$row1=mysql_fetch_array($result123)
		?>
              <option value="<?php echo $row1['BANQ_ID']; ?>"><?php echo $row1['BANQ_NAME']; ?></option>
              <?php
         $query12 = "SELECT * FROM banq_master_tab";
            $result12 = mysql_query($query12);
			while($row=mysql_fetch_array($result12))
			{
			if($row['BANQ_NAME']!=$row1['BANQ_NAME']){
			?>
              <option value="<?php echo $row['BANQ_ID']; ?>"><?php echo $row['BANQ_NAME']; ?></option>
              <?php
				}
			}        
        ?>
            </select>
          </div></td>
      </tr>
       <tr>
        <th width="94"><div align="justify">Additional Hall</div></th>
        <td width="127"><div align="justify"> </div>
           <p align="justify">
            <?php

            $query = "SELECT * FROM banq_master_tab WHERE banq_master_tab.BANQ_ID NOT IN(SELECT BANQ_ID FROM banq_order_master WHERE BOOKING_STATUS='B' AND FUNCTION_DATE='$date' AND TIME_FROM='$time_from') AND banq_master_tab.BANQ_ID != '$id'";
			
            $result = mysql_query($query);
			
            $num = mysql_num_rows($result);
            $i=0;
            while($i < $num)
            {
				
                $o_id = mysql_result($result,$i, "BANQ_ID" );
				$o_name = mysql_result($result,$i, "BANQ_NAME" );
				?>
          
           <div align="justify">
            <input type="checkbox" name="add_hall[]" value="<?php echo $o_id; ?>" id="add_hall" />
            <?php echo $o_name; ?>
            <?php
            $i++;
            }  // while loop ends here
                
        ?>
          </div></td>
      </tr>
     </table>
    <div id="add_hall_div"> </div>
    <table width="229" border="0">
       
        <th width="94"><div align="justify">Guest Expected</div></th>
        <td width="125"><div align="justify">
            <input type="text" size="10" name="guest_expected" id="g_exp" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Guest Guranted</div></th>
        <td><div align="justify">
            <input name="guest_gaurante" type="text" size="10" id="g_grn" onchange="same_amount('g_grn','op','op8'); calc1('op','op1','result')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Function Incharge</div></th>
        <td><div align="justify">
            <input name="incharge" type="text" size="10" />
          </div></td>
      </tr>
     </table>
    <table width="325" border="0">
       <tr>
        <th width="95"><div align="justify">Select Menu</div></th>
        <td width="196"><div align="justify">
            <select name="menu" id="menu_num" style="font-size:12px" onchange="menu_load();">
              <option style="font-size:12px" value="" >Select menu</option>
              <?php
$query4 ="SELECT * FROM order_menu";
$result4 = mysql_query($query4);
while($men=mysql_fetch_array($result4))
{
?>
              <option style="font-size:12px" value="<?php echo $men['menu_name'];?>" ><?php echo $men['menu_name'];?></option>
              <?php } ?>
            </select>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Order Dishes</div></th>
        <td><select  style="font-size:12px; width:200px" name="menu_order[]" id="menu_order1" size="9" multiple="multiple">
          </select></td>
      </tr>
       <tr>
        <th></th>
        <td><input name="del_dish" type="button" value="Delete Dish" onclick="del_dish_order();" style="background: #F30; color:#000; font-weight:700;"/></td>
      </tr>
     </table>
    <p>&nbsp;</p>
  </div>
   <div id="mid1column_box">
    <table width="229" height="368" border="0">
       <tr>
        <th><div align="justify">Host*</div></th>
        <td><div align="justify">
            <textarea name="host_name" pattern="[A-Z a-z]+" id="host" cols="15"></textarea>
            <!--<input name="host_name" type="text" size="10" pattern="[A-Z a-z]+" id="host"  />--> 
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Address</div></th>
        <td><div align="justify">
            <textarea name="address" cols="15"></textarea>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Tele No.*</div></th>
        <td><div align="justify">
            <input name="telephone" type="text" size="15" pattern="[0-9]+" id="tel"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Contact (1)</div></th>
        <td><div align="justify">
            <input name="telephone1" type="text" size="15" pattern="[0-9]+" id="tel1"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Contact (2)</div></th>
        <td><div align="justify">
            <input name="telephone2" type="text" size="15" pattern="[0-9]+" id="tel2"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">CNIC*</div></th>
        <td><div align="justify">
            <input name="cnic" type="text" size="10" pattern="[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}" maxlength="15" id="cnic" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Care Of</div></th>
        <td><div align="justify">
            <input name="care_person" type="text" size="10" pattern="[A-Z a-z]+" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Food to be</div></th>
        <td><div align="justify">
            <p>
              <input name="food_taste" type="radio" value="Spicy" />
              Spicy</p>
            </p>
            <p>
              <input name="food_taste" type="radio" value="Moderate Spicy" checked="checked" />
              Moderate Spicy</p>
            </p>
            <p>
              <input name="food_taste" type="radio" value="Less Spicy" />
              Less Spicy</p>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">SPL Notes</div></th>
        <td><div align="justify">
            <input name="notes" type="text" size="10" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Stage No.</div></th>
        <td><div align="justify">
            <input name="stage_num" type="text" size="10" pattern="[0-9]+" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Sound</div></th>
        <td><div align="justify">
            <input name="sound" type="text" size="10" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Video</div></th>
        <td><div align="justify">
            <input name="video" type="text" size="10" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Miscellenous</div></th>
        <td><div align="justify">
            <input name="misc" type="text" size="10" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Notes</div></th>
        <td><div align="justify">
            <textarea name="extra_notes" cols="15" rows="5"></textarea>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Additional Notes</div></th>
        <td><div align="justify">
            <textarea name="add_notes" cols="15" rows="5"></textarea>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Theme</div></th>
        <td><div align="justify">
            <select name="color_scheme1" id="color_scheme1" onchange="color_scheme(this.value);" >
              <option value="">Select Theme</option>
              <?php
      $qq= "SELECT SCHEME_ID, SCHEME_NAME, SCHEME_QTY FROM banq_color_scheme";
	  $rr = mysql_query($qq) or die ('Query failed!'.mysql_error());
while($cc = mysql_fetch_array($rr))
{
	?>
              <option value="<?php echo $cc['SCHEME_ID'];?>"> <?php echo $cc['SCHEME_NAME'];?></option>
              <?php
}?>
            </select>
          </div></td>
      </tr>
     </table>
    <div id="mode1"></div>
  </div>
   <div id="mid2column_box">
    <table width="300" border="0" >
       <tr>
        <th width="149"><div align="justify">No. of Person</div></th>
        <td width="65"><div align="justify">
            <input type="text" size="10" name="person" id="op" onchange="calc1('op','op1','result'); same_amount('op','g_grn','op8'); calculate_total('total','grand_tot');" pattern="[0-9]+" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">B. rate</div></th>
        <td><div align="justify">
            <input name="b_rate" type="text" size="10" id="op1" onchange="calc('op','op1','result'); calculate_total('total','grand_tot');" pattern="[0-9]+" />
          </div></td>
        <td width="72"><div align="justify">
            <input name="b_rate_total" type="text" size="10" id="result"  class="total"  readonly="readonly" onchange="calculate_total('total','grand_tot')" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Hall Rental</div></th>
        <td><div align="justify">
            <input name="hall_rate" type="text" size="10" id="result6" class="total" onchange="calculate_total('total','grand_tot')" pattern="[0-9]+"/>
          </div></td>
        <th><div align="right"></div></th>
      </tr>
     </table border="0">
    <table width="322">
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th>Total Amount:</th>
      </tr>
       <tr>
        <th width="148"><div align="justify">Cold Drinks</div></th>
        <td width="46"><div align="justify">
            <input name="drinks" type="text" size="5" id="op2" pattern="[0-9]+" onchange="calc('op2','op3','result1'); calculate_total('total','grand_tot');"/>
          </div></td>
        <th width="27"><div align="justify">Rate:</div></th>
        <td width="30"><div align="justify">
            <input name="drinks_rate" type="text" size="5" id="op3" pattern="[0-9]+" onchange="calc('op2','op3','result1'); calculate_total('total','grand_tot');"/>
          </div></td>
        <td width="47"><div align="right">
            <input name="drinks_total" type="text" size="7"  readonly="readonly" id="result1" class="total" onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Tea</div></th>
        <td><div align="justify">
            <input name="tea" type="text" size="5" id="op4" pattern="[0-9]+" onchange="calc('op4','op5','result2'); calculate_total('total','grand_tot');"/>
          </div></td>
        <th width="27"><div align="justify">Rate:</div></th>
        <td width="30"><div align="justify">
            <input name="tea_rate" type="text" size="5" id="op5" pattern="[0-9]+" onchange="calc('op4','op5','result2'); calculate_total('total','grand_tot');"/>
          </div></td>
        <td width="47"><div align="right">
            <input name="tea_total" type="text" size="7"  readonly="readonly" id="result2" class="total"   onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Mineral Water</div></th>
        <td><div align="justify">
            <input name="water" type="text" size="5"  id="op6" pattern="[0-9]+" onchange="calc('op6','op7','result3'); calculate_total('total','grand_tot');"/>
          </div></td>
        <th width="27"><div align="justify">Rate:</div></th>
        <td width="30"><div align="justify">
            <input name="water_rate" type="text" size="5" id="op7" pattern="[0-9]+" onchange="calc('op6','op7','result3'); calculate_total('total','grand_tot');"/>
          </div></td>
        <td width="47"><div align="right">
            <input name="water_total" type="text" size="7" readonly="readonly"  id="result3" class="total" onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
       <tr>
        <th height="24"><div align="justify">Table Setting</div></th>
        <td><div align="justify">
            <input name="tset" type="text" size="5" id="op8" pattern="[0-9]+" onchange="same_amount('op8','op','g_grn'); calc1('op8','op9','result4'); calculate_total('total','grand_tot');"/>
          </div></td>
        <th width="27"><div align="justify">Rate:</div></th>
        <td width="30"><div align="justify">
            <input name="tset_rate" type="text" size="5" pattern="[0-9]+" id="op9" onchange="calc1('op8','op9','result4'); calculate_total('total','grand_tot');"/>
          </div></td>
        <td width="47"><div align="right">
            <input name="tset_total" readonly="readonly" type="text" size="7"  id="result4" class="total" onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
     </table>
    <table width="265" border="0">
       <tr>
        <th width="150"><div align="justify">Extras</div></th>
        <td width="105"><div align="justify">
            <input name="extra" type="text" size="10" id="result5" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
     </table>
    <table width="324" border="0">
       <tr>
        <th width="100"><div align="justify">Tax</div></th>
        <td width="51"><div align="justify">
            <input name="tax" type="text" size="5" pattern="[0-9]+"  id="tax" onchange="tax_calc(); calculate_total('total','grand_tot');"/>
          </div></td>
        <td width="60"><div align="justify">
            <input name="tax_p" type="checkbox" id="tax_p" />
            %</div></td>
        <td width="51"><div align="justify">
            <input size="3" type="text" id="percent_tax111" readonly="readonly"/>
          </div></td>
        <td width="44"><div align="justify">
            <input name="tax_percent" type="text" size="5" class="total" id="tax_tot" onchange="calculate_total('total','grand_tot')" readonly="readonly"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Service Charges</div></th>
        <td><div align="justify">
            <input name="ser_charge" id="ser_charge" type="text" size="5" pattern="[0-9]+" onchange=" service_calc(); calculate_total('total','grand_tot');" />
          </div></td>
        <td width="60"><div align="justify">
            <input name="ser_p" type="checkbox" id="ser_p" />
            %</div></td>
        <td width="51"><div align="justify">
            <input name="percent_sevice" size="3" type="text" id="percent_service" readonly="readonly"/>
          </div></td>
        <td width="44"><div align="justify">
            <input name="ser_percent" type="text" size="5" class="total" id="ser_tot" onchange="calculate_total('total','grand_tot')" readonly="readonly"/>
          </div></td>
      </tr>
     </table>
    <table width="231" border="0">
       <tr>
        <th width="153"><div align="justify">Stage Amount</div></th>
        <td width="68"><div align="justify">
            <input name="stage_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Sound Amount</div></th>
        <td><div align="justify">
            <input name="sound_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Video Amount</div></th>
        <td><div align="justify">
            <input name="vid_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Misc Amount</div></th>
        <td><div align="justify">
            <input name="misc_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Discount</div></th>
        <td><div align="justify">
            <input name="discount" type="text" size="10" id="discount" pattern="[0-9]+" onchange="calculate_discount('discount','grand_tot')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify" class="red1">Grand Total</div></th>
        <td><div align="justify">
            <input name="grand_total" type="text" size="10" id="grand_tot" readonly="readonly"/>
          </div></td>
      </tr>
     </table>
    <table width="277">
       <tr>
        <td width="17"><div align="justify"></div></td>
        <th width="88"><div align="justify">Advance Rs.</div></th>
        <th width="39"><div align="justify">CR #</div></th>
        <th width="113"><div align="justify">Enter Amount:</div></th>
      </tr>
       <!--<input name="password" style="list-style-type:circle"  id="password" value="<?php echo $password; ?>" />-->
       <input name="password" type="hidden" id="password" value="<?php echo $password; ?>" />
       <tr>
        <th><div align="justify">CF:</div></th>
        <td><div align="justify">
            <input name="adv1" type="text" size="10" pattern="[0-9]+" id="adv1"  class="advance" onchange=" generate_cr('ins1'); calculate_total('advance','advance_total'); recieved_amount('adv1','tot_rec');"/>
          </div></td>
        <td><div align="justify">
            <input name="adv_cr1" type="text" size="5" value="" readonly="readonly" id="ins1" />
          </div></td>
        <td align="right"><input readonly="readonly" name="money" type="text" size="10" id="rec_money" onchange=" pass_validation(); recieved_amount('rec_money','tot_rec'); diff('grand_tot','tot_rec','net'); "/></td>
      </tr>
       <tr>
        <th><div align="justify">CF:</div></th>
        <td><div align="justify">
            <input name="adv2" readonly="readonly" type="text" size="10" pattern="[0-9]+" id="adv2"   class="advance" onchange=" generate_cr('ins2'); calculate_total('advance','advance_total'); recieved_amount('adv2','tot_rec');"/>
          </div></td>
        <td><div align="justify">
            <input name="adv_cr2" type="text" size="5" value="" readonly="readonly" id="ins2" />
          </div></td>
        <th><div align="justify">Total Received</div></th>
      </tr>
       <tr>
        <th><div align="justify">CF:</div></th>
        <td><div align="justify">
            <input name="adv3" readonly="readonly" type="text" size="10" pattern="[0-9]+" id="adv3"   class="advance" onchange=" generate_cr('ins3'); calculate_total('advance','advance_total'); recieved_amount('adv3','tot_rec');"/>
          </div></td>
        <td><div align="justify">
            <input name="adv_cr3" type="text" size="5" value="" readonly="readonly" id="ins3" />
          </div></td>
        <td align="right"><input name="recieved_total" type="text" size="10" readonly="readonly" id="tot_rec" onchange="diff('grand_tot','tot_rec','net')"/></td>
      </tr>
     </table>
    <table width="292">
       <tr>
        <th width="113"><div align="justify">Advance:</div></th>
        <td width="167"><input name="adv_total" type="text" size="10" readonly="readonly" id="advance_total" onchange="diff('grand_tot','tot_rec','net')" /></td>
      </tr>
       <tr>
        <th width="113" align="left"><div align="justify">Payment Mode:</div></th>
        <td width="167" align="left"><select name="pay_mode" id="pay_mode" onchange="payment_mode(this.value)">
            <option value="">Select Mode</option>
            <option value="N">None</option>
            <option value="C">Cash</option>
            <option value="Q">Cheque</option>
            <option value="R">Credit Card</option>
          </select></td>
      </tr>
     </table>
    <div id="mode"></div>
  </div>
   <div id="mid3column_box">
   <table border="0">
   <tr>
    <td><div align="justify">
       
       <!--<h2><strong>Add Dishes in Menu</strong></h2>-->
   <form id="form" name="form" action="" method="post">
    <div id="suggest"><strong>New Dish:</strong>
       <input id="country" name="country" onkeyup="suggest(this.value);" size="20" type="text"/>
       <input type="submit" value="Add" onClick="myFunction()">
       <div id="suggestions" class="suggestionsBox" style="display: none;"> <img style="position: relative; top: -12px; left: 120px;" src="images/arrow.png" alt="upArrow" />
        <div id="suggestionsList" class="suggestionList"></div>
      </div>
     </div>
  </form>
   <p id="myDiv"></p>
   <script>
function myFunction()
{
//var htmlSelect = document.getElementById("menu_order1");//HTML select box
//var optionValue=document.getElementById('country').value;
			
var txt = document.getElementById('country').value;

var xmlhttp_1;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp_1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp_1=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp_1.onreadystatechange=function()
  {
  if (xmlhttp_1.readyState==4 && xmlhttp_1.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp_1.responseText;
    }
  }
xmlhttp_1.open("POST","ajax/add_manual_dish.php?country="+txt,true);
xmlhttp_1.send();
}
</script> 
 </div>
</td>
</tr>
<tr>
   <td><div align="justify">
       <select name="dishes" id="dishes" size="30">
        <?php
$query5 ="SELECT * FROM dish_master_tab ORDER BY DISH_NAME ASC";
   $result5 = mysql_query($query5);
while($men1=mysql_fetch_array($result5))
{
?>
        <option value="<?php echo $men1['DISH_NAME'];?>"><?php echo $men1['DISH_NAME'];?></option>
        <?php } ?>
      </select>
     </div></td>
 </tr>
<tr>
   <td height="26"><div align="justify">
       <input name="add_dish" type="button" value="Add Dish" onclick="menu_detail();" style="background: #F30; color:#000; font-weight:700;"/>
     </div></td>
 </tr>
<tr>
   <td></td>
 </tr>
<tr>
   <td><h1 style=" font-size:18px; color:#F00;"> Net Payable
       <input name="net" type="text" size="10" readonly="readonly" id="net" style="font-size:22px; font-weight:900; color:#F00;"  />
     </h1></td>
 </tr>
</table>
</div>
<div  id="bottomcolumn_box">
   <p></p>
   <input name="book" type="submit" value="Book" onclick="selectAll();" style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="print" type="button" value="Print" onclick="submitMe1(this);"  style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="print_bill" type="button" onclick="submitMe1(this);"  value="Print Out Complete Bill"  style="background: #F30; color:#000; height:35px; width:auto; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="update" type="submit" value="Update" disabled="disabled"  style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="print_reference" type="button" value="Print Info" onclick="submitMe1(this);"  style="background: #F30; color:#000; height:35px; width:auto; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="search" type="button" value="Search"  style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" onclick="search_banq();"/>
   <input name="exit" type="button" value="Exit"  style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" onclick="window.location.href='banq_order_master_reception.php'" />
 </div>
</form>
</div>
<?php
}

else // condtion fails then this portion
{//echo 'second';
//echo "asif";
//exit;
		 //echo $time_from;
		 //echo "andy candy ".$time_to;
?>
<div id="templatemo_content">
   <p><span class="red">Function	Booking</span></p>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <?php
		$query1234 = "SELECT * FROM banq_master_tab WHERE BANQ_ID='$id'";
        $result1234 = mysql_query($query1234);
		$row11=mysql_fetch_array($result1234)
		?>
   <span class="red"><?php echo $row11['BANQ_NAME'];if($time_from=="12:00:00" && $time_to =="17:00:00") { echo '&nbsp;(LUNCH)';}
 else
 {
 echo '&nbsp;(DINNER)';
 }?></span>
   <h1 class="style1"  align="left" style=" font-size:12px;"><?php echo $todayy." ".$day; ?></h1>
   <form name="form2" id="form2" action="ajax/banq_order_book.php" method="post" onsubmit="return validateForm()">
   <?php
		while($row=mysql_fetch_array($result2))
			{
		 
      $order_id = $row['ORDER_NO'];
      
			}
			//echo $order_id;
			//exit;
			?>
   <div align="center">
    <table border="2">
       <?php

$q1="SELECT distinct(BOOKING_STATUS) FROM banq_order_master WHERE ORDER_NO='$order_id'";
$r1=mysql_query($q1);
while($ans=mysql_fetch_array($r1))
{
	$check_status=$ans['BOOKING_STATUS'];
	//echo $check_status;
}
if($check_status=="C")
{
?>
       <tr>
        <td><input name="book_status" type="radio" value="C" checked="checked"/>
           Cancelled
           &nbsp;
           <input name="book_status" type="radio" value="T" />
           Tentative
           &nbsp;
           <input name="book_status" type="radio" value="B" />
           Booked</td>
      </tr>
       <?php }
 else if($check_status=="T")
{
?>
       <tr>
        <td><input name="book_status" type="radio" value="C" />
           Cancelled
           &nbsp;
           <input name="book_status" type="radio" value="T"  checked="checked"/>
           Tentative
           &nbsp;
           <input name="book_status" type="radio" value="B" />
           Booked</td>
      </tr>
       <?php }
 else if($check_status=="B")
{
?>
       <tr>
        <td><input name="book_status" type="radio" value="C" />
           Cancelled
           &nbsp;
           <input name="book_status" type="radio" value="T"  />
           Tentative
           &nbsp;
           <input name="book_status" type="radio" value="B" checked="checked" />
           Booked</td>
      </tr>
       <?php } ?>
     </table>
  </div>
   <div  id="leftcolumn_box">
    <table width="235" border="0">
       <tr>
        <th width="86"><div align="justify">Function Id</div></th>
        <input type="hidden" id="testing" value="" />
        <td width="139"><div align="justify">
            <input name="order_i" id="order_i" type="text" size="4" value="<?php echo $order_id; ?>" readonly/>
          </div></td>
      </tr>
       <tr>
        <th width="86"><div align="justify">Booking Date</div></th>
        <td width="139"><div align="justify">
            <?php
$q2="SELECT distinct(BOOKING_DATE) FROM banq_order_master WHERE ORDER_NO='$order_id'";
$r2=mysql_query($q2) or die('Query Failed');
while($ans1=mysql_fetch_array($r2))
{
$tdate = $ans1['BOOKING_DATE'];
?>
            <input name="today" type="hidden" id="today" value="<?php echo $tdate; ?>" />
            <input type="text" size="10" name="date" id="date" value="<?php echo $ans1['BOOKING_DATE']; ?>" 
            onchange="date_check(this.value);"/>
           <!--<input type="text" name="date" style="border:groove" id="date" value="<?php echo $date=date("Y-m-d", $tdate); ?>" onchange="search_slot();"/>-->
          
          
          
          
          </div></td>
      </tr>
       <tr>
        <?php } ?>
        <th width="86"><div align="justify">Function*</div></th>
        <td width="139" align="left"><div align="justify">
            <select id="func" name="func">
              <?php
		$q3="SELECT distinct(FUNCTION_TYPE_ID) FROM banq_order_master WHERE ORDER_NO='$order_id'";
		$r3=mysql_query($q3) or die('Query Failed');
		while($ans2=mysql_fetch_array($r3))
		{
			$func_id=$ans2['FUNCTION_TYPE_ID'];
		}
			$q3_1="SELECT * FROM function_type_tab WHERE FUNCTION_TYPE_ID ='$func_id' ";
	 		$r3_1=mysql_query($q3_1) or die('Query Failed');
			$num1 = mysql_num_rows($r3_1);
			$j=0;
	  while($j < $num1)
	  {
		  $foodid1 = mysql_result($r3_1,$j, "FUNCTION_TYPE_ID" );
		  $food_detail1 = mysql_result($r3_1,$j, "FUNCTION_TYPE_NAME" );
		  echo '<option value="'.$foodid1.'">'.$food_detail1.'</option>';
		  $j++;
	  }  
		
      $query = "SELECT * FROM function_type_tab WHERE FUNCTION_TYPE_ID !='$func_id' ORDER BY FUNCTION_TYPE_NAME ASC";
	  $result = mysql_query($query) or die('Not Found:'.mysql_error());
	  $num = mysql_num_rows($result);
	  $i=0;
	  while($i < $num)
	  {
		  $foodid = mysql_result($result,$i, "FUNCTION_TYPE_ID" );
		  $food_detail = mysql_result($result,$i, "FUNCTION_TYPE_NAME" );
		  echo '<option value="'.$foodid.'">'.$food_detail.'</option>';
		  $i++;
	  }  // while loop ends here
	  ?>
            </select>
          </div></td>
      </tr>
       <tr>
        <th width="86"><div align="justify">Function Date</div></th>
        <td width="139"><div align="justify">
            <?php
	   $qq = "SELECT distinct(FUNCTION_DATE) FROM banq_order_master WHERE ORDER_NO='$order_id'";
	  $rr = mysql_query($qq) or die('Not Found:'.mysql_error());
	  $num = mysql_num_rows($rr);
	  if(mysql_num_rows($rr)== 1)
	  {
	  while($aa=mysql_fetch_array($rr))
	  {
		  ?>
            <input type="hidden" name="f_date" id="f_date" value="<?php echo $aa['FUNCTION_DATE']; ?>"/>
            <input type="text" size="10" name="date1"  id="date1" value="<?php echo $date_r = $aa['FUNCTION_DATE']; ?>" onchange="shift_function_date(); hall_availability()"/>
            <input type="hidden" name="shift_func" id="shift_func" value=""/>
            <input type="hidden" name="date11"  id="date11" value="<?php echo $date_r = $aa['FUNCTION_DATE']; ?>"/>
            <input type="hidden" size="10" name="date2"  id="date2" value="" onchange="addhall();"/>
            <?php
      } 
	  $add_date="";
	  }
	 else if(mysql_num_rows($rr)== 2)
	  {
	  while($aa=mysql_fetch_array($rr))
	  {
		  
		$array_result[] = $aa['FUNCTION_DATE'];
		  
	  }
		  ?>
            <input type="hidden" name="f_date" id="f_date" value="<?php echo $array_result[0]; ?>"/>
            <input type="text" size="10" name="date1" id="date1" value="<?php echo $date_r= $array_result[0]; ?>"  onchange="date_check1(this.value);"/>
            <?php
	  
	  ?>
            <input type="text" size="10" name="date2" id="date2" value="<?php echo $add_date= $array_result[1]; ?>" onchange="addhall();"/>
            <?php
	  }
	 
	  ?>
          </div></td>
      </tr>
       <tr>
        <th width="86"><div align="justify">Function Time</div></th>
        <td width="139"><div align="justify">
            <input name="time_from" type="hidden" id="tim" value="<?php echo $time_from; ?>" />
            <select id="func_time" name="time" onchange="hall_availability()" />
            
            <?php
         $query20 = "SELECT TIME_FROM,TIME_TO FROM banq_order_master WHERE ORDER_NO='$order_id'";
            $result20 = mysql_query($query20)or die('Not Found:'.mysql_error());
			while($row20= mysql_fetch_array($result20))
			{
				$time_from=$row20['TIME_FROM'];
				$time_to=$row20['TIME_TO'];
			}
			 if($time_from=="12:00:00" && $time_to =="17:00:00") {?>
            <option value="lunch">Lunch</option>
            <option value="dinner">Dinner</option>
            <?php } else if($time_from=="18:00:00" && $time_to =="23:00:00") { ?>
            <option value="dinner">Dinner</option>
            <option value="lunch">Lunch</option>
            <?php } ?>
            </select>
          </div></td>
      </tr>
       <tr>
            
        <th width="86"><div align="justify">Hall</div></th>
        <td width="139"><div align="justify">
  		
        <!-- /////////////////////////////////////////////////////////////////////////   Changes January 26, 2015 -->
            <input name="banq_old_id" type="hidden" id="banq_old_id" value="<?php echo $id; ?>" />
    	<!-- /////////////////////////////////////////////////////////////////////////   Changes January 26, 2015 -->
        
                 <select id="banquet" name="banquet" onchange="hall_availability()">
              <?php
         $query123 = "SELECT banq_master_tab.BANQ_ID, banq_master_tab.BANQ_NAME FROM banq_master_tab,banq_order_master 
		 WHERE banq_order_master.ORDER_NO = '$order_id' AND banq_order_master.FUNCTION_DATE = '$date_r' AND banq_order_master.BANQ_ID='$id'
		  AND  banq_master_tab.BANQ_ID='$id'";
            $result123 = mysql_query($query123);
			$row1=mysql_fetch_array($result123)
			?>
              <option value="<?php echo $row1['BANQ_ID']; ?>"><?php echo $row1['BANQ_NAME']; ?></option>
              <?php
			
         	$query12 = "SELECT * FROM banq_master_tab";
            $result12 = mysql_query($query12);
			while($row=mysql_fetch_array($result12))
			{
			if($row['BANQ_NAME']!=$row1['BANQ_NAME']){
			?>
              <option value="<?php echo $row['BANQ_ID']; ?>"><?php echo $row['BANQ_NAME']; ?></option>
              <?php
				}
			}        
        ?>
              <input type="hidden" id="banq_hidden" name="banq_hidden" value="<?php echo $row1['BANQ_ID']; ?>">
            </select>
          </div></td>
      </tr>
       <tr>
        <th width="86"><div align="justify">Additional Hall</div></th>
        <td width="139"><div align="justify"> </div>
           <p align="justify">
            <?php

            $query = "SELECT * FROM banq_master_tab WHERE banq_master_tab.BANQ_ID NOT IN(SELECT BANQ_ID FROM banq_order_master WHERE BOOKING_STATUS='B' AND FUNCTION_DATE='$date' AND TIME_FROM='$time_from' AND ORDER_NO!='$order_id') AND banq_master_tab.BANQ_ID != '$id'";
			
            $result = mysql_query($query);
			
            $num = mysql_num_rows($result);
            $i=0;
            while($i < $num)
            {
				
                $o_id = mysql_result($result,$i, "BANQ_ID" );
				$o_name = mysql_result($result,$i, "BANQ_NAME" );
				$q4="SELECT distinct(BANQ_ID) FROM banq_order_master WHERE ORDER_NO='$order_id' AND BANQ_ID = '$o_id' AND FUNCTION_DATE='$date_r'";
				$r4=mysql_query($q4) or die ("Query Failed");
				while($ans3=mysql_fetch_array($r4))
				{
				if($o_id==$ans3['BANQ_ID'])
				{
				?>
          
           <div align="justify">
            <input type="checkbox" name="add_hall[]" value="<?php echo $o_id; ?>" id="add_hall" checked="checked" />
            <?php echo $o_name; ?> </div>
           <?php
				}}
				$num4= mysql_num_rows($r4);
				if(!$num4)
				{
				?>
           <div align="justify">
            <input type="checkbox" name="add_hall[]" value="<?php echo $o_id; ?>" id="add_hall" />
            <?php echo $o_name; ?>
            <?php
				}
				

            $i++;
            }  // while loop ends here
                
        ?>
          </div></td>
      </tr>
     </table>
    <div id="add_hall_div">
       <?php
          if($add_date != "")
		  {
		  ?>
       <table width="234">
        <tr>
           <th width="85"><div align="justify">Hall on Second date</div></th>
           <td width="137" style="border:ridge;"><div align="justify"> </div>
            <p align="justify">
               <?php

            $query = "SELECT * FROM banq_master_tab WHERE banq_master_tab.BANQ_ID NOT IN(SELECT BANQ_ID FROM banq_order_master WHERE BOOKING_STATUS='B' AND FUNCTION_DATE='$add_date' AND TIME_FROM='$time_from' AND ORDER_NO!='$order_id')";
			
            $result = mysql_query($query);
			
            $num = mysql_num_rows($result);
            $i=0;
            while($i < $num)
            {
				
                $o_id = mysql_result($result,$i, "BANQ_ID" );
				$o_name = mysql_result($result,$i, "BANQ_NAME" );
				$q4="SELECT distinct(BANQ_ID) FROM banq_order_master WHERE ORDER_NO='$order_id' AND BANQ_ID = '$o_id' AND FUNCTION_DATE='$add_date'";
				$r4=mysql_query($q4) or die ("Query Failed");
				while($ans3=mysql_fetch_array($r4))
				{
				if($o_id==$ans3['BANQ_ID'])
				{
				?>
             
            <div align="justify">
               <input type="checkbox" name="add_hall1[]" value="<?php echo $o_id; ?>" id="add_hall1" checked="checked" />
               <?php echo $o_name; ?> </div>
            <?php
				}}
				$num4= mysql_num_rows($r4);
				if(!$num4)
				{
				?>
            <div align="justify">
               <input type="checkbox" name="add_hall1[]" value="<?php echo $o_id; ?>" id="add_hall1" />
               <?php echo $o_name; ?>
               <?php
				}
				

            $i++;
            }  // while loop ends here
                
        ?>
             </div></td>
         </tr>
      </table>
       <?php } 
		  
		  ?>
     </div>
    <table width="235" border="0">
       <?php
$q5="SELECT GUEST_NAME, GUEST_ADDRESS, CONTACT_PERSON, CONTACT_NO,CONTACT_NO1,CONTACT_NO2, TOTAL_CHARGES_BANQ, PAYMENT_MODE_BANQ,
CHEQUE_NO_BANQ, BANK_BANQ, CREDIT_CARD_NO_BANQ, DIFFERENCE_AMOUNT, DISCOUNT_DETAIL, guest_expected,
guest_guranteed,function_incharge, CNIC, taste, SPL_notes, notes, add_notes, Stage_no, Sound, Video, Misc, b_rate, b_rate_total, 
Drink_no, Drink_rate, Drink_rate_total, tea_no, tea_rate, tea_rate_total, water_no, water_rate, water_rate_total,
tableset_no, tableset_rate, tableset_rate_total, extra, tax, tax_total, service, service_total, stage_amount, sound_amount,
video_amount, misc_amount, grand_total,total_received, instalment1, instalment2, instalment3, hall_adv, adv_total
FROM banq_order_master WHERE ORDER_NO='$order_id' AND BANQ_ID='$id'";
$r5=mysql_query($q5) or die('Query Failed');
$ans5=mysql_fetch_array($r5);
//success
?>
       
        <th width="88"><div align="justify">Guest Expected</div></th>
        <td width="137"><div align="justify">
            <input type="text" size="10" name="guest_expected" id="g_exp" value="<?php echo $ans5['guest_expected'];?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Guest Guranted</div></th>
        <td><div align="justify">
            <input name="guest_gaurante" type="text" size="10" id="g_grn" value="<?php echo $ans5['guest_guranteed']; ?>" onchange="same_amount('g_grn','op','op8'); calc1('op','op1','result')"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Function Incharge</div></th>
        <td><div align="justify">
            <input name="incharge" type="text" size="10"  value="<?php echo $ans5['function_incharge']; ?>"/>
          </div></td>
      </tr>
     </table>
    <!--success-->
    <table width="325" border="0">
       <tr>
        <th width="90"><div align="justify">Select Menu</div></th>
        <td width="162"><div align="justify">
            <select name="menu" id="menu_num" onchange="menu_load();">
              <?php
	/*$query = "SELECT * FROM order_menu WHERE menu_id = '$order_id'";
    $res = mysql_query($query);
	$menu_id = mysql_result($res,0 , "menu_id" );
	$menu_name = mysql_result($res,0 , "menu_name" );*/
	?>
              <option value="" >Your Menu</option>
              <?php
$query4 ="SELECT * FROM order_menu";
$result4 = mysql_query($query4);
while($men=mysql_fetch_array($result4))
{
/*if($men != $menu_name)
{*/
?>
              <option value="<?php echo $men['menu_name'];?>" ><?php echo $men['menu_name'];?></option>
              <?php 
} 
//}
?>
            </select>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Order Dishes</div></th>
        <td><!--success-->
           
           <select style="font-size:12px; width:200px;" name="menu_order[]" id="menu_order1" size="9" multiple="multiple">
            <?php
//echo "asif";
//echo "Asif".$order_id;
//exit;
$q6="SELECT DISH_ID FROM banq_order_history_tab WHERE ORDER_NO= '$order_id'";
	$r6=mysql_query($q6) or die('Insertion Failed'.mysql_error());
	while($r6_1= mysql_fetch_array($r6))
	{
	$dish_id=$r6_1['DISH_ID'];
	//exit;
	$q7="SELECT DISH_NAME FROM dish_master_tab WHERE DISH_ID='$dish_id'";
	$r7=mysql_query($q7) or die('Query Failed'.mysql_error());
	while($r7_1= mysql_fetch_array($r7))
	{
	$dish_item_name= $r7_1['DISH_NAME'];?>
            <option value="<?php echo $dish_item_name; ?>"><?php echo $dish_item_name; ?></option>
            <?php
	}}
	


 ?>
          </select>
           <?php
$q6="SELECT DISH_ID FROM banq_order_history_tab WHERE ORDER_NO = '$order_id'";
	$r6=mysql_query($q6) or die('Insertion Failed'.mysql_error());
	while($r6_1= mysql_fetch_array($r6))
	{
	$dish_id=$r6_1['DISH_ID'];
	$q7="SELECT DISH_NAME FROM dish_master_tab WHERE DISH_ID='$dish_id'";
	$r7=mysql_query($q7) or die('Query Failed'.mysql_error());
	while($r7_1= mysql_fetch_array($r7))
	{
	$dish_item_name= $r7_1['DISH_NAME'];?>
           <input type="hidden" name="menu_order1[]" value="<?php echo $dish_item_name; ?>">
           <?php
	}}
	


 ?></td>
      </tr>
       <tr>
        <th></th>
        <td><input name="del_dish" type="button" value="Delete Dish" onclick="del_dish_order();" style="background: #F30; color:#000; font-weight:700;"/></td>
      </tr>
     </table>
    <p>&nbsp;</p>
  </div>
   <div id="mid1column_box">
    <table width="229" height="368" border="0">
       <tr>
        <th><div align="justify">Host*</div></th>
        <td><div align="justify">
            <textarea name="host_name" pattern="[A-Z a-z]+" id="host" cols="15"><?php echo $ans5['GUEST_NAME']?></textarea>
            <!--<input name="host_name" type="text" size="10" pattern="[A-Z a-z]+" id="host" value="<?php echo $ans5['GUEST_NAME']?>" />--> 
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Address</div></th>
        <td><div align="justify">
            <textarea name="address" cols="15" ><?php echo $ans5['GUEST_ADDRESS']?></textarea>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Tele No.*</div></th>
        <td><div align="justify">
            <input name="telephone" type="text" size="15" pattern="[0-9]+" id="tel" value="<?php echo $ans5['CONTACT_NO']; ?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Contact (1)</div></th>
        <td><div align="justify">
            <input name="telephone1" type="text" size="15" pattern="[0-9]+" id="tel1" value="<?php echo $ans5['CONTACT_NO1']; ?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Contact (2)</div></th>
        <td><div align="justify">
            <input name="telephone2" type="text" size="15" pattern="[0-9]+" id="tel2" value="<?php echo $ans5['CONTACT_NO2']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">CNIC*</div></th>
        <td><div align="justify">
            <input name="cnic" type="text" size="10" pattern="[1-4]{1}[0-9]{4}(-)?[0-9]{7}(-)?[0-9]{1}" maxlength="15" id="cnic" value="<?php echo $ans5['CNIC']?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Care Of</div></th>
        <td><div align="justify">
            <input name="care_person" type="text" size="10" pattern="[A-Z a-z]+" value="<?php echo $ans5['CONTACT_PERSON']?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Food to be</div></th>
        <?php 
	$f_taste=$ans5['taste'];
	if($f_taste == "Spicy")
	{
	
	?>
        <td><div align="justify">
            <p>
              <input name="food_taste" type="radio" value="Spicy" />
              Spicy</p>
            </p>
            <p>
              <input name="food_taste" type="radio" value="Moderate Spicy" />
              Moderate Spicy</p>
            </p>
            <p>
              <input name="food_taste" type="radio" value="Less Spicy" checked="checked"  />
              Less Spicy</p>
          </div></td>
        <?php } 
	else if($f_taste == "Moderate Spicy")
	{
	
	?>
        <td><div align="justify">
            <p>
              <input name="food_taste" type="radio" value="Spicy" />
              Spicy</p>
            </p>
            <p>
              <input name="food_taste" type="radio" value="Moderate Spicy" checked="checked" />
              Moderate Spicy</p>
            </p>
            <p>
              <input name="food_taste" type="radio" value="Less Spicy" />
              Less Spicy</p>
          </div></td>
        <?php } 
	else if($f_taste == "Less Spicy")
	{
	
	?>
        <td><div align="justify">
            <p>
              <input name="food_taste" type="radio" value="Spicy" />
              Spicy</p>
            </p>
            <p>
              <input name="food_taste" type="radio" value="Moderate Spicy"  />
              Moderate Spicy</p>
            </p>
            <p>
              <input name="food_taste" type="radio" value="Less Spicy" checked="checked" />
              Less Spicy</p>
          </div></td>
        <?php } ?>
      </tr>
       <tr>
        <th><div align="justify">SPL Notes</div></th>
        <td><div align="justify">
            <input name="notes" type="text" size="10" value="<?php echo $ans5['SPL_notes'];?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Stage No.</div></th>
        <td><div align="justify">
            <input name="stage_num" type="text" size="10" pattern="[0-9]+" value="<?php echo $ans5['Stage_no'];?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Sound</div></th>
        <td><div align="justify">
            <input name="sound" type="text" size="10" value="<?php echo $ans5['Sound'];?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Video</div></th>
        <td><div align="justify">
            <input name="video" type="text" size="10" value="<?php echo $ans5['Video'];?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Miscellenous</div></th>
        <td><div align="justify">
            <input name="misc" type="text" size="10" value="<?php echo $ans5['Misc'];?>" />
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Notes</div></th>
        <td><div align="justify">
            <textarea name="extra_notes" cols="15" rows="5" ><?php echo $ans5['notes'];?></textarea>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Additional Notes</div></th>
        <td><div align="justify">
            <textarea name="add_notes" cols="15" rows="5" ><?php echo $ans5['add_notes'];?></textarea>
          </div></td>
      </tr>
       <?php
$qq0= "SELECT SCHEME_ID, SCHEME_QTY FROM banq_color_scheme_history WHERE FUNCTION_ID= '$order_id'";
$rr0 = mysql_query($qq0) or die ('Query failed!'.mysql_error()); 
if(mysql_num_rows($rr0) != 0)
{
?>
       <tr>
        <th><div align="justify">Theme</div></th>
        <td><div align="justify">
            <select name="color_scheme1" id="color_scheme1" onchange="color_scheme(this.value);" >
              <?php
while($cc0 = mysql_fetch_array($rr0))
{
	$s_id = $cc0['SCHEME_ID'];
	$qq11 = "SELECT SCHEME_NAME FROM banq_color_scheme WHERE SCHEME_ID = '$s_id'";
	  $rr11 = mysql_query($qq11) or die ('Query failed!'.mysql_error());
	$cc11 = mysql_fetch_array($rr11);
	?>
              <option value="<?php echo $cc0['SCHEME_ID'];?>"> <?php echo $cc11['SCHEME_NAME'];?></option>
              <?php
}
      $qq= "SELECT SCHEME_ID, SCHEME_NAME, SCHEME_QTY FROM banq_color_scheme WHERE SCHEME_ID != '$s_id'";
	  $rr = mysql_query($qq) or die ('Query failed!'.mysql_error());
while($cc = mysql_fetch_array($rr))
{
	?>
              <option value="<?php echo $cc['SCHEME_ID'];?>"> <?php echo $cc['SCHEME_NAME'];?></option>
              <?php
}?>
            </select>
          </div></td>
      </tr>
     </table>
    <div id="mode1">
       <table>
        <?php	
	  $qq= "SELECT SCHEME_QTY FROM banq_color_scheme WHERE SCHEME_ID = '$s_id' ";
	  $rr = mysql_query($qq) or die ("Query failed!".mysql_error());
	  $total =0;//defined globally for $available
	  while($cc = mysql_fetch_array($rr))
		{ 
echo $total=$cc['SCHEME_QTY'];
?>
        <tr>
           <th align="justify" >Total qty:</th>
           <td><input type="text" name="t_qty" id="t_qty" value="<?php echo $cc['SCHEME_QTY']; ?>"  readonly="readonly"/></td>
         </tr>
        <?php
}
// $total is returning zero.....? check it
//echo $total;exit;
 $qq1= "SELECT SUM(SCHEME_QTY) FROM banq_color_scheme_history WHERE SCHEME_ID = '$s_id' AND FUNCTION_DATE='$date_r' ";
	  $rr1 = mysql_query($qq1) or die ("Query failed!".mysql_error());
	  while($cc1 = mysql_fetch_array($rr1))
	  {
		  $reserved = $cc1['SUM(SCHEME_QTY)'];
		  $available=$total- $reserved;
		  ?>
        <tr>
           <th align="justify">Available qty:</th>
           <td ><input type="text" name="av_qty" id="av_qty"  value="<?php echo $available;?>" readonly="readonly"/></td>
         </tr>
        <?php
	  }
	  
      $qq1= "SELECT SCHEME_QTY FROM banq_color_scheme_history WHERE FUNCTION_ID = '$order_id' ";
	  $rr1 = mysql_query($qq1) or die ("Query failed!".mysql_error());
	  while($cc1 = mysql_fetch_array($rr1))
	  {
		  $reserved1 = $cc1['SCHEME_QTY'];
		  ?>
        <tr>
           <th align="justify">Alloted qty:</th>
           <td ><input type="text" name="at_qty" id="at_qty" value="<?php echo $reserved1;?>" onchange="greater_qty('at_qty','av_qty')" /></td>
         </tr>
        <?php } ?>
      </table>
     </div>
    <?php } 
else
{
?>
    <tr>
       <th><div align="justify">Theme</div></th>
       <td><div align="justify">
           <select name="color_scheme1" id="color_scheme1" onchange="color_scheme(this.value);" >
            <option value="">Select Theme</option>
            <?php

      $qq= "SELECT SCHEME_ID, SCHEME_NAME, SCHEME_QTY FROM banq_color_scheme";
	  $rr = mysql_query($qq) or die ('Query failed!'.mysql_error());
while($cc = mysql_fetch_array($rr))
{
	?>
            <option value="<?php echo $cc['SCHEME_ID'];?>"> <?php echo $cc['SCHEME_NAME'];?></option>
            <?php
}?>
          </select>
         </div></td>
     </tr>
    </table>
    <div id="mode1"> </div>
    <?php } ?>
  </div>
   <div id="mid2column_box">
    <table width="252" border="0" >
       <tr>
        <th width="93"><div align="justify">No.of Person</div></th>
        <td width="67"><div align="justify">
            <input type="text" size="10" name="person" id="op" onchange="calc1('op','op1','result'); same_amount('op','g_grn','op8'); calculate_total('total','grand_tot');" pattern="[0-9]+" value="<?php echo $ans5['guest_guranteed']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">B. rate</div></th>
        <td><div align="justify">
            <input name="b_rate" type="text" size="10" id="op1" onchange="calc('op','op1','result'); calculate_total('total','grand_tot');" pattern="[0-9]+" value="<?php echo $ans5['b_rate']; ?>"/>
          </div></td>
        <td width="78"><div align="justify">
            <input name="b_rate_total" type="text" size="10" id="result"  class="total"  readonly="readonly" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['b_rate_total']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Hall Rental</div></th>
        <td><div align="justify">
            <input name="hall_rate" type="text" size="10" id="result6" class="total" onchange="calculate_total('total','grand_tot')" pattern="[0-9]+" value="<?php echo $ans5['hall_adv']; ?>" />
          </div></td>
        <th><div align="right"></div></th>
      </tr>
     </table border="0">
    <table width="315">
       <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th>Total Amount:</th>
      </tr>
       <tr>
        <th width="93"><div align="justify">Cold Drinks</div></th>
        <td width="45"><div align="justify">
            <input name="drinks" type="text" size="5" id="op2" pattern="[0-9]+" onchange="calc('op2','op3','result1'); calculate_total('total','grand_tot');" value="<?php echo $ans5['Drink_no']; ?>"/>
          </div></td>
        <th width="27"><div align="justify">Rate:</div></th>
        <td width="40"><div align="justify">
            <input name="drinks_rate" type="text" size="5" id="op3" pattern="[0-9]+" onchange="calc('op2','op3','result1'); calculate_total('total','grand_tot');" value="<?php echo $ans5['Drink_rate']; ?>"/>
          </div></td>
        <td width="86"><div align="right">
            <input name="drinks_total" type="text" size="10"  readonly="readonly" id="result1" class="total" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['Drink_rate_total']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Tea</div></th>
        <td><div align="justify">
            <input name="tea" type="text" size="5" id="op4" pattern="[0-9]+" onchange="calc('op4','op5','result2'); calculate_total('total','grand_tot');" value="<?php echo $ans5['tea_no']; ?>"/>
          </div></td>
        <th width="27"><div align="justify">Rate:</div></th>
        <td width="40"><div align="justify">
            <input name="tea_rate" type="text" size="5" id="op5" pattern="[0-9]+" onchange="calc('op4','op5','result2'); calculate_total('total','grand_tot');" value="<?php echo $ans5['tea_rate']; ?>"/>
          </div></td>
        <td width="86"><div align="right">
            <input name="tea_total" type="text" size="10"  readonly="readonly"  id="result2" class="total"   onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['tea_rate_total']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Mineral Water</div></th>
        <td><div align="justify">
            <input name="water" type="text" size="5"  id="op6" pattern="[0-9]+" onchange="calc('op6','op7','result3'); calculate_total('total','grand_tot');" value="<?php echo $ans5['water_no']; ?>"/>
          </div></td>
        <th width="27"><div align="justify">Rate:</div></th>
        <td width="40"><div align="justify">
            <input name="water_rate" type="text" size="5" id="op7" pattern="[0-9]+" onchange="calc('op6','op7','result3'); calculate_total('total','grand_tot');" value="<?php echo $ans5['water_rate']; ?>"/>
          </div></td>
        <td width="86"><div align="right">
            <input name="water_total" type="text" size="10" readonly="readonly"  id="result3" class="total" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['water_rate_total']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th height="24"><div align="justify">Table Setting</div></th>
        <td><div align="justify">
            <input name="tset" type="text" size="5" id="op8" pattern="[0-9]+" onchange="calc1('op8','op9','result4'); calculate_total('total','grand_tot');" value="<?php echo $ans5['tableset_no']; ?>"/>
          </div></td>
        <th width="27"><div align="justify">Rate:</div></th>
        <td width="40"><div align="justify">
            <input name="tset_rate" type="text" size="5" pattern="[0-9]+" id="op9" onchange="calc1('op8','op9','result4'); calculate_total('total','grand_tot');" value="<?php echo $ans5['tableset_rate']; ?>"/>
          </div></td>
        <td width="86"><div align="right">
            <input name="tset_total" type="text" size="10" readonly="readonly"  id="result4" class="total" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['tableset_rate_total']; ?>"/>
          </div></td>
      </tr>
     </table>
    <table width="221" border="0">
       <tr>
        <th width="97"><div align="justify">Extras</div></th>
        <td width="114"><div align="justify">
            <input name="extra" type="text" size="10" id="result5" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['extra']; ?>"/>
          </div></td>
      </tr>
     </table>
    <table width="324" border="0">
       <tr>
        <th width="100"><div align="justify">Tax</div></th>
        <td width="51"><div align="justify">
            <input name="tax" type="text" size="5" pattern="[0-9]+"  id="tax" onchange="tax_calc(); calculate_total('total','grand_tot');" value="<?php echo $ans5['tax']; ?>"/>
          </div></td>
        <td width="60"><div align="justify">
            <input name="tax_p" type="checkbox" id="tax_p" />
            %</div></td>
        <td width="51"><div align="justify">
            <input size="3" type="text" id="percent_tax111" readonly="readonly"/>
          </div></td>
        <td width="44"><div align="justify">
            <input readonly="readonly" name="tax_percent" type="text" size="5" class="total" id="tax_tot" onchange="calculate_total('total','grand_tot')"
    value="<?php echo $ans5['tax_total']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Service Charges</div></th>
        <td><div align="justify">
            <input name="ser_charge" id="ser_charge" type="text" size="5" pattern="[0-9]+" onchange=" service_calc(); calculate_total('total','grand_tot');" value="<?php echo $ans5['service']; ?>" />
          </div></td>
        <td width="60"><div align="justify">
            <input name="ser_p" type="checkbox" id="ser_p" />
            %</div></td>
        <td width="51"><div align="justify">
            <input name="percent_sevice" size="3" type="text" id="percent_service" readonly="readonly"/>
          </div></td>
        <td width="44"><div align="justify">
            <input readonly="readonly" name="ser_percent" type="text" size="5" class="total" id="ser_tot" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['service_total']; ?>"/>
          </div></td>
      </tr>
       
       <!-- <tr>
  <th width="93"><div align="justify">Tax</div></th>
  
    <td width="61"><div align="justify"><input name="tax" type="text" size="10" pattern="[0-9]+" id="tax" onchange="tax_calc(); calculate_total('total','grand_tot');" value="<?php echo $ans5['tax']; ?>"/></div></td>
    <td width="50"><div align="justify"><input name="tax_p" type="checkbox" id="tax_p" />%</div></td>
    <td width="53"><div align="justify"><input name="tax_percent" type="text" size="5" class="total" id="tax_tot" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['tax_total']; ?>"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Service Charges</div></th>
    <td><div align="justify"><input name="ser_charge" id="ser_charge" type="text" size="5" pattern="[0-9]+" onchange=" service_calc(); calculate_total('total','grand_tot');" value="<?php echo $ans5['service']; ?>" /></div></td>
     <td width="50"><div align="justify"><input name="ser_p" type="checkbox" id="ser_p" />%</div></td>
    <td width="53"><div align="justify"><input name="ser_percent" type="text" size="5" class="total" id="ser_tot" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['service_total']; ?>"/></div></td>
  </tr>-->
     </table>
    <table width="273" border="0">
       <tr>
        <th width="93"><div align="justify">Stage Amount</div></th>
        <td width="170"><div align="justify">
            <input name="stage_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['stage_amount']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Sound Amount</div></th>
        <td><div align="justify">
            <input name="sound_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['sound_amount']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Video Amount</div></th>
        <td><div align="justify">
            <input name="vid_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['video_amount']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Misc Amount</div></th>
        <td><div align="justify">
            <input name="misc_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['misc_amount']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify">Discount</div></th>
        <td><div align="justify">
            <input name="discount" type="text" size="10" id="discount" pattern="[0-9]+" onchange="calculate_discount('discount','grand_tot')" value="<?php echo $ans5['DISCOUNT_DETAIL']; ?>"/>
          </div></td>
      </tr>
       <tr>
        <th><div align="justify" class="red1">Grand Total</div></th>
        <td><div align="justify">
            <input name="grand_total" type="text" size="10" id="grand_tot" readonly="readonly" value="<?php echo $ans5['grand_total']; ?>"/>
          </div></td>
      </tr>
     </table>
    <table width="259">
       <tr>
        <td width="17"><div align="justify"></div></td>
        <th width="68"><div align="justify">Advance Rs.</div></th>
        <th width="30"><div align="justify">CR #</div></th>
        <th width="124"><div align="justify">Enter Amount:</div></th>
      </tr>
       <input name="password" type="hidden" id="password" value="<?php echo $password; ?>" />
       <?php
  $query21="SELECT CR_NO,INSTALMENT_AMOUNT FROM payment_serial WHERE ORDER_ID = '$order_id' AND INSTALMENT_NO = '1'";

$result21= mysql_query($query21) or die('Selection Failed:'.mysql_error());	
  $row21=mysql_fetch_array($result21);
  ?>
       <tr>
        <th><div align="justify">CF:</div></th>
        <td><div align="justify">
            <input name="adv1" readonly="readonly" type="text" size="10"  pattern="[0-9]+" id="adv1"  class="advance" onchange=" generate_cr('ins1'); calculate_total('advance','advance_total'); recieved_amount('adv1','tot_rec');" value="<?php echo $row21['INSTALMENT_AMOUNT']; ?>"/>
          </div></td>
        <td><div align="justify">
            <input name="adv_cr1" type="text" size="5" value="<?php echo $row21['CR_NO']; ?>" readonly="readonly" id="ins1" />
          </div></td>
        <td align="right"><input name="money" readonly="readonly" type="text" size="10" id="rec_money" onchange=" pass_validation(); recieved_amount('rec_money','tot_rec'); diff('grand_tot','tot_rec','net'); "/></td>
      </tr>
       <?php
  $query22="SELECT CR_NO,INSTALMENT_AMOUNT FROM payment_serial_admin WHERE ORDER_ID = '$order_id' AND INSTALMENT_NO = '2'";

$result22= mysql_query($query22) or die('Selection Failed:'.mysql_error());	
  $row22=mysql_fetch_array($result22);
  ?>
       <tr>
        <th><div align="justify">CF:</div></th>
        <td><div align="justify">
            <input name="adv2" readonly="readonly" type="text" size="10"  pattern="[0-9]+" id="adv2"  class="advance" onchange=" generate_cr('ins2'); calculate_total('advance','advance_total'); recieved_amount('adv2','tot_rec');" value="<?php echo $row22['INSTALMENT_AMOUNT']; ?>"/>
          </div></td>
        <td><div align="justify">
            <input name="adv_cr2" type="text" size="5" value="<?php echo $row22['CR_NO']; ?>" readonly="readonly" id="ins2" />
          </div></td>
        <th><div align="justify">Total Recieved</div></th>
      </tr>
       <?php
  $query23="SELECT CR_NO,INSTALMENT_AMOUNT FROM payment_serial_admin WHERE ORDER_ID = '$order_id' AND INSTALMENT_NO = '3'";

$result23= mysql_query($query23) or die('Selection Failed:'.mysql_error());	
  $row23=mysql_fetch_array($result23);
  ?>
       <tr>
        <th><div align="justify">CF:</div></th>
        <td><div align="justify">
            <input name="adv3" readonly="readonly" type="text" size="10" pattern="[0-9]+" id="adv3"  class="advance" onchange=" generate_cr('ins3'); calculate_total('advance','advance_total'); recieved_amount('adv3','tot_rec');" value="<?php echo $row23['INSTALMENT_AMOUNT']; ?>"/>
          </div></td>
        <td><div align="justify">
            <input name="adv_cr3" type="text" size="5" value="<?php echo $row23['CR_NO']; ?>" readonly="readonly" id="ins3" />
          </div></td>
        <td align="right"><input name="recieved_total" type="text" size="10" readonly="readonly" id="tot_rec"  value="<?php echo $ans5['total_received']; ?>"/></td>
      </tr>
     </table>
    <table width="295">
       <tr>
        <th width="113"><div align="justify">Advance:</div></th>
        <td width="170"><input name="adv_total" type="text" size="10" readonly="readonly" id="advance_total" value="<?php echo $ans5['adv_total']; ?>"/></td>
      </tr>
       <tr>
        <th width="113" align="left"><div align="justify">Payment Mode:</div></th>
        <td width="170" align="left"><select name="pay_mode" id="pay_mode" onchange="payment_mode(this.value)">
            <option value="">Select Mode</option>
            <option value="N">None</option>
            <option value="C">Cash</option>
            <option value="Q">Cheque</option>
            <option value="R">Credit Card</option>
          </select></td>
      </tr>
       <?php
	if($ans5['CREDIT_CARD_NO_BANQ'] != "")
	{ ?>
       <tr>
        <th  align="justify" width="113">Credit Card No:</th>
        <td width="170"><input type="text" size="10" name="cardno" id="cardno" value="<?php echo $ans5['CREDIT_CARD_NO_BANQ']; ?>" /></td>
      </tr>
       <?php
    }
	else if(($ans5['CHEQUE_NO_BANQ'] != "") && ($ans5['BANK_BANQ'] != ""))
	{
		?>
       <tr>
        <th align="justify" width="113"> Cheque No:</th>
        <td width="170"><input type="text" size="10" name="chequeno" id="chequeno" value="<?php echo $ans5['CHEQUE_NO_BANQ']; ?>" /></td>
      </tr>
       <tr>
        <th align="justify" width="113">Concerned Bank:</th>
        <td width="170"><input type="text" size="10" name="bank" id="bank" value="<?php echo $ans5['BANK_BANQ']; ?>" /></td>
      </tr>
       <?php
	}
	else
	{
		
	}
?>
     </table>
    <div id="mode"></div>
  </div>
   <div id="mid3column_box">
   <table border="0">
   <tr>
    <td><div align="justify">
       
       <!--<h2><strong>Add Dishes in Menu</strong></h2>-->
   <form id="form" name="form" action="" method="post">
    <div id="suggest"><strong>New Dish:</strong>
       <input id="country" onkeyup="suggest(this.value);" size="20" type="text"/>
       <input type="submit" value="Add" onClick="myFunction()">
       <div id="suggestions" class="suggestionsBox" style="display: none;"> <img style="position: relative; top: -12px; left: 120px;" src="images/arrow.png" alt="upArrow" />
        <div id="suggestionsList" class="suggestionList"></div>
      </div>
     </div>
  </form>
   <p id="myDiv"></p>
   <script>
function myFunction()
{
	//var htmlSelect = document.getElementById("menu_order1");//HTML select box
	//var optionValue=document.getElementById('country').value;
	
var txt = document.getElementById('country').value;
var xmlhttp_1;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp_1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp_1=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp_1.onreadystatechange=function()
  {
  if (xmlhttp_1.readyState==4 && xmlhttp_1.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp_1.responseText;
    }
  }
xmlhttp_1.open("POST","ajax/add_manual_dish.php?country="+txt,true);
xmlhttp_1.send();
}
</script> 
 </div>
</td>
</tr>
<tr>
   <td><div align="justify">
       <select name="dishes" id="dishes" size="30">
        <?php
$query5 ="SELECT * FROM dish_master_tab ORDER BY DISH_NAME ASC";
   $result5 = mysql_query($query5);
while($men1=mysql_fetch_array($result5))
{
?>
        <option value="<?php echo $men1['DISH_NAME'];?>"><?php echo $men1['DISH_NAME'];?></option>
        <?php } ?>
      </select>
     </div></td>
 </tr>
<tr>
   <td height="26"><div align="justify">
       <input name="add_dish" type="button" value="Add Dish" onclick="menu_detail();" style="background: #F30; color:#000; font-weight:700;"/>
     </div></td>
 </tr>
<tr>
   <td></td>
 </tr>
<tr>
   <td><h1 style=" font-size:18px; color:#F00;"> Net Payable
       <input name="net" type="text" size="10" readonly="readonly" id="net" style="font-size:22px; font-weight:900; color:#F00;" value="<?php
    if ($ans5['adv_total']!=0){
   echo $ans5['grand_total']-$ans5['adv_total'];
   }
   else
   {
	echo $ans5['grand_total'];   
   }?>" />
     </h1></td>
 </tr>
</table>
</div>
<div  id="bottomcolumn_box">
   <p></p>
   <input name="book" type="submit" value="Book" disabled="disabled" style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="print" type="button" value="Print"  onclick="submitMe(this);"  style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="print_bill" type="button" value="Print Out Complete Bill" onclick="submitMe(this);"  style="background: #F30; color:#000; height:35px; width:auto; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="update" type="submit" value="Update" onclick="selectAll();" style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="print_reference" type="button" value="Print Info" onclick="submitMe(this);"  style="background: #F30; color:#000; height:35px; width:auto; font-size:16px; font-weight:600; border:groove; border-color:#CCC;"/>
   <input name="search" type="button" value="Search"  style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" onclick="search_banq();"/>
   <input name="exit" type="button" value="Exit"  style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" onclick="window.location.href='banq_order_master_reception.php'" />
 </div>
</form>
<?php
}
?>
</div>
<div id='overlay' class='overlay'></div>
<div id="new_popup" class="new_popup"> <a href=javascript:close_new_Popup()><img width=25 height=25  align="right" SRC=images/remove.png alt=Delete/></a>
   <div id="data_popup" > </div>
 </div>

<!-- end of content -->

</body>
</html>