<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
//include('update_activity.php');
$userid =  $_SESSION['username'];
$password = $_SESSION['password'];

$restid = $_SESSION['restid'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Web Saucer</title>
	<meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. " Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
	<meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />
	<link href="templatemo_style16.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/resources/demos/style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>

	<style type="text/css">
		.overlay {
			position: fixed;
			top: 0%;
			left: 0%;
			width: 100%;
			height: 100%;
			background: #000;
			display: none;
			opacity: .5;
			filter: alpha(opacity=10);
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";

		}

		.new_popup {
			position: fixed;
			top: 10%;
			left: 15%;
			margin-left: -50px;
			margin-top: -10px;
			width: 80%;
			height: auto;
			display: none;
			background: #FFF;
			border: 1px solid #F00;
			z-index: 1000;
		}

		.style1 {
			color: #013c54
		}

		.style8 {
			color: #FF0000;
			font-style: italic;
		}

		h2 {
			margin: 0px;
			padding: 0px 0px 0px 0px;
			font-size: 15px;
			font-weight: bold;
			color: #013c54;
		}
	</style>
	<style type="text/css">
		.red {
			color: #F00;
			font-size: x-large;
			font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
			font-weight: bold;
		}

		.red1 {
			color: #F00;
		}

		body {
			background-color: #eeeeee;
			padding: 0;
			font-family: Arial, Helvetica, sans-serif;
			/*margin:0 auto;*/
			font-size: 11px;
			margin-left: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
			width: auto;
		}
	</style>



	<!--  <script type="text/javascript" >
	function validateForm()
	{

 if((document.getElementById("host_name").value&& document.getElementById("cnic").value&& document.getElementById("tel").value
 && document.getElementById("func").value)=="") 
		{
			alert("Necessary Fields must be entered");
			return false; 
			}
	}
	</script>-->
	<script type="text/javascript">
		function date_check(value) {
			var tdate = document.getElementById("today").value;
			if (value > tdate) {
				alert("You cannot select the future date");
				document.getElementById("date").value = tdate;
				return;
			}
		}
	</script>

	<script type="text/javascript">
		function load_item(itemid) {


			//var date = document.getElementById("date2").value;

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("load").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/store_item_detail.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("itemid=" + itemid);
		}
	</script>

	<script type="text/javascript">
		function newdemand() {

			//var date = document.getElementById("date2").value;

			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("d_num").value = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/store_demand_no.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send();
		}
	</script>


	<script type="text/javascript">
		function add_item() {

			var d_num = document.getElementById("d_num").value;
			if (d_num == "") {
				alert("First generate a demand");
				return;
			}
			var dept = document.getElementById("dept").value;
			if (dept == "") {
				alert("First select the department");
				return;
			}
			var item_id = document.getElementById("item_code").value;
			if (item_id == "") {
				alert("Select the item to add in the demand");
				return;
			}
			var item_name = document.getElementById("item_name").value;
			var item_qty = document.getElementById("item_qty").value;
			if (item_qty == "" || item_qty == 0) {
				alert("Enter the valid quantity of item");
				return;
			}
			var date = document.getElementById("date").value;


			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("mid3column_box").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/add_item_demand.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("item_id=" + item_id + "&item_name=" + item_name + "&item_qty=" + item_qty + "&date=" + date + "&d_num=" + d_num + "&dept=" + dept);
		}
	</script>
	<script type="text/javascript">
		function delete_item(sr_no, d_num) {
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("mid3column_box").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/del_item_demand.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("sr_no=" + sr_no + "&d_num=" + d_num);
		}
	</script>
	<script type="text/javascript">
		function generate_demand() {

			var d_num = document.getElementById("d_num").value;
			if (d_num == "") {
				alert("First generate a demand");
				return;
			}
			var xmlhttp;
			if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else { // code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					alert("Demand is generated successfully");
					document.getElementById("none").innerHTML = xmlhttp.responseText;
					newdemand();
				}
			}
			xmlhttp.open("POST", "ajax/generate_demand.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("d_num=" + d_num);
		}
	</script>
	<script type="text/javascript">
		function printSelection(node) {

			var content = node.innerHTML;

			var pwin = window.open('', 'print_content', 'width=800,height=700');

			pwin.document.open();

			pwin.document.write('<html><body onload="window.print()">' + content + '</body></html>');
			pwin.document.close();

			setTimeout(function() {
				pwin.close();
			}, 1000);

		}
	</script>
	<script type="text/javascript">
		var clicked = false;

		function CheckBrowser() {
			//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
			if (clicked == false) {
				//alert("Browser closed");
				var xmlhttp;

				if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
					xmlhttp = new XMLHttpRequest();
				} else { // code for IE6, IE5
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("none").innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.open("POST", "logout.php", true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send();
			} // if ends here
		}
	</script>



	<script>
		$(function() {
			$("#date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd"
			});
		});
	</script>

</head>

<body>


	<div id="templatemo_content">
		<p><span class="red">Department Demands</span></p>
		<h1 class="style1" align="left" style=" font-size:12px;"><?php echo $today; ?></h1>

		<form name="form1" id="form1" action="" method="post" onsubmit="return validateForm()">
			<div id="leftcolumn_box">
				<table border="0">
					<tr>
						<td>
							<div align="justify">
								<h2><strong>Items</strong></h2>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div align="justify">
								<select name="items" id="items" size="30" width="150" onclick="load_item(this.value);" style="width:250px; border: 2px solid #CCC;">
									<?php
									$query5 = "SELECT * FROM store_master_tab";
									$result5 = mysqli_query($conn, $query5);
									while ($men1 = mysqli_fetch_array($result5)) {
									?>
										<option height="35" style="height:35px; border:thick; color:#F00;" value="<?php echo $men1['INGREDIENT_ID']; ?>">
											<?php echo $men1['INGREDIENT_NAME']; ?>
										</option>
									<?php } ?>
								</select>

							</div>
						</td>
					</tr>
				</table>

				<p>&nbsp;</p>

			</div>

			<div id="mid1column_box">
				<p>&nbsp;</p>
				<p>&nbsp;</p>

				<table width="343" border="0">
					<tr>
						<th width="130">
							<div align="justify">Demand No</div>
						</th>
						<td width="203">
							<div align="justify">
								<input name="d_num" id="d_num" type="text" readonly="readonly" />
							</div>
						</td>
					</tr>
					<tr>
						<th width="130">
							<div align="justify">Demand Date</div>
						</th>
						<td width="203">
							<div align="justify">
								<?php
								$tdate = mktime(0, 0, 0, date("m"), date("d"), date("Y"));

								?>
								<input name="today" type="hidden" id="today" value="<?php echo date("Y-m-d", $tdate); ?>" />
								<input type="text" size="10" name="date" id="date" value="<?php echo date("Y-m-d", $tdate); ?>" onchange="date_check(this.value);" />
							</div>
						</td>
					</tr>
					<tr>
						<th width="130">
							<div align="justify">Department</div>
						</th>
						<td width="203" align="left">
							<div align="justify">
								<select id="dept" name="dept">
									<option value="">Select Department</option>
									<?php
									$query = "SELECT * FROM group_tab";
									$result = mysqli_query($conn, $query) or die('Not Found: ' . mysqli_error($conn));
									$num = mysqli_num_rows($result);
									$i = 0;
									while ($i < $num) {
										mysqli_data_seek($result, $i);
										$row = mysqli_fetch_assoc($result);
										$group_id = $row["GROUP_ID"];
										$group_name = $row["GROUP_NAME"];
										echo '<option value="' . $group_name . '">' . $group_name . '</option>';
										$i++;
									}
									?>
								</select>

							</div>
						</td>
					</tr>
				</table>
				<div id="load">
					<table width="343" border="0">
						<tr>
							<th width="94">
								<div align="justify">Item Code</div>
							</th>
							<td width="125">
								<div align="justify">
									<input type="text" name="item_code" id="item_code" readonly="readonly" />
								</div>
							</td>
						</tr>
						<tr>
							<th>
								<div align="justify">Item Name</div>
							</th>
							<td>
								<div align="justify">
									<input name="item_name" type="text" id="item_name" readonly="readonly" />
								</div>
							</td>
						</tr>
						<tr>
							<th>
								<div align="justify">Quantity</div>
							</th>
							<td>
								<div align="justify">
									<input name="item_qty" type="text" id="item_qty" />
								</div>
							</td>
						</tr>
					</table>
				</div>
				</br></br>
				<table>
					<tr>
						<td width="186"></td>
						<td width="144">
							<input name="additem" type="button" value="Add item in demand" onclick="add_item();" style="background: #F30; color:#000; font-weight:700;" />
						</td>
					</tr>
				</table>

				<p>&nbsp;</p>
			</div>
			<div id="mid3column_box">

			</div>
			<div id="bottomcolumn_box">
				<p></p>
				<input type="button" name="new_demand" value="New Demand" style="background: #F30; color:#000; height:35px; width:auto; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" onclick="newdemand();" />
				<input name="g_demand" type="button" value="Generate Demand" onclick="generate_demand();" style="background: #F30; color:#000; height:35px; width:auto; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" />
				<input name="print" type="button" value="Print" onclick="printSelection(document.getElementById('mid3column_box'));return false" style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" />
				<input name="exit" type="button" value="Exit" style="background: #F30; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" onclick="window.location.href='store_admin.php'" />

			</div>

		</form>
	</div>
	</div>

	<!-- end of content -->



</body>

</html>