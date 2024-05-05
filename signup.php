<link rel="stylesheet" href="css/style_signup_renew.css">
<title>Sign Up</title>
<div class="rounded-box">
    <div class="form-container">
    <h2 class ="form-title">Sign Up</h2>
        <form action="#" method="post" class="forms">
                
                <div class="content">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="txtfirstname" placeholder="Enter your First Name" required>
                </div>
                <div class="content">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="txtlastname" placeholder="Enter your Last Name" name="lastName" required>
                </div>
            
            
                <div class="content">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="txtusername" placeholder="Enter your Username" name="username" required>
                </div>
                <div class="content">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="txtemail" placeholder="Enter your Email Address" name="email" required>
                </div>
            
            
                <div class="content">
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Enter your Password" name="password" required>
                </div>
                <div class="content">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" name="txtpassword" placeholder="Confirm your Password" name="confirmPassword" required>
                </div>
            
            
                <div class="content">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="txtgender" required>
                    <option value="" selected disabled hidden>Select your Gender</option>    
                    <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="content">
                    <label for="birthdate">Birth Date:</label>
                    <input type="date" id="birthdate" name="txtbirthdate" required>
                </div>
            
            <input type="submit" class="btnRegister" name="btnRegister" value="Sign Up"></button>
        </form>
        
    </div>

    <div class="line"></div>
    <div class="alternative-signup">
        <p> or sign up with </p>
    </div>
        <div class="icon-container">
            <img src="images/google-logo.svg" class="icon" alt="Google">
            <img src="images/fb-logo.svg" class="icon" alt="Facebook">
            <img src="images/outlook-logo.svg" class="icon" alt="Outlook">
        </div>
        <p class="login-redirect">Already have an account? Login <a href="login.php">here. </a></p>
    </div>


    <?php
include 'connect.php';

if(isset($_POST['btnRegister'])){		
    // Retrieve data from form
    $fname = $_POST['txtfirstname'];		
    $lname = $_POST['txtlastname'];
    $gender = $_POST['txtgender'];		
    $email = $_POST['txtemail'];		
    $uname = $_POST['txtusername'];
    $pword = $_POST['txtpassword'];
    $bdate = $_POST['txtbirthdate'];
	
    // Save data to tbluseraccount
    $sqlCheckUsername = "SELECT * FROM tbluseraccount WHERE username='".$uname."'";
    $resultCheckUsername = mysqli_query($connection, $sqlCheckUsername);
    $rowCheckUsername = mysqli_num_rows($resultCheckUsername);

    if($rowCheckUsername == 0){
        // Insert into tbluseraccount
        $sqlInsertUser = "INSERT INTO tbluseraccount (emailadd, username, password) VALUES ('".$email."', '".$uname."', '".$pword."')";
        mysqli_query($connection, $sqlInsertUser);

        // Get the generated acctID
        $last_acctID = mysqli_insert_id($connection);

        // Insert into tbluserprofile with the fetched acctID
        $sqlInsertProfile = "INSERT INTO tbluserprofile (acctID, firstname, lastname, gender, birthdate) VALUES ('".$last_acctID."', '".$fname."', '".$lname."', '".$gender."', '".$bdate."')";
        mysqli_query($connection, $sqlInsertProfile);

        echo "<script language='javascript'>
                    alert('New record saved.');
              </script>";
        header("location: login.php");
    } else {
        echo "<script language='javascript'>
                    alert('Username already exists');
              </script>";
    }
}
?>
