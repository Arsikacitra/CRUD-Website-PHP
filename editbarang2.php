<?php
session_start();
if ($_SESSION['login'] != 1) {
  header("Location: index.php");
}
require 'functions.php';

$kode_barang = $_GET["kode_barang"];
$barang = query("SELECT * FROM barang WHERE kode_barang = '$kode_barang'")[0];

//jika tombol submit diclick
if (isset($_POST['editbarang'])) {
  if (editbarang($_POST) > 0) {
    echo "
            <script>
                alert('data berhasil diperbarui')
                document.location.href = 'databarang2.php';
            </script>
        ";
  } else {
    echo "
            <script>
                alert('data gagal diperbarui')
                document.location.href = 'databarang2.php';
            </script>
        ";
  }
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
      <h3>Edit Data Barang</h3>
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
      <div class="form-user">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputKodebarang1">Kode Barang</label>
            <input type="text" name="kode_barang" value="<?= $barang["kode_barang"]; ?>" class="form-control" id="exampleInputKodebarang1" aria-describedby="Kodebarang" autofocus>
          </div>
          <div class="form-group">
            <label for="exampleInputNamabarang1">Nama barang</label>
            <input type="text" name="nama_barang" autofocus autocomplete="off" value="<?= $barang["nama_barang"]; ?>" class="form-control" id="exampleNamabarang1" aria-describedby="Namabarang">
          </div>
          <div class=" form-group">
            <label for="exampleInputJenisbarang1">Jenis Barang</label>
            <input type="text" name="jenis_barang" autocomplete="off" value="<?= $barang["jenis_barang"]; ?>" class="form-control" id="exampleInputJenisbarang1" aria-describedby="Jenisbarang">
          </div>
          <div class="form-group">
            <label for="exampleInputHargabarang1">Harga Barang</label>
            <input type="text" name="harga_barang" autocomplete="off" value="<?= $barang["harga_barang"]; ?>" class="form-control" id="exampleInputHargabarang1" aria-describedby="Hargabarang">
          </div>
          <div class="form-group">
            <label for="exampleInputStokbarang1">Stok Barang</label>
            <input type="text" name="stok_barang" autocomplete="off" value="<?= $barang["stok_barang"]; ?>" class="form-control" id="exampleInputStokbarang1">
          </div>
          <div class="form-group">
            <label>
              Gambar barang :
            </label>
            <input type="hidden" name="gambar_lama" value="<?= $barang["gambar_barang"]; ?>">
            <img src="img/<?= $barang["gambar_barang"]; ?>" style="display: block;" width="100">
            <input type="file" name="gambar_barang">
          </div>
          <button type="submit" name="editbarang" class="btn btn-primary">Submit</button>
        </form>
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