<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$p_mode = $_POST['value'];
	//echo $p_mode."<br>";
	if($p_mode == "C")
	{
		
	}
	else
	{
		echo  '<table align="center" width="350" cellspacing="0" cellpadding="0">
	  
	  <tr>
		<td width="140">Bank:</td>
		<td width="210"><input type="text" name="bank" id="bank" /></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="140">Account No:</td>
		<td width="210"><input type="text" name="account_no" id="account_no" /></td>
	  </tr>
	  </table>';
	}
?>