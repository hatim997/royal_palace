<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$restid = $_SESSION['restid'];
?>
<div style="width:1100px;" id="inventory1">
<div style="width:500px; float:left;">
            
            <?php
          		$blank = 0;
		  		
				//echo $rest_id." and date ".$current_date;
				$query = "SELECT supplier_demand.DEMAND_NO, supplier_demand.DEMAND_DATE, 
							supplier_master.SUPPLIER_NAME 
							FROM supplier_demand, supplier_master 
							WHERE supplier_demand.SUPPLIER_ID = supplier_master.SUPPLIER_ID
							AND supplier_demand.REST_ID = '$restid' 
							AND supplier_demand.INVOICE_NO = '$blank' GROUP BY supplier_demand.DEMAND_NO ASC";
												
				$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
				$num = mysql_num_rows($result1);
				if($num != 0)
				{
					if($num <= 8)
					{
						//echo '<div id="sup_demand" align="center" style="width:737px;">';
						echo '<div id="del_dish" align="center" style="width:460px;">';
					}
					else if($num > 10 && $num < 30)
					{
						//echo '<div id="sup_demand" align="center" style="overflow:auto; height:200px; width:737px">';
						echo '<div id="del_dish" align="center" style="overflow:auto; height:150px; width:460px;">';
					}
					else if($num > 30 && $num < 60)
					{
						//echo '<div id="sup_demand" align="center" style="overflow:auto; height:300px; width:737px">';
						echo '<div id="del_dish" align="center" style="overflow:auto; height:250px; width:460px;">';
					}
					else
					{
						//echo '<div id="sup_demand" align="center" style="overflow:auto; height:300px; width:737px">';
						echo '<div id="del_dish" align="center" style="overflow:auto; height:200px; width:460px;">';
					}
					echo '<table width="440" border="1" cellpadding="0" cellspacing="0" align="center">
							<thead>
							<tr>
								<td width="90" align="center"><strong>Demand No</strong></td>
								<td width="150" align="center"><strong>Supplier</strong></td>
								<td width="110" align="center"><strong>Date</strong></td>
								<td width="90" align="center"><strong>Details</strong></td>
							</tr>
							</thead>';
						$i=0;
						while($i < $num)
						{
							$demand_no = mysql_result($result1,$i, "supplier_demand.DEMAND_NO" );
							$date = mysql_result($result1,$i, "supplier_demand.DEMAND_DATE" );
							$supplier = mysql_result($result1,$i, "supplier_master.SUPPLIER_NAME" );
							echo '<tr>
								<td width="100" align="left">&nbsp;'.$demand_no.'</td>
								<td width="250" align="left">&nbsp;'.$supplier.'</td>
								<td width="100" align="left">'.$date.'</td>
								<td width="90" align="center"><a href="javascript:order_details('.$demand_no.')" alt="Details" title="Details"><img src="images/Details.png" height="35" width="90" alt="Details" /></a></td>  
							  </tr>';
							$i++;
						} // while ends here
						echo '</table></div><br><br><br><br>';
				} // if ends here
				else
				{
					echo '<h1 class="style1" style=" font-size:14px;">Currently no Demands Raised</h1>';
				}
		  ?>
  
  </div>

<div id="demand_detail" style="width:580px; float:right; height:500px;">
  
  </div>
  
  </div>