<?php
    include 'database.php';
    session_start();
    if (!isset($_SESSION['userID'])) {
        header("Location: /SDPSoftware1/login.php");
        exit();
    }
    $userID = $_SESSION['userID'];
    $retrieve_user_info = "SELECT * FROM user WHERE userID = '$userID'";
    $user_result = mysqli_query($conn, $retrieve_user_info) or die("Query error:".mysqli_error($conn));
    $user_info = mysqli_fetch_assoc($user_result);
    echo json_encode($user_info);
    $conn->close();
?>