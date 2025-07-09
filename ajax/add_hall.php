<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
//var_dump($_POST);
$date = $_POST['date'];
$time_from = $_POST['time_from'];
//echo $time_from;
$order_id = $_POST['order_id'];

?>

<table width="231">
  <tr>
    <th width="94">
      <div align="left">Hall on Second date</div>
    </th>
    <td width="125" style="border:ridge;">
      <div align="justify">


      </div>
      <p align="justify">
        <?php

        $query = "SELECT * FROM banq_master_tab WHERE banq_master_tab.BANQ_ID NOT IN(SELECT BANQ_ID FROM banq_order_master WHERE BOOKING_STATUS='B' AND FUNCTION_DATE='$date' AND TIME_FROM='$time_from' AND ORDER_NO!='$order_id')";

        $result = mysqli_query($conn, $query);

        $num = mysqli_num_rows($result);
        $i = 0;
        while ($i < $num) {

          mysqli_data_seek($result, $i);
          $row = mysqli_fetch_assoc($result);
          $o_id = $row['BANQ_ID'];
          $o_name = $row['BANQ_NAME'];

          $q4 = "SELECT distinct(BANQ_ID) FROM banq_order_master WHERE ORDER_NO='$order_id' AND BANQ_ID = '$o_id' AND FUNCTION_DATE='$date'";
          $r4 = mysqli_query($conn, $q4) or die("Query Failed");

          while ($ans3 = mysqli_fetch_array($r4)) {
            if ($o_id == $ans3['BANQ_ID']) {
        ?>

      <div align="justify">
        <input type="checkbox" name="add_hall1[]" value="<?php echo $o_id; ?>" id="add_hall1" checked="checked" />
        <?php echo $o_name; ?>
      </div>
    <?php
            }
          }
          $num4 = mysqli_num_rows($r4);

          if (!$num4) {
    ?>
    <div align="justify">
      <input type="checkbox" name="add_hall1[]" value="<?php echo $o_id; ?>" id="add_hall1" />
      <?php echo $o_name; ?>

  <?php
          }


          $i++;
        }  // while loop ends here

  ?>
    </div>
    </td>
  </tr>
</table>