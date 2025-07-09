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
	
	echo '<table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr>
    <td width="120" align="left">Dish:</td>
    <td width="250" align="left">
    <select id="dish" name="dish" onchange="show_dish_detail(this.value);">
      <option value="">Select Dish</option>';
      $query = "SELECT * FROM dish_master_tab WHERE REST_ID = '$restid' AND FOOD_TYPE_ID = '$value' ORDER BY DISH_NAME ASC";
	  $result = mysql_query($query);
	  $num = mysql_numrows($result);
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
?>