<?php
include 'header.php';
if (isset($_SESSION['uid'])) {
    $userid = $_SESSION['uid'];
    $sql = mysqli_query($konek, "SELECT ct.size, ct.jumlah, p.* FROM cart_temp ct, product p WHERE ct.user_id='$userid' AND p.product_id=ct.product_id");
}
$subtotal = 0;
?>
<div id="header" style="margin:70px 0 0 180px;">
    <div style="float:left;">Shopping Cart</div>
    <div style="display:inline-block;margin: 2px 0 0 20px;">
        <!-- Mengosongkan cart -->
        <form action="cart-con.php?con=hapus_semua" method="POST">
            <input class="btn" style="width:100px;height:25px;padding:0;text-align:center;" type="submit" value="Empty Cart">
        </form>
    </div>
</div>
<div class="cart-preview">
    <table>
        <tr>
            <td style="padding-left:24px;"></td>
            <td style="padding-left:24px;">Product Name</td>
            <td style="padding-left:24px;">Size</td>
            <td style="padding-left:24px;">Quantity</td>
            <td style="padding-left:24px;">Price</td>
            <td style="padding-left:24px;">Action</td>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($sql)) {
            $subtotal += $data['harga'] * $data['jumlah'];
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
                <td style="padding-left:24px;"><?php echo "Rp ".number_format($data['harga'], '0', ',', '.'); ?></td>
                <td style="padding-left:24px;text-align:center;">
                    <!-- remove 1 product button -->
                    <form action="cart-con.php?con=remove" method="POST">
                        <input type="hidden" name="productid" value="<?= $data['product_id'] ?>">
                        <input class="btn" style="width:40px;" type="submit" value="x">
                    </form>
                </td>
            </tr>
        <?php }
        ?>
    </table>
    <div style="float:left;padding:0px 10px 0 0;">
        -------------------------------------------------------------------------------------------
        <div style="margin:6px 0 6px 125px">
            Subtotal <div style="margin:-18px 0 0px 280px"> Rp <?php echo number_format($subtotal, '0', ',', '.'); ?>
            </div>
            <!-- Check out button -->
            <form action="cart-con.php?con=checkout" method="POST">
                <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>">
                <input class="btn" style="width:170px;height:50px;padding:0;text-align:center;margin:20px 0 0 327px" type="submit" value="CheckOut ->">
            </form>

        </div>
        <!-- 
    keluarin gambar dari produk, 
    nama produk, size, 
    edit qty & delete 1 produk/ kosongkan cart,
    harga dan total harga,
    tombol chekout buat mindahin dari temp_cart ke order -> order_detail
-->