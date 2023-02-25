<?php
$servername = "79.98.104.3";
$username = "ttonevco_lz1kamuser";
$password = "lodkazabokluk11!"; 
$dbname = "ttonevco_lz1kamdbsklad";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");

if ($conn->connect_error) {
    die("Грешка при свързване с датабазата: " . $conn->connect_error);
  } 

?>