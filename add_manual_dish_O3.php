<?php
/*$db = new mysqli('localhost', 'root' ,'', 'witechmi_rpalace');*/
$db = new mysqli('localhost', 'witechnt_rpalace', 'rpalace99', 'witechnt_rpalace');
if (!$db) {

	echo 'Could not connect to the database.';
} else {

	if (isset($_POST['country'])) {
		$queryString = $db->real_escape_string($_POST['country']);

		if (strlen($queryString) > 0) {
			//echo 'OOPS we had a problem :(';
			$query_dish_id = $db->query("SELECT max(dish_id) FROM dish_master_tab ");
			$result_dish_id = $db->query($query_dish_id);

			if ($result_dish_id)
			//while ($result_dish_id = $db->query($query_dish_id));
			{
				$max_dish_id = $max2['max(dish_id)'] + 1;


				$query_add_dish = $db->query("INSERT INTO dish_master_tab('REST_ID', 'KITCHEN_ID', 'FOOD_TYPE_ID', 'DISH_ID', 'DISH_NAME') VALUES ('1', '1', '20', '$max_dish_id', '$queryString')");
				// WHERE ORDER_NO!='$id' AND DISH_ID!='$dish_item_id'";
				$result_add_dish = $db->query($query_add_dish);
				//echo $query_add_dish;	
				if (!$result_add_dish) {
					return false;
				}

				// ppppppppppp
			}
		}
	} else {
		// do nothing

	}
	//echo '<ul>'; echo '<li>'."No Record Found".'</li>'; echo '</ul>';
} {
	echo 'There should be no direct access to this script!';
}
