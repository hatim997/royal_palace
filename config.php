<?php

$host = "localhost";
$user = "root";
$password1 = "";
$database = "royal_palace_new";

// Create connection
$conn = mysqli_connect($host, $user, $password1, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Successfully connected to database";

?>
