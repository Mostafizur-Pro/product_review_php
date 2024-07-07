<?php
include_once 'database/db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<div class="container">
    <!-- Sidebar -->
    <?php
    include_once "components/product/leftSideCategory.php"
    ?>

    <!-- Main Content -->
    <div class="main-content">
        <?php

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<div class="product-image">';
                echo '<img src="' . $row["image"] . '" alt="Product Image">';
                echo '</div>';
                echo '<div class="product-details">';
                echo '<h1>' . $row["name"] . '</h1>';
                echo '<p class="price">$' . number_format($row["price"], 2) . '</p>';
                echo '<p class="description">' . $row["description"] . '</p>';
                echo '<button class="add-to-cart"><a href="/product_review/components/product/productById.php?id=' . $row["id"] . '" >See More</a></button>';
                
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>
</div>