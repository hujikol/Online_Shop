<?php include 'header.php';
include 'koneksi.php';

$sql = mysqli_query($konek, 'select * from product') or die(mysqli_error($konek));
?><div class="product-container">
    <?php
    while ($data = mysqli_fetch_array($sql)) { ?>
        <table border="1px solid black">
            <tr>
                <td colspan="2"><img width="360px" src="images/<?= $data['gambar'] ?>"></td>
            </tr>

            <div class="product-header">
                <tr>
                    <td>
                        <?php echo $data['product_name'] . "<br>"; ?>
                    </td>
                    <td rowspan="2">
                        <?php if (isset($_SESSION['login'])) ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo "Rp " . $data['harga'] . "<br>"; ?>
                    </td>

                </tr>
            </div>
        </table>
</div>
<?php }

include 'footer.php'; ?>