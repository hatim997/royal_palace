<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
//include('update_activity.php');
//$userid = $_SESSION['username'];
//$password = $_SESSION['password'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="templatemo_style7.css" rel="stylesheet" type="text/css" />

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
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
.popup
{
    position: fixed;
    top: 50%;
    left: 45%;
    margin-left: -50px;
    margin-top: -10px;
    width: 300px;
    height: 90px;
    display: none;
    background:#FFF;   
    border:1px solid #F00;
	z-index:1000;
}
</style>
  <script type="text/javascript">
  
      function showPopup(ID) {
		  //alert(ID);
          document.getElementById("overlay").style.display = "block";
          document.getElementById("popup"+ID).style.display = "block";
      }
      function closePopup(ID) {
          document.getElementById("overlay").style.display = "none";
          document.getElementById("popup"+ID).style.display = "none";
      }
	  function sub_update(DISH_ID,ING_ID)
	  {
		  //alert(document.getElementById(ING_ID).value);
		  //alert("ING ID IS "+ING_ID);
		  var qty = document.getElementById(ING_ID).value;
		  //call ajax function here
		  
		  if(parseInt(qty) <= 0)
		  {
			 alert("Required Quantity is not numeric");
			 return;
		  }
		  closePopup(ING_ID);
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
				  document.getElementById("parent").innerHTML=xmlhttp.responseText;
			  }
			}
		  xmlhttp.open("POST","ajax/save_recipe_ingredient.php",true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send("qty="+qty+"&dish_id="+DISH_ID+"&ing_id="+ING_ID);
	  }
    </script>

<style>
<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script language="JavaScript">
	new tcal ({
		'formname': 'dish',
		'controlname': 'from'
	});
	</script>
    
  <script language="JavaScript">
	new tcal ({
		'formname': 'dish',
		'controlname': 'to'
	});
	</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<!--<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#orders').load('ajax/show_kitchen_orders.php').fadeIn("slow");
}, 60000); // refresh every 10000 milliseconds
</script>
-->
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
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

