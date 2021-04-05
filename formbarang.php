<?php
    session_start();
    if($_SESSION['login'] != 1){
        header("Location: login.php");
    }
    require 'functions.php';

    //jika tombol submit diclick
    if(isset($_POST['tambahbarang'])){
        tambahbarang($_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Form Barang</title>
</head>
<body>
<h2>FORM TAMBAH BARANG</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <label>
    Kode Barang :
    <input type="text" name="kode_barang"autofocus autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Nama Barang :
    <input type="text" name="nama_barang"  autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Jenis Barang :
    <input type="text" name="jenis_barang"  autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Harga Barang :
    <input type="text" name="harga_barang"  autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Stock Barang :
    <input type="text" name="stok_barang"required>
    </label>
    <br>
    <br>
    <label>
    Gambar Barang :
    </label>
    <input type="file" name="gambar_barang">
    <br>
    <br>
    <button type="submit" name="tambahbarang">Submit</button>

</form>

    
</body>
</html>