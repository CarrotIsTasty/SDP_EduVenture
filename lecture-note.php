<?php
include 'php/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Menu</title>
    <script src="https://kit.fontawesome.com/a6a6f2e015.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/student-navbar.css">
    <link rel="stylesheet" href="css/lecture-notes-popup.css">
    <script src="js/navbar.js"></script>
    <link rel="stylesheet" href="css/note.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" type="" href="image/logo.jpg">
</head>
<body>
    <nav>
        <ul class="sidebar">
            <li onclick="closeSidebar()"><a href="#"><i class="fa-solid fa-xmark" style="color: #1f1f41; padding-right: 5px;"></i>  Close</a></li>
            <li><a href="lecture-note.php">Manage Notes</a></li>
            <li><a href="editQuestion.html">Manage Quiz</a></li>
            <li><a href="leaderboard-2.php?topic_id=1">Performance</a></li>
            <li><a href="Profile Page (Lecturer).html">Profile</a></li>
        </ul>
        <ul>
            <li class="logo"><a href="lecturermainmenu.php"><img src="image/logo.jpg" alt=""></a></li>
            <li class="hideOnMobile"><a href="lecture-note.php">Manage Notes</a></li>
            <li class="hideOnMobile"><a href="editQuestion.html">Manage Quiz</a></li>
            <li class="hideOnMobile"><a href="leaderboard-2.php?topic_id=1">Performance</a></li>
            <li class="hideOnMobile"><a href="Profile Page (Lecturer).html">Profile</a></li>
            <li class="menu-button" onclick="showSidebar()"><a href="#"><i class="fa-solid fa-bars" style="color: #1f1f41;"></i></a></li>
        </ul>
    </nav>

    <br><br><br>
    <div class="container">
        <div class="parent">
            <div class="block">
                <div class="div1"><img src="image/is.jpeg" alt=""></div>
                <div class="div4"><span class="topic">Topic 1 <br><span class="info">Introduction to Information System</span></span>
                    <button data-popup-target="#popup1" class="btn">Edit</button>
                    <!-- Pop up windows for edit -->
                    <div class="popup" id="popup1">
                        <div class="popup-header">
                            <div class="popup-title">Topic 1: Introduction to Information System</div>
                            <button data-close-button class="popup-close"><span style="font-size: 20px;">&times;</span></button>
                        </div>
                        <div class="popup-body">
                            Upload New Slide Here! <br><br>   
                            Current file: <?php 
                            $topic_id = 1;
                            $sql = "SELECT Slide_Filepath FROM topic WHERE TopicID = $topic_id";
                            $result = $conn->query($sql);
                            
                            $current_file_path = "";
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $current_file_path = $row['Slide_Filepath'];
                            }
                            echo $current_file_path; 
                            ?> <br><br>               
                            <form action="slide-upload2.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="topic_id" value="1"> <!-- Hidden input for Topic ID -->
                                <input type="file" id="file" class="form-control" name="file" type="file">
                                <button class="upload-btn" name="submit" type="submit" value="Upload">Upload</button>
                            </form>
                            Remove file<a href="slide-remove.php?TopicID=1"><button class="remove-btn" name="submit" type="submit" value="Remove">Remove</button></a>


                        </div>
                    </div>
                    <div id="overlay"></div>
                    <!-- End of pop up windows -->
                </div>
            </div>
            <div class="block">
                <div class="div2"><img src="image/se.jpeg" alt=""></div>
                <div class="div5"><span class="topic">Topic 2 <br><span class="info">Software Engineering </span></span>
                    
                    <button data-popup-target="#popup2" class="btn">Edit</button>
                    <!-- Pop up windows for edit -->
                    <div class="popup" id="popup2">
                        <div class="popup-header">
                            <div class="popup-title">Topic 2: Software Engineering</div>
                            <button data-close-button class="popup-close"><span style="font-size: 20px;">&times;</span></button>
                        </div>
                        <div class="popup-body">
                            Upload New Slide Here!<br><br>
                            Current file: <?php 
                            $topic_id = 2;
                            $sql = "SELECT Slide_Filepath FROM topic WHERE TopicID = $topic_id";
                            $result = $conn->query($sql);
                            
                            $current_file_path = "";
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $current_file_path = $row['Slide_Filepath'];
                            }
                            echo $current_file_path; 
                            ?> <br><br>
                            <form action="slide-upload2.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="topic_id" value="2"> <!-- Hidden input for Topic ID -->
                                <input type="file" id="file" class="form-control" name="file" type="file">
                                <button class="upload-btn" name="submit" type="submit" value="Upload">Upload</button>
                            </form>
                            Remove file<a href="slide-remove.php?TopicID=2"><button class="remove-btn" name="submit" type="submit" value="Remove">Remove</button></a>
                        </div>
                    </div>
                    <div id="overlay"></div>
                    <!-- End of pop up windows -->
                </div>
            </div>
            <div class="block">
                <div class="div3"><img src="image/methodology.jpeg" alt=""></div>
                <div class="div6"><span class="topic">Topic 3 <br><span class="info">Methodology </span></span>
                    <!-- <button class="btn-lec">Lecuture Note</button> -->
                    <button data-popup-target="#popup3" class="btn">Edit</button>
                    <!-- Pop up windows for edit -->
                    <div class="popup" id="popup3">
                        <div class="popup-header">
                            <div class="popup-title">Topic 3: Methodology</div>
                            <button data-close-button class="popup-close"><span style="font-size: 20px;">&times;</span></button>
                        </div>
                        <div class="popup-body">
                            Upload New Slide Here!<br><br>
                            Current file: <?php 
                            $topic_id = 3;
                            $sql = "SELECT Slide_Filepath FROM topic WHERE TopicID = $topic_id";
                            $result = $conn->query($sql);
                            
                            $current_file_path = "";
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $current_file_path = $row['Slide_Filepath'];
                            }
                            echo $current_file_path; 
                            ?> <br><br>
                            <form action="slide-upload2.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="topic_id" value="3"> <!-- Hidden input for Topic ID -->
                                <input type="file" id="file" class="form-control" name="file" type="file">
                                <button class="upload-btn" name="submit" type="submit" value="Upload">Upload</button>
                            </form>
                            Remove file<a href="slide-remove.php?TopicID=3"><button class="remove-btn" name="submit" type="submit" value="Remove">Remove</button></a>
                        </div>
                    </div>
                    <div id="overlay"></div>
                    <!-- End of pop up windows -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="parent">
            <div class="block">
                <div class="div1"><img src="image/planning.jpeg" alt=""></div>
                <div class="div4"><span class="topic">Topic 4 <br><span class="info">Planning </span></span>
                    <!-- <button class="btn-lec">Lecuture Note</button> -->
                    <button data-popup-target="#popup4" class="btn">Edit</button>
                    <!-- Pop up windows for edit -->
                    <div class="popup" id="popup4">
                        <div class="popup-header">
                            <div class="popup-title">Topic 4: Planning</div>
                            <button data-close-button class="popup-close"><span style="font-size: 20px;">&times;</span></button>
                        </div>
                        <div class="popup-body">
                            Upload New Slide Here!<br><br>
                            Current file: <?php 
                            $topic_id = 4;
                            $sql = "SELECT Slide_Filepath FROM topic WHERE TopicID = $topic_id";
                            $result = $conn->query($sql);
                            
                            $current_file_path = "";
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $current_file_path = $row['Slide_Filepath'];
                            }
                            echo $current_file_path; 
                            ?> <br><br>
                            <form action="slide-upload2.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="topic_id" value="4"> <!-- Hidden input for Topic ID -->
                                <input type="file" id="file" class="form-control" name="file" type="file">
                                <button class="upload-btn" name="submit" type="submit" value="Upload">Upload</button>
                            </form>
                            Remove file<a href="slide-remove.php?TopicID=4"><button class="remove-btn" name="submit" type="submit" value="Remove">Remove</button></a>
                        </div>
                    </div>
                    <div id="overlay"></div>
                    <!-- End of pop up windows -->
                </div>
            </div>
            <div class="block">
                <div class="div2"><img src="image/analysis.jpeg" alt=""></div>
                <div class="div5"><span class="topic">Topic 5 <br><span class="info">Analysis Requirements</span></span>
                    <!-- <button class="btn-lec">Lecuture Note</button> -->
                    <button data-popup-target="#popup5" class="btn">Edit</button>
                    <!-- Pop up windows for edit -->
                    <div class="popup" id="popup5">
                        <div class="popup-header">
                            <div class="popup-title">Topic 5: Analysis Requirements</div>
                            <button data-close-button class="popup-close"><span style="font-size: 20px;">&times;</span></button>
                        </div>
                        <div class="popup-body">
                            Upload New Slide Here!<br><br>
                            Current file: <?php 
                            $topic_id = 5;
                            $sql = "SELECT Slide_Filepath FROM topic WHERE TopicID = $topic_id";
                            $result = $conn->query($sql);
                            
                            $current_file_path = "";
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $current_file_path = $row['Slide_Filepath'];
                            }
                            echo $current_file_path; 
                            ?> <br><br>
                            <form action="slide-upload2.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="topic_id" value="5"> <!-- Hidden input for Topic ID -->
                                <input type="file" id="file" class="form-control" name="file" type="file">
                                <button class="upload-btn" name="submit" type="submit" value="Upload">Upload</button>
                            </form>
                            Remove file<a href="slide-remove.php?TopicID=5"><button class="remove-btn" name="submit" type="submit" value="Remove">Remove</button></a>
                        </div>
                    </div>
                    <div id="overlay"></div>
                    <!-- End of pop up windows -->
                </div>
            </div>
            <div class="block">
                <div class="div3"><img src="image/feasibility.jpeg" alt=""></div>
                <div class="div6"><span class="topic">Topic 6 <br><span class="info">Feasibility Study </span></span>
                    <!-- <button class="btn-lec">Lecuture Note</button> -->
                    <button data-popup-target="#popup6" class="btn">Edit</button>
                    <!-- Pop up windows for edit -->
                    <div class="popup" id="popup6">
                        <div class="popup-header">
                            <div class="popup-title">Topic 6: Feasibility Study</div>
                            <button data-close-button class="popup-close"><span style="font-size: 20px;">&times;</span></button>
                        </div>
                        <div class="popup-body">
                            Upload New Slide Here!<br><br>
                            Current file: <?php 
                            $topic_id = 6;
                            $sql = "SELECT Slide_Filepath FROM topic WHERE TopicID = $topic_id";
                            $result = $conn->query($sql);
                            
                            $current_file_path = "";
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $current_file_path = $row['Slide_Filepath'];
                            }
                            echo $current_file_path; 
                            ?> <br><br>
                            <form action="slide-upload2.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="topic_id" value="6"> <!-- Hidden input for Topic ID -->
                                <input type="file" id="file" class="form-control" name="file" type="file">
                                <button class="upload-btn" name="submit" type="submit" value="Upload">Upload</button>
                            </form>
                            Remove file<a href="slide-remove.php?TopicID=6"><button class="remove-btn" name="submit" type="submit" value="Remove">Remove</button></a>
                        </div>
                    </div>
                    <div id="overlay"></div>
                    <!-- End of pop up windows -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="parent">
            <div class="block">
                <div class="div1"><img src="image/design.jpeg" alt=""></div>
                <div class="div4"><span class="topic">Topic 7 <br><span class="info">Prototyping and UI Design </span></span>
                    <!-- <button class="btn-lec">Lecuture Note</button> -->
                    <button data-popup-target="#popup7" class="btn">Edit</button>
                    <!-- Pop up windows for edit -->
                    <div class="popup" id="popup7">
                        <div class="popup-header">
                            <div class="popup-title">Topic 7: Prototyping and UI Design</div>
                            <button data-close-button class="popup-close"><span style="font-size: 20px;">&times;</span></button>
                        </div>
                        <div class="popup-body">
                            Upload New Slide Here!<br><br>
                            Current file: <?php 
                            $topic_id = 7;
                            $sql = "SELECT Slide_Filepath FROM topic WHERE TopicID = $topic_id";
                            $result = $conn->query($sql);
                            
                            $current_file_path = "";
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $current_file_path = $row['Slide_Filepath'];
                            }
                            echo $current_file_path; 
                            ?> <br><br>
                            <form action="slide-upload2.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="topic_id" value="7"> <!-- Hidden input for Topic ID -->
                                <input type="file" id="file" class="form-control" name="file" type="file">
                                <button class="upload-btn" name="submit" type="submit" value="Upload">Upload</button>
                            </form>
                            Remove file<a href="slide-remove.php?TopicID=7"><button class="remove-btn" name="submit" type="submit" value="Remove">Remove</button></a>
                        </div>
                    </div>
                    <div id="overlay"></div>
                    <!-- End of pop up windows -->
                </div>
            </div>
            <div class="block">
                <div class="div2"><img src="image/implement.jpeg" alt=""></div>
                <div class="div5"><span class="topic">Topic 8 <br><span class="info">Implementation</span></span>
                    <!-- <button class="btn-lec">Lecuture Note</button> -->
                    <button data-popup-target="#popup8" class="btn">Edit</button>
                    <!-- Pop up windows for edit -->
                    <div class="popup" id="popup8">
                        <div class="popup-header">
                            <div class="popup-title">Topic 8: Implementation</div>
                            <button data-close-button class="popup-close"><span style="font-size: 20px;">&times;</span></button>
                        </div>
                        <div class="popup-body">
                            Upload New Slide Here!
                            <br><br>
                            Current file: <?php 
                            $topic_id = 8;
                            $sql = "SELECT Slide_Filepath FROM topic WHERE TopicID = $topic_id";
                            $result = $conn->query($sql);
                            
                            $current_file_path = "";
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $current_file_path = $row['Slide_Filepath'];
                            }
                            echo $current_file_path; 
                            ?> <br><br>
                            <form action="slide-upload2.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="topic_id" value="8"> <!-- Hidden input for Topic ID -->
                                <input type="file" id="file" class="form-control" name="file" type="file">
                                <button class="upload-btn" name="submit" type="submit" value="Upload">Upload</button>
                            </form>
                            Remove file<a href="slide-remove.php?TopicID=8"><button class="remove-btn" name="submit" type="submit" value="Remove">Remove</button></a>
                        </div>
                    </div>
                    <div id="overlay"></div>
                    <!-- End of pop up windows -->
                </div>
            </div>
            <div class="block2">
                </div>
            </div>
        </div>
        <br><br><br>
        
        <footer>
            <div class="footer-content">
                <div class="footer-left">
                    <img src="image/logo.jpg" alt="EduVenture Logo" class="footer-logo">
                    <span class="footer-text">EduVenture</span>
                </div>
                <div class="footer-right">
                <span style="color: #B6B6B6 ;">2024 @ EduVenture Inc.</span>
                </div>
            </div>
        </footer>
    </div>
</body>
<script src="js/edit-note-popup.js"></script>
