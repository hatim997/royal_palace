<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	//$guest = $_POST['guest'];
	//$date = $_POST['date'];
	$total_ing = $_POST['total_ing'];
	$suppliers = $_POST['supplier'];
	$dish_ids = $_POST['d_id'];
	$dish_qtys = $_POST['d_demand'];
	$blank = 0;
	//echo "Dish IDs are ".$dish_ids."<br>";
	//echo "Quantities are ".$dish_qtys."<br>";
	
	$dish_id = explode(":", $dish_ids);
	$dish_qty = explode(":", $dish_qtys);
	$supplier = explode(":", $suppliers);
	
	$no = count($dish_id);
	for($a = 0; $a < $no; $a++)
	{
		$dish = $dish_id[$a];
		$qty = $dish_qty[$a];
		$supply = $supplier[$a];
		//echo $dish."<br>";
		$query = "INSERT INTO supplier_demand
		(REST_ID, SUPPLIER_ID, INGREDIENT_ID, DEMAND_NO, DEMAND_QTY, DEMAND_DATE, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		VALUES('$rest_id','$supply','$dish','$demand_no','$qty','$current_date','$created_id','$date_time','$created_id','$date_time')";
		mysql_query($query) or die('Insertion Failed:'.mysql_error());
		
		$query = "UPDATE store_master_tab SET LAST_DEMAND_QTY = '$qty', LAST_DEMAND_DATE = '$current_date', DEMAND_FLAG = 'ON' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$dish'";
		mysql_query($query) or die('Updation Failed:'.mysql_error());
			
	}
	$query = "SELECT DISTINCT(SUPPLIER_ID) FROM supplier_demand WHERE DEMAND_DATE = '$current_date' AND REST_ID = '$rest_id' 
							AND DEMAND_NO = '0'";
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	//echo "Total supplieres are ".$num."<br><br><br><br><br><br>";
	$i=0;
	while($i < $num)
	{
		$sup_id = mysql_result($result1,$i, "SUPPLIER_ID" );
		//echo "Total supplieres are ".$num."<br><br><br><br><br><br>";
		$query10 = "SELECT max(DEMAND_NO) FROM supplier_demand";
		$result10 = mysql_query($query10);
		$num10 = mysql_num_rows($result10);
		$k = 0;
		while($k < $num10)
		{
			$demand_no = mysql_result($result10,$k, "max(DEMAND_NO)" );
			$k++;
		}
		$demand_no++;
		
		$query11 = "UPDATE supplier_demand SET DEMAND_NO = '$demand_no' WHERE REST_ID = '$rest_id' AND SUPPLIER_ID = '$sup_id' AND 
		DEMAND_DATE = '$current_date'";
		mysql_query($query11) or die('Updation Failed:'.mysql_error());
		
		$i++;
	}
	
	
	$blank = 0;
		  		
				//echo $rest_id." and date ".$current_date;
	$query = "SELECT * FROM store_master_tab WHERE REST_ID = '$rest_id' AND QTY_INHAND <= RE_ORDER_LEVEL ORDER BY INGREDIENT_NAME ASC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	if($num != 0)
	{
	/*
	echo '<table width="700" align="left" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
<tr><td style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px" align="center"><b><i>Item Information</i></b></td></tr>
</table>';
*/
	echo '<table width="700" border="1" cellpadding="0" cellspacing="0" align="left"  BORDER=1 RULES=NONE FRAME=BOX>
				<thead>
				<tr style="background: #8e3f2b repeat-x top left; background-position:center; color:#FFFFFF; font-size:16px; height:30px">
					<td width="90" align="left"><strong>&nbsp;Code</strong></td>
					<td width="200" align="left"><strong>Name</strong></td>
					<td width="120" align="center"><strong>Qty. Inhand</strong></td>
					<td width="90" align="left"><strong>Quantity</strong></td>
					<td width="90" align="center"><strong>Supplier</strong></td>
				</tr>
				</thead>
				</table>';
	echo '<div id="del_dish" align="center" style="overflow:auto; height:400px; width:730px;">
	<table width="700" border="1" cellpadding="0" cellspacing="0" align="left"  BORDER=1 RULES=NONE FRAME=BOX>';
	
			$i=0;
			while($i < $num)
			{
				$code = mysql_result($result1,$i, "INGREDIENT_ID" );
				$name = mysql_result($result1,$i, "INGREDIENT_NAME" );
				$re_order = mysql_result($result1,$i, "RE_ORDER_LEVEL" );
				$qty = mysql_result($result1,$i, "QTY_INHAND" );
				$max = mysql_result($result1,$i, "MAX_LEVEL" );
				echo '<tr style="height:30px; background-color:';if($i%2 == 0) echo "#FFF799"; else echo "#FFB06E"; echo';">
					<td width="90" align="left">&nbsp;<strong>'.$code.'</strong></td>
					<td width="200" align="left">&nbsp;<strong>'.$name.'</strong></td>
					<td width="120" align="center">&nbsp;<strong>'.$qty.'</strong></td>
					<td width="90" align="left">&nbsp;<input type="text" style="background:#FFFFFF;" name="'.$code.'" id="demand'.$i.'" size="5" value="" /></td>
					<td width="90" align="left">&nbsp;
					<select id="supplier'.$i.'" name="supplier">
						<option value="">Select Supplier</option>';								
					$query1 = "SELECT * FROM supplier_master WHERE REST_ID = '$rest_id' ORDER BY SUPPLIER_NAME ASC";
					$result = mysql_query($query1)or die("Failed :".mysql_error());
					$num1 = mysql_numrows($result);
					$j=0;
					while($j < $num1)
					{
						$unit_detail = mysql_result($result,$j, "SUPPLIER_NAME");
						$unit_id = mysql_result($result,$j, "SUPPLIER_ID");
				?>
				  <option value="<?php echo $unit_id; ?>"><?php echo $unit_detail; ?></option>
				<?php
					
					$j++;
					}  // while loop ends here
					echo '</td>
				  </tr>';
				$i++;
			} // while ends here
			echo '</table></div><br>';
	echo '<table width="450" align="left" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="129">&nbsp;</td>
<td width="254"><input class="button" align="left" onclick="add_demand(this.form)" name="submit" style="cursor:pointer" type="button" value="Demand" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
</tr>
</table><input type="hidden" name="total_ing" id="total_ing" value="'.$i.'" />';
	} // if ends here
	else
	{
		echo '<h1 class="style1" style=" font-size:14px;">Currently no item below re-order level</h1>';
	}
?>