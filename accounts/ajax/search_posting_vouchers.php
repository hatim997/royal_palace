<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$posting_date = $_POST['trn_date'];
	$last_date = $_POST['last_date'];
	//echo "ID is ".$transactionid;
	
	$last_date = $last_date." 23:59:59";
	$posting_date = $posting_date." 23:59:59";
	//echo $last_date."<br>".$posting_date;
	$query = "SELECT * FROM voucher_master WHERE CREATED_ON > '$last_date' AND CREATED_ON <= '$posting_date'";
	$result = mysql_query($query)or die("Failed :".mysql_error());
	$num = mysql_numrows($result);
	
	$query1 = "SELECT * FROM voucher_master WHERE CREATED_ON > '$last_date' AND CREATED_ON <= '$posting_date' 
				AND TOTAL_DEBIT = -TOTAL_CREDIT AND RECORD_FLAG = 'S'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	
	if($num == $num1)
	{
		if($num == 0)
		{
			echo '<h2>No pending voucher.</h2>';
		}
		else
		{
			$year = substr($posting_date, '0', '4');
			$month = substr($posting_date, '5', '2');
			$dd = substr($posting_date, '8', '2');
			//echo "Not Ready For Posting ";
			$toda = date("F j, Y H:i:s", mktime(date("H")+10, date("i"), date("s"), $month, $dd, $year));
			$da = date("l", mktime(date("H")+10, date("i"), date("s"), $month, $dd, $year));
			echo '<table width="700" cellpadding="0" cellspacing="0" border="0" align="left">';
			echo '<tr>
					<td width="700" align="center"><h2>Ready For Posting upto '.$da.' '.$toda.'.</h2></td>
				</tr>
				<tr>
					<td width="700" align="center"><h2>Do you really want to post all vouchers?</h2></td>
				</tr>
				<tr>
					<td width="700" align="center">&nbsp;</td>
				</tr>
				</table>';
				
			echo '<table width="700" cellpadding="0" cellspacing="0" border="0" align="left">';
			echo '<tr>
					<td width="150" align="center">&nbsp;</td>
					<td width="400" align="center"><a href="javascript:post_vouchers()" alt="Yes" title="Yes">
					<img src="images/yes.png" alt="Yes" /></a>&nbsp;&nbsp;&nbsp;
					<a href="javascript:not_post()" alt="No" title="No">
					<img src="images/no.png" alt="No" /></a></td>
					<td width="150" align="center">&nbsp;</td>
					<input type="hidden" id="last_date1" value="'.$last_date.'" />
					<input type="hidden" id="trn_date1" value="'.$posting_date.'" />
				</tr>
				</table>';
		}
	}
	else
	{
		if($num == 0)
		{
			echo '<h2>No pending voucher.</h2>';
		}
		else
		{
			$query1 = "SELECT * FROM voucher_master WHERE CREATED_ON > '$last_date' AND CREATED_ON <= '$posting_date' 
						AND RECORD_FLAG != 'P' AND RECORD_FLAG != 'D'";
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
		}
	}
?>