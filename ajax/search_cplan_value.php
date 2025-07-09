<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php

	$type = $_POST['type'];
if($type == "id")
	{ 
	?>
    <input type="text" id="pid" /> 
	<?php
	}
else if($type == "name")
	{ 
	?>
    <select id="pid" name="charge_type"> 
<option value="" >Select Type</option>
             <?php $query1 = "SELECT * FROM pool_charges_type_tab";
	  $result1 = mysql_query($query1) or die('Not Found:'.mysql_error());
	  $num1 = mysql_num_rows($result1);
	  $i1=0;
	  while($i1 < $num1)
	  {
		  $memid = mysql_result($result1,$i1, "CHARGES_TYPE_ID" );
		  $mem_detail = mysql_result($result1,$i1, "CHARGES_TITLE" );
		  echo '<option value="'.$memid.'">'.$mem_detail.'</option>';
		  $i1++;
	  }  // while loop ends here
	  ?>
		</select> 
	<?php
	}
	?>