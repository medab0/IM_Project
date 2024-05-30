<?php
include 'connect.php';
?>

<title>Order</title>

<link rel="stylesheet" href="css/style_order.css">

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
    <h2>Subscriptions</h2>
    <table>
        <thead>
        <tr>
            <th>Subscription ID</th>
            <th>Plan Name</th>
            <th>Price Per Month</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Query to fetch the user's subscriptions
        $sql = "SELECT tblsubscription.subscription_ID, tblsubscription.plan_ID, tblsubscriptionplan.Plan_Name, tblsubscriptionplan.Price_Per_Month
                    FROM tblsubscription
                    INNER JOIN tblsubscriptionplan ON tblsubscription.plan_ID = tblsubscriptionplan.Plan_ID
                    WHERE tblsubscription.account_ID = {$_SESSION['id']}";
        $result = mysqli_query($connection, $sql);

        // Loop through each subscription and display it in a table row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>". $row['subscription_ID']. "</td>";
            echo "<td>". $row['Plan_Name']. "</td>";
            echo "<td>". $row['Price_Per_Month']. "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <h2>Coffee Orders</h2>
    <table>
        <thead>
        <tr>
            <th>Coffee ID</th>
            <th>Coffee Name</th>
            <th>Quantity</th>
            <th>Price Per Bag</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Query to fetch the user's coffee orders
        $sql = "SELECT tblorder.coffee_ID, tblcoffee.Coffee_Name, tblorder.Quantity, tblcoffee.Price_Per_Bag
                    FROM tblorder
                    INNER JOIN tblcoffee ON tblorder.Coffee_ID = tblcoffee.Coffee_ID
                    WHERE tblorder.Customer_ID= {$_SESSION['id']}";
        $result = mysqli_query($connection, $sql);

        // Loop through each coffee order and display it in a table row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>". $row['coffee_ID']. "</td>";
            echo "<td>". $row['Coffee_Name']. "</td>";
            echo "<td>". $row['Quantity']. "</td>";
            echo "<td>". $row['Price_Per_Bag']. "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>