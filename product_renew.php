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

    include 'connect.php';
    // Query to fetch all coffee products
    $sql = "SELECT * FROM tblcoffee";
    $result = mysqli_query($connection, $sql);

    // Loop through each coffee product and display it in a div
    while($row = mysqli_fetch_assoc($result)) {
        $coffee_id = $row['Coffee_ID'];
        $coffee_name = $row['Coffee_Name'];
        $price_per_bag = $row['Price_Per_Bag'];

        echo "<div class='coffee-product'>";
        echo "<h2>$coffee_name</h2>";
        echo "<p>Price: $$price_per_bag per bag</p>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='coffee_id' value='$coffee_id'>";
        echo "<button type='submit' name='add_to_cart_$coffee_id' value='$coffee_id'>Add to Cart</button>";
        echo "</form>";
        echo "</div>";
    }

     // Handle adding coffee to cart
     foreach ($_POST as $key => $value) {
        if (strpos($key, 'add_to_cart_') === 0) {
            $coffee_id = substr($key, strlen('add_to_cart_'));
            $customer_ID = $_SESSION['id'];

            // Check if the coffee is already in the cart for the customer
            $check_sql = "SELECT * FROM tblorder WHERE Customer_ID = ? AND Coffee_ID = ?";
            $check_stmt = mysqli_prepare($connection, $check_sql);
            mysqli_stmt_bind_param($check_stmt, 'ii', $customer_ID, $coffee_id);
            mysqli_stmt_execute($check_stmt);
            $existing_order = mysqli_stmt_get_result($check_stmt);

            if(mysqli_num_rows($existing_order) > 0) {
                // If the coffee is already in the cart, update the quantity
                $row = mysqli_fetch_assoc($existing_order);
                $order_ID = $row['Order_ID'];
                $quantity = $row['Quantity'] + 1;

                $update_sql = "UPDATE tblorder SET Quantity = ? WHERE Order_ID = ?";
                $update_stmt = mysqli_prepare($connection, $update_sql);
                mysqli_stmt_bind_param($update_stmt, 'ii', $quantity, $order_ID);
                mysqli_stmt_execute($update_stmt);

                // Notify the user that the quantity has been updated
                echo "<script>alert('Quantity updated in cart');</script>";
            } else {
                // If the coffee is not in the cart, add it to the cart
                $get_price_sql = "SELECT Price_Per_Bag FROM tblcoffee WHERE Coffee_ID = ?";
                $get_price_stmt = mysqli_prepare($connection, $get_price_sql);
                mysqli_stmt_bind_param($get_price_stmt, 'i', $coffee_id);
                mysqli_stmt_execute($get_price_stmt);
                $price_result = mysqli_stmt_get_result($get_price_stmt);
                $price_row = mysqli_fetch_assoc($price_result);
                $price_per_bag = $price_row['Price_Per_Bag'];

                $insert_sql = "INSERT INTO tblorder (Customer_ID, Coffee_ID, Quantity, Total_Price) VALUES (?, ?, 1, ?)";
                $insert_stmt = mysqli_prepare($connection, $insert_sql);
                mysqli_stmt_bind_param($insert_stmt, 'iid', $customer_ID, $coffee_id, $price_per_bag);
                
                if(mysqli_stmt_execute($insert_stmt)) {
                    // Coffee added to cart successfully
                    echo "<script>alert('Coffee added to cart');</script>";
                } else {
                    // Error handling
                    echo "<script>alert('Failed to add coffee to cart');</script>";
                }

                mysqli_stmt_close($insert_stmt);
            }

            mysqli_stmt_close($check_stmt);
        }
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