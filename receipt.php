<?php
include 'header.php';
$uid = $_SESSION['uid'];
//memilih orderan terbaru user dari database
$sql = mysqli_query($konek, "SELECT * FROM order_list WHERE order_id=(SELECT MAX(order_id) FROM order_list WHERE user_id='$uid' GROUP BY user_id)");
$data = mysqli_fetch_array($sql);
?>
<div class="container">
    <h2 style="border:2px solid black;padding:6px;">You Should Pay : Rp <?php echo number_format($data['harga_unik'], '0', ',', '.'); ?></h2>
        <h3>Please Upload Your ATM Receipt to "Account > Orders > Order Detail" </h3>or Click 
            <a href="myorder-detail.php?con=<?= $data['order_id'] ?>"><u>Here</u></a>.
        <p>Please note that you should transfer with the same nominal<br><i>(*including 3 digit unique number).</i></p>
</div>