<?php
session_start();
include('config.php');
include('time_settings.php');
include('update_activity.php');

$userid = $_SESSION['username'] ?? '';
$password = $_SESSION['password'] ?? '';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>Royal Palace</title>

    <link href="templatemo_style1.css" rel="stylesheet" type="text/css" />
    <link href="bonbon_buttons/buttons.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <script type="text/javascript">
        let clicked = false;

        function CheckBrowser() {
            if (!clicked) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "logout.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send();
            }
        }
    </script>
</head>

<body onclick="clicked = true;" onbeforeunload="CheckBrowser()">
    <div id="main">
        <ul id="MenuBar1" class="MenuBarHorizontal">
            <li><a class="MenuBarItemSubmenu" href="#">&nbsp;&nbsp;Dish Management&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <ul>
                    <li><a href="add_dish_master.php">Add Dish</a></li>
                    <li><a href="dish_item_delete.php">Delete Dish</a></li>
                </ul>
            </li>

            <li><a class="MenuBarItemSubmenu" style="width:120px;" href="#">Banquet</a>
                <ul>
                    <li><a href="banq_order_master.php">Bookings</a></li>
                    <li><a href="paschange.php">Password Change</a></li>
                </ul>
            </li>

            <li><a class="MenuBarItemSubmenu" style="width:150px;" href="#">Reports</a>
                <ul>
                    <li><a href="rpt_banq_collection_by_function.php">Banquet Collection By Function</a></li>
                    <li><a href="rpt_banq_collection_by_booking.php">Banquet Collection By Booking</a></li>
                </ul>
            </li>

            <li><a href="logout.php">Logout</a></li>
        </ul>

        <script type="text/javascript">
            new Spry.Widget.MenuBar("MenuBar1", {
                imgDown: "SpryAssets/SpryMenuBarDownHover.gif",
                imgRight: "SpryAssets/SpryMenuBarRightHover.gif"
            });
        </script>
    </div>

    <div id="process"></div>
</body>

</html>