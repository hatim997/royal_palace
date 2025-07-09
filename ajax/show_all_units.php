<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	
	$query = "SELECT * FROM unit_tab ORDER BY UNIT_ID ASC";
										
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		
		echo '<table width="550" align="center" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
			<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Units</i></b></td></tr>
			</table>';
		echo '<table width="550" cellpadding="0" cellspacing="0" align="center" BORDER=1 RULES=NONE FRAME=BOX>
				<thead>
				<tr>
					<td width="90" align="center"><b>&nbsp;Unit ID</b></td>
					<td width="150" align="center"><b>&nbsp;Unit Name</b></td>
					<td width="150" align="center"><b>&nbsp;Low Unit</b></td>
					<td width="150" align="center"><b>&nbsp;Division Value</b></td>
				</tr>
				</thead>
			</table>
			
			<table width="550" cellpadding="0" cellspacing="0" align="center" class="altrowstable" id="alternatecolor" BORDER=1 RULES=NONE FRAME=BOX>';
		$i=0;
		while($i < $num)
		{
			$main_code = mysql_result($result1,$i, "UNIT_ID" );
			$main_title = mysql_result($result1,$i, "UNIT_DETAIL" );
			$ctrl_code = mysql_result($result1,$i, "LOW_UNIT" );
			$ctrl_title = mysql_result($result1,$i, "DIVISION_VALUE" );
			echo '<tr>
					<td width="90" align="center">&nbsp;'.$main_code.'</td>
					<td width="150" align="center">&nbsp;'.$main_title.'</td>
					<td width="150" align="center">&nbsp;'.$ctrl_code.'</td>
					<td width="150" align="center">&nbsp;'.$ctrl_title.'</td>
				  </tr>';
			$i++;
		} // while ends here
		echo '</table>';
?>