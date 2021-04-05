<?php
    session_start();
    if($_SESSION['login'] != 1){
        header("Location: login.php");
    }
    require 'functions.php';
    //ketika tombol cari di tekan
  if( isset($_POST['cari']))
  {
    $cari = $_POST['keyword'];
    $barang = mysqli_query($conn, "SELECT * FROM barang WHERE 
                                  kode_barang LIKE '%$cari%' OR
                                  nama_barang LIKE '%$cari%' OR
                                  jenis_barang LIKE '%$cari%' OR
                                  harga_barang LIKE '%$cari%' OR
                                  stok_barang LIKE '%$cari%'
                          ");

  } else {
    $barang = mysqli_query($conn, "SELECT * FROM barang");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
<a href="logout.php">Logout</a>
  <h2>Hi 
    <?= $_SESSION['username']; ?>
  </h2>
  <h3>Selamat datang di halaman admin </h3>
  <a href="admin.php"><button type="submit" name="datauser">Data User</button></a>
  <a href="databarang.php"><button type="submit" name="databarang" autofocus>Data Barang</button></a>
  <a href="formbarang.php"><button type= "submit">Tambah Data Barang</button></a>
  <br>
  <br>
 <form action=""method="POST" enctype="multipart/form-data">
    <input type="text" name= "keyword"size="30"autofocus placeholder="Masukkan keyword pencarian.."autocomplete="off"autofocus class="keyword">
    <button type="submit"name="cari" class="tombol-cari">cari</button>
  </form>
  <br>
  <div class="container">
  <table border="1" cellpadding="10" cellspacing="0">
  
  <tr>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Nama Barang</th>
    <th>Jenis Barang</th>
    <th>Harga Barang</th>
    <th>Stock Barang</th>
    <th>Aksi</th>
  </tr>
  <?php foreach($barang as $isi) : ?>
  <tr>
  <td><?= $isi['kode_barang']?></td>
  <td>
    <img src="img/<?= $isi['gambar_barang'] ?>" width="100">
  </td>
  <td><?= $isi['nama_barang']?></td>
  <td><?= $isi['jenis_barang']?></td>
  <td><?= $isi['harga_barang']?></td>
  <td><?= $isi['stok_barang']?></td>
  <td>
    <a href="editbarang.php?kode_barang=<?= $isi["kode_barang"]; ?>">Edit</a>
    <a href="hapusbarang.php?kode_barang=<?= $isi["kode_barang"]; ?>" onclick ="return confirm('Hapus data?');">Hapus</a>
  </td>
  </tr>
  <?php endforeach ?>
  </table>
  </div>

  <script src="js/scriptBarang.js"></script>
</body>
</html>