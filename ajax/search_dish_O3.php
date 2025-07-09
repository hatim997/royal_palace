<?php
   /*$db = new mysqli('localhost', 'root' ,'', 'witechmi_rpalace');*/
   $db = new mysqli('localhost', 'witechnt_rpalace' ,'rpalace99', 'witechnt_rpalace');
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
	ORDER BY DISH_NAME ASC LIMIT 15");
	if($query) {
	echo '<ul>';
		while ($result = $query ->fetch_object()) {
			echo '<li onClick="fill(\''.addslashes($result->DISH_NAME).'\');">'.$result->DISH_NAME.'</li>';
		}
	echo '</ul>';
		
	}
	else
	{
		//echo 'OOPS we had a problem :(';
	

	}
} else
{
	// do nothing

	}
//echo '<ul>'; echo '<li>'."No Record Found".'</li>'; echo '</ul>';
	$query_dish_id = $db->query("SELECT max(dish_id) FROM dish_master_tab "); 
  	$result_dish_id= mysql_query($query_dish_id);
  	while($max2= mysql_fetch_array($result_dish_id));
	$max_dish_id = $max2['max(dish_id)']+1; 

	$query_add_dish = $db->escape_string("INSERT INTO dish_master_tab('REST_ID', 'KITCHEN_ID', 'FOOD_TYPE_ID', 'DISH_ID', 'DISH_NAME', 'CREATED_ID', 'CREATED_ON') VALUES ('1', '1', '20', '$max_dish_id', '$queryString', '$created_id' , '$created_on')");
	 // WHERE ORDER_NO!='$id' AND DISH_ID!='$dish_item_id'";
	$result_add_dish=mysql_query($query_add_dish) or die('Insertion Failed'.mysql_error());




} 
else
{
echo 'There should be no direct access to this script!';
}
}
?>