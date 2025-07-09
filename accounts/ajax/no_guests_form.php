<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
//$userid = $_SESSION['username'];
//$password = $_SESSION['password'];

?>
<?php
	
	$created_id = $_SESSION['username'];
	$restid = $_SESSION['restid'];
	$table_id = $_POST['table_id'];
	
// Make a MySQL Connection


	//echo $id."<br>";
	######## TRANSACTION INFORMATION CODE ########
	//echo "Name is ".$g_name."<br>";
	//echo '<h1 class="style1" style=" font-size:14px;">Edit Dish Quantity</h1>';
		
	echo '<form name="editform" id="editform">
		  <table width="280" align="center" border="0" cellpadding="0" cellspacing="0">	  
  <tr>
	<td width="120" height="70" align="left"></td>
	<td width="100" align="left"><input type="hidden" id="table_id" name="table_id" value="'.$table_id.'" />
	</td>
  </tr>
  
  <tr>
	<td width="120" align="left">Number of Guests:</td>
	<td width="100" align="left">
	<input type="text" id="total_guests" name="total_guests"/>
	</td>
  </tr>
  <tr>
	<td width="120" height="10" align="left"></td>
	<td width="100" align="left">
	</td>
  </tr>
   <tr align="center">                    
	<td align="left" width="120" valign="top">&nbsp;</td>
	<td align="center" width="100" valign="bottom"><input type="button" onclick="save_guests('.$table_id.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Save" /></td>
  </tr>
  </table>
  </form>';
?>