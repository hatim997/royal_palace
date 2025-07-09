<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];
	/*
	$query1 = "SELECT * FROM scat2_acct_tab WHERE SCAT2_ACCT_CODE = '$value' ORDER BY SCAT2_ACCT_TITLE ASC";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$main_acct_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
		$ctrl_acct_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
		$scat1_acct_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
		$i++;
	}  // while loop ends here
	$code = $main_acct_code.$ctrl_acct_code.$scat1_acct_code.$value;
	*/
	$query1 = "SELECT * FROM cheque_book_master WHERE BANK_ID = '$value'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	if($num1 == 0)
	{
		echo '<input type="text" name="cheque_no" id="cheque_no" value="Cheque No here" readonly="readonly"/>';
	}
	else
	{
		$i=0;
		while($i < $num1)
		{
			$cheque_no = mysql_result($result1,$i, "LAST_CHEQUE_NO" );
			$i++;
		}  // while loop ends here
		echo '<input type="text" name="cheque_no" id="cheque_no" value="'.$cheque_no.'" readonly="readonly"/>';
	}
?>