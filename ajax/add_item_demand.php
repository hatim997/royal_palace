
<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$item_id = $_POST['item_id'];
	$item_name = $_POST['item_name'];
		$item_qty = $_POST['item_qty'];
		$date = $_POST['date'];
		$d_num = $_POST['d_num'];
		$dept = $_POST['dept'];
		
        $query0 = "SELECT max(SR_NO) FROM dept_generate_demand where DEMAND_NUM = '$d_num'";
	$result0 = mysql_query($query0);
	while($row0=mysql_fetch_array($result0))
  {
 
  $sr_no = $row0['max(SR_NO)']+1;
   } 
   $query =  "INSERT INTO dept_generate_demand(`SR_NO`, `DATE`, `DEPARTMENT`, `DEMAND_NUM`, `ITEM_CODE`, `ITEM_NAME`, `ITEM_QTY`) 
   										VALUES ('$sr_no', '$date', '$dept', '$d_num', '$item_id', '$item_name', '$item_qty')";
		  mysql_query($query) or die("Failed 3: ".mysql_error());     
		  ?>
          <?php
       $query1 = "SELECT * FROM dept_generate_demand where DEMAND_NUM = '$d_num'";
	$result1 = mysql_query($query1);
	
	  $query3 = "SELECT DEMAND_NUM,DATE,DEPARTMENT FROM dept_generate_demand where DEMAND_NUM = '$d_num'";
	$result3 = mysql_query($query3);
	$row3=mysql_fetch_array($result3);
?>
 <table width="540" frame="hsides">
<tr>
<td width="77">
Demand #
</td>
<td width="95"><?php echo $row3['DEMAND_NUM'];  ?></td>
<td width="39">
Date:
</td>
<td width="100"><?php echo $row3['DATE']; ?></td>
<td width="87">
Department
</td>
<td width="114"><?php echo $row3['DEPARTMENT'];  ?></td>
</tr>
</table>
<table width="543">
<tr style="background:#F30; font-size:14px; font-style:italic; color:#FFF;">
<td width="94" align="center"><strong>SR NO.</strong></td>
<td width="94" align="center"><strong>Item Code</strong></td>
	<td width="164" align="center"><strong>Item Name</strong></td>
    <td width="90" align="center"><strong>Item quantity</strong></td>
	<td width="77" align="center"><strong>Delete</strong></td>
</tr>
<?php
	while($row1=mysql_fetch_array($result1))
  {    
   ?>
<tr style="font-size:14px;">
<td width="94" align="center"><?php echo $row1['SR_NO']; ?></td>
<td width="94" align="center"><?php echo $row1['ITEM_CODE']; ?></td>
	<td width="164" align="justify"><?php echo $row1['ITEM_NAME']; ?></td>
    <td width="90" align="center"><?php echo $row1['ITEM_QTY']; ?></td>
	<td width="77" align="center"><a href="javascript:delete_item(<?php echo $row1['SR_NO'].",".$row1['DEMAND_NUM']; ?>)" alt="Delete" title="Delete">
					<img src="images/delete.png" height="15" width="15" alt="Delete" /></td>
</tr>
<?php } ?>
</table>