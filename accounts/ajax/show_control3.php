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
	
	echo '<select name="control" id="control" style="width:130px;" onchange="show_category2(this.value);">
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
		echo '</select>';
?>