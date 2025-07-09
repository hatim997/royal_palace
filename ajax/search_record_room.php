<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php

	$value = $_POST['pid'];
	$type = $_POST['type'];

	?>
    <form name="form1" method="post" action="rooms_booking.php">
    <table width="1016" border="0" >
	<?php
if($type == "id")
	{
		
$sql="SELECT BOOKING_NO,CUSTOMER_NAME,CUSTOMER_CELL_NO,CUSTOMER_CNIC,
BOOKING_DATE,LEAVING_DATE,CHECK_IN_DATE,CHECK_OUT_DATE  FROM booking_tab WHERE BOOKING_NO ='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="70" >Select </th>     
                <th  width="138" >Customer Name</th>
                <th width="138" >CNIC</th>
                <th width="96" >Contact no.</th>
                <th width="100" >Check-in</th>
                <th width="117" >Check-out</th>

                <th width="128">Booked Room(s)</th>
              </tr>
     


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
    
      		<input name="room_id" type="hidden" value="<?php echo $row['BOOKING_NO']; ?>">

             <?php  
			
			 echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['BOOKING_NO']; ?>"></td>
			<?php
			 echo "<td>" . $row['CUSTOMER_NAME'] . "</td>";
			 echo "<td>" . $row['CUSTOMER_CNIC'] . "</td>";
				echo "<td>" . $row['CUSTOMER_CELL_NO'] . "</td>"; 
				echo "<td>" . $row['CHECK_IN_DATE'] . "</td>";
				 echo "<td>" . $row['LEAVING_DATE'] . "</td>"; 
              echo "<td>";
				 $b_id=$row['BOOKING_NO'];
			 $sql1="SELECT ROOM_ID FROM booking_history_tab WHERE BOOKING_NO = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				 echo $row1['ROOM_ID']."</br>"; 
			 }
			 echo "</td>";
				echo "</tr>";
}?>
<tr>
<td width="70" valign="top">
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
$sql="SELECT BOOKING_NO,CUSTOMER_NAME,CUSTOMER_CELL_NO,CUSTOMER_CNIC,
BOOKING_DATE,LEAVING_DATE,CHECK_IN_DATE,CHECK_OUT_DATE  FROM booking_tab WHERE CUSTOMER_NAME='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="70" >Select </th>     
                <th  width="138" >Customer Name</th>
                <th width="138" >CNIC</th>
                <th width="96" >Contact no.</th>
                <th width="100" >Check-in</th>
                <th width="117" >Check-out</th>

                <th width="128">Booked Room(s)</th>
              </tr>
     


         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  			  
            <input name="room_id" type="hidden" value="<?php echo $row['BOOKING_NO']; ?>">
             <?php  
			
			echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['BOOKING_NO']; ?>"></td>
			<?php
			 echo "<td>" . $row['CUSTOMER_NAME'] . "</td>";
			 echo "<td>" . $row['CUSTOMER_CNIC'] . "</td>";
				echo "<td>" . $row['CUSTOMER_CELL_NO'] . "</td>"; 
				echo "<td>" . $row['CHECK_IN_DATE'] . "</td>";
				 echo "<td>" . $row['LEAVING_DATE'] . "</td>"; 
              echo "<td>";
				 $b_id=$row['BOOKING_NO'];
			 $sql1="SELECT ROOM_ID FROM booking_history_tab WHERE BOOKING_NO = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				 echo $row1['ROOM_ID']."</br>"; 
			 }
			 echo "</td>";
				echo "</tr>";
}?>
<tr>
<td width="70" valign="top">
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
$sql="SELECT BOOKING_NO,CUSTOMER_NAME,CUSTOMER_CELL_NO,CUSTOMER_CNIC,
BOOKING_DATE,LEAVING_DATE,CHECK_IN_DATE,CHECK_OUT_DATE  FROM booking_tab WHERE CUSTOMER_CNIC='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
              <tr style="background-color:#FFFFD2;">  
              <th  width="70" >Select </th>     
                <th  width="138" >Customer Name</th>
                <th width="138" >CNIC</th>
                <th width="96" >Contact no.</th>
                <th width="100" >Check-in</th>
                <th width="117" >Check-out</th>

                <th width="117">Booked Room(s)</th>
              </tr>

         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  			  
          <input name="room_id" type="hidden" value="<?php echo $row['BOOKING_NO']; ?>">
             <?php  
			
			echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['BOOKING_NO']; ?>"></td>
			<?php
			 echo "<td>" . $row['CUSTOMER_NAME'] . "</td>";
			 echo "<td>" . $row['CUSTOMER_CNIC'] . "</td>";
				echo "<td>" . $row['CUSTOMER_CELL_NO'] . "</td>"; 
				echo "<td>" . $row['CHECK_IN_DATE'] . "</td>";
				 echo "<td>" . $row['LEAVING_DATE'] . "</td>"; 
              echo "<td>";
				 $b_id=$row['BOOKING_NO'];
			 $sql1="SELECT ROOM_ID FROM booking_history_tab WHERE BOOKING_NO = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				 echo $row1['ROOM_ID']."</br>"; 
			 }
			 echo "</td>";
				echo "</tr>";
}?>
<tr>
<td width="70" valign="top">
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
$sql="SELECT BOOKING_NO,CUSTOMER_NAME,CUSTOMER_CELL_NO,CUSTOMER_CNIC,
BOOKING_DATE,LEAVING_DATE,CHECK_IN_DATE,CHECK_OUT_DATE  FROM booking_tab WHERE CUSTOMER_CELL_NO='$value'";
$result = mysql_query($sql);
$count=mysql_num_rows($result);
if($count != "")
		 {
?>          
          <tr style="background-color:#FFFFD2;">  
              <th  width="70" >Select </th>     
                <th  width="138" >Customer Name</th>
                <th width="138" >CNIC</th>
                <th width="96" >Contact no.</th>
                <th width="100" >Check-in</th>
                <th width="117" >Check-out</th>

                <th width="117">Booked Room(s)</th>
              </tr>

         <?php
		 
	while($row = mysql_fetch_array($result))
  	{  ?>
  		<input name="room_id" type="hidden" value="<?php echo $row['BOOKING_NO']; ?>">
             <?php  
			
			echo "<tr align=center>"; ?>
			 <td><input name="radiobox[]" type="radio"  value="<?php echo $row['BOOKING_NO']; ?>"></td>
			<?php
			 echo "<td>" . $row['CUSTOMER_NAME'] . "</td>";
			 echo "<td>" . $row['CUSTOMER_CNIC'] . "</td>";
				echo "<td>" . $row['CUSTOMER_CELL_NO'] . "</td>"; 
				echo "<td>" . $row['CHECK_IN_DATE'] . "</td>";
				 echo "<td>" . $row['LEAVING_DATE'] . "</td>"; 
              echo "<td>";
				 $b_id=$row['BOOKING_NO'];
			 $sql1="SELECT ROOM_ID FROM booking_history_tab WHERE BOOKING_NO = $b_id";
			 $result1= mysql_query($sql1);
			 while($row1=mysql_fetch_array($result1))
			 {
				 echo $row1['ROOM_ID']."</br>"; 
			 }
			 echo "</td>";
				echo "</tr>";
}?>
<tr>
<td width="70" valign="top">
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