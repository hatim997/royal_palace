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
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />

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


<SCRIPT LANGUAGE="JavaScript">
function validate() {
if (document.supplier.name.value.length < 1) {
alert("Please enter Name Field .");
return false;
}
if (document.supplier.contact_person.value.length < 1) {
alert("Please enter Contact Person Field .");
return false;
}
if (document.supplier.mob.value.length < 1) {
alert("Please enter Mobile No Field .");
return false;
}
if (document.supplier.ptcl_no.value.length < 1) {
alert("Please enter PTCL No Field .");
return false;
}
if (document.supplier.address.value.length < 1) {
alert("Please enter Address Field .");
return false;
}
//if (document.supplier.city.value.length < 1) {
//alert("Please enter City Field .");
//return false;
//}
if (document.supplier.status.value.length < 1) {
alert("Please enter Status Field .");
return false;
}
if (document.supplier.work_flag.value.length < 1) {
alert("Please enter Working Flag Field .");
return false;
}

return true;
}
</SCRIPT>







<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

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
        
<h1 class="style1" style="font-size:16px;">New Supplier &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br>
            
            <?php
			if(isset($_POST['submit']))
			{
				//$time = date('H:i:s');
				//$date_time = date('Y-m-d H:i:s');
				$created_id = $_SESSION['username'];
				$rest_id = $_SESSION['restid'];
				$kit_id = $_SESSION['kitid'];
				$name = $_POST['name'];
				$contact_person = $_POST['contact_person'];
				$mob = $_POST['mob'];
				$ptcl_no = $_POST['ptcl_no'];
				$address = $_POST['address'];
				$city = $_POST['city'];
				$status = $_POST['status'];
				$work_flag = $_POST['work_flag'];
				
				
				$query = "SELECT max(SUPPLIER_ID) FROM supplier_master WHERE REST_ID = '$rest_id' ORDER BY SUPPLIER_ID ASC";
				$result = mysql_query($query);
				$num1 = mysql_numrows($result);
				//mysql_close();
				//$num1--;
				$i = 0;
				while($i < $num1)
				{
					$supplier_id = mysql_result($result,$i, "max(SUPPLIER_ID)" );
					$i++;
				}
				$supplier_id++;
				
				
				$query = "INSERT INTO supplier_master 
				(REST_ID, SUPPLIER_ID, SUPPLIER_NAME, CONTACT_PERSON, MOBILE_NO, PTCL_NO, ADDRESS, CITY, STATUS, WORKNG_FLAG, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) VALUES('$rest_id','$supplier_id','$name','$contact_person','$mob','$ptcl_no','$address','$city','$status','$work_flag','$created_id','$date_time','$created_id','$date_time')";
				mysql_query($query) or die('Master Insertion Failed:'.mysql_error());
				
				
				echo '<h4 class="style9">Data Successfully Added</h4><br><br>';
				?>
            
            
            <form name="supplier" method="post" action="" id="supplier" onsubmit="return validate();">
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Contact Person:</td>
    <td><input type="text" name="contact_person" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mobile No:</td>
    <td><input type="text" name="mob" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>PTCL No:</td>
    <td><input type="text" name="ptcl_no" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><textarea cols="20" name="address" id="address" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>City:</td>
    <td><select name="city" id="city">
      <option value="">Select City</option>
      <?php

            $query = "SELECT * FROM city_tab ORDER BY CITY_NAME ASC";
            $result = mysql_query($query);
            $num = mysql_numrows($result);
            $i=0;
            while($i < $num)
            {
                $city1 = mysql_result($result,$i, "CITY_NAME" );
        ?>
        <option value="<?php echo $city1; ?>"><?php echo $city1; ?></option>
              <?php
                
            $i++;
            }  // while loop ends here
                
        ?>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Status:</td>
    <td><select name="status" id="status">
      <option value="">Select Status</option>
      <option value="E">Enable</option>
      <option value="S">Suspended</option>
      <option value="D">Discarded</option>
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Working Flag:</td>
    <td><select name="work_flag" id="work_flag">
      <option value="">Select Flag</option>
      <option value="E">Efficient</option>
      <option value="N">Normal</option>
      <option value="S">Slow</option>
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td><input class="button" align="left" onclick="return validate();" name="submit" style="cursor:pointer" type="submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>
            <?php
				 }//if ends here
				 else
				 {
				 ?>
     
     
     <form name="supplier" method="post" action="" id="supplier" onsubmit="return validate();">
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Name:</td>
    <td><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Contact Person:</td>
    <td><input type="text" name="contact_person" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mobile No:</td>
    <td><input type="text" name="mob" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>PTCL No:</td>
    <td><input type="text" name="ptcl_no" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address:</td>
    <td><textarea cols="20" name="address" id="address" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>City:</td>
    <td><select name="city" id="city">
      <option value="">Select City</option>
      <?php

            $query = "SELECT * FROM city_tab ORDER BY CITY_NAME ASC";
            $result = mysql_query($query);
            $num = mysql_numrows($result);
            $i=0;
            while($i < $num)
            {
                $city1 = mysql_result($result,$i, "CITY_NAME" );
        ?>
        <option value="<?php echo $city1; ?>"><?php echo $city1; ?></option>
              <?php
                
            $i++;
            }  // while loop ends here
                
        ?>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Status:</td>
    <td><select name="status" id="status">
      <option value="">Select Status</option>
      <option value="E">Enable</option>
      <option value="S">Suspended</option>
      <option value="D">Discarded</option>
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Working Flag:</td>
    <td><select name="work_flag" id="work_flag">
      <option value="">Select Flag</option>
      <option value="E">Efficient</option>
      <option value="N">Normal</option>
      <option value="S">Slow</option>
      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td><input class="button" align="left" onclick="return validate();" name="submit" style="cursor:pointer" type="submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>
     
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