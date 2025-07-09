<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
$kitid = $_SESSION['kitid'];
?>
<?php

	$order = $_POST['orderno'];
	$query = "UPDATE order_history_tab SET DISH_STATUS = 'S' WHERE ORDER_NO = '$order'";
	mysql_query($query) or die('Insertion Failed:'.mysql_error());
	
	$query = "SELECT * FROM order_master_tab 
				WHERE PAYMENT_FLAG = 'O' 
				AND REST_ID = '$restid'
				AND VISITED_DATE = '$current_date'
				ORDER BY ORDER_NO DESC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	//echo $num;
	if($num != 0)
	{
	echo '<div id="del_dish" align="center" style="overflow:auto; height:650px; width:530px">
              <table width="500" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="80" align="center"><strong>Order No</strong></td>
					<td width="80" align="center"><strong>Table No</strong></td>
					<td width="90" align="center"><strong>No Of Guests</strong></td>
					<td width="90" align="center"><strong>Visit Time</strong></td>
					<td width="90" align="center"><strong>Status</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$orderno = mysql_result($result1,$i, "ORDER_NO" );
				$query = "SELECT * FROM order_history_tab WHERE ORDER_NO = '$orderno' AND DISH_STATUS != 'S' ORDER BY ORDER_NO DESC";
				$res = mysql_query($query) or die ('Query failed!'.mysql_error());
				$num_row = mysql_num_rows($res);
				if($num_row == 0)
				{
					
				}
				else
				{
					$tableno = mysql_result($result1,$i, "TABLE_NO" );
					$nog = mysql_result($result1,$i, "NO_OF_GUEST" );
					$vtime = mysql_result($result1,$i, "VISITED_TIME" );
					echo '<tr>
						<td width="80" align="center">'.$orderno.'</td>
						<td width="80" align="center">'.$tableno.'</td>
						<td width="90" align="center">'.$nog.'</td>
						<td width="90" align="center">'.$vtime.'</td>
						<td width="90" align="center"><input type="button" onclick="dish_status('.$orderno.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Served" /></td>  
					  </tr>';
				}
				$i++;
			} // while ends here
			echo '</table></div>';
	} // if ends here
	else
	{
		echo '<h1 class="style1" style=" font-size:14px;">No Order</h1>';	
	}
	
?>