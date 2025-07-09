<?php
/*$db = new mysqli('localhost', 'root' ,'', 'witechmi_rpalace');*/
//   $db = new mysqli('localhost', 'witechnt_rpalace' ,'rpalace99', 'witechnt_rpalace');

include('config.php');

if ($_REQUEST['country']) {
	if (strlen($_REQUEST['country']) > 0) {
		$sql1 = "SELECT max(dish_id) FROM dish_master_tab";
		$result = mysqli_query($conn, $sql1) or die("error" . mysqli_error($conn));

		while ($row = mysqli_fetch_array($result)) {
			$max_dish_id = $row[0] + 1;

			if ($max_dish_id != 1) {

				$qry = "INSERT INTO dish_master_tab(`REST_ID`, `KITCHEN_ID`, `FOOD_TYPE_ID`, `DISH_ID`, `DISH_NAME`) 
						VALUES ('1', '1', '20', '$max_dish_id', '$_REQUEST[country]')";

				$query_add_dish = mysqli_query($conn, $qry);
				if (!$query_add_dish) {
					return false;
				}
			}
		}
	}
} else {
	echo 'There should be no direct access to this script!';
}

