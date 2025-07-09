<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
	
	$orderno = $_POST['orderno'];
	$dish = $_POST['dish'];
	//echo $id."<br>";
	$query = "SELECT * FROM dish_master_tab WHERE DISH_ID = '$dish' ORDER BY DISH_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());
	$num = mysql_numrows($result);
	$i = 0;
	while ($i < $num)
	{
		$dish_name = mysql_result($result,$i, "DISH_NAME" );
		$i++;
	}
	
	$query = "SELECT * FROM order_history_tab WHERE ORDER_NO = '$orderno' AND DISH_ID = '$dish' ORDER BY DISH_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());
	$num = mysql_numrows($result);
	$i = 0;
	while ($i < $num)
	{
		$qty = mysql_result($result,$i, "DISH_QTY" );
		$i++;
	}
	//echo "Name is ".$g_name."<br>";
	//echo '<h1 class="style1" style=" font-size:14px;">Edit Dish Quantity</h1>';
		
	echo '<form name="testform" id="testform" action="de_client_master.php" method="post">
		  <table width="390" align="center" border="0" cellpadding="0" cellspacing="0">
		  
  <tr>
	<td width="120" align="left">Dish:</td>
	<td width="270" align="left"><input type="text" id="name" name="name" value="'.$dish_name.'" readonly="readonly" /></td>
  </tr>
  <tr height="3%">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td width="120" align="left">Quantity:</td>
	<td width="270" align="left"><input type="text" id="qty" name="qty" value="'.$qty.'" /></td>
  </tr>
  <tr height="3%">
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr align="center">                    
	<td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
	<td align="left" width="270" valign="bottom"><input type="button" onclick="save_quantity(this.form)" class="button" align="left" style="cursor:pointer"name="Submit" value="Save" /><input type="button" onclick="show_order_detail('.$orderno.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Cancel" /></td>
  </tr>
  </table>
  <input type="hidden" id="dish" name="dish" value="'.$dish.'" />
  <input type="hidden" id="orderno" name="orderno" value="'.$orderno.'" />
  </form>';
?>