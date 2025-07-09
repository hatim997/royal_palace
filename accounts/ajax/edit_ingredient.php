<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
//$userid = $_SESSION['username'];
//$password = $_SESSION['password'];
?>
<?php
	
	$ingredient_code = $_POST['ingredient_code'];
	$dish_id = $_POST['dish_id'];
	$sale_price = $_POST['saleprice'];
	$food_type = $_POST['foodtype'];
	$low_unit = $_POST['l_unit'];
	$required_quantity = $_POST['required_quantity'];
	$ing_name = $_POST['ing_name'];
	$divval = $_POST['divval'];
	//echo $id."<br>";
	######## TRANSACTION INFORMATION CODE ########
	//echo "Name is ".$g_name."<br>";
	//echo '<h1 class="style1" style=" font-size:14px;">Edit Dish Quantity</h1>';
		
	echo '<form name="editform" id="editform" action="ajax/edit_save_ingredient.php" method="post">
		  <table width="490" align="center" border="0" cellpadding="0" cellspacing="0">	  
  <tr>
	<td width="170" align="left">Old Required Quantity:</td>
	<td width="270" align="left"><input type="text" id="quantity" name="quantity" value="'.$required_quantity.'" />
	<input type="hidden" id="dish_id" name="dish_id" value="'.$dish_id.'" />
	<input type="hidden" id="ingredient_code" name="ingredient_code" value="'.$ingredient_code.'" />
	<input type="hidden" name="foodtype" id="foodtype" value="'.$food_type.'" readonly="readonly"/>
	<input type="hidden" name="saleprice" id="saleprice" value="'.$sale_price.'" readonly="readonly"/>
	<input type="hidden" name="divval" value="'.$divval.'" id="divval" />
	</td>
  </tr>
  
  <tr>
	<td width="120" align="left">New Required Quantity:</td>
	<td width="270" align="left">
	<input type="text" id="new_req_quantity" name="new_req_quantity"/>
	</td>
  </tr>
  
   <tr align="center">                    
	<td align="left" width="120" valign="top">&nbsp;</td>
	<td align="left" width="270" valign="bottom"><input type="button" onclick="edit_save_ingredient('.$dish_id.','.$ingredient_code.','.$required_quantity.','.$divval.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Save" /></td>
  </tr>
  </table>
  </form>';
?>