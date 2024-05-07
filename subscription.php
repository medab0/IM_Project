<?php
    include 'connect.php';
            
    ?>
<link rel="stylesheet" href="css/style_product_renew.css">

<title>Coffee</title>


<div class="rounded-box">


    <div class="topnav">
        <a class="active" href="index.php">Home</a>
        <a href="prod">News</a>
        <a href="#products">Products</a>
        <a href="#about">About</a>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">
        <div class="more-container">
        <!-- onclick="myFunction(this)" removed -->
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        </span>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="login_renew.php">Login</a>
            <a href="signup_renew.php">Sign Up</a>
            <a href="#">Contact Us</a>
            <!-- <a href="#">Contact</a> -->
        </div>
    </div>





<div class="coffee-container">


<?php

    // Query to fetch all coffee products
    $sql = "SELECT * FROM tblsubscriptionplan";
    $result = mysqli_query($connection, $sql);

    // Loop through each coffee product and display it in a div
    while($row = mysqli_fetch_assoc($result)) {
        $plan_id = $row['Plan_ID'];
        $plan_name = $row['Plan_Name'];
        $plan_price = $row['Price_Per_Month'];

        echo "<div class='coffee-product'>";
        echo "<h2>$plan_name</h2>";
        echo "<p>Price: $$plan_price per bag</p>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='plan_id' value='$plan_id'>";
        echo "<button type='submit' name='add_to_cart' value='$plan_id'>Add to Cart</button>";
        echo "</form>";
        echo "</div>";
    }

    // Handle adding subscription to cart
    if(isset($_POST['add_to_cart'])) {
        $plan_id = $_POST['plan_id'];
        $account_ID = $_SESSION['id'];

        // Check if the user already has a subscription for the selected plan
        $check_sql = "SELECT * FROM tblsubscription WHERE account_ID = ? AND plan_ID = ?";
        $check_stmt = mysqli_prepare($connection, $check_sql);
        mysqli_stmt_bind_param($check_stmt, 'ii', $account_ID, $plan_id);
        mysqli_stmt_execute($check_stmt);
        $existing_subscription = mysqli_stmt_get_result($check_stmt);

        if(mysqli_num_rows($existing_subscription) > 0) {
            // If the user already has a subscription for the selected plan, notify the user
            echo "<script>alert('You already have a subscription for this plan.');</script>";
        } else {
            // If the user doesn't have a subscription for the selected plan, add it to the cart
            $insert_sql = "INSERT INTO tblsubscription (account_ID, plan_ID) VALUES (?, ?)";
            $insert_stmt = mysqli_prepare($connection, $insert_sql);
            mysqli_stmt_bind_param($insert_stmt, 'ii', $account_ID, $plan_id);

            if(mysqli_stmt_execute($insert_stmt)) {
                // Subscription added successfully
                echo "<script>alert('Subscription added to cart');</script>";
            } else {
                // Error handling
                echo "<script>alert('Failed to add subscription to cart');</script>";
            }

            mysqli_stmt_close($insert_stmt);
        }

        mysqli_stmt_close($check_stmt);
    }
?>  

</div>




<script>
    function myFunction(x) {
      x.classList.toggle("change");
    }
    
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
</script>