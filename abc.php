<?php
include('config.php'); // Make sure $conn is defined inside config.php

$a = "923005030500";

for ($i = 0; $i < 500; $i++) {
    $quer = "INSERT INTO abc VALUES('$a')";
    mysqli_query($conn, $quer) or die('Query failed! ' . mysqli_error($conn));
    $a++;
}

echo "Sequence 2 generated";
?>
