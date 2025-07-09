<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$restid = $_SESSION['restid'];
	$rest = $_POST['rest'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$start = $from."00:00:00";
	$end = $to."23:59:59";
	if($rest != "A")
	{
		$query = "SELECT REST_NAME FROM restaurant_master_tab WHERE REST_ID = '$rest'";
		$result = mysql_query($query);
		$num1 = mysql_numrows($result);
		//mysql_close();
		//$num1--;
		$i = 0;
		while($i < $num1)
		{
			$rname = mysql_result($result,$i, "REST_NAME" );
			$i++;
		}
		
		echo '<table width="900" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="70" align="left"><strong>From:</strong></td>
			<td width="90" align="left">'.$from.'</td>
			<td width="400" align="left">&nbsp;</td>
			<td width="100" align="left"><strong>Restaurant:</strong></td>
			<td width="240" align="left">'.$rname.'</td>
		</tr>
		<tr>
			<td width="70" align="left"><strong>To:</strong></td>
			<td width="90" align="left">'.$to.'</td>
			<td width="400" align="left">&nbsp;</td>
			<td width="100" align="left">Date:</td>
			<td width="240" align="left">'.$today.'</td>
		</tr>
		<tr>
			<td width="90" align="left"><strong>Report ID:</strong></td>
			<td width="300" align="left">rpt_dish_sale.php</td>
		</tr></table><br>';
	
	$query = "SELECT dish_master_tab.DISH_ID, dish_master_tab.DISH_NAME,dish_master_tab.DISH_SERVING,
				  food_type_tab.FOOD_TYPE_DETAIL,
				  dish_charges_history.DISH_CHARGES 
				  FROM dish_master_tab, food_type_tab, dish_charges_history 
				  WHERE dish_charges_history.DISH_ID = dish_master_tab.DISH_ID
				  AND dish_master_tab.FOOD_TYPE_ID = food_type_tab.FOOD_TYPE_ID 
				  AND food_type_tab.REST_ID = '$rest' 
				  AND dish_charges_history.CHARGES_ON_DATE <= '$from' 
				  AND dish_charges_history.CHARGES_OFF_DATE >= '$to' 
				  ORDER BY food_type_tab.FOOD_TYPE_DETAIL";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:920px">
              <table width="900" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="210" align="center"><strong>Food Type</strong></td>
					<td width="210" align="center"><strong>Dish</strong></td>
					<td width="80" align="center"><strong>Serving</strong></td>
					<td width="80" align="center"><strong>Cost Price</strong></td>
					<td width="80" align="center"><strong>Sale Price</strong></td>
					<td width="80" align="center"><strong>Ordered Quantity</strong></td>
					<td width="80" align="center"><strong>Total Cost</strong></td>
					<td width="80" align="center"><strong>Total Sale</strong></td>
					<td width="80" align="center"><strong>Margin</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$f = mysql_result($result1,$i, "food_type_tab.FOOD_TYPE_DETAIL" );
				$di = mysql_result($result1,$i, "dish_master_tab.DISH_ID" );
				$d = mysql_result($result1,$i, "dish_master_tab.DISH_NAME" );
				$s = mysql_result($result1,$i, "dish_master_tab.DISH_SERVING" );
				//$q = mysql_result($result1,$i, "order_history_tab.DISH_QTY" );
				$c = mysql_result($result1,$i, "dish_charges_history.DISH_CHARGES" );
				//$total = $total + ($c*$q);
	
	$query = "SELECT * FROM order_history_tab WHERE DISH_ID = '$di' AND CREATED_ON >= '$start' AND CREATED_ON <= '$end'";
									
	$result = mysql_query($query) or die ('Query1 failed!'.mysql_error());
	$num1 = mysql_numrows($result);
	$a=0;
	$t_q = 0;
	while($a < $num1)
	{
		$q = mysql_result($result,$a, "DISH_QTY" );
		$t_q = $t_q + $q;
		$a++;
	}
				echo '<tr>
				  <td width="210" align="left">&nbsp;'.$f.'</td>
				  <td width="210" align="left">&nbsp;'.$d.'</td>
				  <td width="80" align="left">&nbsp;'.$s.'</td>
				  <td width="80" align="left">&nbsp;0</td>
				  <td width="80" align="left">&nbsp;'.$c.'</td>
				  <td width="80" align="left">&nbsp;'.$t_q.'</td>
				  <td width="80" align="left">&nbsp;0</td>
				  <td width="80" align="left">&nbsp;'.$c*$t_q.'</td>
				  <td width="80" align="center">'.$c*$t_q.'</td>  
				</tr>';
				$total1 = $total1 + ($c*$t_q);
				$i++;
			} // while ends here
			echo '</table><br>
			<table width="200" align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="70" align="left"><strong>Total Amount:</strong></td>
				<td width="70" align="left"><strong>'.$total1.'</strong></td>
			</tr></table><br></div><br>';
	} // if ends here
	else
	{
		echo '<table width="900" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="70" align="left"><strong>From:</strong></td>
			<td width="100" align="left">'.$from.'</td>
			<td width="500" align="left">&nbsp;</td>
			<td width="100" align="left"><strong>Restaurants</strong></td><td>All</td>
		</tr>
		<tr>
			<td width="70" align="left"><strong>To:</strong></td>
			<td width="70" align="left">'.$to.'</td>
			<td width="400" align="left">&nbsp;</td>
			<td width="240" align="left">'.$today.'</td>
		</tr>
		<tr>
			<td width="90" align="left"><strong>Report ID:</strong></td>
			<td width="300" align="left">rpt_dish_sale.php</td>
		</tr></table><br>';
	
	$query = "SELECT dish_master_tab.DISH_ID, dish_master_tab.DISH_NAME,dish_master_tab.DISH_SERVING,
				  food_type_tab.FOOD_TYPE_DETAIL,
				  dish_charges_history.DISH_CHARGES 
				  FROM dish_master_tab, food_type_tab, dish_charges_history 
				  WHERE dish_charges_history.DISH_ID = dish_master_tab.DISH_ID
				  AND dish_master_tab.FOOD_TYPE_ID = food_type_tab.FOOD_TYPE_ID 
				  AND dish_charges_history.CHARGES_ON_DATE <= '$from' 
				  AND dish_charges_history.CHARGES_OFF_DATE >= '$to' 
				  ORDER BY food_type_tab.FOOD_TYPE_DETAIL";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:920px">
              <table width="900" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="210" align="center"><strong>Food Type</strong></td>
					<td width="210" align="center"><strong>Dish</strong></td>
					<td width="80" align="center"><strong>Serving</strong></td>
					<td width="80" align="center"><strong>Cost Price</strong></td>
					<td width="80" align="center"><strong>Sale Price</strong></td>
					<td width="80" align="center"><strong>Ordered Quantity</strong></td>
					<td width="80" align="center"><strong>Total Cost</strong></td>
					<td width="80" align="center"><strong>Total Sale</strong></td>
					<td width="80" align="center"><strong>Margin</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$f = mysql_result($result1,$i, "food_type_tab.FOOD_TYPE_DETAIL" );
				$di = mysql_result($result1,$i, "dish_master_tab.DISH_ID" );
				$d = mysql_result($result1,$i, "dish_master_tab.DISH_NAME" );
				$s = mysql_result($result1,$i, "dish_master_tab.DISH_SERVING" );
				//$q = mysql_result($result1,$i, "order_history_tab.DISH_QTY" );
				$c = mysql_result($result1,$i, "dish_charges_history.DISH_CHARGES" );
				//$total = $total + ($c*$q);
	
	$query = "SELECT * FROM order_history_tab WHERE DISH_ID = '$di' AND CREATED_ON >= '$start' AND CREATED_ON <= '$end'";
									
	$result = mysql_query($query) or die ('Query1 failed!'.mysql_error());
	$num1 = mysql_numrows($result);
	$a=0;
	$t_q = 0;
	while($a < $num1)
	{
		$q = mysql_result($result,$a, "DISH_QTY" );
		$t_q = $t_q + $q;
		$a++;
	}
				echo '<tr>
				  <td width="210" align="left">&nbsp;'.$f.'</td>
				  <td width="210" align="left">&nbsp;'.$d.'</td>
				  <td width="80" align="left">&nbsp;'.$s.'</td>
				  <td width="80" align="left">&nbsp;0</td>
				  <td width="80" align="left">&nbsp;'.$c.'</td>
				  <td width="80" align="left">&nbsp;'.$t_q.'</td>
				  <td width="80" align="left">&nbsp;0</td>
				  <td width="80" align="left">&nbsp;'.$c*$t_q.'</td>
				  <td width="80" align="center">'.$c*$t_q.'</td>  
				</tr>';
				$total1 = $total1 + ($c*$t_q);
				$i++;
			} // while ends here
			echo '</table><br>
			<table width="200" align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="70" align="left"><strong>Total Amount:</strong></td>
				<td width="70" align="left"><strong>'.$total1.'</strong></td>
			</tr></table><br></div><br>';
	}
?>