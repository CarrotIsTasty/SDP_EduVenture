<?php
include 'database.php';
session_start();

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    $sql = "SELECT Name FROM user WHERE userID = '$userID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['Name'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $topic = $_POST['TopicID'];
            $score = $_POST['Score'];
            $passingScore = $_POST['passScore'];

            $check_sql = "SELECT * FROM leaderboard WHERE UserID = '$userID' AND TopicID = '$topic'";
            $check_result = $conn->query($check_sql);

            if ($check_result->num_rows == 0) {
                $insert_sql = "INSERT INTO leaderboard (UserID, Name, TopicID, Score)
                               VALUES ('$userID', '$name', '$topic', '$score')";
                $conn->query($insert_sql);
            }

            if ($score >= $passingScore) {
                $badgeDetails = getBadgeDetails($topic);
                if ($badgeDetails) {
                    $badgeImage = $conn->real_escape_string($badgeDetails['image']);

                    $badge_check_sql = "SELECT * FROM badges WHERE UserID = '$userID' AND Badge_Name = '" . $badgeDetails['name'] . "'";
                    $badge_check_result = $conn->query($badge_check_sql);

                    if ($badge_check_result->num_rows == 0) {
                        $badge_sql = "INSERT INTO badges (Badge_Name, Badge_Description, Date_Achieved, Badge_Image, Score, userID)
                                      VALUES ('" . $badgeDetails['name'] . "', '" . $badgeDetails['description'] . "', CURDATE(), '$badgeImage', $score, '$userID')";
                        $conn->query($badge_sql);
                    }
                }
            }

            $conn->close();
        } else {
            header("Location: login.php");
            exit();
        }
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

function getBadgeDetails($topicID) {
    $badges = array(
        1 => array('name' => 'Topic 1 Badge', 'description' => 'Quiz 1: Introduction to Information System', 'image' => 'image\\badge\\badge-1.png'),
        2 => array('name' => 'Topic 2 Badge', 'description' => 'Quiz 2: Software Engineering', 'image' => 'image\\badge\\badge-2.png'),
        3 => array('name' => 'Topic 3 Badge', 'description' => 'Quiz 3: Methodology', 'image' => 'image\\badge\\badge-3.png'),
        4 => array('name' => 'Topic 4 Badge', 'description' => 'Quiz 4: Planning', 'image' => 'image\\badge\\badge-4.png'),
        5 => array('name' => 'Topic 5 Badge', 'description' => 'Quiz 5: Analysis Requirements', 'image' => 'image\\badge\\badge-5.png'),
        6 => array('name' => 'Topic 6 Badge', 'description' => 'Quiz 6: Feasibility Study', 'image' => 'image\\badge\\badge-6.png'),
        7 => array('name' => 'Topic 7 Badge', 'description' => 'Quiz 7: Prototyping and UI Design', 'image' => 'image\\badge\\badge-7.png'),
        8 => array('name' => 'Topic 8 Badge', 'description' => 'Quiz 8: Implementation', 'image' => 'image\\badge\\badge-8.png')
    );

    return isset($badges[$topicID]) ? $badges[$topicID] : null;
}
?>
