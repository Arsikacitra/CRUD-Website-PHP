<?php
session_start();
if ($_SESSION['login'] != 1) {
  header("Location: index.php");
}
require 'functions.php';
$barang = mysqli_query($conn, "SELECT * FROM barang");
//ketika tombol cari di tekan
if (isset($_POST['cari'])) {
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
<!doctype html>
<html lang="en">

<head>
  <!-- MY-CSS -->
  <link rel="stylesheet" href="styles2.css">
  <!-- FONTS   -->
  <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Fashionable</title>
</head>

<body>
  <div class="row my-container">
    <div class="col-2 my-brand">
      <h1>Fashionable</h1>
    </div>
    <div class="col-10 my-header">
      <h3>Hi
        <?= $_SESSION['username']; ?>
      </h3>
    </div>
  </div>
  <div class="row my-container2">
    <div class="col-2 my-sidebar">
      <li class="menu">
        <a href="admin2.php" class="menu-link">
          <i class="fas fa-table"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="menu">
        <a href="formuser2.php" class="menu-link">
          <i class="fas fa-user"></i>
          <span>Tambah Data User</span>
        </a>
      </li>
      <li class="menu">
        <a href="formbarang2.php" class="menu-link">
          <i class="fas fa-tshirt"></i>
          <span>Tambah Data Barang</span>
        </a>
      </li>
      <li class="menu">
        <a href="logout.php" class="menu-link">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
    </div>
    <div class="col-10 my-content">
      <div class="searching">
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="text" name="keyword" size="40" placeholder="Masukkan Keyword Pencarian...">
          <button type="submit" name="cari" class=" btn btn-secondary">Cari</button>
        </form>
      </div>
      <br>
      <div class="button-data">
        <a href="admin2.php"><button type="button" class="btn btn-light">Data User</button> </a>&nbsp; &nbsp;&nbsp;
        <a href="databarang2.php"><button type="button" class="btn btn-light">Data Barang</button></a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Kode Barang</th>
              <th scope="col">Gambar Barang</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Jenis Barang</th>
              <th scope="col">Harga Barang</th>
              <th scope="col">Stok Barang</th>
              <th scope="col" colspan="2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($barang as $isi) : ?>
              <tr>
                <td><?= $isi['kode_barang'] ?></td>
                <td>
                  <img src="img/<?= $isi['gambar_barang'] ?>" width="100">
                </td>
                <td><?= $isi['nama_barang'] ?></td>
                <td><?= $isi['jenis_barang'] ?></td>
                <td><?= $isi['harga_barang'] ?></td>
                <td><?= $isi['stok_barang'] ?></td>
                <td><a href="editbarang2.php?kode_barang=<?= $isi["kode_barang"]; ?>">
                    <i class=" fas fa-pencil-alt" style="color: black;"></i>
                  </a>
                </td>
                <td><a href="hapusbarang.php?kode_barang=<?= $isi["kode_barang"]; ?>" onclick="return confirm('Hapus data?');">
                    <i class="fas fa-trash-alt" style="color: black;"></i>
                  </a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>





































  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>