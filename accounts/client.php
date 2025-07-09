<?php 
include('time_settings.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	
	font-size:12px;
}
</style>
<link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
<script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>
<link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">
</head>

<body>
<div id="templatemo_container">
<div class="gradient7">
	<h2 style="font-size:18px;"><BLINK>Wi Tech Mill hhjbhjbbdjba  </BLINK></h2>
    <h2>&nbsp;</h2>
    <h2><BLINK>Private Ltd. </BLINK></h2>
</div>
   
    <?php include("includes/header.php"); ?>
    
	
    
<!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column -->
    
    	<div id="templatemo_left_column">
        <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top">
                    <h2 style="color:#FFF;">Working Options</h2>
                </div>
          <div class="leftcolumn_box01_bottom"><div id="menu2">
		<ul>
			<li><a href="#1" title="Link 1">Link 1</a></li>
			<li><a href="#2" title="Link 2">Link 2</a></li>
			<li><a href="#3" title="Link 3">Link 3</a></li>
			<li><a href="#4" title="Link 4">Link 4</a></li>
			<li><a href="#5" title="Link 5">Link 5</a></li>
            <li><a href="#6" title="Link 6">Link 6</a></li>
            <li><a href="#7" title="Link 7">Link 7</a></li>
            <li><a href="#8" title="Link 8">Link 8</a></li>	
		</ul>
</div></div>            
          </div><br><br>
           	  <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top">
                    <h2>Updates</h2>
                </div>
          <div class="leftcolumn_box01_bottom">
		<br><br><br><br>
        </div>            
          </div>
            </div>
            
			
        
    <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
        
        	<h1 class="style1" style=" font-size:16px;">Gavel Power&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
          <p>&nbsp;</p>
          <table width="89%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="16%">Client ID:</td>
    <td width="32%">
    
    <input type="text" id="id" value="<?php echo $client_id; ?>" readonly="readonly" /></td>
    <td width="20%">Client Name:</td>
    <td width="32%"><input type="text" id="name" /></td>
  </tr>
  <tr height="3%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="16%">Care Of:</td>
    <td width="32%"><input type="text" id="care_of" /></td>
    <td width="20%"> Address:</td>
    <td width="32%" valign="top"><textarea rows="3" id="address" cols="15">
</textarea> </td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>City:</td>
    <td><input type="text" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
    <div class="suggestionsBox" id="suggestions" style="display: none;">
    <img src="upArrow.png" style="position: relative; top: -12px; left: 10px;" alt="upArrow" />
    <div class="suggestionList" id="autoSuggestionsList">
    </div>
				</div></td>
    <td>CNIC:</td>
    <td><input type="text" id="cnic" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fixed Line:</td>
    <td><input type="text" id="fixed_line" /></td>
    <td>Mobile No:</td>
    <td><input type="text" id="mobile_no" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input type="text" id="email" /></td>
    <td>Client Type:</td>
    <td>
    <select id="client_type">
      <option>Client Type</option>
      
        <option value="<?php echo $c_tid; ?>"><?php echo $c_tname; ?></option>
       
    </select>	</td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Case no:</td>
    <td><input type="text" id="case_no" /></td>
    <td>Case Type:</td>
    <td>
    <select id="case_type">
      <option>Case Type</option>
      
    </select>	</td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="16%">Starting Date</td>
    <td width="32%"><input type="text" class="tcal" name="starting_date" id="starting_date" /></td>
    <td width="20%">Indicator Date:</td>
    <td width="32%"><input type="text" class="tcal" name="indicator_date" id="indicator_date" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="16%">Case Fee:</td>
    <td width="32%"><input type="text" id="case_fee" /></td>
    <td width="20%">Fee Discount:</td>
    <td width="32%"><input type="text" id="discount" /></td>
  </tr>
  <tr height="5%">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="16%">Received:</td>
    <td width="32%"><input type="text" id="received" /></td>
    <td width="20%">Referred_By:</td>
    <td width="32%"><input type="text" id="referred" />
      </td>
  </tr>
  <tr align="left">
    <td width="20%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
  </tr>
  <tr align="left">
    <td width="20%"></td>
    <td width="37%" align="left"><input onclick="client_master()" class="button" align="left" style="cursor:pointer" type="submit" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
    <td width="20%" align="right"></td>
    <td width="32%">&nbsp;</td>
  </tr>
</table>

      </div>
    	<!-- end of middle column -->
        
        <!-- start of right column -->
        
        
      <!-- end of right column -->
    
    </div>
    
    <!-- end of content -->
        
        
	<?php include("includes/footer.php"); ?>
</body>
</html>