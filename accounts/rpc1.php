<?php include('config.php');	
	
		if(isset($_POST['queryString']))
		{
			$queryString = $_POST['queryString'];
			if(strlen($queryString) >0)
			{
				$query = "SELECT CLIENT_NAME FROM client_master_tab WHERE CLIENT_NAME LIKE '$queryString%' LIMIT 4";
				$result = mysql_query($query) or die("Failed: ".mysql_error());
				
				if(mysql_num_rows($result) != 0)
				{
					$num = mysql_num_rows($result);
					$i = 0;
					while ($i < $num)
					{
						$name = mysql_result($result,$i, "CLIENT_NAME" );
						echo '<li onClick="fill(\''.$name.'\');">'.$name.'</li>';
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