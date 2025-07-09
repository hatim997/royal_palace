<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$id = $_POST['id'];
	//echo $id."<br>";
	$query = "SELECT * FROM guest_master_tab WHERE GUEST_ID = '$id' ORDER BY GUEST_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());
	$num = mysql_numrows($result);
	$i = 0;
	while ($i < $num)
	{
		$g_name = mysql_result($result,$i, "GUEST_NAME" );
		$i++;
	}
	//echo "Name is ".$g_name."<br>";
	echo '<h1 class="style1" style=" font-size:16px;">Order Info</h1>';
		
	echo '<form name="testform" id="testform" action="de_client_master.php" method="post">
		  <table width="390" align="center" border="0" cellpadding="0" cellspacing="0">
		  
  <tr>
	<td width="120" align="left">Name:</td>
	<td width="270" align="left"><input type="text" id="name" name="name" value="'.$g_name.'" /></td>
  </tr>
  <tr height="3%">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
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
	<td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
	<td align="left" width="270" valign="bottom"><input type="button" onclick="old_guest_order(this.form)" class="button" align="left" style="cursor:pointer"name="Submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
  </table>
  <input type="hidden" id="gid" name="gid" value="'.$id.'" />
  </form>';
?>