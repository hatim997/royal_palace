<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
//$restid = $_SESSION['restid'];
//$kit_id = $_SESSION['kitid'];
?>
<?php
	$date = $_POST['date'];
	$edate = $date;
	$st_date = explode("-", $edate); ?>

 <table width="800" border="0" cellpadding="0" cellspacing="0" style="">    
<tr>
  <th width="181" valign="top" style="text-align: justify"><div align="center">Lunch</div></th>
  <td width="619" style="text-align: justify"><div align="left">
  

    <?php 

$query1 = "SELECT BANQ_ID, BANQ_NAME FROM banq_master_tab";
$result1 = mysql_query($query1) or die ('Query failed!'.mysql_error());
$num1 = mysql_num_rows($result1);
			//echo $num1."<br>";
//while($row1 = mysql_fetch_array($result))
//{
while($row = mysql_fetch_array($result1))
{
$id=$row['BANQ_ID'];
$query2 = "SELECT * FROM banq_order_master WHERE BANQ_ID = '$id' AND FUNCTION_DATE = '$date' AND TIME_FROM = '12:00:00'";									
$result2 = mysql_query($query2) or die ('Query failed!'.mysql_error());	
$row2 = mysql_fetch_array($result2);
$num2 = mysql_num_rows($result2);
if($row['BANQ_ID']==$row2['BANQ_ID'])
{
if($row2['BOOKING_STATUS']=='B' && ($row2['TIME_FROM']=='12:00:00' && $row2['TIME_TO']=='17:00:00'))
{
	$f_id = $row2['ORDER_NO'];
	$query3 = "SELECT count(*) FROM banq_order_master WHERE ORDER_NO = '$f_id'";									
$result3 = mysql_query($query3) or die ('Query failed!'.mysql_error());	
$row3 = mysql_fetch_array($result3);
$cc=$row3['count(*)'];

if ($cc== "1")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#F00;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "2")
{

?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#66F;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "3")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#363;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "4")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#09F;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc >= "5")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#FF0;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
} 
else if($row2['BOOKING_STATUS']== 'T' && ($row2['TIME_FROM']=='12:00:00' && $row2['TIME_TO']=='17:00:00'))
{
?>

    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#F9C;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php  
}
else	
{?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name= $row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php  
}	
}
else{?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php  }
	
}?><p></p>
  </div></td></tr>
  
  <tr>
  <th width="181" valign="top" style="text-align: justify"><div align="center">Dinner</div></th>
  <td style="text-align: justify"><div align="left">
    <?php
	
$result1 = mysql_query($query1) or die ('Query failed!'.mysql_error());
while($row = mysql_fetch_array($result1))
{
$id=$row['BANQ_ID'];
$query2 = "SELECT * FROM banq_order_master WHERE BANQ_ID = '$id' AND FUNCTION_DATE = '$date' AND TIME_FROM = '18:00:00'";									
$result2 = mysql_query($query2) or die ('Query failed!'.mysql_error());	
$row2 = mysql_fetch_array($result2);
$num2 = mysql_num_rows($result2);
if($row['BANQ_ID']==$row2['BANQ_ID'])
{
if($row2['BOOKING_STATUS']=='B' && ($row2['TIME_FROM']=='18:00:00' && $row2['TIME_TO']=='23:00:00'))
{
$f_id = $row2['ORDER_NO'];
	$query3 = "SELECT count(*) FROM banq_order_master WHERE ORDER_NO = '$f_id'";									
$result3 = mysql_query($query3) or die ('Query failed!'.mysql_error());	
$row3 = mysql_fetch_array($result3);
$cc=$row3['count(*)'];

if ($cc== "1")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#F00;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "2")
{

?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#66F;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "3")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#363;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc== "4")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#09F;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
}
else if ($cc >= "5")
{
?>
    <input name="<?php echo $id=$row['BANQ_ID']; ?>" id="button1" type="submit" value="<?php echo $name=$row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#FF0;" class="box1" onclick="buttonA_clickHandler();"/>
    <?php 
} } 
else if($row2['BOOKING_STATUS']== 'T' && ($row2['TIME_FROM']=='18:00:00' && $row2['TIME_TO']=='23:00:00'))
{
?>

    <input name="<?php echo $row['BANQ_ID']; ?>" id="button" type="submit" value="<?php echo $row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium; background-color:#F9C;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php  }
else	{?>
    <input name="<?php echo $row['BANQ_ID']; ?>" id="button" type="submit" value="<?php echo $row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php  }	
	}
else	
{?>
    <input name="<?php echo $row['BANQ_ID']; ?>" id="button" type="submit" value="<?php echo $row['BANQ_NAME'];?>" 
    style= " font-weight:900; border-width: medium;" class="box1" onclick="buttonB_clickHandler();"/>
    <?php  }
	
	}?>
  </div></td></tr>
</table>    

      <!-- start of right column --><!-- end of right column -->
    
