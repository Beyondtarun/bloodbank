

<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = json_decode($_POST["userData"], true);
    $userType = $_POST["userType"];

    $username = $userData['username'];
    $password = password_hash($userData['password'], PASSWORD_DEFAULT);

    // Common fields for both Receiver and Hospital
    $name = $userData['name'];

    // Determine user type and insert data into the respective table
    if ($userType === 'receiver') {
        $bloodGroup = $userData['bloodGroup'];
        $stmt = $conn->prepare("INSERT INTO Receivers (username, password, receiver_name, blood_group) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $name, $bloodGroup);
    } elseif ($userType === 'hospital') {
        $hospitalName = $userData['hospitalName'];
        $stmt = $conn->prepare("INSERT INTO Hospitals (username, password, hospital_name) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $hospitalName);
    } else {
        echo "Invalid user type!";
        exit();
    }

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

