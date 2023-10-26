<?php
require_once('db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = json_decode($_POST["userData"], true);
    $userType = $_POST["userType"];

    $username = $userData['username'];
    $password = $userData['password'];

    $stmt = $conn->prepare("SELECT * FROM " . ($userType === 'hospital' ? 'Hospitals' : 'Receivers') . " WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo " User not found!";
    }

    $stmt->close();
    $conn->close();
}
?>
