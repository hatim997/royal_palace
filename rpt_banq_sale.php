<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
//include('update_activity.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Hotel Royal Palace</title>

	<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />
	<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css" />
	<script>
		$(function() {
			$("#from_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
			});
		});
	</script>
	<script>
		$(function() {
			$("#to_date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
			});
		});
	</script>
	<script type="text/javascript">
		function printSelection(node) {

			var content = node.innerHTML
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
		function printSelection(node) {

			var content = node.innerHTML
			var pwin = window.open('', 'print_content', 'width=800,height=700');

			pwin.document.open();
			pwin.document.write('<html><body onload="window.print()">' + content + '</body></html>');
			pwin.document.close();

			setTimeout(function() {
				pwin.close();
			}, 1000);

		}
	</script>

	<script language="javaScript" type="text/javascript">
		function search_ledger() {
			//alert("Ok");
			var from_date = document.getElementById("from_date").value;
			var to_date = document.getElementById("to_date").value;
			if (from_date == "") {
				alert("Please select correct from date.");
				return;
			}
			if (to_date == "") {
				alert("Please select correct to date.");
				return;
			}
			if (from_date >= current_date) {
				alert("From Date must be lesser than current date.");
				return;
			}
			if (to_date > current_date) {
				alert("To Date must be lesser than current date.");
				return;
			}
			if (from_date > to_date) {
				alert("From Date must be lesser than To date.");
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
					document.getElementById("response").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("POST", "ajax/a_sale_report.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send("from_date=" + from_date + "&to_date=" + to_date);
		}
	</script>

</head>

<body>
	<div id="process" style="margin-left:10px;">
		<h1 style="font-size:18px; color:#013c54;">Banquet Sales Report</h1>
		<div id="inventory">

			<table width="705" align="left">
				<tr>
					<td width="77">From Date:</td>
					<td width="172" id="show_ledger_level"><input type="text" id="from_date"></td>
					<td width="54">&nbsp;</td>
					<td width="62">To Date:</td>
					<td width="164"><input type="text" id="to_date"></td>
					<td width="41">&nbsp;</td>
					<td width="99" align="left"><a href="javascript:search_ledger()" alt="Search" title="Search">
							<img src="images/process.png" alt="Search" /></a></td>
					<input type="hidden" id="current_date" value="<?php echo $current_date; ?>">
				</tr>
			</table>
		</div>
		<div id="response" style="width:900px;">


		</div>
	</div>
	</div>
</body>

</html>