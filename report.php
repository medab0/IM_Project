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
$result = $mysqli->query($query);

// Check if the query was successful
if (!$result) {
    echo "Query failed: (" . $mysqli->errno . ") " . $mysqli->error;
    exit();
}

// Create a table to display the user details
echo "<html><head><title>User Details Report</title></head><body>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>User ID</th><th>Name</th><th>Email</th><th>Address</th></tr>";

// Loop through the result set and display each user's details
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</body></html>";

// Close the database connection
$mysqli->close();
?>