<?php session_start();?>
<?php
include("../config.php");
include("../time_settings.php");
$mem_id=$_POST['mem_id'];
$gym_type=$_POST['gym_type'];
$charges_id=$_POST['charges_id'];
$charges_type_id=$_POST['charges_type_id'];
$charges_due=$_POST['charges_due'];
$charges_flag=$_POST['charges_flag'];

$query="insert into gym_payment_token (MEMBERSHIP_ID, GYM_TYPE_ID,CHARGES_ID,CHARGES_TYPE_ID,CHARGES_DUE,CHARGES_FLAG,
CREATED_ID,CREATED_ON,EDITED_ID,EDITED_ON) values ('$mem_id','$gym_type','$charges_id','$charges_type_id','$charges_due',
'$charges_flag','','','','')";
$result=mysql_query($query) or die(mysql_error());

?>
