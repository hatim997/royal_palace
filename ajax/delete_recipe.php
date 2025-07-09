<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$restid = $_SESSION['restid'];
	//$guest = $_POST['guest'];
	$ingredient = $_POST['ingredient'];
	$dish = $_POST['dish'];
	//echo $orderno." and dish id is ".$dish;
	
	$query = "DELETE FROM dish_ingredient_tab WHERE DISH_ID = '$dish' AND INGREDIENT_ID = '$ingredient'";
	mysql_query($query) or die('Deletion Failed:'.mysql_error());
	
	$query = "SELECT dish_ingredient_tab.DISH_ID, dish_ingredient_tab.INGREDIENT_VOL, 
				store_master_tab.INGREDIENT_ID, store_master_tab.INGREDIENT_NAME,
				unit_tab.UNIT_ID, unit_tab.UNIT_DETAIL
				FROM dish_ingredient_tab, store_master_tab, unit_tab
				WHERE dish_ingredient_tab.INGREDIENT_ID = store_master_tab.INGREDIENT_ID 
				AND dish_ingredient_tab.UNIT_ID = unit_tab.UNIT_ID 
				AND dish_ingredient_tab.DISH_ID = '$dish'
				ORDER BY store_master_tab.INGREDIENT_NAME ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());
	
	$num = mysql_num_rows($result);
	if($num == 0)
	{
		echo '<h1 class="style1" style=" font-size:14px;">Ingredients not defined</h1>';
	}
	else
	{	
		echo '<div id="del_dish" align="center" style="overflow:auto; width:520px">
		<table width="500" align="center" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
		<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Dish Recipe</i></b></td></tr>
		</table></div>';
		echo '<div id="del_dish" align="center" style="overflow:auto; height:150px; width:520px">
              <table width="500" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="210" align="center"><strong>Ingredient</strong></td>
					<td width="80" align="center"><strong>Volume</strong></td>
					<td width="90" align="center"><strong>Unit</strong></td>
					<td width="80" align="center"><strong>Edit</strong></td>
					<td width="80" align="center"><strong>Delete</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$dish = mysql_result($result,$i, "dish_ingredient_tab.DISH_ID" );
				$item_id = mysql_result($result,$i, "store_master_tab.INGREDIENT_ID" );
				$item_name = mysql_result($result,$i, "store_master_tab.INGREDIENT_NAME" );
				$volume = mysql_result($result,$i, "dish_ingredient_tab.INGREDIENT_VOL" );
				$unit = mysql_result($result,$i, "unit_tab.UNIT_DETAIL" );
				
				echo '<tr>
				  <td width="210" align="left">&nbsp;'.$item_name.'</td>                            
				  <td width="80" align="left">&nbsp;'.$volume.'</td>
				  <td width="90" align="left">&nbsp;'.$unit.'</td>
				  <td width="80" align="center"><a href="javascript:edit_quantity('.$dish.','.$item_id.')" alt="Edit" title="Edit"><img src="images/edit.png" height="25" width="25" alt="Delete" /></a></td>
				  <td width="80" align="center"><a href="javascript:delete_dish('.$dish.','.$item_id.')" alt="Delete" title="Delete"><img src="images/delete.png" height="25" width="25" alt="Delete" /></a></td>  
				</tr>';
				$i++;
			} // while ends here
			echo '</table></div>';
	}
?>