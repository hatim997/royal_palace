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
	
	echo '<select name="scat1" id="scat1" style="width:130px;" onchange="category1_code(this.value);">
		  <option value="">Select Category 1</option>';
		  $query = "SELECT * FROM scat1_acct_tab WHERE CTRL_ACCT_CODE = '$value' ORDER BY SCAT1_ACCT_TITLE ASC";
		  $result = mysql_query($query);
		  $num = mysql_numrows($result);
		  $i=0;
		  while($i < $num)
		  {
			  $assets_tittle = mysql_result($result,$i, "SCAT1_ACCT_TITLE" );
			  $assets_code = mysql_result($result,$i, "SCAT1_ACCT_CODE" );
			  echo '<option value="'.$assets_code.'">'.$assets_tittle.'</option>';
			  $i++;
		  }  // while loop ends here
		echo '</select>';
?>