<?php
session_start();
include 'koneksi.php';

// ambil uid, qty, harga, product_id -> simpan ke cart_temp untuk sementara
// database sementara juga digunain nanti buat nampilin cart
// jika user sudah memutuskan untuk bayar/ chekout baru dimasukkan ke database tabel order dan yang di cart_temp dihapus
error_reporting(1);
$userid = $_SESSION['uid'];
$qty = $_POST['quantity'];
$productid = $_POST['productid'];
$ukuran = $_POST['size'];

if (isset($_GET['con'])) {
    $aksi = $_GET['con'];
}
//ngambil data produk
$sql = mysqli_query($konek, "SELECT * FROM product WHERE product_id='$productid'");
$data_produk = mysqli_fetch_assoc($sql);

//ngambil data cart_temp
$sql = mysqli_query($konek, "SELECT * FROM cart_temp WHERE user_id='$userid' AND product_id='$productid' AND size='$ukuran'");
$data_temp = mysqli_fetch_assoc($sql);

switch ($aksi) {
    case 'hapus_semua': //hapus semua isi cart
        $sql = mysqli_query($konek, "DELETE FROM cart_temp WHERE user_id='$userid'");
        header('Location:cart.php?message=Cart is now empty!');
        break;

    case 'remove': //hapus produk terpilih
        $sql = mysqli_query($konek, "DELETE FROM cart_temp WHERE product_id='$productid' AND user_id='$userid'");
        header('Location:cart.php?message=Cart Updated!');
        break;

    case 'checkout': //checkout cart, kemudian dimasukkan ke order dan order_detail
        $subtotal = $_POST['subtotal'];
        $sql = mysqli_query($konek, "INSERT INTO order (user_id,status,total_harga,order_id) 
        VALUES('$userid','Not Confirmed','$subtotal','')");

        $sql = mysqli_query($konek, "INSERT INTO order_detail (order_id,product_id,ukuran,jumlah,harga) 
        SELECT o.order_id, ct.product_id, ct.ukuran, ct.jumlah, ct.harga FROM cart_temp ct, order o 
        WHERE ct.user_id='$userid' AND o.user_id='$userid'");

        $sql = mysqli_query($konek, "DELETE FROM cart_temp WHERE user_id='$userid'");
        header('Location:shop.php?message=Thank You for Your Purchase');
        break;

    case 'addtocart': //chek apakah produk ada yang sama di cart atau belum, yg di chek user_id,product_id,size
        if ($productid === $data_temp['product_id'] && $userid === $data_temp['user_id'] && $ukuran === $data_temp['size']) { //jika sudah ada barang, chek barang yang sama kemudian tambah jumlahnya
            $qty = $qty + $data_temp['jumlah'];
            $sql = mysqli_query($konek, "UPDATE cart_temp SET jumlah='$qty' WHERE user_id='$userid' AND product_id='$productid' AND size='$ukuran'");
        } else { //jika blm ada, menambahkan barang
            $sql = mysqli_query($konek, "INSERT INTO cart_temp VALUES('$userid','$productid','$ukuran','$data_produk[harga]','$qty')");
        }

        if ($sql) {
            header('Location:shop.php?message=Added to Cart!');
        } else {
            header('Location:shop.php?message=There is an error!');
        }
        break;
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
