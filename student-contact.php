<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'php/database.php';

    if (!isset($conn)) {
        die("Database connection failed.");
    }
    $userID = $_SESSION['userID'];
    $sql = "SELECT Name FROM user WHERE userID = '$userID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $userName = $row['Name'];

    $topic = $_POST['topic'] ?? 'default_topic'; 
    $message = $_POST['message'] ?? 'default_message'; 
    $date = date('Y-m-d');

    $sql2 = "INSERT INTO feedback (userID, Name, FeedbackTopic, Message, Date) 
            VALUES ('$userID', '$userName', '$topic', '$message', '$date')";

    if (mysqli_query($conn, $sql2)) {
        $_SESSION['feedback_status'] = 'success';
    } else {
        $_SESSION['feedback_status'] = 'error';
    }

    mysqli_close($conn);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/student-navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/inbox-new.css">
    <script src="navbar.js"></script>
    <link rel="icon" type="" href="image/logo.jpg">
    <script src="https://kit.fontawesome.com/a6a6f2e015.js" crossorigin="anonymous"></script>
    <title>Contact Us</title>
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
    <div class="container">
        <div class="centered-box">
            <div class="board">
                <h1>Contact us!</h1>
                <p>If you have encountered any bugs or errors using this system, please feel free to contact us! We will get back as soon as possible to you regarding your issue. You may send us any improvement ideas as well, we are glad to hear from you!</p>
                <form id="contact-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="text" id="topic" name="topic" placeholder="Your topic here..." required>
                    <textarea id="message" name="message" rows="4" placeholder="Your message here..." required></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
            <br>
            <div class="centered-box">
                <h2>Click Here to Check Your Inbox!</h2>
                <a href="student-inbox.php"><button>Inbox</button></a>
            </div>
        </div>
    </div>
    <br>
    <div id="thankYouModal" class="modal">
        <div class="modal-content">
            <h2>Thank You!</h2>
            <p>Your details have been successfully submitted. Thanks!</p>
            <button onclick="closeModal()">OK</button>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-left">
                <img src="img/logo.jpg" alt="EduVenture Logo" class="footer-logo">
                <span class="footer-text">EduVenture</span>
            </div>
            <div class="footer-right">
                <a href="student-contact.html" class="footer-link">Contact Us</a>
                <a href="https://instagram.com" class="footer-link">Instagram</a>
            </div>
        </div>
    </footer>
    <script>
        function showThankYouMessage() {
            document.getElementById("thankYouModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("thankYouModal").style.display = "none";
        }

        window.onload = function() {
            <?php
            if (isset($_SESSION['feedback_status'])) {
                if ($_SESSION['feedback_status'] == 'success') {
                    echo 'showThankYouMessage();';
                } else {
                    echo 'alert("There was an error submitting your feedback. Please try again.");';
                }
                unset($_SESSION['feedback_status']);
            }
            ?>
        }
    </script>
</body>
</html>

