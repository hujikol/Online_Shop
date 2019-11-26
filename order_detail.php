<?php include 'header.php';

if (isset($_GET['con'])) {
    $oid = $_GET['con'];
    $sql = mysqli_query($konek, "SELECT o.product_id, o.ukuran, o.jumlah, o.harga, p.gambar, p.product_name 
           FROM order_detail o LEFT JOIN product p ON o.product_id=p.product_id WHERE order_id='$oid'");
}
?>
<div class="container">
    <a class="btn" style="width:100px;" href="order_list.php">
        < Back</a> <br><br><br>
            <div>Order Details</div><br>
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
                    Subtotal : Rp <?php echo number_format($subtotal, '0', ',', '.');
                    if(!empty($data['no_resi'])): ?>&emsp;&emsp;&emsp;&emsp;
                    Shipping Code : <?php echo $data['no_resi']; endif;?>
                </div>
            </div>
                   
</div> 
<?php if(empty($data['no_resi'])): ?>
            <div style="float:right;padding:40px;margin:40px 80px 0 0;">
                <form action="cart-con.php?con=input-resi" method="POST">
                    <img src="bukti/<?= $data['bukti']?>" alt="ATM Receipt" style="border:1px solid black;padding 6px;width:500px;height:650px">
                    <input type="hidden" name="order_id" value="<?php echo $data['order_id']; ?>">
                    <p>Click confirm to send shipping code and confirm the order has been paid.</p>
                    <input type="submit" name="confirm" value="Confirm" class="btn" style="width:120;">
                </form>
            </div>
                    <?php endif; ?>