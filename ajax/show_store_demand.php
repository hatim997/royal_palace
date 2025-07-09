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
	$query = "SELECT store_master_tab.INGREDIENT_ID, store_master_tab.QTY_INHAND, store_master_tab.INGREDIENT_NAME,
				supplier_demand.DEMAND_QTY, supplier_demand.DEMAND_DATE 
				FROM supplier_demand, store_master_tab 
				WHERE store_master_tab.INGREDIENT_ID = supplier_demand.INGREDIENT_ID 
				AND supplier_demand.DEMAND_NO = '$value' 
				AND supplier_demand.INVOICE_NO = '' 
				ORDER BY store_master_tab.INGREDIENT_NAME ASC";
	$result = mysql_query($query) or die("Query Failed: ".mysql_error());
	$num = mysql_num_rows($result);
	if($num <= 8)
	{
		echo '<div id="sup_demand" align="left" style="width:737px;">';
	}
	else if($num > 10 && $num < 30)
	{
		echo '<div id="sup_demand" align="left" style="overflow:auto; height:200px; width:737px">';  
	}
	else if($num > 30 && $num < 60)
	{
		echo '<div id="sup_demand" align="left" style="overflow:auto; height:300px; width:737px">';
	}
	else
	{
		echo '<div id="sup_demand" align="left" style="overflow:auto; height:300px; width:737px">';
	}
	echo '<form><div class="threadlisthead table" style="background:url(images/dock-bg.png); width: 650px; margin-left:40px;">
				<div>
				<span class="threadinfo">
					<span class="threadtitle" style=" margin-left:7px;" style="width:250px;">Ingredient</span>
				</span>

					<span class="threadstats td" style=" margin-left:30px;">Qty Inhand</span>
					<span class="threadstats td" style=" margin-left:20px;">Demand</span>
                    <span class="threadlastpost td" style=" margin-left:12px; width: 100px;">Received</span>
					<span class="threadlastpost td" style=" margin-left:7px; width: 80px;">Price</span>
					
				
				</div>
		</div>';
	$i=0;
	while($i < $num)
	{
		$d_id = mysql_result($result,$i, "store_master_tab.INGREDIENT_ID" );
		$d_name = mysql_result($result,$i, "store_master_tab.INGREDIENT_NAME" );
		$inhand = mysql_result($result,$i, "store_master_tab.QTY_INHAND" );
		$demand = mysql_result($result,$i, "supplier_demand.DEMAND_QTY" );
		$date = mysql_result($result,$i, "supplier_demand.DEMAND_DATE" );
		//$serving = mysql_result($result,$i, "dish_master_tab.DISH_SERVING" );
		//$price = mysql_result($result,$i, "dish_charges_history.DISH_CHARGES" );
		
		echo '<ol id="threads" class="threads">
					<li class="threadbit hot" id="thread_136">
	<div class="rating5 nonsticky" style="width:650px;">
		<div class="threadinfo">
		
			<!-- title / author block -->
			<div class="inner">
				<h3 class="threadtitle" style="font-size:15px; color:#43C6DB;">'.$d_name.'</h3>
				
			</div>				
			<!-- iconinfo -->
			
		</div>
		
		<!-- threadstats -->
		<div align="center" style="width: 650px; margin-left: -90px;">
		<ul class="threadstats td alt" title="" style="margin-left: -101px;">'.$inhand.'
		</ul></div>
		
		<!-- threadstats -->
		<div align="center" style="width: 650px; margin-left: 0px;">
		';
		$show = 0;
		if($demand <= $inhand)
		{
			$show = $show + $demand;
		}
		else
		{
			$show = $show + $inhand;
		}
		echo '<ul class="threadstats td alt" title="" style="margin-left: -10px;"><input type="text" style="background:#43C6DB;" name="'.$d_id.'" id="demand'.$i.'" size="5" value="'.$demand.'" onkeyup="edit_value('.$i.');" />
		</ul></div>
			
		<dd >
	<strong><div style="margin-top:10px;"><span style="margin-left:28px; padding-top: 0px;"><input type="text" style="background:#43C6DB;" name="'.$d_id.'" id="receive'.$i.'" size="5" value="'.$demand.'" readonly />
	</span></div></strong>
 </dd>
 
 <dd >
	<strong><div style="margin-top:-21px;"><span style="margin-left:137px; padding-top: 0px;"><input type="text" style="background:#43C6DB;" name="'.$d_id.'" id="price'.$i.'" size="5" />
	</span></div></strong>
 </dd>	
		
	</div>
	
</li> </ol><br>';
		$i++;
	}
	echo '</div><input type="hidden" name="total_ing" id="total_ing" value="'.$i.'" />
	<input type="hidden" name="demandno" id="demandno" value="'.$value.'" />
	<input type="hidden" name="date" id="date" value="'.$date.'" />
	<br><table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="129">&nbsp;</td>
  <td width="221"><input class="button" align="left" onclick="add_demand1(this.form)" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
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