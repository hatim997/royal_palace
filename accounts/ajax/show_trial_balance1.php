<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$orderno = $_POST['orderno'];
?>
<?php
	
	$type = $_POST['type'];
	$to_date = $_POST['to_date'];
	$option = $_POST['sorting'];
	$last_trial_date = $_POST['last_trial_date'];
	
	//echo $value."<br>";
	if($type == "M")
	{
		$query = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_CODE ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		while($i < $num)
		{
			//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$account_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			
			$query_select = "SELECT * FROM voucher_transaction WHERE ACCOUNT_CODE LIKE '$account_code%' 
								AND VOUCHER_DATE <= '$to_date' ORDER BY TRN_DATE ASC";
			$result = mysql_query($query_select)or die("Failed :".mysql_error());
			$num_rows = mysql_numrows($result);
			$j=0;
			$total_amount = 0;
			while($j < $num_rows)
			{
				$trn_amount = mysql_result($result,$j, "TRN_AMOUNT" );
				$total_amount = $total_amount + $trn_amount;
				$j++;
			}
			//echo "Amount is ".$total_amount."<br>";
			if($total_amount >= 0)
			{
				$update =  "UPDATE main_acct_tab SET TOTAL_DEBIT = '$total_amount', TOTAL_CREDIT = '0', LAST_BALANCE_DATE = '$to_date' 
							WHERE MAIN_ACCT_CODE = '$account_code'";
				mysql_query($update) or die("Failed 1: ".mysql_error());
			}
			else
			{
				$update =  "UPDATE main_acct_tab SET TOTAL_DEBIT = '0', TOTAL_CREDIT = '$total_amount', LAST_BALANCE_DATE = '$to_date' 
							WHERE MAIN_ACCT_CODE = '$account_code'";
				mysql_query($update) or die("Failed 1: ".mysql_error());
			}
			$i++;
		} // while ends here
		
		$query = "SELECT TOTAL_DEBIT, TOTAL_CREDIT, LAST_BALANCE_DATE FROM main_acct_tab ORDER BY MAIN_ACCT_CODE ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		$total_debit = 0;
		$total_credit = 0;
		while($i < $num)
		{
			//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$tota_debit = mysql_result($result1,$i, "TOTAL_DEBIT" );
			$tota_credit = mysql_result($result1,$i, "TOTAL_CREDIT" );
			$last_trial_date = mysql_result($result1,$i, "LAST_BALANCE_DATE" );
			$total_debit = $total_debit + $tota_debit;
			$total_credit = $total_credit + $tota_credit;
			$i++;
		} // while ends here
	?>
		<table align="left" width="983">
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Debit:</b></td>
    <td width="172" align="left"><?php echo $total_debit; ?></td>
    <td width="413" height="5" align="left">&nbsp;</td>
    <td width="142" height="5" align="left"><b>Trial Balance Date:</b></td>
    <td width="131" align="left"><?php echo date("d/m/Y", strtotime($last_trial_date)); ?></td>
</tr>
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Credit:</b></td>
    <td width="172" align="left"><?php echo $total_credit; ?></td>
    <td width="413" height="5" align="left">&nbsp;</td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left"><b>&nbsp;</b></td>
</tr>
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Balance:</b></td>
    <td width="172" align="left"><?php echo ($total_debit - $total_credit); ?></td>
    <td width="413" height="5" align="center"><?php
		if ( $total_debit == 0 && $total_credit == 0 && $last_trial_date == "0000-00-00")
		{
			echo '<img src="images/view.png" height="25" width="60" alt="Balance Cannot be Viewed" />
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>' ;
		}
		
		else
		{
			echo '<a alt="View" title="View" id="view-record1">
				  <img src="images/view.png" height="25" width="60" alt="View"  /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="javascript:printSelection1(trial_balance)" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
		}
	?></td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
<div id="show1" style="height:200px; overflow:auto; width:990px; display:none;">
<table width="973" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="130" align="center"><strong>Account Code</strong></td>
    <td width="500" align="center"><strong>Account Title</strong></td>
    <td width="120" align="center"><strong>Debit</strong></td>
    <td width="120" align="center"><strong>Credit</strong></td>
    <td width="60" align="center"><strong>Details</strong></td>
</tr>

<?php

	################display 2nd div###################
      
    if($option == "I")
	{
		$query1 = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_CODE ASC";
	}
	else
	{
		$query1 = "SELECT * FROM main_acct_tab WHERE (TOTAL_DEBIT != '0' OR TOTAL_CREDIT != '0') AND LAST_BALANCE_DATE != '0000-00-00' ORDER BY MAIN_ACCT_CODE ASC";
	}
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	$j = 0;
	while($i < $num1)
	{
		$code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$title = mysql_result($result1,$i, "MAIN_ACCT_TITLE" );
		$debit = mysql_result($result1,$i, "TOTAL_DEBIT" );
		$credit = mysql_result($result1,$i, "TOTAL_CREDIT" );
		$j = $i + 1;
		if($i%2 == 0)
		{
		  	echo '<tr style="background-color:#a7dbf0;">
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="130" align="left"><strong>'.$code.'</strong></td>
					<td width="500" align="left"><strong>'.$title.'</strong></td>
					<td width="120" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="120" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
					<td width="60" align="center"><strong><a href="view_ledger.php?type=M&code='.$code.'&todate='.$to_date.'&option=TRN_DATE&sort='.$option.'" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
				</tr>';
		}
		else
		{
			echo '<tr>
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="130" align="left"><strong>'.$code.'</strong></td>
					<td width="500" align="left"><strong>'.$title.'</strong></td>
					<td width="120" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="120" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
					<td width="60" align="center"><strong><a href="view_ledger.php?type=M&code='.$code.'&todate='.$to_date.'&option=TRN_DATE&sort='.$option.'" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
				</tr>';
		}
		$i++;
	}

?>
</table>
</div>
<?php
	} // first if ends here
	else if($type == "C")
	{
		$query = "SELECT * FROM ctrl_acct_tab ORDER BY CTRL_ACCT_CODE ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		while($i < $num)
		{
			//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$ctrl_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
			$account_code = $main_code.$ctrl_code;
			
			$query_select = "SELECT * FROM voucher_transaction WHERE ACCOUNT_CODE LIKE '$account_code%' 
								AND VOUCHER_DATE <= '$to_date' ORDER BY TRN_DATE ASC";
			$result = mysql_query($query_select)or die("Failed :".mysql_error());
			$num_rows = mysql_numrows($result);
			$j=0;
			$total_amount = 0;
			while($j < $num_rows)
			{
				$trn_amount = mysql_result($result,$j, "TRN_AMOUNT" );
				$total_amount = $total_amount + $trn_amount;
				$j++;
			}
			//echo "Amount is ".$total_amount."<br>";
			if($total_amount >= 0)
			{
				$update =  "UPDATE ctrl_acct_tab SET TOTAL_DEBIT = '$total_amount', TOTAL_CREDIT = '0', LAST_BALANCE_DATE = '$to_date' 
							WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code'";
				mysql_query($update) or die("Failed 1: ".mysql_error());
			}
			else
			{
				$update =  "UPDATE ctrl_acct_tab SET TOTAL_DEBIT = '0', TOTAL_CREDIT = '$total_amount', LAST_BALANCE_DATE = '$to_date' 
							WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code'";
				mysql_query($update) or die("Failed 1: ".mysql_error());
			}
			$i++;
		} // while ends here
		
		$query = "SELECT TOTAL_DEBIT, TOTAL_CREDIT, LAST_BALANCE_DATE FROM ctrl_acct_tab ORDER BY CTRL_ACCT_CODE ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		$total_debit = 0;
		$total_credit = 0;
		while($i < $num)
		{
			//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$tota_debit = mysql_result($result1,$i, "TOTAL_DEBIT" );
			$tota_credit = mysql_result($result1,$i, "TOTAL_CREDIT" );
			$last_trial_date = mysql_result($result1,$i, "LAST_BALANCE_DATE" );
			$total_debit = $total_debit + $tota_debit;
			$total_credit = $total_credit + $tota_credit;
			$i++;
		} // while ends here
		?>
		<table align="left" width="983">
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Debit:</b></td>
    <td width="172" align="left"><?php echo $total_debit; ?></td>
    <td width="413" height="5" align="left">&nbsp;</td>
    <td width="142" height="5" align="left"><b>Trial Balance Date:</b></td>
    <td width="131" align="left"><?php echo date("d/m/Y", strtotime($last_trial_date)); ?></td>
</tr>
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Credit:</b></td>
    <td width="172" align="left"><?php echo $total_credit; ?></td>
    <td width="413" height="5" align="left">&nbsp;</td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left"><b>&nbsp;</b></td>
</tr>
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Balance:</b></td>
    <td width="172" align="left"><?php echo ($total_debit - $total_credit); ?></td>
    <td width="413" height="5" align="center"><?php
		if ( $total_debit == 0 && $total_credit == 0 && $last_trial_date == "0000-00-00")
		{
			echo '<img src="images/view.png" height="25" width="60" alt="Balance Cannot be Viewed" />
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>' ;
		}
		
		else
		{
			echo '<a alt="View" title="View" id="view-record1">
				  <img src="images/view.png" height="25" width="60" alt="View"  /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="javascript:printSelection1(trial_balance)" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
		}
	?></td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
<div id="show1" style="height:200px; overflow:auto; width:990px; display:none;">
<table width="973" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="130" align="center"><strong>Account Code</strong></td>
    <td width="500" align="center"><strong>Account Title</strong></td>
    <td width="120" align="center"><strong>Debit</strong></td>
    <td width="120" align="center"><strong>Credit</strong></td>  
</tr>

<?php

	################display 2nd div###################
    if($option == "I")
	{
		$query1 = "SELECT * FROM ctrl_acct_tab ORDER BY CTRL_ACCT_CODE ASC";
	}
	else
	{
		$query1 = "SELECT * FROM ctrl_acct_tab WHERE (TOTAL_DEBIT != '0' OR TOTAL_CREDIT != '0') AND LAST_BALANCE_DATE != '0000-00-00' ORDER BY CTRL_ACCT_CODE ASC";
	}
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	$j = 0;
	while($i < $num1)
	{
		$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$ctrl_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
		$title = mysql_result($result1,$i, "CTRL_ACCT_TITLE" );
		$debit = mysql_result($result1,$i, "TOTAL_DEBIT" );
		$credit = mysql_result($result1,$i, "TOTAL_CREDIT" );
		$code = $main_code.$ctrl_code;
		$j = $i + 1;
		if($i%2 == 0)
		{
		  	echo '<tr style="background-color:#a7dbf0;">
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="130" align="left"><strong>'.$code.'</strong></td>
					<td width="500" align="left"><strong>'.$title.'</strong></td>
					<td width="120" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="120" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
				</tr>';
		}
		else
		{
			echo '<tr>
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="130" align="left"><strong>'.$code.'</strong></td>
					<td width="500" align="left"><strong>'.$title.'</strong></td>
					<td width="120" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="120" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
				</tr>';
		}
		$i++;
	}

?>
</table>
</div>
<?php
	}
	else if($type == "C1")
	{
		$query = "SELECT * FROM scat1_acct_tab ORDER BY SCAT1_ACCT_CODE ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		while($i < $num)
		{
			//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$ctrl_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
			$scat1_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
			$account_code = $main_code.$ctrl_code.$scat1_code;
			
			$query_select = "SELECT * FROM voucher_transaction WHERE ACCOUNT_CODE LIKE '$account_code%' 
								AND VOUCHER_DATE <= '$to_date' ORDER BY TRN_DATE ASC";
			$result = mysql_query($query_select)or die("Failed :".mysql_error());
			$num_rows = mysql_numrows($result);
			$j=0;
			$total_amount = 0;
			while($j < $num_rows)
			{
				$trn_amount = mysql_result($result,$j, "TRN_AMOUNT" );
				$total_amount = $total_amount + $trn_amount;
				$j++;
			}
			//echo "Amount is ".$total_amount."<br>";
			if($total_amount >= 0)
			{
				$update =  "UPDATE scat1_acct_tab SET TOTAL_DEBIT = '$total_amount', TOTAL_CREDIT = '0', LAST_BALANCE_DATE = '$to_date' 
							WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code'";
				mysql_query($update) or die("Failed 1: ".mysql_error());
			}
			else
			{
				$update =  "UPDATE scat1_acct_tab SET TOTAL_DEBIT = '0', TOTAL_CREDIT = '$total_amount', LAST_BALANCE_DATE = '$to_date' 
							WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' AND SCAT1_ACCT_CODE = '$scat1_code'";
				mysql_query($update) or die("Failed 1: ".mysql_error());
			}
			$i++;
		} // while ends here
		
		$query = "SELECT TOTAL_DEBIT, TOTAL_CREDIT, LAST_BALANCE_DATE FROM scat1_acct_tab ORDER BY SCAT1_ACCT_CODE ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		$total_debit = 0;
		$total_credit = 0;
		while($i < $num)
		{
			//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$tota_debit = mysql_result($result1,$i, "TOTAL_DEBIT" );
			$tota_credit = mysql_result($result1,$i, "TOTAL_CREDIT" );
			$last_trial_date = mysql_result($result1,$i, "LAST_BALANCE_DATE" );
			$total_debit = $total_debit + $tota_debit;
			$total_credit = $total_credit + $tota_credit;
			$i++;
		} // while ends here
		?>
		<table align="left" width="983">
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Debit:</b></td>
    <td width="172" align="left"><?php echo $total_debit; ?></td>
    <td width="413" height="5" align="left">&nbsp;</td>
    <td width="142" height="5" align="left"><b>Trial Balance Date:</b></td>
    <td width="131" align="left"><?php echo date("d/m/Y", strtotime($last_trial_date)); ?></td>
</tr>
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Credit:</b></td>
    <td width="172" align="left"><?php echo $total_credit; ?></td>
    <td width="413" height="5" align="left">&nbsp;</td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left"><b>&nbsp;</b></td>
</tr>
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Balance:</b></td>
    <td width="172" align="left"><?php echo ($total_debit - $total_credit); ?></td>
    <td width="413" height="5" align="center"><?php
		if ( $total_debit == 0 && $total_credit == 0 && $last_trial_date == "0000-00-00")
		{
			echo '<img src="images/view.png" height="25" width="60" alt="Balance Cannot be Viewed" />
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>' ;
		}
		
		else
		{
			echo '<a alt="View" title="View" id="view-record1">
				  <img src="images/view.png" height="25" width="60" alt="View"  /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="javascript:printSelection1(trial_balance)" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
		}
	?></td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
<div id="show1" style="height:200px; overflow:auto; width:990px; display:none;">
<table width="973" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="130" align="center"><strong>Account Code</strong></td>
    <td width="500" align="center"><strong>Account Title</strong></td>
    <td width="120" align="center"><strong>Debit</strong></td>
    <td width="120" align="center"><strong>Credit</strong></td>  
</tr>

<?php

	################display 2nd div###################
    if($option == "I")
	{
		$query1 = "SELECT * FROM scat1_acct_tab ORDER BY MAIN_ACCT_CODE ASC";
	}
	else
	{
		$query1 = "SELECT * FROM scat1_acct_tab WHERE (TOTAL_DEBIT != '0' OR TOTAL_CREDIT != '0') AND LAST_BALANCE_DATE != '0000-00-00' ORDER BY MAIN_ACCT_CODE ASC";
	}
    //$query1 = "SELECT * FROM scat1_acct_tab ORDER BY SCAT1_ACCT_CODE ASC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	$j = 0;
	while($i < $num1)
	{
		$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$ctrl_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
		$scat1_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
		$title = mysql_result($result1,$i, "SCAT1_ACCT_TITLE" );
		$debit = mysql_result($result1,$i, "TOTAL_DEBIT" );
		$credit = mysql_result($result1,$i, "TOTAL_CREDIT" );
		$code = $main_code.$ctrl_code.$scat1_code;
		$j = $i + 1;
		if($i%2 == 0)
		{
		  	echo '<tr style="background-color:#a7dbf0;">
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="130" align="left"><strong>'.$code.'</strong></td>
					<td width="500" align="left"><strong>'.$title.'</strong></td>
					<td width="120" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="120" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
				</tr>';
		}
		else
		{
			echo '<tr>
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="130" align="left"><strong>'.$code.'</strong></td>
					<td width="500" align="left"><strong>'.$title.'</strong></td>
					<td width="120" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="120" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
				</tr>';
		}
		$i++;
	}

?>
</table>
</div>
<?php
	}
	else
	{
		$query = "SELECT * FROM scat2_acct_tab ORDER BY SCAT2_ACCT_CODE ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		while($i < $num)
		{
			//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$ctrl_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
			$scat1_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
			$scat2_code = mysql_result($result1,$i, "SCAT2_ACCT_CODE" );
			$account_code = $main_code.$ctrl_code.$scat1_code.$scat2_code;
			
			$query_select = "SELECT * FROM voucher_transaction WHERE ACCOUNT_CODE LIKE '$account_code%' 
								AND VOUCHER_DATE <= '$to_date' ORDER BY TRN_DATE ASC";
			$result = mysql_query($query_select)or die("Failed :".mysql_error());
			$num_rows = mysql_numrows($result);
			$j=0;
			$total_amount = 0;
			while($j < $num_rows)
			{
				$trn_amount = mysql_result($result,$j, "TRN_AMOUNT" );
				$total_amount = $total_amount + $trn_amount;
				$j++;
			}
			//echo "Amount is ".$total_amount."<br>";
			if($total_amount >= 0)
			{
				$update =  "UPDATE scat2_acct_tab SET TOTAL_DEBIT = '$total_amount', TOTAL_CREDIT = '0', LAST_BALANCE_DATE = '$to_date' 
							WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' 
							AND SCAT1_ACCT_CODE = '$scat1_code' AND SCAT2_ACCT_CODE = '$scat2_code'";
				mysql_query($update) or die("Failed 1: ".mysql_error());
			}
			else
			{
				$update =  "UPDATE scat2_acct_tab SET TOTAL_DEBIT = '0', TOTAL_CREDIT = '$total_amount', LAST_BALANCE_DATE = '$to_date' 
							WHERE MAIN_ACCT_CODE = '$main_code' AND CTRL_ACCT_CODE = '$ctrl_code' 
							AND SCAT1_ACCT_CODE = '$scat1_code' AND SCAT2_ACCT_CODE = '$scat2_code'";
				mysql_query($update) or die("Failed 1: ".mysql_error());
			}
			$i++;
		} // while ends here
		
		$query = "SELECT TOTAL_DEBIT, TOTAL_CREDIT, LAST_BALANCE_DATE FROM scat2_acct_tab ORDER BY SCAT2_ACCT_CODE ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		$total_debit = 0;
		$total_credit = 0;
		while($i < $num)
		{
			//$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$tota_debit = mysql_result($result1,$i, "TOTAL_DEBIT" );
			$tota_credit = mysql_result($result1,$i, "TOTAL_CREDIT" );
			$last_trial_date = mysql_result($result1,$i, "LAST_BALANCE_DATE" );
			$total_debit = $total_debit + $tota_debit;
			$total_credit = $total_credit + $tota_credit;
			$i++;
		} // while ends here
		?>
		<table align="left" width="983">
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Debit:</b></td>
    <td width="172" align="left"><?php echo $total_debit; ?></td>
    <td width="413" height="5" align="left">&nbsp;</td>
    <td width="142" height="5" align="left"><b>Trial Balance Date:</b></td>
    <td width="131" align="left"><?php echo date("d/m/Y", strtotime($last_trial_date)); ?></td>
</tr>
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Credit:</b></td>
    <td width="172" align="left"><?php echo $total_credit; ?></td>
    <td width="413" height="5" align="left">&nbsp;</td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left"><b>&nbsp;</b></td>
</tr>
<tr>
    <td width="101" height="5" align="left">&nbsp;&nbsp;<b>Balance:</b></td>
    <td width="172" align="left"><?php echo ($total_debit - $total_credit); ?></td>
    <td width="413" height="5" align="center"><?php
		if ( $total_debit == 0 && $total_credit == 0 && $last_trial_date == "0000-00-00")
		{
			echo '<img src="images/view.png" height="25" width="60" alt="Balance Cannot be Viewed" />
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>' ;
		}
		
		else
		{
			echo '<a alt="View" title="View" id="view-record1">
				  <img src="images/view.png" height="25" width="60" alt="View"  /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="javascript:printSelection1(trial_balance)" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
		}
	?></td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
<div id="show1" style="height:200px; overflow:auto; width:990px; display:none;">
<table width="973" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="130" align="center"><strong>Account Code</strong></td>
    <td width="500" align="center"><strong>Account Title</strong></td>
    <td width="120" align="center"><strong>Debit</strong></td>
    <td width="120" align="center"><strong>Credit</strong></td>  
</tr>

<?php

	################display 2nd div###################
	if($option == "I")
	{
		$query1 = "SELECT * FROM scat2_acct_tab ORDER BY SCAT2_ACCT_CODE ASC";
	}
	else
	{
		$query1 = "SELECT * FROM scat2_acct_tab WHERE (TOTAL_DEBIT != '0' OR TOTAL_CREDIT != '0') AND LAST_BALANCE_DATE != '0000-00-00' ORDER BY MAIN_ACCT_CODE ASC";
	}
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	$j = 0;
	while($i < $num1)
	{
		$main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$ctrl_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
		$scat1_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
		$scat2_code = mysql_result($result1,$i, "SCAT2_ACCT_CODE" );
		$title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
		$debit = mysql_result($result1,$i, "TOTAL_DEBIT" );
		$credit = mysql_result($result1,$i, "TOTAL_CREDIT" );
		$code = $main_code.$ctrl_code.$scat1_code.$scat2_code;
		$j = $i + 1;
		if($i%2 == 0)
		{
		  	echo '<tr style="background-color:#a7dbf0;">
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="130" align="left"><strong>'.$code.'</strong></td>
					<td width="500" align="left"><strong>'.$title.'</strong></td>
					<td width="120" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="120" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
				</tr>';
		}
		else
		{
			echo '<tr>
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="130" align="left"><strong>'.$code.'</strong></td>
					<td width="500" align="left"><strong>'.$title.'</strong></td>
					<td width="120" align="right"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="120" align="right"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
				</tr>';
		}
		$i++;
	}

?>
</table>
</div>
<?php
	}
	/*echo '<input type="hidden" name="level" value="'.$type.'" />
		  <input type="hidden" name="todate" value="'.$to_date.'" />
		  <input type="hidden" name="sort" value="'.$to_date.'" />';*/
?>
