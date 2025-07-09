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
  <link rel="shortcut icon" href="images/gp.jpg" type="image/jpg" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Web Saucer</title>
  <meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
  <meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
  <link href="templatemo_style1.css" rel="stylesheet" type="text/css" />

  <link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

  <link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
  <script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

  <script language="JavaScript">
    new tcal({
      'formname': 'ingredient',
      'controlname': 'transaction_date'
    });
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


  <script type="text/javascript">
    function show_sub_head(value) {
      //var lab_name = encodeURIComponent(document.getElementById("lab_name").value);

      if (value == "") {
        document.getElementById("show_sub_head").innerHTML = "";
        //alert("Please select correct status.");
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
          document.getElementById("show_sub_head").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("POST", "ajax/show_sub_head.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("value=" + value);
    }
  </script>

  <script type="text/javascript">
    function add_inventory(form) {
      var head = encodeURIComponent(document.getElementById("head").value);
      var sub_head = encodeURIComponent(document.getElementById("sub_head").value);
      var name = encodeURIComponent(document.getElementById("name").value);
      var b_forward = encodeURIComponent(document.getElementById("brought_forward").value);
      var reorder = encodeURIComponent(document.getElementById("reorder").value);
      var max_level = encodeURIComponent(document.getElementById("max_level").value);
      var lead_time = encodeURIComponent(document.getElementById("lead_time").value);
      var inventory_rule = encodeURIComponent(document.getElementById("inventory_rule").value);
      var unit_id = encodeURIComponent(document.getElementById("unit_id").value);
      if (parseInt(max_level) <= 0) {
        alert("Maximum level cannot be zero");
        return;
      }
      if (head == "" || sub_head == "" || name == "" || b_forward == "" || reorder == "" || lead_time == "" || inventory_rule == "" || unit_id == "") {
        alert("Please Enter Information in required fields");
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
          document.getElementById("inventory").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("POST", "ajax/add_inventory.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("head=" + head + "&sub_head=" + sub_head + "&name=" + name + "&b_forward=" + b_forward + "&reorder=" + reorder + "&lead_time=" + lead_time + "&inventory_rule=" + inventory_rule + "&unit_id=" + unit_id + "&max_level=" + max_level);
    }
  </script>
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

        <h1 class="style1" style="font-size:16px;">Add New Item&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1>
        <br>

        <div id="inventory">
          <form name="ingredient" id="ingredient">
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="140">Select Head:</td>
                <td width="210"><select id="head" name="head" onchange="show_sub_head(this.value)">
                    <option value="">Select Head</option>
                    <?php
                    $query = "SELECT * FROM item_head WHERE REST_ID = '$rest_id' ORDER BY HEAD_NAME ASC";
                    $result = mysqli_query($conn, $query) or die("Failed: " . mysqli_error($conn));
                    $num = mysqli_num_rows($result);
                    $i = 0;
                    while ($i < $num) {
                      $row = mysqli_fetch_assoc($result);
                      $unit_detail = $row['HEAD_NAME'];
                      $unit_id = $row['HEAD_ID'];
                    ?>
                      <option value="<?php echo $unit_id; ?>"><?php echo $unit_detail; ?></option>
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
            </table>

            <div id="show_sub_head">

            </div>

            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="140">Item Name:</td>
                <td width="210"><input type="text" id="name" name="name" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="140">Brought Forward:</td>
                <td width="210"><input type="text" id="brought_forward" name="brought_forward" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="140">Re-Order Level:</td>
                <td width="210"><input type="text" id="reorder" name="reorder" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="140">Max Level:</td>
                <td width="210"><input type="text" id="max" name="max" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="140">Lead Time:</td>
                <td width="210"><input type="text" id="lead_time" name="lead_time" />&nbsp;&nbsp;(days)</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="140">Inventory Rule:</td>
                <td width="210"><select id="inventory_rule" name="inventory_rule">
                    <option value="">Select Rule</option>
                    <option value="FIFO">FIFO</option>
                    <option value="LIFO">LIFO</option>
                    <option value="Average">Average</option>
                    <option value="No Method">No Rule Apply</option>
                  </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Unit:</td>
                <td>
                  <select id="unit_id" name="unit_id">
                    <option value="">Select Unit</option>
                    <?php
                    $query = "SELECT * FROM unit_tab ORDER BY UNIT_DETAIL ASC";
                    $result = mysqli_query($conn, $query) or die("Failed: " . mysqli_error($conn));
                    $num = mysqli_num_rows($result);
                    $i = 0;
                    while ($i < $num) {
                      $row = mysqli_fetch_assoc($result);
                      $unit_detail = $row['UNIT_DETAIL'];
                      $unit_id = $row['UNIT_ID'];
                    ?>
                      <option value="<?php echo $unit_id; ?>"><?php echo $unit_detail; ?></option>
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
                <td>&nbsp;</td>
                <td><input class="button" align="left" onclick="add_inventory(this.form)" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
              </tr>
            </table>
          </form>
        </div>
        <br>
      </div>
      <!-- end of middle column -->

      <!-- start of right column -->

      <div id="templatemo_right_column" style="padding-top: 1px;">
      </div>

      <!-- end of right column -->


      <!-- end of content -->


      <?php include("includes/footer.php"); ?>
</body>

</html>