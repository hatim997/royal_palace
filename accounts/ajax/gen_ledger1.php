<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$orderno = $_POST['orderno'];


?>
<?php
	
	$value = $_POST['value'];
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$type = $_POST['type'];
	$sorting = $_POST['sorting'];
	$try_date = $from_date;
	$from_date = $from_date." 00:00:00";
	$to_date = $to_date." 23:59:59";
	if($sorting == "TRN_DATE")
	{
		$date_field = "Value Date";
	}
	else
	{
		$date_field = "Voucher Date";
	}
	//echo $value."<br>";
	if($type == "M")
	{
	################################ CODE FOR PICKING CATEGORY 2 INFO STARTS HERE ################################
	$main_code = substr($value, '0', '2');
	//$ctrl_code = substr($value, '2', '2');
	//$scat1_code = substr($value, '4', '3');
	//$scat2_code = substr($value, '7', '4');
	//echo $main_code."<br>".$ctrl_code."<br>".$scat1_code."<br>".$scat2_code;
	$query = "SELECT MAIN_ACCT_CODE, MAIN_ACCT_TITLE
					FROM main_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$main_title = mysql_result($result1,$i, "MAIN_ACCT_TITLE" );
		$i++;
	} // while ends here
	/*
	$query = "SELECT CTRL_ACCT_CODE, CTRL_ACCT_TITLE
					FROM ctrl_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$ctrl_title = mysql_result($result1,$i, "CTRL_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT SCAT1_ACCT_CODE, SCAT1_ACCT_TITLE
					FROM scat1_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$scat1_title = mysql_result($result1,$i, "SCAT1_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT SCAT2_ACCT_CODE, SCAT2_ACCT_TITLE
					FROM scat2_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code' 
					AND SCAT2_ACCT_CODE = '$scat2_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$scat2_title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	################################ CODE FOR PICKING CATEGORY 2 INFO ENDS HERE ################################
	*/
?>

<div style="border: 1px solid black; overflow:auto; height:70px; width:993px; margin-left:2px; background-color:#E6F0F5;">
<table align="left" width="983">
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Main:</b></td>
    <td width="427" align="left"><?php echo $main_title; ?></b></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Opening:</b></td>
    <td width="131" align="left"><?php echo $opening; ?></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Control:</b></td>
    <td width="427" align="left"><?php echo "None"; ?></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Last Posting Date:</b></td>
    <td width="131" align="left"><b><?php echo date("d-m-Y", strtotime($try_date));?></b></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Category 1:</b></td>
    <td width="427" align="left"><?php echo "None"; ?></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
</div>

