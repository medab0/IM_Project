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
		//retrieve data from form and save the value to a variable
		//for tbluserprofile
		$fname=$_POST['txtfirstname'];		
		$lname=$_POST['txtlastname'];
		$gender=$_POST['txtgender'];
		
		//for tbluseraccount
		$email=$_POST['txtemail'];		
		$uname=$_POST['txtusername'];
		$pword=$_POST['txtpassword'];
		
		//save data to tbluserprofile			
		$sql1 ="Insert into tbluserprofile(firstname,lastname,gender) values('".$fname."','".$lname."','".$gender."')";
		mysqli_query($connection,$sql1);
		
		//Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
		$sql2 ="Select * from tbluseraccount where username='".$uname."'";
		$result = mysqli_query($connection,$sql2);
		$row = mysqli_num_rows($result);
		if($row == 0){
			$sql ="Insert into tbluseraccount(emailadd,username,password) values('".$email."','".$uname."','".$pword."')";
			mysqli_query($connection,$sql);
			echo "<script language='javascript'>
						alert('New record saved.');
				  </script>";
			header("location: login.php");
		}else{
			echo "<script language='javascript'>
						alert('Username already existing');
				  </script>";
		}
	}
?>
