<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];		
	$query1 = "SELECT store_master_tab.UNIT_ID, store_master_tab.LAST_PURCHASED_PRICE, unit_tab.UNIT_ID, unit_tab.LOW_UNIT, unit_tab.DIVISION_VALUE
FROM store_master_tab
INNER JOIN unit_tab
ON store_master_tab.UNIT_ID=unit_tab.UNIT_ID
WHERE store_master_tab.INGREDIENT_ID = '$value'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$unit = mysql_result($result1,$i, "LOW_UNIT" );
		$division_value = mysql_result($result1,$i, "DIVISION_VALUE" );
		$i++;
	}  // while loop ends here
	$code = $unit;
	echo '<input type="text" name="low_unit" id="low_unit" value="'.$code.'" readonly="readonly"/>';
	echo '<input type="hidden" name="div_val" id="div_val" value="'.$division_value.'" readonly="readonly"/>';
?>