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
<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web Saucer</title>
<link href="templatemo_style1.css" rel="stylesheet" type="text/css" />
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
	if(name == "" || day == "" || month == "" || cell == "" || city == "" || pro_type == "")
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
	xmlhttp.send("name="+name+"&cell="+cell+"&day="+day+"&month="+month+"&email="+email+"&city="+city+"&pro_type="+pro_type);
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
                    <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="225" height="40">
                      <param name="movie" value="images/updates.swf" />
                      <param name="quality" value="high" />
                      <param name="wmode" value="opaque" />
                      <param name="swfversion" value="9.0.45.0" />
                      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
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
        
        	<h1 class="style1" style=" font-size:16px;">New Guest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
          <p>&nbsp;</p>
          <div id="master">
          <form name="testform" action="de_client_master.php" method="post">
          <table width="410" align="center" border="0" cellpadding="0" cellspacing="0">
          
  <tr>
    <td width="120" align="left">Name:</td>
    <td width="290" align="left"><input type="text" id="name" name="name" /></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="left">Date Of Birth:</td>
    <td width="290" align="left"><select id="day" name="day">
                  <option value="">Day</option>
                  <option value="01">01</option>
                  <option value="02">02</option>
                  <option value="03">03</option>
                  <option value="04">04</option>
                  <option value="05">05</option>
                  <option value="06">06</option>
                  <option value="07">07</option>
                  <option value="08">08</option>
                  <option value="09">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
    &nbsp;&nbsp;:&nbsp;&nbsp;
    <select id="month" name="month">
                  <option value="">Month</option>
                  <option value="Jan">Jan</option>
                  <option value="Feb">Feb</option>
                  <option value="Mar">Mar</option>
                  <option value="Apr">Apr</option>
                  <option value="May">May</option>
                  <option value="Jun">Jun</option>
                  <option value="Jul">Jul</option>
                  <option value="Aug">Aug</option>
                  <option value="Sep">Sep</option>
                  <option value="Sep">Oct</option>
                  <option value="Nov">Nov</option>
                  <option value="Dec">Dec</option>
          </select></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="left">Mobile No:</td>
    <td width="290" align="left"><input type="text" id="cell" name="cell" /></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="left">Email:</td>
    <td width="290" align="left"><input type="text" id="email" name="email" /></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="left">City:</td>
    <td width="290" align="left">
    <select id="city" name="city">
      <option value="">Select City</option>
      <?php

            $query = "SELECT * FROM city_tab ORDER BY CITY_NAME ASC";
            $result = mysql_query($query);
            $num = mysql_numrows($result);
            $i=0;
            while($i < $num)
            {
                $city = mysql_result($result,$i, "CITY_NAME" );
        ?>
        <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
              <?php
                
            $i++;
            }  // while loop ends here
                
        ?>
    </select></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="120" align="left">Profession Type:</td>
    <td width="290" align="left">
    <select id="pro_type" name="pro_type">
      <option value="">Profession Type</option>
      <?php

            $query = "SELECT * FROM profession_tab ORDER BY PROFESSION_TITLE ASC";
            $result = mysql_query($query);
            $num = mysql_numrows($result);
            $i=0;
            while($i < $num)
            {
                $p_id = mysql_result($result,$i, "PROFESSION_ID" );
				$p_name = mysql_result($result,$i, "PROFESSION_TITLE" );
        ?>
        <option value="<?php echo $p_id; ?>"><?php echo $p_name; ?></option>
              <?php
                
            $i++;
            }  // while loop ends here
                
        ?>
    </select></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">                    
    <td align="left" width="120" valign="top">&nbsp;<br><br><br></td>
    <td align="left" width="290" valign="bottom"><input type="button" onclick="add_guest(this.form)" class="button" align="left" style="cursor:pointer"name="Submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
  </table>
  </form>
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