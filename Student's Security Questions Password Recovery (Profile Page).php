<?php
include 'php/database.php'; // Assuming this file contains database connection settings

session_start();

$verificationMessage = '';

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
        $answer3 = $_POST['answer3'];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT SecurityQ1, SecurityQ2, SecurityQ3 FROM user WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dbAnswer1 = $row['SecurityQ1'];
            $dbAnswer2 = $row['SecurityQ2'];
            $dbAnswer3 = $row['SecurityQ3'];

            if ($answer1 === $dbAnswer1 && $answer2 === $dbAnswer2 && $answer3 === $dbAnswer3) {
                $_SESSION['verified'] = true;
                header("Location: Student's New Password.php"); // Corrected file name
                exit();
            } else {
                $verificationMessage = "Verification failed. Please try again.";
            }
        } else {
            $verificationMessage = "User not found.";
        }
    }
} else {
    $verificationMessage = "User ID not found in session.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Security Questions Password Recovery</title>
    <link rel="stylesheet" href="css/student-navbar.css"> 
</head>
<body>
    <div class="password-recovery-container">
        <div class="password-recovery-header">
            <h2>Security Questions</h2>
            <?php if (!empty($verificationMessage)) : ?>
                <div class="error-message"><?php echo $verificationMessage; ?></div>
            <?php endif; ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="security-question">
                    <label for="school-nickname">1. What is your school’s nickname?</label>
                    <input type="text" id="school-nickname" name="answer1" required>
                </div>
                <div class="security-question">
                    <label for="pet-name">2. What is your pet’s name?</label>
                    <input type="text" id="pet-name" name="answer2" required>
                </div>
                <div class="security-question">
                    <label for="birth-city">3. What city were you born in?</label>
                    <input type="text" id="birth-city" name="answer3" required>
                </div>
                <div class="password-recovery-buttons">
                    <a href="Profile Page (Student).html">Cancel</a> <!-- Replace with actual cancel page -->
                    <button type="submit">Submit</button> <!-- Changed to button type submit -->
                </div>
            </form>
        </div>
    </div>
</body>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('https://wallpapers-clan.com/wp-content/uploads/2024/04/pokemon-gengar-cool-red-desktop-wallpaper-preview.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        .password-recovery-container {
            width: 100%;
            max-width: 540px;
            margin: 10px auto;
            background-color: rgba(160, 45, 104, 0.9); 
            opacity: 0.8;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            border-radius: 10px;
            overflow-y: auto;
            max-height: 80vh;
            margin-top: 20px;
        }

        .password-recovery-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .password-recovery-header h2 {
            color: #000000;
            margin: 0;
            font-weight: 500;
        }

        .security-question {
            color: #f4f4f4;
            width: 100%;
            line-height: 1.6;
            text-align: left;
            margin-bottom: 20px;
        }

        .security-question label {
            width: 100%;
            font-weight: bold;
            color: #000000;
        }

        .security-question input {
            width: 100%;
            padding: 10px;
            border: 3px solid #ca0909;
            border-radius: 43px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .security-question input:focus {
            border-color: #4285f4;
            box-shadow: 0 0 5px rgba(66, 133, 244, 0.5);
            outline: none;
        }

        .password-recovery-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .password-recovery-buttons a,
        .password-recovery-buttons button {
            text-decoration: none;
            background-color: #e9e9e9;
            color:black;
            border: none;
            padding: 9px 40px;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            font-weight: 500;
        }

        .password-recovery-buttons a:hover,
        .password-recovery-buttons button:hover {
            background-color: #1c0fc9;
            color: white;
            transform: translateY(-2px);
        }

        .password-recovery-buttons a {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

</html>