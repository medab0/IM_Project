<link rel="stylesheet" href="css/style_register_renew.css">
<title>Register</title>
<div class="rounded-box">
    <div class="form-container">
    <h2 class ="form-title">Register</h2>
        <form class="forms">
                
                <div class="content">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Enter your First Name" required>
                </div>
                <div class="content">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" placeholder="Enter your Last Name" name="lastName" required>
                </div>
            
            
                <div class="content">
                    <label for="username">Username:</label>
                    <input type="text" id="username" placeholder="Enter your Username" name="username" required>
                </div>
                <div class="content">
                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Enter your Email Address" name="email" required>
                </div>
            
            
                <div class="content">
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Enter your Password" name="password" required>
                </div>
                <div class="content">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" placeholder="Confirm your Password" name="confirmPassword" required>
                </div>
            
            
                <div class="content">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            
            <button type="submit">Register</button>
        </form>
    </div>

    <div class="line"></div>
    <div class="alternative-register">
        <p> or sign up with </p>
</div>
    <div class="icon-container">
            <img src="images/google-logo.svg" class="icon" alt="Google">
            <img src="images/fb-logo.svg" class="icon" alt="Facebook">
            <img src="images/outlook-logo.svg" class="icon" alt="Outlook">
        </div>

</div>