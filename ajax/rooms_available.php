<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];

$s_date = $_POST['check_in'];
$e_date = $_POST['check_out'];
if ($e_date == "")
{
	$e_date=$s_date;
}
?>
<table height="540" border="0">
<tr>
  <td height="20"><div align="justify">
    <h2><strong>Available Rooms</strong></h2>
  </div></td></tr>
  <tr>
    <td height="486"><div align="justify">
      <select name="rooms" id="rooms" size="30" >
<?php
$query1="SELECT * FROM rooms_tab";
   $result1 = mysql_query($query1);
while($ans1=mysql_fetch_array($result1))
{
	$rm=$ans1['ROOM_ID'];
	$qq="SELECT * FROM booking_history_tab WHERE booking_history_tab.ROOM_ID = '$rm'";
	$rr=mysql_query($qq);
	$aa=mysql_fetch_array($rr);
	if($aa == "")
	{
		$id=$ans1['ROOM_TYPE_ID'];
	$query2_1 ="SELECT * FROM room_type_tab WHERE ROOM_TYPE_ID= '$id'";
   $result2_1 = mysql_query($query2_1);
   $ans2_1=mysql_fetch_array($result2_1);
   	$query4="SELECT `CHARGES_ON_DATE` FROM `room_charges_history` WHERE `ROOM_TYPE_ID` = $id";
	$result4=mysql_query($query4);
	$row4=mysql_fetch_array($result4);
	$charges=$row4['CHARGES_ON_DATE'];
		?>
	<option value="<?php echo "Room #".$ans1['ROOM_NO'];?>"><?php echo "Room # ".$ans1['ROOM_NO']."-".$ans2_1['ROOM_TYPE_TITLE']." (Rs/-".$charges.")";?></option>
	<?php
    }
	else if($aa != "")
	{
$query2 ="SELECT * FROM booking_history_tab WHERE booking_history_tab.ROOM_ID = '$rm' AND 
 ((CHECK_IN_DATE > '$s_date' AND CHECK_IN_DATE > '$e_date') 
OR (CHECK_OUT_DATE < '$s_date' AND CHECK_OUT_DATE < '$e_date'))";
   $result2 = mysql_query($query2);
   $ans2=mysql_fetch_array($result2);
if( $ans2 != "" )
{

$id=$ans1['ROOM_TYPE_ID'];
$query2_1 ="SELECT * FROM room_type_tab WHERE ROOM_TYPE_ID= '$id'";
   $result2_1 = mysql_query($query2_1);
   $ans2_1=mysql_fetch_array($result2_1);
   $query4="SELECT `CHARGES_ON_DATE` FROM `room_charges_history` WHERE `ROOM_TYPE_ID` = $id";
	$result4=mysql_query($query4);
	$row4=mysql_fetch_array($result4);
	$charges=$row4['CHARGES_ON_DATE'];
   
   ?>
<option value="<?php echo "Room #".$ans1['ROOM_NO'];?>"><?php echo "Room # ".$ans1['ROOM_NO']."-".$ans2_1['ROOM_TYPE_TITLE']." (Rs/-".$charges.")";?></option>
<?php }
	}
}


?>
</select></br>
<input name="add_dish" type="button" value="Book Room" onclick="add_room();" height="55" style=" background-color:#D69170; color:#91400F; font-weight:700;"/>
    </div>
    
    
    </td>
  </tr>
  
  <tr>
      <td height="26"><div align="justify">
     
    </div></td>
  </tr>
</table>