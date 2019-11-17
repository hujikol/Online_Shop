<?php
session_start();
include 'koneksi.php';
if (isset($_GET['message'])) {
    $msg = $_GET['message'];
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if(isset($_SESSION['uid'])){
$sql = mysqli_query($konek, "SELECT SUM(jumlah) as qty FROM cart_temp WHERE user_id='$_SESSION[uid]'");
$data = mysqli_fetch_assoc($sql);}
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
                <li>
                    <a href="cart.php" title="Cart">Cart</a>
                    <?php if(!empty($sql)){?>
                    <p class="cart-nav" style="">
                        <?php echo $data['qty'] ?>
                    </p>
                    <?php } ?>
                </li>
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