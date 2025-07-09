<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id = $_SESSION['restid'];
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

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

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
	background-color: #ffffff;
	padding:0;
	margin:0 auto;
	
	font-size:12px;
}
</style>


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
    function edit_value(i)
    {
		//alert("Hello");
		var value = document.getElementById("demand"+i).value;
		document.getElementById("receive"+i).value = "";
		document.getElementById("receive"+i).value = document.getElementById("demand"+i).value;
		return;
	}
</script>

<script type="text/javascript">
    function show_ingredient(value)
    {
		//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
		
		if (value == "")
  		{
			document.getElementById("show_ingredient").innerHTML="";
			//alert("Please select correct status.");
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
				document.getElementById("show_ingredient").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/show_ingredient_invoice.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("value="+value);
		}
</script>

<script type="text/javascript">
function add_demand()
{
	//alert("Hello");
	var d_id = "";
	var d_demand = "";
	var blank = 0;
	var demand = "";
	var price = "";
	var receive = "";
	var date = encodeURIComponent(document.getElementById("date").value);
	var demandno = encodeURIComponent(document.getElementById("demandno").value);
	var total_ing = encodeURIComponent(document.getElementById("total_ing").value);
	//var serving = encodeURIComponent(document.getElementById("serving").value);
	//var qty = encodeURIComponent(document.getElementById("qty").value);
	//alert(guest+" and "+guest_id+" and"+food+" and "+dish+" and "+serving+" and "+qty);
	//alert("Total Dishes are "+t_dish);
	
	for(var i=0; i < total_ing; i++)
	{
		var demand = encodeURIComponent(document.getElementById("demand"+i).value);
		//alert(qty);
		//alert("Name is "+encodeURIComponent(document.getElementById("demand"+i).name));
		if(demand != "")
		{
			var pri = encodeURIComponent(document.getElementById("price"+i).value);
			if(pri == "" || parseInt(pri))
			{
				alert("Please enter the valid price against each item");
				return;
			}
			if(d_id == "")
			{
				d_id +=encodeURIComponent(document.getElementById("demand"+i).name);
			}
			else
			{
				d_id = d_id + ":" + encodeURIComponent(document.getElementById("demand"+i).name);
			}
			if(d_demand == "")
			{
				d_demand +=encodeURIComponent(document.getElementById("demand"+i).value);
				receive +=encodeURIComponent(document.getElementById("receive"+i).value);
				price +=encodeURIComponent(document.getElementById("price"+i).value);
			}
			else
			{
				d_demand = d_demand + ":" + encodeURIComponent(document.getElementById("demand"+i).value);
				receive = receive + ":" + encodeURIComponent(document.getElementById("receive"+i).value);
				price = price + ":" + encodeURIComponent(document.getElementById("price"+i).value);
			}
			//alert(d_id+" and quntities are "+d_demand);
		}
		else
		{
			blank = blank + 1;	
		}
		//alert("Blank is "+blank);
	}
	if(total_ing == blank)
	{
		alert("Please enter valid Quantity");
		return;
	}
	//alert(d_id+" and quntities are "+d_qty);
	
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
			document.getElementById("inventory").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_demand_receiving.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("total_ing="+total_ing+"&d_id="+d_id+"&d_demand="+d_demand+"&demandno="+demandno+"&date="+date+"&price="+price+"&receive="+receive);
}
</script>

<script type="text/javascript">
function order_details(demandno)
{
	//alert("Demand No is "+demandno);
	//alert("Order is "+orderno+" and dish is "+dish+" and status is "+status);
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
			document.getElementById("demand_detail").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/show_store_demand.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("demandno="+demandno);
}
</script>

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
        
<h1 class="style1" style="font-size:16px;">Item Re-Order Level Report&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
<br><br><br>
            
            <div id="inventory">
            
            <?php
          		$blank = 0;
		  		
				//echo $rest_id." and date ".$current_date;
				$query = "SELECT * FROM store_master_tab WHERE REST_ID = '$rest_id' AND QTY_INHAND <= RE_ORDER_LEVEL ORDER BY INGREDIENT_NAME ASC";
												
				$result1 = mysql_query($query) or die ('Query failed!'.mysql_error());
				$num = mysql_num_rows($result1);
				if($num != 0)
				{
				echo '<table width="700" align="left" cellpadding="0" cellspacing="0" BORDER=1 RULES=NONE FRAME=BOX>
		<tr><td style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Item Information</i></b></td></tr>
		</table>';
				echo '<div id="del_dish" align="center" style="overflow:auto; height:300px; width:730px">
				<table width="700" border="1" cellpadding="0" cellspacing="0" align="left">
							<thead>
							<tr>
								<td width="90" align="center"><strong>Code</strong></td>
								<td width="200" align="center"><strong>Name</strong></td>
								<td width="90" align="center"><strong>Re-Order Level</strong></td>
								<td width="90" align="center"><strong>Quantity Inhand</strong></td>
								<td width="90" align="center"><strong>Max. Level</strong></td>
							</tr>
							</thead>';
						$i=0;
						while($i < $num)
						{
							$code = mysql_result($result1,$i, "INGREDIENT_ID" );
							$name = mysql_result($result1,$i, "INGREDIENT_NAME" );
							$re_order = mysql_result($result1,$i, "RE_ORDER_LEVEL" );
							$qty = mysql_result($result1,$i, "QTY_INHAND" );
							$max = mysql_result($result1,$i, "MAX_LEVEL" );
							echo '<tr>
								<td width="90" align="left">&nbsp;'.$code.'</td>
								<td width="200" align="left">&nbsp;'.$name.'</td>
								<td width="90" align="left">&nbsp;'.$re_order.'</td>
								<td width="90" align="left">&nbsp;'.$qty.'</td>
								<td width="90" align="left">&nbsp;'.$max.'</td>
							  </tr>';
							$i++;
						} // while ends here
						echo '</table></div><br><br>';
				} // if ends here
				else
				{
					echo '<h1 class="style1" style=" font-size:14px;">Currently no item below re-order level</h1>';
				}
		  ?>
</div>
            <br>
            <a href="" class="style8" onclick="printSelection(document.getElementById('del_dish'));return false"><strong>Print Out</strong></a>
        </div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        <div id="templatemo_right_column" style="padding-top: 1px;"> 
  </div>
        
      <!-- end of right column -->
    
    
    <!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
</body>
</html>