<?php
include('../config.php');
$itemid=$_POST['itemid']; 
$sql1 = "SELECT * FROM store_master_tab WHERE INGREDIENT_ID ='$itemid'";
$result1 = mysql_query($sql1)or die("error".mysql_error());
while($row=mysql_fetch_array($result1))
{
?>
<table width="343" border="0">
        <tr>
          <th width="94"><div align="justify">Item Code</div></th>
          <td width="125"><div align="justify">
            <input type="text"  name="item_code" id="item_code" value="<?php echo $row['INGREDIENT_ID']; ?>"/>
          </div></td>
        </tr>
        <tr>
          <th><div align="justify">Item Name</div></th>
          <td><div align="justify">
            <input name="item_name" type="text"  id="item_name" value="<?php echo $row['INGREDIENT_NAME']; ?>"/>
          </div></td>
        </tr>
        <tr>
          <th><div align="justify">Quantity</div></th>
          <td><div align="justify">
            <input name="item_qty" type="text" id="item_qty" value="0" />
          </div></td>
        </tr>
      </table>
<?php
} ?>