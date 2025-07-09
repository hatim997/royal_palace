<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<!-- Javascript goes in the document HEAD -->



<!-- CSS goes in the document HEAD or added to your external stylesheet -->



<body>

<?php include('../config.php');
include('../time_settings.php'); 
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
    <img src="images/refresh.png" alt="Refresh Form" width="60" height="25" /></a></td>
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