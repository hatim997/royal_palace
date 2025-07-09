<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php

	$value = $_POST['pid'];
	$type = $_POST['type'];

	?>
    <form name="form1" method="post" action="pool_charges.php">
    <table width="1005" border="0" >
	<?php
if($type == "id")
	{
		
$sql="SELECT CHARGES_ID, CHARGES_TYPE_ID, SWIMMING_CHARGES,
CHARGES_ON_DATE, CHARGES_OFF_DATE FROM pool_charges_plan WHERE CHARGES_ID ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="84" >Select </th>     
                <th  width="209" >Charges ID</th>
                <th width="215" >Charges Type</th>
                <th width="144" >Start Date</th>
                <th width="165" >End Date</th>
                <th width="162" >Charges Amount</th>               
              </tr>
       <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
    

             <?php  
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['CHARGES_ID']; ?>"></td>
			<?php
			 echo "<td>" . $row['CHARGES_ID'] . "</td>";
				$b_id=$row['CHARGES_TYPE_ID'];
			 $sql1="SELECT CHARGES_TITLE FROM pool_charges_type_tab WHERE CHARGES_TYPE_ID = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				echo "<td>" . $row1['CHARGES_TITLE'] . "</td>";
			 }
			 	
				echo "<td>" . $row['CHARGES_ON_DATE'] . "</td>";
		
              echo "<td>". $row['CHARGES_OFF_DATE'] ."</td>";
			 echo "<td>". $row['SWIMMING_CHARGES'] ."</td>";
				 
				echo "</tr>";
}?>
<tr>
<td width="84" valign="top">
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
$sql="SELECT CHARGES_ID, CHARGES_TYPE_ID, SWIMMING_CHARGES,
CHARGES_ON_DATE, CHARGES_OFF_DATE FROM pool_charges_plan WHERE CHARGES_TYPE_ID ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
               <tr style="background-color:#FFFFD2;">  
              <th  width="84" >Select </th>     
                <th  width="209" >Charges ID</th>
                <th width="215" >Charges Type</th>
                <th width="144" >Start Date</th>
                <th width="165" >End Date</th>
                <th width="162" >Charges Amount</th>

                
              </tr>
     


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  			  
            
<?php  
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['CHARGES_ID']; ?>"></td>
			<?php
			 echo "<td>" . $row['CHARGES_ID'] . "</td>";
				$b_id=$row['CHARGES_TYPE_ID'];
			 $sql1="SELECT CHARGES_TITLE FROM pool_charges_type_tab WHERE CHARGES_TYPE_ID = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				echo "<td>" . $row1['CHARGES_TITLE'] . "</td>";
			 }
			 	
				echo "<td>" . $row['CHARGES_ON_DATE'] . "</td>";
		
              echo "<td>". $row['CHARGES_OFF_DATE'] ."</td>";
			 echo "<td>". $row['SWIMMING_CHARGES'] ."</td>";
				 
				echo "</tr>";
}?>
<tr>
<td width="84" valign="top">
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