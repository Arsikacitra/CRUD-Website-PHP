<?php
session_start();
if ($_SESSION['login'] != 1) {
  header("Location: index.php");
}
require 'functions.php';

//ketika tombol cari di tekan
if (isset($_POST['cari'])) {
  $cari = $_POST['keyword'];
  $user = mysqli_query($conn, "SELECT * FROM pengguna WHERE 
                                username LIKE '%$cari%' OR
                                email LIKE '%$cari%' OR
                                alamat LIKE '%$cari%' OR
                                no_telp LIKE '%$cari%'
                        ");
} else {
  $user = mysqli_query($conn, "SELECT * FROM pengguna");
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
        <form action="" method="POST">
          <input type="text" name="keyword" size="40" placeholder="Masukkan Keyword Pencarian...">
          <button type="submit" name="cari" class="btn btn-secondary">Cari</button>
        </form>
      </div>
      <br>
      <div class="button-data">
        <button type="button" class="btn btn-light">Data User</button> &nbsp; &nbsp;&nbsp;
        <a href="databarang2.php"><button type="button" class="btn btn-light">Data Barang</button></a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id_User</th>
              <th scope="col">Gambar</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Alamat</th>
              <th scope="col">No Telp</th>
              <th scope="col">Password</th>
              <th scope="col" colspan="2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($user as $isi) : ?>
              <tr>
                <td><?= $isi['id_user'] ?></td>
                <td>
                  <img src="img/<?= $isi['gambar'] ?>" width="100">
                </td>
                <td><?= $isi['username'] ?></td>
                <td><?= $isi['email'] ?></td>
                <td><?= $isi['alamat'] ?></td>
                <td><?= $isi['no_telp'] ?></td>
                <td><?= $isi['password'] ?></td>

                <td><a href="edituser2.php?id_user=<?= $isi["id_user"]; ?>">
                    <i class="fas fa-pencil-alt" style="color: black;"></i>
                  </a>
                </td>
                <td><a href="hapususer.php?id_user=<?= $isi["id_user"]; ?>" onclick="return confirm('Hapus data?');">
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