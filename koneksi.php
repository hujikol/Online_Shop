<?php 
$konek = new mysqli("localhost", "root", "", "illegaldb"); 
  
if ($konek->connect_error) { 
    die('Maaf koneksi gagal: '. $konek->connect_error);
}
?>