<div class="product-container">
    <?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "products_db";

    // Create connection
    $conn = new mysqli($serverName, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if a category filter is set in the URL
    $category = isset($_GET['category']) ? $_GET['category'] : '';

    // Build the SQL query with or without category filter
    if (!empty($category)) {
        $sql = "SELECT * FROM products WHERE category = '$category' LIMIT 3";
    } else {
        $sql = "SELECT * FROM products LIMIT 3"; // Default query to fetch only 3 products
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-card">';
            echo '<div class="product-image">';
            echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="Product Image">';
            echo '</div>';
            echo '<div class="product-info">';
            echo '<h2 class="product-title">' . htmlspecialchars($row["name"]) . '</h2>';
            echo '<p class="product-description">' . htmlspecialchars($row["description"]) . '</p>';
            echo '<p class="product-price">$' . number_format($row["price"], 2) . '</p>';
            echo '<a href="product.php?id=' . $row["id"] . '" class="btn btn-view-details">View Details</a>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "No products found.";
    }

    // Close connection
    $conn->close();
    ?>
</div>

<div style="text-align: center; margin-top: 30px">
    <a href="/product_review/product.php" class="btn btn-view-details">See More</a>
</div>
