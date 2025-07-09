<?php include('../config.php'); ?>
<?php
	
	$value = $_POST['value'];
	$query1 = "SELECT * FROM voucher_type WHERE VOUCHER_TYPE = '$value'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$voucher_no = mysql_result($result1,$i, "LAST_VOUCHER_NO" );
		$i++;
	}
	$voucher_no++;
	echo $value."-".$voucher_no;
?>