<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hospitalData = json_decode($_POST["userData"], true);

    $username = $hospitalData['username'];
    $password = password_hash($hospitalData['password'], PASSWORD_DEFAULT);
    $hospitalName = $hospitalData['hospitalName'];

    $stmt = $conn->prepare("INSERT INTO Hospitals (username, password, hospital_name) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $hospitalName);

    if ($stmt->execute()) {
        echo "Hospital Registration Successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
