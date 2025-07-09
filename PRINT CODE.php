<div align="left" class="story" id="mydiv">
      <img src="images/Header.jpg" width="620" height="150" /><br /><br />	
			<?php
			
				$pid = $_GET['pid'];
				$tid = $_GET['tid'];
				$sid = $_GET['sid'];
				//echo $pid."<br><br>";
				//echo $tid."<br><br>";
				//echo $sid."<br><br>";
				$query = "SELECT * FROM patient_master_tab WHERE PATIENT_ID = '$pid'";
				$result = mysql_query($query) or die ('Query failed!'.mysql_error());
				$num = mysql_numrows($result);
			?>
        <table width="500" border="0" cellpadding="0" cellspacing="5" align="left">
		<?php
            $i=0;
            while($i < $num)
            {
                $id = mysql_result($result,$i, "PATIENT_ID" );
                $name = mysql_result($result,$i, "PATIENT_NAME" );
                $sex = mysql_result($result,$i, "PATIENT_SEX" );
                $age = mysql_result($result,$i, "PATIENT_AGE" );
                
        ?>
            <tr><td width="100" align="left"><strong>Patient ID</strong></td><td align="left"><?php echo $id; ?></td>
            <td width="40" align="left"><strong>Date:</strong></td>
            <td width="80" align="left"><?php echo date('d/m/Y'); ?></td></tr>
            <tr><td width="100" align="left"><strong>Name</strong></td><td align="left"><?php echo $name; ?></td></tr>
            <tr><td width="100" align="left"><strong>Gender</strong></td><td align="left">
			<?php 
				if($sex == "m")
					echo "Male";
				else
					echo "Female";
			?></td></tr>
            <tr><td width="100" align="left"><strong>Age</strong></td><td align="left"><?php echo $age; ?></td></tr>
		<?php
				$i++;
			}  //while loop end
		?>
        		</table><br /><br /><br /><br /><br /><br /><br /><br />
                <table width="580" border="1" cellpadding="0" cellspacing="0" align="left">
                <thead>
					<tr>
                       <td width="140" align="left"><strong>Test</strong></td>
                       <td width="100" align="left"><strong>Laboratory</strong></td>
                      <td width="110" align="left"><strong>Charges</strong></td>
                      <td width="110" align="left"><strong>Discount</strong></td>
                       <td width="120" align="left"><strong>Report Collection Date</strong></td>
					</tr>
				</thead>
        <?php
			$testid = explode(":", $tid);
			$no = count($testid);
			$sampleid = explode(":", $sid);
			for($i = 0; $i < $no; $i++)
			{
				$test_id = $testid[$i];
				$sample_id = $sampleid[$i];
				$query = "SELECT test_tab.TEST_NAME, test_tab.TEST_COMPLETION, lab_tab.LAB_NAME,
							sample_test_tab.SAMPLE_ID, sample_test_tab.TEST_CHARGES, sample_test_tab.DISCOUNT, 
							sample_test_tab.RECIEVED_CHARGES 
							FROM sample_test_tab, test_tab, lab_tab
							WHERE sample_test_tab.TEST_ID = test_tab.TEST_ID
							AND test_tab.LAB_ID = lab_tab.LAB_ID
							AND sample_test_tab.PATIENT_ID = '$pid' 
							AND sample_test_tab.SAMPLE_ID = '$sample_id' 
							AND sample_test_tab.TEST_ID = '$test_id' 
							ORDER BY sample_test_tab.SAMPLE_ID ASC";
				$result = mysql_query($query) or die ('Query failed!'.mysql_error());
				$num = mysql_numrows($result);
				$j = 0;
				while($j < $num)
				{
					$test = mysql_result($result,$j, "test_tab.TEST_NAME" );
					$c_time = mysql_result($result,$j, "test_tab.TEST_COMPLETION" );
					$lab = mysql_result($result,$j, "lab_tab.LAB_NAME" );
					$charges = mysql_result($result,$j, "sample_test_tab.TEST_CHARGES" );
					$discount = mysql_result($result,$j, "sample_test_tab.DISCOUNT" );
					$recieved = mysql_result($result,$j, "sample_test_tab.RECIEVED_CHARGES" );
					$total_charges = $total_charges + $charges;
					$total_discount = $total_discount + $discount;
					$total_recieved = $total_recieved + $recieved;
		?>
        		<tr>
                    <td width="150" align="left"><?php echo $test; ?></td>
                    <td width="60" align="left"><?php echo $lab; ?></td>                            
                    <td width="100" align="left"><?php echo $charges; ?></td>
                    <td width="80" align="left"><?php echo $discount; ?></td>
                    <td width="100" align="left"><?php echo date("d/m/Y", mktime(0, 0, 0, date("m"), date("d")+$c_time, date("Y"))); ?></td>
                </tr>
        <?php
					$j++;
				} // while ends here
				$net = $total_charges - $total_discount;
			} // for loop ends here
		?>
      
                </table><br /><br /><br /><br /><br /><br /><br /><br />
                <table width="230" border="0" cellpadding="0" cellspacing="5" align="left">
                <tr>
                   <td width="120" align="left"><strong>Total Charges:</strong></td><td width="60" align="left"><?php echo $total_charges; ?></td>
                </tr>
                <tr>
                   <td width="120" align="left"><strong>Total Discount:</strong></td><td width="60" align="left"><?php echo $total_discount; ?></td>
                </tr>
                <tr>
                   <td width="120" align="left"><strong>Total Received:</strong></td><td width="60" align="left"><span class="style3"><?php echo $total_recieved; ?></span></td>
                </tr>
                <tr>
                   <td width="120" align="left"><strong>Balance Amount:</strong></td>
                   <td width="60" align="left">
				   <?php 
				   		
						if($total_recieved < $net)
						{
							echo $net - $total_recieved;
						}
						else
						{
							echo "0";
						} 
				   ?></td>
                </tr>
                
                </table>
                
			</div>
            <br />
            <a href="" class="style2" onclick="printSelection(document.getElementById('mydiv'));return false">Print Out</a>      </div>
		</div>