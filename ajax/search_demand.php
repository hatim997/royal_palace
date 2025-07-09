<?php
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
?>
<?php include('../config.php');	
	
		if(isset($_POST['guest']))
		{
			$queryString = $_POST['guest'];
			$type = $_POST['type'];
			//echo "Value is ".$queryString;
			if(strlen($queryString) >0)
			{
				if($type == "D")
				{
					$query = "SELECT supplier_demand.DEMAND_NO, supplier_demand.INVOICE_NO, supplier_demand.DEMAND_DATE, 
								supplier_master.SUPPLIER_NAME 
								FROM supplier_demand, supplier_master 
								WHERE supplier_demand.SUPPLIER_ID = supplier_master.SUPPLIER_ID
								AND supplier_demand.DEMAND_NO LIKE '$queryString%' 
								GROUP BY supplier_demand.DEMAND_NO ASC";
				}
				else
				{
					$query = "SELECT supplier_demand.DEMAND_NO, supplier_demand.INVOICE_NO, supplier_demand.DEMAND_DATE, 
								supplier_master.SUPPLIER_NAME 
								FROM supplier_demand, supplier_master 
								WHERE supplier_demand.SUPPLIER_ID = supplier_master.SUPPLIER_ID
								AND supplier_master.SUPPLIER_NAME LIKE '$queryString%' 
								GROUP BY supplier_demand.DEMAND_NO ASC";
				}
												
				$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
				$num = mysql_num_rows($result1);
				if($num != 0)
				{
					/*
					if($num <= 8)
					{
						//echo '<div id="sup_demand" align="center" style="width:737px;">';
						echo '<div id="del_dish" align="center" style="width:560px;">';
					}
					else if($num > 10 && $num < 30)
					{
						//echo '<div id="sup_demand" align="center" style="overflow:auto; height:200px; width:737px">';
						echo '<div id="del_dish" align="center" style="overflow:auto; height:150px; width:560px;">';
					}
					else if($num > 30 && $num < 60)
					{
						//echo '<div id="sup_demand" align="center" style="overflow:auto; height:300px; width:737px">';
						echo '<div id="del_dish" align="center" style="overflow:auto; height:250px; width:560px;">';
					}
					else
					{
						//echo '<div id="sup_demand" align="center" style="overflow:auto; height:300px; width:737px">';
						echo '<div id="del_dish" align="center" style="overflow:auto; height:200px; width:560px;">';
					}
					*/
					echo '<table width="630" border="1" cellpadding="0" cellspacing="0" align="center">
							<thead>
							<tr>
								<td width="100" align="center"><strong>Demand No</strong></td>
								<td width="250" align="center"><strong>Supplier</strong></td>
								<td width="100" align="center"><strong>Date</strong></td>
								<td width="90" align="center"><strong>Status</strong></td>
								<td width="90" align="center"><strong>Details</strong></td>
							</tr>
							</thead>';
						$i=0;
						while($i < $num)
						{
							$demand_no = mysql_result($result1,$i, "supplier_demand.DEMAND_NO" );
							$invoice_no = mysql_result($result1,$i, "supplier_demand.INVOICE_NO" );
							$date = mysql_result($result1,$i, "supplier_demand.DEMAND_DATE" );
							$supplier = mysql_result($result1,$i, "supplier_master.SUPPLIER_NAME" );
							if($invoice_no == "" || $invoice_no == 0)
							{
								$status = "Pending";
								$flag = 0;
							}
							else
							{
								$status = "Received";
								$flag = 1;
							}
							echo '<tr>
								<td width="100" align="left">&nbsp;'.$demand_no.'</td>
								<td width="250" align="left">&nbsp;'.$supplier.'</td>
								<td width="100" align="left">&nbsp;'.$date.'</td>
								<td width="100" align="left">&nbsp;'.$status.'</td>
								<td width="90" align="center"><a href="javascript:demand_details('.$demand_no.','.$flag.')" alt="Details" title="Details"><img src="images/Details.png" height="35" width="90" alt="Details" /></a></td>  
							  </tr>';
							$i++;
						} // while ends here
						echo '</table></div><br><br><br><br>';
				} // if ends here
				else
				{
					echo '<h1 class="style1" style=" font-size:14px;">Demand not found</h1>';
				}
			} 
			else
			{
				// Dont do anything.
			} // There is a queryString.
		}
		else
		{
			echo 'There should be no direct access to this script!';
		}
	//}
?>