<?php
include 'php/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT userID,Role FROM user WHERE Name = '$username' AND Password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['userID'] = $row['userID'];
        $role = strtolower($row['Role']);
        error_log($role);
        if ($role == 'lecturer') {
            header("Location: lecturermainmenu.php");
            exit();
        } elseif ($role == 'student') {
            header("Location: studentmainmenu.php");
            exit();
        } elseif ($role == 'admin') {
            header("Location: adminmainmenu.php");
            exit();
        }
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }

        .loginbox {
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            filter: drop-shadow(5px 5px 3px rgb(37, 37, 37));
            width: 30%;
        }

        .loginbox h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            justify-content: center;
            width: 100%;
            padding: 10px 0px;
        }

        .input-group p {
            width: 15%;
            min-width: 90px;
            margin: 0;
        }

        .input-group input {
            width: 50%;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .loginbox button {
            width: 60%;
            padding: 10px;
            border: 1px solid black;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .loginbox button:hover {
            background-color: #C7CBC7;
        }

        .register {
            text-align: center;
            margin-top: 10px;
        }

        .register a {
            color: red;
        }

        .fpass {
            text-align: center;
            margin-top: 10px;
        }

        .fpass a {
            color: black;
        }
    </style>
</head>
<body>
    <div class="loginbox">
        <h2>Login</h2>
        <form method="post">
            <div class="input-group">
                <p>Username:</p>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <p>Password:</p>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="fpass">
            <a href="forgotpassword.php">Forgot Password?</a>
        </div>

        <div class="register">
            <p>Don't have an account? <a href="Signup.php">Register!</a></p>
        </div>
    </div>
</body>
</html>
