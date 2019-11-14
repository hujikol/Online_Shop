<?php
session_start();
include 'koneksi.php';

// ambil uid, qty, harga, product_id -> simpan ke variable/ session untuk sementara
// variable sementara juga digunain nanti buat nampilin cart
// jika user sudah memutuskan untuk bayar/ chekout baru dimasukkan ke database.

$userid = $_SESSION['uid'];
$qty = $_POST['quantity'];
$productid = $_POST['productid'];

$sql = mysqli_query($konek,"SELECT * FROM product WHERE product_id='$productid'");
$data = mysqli_fetch_assoc($sql);
 
// if(isset($_POST['test'])) {
//     $id =$_POST['id'];

//     $newitem = array(
//     'idproduk' => $id, 
//     'nm_produk' => 'hoodie', 
//     'img_produk' => 'images/produk/hodie.jpg', 
//     'harga_produk' => '20', 
//     'qty' => '2' 
//     );
//     //if not empty
//     if(!empty($_SESSION['cart']))
//     {    
//         //and if session cart same 
//         if(isset($_SESSION['cart'][$id]) == $id) {
//             $_SESSION['cart'][$id]['qty']++;
//         } else { 
//             //if not same put new storing
//             $_SESSION['cart'][$id] = $newitem;
//         }
//     } else  {
//         $_SESSION['cart'] = array();
//         $_SESSION['cart'][$id] = $newitem;
//     }
// } 
    
?>