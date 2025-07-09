<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	
	$query = "SELECT max(UNIT_ID) FROM unit_tab";
	$result = mysql_query($query);
	$num1 = mysql_numrows($result);
	//mysql_close();
	//$num1--;
	$i = 0;
	while($i < $num1)
	{
		$unit_id = mysql_result($result,$i, "max(UNIT_ID)" );
		$i++;
	}
	$unit_id++;

	//$time = date('H:i:s');
	//$date_time = date('Y-m-d H:i:s');
	$created_id = $_SESSION['username'];
	
	$unit_detail = $_POST['unit_detail'];
	$low_unit = $_POST['low_unit'];
	$div_value = $_POST['div_value'];
			
	$query = "INSERT INTO unit_tab 
	VALUES('$unit_id','$unit_detail','$low_unit','$div_value','$created_id','$date_time','$created_id','$date_time')";
		
	mysql_query($query) or die('Insertion Failed:'.mysql_error());
	echo '<h4 class="style9">Unit Successfully Defined</h4><br><br>
	
	<form name="unit" method="post" action="" id="unit">
                <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Unit:</td>
        <td><input type="text" name="unit_detail" id="unit_detail" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Low Value:</td>
        <td><input type="text" name="unit_detail" id="low_unit" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Division Value:</td>
        <td><input type="text" name="unit_detail" id="div_value" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      <td><input class="button" align="left" onclick="add_unit();" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
      </tr>
    </table>
    </form>';
?>