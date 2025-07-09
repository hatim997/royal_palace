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
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Gavel Power</title>
  <meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
  <meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
  <link href="templatemo_style.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript" src="js/jquery-1.4.js"></script>
  <script type="text/javascript">
    $(function() {
      //call the function onload
      getdata(1);
    });

    function getdata(pageno) {
      var targetURL = 'search_results.php?page=' + pageno;

      $('#retrieved-data').html('<p><img src="images/ajax-loader.gif" /></p>');
      $('#retrieved-data').load(targetURL).hide().fadeIn('slow');
    }
  </script>

  <script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
  <style type="text/css">
    <!--
    .style1 {
      color: #013c54
    }

    .style8 {
      color: #FF0000;
      font-style: italic;
    }

    h2 {
      margin: 0px;
      padding: 0px 0px 0px 0px;
      font-size: 15px;
      font-weight: bold;
      color: #013c54;
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

    #menu2 li a:link,
    #menu2 li a:visited {
      color: #013c54;
      display: block;
      background: url(EBmenus/Vertical%20Menus/menu2.png);
      padding: 4px 0 0 30px;
    }

    #menu2 li a:hover {
      color: #FFFFFF;
      background: url(EBmenus/Vertical%20Menus/menu2.png) 0 -32px;
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
      padding: 0;
      margin: 0 auto;

      font-size: 12px;
    }
  </style>

  <link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
  <link type="text/css" rel="stylesheet" media="all" href="css/screen.css" />

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
  <script type="text/javascript">
    var auto_refresh = setInterval(
      function() {
        $('#members').load('ajax/show_members.php').fadeIn("slow");
      }, 5000); // refresh every 10000 milliseconds
  </script>

  <script type="text/javascript">
    function change_status(c_status) {
      //var lab_name = encodeURIComponent(document.getElementById("lab_name").value);

      if (c_status == "") {
        //document.getElementById("info").innerHTML="";
        alert("Please select correct status.");
        return;
      }
      var xmlhttp;

      if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("status_c").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("POST", "ajax/change_status.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("c_status=" + c_status);
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
        <h2 style="font-size:18px;">
          <BLINK>&nbsp;&nbsp;Welcome <?php echo $_SESSION['username']; ?></BLINK>
        </h2>
        <div id="leftcolumn_box01">
          <div class="leftcolumn_box01_top">
            <h2>Working Options</h2>
          </div>
          <div class="leftcolumn_box01_bottom">
            <div id="menu2" class="form_row">
              <ul>
                <li><a href="daily_diary_img.php">Diary</a></li>
                <li><a href="new_case_type_img.php">New Case Type</a></li>
                <li><a href="new_lawyer_type_img.php">New Lawyer Type</a></li>
                <li><a href="de_client_master_img.php">New Client</a></li>
                <li><a href="de_client_history_img.php">Client History</a></li>
                <li><a href="edit_profile.php">My Membership</a></li>
                <li><a href="logout.php">Logout</a></li><br>

                <br>

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

        <h1 class="style1" style=" font-size:16px;">Welcome to Gavel Power&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br />
        <h1 class="style1" style=" font-size:14px;">Tomorrow's Diary:</h1><br /><br />
        <div id='retrieved-data'>
          <!-- 
	this is where data will be  shown
	-->
          <img src="images/ajax-loader.gif" />
        </div>


      </div>
      <!-- end of middle column -->

      <!-- start of right column -->

      <div id="templatemo_right_column" style="padding-top: 1px;">
        <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200" height="60">
          <param name="movie" value="images/chitchat.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="9.0.45.0" />
          <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
          <param name="expressinstall" value="../Scripts/expressInstall.swf" />
          <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="images/chitchat.swf" width="200" height="60">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="9.0.45.0" />
            <param name="expressinstall" value="../Scripts/expressInstall.swf" />
            <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
            <div>
              <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
              <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
        </object><br><br>
        <p style="color: #7a4b1f; font-size:12px;">&nbsp;<b>Change Status:</b>
          <select name="status" id="status" onchange="change_status(this.value)">
            <option value="">Select Status</option>
            <option value="A">Available</option>
            <option value="U">Unavailable</option>
          </select>
          <br><br>
        <div id="status_c">
          <p style="color: #7a4b1f; font-size:14px;">&nbsp;<b>My Status:
              <?php

              if ($_SESSION['chat_status'] == "A") {
                echo "Available";
              }
              /*
			  else if($_SESSION['chat_status'] == "B")
			  {
				  echo "Busy";
			  }
			  */ else {
                echo "Unavailable";
              }
              ?></b></p>
        </div>
        <div id="members">

        </div>
      </div>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/chat.js"></script>
    </div>

    <!-- end of right column -->


    <!-- end of content -->


    <?php include("includes/footer.php"); ?>
    <script type="text/javascript">
      swfobject.registerObject("FlashID2");
      swfobject.registerObject("FlashID3");
    </script>
</body>

</html>