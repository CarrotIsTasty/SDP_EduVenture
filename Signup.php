<?php
include 'php/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $securityQ1 = $_POST['securityanswer1'];
    $securityQ2 = $_POST['securityanswer2'];
    $securityQ3 = $_POST['securityanswer3'];
    $role = 'Student';
    
    $dobDateTime = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $dobDateTime->diff($currentDate)->y;

    $checkUserEmail = "SELECT * FROM user WHERE Name='$username' OR Email='$email'";
    $result = $conn->query($checkUserEmail);
    $defImage = $conn->real_escape_string('image\\profilepic\\1.png');
    if ($result->num_rows > 0) {
        echo "<script>alert('Username or Email already exists. Please choose a different username or email.');</script>";
    }
    else {
        $sql = "INSERT INTO user (Name, Password, ProfilePicture, Email, Age, DOB, Gender, SecurityQ1, SecurityQ2, SecurityQ3, Role) 
                VALUES ('$username', '$password', '$defImage', '$email', '$age', '$dob', '$gender', '$securityQ1', '$securityQ2', '$securityQ3', '$role')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Signup successful!');</script>";
            header("Location: login.php");
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
    body {
        font-family: Arial;
        background: url('img/wallpaperback.jpg');
        background-size: cover;
    }

    .signupbox {
        position: absolute;
        top: 10%;
        left: 34%;
        padding: 20px;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        filter: drop-shadow(5px 5px 3px rgb(37, 37, 37));
        width: 35%;
        height: 650px;
    }

    .signupbox h1, h2 {
        text-align: center;
    }

    .signupbox input, .signupbox select {
        width: 45%;
        padding: 10px;
        margin: 6px 12px;
        border-radius: 6px;
        border: none;
        box-sizing: border-box;
    }

    .signupbox button {
        position: absolute;
        bottom: 4%;
        left: 21%;
        width: 60%;
        padding: 10px;
        border: 1px solid black;
        border-radius: 50px;
        cursor: pointer;
    }

    .signupbox button:hover {
        background-color: #C7CBC7;
    }

    .signupbox [class="secans"] {
        width: 80%;
    }

    .text {
        position: absolute;
        bottom: -1.5%;
        left: 32%;
    }

    .text a {
        color: red;
    }
    .signup-container{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
</style>
</head>
<body>
    <div class="signupbox">
        <h1>Sign Up</h1>
        <form method="post">
            <div class="signup-container">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="date" name="dob" placeholder="Date of Birth" required>
                <select name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <h2>Security Questions</h2>
            <p>What is your school's nickname?</p>
            <input type="text" class="secans" name="securityanswer1" placeholder="Answer" required>
            <p>What is your pet's name?</p>
            <input type="text" class="secans" name="securityanswer2" placeholder="Answer" required>
            <p>What city were you born in?</p>
            <input type="text" class="secans" name="securityanswer3" placeholder="Answer" required>
            <button type="submit">Sign Up</button>
        </form>
        <div>
            <p class="text">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>    
</html>