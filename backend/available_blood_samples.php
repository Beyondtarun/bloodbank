<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $conn->prepare("SELECT BloodSamples.sample_id, Hospitals.hospital_name, BloodSamples.blood_type, BloodSamples.quantity FROM BloodSamples INNER JOIN Hospitals ON BloodSamples.hospital_id = Hospitals.hospital_id");
    $stmt->execute();
    $result = $stmt->get_result();

    $bloodSamples = array();
    while ($row = $result->fetch_assoc()) {
        $bloodSamples[] = $row;
    }

    echo json_encode($bloodSamples);

    $stmt->close();
    $conn->close();
}
?>
