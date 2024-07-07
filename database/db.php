<?php
// db.php

$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "products_db";

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
