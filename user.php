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
        <a href="product.php">Products</a>
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

                    // Form to update user information
                    echo "<div class='update-form'>";
                    echo "<h2>Update Information</h2>";
                    echo "<form method='POST'>";
                    echo "<input type='text' name='firstName' placeholder='First Name' value='" . $row["firstName"] . "' required>";
                    echo "<input type='text' name='lastName' placeholder='Last Name' value='" . $row["lastName"] . "' required>";
                    echo "<input type='email' name='email' placeholder='Email Address' value='" . $row["emailAdd"] . "' required>";
                    echo "<input type='date' name='birthDate' value='" . $row["birthDate"] . "' required>";
                    echo "<button type='submit' name='update'>Update</button>";
                    echo "</form>";
                    echo "</div>";

                    // Form to delete user account
                    echo "<div class='delete-form'>";
                    echo "<h2>Delete Account</h2>";
                    echo "<form method='POST'>";
                    echo "<button type='submit' name='delete'>Delete Account</button>";
                    echo "</form>";
                    echo "</div>";
                } else {
                    echo "User not found";
                }

                // Handle update and delete actions
                if(isset($_POST['update'])) {
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $email = $_POST['email'];
                    $birthDate = $_POST['birthDate'];
                    // Update user information in the database
                    $updateSql = "UPDATE tbluserprofile SET firstName='$firstName', lastName='$lastName', birthDate='$birthDate' WHERE userID='$userID'";
                    $updateResult = mysqli_query($connection, $updateSql);
                    if($updateResult) {
                        echo "<script>alert('Information updated successfully');</script>";
                        // Refresh the page to reflect the updated information
                        echo "<meta http-equiv='refresh' content='0'>";
                    } else {
                        echo "<script>alert('Failed to update information');</script>";
                    }
                }

                if(isset($_POST['delete'])) {
                    // Delete user account and related information from the database
                    $deleteSql1 = "DELETE FROM tbluserprofile WHERE userID='$userID'";
                    $deleteSql2 = "DELETE FROM tbluseraccount WHERE acctID='$userID'";
                    $deleteResult1 = mysqli_query($connection, $deleteSql1);
                    $deleteResult2 = mysqli_query($connection, $deleteSql2);
                    if($deleteResult1 && $deleteResult2) {
                        // Log the user out and redirect to the homepage after deleting account
                        session_destroy();
                        header("Location: index.php");
                    } else {
                        echo "<script>alert('Failed to delete account');</script>";
                    }
                }
            } else {
                echo "You are not logged in.";
            }
        ?>
    </div>
</body>
</html>
