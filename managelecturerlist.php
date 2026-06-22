<?php
include 'php/database.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $userID = $_POST['userID'];
    
    $stmt = $conn->prepare("DELETE FROM user WHERE userID = ?");
    $stmt->bind_param("s", $userID);
    
    if ($stmt->execute()) {
        echo "<script>alert('Lecturer deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$sql = "SELECT Name, userID, Age FROM user WHERE Role='lecturer'";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Lecturer List</title>
    <link rel="stylesheet" href="css/student-navbar.css">
    <link rel="stylesheet" href="css/manageliststyle.css">
</head>
<body>
    <div>
        <img src="img/diamondwp.jpeg" class="adminback" alt="Background Image">
    </div>
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
    <h1>Manage Lecturer List</h1>
    <div class="printablearea">
        <table>
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Names</th>
                    <th>ID</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>
                                    <form action='' method='post' onsubmit='return confirm(\"Are you sure you want to delete this lecturer?\");'>
                                        <input type='hidden' name='userID' value='" . htmlspecialchars($row["userID"]) . "'>
                                        <input type='hidden' name='delete' value='1'>
                                        <button type='submit' class='delete-btn'><img src='img/trashpic.png' alt='Delete'></button>
                                    </form>
                                </td>
                                <td>" . htmlspecialchars($row["Name"]) . "</td>
                                <td>" . htmlspecialchars($row["userID"]) . "</td>
                                <td>" . htmlspecialchars($row["Age"]) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No lecturers registered yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </script>
</body>
</html>
