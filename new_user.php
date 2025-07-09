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

  <link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

  <SCRIPT LANGUAGE="JavaScript">
    function validate() {
      if (document.newuser.user_name.value.length < 1) {
        alert("Please enter Name  Field .");
        return false;
      }
      if (document.newuser.user_id.value.length < 1) {
        alert("Please enter User ID  Field .");
        return false;
      }
      if (document.newuser.password.value.length < 1) {
        alert("Please enter Password  Field .");
        return false;
      }
      if (document.newuser.group.value.length < 1) {
        alert("Please enter Group Name  Field .");
        return false;
      }
      if (document.newuser.group_type.value.length < 1) {
        alert("Please enter User Rights  Field .");
        return false;
      }
      if (document.newuser.shour.value.length < 1) {
        alert("Please enter Start Time  Field .");
        return false;
      }
      if (document.newuser.smin.value.length < 1) {
        alert("Please enter Start Time  Field .");
        return false;
      }
      if (document.newuser.ehour.value.length < 1) {
        alert("Please enter End Time  Field .");
        return false;
      }
      if (document.newuser.emin.value.length < 1) {
        alert("Please enter End Time  Field .");
        return false;
      }

      return true;
    }
  </SCRIPT>
  <script type="text/javascript">
    var clicked = false;

    function CheckBrowser() {
      //var lab_name = encodeURIComponent(document.getElementById("lab_name").value);
      if (clicked == false) {
        //alert("Browser closed");
        var xmlhttp;

        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("none").innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open("POST", "logout.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();
      } // if ends here
    }
  </script>
</head>

<body onclick="clicked=true;" onbeforeunload="CheckBrowser()">
  <div id="templatemo_container">

    <?php include("includes/header2.php"); ?>



    <!-- start of content -->

    <div id="templatemo_content">

      <!-- start of left column -->

      <div id="templatemo_left_column">
        <h2 style="font-size:18px;">
          <BLINK>&nbsp;&nbsp;<?php echo $_SESSION['username']; ?></BLINK>
        </h2>
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
            </object><br><?php include("includes/right.php"); ?>
          </div><br><br><br><br>
        </div>

        <div id="imagebutton"></div>

      </div>

      <!-- end of left column -->

      <!-- start of middle column -->

      <div id="templatemo_middle_column">

        <h1 class="style1" style="font-size:16px;">Welcome to Gavel Power</h1>
        <p><?php echo $today; ?></p><br><?php

                                        if (!isset($_POST['submit'])) {

                                        ?>
          <form action="<?php echo $PHP_SELF; ?>" name="newuser" id="newuser" onsubmit="return validate();" method="post">
            <table width="50%" align="center" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="29%">Name:</td>
                <td width="71%"><input type="text" name="user_name" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">User ID:</td>
                <td><input type="text" name="user_id" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">Password:</td>
                <td><input type="text" name="password" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">Group Name:</td>
                <td><select id="group" name="group">
                    <option>Select Group</option>
                    <?php
                                          $query = "SELECT * FROM group_tab ORDER BY GROUP_NAME ASC";
                                          $result = mysqli_query($conn, $query);
                                          $num = mysqli_num_rows($result);
                                          $i = 0;
                                          while ($i < $num) {
                                            mysqli_data_seek($result, $i);
                                            $row = mysqli_fetch_assoc($result);
                                            $group_id = $row['GROUP_ID'];
                                            $group_name = $row['GROUP_NAME'];
                    ?>
                      <option value="<?php echo $group_id; ?>"><?php echo $group_name; ?></option>
                    <?php
                                            $i++;
                                          }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">User Rights:</td>
                <td><select id="group_type" name="group_type">
                    <option>Select Group Type</option>
                    <?php
                                          $query = "SELECT * FROM group_type_tab ORDER BY GROUP_TYPE ASC";
                                          $result = mysqli_query($conn, $query) or die("Failed: " . mysqli_error($conn));
                                          $num = mysqli_num_rows($result);
                                          $i = 0;
                                          while ($i < $num) {
                                            mysqli_data_seek($result, $i);
                                            $row = mysqli_fetch_assoc($result);
                                            $group_type_id = $row['GROUP_TYPE_ID'];
                                            $group_type = $row['GROUP_TYPE'];
                    ?>
                      <option value="<?php echo $group_type_id; ?>"><?php echo $group_type; ?></option>
                    <?php
                                            $i++;
                                          }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">Start Time:</td>
                <td><select id="shour" name="shour">
                    <option value="">Select Hour </option>
                    <option value="00">Any Time</option>
                    <br />
                    <option value="01">01</option>
                    <br />
                    <option value="02">02</option>
                    <br />
                    <option value="03">03</option>
                    <br />

                    <option value="04">04</option>
                    <br />
                    <option value="05">05</option>
                    <br />
                    <option value="06">06</option>
                    <br />
                    <option value="07">07</option>
                    <br />
                    <option value="08">08</option>
                    <br />
                    <option value="09">09</option>
                    <br />
                    <option value="10">10</option>
                    <br />
                    <option value="11">11</option>
                    <br />
                    <option value="12">12</option>
                    <br />
                    <option value="13">13</option>
                    <br />
                    <option value="14">14</option>
                    <br />
                    <option value="15">15</option>
                    <br />
                    <option value="16">16</option>
                    <br />
                    <option value="17">17</option>
                    <br />
                    <option value="18">18</option>
                    <br />
                    <option value="19">19</option>
                    <br />
                    <option value="20">20</option>
                    <br />
                    <option value="21">21</option>
                    <br />
                    <option value="22">22</option>
                    <br />
                    <option value="23">23</option>

                  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="smin" name="smin">
                    <option value="">Minutes</option>
                    <option value="00:00">Any Time</option>
                    <br />
                    <option value="00:00">00</option>
                    <br />
                    <option value="05:00">05</option>
                    <br />
                    <option value="10:00">10</option>
                    <br />
                    <option value="15:00">15</option>
                    <br />
                    <option value="20:00">20</option>
                    <br />
                    <option value="25:00">25</option>
                    <br />
                    <option value="30:00">30</option>
                    <br />
                    <option value="35:00">35</option>
                    <br />
                    <option value="40:00">40</option>
                    <br />
                    <option value="45:00">45</option>
                    <br />
                    <option value="50:00">50</option>
                    <br />
                    <option value="55:00">55</option>
                  </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">End Time:</td>
                <td><select id="ehour" name="ehour">
                    <option value="">Hour</option>
                    <option value="23">Any Time</option>
                    <br />
                    <option value="01">01</option>
                    <br />
                    <option value="02">02</option>
                    <br />
                    <option value="03">03</option>
                    <br />
                    <option value="04">04</option>
                    <br />
                    <option value="05">05</option>
                    <br />
                    <option value="06">06</option>
                    <br />
                    <option value="07">07</option>
                    <br />
                    <option value="08">08</option>
                    <br />
                    <option value="09">09</option>
                    <br />
                    <option value="10">10</option>
                    <br />
                    <option value="11">11</option>
                    <br />
                    <option value="12">12</option>
                    <br />
                    <option value="13">13</option>
                    <br />
                    <option value="14">14</option>
                    <br />
                    <option value="15">15</option>
                    <br />
                    <option value="16">16</option>
                    <br />
                    <option value="17">17</option>
                    <br />
                    <option value="18">18</option>
                    <br />
                    <option value="19">19</option>
                    <br />
                    <option value="20">20</option>
                    <br />
                    <option value="21">21</option>
                    <br />
                    <option value="22">22</option>
                    <br />
                    <option value="23">23</option>

                  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="emin" name="emin">
                    <option value="">Minutes</option>
                    <option value="59:59">Any Time</option>
                    <br />
                    <option value="00:00">00</option>
                    <br />
                    <option value="05:00">05</option>
                    <br />
                    <option value="10:00">10</option>
                    <br />
                    <option value="15:00">15</option>
                    <br />
                    <option value="20:00">20</option>
                    <br />
                    <option value="25:00">25</option>
                    <br />
                    <option value="30:00">30</option>
                    <br />
                    <option value="35:00">35</option>
                    <br />
                    <option value="40:00">40</option>
                    <br />
                    <option value="45:00">45</option>
                    <br />
                    <option value="50:00">50</option>
                    <br />
                    <option value="55:00">55</option>
                  </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left"><input class="button" align="left" onclick="return validate();" name="submit" style="cursor:pointer" type="submit" value="Submit" />&nbsp;&nbsp;&nbsp;<input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
              </tr>
            </table>
          </form>
        <?php

                                        }  // if ends here
                                        else {

                                          $created_id = $_SESSION['username'];
                                          //$date_time = date('Y-m-d H:i:s');
                                          $name = $_POST['username'];
                                          $userid = $_POST['userid'];
                                          $passwd = $_POST['password'];
                                          $group_id = $_POST['group'];
                                          $group_type_id = $_POST['group_type'];
                                          $shour = $_POST['shour'];
                                          $sminutes = $_POST['smin'];
                                          $ehour = $_POST['ehour'];
                                          $eminutes = $_POST['emin'];
                                          $start_time = $shour . ":" . $sminutes;
                                          $end_time = $ehour . ":" . $eminutes;

                                          $query = "SELECT * FROM login_tab WHERE USER_ID = '$userid'";
                                          $result = mysqli_query($conn, $query);

                                          if (mysqli_num_rows($result) != 0) {
                                            echo '<script language="javascript">alert("' . $userid . ' already Exists. Please try again.")</script>';
                                          } else {
                                            $quer = "INSERT INTO login_tab 
             VALUES('$rest_id', '0', '$userid', '$passwd', '$group_id', '$group_type_id', 'logout', 'E', '00:00:00', 
             '$created_id', '$date_time', '$created_id', '$date_time')";
                                            mysqli_query($conn, $quer) or die('Login Query failed! ' . mysqli_error($conn));

                                            $quer = "INSERT INTO user_tab (USER_ID, USER_NAME, WORK_TIME_S, WORK_TIME_E, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON)
             VALUES ('$userid', '$name', '$start_time', '$end_time', '$created_id', '$date_time', '$created_id', '$date_time')";
                                            mysqli_query($conn, $quer) or die('User Query failed! ' . mysqli_error($conn));

                                            echo '<script language="javascript">alert("' . $userid . ' Successfully Created.")</script>';
                                          }


        ?>

          <form action="<?php echo $PHP_SELF; ?>" name="newuser" id="newuser" onsubmit="return validate();" method="post">
            <table width="50%" border="0" align="center" cellspacing="0" cellpadding="0">
              <tr>
                <td width="29%">Name:</td>
                <td width="71%"><input type="text" name="user_name" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">User ID:</td>
                <td><input type="text" name="user_id" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">Password:</td>
                <td><input type="text" name="password" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">Group Name:</td>
                <td><select id="group" name="group">
                    <option>Select Group</option>
                    <?php
                                          $query = "SELECT * FROM group_tab ORDER BY GROUP_NAME ASC";
                                          $result = mysqli_query($conn, $query);
                                          $num = mysqli_num_rows($result);
                                          $i = 0;
                                          while ($i < $num) {
                                            mysqli_data_seek($result, $i);
                                            $row = mysqli_fetch_assoc($result);
                                            $group_id = $row['GROUP_ID'];
                                            $group_name = $row['GROUP_NAME'];
                    ?>
                      <option value="<?php echo $group_id; ?>"><?php echo $group_name; ?></option>
                    <?php
                                            $i++;
                                          }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">User Rights:</td>
                <td><select id="group_type" name="group_type">
                    <option>Select Group Type</option>
                    <?php
                                          $query = "SELECT * FROM group_type_tab ORDER BY GROUP_TYPE ASC";
                                          $result = mysqli_query($conn, $query) or die("Failed: " . mysqli_error($conn));
                                          $num = mysqli_num_rows($result);
                                          $i = 0;
                                          while ($i < $num) {
                                            mysqli_data_seek($result, $i);
                                            $row = mysqli_fetch_assoc($result);
                                            $group_type_id = $row['GROUP_TYPE_ID'];
                                            $group_type = $row['GROUP_TYPE'];
                    ?>
                      <option value="<?php echo $group_type_id; ?>"><?php echo $group_type; ?></option>
                    <?php
                                            $i++;
                                          }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">Start Time:</td>
                <td><select id="shour" name="shour">
                    <option value="">Select Hour </option>
                    <option value="00">Any Time</option>
                    <br />
                    <option value="01">01</option>
                    <br />
                    <option value="02">02</option>
                    <br />
                    <option value="03">03</option>
                    <br />

                    <option value="04">04</option>
                    <br />
                    <option value="05">05</option>
                    <br />
                    <option value="06">06</option>
                    <br />
                    <option value="07">07</option>
                    <br />
                    <option value="08">08</option>
                    <br />
                    <option value="09">09</option>
                    <br />
                    <option value="10">10</option>
                    <br />
                    <option value="11">11</option>
                    <br />
                    <option value="12">12</option>
                    <br />
                    <option value="13">13</option>
                    <br />
                    <option value="14">14</option>
                    <br />
                    <option value="15">15</option>
                    <br />
                    <option value="16">16</option>
                    <br />
                    <option value="17">17</option>
                    <br />
                    <option value="18">18</option>
                    <br />
                    <option value="19">19</option>
                    <br />
                    <option value="20">20</option>
                    <br />
                    <option value="21">21</option>
                    <br />
                    <option value="22">22</option>
                    <br />
                    <option value="23">23</option>

                  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="smin" name="smin">
                    <option value="">Minutes</option>
                    <option value="00:00">Any Time</option>
                    <br />
                    <option value="00:00">00</option>
                    <br />
                    <option value="05:00">05</option>
                    <br />
                    <option value="10:00">10</option>
                    <br />
                    <option value="15:00">15</option>
                    <br />
                    <option value="20:00">20</option>
                    <br />
                    <option value="25:00">25</option>
                    <br />
                    <option value="30:00">30</option>
                    <br />
                    <option value="35:00">35</option>
                    <br />
                    <option value="40:00">40</option>
                    <br />
                    <option value="45:00">45</option>
                    <br />
                    <option value="50:00">50</option>
                    <br />
                    <option value="55:00">55</option>
                  </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left">End Time:</td>
                <td><select id="ehour" name="ehour">
                    <option value="">Hour</option>
                    <option value="23">Any Time</option>
                    <br />
                    <option value="01">01</option>
                    <br />
                    <option value="02">02</option>
                    <br />
                    <option value="03">03</option>
                    <br />
                    <option value="04">04</option>
                    <br />
                    <option value="05">05</option>
                    <br />
                    <option value="06">06</option>
                    <br />
                    <option value="07">07</option>
                    <br />
                    <option value="08">08</option>
                    <br />
                    <option value="09">09</option>
                    <br />
                    <option value="10">10</option>
                    <br />
                    <option value="11">11</option>
                    <br />
                    <option value="12">12</option>
                    <br />
                    <option value="13">13</option>
                    <br />
                    <option value="14">14</option>
                    <br />
                    <option value="15">15</option>
                    <br />
                    <option value="16">16</option>
                    <br />
                    <option value="17">17</option>
                    <br />
                    <option value="18">18</option>
                    <br />
                    <option value="19">19</option>
                    <br />
                    <option value="20">20</option>
                    <br />
                    <option value="21">21</option>
                    <br />
                    <option value="22">22</option>
                    <br />
                    <option value="23">23</option>

                  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="emin" name="emin">
                    <option value="">Minutes</option>
                    <option value="59:59">Any Time</option>
                    <br />
                    <option value="00:00">00</option>
                    <br />
                    <option value="05:00">05</option>
                    <br />
                    <option value="10:00">10</option>
                    <br />
                    <option value="15:00">15</option>
                    <br />
                    <option value="20:00">20</option>
                    <br />
                    <option value="25:00">25</option>
                    <br />
                    <option value="30:00">30</option>
                    <br />
                    <option value="35:00">35</option>
                    <br />
                    <option value="40:00">40</option>
                    <br />
                    <option value="45:00">45</option>
                    <br />
                    <option value="50:00">50</option>
                    <br />
                    <option value="55:00">55</option>
                  </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="left"><input class="button" align="left" onclick="return validate();" name="submit" style="cursor:pointer" type="submit" value="Submit" />&nbsp;&nbsp;&nbsp;<input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
              </tr>
            </table>
          </form>
        <?php

                                        } // else if ends here

        ?>


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