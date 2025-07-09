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
include('../time_settings.php'); ?>
<?php

	//$ingredientid = $_POST['ingredientcode'];
	//$low_unit = $_POST['l_unit'];
	$quantity = $_POST['quantity'];
	$ing_name = $_POST['ing_name'];
	$dishid = $_POST['dishid'];
	
	#######   CODE FOR PICKING UNIT   #######
	
	$query1 = "SELECT store_master_tab.UNIT_ID, store_master_tab.LAST_PURCHASED_PRICE, unit_tab.UNIT_ID, unit_tab.LOW_UNIT, unit_tab.DIVISION_VALUE
FROM store_master_tab
INNER JOIN unit_tab
ON store_master_tab.UNIT_ID=unit_tab.UNIT_ID
WHERE store_master_tab.INGREDIENT_ID = '$ing_name'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$low_unit = mysql_result($result1,$i, "LOW_UNIT" );
		$div_value = mysql_result($result1,$i, "DIVISION_VALUE" );
		$i++;
	}  // while loop ends here
	
	$query = "SELECT * FROM store_master_tab WHERE INGREDIENT_ID = '$ing_name'";
	$result = mysql_query($query)or die("Failed :".mysql_error());
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$ing_id = mysql_result($result,$i, "INGREDIENT_ID" );
        $ing_name = mysql_result($result,$i, "INGREDIENT_NAME" );
		$last_purchased_price = mysql_result($result,$i, "LAST_PURCHASED_PRICE" );
		$last_demand_qty = mysql_result($result,$i, "LAST_DEMAND_QTY" );
		$i++;
	}  // while loop ends here
	
	if($last_demand_qty == 0)
	{
		$last_demand_qty = 1;
	}
	else
	{
		
	}
	//echo "Last P.P is".$last_purchased_price;
	$last_price_pr_q = $last_purchased_price/$last_demand_qty;
	$last_price_pr_q = round($last_price_pr_q, 2);
	$div_price_result = 0;
	//echo "Div value is ".$div_value;
	if($last_price_pr_q == 0)
	{
		$div_price_result = 0;
	}
	else
	{
		$div_price_result = ($last_price_pr_q * 1)/$div_value;
	}
	//echo "div_price_result = ".$div_price_result;
	$costprice = $div_price_result*$quantity; 
	
	$query2 = "INSERT INTO recipe_tab ( DISH_ID, INGREDIENT_CODE, INGREDIENT_NAME, UNIT, DIVISION_VALUE, REQUIRED_QUANTITY, PURCHASED_PRICE_UNIT, COST_PRICE, CREATED_ON, EDITED_ON) 
	VALUES('$dishid', '$ing_id', '$ing_name', '$low_unit', '$div_val', '$quantity', '$div_price_result', '$costprice', NOW(), NOW())";
	mysql_query($query2) or die("Failed 2: ".mysql_error());
	
	#######   CODE FOR PICKING FOOD TYPE   #######
	
	$query1 = "SELECT dish_master_tab.DISH_ID, dish_master_tab.FOOD_TYPE_ID, food_type_tab.FOOD_TYPE_ID, food_type_tab.FOOD_TYPE_DETAIL
FROM dish_master_tab
INNER JOIN food_type_tab
ON dish_master_tab.FOOD_TYPE_ID=food_type_tab.FOOD_TYPE_ID
WHERE dish_master_tab.DISH_ID = '$dishid'";

	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$food_type = mysql_result($result1,$i, "FOOD_TYPE_DETAIL" );
		//$ingredient_code = mysql_result($result1,$i, "INGREDIENT_CODE" );
		$i++;
	}  // while loop ends here
	
	#######   CODE FOR PICKING COOKING TIME AND SALE PRICE   #######
	//echo 'Value is '.$value;
	$query2 = "SELECT dish_master_tab.DISH_ID, dish_master_tab.DISH_NAME, dish_master_tab.COOKING_TIME, dish_charges_history.DISH_ID, 
				dish_charges_history.DISH_CHARGES, dish_charges_history.CHARGES_ON_DATE, 
				dish_charges_history.CHARGES_OFF_DATE 
				FROM dish_master_tab, dish_charges_history 
				WHERE dish_master_tab.DISH_ID = dish_charges_history.DISH_ID 
				AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
				AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' 
				AND dish_master_tab.DISH_ID = '$dishid' 
				ORDER BY dish_master_tab.DISH_ID";

	$result2 = mysql_query($query2) or die("Failed :".mysql_error());
	$num2 = mysql_num_rows($result2);
	//echo 'Num is '.$num2;
	$i=0;
	while($i < $num2)
	{
		$dish_name = mysql_result($result2,$i, "dish_master_tab.DISH_NAME" );
		$cooking_time = mysql_result($result2,$i, "dish_master_tab.COOKING_TIME" );
		$sale_price = mysql_result($result2,$i, "dish_charges_history.DISH_CHARGES" );
		$i++;
	}  // while loop ends here
	//echo 'Price is '.$sale_price;
	#######   CODE FOR PICKING COST PRICE   #######
	
	$query4 = "SELECT * FROM recipe_tab WHERE DISH_ID = '$dishid'";
	$result4 = mysql_query($query4)or die("Failed :".mysql_error());
	$num4 = mysql_numrows($result4);
	$k=0;
	$t_cost=0;
	while($k < $num4)
	{
		$cost_values = mysql_result($result4,$k, "COST_PRICE" ); 
		$t_cost = $t_cost + $cost_values;
		$k++;
	}  // while loop ends here
	$total_cost = round($t_cost, 3);
	
	#######   CODE FOR PICKING ENERGY/HR/OTHER COSTS   #######
	
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
	
	$dish_cost = $energy + $hr + $other + $total_cost;
	$profit = ($dish_cost/$sale_price) * 100;
	$profit = round($profit, 2);
	
	//$food_type = $_POST['foodtype'];
	//$sale_price = $_POST['saleprice'];
	//$div_val = $_POST['divval'];
