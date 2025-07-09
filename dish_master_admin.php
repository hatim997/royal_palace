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

  <link rel="stylesheet" type="text/css" href="tigra_calendar/1-simple-calendar/tcal.css" />
  <script type="text/javascript" src="tigra_calendar/1-simple-calendar/tcal.js"></script>

  <script language="JavaScript">
    new tcal({
      'formname': 'dish',
      'controlname': 'charges_on_date'
    });
  </script>

  <script language="JavaScript">
    new tcal({
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

  <link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="bonbon_buttons/buttons.css">

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

        <h1 class="style1" style="font-size:16px;">New Dish &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style3"><?php echo $today; ?></span></h1><br>

        <?php
        if (isset($_POST['submit'])) {
          // $time = date('H:i:s');
          $date_time = date('Y-m-d H:i:s');
          $created_id = $_SESSION['username'];
          $rest_id = $_SESSION['restid'];
          $kitchen = $_POST['kitchen'];
          $food = $_POST['food'];
          $dish = $_POST['dish'];
          $serving = $_POST['serving'];
          $hour = $_POST['hour'];
          $min = $_POST['min'];
          $charges = $_POST['charges'];
          $charges_on_date = $_POST['charges_on_date'];
          $charges_off_date = $_POST['charges_off_date'];
          $cook_time = $hour . ":" . $min;

          // Get max DISH_ID
          $query = "SELECT max(DISH_ID) AS max_id FROM dish_master_tab";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $dish_id = $row['max_id'] + 1;

          // Get max DISH_CHARGES_ID
          $query = "SELECT max(DISH_CHARGES_ID) AS max_charge_id FROM dish_charges_history";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $dish_charges_id = $row['max_charge_id'] + 1;

          // Insert into dish_master_tab
          $query = "INSERT INTO dish_master_tab VALUES (
    '$rest_id', '$kitchen', '$food', '$dish_id', '$dish', '$serving', 
    '$cook_time', '$dish_charges_id', '$created_id', '$date_time', 
    '$created_id', '$date_time')";
          mysqli_query($conn, $query) or die('Insertion Failed: ' . mysqli_error($conn));

          // Insert into dish_charges_history
          $query = "INSERT INTO dish_charges_history VALUES (
    '$rest_id', '$dish_id', '$dish_charges_id', '$charges', '$charges_on_date', 
    '$charges_off_date', '$created_id', '$date_time', '$created_id', '$date_time')";
          mysqli_query($conn, $query) or die('Insertion Failed: ' . mysqli_error($conn));

          echo '<h4 class="style9">Dish Successfully Added</h4><br><br>';
        ?>



          <form name="dish" method="post" action="" id="dish" onsubmit="return validate();">
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>Kitchen</td>
                <td><select id="kitchen" name="kitchen">
                    <option value="">Select Kitchen</option>
                    <?php
                    // Make sure $conn is your active mysqli connection
                    $query = "SELECT * FROM kitchen_master_tab WHERE REST_ID ='$rest_id'";
                    $result = mysqli_query($conn, $query) or die("Query Failed: " . mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                      $k_id = $row["KITCHEN_ID"];
                      $kn = $row["KITCHEN_NAME"];
                    ?>
                      <option value="<?php echo $k_id; ?>"><?php echo $kn; ?></option>
                    <?php
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
                <td>Food Type</td>
                <td><select id="food" name="food">
                    <option value="">Select Food</option>
                    <?php
                    // Assume $conn is your active mysqli connection
                    $query = "SELECT * FROM food_type_tab WHERE REST_ID ='$rest_id'";
                    $result = mysqli_query($conn, $query) or die("Query Failed: " . mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                      $rest_id = $row["REST_ID"];
                      $food_type_detail = $row["FOOD_TYPE_DETAIL"];
                    ?>
                      <option value="<?php echo $rest_id; ?>"><?php echo $food_type_detail; ?></option>
                    <?php
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
                <td>Dish Name</td>
                <td><input type="text" name="dish" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Dish Serving</td>
                <td><input type="text" name="serving" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Cooking Time:</td>
                <td><select id="hour" name="hour">
                    <option value="">Hour</option>
                    <option value="00">00</option>
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
                  </select>
                  &nbsp;&nbsp;:&nbsp;&nbsp;
                  <select id="min" name="min">
                    <option value="">Minutes</option>
                    <option value="05:00">05</option>
                    <option value="10:00">10</option>
                    <option value="15:00">15</option>
                    <option value="20:00">20</option>
                    <option value="25:00">25</option>
                    <option value="30:00">30</option>
                    <option value="35:00">35</option>
                    <option value="40:00">40</option>
                    <option value="45:00">45</option>
                    <option value="50:00">50</option>
                    <option value="55:00">55</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Dish Charges</td>
                <td><input type="text" name="charges" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Charges on Date:</td>
                <td><input type="text" class="tcal" id="charges_on_date" name="charges_on_date" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Charges off Date:</td>
                <td><input type="text" class="tcal" id="charges_off_date" name="charges_off_date" /></td>
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
        } //if ends here
        else {
        ?>


          <form name="dish" method="post" action="" id="dish" onsubmit="return validate();">
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>Kitchen</td>
                <td><select id="kitchen" name="kitchen">
                    <option value="">Select Kitchen</option>
                    <?php
                    // Make sure $conn is your active mysqli connection
                    $query = "SELECT * FROM kitchen_master_tab WHERE REST_ID ='$rest_id'";
                    $result = mysqli_query($conn, $query) or die("Query Failed: " . mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                      $k_id = $row["KITCHEN_ID"];
                      $kn = $row["KITCHEN_NAME"];
                    ?>
                      <option value="<?php echo $k_id; ?>"><?php echo $kn; ?></option>
                    <?php
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
                <td>Food Type</td>
                <td><select id="food" name="food">
                    <option value="">Select Food</option>
                    <?php
                    // Use your mysqli connection here as $conn
                    $query = "SELECT * FROM food_type_tab WHERE REST_ID ='$rest_id'";
                    $result = mysqli_query($conn, $query) or die("Query Failed: " . mysqli_error($conn));

                    while ($row = mysqli_fetch_assoc($result)) {
                      $food_id = $row["FOOD_TYPE_ID"];
                      $food_type_detail = $row["FOOD_TYPE_DETAIL"];
                    ?>
                      <option value="<?php echo $food_id; ?>"><?php echo $food_type_detail; ?></option>
                    <?php
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
                <td>Dish Name</td>
                <td><input type="text" name="dish" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Dish Serving</td>
                <td><input type="text" name="serving" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Cooking Time:</td>
                <td><select id="hour" name="hour">
                    <option value="">Hour</option>
                    <option value="00">00</option>
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
                  </select>
                  &nbsp;&nbsp;:&nbsp;&nbsp;
                  <select id="min" name="min">
                    <option value="">Minutes</option>
                    <option value="05:00">05</option>
                    <option value="10:00">10</option>
                    <option value="15:00">15</option>
                    <option value="20:00">20</option>
                    <option value="25:00">25</option>
                    <option value="30:00">30</option>
                    <option value="35:00">35</option>
                    <option value="40:00">40</option>
                    <option value="45:00">45</option>
                    <option value="50:00">50</option>
                    <option value="55:00">55</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Dish Charges</td>
                <td><input type="text" name="charges" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Charges on Date:</td>
                <td><input type="text" class="tcal" id="charges_on_date" name="charges_on_date" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Charges off Date:</td>
                <td><input type="text" class="tcal" id="charges_off_date" name="charges_off_date" /></td>
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
        } //else ends here
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