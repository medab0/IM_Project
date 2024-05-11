<?php
include 'connect.php';

// Check connection
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

// Query to retrieve all user details
$query = "SELECT * FROM tbluserprofile";

// Execute the query
$result = $connection->query($query);

// Check if the query was successful
if (!$result) {
    echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit();
}

// Create a table to display the user details
echo "<html><head><title>User Details Report</title></head><body>";
echo "<h1> User Details </h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>User ID</th><th>First Name</th><th>Last Name</th></tr>";

// Loop through the result set and display each user's details
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['userID'] . "</td>";
    // Hashing firstName and lastName before displaying
    echo "<td>" . hash('sha256', $row['firstName']) . "</td>";
    echo "<td>" . hash('sha256', $row['lastName']) . "</td>";
    echo "</tr>";
}


echo "</table>";

//NEW TABLE on User Profile

// Query to retrieve all user details
$query1 = "SELECT * FROM tbluseraccount";

// Execute the query
$result1 = $connection->query($query1);

// Check if the query was successful
if (!$result1) {
    echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit();
}

// Create a table to display the user details
echo "<h1> Account Details </h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Account ID</th><th>Email Address</th><th>Username</th></tr>";

// Loop through the result set and display each user's details
while ($row = $result1->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['acctID'] . "</td>";
    // Hashing emailAdd and username before displaying
    echo "<td>" . hash('sha256', $row['emailAdd']) . "</td>";
    echo "<td>" . hash('sha256', $row['username']) . "</td>";
    echo "</tr>";
}


echo "</table>";

//NEW TABLE on Subscription Plans

// Query to retrieve all user details
$query1 = "SELECT * FROM tblsubscriptionplan";

// Execute the query
$result1 = $connection->query($query1);

// Check if the query was successful
if (!$result1) {
    echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit();
}

// Create a table to display the user details
echo "<h1> Subscription Plans </h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Subscription ID</th><th>Plan Name</th><th>Description</th></tr>";

// Loop through the result set and display each user's details
while ($row = $result1->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['Plan_ID'] . "</td>";
    echo "<td>" . $row['Plan_Name'] . "</td>";
    echo "<td>" . $row['Description'] . "</td>";
    echo "</tr>";
}

echo "</table>";


//NEW TABLE on Subscription Plans

// Query to retrieve all user details
$query = "SELECT * FROM tblcoffee";

// Execute the query
$result = $connection->query($query);

// Check if the query was successful
if (!$result1) {
    echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit();
}

// Create a table to display the user details
echo "<h1> Coffee Beans </h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Coffee ID</th><th>Coffee Name</th><th>Coffee Description</th></tr>";

// Loop through the result set and display each user's details
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['Coffee_ID'] . "</td>";
    echo "<td>" . $row['Coffee_Name'] . "</td>";
    echo "<td>" . $row['Description'] . "</td>";
    echo "</tr>";
}

echo "</table>";

/// Check connection
if ($connection->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

echo "<html><head><title>Subscription Statistics</title></head><body>";

// Query to retrieve subscription statistics
$query = "SELECT sp.Plan_Name, COALESCE(COUNT(s.plan_id), 0) AS subscriber_count
          FROM tblsubscriptionplan sp
          LEFT JOIN tblsubscription s ON sp.Plan_ID = s.plan_id
          GROUP BY sp.Plan_ID";

// Execute the query
$result = $connection->query($query);

// Check if the query was successful
if (!$result) {
    echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit();
}

// Create a table to display subscription statistics
echo "<h1>Subscription Statistics</h1>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Subscription Plan</th><th>Number of Subscribers</th></tr>";

// Loop through the result set and display subscription statistics
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['Plan_Name'] . "</td>";
    echo "<td>" . $row['subscriber_count'] . "</td>";
    echo "</tr>";
}

echo "</table>";



echo "</body></html>";

// Close the database connection
$connection->close();
?>

<img src="images\meta-chart.png">