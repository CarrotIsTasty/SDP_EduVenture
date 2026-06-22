<?php
include 'database.php';

$response = array('success' => false, 'message' => '');

if (!empty($_POST['questions'])) {
    foreach ($_POST['questions'] as $question) {
        $question_id = $question['Question_ID'];
        $question_text = $conn->real_escape_string($question['Question']);
        $option1 = $conn->real_escape_string($question['Option1']);
        $option2 = $conn->real_escape_string($question['Option2']);
        $option3 = $conn->real_escape_string($question['Option3']);
        $option4 = $conn->real_escape_string($question['Option4']);
        $answer = $conn->real_escape_string($question['Answer']);
        $topic = $conn->real_escape_string($question['Topic']);

        $sql = "UPDATE questions SET 
                    Question = '$question_text', 
                    Option1 = '$option1', 
                    Option2 = '$option2', 
                    Option3 = '$option3', 
                    Option4 = '$option4', 
                    Answer = '$answer', 
                    Topic = '$topic' 
                WHERE Question_ID = '$question_id'";

        if ($conn->query($sql) !== TRUE) {
            $response['message'] = "Error updating question: " . $conn->error;
            echo json_encode($response);
            $conn->close();
            exit;
        }
    }
    $response['success'] = true;
    $response['message'] = "Questions updated successfully!";
} else {
    $response['message'] = "No questions found to update.";
}

$conn->close();
echo json_encode($response);
?>