?>

<div style="height:530px; width:250px; float:left; background:url(images/form_gredient.png);" align="left" id="introduction">
<table align="left" width="244">
<tr>
    <td width="85" align="left">&nbsp;&nbsp;<strong>Dish:</strong></td>
    <td width="147" align="left"><?php echo $dish_name; ?>
    <input type="hidden" id="dishid" name="dishid" value="<?php echo $dishid; ?>" /></td> 
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
    <td width="125" align="left"><?php echo $food_type; ?></td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Cooking Time:</strong></td>
    <td width="125" align="left"><?php echo $cooking_time; ?></td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>ER Cost:</strong></td>
    <td width="125" align="left"><?php echo $energy; ?></td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>HR Cost:</strong></td>
    <td width="125" align="left"><?php echo $hr; ?></td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Other Cost:</strong></td>
    <td width="125" align="left"><?php echo $other; ?></td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Ingredient Cost:</strong></td>
    <td width="125" align="left"><?php echo $total_cost; ?></td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Dish Cost:</strong></td>
    <td width="125" align="left"><?php echo $dish_cost; ?></td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Sale Price:</strong></td>
    <td width="125" align="left"><?php echo $sale_price; ?></td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Profit Margin % :</strong></td>
    <td width="125" align="left"><?php echo $profit; ?></td>
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
    <img src="images/add.png" alt="Add Ingredient" /></a>&nbsp;&nbsp;&nbsp;<a href="javascript:refresh_form()" alt="Refresh Form" title="Refresh Form">
    <img src="images/refresh1.png" alt="Refresh Form" width="60" height="25" /></a></td>
</tr>

</table>
</div>

<div style="overflow:auto; height:530px; width:759px; float:right; background-color:#DCECEF;" align="right" id="center">
<table width="759" align="left" class="altrowstable" id="alternatecolor" >
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
<div style="overflow:auto; height:auto; width:759px;" id="recipe">
<?php
$query1 = "SELECT * FROM recipe_tab WHERE DISH_ID = '$dishid' ORDER BY EDITED_ON ASC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	//while($row = mysql_fetch_array($image))
	echo "<table border='0' class='altrowstable' id='alternatecolor' >";
	while($i < $num1)
	{
		$j = $i + 1;
		$ingredient_id = mysql_result($result1,$i, "INGREDIENT_ID" );
		$ingredient_code = mysql_result($result1,$i, "INGREDIENT_CODE" );
		$ingredient_name = mysql_result($result1,$i, "INGREDIENT_NAME" );
		$unit = mysql_result($result1,$i, "UNIT" );
		$divval = mysql_result($result1,$i, "DIVISION_VALUE" );
		$required_quantity = mysql_result($result1,$i, "REQUIRED_QUANTITY" );
		$purchased_price_unit = mysql_result($result1,$i, "PURCHASED_PRICE_UNIT" );
		$rpurchased_price_unit = round($purchased_price_unit, 4);
		$cost_price = mysql_result($result1,$i, "COST_PRICE" );
		$rcost_price = round($cost_price, 4);
		 // while loop ends here
echo "<tr>";
echo "<td width='54px' align='center'>".$j."</td>";
echo "<td width='124px' align='center'>".$ingredient_code."</td>";
echo "<td width='284px' class='padding1'>".$ingredient_name."</td>";
echo "<td width='100px' align='center'>".$unit."</td>";
echo "<td width='100px' align='center'>".$required_quantity."</td>";
echo "<td width='100px' align='center'>".$rpurchased_price_unit."</td>";
echo "<td width='140px' align='center'>".$rcost_price."</td>";
echo "<td width='70px' align='center'>"; echo '<a href="javascript:showPopup('.$ingredient_code.')" alt="Edit" title="Edit"><img width="25" height="25" SRC="images/edit_ing.png" alt="Edit"/>'; echo "</td>";
echo "<td width='70px' align='center'>"; echo '<a href="javascript:delete_ingredient('.$dishid.','.$ingredient_code.','.$required_quantity.','.$divval.')" alt="Delete" title="Delete"><img width="25" height="25" SRC="images/remove.png" alt="Delete"/>'; echo "</td>";
echo "</tr>";
echo "<div id='overlay' class='overlay'></div>";
echo '<div id=popup'.$ingredient_code.' class=popup>
<input type=text id='.$ingredient_code.' value="'.$required_quantity.'" />
<button onclick=sub_update('.$dishid.','.$ingredient_code.')>submit</button>
<a href=javascript:closePopup('.$ingredient_code.')>
<img width=25 height=25 SRC=images/remove.png alt=Delete/></a>
</div>';
$i++;
	} 
	echo "</table>";
	
	?>
</div>
</div>