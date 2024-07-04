<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- Maid CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />

    <!-- Navbar -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/navbar.css" />
    <!-- Footer -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/footer.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
     <!-- Navbar Section -->
     <div>
        <?php
        include_once "navbar.php";
        ?>
    </div>
    <!-- Home Page -->
    <div>
        <div>
            <?php
            include_once "components/contact/contactForm.php" ?>

        </div>
    </div>

    <!-- Footer Section -->

    <div>
        <?php
        include_once "footer.php";
        ?>
    </div>

</body>

</html>