<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<!-- Javascript goes in the document HEAD -->



<!-- CSS goes in the document HEAD or added to your external stylesheet -->



<body>

<?php include('../config.php');
include('../time_settings.php'); ?>
<?php

	$ingredientid = $_POST['ingredient_code'];
	$dishid = $_POST['dish_id'];
	$sale_price = $_POST['saleprice'];
	$food_type = $_POST['foodtype'];
	$low_unit = $_POST['l_unit'];
	$quantity = $_POST['required_quantity'];
	$new_req_quantity = $_POST['new_req_quantity'];
	$divval = $_POST['divval'];
	
	?>
    
<div style="border: 1px solid black; height:65px; width:1000px;" align="center" id="introduction">
       <table align="left" width="998">
<tr>
    <td width="102" height="25" align="left">&nbsp;&nbsp; Dish:</td>
    <td width="185" align="left">
    <?php
	$query = "SELECT * FROM dish_master_tab WHERE DISH_ID= '$dishid'";
	$result = mysql_query($query)or die("Failed :".mysql_error());
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$dish_id = mysql_result($result,$i, "DISH_ID" );
        $dish_name = mysql_result($result,$i, "DISH_NAME" );
		
		$i++;
	}  // while loop ends here
	echo $dish_name;
    ?>
    
    </td>
    <td width="441" height="25" align="left">&nbsp;</td>
    <td width="83" height="25" align="left">Sale Price:</td>
    <td width="163" align="left"><div style="overflow:auto; height:auto; width:200px;" id="sale_price">
<?php echo $sale_price; ?>
</div></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;Catagory:</td>
    <td id="catagory" width="185" align="left">
    <div style="overflow:auto; height:auto; width:200px;" id="food_type">
<?php echo $food_type; ?>
<input type="hidden" name="food_typebox" id="food_typebox" value="<?php echo $food_type; ?>" readonly="readonly"/>
<input type="hidden" name="sale_pricebox" id="sale_pricebox" value="<?php echo $sale_price; ?>" readonly="readonly"/>
<input type="hidden" name="div_val" value="<?php echo $divval; ?>" id="div_val" />
<input type="hidden" name="dishid" id="dishid" value="<?php echo $dishid; ?>" />
</div>
    </td>
    
    <td width="441" height="25" align="center">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width="83" height="5" align="left">Cost Price:</td>
    <td width="163" align="left"><div style="overflow:auto; height:auto; width:200px;" id="costprice">
    <?php
 	
	$query = "SELECT * FROM store_master_tab WHERE INGREDIENT_ID= '$ingredientid'";
	$result = mysql_query($query)or die("Failed :".mysql_error());
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$ing_id = mysql_result($result,$i, "INGREDIENT_ID" );
        $ing_name = mysql_result($result,$i, "INGREDIENT_NAME" );
		$last_purchased_price = mysql_result($result,$i, "LAST_PURCHASED_PRICE" );
		$last_demand_qty = mysql_result($result,$i, "LAST_DEMAND_QTY" );
		$i++;
	}  // while loop ends here
	$last_demand_qty;
	$last_purchased_price;
	if($last_demand_qty==0)
	$last_demand_qty=1;
	$last_price_pr_q=$last_purchased_price/$last_demand_qty;
	$div_price_result=$last_price_pr_q/$divval; 
	$costprice=$div_price_result*$new_req_quantity; 	
$query2 = "UPDATE recipe_tab SET REQUIRED_QUANTITY='$new_req_quantity', PURCHASED_PRICE_UNIT='$div_price_result',COST_PRICE='$costprice'  WHERE DISH_ID = '$dishid' && INGREDIENT_CODE = '$ingredientid' ";
	$result2 = mysql_query($query2)or die("Failed :".mysql_error());
	$query4 = "SELECT * FROM recipe_tab WHERE DISH_ID='$dishid'";
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
	
	$total_cost = round($t_cost, 4);
	echo $total_cost;
    ?>
    </div></td>
