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
    });
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
function search_ledger()
{
	//alert("Ok");
	var value = document.getElementById("vouchertype").value;
	var type = document.getElementById("type").value;
	var from_date = document.getElementById("from_date").value;
	var to_date = document.getElementById("to_date").value;
	var sorting = document.getElementById("sort").value;
	var current_date = document.getElementById("current_date").value;
	if(value == "")
	{
		alert("Please select category 2 item.");
		return;
	}
	if(sorting == "")
	{
		alert("Please select correct sorting type.");
		return;
	}
	if(type == "")
	{
		alert("Please select Ledger type.");
		return;
	}
	if(from_date == "")
	{
		alert("Please select correct from date.");
		return;
	}
	if(to_date == "")
	{
		alert("Please select correct to date.");
		return;
	}
	if(from_date >= current_date)
	{
		alert("From Date must be lesser than current date.");
		return;
	}
	if(to_date > current_date)
	{
		alert("To Date must be lesser than current date.");
		return;
	}
	if(from_date > to_date)
	{
		alert("From Date must be lesser than To date.");
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
			document.getElementById("response").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/gen_ledger1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("from_date="+from_date+"&to_date="+to_date+"&value="+value+"&type="+type+"&sorting="+sorting);
}
</script>

<script language="javaScript" type="text/javascript">
function show_ledger_level(value)
{
	//alert("Value is "+ value);
	if(value == "")
	{
		document.getElementById("vouchertype").disabled = true;
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
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("show_ledger_level").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_ledger_level.php",true);
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
        <div id="dialog" title="Help General Ledger">
<p>Ledger shows all the completed transactions.<br><img src="images/gap/general_ledger.jpg" /></p>
</div>
       
    	  <h1 class="style1" style=" font-size:16px;">General Ledger<img src="images/help.png" height="25" width="25" alt="Help" title="Help" id="opener" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php" style="font-size:18px; font-style:oblique;"><strong>Back</strong></a><br>
<span class="style3"><?php echo $today; ?></span></h1>
    
    <?php    
	  $query1 = "SELECT * FROM voucher_type";
	  $result1 = mysql_query($query1)or die("Failed :".mysql_error());
	  $num1 = mysql_numrows($result1);
	  $i=0;
	  while($i < $num1)
	  {
		  $voucher_no = mysql_result($result1,$i, "LAST_VOUCHER_NO" );
		  $i++;
	  }
	  $voucher_no++;
	  
	  $query1 = "SELECT * FROM posting_master_tab";
	  $result1 = mysql_query($query1)or die("Failed :".mysql_error());
	  $num1 = mysql_numrows($result1);
	  $i=0;
	  while($i < $num1)
	  {
		  $last_date = mysql_result($result1,$i, "LAST_POSTING_DATE" );
		  $i++;
	  }
	
	?>
    	  
 <div id="parent">

<div style="height:80px; width:1000px; " align="center ">
  <table width="998" align="left">
  <tr>
      <td width="49">Ledger:</td>
      <td width="127">
      <select id="type" name="type" onchange="show_ledger_level(this.value);">
      <option value="">Ledger Level</option>
      <option value="M">Main</option>
      <option value="C">Control</option>
      <option value="C1">Category 1</option>
      <option value="C2">Category 2</option>
      </select>
      </td>
  
      <td width="36">Item:</td>
      <td width="171" id="show_ledger_level">
      <select style="width:145px;" id="vouchertype" name="idd" disabled="disabled">
    <option value="">Select Item</option>
    <?php    
		$query1 = "SELECT * FROM scat2_acct_tab ORDER BY SCAT2_ACCT_TITLE ASC";
		$result1 = mysql_query($query1)or die("Failed :".mysql_error());
		$num1 = mysql_numrows($result1);
		$i=0;
		while($i < $num1)
		{
			$main_acct_code = mysql_result($result1,$i, "MAIN_ACCT_CODE" );
			$ctrl_acct_code = mysql_result($result1,$i, "CTRL_ACCT_CODE" );
			$scat1_acct_code = mysql_result($result1,$i, "SCAT1_ACCT_CODE" );
			$scat2_acct_code = mysql_result($result1,$i, "SCAT2_ACCT_CODE" );
			$scat2_acct_title = mysql_result($result1,$i, "SCAT2_ACCT_TITLE" );
			$code = $main_acct_code.$ctrl_acct_code.$scat1_acct_code.$scat2_acct_code;
			echo '<option value="'.$code.'">'.$scat2_acct_title.'</option>';
			$i++;
		}  // while loop ends here
    ?>
    </select>
      </td>
      <td width="75">From Date:</td>
      <td width="174"><input type="text" id="from_date"></td>
      <td width="63">Sort By:</td>
      <td width="148">
      <select style="width:145px;" id="sort" name="sort">
      <option value="">Sort By</option>
      <option value="TRN_DATE">Value Date</option>
      <option value="VOUCHER_DATE">Voucher Date</option>
      </select>
      </td>
      <td width="115" align="right"><a href="javascript:search_ledger()" alt="Search Vouchers" title="Search Vouchers">
      <img src="images/process.png" alt="Search Vouchers" /></a></td>
      <input type="hidden" id="current_date" value="<?php echo $current_date; ?>">
  </tr>
  <tr>
      <td width="49">&nbsp;</td>
      <td width="127">&nbsp;</td>
  
      <td width="36">&nbsp;</td>
      <td width="171">&nbsp;</td>
      <td width="75">To Date:</td>
      <td width="174"><input type="text" id="to_date"></td>
      <td width="63">&nbsp;</td>
      <td width="148">&nbsp;</td>
      <td width="115" align="right">&nbsp;</td>
      <input type="hidden" id="current_date" value="<?php echo $current_date; ?>">
  </tr>
  

</table></div>
<div id="response">

<div style="border: 1px solid black; overflow:auto; height:70px; width:993px; margin-left:2px; background-color:#E6F0F5;">
<table align="left" width="983">
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Main:</b></td>
    <td width="427" align="left">&nbsp;</b></td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Opening:</b></td>
    <td width="131" align="left">&nbsp;</td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Control:</b></td>
    <td width="427" align="left">&nbsp;</td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left"><b>Last Posting Date:</b></td>
    <td width="131" align="left"><b>&nbsp;</b></td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;<b>Category 1:</b></td>
    <td width="427" align="left">&nbsp;</td>
    <td width="187" height="5" align="left">&nbsp;</td>
    <td width="127" height="5" align="left">&nbsp;</td>
    <td width="131" align="left">&nbsp;</td>
</tr>
</table>
</div>

<table width="1000" align="left" class="altrowstable" id="alternatecolor" >
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="45" align="center"><strong>SR. No</strong></td>
    <td width="124" align="center"><strong>Transaction Date</strong></td>
    <td width="83" align="center"><strong>Voucher No</strong></td>
    <td width="392" align="center"><strong>Narration</strong></td>
    <td width="74" align="center"><strong>Status</strong></td>
    <td width="82" align="center"><strong>Debit</strong></td>
    <td width="83" align="center"><strong>Credit</strong></td>
    <td width="80" align="center"><strong>Balance</strong></td>
</tr>
</table>
<div style="overflow:auto; height:210px; width:1030px;" align="center" id="center">
<table width="1000" align="left">
</table>
</div>
<table width="1000" align="right">
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left">&nbsp;</td>
    <td width="216" align="center">&nbsp;</td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>B/F:</strong></td>
    <td width="216" align="left">&nbsp;</td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total Posted:</strong></td>
    <td width="216" align="left">&nbsp;</td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Total UnPosted:</strong></td>
    <td width="216" align="left">&nbsp;</td>
    
</tr>
<tr>
	<td width="69" align="center">&nbsp;</td>
    <td width="540" align="center">&nbsp;</td>
    <td width="155" align="left"><strong>Balance:</strong></td>
    <td width="216" align="left">&nbsp;</td>
    <input type="hidden" id="current_date" value="<?php echo $current_date; ?>" />
</tr>
</table>

</div>
 
</div><!-- end of parent div -->
   <!-- end of middle column -->
        
        <!-- start of right column --><!-- end of content -->
        
</body>
</html>