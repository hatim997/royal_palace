<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$p_mode = $_POST['value'];
	?>
     <table width="372">
	<?php
	if($p_mode == "C")
	{
		?>
	 
	  <tr>
		<td width="174"><label class="description" for="element_30">Received Amount</label></td>
		<td width="186"><input type="text"  name="rec_amount" id="rec_amount" onChange="netamount('rec_amount');" /></td>
	 </tr>
     <tr>
		<td width="174" ><label class="description" for="element_30">Balance Return</label></td>
		<td width="186"><input type="text" name="bal_return" id="bal_return"  /></td>
	  </tr>
	  
	  <?php
	}
	else if($p_mode == "Q")
	{
		?>
        
	  
	  <tr>
		<td width="174" ><label class="description" for="element_30">Cheque No</label></td>
		<td width="186"><input type="text" name="chequeno" id="chequeno"  /></td>
        </tr>
	  <tr>
     
		<td width="174" ><label class="description" for="element_30">Concerned Bank</label></td>
		<td width="186"><input type="text" name="bank" id="bank"  /></td>
	  </tr>
	  
	  <?php
	}
	else if($p_mode == "R")
	{
		?>
	  
	  <tr>
		<td width="174"  ><label class="description" for="element_30">Credit Card No</label></td>
		<td width="186"><input type="text" name="cardno" id="cardno"  /></td>
     
	  </tr>
     
	<?php
	}
?>
</table>