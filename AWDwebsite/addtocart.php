<?php
// Check if data is sent in the request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"])) {
    $action = $_POST["action"];

    // Connect to the database
    $link = mysqli_connect("localhost", "root", "", "MYuserinfordb");

    // Check the connection
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if ($action == "add") {
        // Extract product information from the request
        $productName = $_POST['productName'];
        $price = $_POST['price'];

        // Insert the product into the database
        $sql = "INSERT INTO products (productName, price) VALUES ('$productName', '$price')";
        if (mysqli_query($link, $sql)) {
            echo "Product added to the cart successfully.";
        } else {
            echo "ERROR: Failed to add the product to the cart. " . mysqli_error($link);
        }
    } elseif ($action == "remove") {
        // Extract the product name to remove from the cart
        $productName = $_POST['productName'];

        // Delete the product from the database
        $sql = "DELETE FROM products WHERE productName='$productName'";
        if (mysqli_query($link, $sql)) {
            echo "Product removed from the cart successfully.";
        } else {
            echo "ERROR: Failed to remove the product from the cart. " . mysqli_error($link);
        }
    }

    // Close the connection
    mysqli_close($link);
}
?>