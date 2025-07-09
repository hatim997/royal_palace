<?php
include('time_settings.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Web Saucer</title>
  <meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
  <meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
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
        <h2>Already Logged In</h2>
        <div id="leftcolumn_box01">
          <div class="leftcolumn_box01_top">
            <h2>Login</h2>
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

        <h1 class="style1" style=" font-size:16px;">Welcome to Web Saucer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>

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