<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GAP + 1</title>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="templatemo_style7.css" rel="stylesheet" type="text/css" />

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#dialog" ).dialog({
autoOpen: false,
height: 560,
width: 720,
show: {
effect: "blind",
duration: 1000
},
hide: {
effect: "explode",
duration: 1000
}
});
$( "#opener" ).click(function() {
$( "#dialog" ).dialog( "open" );
});
});
</script>

<!--<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

<script language="JavaScript">
	new tcal ({
		'formname': 'dish',
		'controlname': 'from'
	});
	</script>
    
  <script language="JavaScript">
	new tcal ({
		'formname': 'dish',
		'controlname': 'to'
	});
	</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>-->
<!--<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#orders').load('ajax/show_kitchen_orders.php').fadeIn("slow");
}, 60000); // refresh every 10000 milliseconds
</script>
-->
<!--<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>-->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
	$(".datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
  });
  function validate(){
  var from = encodeURIComponent(document.getElementById("limitup").value);
	var to = encodeURIComponent(document.getElementById("limit").value);
	//var banquet = encodeURIComponent(document.getElementById("banquet").value);
	//var num_rows = encodeURIComponent(document.getElementById("num_rows").value);
	
	//alert("erst is "+rest+" and from is "+from+" and to is "+to);
	if(from > to)
	{
		alert("From Date must be less than To Date");
		return false;	
	}
  }
  </script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
    $(function() {
        $( "#from_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
    });
    </script>
    <script>
    $(function() {
        $( "#to_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
	$("#show").hide();
	$("#view-record").click(function(){
		
		$("#show").toggle();
		});
	
	$("#show1").hide();
	$("#view-record1").click(function(){
		
		$("#show1").toggle();
		});
    });
    </script>
    
<script type="text/javascript">
function printSelection(node)
{
  var content1 = document.getElementById('show').innerHTML;
  var content=node.innerHTML;
  var pwin=window.open('','print_content','width=1000,height=700');
  pwin.document.open();
  pwin.document.write('<html><body onload="window.print()">'+content+content1+'</body></html>');
  pwin.document.close();
  setTimeout(function(){pwin.close();},1000);
}
</script>

<script type="text/javascript">
function printSelection1(node)
{
  var content1 = document.getElementById('show1').innerHTML;
  var content=node.innerHTML;
  var pwin=window.open('','print_content','width=1000,height=700');
  pwin.document.open();
  pwin.document.write('<html><body onload="window.print()">'+content+content1+'</body></html>');
  pwin.document.close();
  setTimeout(function(){pwin.close();},1000);
}
</script>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--

.style1 {
	color: #013c54
}
.style8 {color: #FF0000; font-style: italic; }

h2 {
	margin: 0px;
	padding: 0px 0px 0px 0px;
	font-size: 15px;
	font-weight: bold;
	color:#013c54;
}


-->
</style>
<style>
.styl {
	padding:0;
	margin:auto;
	width:500px;
}
</style>
<style type="text/css">
/*- Menu 2--------------------------- */
	
#menu2 {
	width: 225px;
	margin: -20px;
	border-color: #D8D5D1;
	
	}
	
#menu2 li a {
  	voice-family: "\"}\""; 
  	voice-family: inherit;
  	height: 18px;
	text-decoration: none;
	}	
	
#menu2 li a:link, #menu2 li a:visited {
	color: #013c54;
	display: block;
	background:url(EBmenus/Vertical%20Menus/menu2.png);
	padding: 4px 0 0 30px;
		}
	
#menu2 li a:hover {
	color: #FFFFFF;
	background:  url(EBmenus/Vertical%20Menus/menu2.png) 0 -32px;
	padding: 8px 0 0 32px;
	}
	.style3 {
	color: #013c54;
	font-size: 12px;
}

</style>

<style type="text/css">

