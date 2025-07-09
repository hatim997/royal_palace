<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];
	$query1 = "SELECT * FROM cheque_book_master WHERE BANK_ID = '$value'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$cheque_no = mysql_result($result1,$i, "LAST_CHEQUE_NO" );
		$i++;
	}  // while loop ends here
	echo '<input type="text" name="cheque_no" id="cheque_no" value="'.$cheque_no.'" readonly="readonly"/>';
?>