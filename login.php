<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Maid CSS -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/app.css" />
    <!-- Navbar -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/navbar.css">
    <!-- Footer -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Login -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/login.css">
</head>

<body>
    <!-- Navbar Section -->
    <div class="">
        <?php include_once "navbar.php"; ?>
    </div>
    <div class="wrapper">
        <!-- Main Content Section -->
        <main>
            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            <form>
                <h3>Login Here</h3>
                <label for="username">Username</label>
                <input type="text" placeholder="Email or Phone" id="username">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password">
                <button>Log In</button>
                <div class="social">
                    <div class="go"><i class="fab fa-google"></i> Google</div>
                    <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
                </div>
            </form>
        </main>

        <!-- Footer Section -->
        <footer class="footer-section">
            <?php include_once "footer.php"; ?>
        </footer>
    </div>
</body>

</html>