table.altrowstable tr:nth-child(odd){    background-color: #a7dbf0; }


</style>


<meta http-equiv="Content-Type" content="text/html;">
<script language="javaScript" type="text/javascript" src="calendar.js"></script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->



<!-- Table goes in the document BODY -->

<script language="javaScript" type="text/javascript">
function search_trial_balance()
{
	//alert("Ok");
	var type = document.getElementById("type").value;
	var to_date = document.getElementById("to_date").value;
	var sorting = document.getElementById("sort").value;
	var posting_date = document.getElementById("posting_date").value;
	//var current_date = document.getElementById("current_date").value;
	var last_trial_date = document.getElementById("last_trial_date").innerHTML;
	//alert(last_trial_date);
	if(sorting == "")
	{
		alert("Please select correct option.");
		return;
	}
	if(type == "")
	{
		alert("Please select trial balance level.");
		return;
	}
	if(to_date == "")
	{
		alert("Please select correct to date.");
		return;
	}
	if(posting_date >= to_date)
	{
		alert("To Date must be lesser than last posting date "+ posting_date);
		return;
	}
	if(last_trial_date == to_date)
	{
		alert("To Date is equal to last trial date "+ last_trial_date);
		return;
	}
	var a = confirm("Your last trial balance info will be changed ?");
	if(a)
	{
		document.getElementById("trial_balance").style.border = "solid 1px";
		//document.getElementById("trial_balance").style.height = "70px";
		document.getElementById("trial_balance").style.width = "1000px";
		document.getElementById("trial_balance").style.backgroundColor = "#E6F0F5";
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  document.getElementById("trial_balance").innerHTML= '<div align="center"><br><br><img src="images/ajax-loader.gif" alt="Loading Please wait....." title="Loading Please wait....." /></div>';
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("trial_balance").innerHTML=xmlhttp.responseText;
				$("#view-record1").click(function(){
		
		$("#show1").toggle(500);
		});
			}
		  }
		xmlhttp.open("POST","ajax/show_trial_balance1.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("to_date="+to_date+"&type="+type+"&sorting="+sorting+"&last_trial_date="+last_trial_date);
	}
	else
	{
		return;	
	}
}
</script>

