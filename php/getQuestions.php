<?php
    include 'database.php';
    session_start();
    if (isset($_SESSION['userID'])) {
    $retrieve_questions = "SELECT * FROM questions";
    $question_result = mysqli_query($conn, $retrieve_questions) or die("Query error:".mysqli_error($conn));
    $questions = array();

    while($question_row = mysqli_fetch_assoc($question_result)) {
        $questions[] = $question_row;
        }

    echo json_encode($questions);
    }
    else{
        header("Location: login.php");
        exit();
    }
    $conn->close();

?>