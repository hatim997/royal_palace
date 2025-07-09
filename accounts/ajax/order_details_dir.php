<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$orderno = $_POST['orderno'];
	$gid = $_POST['gid'];
	$dis = $_POST['value'];
	$gross = $_POST['gross'];
	$service = $_POST['service'];
	$tax = $_POST['tax'];
	//echo $dis."<br>";
	if($dis == "0")
	{
		$total_discount = 0;
	}
	else
	{
		$total_discount = ($gross/100)*$dis;
	}
	$rec_amount = ($gross + $service + $tax) - $total_discount;
	if($dis == "0")
	{
		echo '<table width="500" align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
	  <td width="120" align="left">Due Amount:</td>
	  <td width="380" align="left"><input type="text" id="received" name="received" value="'.$rec_amount.'" readonly="readonly" />
	  <a class="style1" style="font-size:16px;" href="http://www.wiitechmill.com/royalpalace/accounts/receipt.php?gid='.$gid.'&on='.$orderno.'&dis='.$total_discount.'">Print Bill</a></td>
	</tr>
	<tr height="3%">
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	</tr>
	</table>';
	}
	else
	{
		echo  '<table align="center" width="500" cellspacing="0" cellpadding="0">
	  
	  <tr>
		<td width="120" align="left">Director:</td>
		<td width="380" align="left"><select id="head" name="head">
  		<option value="">Select director</option>';
		$query = "SELECT * FROM directors_tab ORDER BY DIRECTOR_NAME ASC";
		$result = mysql_query($query)or die("Failed :".mysql_error());
		$num = mysql_numrows($result);
		$i=0;
		while($i < $num)
		{
			$dir_name = mysql_result($result,$i, "DIRECTOR_NAME");
			$dir_id = mysql_result($result,$i, "DIRECTOR_ID");
            echo '<option value="'.$dir_id.'">'.$dir_name.'</option>';
            $i++;
        }  // while loop ends here
    echo '</select></td>
	  </tr>
	  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="3%">
    <td>Details</td>
    <td> <textarea rows="2" id="discount_details" name="discount_details" cols="20"></textarea>
</td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="left">Due Amount:</td>
    <td width="380" align="left"><input type="text" id="received" name="received" value="'.$rec_amount.'" readonly="readonly" />
	<a class="style1" style="font-size:16px;" href="http://www.wiitechmill.com/royalpalace/accounts/receipt.php?gid='.$gid.'&on='.$orderno.'&dis='.$total_discount.'">Print Bill</a></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
	  </table>';
	}
?>