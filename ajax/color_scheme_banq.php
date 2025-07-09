<?php session_start(); ?>
<?php
include('../config.php');
include('../time_settings.php');
$userid = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php
$id = $_POST['value'];
$f_date = $_POST['f_date'];
?>
<table>
<?php
  $qq = "SELECT SCHEME_QTY FROM banq_color_scheme WHERE SCHEME_ID = '$id' ";
  $rr = mysqli_query($conn, $qq) or die("Query failed!" . mysqli_error($conn));
  while ($cc = mysqli_fetch_array($rr)) {
    $total = $cc['SCHEME_QTY'];
?>
  <tr>
    <th align="justify">Total qty:</th>
    <td><input type="text" name="t_qty" id="t_qty" value="<?php echo $cc['SCHEME_QTY']; ?>" readonly="readonly" /></td>
  </tr>
<?php
  }

  $qq1 = "SELECT SUM(SCHEME_QTY) AS total_reserved FROM banq_color_scheme_history WHERE SCHEME_ID = '$id' AND FUNCTION_DATE='$f_date' ";
  $rr1 = mysqli_query($conn, $qq1) or die("Query failed!" . mysqli_error($conn));
  while ($cc1 = mysqli_fetch_array($rr1)) {
    $reserved = $cc1['total_reserved'];
    $available = $total - $reserved;
?>
  <tr>
    <th align="justify">Available qty:</th>
    <td><input type="text" name="av_qty" id="av_qty" value="<?php echo $available; ?>" readonly="readonly" /></td>
  </tr>
<?php } ?>
  <tr>
    <th align="justify">Allot qty:</th>
    <td><input type="text" name="at_qty" id="at_qty" value="<?php echo $available; ?>" onchange="greater_qty('at_qty','av_qty')" /></td>
  </tr>
</table>
