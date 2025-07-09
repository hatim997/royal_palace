<?php

$host = "localhost";
$user = "root";
$password1 = "";
$database = "royal_palace_new";

$conn = mysqli_connect($host, $user, $password1, $database);

if (!$conn) {
    die("Cannot connect to MySQL: " . mysqli_connect_error());
}

// echo "Successfully connected to database";

?>
