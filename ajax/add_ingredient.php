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

	$ingredientid = $_POST['ingredientcode'];
	$low_unit = $_POST['l_unit'];
	$quantity = $_POST['quantity'];
	$ing_name = $_POST['ing_name'];
	$dishid = $_POST['dishid'];
	$food_type = $_POST['foodtype'];
	$sale_price = $_POST['saleprice'];
	$div_val = $_POST['divval'];
	?>

	<div style="border: 1px solid black; height:65px; width:1000px;" align="center" id="introduction">
		<table align="left" width="998">
			<tr>
				<td width="102" height="25" align="left">&nbsp;&nbsp; Dish:</td>
				<td width="185" align="left">
					<?php
					$query = "SELECT * FROM dish_master_tab WHERE DISH_ID= '$dishid'";
					$result = mysqli_query($conn, $query) or die("Failed :" . mysqli_error($conn));
					$num = mysqli_num_rows($result);
					$i = 0;
					while ($i < $num) {
						mysqli_data_seek($result, $i);
						$row = mysqli_fetch_assoc($result);
						$dish_id = $row['DISH_ID'];
						$dish_name = $row['DISH_NAME'];
						$i++;
					}  // while loop ends here
					echo $dish_name;
					?>


				</td>
				<td width="441" height="25" align="left">&nbsp;</td>
				<td width="83" height="25" align="left">Sale Price:</td>
				<td width="163" align="left">
					<div style="overflow:auto; height:auto; width:200px;" id="sale_price">
						<?php echo $sale_price; ?>
					</div>
				</td>
			</tr>
			<tr>
				<td width="102" height="5" align="left">&nbsp;&nbsp;Catagory:</td>
				<td id="catagory" width="185" align="left">
					<div style="overflow:auto; height:auto; width:200px;" id="food_type">
						<?php echo $food_type; ?>
						<input type="hidden" name="food_typebox" id="food_typebox" value="<?php echo $food_type; ?>" readonly="readonly" />
						<input type="hidden" name="sale_pricebox" id="sale_pricebox" value="<?php echo $sale_price; ?>" readonly="readonly" />
						<input type="hidden" name="div_val" value="<?php echo $div_val; ?>" id="div_val" />
						<input type="hidden" name="dishid" id="dishid" value="<?php echo $dishid; ?>" />
					</div>
				</td>

				<td width="441" height="25" align="center">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td width="83" height="5" align="left">Cost Price:</td>
				<td width="163" align="left">
					<div style="overflow:auto; height:auto; width:200px;" id="cost_price">
						<?php
						$query = "SELECT * FROM store_master_tab WHERE INGREDIENT_ID= '$ingredientid'";
						$result = mysqli_query($conn, $query) or die("Failed :" . mysqli_error($conn));
						$num = mysqli_num_rows($result);
						$i = 0;
						while ($i < $num) {
							mysqli_data_seek($result, $i);
							$row = mysqli_fetch_assoc($result);
							$ing_id = $row['INGREDIENT_ID'];
							$ing_name = $row['INGREDIENT_NAME'];
							$last_purchased_price = $row['LAST_PURCHASED_PRICE'];
							$last_demand_qty = $row['LAST_DEMAND_QTY'];
							$i++;
						}  // while loop ends here

						$last_demand_qty;
						$last_purchased_price;
						if ($last_demand_qty == 0)
							$last_demand_qty = 1;
						$last_price_pr_q = $last_purchased_price / $last_demand_qty;
						$div_price_result = $last_price_pr_q / $div_val;
						$costprice = $div_price_result * $quantity;

						$query2 = "INSERT INTO recipe_tab ( DISH_ID, INGREDIENT_CODE, INGREDIENT_NAME, UNIT, DIVISION_VALUE, REQUIRED_QUANTITY, PURCHASED_PRICE_UNIT, COST_PRICE, CREATED_ON, EDITED_ON) 
