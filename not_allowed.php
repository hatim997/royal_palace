<?php
session_start();
include('time_settings.php');
include('update_activity.php');
if (isset($_SESSION['username'])) {
	header('Location: login.php');
} else {
	header('Location: index.php');
} // else ends here
