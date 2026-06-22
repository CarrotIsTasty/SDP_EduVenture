<?php
    include 'database.php';
    session_start();

    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];   
        $getBadge = "SELECT * FROM badges WHERE userID = $userID ORDER BY Score DESC";
        $result = $conn->query($getBadge);
        
        $badges = array();
        while ($row = $result->fetch_assoc()) {
            $badges[] = $row;
        }
        
        echo json_encode($badges);
    } else {
        header("Location: login.php");
        exit();
    }
    $conn->close();
?>
