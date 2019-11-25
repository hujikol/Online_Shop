<?php
include 'header.php';
if (isset($_POST['productid'])) {
    $productid = $_POST['productid'];
}
$sql = mysqli_query($konek, "SELECT * FROM product WHERE product_id='$productid'");
$data = mysqli_fetch_array($sql);
?>
<section class="container">
    <a href="shop.php" class="btn">
        < Back</a> <br><br><br>
            <form action="cart-con.php?con=update-product" method="POST">
                <table>
                    <tr>
                        <td>
                            <div>
                                <img class="product-img" title="<?= $data['product_name'] ?>" src="images/<?= $data['gambar'] ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nama_produk">Nama Produk</label><br>
                            <input class="input" type="text" name="nama_produk" value="<?= $data['product_name'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="harga">Harga Produk</label><br>
                            <input class="input" type="text" name="harga_produk" placeholder="Rp" value="<?= $data['harga'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="productid" value="<?= $productid ?>">
                            <input class="btn" style="width:100px;" type="submit" name="simpan" value="Update">
                        </td>
            </form>
            <td>
                <form method="POST" action="cart-con.php?con=deleteproduct">
                    <input type="submit" class="btn" style="width:140px;height:40px;" name="deleteproduct" value="Delete Product" />
                    <input type="hidden" name="productid" value="<?= $productid ?>">
                </form>
            </td>
            </tr>

            </table>


</section>