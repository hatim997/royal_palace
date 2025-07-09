<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	$value = $_POST['value'];
	
	echo '<table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140">Select Sub Head:</td>
    <td width="210"><select id="sub_head" name="sub_head">
  		<option value="">Select Sub Head</option>';
		$query = "SELECT * FROM item_sub_head WHERE REST_ID = '$rest_id' AND HEAD_ID = '$value' ORDER BY SUB_HEAD_NAME ASC";
		$result = mysql_query($query)or die("Failed :".mysql_error());
		$num = mysql_numrows($result);
		$i=0;
		while($i < $num)
		{
			$subname = mysql_result($result,$i, "SUB_HEAD_NAME");
			$subid = mysql_result($result,$i, "SUB_HEAD_ID");
            echo '<option value="'.$subid.'">'.$subname.'</option>';
            $i++;
        }  // while loop ends here
        echo '</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>';
?>