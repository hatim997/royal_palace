<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php

	$value = $_POST['pid'];
	$type = $_POST['type'];

	?>
    <form name="form1" method="post" action="gym_token.php">
    <table width="1005" border="0" >
	<?php
if($type == "id")
	{
		
$sql="SELECT * FROM gym_payment_token WHERE TOKEN_ID = '$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="67" >Select </th>     
                <th  width="174" >Token ID</th>
                <th width="177" >Membership ID</th>
                <th width="119" >Gym Type</th>
                <th width="136" >Charges</th>
                <th width="131" >Status</th>

              </tr>
     


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
    

             <?php  
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['TOKEN_ID']; ?>"></td>
			<?php
			echo "<td>" . $row['TOKEN_ID'] ."</td>";
			 echo "<td>" . $row['MEMBERSHIP_ID'] ."</td>";


				$b_id=$row['GYM_TYPE_ID'];
			 $sql1="SELECT * FROM gym_type_tab WHERE GYM_TYPE_ID = '$b_id'";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				echo "<td>" . $row1['GYM_TYPE_TITLE'] . "</td>";
			 }
			 
			 
			 
			 
			 	$c_id=$row['CHARGES_ID'];
			 $sql2="SELECT * FROM gym_charges_plan WHERE CHARGES_ID = '$c_id'";
			 $result2= mysql_query($sql2);
			 while($row2=mysql_fetch_array($result2))
			 {
				echo "<td>" . $row2['GYM_CHARGES'] . "</td>";
			 }

				
             $charge_flag = $row['CHARGES_FLAG'];
if ($charge_flag == "P")
{
	echo "<td>". "Paid"."</td>";
}
else if ($charge_flag == "U")
{
	echo "<td>". "Unpaid"."</td>";
}
else if ($charge_flag == "B")
{
	echo "<td>". "Bill to room"."</td>";
}
else if ($charge_flag == "C")
{
	echo "<td>". "Complementry"."</td>";
}
				 
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
if($type == "m_id")
	{
$sql="SELECT * FROM gym_payment_token WHERE MEMBERSHIP_ID ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="67" >Select </th>     
                <th  width="174" >Token ID</th>
                <th width="177" >Membership ID</th>
                <th width="119" >Gym Type</th>
                <th width="136" >Charges</th>
                <th width="131" >Status</th>

              </tr>


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  			  
            
                          <?php  
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['TOKEN_ID']; ?>"></td>
			<?php
			echo "<td>" . $row['TOKEN_ID'] ."</td>";
			 echo "<td>" . $row['MEMBERSHIP_ID'] . "</td>";
			 
				$b_id=$row['GYM_TYPE_ID'];
			 $sql1="SELECT * FROM gym_type_tab WHERE GYM_TYPE_ID = '$b_id'";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				echo "<td>" . $row1['GYM_TYPE_TITLE'] . "</td>";
			 }
			 
			 	$c_id=$row['CHARGES_ID'];
			 $sql2="SELECT * FROM gym_charges_plan WHERE CHARGES_ID = '$c_id'";
			 $result2= mysql_query($sql2);
			 while($row2=mysql_fetch_array($result2))
			 {
				echo "<td>" . $row2['GYM_CHARGES'] . "</td>";
			 }
				  
             $charge_flag = $row['CHARGES_FLAG'];
if ($charge_flag == "P")
{
	echo "<td>". "Paid"."</td>";
}
else if ($charge_flag == "U")
{
	echo "<td>". "Unpaid"."</td>";
}
else if ($charge_flag == "B")
{
	echo "<td>". "Bill to room"."</td>";
}
else if ($charge_flag == "C")
{
	echo "<td>". "Complementry"."</td>";
}
				 
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