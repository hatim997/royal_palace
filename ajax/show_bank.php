<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];
	$query1 = "SELECT * FROM voucher_type WHERE VOUCHER_TYPE = '$value'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$treat = mysql_result($result1,$i, "TREAT_WITH" );
		$i++;
	} // while ends here
	//$code = $main_acct_code.$ctrl_acct_code.$scat1_acct_code.$value;
	if($treat == "C")
	{
		echo '<select style="width:145px;" id="bak" name="bak" disabled="disabled">
		<option value="">Select Bank</option>';
			$query1 = "SELECT * FROM bank_master_tab ORDER BY BANK_NAME ASC";
			$result1 = mysql_query($query1)or die("Failed :".mysql_error());
			$num1 = mysql_numrows($result1);
			$i=0;
			while($i < $num1)
			{
				$voucher_type = mysql_result($result1,$i, "BANK_ID" );
				$voucher_title = mysql_result($result1,$i, "BANK_NAME" );
				echo '<option value="'.$voucher_type.'">'.$voucher_title.'</option>';
				$i++;
			}  // while loop ends here
		echo '</select>';
		echo '<input type="hidden" name="bank" id="bank" value="none" />';
	}
	else if($treat == "B")
	{
		echo '<select style="width:145px;" id="bank" name="bank" onchange="cheque_no(this.value);">
		<option value="">Select Bank</option>';
			$query1 = "SELECT * FROM bank_master_tab ORDER BY BANK_NAME ASC";
			$result1 = mysql_query($query1)or die("Failed :".mysql_error());
			$num1 = mysql_numrows($result1);
			$i=0;
			while($i < $num1)
			{
				$voucher_type = mysql_result($result1,$i, "BANK_ID" );
				$voucher_title = mysql_result($result1,$i, "BANK_NAME" );
				echo '<option value="'.$voucher_type.'">'.$voucher_title.'</option>';
				$i++;
			}  // while loop ends here
		echo '</select>';
	}
	else
	{
		echo '<select style="width:145px;" id="bank" name="bank" onchange="cheque_no(this.value);">
		<option value="">Select Bank</option>
		<option value="N">None</option>';
			$query1 = "SELECT * FROM bank_master_tab ORDER BY BANK_NAME ASC";
			$result1 = mysql_query($query1)or die("Failed :".mysql_error());
			$num1 = mysql_numrows($result1);
			$i=0;
			while($i < $num1)
			{
				$voucher_type = mysql_result($result1,$i, "BANK_ID" );
				$voucher_title = mysql_result($result1,$i, "BANK_NAME" );
				echo '<option value="'.$voucher_type.'">'.$voucher_title.'</option>';
				$i++;
			}  // while loop ends here
		echo '</select>';
	}
	//echo '<input type="text" name="accountcode" id="accountcode" value="'.$code.'" readonly="readonly"/>';
?>