<?php include 'header.php';
$uid = $_SESSION['uid'];
$sql = mysqli_query($konek, "SELECT * FROM user WHERE user_id='$uid'");
$data = mysqli_fetch_array($sql);
?>

<div class="login-form" style="margin-top:40px;">
    <a class="btn" style="width:100px;" href="profile.php">
        < Back</a> <br><br><br>
            <div id="header">
                Profile Detail
            </div>
            <form method="POST" action="cart-con.php?con=edit-profile">
                <table>
                    <tr>
                        <td>
                            <label for="email">Email Address</label><br>
                            <input class="input" type="text" name="email" value="<?= $data['email'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password</label><br>
                            <input class="input" type="password" name="pass" placeholder="Required Current Password" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="sub-header">Billing Information<br></div>
                            <label for="firstname">First name</label><br>
                            <input class="input" type="text" name="firstname" value="<?= $data['firstname'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lastname">Last name</label><br>
                            <input class="input" type="text" name="lastname" value="<?= $data['lastname'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="address">Address</label><br>
                            <input class="input" type="text" name="address" value="<?= $data['alamat'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="city">City</label><br>
                            <input class="input" type="text" name="city" value="<?= $data['kota'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="zip">Postal Code</label><br>
                            <input class="input" type="text" name="zip" value="<?= $data['kode_pos'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Phone number</label><br>
                            <input class="input" type="text" name="phone" value="<?= $data['no_telp'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td> <input class="btn" style="width:120px;" type="submit" name="submit" value="Update"> </td>
                    </tr>
                </table>
            </form>
</div>