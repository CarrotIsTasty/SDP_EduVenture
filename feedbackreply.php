<?php
session_start();
include 'php/database.php';

if (isset($_GET['id'])) {
    $feedbackID = intval($_GET['id']);

    $query = "SELECT FeedbackID, userID, Name, FeedbackTopic, Message FROM feedback WHERE FeedbackID = $feedbackID";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $feedback = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Feedback not found.'); window.location.href='managefeedbacklist.php';</script>";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $reply = $_POST['reply'];

        $query = "UPDATE feedback SET Reply = '$reply' WHERE FeedbackID = $feedbackID";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Reply submitted successfully!'); window.location.href='managefeedbacklist.php';</script>";
        } else {
            echo "<script>alert('Error submitting reply. Please try again.');</script>";
        }
    }
} else {
    echo "<script>alert('Invalid feedback ID.'); window.location.href='managefeedbacklist.php';</script>";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Reply</title>
    <link rel="stylesheet" href="css/student-navbar.css">
    <script src="https://kit.fontawesome.com/a6a6f2e015.js" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <img src="img/diamondwp.jpeg" class="adminback" alt="Background Image">
    </div>
    <nav>
        <ul class="sidebar">
            <li onclick=closeSidebar()><a href="#"><i class="fa-solid fa-xmark" style="color: #1f1f41; padding-right: 5px;"></i>  Close</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
        <ul>
            <li class="logo"><a href="adminmainmenu.php"><img src="img/sdplogo.jpg" alt=""></a></li>
            <li class="hideOnMobile"><a href="managefeedbacklist.php">Feedback</a></li>
            <li class="hideOnMobile"><a href="adminoptions.php">Users</a></li>
            <li class="hideOnMobile"><a href="Profile Page (Admin).html">Profile</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><i class="fa-solid fa-bars" style="color: #1f1f41;"></i></a></li>
        </ul>
    </nav>
    <a href="managefeedbacklist.php" class="back-button"><i class="fa-solid fa-arrow-left" style="color: white;"></i></a>
    <div class="feedback-container">
        <p>TO: <?php echo htmlspecialchars($feedback['Name']); ?></p>
        <div class="feedback">
            <p><strong>Reason for Feedback:</strong> <?php echo htmlspecialchars($feedback['FeedbackTopic']); ?></p>
            <p><strong>Elaboration:</strong> <?php echo htmlspecialchars($feedback['Message']); ?></p>
        </div>
        <form method="post" action="">
            <textarea name="reply" placeholder="Type your reply here..." required></textarea>
            <button type="submit">Reply</button>
        </form>
    </div>
</body>
<style>
body {
    font-family: Arial;
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

.feedback-container {
    background-color: white;
    padding: 25px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
    width: 400px;
    height: 350px;
}

.feedback-container p {
    font-size: 28px;
}

.feedback p {
    margin: 5px 0;
}

textarea {
    width: calc(100% - 40px);
    padding: 15px;
    margin-top: 5px;
    border: 1px solid black;
    border-radius: 2px;
    height: 150px;
}

button {
    position: absolute;
    right: 39%;
    bottom: 25%;
    padding: 5px 15px;
    background-color: blue;
    color: white;
    border: 1px solid black;
    border-radius: 20px;
    transition: 0.8s ease;
}

button:hover {
    background-color: red;
    transform: scale(1.3);
}

.adminback {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    z-index: -1;
}
</style>
</html>
