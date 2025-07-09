<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
table.altrowstable tr:nth-child(odd){    background-color: #a7dbf0; }
</style>
</head>

<!-- Javascript goes in the document HEAD -->



<!-- CSS goes in the document HEAD or added to your external stylesheet -->



<body>

<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	$created_id = $_SESSION['username'];
	$amounttype = $_POST['amounttype'];
	$trn_amount = $_POST['trn_amount'];
	//$bank = $_POST['bank'];
	$cheque_no = $_POST['cheque_no'];
	$trn_date = $_POST['trn_date'];
	$comments = $_POST['comments'];
	$voucherid = $_POST['voucherid'];
	$vouchertype = $_POST['vouchertype'];
	$accountcode = $_POST['accountcode'];
	$voucher_date = $_POST['voucher_date'];
	$title = $_POST['title'];
	$voucher = $voucherid;
	$abc = $accountcode;
	$voucher1 = explode('-', $voucher);
	$voucher_no = $voucher1[1];
	
	$main_code = substr($abc, '0', '2');
	$ctrl_code = substr($abc, '2', '2');
	$scat1_code = substr($abc, '4', '3');
	$scat2_code = substr($abc, '7', '4');
	//echo $main_code."<br>".$ctrl_code."<br>".$scat1_code."<br>".$scat2_code;
	
	//echo "Voucher ID is ".$voucherid."<br><br>";
	
	$query = "SELECT * FROM voucher_master where VOUCHER_ID = '$voucherid' AND CREATED_ON LIKE '$voucher_date%'";
	$result = mysql_query($query);
	if (mysql_num_rows($result) > 0) 
	{
	  if($amounttype == "DB")
	  {
		  $query =  "UPDATE voucher_master SET TOTAL_DEBIT = TOTAL_DEBIT + '$trn_amount' 
		  WHERE VOUCHER_ID = '$voucherid' AND CREATED_ON LIKE '$voucher_date%'";
		  mysql_query($query) or die("Failed 1: ".mysql_error());
		  //echo 'Updated successfully';
	  }
	  else if($amounttype == "CR")
	  {
		  $trn_amount = $trn_amount * -1;
		  $query =  "UPDATE voucher_master SET TOTAL_CREDIT = TOTAL_CREDIT + '$trn_amount' 
		  WHERE VOUCHER_ID = '$voucherid' AND CREATED_ON LIKE '$voucher_date%'";
		  mysql_query($query) or die("Failed 2: ".mysql_error());
		  //echo 'Updated successfully';
	  }
	}
	else
	{
	  if($amounttype == "DB")
	  {
		  $query =  "INSERT INTO voucher_master (VOUCHER_ID, TOTAL_DEBIT, RECORD_FLAG, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		  			 VALUES('$voucherid', '$trn_amount', 'X', '$created_id', '$date_time', '$created_id', '$date_time')";
		  mysql_query($query) or die("Failed 3: ".mysql_error());
	  }
	  else if($amounttype == "CR")
	  {
		  $trn_amount = $trn_amount * -1;
		  $query =  "INSERT INTO voucher_master (VOUCHER_ID, TOTAL_CREDIT, RECORD_FLAG, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		  			VALUES('$voucherid', '$trn_amount', 'X', '$created_id', '$date_time', '$created_id', '$date_time')";
		  mysql_query($query) or die("Failed 4: ".mysql_error());
	  }
	  $query =  "UPDATE voucher_type SET LAST_VOUCHER_NO = '$voucher_no' WHERE VOUCHER_TYPE = '$vouchertype'";
	  mysql_query($query) or die("Failed 5: ".mysql_error());
	  
	  /*
	  if($bank != "none" && $bank != "N")
	  {
		  $query =  "UPDATE cheque_book_master SET LAST_CHEQUE_NO = LAST_CHEQUE_NO + 1 WHERE BANK_ID = '$bank'";
		  mysql_query($query) or die("Failed 5: ".mysql_error());
	  }
	  else
	  {
		  "Nothing";
	  }
	  */
	}
	
	########## VOUCHER TYPE SELECTION CODE ###########
	
	$query1 = "SELECT * FROM scat2_acct_tab WHERE SCAT2_ACCT_CODE = '$scat2_code' AND SCAT1_ACCT_CODE = '$scat1_code' 
	AND CTRL_ACCT_CODE = '$ctrl_code' AND MAIN_ACCT_CODE = '$main_code'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$account_title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
		$i++;
	}
	########## MAXIMUM TRANSACTION ID SELECTION CODE ###########
	$query1 = "SELECT * FROM voucher_transaction";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$trans_id = mysql_result($result1,$i, "TRANSACTION_ID" );
		$i++;
	}
	$trans_id++;
	
	if($cheque_no == "Cheque No here")
	{
		$query =  "INSERT INTO voucher_transaction 
		(VOUCHER_ID, TRANSACTION_ID, VOUCHER_TYPE, VOUCHER_DATE, ACCOUNT_CODE, ACCOUNT_TITLE, TRN_DATE, TRN_AMOUNT, AMOUNT_TYPE,
			TRN_NARRATION, RECORD_FLAG, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		VALUES('$voucherid', '$trans_id', '$vouchertype' , '$voucher_date', '$accountcode', '$account_title', '$trn_date', '$trn_amount',
		'$amounttype', '$comments', 'X', '$created_id', '$date_time', '$edited_id', '$date_time')";
		mysql_query($query) or die("Failed: ".mysql_error());
	}
	else
	{
		$query =  "INSERT INTO voucher_transaction 
		(VOUCHER_ID, TRANSACTION_ID, VOUCHER_TYPE, VOUCHER_DATE, ACCOUNT_CODE, ACCOUNT_TITLE, TRN_DATE, TRN_AMOUNT, AMOUNT_TYPE,
			TRN_NARRATION, BANK_ID, CHEQUE_NO, RECORD_FLAG, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		VALUES('$voucherid', '$trans_id', '$vouchertype' , '$voucher_date', '$accountcode', '$account_title', '$trn_date', '$trn_amount',
		'$amounttype', '$comments', '$account_code', '$cheque_no', 'X', '$created_id', '$date_time', '$edited_id', '$date_time')";
		mysql_query($query) or die("Failed: ".mysql_error());
		
		$query =  "UPDATE cheque_book_master SET LAST_CHEQUE_NO = LAST_CHEQUE_NO + 1 WHERE BANK_ID = '$accountcode'";
		mysql_query($query) or die("Failed 5: ".mysql_error());
	}
	
	########## VOUCHER TYPE SELECTION CODE ###########
	
	$query1 = "SELECT * FROM voucher_type WHERE VOUCHER_TYPE = '$vouchertype'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$vtype = mysql_result($result1,$i, "VOUCHER_TITLE" );
		$i++;
	}
	
	########## TOTAL DEBIT / TOTAL CREDIT CODE ###########
	
	$query1 = "SELECT * FROM voucher_master WHERE VOUCHER_ID = '$voucherid'  AND CREATED_ON LIKE '$voucher_date%'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$totaldebit = mysql_result($result1,$i, "TOTAL_DEBIT" );
		$totalcredit= mysql_result($result1,$i, "TOTAL_CREDIT" );
		$i++;
	}
	
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
 <input type="hidden" id="vouchertype" name="idd" value="<?php echo $vouchertype; ?>" />
 <input type="hidden" id="last_date" name="last_date" value="<?php echo $last_date; ?>" />

