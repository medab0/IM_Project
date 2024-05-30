
<link rel="stylesheet" href="css/style_userprofile.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>User Profile</title>

<script src="javascript/script.js"></script>
<link rel="stylesheet" href="css/style_navbar.css">

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
</div>
<div id="main">
    <button id="NavButton" class="openbtn" onclick="openNav()">&#9776;</button>
</div>

<div class="rounded-box">
    <div class="upper-content">
        <div class="image-container">
            <img src="images/Logo with Background.png" alt="Logo">
        </div>
        <div class="nav-container">
            
<?php
// Include the database connection file
include 'connect.php';

// Check if the user is logged in
if(isset($_SESSION['id'])) {
    $userID = $_SESSION['id']; // Get the user ID from the session

    // Query to fetch user details for the logged-in user
    $sql = "SELECT u.userID, u.firstName, u.lastName, p.emailAdd, u.birthDate, p.is_deleted
    FROM tbluserprofile u
    INNER JOIN tbluseraccount p ON u.acctID = p.acctID
    WHERE u.userID = $userID";
    $result = mysqli_query($connection, $sql);  

    if ($result->num_rows > 0) {
        // Fetch the user's first name
        $row = $result->fetch_assoc();

        echo "<div class='form-container'>";
                    echo "<h2 class='form-title'>User Information</h2>";
                    echo "<form method='POST' id='updateForm'>";

                    echo "<div class='content'>";
                    echo "<label for='firstName'>First Name: </label>";
                    echo "<input type='text' name='firstName' placeholder='First Name' value='" . $row["firstName"] . "' required>";
                    echo "</div>";

                    echo "<div class='content'>";
                    echo "<label for='lastName'>Last Name: </label>";
                    echo "<input type='text' name='lastName' placeholder='Last Name' value='" . $row["lastName"] . "' required>";
                    echo "</div>";
                    
                    echo "<div class='content'>";
                    echo "<label for='email'>Email: </label>";
                    echo "<input type='email' name='email' placeholder='Email Address' value='" . $row["emailAdd"] . "' required>";
                    echo "</div>";
                    
                    echo "<div class='content'>";
                    echo "<label for='birthDate'>Birth Date: </label>";
                    echo "<input type='date' name='birthDate' value='" . $row["birthDate"] . "' required>";
                    echo "</div>";

                    echo "<div class='content'>";
                    echo "<label for='isDeleted'>Status: </label>";
                    $status = $row["is_deleted"] == 0 ? "Active" : "Deactivated";
                    echo "<input type='text' name='isDeleted' value='" . $status . "' required readonly>";
                    echo "</div>";
                    
                     
                    echo "<div class='content'>";
                    echo "<button type='submit' class='btnSubmit' name='update' onclick='return confirmUpdate()'>Update</button>";

                    // JavaScript function for confirmation
                    echo "<script>";
                    echo "function confirmUpdate() {";
                    echo "    return confirm('Are you sure you want to update your information?');";
                    echo "}";
                    echo "</script>";

                    echo "<button type='submit' class='btnSignout' name='signout'>Sign Out</button>";
                    echo "<button type='submit' class='btnDelete' name='delete'>Delete Account</button>";
                    
                    echo "</div>";
                    
                    echo "</form>";
                    echo "</div>";

        
    } else {
        echo "User not found";
    }

    if(isset($_POST['update'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $birthDate = $_POST['birthDate'];
        // $status = $_POST['is_deleted'];

        // Update user information in the database
        echo $sqlUpdateUser = "UPDATE tbluseraccount SET emailAdd='$email' WHERE acctID=$userID";
        echo mysqli_query($connection, $sqlUpdateUser);
        // Update user profile information in the database
        echo $sqlUpdateProfile = "UPDATE tbluserprofile SET firstName='$firstName', lastName='$lastName', birthDate='$birthDate' WHERE userID=$userID";
        echo mysqli_query($connection, $sqlUpdateProfile);

        echo "<script>alert('Information updated successfully');</script>";
        // Refresh the page to reflect the updated information
        echo "<meta http-equiv='refresh' content='0'>"; 
        // Submit the form if confirmed

        

        
    }

    if(isset($_POST['delete'])) {
        // // Delete user account and related information from the database
        // $deleteSql1 = "DELETE FROM tbluserprofile WHERE userID='$userID'";
        // $deleteSql2 = "DELETE FROM tbluseraccount WHERE acctID='$userID'";
        // $deleteResult1 = mysqli_query($connection, $deleteSql1);
        // $deleteResult2 = mysqli_query($connection, $deleteSql2);
        // if($deleteResult1 && $deleteResult2) {
        //     // Log the user out and redirect to the homepage after deleting account
        //     session_destroy();
        //     header("Location: index.php");
        // } else {
        //     echo "<script>alert('Failed to delete account');</script>";
        // }

        // Update user information in the database
        
        $sqlUpdateUser = "UPDATE tbluseraccount SET is_deleted = 1 WHERE acctID=$userID";
        mysqli_query($connection, $sqlUpdateUser);
        echo "<script>alert('Account deleted successfully');</script>";
                // Refresh the page to reflect the updated information
        echo "<meta http-equiv='refresh' content='0'>";





    }



    if(isset($_POST['signout'])) {
        session_destroy();
        header("Location: index.php");
        exit;
    }

} else {
    echo "You are not logged in.";
}
?>
        </div>
    </div>

    <div class="lower-content">
        <div class="creator-container">
        <p>Moriel Edgar Deandre Bien and Yoshinori Kyono Jr.</p>
		<p>BSCS - 03 & BSCS - 02</p>
        </div>
    </div>
    
</div>

