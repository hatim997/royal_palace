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
<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<link href="templatemo_style7.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

<script language="JavaScript">
	new tcal ({
		'formname': 'testform',
		'controlname': 'dob'
	});
	</script>
    
<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

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

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>


<script type="text/javascript">
function add_guest(form)
{
	var name = encodeURIComponent(document.getElementById("name").value);
	//var fname = encodeURIComponent(document.getElementById("fname").value);
	var day = encodeURIComponent(document.getElementById("day").value);
	var month = encodeURIComponent(document.getElementById("month").value);
	var cell = encodeURIComponent(document.getElementById("cell").value);
	var email = encodeURIComponent(document.getElementById("email").value);
	var city = encodeURIComponent(document.getElementById("city").value);
	var pro_type = encodeURIComponent(document.getElementById("pro_type").value);
	var food = encodeURIComponent(document.getElementById("food_quality").value);
	var environment = encodeURIComponent(document.getElementById("environment").value);
	var service = encodeURIComponent(document.getElementById("service").value);
	var suggestions = encodeURIComponent(document.getElementById("suggestions").value);
	if(food == "" || environment == "" || service == "")
	{
		alert("Please Enter Information in required fields");
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
			document.getElementById("master").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_guest.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("name="+name+"&cell="+cell+"&day="+day+"&month="+month+"&email="+email+"&city="+city+"&pro_type="+pro_type+"&food="+food+"&environment="+environment+"&service="+service+"&suggestions="+suggestions);
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
        
        	<h1 class="style1" style=" font-size:16px;">Daily Sales Ledger&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
          <p>&nbsp;</p><br><br>
          <div id="master">
          
		  <?php
		  	
				if(isset($_POST['submit']))
				{
				
					//$created_id = $_SESSION['username'];
					$to = $_POST['to_date'];
					$from = $_POST['from_date'];
					//echo $agent;
					if($from >= $to)
					{
			?>
               <h4 span class="style3">Please enter Correct Dates</h4></span><br /><br />
          <form name="testname" id="charges" method="post" action="sales_ledger.php" >            
            
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From:&nbsp;&nbsp;&nbsp;
            <input type="text" class="tcal" name="from_date" />
	<script language="JavaScript">
	new tcal ({
		'formname': 'testform',
		'controlname': 'to_date'
	});
	</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;
	<input type="text" class="tcal" name="to_date" />
	<script language="JavaScript">
	new tcal ({
		'formname': 'testform',
		'controlname': 'from_date'
	});
	</script>
	&nbsp;&nbsp;
	<input type="submit" class="button" name="submit" value="Search" />&nbsp;&nbsp;
            </form>


					<?php
                    }
					else
					{
						//echo "Agent is ".$agent;
			?>
              <form name="followups" id="followups" method="post" action="viewcomments.php" >
              <div width="950" height="100" style="overflow:auto">
              <table width="920" border="1" cellpadding="0" cellspacing="0" align="left">
                <thead>
                <tr>
                        <td width="70" align="center"><strong>Sr NO</strong></td>
                        <td width="80" align="center"><strong>Today</strong></td>
                        <td width="80" align="center"><strong>Date</strong></td>
                        <td width="80" align="center"><strong>Sales</strong></td>
                        <td width="100" align="center"><strong>Acc Sales</strong></td>
                        <!--<td width="80" align="center"><strong>Invoice No</strong></td>-->
                        <td width="110" align="center"><strong>Invoice Amount</strong></td>
                        <td width="120" align="center"><strong>Market Purchase Amount</strong></td>
                        <td width="100" align="center"><strong>Acc Purchase</strong></td>
                        <td width="90" align="center"><strong>Total Cost</strong></td>
                        <td width="90" align="center"><strong>Average Sale</strong></td>
                        <!--<td width="80" align="center"><strong>Test Requirement</strong></td>
                        <td width="80" align="center"><strong>Recieved</strong></td>-->
                </tr>
                </thead>
                
                <?php
					
					$st_date = explode("-", $from);
					$acc_sale = 0;
					$d = 0;
					echo '<h4 span class="style3">From '.$from.' To '.$to.'</h4></span><br /><br />';
					while($from < $to)
					{
						//$check_date = 
						$j = $d +1;
						$sale = 0;
						$invoice_amount = 0;
						$invoice_total = 0;
						$total_cost = 0;
						$total_orders = 0;
						$total_sale = 0;
						$total_serv = 0;
						$t_tax = 0;
						$total_tax = 0;
						$total_discount = 0;
						$net_rec = 0;
						$from = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
						$show_date = date("Y-m-d", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
						$day = date("l", mktime(0, 0, 0, $st_date[1], $st_date[2]+$d, $st_date[0]));
						$start = $from."&nbsp;00:00:00";
						$end = $from."&nbsp;23:59:59";
						
						########  INVOICE AMOUNT CALCULATION   ######
						
						$query = "SELECT TOTAL_CHARGES
									FROM order_master_tab
									WHERE REST_ID = '$restid'
									AND VISITED_DATE = '$from' 
									AND (PAYMENT_FLAG = 'C' OR PAYMENT_FLAG = 'P')
									ORDER BY ORDER_NO ASC";
													
						$result1 = mysql_query($query) or die ('Sale failed!'.mysql_error());
						$num = mysql_num_rows($result1);
						$i=0;
						while($i < $num)
						{
							$sale = mysql_result($result1,$i, "order_master_tab.TOTAL_CHARGES" );
							$total_sale = $total_sale + $sale;
							$total_orders++;
							//$total = $total + ($c*$q);
							$i++;
						} // sale query while ends here
						$acc_sale = $acc_sale + $total_sale;
						
						
						########  INVOICE AMOUNT CALCULATION   ######
						
						$query = "SELECT INVOICE_AMOUNT
									FROM restaurant_demand
									WHERE REST_ID = '$restid'
									AND INVOICE_DATE = '$from' 
									ORDER BY INVOICE_NO ASC";
													
						$result1 = mysql_query($query) or die ('Invoice failed!'.mysql_error());
						$num = mysql_num_rows($result1);
						$i=0;
						while($i < $num)
						{
							$invoice_amount = mysql_result($result1,$i, "INVOICE_AMOUNT" );
							$invoice_total = $invoice_total + $invoice_amount;
							//$total = $total + ($c*$q);
							$i++;
						} // sale query while ends here 
						
						
				?>
						<tr>
                        <td width="70" align="center"><?php echo $j ;?></td>
                        <td width="80" align="center"><?php echo $day ;?></td>
                        <td width="80" align="center"><?php echo $show_date ;?></td>
                        <td width="100" align="center"><?php echo $total_sale ;?></td>
                        <td width="80" align="center"><?php echo $acc_sale ;?></td>
                        <td width="110" align="center"><?php echo $invoice_total ;?></td>
                        <td width="120" align="center">0</td>
                        <td width="100" align="center"><?php echo $invoice_total ;?></td>
                        <td width="90" align="center"><?php echo $total_orders ; ?></td>
                        <td width="90" align="center">
						<?php 
						if($total_sale == 0 || $total_orders == 0)
						{
							echo 0;
						}
						else
						{
							echo $total_cost = number_format($total_sale/$total_orders);
						}
						?></td>
                        <!--
                        <td width="90" align="center"><?php echo $pro;?></td>
                        <td align="center"><?php //echo $sample_id;?></td>
						<td align="center"><?php //echo $test_req; ?></td>-->
                        <!--<td align="center"><input type="submit" name="<?php //echo $i; ?>" value="Details" /></td>-->
                        </tr>
				<?php
					
						$d++; // outer Date while ends here
					}
					//}   //else ends here
				?>
				</table>
                    
              </div><br /><br /><br /><br />
                    <input type="hidden" name="agent_id" value="<?php echo $agent; ?>" />
                    <input type="hidden" name="to_date" value="<?php echo $todate; ?>" />
                    <input type="hidden" name="from_date" value="<?php echo $from_date; ?>" />
                    <input type="hidden" name="row" value="<?php echo $num; ?>" />&nbsp;&nbsp;&nbsp;
                    
            </form>
			
	<?php	
        
            }
        } //if ends here
		else
		{
	?>
    
    		<form name="testname" id="charges" method="post" action="sales_ledger.php" >            
            
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From:&nbsp;&nbsp;&nbsp;
            <input type="text" class="tcal" name="from_date" />
	<script language="JavaScript">
	new tcal ({
		'formname': 'testform',
		'controlname': 'to_date'
	});
	</script>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;
	<input type="text" class="tcal" name="to_date" />
	<script language="JavaScript">
	new tcal ({
		'formname': 'testform',
		'controlname': 'from_date'
	});
	</script>
	&nbsp;&nbsp;
	<input type="submit" class="button" name="submit" value="Search" />&nbsp;&nbsp;
            </form>
			
	<?php
		} // else ends here 
	?>

            
</div>

</div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        
      <!-- end of right column -->
    
    </div>
    
    <!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
</body>
</html>