VALUES('$dishid', '$ing_id', '$ing_name', '$low_unit', '$div_val', '$quantity', '$div_price_result', '$costprice', NOW(), NOW())";
						mysqli_query($conn, $query2) or die("Failed 2: " . mysqli_error($conn));

						$query4 = "SELECT * FROM recipe_tab WHERE DISH_ID='$dishid'";
						$result4 = mysqli_query($conn, $query4) or die("Failed :" . mysqli_error($conn));
						$num4 = mysqli_num_rows($result4);
						$k = 0;
						$t_cost = 0;
						while ($k < $num4) {
							mysqli_data_seek($result4, $k);
							$row4 = mysqli_fetch_assoc($result4);
							$cost_values = $row4['COST_PRICE'];
							$t_cost = $t_cost + $cost_values;
							$k++;
						}  // while loop ends here

						$total_cost = round($t_cost, 4);
						echo $total_cost;
						?>


					</div>
				</td>
			</tr>
		</table>
	</div>
	<br />
	<div style="border: 1px solid black; overflow:auto; height:380px; width:1000px;" align="center" id="center">
		<table width="1000" align="left" class="altrowstable" id="alternatecolor">
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
			$result1 = mysqli_query($conn, $query1) or die("Failed :" . mysqli_error($conn));
			$num1 = mysqli_num_rows($result1);
			$i = 0;

			echo "<table border='0' class='altrowstable' id='alternatecolor'>";
			while ($i < $num1) {
				mysqli_data_seek($result1, $i);
				$row = mysqli_fetch_assoc($result1);

				$j = $i + 1;
				$ingredient_id = $row["INGREDIENT_ID"];
				$ingredient_code = $row["INGREDIENT_CODE"];
				$ingredient_name = $row["INGREDIENT_NAME"];
				$unit = $row["UNIT"];
				$divval = $row["DIVISION_VALUE"];
				$required_quantity = $row["REQUIRED_QUANTITY"];
				$purchased_price_unit = $row["PURCHASED_PRICE_UNIT"];
				$rpurchased_price_unit = round($purchased_price_unit, 4);
				$cost_price = $row["COST_PRICE"];
				$rcost_price = round($cost_price, 4);

				echo "<tr>";
				echo "<td width='54px' align='center'>" . $j . "</td>";
				echo "<td width='124px' align='center'>" . $ingredient_code . "</td>";
				echo "<td width='284px' class='padding1'>" . $ingredient_name . "</td>";
				echo "<td width='100px' align='center'>" . $unit . "</td>";
				echo "<td width='100px' align='center'>" . $required_quantity . "</td>";
				echo "<td width='100px' align='center'>" . $rpurchased_price_unit . "</td>";
				echo "<td width='140px' align='center'>" . $rcost_price . "</td>";
				echo "<td width='70px' align='center'>";
				echo '<a href="javascript:edit_ingredient(' . $dish_id . ',' . $ingredient_code . ',' . $required_quantity . ',' . $divval . ')" alt="Edit" title="Edit"><img width="25" height="25" SRC="images/edit_ing.png" alt="Edit"/></a>';
				echo "</td>";
				echo "<td width='70px' align='center'>";
				echo '<a href="javascript:delete_ingredient(' . $dish_id . ',' . $ingredient_code . ',' . $required_quantity . ',' . $divval . ')" alt="Delete" title="Delete"><img width="22" height="22" SRC="images/remove.png" alt="Delete"/></a>';
				echo "</td>";
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
				<td width="194">Ingredient Code</td>
				<td width="164">Name:</td>
				<td width="184">Unit:</td>
				<td width="186">Required Quantity:</td>
				<td width="100"></td>
				<td width="100"></td>
			</tr>
			<tr>
				<td id="show_ingredient_code" valign="top" style="padding-top:10px;"><input type="text" name="ingredientcode" id="ingredientcode" readonly="readonly" />
				</td>
				<td valign="top" style="padding-top:10px;"><select style="width:145px;" id="ing_name" name="ing_name" onchange="ingredientname(this.value);">
						<option value="">Select Title</option>
						<?php
						$query1 = "SELECT * FROM store_master_tab ORDER BY INGREDIENT_NAME ASC";
						$result1 = mysqli_query($conn, $query1) or die("Failed :" . mysqli_error($conn));
						$num1 = mysqli_num_rows($result1);
						$i = 0;
						while ($i < $num1) {
							mysqli_data_seek($result1, $i);
							$row = mysqli_fetch_assoc($result1);
							$ingredient_id = $row["INGREDIENT_ID"];
							$ingredient_name = $row["INGREDIENT_NAME"];
							$unit_id = $row["UNIT_ID"];
							echo '<option value="' . $ingredient_id . '">' . $ingredient_name . '</option>';
							$i++;
						}  // while loop ends here
						?>
					</select>
				</td>
				<td id="unit" valign="top" style="padding-top:10px;">
					<input type="text" name="low_unit" id="low_unit" readonly="readonly" />
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
						</table>
					</a>
				</td>
				<td> <a href="javascript:cancel_form()" alt="Cancel Ingredient" title="Cancel Ingredient">
						<table>
							<tr>
								<td>
									<img src="images/cancel.png" alt="Cancel Ingredient" width="35" height="28" />
								</td>
								<td>
									<font color="#000000">Cancel</font>
								</td>
							</tr>
						</table>
					</a>
			</tr>


		</table>
	</div>

	</div><!-- end of parent div -->


</body>

</html>