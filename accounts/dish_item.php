<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
//include('time_settings.php');
//include('update_activity.php');
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
	function show_item(value)
	{
		//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
		
		if (value == "")
		{
			//document.getElementById("info").innerHTML="";
			//alert("Please select correct Category.");
			document.getElementById("show_item").innerHTML="";
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
				document.getElementById("show_item").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/show_item_form1.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("supplier_id="+value);
		}
</script>


<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

<script language="JavaScript">
	new tcal ({
		'formname': 'dish',
		'controlname': 'charges_on_date'
	});
	</script>
    
  <script language="JavaScript">
	new tcal ({
		'formname': 'dish',
		'controlname': 'charges_off_date'
	});
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
        
<h1 class="style1" style="font-size:16px;">Dish Recipe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
<br>
            
            <?php
			if(isset($_POST['submit']))
			{
				$s_id = $_POST['supplier_id'];
                $i_id = $_POST['item_id'];
				$volume = $_POST['volume'];
				$unit_id = $_POST['unit_id'];
				//$time = date('H:i:s');
				//$date_time = date('Y-m-d H:i:s');
				$created_id = $_SESSION['username'];
				
				$query = "INSERT INTO dish_ingredient_tab VALUES('$s_id','$i_id','$volume','$unit_id','$created_id','$date_time','$created_id','$date_time')";
					
				mysql_query($query) or die('Insertion Failed:'.mysql_error());
				echo '<h4 class="style9">Ingredient Successfully Defined.</h4><br><br>';
				?>
            
            
            <!--------form for supplier and item-------->

<form name="supplier" method="post" action="" id="supplier" onsubmit="return check();">
            <div id="supplier" align="left">
            <table width="400" align="center" border="0" cellspacing="0" cellpadding="0">
            <tr> 
         <td width="115">Select Dish:</td>
         <td width="284">
         <select name="supplier_id" id="supplier_id" onchange="show_item(this.value)">
            <option value=" ">Select a Dish</option>
           <?php
            
            
$query = "SELECT * from dish_master_tab WHERE REST_ID = '$rest_id' ORDER BY DISH_NAME ASC";
$result = mysql_query($query) or die("Error: ".mysql_error());
$num = mysql_num_rows($result);//get total number of records
$i = 0;
while($i < $num)//check till i is less than number of records
{
	$id = mysql_result($result, $i, "DISH_ID");//from the array[$i] pick column(disease_id)
	$name=mysql_result($result,$i,"DISH_NAME");
	echo '<option value="'.$id.'">'.$name.'</option>';
	$i++;
}
		?>		
      
      </select></td>
</tr>
<tr> 
         <td width="115">&nbsp;</td>  
         <td width="284">&nbsp;</td>
</tr> 
</table>

<div id="show_item">

</div>
<table width="400" align="center" border="0" cellspacing="0" cellpadding="0">
    <tr> 
         <td width="115">Volume:</td>  
         <td width="284" align="left"><input type="text" name="volume" /></td>
</tr>  
<tr> 
         <td width="115">&nbsp;</td>  
         <td width="284">&nbsp;</td>
</tr>
  <td width="115">Unit:</td>
         <td width="284">
         <select name="unit_id" id="unit_id">
            <option value=" ">Select Unit</option>
           <?php
            
            
$query = "SELECT * from unit_tab ORDER BY UNIT_DETAIL ASC";
$result = mysql_query($query) or die("Error: ".mysql_error());
$num = mysql_num_rows($result);//get total number of records
$i = 0;
while($i < $num)//check till i is less than number of records
{
	$id = mysql_result($result, $i, "UNIT_ID");//from the array[$i] pick column(disease_id)
	$name=mysql_result($result,$i,"UNIT_DETAIL");
	echo '<option value="'.$id.'">'.$name.'</option>';
	$i++;
}
		?>		
      
      </select></td>
</tr>
<tr> 
         <td width="115">&nbsp;</td>  
         <td width="284">&nbsp;</td>
</tr>
    <tr>
  <td width="115">&nbsp;</td>
  <td width="284"><input class="button" align="left" onclick="return check();" name="submit" style="cursor:pointer" type="submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</div>
</form><br>        

     

            <?php
				 }//if ends here
				 else
				 {
				 ?>
<!--------form for supplier and item-------->

<form name="supplier" method="post" action="" id="supplier" onsubmit="return check();">
            <div id="supplier" align="left">
            <table width="400" align="center" border="0" cellspacing="0" cellpadding="0">
            <tr> 
         <td width="115">Select Dish:</td>
         <td width="284">
         <select name="supplier_id" id="supplier_id" onchange="show_item(this.value)">
            <option value=" ">Select a Dish</option>
           <?php
            
            
$query = "SELECT * from dish_master_tab WHERE REST_ID = '$rest_id' ORDER BY DISH_NAME ASC";
$result = mysql_query($query) or die("Error: ".mysql_error());
$num = mysql_num_rows($result);//get total number of records
$i = 0;
while($i < $num)//check till i is less than number of records
{
	$id = mysql_result($result, $i, "DISH_ID");//from the array[$i] pick column(disease_id)
	$name=mysql_result($result,$i,"DISH_NAME");
	echo '<option value="'.$id.'">'.$name.'</option>';
	$i++;
}
		?>		
      
      </select></td>
</tr>
<tr> 
         <td width="115">&nbsp;</td>  
         <td width="284">&nbsp;</td>
</tr> 
</table>

<div id="show_item">

</div>
<table width="400" align="center" border="0" cellspacing="0" cellpadding="0">
    <tr> 
         <td width="115">Volume:</td>  
         <td width="284" align="left"><input type="text" name="volume" /></td>
</tr>  
<tr> 
         <td width="115">&nbsp;</td>  
         <td width="284">&nbsp;</td>
</tr>
  <td width="115">Unit:</td>
         <td width="284">
         <select name="unit_id" id="unit_id">
            <option value=" ">Select Unit</option>
           <?php
            
            
$query = "SELECT * from unit_tab ORDER BY UNIT_DETAIL ASC";
$result = mysql_query($query) or die("Error: ".mysql_error());
$num = mysql_num_rows($result);//get total number of records
$i = 0;
while($i < $num)//check till i is less than number of records
{
	$id = mysql_result($result, $i, "UNIT_ID");//from the array[$i] pick column(disease_id)
	$name=mysql_result($result,$i,"UNIT_DETAIL");
	echo '<option value="'.$id.'">'.$name.'</option>';
	$i++;
}
		?>		
      
      </select></td>
</tr>
<tr> 
         <td width="115">&nbsp;</td>  
         <td width="284">&nbsp;</td>
</tr>
    <tr>
  <td width="115">&nbsp;</td>
  <td width="284"><input class="button" align="left" onclick="return check();" name="submit" style="cursor:pointer" type="submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</div>
</form><br>        

     
     <?php
				 }//else ends here
				 ?>
            <br>
        </div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        <div id="templatemo_right_column" style="padding-top: 1px;"> 
  </div>
        
      <!-- end of right column -->
    
    
    <!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
<script type="text/javascript">
swfobject.registerObject("FlashID3");
    </script>
</body>
</html>