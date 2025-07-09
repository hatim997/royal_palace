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
		echo '<form name="main_form">
            <table width="300" align="center" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td align="left">Main Code:</td>
				<td align="left"><input type="text" name="main_code" id="main_code" /></td>
			  </tr>
			  
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td align="left">Main Tittle:</td>
				<td align="left"><input type="text" name="main_title" id="main_title" /></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
			  <td>&nbsp;</td>
			  <td align="left"><input class="button" align="left" onclick="add_main();" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
			  </tr>
			</table>
			</form>';
	}
	else if($value == "C")
	{	
		echo '<form name="ctrl_form">
            <table width="300" align="center" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left">Main:</td>
				<td align="left">
				<select name="main" id="main">
				  <option value="">Select Main</option>';
				  $query = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_TITLE ASC";
				  $result = mysql_query($query);
				  $num = mysql_numrows($result);
				  $i=0;
				  while($i < $num)
				  {
					  $assets_tittle = mysql_result($result,$i, "MAIN_ACCT_TITLE" );
					  $assets_code = mysql_result($result,$i, "MAIN_ACCT_CODE" );
					  echo '<option value="'.$assets_code.'">'.$assets_tittle.'</option>';
					  $i++;
				  }  // while loop ends here
				echo '</select></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td align="left">Control Code:</td>
				<td align="left"><input type="text" name="ctrl_code" id="ctrl_code" /></td>
			  </tr>
			  
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td align="left">Control Tittle:</td>
				<td align="left"><input type="text" name="ctrl_title" id="ctrl_title" /></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
			  <td>&nbsp;</td>
			  <td align="left"><input class="button" align="left" onclick="add_ctrl();" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
			  </tr>
			</table>
			</form>';
	}
	else if($value == "C1")
	{	
		echo '<form name="ctrl_form">
            <table width="300" align="center" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="120" align="left">Main:</td>
				<td width="180" align="left">
				<select name="main" id="main" onchange="show_control(this.value);">
				  <option value="">Select Main</option>';
				  $query = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_TITLE ASC";
				  $result = mysql_query($query);
				  $num = mysql_numrows($result);
				  $i=0;
				  while($i < $num)
				  {
					  $assets_tittle = mysql_result($result,$i, "MAIN_ACCT_TITLE" );
					  $assets_code = mysql_result($result,$i, "MAIN_ACCT_CODE" );
					  echo '<option value="'.$assets_code.'">'.$assets_tittle.'</option>';
					  $i++;
				  }  // while loop ends here
				echo '</select></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  </table>
			  
			  <div id="show_control">
			  
			  </div>
			  
			  <table width="300" align="center" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="120" align="left">Category 1 Code:</td>
				<td width="180" align="left"><input type="text" name="scat_code" id="scat_code" /></td>
			  </tr>
			  
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td width="120" align="left">Category 1 Title:</td>
				<td width="180" align="left"><input type="text" name="scat_title" id="scat_title" /></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
			  <td width="120">&nbsp;</td>
			  <td width="180" align="left"><input class="button" align="left" onclick="add_scat1();" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
			  </tr>
			</table>
			</form>';
	}
	else
	{	
		echo '<form name="ctrl_form">
            <table width="300" align="center" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="120" align="left">Main:</td>
				<td width="180" align="left">
				<select name="main" id="main" onchange="show_control1(this.value);">
				  <option value="">Select Main</option>';
				  $query = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_TITLE ASC";
				  $result = mysql_query($query);
				  $num = mysql_numrows($result);
				  $i=0;
				  while($i < $num)
				  {
					  $assets_tittle = mysql_result($result,$i, "MAIN_ACCT_TITLE" );
					  $assets_code = mysql_result($result,$i, "MAIN_ACCT_CODE" );
					  echo '<option value="'.$assets_code.'">'.$assets_tittle.'</option>';
					  $i++;
				  }  // while loop ends here
				echo '</select></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  </table>
			  
			  <div id="show_control">
			  
			  </div>
			  
			  <table width="300" align="center" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td width="120" align="left">Category 2 Code:</td>
				<td width="180" align="left"><input type="text" name="scat2_code" id="scat2_code" /></td>
			  </tr>
			  
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td width="120" align="left">Category 2 Title:</td>
				<td width="180" align="left"><input type="text" name="scat2_title" id="scat2_title" /></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
				<td width="120" align="left">Opening:</td>
				<td width="180" align="left"><input type="text" name="opening" id="opening" /></td>
			  </tr>
			  <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
			  <td width="120">&nbsp;</td>
			  <td width="180" align="left"><input class="button" align="left" onclick="add_scat2();" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
			  </tr>
			</table>
			</form>';
	}
?>