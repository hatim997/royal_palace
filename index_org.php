<?php
include('check_activity.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
  <meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. " Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
  <meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Web Saucer</title>

  <link href="templatemo_style.css" rel="stylesheet" type="text/css" />


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
    .style3 {
      color: #013c54;
      font-size: 12px;
    }
  </style>

  <link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">
</head>

<body>
  <div id="templatemo_container">

    <?php include("includes/header1.php"); ?>



    <!-- start of content -->

    <div id="templatemo_content">

      <!-- start of left column -->

      <div id="templatemo_left_column">

        <div id="leftcolumn_box01">
          <div class="leftcolumn_box01_top">
            <h2 style="color:#FFF;">Login</h2>
          </div>
          <div class="leftcolumn_box01_bottom">
            <form method="post" action="login.php">

              <div class="form_row"><label>User ID</label><input class="inputfield" name="username" type="text" id="email_addremss" /></div>
              <div class="form_row"><label>Password</label><input class="inputfield" name="password" type="password" id="password" /></div>
              <input class="button" style=" cursor: pointer;" type="submit" name="Submit" value="Login" />
            </form>
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
        <br />
        <script type="text/javascript">
          AC_FL_RunContent('codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0', 'width', '531', 'height', '91', 'src', 'images/Banner Add 650x110', 'quality', 'high', 'pluginspage', 'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash', 'movie', 'images/Banner Add 650x110'); //end AC code
        </script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="531" height="91">
            <param name="movie" value="images/Banner Add 650x110.swf" />
            <param name="quality" value="high" />
            <embed src="images/Banner Add 650x110.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="531" height="91"></embed>
          </object></noscript>
        <h1 class="style1" style=" font-size:16px;">Welcome to Web Saucer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
      </div>
      <!-- end of middle column -->

      <!-- start of right column -->

      <div id="templatemo_right_column">
        <div class="leftcolumn_box01_top"></div>
      </div>

      <!-- end of right column -->

    </div>

    <!-- end of content -->


    <?php include("includes/footer.php"); ?>
</body>

</html>