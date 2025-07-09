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
		echo  '<table align="center" width="500" cellspacing="0" cellpadding="0">
	  
	  <tr>
		<td width="120" align="left">Received Amount:</td>
		<td width="380" align="left"><input type="text" name="rec_amount" id="rec_amount" onKeydown="Javascript: if (event.keyCode==13) netamount(event.keyCode);" /></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">Balance Return:</td>
		<td width="380" align="left"><input type="text" name="bal_return" id="bal_return" /></td>
	  </tr>
	  </table>';
	}
	else if($p_mode == "Q")
	{
		echo  '<table align="center" width="500" cellspacing="0" cellpadding="0">
	  
	  <tr>
		<td width="120" align="left">Cheque No:</td>
		<td width="380" align="left"><input type="text" name="chequeno" id="chequeno" /></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">Concerned Bank:</td>
		<td width="380" align="left"><input type="text" name="bank" id="bank" /></td>
	  </tr>
	  </table>';
	}
	else
	{
		echo  '<table align="center" width="500" cellspacing="0" cellpadding="0">
	  
	  <tr>
		<td width="120" align="left">Credit Card No:</td>
		<td width="380" align="left"><input type="text" name="cardno" id="cardno" /></td>
	  </tr>
	  </table>';
	}
?>