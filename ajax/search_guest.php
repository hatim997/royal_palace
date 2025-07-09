<?php include('../config.php');	
	
		if(isset($_POST['guest']))
		{
			$queryString = $_POST['guest'];
			if(strlen($queryString) >0)
			{
				$query = "SELECT * FROM guest_master_tab WHERE GUEST_NAME LIKE '$queryString%' LIMIT 8";
				$result = mysql_query($query) or die("Failed: ".mysql_error());
				
				if(mysql_num_rows($result) != 0)
				{
					$num = mysql_num_rows($result);
					echo '<div id="del_dish" align="center" style="overflow:auto; height:300px; width:720px">
					  <table width="600" border="1" cellpadding="0" cellspacing="0" align="center">
						<thead>
						<tr>
							<td width="70" align="center"><strong>Guest ID</strong></td>
							<td width="200" align="center"><strong>Name</strong></td>
							<!--<td width="150" align="center"><strong>Father Name</strong></td>-->
							<td width="100" align="center"><strong>Cell No</strong></td>
							<td width="150" align="center"><strong>Email</strong></td>
							<td width="80" align="center"><strong>Select</strong></td>
						</tr>
						</thead>';
					$i = 0;
					while ($i < $num)
					{
						$id = mysql_result($result,$i, "GUEST_ID" );
						$name = mysql_result($result,$i, "GUEST_NAME" );
						$fname = mysql_result($result,$i, "GUEST_FATHER" );
						$dob = mysql_result($result,$i, "DATE_OF_BIRTH" );
						$cell = mysql_result($result,$i, "GUEST_MOBILE_NO" );
						$email = mysql_result($result,$i, "GUEST_EMAIL" );
						
						echo '<tr>
							<td width="70" align="left">&nbsp;'.$id.'</td>
							<td width="200" align="left">&nbsp;'.$name.'</td>
							<!--<td width="150" align="left">&nbsp;$fname.</td>-->
							<td width="100" align="left">&nbsp;'.$cell.'</td>
							<td width="150" align="left">&nbsp;'.$email.'</td>
							<td width="80" align="center"><input type="button" onclick="old_guest_form('.$id.')" class="button" align="left" style="cursor:pointer"name="Submit" value="Select" /></td>
							</tr>';
						//echo '<li>'.$name.'</li>';
						$i++;
	         		}
				}
				else
				{
					echo 'There is no such Record.';
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