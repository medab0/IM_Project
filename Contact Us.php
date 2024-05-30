<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/style_contactus.css">
    <link rel="stylesheet" href="css/style_navbar.css">
    <script src="javascript/script.js"></script>

</head>

<body>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php">Home</a>
    <a href="user-profile.php">Profile</a>
</div>
<div id="main">
    <button id="NavButton" class="openbtn" onclick="openNav()">&#9776;</button>
</div>
<div class="rounded-box">


    <h2>Contact Information</h2>
    <table class="contact-table">
        <tr>
            <th>Contact Us Via</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>Email</td>
            <td>info@coffeeconnoisseursclub.com</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>(0999) 420 6969</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>R. Padilla St, Cebu City, 6000 Cebu</td>
        </tr>
    </table>
    <br/><br/>

    <div class="lower-content">
        <div class="creator-container">
            <p>Moriel Edgar Deandre Bien and Yoshinori Kyono Jr. <br>BSCS - 03 & BSCS - 02</p>

        </div>
    </div>
</div>
</body>
</html>