<?php
include('../config.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>
<div align="center" class="story" id="mydiv" style="width:660px;">
      <img src="images/header_report.jpg" /><br />	
			<?php
			
				$demandno = $_POST['demandno'];
				$status = $_POST['status'];
				if($status == 0)
				{
					$show = "Pending";
				}
				else
				{
					$show = "Received";
				}
				//echo $pid."<br><br>";
				//echo $tid."<br><br>";
				//echo $sid."<br><br>";
			?><br>
        <table width="650" border="0" cellpadding="0" cellspacing="5" align="center">
		  <tr><!--<td width="59" align="left"><strong>Name</strong></td><td width="155" align="left"><?php echo $name; ?></td>-->
            <td width="110" align="left"><strong>Date:</strong></td>
            <td width="525" align="left"><?php echo $today; ?></td></tr>
            <!--<tr><td width="59" align="left"><strong>Cell No</strong></td><td align="left"><?php echo $cell; ?></td></tr>-->
        	<tr><td width="110" align="left"><strong>Demand No:</strong></td><td align="left"><span class="style8" style="font-size:16px;"><?php echo $demandno; ?></span></td></tr>
            <tr><td width="110" align="left"><strong>Status:</strong></td><td align="left"><span class="style8" style="font-size:16px;"><?php echo $show; ?></span></td></tr>
            </table><br><br>
      <?php
       		$query = "SELECT store_master_tab.QTY_INHAND, 
						store_master_tab.INGREDIENT_ID, store_master_tab.INGREDIENT_NAME, 
						supplier_demand.DEMAND_QTY, supplier_demand.DEMAND_DATE
						FROM store_master_tab, supplier_demand
						WHERE store_master_tab.INGREDIENT_ID = store_master_tab.INGREDIENT_ID 
						AND supplier_demand.INGREDIENT_ID = store_master_tab.INGREDIENT_ID
						AND supplier_demand.DEMAND_NO = '$demandno'
						ORDER BY store_master_tab.INGREDIENT_NAME ASC";
			$result = mysql_query($query) or die("Query Failed: ".mysql_error());
			$num = mysql_num_rows($result);
			
			echo '<table width="650" cellpadding="0" cellspacing="0" align="center" BORDER=1>
						<thead>
						<tr>
							<td width="100" align="center"><strong>Item ID</strong></td>
							<td width="200" align="center"><strong>Item Name</strong></td>
							<td width="100" align="center"><strong>Store Qty Inhand</strong></td>
							<td width="100" align="center"><strong>Demand</strong></td>
							<td width="100" align="center"><strong>Demand Date</strong></td>
							<!--<td width="90" align="left"><strong>Status</strong></td>-->
						</tr>
						</thead>
						</table>
						<table width="650" cellpadding="0" cellspacing="0" align="center" BORDER=2 RULES=NONE FRAME=BOX>';
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
						echo '<tr>
								<td width="100" align="center">&nbsp;'.$d_id.'</td>                            
								<td width="200" align="left">&nbsp;'.$d_name.'</td>
								<td width="100" align="center">&nbsp;'.$inhand.'</td>
								<td width="100" align="center">&nbsp;'.$demand.'</td>
								<td width="100" align="center">&nbsp;'.$date.'</td>
						  </tr>';
						$i++;
					} // while ends here
					echo '</table>
					<table width="650" cellpadding="0" cellspacing="0" align="center" BORDER=2 RULES=NONE FRAME=BOX>
					
					<tr>
						<td width="100" align="left">Total Demand Items&nbsp;'.$num.'</td>
					</tr>
					</table><br><br><br><br>';
					//echo '<h1 class="style1" style=" font-size:14px;">Gross amount is :'.$gross.'</h1>';
		?>
</div>
            <br><br><br><br><br><br>
            <a href="" class="style8" onclick="printSelection(document.getElementById('mydiv'));return false"><strong>Print Out</strong></a>