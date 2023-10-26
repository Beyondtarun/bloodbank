<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bloodData = json_decode($_POST["bloodData"], true);
    $hospitalId = $bloodData['hospitalId'];
    $bloodType = $bloodData['bloodType'];
    $quantity = $bloodData['quantity'];

    $stmt = $conn->prepare("INSERT INTO BloodSamples (hospital_id, blood_type, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $hospitalId, $bloodType, $quantity);

    if ($stmt->execute()) {
        echo "Blood information added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
