<?php session_start();
include('config.php');
include('time_settings.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Gym</title>
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
                              <th width="158"> Enter Value: </th>
                              <td width="179"> <input type="text" id="pid" /> </td>
                              <td width="223"> <select id="type" style="color:#000; font-size:14px; font-weight:500;">
                                          <option value="">Select Search Type</option>
                                          <option value="id">Token ID</option>
                                          <option value="m_id">Membership ID</option>

                                    </select>


                              </td>
                              <td width="139"><input type="button" value="Search" onclick="search_token_gym();" style="background: #FFFFD2; color:#000; height:35px; width:85px; font-size:16px; font-weight:600; border:groove; border-color:#CCC;" /></td>

                        </tr>
                  </table>
            </form>

      </div>


      <div id="mydiv">

      </div>

</body>

</html>