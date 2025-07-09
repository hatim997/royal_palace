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
hide:#a7dbf0; }


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
		  xmlhttp.open("POST","ajax/edit_transaction1.php",true);
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
	var current_date = document.getElementById("voucher_date").value;
	
	//alert("erst is "+rest+" and from is "+from+" and to is "+to);
	//alert("Voucher Date is "+ current_date);
	if(trn_date > current_date)
	{
		alert("Transaction date must be less than voucher date "+current_date);
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
	xmlhttp.open("POST","ajax/add_account_trans1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("vouchertype="+vouchertype+"&voucherid="+voucherid+"&title="+title+"&comments="+comments
	+"&accountcode="+accountcode+"&trn_date="+trn_date+"&trn_amount="+trn_amount+"&amounttype="+amounttype+"&cheque_no="+cheque_no+"&voucher_date="+current_date);
}
</script>

<script language="javaScript" type="text/javascript">
function save_voucher()
{
	//alert("Ok");
	var voucherid = document.getElementById("voucherid").value;
	var current_date = document.getElementById("voucher_date").value;
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
	xmlhttp.open("POST","ajax/save_voucher1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("voucherid="+voucherid+"&voucher_date="+current_date);
}
</script>

<script language="javaScript" type="text/javascript">
function cancel_voucher()
{
	//alert("Ok");
	var voucher_id = document.getElementById("voucherid").value;
	var current_date = document.getElementById("voucher_date").value;
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
	xmlhttp.open("POST","ajax/cancel_voucher1.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("voucher_id="+voucher_id+"&voucher_date="+current_date);
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
	xmlhttp.open("POST","ajax/delete_transaction1.php",true);
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
	xmlhttp.open("POST","ajax/edit_transaction1.php",true);
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
	xmlhttp.open("POST","ajax/edit_save_transaction1.php",true);
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
function search_vouchers()
{
	//alert("Ok");
	var trn_date = document.getElementById("trn_date2").value;
	var current_date = document.getElementById("current_date").value;
	var last_date = document.getElementById("last_date").value;
	if(trn_date <= last_date)
	{
		alert("Posting Date must be greater than last posting date "+ last_date);
		return;
	}
	if(trn_date > current_date)
	{
		alert("Posting Date is above the current date.");
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
	xmlhttp.open("POST","ajax/search_posting_vouchers.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("trn_date="+trn_date+"&last_date="+last_date);
}
</script>

<script language="javaScript" type="text/javascript">
function post_vouchers()
{
	//alert("Ok");
	var trn_date = document.getElementById("trn_date1").value;
	var last_date = document.getElementById("last_date1").value;
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
	xmlhttp.open("POST","ajax/post_vouchers.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("trn_date="+trn_date+"&last_date="+last_date);
}
</script>

<script language="javaScript" type="text/javascript">
function not_post()
{
	//alert("Ok");
	document.getElementById("trn_date").value = "";
	document.getElementById("response").innerHTML = "";
}
</script>

<script language="javaScript" type="text/javascript">
function edit_voucher(i)
{
	//alert("Ok");
	var voucher_id = document.getElementById("voucher"+i).value;
	var voucher_date = document.getElementById("voucher_date"+i).value;
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
	xmlhttp.open("POST","ajax/edit_voucher.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("voucher_id="+voucher_id+"&voucher_date="+voucher_date);
}
</script>

<script language="javaScript" type="text/javascript">
function delete_voucher(i)
{
	//alert("Ok");
	var voucher_id = document.getElementById("voucher"+i).value;
	var voucher_date = document.getElementById("voucher_date"+i).value;
	//alert("voucher id is "+voucher_id);
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
	xmlhttp.open("POST","ajax/delete_voucher.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("voucher_id="+voucher_id+"&voucher_date="+voucher_date);
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
	var voucher_no = encodeURIComponent(document.getElementById("voucher_no").value);
	var voucher_id = value + "-" + voucher_no;
	document.getElementById("voucherid").value = voucher_id;
	return;
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
			document.getElementById("show_bank").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_bank.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("value="+value);
	*/
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
        <div id="dialog" title="Help Voucher Posting">
<p>All the complete transactions are posted here and incomplete transactions are seen here and edited afterwards.<br>
<img src="images/gap/voucher_posting.jpg" /></p>
</div>
       
    	  <h1 class="style1" style=" font-size:16px;">Voucher Posting Form<img src="images/help.png" height="25" width="25" alt="Help" title="Help" id="opener" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="login.php" style="font-size:18px; font-style:oblique;"><strong>Back</strong></a><br>
<span class="style3">&nbsp;<?php echo $day."&nbsp;".$today; ?></span></h1>
    
    <?php    
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
    	<input type="hidden" id="last_date" name="last_date" value="<?php echo $last_date; ?>" />  
 <div id="response">
 
<div style="height:60px; width:1000px; " align="center ">
  <table width="998" align="left">
  <tr>
      <td width="120"> Posting Date:</td>
      <td width="180"><input type="text" id="trn_date2"></td>
      <td width="682"><a href="javascript:search_vouchers()" alt="Search Vouchers" title="Search Vouchers">
      <img src="images/process.png" alt="Search Vouchers" /></a></td>
      <input type="hidden" id="current_date" value="<?php echo $current_date; ?>">
  </tr>
  

</table></div>

<div id="parent">

</div>

</div><!-- end of parent div -->
   <!-- end of middle column -->
        
        <!-- start of right column --><!-- end of content -->
        
</body>
</html>