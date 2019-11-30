<?php include 'header.php';

if (isset($_GET['con'])) {
    $oid = $_GET['con'];
    $sql = mysqli_query($konek, "SELECT o.product_id, o.ukuran, o.jumlah, o.harga, p.gambar, p.product_name 
    FROM order_detail o LEFT JOIN product p ON o.product_id=p.product_id WHERE order_id='$oid'");
}
?>
<div class="container">
    <a class="btn" style="width:100px;" href="myorder.php">
        < Back</a> <br><br><br>
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
                    error_reporting(1);
                    $subtotal += ($data['harga'] * $data['jumlah']);
                    ?>
                    <tr>
                        <td>
                            <div>
                                <img style="width:100px;height:80px;" src="images/<?= $data['gambar'] ?>">
                            </div>
                        </td>
                        <td style="padding-left:24px;"><?php echo $data['product_name']; ?></td>
                        <td style="padding-left:24px;text-align:center;"><?php echo $data['ukuran']; ?></td>
                        <td style="padding-left:24px;text-align:center;"><?php echo $data['jumlah']; ?></td>
                        <td style="padding-left:24px;"><?php echo "Rp " . number_format($data['harga'], '0', ',', '.'); ?></td>
                    </tr>
                <?php }
                $sql = mysqli_query($konek, "SELECT * FROM order_list WHERE order_id='$oid'");
                $data = mysqli_fetch_array($sql);
                ?>
            </table>
            <div>
                -------------------------------------------------------------------------------------------
                <div>
                    <b>Subtotal :</b> Rp
                    <?php echo number_format($subtotal, '0', ',', '.'); ?>
                    &emsp;&emsp;&emsp;&emsp;
                    <?php if (!empty($data['no_resi'])) : ?>
                        Shipping Code : <?php echo $data['no_resi'];
                                        else : ?>
                        <h2 style="border: 2px solid black;padding:6px">
                            <b>You Should Pay : </b>Rp <?php echo number_format($data['harga_unik'], '0', ',', '.'); ?>
                        </h2>
                    <?php endif; ?>
                </div>
            </div>
</div>
<!-- tombol upload bukti pembayaran akan keluar bila blm ada file yg diupload dan jika status ='Not Verified' -->
<?php if (empty($data['bukti']) && $data['status'] === 'Not Verified') : ?>

    <div style="float:right;padding:40px;margin:0 80px 0 0;">
        <h3>Upload Your ATM Receipt Here</h3>
        <p>Please note that you should transfer with the same nominal<br><i>(*including 3 digit unique number).</i></p>

        <form action="cart-con.php?con=upload-bukti" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="order_id" value="<?php echo $oid; ?>">
            <input type="file" name="bukti" class="input" accept="image/*" value="Choose Image" style="padding:8px;"><br>
            <input class="btn" type="submit" name="submit" value="Submit">
        </form>
    </div>
<?php endif; ?>
