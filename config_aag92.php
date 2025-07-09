<?php


	  $host="localhost";
      $user ="aag92_rpalace916";
      $password1 ="rpalace916";
      $database ="aag92_rpalace";
	  
	  $conn=mysql_connect($host,$user,$password1) or die(mysql_errno());
	
	  if(!$conn)
	   {
	   	die ("cannot connect to mysql".mysql_error());    
	   }		
	 	  $dbc=mysql_select_db($database,$conn);
	   if(!$dbc)
	   {
	   	die ("unable to select database".mysql_error()); 
	   }
	   
	   //echo "sucessfully connected to database";

?>