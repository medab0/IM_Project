<?php
include 'connect.php'; // Make sure to include your database connection file

// Check if product, description, and price parameters are set in the URL
if(isset($_GET["product"]) && isset($_GET["description"]) && isset($_GET["price"])) {
    // Retrieve product, description, and price from the URL parameters
    $product = $_GET["product"];
    $description = $_GET["description"];
    $price = $_GET["price"];

    // Insert the product information into the database
    $sql = "INSERT INTO tblsubscriptionplan (Plan_Name, Description, Price_Per_Month) VALUES ('$product', '$description', '$price')";
    if ($connection->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>


<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>C.C.C | Subscription Plans</title>

	<!-- Site Icon -->
	<link rel="shortcut Icon" type="images/png" href="images/favicon.png">

	<!-- Font Awesome Icons -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->

	<!-- Custom CSS -->
	<link href="css/style4.css" rel="stylesheet">

</head>
<body id="page-top">

	<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger" href="#page-top">
				<img src="images/Logo without Background.png">
			</a>
		</div>
		
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto my-2 my-lg-0">
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="index.php">Home</a>
				</li>

				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="About Us.php">About</a>
				</li>

				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="product.php">Products</a>
				</li>

				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="Contact.Us">Contact</a>
				</li>

				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="login.php">Login</a>
				</li>

				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="register.php">Register</a>
				</li>
			</ul>


			
		</div>

	</nav>

	<header class="page-section masthead2">
		<div class="container h-50">
			<h1 class="section-header text-white font-weight-bold">Subscription Plans</h1>
			<p class="main-menu text-white-75 font-weight-light mb-5"><a class="link-menu" href="product.php">Coffee Conoisseur's Club > <span style="color:white;">Subscription Plans</span></a></p>
			
		</div>
		
	</header>

	<section class="page-section">
		<div class="container">
			<div class="row">


				<div class="col-lg-9" style="padding-left: 30px;">
					<div class="row">
						<div class="col">
							Showing all 9 results
						</div>

						<div class="col">
							<select class="form-control">
								<option value="">Default Sorting</option>
								<option value="popularity">Sorting by popularity</option>
								<option value="average">Sorting by average</option>
								<option value="latest">Sorting by latest</option>
								<option value="low">Sorting by low</option>
								<option value="high">Sorting by high</option>
							</select>
						</div>

					</div>
					<!-- Sorting by <div class="row"> -->
					<div>&nbsp;</div>
					<div>&nbsp;</div>

					<div class="row">
						<div class="col-sm-3 col-md-6 col-lg-4">
							<div class="card">
								<div class="card-body text-center">
									<img src="images/coffee_item2.jpg" class="product-image">
									<h5 class="card-title"><b>Light Roast Club</b></h5>
									<p class="card-text small">With supporting text below as a natural lead-in to additional content.</p>
									<p class="tags">Price $25.16</p>
									<a href="order.php?product=Light%20Roast%20Club&description=Monthly%20delivery%20of%20light%20roast%20coffee%20beans.&price=25.16" class="btn btn-success button-text"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Subscribe</a>

							</div>
						</div>

						<div class="col-sm-3 col-md-6 col-lg-4">
							<div class="card">
								<div class="card-body text-center">
									<img src="images/coffee_item2.jpg" class="product-image">
									<h5 class="card-title"><b>Medium Roast Club</b></h5>
									<p class="card-text small">With supporting text below as a natural lead-in to additional content.</p>
									<p class="tags">Price $16</p>
									<a href="order.php?product=Medium%20Roast%20Club&description=Monthly%20delivery%20of%20medium%20roast%20coffee%20beans&price=16.00" class="btn btn-success button-text"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Subscribe</a>
								</div>
							</div>
						</div>

						<div class="col-sm-3 col-md-6 col-lg-4">
							<div class="card">
								<div class="card-body text-center">
									<img src="images/coffee_item3.jpg" class="product-image">
									<h5 class="card-title"><b>Dark Roast Club</b></h5>
									<p class="card-text small">With supporting text below as a natural lead-in to additional content.</p>
									<p class="tags">Price $20</p>
									<a href="order.php?product=Dark%20Roast%20Club&description=Monthly%20delivery%20of%20dark%20roast%20coffee%20beans&price=20.00" class="btn btn-success button-text"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Subscribe</a>
								</div>
							</div>
						</div>

					</div>
					<!-- Sorting by <div class="row"> -->

					

					</div>
					<!-- Sorting by <div class="row"> -->



				</div>
				<!--END  <div class="col-lg-9">-->

			</div>
		</div>
	</section>


	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	
	<div class="row">
		<div class="col-lg-12">
			<div class="row boxed">
				<div class="col-lg-3 mt-4">
					<h2 class="news" style="color:white;"><b>Subscribe</b></h2>
					<h2 class="news" style="color:#242424;"><b>Weekly Newsletter</b></h2>
				</div>

				<div class="col-lg-5 mt-5 text-center">
					<form class="form-inline">
						<div class="form-group mx-sm-3 mb-2">
							<label for="inputEmail" class="sr-only">Your Email Address</label>
							<input type="email" class="form-control form-control-lg" id="inputEmail" placeholder="Your Email Address">
						</div>
						<button type="submit" class="btn btn-dark btn-lg">Subscribe</button>
					</form>
				</div>

				<div class="col-lg-4 mt-5">
					<a href="#" class="social-icon"><i class="fa fa-facebook-f"></i></a>
					<a href="#" class="social-icon"><i class="fa fa-twitter"></i></a>
					<a href="#" class="social-icon"><i class="fa fa-instagram"></i></a>
					<a href="#" class="social-icon"><i class="fa fa-google-plus"></i></a>
				</div>

			</div>
		</div>
	</div>

	<section class="page-section subscribe-section">
		<div class="container">
			<div class="row">

				<div class="col-lg-4">
					<p class="logo-text-white">Add captions to your slides easily with the .carousel-caption element within any .carousel-item. They can be easily hidden on smaller viewports, as shown below, with optional display utilities. </p>
				</div>

				<div class="col-lg-4">
					<h3 class="contact-heading">EXPLORE</h3>
					<div class="row">
						<div class="col-lg-6">
							<p><a class="explore-link" href="home.html"> > <b>Home</b></a></p>
							<p><a class="explore-link" href="contact.html"> > <b>Contact Us</b></a></p>
							<p><a class="explore-link" href="#"> > <b>Products</b></a></p>
						</div>

						<div class="col-lg-6">
							<p><a class="explore-link" href="#"> > <b>Blog</b></a></p>
							<p><a class="explore-link" href="about.html"> > <b>About Us</b></a></p>
							<p><a class="explore-link" href="gallery.html"> > <b>Gallery</b></a></p>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<h3 class="contact-heading">CONTACT US</h3>
					<p class="contact-info"><i class="fa fa-map-marker"></i>  ...</p>
					<p class="contact-info"><i class="fa fa-phone"></i>...</p>
					<p class="contact-info"><i class="fa fa-envelope"></i>  ...</p>
					<p class="contact-info"><i class="fa fa-globe"></i> ..</p>
				</div>

			</div>
		</div>
	</section>

	<footer class="footer-info pt-5 py-4">
		<div class="container">
			<div class="small text-center text-muted">
				<span class="footer-title">...</span> <span class="copyright">&copy; All Right Reserved 2021</span>
			</div>

			<a class="scroll-to-top rounded" href="#page-top">
				<span class="fa fa-angle-up"><br>TOP</span>
			</a>

		</div>
	</footer>


	<!-- Bootstrap JavaScript
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	 -->

</body>

<?php
// if(isset($_POST["submit"])) {
//     $username = trim($_POST["username"]);
//     $password = trim($_POST["password"]);

//     //Check if email or password is filled
//     if(empty($username) || empty($password)) {
//         echo '<script>
//             Swal.fire({
//                 title: "Error!",
//                 text: "You did not fill in all fields",
//                 icon: "error",
//                 confirmButtonText: "OK"
//             });
//         </script>';
//     } else{
//         $result = mysqli_query($connection, "SELECT * FROM tbluseraccount WHERE username='$username'");
//         $row = mysqli_fetch_assoc($result);
//         if(mysqli_num_rows($result) > 0) {
//             if($password == $row["password"]) {
//                 $_SESSION['login'] = true;
//                 $_SESSION['id'] = $row["acctID"];
//                 //$_SESSION['userID'] = $row['acctID'];
//                 header("Location: user.php");
//             } else {
//                 // Invalid password
//                 echo '<script>
//                     Swal.fire({
//                         title: "Error!",
//                         text: "Invalid password",
//                         icon: "error",
//                         confirmButtonText: "OK"
//                     });
//                 </script>';
//             }
//         } else {
//             // Invalid Username
//             echo '<script>
//                 Swal.fire({
//                     title: "Error!",
//                     text: "User not registered",
//                     icon: "error",
//                     confirmButtonText: "OK"
//                 });
//             </script>';
//         }
//     }
// }
?>

