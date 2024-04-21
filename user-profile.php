
<link rel="stylesheet" href="css/style_userprofile.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<title>User Profile</title>
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
    $sql = "SELECT u.userID, u.firstName, u.lastName, p.emailAdd, u.birthDate, s.subscription_ID, s.Plan_ID, r.Plan_Name
    FROM tbluserprofile u 
    INNER JOIN tbluseraccount p ON u.userID = p.acctID
    INNER JOIN tblsubscription s ON u.userID = s.account_ID
    INNER JOIN tblsubscriptionplan r ON s.plan_ID = r.Plan_ID
    WHERE u.userID = $userID";
    $result = mysqli_query($connection, $sql);

    if ($result->num_rows > 0) {
        // Fetch the user's first name
        $row = $result->fetch_assoc();

        echo "<div class='form-container'>";
                    echo "<h2 class='form-title'>Update Information</h2>";
                    echo "<form method='POST'>";

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
                    echo "<label for='plan'>Subscription Plan: </label>";
                    echo "<select name='plan'>";
        
                            $selectedPlan = $row['Plan_ID'];
                            echo '<option value="0" '. ($selectedPlan == 1? 'selected' : ''). '>No Plan  </option>';
                            echo '<option value="1" '. ($selectedPlan == 1? 'selected' : ''). '>1: Light  </option>';
                            echo '<option value="2" '. ($selectedPlan == 2? 'selected' : ''). '>2: Medium</option>';
                            echo '<option value="3" '. ($selectedPlan == 3? 'selected' : ''). '>3: Dark</option>';
                            echo "</select>";

                    echo "<input type='text' name='planName' placeholder='Plan Name' value='" . $row["Plan_Name"] . "' readonly>";
                    echo "</div>";
                    echo "<div class='content'>";
                    echo "<button type='submit' class='btnSubmit' name='update'>Update</button>";
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
        $plan = $_POST['plan'];
        // Update user information in the database
        $updateSql = "UPDATE tbluserprofile SET firstName='$firstName', lastName='$lastName', birthDate='$birthDate' WHERE userID='$userID'";
        $updateResult = mysqli_query($connection, $updateSql);
        if($updateResult) {
            // Update subscription plan in the database
            $updatePlanSql = "UPDATE tblsubscription SET plan_ID='$plan' WHERE account_ID='$userID'";
            $updatePlanResult = mysqli_query($connection, $updatePlanSql);
            if($updatePlanResult) {
                echo "<script>alert('Information updated successfully');</script>";
                // Refresh the page to reflect the updated information
                echo "<meta http-equiv='refresh' content='0'>";
            } else {
                echo "<script>alert('Failed to update subscription plan');</script>";
            }
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
    </div>

    <div class="lower-content">
        <div class="creator-container">
        <p>Moriel Edgar Deandre Bien and Yoshinori Kyono Jr.</p>
		<p>BSCS - 03 & BSCS - 02</p>
        </div>
    </div>
    
</div>

