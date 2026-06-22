<!DOCTYPE html>
<head>
    <title>Options</title>
    <link rel="stylesheet" href="css/student-navbar.css">
</head>
<body>
<nav>
        <ul class="sidebar">
            <li onclick=closeSidebar()><a href="#"><i class="fa-solid fa-xmark" style="color: #1f1f41; padding-right: 5px;"></i>  Close</a></li>
            <li><a href="#">Profile</a></li>
        </ul>
        <ul>
            <li class="logo"><a href="adminmainmenu.php"><img src="img/sdplogo.jpg" alt=""></a></li>
            <li class="hideOnMobile"><a href="managefeedbacklist.php">Feedback</a></li>
            <li class="hideOnMobile"><a href="adminoptions.php">Users</a></li>
            <li class="hideOnMobile"><a href="Profile Page (Admin).html">Profile</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><i class="fa-solid fa-bars" style="color: #1f1f41;"></i></a></li>
        </ul>
    </nav>
    <div>
        <img src="img/diamondwp.jpeg" class="adminback">
        <img src="img/option admin.png" class="mainoption">
        <img src="img/option admin.png" class="mainoption2">
    </div>
    <div class="fb">
        <a href="managestudentlist.php">Student(s)</a>
    </div>
    <div class="mua">
        <a href="managelecturerlist.php">Lecturer(s)</a>
    </div>
<style>
.adminback {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.mainoption {
    position: absolute;
    top: 30%;
    left: 17%;
    width: 450px;
    height: 250px;
}

.mainoption2 {
    position: absolute;
    top: 30%;
    right: 17%;
    width: 450px;
    height: 250px;
}

.fb a {
    position: absolute;
    top: 45%;
    left: 25%;
    font-size: 40px;
    text-decoration-line: none;
    color: black;
}

.mua a {
    position: absolute;
    top: 45%;
    right: 25%;
    text-align: center;
    font-size: 40px;
    text-decoration-line: none;
    color: black;
}
</style>