<div style="border: 1px solid black; height:65px; width:1000px;" align="center" id="introduction">
       <table align="left" width="998">
<tr>
    <td width="102" height="25" align="left">&nbsp;&nbsp;Voucher Type:</td>
    <td width="185" align="left"><input type="text" id="voucher" name="idd" value="<?php echo $vtype; ?>" /></td>
    <td width="441" height="25" align="center">&nbsp;</td>
    <td width="83" height="25" align="left">Total Debit:</td>
    <td width="163" align="left"><?php 
		
		$diff = 0;
		$diff = $totaldebit + $totalcredit;
		if($diff < 0)
		{
			echo number_format($totaldebit, 2, '.', ',')."&nbsp;&nbsp;&nbsp;<b>Difference&nbsp;&nbsp;".number_format(($diff * -1), 2, '.', ',')."</b>";
		}
		else
		{
			echo number_format($totaldebit, 2, '.', ',');
		}
	?></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;Voucher ID:</td>
    <td width="185" align="left"><input type="text" name="id" id="voucherid" value="<?php echo $voucherid; ?>" readonly="readonly"  ></td>
    
    <td width="441" height="25" align="center">
    <?php
		if ( $totaldebit != ($totalcredit * -1))
		{
			echo '<img src="images/save.png" height="25" width="60" alt="Voucher Cannot be Saved" />
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="voucher_print.php?vid='.$voucherid.'&vdate='.$voucher_date.'" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>' ;
		}
		
		else
		{
			echo '<a href="javascript:save_voucher()" alt="Save" title="Save">
				  <img src="images/save.png" height="25" width="60" alt="Save" /></a>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <a href="voucher_print.php?vid='.$voucherid.'&vdate='.$voucher_date.'" alt="Print" title="Print">
				  <img src="images/print.png" height="25" width="60" alt="Print" /></a>';
			/*
			echo '<input type="button" value="SAVE" onclick="save_form();" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="PRINT" />';
			*/
		}
	?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="voucher_transaction.php" alt="UnSave Voucher" title="UnSave Voucher">
				  <img src="images/unsave.png" alt="UnSave Voucher" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:cancel_voucher()" alt="Cancel Voucher" title="Cancel Voucher">
				  <img src="images/cancel.png" height="25" width="70" alt="Cancel Voucher" /></a></td>
    <td width="83" height="5" align="left">Total Credit:</td>
    <td width="163" align="left"><?php 
		
		$diff = 0;
		$diff = $totaldebit + $totalcredit;
		if($diff > 0)
		{
			echo number_format(($totalcredit * -1), 2, '.', ',')."&nbsp;&nbsp;&nbsp;<b>Difference&nbsp;&nbsp;".number_format(($diff * -1), 2, '.', ',')."</b>";
		}
		else
		{
			echo ($totalcredit * -1);
		}
	?></td>
