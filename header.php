<?php
session_start();
include 'koneksi.php';
?>

<html>

<head>
    <link rel="stylesheet" href="css/index.css">
    <title>illegal</title>
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="shop.php" title="illegal">i l l e g a l</a>
        </div>
        <?php if (isset($_SESSION['login'])) : ?>
            
                <ul class="navbar">
                    <li><a href="shop.php" title="Shop">Shop</a></li>
                    <li><a href="cart.php" title="Cart">Cart</a></li>
                    <li><a href="profile.php" title="Account">Account</a></li>
                    <li><a href="logout.php" title="Logout">Logout</a></li>
                </ul>
            
        <?php else : ?>
            <ul class="navbar">
                <li><a href="shop.php" title="Shop">Shop</a></li>
                <li><a href="login.php" title="Login">Login</a></li>
            </ul>
    
<?php endif; ?>
</div>