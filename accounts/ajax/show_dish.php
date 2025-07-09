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
	echo '<div class="threadlisthead table" style="background:url(images/dock-bg.png); width: 720px;">
				<div>
				<span class="threadinfo">
					<span class="threadtitle" style=" margin-left:47px;">Dish Name</span>
				</span>

					<span class="threadstats td" style=" margin-left:190px;">Serving</span>
					<span class="threadlastpost td" style=" margin-left:-5px;">Price</span>
                    <span class="threadlastpost td" style=" margin-left:-85px; width: 100px;">Quantity</span>
					
				
				</div>
		</div>';
	
	$query = "SELECT dish_master_tab.DISH_ID, dish_master_tab.DISH_NAME, dish_master_tab.DISH_SERVING, dish_master_tab.DISH_DETAIL, 
				dish_charges_history.DISH_CHARGES 
				FROM dish_master_tab, dish_charges_history 
				WHERE dish_master_tab.DISH_ID = dish_charges_history.DISH_ID
				AND dish_master_tab.FOOD_TYPE_ID = '$value' 
				AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
				AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' 
				AND dish_master_tab.REST_ID = '$restid' ORDER BY dish_master_tab.DISH_ID ASC";
	$result = mysql_query($query) or die("Query Failed: ".mysql_error());
	$num = mysql_num_rows($result);
	$i=0;
	while($i < $num)
	{
		$d_id = mysql_result($result,$i, "dish_master_tab.DISH_ID" );
		$d_name = mysql_result($result,$i, "dish_master_tab.DISH_NAME" );
		$d_detail = mysql_result($result,$i, "dish_master_tab.DISH_DETAIL" );
		$serving = mysql_result($result,$i, "dish_master_tab.DISH_SERVING" );
		$price = mysql_result($result,$i, "dish_charges_history.DISH_CHARGES" );
		
		echo '<ol id="threads" class="threads">
					<li class="threadbit hot" id="thread_136">
	<div class="rating5 nonsticky" style="width:720px;">
		<div class="threadinfo">
		
			<!-- title / author block -->
			<div class="inner">
				<h3 class="threadtitle" style="font-size:15px; color:#43C6DB;">&nbsp;'.$d_name.'</h3>
				<div class="threadmeta">
					<div class="author" style="width: 400px;">		
						<span class="label" style="width: 400px;">&nbsp;'.$d_detail.'</span>
					</div>				
				</div>
			</div>				
			<!-- iconinfo -->
			
		</div>
		
		<!-- threadstats -->
		<div align="center" style="width: 700px; margin-left: 240px;">
		<ul class="threadstats td alt" title="" style="margin-left: 30px;">
			<li>'.$serving.'</li>
			<li>&nbsp;</li>
			<li class="hidden">&nbsp;</li>
		</ul></div>
		<div align="center" style="width: 700px; margin-left: 260px;">
        <ul class="threadstats td alt" title="">
			<li>'.$price.'</li>
			<li>&nbsp;</li>
			<li class="hidden">&nbsp;</li>
		</ul></div>				
		<!-- lastpost -->
			
		<dd >
	<strong><div style="margin-top:10px;"><span style="margin-left:30px; padding-top: 5px;"><select style="background:#43C6DB;" name="'.$d_id.'" id="qty'.$i.'">
	<option value="">Qty</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	</select></span></div></strong>
 </dd>	
		
	</div>
</li> </ol>';
		$i++;
	}
	echo '<input type="hidden" name="total_dishes" id="total_dishes" value="'.$i.'" />';
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