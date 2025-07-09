<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<!-- Javascript goes in the document HEAD -->



<!-- CSS goes in the document HEAD or added to your external stylesheet -->



<body>

<?php include('../config.php');
include('../time_settings.php'); ?>
<?php

	$created_id = $_SESSION['username'];
	$restid = $_SESSION['restid'];
	$dishid = $_POST['dish_id'];
	$dish_qty = $_POST['dish_qty'];	
	$order_no = $_POST['order_no'];
	$dish_name = $_POST['dish_name'];
	$dish_charges = $_POST['dish_charges'];
	
	$query2 = "INSERT INTO order_history_tab (REST_ID, ORDER_NO, DISH_ID, DISH_CHARGES_ID,DISH_QTY, DISH_STATUS, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		  			 VALUES('$restid', '$order_no', '$dishid', '$dish_charges', '$dish_qty', 'O', '$created_id', '$date_time', '$created_id', '$date_time')";
		  mysql_query($query2) or die("Failed 2: ".mysql_error());
		  $query = "SELECT * FROM order_master_tab where ORDER_NO='$order_no'";
			$result = mysql_query($query);
			$num1 = mysql_numrows($result);
			$i = 0;
			while($i < $num1)
			{
				$table_no = mysql_result($result,$i, "TABLE_NO" );			
				$i++;
			}
    
	?>
   
<div id="master">
            <!--
            <table width="1200" cellspacing="0" cellpadding="0" border="1">
  <tr>
  	<td width="1200" style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Order Taking</i></b></td>
  </tr>
  </table>
  -->
  <table width="1200" align="center" border="1" cellspacing="0" cellpadding="0">
  <thead style="background:#2083AC; font-style:italic; color:#FFF;">
    <td align="center" width="596"><b>Tables</b></td>
    <td align="center"  width="596"><b>Dishes </b></td>
  </thead>  
  <tr>
    <td>
        <div id="tables" style="width:596px; height:280px; overflow: auto;">
        <table width="590" align="center" border="0" cellspacing="0" cellpadding="0">
        
      <?php
			
			$query = "SELECT * FROM tables_tab ORDER BY TABLE_NO ASC";
			$result = mysql_query($query);
			$num1 = mysql_numrows($result);
			$i = 0;
			
			while($i < $num1)
			{
				$table_id = mysql_result($result,$i, "TABLE_ID" );
				$table_no = mysql_result($result,$i, "TABLE_NO" );
				if($i % 6 == 0) echo '<tr>';
				echo "<td height='50px' align='center'>";
				$query2 = "SELECT * FROM order_master_tab where TABLE_NO='$table_id'
			AND PAYMENT_FLAG=' '
			AND CREATED_ON like '$current_date%'";
			$result2 = mysql_query($query2);
			$num = mysql_numrows($result2);
			if ($num==0)
			{
				echo '<a class="table2" href="#" alt="Table" title="Table"><table border="0"><tr><td><img width="60" height="60" SRC="images/table.png" alt="Table"/></td></tr>';
				echo '<font style="font-size:16px;">';
				echo '<tr><td align="center" class="highlight2">'.$table_no.'</td></tr></table>';
				echo '</font>';
				echo '</a>';
			}
			else
			{
				 echo '<a class="table2" href="#" alt="Table" title="Table"><table border="0"><tr><td><img width="60" height="60" SRC="images/table.png" alt="Table"/></td></tr>';
				echo '<font style="font-size:16px; color="#FFFFFF"">';
				echo '<tr><td align="center" class="highlight">'.$table_no.'</td></tr></table>';
				echo '</font>';
				 echo '</a>';
				 
			}
				 
				 echo "</td>";
				
				$i++;
				if($i % 6 == 0) echo '</tr>';
			}
			//onclick="return false" 
		?>
        </table>
        </div>
    </td>
    <td>
         <div id="dishes" style="width:596px; height:280px; overflow: auto;">
        <table width="590" align="center" border="0" cellspacing="0" cellpadding="0">
        
       <?php
			
			$query2 = "SELECT * FROM food_type_tab ORDER BY FOOD_TYPE_DETAIL ASC";
			$result2 = mysql_query($query2);
			$num2 = mysql_numrows($result2);
			$i = 0;
			
			echo "<tr valign='top'>";
			while($i < $num1)
			{
				$food_type_id = mysql_result($result2,$i, "FOOD_TYPE_ID" );
				$food_type_detail = mysql_result($result2,$i, "FOOD_TYPE_DETAIL" );
				echo "<td align='left' style='font-size:16px; color:#2083AC;' >";
				
				echo '<table border="0" >';
				echo '<tr>';
				echo '<td class="padding1">';
				echo $food_type_detail;	
				echo '</td>';
				echo '</tr>'; 
				echo '</table>';
        $query3 = "SELECT * FROM dish_master_tab where FOOD_TYPE_ID='$food_type_id'";
			$result3 = mysql_query($query3);
			$num3 = mysql_numrows($result3);
			$j = 0;
			echo "<table border='0' width='200' style='background:#FFF; font-size:14px; font-style:italic; color:#FFF;' >";
			
			while($j < $num3)
			{
				$food_id = mysql_result($result3,$j, "FOOD_TYPE_ID" );
				$dish_name = mysql_result($result3,$j, "DISH_NAME" );
				$dish_id = mysql_result($result3,$j, "DISH_ID" );
				echo "<tr>";
				echo "<td class='padding1'>"; 
				echo '<a class="dishes" href="javascript:add_orders('.$dish_id.')" alt="Dish" title="Dish" >'; 
				echo $dish_name.'</a>'; 
				echo "</td>";
				
				echo "</tr>";
				$j++;
			}
			
				echo "</table>";
      
				echo "</td>";
				
				$i++;
			}
			echo "</tr>";
			
		?>
        </table>
        </div>
    </td>
  </tr>
  <!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
