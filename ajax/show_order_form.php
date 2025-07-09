<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$total_guest = $_POST['total_guest'];	
$total_amount = ($total_guest)*999;
$orderno = $_POST['orderno'];


?>
<?php
	
	$value = $_POST['value'];
	//echo $value."<br>";
	$query = "SELECT * FROM order_type WHERE ORDER_TYPE_ID = '$value' ORDER BY ORDER_TYPE_ID ASC";
	$result = mysql_query($query);
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$o_id = mysql_result($result,$i, "ORDER_TYPE_ID" );
		$price = mysql_result($result,$i, "PRICE" );
		$i++;
	}
	
	echo '<div id="entry">
<form name="testform" id="testform" action="de_client_master.php" method="post">
		  <table width="390" align="center" border="0" cellpadding="0" cellspacing="0">
		  
  <tr>
	<td width="120" align="left">Table No:</td>
	<td width="270" align="left"><input type="text" id="tableno" name="tableno" /></td>
  </tr>
  <tr height="3%">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td width="120" align="left">Total Guests:</td>
	<td width="270" align="left"><input type="text" id="total_guest" name="total_guest" /></td>
  </tr>
  <tr height="3%">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr align="center">                    
	<td align="left" width="120" valign="top">&nbsp;</td>
	<td align="left" width="270" valign="bottom"><input type="button" onclick="old_guest_order(this.form)" class="button" align="left" style="cursor:pointer"name="Submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
  </table>
  <input type="hidden" id="gid" name="gid" value="1" />
  <input type="hidden" id="order_type_id" name="order_type_id" value="'.$o_id.'" />
  </form>
</div>	<!-- end of entry division -->';
	
?>