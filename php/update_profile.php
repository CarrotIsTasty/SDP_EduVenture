<?php
include 'database.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];

$sql = "SELECT role FROM user WHERE userID = '$userID'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $role = strtolower($row['role']);
}
else {
    session_destroy();
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_SESSION['userID'];
    $name = $conn->real_escape_string($_POST['name']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $profilePicture = $conn->real_escape_string($_POST['selected_profile_picture']);
    $profilePicturePath = "image/profilepic/$profilePicture.png";

    $dobDate = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $dobDate->diff($currentDate)->y;

    if (!empty($name) && !empty($gender) && !empty($dob)) {
        $sql = "UPDATE user SET 
                    Name = '$name', 
                    Age = '$age', 
                    Gender = '$gender', 
                    DOB = '$dob', 
                    ProfilePicture = '$profilePicturePath' 
                WHERE userID = '$userID'";

        if ($conn->query($sql) === TRUE) {
            $updateLeaderboardSql = "UPDATE leaderboard SET 
                                        Name = '$name', 
                                        ProfilePicture = '$profilePicturePath' 
                                     WHERE UserID = '$userID'";
            $conn->query($updateLeaderboardSql);
        }
    }

    if ($role == 'lecturer') {
        header("Location: /SDPSoftware1/Profile Page (Lecturer).html");
    } elseif ($role == 'student') {
        header("Location: /SDPSoftware1/Profile Page (Student).html");
    } elseif ($role == 'admin') {
        header("Location: /SDPSoftware1/Profile Page (Admin).html");
    } else {
        header("Location: /SDPSoftware1/login.php");
    }
    exit();
}
$conn->close();
?>
