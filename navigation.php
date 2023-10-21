<?php
// Start the session if it's not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user']) && $_SESSION['usertype'] == 'p';
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">FVC | Friendstars Veterinary Clinic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <?php if (!$isLoggedIn) { ?>
                    <!-- Show Sign Up and Log In links when the user is not logged in -->
                    <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>
                <?php } else { ?>
                    <!-- Add additional navigation links for logged-in users -->
                    <li class="nav-item"><a class="nav-link" href="patient/index.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="cart.php"><i class="bi bi-cart3"></i> Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="orders.php"> Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Log Out</a></li>
                <?php } ?>
                <!-- Add other navigation links that apply to both cases here -->
            </ul>
        </div>
    </div>
</nav>