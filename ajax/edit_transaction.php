<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$transactionid = $_POST['transaction_id'];
	//echo $id."<br>";
	######## TRANSACTION INFORMATION CODE ########
	$query1 = "SELECT * FROM voucher_transaction WHERE TRANSACTION_ID = '$transactionid'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	$j = 0;
	while($i < $num1)
	{
		$voucher_id = mysql_result($result1,$i, "VOUCHER_ID" );
		$amount = mysql_result($result1,$i, "TRN_AMOUNT" );
		$detail = mysql_result($result1,$i, "TRN_NARRATION" );
		$amounttype = mysql_result($result1,$i, "AMOUNT_TYPE" );
		$i++;
	}
	//echo "Name is ".$g_name."<br>";
	//echo '<h1 class="style1" style=" font-size:14px;">Edit Dish Quantity</h1>';
	 
	echo '<form name="testform" id="testform" action="de_client_master.php" method="post">
		  <table width="50%" align="center" border="0" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF;">	  
  <tr height="3%" style="background-color:#FFF;">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr style="background-color:#FFF;">
	<td width="120" align="left">Amount:</td>
	<td width="270" align="left"><input type="text" id="amount" name="amount" value="'.number_format($amount, 2, '.', ',').'" /></td>
  </tr>
  <tr height="3%" style="background-color:#FFF;">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr style="background-color:#FFF;">
	<td width="120" align="left">Amount Type:</td>
	<td width="270" align="left">
	<select style="width: 140px;" name="type" id="type">';
	if($amounttype == "CR")
	{
		echo '<option value="'.$amounttype.'">Credit</option>
			  <option value="DB">Debit</option>';
	}
	else
	{
		echo '<option value="'.$amounttype.'">Debit</option>
			  <option value="CR">Credit</option>';
	}
    echo '</select>
	</td>
  </tr>
  <tr height="3%" style="background-color:#FFF;">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr style="background-color:#FFF;">
	<td width="120" align="left">Detail:</td>
	<td width="270" align="left"><input type="text" id="detail" name="detail" value="'.$detail.'" /></td>
  </tr>
  <tr height="3%" style="background-color:#FFF;">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr align="center" style="background-color:#FFF;">                    
	<td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
	<td align="left" width="270" valign="bottom"><input type="button" onclick="edit_save_transaction('.$transactionid.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Save" /><input type="button" onclick="closePopup('.$transactionid.')" class="button" align="left" style="cursor:pointer" name="Submit" value="Cancel" /></td>
  </tr>
  </table>
  </form>';
?>