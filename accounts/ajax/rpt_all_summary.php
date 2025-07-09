<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	$created_id = $_SESSION['username'];
	//$restid = $_SESSION['restid'];
	
	$total_cash = 0;
	$total_cheque = 0;
	$gtotal_sale = 0;
	$grand_dir_expense = 0;
	$grand_other_expense = 0;
	//$rest = $_POST['rest'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	//echo "Rest ID is ".$restid;
	//$start = $from."00:00:00";
	//$end = $to."23:59:59";	
	$query = "SELECT REST_NAME FROM restaurant_master_tab WHERE REST_ID = '$restid'";
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
	
	echo '<div id="report" align="center" style="overflow:auto; height:450px; width:720px">
	<table width="690" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="70" align="left">&nbsp;</td>
		<td width="90" align="left">&nbsp;</td>
		<td width="400" align="center"><h2 class="style1" style=" font-size:18px;">Monthly Summary Report</h2></td>
		<td width="70" align="left">&nbsp;</td>
		<td width="90" align="left">&nbsp;</td>
	</tr>
	<tr>
		<td width="70" align="left">&nbsp;</td>
		<td width="90" align="left">&nbsp;</td>
		<td width="400" align="center">&nbsp;</td>
		<td width="70" align="left">&nbsp;</td>
		<td width="90" align="left">&nbsp;</td>
	</tr>
	<tr>
		<td width="70" align="left"><strong>From:</strong></td>
		<td width="90" align="left">'.$from.'</td>
		<td width="400" align="left">&nbsp;</td>
		<td width="100" align="left"><strong>Restaurant:</strong></td>
		<td width="240" align="left">'.$rname.'</td>
	</tr>
	<tr>
		<td width="120" align="left"><strong>To:</strong></td>
		<td width="90" align="left">'.$to.'</td>
		<td width="400" align="left">&nbsp;</td>
		<td width="100" align="left"><strong>Print Date:</strong></td>
		<td width="240" align="left">'.$today.'</td>
	</tr>
	<tr>
		<td width="120" align="left"><strong>Report ID:</strong></td>
		<td width="90" align="left">rpt_all_summary.php</td>
		<td width="400" align="left">&nbsp;</td>
		<td width="100" align="left">&nbsp;</td>
		<td width="240" align="left">&nbsp;</td>
	</tr>
	</table><br>';
	
