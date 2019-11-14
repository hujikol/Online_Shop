<?php include 'header.php';
include 'koneksi.php';

$sql = mysqli_query($konek, 'select * from product') or die(mysqli_error($konek));
if (isset($_SESSION['login'])) {
    $btn_command = 'cart-con.php';
} else {
    $btn_command = 'login.php';
}


while ($data = mysqli_fetch_array($sql)) { ?>
    <div class="product-container">
        <!-- <table style="border:1px solid black;float:left;border-radius:12px;"> -->
        <table>
            <tr>
                <td colspan="2">
                    <div class="img-wrap">
                        <img class="product-img" title="<?= $data['product_name'] ?>" src="images/<?= $data['gambar'] ?>">
                        <p class="img-description">Rp <?= $data['harga'] ?></p>
                    </div>
                </td>
            </tr>

            <div class="product-header">
                <tr>
                    <td>
                        <!-- <?php echo $data['product_name'] . "<br>"; ?> -->
                        <form method="POST" action="<?= $btn_command ?>">
                            <input type="hidden" name="productid" value="<?= $data['product_id'] ?>">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['uid'] ?>">
                            <input class="qty" type="text" name="quantity" value="1">
                    </td>
                    <td>                       
                            <input class="btn" style="width:150px;" type="submit" value="Add to Cart"></<input>
                        </form>
                    </td>
                </tr>
                <!-- <tr>
                    <td>
                        <?php echo "Rp " . $data['harga'] . "<br>"; ?>
                    </td>

                </tr> -->
            </div>
        </table>
    </div>
<?php }

//include 'footer.php'; 
?>