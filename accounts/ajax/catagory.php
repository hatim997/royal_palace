<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];
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
	$code = $food_type;
	echo "<table border='0'>";
echo "<tr>";
echo "<td width='200px' align='left'>".$code."</td>";
echo "</tr>";
echo "</table>";
echo '<input type="hidden" name="food_typebox" id="food_typebox" value="'.$code.'" readonly="readonly"/>';
?>