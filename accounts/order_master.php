<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$restid = $_SESSION['restid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<link href="templatemo_style6.css" rel="stylesheet" type="text/css" />

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<style type="text/css">
<!--
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
	color: #013c54;
	font-size: 12px;
}
</style>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


<script type="text/javascript">
function show_order_detail1(orderno)
{
	if(orderno == "")
	{
		document.getElementById("entry").innerHTML="";
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
	xmlhttp.open("POST","ajax/show_order_detail1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("orderno="+orderno);
}
</script>

<script type="text/javascript">
function save_dish_quantity(form)
{
	var orderno = encodeURIComponent(document.getElementById("orderno").value);
	var dish = encodeURIComponent(document.getElementById("dish").value);
	var qty = encodeURIComponent(document.getElementById("qty").value);
	//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);
	
	if(qty == "" || qty <= 0)
	{
		alert("Please Enter correct Quantity");
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
	xmlhttp.open("POST","ajax/save_dish_quantity.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("orderno="+orderno+"&dish="+dish+"&qty="+qty);
}
</script>

<script type="text/javascript">
function edit_quantity(orderno,dish)
{
	//alert("Edit Dish Quantity with "+orderno+" and "+dish);
	
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
	xmlhttp.open("POST","ajax/edit_quantity.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("orderno="+orderno+"&dish="+dish);
}
</script>

<script type="text/javascript">
function old_guest_form(id)
{
	//alert(id);
	
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
	xmlhttp.open("POST","ajax/old_guest_form.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+id);
}
</script>

<script type="text/javascript">
function search_guest(guest)
{
	//alert(" Order no is "+orderno);
	if (guest.length==0)
	{
		document.getElementById("results").innerHTML="";
		//document.getElementById("results").style.border="0px";
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
			document.getElementById("results").innerHTML=xmlhttp.responseText;
			//document.getElementById("results").style.border="1px solid #A5ACB2";
		}
	  }
	xmlhttp.open("POST","ajax/search_guest.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("guest="+guest);
}
</script>

<script type="text/javascript">
function confirm_order(orderno)
{
	//alert(" Order no is "+orderno);
	
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
	xmlhttp.open("POST","ajax/confirm_order.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("orderno="+orderno);
}
</script>

<script type="text/javascript">
function confirm_order_new(orderno)
{
	var gross = encodeURIComponent(document.getElementById("gross").value);
	var other_charges = encodeURIComponent(document.getElementById("other_charges").value);
	if(other_charges == "")
	{
		alert("Please Enter Information in required fields");
		return;
	}
	//alert(" Order no is "+orderno);
	
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
	xmlhttp.open("POST","ajax/confirm_order1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("orderno="+orderno+"&other_charges="+other_charges+"&gross="+gross);
}
</script>

<script type="text/javascript">
function delete_dish(orderno,dish)
{
	//alert(orderno+" and "+dish);
	var a = confirm("Do you want to remove this Dish?");
	if(a)
	{
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
		xmlhttp.open("POST","ajax/delete_dish.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("orderno="+orderno+"&dish="+dish);
	} // if ends here
	else
	{
		return;	
	}
}
</script>

<script type="text/javascript">
function show_dish_detail(dish_id)
{
	if(dish_id == "")
	{
		document.getElementById("dish_detail").innerHTML="";
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
			document.getElementById("dish_detail").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_dish_detail.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("dish_id="+dish_id);
}
</script>

<script type="text/javascript">
function show_dish(value)
{
	if(value == "")
	{
		document.getElementById("show_dish").innerHTML="";
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
			document.getElementById("show_dish").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_dish.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function order_form(value)
{
	if(value == "")
	{
		document.getElementById("entry").innerHTML="";
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
	xmlhttp.open("POST","ajax/show_order_form.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function add_guest(form)
{
	var name = encodeURIComponent(document.getElementById("name").value);
	//var fname = encodeURIComponent(document.getElementById("fname").value);
	var day = encodeURIComponent(document.getElementById("day").value);
	var month = encodeURIComponent(document.getElementById("month").value);
	var cell = encodeURIComponent(document.getElementById("cell").value);
	var email = encodeURIComponent(document.getElementById("email").value);
	var city = encodeURIComponent(document.getElementById("city").value);
	var pro_type = encodeURIComponent(document.getElementById("pro_type").value);
	var tableno = encodeURIComponent(document.getElementById("tableno").value);
	var total_guest = encodeURIComponent(document.getElementById("total_guest").value);
	if(name == "" || day == ""  || month == "" || cell == "" || city == "" || pro_type == "" || tableno == "" || total_guest == "")
	{
		alert("Please Enter Information in required fields");
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
	xmlhttp.open("POST","ajax/add_guest_order.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("name="+name+"&cell="+cell+"&day="+day+"&month="+month+"&email="+email+"&city="+city+"&pro_type="+pro_type+"&tableno="+tableno+"&total_guest="+total_guest);
}
</script>

<script type="text/javascript">
function old_guest_order(form)
{
	var gid = encodeURIComponent(document.getElementById("gid").value);
	var order_type_id = encodeURIComponent(document.getElementById("order_type_id").value);
	var tableno = encodeURIComponent(document.getElementById("tableno").value);
	var total_guest = encodeURIComponent(document.getElementById("total_guest").value);
	if(tableno == "" || total_guest == "")
	{
		alert("Please Enter Information in required fields");
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
	xmlhttp.open("POST","ajax/old_guest_order.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("gid="+gid+"&order_type_id="+order_type_id+"&tableno="+tableno+"&total_guest="+total_guest);
}
</script>


<script type="text/javascript">
function old_guest_order_new(form)
{
	var gid = encodeURIComponent(document.getElementById("gid").value);
	var tableno = encodeURIComponent(document.getElementById("tableno").value);
	var total_guest = encodeURIComponent(document.getElementById("total_guest").value);
	if(tableno == "" || total_guest == "")
	{
		alert("Please Enter Information in required fields");
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
	xmlhttp.open("POST","ajax/old_guest_order1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("gid="+gid+"&tableno="+tableno+"&total_guest="+total_guest);
}
</script>

<script type="text/javascript">
function order_details(orderno,guest)
{
	//alert("Order No is "+orderno);
	//alert("Order is "+orderno+" and dish is "+dish+" and status is "+status);
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
			document.getElementById("details").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/order_details.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("orderno="+orderno+"&guest="+guest);
}
</script>



<script type="text/javascript">
function add_order()
{
	//alert("Hello");
	var d_id = "";
	var d_qty = "";
	var blank = 0;
	//var guest = encodeURIComponent(document.getElementById("guest").value);
	//var guest_id = encodeURIComponent(document.getElementById("guestid").value);
	var orderno = encodeURIComponent(document.getElementById("orderno").value);
	var food = encodeURIComponent(document.getElementById("food").value);
	var t_dish = encodeURIComponent(document.getElementById("total_dishes").value);
	//var serving = encodeURIComponent(document.getElementById("serving").value);
	//var qty = encodeURIComponent(document.getElementById("qty").value);
	//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);
	//alert("Total Dishes are "+t_dish);
	
	if(food == "")
	{
		alert("Please Enter Information in required fields");
		return;
	}
	for(var i=0; i < t_dish; i++)
	{
		var qty = encodeURIComponent(document.getElementById("qty"+i).value);
		//alert(qty);
		//alert("Name is "+encodeURIComponent(document.getElementById("qty"+i).name));
		if(qty != "")
		{
			if(d_id == "")
			{
				d_id +=encodeURIComponent(document.getElementById("qty"+i).name);
			}
			else
			{
				d_id = d_id + ":" + encodeURIComponent(document.getElementById("qty"+i).name);
			}
			if(d_qty == "")
			{
				d_qty +=encodeURIComponent(document.getElementById("qty"+i).value);
			}
			else
			{
				d_qty = d_qty + ":" + encodeURIComponent(document.getElementById("qty"+i).value);
			}
			//alert(d_id+" and quntities are "+d_qty);
		}
		else
		{
			blank = blank + 1;	
		}
		//alert("Blank is "+blank);
	}
	if(t_dish == blank)
	{
		alert("Please enter valid Quantity");
		return;
	}
	//alert(d_id+" and quntities are "+d_qty);
	
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
	xmlhttp.open("POST","ajax/add_order.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("orderno="+orderno+"&food="+food+"&t_dish="+t_dish+"&d_id="+d_id+"&d_qty="+d_qty);
}
</script>


<script type="text/javascript">
    function payment_mode(value)
    {
		//var p_mode = encodeURIComponent(document.getElementById("pay_mode").value);
		//alert(value);
		
		var xmlhttp;
		/*
		if (value == "" || value == "C")
  		{
			document.getElementById("mode").innerHTML="";
			//alert(advance);
			return;
  		}
		*/
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
		xmlhttp.open("POST","ajax/payment_mode.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("value="+value);
	}
</script>

<script type="text/javascript">
function payment_reception(form)
{
	//alert("Hello");
	var orderno = encodeURIComponent(document.getElementById("orderno").value);
	var gid = encodeURIComponent(document.getElementById("gid").value);
	var gross = encodeURIComponent(document.getElementById("gross").value);
	var service = encodeURIComponent(document.getElementById("service").value);
	//var discount = encodeURIComponent(document.getElementById("discount").value);
	var taxid = encodeURIComponent(document.getElementById("taxid").value);
	var rec_amount = encodeURIComponent(document.getElementById("received").value);
	var p_mode = encodeURIComponent(document.getElementById("pay_mode").value);
	//var p_status = encodeURIComponent(document.getElementById("p_status").value);
	if(p_mode == "C")
	{
		var chequeno = "";
		var cardno = "";
		var bank = "";
	}
	else if(p_mode == "Q")
	{
		var chequeno = encodeURIComponent(document.getElementById("chequeno").value);
		var bank = encodeURIComponent(document.getElementById("bank").value);
		var cardno = 0;
		if(chequeno == "")
		{
			alert("Please Enter Cheque No");
			return;
		}
		if(bank == "")
		{
			alert("Please Enter Bank");
			return;
		}
	}
	else
	{
		var chequeno = 0;
		var cardno = encodeURIComponent(document.getElementById("cardno").value);
		var bank = 0;
		if(cardno == "")
		{
			alert("Please Enter Credit Card No");
			return;
		}
	}
	if(p_mode == "")
	{
		alert("Please select correct payment mode");
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
			document.getElementById("details").innerHTML=xmlhttp.responseText;
			//document.getElementById("details").innerHTML="Payment added Successfully";
		}
	  }
	xmlhttp.open("POST","ajax/payment_reception.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("orderno="+orderno+"&gid="+gid+"&gross="+gross+"&service="+service+"&taxid="+taxid+"&rec_amount="+rec_amount+"&p_mode="+p_mode+"&chequeno="+chequeno+"&cardno="+cardno+"&bank="+bank);
}
</script>


</head>

<body style="background-color:#FFF;">

<div id="templatemo_container" style="background-color:#FFF;">
   
    <?php include("includes/header2.php"); ?>	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
        
   	  <div id="templatemo_middle_column">
        
        	<h1 class="style1" style=" font-size:16px;">New Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
          <p>&nbsp;</p>
<br><br>
          <div id="master">
          <form name="testform" action="de_client_master.php" method="post">
          <table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="120" align="left">Order Type:</td>
    <td width="250" align="left">
    <select id="guest" name="guest" onchange="order_form(this.value);">
    <option value="">Select Order Type</option>
      <?php

            $query = "SELECT * FROM order_type ORDER BY ORDER_TYPE_ID ASC";
            $result = mysql_query($query);
            $num = mysql_numrows($result);
            $i=0;
            while($i < $num)
            {
                $o_id = mysql_result($result,$i, "ORDER_TYPE_ID" );
				$o_name = mysql_result($result,$i, "ORDER_TYPE_NAME" );
        ?>
        <option value="<?php echo $o_id; ?>"><?php echo $o_name; ?></option>
              <?php
                
            $i++;
            }  // while loop ends here
                
        ?>
      </select></td>
  </tr>
  </table>
  </form>
</div><br><br>	<!-- end of master division -->

<div id="entry">

</div>	<!-- end of entry division -->

</div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        
      <!-- end of right column -->
    
    </div>
    
    <!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
</body>
</html>