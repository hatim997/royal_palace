<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$created_id = $_SESSION['username'];
$name = $_POST['name'];
//$fname = $_POST['fname'];
$day = $_POST['day'];
$month = $_POST['month'];
$cell = $_POST['cell'];
$email = $_POST['email'];
$city = $_POST['city'];
$pro_type = $_POST['pro_type'];

$dob = $day . "-" . $month;
$query1 = "SELECT max(GUEST_ID) FROM guest_master_tab";
$result1 = mysqli_query($conn, $query1);
$num1 = mysqli_num_rows($result1);
$i = 0;
while ($i < $num1) {
	mysqli_data_seek($result1, $i);
	$row = mysqli_fetch_assoc($result1);
	$guest_id = $row['max(GUEST_ID)'];
	$i++;
}
$guest_id++;

$query = "INSERT INTO guest_master_tab
	(GUEST_ID, GUEST_NAME, GUEST_FATHER, DATE_OF_BIRTH, GUEST_MOBILE_NO, GUEST_EMAIL, GUEST_CITY, PROFESSION_ID, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
	VALUES('$guest_id','$name','$fname','$dob','$cell','$email','$city','$pro_type','$created_id','$date_time','$created_id','$date_time')";
mysqli_query($conn, $query) or die('Insertion Failed:' . mysqli_error($conn));


//echo "Record Defined Successfully";
echo '<span class="style2"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Guest ID is ' . $guest_id . '<br><br></strong></span>';
//echo "Record Defined Successfully ".$var10;

echo '<form name="testform" id="testform" action="de_client_master.php" method="post">
			  <table width="390" align="center" border="0" cellpadding="0" cellspacing="0">
			  
	  <tr>
		<td width="120" align="left">Name:</td>
		<td width="270" align="left"><input type="text" id="name" name="name" /></td>
	  </tr>
	  <tr height="3%">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">Father Name:</td>
		<td width="270" align="left"><input type="text" id="fname" name="fname" /></td>
	  </tr>
	  <tr height="3%">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">Date Of Birth:</td>
		<td width="270" align="left"><select id="day" name="day">
                  <option value="">Day</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
    &nbsp;&nbsp;:&nbsp;&nbsp;
    <select id="month" name="month">
                  <option value="">Month</option>
                  <option value="Jan">Jan</option>
                  <option value="Feb">Feb</option>
                  <option value="Mar">Mar</option>
                  <option value="Apr">Apr</option>
                  <option value="May">May</option>
                  <option value="Jun">Jun</option>
                  <option value="Jul">Jul</option>
                  <option value="Aug">Aug</option>
                  <option value="Sep">Sep</option>
				  <option value="Sep">Oct</option>
                  <option value="Nov">Nov</option>
                  <option value="Dec">Dec</option>
          </select></td>
	  </tr>
	  <tr height="3%">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">Mobile No:</td>
		<td width="270" align="left"><input type="text" id="cell" name="cell" /></td>
	  </tr>
	  <tr height="3%">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">Email:</td>
		<td width="270" align="left"><input type="text" id="email" name="email" /></td>
	  </tr>
	  <tr height="3%">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">City:</td>
		<td width="270" align="left">
		<select id="city" name="city">
		  <option value="">Select City</option>';
$query = "SELECT * FROM city_tab ORDER BY CITY_NAME ASC";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
$i = 0;
while ($i < $num) {
	mysqli_data_seek($result, $i);
	$row = mysqli_fetch_assoc($result);
	$city = $row['CITY_NAME'];
	echo '<option value="' . $city . '">' . $city . '</option>';
	$i++;
}
// while loop ends here
echo '</select></td>
	  </tr>
	  <tr height="3%">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">Profession Type:</td>
		<td width="270" align="left">
		<select id="pro_type" name="pro_type">
		  <option value="">Profession Type</option>';
$query = "SELECT * FROM profession_tab ORDER BY PROFESSION_TITLE ASC";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
$i = 0;
while ($i < $num) {
	mysqli_data_seek($result, $i);
	$row = mysqli_fetch_assoc($result);
	$p_id = $row['PROFESSION_ID'];
	$p_name = $row['PROFESSION_TITLE'];
	echo '<option value="' . $p_id . '">' . $p_name . '</option>';
	$i++;
}
// while loop ends here
echo '</select></td>
	  </tr>
	  <tr height="5%">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr align="center">                    
		<td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
		<td align="left" width="270" valign="bottom"><input type="button" onclick="add_guest(this.form)" class="button" align="left" style="cursor:pointer"name="Submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
	  </tr>
	  </table>
	  </form>';
?>