<?php
include 'connect.php';

// Check connection
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Function to fetch data
function fetchData($connection, $query) {
    $result = $connection->query($query);
    if (!$result) {
        echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
        exit();
    }
    return $result;
}

// Fetch data for all the tables
$userProfileData = fetchData($connection, "SELECT * FROM tbluserprofile");
$userAccountData = fetchData($connection, "SELECT * FROM tbluseraccount");
$subscriptionPlanData = fetchData($connection, "SELECT * FROM tblsubscriptionplan");
$coffeeData = fetchData($connection, "SELECT * FROM tblcoffee");
$subscriptionStatisticsData = fetchData($connection, "SELECT sp.Plan_Name, COALESCE(COUNT(s.plan_id), 0) AS subscriber_count FROM tblsubscriptionplan sp LEFT JOIN tblsubscription s ON sp.Plan_ID = s.plan_id GROUP BY sp.Plan_ID");
$totalUsersData = fetchData($connection, "SELECT COUNT(*) AS total_users FROM tbluseraccount WHERE is_deleted = 0")->fetch_assoc()['total_users'];
$deletedUsersData = fetchData($connection, "SELECT COUNT(*) AS deleted_users FROM tbluseraccount WHERE is_deleted = 1")->fetch_assoc()['deleted_users'];
$usersByGenderData = fetchData($connection, "SELECT gender, COUNT(*) AS count FROM tbluserprofile GROUP BY gender");
$usersByBirthYearData = fetchData($connection, "SELECT YEAR(birthDate) AS BirthYear, COUNT(*) AS Count FROM tbluserprofile GROUP BY YEAR(birthDate) ORDER BY YEAR(birthDate)");
$usersByBirthMonthData = fetchData($connection, "SELECT MONTHNAME(birthDate) AS Month, COUNT(*) AS Count FROM tbluserprofile GROUP BY MONTH(birthDate) ORDER BY MONTH(birthDate)");

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Report</title>
    <link rel="stylesheet" href="css/style_report.css">
    <script>
        function showTab(tabId) {
            var tabs = document.getElementsByClassName('tab-content');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }
            document.getElementById(tabId).classList.add('active');
        };

        function toggleNav() {
            document.querySelector('.nav-links').classList.toggle('active');
        };

    </script>
</head>
<body>

<div class="navbar">
    <!-- Toggle button -->
    <div class="nav-toggle" onclick="toggleNav()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <!-- Navigation links -->
    <div class="nav-links">
        <a href="#">Home</a>
        <a href="#">Cart</a>
        <a href="#">Logout</a>
    </div>
</div>


<div class="rounded-box">
    <div class="upper-content">
        <div class="image-container">
            <img src="images/Logo with Background.png" alt="Logo">
        </div>

        <div class="sticky-nav">
            <div class="nav-container">
                <a href="#" onclick="showTab('userDetailsTab')">User Details</a>
                <a href="#" onclick="showTab('accountDetailsTab')">Account Details</a>
                <a href="#" onclick="showTab('subscriptionPlansTab')">Subscription Plans</a>
                <a href="#" onclick="showTab('coffeeBeansTab')">Coffee Beans</a>
                <a href="#" onclick="showTab('subscriptionStatisticsTab')">Subscription Statistics</a>
                <a href="#" onclick="showTab('additionalStatisticsTab')">Additional Statistics</a>
            </div>
        </div>

    </div>
    
    <div id="userDetailsTab" class="tab-content active">
        <h1>User Details</h1>
        <table>
            <tr><th>User ID</th><th>First Name</th><th>Last Name</th></tr>
            <?php while ($row = $userProfileData->fetch_assoc()): ?>
            <tr><td><?= $row['userID'] ?></td><td><?= $row['firstName'] ?></td><td><?= $row['lastName'] ?></td></tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div id="accountDetailsTab" class="tab-content">
        <h1>Account Details</h1>
        <table>
            <tr><th>Account ID</th><th>Email Address</th><th>Username</th></tr>
            <?php while ($row = $userAccountData->fetch_assoc()): ?>
            <tr><td><?= $row['acctID'] ?></td><td><?= $row['emailAdd'] ?></td><td><?= $row['username'] ?></td></tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div id="subscriptionPlansTab" class="tab-content">
        <h1>Subscription Plans</h1>
        <table>
            <tr><th>Subscription ID</th><th>Plan Name</th><th>Description</th></tr>
            <?php while ($row = $subscriptionPlanData->fetch_assoc()): ?>
            <tr><td><?= $row['Plan_ID'] ?></td><td><?= $row['Plan_Name'] ?></td><td><?= $row['Description'] ?></td></tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div id="coffeeBeansTab" class="tab-content">
        <h1>Coffee Beans</h1>
        <table>
            <tr><th>Coffee ID</th><th>Coffee Name</th><th>Coffee Description</th></tr>
            <?php while ($row = $coffeeData->fetch_assoc()): ?>
            <tr><td><?= $row['Coffee_ID'] ?></td><td><?= $row['Coffee_Name'] ?></td><td><?= $row['Description'] ?></td></tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div id="subscriptionStatisticsTab" class="tab-content">
        <h1>Subscription Statistics</h1>
        <table>
            <tr><th>Subscription Plan</th><th>Number of Subscribers</th></tr>
            <?php while ($row = $subscriptionStatisticsData->fetch_assoc()): ?>
            <tr><td><?= $row['Plan_Name'] ?></td><td><?= $row['subscriber_count'] ?></td></tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div id="additionalStatisticsTab" class="tab-content">
        <h1>Total Users: <?= $totalUsersData ?></h1>
        <h1>Deleted Users: <?= $deletedUsersData ?></h1>
        <h1>Users by Gender</h1>
        <table>
            <tr><th>Gender</th><th>Count</th></tr>
            <?php while ($row = $usersByGenderData->fetch_assoc()): ?>
            <tr><td><?= $row['gender'] ?></td><td><?= $row['count'] ?></td></tr>
            <?php endwhile; ?>
        </table>
        <h1>Users by Year of Birth</h1>
        <table>
            <tr><th>Year of Birth</th><th>Count</th></tr>
            <?php while ($row = $usersByBirthYearData->fetch_assoc()): ?>
            <tr><td><?= $row['BirthYear'] ?></td><td><?= $row['Count'] ?></td></tr>
            <?php endwhile; ?>
        </table>
        <h1>Users Birth by Month</h1>
        <table>
            <tr><th>Month</th><th>Count</th></tr>
            <?php while ($row = $usersByBirthMonthData->fetch_assoc()): ?>
            <tr><td><?= $row['Month'] ?></td><td><?= $row['Count'] ?></td></tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div class="lower-content">
        <div class="creator-container">
            <p>Moriel Edgar Deandre Bien and Yoshinori Kyono Jr.</p>
            <p>BSCS - 03 & BSCS - 02</p>
        </div>
    </div>
</div>




</body>
</html>
