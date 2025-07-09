<?php
include('config.php');
$a = "923005030500";
for($i = 0; $i < 500; $i++)
{
	$quer = "INSERT INTO abc VALUES('$a')";
	mysql_query($quer) or die ('Query failed!'.mysql_error());
	$a++;	
}
echo "Sequence 2 generated";

?>