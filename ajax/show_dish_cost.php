<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$value = $_POST['value'];
	
	#######   CODE FOR PICKING FOOD TYPE   #######
	
	$query1 = "SELECT dish_master_tab.DISH_ID, dish_master_tab.FOOD_TYPE_ID, food_type_tab.FOOD_TYPE_ID, food_type_tab.FOOD_TYPE_DETAIL
FROM dish_master_tab
INNER JOIN food_type_tab
ON dish_master_tab.FOOD_TYPE_ID=food_type_tab.FOOD_TYPE_ID
WHERE dish_master_tab.DISH_ID = '$value'";

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
	$query2 = "SELECT dish_master_tab.DISH_ID, dish_master_tab.COOKING_TIME, dish_charges_history.DISH_ID, 
				dish_charges_history.DISH_CHARGES, dish_charges_history.CHARGES_ON_DATE, 
				dish_charges_history.CHARGES_OFF_DATE 
				FROM dish_master_tab, dish_charges_history 
				WHERE dish_master_tab.DISH_ID = dish_charges_history.DISH_ID 
				AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
				AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' 
				AND dish_master_tab.DISH_ID = '$value' 
				ORDER BY dish_master_tab.DISH_ID";

	$result2 = mysql_query($query2) or die("Failed :".mysql_error());
	$num2 = mysql_num_rows($result2);
	//echo 'Num is '.$num2;
	$i=0;
	while($i < $num2)
	{
		$cooking_time = mysql_result($result2,$i, "dish_master_tab.COOKING_TIME" );
		$sale_price = mysql_result($result2,$i, "dish_charges_history.DISH_CHARGES" );
		$i++;
	}  // while loop ends here
	//echo 'Price is '.$sale_price;
	#######   CODE FOR PICKING COST PRICE   #######
	
	$query4 = "SELECT * FROM recipe_tab WHERE DISH_ID = '$value'";
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
	
	
	
	echo '<table align="left" width="246">
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Category:</strong></td>
    <td width="125" align="left">'.$food_type.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Cooking Time:</strong></td>
    <td width="125" align="left">'.$cooking_time.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>ER Cost:</strong></td>
    <td width="125" align="left">'.$energy.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>HR Cost:</strong></td>
    <td width="125" align="left">'.$hr.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Other Cost:</strong></td>
    <td width="125" align="left">'.$other.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Ingredient Cost:</strong></td>
    <td width="125" align="left">'.$total_cost.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Dish Cost:</strong></td>
    <td width="125" align="left">'.$dish_cost.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Sale Price:</strong></td>
    <td width="125" align="left">'.$sale_price.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;&nbsp;<strong>Profit Margin % :</strong></td>
    <td width="125" align="left">'.$profit.'</td>
</tr>
<tr>
    <td width="109" height="5" align="left">&nbsp;</td>
    <td width="125" align="left">&nbsp;</td>
</tr>
</table>';
	
echo '<input type="hidden" name="food_typebox" id="food_typebox" value="'.$code.'" readonly="readonly"/>';
?>