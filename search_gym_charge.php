<?php session_start();
include('config.php');
include('time_settings.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Web Saucer</title>
    <meta name="description" http-equiv="description" content="Olive Garden is a Web Based Application. " Whats Cookin" is all you need to improve your business and make it more watering, delicious, and flavorsome experience for both your staff and your customers. Get it now!" />
    <meta name="keywords" http-equiv="keywords" content="Modern Restaurant, Customer's Database is maintained, Guest's Order at tablet, Ingredients of dishes, Stock Report for Store, Daily Expenses are booked, Revenue Reports." />
    <link href="templatemo_style16.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="jquery-1.2.1.pack.js"></script>



    <script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
    <style>
        .red {
            color: #FFFFD2;
            font-size: x-large;
            font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
            font-weight: bold;
        }
    </style>
</head>

<body>



    <p><span class="red">Search</span></p>

    <div id="div">
        <form>

            <table width="719">
                <tr>
                    <th width="80">Type:</th>
                    <td width="227"> <select id="type" style="color:#000; font-size:14px; font-weight:500;" onchange="search_cplan_value_gym();">
                            <option value="">Select Search Type</option>
                            <option value="id">Charges ID</option>
                            <option value="name">Charges Type Title</option>

                        </select>


                    </td>
                    <th width="80">Value: </th>
                    <td width="173">
                        <div id="div1"></div>
                    </td>
                    <td width="135"><input type="button" value="Search" onclick="search_gym_charge_plan();" style="background: #FFFFD2; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" /></td>

                </tr>
            </table>
        </form>

    </div>


    <div id="mydiv">

    </div>

</body>

</html>