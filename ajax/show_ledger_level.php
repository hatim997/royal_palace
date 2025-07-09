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
		echo '<select style="width:145px;" id="vouchertype" name="idd">
    		<option value="">Select Item</option>';    
			  $query1 = "SELECT * FROM main_acct_tab ORDER BY MAIN_ACCT_TITLE ASC";
			  $result1 = mysql_query($query1)or die("Failed :".mysql_error());
			  $num1 = mysql_numrows($result1);
			  $i=0;
			  while($i < $num1)
			  {
				  $main_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
				  $main_title = mysql_result($result1,$i, "MAIN_ACCT_TITLE" );
				  echo '<option value="'.$main_code.'">'.$main_title.'</option>';
				  $i++;
			  }  // while loop ends here
			  echo '</select>';
	}
	else if($value == "C")
	{	
		echo '<select style="width:145px;" id="vouchertype">
			  <option value="">Select Item</option>';
				  $query1 = "SELECT * FROM ctrl_acct_tab ORDER BY CTRL_ACCT_TITLE ASC";
				  $result1 = mysql_query($query1)or die("Failed :".mysql_error());
				  $num1 = mysql_numrows($result1);
				  $i=0;
				  while($i < $num1)
				  {
					  $main_acct_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
					  $ctrl_acct_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
					  $ctrl_acct_title = mysql_result($result1,$i, "CTRL_ACCT_TITLE" );
					  $code = $main_acct_code.$ctrl_acct_code;
					  echo '<option value="'.$code.'">'.$ctrl_acct_title.'</option>';
					  $i++;
				  }  // while loop ends here
			  echo '</select>';
	}
	else if($value == "C1")
	{	
		echo '<select style="width:145px;" id="vouchertype" name="idd">
			  <option value="">Select Item</option>';
				  $query1 = "SELECT * FROM scat1_acct_tab ORDER BY SCAT1_ACCT_TITLE ASC";
				  $result1 = mysql_query($query1)or die("Failed :".mysql_error());
				  $num1 = mysql_numrows($result1);
				  $i=0;
				  while($i < $num1)
				  {
					  $main_acct_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
					  $ctrl_acct_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
					  $scat1_acct_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
					  $scat1_acct_title = mysql_result($result1,$i, "SCAT1_ACCT_TITLE" );
					  $code = $main_acct_code.$ctrl_acct_code.$scat1_acct_code;
					  echo '<option value="'.$code.'">'.$scat1_acct_title.'</option>';
					  $i++;
				  }  // while loop ends here
			  echo '</select>';
	}
	else
	{	
		echo '<select style="width:145px;" id="vouchertype" name="idd">
			  <option value="">Select Item</option>';
				  $query1 = "SELECT * FROM scat2_acct_tab ORDER BY SCAT2_ACCT_TITLE ASC";
				  $result1 = mysql_query($query1)or die("Failed :".mysql_error());
				  $num1 = mysql_numrows($result1);
				  $i=0;
				  while($i < $num1)
				  {
					  $main_acct_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
					  $ctrl_acct_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
					  $scat1_acct_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
					  $scat2_acct_code = mysql_result($result1,$i, "SCAT2_ACCT_CODE" );
					  $scat2_acct_title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
					  $code = $main_acct_code.$ctrl_acct_code.$scat1_acct_code.$scat2_acct_code;
					  echo '<option value="'.$code.'">'.$scat2_acct_title.'</option>';
					  $i++;
				  }  // while loop ends here
			  echo '</select>';
	}
?>