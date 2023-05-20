<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "ces";

// Establish a database connection
$connection = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