<style type="text/css">
table.altrowstable tr:nth-child(even){    background-color:#EAF0F6; }
.padding1
{padding-left:9px;
}
</style>



<meta http-equiv="Content-Type" content="text/html;">
<script language="javaScript" type="text/javascript" src="calendar.js"></script>

<!-- CSS goes in the document HEAD or added to your external stylesheetB0D2DF -->



<!-- Table goes in the document BODY -->
<script language="javaScript" type="text/javascript">
function ingredientname(value)
{
	
	//alert("Status is "+orderno);
	if(value == "")
	{
		//alert("Please enter valid date");
		document.getElementById("show_ingredient_code").value = "";
		document.getElementById("unit").value = "";
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
			document.getElementById("show_ingredient_code").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/new_show_ingredient_code.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
	
	var xmlhttp1;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp1=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp1.onreadystatechange=function()
	  {
	  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		{
			document.getElementById("unit").innerHTML=xmlhttp1.responseText;
		}
	  }
	xmlhttp1.open("POST","ajax/new_unit_code.php",true);
	xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp1.send("value="+value);
	
}
</script>

<script language="javaScript" type="text/javascript">
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
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/refresh_form.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("quantity="+quantity+"&ing_name="+ing_name+"&dishid="+dishid);
}

</script>

<script language="javaScript" type="text/javascript">
function save_form()
{
	
	//alert("Ok");
	//var ingredientcode = document.getElementById("ingredientcode").value;
	//var l_unit = document.getElementById("low_unit").value;
	var quantity = document.getElementById("quantity").value;
	//alert(voucherid);
	//return;
	var ing_name = document.getElementById("ing_name").value;
	var dishid = document.getElementById("dishid").value;
	//var foodtype = document.getElementById("food_typebox").value;
	//var saleprice = document.getElementById("sale_pricebox").value;
	//var divval = document.getElementById("div_val").value;
	//alert("erst is "+rest+" and from is "+from+" and to is "+to);
	if(dishid == "")
	{
		alert("Please select Dish");
		return;
	}
	if(ing_name == "")
	{
		alert("Please select Ingredient");
		return;
	}
	/*
	if(ingredientcode == "")
	{
		alert("Please enter a valid Ingredient Code");
		return;
	}
	
	if(l_unit == "")
	{
		alert("Please enetr Smallest Unit");
		return;
	}
	*/
	if(quantity == "")
	{
		alert("Please enter Required Quantity");
		return;
	}
	if(parseInt(quantity) <= 0)
	{
	   alert("Required Quantity is not numeric");
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
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_recipe_ingredient.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("quantity="+quantity+"&ing_name="+ing_name+"&dishid="+dishid);
}

</script>

<script language="javaScript" type="text/javascript">
function delete_ingredient(dish_id, ingredient_code)
{
	//var saleprice = document.getElementById("sale_pricebox").value;
	//var foodtype = document.getElementById("food_typebox").value;
	//var l_unit = document.getElementById("low_unit").value;
	//var ing_name = document.getElementById("ing_name").value;
	//alert("Ok");
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
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/delete_recipe_ingredient_new.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("ingredient_code="+ingredient_code+"&dish_id="+dish_id);
}
</script>

<script language="javaScript" type="text/javascript">
function edit_ingredient(dish_id, ingredient_code, required_quantity, divval)
{
	var saleprice = document.getElementById("sale_pricebox").value;
	var foodtype = document.getElementById("food_typebox").value;
	var l_unit = document.getElementById("low_unit").value;
	
	//alert(voucherid);
	//return;
	var ing_name = document.getElementById("ing_name").value;
	if(saleprice == "")
	{
		alert("Please select sale price");
		return;
	}
	if(foodtype == "")
	{
		alert("Please select some food  type");
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
			document.getElementById("recipe").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/new_edit_ingredient.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("l_unit="+l_unit+"&ingredient_code="+ingredient_code+"&required_quantity="+required_quantity+"&ing_name="+ing_name+"&dish_id="+dish_id+"&foodtype="+foodtype+"&saleprice="+saleprice+"&divval="+divval);
}
</script>

<script language="javaScript" type="text/javascript">
function edit_save_ingredient(dish_id, ingredient_code,required_quantity, divval)
{
	//alert("Ok");
	var new_req_quantity = document.getElementById("new_req_quantity").value;
	var saleprice = document.getElementById("sale_pricebox").value;
	var foodtype = document.getElementById("food_typebox").value;
	var l_unit = document.getElementById("low_unit").value;
	//var quantity = document.getElementById("quantity").value;
	//alert(voucherid);
	//return;
	var ing_name = document.getElementById("ing_name").value;
	if(saleprice == "")
	{
		alert("Please select sale price");
		return;
	}
	if(foodtype == "")
	{
		alert("Please select some food  type");
		return;
	}
	if(new_req_quantity == "")
	{
		alert("Please enetr required quantity");
		return;
	}
	else if(isDigits(new_req_quantity)==false)
  {
   alert("Required quantity is not numeric");
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
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/new_edit_save_ingredient.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("l_unit="+l_unit+"&new_req_quantity="+new_req_quantity+"&ingredient_code="+ingredient_code+"&required_quantity="+required_quantity+"&ing_name="+ing_name+"&dish_id="+dish_id+"&foodtype="+foodtype+"&saleprice="+saleprice+"&divval="+divval);
}
function isDigits(argvalue) {
    argvalue = argvalue.toString();
    var validChars = "0123456789";
    var startFrom = 0;
    if (argvalue.substring(0, 2) == "0x") {
       validChars = "0123456789abcdefABCDEF";
       startFrom = 2;
    } else if (argvalue.charAt(0) == "0") {
       validChars = "01234567";
       startFrom = 1;
    }
    for (var n = 0; n < argvalue.length; n++) {
        if (validChars.indexOf(argvalue.substring(n, n+1)) == -1) return false;
    }
  return true;
}
</script>

<script language="javaScript" type="text/javascript">
function cancel_form()
{
	//alert("Ok");
	//var voucher_id = document.getElementById("voucherid").value;
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
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/new_refresh_form.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
}
</script>

<script language="javaScript" type="text/javascript">
function show_recipe(value)
{
	//alert("Status is "+orderno);
	if(value == "")
	{
		document.getElementById("recipe").innerHTML = "";
		document.getElementById("costing").innerHTML = "<table align=left width=246><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>Category:</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>Cooking Time:</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>ER Cost:</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>HR Cost:</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>Other Cost:</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>Ingredient Cost:</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>Dish Cost:</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>Sale Price:</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;&nbsp;<strong>Profit Margin % :</strong></td><td width=125 align=left>&nbsp;</td></tr><tr><td width=109 height=5 align=left>&nbsp;</td><td width=125 align=left>&nbsp;</td></tr></table>";
		//document.getElementById("sale_price").innerHTML = "";
		//document.getElementById("costprice").innerHTML = "";
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
			document.getElementById("recipe").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/new_show_recipe.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
	
	var xmlhttp1;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp1=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp1.onreadystatechange=function()
	  {
	  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		{
			document.getElementById("costing").innerHTML=xmlhttp1.responseText;
		}
	  }
	xmlhttp1.open("POST","ajax/show_dish_cost.php",true);
	xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp1.send("value="+value);
	/*
	var xmlhttp2;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp2=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp2.onreadystatechange=function()
	  {
	  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
		{
			document.getElementById("sale_price").innerHTML=xmlhttp2.responseText;
		}
	  }
	xmlhttp2.open("POST","ajax/new_show_sale_price.php",true);
	xmlhttp2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp2.send("value="+value);
	
	var xmlhttp3;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp3=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp3=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp3.onreadystatechange=function()
	  {
	  if (xmlhttp3.readyState==4 && xmlhttp3.status==200)
		{
			document.getElementById("costprice").innerHTML=xmlhttp3.responseText;
		}
	  }
	xmlhttp3.open("POST","ajax/new_show_cost_price.php",true);
	xmlhttp3.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp3.send("value="+value);
	*/
}
</script>

<link href="calendar.css" rel="stylesheet" type="text/css">
</head>

<body>



<div id="templatemo_container" align="center">
   
    <?php //include("includes/header2.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content" style="margin-left:-150px; width:1250px;">
<table width="1250" align="left">
    <tr>
      <td width="519" align="left"><h1 class="style1" style=" font-size:16px;">Dish Recipe</h1></td>
      <td width="719" align="right"><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100" height="25">
        <param name="movie" value="images/back_btn.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="images/back_btn.swf" width="100" height="25">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <param name="expressinstall" value="Scripts/expressInstall.swf" />
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object></td>
    </tr>
</table>
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
    	  
<div id="parent">
 
<?php
 	$query1 = "SELECT * FROM cost_tab ORDER BY COST_ID ASC";
    $result1 = mysql_query($query1)or die("Failed :".mysql_error());
    $num1 = mysql_numrows($result1);
    $i=0;
    while($i < $num1)
    {
        $cost_id = mysql_result($result1,$i, "COST_ID" );
        $energy = mysql_result($result1,$i, "ENERGY_COST" );
		$hr = mysql_result($result1,$i, "HR_COST" );
		$other = mysql_result($result1,$i, "OTHER_COST" );
        $i++;
    }  // while loop ends her
?>
<div style="height:530px; width:250px; float:left; background:url(images/form_gredient.png);" align="left" id="introduction">
<table align="left" width="244">
<tr>
    <td width="85" align="left">&nbsp;&nbsp;<strong>Dish:</strong></td>
    <td width="147" align="left">
    <select style="width:145px;" id="dishid" name="dishid" onchange="show_recipe(this.value);">
    <option value="">Select Type</option>
    <?php
    
    $query1 = "SELECT * FROM dish_master_tab ORDER BY DISH_NAME ASC";
    $result1 = mysql_query($query1)or die("Failed :".mysql_error());
    $num1 = mysql_numrows($result1);
    $i=0;
    while($i < $num1)
    {
        $dish_id = mysql_result($result1,$i, "DISH_ID" );
        $dish_name = mysql_result($result1,$i, "DISH_NAME" );
        echo '<option value="'.$dish_id.'">'.$dish_name.'</option>';
		
        $i++;
    }  // while loop ends here
    ?>
    </select>
    </td>
    
</tr>
<tr>
    <td width="85" height="5" align="left">&nbsp;</td>
    <td id="catagory" width="147" align="left">&nbsp;</td>
</tr>
</table>
<div id="costing">
<table align="left" width="246">
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Category:</strong></td>
    <td id="food_type" width="125" align="left">&nbsp;</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Cooking Time:</strong></td>
    <td width="125" align="left" id="cookingtime">&nbsp;</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>ER Cost:</strong></td>
    <td width="125" align="left">&nbsp;</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>HR Cost:</strong></td>
    <td width="125" align="left">&nbsp;</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Other Cost:</strong></td>
    <td width="125" align="left">&nbsp;</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Ingredient Cost:</strong></td>
    <td width="125" align="left" id="costprice">&nbsp;</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Dish Cost:</strong></td>
    <td width="125" align="left" id="costprice">&nbsp;</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Sale Price:</strong></td>
    <td id="sale_price" width="125" align="left">&nbsp;</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Profit Margin % :</strong></td>
    <td id="sale_price" width="125" align="left">&nbsp;</td>
</tr>

<tr>
    <td width="109" height="5" align="left">&nbsp;</td>
    <td width="125" align="left">&nbsp;</td>
</tr>
</table>
</div>
<table align="left" width="243">
<tr>
    <td width="85" align="center"><strong>Add New Ingredient</strong></td> 
</tr>
<tr>
    <td width="85" height="5" align="left">&nbsp;</td>
</tr>
</table>

<table align="left" width="243" cellspacing="5">
<tr>
    <td width="85" align="left">&nbsp;&nbsp;<strong>Name:</strong></td>
    <td width="146" align="left">
    <select style="width:145px;" id="ing_name" name="ing_name">
  	<option value="">Select Title</option>
	  <?php
      
      $query1 = "SELECT * FROM store_master_tab ORDER BY INGREDIENT_NAME ASC";
      $result1 = mysql_query($query1)or die("Failed :".mysql_error());
      $num1 = mysql_numrows($result1);
      $i=0;
      while($i < $num1)
      {
          $ingredient_id = mysql_result($result1,$i, "INGREDIENT_ID" );
          $ingredient_name = mysql_result($result1,$i, "INGREDIENT_NAME" );
          $unit_id = mysql_result($result1,$i, "UNIT_ID" );
          echo '<option value="'.$ingredient_id.'">'.$ingredient_name.'</option>';
          $i++;
      }  // while loop ends here
      
      ?>
</select>
    </td>
    
</tr>
<tr>
    <td width="85" height="5" align="left">&nbsp;&nbsp;<strong>Quantity:</strong></td>
    <td width="146" align="left"><input type="text" name="quantity" id="quantity" size="19" /></td>
</tr>
<tr>
    <td width="85" align="left">&nbsp;</td>
    <td width="146" align="left">&nbsp;</td>
</tr>
<tr>
    <td width="85" height="5" align="left">&nbsp;</td>
    <td width="146" align="left"><a href="javascript:save_form()" alt="Add Ingredient" title="Add Ingredient">
    <img src="images/add.png" alt="Add Ingredient" width="60" height="25" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:refresh_form()" alt="Refresh Form" title="Refresh Form">
    <img src="images/refresh1.png" alt="Refresh Form" width="60" height="25" /></a></td>
</tr>

</table>
</div>

<div style="overflow:auto; height:530px; width:1000px; float:right; background-color:#DCECEF;" align="right" id="center">
<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="54" align="center"><strong>SR</strong></td>
    <td width="126" align="center"><strong>Ingredient Code</strong></td>
    <td width="299" align="center"><strong>Name</strong></td>
    <td width="100" align="center"><strong>Unit</strong></td>
    <td width="100" align="center"><strong>Required Quantity</strong></td>
    <td width="100" align="center"><strong>Purchased Price/Unit</strong></td>
    <td width="145" align="center"><strong>Cost Price</strong></td>
    <td width="70" align="center"><strong>Edit</strong></td>
	<td width="70" align="center"><strong>Delete</strong></td>
</tr>
</table>
<div style="overflow:auto; height:auto; width:1000px;" id="recipe">
<br>
</div>
</div>
 </div><!-- end of parent div -->
   <!-- end of middle column -->
        
        <!-- start of right column --><!-- end of content -->
        
</body>
</html>