<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// You can now use the $conn variable to interact with the database.
?>
