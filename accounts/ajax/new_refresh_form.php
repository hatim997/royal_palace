<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
//include('../update_activity.php');
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
<link href="../templatemo_style7.css" rel="stylesheet" type="text/css" />

<link href="../bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../bonbon_buttons/buttons.css">

<link rel="stylesheet" type="text/css" href="../tigra_calendar/1-simple-calendar/tcal.css" />

<link href="../calendar.css" rel="stylesheet" type="text/css">
</head>

<body>



<div id="templatemo_container" align="center">
   
    <?php //include("../includes/header2.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
        
       
    	  
    	  
 <div id="parent">
 

 
<div style="border: 1px solid black; height:65px; width:1000px;" align="center" id="introduction">
       <table align="left" width="998">
<tr>
    <td width="102" height="25" align="left">&nbsp;&nbsp; Dish:</td>
    <td width="185" align="left">
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
    <td width="441" height="25" align="left">&nbsp;</td>
    <td width="83" height="25" align="left">Sale Price:</td>
    <td width="163" align="left"><div style="overflow:auto; height:auto; width:200px;" id="sale_price">
<br><input type="hidden" name="sale_pricebox" id="sale_pricebox" readonly="readonly"/>
</div></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;Catagory:</td>
    <td id="catagory" width="185" align="left">
    <div style="overflow:auto; height:auto; width:200px;" id="food_type"><br>
<input type="hidden" name="food_typebox" id="food_typebox" readonly="readonly"/>
</div>

    </td>
    
    <td width="441" height="25" align="center">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width="83" height="5" align="left">Cost Price:</td>
    <td width="163" align="left">
    <div style="overflow:auto; height:auto; width:200px;" id="costprice">
<br>
</div>
    </td>
</tr>



</table></div>

<br />
<div style="border: 1px solid black; overflow:auto; height:380px; width:1000px;" align="center" id="center">
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
<br />

<div style="border: 1px solid black; height:80px; width:1000px; " align="center">
  <table width="1000" align="left" border="0">
<tr>
      <td width="194" >Ingredient Code</td>
      <td width="164">Name:</td>
      <td width="184">Unit:</td>
      <td width="186">Required Quantity:</td>
      <td width="100"></td>
      <td width="100"></td>
  </tr>
  <tr>
  <td id="show_ingredient_code" valign="top" style="padding-top:10px;"><input type="text" name="ingredientcode" id="ingredientcode" readonly="readonly"/>
  </td>
  <td valign="top" style="padding-top:10px;"><select style="width:145px;" id="ing_name" name="ing_name" onchange="ingredientname(this.value);">
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
</select></td>
<td id="unit" valign="top" style="padding-top:10px;">
<input type="text" name="low_unit" id="low_unit" readonly="readonly"/><input type="hidden" name="div_val" id="div_val" />
  </td>
  <td valign="top" style="padding-top:10px;"><input type="text" name="quantity" id="quantity" /></td>
  <td style="padding-top:10px;" align="left" valign="middle">
  <a href="javascript:save_form()" alt="Add Ingredient" title="Add Ingredient">
  
  
				  
                  <table>
  <tr>
  <td>
		  <img src="images/add.png" alt="Add Ingredient" />
  </td>
  
          </tr>
          </table>
                  </a>
  </td>
  <td align="left" valign="middle" style="padding-top:10px;">  <a href="javascript:cancel_form()" alt="Cancel Ingredient" title="Cancel Ingredient">
  <table>
  <tr>
  <td>
		  <img src="images/cancel.png" alt="Cancel Ingredient" />
  </td>
  
          </tr>
          </table>
          </a>
          
          
  </tr>
  

</table></div>

	</div><!-- end of parent div -->
   <!-- end of middle column -->
        
        <!-- start of right column --><!-- end of content -->
</body>
</html>