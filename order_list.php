<?php
include 'header.php';
include 'koneksi.php';

$sql = mysqli_query($konek, "SELECT ol.user_id, ol.order_id, ol.status, ol.total_harga, SUM(od.jumlah) AS qty 
           FROM order_list ol LEFT JOIN order_detail od ON ol.order_id = od.order_id GROUP BY order_id");

?>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
<div>

    <div class="container">
        <h2 style="font-weight:350;">User Order List</h2>
        <div class="search">
            <!-- search bar untuk mencari data berdasarkan keyword -->
            <input id="search" name="key" class="input" type="text" placeholder="Search Here...">
        </div>
        <!-- Bagian div id="tampil" akan terupdate ketika kita menginputkan keyword pada search bar -->
        <div id="tampil">
            <table>
                <tr>
                    <td style="padding-left:24px;">Order ID</td>
                    <td style="padding-left:24px;">User ID</td>
                    <td style="padding-left:24px;">Status</td>
                    <td style="padding-left:24px;">Item Count</td>
                    <td style="padding-left:24px;">Sub Total</td>
                    <td></td>
                </tr>

                <?php
                while ($data = mysqli_fetch_array($sql)) {
                    ?>
                    <tr>
                        <td style="padding:20px;text-align:center;"><?= $data['order_id']; ?></td>
                        <td style="padding:20px;text-align:center;"><?= $data['user_id']; ?></td>
                        <td style="padding:20px;text-align:center;"><?= $data['status']; ?></td>
                        <td style="padding:20px;text-align:center;"><?= $data['qty']; ?></td>
                        <td style="padding:20px;text-align:center;"><?php echo "Rp ".number_format($data['total_harga'], '0', ',', '.'); ?></td>
                        <td style="padding:20px;text-align:center;">
                            <a class="btn" style="width:150px;" href="order_detail.php?con=<?= $data['order_id'] ?>">Order Detail</a>
                        </td>
                    </tr>
                <?php } ?>
        </div>
        </table>
    </div>
</div>
<script src="js/script.js"></script>