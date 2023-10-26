<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sampleId = $_POST["sampleId"];
    $receiverId = $_POST["receiverId"];

    $stmt = $conn->prepare("INSERT INTO Requests (sample_id, receiver_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $sampleId, $receiverId);

    if ($stmt->execute()) {
        echo "Blood sample requested successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