</table>

<table width="1200" align="center" cellspacing="0" cellpadding="0" BORDER=1 RULES=NONE FRAME=BOX>
  <tr>
  	<td width="1200" align="center">
    	
        <div id="order" style="width:1198px; height:200px; overflow: auto;">
          <table width="1180" border="0">
          <tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
          <td align="center" width="30" height="30">
          Sr. No.
          </td>
          <td align="center" width="230" height="30">
          Dish Name
          </td>
          <td align="center" width="70">
          Unit Price
          </td>
          <td align="center" width="70">
          Quantity
          </td>
          <td align="center" width="70">
        Total Price
          </td>
          <td align="center" width="40">
        Edit
          </td>
          <td align="center" width="40">
        Delete
          </td>
          </tr>
         
          </table>
          
          <table class="altrowstable" id="alternatecolor"  width="1180" >
          <?php
	//AND dish_master_tab.DISH_ID = '$dish_id'
	$query1 = "SELECT order_history_tab.ORDER_NO, order_master_tab.ORDER_NO, order_master_tab.TABLE_NO,  order_history_tab.EDITED_ON, order_history_tab.DISH_CHARGES_ID, order_history_tab.DISH_QTY, order_history_tab.DISH_ID, dish_master_tab.DISH_ID, dish_master_tab.DISH_NAME
FROM order_history_tab,dish_master_tab, order_master_tab
WHERE dish_master_tab.DISH_ID = order_history_tab.DISH_ID
AND order_history_tab.ORDER_NO = '$order_no' 
AND order_master_tab.ORDER_NO = '$order_no'
ORDER BY order_history_tab.EDITED_ON ASC";
	
	//$query1 = "SELECT * FROM order_history_tab WHERE ORDER_NO = '$order_no'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$grand_total=0;
	$i=0;
	//while($row = mysql_fetch_array($image))
	while($i < $num1)
	{ 
		$j=$i+1;
		$order_no = mysql_result($result1,$i, "ORDER_NO" );
		$table = mysql_result($result1,$i, "TABLE_NO" );
		$dish = mysql_result($result1,$i, "DISH_NAME" );
		$dish_id = mysql_result($result1,$i, "DISH_ID" );
		$dish_charges = mysql_result($result1,$i, "DISH_CHARGES_ID" );
		$dish_qty = mysql_result($result1,$i, "DISH_QTY" );
		$total_price=$dish_charges*$dish_qty;
		$grand_total=$grand_total+$total_price; 
		 // while loop ends here	 
	echo "<tr>";
	echo "<td width='30px' align='center' height='10'>".$j."</td>";
	//echo "<td width='60px' align='center'>".$table."</td>";
echo "<td width='223px' align='left' class='padding1'>".$dish."</td>";
echo "<td width='70px' align='center'>".$dish_charges."</td>";
echo "<td width='70px' align='center'>".$dish_qty."</td>";
echo "<td width='70px' align='center'>".$total_price."</td>";

echo "<td width='40px' align='center'>"; echo '<a href="javascript:edit_dish_qty('.$order_no.','.$dish_qty.','.$dish_id.')" alt="Edit" title="Edit"><img width="25" height="25" SRC="images/edit_ing.png" alt="Edit" border="0"/>'; echo "</td>";
echo "<td width='40px' align='center'>"; echo '<a href="javascript:delete_dish_order('.$order_no.','.$dish_id.')" alt="Delete" title="Delete"><img width="22" height="22" SRC="images/remove.png" alt="Delete" border="0"/>'; echo "</td>";

echo "</tr>";
$i++;
	} 
	
	
	
?>
</table>
          
          
		  
		  
          <input type="hidden" name="order_no" id="order_no" value="<?php echo $order_no; ?>" />
          </div>
    </td>
  </tr>
  </table>
          </div>
          <div>
          <table width="1200" align="center" cellspacing="0" cellpadding="0" BORDER=1 RULES=NONE FRAME=BOX>
          <tr>
          
          <td class="padding1" width="106">Table Number:</td>
          <td height="20" class="padding1" align="left" width="116"><?php echo $table; ?></td>
          <td class="padding1" width="106">Order Number:</td>
          <td height="20" class="padding1" align="left" width="116"><?php echo $order_no; ?></td>
          <td class="padding1" width="106">Total Charges:</td>
          <td height="20" class="padding1" align="left" width="202">
          <?php echo $grand_total;
		  $query2 = "UPDATE order_master_tab SET TOTAL_CHARGES='$grand_total' WHERE ORDER_NO = '$order_no'";
	  $result2 = mysql_query($query2)or die("Failed :".mysql_error());
		   ?> Rs.   
          </td>
          <td class="padding1" width="127"><a href="javascript:save_order_flag(<?php echo $order_no; ?>)" alt="Save Order" title="Save Order"><img src="images/save1.png" alt="Save Order" border="0"/></a></td>
          <td height="20" class="padding1" align="left" width="303"><a href="javascript:cancel_order(<?php echo $order_no; ?>)" alt="Cancel Order" title="Cancel Order"><img src="images/cancel.png" alt="Cancel Order" border="0"/></a></td>
          </tr>
          </table>
          </div>
</body>
</html>