<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Insert Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    <!-- Maid CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/app.css" />
    <!-- Navbar -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/navbar.css" />
    <!-- Dashboard CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="../../css/dashboard/dashboard.css" />


</head>

<body>
    <!-- Navbar Section -->
    <div>
        <?php
        include_once "../../navbar.php";
        ?>
    </div>
    <div class="app">
        <!-- header -->
        <?php
        include_once "../dashboard/shared/header.php"
        ?>
        <div class="app-body">
            <!-- Side Bar -->
            <?php
            include_once "../dashboard/shared/ASide.php"
            ?>

            <div>
                <h2 style="text-align: center;">Insert New Product</h2>
                <!-- <form action="database/insert/insert_product.php" method="POST"> -->
                <form action="../../database/insert/insert_product.php" method="POST">
                    <label for="name">Product Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="category">Category:</label>
                    <input type="text" id="category" name="category" required>

                    <label for="price">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>

                    <label for="image">Image URL:</label>
                    <input type="text" id="image" name="image" required>

                    <input type="submit" value="Insert Product">
                </form>
            </div>
            <!-- New Payment -->
            <?php
            include_once "../dashboard/shared/aRightSide.php"
            ?>
        </div>
    </div>

</body>

</html>