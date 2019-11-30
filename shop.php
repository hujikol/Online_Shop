<?php
include 'header.php';
include 'koneksi.php';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $sql = mysqli_query($konek, "SELECT * FROM product WHERE (product_name LIKE '%$keyword%') 
           OR (harga LIKE '%$keyword%') ");
} else {
    $sql = mysqli_query($konek, 'SELECT * FROM product');
}
if (isset($_SESSION['login'])) {
    $btn_command = 'cart-con.php?con=addtocart';
} else {
    $btn_command = 'login.php';
}
error_reporting(1);
if (isset($_SESSION['level'])) $lvl = $_SESSION['level']; //mengeset lvl atau privilege
if (isset($_SESSION['login'])) :
    ?>
    <!-- search bar akan muncul bila sudah login -->
    <div class="search" style="margin:6px 0 6px 80px;display:inline-block;">
        <form action="shop.php">
            <input name="keyword" class="input" type="text" placeholder="Name or Price of Product.." style="width:300px;">
            <input type="submit" class="btn" style="width:100px;" value="Search">
        </form>
    </div>
<?php endif; ?>
<div id="konten">
    <?php while ($data = mysqli_fetch_array($sql)) { ?>
        <div class="product-container">
            <!-- <table style="border:1px solid black;float:left;border-radius:12px;"> -->
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
                                Rp <?php echo number_format($data['harga'], '0', ',', '.'); ?>
                            </div>
                        </td>
                        <?php
                            if ($lvl === 'heroes') : ?>
                            <!-- jika admin maka keluar tombol edit product -->

                            <form action="edit_product.php" method="POST">
                                <td width="50px">
                                    <input type="submit" class="btn" style="width:70px;height:40px;" name="editproduct" value="Edit" />
                                </td>
                                <td width="0px"><input type="hidden" name="productid" value="<?= $data['product_id'] ?>"></td>
                            </form>
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
    <?php } ?>
</div>
</body>