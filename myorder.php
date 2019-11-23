<?php include 'header.php';

if (isset($_SESSION['uid'])) {
    $userid = $_SESSION['uid'];
    $sql = mysqli_query($konek, "SELECT ol.order_id, ol.status, ol.total_harga, SUM(od.jumlah) AS qty 
    FROM order_list ol LEFT JOIN order_detail od ON ol.order_id = od.order_id WHERE user_id='$userid' GROUP BY order_id");
}
?>

<div class="side-nav">
    <ul>
        <li><a href="profile.php" title="Profile & Billing">Profile & Billing</li>
        <li><a href="myorder.php" title="Orders">Orders</li>
        <li><a href="logout.php" title="Logout">Logout</a></li>
    </ul>
</div>

<div class="container">
    <div>Your Orders</div><br>
    <table>
        <tr>
            <td style="padding-left:24px;">Order ID</td>
            <td style="padding-left:24px;">Status</td>
            <td style="padding-left:24px;">Item Count</td>
            <td style="padding-left:24px;">Sub Total</td>
            <td></td>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($sql)) {
            ?>
            <tr>
                <td style="padding:20px;text-align:center;"><?php echo $data['order_id']; ?></td>
                <td style="padding:20px;text-align:center;"><?php echo $data['status']; ?></td>
                <td style="padding:20px;text-align:center;"><?php echo $data['qty']; ?></td>
                <td style="padding:20px;text-align:center;"><?php echo "Rp " . $data['total_harga']; ?></td>
                <td style="padding:20px;text-align:center;">
                    <a class="btn" style="width:150px;" href="myorder-detail.php?con=<?= $data['order_id'] ?>">Order Detail</a>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>