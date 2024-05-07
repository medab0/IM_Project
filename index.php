
<link rel="stylesheet" href="css/style_index_renew.css">
<title>C.C.C</title>
<div class="rounded-box">
    <div class="upper-content">
        <div class="image-container">
            <img src="images/Logo with Background.png" alt="Logo">
        </div>
        <div class="nav-container">
            
            <?php
            include 'connect.php';
            // if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
            // if(isset($_SESSION['id']))
            if(isset($_SESSION['id'])){
            echo "<a href='user-profile.php'>User Profile</a>";
            echo "<a href='subscription.php'>Subscriptions</a>";
            echo "<a href='product_renew.php'>Coffee</a>";
            echo "<a href='order.php'>Cart</a>";
            }else{
                
                echo "<a href='signup.php'>Register</a>";
                echo "<a href='login.php'>Login</a>";
            }
            ?>
            <a href="Contact Us.php">Contact Us</a>
            <a href="report.php">Report</a>
        </div>
    </div>

    <div class="lower-content">
        <div class="creator-container">
        <p>Moriel Edgar Deandre Bien and Yoshinori Kyono Jr.</p>
		<p>BSCS - 03 & BSCS - 02</p>
        </div>
    </div>
    
</div>