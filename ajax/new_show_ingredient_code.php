<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];
	$query1 = "SELECT * FROM store_master_tab WHERE INGREDIENT_ID = '$value' ORDER BY INGREDIENT_NAME ASC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$ingredient_id = mysql_result($result1,$i, "INGREDIENT_ID" );
		//$ingredient_code = mysql_result($result1,$i, "INGREDIENT_CODE" );
		$i++;
	}  // while loop ends here
	$code = $ingredient_id;
	echo '<input type="text" name="ingredientcode" id="ingredientcode" value="'.$code.'" readonly="readonly"/>';
?>