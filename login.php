<?php
    include 'connect.php';
    
    //session_start(); // Start the session to access session variables
?>

    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style3.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<div class="container">
    <div class="title">Login</div>
    <div class="content">
        <form method="POST">
            <div class="user-details">
                <div class="input-box">
                    <label class="details">Username</label>
                        <input type="username" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                </div>
                <div class="input-box">
                    <label class="details">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your pasword" required>
                </div>
            </div>
            <button type="submit" class="button" name="submit">Login</button>
        </form>
    </div>
</div>


<?php
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
                header("Location: user.php");
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
