<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
?>
<?php

$created_id = $_SESSION['username'];
$rest_id = $_SESSION['restid'];
$ingredient_id = $_POST['ingredient_id'];
$tran_id = $_POST['tran_id'];
$tran_qty = $_POST['tran_qty'];
//$tran_price = $_POST['tran_price'];
$tran_price = $_POST['tran_price'];
$transaction_date = $_POST['date'];
$tran_detail = $_POST['detail'];
$record = $_POST['record'];
if ($tran_id == "P") {
  $query = "UPDATE store_master_tab SET LAST_PURCHASED_QTY = '$tran_qty', LAST_PURCHASED_DATE = '$transaction_date', QTY_INHAND = QTY_INHAND + '$tran_qty', EDITED_ID = '$created_id', EDITED_ON = '$date_time' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$ingredient_id'";
  mysqli_query($conn, $query) or die('Insertion Failed: ' . mysqli_error($conn));
} else {
  $query = "UPDATE store_master_tab SET LAST_ISSUED_QTY = '$tran_qty', LAST_ISSUED_DATE = '$transaction_date', QTY_INHAND = QTY_INHAND - '$tran_qty', EDITED_ID = '$created_id', EDITED_ON = '$date_time' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$ingredient_id'";
  mysqli_query($conn, $query) or die('Insertion Failed: ' . mysqli_error($conn));
}

$query = "INSERT INTO store_transaction_tab VALUES('$rest_id','$ingredient_id','$tran_id','$tran_id','$tran_qty','$tran_price','$transaction_date','1','$tran_detail','$created_id','$date_time','$created_id','$date_time')";
mysqli_query($conn, $query) or die('Transaction Insertion Failed: ' . mysqli_error($conn));

echo '<h4 class="style9">Transaction Successful</h4><br><br>';

echo '<form name="ingredient" id="ingredient">
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140">Ingredient:</td>
    <td width="210"><select id="ingredient_id" name="ingredient_id" onchange="show_inhand(this.value)">
  		<option value="">Select Ingredient</option>';

$query = "SELECT * FROM ingredient_tab ORDER BY INGREDIENT_NAME ASC";
$result = mysqli_query($conn, $query) or die("Failed : " . mysqli_error($conn));
$num = mysqli_num_rows($result);
$i = 0;
while ($i < $num) {
  $ingredient_name = mysqli_fetch_assoc($result)['INGREDIENT_NAME'];
  $ingredient_id = mysqli_fetch_assoc($result)['INGREDIENT_ID'];
  echo '<option value="' . $ingredient_id . '">' . $ingredient_name . '</option>';
  $i++;
}
// while loop ends here

echo '</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>
  
  <div id="qty_inhand">
  
  </div>
  
  <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140">Transaction Type:</td>
    <td width="210"><select id="tran_id" name="tran_id">
    <option value="">Select Type</option>';
$query = "SELECT * FROM transaction_type WHERE TRAN_TYPE_ID = 'P' OR TRAN_TYPE_ID = 'I' ORDER BY TRAN_TYPE_NAME ASC";
$result = mysqli_query($conn, $query) or die("Failed : " . mysqli_error($conn));
$num = mysqli_num_rows($result);
$i = 0;
while ($i < $num) {
  // fetch row data using mysqli_fetch_assoc
  mysqli_data_seek($result, $i);  // move pointer to $i-th row
  $row = mysqli_fetch_assoc($result);
  $ingredient_name = $row['TRAN_TYPE_NAME'];
  $ingredient_id = $row['TRAN_TYPE_ID'];
  echo '<option value="' . $ingredient_id . '">' . $ingredient_name . '</option>';
  $i++;
}
// while loop ends here

echo '</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Quantity:</td>
    <td width="210"><input type="text" id="tran_qty" name="tran_qty" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Date:</td>
    <td width="210"><input type="text" class="tcal" id="transaction_date" name="transaction_date" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Detail</td>
    <td width="210">&nbsp;<textarea cols="20" id="tran_detail" name="tran_detail" rows="4"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td><input class="button" align="left" onclick="adjustment(this.form)" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>';
?>