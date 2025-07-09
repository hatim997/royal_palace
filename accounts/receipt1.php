<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$restid = $_SESSION['restid'];

$gross_new = ($total_guest)*999;
$orderno = $_POST['orderno'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />

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

<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	
	font-size:12px;
}
</style>

<script type="text/javascript">
function netamount(value)
{
	//document.write("Its Ok");
	if(value == "13")
	{
		//var total = 0;
		var gross = encodeURIComponent(document.getElementById("received").value);
		var rec_amount = encodeURIComponent(document.getElementById("rec_amount").value);
		var net = Number(rec_amount) - Number(gross);
		if(net < 0)
		{
			alert("Received Amount cannot be less than Gross Amount");
			return;	
		}
		else
		{
			encodeURIComponent(document.getElementById("bal_return").value = net.toFixed(2));	
		}
	}
	else
	{
		document.myform.submit();
	}
}
</script>

<script type="text/javascript">

function printSelection(node){

  var content=node.innerHTML
  var pwin=window.open('','print_content','width=800,height=700');

  pwin.document.open();
  pwin.document.write('<html><body onload="window.print()">'+content+'</body></html>');
  pwin.document.close();
 
  setTimeout(function(){pwin.close();},1000);

}
</script>

<script type="text/javascript">
    function change_status(c_status)
    {
		//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
		
		if (c_status == "")
  		{
			//document.getElementById("info").innerHTML="";
			alert("Please select correct status.");
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
				document.getElementById("status_c").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/change_status.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("c_status="+c_status);
		}
</script>

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<SCRIPT LANGUAGE="JavaScript">
function validate() {
if (document.unit.unit_detail.value.length < 1) {
alert("Please enter Unit Detail Field .");
return false;
}

return true;
}
</SCRIPT>

</head>

<body>
<div id="templatemo_container">


   
    <?php include("includes/header2.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column -->
    
    	<div id="templatemo_left_column">
        	<h2 style="font-size:18px;"><BLINK>&nbsp;&nbsp;<?php echo $_SESSION['username']; ?></BLINK></h2>
            <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top">
                    <h2 style="color:#FFF;">Working Options</h2>
                </div>
                <div class="leftcolumn_box01_bottom">
                    <div id="menu2" class="form_row">
		<ul>
            <li><a href="login.php">Back to Main</a></li>
            <li><a href="logout.php">Logout</a></li><br>
			
		</ul>
</div>                                
                </div>            
            </div>
            
            <div id="abc1">
                <div class="abc"> 
                  <object id="FlashID3" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="225" height="40">
                    <param name="movie" value="images/updates.swf" />
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="9.0.45.0" />
                    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
                    <param name="expressinstall" value="Scripts/expressInstall.swf" />
                    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                    <!--[if !IE]>-->
                    <object type="application/x-shockwave-flash" data="images/updates.swf" width="225" height="40">
                      <!--<![endif]-->
                      <param name="quality" value="high" />
                      <param name="wmode" value="opaque" />
                      <param name="swfversion" value="9.0.45.0" />
                      <param name="expressinstall" value="Scripts/expressInstall.swf" />
                      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                      <div>
                        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                      </div>
                      <!--[if !IE]>-->
                    </object>
                    <!--<![endif]-->
                  </object>
                  <br><?php include("includes/right.php"); ?><br><br>
                </div>
          </div>
            
			<div id="imagebutton"></div>
            
      </div>
        
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
        
<h1 class="style1" style="font-size:16px;">Bill Print&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br>
            
          <div align="left" class="story" id="mydiv" style="width:380px;">
      <img src="images/header.jpg" width="352" height="109" /><br />	
			<?php
			
				$gid = $_GET['gid'];
				$orderno = $_GET['on'];
				//echo $pid."<br><br>";
				//echo $tid."<br><br>";
				//echo $sid."<br><br>";
				
				$query1 = "SELECT * FROM order_master_tab WHERE ORDER_NO = '$orderno'";
				$result1 = mysql_query($query1);
				$num1 = mysql_numrows($result1);
				$i = 0;
				while($i < $num1)
				{
					$table_no = mysql_result($result1,$i, "TABLE_NO" );
					$i++;
				}
				/*   ##########    Tax Calculation   ########*/
				$query1 = "SELECT * FROM tax_charges_history WHERE CHARGES_ON_DATE <= '$current_date' 
							AND CHARGES_OFF_DATE >= '$current_date' AND REST_ID = '$restid' ORDER BY TAX_ID ASC";
				$result1 = mysql_query($query1);
				$num1 = mysql_numrows($result1);
				$i = 0;
				while($i < $num1)
				{
					$tax_id = mysql_result($result1,$i, "TAX_ID" );
					$tax_detail = mysql_result($result1,$i, "TAX_DETAIL" );
					$tax_value = mysql_result($result1,$i, "TAX_VALUE" );
					$i++;
				}
				
				/*   ##########    Service Charges Calculation   ##########   */
				$query1 = "SELECT * FROM service_charges_history WHERE CHARGES_ON_DATE <= '$current_date' 
							AND CHARGES_OFF_DATE >= '$current_date' AND REST_ID = '$restid' ORDER BY SERVICE_ID ASC";
				$result1 = mysql_query($query1);
				$num1 = mysql_numrows($result1);
				$i = 0;
				while($i < $num1)
				{
					$service_id = mysql_result($result1,$i, "SERVICE_ID" );
					$service_detail = mysql_result($result1,$i, "SERVICE_DETAIL" );
					$service_value = mysql_result($result1,$i, "SERVICE_VALUE" );
					$i++;
				}
				
				/*   ##########    Discount Calculation   ########*/
				$query1 = "SELECT * FROM order_master_tab WHERE ORDER_NO = '$orderno' ORDER BY ORDER_NO ASC";
				$result1 = mysql_query($query1) or die("Discount Failed: ".mysql_error());;
				$num1 = mysql_num_rows($result1);
				if($num1 != 0)
				{
					$i = 0;
					while($i < $num1)
					{
						$discount = mysql_result($result1,$i, "TOTAL_DISCOUNT" );
						$i++;
					}
				}
				else
				{
					$discount = 0;	
				}
				
				$query = "SELECT * FROM guest_master_tab WHERE GUEST_ID = '$gid'";
				$result = mysql_query($query) or die ('Query failed!'.mysql_error());
				$num = mysql_numrows($result);
			?>
        <table width="353" border="0" cellpadding="0" cellspacing="5" align="left">
		<?php
            $i=0;
            while($i < $num)
            {
                $id = mysql_result($result,$i, "GUEST_ID" );
                $name = mysql_result($result,$i, "GUEST_NAME" );
                $cell = mysql_result($result,$i, "GUEST_MOBILE_NO" );
                $dob = mysql_result($result,$i, "DATE_OF_BIRTH" );
                
        ?>
            <tr><!--<td width="59" align="left"><strong>Name</strong></td><td width="155" align="left"><?php echo $name; ?></td>-->
            <td width="34" align="left"><strong>Date:</strong></td>
            <td width="80" align="left"><?php echo $today; ?></td></tr>
            <!--<tr><td width="59" align="left"><strong>Cell No</strong></td><td align="left"><?php echo $cell; ?></td></tr>-->
		<?php
				$i++;
			}  //while loop end
		?>
        	<tr><td width="59" align="left"><strong>Order No</strong></td><td align="left"><span class="style8" style="font-size:16px;"><?php echo $orderno; ?></span></td></tr>
            </table><br><br>
      <?php
       		$query = "SELECT order_master_tab.ORDER_NO,order_master_tab.TABLE_NO,dish_master_tab.DISH_ID,
						  dish_master_tab.DISH_NAME,dish_master_tab.DISH_SERVING,
						  food_type_tab.FOOD_TYPE_DETAIL, order_master_tab.ORDER_NO, 
				dish_charges_history.DISH_CHARGES, order_master_tab.TOTAL_CHARGES,
						  dish_charges_history.DISH_CHARGES, order_master_tab.NO_OF_GUEST, 
						  order_history_tab.DISH_QTY, order_history_tab.DISH_STATUS 
						  FROM order_master_tab, dish_master_tab, food_type_tab, dish_charges_history, order_history_tab 
						  WHERE order_master_tab.ORDER_NO =  order_history_tab.ORDER_NO 
						  AND order_history_tab.DISH_ID = dish_master_tab.DISH_ID 
						  AND dish_master_tab.DISH_ID = dish_charges_history.DISH_ID
						  AND dish_master_tab.FOOD_TYPE_ID = food_type_tab.FOOD_TYPE_ID 
						  AND order_master_tab.ORDER_NO = '$orderno' 
						  AND dish_charges_history.CHARGES_ON_DATE <= '$current_date' 
						  AND dish_charges_history.CHARGES_OFF_DATE >= '$current_date' 
						  ORDER BY order_master_tab.ORDER_NO ASC";
											  
			$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
			$num = mysql_numrows($result1);
			
			echo '<br><br><br><br><table width="350" border="0" cellpadding="0" cellspacing="0" align="left">
						<thead>
						<tr>
							<td width="150" align="left"><strong>Dish</strong></td>
							<td width="70" align="left"><strong>Unit Price</strong></td>
							<td width="60" align="left"><strong>Qty</strong></td>
							<td width="70" align="left"><strong>Price</strong></td>
							<!--<td width="90" align="left"><strong>Status</strong></td>-->
						</tr>
						</thead>';
					$i=0;
					$j = 1;
					while($i < $num)
					{
						$id = mysql_result($result1,$i, "dish_master_tab.DISH_ID" );
						$dish = mysql_result($result1,$i, "dish_master_tab.DISH_NAME" );
						$charges = mysql_result($result1,$i, "dish_charges_history.DISH_CHARGES" );
						$qty = mysql_result($result1,$i, "order_master_tab.NO_OF_GUEST" );
						$status = mysql_result($result1,$i, "order_history_tab.DISH_STATUS" );
						$gross = mysql_result($result1,$i, "order_master_tab.TOTAL_CHARGES" );
						$gross = $gross + ($charges * $gross_new);
						
						if($status == "O")
						{
							echo '<tr>
							<td width="150" align="left">'.$j.')&nbsp;'.$dish.'</td>                            
							<td width="70" align="left">&nbsp;'.$charges.'</td>
							<td width="60" align="left">&nbsp;'.$qty.'</td>
							<td width="70" align="left">&nbsp;'.($qty*$charges).'</td>
							<!--<td width="100" align="left">&nbsp;Ordered</td>-->
						  </tr>';
						}
						else if($status == "C")
						{
							echo '<tr>
									<td width=150" align="left">'.$j.')&nbsp;'.$dish.'</td>                            
									<td width="70" align="left">&nbsp;'.$charges.'</td>
									<td width="60" align="left">&nbsp;'.$qty.'</td>
									<td width="70" align="left">&nbsp;'.($qty*$charges).'</td>
									<!--<td width="100" align="left">&nbsp;Cooking</td>-->
							  </tr>';
						}
						else if($status == "R")
						{
							echo '<tr>
									<td width="150" align="left">'.$j.')&nbsp;'.$dish.'</td>                            
									<td width="70" align="left">&nbsp;'.$charges.'</td>
									<td width="60" align="left">&nbsp;'.$qty.'</td>
									<td width="70" align="left">&nbsp;'.($qty*$charges).'</td>
									<!--<td width="100" align="left">&nbsp;Ready</td>-->
							  </tr>';
						}
						else
						{
							echo '<tr>
									<td width="150" align="left">'.$j.')&nbsp;'.$dish.'</td>                            
									<td width="70" align="left">&nbsp;'.$charges.'</td>
									<td width="60" align="left">&nbsp;'.$qty.'</td>
									<td width="70" align="left">&nbsp;'.($qty*$charges).'</td>
									<!--<td width="100" align="left">&nbsp;Served</td>-->
							  </tr>';
						}
						$i++;
						$j++;
					} // while ends here
					echo '<tr>
									<td width="150" align="left">'.$j.')&nbsp;Other Charges</td>                            
									<td width="70" align="left">&nbsp;</td>
									<td width="60" align="left">&nbsp;</td>
									<td width="70" align="left">&nbsp;'.($gross - ($qty*$charges)).'</td>
									<!--<td width="100" align="left">&nbsp;Served</td>-->
							  </tr>';
					echo '</table><br><br>';
					//echo '<h1 class="style1" style=" font-size:14px;">Gross amount is :'.$gross.'</h1>';
					
					$service_charges = ($gross/100)*$service_value;
					$total_tax = ($gross/100)*$tax_value;
					$total_discount = ($gross/100)*$discount;
					//$rec_amount = ($gross + $service_charges +$total_tax) - $total_discount;
					//$rec_amount = $gross - $total_discount;
					$rec_amount = ($gross + $service_charges +$total_tax) - $discount;
		?>
      
                </table><br><br><br><br>
              <table width="349" border="0" cellpadding="0" cellspacing="5" align="left">
               
                <tr>
                   
                   
                <tr>
                   <td width="111" align="left"><strong>Total Amount:</strong></td>
                   <td width="70" align="left"><span class="style8" style="font-size:16px;"><?php echo $gross; ?></span></td>
                </tr>
                
              </table>
                
</div>
            <br><br><br>
            
            <table align="left" width="500" cellspacing="0" cellpadding="0">
	  
	  <tr>
		<td width="120" align="left">Received Amount:</td>
		<td width="380" align="left"><input type="text" name="rec_amount" id="rec_amount" onKeydown="Javascript: if (event.keyCode==13) netamount(event.keyCode);" /></td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td width="120" align="left">Balance Return:</td>
		<td width="380" align="left"><input type="text" name="bal_return" id="bal_return" /></td>
	  </tr>
      <input type="hidden" id="received" name="received" value="<?php echo $gross; ?>"  />
	  </table>
            
            <br><br><br><br><br>
            <a href="" class="style8" onclick="printSelection(document.getElementById('mydiv'));return false"><strong>Print Out</strong></a>      </div>
		
        </div><br><br><br>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        <div id="templatemo_right_column" style="padding-top: 1px;"> 
  </div><br><br><br><br>
        
      <!-- end of right column -->
    
    
    <!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
</body>
</html>