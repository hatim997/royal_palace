<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php

$value = $_POST['demandno'];
//echo $value."<br>";
//echo '<h1 class="style1" style=" font-size:16px;">New Guest</h1>';
/*
	$query = "SELECT IMAGE FROM food_type_tab WHERE FOOD_TYPE_ID = '$value'";
	$result = mysql_query($query);
	$num1 = mysql_numrows($result);
	//mysql_close();
	//$num1--;
	$i = 0;
	while($i < $num1)
	{
		$image = mysql_result($result,$i, "IMAGE" );
		$i++;
	}
	//echo "Image is ".$image."<br>";
	echo '<div align="left"><img src="images/'.$image.'" width="120" height="120"></div>';
	*/
$query11 = "UPDATE restaurant_demand SET READ_FLAG = '1' WHERE DEMAND_NO = '$value'";
$result11 = mysqli_query($conn, $query11) or die("Query Failed: " . mysqli_error($conn));

echo '<h1 class="style1" style=" font-size:16px; margin-left:40px;" align="cenetr">Demand Details</h1>';
echo '<form><div class="threadlisthead table" style="background:url(images/dock-bg.png); width: 650px; margin-left:40px;">
        <div>
        <span class="threadinfo">
            <span class="threadtitle" style=" margin-left:47px;">Ingredient</span>
        </span>
            <span class="threadstats td" style=" margin-left:80px;">Qty Inhand</span>
            <span class="threadstats td" style=" margin-left:40px;">Demand</span>
            <span class="threadlastpost td" style=" margin-left:50px; width: 100px;">Issued</span>
        </div>
    </div>';

$query = "SELECT store_master_tab.INGREDIENT_ID, store_master_tab.QTY_INHAND, store_master_tab.INGREDIENT_NAME,
          restaurant_demand.DEMAND_QTY, restaurant_demand.DEMAND_DATE 
          FROM restaurant_demand, store_master_tab 
          WHERE store_master_tab.INGREDIENT_ID = restaurant_demand.INGREDIENT_ID 
          AND restaurant_demand.DEMAND_NO = '$value' 
          ORDER BY store_master_tab.INGREDIENT_NAME ASC";

$result = mysqli_query($conn, $query) or die("Query Failed: " . mysqli_error($conn));
$num = mysqli_num_rows($result);
$i = 0;

while ($i < $num) {
	mysqli_data_seek($result, $i);
	$row = mysqli_fetch_assoc($result);

	$d_id    = $row['INGREDIENT_ID'];
	$d_name  = $row['INGREDIENT_NAME'];
	$inhand  = $row['QTY_INHAND'];
	$demand  = $row['DEMAND_QTY'];
	$date    = $row['DEMAND_DATE'];
	//$serving = mysql_result($result,$i, "dish_master_tab.DISH_SERVING" );
	//$price = mysql_result($result,$i, "dish_charges_history.DISH_CHARGES" );

	echo '<ol id="threads" class="threads">
					<li class="threadbit hot" id="thread_136">
	<div class="rating5 nonsticky" style="width:650px;">
		<div class="threadinfo">
		
			<!-- title / author block -->
			<div class="inner">
				<h3 class="threadtitle" style="font-size:15px; color:#43C6DB;">' . $d_name . '</h3>
				
			</div>				
			<!-- iconinfo -->
			
		</div>
		
		<!-- threadstats -->
		<div align="center" style="width: 650px; margin-left: -20px;">
		<ul class="threadstats td alt" title="" style="margin-left: -50px;">' . $inhand . '
		</ul></div>
		
		<!-- threadstats -->
		<div align="center" style="width: 650px; margin-left: 80px;">
		';
	$show = 0;
	if ($demand <= $inhand) {
		$show = $show + $demand;
	} else {
		$show = $show + $inhand;
	}
	echo '<ul class="threadstats td alt" title="" style="margin-left: 40px;">' . $demand . '
		</ul></div>
			
		<dd >
	<strong><div style="margin-top:10px;"><span style="margin-left:52px; padding-top: 5px;"><input type="text" style="background:#43C6DB;" name="' . $d_id . '" id="demand' . $i . '" size="5" value="' . $show . '" />
	</span></div></strong>
 </dd>	
		
	</div>
</li> </ol><br>';
	$i++;
}
echo '<input type="hidden" name="total_ing" id="total_ing" value="' . $i . '" />
	<input type="hidden" name="demandno" id="demandno" value="' . $value . '" />
	<input type="hidden" name="date" id="date" value="' . $date . '" />
	<br><table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="129">&nbsp;</td>
  <td width="221"><input class="button" align="left" onclick="add_demand(this.form)" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>';

/*
	echo '<table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr>
    <td width="120" align="left">Dish:</td>
    <td width="250" align="left">
    <select id="dish" name="dish" onchange="show_dish_detail(this.value);">
      <option value="">Select Dish</option>';
      $query = "SELECT * FROM dish_master_tab WHERE REST_ID = '$restid' AND FOOD_TYPE_ID = '$value' ORDER BY DISH_NAME ASC";
	  $result = mysql_query($query);
	  $num = mysql_num_rows($result);
	  $i=0;
	  while($i < $num)
	  {
		  $d_id = mysql_result($result,$i, "DISH_ID" );
		  $d_name = mysql_result($result,$i, "DISH_NAME" );
		  echo '<option value="'.$d_id.'">'.$d_name.'</option>';
          $i++;
      }  // while loop ends here
      echo '</select></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  <div id="dish_detail">
  </div>';
  */
?>