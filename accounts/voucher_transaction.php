<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
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
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
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
        $( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
    });
    </script>
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
<!--<script language="javaScript" type="text/javascript" src="calendar.js"></script>-->

<!-- CSS goes in the document HEAD or added to your external stylesheet -->



<!-- Table goes in the document BODY -->

<style type="text/css">
.overlay
{
    position: fixed;
    top: 0%;
    left: 0%;
    width:100%;
    height:100%;
    background: #000;
    display: none;   
    opacity: .5;
    filter: alpha(opacity=10);
    -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";

}
.popup
{
    position: fixed;
    top: 40%;
    left: 45%;
    margin-left: -50px;
    margin-top: -10px;
    width: 300px;
    height: 230px;
    display: none;
    background:#FFF;   
    border:1px solid #F00;
	z-index:1000;
}
</style>
  <script type="text/javascript">
  
      function showPopup(ID) {
		  //alert(ID);
          document.getElementById("overlay").style.display = "block";
          document.getElementById("popup"+ID).style.display = "block";
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
				  document.getElementById("popup"+ID).innerHTML=xmlhttp.responseText;
			  }
			}
		  xmlhttp.open("POST","ajax/edit_transaction.php",true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send("transaction_id="+ID);
      }
      function closePopup(ID) {
          document.getElementById("overlay").style.display = "none";
          document.getElementById("popup"+ID).style.display = "none";
      }
	  function sub_update(DISH_ID,ING_ID)
	  {
		  //alert(document.getElementById(ING_ID).value);
		  //alert("ING ID IS "+ING_ID);
		  var qty = document.getElementById(ING_ID).value;
		  //call ajax function here
		  
		  if(parseInt(qty) <= 0)
		  {
			 alert("Required Quantity is not numeric");
			 return;
		  }
		  closePopup(ING_ID);
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
		  xmlhttp.open("POST","ajax/save_recipe_ingredient.php",true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send("qty="+qty+"&dish_id="+DISH_ID+"&ing_id="+ING_ID);
	  }
    </script>

<script language="javaScript" type="text/javascript">
function cheque_no(value)
{
	
	//alert("Status is "+orderno);
	if(value == "")
	{
		document.getElementById("cheque_no").disabled = true;
		document.getElementById("cheque_no").value = "Cheque No here";
		return;
	}
	if(value == "N")
	{
		document.getElementById("cheque_no").disabled = true;
		document.getElementById("cheque_no").value = "Cheque No here";
		//document.getElementById("cheque_no").readonly = true;
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
			document.getElementById("show_cheque_no").innerHTML=xmlhttp.responseText;
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
		}
	  }
	xmlhttp.open("POST","ajax/show_cheque_no.php",true);
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
	document.getElementById("accountcode").value = value;
	/*
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
	*/
	
	
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
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
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
	var current_date = document.getElementById("current_date").value;
	
	//alert("erst is "+rest+" and from is "+from+" and to is "+to);
	
	if(trn_date > current_date)
	{
		alert("Transaction date must be less than current date");
		return;
	}
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
	if(parseFloat(trn_amount) <= 0 )
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
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
		}
	  }
	xmlhttp.open("POST","ajax/add_account_trans.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("vouchertype="+vouchertype+"&voucherid="+voucherid+"&title="+title+"&comments="+comments
	+"&accountcode="+accountcode+"&trn_date="+trn_date+"&trn_amount="+trn_amount+"&amounttype="+amounttype+"&cheque_no="+cheque_no);
}
</script>

<script language="javaScript" type="text/javascript">
function save_voucher()
{
	//alert("Ok");
	var voucherid = document.getElementById("voucherid").value;
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
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
		}
	  }
	xmlhttp.open("POST","ajax/save_voucher.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("voucherid="+voucherid);
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
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
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
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
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
	var detail = document.getElementById("detail").value;
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
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
		}
	  }
	xmlhttp.open("POST","ajax/edit_save_transaction.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("transaction_id="+transaction_id+"&amount="+amount+"&type="+type+"&detail="+detail);
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
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
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
			$( "#trn_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
			dateFormat: "yy-mm-dd",
        });
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
function create_voucher(value)
{
	//alert("Status is "+orderno);
	if(value == "")
	{
		document.getElementById("voucherid").value = "";
		return;
	}
	//var voucher_no = encodeURIComponent(document.getElementById("voucher_no").value);
	//var voucher_id = value + "-" + voucher_no;
	//document.getElementById("voucherid").value = voucher_id;
	//return;
	
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
			document.getElementById("voucherid").value = xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/create_voucher_id.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
	
}
</script>

<link href="calendar.css" rel="stylesheet" type="text/css">
</head>

<body>



<div id="templatemo_container">
   
    <?php //include("includes/header2.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
        
       <div id="dialog" title="Help Accounts Transaction">
<p>This interface helps the user in adding new day to day transactions occurring in  the business to have the regular and proper data maintenance.<br><img src="images/gap/account_trans.jpg" /></p>
</div>
    	  <h1 class="style1" style=" font-size:16px;">Voucher Entry Form<img src="images/help.png" height="25" width="25" alt="Help" title="Help" id="opener" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php" style="font-size:18px; font-style:oblique;"><strong>Back</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="style3">&nbsp;<?php echo $day."&nbsp;".$today; ?></span></h1>
    
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
 
 <input type="hidden" id="last_date" name="last_date" value="<?php echo $last_date; ?>" />
 