$query = "SELECT * FROM restaurant_master_tab WHERE REST_ID = '$restid'";
$result = mysql_query($query);
$num1 = mysql_num_rows($result);
//mysql_close();
//$num1--;
$a = 0;
while($a < $num1)
{
	$rid = mysql_result($result,$a, "REST_ID" );
	$rname = mysql_result($result,$a, "REST_NAME" );
	
	$st_date = explode("-", $from);
	echo '<table width="690" border="1" class="altrowstable" id="alternatecolor" align="center" style="border-width:1px;" style="border-collapse:0.5px;">
			  <thead>
			  <tr>
				  <td width="30" align="center"><strong>S. No</strong></td>
				  <td width="80" align="center"><strong>Date</strong></td>
				  <td width="70" align="center"><strong>Cash Sale</strong></td>
				  <td width="70" align="center"><strong>Cr. Card Sale</strong></td>
				  <td width="70" align="center"><strong>Credit Sale</strong></td>
				  <td width="70" align="center"><strong>Total Sale</strong></td>
				  <td width="70" align="center"><strong>Expense</strong></td>
				  <td width="70" align="center"><strong>Dir. Expense</strong></td>
				  <td width="70" align="center"><strong>Total Expense</strong></td>
			  </tr>
			  </thead>';
	$d = 0;
	while($from < $to)
	{
		//$check_date = 
		$cash_sale = 0;
		$card_sale = 0;
		$credit_sale = 0;
		$total_cash_sale = 0;
		$total_card_sale = 0;
		$total_credit_sale = 0;
		
		$total_transaction = 0;
		$total_expense = 0;
		$director_expense = 0;
		
		$total_serv = 0;
		$from = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$show_date = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$day = date("l", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$start = $from."&nbsp;00:00:00";
		$end = $from."&nbsp;23:59:59";
		
		$after_discount = 0;
		$total_sale = 0;
		$query = "SELECT * FROM sale_transaction_tab WHERE SALE_DATE = '$from' ORDER BY SALE_ID ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$i=0;
		while($i < $num)
		{	
			$amount = mysql_result($result1,$i, "SALE_AMOUNT" );
			//$discount = mysql_result($result1,$i, "TOTAL_DISCOUNT" );
			$discount = 0;
			$sale_id = mysql_result($result1,$i, "SALE_TYPE_ID" );
			if($sale_id == 1)
			{
				$cash_sale = $cash_sale + $amount;
				$total_cash_sale = $total_cash_sale + $cash_sale;
			}
			else if($sale_id == 2)
			{
				$card_sale = $card_sale + $amount;
				$total_card_sale = $total_card_sale + $card_sale;
			}
			else
			{
				$credit_sale = $credit_sale + $amount;
				$total_credit_sale = $total_credit_sale + $credit_sale;
			}
			
			$after_discount = $amount - $discount;
			$total_sale = $total_sale + $after_discount;
			$gtotal_sale = $gtotal_sale + $amount;
			$i++;
		} // sales while ends here
		$other_expense = 0;
		$total_expense = 0;
		$dir_expense = 0;
		$query = "SELECT * FROM expense_transaction_tab WHERE EXPENSE_DATE = '$from' ORDER BY TRANSACTION_ID ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$j = $d +1;
		$i=0;
		while($i < $num)
		{
			$expense = mysql_result($result1,$i, "AMOUNT" );
			$dir_id = mysql_result($result1,$i, "DIRECTOR_ID" );
			if($dir_id != 0)
			{
				$dir_expense = $dir_expense + $expense;
				$grand_dir_expense = $grand_dir_expense + $expense;
			}
			else
			{
				$other_expense = $other_expense + $expense;
				$grand_other_expense = $grand_other_expense + $expense;
			}
			$total_expense = $total_expense + $expense;
			$i++;
		} // expense while ends here
		echo '<tr>
			  <td width="30" align="left">&nbsp;'.$j.'</td>
			  <td width="80" align="left">&nbsp;'.$from.'</td>
			  <td width="70" align="left">&nbsp;'.$cash_sale.'</td>
			  <td width="70" align="left">&nbsp;'.$card_sale.'</td>
			  <td width="70" align="left">&nbsp;'.$credit_sale.'</td>
			  <td width="70" align="left">&nbsp;'.$total_sale.'</td>
			  <td width="70" align="left">&nbsp;'.$other_expense.'</td>
			  <td width="70" align="left">&nbsp;'.$dir_expense.'</td>
			  <td width="70" align="left">&nbsp;'.$total_expense.'</td>
			</tr>';
			$gtotal_expense = $gtotal_expense + $total_expense;
			$d++;
	}
	
	echo '</table>
		<table width="690" border="1" class="altrowstable" id="alternatecolor" cellspacing="0" align="center" rules="none" FRAME=BOX>
		<tr>
			<td width="30" align="left">&nbsp;</td>
			<td width="80" align="left">&nbsp;</td>
			<td width="70" align="left">&nbsp;</td>
			<td width="70" align="left">&nbsp;</td>
			<td width="70" align="center">&nbsp;Sub Total = </td>
			<td width="70" align="left">&nbsp;'.$gtotal_sale.'</td>
			<td width="70" align="left">&nbsp;'.$grand_other_expense.'</td>
			<td width="70" align="left">&nbsp;'.$grand_dir_expense.'</td>
			<td width="70" align="left">&nbsp;'.$gtotal_expense.'</td>
		</tr></table><br><br>';
	$a++;
}
		
	echo '<h2 class="style1" style=" font-size:18px;">Directors Expense</h2><br><br>';
	
$query = "SELECT * FROM directors_tab WHERE DIRECTOR_ID != '0' ORDER BY DIRECTOR_NAME ASC";
$result = mysql_query($query);
$num1 = mysql_num_rows($result);
//mysql_close();
//$num1--;
$j =0;
$a = 0;
while($a < $num1)
{
	$id = mysql_result($result,$a, "DIRECTOR_ID" );
	$name = mysql_result($result,$a, "DIRECTOR_NAME" );
	
	$from = $_POST['from'];
	$to = $_POST['to'];
	$gtotal_expense = 0;
	//echo $id;
	
	echo '<table width="690" border="0" cellpadding="0" align="center">
			<tr>
			  <td width="50" align="left"><h2 class="style1" style=" font-size:16px;">'.$name.':</h2></td>
			</tr>
			</table><br>
			<table width="400" border="1" class="altrowstable" id="alternatecolor" align="center" style="border-width:1px;" style="border-collapse:0.5px;">
			  <thead>
			  <tr>
				  <td width="90" align="center"><strong>S. No</strong></td>
				  <td width="150" align="center"><strong>Date</strong></td>
				  <td width="150" align="center"><strong>Expense Amount</strong></td>
			  </tr>
			  </thead>';
			  
	$d = 0;
	while($from < $to)
	{
		//$check_date = 
		
		$from = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$show_date = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$day = date("l", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
		$start = $from."&nbsp;00:00:00";
		$end = $from."&nbsp;23:59:59";
		
		$total_expense = 0;
		$query = "SELECT * FROM expense_transaction_tab WHERE EXPENSE_DATE = '$from' AND DIRECTOR_ID ='$id' ORDER BY TRANSACTION_ID ASC";
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		$j = $d +1;
		$i=0;
		while($i < $num)
		{
			$expense = mysql_result($result1,$i, "AMOUNT" );
			$total_expense = $total_expense + $expense;
			$gtotal_expense = $gtotal_expense + $expense;
			$i++;
		} // expense while ends here
		echo '<tr>
			  <td width="30" align="left">&nbsp;'.$j.'</td>
			  <td width="80" align="left">&nbsp;'.$from.'</td>
			  <td width="70" align="left">&nbsp;'.$total_expense.'</td>
			</tr>';
		$d++;
	}
		echo '</table>
		<table width="400" border="1" cellpadding="0" cellspacing="0" align="center" rules="none" frame="border">
		<tr>
			  <td width="50" align="left">&nbsp;</td>
			  <td width="70" align="center">Total =&nbsp;</td>
			  <td width="90" align="center">'.$gtotal_expense.'</td>
			</tr>
			</table>';
	$a++;
}
		echo '</div><a href="javascript:printSelection()"><strong>Print Report</strong></a>';
		/*
		<table width="690" border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			  <td width="50" align="left">&nbsp;</td>
			  <td width="90" align="left">&nbsp;</td>
			  <td width="90" align="left">&nbsp;</td>
			  <td width="70" align="left">&nbsp;</td>
			  <td width="70" align="center">Total =&nbsp;'.$gtotal_expense.'</td>
			</tr>
			</table><br><br>';
		*/
		
?>