<?php
session_start();
include('config.php'); // Make sure config.php connects using mysqli

$userid   = $_SESSION['username'];
$password = $_SESSION['password'];
$rest_id  = $_SESSION['restid'];

$mdish_id   = $_POST['dish_id'];
$mflag_yn   = $_POST['flag_yn'];

if ($mflag_yn == 'Y') {
    // Escape the input to prevent SQL injection
    $mdish_id_safe = mysqli_real_escape_string($conn, $mdish_id);

    $query = "DELETE FROM dish_master_tab WHERE DISH_ID = '$mdish_id_safe'";
    mysqli_query($conn, $query);
}
?>

<script type="text/javascript">
    document.location = 'dish_item_delete.php';
</script>
