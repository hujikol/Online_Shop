<?php
include 'header.php';


?>
<section class="login-form">
    <form action="cart-con.php?con=add_product" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="nama_produk">Nama Produk</label><br>
                    <input class="input" type="text" name="nama_produk">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="harga">Harga Produk</label><br>
                    <input class="input" type="text" name="harga_produk" placeholder="Rp">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="gambar">Upload Image</label><br>
                    <input class="input" style="padding:8px;" type="file" name="gambar" value="Upload Foto" accept="image/*"></<input>
                </td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
                <td><input class="btn" style="width:150px;" type="submit" name="simpan" value="Add Product"></td>
            </tr>

        </table>
    </form>

</section>