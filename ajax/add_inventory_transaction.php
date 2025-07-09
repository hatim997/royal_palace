<?php session_start(); ?>
<?php 
include('../config.php');
include('../time_settings.php');
?>
<?php
	
	$created_id = $_SESSION['username'];
	$rest_id = $_SESSION['restid'];
	$ingredient_id = $_POST['ingredient_id'];
	$supplier = $_POST['supplier'];
	$tran_id = $_POST['tran_id'];
	$tran_qty = $_POST['tran_qty'];
	$tran_price = $_POST['tran_price'];
	$transaction_date = $_POST['date'];
	$expiry_date = $_POST['expiry_date'];
	$tran_detail = $_POST['detail'];
	
	if($tran_id == "I")
	{
		$query = "UPDATE store_master_tab SET LAST_ISSUED_QTY = '$tran_qty', LAST_ISSUED_DATE = '$transaction_date', QTY_INHAND = QTY_INHAND - '$tran_qty', EDITED_ID = '$created_id', EDITED_ON = '$date_time' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$ingredient_id'";
		mysql_query($query) or die('Insertion Failed:'.mysql_error());
		
		$query = "INSERT INTO store_transaction_tab VALUES('$rest_id','$ingredient_id','$supplier','$tran_id','R','$tran_qty','$tran_price','$transaction_date','$tran_detail','$expiry_date',
					'$created_id','$date_time','$created_id','$date_time')";
		mysql_query($query) or die('Transaction Insertion Failed:'.mysql_error());
	}
	else
	{
		$query = "UPDATE store_master_tab SET LAST_PURCHASED_PRICE = '$tran_price', LAST_PURCHASED_QTY = '$tran_qty', LAST_PURCHASED_DATE = '$transaction_date', QTY_INHAND = QTY_INHAND + '$tran_qty', EDITED_ID = '$created_id', EDITED_ON = '$date_time' WHERE REST_ID = '$rest_id' AND INGREDIENT_ID = '$ingredient_id'";
		mysql_query($query) or die('Insertion Failed:'.mysql_error());
		
		$query = "INSERT INTO store_transaction_tab VALUES('$rest_id','$ingredient_id','$supplier','$tran_id','R','$tran_qty','$tran_price','$transaction_date','$tran_detail','$expiry_date',
					'$created_id','$date_time','$created_id','$date_time')";
		mysql_query($query) or die('Transaction Insertion Failed:'.mysql_error());
	}
	
	echo '<h4 class="style9">Transaction Successful</h4><br><br>';
	
	echo '<form name="ingredient" id="ingredient">
            <table width="350" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140">Item:</td>
    <td width="210"><select id="ingredient_id" name="ingredient_id" onchange="show_inhand(this.value)">
  		<option value="">Select Item</option>';
		$query = "SELECT * FROM store_master_tab ORDER BY INGREDIENT_NAME ASC";
		$result = mysql_query($query)or die("Failed :".mysql_error());
		$num = mysql_numrows($result);
		$i=0;
		while($i < $num)
		{
			$ingredient_name = mysql_result($result,$i, "INGREDIENT_NAME");
			$ingredient_id = mysql_result($result,$i, "INGREDIENT_ID");
			echo '<option value="'.$ingredient_id.'">'.$ingredient_name.'</option>';
            $i++;
        }  // while loop ends here
        
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
    <td width="210"><select id="tran_id" name="tran_id" onchange="transaction_type(this.value)">
    <option value="">Select Type</option>';
    $query = "SELECT * FROM transaction_type WHERE TRAN_TYPE_ID != 'A' AND TRAN_TYPE_ID != 'B' ORDER BY TRAN_TYPE_NAME ASC";
	$result = mysql_query($query)or die("Failed :".mysql_error());
	$num = mysql_numrows($result);
	$i=0;
	while($i < $num)
	{
		$ingredient_name = mysql_result($result,$i, "TRAN_TYPE_NAME");
		$ingredient_id = mysql_result($result,$i, "TRAN_TYPE_ID");
		echo '<option value="'.$ingredient_id.'">'.$ingredient_name.'</option>';
		$i++;
	}  // while loop ends here
	
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
    <td width="140">Price:</td>
    <td width="210"><input type="text" id="tran_price" name="tran_price" /><span id="freeze"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Transaction Date:</td>
    <td width="210"><input type="text" class="tcal" id="transaction_date" name="transaction_date" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="140">Expiry Date:</td>
    <td width="210"><input type="text" class="tcal" id="expiry_date" name="expiry_date" /></td>
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
  <td><input class="button" align="left" onclick="add_inventory(this.form)" name="submit" style="cursor:pointer" type="button" value="Submit" /><input type="reset" class="button" style="cursor:pointer" name="reset" value="Reset"></td>
  </tr>
</table>
</form>';
?>