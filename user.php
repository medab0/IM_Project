<?php
    include 'connect.php'; // Include the database connection code
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/style2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <nav>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="About Us.php">About Us</a>
        <a href="Contact Us.php">Contact Us</a>
    </nav>

    <div class="container">
        <?php
            // Check if the user is logged in
            if(isset($_SESSION['id'])) {
                $userID = $_SESSION['id']; // Get the user ID from the session
                // Query to fetch user details for the logged-in user
                $sql = "SELECT u.userID, u.firstName, u.lastName, p.emailAdd, u.birthDate FROM tbluserprofile u 
                        INNER JOIN tbluseraccount p ON u.userID = p.acctID 
                        WHERE u.userID = $userID";
                $result = mysqli_query($connection, $sql);
                
                if ($result->num_rows > 0) {
                    // Output data for the user
                    $row = $result->fetch_assoc();
                    echo "<div class='user-details'>";
                    echo "<h1>Welcome back,</h1><br/>";
                    echo "<h2>" . $row["firstName"] . " " . $row["lastName"] . "</h2>";
                    echo "<p>Email: " . $row["emailAdd"] . "</p>";
                    echo "<p>Birth Date: " . $row["birthDate"] . "</p>";
                    // Output more details as needed
                    echo "</div>";
                } else {
                    echo "User not found";
                }
            } else {
                echo "You are not logged in.";
            }
        ?>
    </div>
</body>
</html>