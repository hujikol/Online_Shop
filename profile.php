<?php include 'header.php'; 
$uid=$_SESSION['uid'];
$sql = mysqli_query($konek,"SELECT * FROM user WHERE user_id='$uid'");
$data = mysqli_fetch_array($sql);
?>
<div class="login-form" style="margin-top:40px;">
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
