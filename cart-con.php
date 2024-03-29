<?php
session_start();
include 'koneksi.php';

// ambil uid, qty, harga, product_id -> simpan ke cart_temp untuk sementara
// database sementara juga digunain nanti buat nampilin cart
// jika user sudah memutuskan untuk bayar/ chekout baru dimasukkan ke database tabel order dan yang di cart_temp dihapus
error_reporting(1);
//deklarasi variable
$userid = $_SESSION['uid'];
$qty = $_POST['quantity'];
$orderid = $_POST['order_id'];
$productid = $_POST['productid'];
$ukuran = $_POST['size'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$foto = $_FILES['gambar'];
$namafile = md5(date('Y-m-d H:i:s'));
$namafile = $namafile . substr($foto['name'], strrpos($foto['name'], '.'));
move_uploaded_file($foto['tmp_name'], "images/$namafile");

//mengecek apakah ada perintah pada link berupa con="..."
if (isset($_GET['con'])) {
    $aksi = $_GET['con'];
}
//ngambil data produk
$sql = mysqli_query($konek, "SELECT * FROM product WHERE product_id='$productid'");
$data_produk = mysqli_fetch_assoc($sql);

//ngambil data cart_temp
$sql_temp = mysqli_query($konek, "SELECT * FROM cart_temp WHERE user_id='$userid' AND product_id='$productid' AND size='$ukuran'");
$data_temp = mysqli_fetch_assoc($sql_temp);

//mengeksekusi perintah menggunakan switch case
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
        $unique_num = $subtotal + random_int(100, 500); //generate 3 digit angka unik buat pembayaran
        //memasukkan data ke order_list        
        $sql = mysqli_query($konek, "INSERT INTO order_list (user_id,status,total_harga,harga_unik) 
                SELECT user_id,'Not Verified',SUM(cart_temp.harga*cart_temp.jumlah),'$unique_num' 
                FROM cart_temp WHERE cart_temp.user_id='$userid'");
        //memasukan data ke order detail
        $sql = mysqli_query($konek, "INSERT INTO order_detail (order_id,product_id,ukuran,jumlah,harga) 
        SELECT order_list.order_id,cart_temp.product_id,cart_temp.size,cart_temp.jumlah,cart_temp.harga 
        FROM cart_temp,order_list WHERE cart_temp.user_id='$userid' AND order_list.user_id='$userid'");
        //menghapus data dari cart_temp
        $sql = mysqli_query($konek, "DELETE FROM cart_temp WHERE user_id='$userid'");
        header('Location:receipt.php');
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

    case 'add_product':
        //ambil data dari tabel produk
        $sql = mysqli_query($konek, "SELECT * FROM product");
        $data = mysqli_fetch_array($sql);
        //chek apakah ada nama produk yang sama dari data base
        if ($nama_produk === $data['product_name']) {
            header('Location:add_product.php?message=Product with that name already Exist!');
        } else { //jika blm ada nama produk tsb, memasukan produk ke tabel product
            $sql = mysqli_query($konek, "INSERT INTO product (product_name,harga,gambar) 
            VALUES('$nama_produk',$harga_produk,'$namafile')");
            if ($sql) {
                header('Location:add_product.php?message=Product Added!');
            } else {
                header('Location:add_product.php?message=Error Adding Product!');
            }
        }
        break;
    
    case 'edit-profile':
        //deklarasi variable, ambil data dari form
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $alamat = $_POST['address'];
        $kota = $_POST['city'];
        $kodepos = $_POST['zip'];
        $telp = $_POST['phone'];
        //periksa pada database apakah password user sama dengan yang ada di database
        $sql = mysqli_query($konek,"SELECT * FROM user WHERE user_id='$userid'");
        $data = mysqli_fetch_array($sql);
        if($pass===$data['password']){
        $sql = mysqli_query($konek,"UPDATE user SET firstname='$firstname', lastname='$lastname', alamat='$alamat', 
        kota='$kota', no_telp='$telp', kode_pos='$kodepos' WHERE user_id='$userid'");
            if($sql){
                header('Location:profile.php?message=Data Updated!');
            } else {
                header('Location:profile.php?message=Error Updating Data!');
            }
        } else {
            header('Location:edit-profile.php?message=Password is Wrong!');
        }
        break;

    case 'update-product':
        //update nama dan harga produk berdasarkan product_id
        $sql = mysqli_query($konek, "UPDATE product SET product_name='$nama_produk', harga='$harga_produk' WHERE product_id='$productid'");
        if ($sql) {
            header('Location:shop.php?message=Product Updated!');
        } else {
            header('Location:shop.php?message=Error updating!');
        }
        break;

    case 'deleteproduct':
        //ambil data gambar pada database dengan produk id sama
        $sql = mysqli_query($konek, "SELECT gambar FROM product WHERE product_id='$productid'");
        $data = mysqli_fetch_array($sql);
        //deklarasi namafile/gambar
        $namafile = 'images/' . $data['gambar'];
        if (file_exists($namafile)) {
            unlink($namafile); //menghapus gambar pada folder "images/nama_file"
        }
        //menghapus produk dari database dengan product id dari POST
        $sql = mysqli_query($konek, "DELETE FROM product WHERE product_id='$productid'");
        if ($sql) {
            header('Location:shop.php?message=Product Deleted!');
        } else {
            header('Location:shop.php?message=Error deleting!');
        }
        break;

    case 'upload-bukti':
        $bukti = $_FILES['bukti'];
        $namafile = md5(date('Y-m-d H:i:s'));
        $namafile = $namafile . substr($bukti['name'], strrpos($bukti['name'], '.'));
        //memasukkan file ke folder bukti
        move_uploaded_file($bukti['tmp_name'], "bukti/$namafile");
        //memasukkan nama file ke database tabel order_list
        $sql = mysqli_query($konek, "UPDATE order_list SET bukti='$namafile' WHERE order_id='$orderid'");
        if ($sql) {
            header('Location:myorder.php?message=Please Wait for Our Admin to Confirm!');
        } else {
            header('Location:myorder.php?message=Error in Submitting Images!');
        }
    break;

    case 'input-resi':
        //generate 3 digit random character
        $huruf = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 3);
        //generate 7 digit angka
        $angka = random_int(0, 9999999);
        //menggabungkan 3 Digit Character + 7 Digit Angka
        $noresi = $huruf . $angka;
        $sql = mysqli_query($konek, "UPDATE order_list SET no_resi='$noresi', status='Confirmed' WHERE order_id='$orderid'");
        if ($sql) {
            header('Location:order_list.php?message=Order Confirmed!');
        } else {
            header('Location:order_list.php?message=Error in Confirming Order!');
        }
        break;
}
