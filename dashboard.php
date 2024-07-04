<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Maid CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />
    <!-- Dashboard CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/dashboard/dashboard.css" />

    <!-- Navbar -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/navbar.css" />
   
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
            <?php include_once "components/dashboard/dashboard.php" ?>
        </div>
    </div>

  
</body>

</html>