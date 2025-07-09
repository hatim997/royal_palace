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
	$table_id = $_POST['table_id'];
	$total_guests = $_POST['total_guests'];
	$query = "SELECT MAX(ORDER_NO) FROM order_master_tab"; 
	 
$result = mysql_query($query) or die(mysql_error());

// Print out result
while($row = mysql_fetch_array($result)){
	$order_no=$row['MAX(ORDER_NO)'];
}	
$order_no++;
	$query2 = "INSERT INTO order_master_tab (REST_ID, ORDER_NO, TABLE_NO, NO_OF_GUEST, GUEST_ID, VISITED_DATE, VISITED_TIME, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		  			 VALUES('$restid', '$order_no', '$table_id', '$total_guests', '1', '$current_date', '$current_time', '$created_id', '$date_time', '$created_id', '$date_time')";
		  mysql_query($query2) or die("Failed 2: ".mysql_error());
		  
	?>
    
<div id="master" align="center">
            <!--
            <table width="1200" align="center" cellspacing="0" cellpadding="0" border="1">
  <tr>
  	<td width="1200" style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Order Taking</i></b></td>
  </tr>
  </table>
  -->
  <table width="1200" align="center" border="1" cellspacing="0" cellpadding="0">
  <thead style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
    <td align="center" width="596"><b>Tables</b></td>
    <td align="center"  width="596"><b>Dishes</b></td>
  </thead>
  <tr>
    <td>
        <div id="tables" style="width:596px; height:280px; overflow: auto;">
        <table width="590" align="center" border="0" cellspacing="0" cellpadding="0">
        
      <?php
			
			$query = "SELECT * FROM tables_tab ORDER BY TABLE_NO ASC";
			$result = mysql_query($query);
			$num1 = mysql_num_rows($result);
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
			$num = mysql_num_rows($result2);
			if ($num==0)
			{
				
				
				echo "<td height='50px' align='center'>"; 
				echo '<a class="table" href="#" alt="Table" title="Table"><img width="55" height="45" SRC="images/table.png" alt="Table" border="0" />';
				echo '<font style="font-size:18px;">';
				echo '<br>'.$table_no;
				echo '</font>';
				 echo '</a>';
				 echo "</td>";
				
			}
			else
			{
				echo "<td height='50px' align='center'>"; 
				echo '<a class="table" href="#" alt="Table" title="Table"><img width="65" height="55" SRC="images/table_booked.png" alt="Table" border="0" />';
				echo '<font style="font-size:18px;">';
				echo '<br>'.$table_no;
				echo '</font>';
				 echo '</a>';
				 echo "</td>";
				 
			}
				 
				
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
			$num2 = mysql_num_rows($result2);
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
			$num3 = mysql_num_rows($result3);
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
    	
        <div id="order" style="width:945px; height:200px; overflow: auto;">
        <table width="940" height="196" border="0" >
        <tr>
        <td align="center">
        <table width="377">
        <tr>
        <td width="207">
          <input type="hidden" name="order_no" id="order_no" value="<?php echo $order_no; ?>" />
          <font color="#3A438F" size="+3">
          Place your order!
          </font>
          </td>
          </tr>
          </table>
          </td>
          </tr>
          </table>
          
          </div>
    </td>
  </tr>
  </table>
          </div>
</body>
</html>