</tr>

<input type="hidden" name="voucher_no" id="voucher_no" value="<?php echo $voucher_no; ?>" >

</table></div>
<br />
<div style="border: 1px solid black; overflow:auto; height:280px; width:1000px;" align="center" id="center">
<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="54" align="center"><strong>SR</strong></td>
    <td width="126" align="center"><strong>Account Code</strong></td>
    <td width="299" align="center"><strong>Account Title</strong></td>
    <td width="100" align="center"><strong>Date</strong></td>
    <td width="100" align="center"><strong>Debit</strong></td>
    <td width="145" align="center"><strong>Credit</strong></td>
    <td width="70" align="center"><strong>Edit</strong></td>
	<td width="70" align="center"><strong>Delete</strong></td>
</tr>
<?php

	################display 2nd div###################
      
    $query1 = "SELECT * FROM voucher_transaction WHERE VOUCHER_ID = '$voucherid' AND VOUCHER_DATE = '$voucher_date'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	$j = 0;
	while($i < $num1)
	{
		$transaction_id = mysql_result($result1,$i, "TRANSACTION_ID" );
		$voucher_type  	= mysql_result($result1,$i, "VOUCHER_TYPE" );
		$trn_date      	= mysql_result($result1,$i, "TRN_DATE" );
		$account_code  	= mysql_result($result1,$i, "ACCOUNT_CODE" );
		$title  		= mysql_result($result1,$i, "ACCOUNT_TITLE" );
		$type   		= mysql_result($result1,$i, "AMOUNT_TYPE" );
		$trn_amount    	= mysql_result($result1,$i, "TRN_AMOUNT" );
		$trn_detail    	= mysql_result($result1,$i, "TRN_NARRATION" );
		$j = $i + 1;
		$debit = 0;
		$credit = 0;
		if($type == "DB")
		{
			$amount_type = "Debit";
			$debit = $trn_amount;
		}
		else
		{
			$amount_type = "Credit";
			$credit = ($trn_amount * -1);
		}
		if($i%2 == 0)
		{
		  	echo '<tr style="background-color:#a7dbf0;">
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="126" align="center"><strong>'.$account_code.'</strong></td>
					<td width="299" align="center"><strong>'.$title.'</strong></td>
					<td width="100" align="center"><strong>'.$trn_date.'</strong></td>
					<td width="100" align="center"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="145" align="center"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
					<td width="70" align="center"><a href="javascript:showPopup('.$transaction_id.')" alt="Edit" title="Edit">
					<img src="images/edit.png" height="25" width="25" alt="Edit" /></a></td>
					<td width="70" align="center"><a href="javascript:delete_transaction('.$transaction_id.')" alt="Delete" title="Delete">
					<img src="images/delete.png" height="25" width="25" alt="Delete" /></a></td>
				</tr>';
		}
		else
		{
			echo '<tr>
					<td width="54" align="center" ><strong>'.$j.'</strong></td> 
					<td width="126" align="center"><strong>'.$account_code.'</strong></td>
					<td width="299" align="center"><strong>'.$title.'</strong></td>
					<td width="100" align="center"><strong>'.$trn_date.'</strong></td>
					<td width="100" align="center"><strong>'.number_format($debit, 2, '.', ',').'</strong></td>
					<td width="145" align="center"><strong>'.number_format($credit, 2, '.', ',').'</strong></td>
					<td width="70" align="center"><a href="javascript:showPopup('.$transaction_id.')" alt="Edit" title="Edit">
					<img src="images/edit.png" height="25" width="25" alt="Edit" /></a></td>
					<td width="70" align="center"><a href="javascript:delete_transaction('.$transaction_id.')" alt="Delete" title="Delete">
					<img src="images/delete.png" height="25" width="25" alt="Delete" /></a></td>
				</tr>';
		}
			  
			  echo "<div id='overlay' class='overlay'></div>";
echo '<div id=popup'.$transaction_id.' class=popup>';
  echo '</div>';
		$i++;
	}

