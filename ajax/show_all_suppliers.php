<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	
	$query = "SELECT * FROM supplier_master ORDER BY SUPPLIER_ID ASC";
										
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	
	echo '<table width="1250" align="center" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
		<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Suppliers</i></b></td></tr>
		</table>';
	echo '<table width="1250" cellpadding="0" cellspacing="0" align="center" BORDER=1 RULES=NONE FRAME=BOX>
			<thead>
			<tr>
				<td width="90" align="center"><b>&nbsp;ID</b></td>
				<td width="150" align="center"><b>&nbsp;Name</b></td>
				<td width="150" align="center"><b>&nbsp;Contact Person</b></td>
				<td width="150" align="center"><b>&nbsp;Cell No</b></td>
				<td width="110" align="center"><b>&nbsp;Ptcl No</b></td>
				<td width="200" align="center"><b>&nbsp;Address</b></td>
				<td width="130" align="center"><b>&nbsp;City</b></td>
				<td width="120" align="center"><b>&nbsp;Status</b></td>
				<td width="120" align="center"><b>&nbsp;Working</b></td>
			</tr>
			</thead>
		</table>
		
		<table width="1250" cellpadding="0" cellspacing="0" align="center" class="altrowstable" id="alternatecolor" BORDER=1 RULES=NONE FRAME=BOX>';
	$i=0;
	while($i < $num)
	{
		$id = mysql_result($result1,$i, "SUPPLIER_ID" );
		$name = mysql_result($result1,$i, "SUPPLIER_NAME" );
		$person = mysql_result($result1,$i, "CONTACT_PERSON" );
		$cell = mysql_result($result1,$i, "MOBILE_NO" );
		$ptcl = mysql_result($result1,$i, "PTCL_NO" );
		$address = mysql_result($result1,$i, "ADDRESS" );
		$city = mysql_result($result1,$i, "CITY" );
		$status = mysql_result($result1,$i, "STATUS" );
		$flag = mysql_result($result1,$i, "WORKNG_FLAG" );
		// Status Check Conditions
		if($status == "E")
		{
			$show = "Enable";
		}
		else if($status == "S")
		{
			$show = "Suspended";
		}
		else
		{
			$show = "Discarded";
		}
		// Status Check Conditions
		if($status == "E")
		{
			$show1 = "Efficient";
		}
		else if($status == "S")
		{
			$show1 = "Slow";
		}
		else
		{
			$show1 = "Normal";
		}
		
		echo '<tr>
				<td width="90" align="center">&nbsp;'.$id.'</td>
				<td width="150" align="center">&nbsp;'.$name.'</td>
				<td width="150" align="center">&nbsp;'.$person.'</td>
				<td width="150" align="center">&nbsp;'.$cell.'</td>
				<td width="110" align="center">&nbsp;'.$ptcl.'</td>
				<td width="200" align="center">&nbsp;'.$address.'</td>
				<td width="130" align="center">&nbsp;'.$city.'</td>
				<td width="120" align="center">&nbsp;'.$show.'</td>
				<td width="120" align="center">&nbsp;'.$show1.'</td>
			  </tr>';
		$i++;
	} // while ends here
	echo '</table>';
?>