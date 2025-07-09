<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php

	$value = $_POST['pid'];
	$type = $_POST['type'];

	?>
    <form name="form1" method="post" action="pool_reg_form.php">
    <table width="1005" border="0" >
	<?php
if($type == "id")
	{
		
$sql="SELECT MEMBERSHIP_ID,FIRST_NAME, LAST_NAME, CNIC_NO, MOBILE_NO, MEMBER_PERIOD_ID, SWIMMER_TYPE_ID,   
	  PERIOD_FROM, PERIOD_TO FROM pool_membership_master_tab WHERE MEMBERSHIP_ID ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="67" >Select </th>     
                <th  width="174" >Member Name</th>
                <th width="177" >CNIC</th>
                <th width="119" >Mobile #</th>
                <th width="136" >Membership Type</th>
                <th width="131" >Swimmer Type</th>

                <th width="182">Membership Period</th>
              </tr>
     


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
    

             <?php  
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['MEMBERSHIP_ID']; ?>"></td>
			<?php
			 echo "<td>" . $row['FIRST_NAME'] ." ".$row['LAST_NAME']."</td>";
			 echo "<td>" . $row['CNIC_NO'] . "</td>";
				echo "<td>" . $row['MOBILE_NO'] . "</td>"; 
				$b_id=$row['MEMBER_PERIOD_ID'];
			 $sql1="SELECT * FROM POOL_MEMBERSHIP_PERIOD_TAB WHERE MEMBER_PERIOD_ID = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				echo "<td>" . $row1['MEMBER_PERIOD_TITLE'] . "</td>";
			 }
			 	$c_id=$row['SWIMMER_TYPE_ID'];
			 $sql2="SELECT * FROM SWIMMER_TYPE_TAB WHERE SWIMMER_TYPE_ID = $c_id";
			 $result2= mysql_query($sql2);
			 while($row2=mysql_fetch_array($result2))
			 {
				echo "<td>" . $row2['SWIMMER_TYPE_TITLE'] . "</td>";
			 }
				  
              echo "<td>". $row['PERIOD_FROM'] ." To ".$row['PERIOD_TO']."</td>";
			
				 
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
$sql="SELECT MEMBERSHIP_ID,FIRST_NAME, LAST_NAME, CNIC_NO, MOBILE_NO, MEMBER_PERIOD_ID, SWIMMER_TYPE_ID,   
	  PERIOD_FROM, PERIOD_TO FROM pool_membership_master_tab WHERE FIRST_NAME ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="67" >Select </th>     
                <th  width="174" >Member Name</th>
                <th width="177" >CNIC</th>
                <th width="119" >Mobile #</th>
                <th width="136" >Membership Type</th>
                <th width="131" >Swimmer Type</th>

                <th width="182">Membership Period</th>
              </tr>
     


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  			  
            
             <?php  
			
				 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['MEMBERSHIP_ID']; ?>"></td>
			<?php
			 echo "<td>" . $row['FIRST_NAME'] ." ".$row['LAST_NAME']."</td>";
			 echo "<td>" . $row['CNIC_NO'] . "</td>";
				echo "<td>" . $row['MOBILE_NO'] . "</td>"; 
				$b_id=$row['MEMBER_PERIOD_ID'];
			 $sql1="SELECT * FROM POOL_MEMBERSHIP_PERIOD_TAB WHERE MEMBER_PERIOD_ID = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				echo "<td>" . $row1['MEMBER_PERIOD_TITLE'] . "</td>";
			 }
			 	$c_id=$row['SWIMMER_TYPE_ID'];
			 $sql2="SELECT * FROM SWIMMER_TYPE_TAB WHERE SWIMMER_TYPE_ID = $c_id";
			 $result2= mysql_query($sql2);
			 while($row2=mysql_fetch_array($result2))
			 {
				echo "<td>" . $row2['SWIMMER_TYPE_TITLE'] . "</td>";
			 }
				  
              echo "<td>". $row['PERIOD_FROM'] ." To ".$row['PERIOD_TO']."</td>";
			
				 
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
if($type == "cnic")
	{
$sql="SELECT MEMBERSHIP_ID,FIRST_NAME, LAST_NAME, CNIC_NO, MOBILE_NO, MEMBER_PERIOD_ID, SWIMMER_TYPE_ID,   
	  PERIOD_FROM, PERIOD_TO FROM pool_membership_master_tab WHERE CNIC_NO='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
             <tr style="background-color:#FFFFD2;">  
              <th  width="67" >Select </th>     
                <th  width="174" >Member Name</th>
                <th width="177" >CNIC</th>
                <th width="119" >Mobile #</th>
                <th width="136" >Membership Type</th>
                <th width="131" >Swimmer Type</th>

                <th width="182">Membership Period</th>
              </tr>

         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  			  
          
             <?php  
			
				 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['MEMBERSHIP_ID']; ?>"></td>
			<?php
			 echo "<td>" . $row['FIRST_NAME'] ." ".$row['LAST_NAME']."</td>";
			 echo "<td>" . $row['CNIC_NO'] . "</td>";
				echo "<td>" . $row['MOBILE_NO'] . "</td>"; 
				$b_id=$row['MEMBER_PERIOD_ID'];
			 $sql1="SELECT * FROM POOL_MEMBERSHIP_PERIOD_TAB WHERE MEMBER_PERIOD_ID = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				echo "<td>" . $row1['MEMBER_PERIOD_TITLE'] . "</td>";
			 }
			 	$c_id=$row['SWIMMER_TYPE_ID'];
			 $sql2="SELECT * FROM SWIMMER_TYPE_TAB WHERE SWIMMER_TYPE_ID = $c_id";
			 $result2= mysql_query($sql2);
			 while($row2=mysql_fetch_array($result2))
			 {
				echo "<td>" . $row2['SWIMMER_TYPE_TITLE'] . "</td>";
			 }
				  
              echo "<td>". $row['PERIOD_FROM'] ." To ".$row['PERIOD_TO']."</td>";
			
				 
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
if($type == "cellno")
	{
$sql="SELECT MEMBERSHIP_ID,FIRST_NAME, LAST_NAME, CNIC_NO, MOBILE_NO, MEMBER_PERIOD_ID, SWIMMER_TYPE_ID,   
	  PERIOD_FROM, PERIOD_TO FROM pool_membership_master_tab WHERE MOBILE_NO ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
          <tr style="background-color:#FFFFD2;">  
              <th  width="67" >Select </th>     
                <th  width="174" >Member Name</th>
                <th width="177" >CNIC</th>
                <th width="119" >Mobile #</th>
                <th width="136" >Membership Type</th>
                <th width="131" >Swimmer Type</th>

                <th width="182">Membership Period</th>
              </tr>

         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  		
             <?php  
			
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['MEMBERSHIP_ID']; ?>"></td>
			<?php
			 echo "<td>" . $row['FIRST_NAME'] ." ".$row['LAST_NAME']."</td>";
			 echo "<td>" . $row['CNIC_NO'] . "</td>";
				echo "<td>" . $row['MOBILE_NO'] . "</td>"; 
				$b_id=$row['MEMBER_PERIOD_ID'];
			 $sql1="SELECT * FROM POOL_MEMBERSHIP_PERIOD_TAB WHERE MEMBER_PERIOD_ID = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				echo "<td>" . $row1['MEMBER_PERIOD_TITLE'] . "</td>";
			 }
			 	$c_id=$row['SWIMMER_TYPE_ID'];
			 $sql2="SELECT * FROM SWIMMER_TYPE_TAB WHERE SWIMMER_TYPE_ID = $c_id";
			 $result2= mysql_query($sql2);
			 while($row2=mysql_fetch_array($result2))
			 {
				echo "<td>" . $row2['SWIMMER_TYPE_TITLE'] . "</td>";
			 }
				  
              echo "<td>". $row['PERIOD_FROM'] ." To ".$row['PERIOD_TO']."</td>";
			
				 
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