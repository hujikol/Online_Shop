<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$pass = md5($_POST['pass']);

$data = mysqli_query($konek, "SELECT * FROM user where email= '$email' AND password = '$pass'");
$row = mysqli_fetch_assoc($data);
if (mysqli_num_rows($data) >= 1) {
    
    // contoh
    // $data   = [
    //     'firstname' => $firstname,
    //     'login'     => true
    // ];
    // $_SESSION['data']['login'] =$data


    $_SESSION['nama'] = $row['firstname'];
    $_SESSION['login'] = true;
    header('Location:shop.php');
} else {
    header('Location:login.php?message=Login Gagal!');
}