<?php 
include 'php/database.php';
$topic_id = $_GET['topic_id'];
$get_title = "SELECT Topic_name FROM `topic` WHERE TopicID = $topic_id";
$get_leaderboard = "SELECT Name AS Username, ProfilePicture, Score FROM Leaderboard WHERE TopicID = $topic_id ORDER BY Score DESC";
$result = $conn->query($get_leaderboard);
$result2 = $conn->query($get_title);
$row = $result2->fetch_assoc();
$topic_name = $row["Topic_name"];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/leaderboards.css">
    <link rel="stylesheet" href="css/student-navbar.css">
    <script src="js/navbar.js"></script>
    <link rel="icon" type="" href="img/logo.jpg">
    <script src="https://kit.fontawesome.com/a6a6f2e015.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <nav>
        <ul class="sidebar">
            <li onclick="closeSidebar()"><a href="#"><i class="fa-solid fa-xmark" style="color: #1f1f41; padding-right: 5px;"></i>  Close</a></li>
            <li><a href="lecture-note.php">Manage Notes</a></li>
            <li><a href="editQuestion.html">Manage Quiz</a></li>
            <li><a href="leaderboard-2.php?topic_id=1">Performance</a></li>
            <li><a href="Profile Page (Lecturer).html">Profile</a></li>
        </ul>
        <ul>
            <li class="logo"><a href="lecturermainmenu.php"><img src="image/logo.jpg" alt=""></a></li>
            <li class="hideOnMobile"><a href="lecture-note.php">Manage Notes</a></li>
            <li class="hideOnMobile"><a href="editQuestion.html">Manage Quiz</a></li>
            <li class="hideOnMobile"><a href="leaderboard-2.php?topic_id=1">Performance</a></li>
            <li class="hideOnMobile"><a href="Profile Page (Lecturer).html">Profile</a></li>
            <li class="menu-button" onclick="showSidebar()"><a href="#"><i class="fa-solid fa-bars" style="color: #1f1f41;"></i></a></li>
        </ul>
    </nav>
    <a href="lecturermainmenu.php" class="back-button"><i class="fa-solid fa-arrow-left" style="color: white;"></i></a>
    <div class="topic-container">
        <div class="topic-choice">
            <a href="leaderboard-2.php?topic_id=1" id="leaderboardLink">Go to Leaderboard</a>
            <select id="topicDropdown">
                <option value="">Select a Topic</option>
                <?php
                    $topics = $conn->query("SELECT TopicID FROM leaderboard");
                    $topicOption = [];
                    while ($topic = $topics->fetch_assoc()) {
                        if(!in_array($topic['TopicID'], $topicOption)){
                            echo '<option value="' . $topic['TopicID'] . '">' . $topic['TopicID'] . '</option>';
                            $topicOption[] = $topic['TopicID'];
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="center-box">
        <div class="header">
            <?php
            echo '<div class="quiz"><h1>Quiz ' . $topic_id . ' Leaderboard!</h1></div>';
            echo '<div class="topic"><h2>'. $row["Topic_name"] .'</h2></div>';
            echo '<div class="pokeball"><img src="image/pokeballs/trophy.png" alt=""></div>';
            ?>
        </div>
        <div class="board">
            <div class="leaderboard">
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each row
                    $rank = 1;
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="leaderboard-item">';
                        echo '<div class="rank">' . $rank . '</div>';
                        echo '<div class="profile-picture">';
                        echo '<img src="' . $row["ProfilePicture"] . '" alt="' . $row["Username"] . '">';
                        echo '</div>';
                        echo '<div class="username">' . $row["Username"] . '</div>';
                        echo '<div class="progress-bar">';
                        echo '<div class="progress" style="width: ' . ($row["Score"] / 15 * 100) . '%;"></div>';
                        echo '</div>';
                        echo '<div class="score">' . $row["Score"] . '</div>';
                        echo '</div>';
                        $rank++;
                    }
                } else {
                    echo "No Ranking Result Found on this Topic";
                }
                $conn->close();
                ?>
            </div>
        </div><br><br>
    </div>
</body>
<script src="js/leaderboard.js"></script>
</html>