?>

</table> </div>
<br />
<div style="border: 1px solid black; height:130px; width:1000px; " align="center ">
  <table width="986" align="left">
<tr>
      <td width="164" >&nbsp;&nbsp;Account Code</td>
      <td width="161">Title</td>
      <td width="184"> Transaction Date:</td>
      <td width="156">Amount:</td>
      <td width="145">Amount Type</td>
      <td width="148">Narration:</td>
  </tr>
  <tr>
  <td id="show_account_code" valign="top" style="padding-top:10px;">&nbsp;&nbsp;<input type="text" name="accountcode" id="accountcode" readonly="readonly"/></td>
  <td valign="top" style="padding-top:10px;"><select style="width:145px;" id="title" name="title" onchange="voucher_title(this.value);">
  <option value="">Select Title</option>
<?php

$query1 = "SELECT * FROM scat2_acct_tab ORDER BY SCAT2_ACCT_TITLE ASC";
$result1 = mysql_query($query1)or die("Failed :".mysql_error());
$num1 = mysql_numrows($result1);
$i=0;
while($i < $num1)
{
	$main_acct_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
	$ctrl_acct_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
	$scat1_acct_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
	$scat2_acct_code = mysql_result($result1,$i, "SCAT2_ACCT_CODE" );
	$scat2_acct_title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
	$code = $main_acct_code.$ctrl_acct_code.$scat1_acct_code.$scat2_acct_code;
	echo '<option value="'.$code.'">'.$scat2_acct_title.'</option>';
	$i++;
}  // while loop ends here

?>
</select></td>
<td valign="top" style="padding-top:10px;">
  <input type="text" id="trn_date" value="<?php echo $trn_date; ?>" />

  </td>
  <td valign="top" style="padding-top:10px;"><input type="text" name="trn_amount" id="trn_amount" /></td>
  <td valign="top" style="padding-top:10px;">
  <select style="width: 140px;" name="amounttype" id="amounttype">
      <option value=""> Select Amount </option>
      <option value="DB">Debit</option>
      <option value="CR">Credit</option>
      </select>
  </td>
  <td><textarea name="comments" rows="4" style="width: 140px;" id="comments"><?php echo $trn_detail; ?></textarea>  
  </tr>
  
<tr>
	<td height="36" align="right">&nbsp;</td>
	<td id="show_bank" style="padding-bottom:20px;" align="right">Cheque No:&nbsp;&nbsp;</td>
    <td id="show_cheque_no" style="padding-bottom:20px;"><input type="text" id="cheque_no" name="cheque_no" readonly="readonly" value="Cheque No here" /></td>
    <td align="right" style="padding-bottom:20px;"><a href="javascript:save_form()" alt="Add Transaction" title="Add Transaction">
				  <img src="images/add.png" alt="Add Transaction" /></a></td>
    <td>&nbsp;</td>
	<td align="left" >&nbsp;</td>
    <input type="hidden" id="voucher_date" value="<?php echo $voucher_date; ?>" />
</tr>
</table></div>

	</div><!-- end of parent div -->


</body>
</html>