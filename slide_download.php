<?php
function display_message($message, $redirect_url = null) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>File Upload Status</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-image: url('image/note-bg.jpeg');
                background-size: cover;
                background-repeat: no-repeat; 
            }
            .message-box {
                border: 2px solid black;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            .success {
                color: green;
            }
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
    
        <div class='message-box'>
            <p>{$message}</p>
        </div>";

    if ($redirect_url) {
        echo "<script>
                setTimeout(function() {
                    window.location.href = '{$redirect_url}';
                }, 2000);
              </script>";
    }

    echo "</body>
    </html>";
    exit;
}

include 'php/database.php';

if (isset($_GET['TopicID'])) {
    $TopicID = $_GET['TopicID'];
    
    $getTopic = "SELECT `Slide_filepath` FROM `topic` WHERE `TopicID` = $TopicID;";

    $result = mysqli_query($conn, $getTopic);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $filepath = $row['Slide_filepath'];

        if (file_exists($filepath)) {
            // Serve the file for download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit;
        } else {
            switch ($TopicID) {
                case '1':
                    display_message("File does not exist.", "topic-1.html");
                    break;
                case '2':
                    display_message("File does not exist.", "topic-2.html");
                    break;
                case '3':
                    display_message("File does not exist.", "topic-3.html");
                    break;
                case '4':
                    display_message("File does not exist.", "topic-4.html");
                    break;
                case '5':
                    display_message("File does not exist.", "topic-5.html");
                    break;
                case '6':
                    display_message("File does not exist.", "topic-6.html");
                    break;
                case '7':
                    display_message("File does not exist.", "topic-7.html");
                    break;
                case '8':
                    display_message("File does not exist.", "topic-8.html");
                    break;
                default:
                    break;
            }
        }
    } else {
        display_message("No file path found for the specified TopicID.", "students-notes.html");
    }
} else {
    display_message("No TopicID specified.", "students-notes.html");
}
?>

<!-- if ($TopicID == '1') {
            display_message("File does not exist.", "topic-1.html");
            } elseif ($TopicID == '2') {
                display_message("File does not exist.", "students-notes.html");
            } -->