<?php session_start(); ?>
<?php
include('config.php');
include('time_settings.php');
//include('update_activity.php');
//$userid = $_SESSION['username'];
//$password = $_SESSION['password'];
//$restid = $_SESSION['restid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<!--<link href="templatemo_style6.css" rel="stylesheet" type="text/css" />-->

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<style type="text/css">
<!--
.style1 {
	color: #013c54;
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
a.table { color:#2083AC; text-decoration:none; }
a.table:hover{ text-decoration:none; color:#ECBA52; }
a.table:visited{ background-color:#666; color:#039;}
a.table:active {color:#000; }
a.table2 { color:#FFF; text-decoration:none; }
a.table2:hover{ text-decoration:none; color:#FFF; }
a.table2:visited{ background-color:#666; color:#FFF;}
a.table2:active {color:#FFF; }
.highlight
{
	background-color:#F00;
}
.highlight2
{
	background-color:#0C3;
}
	
a.dishes { color:#ECBA52; text-decoration:none; }
a.dishes:hover{color:#A83F00; text-decoration:none; }
a.dishes:visited, a.dishes:active {color:#F00;}
</style>
<style type="text/css">
table.altrowstable tr:nth-child(even){    background-color:#EAF0F6; }
.padding1
{padding-left:9px;
}
</style>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script language="javaScript" type="text/javascript">
$(document).ready(function(){
    $("a").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
    });
  });
function add_orders(dish_id)
{
	var order_no = document.getElementById("order_no").value;

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
			document.getElementById("order").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/add_orders.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("dish_id="+dish_id+"&order_no="+order_no);
}
</script>

<script language="javaScript" type="text/javascript">
function save_order(dish_id)
{
	//alert("Ok");
	var order_no = document.getElementById("order_no").value;
	var dish_qty = document.getElementById("dish_qty").value;
	var dish_name = document.getElementById("dish_name").value;
	var dish_charges = document.getElementById("dish_charges").value;
	
	if(dish_qty == "")
	{
		alert("Please enter Dish Quantity");
		return;
	}
	else if(dish_qty == 0)
  {
   alert("Quantity can never zero");
   return;
  }
	else if(isDigits(dish_qty)==false)
  {
   alert("Required quantity is not numeric");
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
	xmlhttp.open("POST","ajax/save_order.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("dish_id="+dish_id+"&dish_charges="+dish_charges+"&dish_qty="+dish_qty+"&order_no="+order_no+"&dish_name="+dish_name);
}
</script>

<script language="javaScript" type="text/javascript">
function save_order_flag(order_no)
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
			document.getElementById("master").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/save_order_flag.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("order_no="+order_no);
}
</script>

<script language="javaScript" type="text/javascript">
function cancel_order(order_no)
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
			document.getElementById("master").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/cancel_order.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("order_no="+order_no);
}
</script>

<script language="javaScript" type="text/javascript">
function edit_dish_qty(order_no, dish_qty,dish_id)
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
			document.getElementById("order").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/edit_dish_qty.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("order_no="+order_no+"&dish_qty="+dish_qty+"&dish_id="+dish_id);
}
</script>
<script language="javaScript" type="text/javascript">
function edit_save_qty(order_no,dish_id)
{
	//alert("Ok");
	var new_req_quantity = document.getElementById("new_req_quantity").value;
	if(new_req_quantity == "")
	{
		alert("Please enetr required quantity");
		return;
	}
	else if(isDigits(new_req_quantity)==false)
  {
   alert("Required quantity is not numeric");
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
	xmlhttp.open("POST","ajax/edit_save_qty.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("order_no="+order_no+"&new_req_quantity="+new_req_quantity+"&dish_id="+dish_id);
}

</script>
<script language="javaScript" type="text/javascript">
function delete_dish_order(order_no,dish_id)
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
			document.getElementById("master").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/delete_dish_order.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("order_no="+order_no+"&dish_id="+dish_id);
}
</script>


<script language="javaScript" type="text/javascript">
function add_guests(table_id)
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
			document.getElementById("order").innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("POST","ajax/no_guests_form.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("table_id="+table_id);
}
</script>

<script language="javaScript" type="text/javascript">
function save_guests(table_id)
{
	//alert("Ok");
	var total_guests = document.getElementById("total_guests").value;
	//var order_no = document.getElementById("order_no").value;
	if(total_guests == "")
	{
		alert("Please enter Number of Guests");
		return;
	}
	
	else if(isDigits(total_guests)==false)
  {
   alert("Required quantity is not numeric");
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
	xmlhttp.open("POST","ajax/save_guests.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("table_id="+table_id+"&total_guests="+total_guests);
}
function isDigits(argvalue) {
    argvalue = argvalue.toString();
    var validChars = "0123456789";
    var startFrom = 0;
    if (argvalue.substring(0, 2) == "0x") {
       validChars = "0123456789abcdefABCDEF";
       startFrom = 2;
    } else if (argvalue.charAt(0) == "0") {
       validChars = "01234567";
       startFrom = 1;
    }
    for (var n = 0; n < argvalue.length; n++) {
        if (validChars.indexOf(argvalue.substring(n, n+1)) == -1) return false;
    }
  return true;
}
</script>



</head>

<body style="background-color:#FFF;">

<div id="templatemo_container" style="background-color:#FFF;">
   
    <?php //include("includes/header2.php"); ?>	
    
    
<!-- start of content -->
    
	<div id="templatemo_content" align="center">
    
    	<!-- start of left column --><!-- end of left column -->
        
        <!-- start of middle column -->
        
   	  <div>
        <table>
        <tr>
        <td width="590" align="left">
        	<h1 class="style1" style=" font-size:16px;">New Order</h1>
            </td>
            <td width="590" align="right">
              <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100" height="25">
                <param name="movie" value="images/back_btn.swf" />
                <param name="quality" value="high" />
                <param name="wmode" value="opaque" />
                <param name="swfversion" value="6.0.65.0" />
                <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                <param name="expressinstall" value="Scripts/expressInstall.swf" />
                <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                <!--[if !IE]>-->
                <object type="application/x-shockwave-flash" data="images/back_btn.swf" width="100" height="25">
                  <!--<![endif]-->
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <param name="expressinstall" value="Scripts/expressInstall.swf" />
                  <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                  <div>
                    <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                    <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                  </div>
                  <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
      </object></td>
            </tr>
            </table>
          

		<div id="master">
            <!--
            <table width="1200" cellspacing="0" cellpadding="0" border="1">
  <tr>
  	<td width="1200" style="background:url(images/dock-bg.png); font-size:16px; color:#FFFFFF;" align="center"><b><i>Order Taking</i></b></td>
  </tr>
  </table>
  -->
  <table width="1200" align="center" border="1" cellspacing="0" cellpadding="0">
  <thead style="background:#2083AC; font-style:italic; color:#FFF;">
    <td align="center" width="596"><b>Tables</b></td>
    <td align="center"  width="596"><b>Dishes </b></td>
  </thead>
  <tr>
    <td>
        <div id="tables" style="width:596px; height:280px; overflow: auto;">
        <table width="590" align="center" border="0" cellspacing="0" cellpadding="0" style='font-size:14px; text-decoration:none; color:#FFF;' >
        
       <?php
			
			$query = "SELECT * FROM tables_tab ORDER BY TABLE_NO ASC";
			$result = mysql_query($query);
			$num1 = mysql_numrows($result);
			$i = 0;
			
			//echo "<tr>";
			while($i < $num1)
			{
				$table_id = mysql_result($result,$i, "TABLE_ID" );
				$table_no = mysql_result($result,$i, "TABLE_NO" );
				if($i % 6 == 0) echo '<tr>';
				echo "<td height='50px' align='center'>"; echo '<a class="table" href="javascript:add_guests('.$table_id.')" alt="Table" title="Table"><img width="60" height="60" SRC="images/table.png" alt="Table" border="0" />';
				echo '<font style="font-size:16px;">';
				echo '<br>'.$table_no;
				echo '</font>';
				 echo '</a>';
				 echo "</td>";
				
				$i++;
				if($i % 6 == 0) echo '</tr>';
			}
			//echo "</tr>";
			
		?>
        </table>
        </div>
    </td>
    <td>
        <div id="dishes" style="width:596px; height:280px; overflow: auto;">
        <table width="590" align="center" border="0" cellspacing="0" cellpadding="0">
        
       <?php
			
			$query2 = "SELECT * FROM food_type_tab ORDER BY FOOD_TYPE_DETAIL ASC";
			$result2 = mysql_query($query2);
			$num2 = mysql_numrows($result2);
			$i = 0;
			
			echo "<tr valign='top'>";
			while($i < $num1)
			{
				$food_type_id = mysql_result($result2,$i, "FOOD_TYPE_ID" );
				$food_type_detail = mysql_result($result2,$i, "FOOD_TYPE_DETAIL" );
				
				echo "<td align='left' style='font-size:16px; color:#2083AC;' >";
				
				echo '<table border="0" >';
				echo '<tr>';
				echo '<td class="padding1">';
				echo $food_type_detail;	
				echo '</td>';
				echo '</tr>'; 
				echo '</table>';
       	 	$query3 = "SELECT * FROM dish_master_tab where FOOD_TYPE_ID='$food_type_id' ORDER BY DISH_NAME ASC";
			$result3 = mysql_query($query3);
			$num3 = mysql_numrows($result3);
			$j = 0;
			echo "<table border='0' width='200' style='font-size:14px; color:#FFF;' >";
			
			while($j < $num3)
			{
				$food_id = mysql_result($result3,$j, "FOOD_TYPE_ID" );
				$dish_name = mysql_result($result3,$j, "DISH_NAME" );
				$dish_id = mysql_result($result3,$j, "DISH_ID" );
				echo "<tr>";
				echo "<td class='padding1'>";
				
				
				echo '<a class="dishes" href="javascript:add_orders('.$dish_id.')" alt="Dish" title="Dish" >'; 
				
				echo $dish_name;
				
				
				echo '</a>'; 
			
				echo "</td>";
				
				echo "</tr>";
				$j++;
			}
			
				echo "</table>";
      
				echo "</td>";
				
				$i++;
			}
			echo "</tr>";
			
		?>
        </table>
        </div>
    </td>
  </tr>
  <!--<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>-->
</table>

<table width="1200" align="center" cellspacing="0" cellpadding="0" BORDER=1 RULES=NONE FRAME=BOX>
  <tr>
  	<td width="1200" align="center">
    	
        <div id="order" style="width:945px; height:186px; overflow: auto;" align="center">
        
          
          </div>
    </td>
  </tr>
  </table>
          </div><!-- end of master division -->
          <br><br>	

<div id="entry">

</div>	<!-- end of entry division -->

</div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        
      <!-- end of right column -->
    
    </div>
    
    <!-- end of content -->
        
        
	<?php //include("includes/footer.php"); ?>
<script type="text/javascript">
swfobject.registerObject("FlashID");
    </script>
</body>
</html>