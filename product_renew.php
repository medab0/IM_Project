<link rel="stylesheet" href="css/style_product_renew.css">

    <title>Navbar Example</title>

        

    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
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