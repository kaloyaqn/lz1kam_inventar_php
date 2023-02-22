<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lz_inv";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Грешка при свързване с датабазата: " . $conn->connect_error);
  } 

?>