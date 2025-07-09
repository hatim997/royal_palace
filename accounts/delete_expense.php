<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$restid = $_SESSION['restid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="templatemo_style7.css" rel="stylesheet" type="text/css" />

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
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
libs/jquery/1.3.0/jquery.min.js"></script>
<!--<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#orders').load('ajax/show_kitchen_orders.php').fadeIn("slow");
}, 60000); // refresh every 10000 milliseconds
</script>
-->
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


<script type="text/javascript">
function delete_expense(transaction_id)
{
	//alert(orderno+" and "+dish);
	var a = confirm("Do you want to remove this Expense Transaction?");
	if(a)
	{
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
				document.getElementById("expense").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/delete_expense.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("transaction_id="+transaction_id);
	} // if ends here
	else
	{
		return;	
	}
}
</script>

</head>

<body>
<div id="templatemo_container">
   
    <?php include("includes/header2.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
    	  <h1 class="style1" style=" font-size:16px;">Delete Expense Transaction&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
    	  <br><br>
         <div id="expense" align="center">
          <?php
	
	$created_id = $_SESSION['username'];
	//$restid = $_SESSION['restid'];
	//echo "Rest ID is ".$restid;
	//$start = $from."00:00:00";
	//$end = $to."23:59:59";	
	$query = "SELECT * FROM expense_closing_tab";
	$result = mysql_query($query)or die("Failed :".mysql_error());
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$closing_date = mysql_result($result,$i, "LAST_EXPENSE_CLOSING_DATE");
		$i++;
	}
	echo '<div id="del_dish" align="center" style="overflow:auto; height:450px; width:890px">
			<table width="870" border="1" cellpadding="0" cellspacing="0" align="center">
			  <thead>
			  <tr>
				  <td width="70" align="center"><strong>Transaction ID</strong></td>
				  <td width="70" align="center"><strong>Voucher No</strong></td>
				  <td width="180" align="center"><strong>Expense Type</strong></td>
				  <td width="180" align="center"><strong>Expense Item</strong></td>
				  <td width="90" align="center"><strong>Expense Date</strong></td>
				  <td width="100" align="center"><strong>Amount</strong></td>
				  <td width="180" align="center"><strong>Expense Pocket</strong></td>
				  <td width="80" align="center"><strong>Delete</strong></td>
			  </tr>
			  </thead>';
	$query = "SELECT expense_transaction_tab.TRANSACTION_ID, expense_transaction_tab.VOUCHER_ID, expense_transaction_tab.AMOUNT, 
					expense_transaction_tab.EXPENSE_DATE, expense_transaction_tab.PAYMENT_TYPE, 
					expense_type_tab.EXPENSE_TYPE_NAME, 
					expense_item_tab.EXPENSE_ITEM_NAME, 
					directors_tab.DIRECTOR_NAME 
					FROM expense_transaction_tab, expense_type_tab, expense_item_tab, directors_tab 
					WHERE expense_transaction_tab.EXPENSE_TYPE_ID = expense_type_tab.EXPENSE_TYPE_ID 
					AND expense_transaction_tab.EXPENSE_ITEM_ID = expense_item_tab.EXPENSE_ITEM_ID 
					AND expense_transaction_tab.DIRECTOR_ID = directors_tab.DIRECTOR_ID 
					AND expense_transaction_tab.EXPENSE_DATE > '$closing_date' 
					ORDER BY expense_transaction_tab.EXPENSE_DATE, expense_transaction_tab.TRANSACTION_ID ASC";
	$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
	$num = mysql_num_rows($result1);
	$i=0;
	while($i < $num)
	{
		$tran_id = mysql_result($result1,$i, "expense_transaction_tab.TRANSACTION_ID" );
		$voucher = mysql_result($result1,$i, "expense_transaction_tab.VOUCHER_ID" );
		$amount = mysql_result($result1,$i, "expense_transaction_tab.AMOUNT" );
		$edate = mysql_result($result1,$i, "expense_transaction_tab.EXPENSE_DATE" );
		$pflag = mysql_result($result1,$i, "expense_transaction_tab.PAYMENT_TYPE" );
		$e_type = mysql_result($result1,$i, "expense_type_tab.EXPENSE_TYPE_NAME" );
		$item = mysql_result($result1,$i, "expense_item_tab.EXPENSE_ITEM_NAME" );
		$e_pocket = mysql_result($result1,$i, "directors_tab.DIRECTOR_NAME" );
		
		if($pflag == "C")
		{
			$total_cash = $total_cash + $amount;
		}
		else
		{
			$total_cheque = $total_cheque + $amount;
		}
		$total_expense = $total_expense + $amount;
	echo '<tr>
		  <td width="70" align="left">&nbsp;'.$tran_id.'</td>
		  <td width="70" align="left">&nbsp;'.$voucher.'</td>
		  <td width="180" align="left">&nbsp;'.$e_type.'</td>
		  <td width="180" align="left">&nbsp;'.$item.'</td>
		  <td width="90" align="left">'.$edate.'</td>
		  <td width="100" align="left">'.$amount.'</td>
		  <td width="180" align="left">'.$e_pocket.'</td>
		  <td width="80" align="center"><a href="javascript:delete_expense('.$tran_id.')" alt="Delete" title="Delete"><img src="images/delete.png" height="25" width="25" alt="Delete" /></a></td>
		</tr>';
		$i++;
	} // while ends here
		
		echo '</table>';
?>
</div><br><br>
    	  
          <div id="details" align="center" style=" font-size:14px;">
          
          </div><br><br><br>
          
      </div>
    	<!-- end of middle column -->
        
        <!-- start of right column --><!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
</body>
</html>