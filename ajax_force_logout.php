<?php
session_start();
include('config.php');
include('time_settings.php');
include('update_activity.php');
$id = $_POST['user_id'];
//$logout_redirect_url = "index.php";
//echo $username;
/*
mysql_connect("localhost", "witechmi_sqkhan", "sqkhan99") 
 or die('Connection to database failed: ' . mysql_error());
mysql_select_db("witechmi_dtox") or die ('select_db failed!');
*/
$update = "UPDATE login_tab SET RECORD_STATUS = 'logout' WHERE USER_ID LIKE '$id'";
mysqli_query($conn, $update) or die('Query failed! ' . mysqli_error($conn));

$update = "UPDATE logfile_tab SET LOGOUT_DATE = '$current_date', LOGOUT_TIME = '$current_time' 
			WHERE USER_ID LIKE '$id' 
			AND LOGOUT_DATE = '0000-00-00' 
			AND LOGOUT_TIME = '00:00:00'";
mysqli_query($conn, $update) or die('Query failed! ' . mysqli_error($conn));

// session_destroy();

$query = "SELECT user_tab.USER_ID, user_tab.USER_NAME, login_tab.USER_ID, login_tab.RECORD_STATUS 
			FROM login_tab, user_tab 
			WHERE user_tab.USER_ID = login_tab.USER_ID 
			AND login_tab.RECORD_STATUS = 'logedin'
			ORDER BY user_tab.USER_NAME ASC";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
	echo '<h2 class="style2">Currently no User Logged In</h2>';
} else {
	$num = mysqli_num_rows($result);

	echo '<form>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select Member:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="user">
        <option value="">Select Member</option>';

	$i = 0;
	while ($i < $num) {
		mysqli_data_seek($result, $i);
		$row = mysqli_fetch_assoc($result);
		$user_id = $row['USER_ID'];
		$name = $row['USER_NAME'];

		echo '<option value="' . $user_id . '">' . $name . ' ( ' . $user_id . ' )</option>';
		$i++;
	}

	echo '</select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" id="submit" onclick="ajax_force_logout()" value="Logout" />
            </form><br><br>';
	echo '<p class="style2">User Logged Out</p>';
} // else ends here
/*echo '<script language="javascript">alert("You are Successfully Logged Out.")</script>';*/
//header("Location: $logout_redirect_url");
