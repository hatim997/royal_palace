<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	$value = $_POST['value'];
	$sale_date = $_POST['sale_date'];
	
	echo '<table width="350" align="center" border="0" cellspacing="0" cellpadding="0">';
	
    $query = "SELECT * FROM sale_type_tab ORDER BY SALE_TYPE_NAME ASC";
	$result = mysql_query($query)or die("Failed :".mysql_error());
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$sale_type_name = mysql_result($result,$i, "SALE_TYPE_NAME");
		$sale_type_id = mysql_result($result,$i, "SALE_TYPE_ID");
		
		$query1 = "SELECT * FROM sale_transaction_tab WHERE SALE_TYPE_ID = '$sale_type_id' AND SALE_DATE = '$sale_date' ORDER BY SALE_TYPE_ID ASC";
		$result1 = mysql_query($query1)or die("Failed :".mysql_error());
		$num1 = mysql_numrows($result1);
		if($num1 == 0)
		{
			$sale_amount = 0;	
		}
		else
		{
			$ii=0;
			while($ii < $num1)
			{
				$sale_amount = mysql_result($result1,$ii, "SALE_AMOUNT");
				$ii++;
			}  // // inner while ends here
		} // else ends here
		$i++;
		echo '
			  <tr>
				<td width="133" align="left">'.$sale_type_name.':</td>
				<td width="200" align="left"><input type="text" id="xyz" readonly value="'.$sale_amount.'" /></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>';
	} // outer while ends here
        
  echo '</table>';
?>