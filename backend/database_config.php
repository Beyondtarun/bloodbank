<?php
$servername = "your_database_host";
$username = "your_database_username";
$password = "your_database_password";
$database = "your_database_name";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
