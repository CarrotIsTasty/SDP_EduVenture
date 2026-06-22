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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "slide/"; //set the targeted file upload directory
        $target_file = $target_dir . basename($_FILES["file"]["name"]); //add the targeted directory to the file name and save it as a file path
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //capture the file extension(file type)

        $allowed_types = array("pdf", "ppt", "pptx");
        if (!in_array($file_type, $allowed_types)) {
            display_message("Sorry, only PDF, PPT, and PPTX files are allowed.", "lecture-note.php");
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $topic_id = $_POST['topic_id'];
                $slide_filepath = $target_file;

                if ($conn->connect_error) {
                    display_message("Connection failed: " . $conn->connect_error, "lecture-note.php");
                }

                $sql = "UPDATE topic SET Slide_filepath='$slide_filepath' WHERE TopicID=$topic_id";

                if ($conn->query($sql) === TRUE) {
                    display_message("Your File has successfully uploaded", "lecture-note.php");
                } else {
                    display_message("Sorry, there was an error uploading your file" . $conn->error, "lecture-note.php");
                }

                $conn->close();
            } else {
                display_message("Sorry, there was an error uploading your file.", "lecture-note.php");
            }
        }
    } else {
        display_message("No file was uploaded.", "lecture-note.php");
    }
}
?>
