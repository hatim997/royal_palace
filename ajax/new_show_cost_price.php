<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$value = $_POST['value'];
	$query4 = "SELECT * FROM recipe_tab WHERE DISH_ID='$value'";
	$result4 = mysql_query($query4)or die("Failed :".mysql_error());
	$num4 = mysql_numrows($result4);
	$k=0;
	$t_cost=0;
	while($k < $num4)
	{
		$cost_values = mysql_result($result4,$k, "COST_PRICE" ); 
		$t_cost=$t_cost+$cost_values;
		$k++;
	}  // while loop ends here
	$total_cost = round($t_cost, 3);
	
	echo "<table border='0'>";
echo "<tr>";
echo "<td width='200px' align='left'>".$total_cost."</td>";
echo "</tr>";
echo "</table>";
echo '<input type="hidden" name="cost_pricebox" id="cost_pricebox" value="'.$total_cost.'" readonly="readonly"/>';
?>