<script language="javaScript" type="text/javascript">
function show_trial_balance(value)
{
	//alert("Value is "+ value);
	if(value == "")
	{
		document.getElementById("balance_info").innerHTML = '<table align="left" width="983"><tr><td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Debit:</b></td><td width="419" align="left">&nbsp;</b></td><td width="166" height="5" align="left">&nbsp;</td><td width="142" height="5" align="left"><b>Last Trial Balance Date:</b></td><td width="131" align="left">&nbsp;</td></tr><tr><td width="101" height="5" align="left">&nbsp;&nbsp;<b>Total Credit:</b></td><td width="419" align="left">&nbsp;</td><td width="166" height="5" align="left">&nbsp;</td><td width="142" height="5" align="left">&nbsp;</td><td width="131" align="left"><b>&nbsp;</b></td></tr><tr><td width="101" height="5" align="left">&nbsp;&nbsp;<b>Balance:</b></td><td width="419" align="left">&nbsp;</td><td width="166" height="5" align="left">&nbsp;</td><td width="142" height="5" align="left">&nbsp;</td><td width="131" align="left">&nbsp;</td></tr></table>';
		//document.getElementById("show_ledger_level").innerHTML = "";
		return;
	}
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  document.getElementById("balance_info").innerHTML= '<div align="center"><br><br><img src="images/ajax-loader.gif" alt="Loading Please wait....." title="Loading Please wait....." /></div>';
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("balance_info").innerHTML=xmlhttp.responseText;
			$("#view-record").click(function(){
		
		$("#show").toggle(500);
		});
		}
	  }
	xmlhttp.open("POST","ajax/show_trial_balance.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script language="javaScript" type="text/javascript">
function voucher_title(value)
{
	
	//alert("Status is "+orderno);
	if(value == "")
	{
		//alert("Please enter valid date");
		document.getElementById("accountcode").value = "";
		document.getElementById("cheque_no").value = "Cheque No here";
		return;
	}
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("show_account_code").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_account_code.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
	
	
	var xmlhttp1;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp1=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp1.onreadystatechange=function()
	  {
	  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
		{
			document.getElementById("show_cheque_no").innerHTML=xmlhttp1.responseText;
		}
	  }
	xmlhttp1.open("POST","ajax/show_cheque_no.php",true);
	xmlhttp1.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp1.send("value="+value);
}
</script>

<script language="javaScript" type="text/javascript">
function save_form()
{
	
	//alert("Ok");
	var vouchertype = document.getElementById("vouchertype").value;
	var voucherid = document.getElementById("voucherid").value;
	var cheque_no = document.getElementById("cheque_no").value;
	//alert(voucherid);
	//return;
	var title = document.getElementById("title").value;
	var accountcode = document.getElementById("accountcode").value;	
	var trn_date = document.getElementById("trn_date").value;
	var comments = document.getElementById("comments").value;
	var trn_amount = document.getElementById("trn_amount").value;
	var amounttype = document.getElementById("amounttype").value;
	var last_date = document.getElementById("last_date").value;
	
	//alert("erst is "+rest+" and from is "+from+" and to is "+to);
	
	if(vouchertype == "")
	{
		alert("Please select a valid Voucher Type");
		return;
	}
	if(title == "")
	{
		alert("Please select a valid Account Title");
		return;
	}
	if(amounttype == "")
	{
		alert("Please enter a valid Amount Type");
		return;
	}
	if(trn_date == "")
	{
		alert("Please enter valid date");
		return;
	}
	if(trn_date <= last_date)
	{
		alert("Transaction date cannot be less than equal to Last Posting Date.");
		return;
	}
	if(parseInt(trn_amount) <= 0 )
	{
		alert("Please enter a valid Amount");
		return;
	}
	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_account_trans.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("vouchertype="+vouchertype+"&voucherid="+voucherid+"&title="+title+"&comments="+comments
	+"&accountcode="+accountcode+"&trn_date="+trn_date+"&trn_amount="+trn_amount+"&amounttype="+amounttype+"&cheque_no="+cheque_no);
}
</script>

<script language="javaScript" type="text/javascript">
function delete_transaction(transaction_id)
{
	//alert("Ok");
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/delete_transaction.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("transaction_id="+transaction_id);
}
</script>

<script language="javaScript" type="text/javascript">
function edit_transaction(transaction_id)
{
	//alert("Ok");	
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("center").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/edit_transaction.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("transaction_id="+transaction_id);
}
</script>

<script language="javaScript" type="text/javascript">
function edit_save_transaction(transaction_id)
{
	//alert("Ok");
	var amount = document.getElementById("amount").value;
	var type = document.getElementById("type").value;
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/edit_save_transaction.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("transaction_id="+transaction_id+"&amount="+amount+"&type="+type);
}
</script>

<script language="javaScript" type="text/javascript">
function show_voucher_detail(voucher_id)
{
	//alert("Ok");
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_voucher_detail.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("voucher_id="+voucher_id);
}
</script>

<script language="javaScript" type="text/javascript">
function cancel_voucher()
{
	//alert("Ok");
	var voucher_id = document.getElementById("voucherid").value;
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("parent").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/cancel_voucher.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("voucher_id="+voucher_id);
}
</script>

<!--
<script language="javascript" type="text/javascript">
function create_value()
{
	var transactionid = document.getElementById("transactionid").value;
	var voucherid = document.getElementById("voucherid").value;
	var vouchertype = document.getElementById("vouchertype").value;
	var voucherdate = document.getElementById("voucherdate").value;	
	var accountcode = document.getElementById("accountcode").value;
	
		var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("center").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/collection.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("voucherid="+voucherid+"&transactionid="+transactionid+"&vouchertype="+vouchertype+"&voucherdate="+voucherdate
	+"&accountcode="+accountcode);
}	
</script>
-->
<script language="javaScript" type="text/javascript">
function show_scat2_info(value)
{
	//alert("Status is "+orderno);
	if(value == "")
	{
		document.getElementById("scat_info").innerHTML = "";
		//document.getElementById("scat_info").style.border = "0px";
		return;
	}
	//alert(value);
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("scat_info").innerHTML=xmlhttp.responseText;
			//document.getElementById("scat_info").style.border = "1px solid black";
		}
	  }
	xmlhttp.open("POST","ajax/show_scat2_info.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
}
</script>

