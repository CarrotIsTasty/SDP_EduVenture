<?php
include 'php/database.php';
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
$TopicID = $_GET['TopicID'];
$query = "UPDATE topic SET Slide_filepath='' WHERE TopicID=$TopicID";
if (mysqli_query($conn, $query)) {
    display_message("The slide has been deleted.", "lecture-note.php");
} else {
    echo "Error: " . mysqli_error($conn);
    display_message("Error occur, fail to delete slide.", "lecture-note.php");
}

mysqli_close($conn);
?>