<?php $total_charges=$dish_qty*$dish_charges;
	$query1 = "SELECT * FROM order_master_tab WHERE ORDER_NO = '$order_no'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$pre_total_charges = mysql_result($result1,$i, "TOTAL_CHARGES" );
		//$grand_total_charges=$pre_total_charges+$total_charges;
$i++;
	} 
$grand_total_charges=$pre_total_charges+$total_charges;
$query2 = "UPDATE order_master_tab SET TOTAL_CHARGES='$grand_total_charges' WHERE ORDER_NO = '$order_no'";
	$result2 = mysql_query($query2)or die("Failed :".mysql_error());
	//$query2 = "INSERT INTO order_history_tab( DISH_QTY, DISH_CHARGES_ID, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		  			// VALUES('$dish_qty', '$dish_charges', 'RIDA', '$date_time', 'RIDA', '$date_time')";
		//  mysql_query($query2) or die("Failed 2: ".mysql_error());
		?>