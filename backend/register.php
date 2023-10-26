<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = json_decode($_POST["userData"], true);
    $userType = $_POST["userType"];

    $username = $userData['username'];
    $password = password_hash($userData['password'], PASSWORD_DEFAULT);
    $name = $userData['name'];
    $bloodGroup = $userData['bloodGroup'];

    $stmt = $conn->prepare("INSERT INTO " . ($userType === 'hospital' ? 'Hospitals' : 'Receivers') . " (username, password, " . ($userType === 'hospital' ? 'hospital_name' : 'receiver_name') . ", blood_group) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $name, $bloodGroup);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
