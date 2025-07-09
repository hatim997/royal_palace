<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
include('../update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>
<?php
	$main = $_POST['main'];
	//$ctrl = $_POST['ctrl'];
	//$scat = $_POST['scat'];
	
	$query1 = "SELECT MAX(CTRL_ACCT_CODE) FROM ctrl_acct_tab WHERE MAIN_ACCT_CODE = '$main'";
	$result1 = mysql_query($query1)or die("Failed :".mysql_error());
	$num1 = mysql_numrows($result1);
	$i=0;
	while($i < $num1)
	{
		$trans_id = mysql_result($result1,$i, "MAX(CTRL_ACCT_CODE)" );
		$i++;
	}
	//$trans_id++;
	$length = strlen($trans_id);
	//echo $length;
	//$trans_id1 = array();
	$concate = "";
	for($i = 0; $i < $length; $i++)
	{
		//echo "Value is ".substr($trans_id, $i, 1)."<br>";
		$character = substr($trans_id, $i, 1);
		if($character == 0)
		{
			$concate = $concate.$character;
		}
		else
		{
			break;
		}
	}
	$trans_id++;
	$trans_id = $concate.$trans_id;
	echo $trans_id;
?>