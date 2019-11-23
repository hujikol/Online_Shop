<?php include 'header.php';
include 'koneksi.php';

$sql = mysqli_query($konek, 'SELECT * FROM product') or die(mysqli_error($konek));
if (isset($_SESSION['login'])) {
    if (isset($_SESSION['level']) && $_SESSION['level'] === 'heroes')
        $btn_command = 'cart-con.php?message=deleteproduct';
    else
        $btn_command = 'cart-con.php?con=addtocart';
} else {
    $btn_command = 'login.php';
}
error_reporting(1);
if (isset($_SESSION['level'])) $lvl = $_SESSION['level'];
while ($data = mysqli_fetch_array($sql)) { ?>
    <div class="product-container">
        <!-- <table style="border:1px solid black;float:left;border-radius:12px;"> -->
        <div id="konten">
            <table>
                <tr>
                    <td colspan="2">
                        <div>
                            <img class="product-img" title="<?= $data['product_name'] ?>" src="images/<?= $data['gambar'] ?>">
                        </div>
                    </td>
                </tr>
                <div class="product-header">
                    <tr>
                        <td>
                            <div class="subcontent">
                                <?php echo $data['product_name'] ?><br>
                                Rp <?php echo $data['harga'] ?>
                            </div>
                        </td>
                        <?php
                            if ($lvl === 'heroes') : ?>
                            <!-- jika admin maka hanya keluar tombol delete product -->
                    <tr>
                        <td><input type="hidden" name="id_produk" value="<?= $data['product_id'] ?>"></td>
                    </tr>
                    <td>
                        <input class="btn" style="width:140px;height:40px;" type="submit" value="Delete Product">
                    </td>
                    </tr>
                <?php else : ?>
                    <td>
                        <div style="text-align:center;">
                            <form method="POST" action="<?= $btn_command ?>">
                                Size
                                <select name="size">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                        </div>
                    </td>
                    </tr>
                    <tr>
                        <td style="width:40px;">
                            <!-- <?php echo $data['product_name'] . "<br>"; ?> -->
                            <input type="hidden" name="productid" value="<?= $data['product_id'] ?>">
                            <input class="qty" type="number" name="quantity" placeholder="QTY" min="1" max="50">
                        </td>
                        <td>
                            <input class="btn" style="width:140px;" type="submit" value="Add to Cart">
                            </form>
                        </td>
                    </tr>
                <?php
                    endif;
                    ?>
                </div>
            </table>
        </div>
    </div>
<?php }

//include 'footer.php'; 
?>
</body>