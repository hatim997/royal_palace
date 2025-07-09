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
	$order_no = $_POST['order_no'];
	$dish_qty = $_POST['dish_qty'];
	$dish_id = $_POST['dish_id'];
	//echo $id."<br>";
	######## TRANSACTION INFORMATION CODE ########
	//echo "Name is ".$g_name."<br>";
	//echo '<h1 class="style1" style=" font-size:14px;">Edit Dish Quantity</h1>';
		
	echo '<form name="editform" id="editform">
		  <table width="490" align="center" border="0" cellpadding="0" cellspacing="0">	  
  
  <tr>
	<td width="120" height="40" align="left"></td>
	<td width="270" align="left">
	
	</td>
  </tr>
  <tr>
	<td width="170" align="left">Old Required Quantity:</td>
	<td width="270" align="left"><input type="hidden" id="order_no" name="order_no" value="'.$order_no.'" />
	<input type="text" id="dish_qty" name="dish_qty" value="'.$dish_qty.'" readonly="readonly"/>
	</td>
  </tr>
  <tr>
	<td width="120" height="10" align="left"></td>
	<td width="270" align="left">
	
	</td>
  </tr>
  <tr>
	<td width="120" align="left">New Required Quantity:</td>
	<td width="270" align="left">
	<input type="text" id="new_req_quantity" name="new_req_quantity"/>
	</td>
  </tr>
  <tr>
	<td width="120" height="10" align="left"></td>
	<td width="270" align="left">
	
	</td>
  </tr>
   <tr align="center">                    
	<td align="left" width="120" valign="top">&nbsp;</td>
	<td align="left" width="270" valign="bottom"><input type="button" onclick="edit_save_qty('.$order_no.','.$dish_id.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Save" /></td>
  </tr>
  </table>
  </form>';
?>