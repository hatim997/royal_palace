<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$restid = $_SESSION['restid'];
	$total_cash = 0;
	$total_card = 0;
	$total_cheque = 0;
	
	$rest = $_POST['rest'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$start = $from." 00:00:00";
	$end = $to." 23:59:59";
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
			<td width="300" align="left">rpt_revenue_collection.php</td>
		</tr></table><br>';
	
	$query = "SELECT guest_master_tab.GUEST_ID, guest_master_tab.GUEST_NAME,
				  order_master_tab.ORDER_NO,order_master_tab.NO_OF_GUEST,order_master_tab.TOTAL_CHARGES,
				  order_master_tab.TOTAL_DISCOUNT,order_master_tab.TOTAL_SERV_CHARGES,order_master_tab.VISITED_DATE,
				  order_master_tab.VISITED_TIME,order_master_tab.PAYMENT_MODE,order_master_tab.PAYMENT_REC,
				  tax_charges_history.TAX_VALUE,
				  restaurant_master_tab.REST_NAME
				  FROM guest_master_tab, order_master_tab, tax_charges_history, restaurant_master_tab
				  WHERE guest_master_tab.GUEST_ID = order_master_tab.GUEST_ID
				  AND order_master_tab.REST_ID = restaurant_master_tab.REST_ID
				  AND order_master_tab.TAX_ID = tax_charges_history.TAX_ID 
				  AND restaurant_master_tab.REST_ID = '$rest' 
				  AND order_master_tab.CREATED_ON >= '$start' 
				  AND order_master_tab.CREATED_ON <= '$end'
				  ORDER BY order_master_tab.ORDER_NO ASC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:960px">
              <table width="900" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="60" align="center"><strong>Order No</strong></td>
					<!--<td width="150" align="center"><strong>Restaurant</strong></td>-->
					<td width="200" align="center"><strong>Guest Name</strong></td>
					<td width="70" align="center"><strong>No of Guests</strong></td>
					<td width="90" align="center"><strong>Date</strong></td>
					<td width="80" align="center"><strong>Time</strong></td>
					<td width="70" align="center"><strong>Sale</strong></td>
					<td width="80" align="center"><strong>Service Charges</strong></td>
					<td width="80" align="center"><strong>Tax %</strong></td>
					<td width="80" align="center"><strong>Discount %</strong></td>
					<td width="80" align="center"><strong>Net Received</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$on = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
				$r_name = mysql_result($result1,$i, "restaurant_master_tab.REST_NAME" );
				$gname = mysql_result($result1,$i, "guest_master_tab.GUEST_NAME" );
				$nog = mysql_result($result1,$i, "order_master_tab.NO_OF_GUEST" );
				$vdate = mysql_result($result1,$i, "order_master_tab.VISITED_DATE" );
				$vtime = mysql_result($result1,$i, "order_master_tab.VISITED_TIME" );
				$tserv = mysql_result($result1,$i, "order_master_tab.TOTAL_SERV_CHARGES" );
				$tc = mysql_result($result1,$i, "order_master_tab.TOTAL_CHARGES" );
				$tax = mysql_result($result1,$i, "tax_charges_history.TAX_VALUE" );
				$discount = mysql_result($result1,$i, "order_master_tab.TOTAL_DISCOUNT" );
				$trec = mysql_result($result1,$i, "order_master_tab.PAYMENT_REC" );
				$pmode = mysql_result($result1,$i, "order_master_tab.PAYMENT_MODE" );
				
				if($pmode == "C")
				{
					$total_cash = $total_cash + $trec;
				}
				else if($pmode == "Q")
				{
					$total_cheque = $total_cheque + $trec;
				}
				else
				{
					$total_card = $total_card + $trec;
				}
				//$total = $total + ($c*$q);
	
			echo '<tr>
				  <td width="60" align="left">&nbsp;'.$on.'</td>
				  <!--<td width="150" align="left">&nbsp;.$r_name.</td>-->
				  <td width="200" align="left">&nbsp;'.$gname.'</td>
				  <td width="70" align="left">&nbsp;'.$nog.'</td>
				  <td width="90" align="left">&nbsp;'.$vdate.'</td>
				  <td width="80" align="left">&nbsp;'.$vtime.'</td>
				  <td width="70" align="left">&nbsp;'.$tc.'</td>
				  <td width="80" align="left">&nbsp;'.$tserv.'</td>
				  <td width="80" align="left">&nbsp;'.($tc/100)*$tax.'</td>
				  <td width="80" align="left">'.$discount.'</td>
				  <td width="80" align="left">'.$trec.'</td>  
				</tr>';
				$total_sale = $total_sale + $tc;
				$total_serv = $total_serv + $tserv;
				$t_tax = ($tc/100)*$tax;
				$total_tax = $total_tax + $t_tax;
				$total_discount = $total_discount + $discount;
				$net_rec = $net_rec + $trec;
				$i++;
			} // while ends here
			echo '</table>
			<table width="940" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				  <td width="70" align="left">&nbsp;</td>
				  <td width="170" align="left">&nbsp;</td>
				  <td width="80" align="left">&nbsp;</td>
				  <td width="80" align="left">&nbsp;</td>
				  <td width="80" align="right">&nbsp;Total =</td>
				  <td width="80" align="left">&nbsp;'.$total_sale.'</td>
				  <td width="80" align="left">&nbsp;'.$total_serv.'</td>
				  <td width="80" align="left">&nbsp;'.$total_tax.'</td>
				  <td width="80" align="left">'.$total_discount.'</td>
				  <td width="80" align="left">'.$net_rec.'</td>  
				</tr>
				</table><br><br>
			
			<table width="300" align="right" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="200" align="left"><strong>Total Cash Amount:</strong></td>
				<td width="100" align="left"><strong>'.$total_cash.'</strong></td>
			</tr>
			<tr>
				<td width="200" align="left"><strong>Total Credit Card Amount:</strong></td>
				<td width="100" align="left"><strong>'.$total_card.'</strong></td>
			</tr>
			<tr>
				<td width="200" align="left"><strong>Total Cheque Amount:</strong></td>
				<td width="100" align="left"><strong>'.$total_cheque.'</strong></td>
			</tr></table><br></div><br>';
	} // if ends here
	else
	{
		echo '<table width="900" align="center" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="70" align="left"><strong>From:</strong></td>
			<td width="90" align="left">'.$from.'</td>
			<td width="400" align="left">&nbsp;</td>
			<td width="100" align="left"><strong>Restaurant:</strong></td>
			<td width="240" align="left">All</td>
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
			<td width="300" align="left">rpt_revenue_collection.php</td>
		</tr></table><br>';
	
	$query = "SELECT guest_master_tab.GUEST_ID, guest_master_tab.GUEST_NAME,
				  order_master_tab.ORDER_NO,order_master_tab.NO_OF_GUEST,order_master_tab.TOTAL_CHARGES,
				  order_master_tab.TOTAL_DISCOUNT,order_master_tab.TOTAL_SERV_CHARGES,order_master_tab.VISITED_DATE,
				  order_master_tab.VISITED_TIME,order_master_tab.PAYMENT_MODE,order_master_tab.PAYMENT_REC,
				  tax_charges_history.TAX_VALUE,
				  restaurant_master_tab.REST_NAME
				  FROM guest_master_tab, order_master_tab, tax_charges_history, restaurant_master_tab
				  WHERE guest_master_tab.GUEST_ID = order_master_tab.GUEST_ID
				  AND order_master_tab.REST_ID = restaurant_master_tab.REST_ID
				  AND order_master_tab.TAX_ID = tax_charges_history.TAX_ID 
				  AND order_master_tab.CREATED_ON >= '$start' 
				  AND order_master_tab.CREATED_ON <= '$end' 
				  ORDER BY order_master_tab.ORDER_NO ASC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:960px">
              <table width="900" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="60" align="center"><strong>Order No</strong></td>
					<!--<td width="150" align="center"><strong>Restaurant</strong></td>-->
					<td width="200" align="center"><strong>Customer Name</strong></td>
					<td width="70" align="center"><strong>No of Guests</strong></td>
					<td width="90" align="center"><strong>Date</strong></td>
					<td width="80" align="center"><strong>Time</strong></td>
					<td width="70" align="center"><strong>Sale</strong></td>
					<td width="80" align="center"><strong>Service Charges</strong></td>
					<td width="80" align="center"><strong>Tax %</strong></td>
					<td width="80" align="center"><strong>Discount %</strong></td>
					<td width="80" align="center"><strong>Net Received</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$on = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
				$r_name = mysql_result($result1,$i, "restaurant_master_tab.REST_NAME" );
				$gname = mysql_result($result1,$i, "guest_master_tab.GUEST_NAME" );
				$nog = mysql_result($result1,$i, "order_master_tab.NO_OF_GUEST" );
				$vdate = mysql_result($result1,$i, "order_master_tab.VISITED_DATE" );
				$vtime = mysql_result($result1,$i, "order_master_tab.VISITED_TIME" );
				$tserv = mysql_result($result1,$i, "order_master_tab.TOTAL_SERV_CHARGES" );
				$tc = mysql_result($result1,$i, "order_master_tab.TOTAL_CHARGES" );
				$tax = mysql_result($result1,$i, "tax_charges_history.TAX_VALUE" );
				$discount = mysql_result($result1,$i, "order_master_tab.TOTAL_DISCOUNT" );
				$trec = mysql_result($result1,$i, "order_master_tab.PAYMENT_REC" );
				$pmode = mysql_result($result1,$i, "order_master_tab.PAYMENT_MODE" );
				
				if($pmode == "C")
				{
					$total_cash = $total_cash + $trec;
				}
				else if($pmode == "Q")
				{
					$total_cheque = $total_cheque + $trec;
				}
				else
				{
					$total_card = $total_card + $trec;
				}
				//$total = $total + ($c*$q);

	
			echo '<tr>
				  <td width="60" align="left">&nbsp;'.$on.'</td>
				  <!--<td width="150" align="left">&nbsp;.$r_name.</td>-->
				  <td width="200" align="left">&nbsp;'.$gname.'</td>
				  <td width="70" align="left">&nbsp;'.$nog.'</td>
				  <td width="90" align="left">&nbsp;'.$vdate.'</td>
				  <td width="80" align="left">&nbsp;'.$vtime.'</td>
				  <td width="70" align="left">&nbsp;'.$tc.'</td>
				  <td width="80" align="left">&nbsp;'.$tserv.'</td>
				  <td width="80" align="left">&nbsp;'.($tc/100)*$tax.'</td>
				  <td width="80" align="left">'.$discount.'</td>
				  <td width="80" align="left">'.$trec.'</td>  
				</tr>';
				$total_sale = $total_sale + $tc;
				$total_serv = $total_serv + $tserv;
				$t_tax = ($tc/100)*$tax;
				$total_tax = $total_tax + $t_tax;
				$total_discount = $total_discount + $discount;
				$net_rec = $net_rec + $trec;
				$i++;
			} // while ends here
			echo '</table>
			<table width="940" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				  <td width="70" align="left">&nbsp;</td>
				  <td width="170" align="left">&nbsp;</td>
				  <td width="80" align="left">&nbsp;</td>
				  <td width="80" align="left">&nbsp;</td>
				  <td width="80" align="right">&nbsp;Total =</td>
				  <td width="80" align="left">&nbsp;'.$total_sale.'</td>
				  <td width="80" align="left">&nbsp;'.$total_serv.'</td>
				  <td width="80" align="left">&nbsp;'.$total_tax.'</td>
				  <td width="80" align="left">'.$total_discount.'</td>
				  <td width="80" align="left">'.$net_rec.'</td>  
				</tr>
				</table><br><br>
			
			<table width="300" align="right" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="200" align="left"><strong>Total Cash Amount:</strong></td>
				<td width="100" align="left"><strong>'.$total_cash.'</strong></td>
			</tr>
			<tr>
				<td width="200" align="left"><strong>Total Credit Card Amount:</strong></td>
				<td width="100" align="left"><strong>'.$total_card.'</strong></td>
			</tr>
			<tr>
				<td width="200" align="left"><strong>Total Cheque Amount:</strong></td>
				<td width="100" align="left"><strong>'.$total_cheque.'</strong></td>
			</tr></table><br></div><br>';
	}
?>