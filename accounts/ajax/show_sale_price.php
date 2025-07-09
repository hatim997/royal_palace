<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$value = $_POST['value'];
	$query1 = "SELECT dish_master_tab.DISH_ID, dish_charges_history.DISH_ID, dish_charges_history.DISH_CHARGES, dish_charges_history.CHARGES_ON_DATE, dish_charges_history.CHARGES_OFF_DATE
FROM dish_master_tab, dish_charges_history
WHERE dish_master_tab.DISH_ID = dish_charges_history.DISH_ID
AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date'
AND dish_master_tab.DISH_ID = '$value' 
ORDER BY dish_master_tab.DISH_ID";

	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$sale_price = mysql_result($result1,$i, "dish_charges_history.DISH_CHARGES" );
		$i++;
	}  // while loop ends here
	$code = $sale_price;
	echo "<table border='0'>";
echo "<tr>";
echo "<td width='200px' align='left'>".$code."</td>";
echo "</tr>";
echo "</table>";
echo '<input type="hidden" name="sale_pricebox" id="sale_pricebox" value="'.$code.'" readonly="readonly"/>';
?>