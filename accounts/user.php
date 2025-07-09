<?php session_start(); ?>
<?php 
include('config.php');
include('time_settings.php');
include('update_activity.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
$firm = $_SESSION['firm'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gavel Power</title>
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

<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

<script type="text/javascript">
    function show_plan(plan)
    {
		//var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
		
		var xmlhttp;
		
		if (plan == "")
  		{
			document.getElementById("mydiv").innerHTML="";
			return;
  		}
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
				document.getElementById("mydiv").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("POST","ajax/show_plan.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("plan="+plan);
		}
</script>


<SCRIPT LANGUAGE="JavaScript">
function validate() {
if (document.search_laywer.firm_value.value.length < 1) {
alert("Please enter Search  Field .");
return false;
}
if (document.search_laywer.type.value.length < 1) {
alert("Please enter Select Type  Field .");
return false;
}

return true;
}
</SCRIPT>
</head>

<body>
<div id="templatemo_container">

   
    <?php include("includes/header3.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column -->
    
    	<div id="templatemo_left_column">
        	<h2 style="font-size:18px;"><BLINK>&nbsp;&nbsp;<?php echo $_SESSION['logoname1']; ?></BLINK></h2>
            <h2><BLINK>&nbsp;&nbsp;<?php echo $_SESSION['logoname2']; ?></BLINK></h2>
            <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top">
                    <h2 style="color:#FFF;">Working Options</h2>
                </div>
                <div class="leftcolumn_box01_bottom">
                    <div id="menu2" class="form_row">
		<ul>
			<li><a href="assign_firmid.php">Edit Firm Info</a></li>
            <li><a href="new_case_type.php">New Case Type</a></li>
            <li><a href="new_lawyer_type.php">New Lawyer Type</a></li>
            <li><a href="membership_fee.php">Membership Setup</a></li>
            <li><a href="de_client_master.php">New Client</a></li>
			<li><a href="de_client_history.php">Client History</a></li>
            <li><a href="forcelogout.php">Force Logout User</a></li>
            <li><a href="logout.php">Logout</a></li><br>
			
		</ul>
</div>                                
                </div>            
            </div>
            
            <div id=""abc1">
                <div class="abc">
                    <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="225" height="40">
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
        
        	<h1 class="style1" style=" font-size:16px;">Firm Information&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br />
          <div id="none">
          <?php
		  
		  		if(isset($_POST['update']))
				{
					$old_id = $_POST['old_id'];
					$firm_id = strtolower($_POST['firm_id']);
					$firm_name = ucwords(strtolower($_POST['firm_name']));
					$logo1 = ucwords(strtolower($_POST['logo1']));
					$logo2 = ucwords(strtolower($_POST['logo2']));
					$owner = ucwords(strtolower($_POST['owner']));
					$cnic = $_POST['cnic'];
					$address = ucwords(strtolower($_POST['address']));
					$fixed_line1 = $_POST['fixed_line1'];
					$fixed_line2 = $_POST['fixed_line2'];
					$cell1 = $_POST['cell1'];
					$cell2 = $_POST['cell2'];
					$email = $_POST['email'];
					$website = $_POST['website'];
					$status = $_POST['status'];
					$user_type = $_POST['user_type'];
					$plan = $_POST['plan'];
					$discount = $_POST['discount'];
					$recieved = $_POST['recieved'];
					$refer = $_POST['refer'];
					
					$query = "SELECT * FROM plan_charges_tab WHERE PLAN_ID = '$plan'";
					$result = mysql_query($query);
					$num = mysql_numrows($result);
					$i=0;
					while($i < $num)
					{
						$period = mysql_result($result,$i, "PERIOD_IN_DAYS" );
						$charges = mysql_result($result,$i, "PLAN_CHARGES" );
						$i++;
					}  // while loop ends here
					$expiry = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+$period, date("Y")));
					
					$query = "SELECT * FROM firm_tab WHERE FIRM_ID = '$old_id'";
					$result = mysql_query($query);
					$num = mysql_numrows($result);
					$i=0;
					while($i < $num)
					{
						$counter = mysql_result($result,$i, "FREE_TRIAL_COUNTER" );
						$i++;
					}  // while loop ends here
					if($counter >= 2 && $charges == 0)
					{
						echo '<h3 class="style2">You have already availed Trial twice</h3>';	
					}
					else
					{
						$counter++;
					
						$que = "UPDATE firm_tab SET FIRM_ID = '$firm_id', FIRM_NAME = '$firm_name', LOGO_NAME1 = '$logo1', 
	LOGO_NAME2 = '$logo2',FIRM_OWNER = '$owner', FIRM_OWNER_CNIC = '$cnic', FIRM_ADDRESS = '$address', MEMBERSHIP_DATE = '$current_date', 
	MEMBERSHIP_STATUS = '$status', MEMBERSHIP_FLAG = '$user_type', MEMBERSHIP_EXPIRY = '$expiry', FREE_TRIAL_COUNTER = '$counter', 
	FIXED_LINE1 = '$fixed_line1', FIXED_LINE2 = '$fixed_line2', MOBILE_NO1 = '$cell1', MOBILE_NO2 = '$cell2', EMAIL_ADDRESS = '$email', 
	FIRM_WEBSITE_ADDRESS = '$website', REFERRED_BY = '$refer', LAST_PAY_AMOUNT = '$recieved', LAST_PAY_DATE = '$current_date', 
	EDITED_ID = '$userid', EDITED_ON = '$date_time' WHERE FIRM_ID = '$old_id'";
						mysql_query($que) or die ('Update failed!'.mysql_error());
							
						$query = "INSERT INTO charges_collection_tab 
	VALUES('$firm_id','$plan', '$charges', '$discount', '$recieved', '$current_date', '$userid', '$date_time', '$userid', '$date_time')";
						mysql_query($query) or die('Insertion Failed:'.mysql_error());
						
						$update = "UPDATE login_tab SET FIRM_ID = '$firm_id' WHERE FIRM_ID like '$old_id'";
						mysql_query($update) or die ('Query failed!'.mysql_error());
						
						$update = "UPDATE user_tab SET FIRM_ID = '$firm_id' WHERE FIRM_ID like '$old_id'";
						mysql_query($update) or die ('Query failed!'.mysql_error());
							
						echo '<h1 class="style1" style=" font-size:16px;">Successfully Updated</h1><br><br><br>';
						
						echo '<form name="search_laywer" id="search_laywer" method="post" onsubmit="return validate();">
		  <table width="80%" border="0" align="left" cellspacing="0" cellpadding="0">
	<tr>
	<td width="45%">Search:&nbsp;&nbsp;&nbsp;
	  <input type="text" name="firm_value"  id="firm_value"></td>
	<td width="55%" align="left">Search Type:&nbsp;&nbsp;&nbsp;
	  <select name="type" id="type">
	<option value="">Select Type</option>
	<option value="id">Firm ID</option>
	<option value="cnic">Owner CNIC</option>
	<option value="cell">Owner Cell No</option>
	</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
	<input class="button" align="left" onclick="return validate();" name="search" style="cursor:pointer" type="submit" value="Search" /></td>
	</tr>
	
	</table>
	</form>';
					}
				}
				else if(isset($_POST['search']))
				{
					//echo "search pressed";
					$value = $_POST['firm_value'];
					$type = $_POST['type'];
					if($type == "id")
					{
						$query = "SELECT * FROM firm_tab WHERE FIRM_ID = '$value'";	
					}
					else if($type == "cnic")
					{
						$query = "SELECT * FROM firm_tab WHERE FIRM_OWNER_CNIC = '$value'";	
					}
					else
					{
						$query = "SELECT * FROM firm_tab WHERE MOBILE_NO1 = '$value'";	
					}
					
					$result = mysql_query($query) or die ('Query failed!'.mysql_error());
					$num = mysql_numrows($result);
					if(mysql_num_rows($result) == 0)
					{
						echo '<h3 class="style2">No Firm Found</h3>';
					}
					else
					{
						$i = 0;
						while($i < $num)
						{
							$id = mysql_result($result,$i, "FIRM_ID" );
							$name = mysql_result($result,$i, "FIRM_NAME" );
							$logo1 = mysql_result($result,$i, "LOGO_NAME1" );
							$logo2 = mysql_result($result,$i, "LOGO_NAME2" );
							$owner = mysql_result($result,$i, "FIRM_OWNER" );
							$cnic = mysql_result($result,$i, "FIRM_OWNER_CNIC" );
							$address = mysql_result($result,$i, "FIRM_ADDRESS" );
							$fix1 = mysql_result($result,$i, "FIXED_LINE1" );
							$fix2 = mysql_result($result,$i, "FIXED_LINE2" );
							$cell1 = mysql_result($result,$i, "MOBILE_NO1" );
							$cell2 = mysql_result($result,$i, "MOBILE_NO2" );
							$email = mysql_result($result,$i, "EMAIL_ADDRESS" );
							$refer = mysql_result($result,$i, "REFERRED_BY" );
							$i++;
						}
		?>
          <form name="register" action=""  onsubmit="return validate();" method="post">
          <table width="89%" border="0" cellpadding="0" cellspacing="0">
  
  <tr height="3%">
    <td><h2 class="style1">Firm Info</h2></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Firm ID:</td>
    <td align="left"><input type="text" name="firm_id" id="firm_id" value="<?php echo $id; ?>" />
    <input type="hidden" name="old_id" id="old_id" value="<?php echo $id; ?>" /></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Firm Name:</td>
    <td align="left"><input type="text" name="firm_name" id="firm_name" value="<?php echo $name; ?>" /></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Logo Name 1:</td>
    <td align="left"><input type="text" name="logo1" id="logo1" value="<?php echo $logo1; ?>" /></td>
    <td align="left">Logo Name 2:</td>
    <td align="left"><input type="text" name="logo2" id="logo2" value="<?php echo $logo2; ?>" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Owner Name:</td>
    <td align="left"><input type="text" name="owner" id="owner" value="<?php echo $owner; ?>" /></td>
    <td align="left">CNIC:</td>
    <td align="left"><input type="text" name="cnic" id="cnic" value="<?php echo $cnic; ?>" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Address:</td>
    <td align="left"><textarea name="address" id="address"><?php echo $address; ?></textarea></td>
    <td align="left">&nbsp;</td>
    <td align="left"><div class="suggestionsBox" id="suggestions" style="display: none;">
    <img src="upArrow.png" style="position: relative; top: -12px; left: 10px;" alt="upArrow" />
    <div class="suggestionList" id="autoSuggestionsList">
    </div>
				</div></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Fixed Line 1:</td>
    <td align="left"><input type="text" name="fixed_line1" id="fixed_line1" value="<?php echo $fix1; ?>" /></td>
    <td align="left">Fixed Line 2:</td>
    <td align="left"><input type="text" name="fixed_line2" id="fixed_line2" value="<?php echo $fix2; ?>" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Mobile No 1:</td>
    <td align="left"><input type="text" name="cell1" id="cell1" value="<?php echo $cell1; ?>" /></td>
    <td align="left">Mobile No 2:</td>
    <td align="left"><input type="text" name="cell2" id="cell2" value="<?php echo $cell2; ?>" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" align="left">Email Address:</td>
    <td width="32%" align="left"><input type="text" name="email" id="email" value="<?php echo $email; ?>" /></td>
    <td width="20%" align="left">Website Address:</td>
    <td width="32%" align="left"><input type="text" name="website_address" id="website_address" value="<?php echo $website; ?>" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="3%">
    <td><h2 class="style1">Membership</h2></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" align="left">Membership Status:</td>
    <td width="32%" align="left"><select name="status" id="status">
      <option value="">Status</option>
      <option value="E">Enable</option>
      <option value="T">Temporarily Suspended</option>
      <option value="S">Suspended</option>
      <option value="D">Disable</option>
      </select></td>
    <td width="20%" align="left">Membership Type:</td>
    <td width="32%" align="left"><select name="user_type" id="user_type">
      <option value="">Membership Type</option>
      <option value="P">Paid</option>
      <option value="U">Free</option>
      </select></td>
  </tr>
  
  <tr align="left">
    <td width="20%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%" align="left">Membership Plan:</td>
    <td width="32%" align="left"><select name="plan" id="plan" onchange="show_plan(this.value)">
      <option value="">Select Plan</option>
      <?php

            $query = "SELECT * FROM plan_charges_tab ORDER BY PLAN_ID ASC";
            $result = mysql_query($query);
            $num = mysql_numrows($result);
            $i=0;
            while($i < $num)
            {
                $l_tid = mysql_result($result,$i, "PLAN_ID" );
				$l_tname = mysql_result($result,$i, "PLAN_NAME" );
        ?>
        <option value="<?php echo $l_tid; ?>"><?php echo $l_tname; ?></option>
              <?php
                
            $i++;
            }  // while loop ends here
                
        ?>
    </select></td>
    <td width="20%" align="left">&nbsp;</td>
    <td width="32%" align="left">&nbsp;</td>
  </tr>
  
  <tr align="left">
    <td width="20%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
  </tr>
  </table>
  <div id="mydiv">
  </div>
  <table width="89%" border="0" cellpadding="0" cellspacing="0">
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Discount:</td>
    <td align="left"><input type="text" name="discount" id="discount" /></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Recieved Amount:</td>
    <td align="left"><input type="text" name="recieved" id="recieved" /></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="left">Referred By:</td>
    <td align="left"><input type="text" name="refer" id="refer" value="<?php echo $refer; ?>" /></td>
    <td align="left">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="left">
    <td width="20%"></td>
    <td width="29%" align="left"><input onclick="return validate();" class="button" align="left" style="cursor:pointer" type="submit" name="update" value="Update" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
    <td width="19%" align="right"></td>
    <td width="32%">&nbsp;</td>
  </tr>
</table>
</form>
        <?php
					}
				}
				else
				{ 
          ?>
          <form name="search_laywer" id="search_laywer" method="post" onsubmit="return validate();">
          <table width="80%" border="0" align="left" cellspacing="0" cellpadding="0">
  <tr>
    <td width="45%">Search:&nbsp;&nbsp;&nbsp;
      <input type="text" name="firm_value"  id="firm_value"></td>
    <td width="55%" align="left">Search Type:&nbsp;&nbsp;&nbsp;
      <select name="type" id="type">
  <option value="">Select Type</option>
  <option value="id">Firm ID</option>
  <option value="cnic">Owner CNIC</option>
  <option value="cell">Owner Cell No</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<input class="button" align="left" onclick="return validate();" name="search" style="cursor:pointer" type="submit" value="Search" /></td>
  </tr>
  
</table>
</form>

		<?php
		
			} // else ends here
		?>
        	</div>
        </div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        <div id="templatemo_right_column"><br><br><br><br />
        </div>
        
      <!-- end of right column -->
    
    </div>
    
    <!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
<script type="text/javascript">
swfobject.registerObject("FlashID2");
    </script>
</body>
</html>