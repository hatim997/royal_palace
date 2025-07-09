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
<title>GAP + 1</title>
<link href="templatemo_style7.css" rel="stylesheet" type="text/css" />

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#dialog" ).dialog({
autoOpen: false,
height: 560,
width: 720,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
$( "#opener" ).click(function() {
$( "#dialog" ).dialog( "open" );
});
});
</script>

<style type="text/css">

table.altrowstable tr:nth-child(odd){    background-color: #a7dbf0; }


</style>

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
function view_all(value)
{
	//alert("Value is "+value);
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
	xmlhttp.open("POST","ajax/view_all.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>



<script type="text/javascript">
function refresh_form()
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
			document.getElementById("add_new").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/refresh_form2.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
}
</script>

<script type="text/javascript">
function add_new_form(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("add_new").innerHTML='<table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX><tr height="30" style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;"><td width="122"><strong>&nbsp;Main Code</strong></td><td width="144"><strong>Main Title</strong></td><td width="122"><strong>Control Code</strong></td><td width="130"><strong>Control Title</strong></td><td width="130"><strong>Category 1 Code</strong></td><td width="141"><strong>Category 1 Title</strong></td><td width="127"><strong>Category 2 Code</strong></td><td width="136"><strong>Category 2 Title</strong></td><td width="148" align="center"><strong>Opening</strong></td></tr></table><table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX><tr><td width="122">&nbsp;</td><td width="144">&nbsp;</td><td width="122">&nbsp;</td><td width="130">&nbsp;</td><td width="130">&nbsp;</td><td width="141">&nbsp;</td><td width="127">&nbsp;</td><td width="136">&nbsp;</td><td width="148">&nbsp;</td></tr><tr><td width="122">&nbsp;<input type="text" size="10" value="Main Code" disabled="disabled" /></td><td width="144"><input type="text" size="15" value="Main Title" disabled="disabled" /></td><td width="122"><input type="text" size="10" value="Control Code" disabled="disabled" /></td><td width="130"><input type="text" size="15" value="Control Title" disabled="disabled" /></td><td width="130" align="center"><input type="text" size="10" value="Category 1 Code" disabled="disabled" /></td><td width="141"><input type="text" size="15" value="Category 1 Title" disabled="disabled" /></td><td width="127" align="center"><input type="text" size="10" value="Category 2 Code" disabled="disabled" /></td><td width="136"><input type="text" size="15" value="Category 2 Title" disabled="disabled" /></td><td width="148"><input type="text" size="15" value="opening" disabled="disabled" /></td></tr><tr style="height:50px;"><td width="122">&nbsp;</td><td width="144">&nbsp;</td><td width="122">&nbsp;</td><td width="130">&nbsp;</td><td width="130">&nbsp;</td><td width="141">&nbsp;</td><td width="127">&nbsp;</td><td width="136">&nbsp;</td><td width="148"><a href="javascript:save_form()" alt="Add" title="Add"><img src="images/add.png" alt="Add" /></a>&nbsp;<a href="javascript:refresh_form()" alt="Refresh" title="Refresh"><img src="images/refresh.png" alt="Refresh" /></a></td></tr></table>';
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
			document.getElementById("add_new").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_new_form1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function show_control(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("show_control").innerHTML="";
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
			document.getElementById("show_control").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_control.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function show_control2(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("show_control").innerHTML="<input type=text size=15 name=ctrl_title id=ctrl_title disabled=disabled />";
		document.getElementById("main_code").value = "Main Code";
		return;
	}
	document.getElementById("main_code").value = value;
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
			document.getElementById("show_control").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_control2.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function show_control3(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("show_control").innerHTML="<input type=text size=15 name=ctrl_title id=ctrl_title disabled=disabled />";
		document.getElementById("main_code").value = "Main Code";
		return;
	}
	document.getElementById("main_code").value = value;
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
			document.getElementById("show_control").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_control3.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function main_code(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("main_code").value = "Main Code";
		return;
	}
	document.getElementById("main_code").value = value;
	//return;
	//var main = document.getElementById("main_code").value;
	//var ctrl = document.getElementById("ctrl_code").value;
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
			document.getElementById("ctrl_code").value = xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/maximum_ctrl_code.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("main="+value);
}
</script>

<script type="text/javascript">
function control_code(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("ctrl_code").value = "Control Code";
		return;
	}
	document.getElementById("ctrl_code").value = value;
	//return;
	var main = document.getElementById("main_code").value;
	//var ctrl = document.getElementById("ctrl_code").value;
	
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
			document.getElementById("scat_code").value = xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/maximum_scat1_code.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("main="+main+"&ctrl="+value);
}
</script>

<script type="text/javascript">
function category1_code(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("scat_code").value = "Category 1 Code";
		return;
	}
	document.getElementById("scat_code").value = value;
	//return;
	var main = document.getElementById("main_code").value;
	var ctrl = document.getElementById("ctrl_code").value;
	
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
			document.getElementById("scat2_code").value = xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/maximum_scat2_code.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("main="+main+"&ctrl="+ctrl+"&scat="+value);
}
</script>

<script type="text/javascript">
function show_control1(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("show_control").innerHTML="";
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
			document.getElementById("show_control").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_control1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function show_category1(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("show_category1").innerHTML="";
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
			document.getElementById("show_category1").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_category1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function show_category2(value)
{
	//alert("Value is "+value);
	if(value == "")
	{
		document.getElementById("show_category1").innerHTML="<input type=text size=15 name=ctrl_title id=ctrl_title disabled=disabled />";
		document.getElementById("ctrl_code").value = "Control Code";
		return;
	}
	document.getElementById("ctrl_code").value = value;
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
			document.getElementById("show_category1").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_category2.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
function add_main(form)
{
	var main_code = encodeURIComponent(document.getElementById("main_code").value);
	var main_title = encodeURIComponent(document.getElementById("main_title").value);
	if(main_code == "")
	{
		alert("Please enter valid main code.");
		return;	
	}
	if(main_code.length > 2)
	{
		alert("Main code cannot be greater than two characters");
		return;	
	}
	if(main_code.length < 2)
	{
		alert("Main code must be two characters");
		return;	
	}
	if(!parseInt(main_code))
	{
		alert("Main code can only be integer number");
		return;	
	}
	if(main_title == "")
	{
		alert("Please enter valid main title.");
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
			document.getElementById("add_new").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_main.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("main_code="+main_code+"&main_title="+main_title);
}
</script>

<script type="text/javascript">
function add_ctrl(form)
{
	var main = encodeURIComponent(document.getElementById("main").value);
	var ctrl_code = encodeURIComponent(document.getElementById("ctrl_code").value);
	var ctrl_title = encodeURIComponent(document.getElementById("ctrl_title").value);
	
	if(main == "")
	{
		alert("Please select main.");
		return;	
	}
	if(ctrl_code == "")
	{
		alert("Please enter valid control code.");
		return;	
	}
	if(ctrl_code.length > 2)
	{
		alert("Control code cannot be greater than two characters");
		return;	
	}
	if(ctrl_code.length < 2)
	{
		alert("Control code must be two characters");
		return;	
	}
	if(!parseInt(ctrl_code))
	{
		alert("Control code can only be integer number");
		return;	
	}
	if(ctrl_title == "")
	{
		alert("Please enter valid control title.");
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
			document.getElementById("add_new").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_ctrl.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("ctrl_code="+ctrl_code+"&ctrl_title="+ctrl_title+"&main="+main);
}
</script>

<script type="text/javascript">
function add_scat1(form)
{
	var main = encodeURIComponent(document.getElementById("main").value);
	var control = encodeURIComponent(document.getElementById("control").value);
	var scat_code = encodeURIComponent(document.getElementById("scat_code").value);
	var scat_title = encodeURIComponent(document.getElementById("scat_title").value);
	
	if(main == "")
	{
		alert("Please select main.");
		return;	
	}
	if(control == "")
	{
		alert("Please select control.");
		return;	
	}
	if(scat_code == "")
	{
		alert("Please enter valid sub category 1 code.");
		return;	
	}
	if(scat_code.length > 3)
	{
		alert("Sub Category 1 code cannot be greater than three characters");
		return;	
	}
	if(scat_code.length < 3)
	{
		alert("Sub Category 1 code must be three characters");
		return;	
	}
	if(!parseInt(scat_code))
	{
		alert("Sub Category 1 code can only be integer number");
		return;	
	}
	if(scat_title == "")
	{
		alert("Please enter valid sub category 1 title.");
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
			document.getElementById("add_new").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_scat1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("scat_code="+scat_code+"&scat_title="+scat_title+"&main="+main+"&control="+control);
}
</script>

<script type="text/javascript">
function add_scat2(form)
{
	var main = encodeURIComponent(document.getElementById("main").value);
	var control = encodeURIComponent(document.getElementById("control").value);
	var scat1 = encodeURIComponent(document.getElementById("scat1").value);
	var scat2_code = encodeURIComponent(document.getElementById("scat2_code").value);
	var scat2_title = encodeURIComponent(document.getElementById("scat2_title").value);
	var opening = encodeURIComponent(document.getElementById("opening").value);
	
	if(main == "")
	{
		alert("Please select main.");
		return;	
	}
	if(control == "")
	{
		alert("Please select control.");
		return;	
	}
	if(scat1 == "")
	{
		alert("Please select sub category 1.");
		return;	
	}
	if(scat2_code == "")
	{
		alert("Please enter valid sub category 2 code.");
		return;	
	}
	if(scat2_code.length > 4)
	{
		alert("Sub Category 2 code cannot be greater than four characters");
		return;	
	}
	if(scat2_code.length < 4)
	{
		alert("Sub Category 2 code must be four characters");
		return;	
	}
	if(!parseInt(scat2_code))
	{
		alert("Sub Category 2 code can only be integer number");
		return;	
	}
	if(scat2_title == "")
	{
		alert("Please enter valid sub category 2 title.");
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
			document.getElementById("add_new").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_scat2.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("scat2_code="+scat2_code+"&scat2_title="+scat2_title+"&scat1="+scat1+"&main="+main+"&control="+control+"&opening="+opening);
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

</head>

<body onclick = "clicked=true;" onbeforeunload="CheckBrowser()" style="background-color:#FFF;">

<div id="templatemo_container" style="background-color:#FFF;">
   
    <?php //include("includes/header2.php"); ?>	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
        
   	  <div id="templatemo_middle_column" style="margin-left:-120px; min-height:550px;">
        <div id="dialog" title="Help Chart of Accounts">
<p>This section basically describes the list of accounts which describes all financial items  that a business entity uses and these financial items are given below.<br><img src="images/gap/chart_of_accounts.jpg" /></p>
</div>

        <table width="1237" align="left" border="0">
        <tr>
       	  <td width="366" align="left"><h1 class="style1" style=" font-size:16px;"><u>Chart of Accounts</u><img src="images/help.png" height="25" width="25" alt="Help" title="Help" id="opener" /></h1>
          </td>
            <td width="410" align="center"><h2 class="style1" style=" font-size:16px; font-style:italic;"><u>View All</u></h2></td>
          <td width="458" align="right"><a href="login.php" style="font-size:18px; font-style:oblique;"><strong>Back</strong></a></td>
        </tr>
        <tr>
        	<td width="366" align="left"><span class="style3" style="font-size:12px;">&nbsp;<b><?php echo $today; ?></b></span></td>
            <td width="410" align="left"></td>
            <td width="458" align="left"></td>
        </tr>
        </table>
        
        	
          <div id="master" align="center">
          <form name="testform" action="de_client_master.php" method="post">
          <table width="281" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" align="left">View All:</td>
    <td width="181" align="left">
    <select id="type" name="type" onchange="view_all(this.value);">
    <option value="">Select Type</option>
    <option value="M">Main</option>
    <option value="C">Control</option>
    <option value="C1">Category 1</option>
    <option value="C2">Category 2</option>
    </select></td>
  </tr>
  </table>
  </form>
  
  <br><div id="entry">

</div>	<!-- end of entry division -->
  
</div><br>
<!-- end of master division -->


<div id="add" align="left">
          
          <form name="testform" action="de_client_master.php" method="post">
          <table width="1237" align="left" border="0">
        <tr>
       	  <td width="127" align="left"><h2 class="style1" style=" font-size:16px; font-style:italic;"><u>Add New</u></h2></td>
            <td width="641" align="left">
            <select id="type" name="type" onchange="add_new_form(this.value);">
              <option value="">Select Type</option>
              <option value="M">Main</option>
              <option value="C">Control</option>
              <option value="C1">Category 1</option>
              <option value="C2">Category 2</option>
              </select>
            </td>
          <td width="455" align="right">&nbsp;</td>
        </tr>
        </table>
          
  </form>
  
  <br>
  <div id="add_new" style="width:1200px; margin-left:20px;">
  <table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
    <tr height="30" style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
    	<td width="122"><strong>&nbsp;Main Code</strong></td>
        <td width="144"><strong>Main Title</strong></td>
        <td width="122"><strong>Control Code</strong></td>
        <td width="130"><strong>Control Title</strong></td>
        <td width="130"><strong>Category 1 Code</strong></td>
        <td width="141"><strong>Category 1 Title</strong></td>
        <td width="127"><strong>Category 2 Code</strong></td>
        <td width="136"><strong>Category 2 Title</strong></td>
        <td width="148" align="center"><strong>Opening</strong></td>
    </tr>
    </table>
  <table width="1200" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>  
    <tr>
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148">&nbsp;</td>
    </tr>
    <tr>
    	<td width="122">&nbsp;<input type="text" size="10" value="Main Code" disabled="disabled" /></td>
        <td width="144"><input type="text" size="15" value="Main Title" disabled="disabled" /></td>
        <td width="122"><input type="text" size="10" value="Control Code" disabled="disabled" /></td>
        <td width="130"><input type="text" size="15" value="Control Title" disabled="disabled" /></td>
        <td width="130" align="center"><input type="text" size="10" value="Category 1 Code" disabled="disabled" /></td>
        <td width="141"><input type="text" size="15" value="Category 1 Title" disabled="disabled" /></td>
        <td width="127" align="center"><input type="text" size="10" value="Category 2 Code" disabled="disabled" /></td>
        <td width="136"><input type="text" size="15" value="Category 2 Title" disabled="disabled" /></td>
        <td width="148"><input type="text" size="15" value="opening" disabled="disabled" /></td>
    </tr>
    <tr style="height:50px;">
    	<td width="122">&nbsp;</td>
        <td width="144">&nbsp;</td>
        <td width="122">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="130">&nbsp;</td>
        <td width="141">&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="136">&nbsp;</td>
        <td width="148"><a href="javascript:save_form()" alt="Add" title="Add"><img src="images/add.png" alt="Add" /></a>&nbsp;
        <a href="javascript:refresh_form()" alt="Refresh" title="Refresh"><img src="images/refresh.png" alt="Refresh" /></a></td>
    </tr>
  </table>

</div>	<!-- end of entry division -->
  
</div>
<!-- end of master division -->

</div>

    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        
      <!-- end of right column -->
    
    </div>
    
    <!-- end of content -->
        
        
	<?php //include("includes/footer.php"); ?>
</body>
</html>