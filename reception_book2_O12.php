<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
//include('update_activity.php');
$userid =  $_SESSION['username'];
$password = $_SESSION['password'];

$restid = $_SESSION['restid'];

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
<style type="text/css">

.overlay
{
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
.new_popup
{
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
.style8 {color: #FF0000; font-style: italic; }

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
	.field1
	{
	font-size:16px;
	
	}
	.field2
	{
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

.load{
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
 <script type="text/javascript" >
function date_check(value)
	{		
var tdate = document.getElementById("today").value;
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
var tdate = document.getElementById("f_date").value;
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
   document.getElementById('form2').action = 'dishes_receipt.php'
  }
   if(obj.value == "Print Out Complete Bill"){
   document.getElementById('form2').action = 'complete_bill.php'
  }
  if(obj.value == "Print Info"){
   document.getElementById('form2').action = 'reference_reciept.php'
  }
 document.getElementById('form2').submit();
}
</script>  
<script>
function submitMe1(obj){
  if(obj.value == "Print"){
   document.getElementById('form1').action = 'dishes_receipt.php'
  }
   if(obj.value == "Print Out Complete Bill"){
   document.getElementById('form1').action = 'complete_bill.php'
  }
  if(obj.value == "Print Info"){
   document.getElementById('form1').action = 'reference_reciept.php'
  }
 document.getElementById('form1').submit();
}
</script>

<script>
$(function() {
    $( "#date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd"
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
  <tr><td><input name="book_status" type="radio" value="C" />Cancelled
  &nbsp;<input name="book_status" type="radio" value="T"/>Tentative
  &nbsp;<input name="book_status" type="radio" value="B" checked="checked"/>Booked</td></tr>
</table>
</div>
  <div  id="leftcolumn_box">
    
<table width="231" border="0">
  <tr>
  <th width="94"><div align="justify">Function Id</div></th><input type="hidden" id="testing" value="" />
    <td width="127"><div align="justify">
   
		<input name="order_i" id="order_i" type="text" size="4" value="<?php echo $order_id = $row3+1; ?>" readonly/>	

    </div></td></tr>
    <tr>
  <th width="94"><div align="justify">Booking Date</div></th>
    <td width="127"><div align="justify">
    
    <?php
$tdate = mktime(0,0,0,date("m"),date("d"),date("Y"));

?> 
<input name="today" type="hidden" id="today" value="<?php echo date("Y-m-d", $tdate); ?>" />
      <input type="text" size="10" name="date" id="date" value="<?php echo date("Y-m-d", $tdate); ?>"  onchange="date_check(this.value);"/>
    </div></td></tr>
    <tr>
  <th width="94"><div align="justify">Function*</div></th>
  
    <td width="127" align="left">
      <div align="justify">
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
      </div></td></tr>
      <tr>
  <th width="94"><div align="justify">Function Date</div></th>
    <td width="127"><div align="justify">
     <input type="hidden" name="f_date" id="f_date" value="<?php echo $date; ?>"/>
      <input readonly="readonly" type="text" size="10" name="date1" id="date1" value="<?php echo $date; ?>" onchange="date_check1(this.value);"/>
      <input type="hidden" name="shift_func" id="shift_func" value=""/> 
      <input type="hidden" size="10" name="date2" id="date2" value="" onchange="addhall();" />
    </div></td></tr>
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
      <option value="lunch">Lunch</option> <?php } ?>
      </select> 
    </div></td></tr>
     <tr>
    <th width="94"><div align="justify">Hall</div></th>
    <td width="127">
      <div align="justify">
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
      </div></td></tr>
       <tr><th width="94"><div align="justify">Additional Hall</div></th>
    <td width="127">
            <div align="justify">
              
                
            </div>
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
          </div></td></tr></table>
          
<div id="add_hall_div">
          
</div>
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
</div></td></tr>
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
<td width="196"> <div align="justify">
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
</div></td></tr>
<tr>
<th><div align="justify">Order Dishes</div></th>
<td>
<select  style="font-size:12px; width:200px" name="menu_order[]" id="menu_order1" size="9" multiple="multiple">

</select>
</td>
</tr>
<tr>
<th></th>
<td>
<input name="del_dish" type="button" value="Delete Dish" onclick="del_dish_order();" style="background: #F30; color:#000; font-weight:700;"/>
</td>
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
      <input name="telephone" type="text" size="10" pattern="[0-9]+" id="tel"/>
    </div></td>
  </tr>
     <tr>
  <th><div align="justify">Contact (1)</div></th>
    <td><div align="justify">
      <input name="telephone1" type="text" size="10" pattern="[0-9]+" id="tel1"/>
    </div></td>
  </tr>
   <tr>
  <th><div align="justify">Contact (2)</div></th>
    <td><div align="justify">
      <input name="telephone2" type="text" size="10" pattern="[0-9]+" id="tel2"/>
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
    <td><div align="justify"><input name="b_rate" type="text" size="10" id="op1" onchange="calc('op','op1','result'); calculate_total('total','grand_tot');" pattern="[0-9]+" /></div></td>
    <td width="72"><div align="justify"><input name="b_rate_total" type="text" size="10" id="result"  class="total"  readonly="readonly" onchange="calculate_total('total','grand_tot')" /></div></td>
  </tr>
   <tr>
  <th><div align="justify">Hall Rental</div></th>
    <td><div align="justify"><input name="hall_rate" type="text" size="10" id="result6" class="total" onchange="calculate_total('total','grand_tot')" pattern="[0-9]+"/></div></td>
    <th><div align="right"></div></th>
  </tr>
  </table border="0">
  <table width="322">
  <tr>
  <td></td><td></td><td></td>
  <td></td>
  <th>Total Amount:</th>
  
  </tr>
   <tr>
  <th width="148"><div align="justify">Cold Drinks</div></th>
    <td width="46"><div align="justify"><input name="drinks" type="text" size="5" id="op2" pattern="[0-9]+" onchange="calc('op2','op3','result1'); calculate_total('total','grand_tot');"/></div></td>
    <th width="27"><div align="justify">Rate:</div></th>
    <td width="30"><div align="justify"><input name="drinks_rate" type="text" size="5" id="op3" pattern="[0-9]+" onchange="calc('op2','op3','result1'); calculate_total('total','grand_tot');"/></div></td>
    <td width="47"><div align="right">
      <input name="drinks_total" type="text" size="7"  readonly="readonly" id="result1" class="total" onchange="calculate_total('total','grand_tot')"/>
    </div></td>
  </tr>
   <tr>
  <th><div align="justify">Tea</div></th>
    <td><div align="justify"><input name="tea" type="text" size="5" id="op4" pattern="[0-9]+" onchange="calc('op4','op5','result2'); calculate_total('total','grand_tot');"/></div></td>
    <th width="27"><div align="justify">Rate:</div></th>
    <td width="30"><div align="justify"><input name="tea_rate" type="text" size="5" id="op5" pattern="[0-9]+" onchange="calc('op4','op5','result2'); calculate_total('total','grand_tot');"/></div></td>
    <td width="47"><div align="right">
      <input name="tea_total" type="text" size="7"  readonly="readonly" id="result2" class="total"   onchange="calculate_total('total','grand_tot')"/>
    </div></td>
  </tr>
   <tr>
  <th><div align="justify">Mineral Water</div></th>
    <td><div align="justify"><input name="water" type="text" size="5"  id="op6" pattern="[0-9]+" onchange="calc('op6','op7','result3'); calculate_total('total','grand_tot');"/></div></td>
    <th width="27"><div align="justify">Rate:</div></th>
    <td width="30"><div align="justify"><input name="water_rate" type="text" size="5" id="op7" pattern="[0-9]+" onchange="calc('op6','op7','result3'); calculate_total('total','grand_tot');"/></div></td>
    <td width="47"><div align="right">
      <input name="water_total" type="text" size="7" readonly="readonly"  id="result3" class="total" onchange="calculate_total('total','grand_tot')"/>
    </div></td>
  </tr>
   <tr>
  <th height="24"><div align="justify">Table Setting</div></th>
    <td><div align="justify"><input name="tset" type="text" size="5" id="op8" pattern="[0-9]+" onchange="same_amount('op8','op','g_grn'); calc1('op8','op9','result4'); calculate_total('total','grand_tot');"/></div></td>
    <th width="27"><div align="justify">Rate:</div></th>
    <td width="30"><div align="justify"><input name="tset_rate" type="text" size="5" pattern="[0-9]+" id="op9" onchange="calc1('op8','op9','result4'); calculate_total('total','grand_tot');"/></div></td>
    <td width="47"><div align="right">
      <input name="tset_total" readonly="readonly" type="text" size="7"  id="result4" class="total" onchange="calculate_total('total','grand_tot')"/>
    </div></td>
  </tr>
  </table>
  <table width="265" border="0">   
  <tr>
  <th width="150"><div align="justify">Extras</div></th>
    <td width="105"><div align="justify"><input name="extra" type="text" size="10" id="result5" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/></div></td>
  </tr>
  </table>
  <table width="324" border="0">
  
   <tr>
  <th width="100"><div align="justify">Tax</div></th>
  
    <td width="51"><div align="justify"><input name="tax" type="text" size="5" pattern="[0-9]+"  id="tax" onchange="tax_calc(); calculate_total('total','grand_tot');"/></div></td>
    <td width="60"><div align="justify"><input name="tax_p" type="checkbox" id="tax_p" />%</div></td>
   
    <td width="51"><div align="justify">
    <input size="3" type="text" id="percent_tax111" readonly="readonly"/>
    </div>
    </td>
   
    <td width="44"><div align="justify"><input name="tax_percent" type="text" size="5" class="total" id="tax_tot" onchange="calculate_total('total','grand_tot')" readonly="readonly"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Service Charges</div></th>
    <td><div align="justify"><input name="ser_charge" id="ser_charge" type="text" size="5" pattern="[0-9]+" onchange=" service_calc(); calculate_total('total','grand_tot');" /></div></td>
     <td width="60"><div align="justify"><input name="ser_p" type="checkbox" id="ser_p" />%</div></td>
     
     
    <td width="51"><div align="justify">
    <input name="percent_sevice" size="3" type="text" id="percent_service" readonly="readonly"/>
    </div>
    </td>
    
    <td width="44"><div align="justify"><input name="ser_percent" type="text" size="5" class="total" id="ser_tot" onchange="calculate_total('total','grand_tot')" readonly="readonly"/></div></td>
  </tr>
   </table>
   <table width="231" border="0">
   <tr>
  <th width="153"><div align="justify">Stage Amount</div></th>
    <td width="68"><div align="justify"><input name="stage_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Sound Amount</div></th>
    <td><div align="justify"><input name="sound_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Video Amount</div></th>
    <td><div align="justify"><input name="vid_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Misc Amount</div></th>
    <td><div align="justify"><input name="misc_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Discount</div></th>
    <td><div align="justify"><input name="discount" type="text" size="10" id="discount" pattern="[0-9]+" onchange="calculate_discount('discount','grand_tot')"/></div></td>
  </tr>
  
   <tr>
  <th><div align="justify" class="red1">Grand Total</div></th>
    <td><div align="justify"><input name="grand_total" type="text" size="10" id="grand_tot" readonly="readonly"/></div></td>
  </tr>
   </table>
     

 
 
   
   <table width="277">
   <tr>
   <td width="17"><div align="justify"></div></td>
   <th width="88"><div align="justify">Advance Rs.</div></th><th width="39"><div align="justify">CR #</div></th>
  <th width="113"><div align="justify">Enter Amount:</div></th>
  </tr>
  <!--<input name="password" style="list-style-type:circle"  id="password" value="<?php echo $password; ?>" />-->
	<input name="password" type="hidden" id="password" value="<?php echo $password; ?>" />

  <tr><th><div align="justify">CF:</div></th>
    <td><div align="justify"><input name="adv1" type="text" size="10" pattern="[0-9]+" id="adv1"  class="advance" onchange=" generate_cr('ins1'); calculate_total('advance','advance_total'); recieved_amount('adv1','tot_rec');"/></div></td>
    <td><div align="justify"><input name="adv_cr1" type="text" size="5" value="" readonly="readonly" id="ins1" /></div></td>
  <td align="right"><input readonly="readonly" name="money" type="text" size="10" id="rec_money" onchange=" pass_validation(); recieved_amount('rec_money','tot_rec'); diff('grand_tot','tot_rec','net'); "/></td>
  
  </tr> 
  
  <tr><th><div align="justify">CF:</div></th>
    <td><div align="justify"><input name="adv2" readonly="readonly" type="text" size="10" pattern="[0-9]+" id="adv2"   class="advance" onchange=" generate_cr('ins2'); calculate_total('advance','advance_total'); recieved_amount('adv2','tot_rec');"/></div></td>
    <td><div align="justify"><input name="adv_cr2" type="text" size="5" value="" readonly="readonly" id="ins2" /></div></td>
 <th><div align="justify">Total Received</div></th>
  </tr> 
  <tr><th><div align="justify">CF:</div></th>
    <td><div align="justify"><input name="adv3" readonly="readonly" type="text" size="10" pattern="[0-9]+" id="adv3"   class="advance" onchange=" generate_cr('ins3'); calculate_total('advance','advance_total'); recieved_amount('adv3','tot_rec');"/></div></td>
    <td><div align="justify"><input name="adv_cr3" type="text" size="5" value="" readonly="readonly" id="ins3" /></div></td>
  <td align="right"><input name="recieved_total" type="text" size="10" readonly="readonly" id="tot_rec" onchange="diff('grand_tot','tot_rec','net')"/></td>
  </tr> 
 
  </table>
  

   <table width="292">
     <tr>
  <th width="113"><div align="justify">Advance:</div></th>
    <td width="167"> <input name="adv_total" type="text" size="10" readonly="readonly" id="advance_total" onchange="diff('grand_tot','tot_rec','net')" /></td>
    
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
    <form id="form" action="#">
				<div id="suggest"><strong>Add Dish:</strong>
 
     				 <input id="country" onkeyup="suggest(this.value);" size="25" type="text" /><!--<input type="button" value="Add" onClick="v_admin_search()"/>-->
				<div id="suggestions" class="suggestionsBox" style="display: none;">
					 <img style="position: relative; top: -12px; left: 120px;" src="images/arrow.png" alt="upArrow" />
				<div id="suggestionsList" class="suggestionList"></div>
			</div>
		</div>
</form>
    
  </div></td></tr>
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
  <tr><td></td></tr>
  <tr>
  <td><h1 style=" font-size:18px; color:#F00;"> Net Payable <input name="net" type="text" size="10" readonly="readonly" id="net" style="font-size:22px; font-weight:900; color:#F00;"  /></h1></td>
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
  <tr><td><input name="book_status" type="radio" value="C" checked="checked"/>Cancelled
  &nbsp;<input name="book_status" type="radio" value="T" />Tentative
  &nbsp;<input name="book_status" type="radio" value="B" />Booked</td></tr>
  <?php }
 else if($check_status=="T")
{
?>
  <tr><td><input name="book_status" type="radio" value="C" />Cancelled
  &nbsp;<input name="book_status" type="radio" value="T"  checked="checked"/>Tentative
  &nbsp;<input name="book_status" type="radio" value="B" />Booked</td></tr>
  <?php }
 else if($check_status=="B")
{
?>
  <tr><td><input name="book_status" type="radio" value="C" />Cancelled
  &nbsp;<input name="book_status" type="radio" value="T"  />Tentative
  &nbsp;<input name="book_status" type="radio" value="B" checked="checked" />Booked</td></tr>
  <?php } ?>
</table>

</div>
  <div  id="leftcolumn_box">
    
<table width="235" border="0">
  <tr>
  <th width="86"><div align="justify">Function Id</div></th><input type="hidden" id="testing" value="" />
    <td width="139"><div align="justify">

      <input name="order_i" id="order_i" type="text" size="4" value="<?php echo $order_id; ?>" readonly/>

    </div></td></tr>
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
      <input type="text" size="10" name="date" id="date" value="<?php echo $ans1['BOOKING_DATE']; ?>" onchange="date_check(this.value);"/>
    </div></td></tr>
    <tr> <?php } ?>
  <th width="86"><div align="justify">Function*</div></th>
  
    <td width="139" align="left">
      <div align="justify">
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
      </div></td></tr>

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
    </div></td></tr>
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
      <option value="lunch">Lunch</option> <?php } ?>
      </select> 
    </div></td></tr>
     <tr>
    <th width="86"><div align="justify">Hall</div></th>
    <td width="139">
      <div align="justify">
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
      </div></td></tr>
       <tr><th width="86"><div align="justify">Additional Hall</div></th>
    <td width="139">
            <div align="justify">
              
                
            </div>
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
                <?php echo $o_name; ?>
</div>
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
          </div></td></tr></table>
          
          <div id="add_hall_div">
          <?php
          if($add_date != "")
		  {
		  ?>
          
          <table width="234">
          <tr><th width="85"><div align="justify">Hall on Second date</div></th>
    <td width="137" style="border:ridge;">
            <div align="justify">
              
                
            </div>
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
                <?php echo $o_name; ?>
</div>
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
          </div></td></tr></table> <?php } 
		  
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
</div></td></tr>
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
<td width="162"> <div align="justify">
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
</div></td></tr>
<tr>
<th><div align="justify">Order Dishes</div></th>
<td>
<!--success-->
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
	


 ?>
</td>
</tr>
<tr>
<th></th>
<td>
<input name="del_dish" type="button" value="Delete Dish" onclick="del_dish_order();" style="background: #F30; color:#000; font-weight:700;"/>
</td>
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
      <input name="telephone" type="text" size="10" pattern="[0-9]+" id="tel" value="<?php echo $ans5['CONTACT_NO']; ?>" />
    </div></td>
  </tr>
     <tr>
  <th><div align="justify">Contact (1)</div></th>
    <td><div align="justify">
      <input name="telephone1" type="text" size="10" pattern="[0-9]+" id="tel1" value="<?php echo $ans5['CONTACT_NO1']; ?>" />
    </div></td>
  </tr>
   <tr>
  <th><div align="justify">Contact (2)</div></th>
    <td><div align="justify">
      <input name="telephone2" type="text" size="10" pattern="[0-9]+" id="tel2" value="<?php echo $ans5['CONTACT_NO2']; ?>"/>
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
 <div id="mode1">
 
      
	</div>
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
    <td><div align="justify"><input name="b_rate" type="text" size="10" id="op1" onchange="calc('op','op1','result'); calculate_total('total','grand_tot');" pattern="[0-9]+" value="<?php echo $ans5['b_rate']; ?>"/></div></td>
    <td width="78"><div align="justify"><input name="b_rate_total" type="text" size="10" id="result"  class="total"  readonly="readonly" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['b_rate_total']; ?>"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Hall Rental</div></th>
    <td><div align="justify"><input name="hall_rate" type="text" size="10" id="result6" class="total" onchange="calculate_total('total','grand_tot')" pattern="[0-9]+" value="<?php echo $ans5['hall_adv']; ?>" /></div></td>
    <th><div align="right"></div></th>
  </tr>
  </table border="0">
  <table width="315">
  <tr>
  <td></td><td></td><td></td>
  <td></td>
  <th>Total Amount:</th>
  
  </tr>
   <tr>
  <th width="93"><div align="justify">Cold Drinks</div></th>
    <td width="45"><div align="justify"><input name="drinks" type="text" size="5" id="op2" pattern="[0-9]+" onchange="calc('op2','op3','result1'); calculate_total('total','grand_tot');" value="<?php echo $ans5['Drink_no']; ?>"/></div></td>
    <th width="27"><div align="justify">Rate:</div></th>
    <td width="40"><div align="justify"><input name="drinks_rate" type="text" size="5" id="op3" pattern="[0-9]+" onchange="calc('op2','op3','result1'); calculate_total('total','grand_tot');" value="<?php echo $ans5['Drink_rate']; ?>"/></div></td>
    <td width="86"><div align="right">
      <input name="drinks_total" type="text" size="10"  readonly="readonly" id="result1" class="total" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['Drink_rate_total']; ?>"/>
    </div></td>
  </tr>
   <tr>
  <th><div align="justify">Tea</div></th>
    <td><div align="justify"><input name="tea" type="text" size="5" id="op4" pattern="[0-9]+" onchange="calc('op4','op5','result2'); calculate_total('total','grand_tot');" value="<?php echo $ans5['tea_no']; ?>"/></div></td>
    <th width="27"><div align="justify">Rate:</div></th>
    <td width="40"><div align="justify"><input name="tea_rate" type="text" size="5" id="op5" pattern="[0-9]+" onchange="calc('op4','op5','result2'); calculate_total('total','grand_tot');" value="<?php echo $ans5['tea_rate']; ?>"/></div></td>
    <td width="86"><div align="right">
      <input name="tea_total" type="text" size="10"  readonly="readonly"  id="result2" class="total"   onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['tea_rate_total']; ?>"/>
    </div></td>
  </tr>
   <tr>
  <th><div align="justify">Mineral Water</div></th>
    <td><div align="justify"><input name="water" type="text" size="5"  id="op6" pattern="[0-9]+" onchange="calc('op6','op7','result3'); calculate_total('total','grand_tot');" value="<?php echo $ans5['water_no']; ?>"/></div></td>
    <th width="27"><div align="justify">Rate:</div></th>
    <td width="40"><div align="justify"><input name="water_rate" type="text" size="5" id="op7" pattern="[0-9]+" onchange="calc('op6','op7','result3'); calculate_total('total','grand_tot');" value="<?php echo $ans5['water_rate']; ?>"/></div></td>
    <td width="86"><div align="right">
      <input name="water_total" type="text" size="10" readonly="readonly"  id="result3" class="total" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['water_rate_total']; ?>"/>
    </div></td>
  </tr>
   <tr>
  <th height="24"><div align="justify">Table Setting</div></th>
    <td><div align="justify"><input name="tset" type="text" size="5" id="op8" pattern="[0-9]+" onchange="calc1('op8','op9','result4'); calculate_total('total','grand_tot');" value="<?php echo $ans5['tableset_no']; ?>"/></div></td>
    <th width="27"><div align="justify">Rate:</div></th>
    <td width="40"><div align="justify"><input name="tset_rate" type="text" size="5" pattern="[0-9]+" id="op9" onchange="calc1('op8','op9','result4'); calculate_total('total','grand_tot');" value="<?php echo $ans5['tableset_rate']; ?>"/></div></td>
    <td width="86"><div align="right">
      <input name="tset_total" type="text" size="10" readonly="readonly"  id="result4" class="total" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['tableset_rate_total']; ?>"/>
    </div></td>
  </tr>
  </table>
  <table width="221" border="0">   
  <tr>
  <th width="97"><div align="justify">Extras</div></th>
    <td width="114"><div align="justify"><input name="extra" type="text" size="10" id="result5" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['extra']; ?>"/></div></td>
  </tr>
  </table>
  <table width="324" border="0">
   <tr>
  <th width="100"><div align="justify">Tax</div></th>
  
    <td width="51"><div align="justify"><input name="tax" type="text" size="5" pattern="[0-9]+"  id="tax" onchange="tax_calc(); calculate_total('total','grand_tot');" value="<?php echo $ans5['tax']; ?>"/></div></td>
    <td width="60"><div align="justify"><input name="tax_p" type="checkbox" id="tax_p" />%</div></td>
   
    <td width="51"><div align="justify">
    <input size="3" type="text" id="percent_tax111" readonly="readonly"/>
    </div>
    </td>
   
    <td width="44"><div align="justify"><input readonly="readonly" name="tax_percent" type="text" size="5" class="total" id="tax_tot" onchange="calculate_total('total','grand_tot')"
    value="<?php echo $ans5['tax_total']; ?>"/></div></td>
  </tr> 
   <tr>
  <th><div align="justify">Service Charges</div></th>
    <td><div align="justify"><input name="ser_charge" id="ser_charge" type="text" size="5" pattern="[0-9]+" onchange=" service_calc(); calculate_total('total','grand_tot');" value="<?php echo $ans5['service']; ?>" /></div></td>
     <td width="60"><div align="justify"><input name="ser_p" type="checkbox" id="ser_p" />%</div></td>
     
     
    <td width="51"><div align="justify">
    <input name="percent_sevice" size="3" type="text" id="percent_service" readonly="readonly"/>
    </div>
    </td>
    
    <td width="44"><div align="justify"><input readonly="readonly" name="ser_percent" type="text" size="5" class="total" id="ser_tot" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['service_total']; ?>"/></div></td>
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
    <td width="170"><div align="justify"><input name="stage_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['stage_amount']; ?>"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Sound Amount</div></th>
    <td><div align="justify"><input name="sound_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['sound_amount']; ?>"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Video Amount</div></th>
    <td><div align="justify"><input name="vid_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['video_amount']; ?>"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Misc Amount</div></th>
    <td><div align="justify"><input name="misc_charge" type="text" size="10" class="total" pattern="[0-9]+" onchange="calculate_total('total','grand_tot')" value="<?php echo $ans5['misc_amount']; ?>"/></div></td>
  </tr>
   <tr>
  <th><div align="justify">Discount</div></th>
    <td><div align="justify"><input name="discount" type="text" size="10" id="discount" pattern="[0-9]+" onchange="calculate_discount('discount','grand_tot')" value="<?php echo $ans5['DISCOUNT_DETAIL']; ?>"/></div></td>
  </tr>
  
   <tr>
  <th><div align="justify" class="red1">Grand Total</div></th>
    <td><div align="justify"><input name="grand_total" type="text" size="10" id="grand_tot" readonly="readonly" value="<?php echo $ans5['grand_total']; ?>"/></div></td>
  </tr>
   </table>
     

 
 
   
   <table width="259">
   <tr>
   <td width="17"><div align="justify"></div></td><th width="68"><div align="justify">Advance Rs.</div></th><th width="30"><div align="justify">CR #</div></th>
  <th width="124"><div align="justify">Enter Amount:</div></th>
  </tr>
  <input name="password" type="hidden" id="password" value="<?php echo $password; ?>" />
  <?php
  $query21="SELECT CR_NO,INSTALMENT_AMOUNT FROM payment_serial WHERE ORDER_ID = '$order_id' AND INSTALMENT_NO = '1'";

$result21= mysql_query($query21) or die('Selection Failed:'.mysql_error());	
  $row21=mysql_fetch_array($result21);
  ?>
  
  <tr><th><div align="justify">CF:</div></th>
    <td><div align="justify"><input name="adv1" readonly="readonly" type="text" size="10"  pattern="[0-9]+" id="adv1"  class="advance" onchange=" generate_cr('ins1'); calculate_total('advance','advance_total'); recieved_amount('adv1','tot_rec');" value="<?php echo $row21['INSTALMENT_AMOUNT']; ?>"/></div></td>
    <td><div align="justify"><input name="adv_cr1" type="text" size="5" value="<?php echo $row21['CR_NO']; ?>" readonly="readonly" id="ins1" /></div></td>
  <td align="right"><input name="money" readonly="readonly" type="text" size="10" id="rec_money" onchange=" pass_validation(); recieved_amount('rec_money','tot_rec'); diff('grand_tot','tot_rec','net'); "/></td>
  
  </tr> 
  <?php
  $query22="SELECT CR_NO,INSTALMENT_AMOUNT FROM payment_serial_admin WHERE ORDER_ID = '$order_id' AND INSTALMENT_NO = '2'";

$result22= mysql_query($query22) or die('Selection Failed:'.mysql_error());	
  $row22=mysql_fetch_array($result22);
  ?>
  <tr><th><div align="justify">CF:</div></th>
    <td><div align="justify"><input name="adv2" readonly="readonly" type="text" size="10"  pattern="[0-9]+" id="adv2"  class="advance" onchange=" generate_cr('ins2'); calculate_total('advance','advance_total'); recieved_amount('adv2','tot_rec');" value="<?php echo $row22['INSTALMENT_AMOUNT']; ?>"/></div></td>
    <td><div align="justify"><input name="adv_cr2" type="text" size="5" value="<?php echo $row22['CR_NO']; ?>" readonly="readonly" id="ins2" /></div></td>
 <th><div align="justify">Total Recieved</div></th>
  </tr> 
  <?php
  $query23="SELECT CR_NO,INSTALMENT_AMOUNT FROM payment_serial_admin WHERE ORDER_ID = '$order_id' AND INSTALMENT_NO = '3'";

$result23= mysql_query($query23) or die('Selection Failed:'.mysql_error());	
  $row23=mysql_fetch_array($result23);
  ?>
  <tr><th><div align="justify">CF:</div></th>
    <td><div align="justify"><input name="adv3" readonly="readonly" type="text" size="10" pattern="[0-9]+" id="adv3"  class="advance" onchange=" generate_cr('ins3'); calculate_total('advance','advance_total'); recieved_amount('adv3','tot_rec');" value="<?php echo $row23['INSTALMENT_AMOUNT']; ?>"/></div></td>
    <td><div align="justify"><input name="adv_cr3" type="text" size="5" value="<?php echo $row23['CR_NO']; ?>" readonly="readonly" id="ins3" /></div></td>
  <td align="right"><input name="recieved_total" type="text" size="10" readonly="readonly" id="tot_rec"  value="<?php echo $ans5['total_received']; ?>"/></td>
  </tr> 
  </table>
  

   <table width="295">
     <tr>
  <th width="113"><div align="justify">Advance:</div></th>
    <td width="170"> <input name="adv_total" type="text" size="10" readonly="readonly" id="advance_total" value="<?php echo $ans5['adv_total']; ?>"/></td>
    
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
		<tr><th  align="justify" width="113">Credit Card No:</th>
		<td width="170"><input type="text" size="10" name="cardno" id="cardno" value="<?php echo $ans5['CREDIT_CARD_NO_BANQ']; ?>" /></td></tr>
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
    <form id="form" action="#">
				<div id="suggest"><strong>Add Dish:</strong>
 
     				 <input id="country" onkeyup="suggest(this.value);" size="25" type="text" />
                     <!--<input type="button" value="Add" onClick="v_admin_search()"/>-->
				<div id="suggestions" class="suggestionsBox" style="display: none;">
					 <img style="position: relative; top: -12px; left: 120px;" src="images/arrow.png" alt="upArrow" />
				<div id="suggestionsList" class="suggestionList"></div>
			</div>
		</div>
</form>
    
  </div></td></tr>
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
  <tr><td></td></tr>
  <tr>
  
  <td><h1 style=" font-size:18px; color:#F00;"> Net Payable <input name="net" type="text" size="10" readonly="readonly" id="net" style="font-size:22px; font-weight:900; color:#F00;" value="<?php
    if ($ans5['adv_total']!=0){
   echo $ans5['grand_total']-$ans5['adv_total'];
   }
   else
   {
	echo $ans5['grand_total'];   
   }?>" /></h1></td>
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
<div id="new_popup" class="new_popup">
<a href=javascript:close_new_Popup()><img width=25 height=25  align="right" SRC=images/remove.png alt=Delete/></a>
<div id="data_popup" >
</div>
</div>
    
    <!-- end of content -->
        
        
	
</body>
</html>