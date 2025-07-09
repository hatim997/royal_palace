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
  <link rel="shortcut icon" href="images/gp.jpg" type="image/x-icon" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Gavel Power</title>
  <meta name="keywords" content="History of Client's cases, Access can be given to their client for viewing their cases by the Gavel Power, General Public can also search Lawyers by City and expertise who are member of Gavel Power, Live Chat among members, Open discussion on any point of view at Forum of Gavel Power, Latest Media News about Judiciary, Upload Articles and Interviews of member Lawyer." />
  <meta name="description" content="Gavel Power is the invention for all the lawyers. It keeps track of cases and maintains history of their client's cases with complete privacy set." />

  <link href="templatemo_style3.css" rel="stylesheet" type="text/css" />

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
  <SCRIPT LANGUAGE="JavaScript">
    function validate() {
      if (document.contact.client_email.value.length < 1) {
        alert("Please enter Your Email  Field .");
        return false;
      }

      return true;
    }
  </SCRIPT>
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
            <h2>Login</h2>
          </div>
          <div align="center" class="leftcolumn_box01_bottom">
            <form method="post" action="login.php">

              <div class="form_row" style="height: 24px;"><label>User ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="inputfield" size="12" name="username" type="text" id="email_addremss" /></div>
              <div class="form_row" style="height: 24px;"><label>Password</label>&nbsp;<input class="inputfield" size="12" name="password" type="password" id="password" /></div>
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
            <br /><?php include("includes/right.php"); ?><br><br>
          </div>
        </div>

        <div id="imagebutton"></div>

      </div>

      <!-- end of left column -->

      <!-- start of middle column -->

      <div id="templatemo_middle_column"><br>

        <h1 class="style1" style=" font-size:16px;">Welcome to Gavel Power&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
        <div id="form" class="midllie">
          <form action="contact_us1.php" method="post" name="contact" id="contact" onsubmit="return validatexx(this)" style="background-color:#F2F2F2;">

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
              <tr>
                <td valign="top">Your email</td>
                <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="client_email" value="" type="text" size="40" /><br><br></td>
              </tr>
              <tr>
                <td valign="top">Subject</td>
                <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="name" value="" type="text" size="40" /><br><br></td>
              </tr>
              <td valign="top">Message</td>
              <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="7" cols="30" name="comments"></textarea><br><br>
              </td>
              </tr>
              <tr>
                <td valign="top"><label></label></td>
                <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="securimage/securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" alt=""><br><br>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter the same image text in the provided box </td>
              </tr>
              <tr>
                <td valign="top">&nbsp;</td>
                <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="code" size="25" /><br><br></td>
              </tr>
              <tr>
                <td valign="top">&nbsp;</td>
                <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="button" style="cursor:pointer" type="submit" value="Submit" />&nbsp;&nbsp;&nbsp;<input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"> </td>
              </tr>
            </table>
          </form>
        </div>

        </td><br>

        <script language="javascript">
          function validatexx(theform) {
            if (theform.client_email.value.length == 0) {
              alert("Your Email is required.");
              theform.name.focus();
              return false
            }

            if (theform.name.value.length == 0) {
              alert("Subject is required.");
              theform.name.focus();
              return false
            }


            if (theform.comments.value.length == 0) {
              alert("Comments are required.");
              theform.comments.focus();
              return false
            }
            if (theform.code.value.length == 0) {
              alert("Security Code is required.");
              theform.code.select()
              return false
            }
            return true;
          }
        </script>
      </div>
      <!-- end of middle column -->

      <!-- start of right column -->
      <!-- end of right column -->
    </div>
    <!-- end of content -->


    <?php include("includes/footer.php"); ?>
  </div>
  <script type="text/javascript">
    swfobject.registerObject("FlashID2");
  </script>
</body>

</html>