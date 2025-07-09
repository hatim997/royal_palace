<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	$value = $_POST['value'];
	//echo $value."<br>";
	
	$query = "SELECT * FROM supplier_master WHERE REST_ID = '$restid' AND SUPPLIER_ID = '$value' ORDER BY SUPPLIER_NAME ASC";
	$result = mysql_query($query);
	$num1 = mysql_numrows($result);
	//mysql_close();
	//$num1--;
	$i = 0;
	while($i < $num1)
	{
		$supplier_name = mysql_result($result,$i, "SUPPLIER_NAME");
		$i++;
	}
	$query = "SELECT store_master_tab.INGREDIENT_ID, store_master_tab.INGREDIENT_NAME, store_master_tab.QTY_INHAND, 
				store_master_tab.RE_ORDER_LEVEL, store_master_tab.MAX_LEVEL, store_master_tab.LAST_PURCHASED_PRICE, 
				supplier_item.SUPPLIER_ID, unit_tab.UNIT_ID, unit_tab.UNIT_DETAIL
				FROM store_master_tab, supplier_item, unit_tab 
				WHERE store_master_tab.INGREDIENT_ID = supplier_item.INGREDIENT_ID 
				AND store_master_tab.UNIT_ID = unit_tab.UNIT_ID 
				AND store_master_tab.QTY_INHAND <= store_master_tab.RE_ORDER_LEVEL
				AND store_master_tab.DEMAND_FLAG != 'ON'
				AND supplier_item.SUPPLIER_ID = '$value'
				ORDER BY store_master_tab.INGREDIENT_NAME ASC";
	$result = mysql_query($query) or die("Query Failed: ".mysql_error());
	$num = mysql_num_rows($result);
	if($num == 0)
	{
		echo '<h1 class="style1" style=" font-size:16px;">No Ingredient for demand</h1>';
	}
	else
	{
		echo '<h1 class="style1" style=" font-size:16px;">'.$supplier_name.'</h1>';
		
		/*
		echo '<table width="700" align="center" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
			<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Items Information</i></b></td></tr>
			</table>';
			*/
		echo '<table width="780" cellpadding="0" cellspacing="0" align="center" BORDER=1 RULES=NONE FRAME=BOX>
			  <tr style="background:url(images/dock-bg.png); color:#FFFFFF;">
				  <td width="70" align="center"><strong>Item Code</strong></td>
				  <td width="180" align="center"><strong>Item Name</strong></td>
				  <td width="80" align="center"><strong>Unit</strong></td>
				  <td width="80" align="center"><strong>Re-Order Level</strong></td>
				  <td width="80" align="center"><strong>Qty Inhand</strong></td>
				  <td width="80" align="center"><strong>Max Level</strong></td>
				  <td width="100" align="center"><strong>Qty Ordered</strong></td>
				  <td width="80" align="center"><strong>Last Pur. Price</strong></td>
				  <td width="80" align="center"><strong>Total Suppliers</strong></td>
			  </tr>
			  
			  </table>';
			if($num <= 8)
			{
				echo '<div id="sup_demand" align="center" style="width:800px;">';
			}
			else if($num > 10 && $num < 30)
			{
				echo '<div id="sup_demand" align="center" style="overflow:auto; height:200px; width:800px">';  
			}
			else if($num > 30 && $num < 60)
			{
				echo '<div id="sup_demand" align="center" style="overflow:auto; height:300px; width:800px">';
			}
			else
			{
				echo '<div id="sup_demand" align="center" style="overflow:auto; height:300px; width:800px">';
			}
			echo '<table width="780" border="1" cellpadding="0" cellspacing="0" align="center">';
				
		$i=0;
		while($i < $num)
		{
			$id = mysql_result($result,$i, "store_master_tab.INGREDIENT_ID" );
			$name = mysql_result($result,$i, "store_master_tab.INGREDIENT_NAME" );
			$inhand = mysql_result($result,$i, "store_master_tab.QTY_INHAND" );
			$level = mysql_result($result,$i, "store_master_tab.RE_ORDER_LEVEL" );
			$max = mysql_result($result,$i, "store_master_tab.MAX_LEVEL" );
			$last_price = mysql_result($result,$i, "store_master_tab.LAST_PURCHASED_PRICE" );
			$unit_id = mysql_result($result,$i, "unit_tab.UNIT_ID" );
			$unit_detail = mysql_result($result,$i, "unit_tab.UNIT_DETAIL" );
			//$serving = mysql_result($result,$i, "dish_master_tab.DISH_SERVING" );
			//$price = mysql_result($result,$i, "dish_charges_history.DISH_CHARGES" );
			
			$num1 = 0;
			$query1 = "SELECT * FROM supplier_item WHERE INGREDIENT_ID = '$id' ORDER BY INGREDIENT_ID ASC";
			$result1 = mysql_query($query1) or die("Query Failed: ".mysql_error());
			$num1 = mysql_num_rows($result1);
			
			echo '<tr>
					<td height="30" width="70" align="left">&nbsp;'.$id.'</td>
					<td height="30" width="180" align="left">&nbsp;'.$name.'</td>
					<td height="30" width="80" align="left">&nbsp;'.$unit_detail.'</td>
					<td height="30" width="80" align="left">&nbsp;'.$level.'</td>
					<td height="30" width="80" align="left">&nbsp;'.$inhand.'</td>
					<td height="30" width="80" align="left">&nbsp;'.$max.'</td>
					<td height="30" width="100" align="center"><input type="text" style="background:#43C6DB;" name="'.$id.'" id="demand'.$i.'" size="5" value="'.($max - $inhand).'" /></td>
					<td height="30" width="80" align="left">&nbsp;'.$last_price.'</td>
					<td width="80" align="center">&nbsp;'.$num1.'</td>
				  </tr>
				  <input type="hidden" name="max'.$i.'" id="max'.$i.'" value="'.$max.'" />';
			$i++;
		}
		echo '</table></div><br>
		<input type="hidden" name="total_ing" id="total_ing" value="'.$i.'" />
		<input type="hidden" name="unit" id="unit" value="'.$unit_id.'" />';
	}
?>