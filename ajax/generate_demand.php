<?php session_start(); ?>
<?php include('../config.php'); ?>
<?php include('../time_settings.php'); 

$restid = $_SESSION['restid'];

$created_id = $_SESSION['username'];
?>

<?php
	

		$d_num = $_POST['d_num'];
	
 
       $query1 = "SELECT * FROM dept_generate_demand where DEMAND_NUM = '$d_num'";
	$result1 = mysql_query($query1);
	
?>
 
<?php
	while($row1=mysql_fetch_array($result1))
  {    
$d_num = $row1['DEMAND_NUM'];
$ind_code = $row1['ITEM_CODE'];
$date = $row1['DATE']; 
$total_demand = $row1['ITEM_QTY']; 
$created_on =$row1['DATE'];
$display_name =$row1['DEPARTMENT'];
$query44="INSERT INTO restaurant_demand(`REST_ID`, `DISPLAY_NAME`, `INGREDIENT_ID`, `DEMAND_NO`, `DEMAND_QTY`, `DEMAND_DATE`, `UNIT_ID`, `CREATED_ID`, `CREATED_ON`,`READ_FLAG`)
			 VALUES ('$restid','$display_name','$ind_code','$d_num','$total_demand','$date','','$created_id','$created_on','0')";
$result44=mysql_query($query44) or die('Demand Insertion Failed'.mysql_error());
 
 
 } 

 
 ?>