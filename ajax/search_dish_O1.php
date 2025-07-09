<?php
   /*$db = new mysqli('localhost', 'root' ,'', 'witechmi_rpalace');*/
   $db = new mysqli('localhost', 'witechmi_rpalace' ,'rpalace99', 'witechmi_rpalace');
if(!$db)
{

echo 'Could not connect to the database.';
} else 
{

if(isset($_POST['queryString']))
{
$queryString = $db->real_escape_string($_POST['queryString']);

if(strlen($queryString) >0) {

	$query = $db->query("SELECT DISH_NAME FROM dish_master_tab WHERE DISH_NAME LIKE '$queryString%'
	ORDER BY DISH_NAME DESC LIMIT 7");
	if($query) {
	echo '<ul>';
		while ($result = $query ->fetch_object()) {
			echo '<li onClick="fill(\''.addslashes($result->DISH_NAME).'\');">'.$result->DISH_NAME.'</li>';
		}
	echo '</ul>';
		
	} else {
		echo 'OOPS we had a problem :(';
	}
} else {
	
	// do nothing
}
//echo '<ul>'; echo '<li>'."No Record Found".'</li>'; echo '</ul>';
} 
else
{
echo 'There should be no direct access to this script!';
}
}
?>