<?php
include 'database.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];
$requiredBadges = array(
    'Topic 1 Badge',
    'Topic 2 Badge',
    'Topic 3 Badge',
    'Topic 4 Badge',
    'Topic 5 Badge',
    'Topic 6 Badge',
    'Topic 7 Badge',
    'Topic 8 Badge'
);

$sql = "SELECT Badge_Name FROM badges WHERE userID = '$userID'";
$result = $conn->query($sql);

$userBadges = array();
while ($row = $result->fetch_assoc()) {
    $userBadges[] = $row['Badge_Name'];
}

$hasAllBadges = !array_diff($requiredBadges, $userBadges);

if ($hasAllBadges) {
    $nameSql = "SELECT Name FROM user WHERE userID = '$userID'";
    $nameResult = $conn->query($nameSql);
    $nameRow = $nameResult->fetch_assoc();
    $name = $nameRow['Name'];
    $dateAchieved = date('Y-m-d');

    $checkCertSql = "SELECT * FROM certificate WHERE userID = '$userID'";
    $certResult = $conn->query($checkCertSql);

    if ($certResult->num_rows == 0) {
        $insertCertSql = "INSERT INTO certificate (userID, Name, Date_Achieved) VALUES ('$userID', '$name', '$dateAchieved')";
        $conn->query($insertCertSql);
    }
}
$conn->close();
?>
