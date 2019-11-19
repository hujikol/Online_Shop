<?php
session_start();
include 'koneksi.php';

if (isset($_GET['con'])) {
    $aksi = $_GET['con'];
} else {
    $aksi = 'user';
}

switch ($aksi) {
    case 'user':
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $data = mysqli_query($konek, "SELECT * FROM user where email= '$email' AND password = '$pass'");
        $row = mysqli_fetch_assoc($data);
        if (mysqli_num_rows($data) >= 1) {
            $_SESSION['nama'] = $row['firstname'];
            $_SESSION['uid'] = $row['user_id'];
            $_SESSION['login'] = true;
            header('Location:shop.php');
        } else {
            header('Location:login.php?message=Failed to Login!');
        }
        break;
    case 'heroes':
        $user = $_POST['uid'];
        $pass = md5($_POST['pass']);
        $data = mysqli_query($konek, "SELECT * FROM admin where username= '$user' AND password = '$pass'");
        $row = mysqli_fetch_assoc($data);
        if (mysqli_num_rows($data) >= 1) {
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['level'] = $row['title'];
            $_SESSION['login'] = true;
            header('Location:shop.php');
        } else {
            header('Location:heroes.php?message=Failed to Login!');
        }
        break;
}
