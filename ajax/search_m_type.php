<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php

	$value = $_POST['pid'];
	$type = $_POST['type'];

	?>
    <form name="form1" method="post" action="pool_mem_type.php">
    <table width="1005" border="0" >
	<?php
if($type == "id")
	{
		
$sql="SELECT * FROM pool_membership_period_tab WHERE MEMBER_PERIOD_ID ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="67" >Select </th>     
                <th  width="174" >Membership Type ID</th>
                <th width="177" >Membership Type Title</th>
              </tr>
     


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
    

             <?php  
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['MEMBER_PERIOD_ID']; ?>" ></td>
			<?php
			 
			 echo "<td>" . $row['MEMBER_PERIOD_ID'] . "</td>";
				 echo "<td>" . $row['MEMBER_PERIOD_TITLE'] . "</td>";
				 
				echo "</tr>";
}?>
<tr>
<td width="67" valign="top">
<input  name="view" type="submit" value="View" style="background: #FFFFD2; font-size:14px; font-weight:500; border:groove; border-color:#CCC;">

  </td>
  </tr>
<?php
}
	else
	{
echo "No such record exists";
	}
?>
<?php
	}
?>
	<?php
if($type == "name")
	{
$sql="SELECT * FROM pool_membership_period_tab WHERE MEMBER_PERIOD_TITLE ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
             <tr style="background-color:#FFFFD2;">  
              <th  width="67" >Select </th>     
                <th  width="174" >Membership Type ID</th>
                <th width="177" >Membership Type Title</th>
              </tr>
     


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  			  
            
             <?php  
		  
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['MEMBER_PERIOD_ID']; ?>" ></td>
			<?php
			 
			 echo "<td>" . $row['MEMBER_PERIOD_ID'] . "</td>";
				 echo "<td>" . $row['MEMBER_PERIOD_TITLE'] . "</td>";
				 
				echo "</tr>";
}?>
<tr>
<td width="67" valign="top">
<input  name="view" type="submit" value="View" style="background: #FFFFD2; font-size:14px; font-weight:500; border:groove; border-color:#CCC;">

  </td>
  </tr>

<?php
}
else
	{
echo "No such record exists";
	}
?>

<?php
	}
?>
	
</table>
</form>