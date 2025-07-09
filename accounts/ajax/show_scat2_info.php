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
	//echo $value."<br>";
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
	/*
	$query = "SELECT main_acct_tab.MAIN_ACCT_CODE, main_acct_tab.MAIN_ACCT_TITLE,
					ctrl_acct_tab.CTRL_ACCT_CODE, ctrl_acct_tab.CTRL_ACCT_TITLE, 
					scat1_acct_tab.SCAT1_ACCT_CODE, scat1_acct_tab.SCAT1_ACCT_TITLE, 
					scat2_acct_tab.SCAT2_ACCT_CODE, scat2_acct_tab.SCAT2_ACCT_TITLE
					FROM main_acct_tab, ctrl_acct_tab, scat1_acct_tab, scat2_acct_tab 
					WHERE scat2_acct_tab.SCAT1_ACCT_CODE = scat1_acct_tab.SCAT1_ACCT_CODE 
					AND scat2_acct_tab.CTRL_ACCT_CODE = scat1_acct_tab.CTRL_ACCT_CODE 
					AND scat2_acct_tab.MAIN_ACCT_CODE = scat1_acct_tab.MAIN_ACCT_CODE 
					AND scat2_acct_tab.CTRL_ACCT_CODE = ctrl_acct_tab.CTRL_ACCT_CODE 
					AND scat2_acct_tab.MAIN_ACCT_CODE = ctrl_acct_tab.MAIN_ACCT_CODE 
					AND ctrl_acct_tab.MAIN_ACCT_CODE = main_acct_tab.MAIN_ACCT_CODE  
					AND scat2_acct_tab.SCAT2_ACCT_CODE = '$value'
					ORDER BY  main_acct_tab.MAIN_ACCT_CODE, ctrl_acct_tab.CTRL_ACCT_CODE, 
					scat1_acct_tab.SCAT1_ACCT_CODE, scat2_acct_tab.SCAT2_ACCT_CODE ASC";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		$main_code = mysql_result($result1,$i, "main_acct_tab.MAIN_ACCT_CODE" );
		$main_title = mysql_result($result1,$i, "main_acct_tab.MAIN_ACCT_TITLE" );
		$ctrl_code = mysql_result($result1,$i, "ctrl_acct_tab.CTRL_ACCT_CODE" );
		$ctrl_title = mysql_result($result1,$i, "ctrl_acct_tab.CTRL_ACCT_TITLE" );
		$scat1_code = mysql_result($result1,$i, "scat1_acct_tab.SCAT1_ACCT_CODE" );
		$scat1_title = mysql_result($result1,$i, "scat1_acct_tab.SCAT1_ACCT_TITLE" );
		$scat2_code = mysql_result($result1,$i, "scat2_acct_tab.SCAT2_ACCT_CODE" );
		$scat2_title = mysql_result($result1,$i, "scat2_acct_tab.SCAT2_ACCT_TITLE" );
		$i++;
	} // while ends here
	*/
	$code = $main_code.$ctrl_code.$scat1_code.$scat2_code;
	//echo "Code is ".$code."<br>";
	######### CODE FOR OPENING ###########
	$query1 = "SELECT * FROM voucher_transaction WHERE VOUCHER_ID = 'XX' AND ACCOUNT_CODE = '$code'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	if($num1 == 0)
	{
		$opening = 0;
	}
	else
	{
		$i=0;
		while($i < $num1)
		{
			$opening = mysql_result($result1,$i, "TRN_AMOUNT" );
			$i++;
		}
	}
	
	######### CODE FOR LAST POSTING DATE ###########
	$query1 = "SELECT * FROM posting_master_tab";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$last_date = mysql_result($result1,$i, "LAST_POSTING_DATE" );
		$i++;
	}
?>

<div style="border: 1px solid black; overflow:auto; height:80px; width:1000px;">
<table align="left" width="998">
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
    <td width="131" align="left"><b><?php echo date("d-m-Y", strtotime($last_date));?></b></td>
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
<br>
<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="58" align="center"><strong>SR. No</strong></td>
    <td width="123" align="center"><strong>Transaction Date</strong></td>
    <td width="99" align="center"><strong>Voucher No</strong></td>
    <td width="428" align="center"><strong>Narration</strong></td>
    <td width="90" align="center"><strong>Debit</strong></td>
    <td width="90" align="center"><strong>Credit</strong></td>
    <td width="80" align="center"><strong>Balance</strong></td>
</tr>
</table>
<div style="border: 1px solid black; overflow:auto; height:280px; width:1000px;" align="center" id="center">
<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<?php

	$query1 = "SELECT * FROM voucher_transaction WHERE ACCOUNT_CODE = '$code' AND VOUCHER_ID != 'XX' ORDER BY TRN_DATE DESC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	if($num1 == 0)
	{
		$opening = 0;
	}
	else
	{
		$balance = 0;
		$i=0;
		while($i < $num1)
		{
			$debit = 0;
			$credit = 0;
			$transaction_id = mysql_result($result1,$i, "TRANSACTION_ID" );
			$voucher_id  	= mysql_result($result1,$i, "VOUCHER_ID" );
			$voucher_type  	= mysql_result($result1,$i, "VOUCHER_TYPE" );
			$trn_date      	= mysql_result($result1,$i, "TRN_DATE" );
			$account_code  	= mysql_result($result1,$i, "ACCOUNT_CODE" );
			$title  		= mysql_result($result1,$i, "ACCOUNT_TITLE" );
			$type   		= mysql_result($result1,$i, "AMOUNT_TYPE" );
			$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
			$trn_narration  = mysql_result($result1,$i, "TRN_NARRATION" );
			$j = $i + 1;
			
			echo '<tr>
					  <td width="58" align="center">'.$j.'</td>
					  <td width="123" align="center">'.$trn_date.'</td>
					  <td width="99" align="center">'.$voucher_id.'</td>
					  <td width="428" align="center">'.$trn_narration.'</td>';
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
					  }
					  echo '<td width="90" align="center">'.$debit.'</td>
							<td width="90" align="center">'.$credit.'</td>
							<td width="80" align="center">'.$balance.'</td>';
			echo '</tr>';
			$i++;
		}
	}
?>
</table>
</div>