<?php
	$query1 = "SELECT * FROM voucher_transaction WHERE TRN_DATE < '$from_date' AND ACCOUNT_CODE LIKE '$value%' ORDER BY TRN_DATE DESC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$brought_forward = 0;
	$i=0;
	while($i < $num1)
	{
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$brought_forward = $brought_forward + $trn_amount;
		$i++;
	}
	//echo $brought_forward;
	$query1 = "SELECT * FROM voucher_transaction WHERE TRN_DATE >= '$from_date' 
				AND TRN_DATE <= '$to_date'  AND ACCOUNT_CODE LIKE '$value%' ORDER BY '$sorting' ASC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	if($num1 == 0)
	{
		echo '<br><h2>There are no transactions of this item.</h2>';
	}
	else
	{
		//echo '<h2>B/F: '.$brought_forward.'</h2>';
		echo '<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="124" align="center"><strong>'.$date_field.'</strong></td>
    <td width="83" align="center"><strong>Voucher No</strong></td>
    <td width="392" align="center"><strong>Narration</strong></td>
    <td width="74" align="center"><strong>Status</strong></td>
    <td width="82" align="center"><strong>Debit</strong></td>
    <td width="83" align="center"><strong>Credit</strong></td>
    <td width="80" align="center"><strong>Balance</strong></td>
</tr>
</table>';

	if($num1 == 1)
	{
		echo '<div style="overflow:auto; height:30px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 1 && $num1 <= 5)
	{
		echo '<div style="overflow:auto; height:95px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 5 && $num1 <= 10)
	{
		echo '<div style="overflow:auto; height:190px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 10 && $num1 <= 15)
	{
		echo '<div style="overflow:auto; height:210px; width:1030px;" align="center" id="center">';
	}
	else
	{
		echo '<div style="overflow:auto; height:280px; width:1030px;" align="center" id="center">';
	}
echo '<table width="1000" align="left">';
	$balance = $brought_forward;
	$total_posted = 0;
	$total_unposted = 0;
	$i=0;
	while($i < $num1)
	{
		$debit = 0;
		$credit = 0;
		$transaction_id = mysql_result($result1,$i, "TRANSACTION_ID" );
		$voucher_id  	= mysql_result($result1,$i, "VOUCHER_ID" );
		$voucher_type  	= mysql_result($result1,$i, "VOUCHER_TYPE" );
		$voucher_date   = mysql_result($result1,$i, "VOUCHER_DATE" );
		$trn_date      	= mysql_result($result1,$i, "TRN_DATE" );
		$account_code  	= mysql_result($result1,$i, "ACCOUNT_CODE" );
		$title  		= mysql_result($result1,$i, "ACCOUNT_TITLE" );
		$type   		= mysql_result($result1,$i, "AMOUNT_TYPE" );
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$trn_narration  = mysql_result($result1,$i, "TRN_NARRATION" );
		$flag  = mysql_result($result1,$i, "RECORD_FLAG" );
		if($sorting == "TRN_DATE")
		{
			$display_date = $trn_date;
		}
		else
		{
			$display_date = $voucher_date;
		}
		$j = $i + 1;
		if($flag == "P")
		{
			$display = "Posted";
			$total_posted = $total_posted + $trn_amount;
			echo '<tr style="color:#000; background-color:#BAECBA;">
					  <td width="45" align="center"><strong>'.$j.'</strong></td>
					  <td width="124" align="center"><strong>'.$display_date.'</strong></td>
					  <td width="83" align="left"><strong>'.$voucher_id.'</strong></td>
					  <td width="392" align="center"><strong>'.$trn_narration.'</strong></td>';
					  if($type == "DB")
					  {
						  $debit = $trn_amount;
						  $credit = 0;
						  $balance = ($debit + $credit) + $balance;
					  }
					  else
					  {
						  $debit = 0;
						  $credit = $trn_amount;
						  $balance = ($debit + $credit) + $balance;
						  $credit = ($credit * -1);
					  }
					  echo '<td width="74" align="center"><strong>'.$display.'</strong></td>
							<td width="82" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
							<td width="83" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
							<td width="80" align="right"><strong>'.$balance.'</strong></td>';
			echo '</tr>';
		}
		else
		{
			$display = "UnPosted";
			$total_unposted = $total_unposted + $trn_amount;
			echo '<tr style=" font-style:bold; color:#000; background-color:#F9D8D8;">
					  <td width="45" align="center"><strong>'.$j.'</strong></td>
					  <td width="124" align="center"><strong>'.$display_date.'</strong></td>
					  <td width="83" align="left"><strong>'.$voucher_id.'</strong></td>
					  <td width="392" align="center"><strong>'.$trn_narration.'</strong></td>';
					  if($type == "DB")
					  {
						  $debit = $trn_amount;
						  $credit = 0;
						  $balance = ($debit + $credit) + $balance;
					  }
					  else
					  {
						  $debit = 0;
						  $credit = $trn_amount;
						  $balance = ($debit + $credit) + $balance;
						  $credit = ($credit * -1);
					  }
					  echo '<td width="74" align="center"><strong>'.$display.'</strong></td>
							<td width="82" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
							<td width="83" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
							<td width="80" align="right"><strong>'.$balance.'</strong></td>';
			echo '</tr>';
		}
		$i++;
	}
?>
</table>
</div>
<table width="1000" align="right">
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left">&nbsp;</td>
    <td width="216" align="center">&nbsp;</td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>B/F:</strong></td>
    <td width="216" align="left"><?php echo number_format($brought_forward, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total Posted:</strong></td>
    <td width="216" align="left"><?php echo number_format($total_posted, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total UnPosted:</strong></td>
    <td width="216" align="left"><?php echo number_format($total_unposted, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Balance:</strong></td>
    <td width="216" align="left"><?php echo number_format(($brought_forward + $total_posted + $total_unposted), 2, '.', ','); ?></td>
    
</tr>
</table>

<?php
	} // else neds here	
	}
	else if($type == "C")
	{
	################################ CODE FOR PICKING CATEGORY 2 INFO STARTS HERE ################################
	$main_code = substr($value, '0', '2');
	$ctrl_code = substr($value, '2', '2');
	//$scat1_code = substr($value, '4', '3');
	//$scat2_code = substr($value, '7', '4');
	//echo $main_code."<br>".$ctrl_code."<br>".$scat1_code."<br>".$scat2_code;
	$query = "SELECT MAIN_ACCT_CODE, MAIN_ACCT_TITLE
					FROM main_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$main_title = mysql_result($result1,$i, "MAIN_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT CTRL_ACCT_CODE, CTRL_ACCT_TITLE
					FROM ctrl_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$ctrl_title = mysql_result($result1,$i, "CTRL_ACCT_TITLE" );
		$i++;
	} // while ends here
	/*
	$query = "SELECT SCAT1_ACCT_CODE, SCAT1_ACCT_TITLE
					FROM scat1_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$scat1_title = mysql_result($result1,$i, "SCAT1_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT SCAT2_ACCT_CODE, SCAT2_ACCT_TITLE
					FROM scat2_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code' 
					AND SCAT2_ACCT_CODE = '$scat2_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$scat2_title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	################################ CODE FOR PICKING CATEGORY 2 INFO ENDS HERE ################################
	*/
?>

<div style="border: 1px solid black; overflow:auto; height:70px; width:993px; margin-left:2px; background-color:#E6F0F5;">
<table align="left" width="983">
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Main:</b></td>
    <td width="427" align="left"><?php echo $main_title; ?></b></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Opening:</b></td>
    <td width="131" align="left"><?php echo $opening; ?></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Control:</b></td>
    <td width="427" align="left"><?php echo "None"; ?></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Last Posting Date:</b></td>
    <td width="131" align="left"><b><?php echo date("d-m-Y", strtotime($try_date));?></b></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Category 1:</b></td>
    <td width="427" align="left"><?php echo "None"; ?></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
</div>

<?php
	$query1 = "SELECT * FROM voucher_transaction WHERE TRN_DATE < '$from_date' AND ACCOUNT_CODE LIKE '$value%' ORDER BY TRN_DATE DESC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$brought_forward = 0;
	$i=0;
	while($i < $num1)
	{
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$brought_forward = $brought_forward + $trn_amount;
		$i++;
	}
	//echo $brought_forward;
	$query1 = "SELECT * FROM voucher_transaction WHERE TRN_DATE >= '$from_date' 
				AND TRN_DATE <= '$to_date'  AND ACCOUNT_CODE LIKE '$value%' ORDER BY '$sorting' ASC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	if($num1 == 0)
	{
		echo '<br><h2>There are no transactions of this item.</h2>';
	}
	else
	{
		//echo '<h2>B/F: '.$brought_forward.'</h2>';
		echo '<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="124" align="center"><strong>'.$date_field.'</strong></td>
    <td width="83" align="center"><strong>Voucher No</strong></td>
    <td width="392" align="center"><strong>Narration</strong></td>
    <td width="74" align="center"><strong>Status</strong></td>
    <td width="82" align="center"><strong>Debit</strong></td>
    <td width="83" align="center"><strong>Credit</strong></td>
    <td width="80" align="center"><strong>Balance</strong></td>
</tr>
</table>';

	if($num1 == 1)
	{
		echo '<div style="overflow:auto; height:30px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 1 && $num1 <= 5)
	{
		echo '<div style="overflow:auto; height:95px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 5 && $num1 <= 10)
	{
		echo '<div style="overflow:auto; height:190px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 10 && $num1 <= 15)
	{
		echo '<div style="overflow:auto; height:210px; width:1030px;" align="center" id="center">';
	}
	else
	{
		echo '<div style="overflow:auto; height:280px; width:1030px;" align="center" id="center">';
	}
echo '<table width="1000" align="left">';
	$balance = $brought_forward;
	$total_posted = 0;
	$total_unposted = 0;
	$i=0;
	while($i < $num1)
	{
		$debit = 0;
		$credit = 0;
		$transaction_id = mysql_result($result1,$i, "TRANSACTION_ID" );
		$voucher_id  	= mysql_result($result1,$i, "VOUCHER_ID" );
		$voucher_type  	= mysql_result($result1,$i, "VOUCHER_TYPE" );
		$voucher_date   = mysql_result($result1,$i, "VOUCHER_DATE" );
		$trn_date      	= mysql_result($result1,$i, "TRN_DATE" );
		$account_code  	= mysql_result($result1,$i, "ACCOUNT_CODE" );
		$title  		= mysql_result($result1,$i, "ACCOUNT_TITLE" );
		$type   		= mysql_result($result1,$i, "AMOUNT_TYPE" );
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$trn_narration  = mysql_result($result1,$i, "TRN_NARRATION" );
		$flag  = mysql_result($result1,$i, "RECORD_FLAG" );
		if($sorting == "TRN_DATE")
		{
			$display_date = $trn_date;
		}
		else
		{
			$display_date = $voucher_date;
		}
		$j = $i + 1;
		if($flag == "P")
		{
			$display = "Posted";
			$total_posted = $total_posted + $trn_amount;
			echo '<tr style="color:#000; background-color:#BAECBA;">
					  <td width="45" align="center"><strong>'.$j.'</strong></td>
					  <td width="124" align="center"><strong>'.$display_date.'</strong></td>
					  <td width="83" align="left"><strong>'.$voucher_id.'</strong></td>
					  <td width="392" align="center"><strong>'.$trn_narration.'</strong></td>';
					  if($type == "DB")
					  {
						  $debit = $trn_amount;
						  $credit = 0;
						  $balance = ($debit + $credit) + $balance;
					  }
					  else
					  {
						  $debit = 0;
						  $credit = $trn_amount;
						  $balance = ($debit + $credit) + $balance;
						  $credit = ($credit * -1);
					  }
					  echo '<td width="74" align="center"><strong>'.$display.'</strong></td>
							<td width="82" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
							<td width="83" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
							<td width="80" align="right"><strong>'.$balance.'</strong></td>';
			echo '</tr>';
		}
		else
		{
			$display = "UnPosted";
			$total_unposted = $total_unposted + $trn_amount;
			echo '<tr style=" font-style:bold; color:#000; background-color:#F9D8D8;">
					  <td width="45" align="center"><strong>'.$j.'</strong></td>
					  <td width="124" align="center"><strong>'.$display_date.'</strong></td>
					  <td width="83" align="left"><strong>'.$voucher_id.'</strong></td>
					  <td width="392" align="center"><strong>'.$trn_narration.'</strong></td>';
					  if($type == "DB")
					  {
						  $debit = $trn_amount;
						  $credit = 0;
						  $balance = ($debit + $credit) + $balance;
					  }
					  else
					  {
						  $debit = 0;
						  $credit = $trn_amount;
						  $balance = ($debit + $credit) + $balance;
						  $credit = ($credit * -1);
					  }
					  echo '<td width="74" align="center"><strong>'.$display.'</strong></td>
							<td width="82" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
							<td width="83" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
							<td width="80" align="right"><strong>'.$balance.'</strong></td>';
			echo '</tr>';
		}
		$i++;
	}
?>
</table>
</div>
<table width="1000" align="right">
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left">&nbsp;</td>
    <td width="216" align="center">&nbsp;</td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>B/F:</strong></td>
    <td width="216" align="left"><?php echo number_format($brought_forward, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total Posted:</strong></td>
    <td width="216" align="left"><?php echo number_format($total_posted, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total UnPosted:</strong></td>
    <td width="216" align="left"><?php echo number_format($total_unposted, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Balance:</strong></td>
    <td width="216" align="left"><?php echo number_format(($brought_forward + $total_posted + $total_unposted), 2, '.', ','); ?></td>
    
</tr>
</table>

<?php
	} // else neds here	
	}
	else if($type == "C1")
	{
	################################ CODE FOR PICKING CATEGORY 2 INFO STARTS HERE ################################
	$main_code = substr($value, '0', '2');
	$ctrl_code = substr($value, '2', '2');
	$scat1_code = substr($value, '4', '3');
	//echo $value."<br><br>";
	//echo $main_code."<br>".$ctrl_code."<br>".$scat1_code."<br>".$scat2_code;
	$query = "SELECT MAIN_ACCT_CODE, MAIN_ACCT_TITLE
					FROM main_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$main_title = mysql_result($result1,$i, "MAIN_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT CTRL_ACCT_CODE, CTRL_ACCT_TITLE
					FROM ctrl_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$ctrl_title = mysql_result($result1,$i, "CTRL_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT SCAT1_ACCT_CODE, SCAT1_ACCT_TITLE
					FROM scat1_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$scat1_title = mysql_result($result1,$i, "SCAT1_ACCT_TITLE" );
		$i++;
	} // while ends here
	/*
	$query = "SELECT SCAT2_ACCT_CODE, SCAT2_ACCT_TITLE
					FROM scat2_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code' 
					AND SCAT2_ACCT_CODE = '$scat2_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$scat2_title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	################################ CODE FOR PICKING CATEGORY 2 INFO ENDS HERE ################################
	*/
?>

<div style="border: 1px solid black; overflow:auto; height:70px; width:993px; margin-left:2px; background-color:#E6F0F5;">
<table align="left" width="983">
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Main:</b></td>
    <td width="427" align="left"><?php echo $main_title; ?></b></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Opening:</b></td>
    <td width="131" align="left"><?php echo $opening; ?></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Control:</b></td>
    <td width="427" align="left"><?php echo $ctrl_title; ?></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Last Posting Date:</b></td>
    <td width="131" align="left"><b><?php echo date("d-m-Y", strtotime($try_date));?></b></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Category 1:</b></td>
    <td width="427" align="left"><?php echo "None"; ?></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
</div>

<?php
	$query1 = "SELECT * FROM voucher_transaction WHERE TRN_DATE < '$from_date' AND ACCOUNT_CODE LIKE '$value%' ORDER BY TRN_DATE DESC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$brought_forward = 0;
	$i=0;
	while($i < $num1)
	{
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$brought_forward = $brought_forward + $trn_amount;
		$i++;
	}
	//echo $brought_forward;
	$query1 = "SELECT * FROM voucher_transaction WHERE TRN_DATE >= '$from_date' 
				AND TRN_DATE <= '$to_date'  AND ACCOUNT_CODE LIKE '$value%' ORDER BY '$sorting' ASC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	if($num1 == 0)
	{
		echo '<br><h2>There are no transactions of this item.</h2>';
	}
	else
	{
		//echo '<h2>B/F: '.$brought_forward.'</h2>';
		echo '<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="124" align="center"><strong>'.$date_field.'</strong></td>
    <td width="83" align="center"><strong>Voucher No</strong></td>
    <td width="392" align="center"><strong>Narration</strong></td>
    <td width="74" align="center"><strong>Status</strong></td>
    <td width="82" align="center"><strong>Debit</strong></td>
    <td width="83" align="center"><strong>Credit</strong></td>
    <td width="80" align="center"><strong>Balance</strong></td>
</tr>
</table>';

	if($num1 == 1)
	{
		echo '<div style="overflow:auto; height:30px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 1 && $num1 <= 5)
	{
		echo '<div style="overflow:auto; height:95px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 5 && $num1 <= 10)
	{
		echo '<div style="overflow:auto; height:190px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 10 && $num1 <= 15)
	{
		echo '<div style="overflow:auto; height:210px; width:1030px;" align="center" id="center">';
	}
	else
	{
		echo '<div style="overflow:auto; height:280px; width:1030px;" align="center" id="center">';
	}
echo '<table width="1000" align="left">';
	$balance = $brought_forward;
	$total_posted = 0;
	$total_unposted = 0;
	$i=0;
	while($i < $num1)
	{
		$debit = 0;
		$credit = 0;
		$transaction_id = mysql_result($result1,$i, "TRANSACTION_ID" );
		$voucher_id  	= mysql_result($result1,$i, "VOUCHER_ID" );
		$voucher_type  	= mysql_result($result1,$i, "VOUCHER_TYPE" );
		$voucher_date   = mysql_result($result1,$i, "VOUCHER_DATE" );
		$trn_date      	= mysql_result($result1,$i, "TRN_DATE" );
		$account_code  	= mysql_result($result1,$i, "ACCOUNT_CODE" );
		$title  		= mysql_result($result1,$i, "ACCOUNT_TITLE" );
		$type   		= mysql_result($result1,$i, "AMOUNT_TYPE" );
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$trn_narration  = mysql_result($result1,$i, "TRN_NARRATION" );
		$flag  = mysql_result($result1,$i, "RECORD_FLAG" );
		if($sorting == "TRN_DATE")
		{
			$display_date = $trn_date;
		}
		else
		{
			$display_date = $voucher_date;
		}
		$j = $i + 1;
		if($flag == "P")
		{
			$display = "Posted";
			$total_posted = $total_posted + $trn_amount;
			echo '<tr style="color:#000; background-color:#BAECBA;">
					  <td width="45" align="center"><strong>'.$j.'</strong></td>
					  <td width="124" align="center"><strong>'.$display_date.'</strong></td>
					  <td width="83" align="left"><strong>'.$voucher_id.'</strong></td>
					  <td width="392" align="center"><strong>'.$trn_narration.'</strong></td>';
					  if($type == "DB")
					  {
						  $debit = $trn_amount;
						  $credit = 0;
						  $balance = ($debit + $credit) + $balance;
					  }
					  else
					  {
						  $debit = 0;
						  $credit = $trn_amount;
						  $balance = ($debit + $credit) + $balance;
						  $credit = ($credit * -1);
					  }
					  echo '<td width="74" align="center"><strong>'.$display.'</strong></td>
							<td width="82" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
							<td width="83" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
							<td width="80" align="right"><strong>'.$balance.'</strong></td>';
			echo '</tr>';
		}
		else
		{
			$display = "UnPosted";
			$total_unposted = $total_unposted + $trn_amount;
			echo '<tr style=" font-style:bold; color:#000; background-color:#F9D8D8;">
					  <td width="45" align="center"><strong>'.$j.'</strong></td>
					  <td width="124" align="center"><strong>'.$display_date.'</strong></td>
					  <td width="83" align="left"><strong>'.$voucher_id.'</strong></td>
					  <td width="392" align="center"><strong>'.$trn_narration.'</strong></td>';
					  if($type == "DB")
					  {
						  $debit = $trn_amount;
						  $credit = 0;
						  $balance = ($debit + $credit) + $balance;
					  }
					  else
					  {
						  $debit = 0;
						  $credit = $trn_amount;
						  $balance = ($debit + $credit) + $balance;
						  $credit = ($credit * -1);
					  }
					  echo '<td width="74" align="center"><strong>'.$display.'</strong></td>
							<td width="82" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
							<td width="83" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
							<td width="80" align="right"><strong>'.$balance.'</strong></td>';
			echo '</tr>';
		}
		$i++;
	}
?>
</table>
</div>
<table width="1000" align="right">
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left">&nbsp;</td>
    <td width="216" align="center">&nbsp;</td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>B/F:</strong></td>
    <td width="216" align="left"><?php echo number_format($brought_forward, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total Posted:</strong></td>
    <td width="216" align="left"><?php echo number_format($total_posted, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total UnPosted:</strong></td>
    <td width="216" align="left"><?php echo number_format($total_unposted, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Balance:</strong></td>
    <td width="216" align="left"><?php echo number_format(($brought_forward + $total_posted + $total_unposted), 2, '.', ','); ?></td>
    
</tr>
</table>

<?php
	} // else neds here	
	}
	else
	{
		
	################################ CODE FOR PICKING CATEGORY 2 INFO STARTS HERE ################################
	$main_code = substr($value, '0', '2');
	$ctrl_code = substr($value, '2', '2');
	$scat1_code = substr($value, '4', '3');
	$scat2_code = substr($value, '7', '4');
	//echo $main_code."<br>".$ctrl_code."<br>".$scat1_code."<br>".$scat2_code;
	$query = "SELECT MAIN_ACCT_CODE, MAIN_ACCT_TITLE
					FROM main_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$main_title = mysql_result($result1,$i, "MAIN_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT CTRL_ACCT_CODE, CTRL_ACCT_TITLE
					FROM ctrl_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$ctrl_title = mysql_result($result1,$i, "CTRL_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT SCAT1_ACCT_CODE, SCAT1_ACCT_TITLE
					FROM scat1_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$scat1_title = mysql_result($result1,$i, "SCAT1_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	$query = "SELECT SCAT2_ACCT_CODE, SCAT2_ACCT_TITLE
					FROM scat2_acct_tab
					WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code' 
					AND SCAT2_ACCT_CODE = '$scat2_code'
					ORDER BY  MAIN_ACCT_CODE";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$scat2_title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
		$i++;
	} // while ends here
	
	################################ CODE FOR PICKING CATEGORY 2 INFO ENDS HERE ################################
?>

<div style="border: 1px solid black; overflow:auto; height:70px; width:993px; margin-left:2px; background-color:#E6F0F5;">
<table align="left" width="983">
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Main:</b></td>
    <td width="427" align="left"><?php echo $main_title; ?></b></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Opening:</b></td>
    <td width="131" align="left"><?php echo $opening; ?></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Control:</b></td>
    <td width="427" align="left"><?php echo $ctrl_title; ?></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Last Posting Date:</b></td>
    <td width="131" align="left"><b><?php echo date("d-m-Y", strtotime($try_date));?></b></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Category 1:</b></td>
    <td width="427" align="left"><?php echo $scat1_title; ?></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
</div>

<?php
	$query1 = "SELECT * FROM voucher_transaction WHERE TRN_DATE < '$from_date' AND ACCOUNT_CODE LIKE '$value%' ORDER BY TRN_DATE DESC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$brought_forward = 0;
	$i=0;
	while($i < $num1)
	{
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$brought_forward = $brought_forward + $trn_amount;
		$i++;
	}
	//echo $brought_forward;
	$query1 = "SELECT * FROM voucher_transaction WHERE TRN_DATE >= '$from_date' 
				AND TRN_DATE <= '$to_date'  AND ACCOUNT_CODE LIKE '$value%' ORDER BY '$sorting' ASC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	if($num1 == 0)
	{
		echo '<br><h2>There are no transactions of this item.</h2>';
	}
	else
	{
		//echo '<h2>B/F: '.$brought_forward.'</h2>';
		echo '<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="124" align="center"><strong>'.$date_field.'</strong></td>
    <td width="83" align="center"><strong>Voucher No</strong></td>
    <td width="392" align="center"><strong>Narration</strong></td>
    <td width="74" align="center"><strong>Status</strong></td>
    <td width="82" align="center"><strong>Debit</strong></td>
    <td width="83" align="center"><strong>Credit</strong></td>
    <td width="80" align="center"><strong>Balance</strong></td>
</tr>
</table>';

	if($num1 == 1)
	{
		echo '<div style="overflow:auto; height:30px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 1 && $num1 <= 5)
	{
		echo '<div style="overflow:auto; height:95px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 5 && $num1 <= 10)
	{
		echo '<div style="overflow:auto; height:190px; width:1030px;" align="center" id="center">';
	}
	else if($num1 > 10 && $num1 <= 15)
	{
		echo '<div style="overflow:auto; height:210px; width:1030px;" align="center" id="center">';
	}
	else
	{
		echo '<div style="overflow:auto; height:280px; width:1030px;" align="center" id="center">';
	}
echo '<table width="1000" align="left">';
	$balance = $brought_forward;
	$total_posted = 0;
	$total_unposted = 0;
	$i=0;
	while($i < $num1)
	{
		$debit = 0;
		$credit = 0;
		$transaction_id = mysql_result($result1,$i, "TRANSACTION_ID" );
		$voucher_id  	= mysql_result($result1,$i, "VOUCHER_ID" );
		$voucher_type  	= mysql_result($result1,$i, "VOUCHER_TYPE" );
		$voucher_date   = mysql_result($result1,$i, "VOUCHER_DATE" );
		$trn_date      	= mysql_result($result1,$i, "TRN_DATE" );
		$account_code  	= mysql_result($result1,$i, "ACCOUNT_CODE" );
		$title  		= mysql_result($result1,$i, "ACCOUNT_TITLE" );
		$type   		= mysql_result($result1,$i, "AMOUNT_TYPE" );
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$trn_narration  = mysql_result($result1,$i, "TRN_NARRATION" );
		$flag  = mysql_result($result1,$i, "RECORD_FLAG" );
		if($sorting == "TRN_DATE")
		{
			$display_date = $trn_date;
		}
		else
		{
			$display_date = $voucher_date;
		}
		$j = $i + 1;
		if($flag == "P")
		{
			$display = "Posted";
			$total_posted = $total_posted + $trn_amount;
			echo '<tr style="color:#000; background-color:#BAECBA;">
					  <td width="45" align="center"><strong>'.$j.'</strong></td>
					  <td width="124" align="center"><strong>'.$display_date.'</strong></td>
					  <td width="83" align="left"><strong>'.$voucher_id.'</strong></td>
					  <td width="392" align="center"><strong>'.$trn_narration.'</strong></td>';
					  if($type == "DB")
					  {
						  $debit = $trn_amount;
						  $credit = 0;
						  $balance = ($debit + $credit) + $balance;
					  }
					  else
					  {
						  $debit = 0;
						  $credit = $trn_amount;
						  $balance = ($debit + $credit) + $balance;
						  $credit = ($credit * -1);
					  }
					  echo '<td width="74" align="center"><strong>'.$display.'</strong></td>
							<td width="82" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
							<td width="83" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
							<td width="80" align="right"><strong>'.$balance.'</strong></td>';
			echo '</tr>';
		}
		else
		{
			$display = "UnPosted";
			$total_unposted = $total_unposted + $trn_amount;
			echo '<tr style=" font-style:bold; color:#000; background-color:#F9D8D8;">
					  <td width="45" align="center"><strong>'.$j.'</strong></td>
					  <td width="124" align="center"><strong>'.$display_date.'</strong></td>
					  <td width="83" align="left"><strong>'.$voucher_id.'</strong></td>
					  <td width="392" align="center"><strong>'.$trn_narration.'</strong></td>';
					  if($type == "DB")
					  {
						  $debit = $trn_amount;
						  $credit = 0;
						  $balance = ($debit + $credit) + $balance;
					  }
					  else
					  {
						  $debit = 0;
						  $credit = $trn_amount;
						  $balance = ($debit + $credit) + $balance;
						  $credit = ($credit * -1);
					  }
					  echo '<td width="74" align="center"><strong>'.$display.'</strong></td>
							<td width="82" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
							<td width="83" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
							<td width="80" align="right"><strong>'.$balance.'</strong></td>';
			echo '</tr>';
		}
		$i++;
	}
?>
</table>
</div>
<table width="1000" align="right">
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left">&nbsp;</td>
    <td width="216" align="center">&nbsp;</td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>B/F:</strong></td>
    <td width="216" align="left"><?php echo number_format($brought_forward, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total Posted:</strong></td>
    <td width="216" align="left"><?php echo number_format($total_posted, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total UnPosted:</strong></td>
    <td width="216" align="left"><?php echo number_format($total_unposted, 2, '.', ','); ?></td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Balance:</strong></td>
    <td width="216" align="left"><?php echo number_format(($brought_forward + $total_posted + $total_unposted), 2, '.', ','); ?></td>
    
</tr>
</table>

<?php
	} // else neds here
	} // else ends here
?>