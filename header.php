<?php
session_start();
require 'koneksi.php';
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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>illegal</title>

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="shop.php" title="illegal">i l l e g a l</a>
        </div>
        <?php if (isset($_SESSION['login'])) : ?>
            <ul class="navbar">
                <?php switch ($level) {
                        case 'heroes': ?>
                        <li><a href="shop.php" title="Shop">Shop</a></li>
                        <li><a href="order_list.php" title="Order List">Order List</a></li>
                        <li><a href="add_product.php" title="Add Product">Add Product</a></li>
                        <li><a href="logout.php" title="Logout">Logout</a></li>
            </ul>
        <?php
                break;
            default:
                ?>
            <li><a href="shop.php" title="Shop">Shop</a></li>
            <li>
                <a href="cart.php" title="Cart">Cart</a>
                <?php error_reporting(1);
                        if ($data['qty'] > 0) { ?>
                    <p class="cart-nav" style="">
                        <?php echo $data['qty'] ?>
                    </p>
                <?php } ?>
            </li>
            <li><a href="profile.php" title="Account">Account</a></li>
            <!-- search bar diganti ke admin untuk cari order/user -->
            <!-- <li><input id="keyword" class="input" style="text-align:center;width:170px;height:40px;" type="text" placeholder="Search Here" name="keyword"></li> -->
            </ul>

        <?php break;
        } else : ?>
        <ul class="navbar">
            <li><a href="shop.php" title="Shop">Shop</a></li>
            <li><a href="login.php" title="Login">Login</a></li>
        </ul>

    <?php endif; ?>
    </div>