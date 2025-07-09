<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$created_id = $_SESSION['username'];
$rest_id = $_SESSION['restid'];
//$kit_id = $_SESSION['kitid'];
$name = $_POST['name'];
$contact_person = $_POST['contact_person'];
$mob = $_POST['mob'];
$ptcl_no = $_POST['ptcl_no'];
$address = $_POST['address'];
$city = $_POST['city'];
$status = $_POST['status'];
$work_flag = $_POST['work_flag'];

$query = "SELECT max(SUPPLIER_ID) FROM supplier_master WHERE REST_ID = '$rest_id' ORDER BY SUPPLIER_ID ASC";
$result = mysqli_query($conn, $query);
$num1 = mysqli_num_rows($result);

$i = 0;
while ($i < $num1) {
  $row = mysqli_fetch_array($result);
  $supplier_id = $row["max(SUPPLIER_ID)"];
  $i++;
}
$supplier_id++;

$query = "INSERT INTO supplier_master 
  (REST_ID, SUPPLIER_ID, SUPPLIER_NAME, CONTACT_PERSON, MOBILE_NO, PTCL_NO, ADDRESS, CITY, STATUS, WORKNG_FLAG, CREATED_ID, CREATED_ON, EDITED_ID, EDITED_ON) 
  VALUES ('$rest_id','$supplier_id','$name','$contact_person','$mob','$ptcl_no','$address','$city','$status','$work_flag','$created_id','$date_time','$created_id','$date_time')";
mysqli_query($conn, $query) or die('Master Insertion Failed:' . mysqli_error($conn));

echo '<h4 class="style9">Supplier Successfully Added</h4><br><br>';
?>


<form name="supplier" method="post" action="" id="supplier">
  <table width="650" align="center" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Name:</td>
      <td><input type="text" id="name" /></td>
      <td>City:</td>
      <td><select name="city" id="city">
          <option value="">Select City</option>
          <?php
          $query = "SELECT * FROM city_tab ORDER BY CITY_NAME ASC";
          $result = mysqli_query($conn, $query);
          $num = mysqli_num_rows($result);
          $i = 0;
          while ($i < $num) {
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_assoc($result);
            $city1 = $row["CITY_NAME"];
          ?>
            <option value="<?php echo $city1; ?>"><?php echo $city1; ?></option>
          <?php
            $i++;
          } // while loop ends here
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Contact Person:</td>
      <td><input type="text" id="contact_person" /></td>
      <td>Status:</td>
      <td><select name="status" id="status">
          <option value="">Select Status</option>
          <option value="E">Enable</option>
          <option value="S">Suspended</option>
          <option value="D">Discarded</option>
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Mobile No:</td>
      <td><input type="text" id="mob" /></td>
      <td>Working Flag:</td>
      <td><select name="work_flag" id="work_flag">
          <option value="">Select Flag</option>
          <option value="E">Efficient</option>
          <option value="N">Normal</option>
          <option value="S">Slow</option>
        </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>PTCL No:</td>
      <td><input type="text" id="ptcl_no" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><textarea cols="20" name="address" id="address" rows="5"></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input class="button" align="left" onclick="add_supplier();" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
    </tr>
  </table>
</form>