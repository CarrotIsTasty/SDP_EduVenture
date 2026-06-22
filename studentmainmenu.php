<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/student-navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/navbar.js"></script>
    <link rel="icon" type="" href="img/logo.jpg">
    <title>Main Menu</title>
</head>
<body>
    <nav>
        <ul class="sidebar">
            <li class="logo" onclick="closeSidebar()"><a href="studentmainmenu.php"><i class="fa-solid fa-xmark" style="color: #1f1f41; padding-right: 5px;"></i>  Close</a></li>
            <li><a href="students-notes.html">Notes</a></li>
            <li><a href="student-quiz-menu.php">Quiz</a></li>
            <li><a href="student-contact.php">Contact Us</a></li>
            <li><a href="Profile Page (Student).html">Profile</a></li>
        </ul>
        <ul>
            <li class="logo"><a href="studentmainmenu.php"><img src="image/logo.jpg" alt=""></a></li> 
            <li class="hideOnMobile"><a href="students-notes.html">Notes</a></li>
            <li class="hideOnMobile"><a href="student-quiz-menu.php">Quiz</a></li>
            <li class="hideOnMobile"><a href="student-contact.php">Contact Us</a></li>
            <li class="hideOnMobile"><a href="Profile Page (Student).html">Profile</a></li>
            <li class="menu-button" onclick="showSidebar()"><a href="#"><i class="fa-solid fa-bars" style="color: #1f1f41;"></i></a></li>
        </ul>
    </nav>
    <div class="introtext">
        <p>
            Greetings from the best-gamified e-learning platform, EduVenture! Engaging quizzes, interactive challenges,
            and enjoyable educational excursions can completely change the way you learn. Monitor your development,
            and access new knowledge levels. Enter EduVenture, where learning meets fun, and each session is an exciting journey!
        </p>
    </div>
    <div>
        <img src="img/studentbackpic.png" class="backpic">
    </div>
    <div class="choices">
        <div>
            <img src="img/quiz-bg.jpeg" class="backquizpic">
        </div>
        <h1>How would you like to gain knowledge today?</h1>
        <div>
            <a href="students-notes.html">
                <button class="button1">Read Notes</button>
            </a>
            <a href="student-quiz-menu.php">
                <button class="button2">Start Game</button>
            </a>
        </div>
    </div>
    <div>
        <img src="img/longpic.png" class="longpic">
    </div>
    <div>
        <img src="img/bottompic.png" class="bottompic">
    </div>
    <h2>Why is Gamified e-Learning better?</h2>
    <div class="stuff">
        <p>1. Inspires positive motivation to learn.<br>
            2. Reduces barriers to learning.<br>
            3. Accelerates the pace of learning.<br>
            4. Presents concrete real-world applications.</br>
        </p>
    </div>
    <div class="footbackpic">
        <img src="img/sdplogo.jpg" class="footer-logo">
        <div>
            <p class="textedu">EduVenture</p>
            <p class="textedu2">2024 @ EduVenture Inc.</p>
        </div>
    </div>
</body>
</html>
<style>
    .introtext {
        position: absolute;
        top: 15%;
        left: 12%;
        font-size: 20px;
        text-align: center;
        background-color: rgba(0,0,0,0.5);
        padding: 20px;
        width: 400px;
        border: 2px solid black;
        border-radius: 5px;
    }
    
    .backpic {
        position: absolute;
        top: 12%;
        right: 5%;
        width: 800px;
        height: 550px;
        z-index: 2;
    }

    .choices {
        position: absolute;
        top: 47%;
        left: 12%;
    }

    .backquizpic {
        width: 450px;
        height: 200px;
        border-radius: 10px;
    }

    h1 {
        position: absolute;
        top: 5%;
        left: 50%;
        transform: translatex(-50%);
        text-align: center;
        font-size: 20px;
    }

    .button1 {
        position: absolute;
        bottom: 30%;
        left: 20%;
        padding: 15px;
        background-color: #272262;
        border-radius: 10px;
        border: none;
        color: white;
        cursor: pointer;
    }

    .button2 {
        position: absolute;
        bottom: 30%;
        right: 20%;
        padding: 15px;
        background-color: #272262;
        border-radius: 10px;
        border: none;
        color: white;
        cursor: pointer;
    }

    .longpic {
        position: absolute;
        bottom: -34%;
        width: 100%;
        height: 60%;
    }

    .bottompic {
        position: absolute;
        bottom: -65%;
        left: 10%;
        width: 30%;
        height: 30%;
    }

    .stuff {
        position: absolute;
        right: 17%;
        bottom: -60%;
        font-size: 22px;
    }

    h2 {
        position: absolute;
        bottom: -50%;
        right: 8%;
        transform: translatex(-50%);
        padding: 30px;
        font-size: 20px;
    }

    .footbackpic {
        background-color: #2B2929;
        position: absolute; 
        bottom: -85%;
        width: 100%;
        height: 120px;
    }

    .footer-logo {
        position: absolute;
        left: 10%;
        top: 25%;
        width: 80px;
        height: 70px;
        border-radius: 100px;
    }

    .textedu {
        position: absolute;
        left: 16%;
        top: 42%;
        color: white;
        font-size: 25px;
    }

    .textedu2 {
        position: absolute;
        right: 8%;
        top: 42%;
        color: grey;
        font-size: 20px;
    }
</style>