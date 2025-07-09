
<?php include('../config.php'); ?>
<?php include('../time_settings.php'); ?>
<?php
	
	$sr_no = $_POST['sr_no'];
		$d_num = $_POST['d_num'];		
        $query0 = "DELETE FROM dept_generate_demand where DEMAND_NUM = '$d_num' AND SR_NO = '$sr_no'";
	$result0 = mysql_query($query0);
	
       $query1 = "SELECT * FROM dept_generate_demand where DEMAND_NUM = '$d_num'";
	$result1 = mysql_query($query1);
$query3 = "SELECT DEMAND_NUM, DATE, DEPARTMENT FROM dept_generate_demand where DEMAND_NUM = '$d_num'";
	$result3 = mysql_query($query3);
	$row3=mysql_fetch_array($result3);
?>
 <table width="540" frame="hsides">
<tr>
<td width="77">
Demand #
</td>
<td width="58"><?php echo $row3['DEMAND_NUM']; ?></td>
<td width="64">
Date:
</td>
<td width="112"><?php echo $row3['DATE']; ?></td>
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