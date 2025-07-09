
<?php
include('../config.php');
include('../time_settings.php');
//$userid = $_SESSION['username'];
//$password = $_SESSION['password'];
//$system_date = $today;
$menu_name = $_POST['menu_name'];
//start deletion of history
//echo $menu_id; exit;
//$query11="DELETE FROM banq_order_history_tab WHERE menu_id = '$menu_id'";
//$result11=mysql_query($query11);

//End of deletion code
//exit;
//$menu_name = "menu_1";
$query10="SELECT menu_id FROM order_menu WHERE menu_name = '$menu_name' ";
$result10=mysql_query($query10);
while($row10=mysql_fetch_array($result10))
{
$menu_id = $row10['menu_id'];
}

$query11="SELECT dish_id FROM banq_menu_detail WHERE menu_id = '$menu_id'";
$result11=mysql_query($query11);
while($row11=mysql_fetch_array($result11))
{
$dish_id = $row11['dish_id'];

$query5 = "SELECT DISH_NAME FROM dish_master_tab WHERE dish_id = '$dish_id' ";
$result5 = mysql_query($query5);
$dish = mysql_result($result5, 0 , "DISH_NAME");

$query15 = "SELECT DISH_CHARGES FROM dish_charges_history WHERE dish_id = '$dish_id' ";
$d_query = mysql_query($query15) or die("ERROR1:".mysql_error());
$d_charges = mysql_result($d_query, 0, "DISH_CHARGES");
		?>
			<!--  <option id="option" value="<?php echo $dish_name;?>"><?php echo $dish." charges ".$d_charges;?></option> --> 
			<option id="option" style="font-size:12px" value="<?php echo $dish;?>"><?php echo $dish;?></option>

<?php


        }

		?>