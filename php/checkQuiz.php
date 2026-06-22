<?php
    include 'database.php';
    session_start();

    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];   
        $getQuiz = "SELECT * FROM leaderboard";
        $result = $conn->query($getQuiz);
        
        $quiz = array();
        while ($row = $result->fetch_assoc()) {
            $quiz[] = $row;
        }
        
        echo json_encode($quiz);
    } else {
        header("Location: login.php");
        exit();
    }
    $conn->close();
?>
