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

// $newitem = array(
//     $id = $productid
//     'nm_produk' => 'hoodie', 
//     'img_produk' => 'images/produk/hodie.jpg', 
//     'harga_produk' => '20', 
//     'qty' => '2' 
//     );

//     //jika tidak kosong
//     if(!empty($_SESSION['cart']))
//     {    
//         //kalau produk sama
//         if(isset($_SESSION['cart'][$id]) == $id) {
//             $_SESSION['cart'][$id]['qty']++;
//         } else { 
//             //kalau beda buat baru
//             $_SESSION['cart'][$id] = $newitem;
//         }
//     } else  {
//         $_SESSION['cart'] = array();
//         $_SESSION['cart'][$id] = $newitem;
//     }

    
?>