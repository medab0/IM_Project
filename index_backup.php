<?php
    include 'connect.php';
?>
		<title>Coffee Connoisseur's Club</title>
        <link rel="stylesheet" href="css/style_index.css">
	
		<header>
            <div href="index.php" class = "img-wrap">
				<img src="images/Logo with Background.png" alt="Logo">
			</div>

			
		</header>
		<nav>
			<?php
                        if(empty($_SESSION['id'])) {
                            echo '
                            	<a href="register.php">Register</a>
								<br/><br/><br/><br/>
								<a href="login.php">Login</a>
								<br/><br/><br/><br/>
								<a href="About Us.php">About Us</a>
								<br/><br/><br/><br/>
								<a href="Contact Us.php">Contact Us</a>
								<br/>';
                        } else {
                            $id = $_SESSION['id'];
                            $result = mysqli_query($connection, "SELECT * FROM tbluseraccount WHERE acctid='$id'");
                            $row = mysqli_fetch_assoc($result);
                            echo ' Welcome ' . $row['username'] . '
							<br><br>
                            <a href="product.php">Product Page</a>
                            <a href="user.php">User Profile</a>
                            <a href="logout.php">Logout</a>';
                        }
            ?>
		</nav>
		
		<footer>
			<br/><br/>
			<p>Moriel Edgar Deandre Bien and Yoshinori Kyono Jr.</p>
			<p>BSCS - 03 & BSCS - 02</p>
		</footer>
	