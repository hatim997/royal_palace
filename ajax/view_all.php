<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$orderno = $_POST['orderno'];


?>
<?php
	
	$value = $_POST['value'];
	//echo $value."<br>";
	if($value == "M")
	{
		$query = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_CODE ASC";
										
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		
		echo '<table width="350" align="center" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
			<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Main Information</i></b></td></tr>
			</table>';
		echo '<table width="350" cellpadding="0" cellspacing="0" align="center" BORDER=1 RULES=NONE FRAME=BOX>
					<thead>
					<tr>
						<td width="100" align="left"><b>&nbsp;Main Code</b></td>
						<td width="250" align="left"><b>Main Title</b></td>
					</tr>
					</thead>
				</table>
				<div id="del_dish" align="center" style="overflow:auto; height:260px; width:390px">
				<table width="350" cellpadding="0" cellspacing="0" align="center" class="altrowstable" id="alternatecolor" BORDER=1 RULES=NONE FRAME=BOX>';
		$i=0;
		while($i < $num)
		{
			$code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$title = mysql_result($result1,$i, "MAIN_ACCT_TITLE" );
			echo '<tr>
			  <td width="100" align="left">&nbsp;'.$code.'</td>                            
			  <td width="250" align="left">&nbsp;'.$title.'</td>
			</tr>';
			$i++;
		} // while ends here
		echo '</table></div>';
	}
	else if($value == "C")
	{	
		$query = "SELECT main_acct_tab.MAIN_ACCT_CODE, main_acct_tab.MAIN_ACCT_TITLE,
					ctrl_acct_tab.CTRL_ACCT_CODE, ctrl_acct_tab.CTRL_ACCT_TITLE
					FROM main_acct_tab, ctrl_acct_tab 
					WHERE ctrl_acct_tab.MAIN_ACCT_CODE = main_acct_tab.MAIN_ACCT_CODE
					ORDER BY main_acct_tab.MAIN_ACCT_CODE,ctrl_acct_tab.CTRL_ACCT_CODE ASC";
										
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		
		echo '<table width="760" align="center" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
			<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Control Information</i></b></td></tr>
			</table>';
		echo '<table width="760" cellpadding="0" cellspacing="0" align="center" BORDER=1 RULES=NONE FRAME=BOX>
				<thead>
				<tr>
					<td width="100" align="left"><b>&nbsp;Main Code</b></td>
					<td width="200" align="left"><b>&nbsp;Main Title</b></td>
					<td width="120" align="left"><b>Control Code</b></td>
					<td width="340" align="left"><b>Control Title</b></td>
				</tr>
				</thead>
			</table>
			<div align="center" style="overflow:auto; height:260px; width:810px; margin-left:17px;">
			<table width="760" cellpadding="0" cellspacing="0" align="center" class="altrowstable" id="alternatecolor" BORDER=1 RULES=NONE FRAME=BOX>';
		$i=0;
		while($i < $num)
		{
			$main_code = mysql_result($result1,$i, "main_acct_tab.MAIN_ACCT_CODE" );
			$main_title = mysql_result($result1,$i, "main_acct_tab.MAIN_ACCT_TITLE" );
			$ctrl_code = mysql_result($result1,$i, "ctrl_acct_tab.CTRL_ACCT_CODE" );
			$ctrl_title = mysql_result($result1,$i, "ctrl_acct_tab.CTRL_ACCT_TITLE" );
			echo '<tr>
					<td width="100" align="center">&nbsp;'.$main_code.'</td>
					<td width="200" align="left">&nbsp;'.$main_title.'</td>
					<td width="120" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$ctrl_code.'</td>
					<td width="340" align="left">&nbsp;'.$ctrl_title.'</td>
				  </tr>';
			$i++;
		} // while ends here
		echo '</table></div>';
	}
	else if($value == "C1")
	{	
		$query = "SELECT main_acct_tab.MAIN_ACCT_CODE, main_acct_tab.MAIN_ACCT_TITLE,
					ctrl_acct_tab.CTRL_ACCT_CODE, ctrl_acct_tab.CTRL_ACCT_TITLE, 
					scat1_acct_tab.SCAT1_ACCT_CODE, scat1_acct_tab.SCAT1_ACCT_TITLE
					FROM main_acct_tab, ctrl_acct_tab, scat1_acct_tab 
					WHERE scat1_acct_tab.CTRL_ACCT_CODE = ctrl_acct_tab.CTRL_ACCT_CODE
					AND scat1_acct_tab.MAIN_ACCT_CODE = ctrl_acct_tab.MAIN_ACCT_CODE 
					AND ctrl_acct_tab.MAIN_ACCT_CODE = main_acct_tab.MAIN_ACCT_CODE
					ORDER BY main_acct_tab.MAIN_ACCT_CODE, ctrl_acct_tab.CTRL_ACCT_CODE, scat1_acct_tab.SCAT1_ACCT_CODE ASC";
										
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		
		echo '<table width="980" align="center" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
			<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Category 1 Information</i></b></td></tr>
			</table>';
		echo '<table width="980" cellpadding="0" cellspacing="0" align="center" BORDER=1 RULES=NONE FRAME=BOX>
				<thead>
				<tr>
					<td width="60" align="center"><b>Main Code</b></td>
					<td width="200" align="left"><b>&nbsp;&nbsp;&nbsp;&nbsp;Main Title</b></td>
					<td width="80" align="center"><b>Control Code</b></td>
					<td width="280" align="left"><b>&nbsp;&nbsp;Control Title</b></td>
					<td width="90" align="center"><b>Category 1 Code</b></td>
					<td width="370" align="left"><b>Categorg 1 Title</b></td>
				</tr>
				</thead>
			</table>
			<div id="del_dish" align="center" style="overflow:auto; height:260px; width:1020px; margin-left:16px;"">
			<table width="980" cellpadding="0" cellspacing="0" align="center" class="altrowstable" id="alternatecolor" BORDER=1 RULES=NONE FRAME=BOX>';
		$i=0;
		while($i < $num)
		{
			$main_code = mysql_result($result1,$i, "main_acct_tab.MAIN_ACCT_CODE" );
			$main_title = mysql_result($result1,$i, "main_acct_tab.MAIN_ACCT_TITLE" );
			$ctrl_code = mysql_result($result1,$i, "ctrl_acct_tab.CTRL_ACCT_CODE" );
			$ctrl_title = mysql_result($result1,$i, "ctrl_acct_tab.CTRL_ACCT_TITLE" );
			$scat1_code = mysql_result($result1,$i, "scat1_acct_tab.SCAT1_ACCT_CODE" );
			$scat1_title = mysql_result($result1,$i, "scat1_acct_tab.SCAT1_ACCT_TITLE" );
			echo '<tr>
					<td width="60" align="left">&nbsp;'.$main_code.'</td>
					<td width="200" align="left">&nbsp;'.$main_title.'</td>
					<td width="80" align="center">'.$ctrl_code.'</td>
					<td width="280" align="left">'.$ctrl_title.'</td>
					<td width="90" align="center">'.$scat1_code.'</td>
					<td width="370" align="left">&nbsp;'.$scat1_title.'</td>
				  </tr>';
			$i++;
		} // while ends here
		echo '</table></div>';
	}
	else
	{	
		$query = "SELECT main_acct_tab.MAIN_ACCT_CODE, main_acct_tab.MAIN_ACCT_TITLE,
					ctrl_acct_tab.CTRL_ACCT_CODE, ctrl_acct_tab.CTRL_ACCT_TITLE, 
					scat1_acct_tab.SCAT1_ACCT_CODE, scat1_acct_tab.SCAT1_ACCT_TITLE, 
					scat2_acct_tab.SCAT2_ACCT_CODE, scat2_acct_tab.SCAT2_ACCT_TITLE
					FROM main_acct_tab, ctrl_acct_tab, scat1_acct_tab, scat2_acct_tab 
					WHERE scat2_acct_tab.SCAT1_ACCT_CODE = scat1_acct_tab.SCAT1_ACCT_CODE 
					AND scat2_acct_tab.CTRL_ACCT_CODE = scat1_acct_tab.CTRL_ACCT_CODE 
					AND scat2_acct_tab.MAIN_ACCT_CODE = scat1_acct_tab.MAIN_ACCT_CODE 
					AND scat2_acct_tab.CTRL_ACCT_CODE = ctrl_acct_tab.CTRL_ACCT_CODE 
					AND scat2_acct_tab.MAIN_ACCT_CODE = ctrl_acct_tab.MAIN_ACCT_CODE 
					AND ctrl_acct_tab.MAIN_ACCT_CODE = main_acct_tab.MAIN_ACCT_CODE  
					ORDER BY  main_acct_tab.MAIN_ACCT_CODE, ctrl_acct_tab.CTRL_ACCT_CODE, 
					scat1_acct_tab.SCAT1_ACCT_CODE, scat2_acct_tab.SCAT2_ACCT_CODE ASC";
										
		$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
		$num = mysql_num_rows($result1);
		
		echo '<div id="del_dish" align="center" style="overflow:auto; width:1220px;  margin-left:8px;">
		<table width="1180" align="center" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
			<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Category 2 Information</i></b></td></tr>
			</table>';
		echo '<table width="1180" cellpadding="0" cellspacing="10" align="center" BORDER=1 RULES=NONE FRAME=BOX>
				<thead>
				<tr>
					<td width="70" align="center"><b>&nbsp;Main Code</b></td>
					<td width="200" align="left"><b>Main Title</b></td>
					<td width="80" align="left"><b>Control Code</b></td>
					<td width="280" align="left"><b>Control Title</b></td>
					<td width="60" align="left"><b>Category 1 Code</b></td>
					<td width="370" align="left"><b>Category 1 Title</b></td>
					<td width="60" align="left"><b>Category 2 Code</b></td>
					<td width="380" align="center"><b>Category 2 Title</b></td>
				</tr>
				</thead>
			</table>
			</div>
			<div id="del_dish" align="center" style="overflow:auto; height:260px; width:1220px;  margin-left:17px;">
			<table width="1180" cellpadding="0" cellspacing="0" align="center" class="altrowstable" id="alternatecolor" BORDER=1 RULES=NONE FRAME=BOX>';
		$i=0;
		while($i < $num)
		{
			$main_code = mysql_result($result1,$i, "main_acct_tab.MAIN_ACCT_CODE" );
			$main_title = mysql_result($result1,$i, "main_acct_tab.MAIN_ACCT_TITLE" );
			$ctrl_code = mysql_result($result1,$i, "ctrl_acct_tab.CTRL_ACCT_CODE" );
			$ctrl_title = mysql_result($result1,$i, "ctrl_acct_tab.CTRL_ACCT_TITLE" );
			$scat1_code = mysql_result($result1,$i, "scat1_acct_tab.SCAT1_ACCT_CODE" );
			$scat1_title = mysql_result($result1,$i, "scat1_acct_tab.SCAT1_ACCT_TITLE" );
			$scat2_code = mysql_result($result1,$i, "scat2_acct_tab.SCAT2_ACCT_CODE" );
			$scat2_title = mysql_result($result1,$i, "scat2_acct_tab.SCAT2_ACCT_TITLE" );
			echo '<tr>
					<td width="70" align="center">'.$main_code.'</td>
					<td width="200" align="left">'.$main_title.'</td>
					<td width="80" align="left">'.$ctrl_code.'</td>
					<td width="280" align="left">'.$ctrl_title.'</td>
					<td width="60" align="left">'.$scat1_code.'</td>
					<td width="370" align="left">'.$scat1_title.'</td>
					<td width="60" align="left">'.$scat2_code.'</td>
					<td width="380" align="left">'.$scat2_title.'</td>
				  </tr>';
			$i++;
		} // while ends here
		echo '</table></div>';
	}
?>