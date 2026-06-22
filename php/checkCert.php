<?php
include 'database.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];
$sql = "SELECT * FROM certificate WHERE userID = '$userID'";
$result = $conn->query($sql);

$data = null;
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}

$conn->close();
echo json_encode($data);
?>
