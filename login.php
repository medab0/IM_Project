<link rel="stylesheet" href="css/style_login_renew.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<title>Login</title>
<div class="rounded-box">
        <div class="image-container">
            <img src="images/Logo with Background.png" alt="Logo">
        </div>
        <div class="form-container">
            <h2>Login</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" placeholder="Enter your username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Enter your password"  name="password" required>
                </div>
                <button type="submit" class="btnLogin" name="submit" value="Login">Login</button>
            </form>
            <div class="line"></div>
        <div class="alternative-register">
            <p> or login with </p>
        </div>
            <div class="icon-container">
                <img src="images/google-logo.svg" class="icon" alt="Google">
                <img src="images/fb-logo.svg" class="icon" alt="Facebook">
                <img src="images/outlook-logo.svg" class="icon" alt="Outlook">
            </div>
            <p class="register-redirect"> Don't have an account? Sign up <a href="signup.php">here.</a></p>
        </div>
        
        </div>
</div>

<?php
    include 'connect.php';

    if(isset($_POST["submit"])) {
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
    
        //Check if email or password is filled
        if(empty($username) || empty($password)) {
            echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "You did not fill in all fields",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            </script>';
        } else{
            $result = mysqli_query($connection, "SELECT * FROM tbluseraccount WHERE username='$username'");
            $row = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) > 0) {
                if($password == $row["password"]) {
                    $_SESSION['login'] = true;
                    $_SESSION['id'] = $row["acctID"];
                    //$_SESSION['userID'] = $row['acctID'];
                    header("Location: user-profile.php");
                } else {
                    // Invalid password
                    echo '<script>
                        Swal.fire({
                            title: "Error!",
                            text: "Invalid password",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    </script>';
                }
            } else {
                // Invalid Username
                echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "User not registered",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                </script>';
            }
        }
    }
?>