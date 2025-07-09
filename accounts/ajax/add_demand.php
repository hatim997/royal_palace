<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	//$guest = $_POST['guest'];
	$date = $_POST['date'];
	$total_ing = $_POST['total_ing'];
	$dish_ids = $_POST['d_id'];
	$dish_qtys = $_POST['d_demand'];
	
	//echo "Dish IDs are ".$dish_ids."<br>";
	//echo "Quantities are ".$dish_qtys."<br>";
	
	$query1 = "SELECT max(DEMAND_NO) FROM restaurant_demand";
	$result1 = mysql_query($query1);
	$num1 = mysql_num_rows($result1);
	$i = 0;
	while($i < $num1)
	{
		$demand_no = mysql_result($result1,$i, "max(DEMAND_NO)" );
		$i++;
	}
	$demand_no++;
	
	$dish_id = explode(":", $dish_ids);
	$dish_qty = explode(":", $dish_qtys);
	$no = count($dish_id);
	for($a = 0; $a < $no; $a++)
	{
		$dish = $dish_id[$a];
		$qty = $dish_qty[$a];
		//echo $dish."<br>";
		
		$query = "INSERT INTO restaurant_demand
		(REST_ID, INGREDIENT_ID, DEMAND_NO, DEMAND_QTY, DEMAND_DATE, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
		VALUES('$rest_id','$dish','$demand_no','$qty','$date','$created_id','$date_time','$created_id','$date_time')";
		mysql_query($query) or die('Insertion Failed:'.mysql_error());
		
	}
	echo '<span class="style2"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Demand No is '.$demand_no.'<br><br></strong></span>';
	echo '<a class="style1" style="font-size:16px;" href="http://www.wiitechmill.com/royalpalace/accounts/demand_print.php?dn='.$demand_no.'" target="_blank">Print Demand</a>';
	
	echo '<form name="ingredient" id="ingredient">
            <table width="450" align="center" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td width="140">Transaction Date:</td>
    <td width="246"><input type="text" class="tcal" id="transaction_date" name="transaction_date" />e.g YYYY-MM-DD</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Select Head:</td>
    <td width="210"><select id="head" name="head" onchange="show_sub_head(this.value)">
  		<option value="">Select Head</option>';
		$query = "SELECT * FROM item_head WHERE REST_ID = '$rest_id' ORDER BY HEAD_NAME ASC";
		$result = mysql_query($query)or die("Failed :".mysql_error());
		$num = mysql_numrows($result);
		$i=0;
		while($i < $num)
		{
			$unit_detail = mysql_result($result,$i, "HEAD_NAME");
			$unit_id = mysql_result($result,$i, "HEAD_ID");
            echo '<option value="'.$unit_id.'">'.$unit_detail.'</option>';
            $i++;
        }  // while loop ends here
    echo '</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  
  <div id="show_sub_head">
  
  </div>
  
  <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="129">&nbsp;</td>
  <td width="221"><input class="button" align="left" onclick="add_demand(this.form)" name="submit" style="cursor:pointer" type="button" value="Demand" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>';
?>