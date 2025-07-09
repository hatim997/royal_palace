<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];
	$dish_id = $value;
	$query1 = "SELECT * FROM recipe_tab WHERE DISH_ID = '$value' ORDER BY EDITED_ON ASC";
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
echo "<td width='70px' align='center'>"; echo '<a href="javascript:delete_ingredient('.$dish_id.','.$ingredient_code.','.$required_quantity.','.$divval.')" alt="Delete" title="Delete"><img width="25" height="25" SRC="images/remove.png" alt="Delete"/>'; echo "</td>";
echo "</tr>";
echo "<div id='overlay' class='overlay'></div>";
echo '<div id=popup'.$ingredient_code.' class=popup>
<input type=text id='.$ingredient_code.' value="'.$required_quantity.'" />
<button onclick=sub_update('.$dish_id.','.$ingredient_code.')>submit</button>
<a href=javascript:closePopup('.$ingredient_code.')>
<img width=25 height=25 SRC=images/remove.png alt=Delete/></a>
</div>';
$i++;
	} 
	echo "</table>";
	
	
?>