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
<marquee behavior="scroll" direction="up" style="cursor:pointer" onmouseover="this.stop()" onmouseout="this.start()" height="180" scrolldelay="320">
	<ul>
		<?php
		include('config.php');
		$current_date = date('Y-m-d');

		$query = "SELECT * FROM notice_board_tab WHERE STARTED_DATE <= '$current_date' AND END_DATE >= '$current_date'";
		$result = mysqli_query($conn, $query);
		$num = mysqli_num_rows($result);

		$i = 0;
		while ($i < $num) {
			mysqli_data_seek($result, $i);
			$row = mysqli_fetch_assoc($result);

			$notice_detail = $row['NOTICE_DETAIL'];
			$start_date = $row['STARTED_DATE'];
		?>


			<li>
				<div align="left"><span class="style9"><strong>&rArr;</strong>&nbsp;<?php echo $start_date . "<br>&nbsp;&nbsp;&nbsp;&nbsp;" . $notice_detail; ?></span></div><br><br>
				<br>
			<?php
			$i++;
		} //while ends here
			?>
			</li>
	</ul>
</marquee>