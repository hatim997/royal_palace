<?php include('../config.php');	
	
		if(isset($_POST['guest']))
		{
			$queryString = $_POST['guest'];
			//echo "Value is ".$queryString;
			if(strlen($queryString) >0)
			{
				$query = "SELECT order_master_tab.ORDER_NO, order_master_tab.TABLE_NO, 
							order_master_tab.VISITED_DATE, order_master_tab.VISITED_TIME, 
							guest_master_tab.GUEST_NAME 
							FROM order_master_tab, guest_master_tab 
							WHERE order_master_tab.GUEST_ID = guest_master_tab.GUEST_ID 
							AND order_master_tab.TABLE_NO LIKE '$queryString%' 
							AND order_master_tab.PAYMENT_FLAG LIKE 'O' LIMIT 10";
				$result = mysql_query($query) or die("Failed: ".mysql_error());
				
				if(mysql_num_rows($result) != 0)
				{
					$num = mysql_num_rows($result);
					echo '<div id="del_dish" align="center" style="overflow:auto; height:250px; width:580px">
					  <table width="560" border="1" cellpadding="0" cellspacing="0" align="center">
						<thead>
						<tr>
							<td width="80" align="center"><strong>Order No</strong></td>
							<td width="80" align="center"><strong>Table No</strong></td>
							<td width="200" align="center"><strong>Guest Name</strong></td>
							<td width="100" align="center"><strong>Visit Date</strong></td>
							<td width="100" align="center"><strong>Visit Time</strong></td>
						</tr>
						</thead>';
					$i = 0;
					while ($i < $num)
					{
						$name = mysql_result($result,$i, "guest_master_tab.GUEST_NAME" );
						$orderno = mysql_result($result,$i, "order_master_tab.ORDER_NO" );
						$tableno = mysql_result($result,$i, "order_master_tab.TABLE_NO" );
						$date = mysql_result($result,$i, "order_master_tab.VISITED_DATE" );
						$time = mysql_result($result,$i, "order_master_tab.VISITED_TIME" );
						
						echo '<a href="javascript:show_order_detail('.$orderno.')"><tr>
							<td width="80" align="left">&nbsp;'.$orderno.'</td>
							<td width="80" align="left">&nbsp;'.$tableno.'</td>
							<td width="200" align="left">&nbsp;'.$name.'</td>
							<td width="100" align="left">&nbsp;'.$date.'</td>                            
							<td width="100" align="left">&nbsp;'.$time.'</td>
							</tr></a>';
						//echo '<li>'.$name.'</li>';
						$i++;
	         		}
				} 
				else
				{
					echo 'There is no such Record. and value is '.$queryString;
					
				}
			} 
			else
			{
				// Dont do anything.
			} // There is a queryString.
		}
		else
		{
			echo 'There should be no direct access to this script!';
		}
	//}
?>