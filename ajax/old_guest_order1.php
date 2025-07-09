<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$created_id = $_SESSION['username'];
	$restid = $_SESSION['restid'];
	$gid = $_POST['gid'];
	$tableno = $_POST['tableno'];
	$total_guest = $_POST['total_guest'];	
	$total_amount = ($total_guest)*999;
	$orderno = $_POST['orderno'];
$other_charges = $_POST['other_charges'];
$total_gross =($other_charges + $total_amount);
$gross = $total_gross;
?>
<?php
	
	$created_id = $_SESSION['username'];
	$restid = $_SESSION['restid'];
	$gid = $_POST['gid'];
	$tableno = $_POST['tableno'];
	$total_guest = $_POST['total_guest'];	
	$total_amount = ($total_guest)*999;
	$orderno = $_POST['orderno'];
	
	$query1 = "SELECT max(ORDER_NO) FROM order_master_tab";
	$result1 = mysql_query($query1);
	$num1 = mysql_numrows($result1);
	$i = 0;
	while($i < $num1)
	{
		$orderno = mysql_result($result1,$i, "max(ORDER_NO)" );
		$i++;
	}
	$orderno++;
	
	
	
	
	$query = "INSERT INTO order_master_tab
	(REST_ID, ORDER_NO, ORDER_TYPE_ID, GUEST_ID, NO_OF_GUEST, TABLE_NO, TOTAL_CHARGES, VISITED_DATE, VISITED_TIME, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
VALUES('$restid','$orderno','2','$gid','$total_guest','$tableno','$gross','$current_date','$current_time','$created_id','$date_time','$created_id','$date_time')";
	mysql_query($query) or die('Insertion1 Failed:'.mysql_error());
	
	
	$query = "INSERT INTO order_history_tab
	(REST_ID, ORDER_NO, ORDER_TYPE_ID, DISH_ID, DISH_CHARGES_ID, DISH_QTY, DISH_STATUS, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
VALUES('$restid','$orderno','2','0','0','1','S','$created_id','$date_time','$created_id','$date_time')";
	mysql_query($query) or die('Insertion1 Failed:'.mysql_error());
	
	
	$query = "SELECT guest_master_tab.GUEST_ID,guest_master_tab.GUEST_NAME, 
				order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,order_master_tab.NO_OF_GUEST
				FROM guest_master_tab, order_master_tab
				WHERE guest_master_tab.GUEST_ID = order_master_tab.GUEST_ID
				AND order_master_tab.ORDER_NO = '$orderno'
				ORDER BY guest_master_tab.GUEST_ID ASC";
	$result = mysql_query($query) or die("Failed: ".mysql_error());
	
	$num = mysql_num_rows($result);
	$i = 0;
	while ($i < $num)
	{
		$gtid = mysql_result($result,$i, "guest_master_tab.GUEST_ID" );
		$gname = mysql_result($result,$i, "guest_master_tab.GUEST_NAME" );
		$on = mysql_result($result,$i, "order_master_tab.ORDER_NO" );
		$tn = mysql_result($result,$i, "order_master_tab.TABLE_NO" );
		$nog = mysql_result($result,$i, "order_master_tab.NO_OF_GUEST" );
		$i++;
	} // while ends here
		
		echo '<table width="600" align="left" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
		<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Guest Information</i></b></td></tr>
		</table>';
		echo '<table width="600" align="left" cellpadding="0" cellspacing="5" BORDER=1 RULES=NONE FRAME=BOX>
		<tr>
			<td width="70" align="left" style="font-size:14px;"><strong>&nbsp;Guest ID:</strong></td>
			<td width="70" align="left" style="font-size:14px;"><strong>'.$gtid.'</strong></td>
			<td width="150" align="left" style="font-size:14px;"><strong>'.$gname.'</strong></td>
			<td width="150" align="left" style="font-size:14px;"><strong>with&nbsp;&nbsp;&nbsp;'.$nog.'&nbsp;&nbsp;&nbsp;guests</strong></td>
			</tr>
			<tr>
			<td width="70" align="left" style="font-size:14px;"><strong>&nbsp;Order No:</strong></td>
			<td width="70" align="left" style="font-size:14px;"><strong>'.$on.'</strong></td>
			<td width="150" align="left" style="font-size:14px;">&nbsp;</td>
			<td width="150" align="left" style="font-size:14px;">&nbsp;</td>
			</tr>
			<tr>
			<td width="70" align="left" style="font-size:14px;"><strong>&nbsp;Table No:</strong></td>
			<td width="70" align="left" style="font-size:14px;"><strong>'.$tn.'</strong></td>
			<td width="150" align="left" style="font-size:14px;">&nbsp;</td>
			<td width="150" align="left" style="font-size:14px;">&nbsp;</td>
			</tr></table><br><br><br><br><br><br>';
		//echo '<li>'.$name.'</li>';
	//echo "Record Defined Successfully";
	//echo '<span class="style2"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Order No is '.$orderno.'<br><br></strong></span>';
	//echo "Record Defined Successfully ".$var10;
	
/*	$query = "SELECT dish_charges_history.DISH_ID,dish_charges_history.DISH_CHARGES_ID,dish_charges_history.DISH_CHARGES, 
				FROM dish_charges_history
				WHERE dish_charges_history.DISH_CHARGES_ID = '0'
				AND dish_charges_history.DISH_ID = dish_master_tab.DISH_ID
				AND dish_charges_history.DISH_CHARGES = '999'
				ORDER BY dish_charges_history.DISH_CHARGES_ID ASC";
				$result = mysql_query($query) or die("Failed: ".mysql_error());
	
	$num = mysql_num_rows($result);
	$i = 0;
	while ($i < $num)
	{
		$d_id = mysql_result($result,$i, "dish_charges_history.DISH_ID" );
		$d_id = mysql_result($result,$i, "dish_charges_history.DISH_CHARGES_ID" );
		$dchr = mysql_result($result,$i, "dish_charges_history.DISH_CHARGES" );
		$i++;
	} // while ends here */
	$total_amount = ($total_guest)*999;
	
	echo ' Per Guest Charges : RS. 999  <br> <br>' ; 
	echo 'Gross Charges : '.$total_amount.'<br><br><br>' ;
	
	
				
  
  					 
		//$time = date('H:i:s');
		//$date_time = date('Y-m-d H:i:s');				
		/*
		$other_charges = $_POST['other_charges'];
		$total_guest = $_POST['total_guest'];	
		$total_amount = ($total_guest)*999;
		$orderno = $_POST['orderno'];
		$other_charges = $_POST['other_charges'];
		$total_gross =($other_charges + $total_amount);
		$gross = $total_gross;
		
		
					
		$query = "UPDATE order_master_tab SET TOTAL_CHARGES = '$gross', EDITED_ID = '$created_id', EDITED_ON = '$date_time' WHERE ORDER_NO = '$orderno'";
mysql_query($query) or die('Insertion Failed:'.mysql_error());
			
			*/
			
			echo ' <table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
<tr height="3%">
    <td>Other Charges :</td>
    <td><input type="text" name="other_charges" id="other_charges"></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

    <tr align="center">                    
    <td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
    <td align="right" width="250" valign="bottom"><input type="button" onclick="confirm_order_new('.$orderno.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Confirm" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Cancel"></td>
  </tr>
  <input type="hidden" id="orderno" name="orderno" value="'.$orderno.'" />
  <input type="hidden" id="gross" name="gross" value="'.$total_amount.'" />
  </table>
  </form>';
  /*
  echo '<div id="confirm">
  <form>
  
  <table width="370" align="right" border="0" cellpadding="0" cellspacing="0">
  <tr align="center">                    
    <td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
    <td align="right" width="250" valign="bottom"><input type="button" onclick="confirm_order('.$orderno.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Confirm" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Cancel"></td>
  </tr>
  <input type="hidden" id="order_no" name="order_no" value="'.$orderno.'" />
  </table>
  
  </form>
  </div>';
  */
  
?>