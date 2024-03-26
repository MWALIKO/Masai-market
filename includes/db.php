<?php
// Parameters for establishing a database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "ecom";

// Establishing a database connection
$con = mysqli_connect($host, $username, $password, $database);

// Check if connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to server: " . mysqli_connect_error();
    // You might want to handle this failure case differently,
    // such as terminating the script or displaying an error message.
    // For simplicity, this example just echoes the error message.
}
?>
