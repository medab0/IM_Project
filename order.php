<?php
include 'connect.php'; // Make sure to include your database connection file

// Check if product, description, and price parameters are set in the URL
if(isset($_GET["product"]) && isset($_GET["description"]) && isset($_GET["price"])) {
    // Retrieve product, description, and price from the URL parameters
    $product = $_GET["product"];
    $description = $_GET["description"];
    $price = $_GET["price"];

    // Insert the subscription plan information into the database
    $sql = "INSERT INTO tblsubscriptionplan (Plan_Name, Description, Price_Per_Month) VALUES ('$product', '$description', '$price')";
    if ($connection->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h2 {
            color: #333;
        }
        p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order Confirmation</h2>
        <p>Thank you for subscribing to our coffee club! Your order details are as follows:</p>
        <ul>
            <li><strong>Product:</strong> <?php echo isset($_GET["product"]) ? $_GET["product"] : ""; ?></li>
            <li><strong>Description:</strong> <?php echo isset($_GET["description"]) ? $_GET["description"] : ""; ?></li>
            <li><strong>Price:</strong> $<?php echo isset($_GET["price"]) ? $_GET["price"] : ""; ?></li>
        </ul>
        <p>We appreciate your business!</p>
    </div>
</body>

