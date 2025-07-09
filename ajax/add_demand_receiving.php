<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	//$guest = $_POST['guest'];
	$date = $_POST['date'];
	$total_ing = $_POST['total_ing'];
	$dish_ids = $_POST['d_id'];
	$dish_qtys = $_POST['d_demand'];
	$demandno = $_POST['demandno'];
	$prices_all = $_POST['price'];
	$receive_all = $_POST['receive'];
	//echo "Dish IDs are ".$dish_ids."<br>";
	//echo "Quantities are ".$dish_qtys."<br>";
	
	$query1 = "SELECT max(INVOICE_NO) FROM supplier_demand";
	$result1 = mysql_query($query1);
	$num1 = mysql_num_rows($result1);
	$i = 0;
	while($i < $num1)
	{
		$invoice_no = mysql_result($result1,$i, "max(INVOICE_NO)" );
		$i++;
	}
	$invoice_no++;
	
	$dish_id = explode(":", $dish_ids);
	$dish_qty = explode(":", $dish_qtys);
	$prices = explode(":", $prices_all);
	$receive = explode(":", $receive_all);
	$no = count($dish_id);
	for($a = 0; $a < $no; $a++)
	{
		$unit_price = 0;
		$dish = $dish_id[$a];
		$qty = $dish_qty[$a];
		$price = $prices[$a];
		$rec = $receive[$a];
		//echo $dish."<br>";
		$unit_price = number_format(($price/$qty));
		/*
		$query = "SELECT * FROM store_master_tab WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$dish' ORDER BY INGREDIENT_ID ASC";
		$result = mysql_query($query);
		$num = mysql_numrows($result);
		$i=0;
		while($i < $num)
		{
			$price = mysql_result($result,$i, "LAST_PURCHASED_PRICE" );
			//echo '<option value="'.$d_id.'">'.$d_name.'</option>';
			$i++;
		}  // while loop ends here
		*/
		$invoice_amount = $qty*$price;
		if($qty == 0)
		{
			/*
			$query = "UPDATE supplier_demand SET INVOICE_NO = '$invoice_no', INVOICE_QTY = '$qty', INVOICE_AMOUNT = '$invoice_amount', INVOICE_DATE = '$date' WHERE REST_ID = '$rest_id' AND DEMAND_NO = '$demandno' AND INGREDIENT_ID = '$dish'";
			mysql_query($query) or die('Insertion Failed:'.mysql_error());
			
			$query = "UPDATE store_master_tab SET QTY_INHAND = QTY_INHAND + '$qty', LAST_DEMAND_QTY = '$qty', LAST_DEMAND_DATE = '$date', DEMAND_FLAG = 'OFF', LAST_PURCHASED_PRICE = '$unit_price', LAST_PURCHASED_QTY = '$qty', LAST_PURCHASED_DATE = '$date' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$dish'";
			mysql_query($query) or die('Store Update Failed:'.mysql_error());
			*/
		}
		else
		{
			$query = "UPDATE supplier_demand SET INVOICE_NO = '$invoice_no', INVOICE_QTY = '$qty', INVOICE_AMOUNT = '$invoice_amount', INVOICE_DATE = '$date' WHERE REST_ID = '$rest_id' AND DEMAND_NO = '$demandno' AND INGREDIENT_ID = '$dish'";
			mysql_query($query) or die('Insertion Failed:'.mysql_error());
			
			$query = "UPDATE store_master_tab SET QTY_INHAND = QTY_INHAND + '$qty', LAST_DEMAND_QTY = '$qty', LAST_DEMAND_DATE = '$date', DEMAND_FLAG = 'OFF', LAST_PURCHASED_PRICE = '$unit_price', LAST_PURCHASED_QTY = '$qty', LAST_PURCHASED_DATE = '$date' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$dish'";
			mysql_query($query) or die('Store Update Failed:'.mysql_error());
		} // else ends here
		
	}
	
	echo '<span class="style2"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Invoice No is '.$invoice_no.'<br><br></strong></span>';
	/*
	echo '<a class="style1" style="font-size:16px;" href="http://www.wiitechmill.com/dev/royalpalace/accounts/invoice_print.php?dn='.$demandno.'&in='.$invoice_no.'" target="_blank">Print Invoice</a>';
	*/
	$blank = 0;
	$query = "SELECT * FROM supplier_demand WHERE REST_ID = '$rest_id' 
				AND INVOICE_NO = '$blank' GROUP BY DEMAND_NO ASC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	if($num != 0)
	{
	echo '<div id="del_dish" align="center" style="overflow:auto; height:200px; width:350px">
			  <table width="310" border="1" cellpadding="0" cellspacing="0" align="center">
				<thead>
				<tr>
					<td width="200" align="center"><strong>Demand No</strong></td>
					<td width="90" align="center"><strong>Details</strong></td>
				</tr>
				</thead>';
			$i=0;
			while($i < $num)
			{
				$demand_no = mysql_result($result1,$i, "DEMAND_NO" );
				echo '<tr>
					<td width="200" align="left">&nbsp;'.$demand_no.'</td>
					<td width="90" align="center"><a href="javascript:order_details('.$demand_no.')" alt="Details" title="Details"><img src="images/Details.png" height="35" width="90" alt="Details" /></a></td>  
				  </tr>';
				$i++;
			} // while ends here
			echo '</table></div><br><br><br><br>';
	} // if ends here
	else
	{
		echo '<h1 class="style1" style=" font-size:14px;">Currently no Demands Raised</h1>';
	}
	echo '<div id="demand_detail">
  
  </div>';
?>