<style type="text/css">
<!--
.style8 {
	color: #333333;
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
}
.style9 {
	color: #666666;
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
-->
</style>
<marquee behavior="scroll"  direction="up" style="cursor:pointer" onmouseover="this.stop()" onmouseout="this.start()" height="180" scrolldelay="320">
<ul>
<?php
include('config.php');
$current_date = date('Y-m-d');
$query = "SELECT * FROM notice_board_tab WHERE STARTED_DATE <= '$current_date' AND END_DATE >= '$current_date'";
$result = mysql_query($query);
$num = mysql_numrows($result);
$i = 0;
while($i < $num)
{
	$notice_detail = mysql_result($result,$i,"NOTICE_DETAIL");
	$start_date = mysql_result($result,$i,"STARTED_DATE");
?>

	<li><div align="left"><span class="style9"><strong>&rArr;</strong>&nbsp;<?php echo $start_date."<br>&nbsp;&nbsp;&nbsp;&nbsp;".$notice_detail; ?></span></div><br><br>
	  <br>
<?php
    $i++;
} //while ends here
?>					
</li>
</ul>
</marquee>