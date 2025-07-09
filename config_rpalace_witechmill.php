<?php


	  $host="localhost";
      $user ="witechmi_rpalace";
      $password1 ="rpalace99";
      $database ="witechmi_rpalace";
	  
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