<?php
    session_start();
    if($_SESSION['login'] != 1){
        header("Location: login.php");
    }
    require 'functions.php';

    $kode_barang = $_GET["kode_barang"];
    $barang = query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'")[0];

    //jika tombol submit diclick
    if(isset($_POST['editbarang'])){
       if( editbarang($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil diperbarui')
                document.location.href = 'databarang.php';
            </script>
        ";
       }
       else{
        echo "
            <script>
                alert('data gagal diperbarui')
                document.location.href = 'databarang.php';
            </script>
        ";
       }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Barang</title>
</head>
<body>
<h2>FORM Edit Barang</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <label>
    Kode Barang
    </label>
    <input type="text" name="kode_barang" value="<?= $barang["kode_barang"]; ?>">
    <br>
    <br>
    <label>
    Nama Barang :
    <input type="text" name="nama_barang"autofocus autocomplete="off" value="<?= $barang["nama_barang"]; ?>">
    </label>
    <br>
    <br>
    <label>
    Jenis barang :
    <input type="text" name="jenis_barang"  autocomplete="off" value="<?= $barang["jenis_barang"]; ?>">
    </label>
    <br>
    <br>
    <label>
    Harga Barang :
    <input type="text" name="harga_barang"  autocomplete="off" value="<?= $barang["harga_barang"]; ?>">
    </label>
    <br>
    <br>
    <label>
    Stok Barang :
    <input type="text" name="stok_barang"  autocomplete="off" value="<?= $barang["stok_barang"]; ?>">
    </label>
    <br>
    <br>
    <label>
    Gambar barang :
    </label>
    <input type="hidden" name="gambar_lama" value="<?= $barang["gambar_barang"]; ?>">
    <img src="img/<?= $barang["gambar_barang"]; ?>" style="display: block;" width="100">
    <input type="file" name="gambar_barang">
    <br>
    <br>
    <button type="submit" name="editbarang">Submit</button>

</form>

    
</body>
</html>