<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <script src="https://kit.fontawesome.com/a6a6f2e015.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="student-navbar.css">
    <script src="navbar.js"></script>
</head>
<body>
    <div>
        <img src="diamondwp.jpeg" class="adminback">
    </div>
    <nav>
        <ul>
            <li><a href="adminmainmenu.php"><img src="sdplogo.jpg" alt="" style="height: 30px;"></a></li> 
            <li class="hideOnMobile"><a href="managefeedbacklist.php">Feedback</a></li>
            <li class="hideOnMobile"><a href="adminoptions.php">Users</a></li>
            <li class="hideOnMobile"><a href="Profilepageadmin.php">Profile</a></li>
            <li class="menu-button" onclick="showSidebar()"><a href="#"><i class="fa-solid fa-bars" style="color: #1f1f41;"></i></a></li>
        </ul>
    </nav>
    <div class="profile-container">
        <div class="profile-picture">
            <span>PROFILE PICTURE</span>
        </div>
        <div class="profile-info">
            <div>Name: John Doe</div>
            <div>Age: 30</div>
            <div>Gender: Male</div>
            <div>Date of Birth: January 1, 1990</div>
        </div>
        <div class="profile-buttons">
            <button>Manage Profile</button>
            <button>Forget Password</button>
        </div>
    </div>
</body>
<style>
    body {
        overflow: hidden;
    }
    
    .profile-container {
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translatex(-50%);
        width: 600px;
        background-color: white;
        padding: 120px 15px 65px 15px;
        box-shadow: 0 0 10px rgba(0,0,0,0.4);
        border-radius: 10px;
    }

    .profile-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    .profile-picture {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 4%;
        width: 100px;
        height: 100px; 
        background-color: #ccc;
        border-radius: 50%;
        display: flex;
        align-items: center;
        text-align: center;
    }

    .profile-picture span {
        display: block;
    }

    .profile-info {
        line-height: 1.6;
        text-align: center;
    }

    .profile-info div {
        margin-bottom: 10px;
    }

    .profile-buttons {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        justify-content: center;
    }

    .profile-buttons button {
        background-color: red;
        color: white;
        border: 1px solid black;
        padding: 10px 20px 10px 20px;
        border-radius: 5px;
        transition: 0.7s ease;
    }

    .profile-buttons button:hover {
        background-color: #357ae8;
        transform: scale(1.1);
    }

    .adminback {
        width: 100%;
        height: 775px;
    }
</style>
</html>
