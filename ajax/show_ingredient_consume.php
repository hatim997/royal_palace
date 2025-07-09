<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<?php
	
	$value = $_POST['value'];
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
	echo '<div class="threadlisthead table" style="background:url(images/dock-bg.png); width: 650px; margin-left:40px;">
				<div>
				<span class="threadinfo">
					<span class="threadtitle" style=" margin-left:47px;">Ingredient</span>
				</span>

					<span class="threadstats td" style=" margin-left:140px;">Qty Inhand</span>
                    <span class="threadlastpost td" style=" margin-left:30px; width: 100px;">Consumption</span>
					
				
				</div>
		</div>';
	
	$query = "SELECT restaurant_inventory.INGREDIENT_ID, restaurant_inventory.QTY_INHAND, store_master_tab.INGREDIENT_NAME 
				FROM restaurant_inventory, store_master_tab 
				WHERE restaurant_inventory.INGREDIENT_ID = store_master_tab.INGREDIENT_ID 
				AND store_master_tab.SUB_HEAD_ID = '$value' 
				ORDER BY store_master_tab.INGREDIENT_NAME ASC";
	$result = mysql_query($query) or die("Query Failed: ".mysql_error());
	$num = mysql_num_rows($result);
	$i=0;
	while($i < $num)
	{
		$d_id = mysql_result($result,$i, "restaurant_inventory.INGREDIENT_ID" );
		$d_name = mysql_result($result,$i, "store_master_tab.INGREDIENT_NAME" );
		$inhand = mysql_result($result,$i, "restaurant_inventory.QTY_INHAND" );
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
		<div align="center" style="width: 650px; margin-left: 140px;">
		<ul class="threadstats td alt" title="" style="margin-left: 10px;">
			<li>'.$inhand.'</li>
		</ul></div>
			
		<dd >
	<strong><div style="margin-top:10px;"><span style="margin-left:52px; padding-top: 5px;"><input type="text" style="background:#43C6DB;" name="'.$d_id.'" id="demand'.$i.'" size="5" />
	</span></div></strong>
 </dd>	
		
	</div>
</li> </ol>';
		$i++;
	}
	echo '<input type="hidden" name="total_ing" id="total_ing" value="'.$i.'" />';
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