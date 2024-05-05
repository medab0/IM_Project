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
    echo "<button type='submit' name='add_to_cart' value='$plan_id'>Add to Cart</button>";
    echo "</div>";
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