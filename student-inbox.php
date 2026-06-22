<?php
session_start();
include 'php/database.php'; // Assuming this file initializes $conn

$feedbacks = [];

$userID = $_SESSION['userID'] ?? '';

// Ensure $userID is not empty before proceeding with the query
if (!empty($userID)) {
    $query = "SELECT FeedbackID, FeedbackTopic, Message, Reply FROM feedback WHERE userID = ?";
    
    // Check if $conn is properly initialized
    if ($conn === null) {
        die("Database connection failed."); // Handle connection failure gracefully
    }

    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("s", $userID);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if ($result) {
            $feedbacks = $result->fetch_all(MYSQLI_ASSOC);
            $result->free();
        } else {
            // Handle query result error
            // Example: error_log($conn->error);
        }
        
        $stmt->close();
    } else {
        // Handle prepare statement error
        // Example: error_log($conn->error);
    }
} else {
    // Handle case where $userID is empty (session not set)
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/student-navbar.css">
    <link rel="stylesheet" href="css/inbox-new.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/navbar.js"></script>
    <link rel="icon" type="" href="image/logo.jpg">
    <script src="https://kit.fontawesome.com/a6a6f2e015.js" crossorigin="anonymous"></script>
    <title>Inbox</title>
</head>
<body>
    <nav>
        <ul class="sidebar">
            <li class="logo" onclick="closeSidebar()"><a href="studentmainmenu.php"><i class="fa-solid fa-xmark" style="color: #1f1f41; padding-right: 5px;"></i>  Close</a></li>
            <li><a href="students-notes.html">Notes</a></li>
            <li><a href="student-quiz-menu.php">Quiz</a></li>
            <li><a href="student-contact.php">Contact Us</a></li>
            <li><a href="Profile Page (Student).html">Profile</a></li>
        </ul>
        <ul>
            <li class="logo"><a href="studentmainmenu.php"><img src="image/logo.jpg" alt=""></a></li> 
            <li class="hideOnMobile"><a href="students-notes.html">Notes</a></li>
            <li class="hideOnMobile"><a href="student-quiz-menu.php">Quiz</a></li>
            <li class="hideOnMobile"><a href="student-contact.php">Contact Us</a></li>
            <li class="hideOnMobile"><a href="Profile Page (Student).html">Profile</a></li>
            <li class="menu-button" onclick="showSidebar()"><a href="#"><i class="fa-solid fa-bars" style="color: #1f1f41;"></i></a></li>
        </ul>
    </nav>
    <a href="student-contact.php" class="back-button"><i class="fa-solid fa-arrow-left" style="color: white;"></i></a>
    <div class="main-content">
        <div class="inbox-container">
            <?php if (!empty($feedbacks)) : ?>
                <?php foreach ($feedbacks as $feedback) : ?>
                    <div class="inbox-item">
                        <div class="text-content">
                            <h3><?php echo htmlspecialchars($feedback['FeedbackTopic']); ?></h3>
                            <p>Replies: <?php echo htmlspecialchars($feedback['Reply']); ?></p>
                        </div>
                        <button onclick="showPopup('<?php echo addslashes(htmlspecialchars(json_encode($feedback))); ?>')">View</button>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No feedback available.</p>
            <?php endif; ?>
        </div>
    </div>
    <br><br><br><br><br><br>

    <div class="popup" id="popup">
        <div class="popup-content">
            <h3 id="popup-topic"></h3>
            <p><strong>Message:</strong> <span id="popup-message"></span></p>
            <p><strong>Reply:</strong> <span id="popup-reply"></span></p>
            <button class="close-btn" onclick="closePopup()">Close</button>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-left">
                <img src="image/logo.jpg" alt="EduVenture Logo" class="footer-logo">
                <span class="footer-text">EduVenture</span>
            </div>
            <div class="footer-right">
                <a href="student-contact.html" class="footer-link">Contact Us</a>
                <a href="https://instagram.com" class="footer-link">Instagram</a>
            </div>
        </div>
    </footer>
    <script>
        function showPopup(feedbackJson) {
            const feedback = JSON.parse(feedbackJson);
            document.getElementById('popup-topic').innerText = feedback.FeedbackTopic;
            document.getElementById('popup-message').innerText = feedback.Message;
            document.getElementById('popup-reply').innerText = feedback.Reply;
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>
</html>
