<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiverData = json_decode($_POST["userData"], true);

    $username = $receiverData['username'];
    $password = password_hash($receiverData['password'], PASSWORD_DEFAULT);
    $receiverName = $receiverData['name'];
    $bloodGroup = $receiverData['bloodGroup'];

    $stmt = $conn->prepare("INSERT INTO Receivers (username, password, receiver_name, blood_group) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $receiverName, $bloodGroup);

    if ($stmt->execute()) {
        echo "Receiver Registration Successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
