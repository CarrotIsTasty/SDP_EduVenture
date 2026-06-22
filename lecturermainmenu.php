<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Menu</title>
    <script src="https://kit.fontawesome.com/a6a6f2e015.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/student-navbar.css">
    <script src="js/navbar.js"></script>
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
    <div>
        <img src="img/leaderboard.jpeg" class="lectback">
    </div>
    <div class="text">
        <p>Welcome!<br><br>As a lecturer, you are able to Edit Notes,<br>edit Questions for the students to answer,<br>and monitor student performances!</br></br></p>
    </div>
    <div>
        <img src="img/studentbackpic.png" class="coolphoto">
        <img src="img/note-mange.png" class="coolphoto2">
        <img src="img/quiz-manage.png" class="coolphoto3">
        <img src="img/performance.png" class="coolphoto4">
    </div>
    <div class="text1">
        <h1>Effortless Note Management</h1>
        <p>Our system provides an easy-to-use note management solution, allowing lecturers to upload<br>and remove study materials with just a few clicks. Simplify your teaching<br> process and keep your resources organized effortlessly.</br></p>
    </div>
    <div class="text2">
        <h1>Simplified Quiz Management</h1>
        <p>Effortlessly manage your quizzes with our intuitive system. Edit, and view quizzes in<br>just a few clicks. Enhance your assessment process and keep your quizzes organized with ease.</p>
    </div>
    <div class="text3">
        <h1>Track Student Performance</h1>
        <p>Easily monitor student progress with our dynamic leaderboard feature.<br>View and analyze performance at a glance, motivating students to excel and keeping you<br>informed with a simple directing page.</br></p>
    </div>
<style>
.lectback {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 1700px;
}

.text {
    position: absolute;
    top: 22%;
    left: 10%;
    padding: 20px 60px 10px 60px;
    border: 2px solid black;
    border-radius: 15px;
    text-align: center;
    font-size: 24px;
    background-color: rgba(0,0,0,0.6);
    color: white;
}

.coolphoto {
    position: absolute;
    top: 10%;
    right: 5%;
    width: 750px;
    height: 550px;
}

.coolphoto2 {
    position: absolute;
    top: 60%;
    left: 5%;
    width: 650px;
    height: 450px;
}

.text1 {
    position: absolute;
    bottom: 0%;
    right: 4%;
    font-family: Arial;
    color: #1F1F41;
    font-size: 20px;
    justify-content: center;
}

.coolphoto3 {
    position: absolute;
    bottom: -60%;
    right: 10%;
    width: 670px;
    height: 400px;
}

.text2 {
    position: absolute;
    bottom: -42%;
    left: 4%;
    font-family: Arial;
    color: #1F1F41;
    font-size: 20px;
}

.coolphoto4 {
    position: absolute;
    bottom: -120%;
    left: 8%;
    width: 700px;
    height: 450px;
}

.text3 {
    position: absolute;
    bottom: -105%;
    right: 4%;
    font-family: Arial;
    color: #1F1F41;
    font-size: 20px;
}

.text p, .text1 p, .text2 p, .text3 p {
    text-align: justify;
}
</style>
</body>
</html>
