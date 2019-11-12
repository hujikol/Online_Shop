<?php
include 'header.php';
include 'koneksi.php';

$email = $_POST['email'];
$pass = md5($_POST['pass']);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$alamat = $_POST['address'];
$kota = $_POST['city'];
$kodepos = $_POST['zip'];
$telp = $_POST['phone'];
$tipe = "user";
?>

<div class="login-form">

<?php
$sql = mysqli_query($konek, "INSERT INTO user VALUES ('$email','$pass','$firstname','$lastname','$alamat','$kota','$telp','$kodepos','$tipe','')");
    if ($sql) {
        echo '<br>You have been registered!';
?>
    <p>Login <a href="login.php"><u>Here<u/></a>.</p>

<?php
} else {
    echo 'There is some error!';
}
//header("Location: login.php?message=$message");

?>
</div>