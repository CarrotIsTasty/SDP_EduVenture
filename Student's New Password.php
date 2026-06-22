<?php
session_start();

$resetMessage = ''; // Initialize reset message variable

// Database connection parameters
include 'php/database.php';
// Check if userID is available in the session
if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get new password and confirm password from the form
        $newPassword = $_POST['new-password'];
        $confirmPassword = $_POST['confirm-password'];

        // Check if new password and confirm password match
        if ($newPassword === $confirmPassword) {
            // Prepare SQL statement to update password
            $stmt = $conn->prepare("UPDATE user SET Password = ? WHERE userID = ?");
            $stmt->bind_param("si", $newPassword, $userID);

            // Execute query
            if ($stmt->execute()) {
                $resetMessage = "Password reset successful!";
                header("Location: Profile Page (Student).html");
            } else {
                $resetMessage = "Error updating password. Please try again.";
            }

            // Close statement
            $stmt->close();
        } else {
            $resetMessage = "Passwords do not match. Please try again.";
        }
    }
} else {
    $resetMessage = "User ID not found in session.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's New Password Recovery</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url("img/resetpassword bg.jpg");
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
            width: 90%;
            max-width: 400px;
            margin: 10px auto;
            background-color: rgba(28, 157, 200, 0.9); 
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
</head>
<body>
    <div class="password-recovery-container">
        <div class="password-recovery-header">
            <h2>Reset Password</h2>
            <?php if (!empty($resetMessage)) : ?>
                <div class="error-message"><?php echo $resetMessage; ?></div>
            <?php endif; ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="security-question">
                    <label for="new-password">New Password: </label>
                    <input type="password" id="new-password" name="new-password" required>
                </div>
                <div class="security-question">
                    <label for="retype-password">Retype New Password: </label>
                    <input type="password" id="retype-password" name="confirm-password" required>
                </div>
                <div class="password-recovery-buttons">
                    <a href="Profile Page (Student).html">Cancel</a>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
