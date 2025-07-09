<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$ingredient = $_POST['ingredient'];
	$dish = $_POST['dish'];
	//echo $id."<br>";
	$query = "SELECT * FROM store_master_tab WHERE INGREDIENT_ID = '$ingredient' ORDER BY INGREDIENT_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());
	$num = mysql_numrows($result);
	$i = 0;
	while ($i < $num)
	{
		$ing_name = mysql_result($result,$i, "INGREDIENT_NAME" );
		$i++;
	}
	
	$query = "SELECT dish_ingredient_tab.INGREDIENT_VOL, unit_tab.UNIT_ID, unit_tab.UNIT_DETAIL 
				FROM dish_ingredient_tab, unit_tab 
				WHERE dish_ingredient_tab.UNIT_ID = unit_tab.UNIT_ID
				AND dish_ingredient_tab.DISH_ID = '$dish' 
				AND dish_ingredient_tab.INGREDIENT_ID = '$ingredient' 
				ORDER BY DISH_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());
	$num = mysql_numrows($result);
	$i = 0;
	while ($i < $num)
	{
		$vol = mysql_result($result,$i, "dish_ingredient_tab.INGREDIENT_VOL" );
		$unit_id = mysql_result($result,$i, "unit_tab.UNIT_ID" );
		$unit_name = mysql_result($result,$i, "unit_tab.UNIT_DETAIL" );
		$i++;
	}
	//echo "Name is ".$g_name."<br>";
	//echo '<h1 class="style1" style=" font-size:14px;">Edit Dish Quantity</h1>';
		
	echo '<form name="testform" id="testform" action="de_client_master.php" method="post">
		  <table width="390" align="center" border="0" cellpadding="0" cellspacing="0">
		  
  <tr>
	<td width="120" align="left">Ingredient:</td>
	<td width="270" align="left"><input type="text" id="name" name="name" value="'.$ing_name.'" readonly="readonly" /></td>
  </tr>
  <tr height="3%">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td width="120" align="left">Volume:</td>
	<td width="270" align="left"><input type="text" id="volume" name="volume" value="'.$vol.'" /></td>
  </tr>
  <tr height="3%">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td width="120" align="left">Unit:</td>
	<td width="270" align="left">
	<select name="unit_id" id="unit_id">
	  <option value="'.$unit_id.'">'.$unit_name.'</option>';
	  $query = "SELECT * from unit_tab ORDER BY UNIT_DETAIL ASC";
	  $result = mysql_query($query) or die("Error: ".mysql_error());
	  $num = mysql_num_rows($result);//get total number of records
	  $i = 0;
	  while($i < $num)//check till i is less than number of records
	  {
		  $id = mysql_result($result, $i, "UNIT_ID");//from the array[$i] pick column(disease_id)
		  $name=mysql_result($result,$i,"UNIT_DETAIL");
		  echo '<option value="'.$id.'">'.$name.'</option>';
		  $i++;
	  }
	  echo '</select></td>	  
  </tr>
  <tr height="3%">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr align="center">                    
	<td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
	<td align="left" width="270" valign="bottom"><input type="button" onclick="save_dish_quantity(this.form)" class="button" align="left" style="cursor:pointer"name="Submit" value="Save" /><input type="button" onclick="show_order_detail1('.$orderno.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Cancel" /></td>
  </tr>
  </table>
  <input type="hidden" id="dish" name="dish" value="'.$dish.'" />
  <input type="hidden" id="ingredient" name="ingredient" value="'.$ingredient.'" />
  </form>';
?>