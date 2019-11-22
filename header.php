<?php
session_start();
include 'koneksi.php';
if (isset($_GET['message'])) {
    $msg = $_GET['message'];
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
if (isset($_SESSION['uid'])) {
    //menghitung banyaknya isi/qty cart
    $sql = mysqli_query($konek, "SELECT SUM(jumlah) as qty FROM cart_temp WHERE user_id='$_SESSION[uid]'");
    $data = mysqli_fetch_assoc($sql);
}
if (isset($_SESSION['level']))
    $level = $_SESSION['level'];
else $level = '';
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
        <?php if (isset($_SESSION['login'])) :
            switch ($level) {
                case 'heroes':?>
                    <ul class="navbar">
                    <li><a href="shop.php" title="Shop">Shop</a></li>
                    <li><a href="order_list.php" title="Order List">Order List</a></li>
                    <li><a href="addproduct.php" title="Add Product">Add Product</a></li>
                    <li><a href="logout.php" title="Logout">Logout</a></li>
                </ul>
                <?php
                    break;
                default:
                    ?>

                    <ul class="navbar">
                        <li><a href="shop.php" title="Shop">Shop</a></li>
                        <li>
                            <a href="cart.php" title="Cart">Cart</a>
                            <?php error_reporting(1); if ($data['qty'] > 0) { ?>
                                <p class="cart-nav" style="">
                                    <?php echo $data['qty'] ?>
                                </p>
                            <?php } ?>
                        </li>
                        <li><a href="profile.php" title="Account">Account</a></li>
                        <li><a href="logout.php" title="Logout">Logout</a></li>
                    </ul>

                <?php break;
                } else : ?>
                <ul class="navbar">
                    <li><a href="shop.php" title="Shop">Shop</a></li>
                    <li><a href="login.php" title="Login">Login</a></li>
                </ul>

            <?php endif; ?>
    </div>