<script type="text/javascript">
    var clicked= false;
	function CheckBrowser()
    {
		//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
		if(clicked==false)
		{
			//alert("Browser closed");
			var xmlhttp;
			
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("none").innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("POST","logout.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send();
		} // if ends here
	}
</script>

<link href="calendar.css" rel="stylesheet" type="text/css">
</head>

<body onclick = "clicked=true;" onbeforeunload="CheckBrowser()">



<div id="templatemo_container">
   
    <?php //include("includes/header2.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
        <div id="dialog" title="Help Income Statement">
<p>Income statement is a screenshot of the financial condition of an organization by considering its all revenues and expenses earned throughout the year. It thus contains all the cash inflows and outflows of a firm incurred due to business transactions.<br>
<img src="images/gap/income_statement.jpg" /></p>
</div>
       
    	  <h1 class="style1" style=" font-size:16px;">Income Statement<img src="images/help.png" height="25" width="25" alt="Help" title="Help" id="opener" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php">Back</a><br>
<span class="style3"><?php echo $today; ?></span></h1>
    
    <form action="income_statement1.php" method="post" name="date"  onSubmit="return validate()">
  <!--<h1 style="text-align:center ">Income Statement</h1>-->
  <div class="styl"> <strong>From:</strong>
    <input id="limitup" name="limitup" type="text" class="datepicker" />
    <strong>To:</strong>
    <input id="limit" name="limit" type="text" class="datepicker" />
    <input type="submit" name="submit" value="Search"/>
    <br/>
    <br/>
    <!--<strong> From: </strong><select name='limitup'>
<option value="2011-08-1">August 2011</option>
<option value="2011-09-1">September 2011</option></select>
<strong>To:</strong> <select name="limit">
<option value="2012-01-1">January 2012</option></select>--> 
    
  </div>
</form>
<?php
if(isset($_POST['submit']))
{

?>
<table border="0" style="margin:0; padding:0;" >
  <tr>
    <td><table border="1" style="background-color:#B6E6F1;" width="200px" height="520px">
        <tr>
          <th> Category</th>
        </tr>
        <tr>
          <th> Sales</th>
        </tr>
        <tr>
          <th> Cost of Sales</th>
        </tr>
        <tr>
          <th> Gross Profit Loss</th>
        </tr>
        <tr>
          <th> Administrative expences</th>
        </tr>
        <tr>
          <th> Selling Expences</th>
        </tr>
        <tr>
          <th> Financial Charges</th>
        </tr>
        <tr>
          <th> Other Charges</th>
        </tr>
        <tr>
          <th>&nbsp; </th>
        </tr>
        <tr>
          <th> Operating Expences</th>
        </tr>
        <tr>
          <th> Other Income</th>
        </tr>
        <tr>
          <th> Net Profit loss before tax</th>
        </tr>
        <tr>
          <th> Taxation</th>
        </tr>
        <tr>
          <th> Net Profit loss after tax</th>
        </tr>
      </table></td>
    <?php
		 
			
//var_dump($_POST[]);
$from=$_POST['limitup'];
$to=$_POST['limit'];
$end_date = $to." 23:59:59";
$date1 = strtotime($from);
$date2 = strtotime($to);
/*
$diff=$date1-$to;
if($diff<1){
	echo "Invalid date";
	}*/
$months = 1;


$my_date = explode("-", $from);
while (($date1 = strtotime('+1 MONTH', $date1)) <= $date2)
    $months++;
//echo "Months are ".$months."<br>";
			//$i=$months;
			$asif=0;
	
			while($asif < $months){
				
				$start_date = date("Y-m-d", mktime(0,0,0, date($my_date[1]+$asif), date($my_date[2]), date($my_date[0])));
				$start_date = $start_date." 00:00:00";
				//Sales
				$sales=0;
				$query = "SELECT * FROM voucher_transaction
				WHERE ACCOUNT_CODE Like '07%' AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'";
				$result= mysql_query($query) or die("Error ". mysql_error()) ;
				$i=0;
				$num_rows = mysql_num_rows($result);
				while($i<$num_rows){
				
				$amount=mysql_result($result,0,"TRN_AMOUNT");
				$sales= $sales + $amount;
				$i++;
				}
				
				
//Cost of Sales
$cost_of_sales1=0;	
$result=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '08%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$j=0;
$num_rows_sale1 = mysql_num_rows($result);
while($j<$num_rows_sale1){
$amount1=mysql_result($result,0,"TRN_AMOUNT");
$cost_of_sales1= $cost_of_sales1 + $amount1;
$j++;
}
$cost_of_sales2=0;	
$result2=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '09%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$k=0;
$num_rows_sale2 = mysql_num_rows($result2);
while($k<$num_rows_sale2){
$amount2=mysql_result($result2,0,"TRN_AMOUNT");
$cost_of_sales2= $cost_of_sales2 + $amount2;
$k++;
}
$cost_of_sales=$cost_of_sales1 + $cost_of_sales2;
// PROFIT LOSS
$gross_profit_loss=0;
$gross_profit_loss=$sales - $cost_of_sales;

//Administrative Expences
$admin_expences=0;
$result3=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '10%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$l=0;
$num_rows3 = mysql_num_rows($result3);
while($l<$num_rows3){

$amount3=mysql_result($result3,0,"TRN_AMOUNT");
$admin_expences= $admin_expences + $amount3;
$l++;
}


//Selling Expences
$selling_expences=0;
$result4=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '11%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$m=0;
$num_rows4 = mysql_num_rows($result4);
while($m<$num_rows4){

$amount4=mysql_result($result4,0,"TRN_AMOUNT");
$selling_expences= $selling_expences + $amount4;
$m++;
}

//Financial Charges
$financial_charges=0;
$result5=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '12%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$n=0;
$num_rows5 = mysql_num_rows($result5);
while($n<$num_rows5){
$amount5=mysql_result($result5,0,"TRN_AMOUNT");
$financial_charges= $financial_charges + $amount5;
$n++;
}

//Other Charges
$other_charges=0;
$result6=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '13%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$p=0;
$num_rows6 = mysql_num_rows($result6);
while($p<$num_rows6){
$amount6=mysql_result($result6,0,"TRN_AMOUNT");
$other_charges= $other_charges + $amount6;
$p++;
}

//Total Charges
$total_charges=0;
$total_charges=$admin_expences + $selling_expences + $financial_charges +$other_charges;

// Operating Profit Loss
$op_profit_loss=$gross_profit_loss - $total_charges;


//Other Income
$other_income=0;
$result7=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '14%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$r=0;
$num_rows7 = mysql_num_rows($result7);
while($r<$num_rows7){
$amount7=mysql_result($result7,0,"TRN_AMOUNT");
$other_income= $other_income + $amount7;
$r++;
}

//Net Profit loss before taxation
$profit_loss_b_tax=0;
$profit_loss_b_tax= $op_profit_loss + $other_income;

//Taxation
$tax=0;
$result8=mysql_query("SELECT * FROM voucher_transaction
WHERE ACCOUNT_CODE Like '15%'  AND CREATED_ON >= '$start_date' AND CREATED_ON <= '$end_date'");
$s=0;
$num_rows8 = mysql_num_rows($result8);
while($s<$num_rows8){
$amount8=mysql_result($result8,0,"TRN_AMOUNT");
$tax= $tax + $amount8;
$s++;
}


//Net Profit loss after taxation
$profit_loss_a_tax=0;
$profit_loss_a_tax= $profit_loss_b_tax - $tax;
//mysql_close($con);

				
				?>
    <td ><table border="1" width="100px" height="520px" style="background-color:#FFDDA3;">
        <tr>
          <td><strong> <?php echo $today = date("M Y", mktime(0,0,0, date($my_date[1]+$asif), date($my_date[2]), date($my_date[0])));?></strong></td>
        </tr>
        <tr>
          <td><?php echo $sales ?></td>
        </tr>
        <tr>
          <td><?php echo $cost_of_sales ?></td>
        </tr>
        <tr>
          <td><?php echo $gross_profit_loss ?></td>
        </tr>
        <tr>
          <td><?php echo $admin_expences ?></td>
        </tr>
        <tr>
          <td><?php echo $selling_expences ?></td>
        </tr>
        <tr>
          <td><?php echo $financial_charges ?></td>
        </tr>
        <tr>
          <td><?php echo $other_charges ?></td>
        </tr>
        <tr>
          <td><?php echo $total_charges ?></td>
        </tr>
        <tr>
          <td><?php echo $op_profit_loss ?></td>
        </tr>
        <tr>
          <td><?php echo $other_income ?></td>
        </tr>
        <tr>
          <td><?php echo $profit_loss_b_tax ?></td>
        </tr>
        <tr>
          <td><?php echo $tax ?></td>
        </tr>
        <tr>
          <td><?php echo $profit_loss_a_tax ?></td>
        </tr>
      </table></td>
    <?php
				$asif++;
				
				}
			
			 ?>
  </tr>
</table>
<?php
}
?>
 
</div><!-- end of parent div -->
   <!-- end of middle column -->
        
        <!-- start of right column --><!-- end of content -->
        
</body>
</html>