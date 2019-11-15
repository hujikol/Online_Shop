<?php
session_start();
include 'koneksi.php';

// ambil uid, qty, harga, product_id -> simpan ke variable/ session untuk sementara
// variable sementara juga digunain nanti buat nampilin cart
// jika user sudah memutuskan untuk bayar/ chekout baru dimasukkan ke database.

$userid = $_SESSION['uid'];
$qty = $_POST['quantity'];
$productid = $_POST['productid'];


$sql = mysqli_query($konek, "SELECT * FROM product WHERE product_id='$productid'");
$productByCode = mysqli_fetch_assoc($sql);
$itemArray = array(
    $productByCode["product_id"] => array(
        'product_name' => $productByCode["product_name"],
        'product_id' => $productByCode["product_id"],
        'quantity' => $qty,
        'harga' => $productByCode["harga"]
    )
);

if (!empty($_SESSION["cart_item"])) {
    if (in_array($productByCode["product_id"], $_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($productByCode["product_id"] == $k)
                $_SESSION["cart_item"][$k]["quantity"] = $qty;
        }
    } else {
        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
    }
} else {
    $_SESSION["cart_item"] = $itemArray;
}
//  var_dump($_SESSION["cart_item"]); -> untuk chek produk sudah masuk session atau belum.
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
