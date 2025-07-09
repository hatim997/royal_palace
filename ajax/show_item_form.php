<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
$rest_id = $_SESSION['restid'];
?>
<?php

$s_id = $_POST['supplier_id'];
?>
<table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
            
<tr> 
         <td width="117">Select Item:</td>
  <td width="233">
<select name="item_id" id="item_id" size="1">
            <option value=" ">Select an Item</option>
           <?php
            
$result = mysql_query("SELECT * from  store_master_tab WHERE REST_ID = '$rest_id' ORDER BY INGREDIENT_NAME ASC");
$num = mysql_num_rows($result);//get total number of records
$i = 0;
while($i < $num)//check till i is less than number of records
{
	$id = mysql_result($result, $i, "INGREDIENT_ID");//from the array[$i] pick column(disease_id)
	$name=mysql_result($result,$i,"INGREDIENT_NAME");
	echo '<option value="'.$id.'">'.$name.'</option>';
	$i++;
}
	?>			
   
         </select></td>
</tr>
<tr> 
         <td>&nbsp;</td>  
         <td>&nbsp;</td>
</tr>

</table>