<?php
    include 'connect.php';
    ?>
<title>Coffee</title>
<link rel="stylesheet" href="css/style_product_renew.css">


<link rel="stylesheet" href="css/style_navbar.css">
<script src="javascript/script.js"></script>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
    <a href="user-profile.php">Profile</a>
</div>
<div id="main">
    <button id="NavButton" class="openbtn" onclick="openNav()">&#9776;</button>
</div>




<div class="rounded-box">





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
