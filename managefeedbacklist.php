<?php
include 'php/database.php';

$sql = "SELECT FeedbackID, Name, userID, FeedbackTopic, Message, Reply, Date FROM feedback";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback List</title>
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
    <h1>Manage Feedback List</h1>
    <div class="printablearea">
        <table>
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Name</th>
                    <th>User ID</th>
                    <th>Feedback Topic</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $status = empty($row['Reply']) ? 'Not Replied' : 'Replied';
                        echo "<tr>";
                        echo "<td><a href='feedbackreply.php?id={$row['FeedbackID']}'><img src='img/replyicon.jpg' class='intimg' alt='Action Icon'></a></td>";
                        echo "<td>" . ($row['Name']) . "</td>";
                        echo "<td>" . ($row['userID']) . "</td>";
                        echo "<td>" . ($row['FeedbackTopic']) . "</td>";
                        echo "<td>" . ($row['Message']) . "</td>";
                        echo "<td>" . $status . "</td>";
                        echo "<td>" . ($row['Date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No feedback found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="printbutton">
        <button id="print-button">Print</button>
    </div>
    <script>
        document.getElementById('print-button').addEventListener('click', function() {
            window.print();
        });
    </script>
</body>
</html>
