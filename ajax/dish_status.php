<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
$kitid = $_SESSION['kitid'];
?>
<?php

	$order = $_POST['orderno'];
	$dish_id = $_POST['dish'];
	$status = $_POST['status'];
	if($status == 1)
	{
		$query = "UPDATE order_history_tab SET DISH_STATUS = 'C' WHERE ORDER_NO = '$order' AND DISH_ID = '$dish_id'";
	}
	else if($status == 2)
	{
		$query = "UPDATE order_history_tab SET DISH_STATUS = 'R' WHERE ORDER_NO = '$order' AND DISH_ID = '$dish_id'";
	}
	else
	{
		$query = "UPDATE order_history_tab SET DISH_STATUS = 'S' WHERE ORDER_NO = '$order' AND DISH_ID = '$dish_id'";
	}
	mysql_query($query) or die('Insertion Failed:'.mysql_error());
	
	$cooking = 1;
	$ready = 2;
	$served = 3;
	$query = "SELECT order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,dish_master_tab.DISH_ID,
				dish_master_tab.DISH_NAME,dish_master_tab.DISH_SERVING,dish_master_tab.COOKING_TIME,
				food_type_tab.FOOD_TYPE_DETAIL,
				order_history_tab.DISH_QTY, order_history_tab.DISH_STATUS, order_history_tab.CREATED_ON 
				FROM order_master_tab, dish_master_tab, food_type_tab, order_history_tab 
				WHERE order_master_tab.ORDER_NO =  order_history_tab.ORDER_NO 
				AND order_history_tab.DISH_ID = dish_master_tab.DISH_ID 
				AND dish_master_tab.FOOD_TYPE_ID = food_type_tab.FOOD_TYPE_ID 
				AND order_master_tab.PAYMENT_FLAG = 'O' 
				AND order_master_tab.REST_ID = '$restid'
				AND order_master_tab.VISITED_DATE >= '$current_date'
				AND order_master_tab.VISITED_DATE <= '$current_date' 
				AND dish_master_tab.KITCHEN_ID = '$kitid' 
				ORDER BY order_master_tab.ORDER_NO, dish_master_tab.DISH_NAME ASC";
									
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_numrows($result1);
	if($num != 0)
	{
	echo '<div id="del_dish" align="center" style="overflow:auto; height:650px; width:980px">
              <table width="940" border="1" cellpadding="0" cellspacing="0" align="center">
                <thead>
                <tr>
					<td width="80" align="center"><strong>Order No</strong></td>
					<td width="80" align="center"><strong>Table No</strong></td>
					<td width="400" align="center"><strong>Dish</strong></td>
					<td width="80" align="center"><strong>Serving</strong></td>
					<td width="80" align="center"><strong>Quantity</strong></td>
					<td width="80" align="center"><strong>Order Time</strong></td>
					<td width="80" align="center"><strong>Cooking Time</strong></td>
					<td width="80" align="center"><strong>Serving Time</strong></td>
					<td width="100" align="center"><strong>Current Status</strong></td>
					<td width="90" align="center"><strong>Update Status</strong></td>
                </tr>
                </thead>';
			$i=0;
			while($i < $num)
			{
				$orderno = mysql_result($result1,$i, "order_master_tab.ORDER_NO" );
				$tableno = mysql_result($result1,$i, "order_master_tab.TABLE_NO" );
				//$f = mysql_result($result1,$i, "food_type_tab.FOOD_TYPE_DETAIL" );
				$di = mysql_result($result1,$i, "dish_master_tab.DISH_ID" );
				$d = mysql_result($result1,$i, "dish_master_tab.DISH_NAME" );
				$s = mysql_result($result1,$i, "dish_master_tab.DISH_SERVING" );
				$t = mysql_result($result1,$i, "dish_master_tab.COOKING_TIME" );
				$q = mysql_result($result1,$i, "order_history_tab.DISH_QTY" );
				$status = mysql_result($result1,$i, "order_history_tab.DISH_STATUS" );
				$created_on = mysql_result($result1,$i, "order_history_tab.CREATED_ON" );
				$order_time = explode(" ",$created_on);
				$otime = $order_time[1];
				$time = explode(":", $otime);
				$ctime = explode(":", $t);
				/*
				$a = 0;
				while($a < count($ctime))
				{
					$stime[$a] = $time[$a] + $ctime[$a];
					$a++;
				}
				$served_time = $stime[0].":".$stime[1].":".$stime[2];
				*/
				if($otime > $t)
				{
					//$served_time = "Lesser";
				}
				else
				{
					//$served_time = "Greater";
				}
				
				$served_time = date("H:i:s", mktime($time[0]+$ctime[0], $time[1]+$ctime[1], $time[2]+$ctime[2], 0, 0, 0));
				if($status == "O")
			  	{
				  	if($served_time < $current_time)
					{
						echo '<tr>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$orderno.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$tableno.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;"width="400" align="left"><strong>&nbsp;'.$d.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$s.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$q.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$otime.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$t.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$served_time.'</strong></td>
					<td width="100" align="left">&nbsp;Ordered</td>
						<td width="90" align="left"><input type="button" onclick="dish_status('.$orderno.','.$di.','.$cooking.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Cooking" /></td>  
				  </tr>';
					}
					else
					{
						echo '<tr>
						<td width="80" align="left">&nbsp;'.$orderno.'</td>
						<td width="80" align="left">&nbsp;'.$tableno.'</td>
						<td width="400" align="left">&nbsp;'.$d.'</td>                            
						<td width="80" align="left">&nbsp;'.$s.'</td>
						<td width="80" align="left">&nbsp;'.$q.'</td>
						<td width="80" align="left">&nbsp;'.$otime.'</td>
						<td width="80" align="left">&nbsp;'.$t.'</td>
						<td width="80" align="left">&nbsp;'.$served_time.'</td>
						<td width="100" align="left">&nbsp;Ordered</td>
						<td width="90" align="left"><input type="button" onclick="dish_status('.$orderno.','.$di.','.$cooking.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Cooking" /></td>  
					  </tr>';
					}
				}
				else if($status == "C")
			  	{
				  	if($served_time < $current_time)
					{
						echo '<tr>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$orderno.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$tableno.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;"width="400" align="left"><strong>&nbsp;'.$d.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$s.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$q.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$otime.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$t.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$served_time.'</strong></td>
					<td style="color:#0000FF" width="100" align="left">&nbsp;Cooking</td>
						<td width="90" align="left"><input type="button" onclick="dish_status('.$orderno.','.$di.','.$ready.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Ready" /></td>  
				  </tr>';
					}
					else
					{
						echo '<tr>
						<td style="color:#0000FF" width="80" align="left">&nbsp;'.$orderno.'</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;'.$tableno.'</td>
						<td style="color:#0000FF" width="400" align="left">&nbsp;'.$d.'</td>                            
						<td style="color:#0000FF" width="80" align="left">&nbsp;'.$s.'</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;'.$q.'</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;'.$otime.'</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;'.$t.'</td>
						<td style="color:#0000FF" width="80" align="left">&nbsp;'.$served_time.'</td>
						<td style="color:#0000FF" width="100" align="left">&nbsp;Cooking</td>
						<td width="90" align="left"><input type="button" onclick="dish_status('.$orderno.','.$di.','.$ready.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Ready" /></td>  
					  </tr>';
					}
				}
				else if($status == "R")
				{
					if($served_time < $current_time)
					{
						echo '<tr>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$orderno.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$tableno.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;"width="400" align="left"><strong>&nbsp;'.$d.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$s.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$q.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$otime.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$t.'</strong></td>
					<td style="color:#FF0000" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$served_time.'</strong></td>
					<td style="color:#800080" width="100" align="left">&nbsp;Ready</td>
						<td width="90" align="left"><input type="button" onclick="dish_status('.$orderno.','.$di.','.$served.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Served" /></td>  
				  </tr>';
					}
					else
					{
						echo '<tr>
						<td style="color:#800080" width="80" align="left">&nbsp;'.$orderno.'</td>
						<td style="color:#800080" width="80" align="left">&nbsp;'.$tableno.'</td>
						<td style="color:#800080" width="400" align="left">&nbsp;'.$d.'</td>                            
						<td style="color:#800080" width="80" align="left">&nbsp;'.$s.'</td>
						<td style="color:#800080" width="80" align="left">&nbsp;'.$q.'</td>
						<td style="color:#800080" width="80" align="left">&nbsp;'.$otime.'</td>
						<td style="color:#800080" width="80" align="left">&nbsp;'.$t.'</td>
						<td style="color:#800080" width="80" align="left">&nbsp;'.$served_time.'</td>
						<td style="color:#800080" width="100" align="left">&nbsp;Ready</td>
						<td width="90" align="left"><input type="button" onclick="dish_status('.$orderno.','.$di.','.$served.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Served" /></td>  
					  </tr>';
					}
				}
				else
				{
					echo '<tr>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$orderno.'</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$tableno.'</strong></td>
					<td style="color:#007236" style=" font-size:14px;"width="400" align="left"><strong>&nbsp;'.$d.'</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$s.'</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$q.'</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$otime.'</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$t.'</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="80" align="left"><strong>&nbsp;'.$served_time.'</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="100" align="left"><strong>&nbsp;Served</strong></td>
					<td style="color:#007236" style=" font-size:14px;" width="90" align="left"><strong>&nbsp;Served</strong></td>  
				  </tr>';
				}
				$i++;
			} // while ends here
			echo '</table></div>';
	} // if ends here
	else
	{
		echo '<h1 class="style1" style=" font-size:14px;">No dish for Order</h1>';	
	}
?>