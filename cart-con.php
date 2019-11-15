<?php
session_start();
include 'koneksi.php';

// ambil uid, qty, harga, product_id -> simpan ke variable/ session untuk sementara
// variable sementara juga digunain nanti buat nampilin cart
// jika user sudah memutuskan untuk bayar/ chekout baru dimasukkan ke database.

$userid = $_SESSION['uid'];
$qty = $_POST['quantity'];
$productid = $_POST['productid'];
$ukuran = $_POST['size'];

//ngambil data produk
$sql = mysqli_query($konek, "SELECT * FROM product WHERE product_id='$productid'");
$data_produk = mysqli_fetch_assoc($sql);

//ngambil data cart_temp
$sql = mysqli_query($konek, "SELECT * FROM cart_temp WHERE user_id='$userid' AND product_id='$productid'");
$data_temp = mysqli_fetch_assoc($sql);

//chek apakah produk ada yang sama di cart atau belum
if($productid == $data_temp['product_id'] && $userid == $data_temp['user_id']){//jika sudah ada barang, chek barang yang sama
    $new_qty = $qty + $data_temp['jumlah'];
    $sql = mysqli_query($konek, "UPDATE cart_temp SET jumlah='$new_qty' WHERE user_id=$userid AND product_id=$productid");

} else { //jika blm ada, menambahkan barang
    $sql = mysqli_query($konek, "INSERT INTO cart_temp VALUES('$userid','$productid','$ukuran','$data_produk[harga]','$qty')");
}

if ($sql) {
    header('Location:login.php?message=Cart Updated!');
} else {
    header('Location:login.php?message=There is an error!');
}


// $data = mysqli_fetch_assoc($sql);
// $itemArray = array(
//     $productByCode["product_id"] => array(
//         'product_name' => $productByCode["product_name"],
//         'product_id' => $productByCode["product_id"],
//         'quantity' => $qty,
//         'harga' => $productByCode["harga"]
//     )
// );

// if (!empty($_SESSION["cart_item"])) {
//     if (in_array($productByCode["product_id"], $_SESSION["cart_item"])) {
//         foreach ($_SESSION["cart_item"] as $k => $v) {
//             if ($productByCode["product_id"] == $k)
//                 $_SESSION["cart_item"][$k]["quantity"] = $qty;
//         }
//     } else {
//         $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
//     }
// } else {
//     $_SESSION["cart_item"] = $itemArray;
// }
//  var_dump($_SESSION["cart_item"]); -> untuk chek produk sudah masuk session atau belum.
