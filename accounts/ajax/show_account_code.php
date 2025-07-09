<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];
	$main_code = substr($value, '0', '2');
	$ctrl_code = substr($value, '2', '2');
	$scat1_code = substr($value, '4', '3');
	$scat2_code = substr($value, '7', '4');
	$query1 = "SELECT * FROM scat2_acct_tab WHERE SCAT2_ACCT_CODE = '$title' AND SCAT1_ACCT_CODE = '$scat1_code' 
	AND CTRL_ACCT_CODE = '$ctrl_code' AND MAIN_ACCT_CODE = '$main_code'";
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
	echo '<input type="text" name="accountcode" id="accountcode" value="'.$code.'" readonly="readonly"/>';
?>