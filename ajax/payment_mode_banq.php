<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$p_mode = $_POST['value'];
//	$total = $_POST['total'];
	//echo $p_mode."<br>";
	if($p_mode == "R")
	{
		echo  '<table width="292">
	  <tr>
		<th  align="justify" width="113">Credit Card No:</th>
		<td width="167"><input type="text" name="cardno" id="cardno" size="10"/></td>
	  </tr>
	  </table>';
	}

	else if($p_mode == "Q")
	{
		echo  '<table width="292">
	  
	  <tr>
		<th align="justify" width="113"> Cheque No:</th>
		<td width="167"><input type="text" name="chequeno" id="chequeno" /></td>
	  </tr>

	  <tr>
		<th align="justify" width="113">Concerned Bank:</th>
		<td width="167"><input type="text" name="bank" id="bank" /></td>
	  </tr>
	  </table>';
	}
	else
	{
		
	}
?>