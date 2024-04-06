<?php
    include 'connect.php';
?>

    <meta charset="UTF-8">
    <title>Registration</title>
        <link rel="stylesheet" href="css/style2.css">


    
    
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="txtfirstname" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="txtlastname" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="txtusername" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="txtemail" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="txtpassword" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
            <!--
          <input type="radio" name="txtgender" id="Male" value="Male">
          <label for="male"> Male </label>
          <input type="radio" name="txtgender" id="Female" value="Female">
          <label for="male"> Female </label>
          <input type="radio" name="txtgender" id="Others" value="Others">
          <label for="male"> Prefer not to say </label>
            
            <select name="txtgender" id="txtgender">
                <option selected disabled>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        
          <span class="gender-title">Gender</span>
          <div class="category" >
            <label for="Male">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="Female">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="Others">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
            -->
            <select name="txtgender" id="txtgender">
                <option selected disabled>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Prefer not to say</option>
            </select>
        </div>
        <div class="btnRegister" >
          <input type="submit" name="btnRegister" value="Register">
        </div>
      </form>
    </div>
  </div>


  <footer>
    <br/><br/>
    <p>Moriel Edgar Deandre Bien and Yoshinori Kyono Jr.</p>
    <p>BSCS - 03 & BSCS - 02</p>
  </footer>
  <?php	 
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
			//header("location: index.php");
		}else{
			echo "<script language='javascript'>
						alert('Username already existing');
				  </script>";
		}
			
		
	}
		

?>