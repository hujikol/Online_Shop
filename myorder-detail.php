<?php include 'header.php';

if (isset($_GET['con'])) {
    $oid = $_GET['con'];
    $sql = mysqli_query($konek, "SELECT o.product_id, o.ukuran, o.jumlah, o.harga, p.gambar, p.product_name FROM order_detail o LEFT JOIN product p ON o.product_id=p.product_id WHERE order_id='$oid'");
}
?>

<div class="side-nav">
    <ul>
        <li><a href="profile.php" title="Profile & Billing">Profile & Billing</li>
        <li><a href="myorder.php" title="Orders">Orders</li>
        <li><a href="logout.php" title="Logout">Logout</a></li>
    </ul>
</div>
<div class="container">
    <a class="btn" style="width:100px;" href="myorder.php">< Back</a> <br>
            <div>Your Order Details</div><br>
            <table>
                <tr>
                    <td style="padding-left:24px;"></td>
                    <td style="padding-left:24px;">Product Name</td>
                    <td style="padding-left:24px;">Size</td>
                    <td style="padding-left:24px;">Quantity</td>
                    <td style="padding-left:24px;">Price</td>
                </tr>
                <?php
                while ($data = mysqli_fetch_array($sql)) {
                    $subtotal += $data['harga'];
                    ?>
                    <tr>
                        <td>
                            <div>
                                <img style="width:100px;height:80px;" src="images/<?= $data['gambar'] ?>">
                            </div>
                        </td>
                        <td style="padding-left:24px;"><?php echo $data['product_name']; ?></td>
                        <td style="padding-left:24px;text-align:center;"><?php echo $data['size']; ?></td>
                        <td style="padding-left:24px;text-align:center;"><?php echo $data['jumlah']; ?></td>
                        <td style="padding-left:24px;"><?php echo "Rp " . $data['harga']; ?></td>
                    </tr>
                <?php }
                ?>
            </table>
            <div>
                -------------------------------------------------------------------------------------------
                <div style="margin:6px 0 6px 125px">
                    Subtotal <div style="margin:-18px 0 0px 280px"> Rp <?php echo $subtotal; ?>
                    </div>
                </div>
            </div>