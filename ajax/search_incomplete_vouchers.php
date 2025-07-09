<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$value = $_POST['value'];
	//echo "ID is ".$transactionid;
	
	$query1 = "SELECT * FROM voucher_master WHERE RECORD_FLAG != 'P' AND VOUCHER_ID LIKE '$value%'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	if($num1 == 0)
	{
		echo '<h2>No pending voucher.</h2>';
	}
	else
	{
		echo '<table width="700" cellpadding="0" cellspacing="0" border="0" align="left" class="altrowstable" id="alternatecolor">';
		echo '<tr style="background:#2083AC; font-size:16px; font-style:italic; color:#FFF; height:25px;">
				<td width="140" align="center"><strong>Voucher ID</strong></td>
				<td width="200" align="center"><strong>Total Debit</strong></td>
				<td width="200" align="center"><strong>Total Credit</strong></td>
				<td width="80" align="center"><strong>Edit</strong></td>
				<td width="80" align="center"><strong>Delete</strong></td>
			  </tr>';
		$i = 0;
		while($i < $num1)
		{
			$voucher_id = mysql_result($result1,$i, "VOUCHER_ID" );
			$debit  	= mysql_result($result1,$i, "TOTAL_DEBIT" );
			$credit     = mysql_result($result1,$i, "TOTAL_CREDIT" );
			$created_on = mysql_result($result1,$i, "CREATED_ON" );
			$voucher_date = substr($created_on, '0', '11');
			echo '<tr>
					<td width="140" align="center" ><strong>'.$voucher_id.'</strong></td> 
					<td width="200" align="center"><strong>'.$debit.'</strong></td>
					<td width="200" align="center"><strong>'.($credit * -1).'</strong></td>
					<td width="70" align="center"><a href="javascript:edit_voucher('.$i.')" alt="Edit" title="Edit">
					<img src="images/edit.png" height="25" width="25" alt="Edit" /></a></td>
					<td width="70" align="center"><a href="javascript:delete_voucher('.$i.')" alt="Delete" title="Delete">
					<img src="images/delete.png" height="25" width="25" alt="Delete" /></a></td>
					<input type="hidden" id="voucher'.$i.'" value="'.$voucher_id.'" />
					<input type="hidden" id="voucher_date'.$i.'" value="'.$voucher_date.'" />
				</tr>';
			$i++;
		}
		echo '</table>';
	}
?>