</tr>
</table></div>
<br />
<div style="border: 1px solid black; overflow:auto; height:380px; width:1000px;" align="center" id="center">
<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="54" align="center"><strong>SR</strong></td>
    <td width="126" align="center"><strong>Ingredient Code</strong></td>
    <td width="299" align="center"><strong>Name</strong></td>
    <td width="100" align="center"><strong>Unit</strong></td>
    <td width="100" align="center"><strong>Required Quantity</strong></td>
    <td width="100" align="center"><strong>Purchased Price/Unit</strong></td>
    <td width="145" align="center"><strong>Cost Price</strong></td>
    <td width="70" align="center"><strong>Edit</strong></td>
	<td width="70" align="center"><strong>Delete</strong></td>
</tr>



</table>
<div style="overflow:auto; height:auto; width:1000px;" id="recipe">
<?php
$query1 = "SELECT * FROM recipe_tab WHERE DISH_ID = '$dishid' ORDER BY EDITED_ON ASC";
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
echo "<td width='70px' align='center'>"; echo '<a href="javascript:edit_ingredient('.$dish_id.','.$ingredient_code.','.$required_quantity.','.$divval.')" alt="Edit" title="Edit"><img width="25" height="25" SRC="images\edit_ing.png" alt="Edit"/>'; echo "</td>";
echo "<td width='70px' align='center'>"; echo '<a href="javascript:delete_ingredient('.$dish_id.','.$ingredient_code.','.$required_quantity.','.$divval.')" alt="Delete" title="Delete"><img width="22" height="22" SRC="images\remove.png" alt="Delete"/>'; echo "</td>";
echo "</tr>";
$i++;
	}
	echo "</table>";
	
	?> 
</div>
 </div>
<br />

<div style="border: 1px solid black; height:80px; width:1000px; " align="center" class="padding1">
  <table width="1000" align="left" border="0">
<tr>
      <td width="194" >Ingredient Code</td>
      <td width="164">Name:</td>
      <td width="184">Unit:</td>
      <td width="186">Required Quantity:</td>
      <td width="100"></td>
      <td width="100"></td>
  </tr>
  <tr>
  <td id="show_ingredient_code" valign="top" style="padding-top:10px;"><input type="text" name="ingredientcode" id="ingredientcode" readonly="readonly"/>
  </td>
  <td valign="top" style="padding-top:10px;"><select style="width:145px;" id="ing_name" name="ing_name" onchange="ingredientname(this.value);">
  <option value="">Select Title</option>
<?php

$query1 = "SELECT * FROM store_master_tab ORDER BY INGREDIENT_NAME ASC";
$result1 = mysql_query($query1)or die("Failed :".mysql_error());
$num1 = mysql_numrows($result1);
$i=0;
while($i < $num1)
{
	$ingredient_id = mysql_result($result1,$i, "INGREDIENT_ID" );
	$ingredient_name = mysql_result($result1,$i, "INGREDIENT_NAME" );
	$unit_id = mysql_result($result1,$i, "UNIT_ID" );
	echo '<option value="'.$ingredient_id.'">'.$ingredient_name.'</option>';
	$i++;
}  // while loop ends here

?>
</select></td>
<td id="unit" valign="top" style="padding-top:10px;">
<input type="text" name="low_unit" id="low_unit" readonly="readonly"/>
  </td>
  <td valign="top" style="padding-top:10px;"><input type="text" name="quantity" id="quantity" /></td>
  <td valign="top" style="padding-top:10px;">
  <a href="javascript:save_form()" alt="Add Ingredient" title="Add Ingredient">
				  <table>
  <tr>
  <td>
		  <img src="images/add.png" alt="Add Ingredient" width="35" height="28" />
  </td>
  <td>
         <font color="#000000">Add</font>
          </td>
          </tr>
          </table></a>
  </td>
  <td>  <a href="javascript:cancel_form()" alt="Cancel Ingredient" title="Cancel Ingredient">
		 <table>
  <tr>
  <td>
		  <img src="images/cancel.png" alt="Cancel Ingredient" width="35" height="28" />
  </td>
  <td>
          <font color="#000000">Cancel</font>
          </td>
          </tr>
          </table></a>
  </tr>
  

</table></div>

	</div><!-- end of parent div -->


</body>
</html>