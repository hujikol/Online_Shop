<?php include 'header.php';
$uid = $_SESSION['uid'];
$sql = mysqli_query($konek, "SELECT * FROM user WHERE user_id='$uid'");
$data = mysqli_fetch_array($sql);
?>
<div class="side-nav">
    <table style="border-right:2px solid black;padding:12px 28px 0 0;">
        <tr>
            <td>
                <ul style="list-style-type:none">
                    <li><a href="profile.php" title="Profile & Billing">Profile & Billing</li>
                    <li>&nbsp;</li>
                    <li><a href="myorder.php" title="Orders">Orders</li>
                    <li>&nbsp;</li>
                    <li><a href="logout.php" title="Logout">Logout</a></li>
                </ul>
            </td>
        </tr>
    </table>
</div>
<div class="container">
    <div id="header">
        Profile Detail
    </div>

    <form method="POST" action="edit-profile.php">
        <table>
            <tr>
                <td>
                    <label for="email">Email Address</label><br>
                    <input class="input" type="text" name="email" value="<?= $data['email'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="sub-header">Billing Information<br></div>
                    <input class="input" style="width:150px;" type="text" name="firstname" value="<?= $data['firstname'] ?>" disabled>
                    <input class="input" style="width:150px;" type="text" name="lastname" value="<?= $data['lastname'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="input" type="text" name="address" value="<?= $data['alamat'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="input" type="text" name="city" value="<?= $data['kota'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="input" type="text" name="zip" value="<?= $data['kode_pos'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="input" type="text" name="phone" value="<?= $data['no_telp'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td> <input class="btn" style="width:120px;" type="submit" name="edit" value="Edit"> </td>
            </tr>
        </table>
    </form>
</div>