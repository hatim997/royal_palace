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
	//$start = $from."00:00:00";
	//$end = $to."23:59:59";
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
			<td width="300" align="left">rpt_ost_revenue.php</td>
		</tr></table><br>';
	
	$query = "SELECT guest_master_tab.GUEST_ID, guest_master_tab.GUEST_NAME,guest_master_tab.GUEST_MOBILE_NO,
				  order_master_tab.ORDER_NO,order_master_tab.NO_OF_GUEST,order_master_tab.TOTAL_CHARGES,
				  order_master_tab.TOTAL_DISCOUNT,order_master_tab.TOTAL_SERV_CHARGES,order_master_tab.VISITED_DATE,
				  order_master_tab.VISITED_TIME,order_master_tab.PAYMENT_MODE,order_master_tab.PAYMENT_REC,
				  order_master_tab.PAYMENT_FLAG,order_master_tab.CREDIT_CARD_NO,order_master_tab.CHEQUE_NO,
				  tax_charges_history.TAX_VALUE,
				  restaurant_master_tab.REST_NAME
				  FROM guest_master_tab, order_master_tab, tax_charges_history, restaurant_master_tab
				  WHERE guest_master_tab.GUEST_ID = order_master_tab.GUEST_ID
				  AND order_master_tab.REST_ID = restaurant_master_tab.REST_ID
				  AND order_master_tab.TAX_ID = tax_charges_history.TAX_ID 
				  AND restaurant_master_tab.REST_ID = '$rest' 
				  AND order_master_tab.VISITED_DATE >= '$from' 
				  AND order_master_tab.VISITED_DATE <= '$to'
				  AND (order_master_tab.PAYMENT_FLAG = 'P' OR order_master_tab.PAYMENT_FLAG = 'B')
				  ORDER BY order_master_tab.ORDER_NO ASC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:960px">
              <table width="900" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="90" align="center"><strong>Date</strong></td>
					<td width="60" align="center"><strong>Order No</strong></td>
					<td width="150" align="center"><strong>Restaurant</strong></td>
					<td width="200" align="center"><strong>Guest Name</strong></td>
					<td width="70" align="center"><strong>Contact No</strong></td>
					<td width="90" align="center"><strong>Due Amount</strong></td>
					<td width="80" align="center"><strong>Payment Mode</strong></td>
					<td width="70" align="center"><strong>Credit Card & Cheque No</strong></td>
					<td width="80" align="center"><strong>Flag</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$on = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
				$r_name = mysql_result($result1,$i, "restaurant_master_tab.REST_NAME" );
				$gname = mysql_result($result1,$i, "guest_master_tab.GUEST_NAME" );
				$cell = mysql_result($result1,$i, "guest_master_tab.GUEST_MOBILE_NO" );
				$vdate = mysql_result($result1,$i, "order_master_tab.VISITED_DATE" );
				$trec = mysql_result($result1,$i, "order_master_tab.PAYMENT_REC" );
				$pmode = mysql_result($result1,$i, "order_master_tab.PAYMENT_MODE" );
				$pflag = mysql_result($result1,$i, "order_master_tab.PAYMENT_FLAG" );
				$cheque = mysql_result($result1,$i, "order_master_tab.CHEQUE_NO" );
				$card = mysql_result($result1,$i, "order_master_tab.CREDIT_CARD_NO" );
				
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
				  <td width="60" align="left">&nbsp;'.$vdate.'</td>
				  <td width="60" align="left">&nbsp;'.$on.'</td>
				  <td width="150" align="left">&nbsp;'.$r_name.'</td>
				  <td width="200" align="left">&nbsp;'.$gname.'</td>
				  <td width="70" align="left">&nbsp;'.$cell.'</td>
				  <td width="90" align="left">&nbsp;'.$trec.'</td>';
				  echo '<td width="80" align="left">&nbsp;';
				  if($pmode == "Q")
				  {
					 echo 'Cheque</td>';
					}
				else
				{
					echo 'Credit Card</td>';
				}
				echo '<td width="80" align="left">&nbsp;';
				  if($pmode == "Q")
				  {
					 echo $cheque.'</td>';
					}
				else
				{
					echo $card.'</td>';	
				}
				  echo '<td width="80" align="left">&nbsp;';
				  if($pflag == "P")
				  {
					 echo 'In Process</td>';
					}
				else
				{
					echo 'Bounced Cheque</td>';
				}
				echo '</tr>';
				$total_due_amount = $total_due_amount + $trec;
				$i++;
			} // while ends here
			echo '</table><br>
			<table width="400" border="0" cellpadding="0" cellspacing="5" align="left">
			<tr>
				  <td width="170" align="left"><strong>Total Due Amount:</strong></td>
				  <td width="230" align="left">'.$total_due_amount.'</td>
				</tr>
				<tr>
				  <td width="170" align="left"><strong>Total No Of Records:</strong></td>
				  <td width="230" align="left">'.$num++.'</td>
				</tr>
				</table></div><br><br>';
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
			<td width="300" align="left">rpt_ost_revenue.php</td>
		</tr></table><br>';
	
	$query = "SELECT * FROM restaurant_master_tab";
	$result = mysql_query($query);
	$num1 = mysql_numrows($result);
	//mysql_close();
	//$num1--;
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:960px">
				<table width="900" border="1" cellpadding="0" cellspacing="0" align="center">
				  <thead>
				  <tr>
					  <td width="90" align="center"><strong>Date</strong></td>
					  <td width="60" align="center"><strong>Order No</strong></td>
					  <td width="150" align="center"><strong>Restaurant</strong></td>
					  <td width="200" align="center"><strong>Guest Name</strong></td>
					  <td width="70" align="center"><strong>Contact No</strong></td>
					  <td width="90" align="center"><strong>Due Amount</strong></td>
					  <td width="80" align="center"><strong>Payment Mode</strong></td>
					  <td width="70" align="center"><strong>Credit Card & Cheque No</strong></td>
					  <td width="80" align="center"><strong>Flag</strong></td>
				  </tr>
				  </thead>';
	$d = 0;
	while($d < $num1)
	{
		$rid = mysql_result($result,$d, "REST_ID" );
		$rname = mysql_result($result,$d, "REST_NAME" );
	
	  $query = "SELECT guest_master_tab.GUEST_ID, guest_master_tab.GUEST_NAME,guest_master_tab.GUEST_MOBILE_NO,
					order_master_tab.ORDER_NO,order_master_tab.NO_OF_GUEST,order_master_tab.TOTAL_CHARGES,
					order_master_tab.TOTAL_DISCOUNT,order_master_tab.TOTAL_SERV_CHARGES,order_master_tab.VISITED_DATE,
					order_master_tab.VISITED_TIME,order_master_tab.PAYMENT_MODE,order_master_tab.PAYMENT_REC,
					order_master_tab.PAYMENT_FLAG,order_master_tab.CREDIT_CARD_NO,order_master_tab.CHEQUE_NO,
					tax_charges_history.TAX_VALUE,
					restaurant_master_tab.REST_NAME
					FROM guest_master_tab, order_master_tab, tax_charges_history, restaurant_master_tab
					WHERE guest_master_tab.GUEST_ID = order_master_tab.GUEST_ID
					AND order_master_tab.REST_ID = restaurant_master_tab.REST_ID
					AND order_master_tab.TAX_ID = tax_charges_history.TAX_ID 
					AND restaurant_master_tab.REST_ID = '$rid' 
					AND order_master_tab.VISITED_DATE >= '$from' 
					AND order_master_tab.VISITED_DATE <= '$to'
					AND (order_master_tab.PAYMENT_FLAG = 'P' OR order_master_tab.PAYMENT_FLAG = 'B')
					ORDER BY order_master_tab.ORDER_NO ASC";
									  
	  $result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	  $num = mysql_numrows($result1);	  
	  $i=0;
	  while($i < $num)
	  {
		  $on = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
		  $r_name = mysql_result($result1,$i, "restaurant_master_tab.REST_NAME" );
		  $gname = mysql_result($result1,$i, "guest_master_tab.GUEST_NAME" );
		  $cell = mysql_result($result1,$i, "guest_master_tab.GUEST_MOBILE_NO" );
		  $vdate = mysql_result($result1,$i, "order_master_tab.VISITED_DATE" );
		  $trec = mysql_result($result1,$i, "order_master_tab.PAYMENT_REC" );
		  $pmode = mysql_result($result1,$i, "order_master_tab.PAYMENT_MODE" );
		  $pflag = mysql_result($result1,$i, "order_master_tab.PAYMENT_FLAG" );
		  $cheque = mysql_result($result1,$i, "order_master_tab.CHEQUE_NO" );
		  $card = mysql_result($result1,$i, "order_master_tab.CREDIT_CARD_NO" );
		  
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
			<td width="60" align="left">&nbsp;'.$vdate.'</td>
			<td width="60" align="left">&nbsp;'.$on.'</td>
			<td width="150" align="left">&nbsp;'.$r_name.'</td>
			<td width="200" align="left">&nbsp;'.$gname.'</td>
			<td width="70" align="left">&nbsp;'.$cell.'</td>
			<td width="90" align="left">&nbsp;'.$trec.'</td>';
			echo '<td width="80" align="left">&nbsp;';
			if($pmode == "Q")
			{
			   echo 'Cheque</td>';
			  }
		  else
		  {
			  echo 'Credit Card</td>';
		  }
		  echo '<td width="80" align="left">&nbsp;';
			if($pmode == "Q")
			{
			   echo $cheque.'</td>';
			  }
		  else
		  {
			  echo $card.'</td>';	
		  }
			echo '<td width="80" align="left">&nbsp;';
			if($pflag == "P")
			{
			   echo 'In Process</td>';
			  }
		  else
		  {
			  echo 'Bounced Cheque</td>';
		  }
		  echo '</tr>';
		  $total_due_amount = $total_due_amount + $trec;
		  $i++;
	  } // while ends here
  $d++;
} // while ends here
			  echo '</table><br>
			  <table width="400" border="0" cellpadding="0" cellspacing="5" align="left">
			  <tr>
					<td width="170" align="left"><strong>Total Due Amount:</strong></td>
					<td width="230" align="left">'.$total_due_amount.'</td>
				  </tr>
				  <tr>
					<td width="170" align="left"><strong>Total No Of Records:</strong></td>
					<td width="230" align="left">'.$num++.'</td>
				  </tr>
				  </table></div><br><br>';
	}
?>