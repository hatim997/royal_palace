<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
include('../update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>
<?php
	$value = $_POST['value'];
	
	echo '<table width="300" align="center" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="120" align="left">Control:</td>
		<td width="180" align="left">
		<select name="control" id="control" onchange="show_category1(this.value);">
		  <option value="">Select Control</option>';
		  $query = "SELECT * FROM ctrl_acct_tab WHERE MAIN_ACCT_CODE = '$value' ORDER BY CTRL_ACCT_TITLE ASC";
		  $result = mysql_query($query);
		  $num = mysql_numrows($result);
		  $i=0;
		  while($i < $num)
		  {
			  $assets_tittle = mysql_result($result,$i, "CTRL_ACCT_TITLE" );
			  $assets_code = mysql_result($result,$i, "CTRL_ACCT_CODE" );
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
	  <div id="show_category1">
	  
	  </div>';
?>