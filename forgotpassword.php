<?php
include 'php/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $sql = "SELECT userID FROM user WHERE Name = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['userID'] = $row['userID'];
        header("Location: Student's Security Questions Password Recovery (Login).php");
        exit();
    } else {
        echo "<script>alert('User not found');</script>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            font-family: Arial;
            background-image: url('img/wallpaperback.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .forgotbox {
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            filter: drop-shadow(5px 5px 3px rgb(37, 37, 37));
            width: 30%;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .forgotbox label {
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }

        .forgotbox input[type="text"] {
            width: 80%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            width: 80%;
        }

        .forgotbox button, .forgotbox a {
            padding: 10px;
            border: 1px solid black;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: black; 
            display: block;
            flex: 1;
            margin: 5px;
            background-color: buttonface;
        }

        .forgotbox button:hover, .forgotbox a:hover {
            background-color: #C7CBC7;
        }
    </style>
</head>
<body>
    <div class="forgotbox">
        <h1>Forgot Password</h1>
        <form method="post">
            <label>Enter your username:</label>
            <input type="text" name="username" placeholder="Username" required>
            <div class="button-container">
                <a href="login.php">Cancel</a>
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
