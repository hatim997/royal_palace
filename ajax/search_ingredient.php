<?php include('../config.php');	
	
		if(isset($_POST['guest']))
		{
			$queryString = $_POST['guest'];
			if(strlen($queryString) >0)
			{
				$query = "SELECT * FROM ingredient_tab WHERE INGREDIENT_NAME LIKE '$queryString%' LIMIT 4";
				$result = mysql_query($query) or die("Failed: ".mysql_error());
				
				if(mysql_num_rows($result) != 0)
				{
					$num = mysql_num_rows($result);
					echo '<div id="del_dish" align="center" style="overflow:auto; height:250px; width:720px">
					  <table width="700" border="1" cellpadding="0" cellspacing="0" align="center">
						<thead>
						<tr>
							<td width="70" align="center"><strong>Guest ID</strong></td>
							<td width="150" align="center"><strong>Name</strong></td>
							<td width="150" align="center"><strong>Father Name</strong></td>
							<td width="80" align="center"><strong>Date of Birth</strong></td>
							<td width="100" align="center"><strong>Cell No</strong></td>
							<td width="150" align="center"><strong>Email</strong></td>
						</tr>
						</thead>';
					$i = 0;
					while ($i < $num)
					{
						$ingredient_id = mysql_result($result,$i, "INGREDIENT_ID" );
						
						echo '<a href="javascript:old_guest_form('.$ingredient_id.')"><tr>
							<td width="70" align="left">&nbsp;'.$ingredient_id.'</td>
							</tr></a>';
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