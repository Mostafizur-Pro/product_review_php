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

// Fetch product details based on the provided product ID
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            echo "Product not found";
            exit;
        }
    } else {
        echo "Error fetching product details: " . $stmt->error;
        exit;
    }

    $stmt->close();
} else {
    echo "Product ID not provided";
    exit;
}

$sql_reviews = "SELECT * FROM submit_review WHERE product_id = ?";
$stmt_reviews = $conn->prepare($sql_reviews);
$stmt_reviews->bind_param("i", $product_id);

if ($stmt_reviews->execute()) {
    $result_reviews = $stmt_reviews->get_result();
    $reviews = $result_reviews->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Error fetching reviews: " . $stmt_reviews->error;
}

// Handle form submission for adding reviews
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_review'])) {
        // Validate and sanitize input
        $user_id = '01'; // Replace with actual user ID logic
        $rating = $_POST['rating'];
        $comment = htmlspecialchars($_POST['comment']);
        $created_at = date('Y-m-d H:i:s'); // Current timestamp
        $updated_at = date('Y-m-d H:i:s'); // Current timestamp

        // Insert review into database
        $sql_insert_review = "INSERT INTO submit_review (product_id, user_id, rating, comment, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insert_review = $conn->prepare($sql_insert_review);

        if ($stmt_insert_review === false) {
            echo "Error preparing SQL statement: " . $conn->error;
            exit;
        }

        $stmt_insert_review->bind_param("iissss", $product_id, $user_id, $rating, $comment, $created_at, $updated_at);

        if ($stmt_insert_review->execute()) {
            // Redirect to the same page to refresh after adding the review
            header("Location: {$_SERVER['PHP_SELF']}?id=$product_id&review_added=true");
            exit;
        } else {
            echo "Error executing SQL statement: " . $stmt_insert_review->error;
        }

        $stmt_insert_review->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo isset($product['name']) ? htmlspecialchars($product['name']) : 'Product Details'; ?></title>
    <!-- Maid CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/app.css" />
    <!-- Product CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/product/product.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/product/singleProduct.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/product/review.css" />

    <!-- Navbar -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/navbar.css" />
    <!-- Footer -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/footer.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Navbar Section -->
    <div>
        <?php include_once "../../navbar.php"; ?>
    </div>

    <div class="container_body">
        <div class="container">
            <div class="imgBx">
                <img src="<?php echo isset($product['image']) ? htmlspecialchars($product['image']) : ''; ?>" alt="Product Image">
            </div>
            <div class="details">
                <div class="content">
                    <h2><?php echo isset($product['name']) ? htmlspecialchars($product['name']) : 'Product Name'; ?> <br>
                        <span><?php echo isset($product['category']) ? htmlspecialchars($product['category']) : 'Category Name'; ?></span>
                    </h2>
                    <p>
                        <?php echo isset($product['description']) ? htmlspecialchars($product['description']) : 'Product Description'; ?>
                    </p>
                    <p class="product-colors">Available Colors:
                        <span class="black active" data-color-primary="#000" data-color-sec="#212121" data-pic="https://github.com/anuzbvbmaniac/Responsive-Product-Card---CSS-ONLY/blob/master/assets/img/jordan_proto.png?raw=true"></span>
                        <span class="red" data-color-primary="#7E021C" data-color-sec="#bd072d" data-pic="https://github.com/anuzbvbmaniac/Responsive-Product-Card---CSS-ONLY/blob/master/assets/img/jordan_proto_red_black.png?raw=true"></span>
                        <span class="orange" data-color-primary="#CE5B39" data-color-sec="#F18557" data-pic="https://github.com/anuzbvbmaniac/Responsive-Product-Card---CSS-ONLY/blob/master/assets/img/jordan_proto_orange_black.png?raw=true"></span>
                    </p>
                    <h3>$<?php echo isset($product['price']) ? number_format($product['price'], 2) : '0.00'; ?></h3>
                    <button>Buy Now</button>
                </div>
            </div>
        </div>

    </div>


    <!-- Reviews Section -->
    <div class="reviews-section">
        <h2>Product Reviews</h2>
        <?php if (!empty($reviews)) : ?>
            <div class="reviews-list">
                <?php foreach ($reviews as $review) : ?>
                    <div class="review">
                        <h1>
                            <?php echo htmlspecialchars($review['comment']); ?>
                        </h1>
                        <div class="star-rating">
                            <?php
                            // Determine number of stars to show based on rating
                            $rating = intval($review['rating']);
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>'; // Full star
                                } else {
                                    echo '<i class="far fa-star"></i>'; // Empty star
                                }
                            }
                            ?>
                        </div>

                        <h1 class="review-date">
                            Posted On: <?php echo htmlspecialchars($review['created_at']); ?>
                        </h1>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No reviews yet.</p>
        <?php endif; ?>
    </div>
    <!-- End Reviews Section -->

    <!-- Review Form Section -->
    <div class="review-form">
        <h3>Add a Review</h3>
        <form method="POST" action="">
            <label for="rating">Rating:</label><br>
            <select id="rating" name="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Average</option>
                <option value="4">4 - Good</option>
                <option value="5">5 - Excellent</option>
            </select><br><br>

            <label for="comment">Your Review:</label><br>
            <textarea id="comment" name="comment" rows="4" required></textarea><br><br>

            <input type="submit" name="submit_review" value="Submit Review">
        </form>
    </div>
    <!-- End Review Form Section -->


    <div class="product-container ">
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

        $sql = "SELECT * FROM products LIMIT 3"; // Limit the query to fetch only 3 products
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



    <div>
        <?php include_once "../../footer.php"; ?>
    </div>

</body>

</html>