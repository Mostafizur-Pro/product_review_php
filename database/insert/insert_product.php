<?php
$serverName = "localhost";
$username = "root";
$password = ""; // Set your own password if applicable
$dbname = "products_db";

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO products (name, category, price, description, image, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdssss", $name, $category, $price, $description, $image, $created_at, $updated_at);

    // Execute the statement
    if ($stmt->execute()) {
        // echo "New product inserted successfully";
        header("Location: /product_review/product.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
