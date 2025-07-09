<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$orderno = $_POST['orderno'];


?>
<?php
	
	$type = $_POST['value'];
	
	//echo $value."<br>";
	if($type == "M")
	{
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
    <td width="142" height="5" align="left"><b>Last Trial Balance Date:</b></td>
    <td width="131" align="left" id="last_trial_date"><?php echo date("d/m/Y", strtotime($last_trial_date)); ?></td>
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
			echo '<a alt="View" title="View" id="view-record">
				  <img src="images/view.png" height="25" width="60" alt="View"  /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="javascript:printSelection(balance_info)" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
		}
	?></td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
<div id="show" style="height:200px; overflow:auto; width:990px; display:none;">
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
      
    $query1 = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_CODE ASC";
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
					<td width="60" align="center"><strong><a href="view_ledger.php?type=M&code='.$code.'&todate='.$last_trial_date.'&option=TRN_DATE&y=n" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
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
					<td width="60" align="center"><strong><a href="view_ledger.php?type=M&code='.$code.'&todate='.$last_trial_date.'&option=TRN_DATE&y=n" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
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
    <td width="142" height="5" align="left"><b>Last Trial Balance Date:</b></td>
    <td width="131" align="left" id="last_trial_date"><?php echo date("d/m/Y", strtotime($last_trial_date)); ?></td>
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
			echo '<a alt="View" title="View" id="view-record">
				  <img src="images/view.png" height="25" width="60" alt="View"  /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="javascript:printSelection(balance_info)" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
		}
	?></td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
<div id="show" style="height:200px; overflow:auto; width:990px; display:none;">
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
      
    $query1 = "SELECT * FROM ctrl_acct_tab ORDER BY CTRL_ACCT_CODE ASC";
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
					<td width="60" align="center"><strong><a href="view_ledger.php?type=C&code='.$code.'&todate='.$last_trial_date.'&option=TRN_DATE&y=n" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
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
					<td width="60" align="center"><strong><a href="view_ledger.php?type=C&code='.$code.'&todate='.$last_trial_date.'&option=TRN_DATE&y=n" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
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
    <td width="142" height="5" align="left"><b>Last Trial Balance Date:</b></td>
    <td width="131" align="left" id="last_trial_date"><?php echo date("d/m/Y", strtotime($last_trial_date)); ?></td>
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
			echo '<a alt="View" title="View" id="view-record">
				  <img src="images/view.png" height="25" width="60" alt="View"  /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="javascript:printSelection(balance_info)" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
		}
	?></td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
<div id="show" style="height:200px; overflow:auto; width:990px; display:none;">
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
      
    $query1 = "SELECT * FROM scat1_acct_tab ORDER BY SCAT1_ACCT_CODE ASC";
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
					<td width="60" align="center"><strong><a href="view_ledger.php?type=C1&code='.$code.'&todate='.$last_trial_date.'&option=TRN_DATE&y=n" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
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
					<td width="60" align="center"><strong><a href="view_ledger.php?type=C1&code='.$code.'&todate='.$last_trial_date.'&option=TRN_DATE&y=n" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
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
    <td width="142" height="5" align="left"><b>Last Trial Balance Date:</b></td>
    <td width="131" align="left" id="last_trial_date"><?php echo date("d/m/Y", strtotime($last_trial_date)); ?></td>
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
			echo '<a alt="View" title="View" id="view-record">
				  <img src="images/view.png" height="25" width="60" alt="View"  /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="javascript:printSelection(balance_info)" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
		}
	?></td>
    <td width="142" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
<div id="show" style="height:200px; overflow:auto; width:990px; display:none;">
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
      
    $query1 = "SELECT * FROM scat2_acct_tab ORDER BY SCAT2_ACCT_CODE ASC";
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
					<td width="60" align="center"><strong><a href="view_ledger.php?type=C1&code='.$code.'&todate='.$last_trial_date.'&option=TRN_DATE&y=n" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
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
					<td width="60" align="center"><strong><a href="view_ledger.php?type=C1&code='.$code.'&todate='.$last_trial_date.'&option=TRN_DATE&y=n" title="Go to Ledger"><img src="images/detail.png" alt="Go to Ledger" title="Go to Ledger"></a></strong></td>
				</tr>';
		}
		$i++;
	}

?>
</table>
</div>
<?php
	}
?>
