<?php
$servername = "localhost";
$username = "id21457541_beyondtarun";
$password = "Tarun1999#";
$database = "id21457541_bloodbank";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "connected successfully";
}
?>
