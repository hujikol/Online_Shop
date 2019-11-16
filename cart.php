<?php
include 'header.php';
$userid = $_SESSION['uid'];
$sql = mysqli_query($konek, "SELECT * FROM cart_temp WHERE user_id='$userid'");
while($data=mysqli_fetch_array($sql)){
    echo $data['product_id'];
}
?>
<!-- 
    keluarin gambar dari produk, 
    nama produk, size, 
    edit qty & delete 1 produk/ kosongkan cart,
    harga dan total harga,
    tombol chekout buat mindahin dari temp_cart ke order -> order_detail
-->
<section>
    <div id="header" style="margin-left:80px">
        Shopping Cart
    </div>
    <table>
        <tr>
            <td></td>
            <td>Product Name</td>
            <td>Size</td>
            <td>Quantity</td>
            <td>Price</td>
        </tr>
        <?php
        while ($data = mysqli_fetch_assoc($sql)) {
            $pid = $data['product_id'];var_dump($pid);
            $produk = mysqli_query($konek, "SELECT * FROM product WHERE product_id='$pid'");
            $p = $produk['harga'];
            var_dump($p);
            ?>
            <tr>
                <td>
                    <div style="width:60px;height:70px;">
                        <img src="images/<?= $produk['gambar'] ?>">
                    </div>
                </td>
                <td><?php echo $produk['product_name']; ?></td>
                <td><?php echo $data['size']; ?></td>
                <td><form action="">
                    <input type="text" placeholder="<?= $data['jumlah']?>">
                </form>
                    
            </td>
            </tr>
        <?php }
        ?>
    </table>
</section>