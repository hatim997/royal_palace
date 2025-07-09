<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
$kit_id = $_SESSION['kitid'];
?>
<?php

	$query = "SELECT order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,order_master_tab.NO_OF_GUEST,
				guest_master_tab.GUEST_ID,guest_master_tab.GUEST_NAME
				FROM order_master_tab, guest_master_tab 
				WHERE order_master_tab.GUEST_ID =  guest_master_tab.GUEST_ID 
				AND order_master_tab.PAYMENT_FLAG = 'O' 
				AND order_master_tab.REST_ID = '$restid' 
				ORDER BY order_master_tab.ORDER_NO ASC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	if($num != 0)
	{
	echo '<div id="del_dish" align="center" style="overflow:auto; height:300px; width:940px">
              <table width="910" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="80" align="center"><strong>Order No</strong></td>
					<td width="80" align="center"><strong>Table No</strong></td>
					<td width="400" align="center"><strong>Guest</strong></td>
					<td width="80" align="center"><strong>No of Guests</strong></td>
					<td width="80" align="center"><strong>Details</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$orderno = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
				$tableno = mysql_result($result1,$i, "order_master_tab.TABLE_NO" );
				//$f = mysql_result($result1,$i, "food_type_tab.FOOD_TYPE_DETAIL" );
				$gid = mysql_result($result1,$i, "guest_master_tab.GUEST_ID" );
				$name = mysql_result($result1,$i, "guest_master_tab.GUEST_NAME" );
				$g_no = mysql_result($result1,$i, "order_master_tab.NO_OF_GUEST" );
				echo '<tr>
					<td width="80" align="left">&nbsp;'.$orderno.'</td>
					<td width="80" align="left">&nbsp;'.$tableno.'</td>
					<td width="400" align="left">&nbsp;'.$name.'</td>                            
					<td width="80" align="left">&nbsp;'.$g_no.'</td>
					<td width="90" align="center"><a href="javascript:order_details('.$orderno.','.$gid.')" alt="Details" title="Details"><img src="images/Details.png" height="35" width="90" alt="Details" /></a></td>  
				  </tr>';
				$i++;
			} // while ends here
			echo '</table></div><br><br><br><br>';
	} // if ends here
	else
	{
		echo '<h1 class="style1" style=" font-size:14px;">Currently no order in Progress</h1>';
	}
?>