<div style="border: 1px solid black; height:65px; width:1000px;" align="center" id="introduction">
       <table align="left" width="998">
<tr>
    <td width="102" height="25" align="left">&nbsp;&nbsp;Voucher Type:</td>
    <td width="185" align="left">
    <select style="width:145px;" id="vouchertype" name="idd" onchange="create_voucher(this.value);">
    <option value="">Select Type</option>
    <?php
    
    $query1 = "SELECT * FROM voucher_type ORDER BY VOUCHER_TITLE ASC";
    $result1 = mysql_query($query1)or die("Failed :".mysql_error());
    $num1 = mysql_numrows($result1);
    $i=0;
    while($i < $num1)
    {
        $voucher_type = mysql_result($result1,$i, "VOUCHER_TYPE" );
        $voucher_title = mysql_result($result1,$i, "VOUCHER_TITLE" );
        echo '<option value="'.$voucher_type.'">'.$voucher_title.'</option>';
        $i++;
    }  // while loop ends here
    
    ?>
    </select>
    </td>
    <td width="441" height="25" align="left">&nbsp;</td>
    <td width="83" height="25" align="left">Total Debit:</td>
    <td width="163" align="left">&nbsp;</td>
</tr>
<tr>
    <td width="102" height="5" align="left">&nbsp;&nbsp;Voucher ID:</td>
    <td width="185" align="left"><input type="text" name="id" id="voucherid" readonly="readonly"  ></td>
    
    <td width="441" height="25" align="center"><img src="images/save.png" height="25" width="60" alt="Save" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/print.png" height="25" width="60" alt="Print" /></td>
    <td width="83" height="5" align="left">Total Credit:</td>
    <td width="163" align="left">&nbsp;</td>
</tr>

<input type="hidden" name="voucher_no" id="voucher_no" value="<?php echo $voucher_no; ?>" >

</table></div>

<br />
<div style="border: 1px solid black; overflow:auto; height:280px; width:1000px;" align="center" id="center">
<table width="1000" align="left" class="altrowstable" id="alternatecolor">
<tr style="background:#2083AC; font-size:14px; font-style:italic; color:#FFF;">
	<td width="54" align="center"><strong>SR</strong></td>
    <td width="126" align="center"><strong>Account Code</strong></td>
    <td width="299" align="center"><strong>Account Title</strong></td>
    <td width="100" align="center"><strong>Date</strong></td>
    <td width="100" align="center"><strong>Debit</strong></td>
    <td width="145" align="center"><strong>Credit</strong></td>
    <td width="70" align="center"><strong>Edit</strong></td>
	<td width="70" align="center"><strong>Delete</strong></td>
</tr>
</table> </div>
<br />

<div style="border: 1px solid black; height:130px; width:1000px; " align="center ">
  <table width="986" align="left">
<tr>
      <td width="164" >&nbsp;&nbsp;Account Code</td>
      <td width="161">Title</td>
      <td width="184"> Transaction Date:</td>
      <td width="156">Amount:</td>
      <td width="145">Amount Type</td>
      <td width="148">Narration:</td>
  </tr>
  <tr>
  <td id="show_account_code" valign="top" style="padding-top:10px;">&nbsp;&nbsp;<input type="text" name="accountcode" id="accountcode" readonly="readonly"/></td>
  <td valign="top" style="padding-top:10px;"><select style="width:145px;" id="title" name="title" onchange="voucher_title(this.value);">
  <option value="">Select Title</option>
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
</select></td>
<td valign="top" style="padding-top:10px;">
 
      <input type="text" id="trn_date">

  </td>
  <td valign="top" style="padding-top:10px;"><input type="text" name="trn_amount" id="trn_amount" /></td>
  <td valign="top" style="padding-top:10px;">
  <select style="width: 140px;" name="amounttype" id="amounttype">
      <option value=""> Select Amount </option>
      <option value="DB">Debit</option>
      <option value="CR">Credit</option>
      </select>
  </td>
  <td><textarea name="comments" rows="4" style="width: 140px;" id="comments"></textarea>  
  </tr>
  
<tr>
	<td height="36" align="right">&nbsp;</td>
	<td id="show_bank" style="padding-bottom:20px;" align="right">Cheque No:&nbsp;&nbsp;</td>
    <td id="show_cheque_no" style="padding-bottom:20px;"><input type="text" id="cheque_no" name="cheque_no" readonly="readonly" value="Cheque No here" /></td>
    <td align="right" style="padding-bottom:20px;"><a href="javascript:save_form()" alt="Add Transaction" title="Add Transaction">
				  <img src="images/add.png" alt="Add Transaction" /></a></td>
    <td>&nbsp;</td>
	<td align="left" >&nbsp;</td>
    <input type="hidden" id="current_date" value="<?php echo $current_date; ?>" />
</tr>
</table></div>

	</div><!-- end of parent div -->
   <!-- end of middle column -->
        
        <!-- start of right column --><!-- end of content -->
        
    
</body>
</html>