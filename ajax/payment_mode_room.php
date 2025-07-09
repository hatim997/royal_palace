<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$p_mode = $_POST['value'];
	?>
     <table width="763" bgcolor="#FFFFD2">
	<?php
	if($p_mode == "C")
	{
		?>
	 
	  <tr>
		<td width="120" align="left" height="29">Received Amount:</td>
		<td width="252" align="left"><input type="text" size="15" name="rec_amount" id="rec_amount" onChange="netamount('rec_amount');" /></td>
	 
		<td width="124" align="left" height="29">Balance Return:</td>
		<td width="247" align="left"><input type="text" name="bal_return" id="bal_return" size="15" /></td>
	  </tr>
	  
	  <?php
	}
	else if($p_mode == "Q")
	{
		?>
        
	  
	  <tr>
		<td width="120" align="left" height="29">Cheque No:</td>
		<td width="252" align="left"><input type="text" name="chequeno" id="chequeno" size="15" /></td>
	  
		<td width="124" align="left" height="29" >Concerned Bank:</td>
		<td width="247" align="left"><input type="text" name="bank" id="bank" size="15" /></td>
	  </tr>
	  
	  <?php
	}
	else if($p_mode == "R")
	{
		?>
	  
	  <tr>
		<td width="120" align="left" height="29" >Credit Card No:</td>
		<td width="252" align="left"><input type="text" name="cardno" id="cardno" size="15" /></td>
        <td width="124"></td>
        <td width="247"></td>
	  </tr>
     
	<?php
	}
?>
</table>