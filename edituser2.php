<?php
session_start();
if ($_SESSION['login'] != 1) {
  header("Location: index.php");
}
require 'functions.php';

$id_user = $_GET["id_user"];
$user = query("SELECT * FROM pengguna WHERE id_user = $id_user")[0];

//jika tombol submit diclick
if (isset($_POST['edituser'])) {
  if (edituser($_POST) > 0) {
    echo "
                <script>
                    alert('Data berhasil diperbarui')
                    document.location.href = 'admin2.php';
                </script>
            ";
  } else {
    echo "
                <script>
                    alert('Data gagal diperbarui')
                </script>
            ";
    die;
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
      <h3>Edit Data User</h3>
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
          <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">
          <div class="form-group">
            <label for="exampleInputUsername1">Username</label>
            <input type="text" name="username" autofocus autocomplete="off" value="<?= $user["username"]; ?>" class="form-control" id="exampleInputUsername1" aria-describedby="Username" autofocus>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" autocomplete="off" value="<?= $user["email"]; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputAlamat1">Alamat</label>
            <input type="text" name="alamat" autocomplete="off" value="<?= $user["alamat"]; ?>" class="form-control" id="exampleInputAlamat1" aria-describedby="Alamat">
          </div>
          <div class="form-group">
            <label for="exampleInputNo_telp1">No Telp</label>
            <input type="text" name="no_telp" autocomplete="off" value="<?= $user["no_telp"]; ?>"" class=" form-control" id="exampleInputNo_telp1" aria-describedby="no_telp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" value="<?= $user["password"]; ?>" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label>Gambar</label>
            <input type="hidden" name="gambar_lama" value="<?= $user["gambar"] ?>">
            <img src="img/<?= $user["gambar"] ?>" style="display: block;" width="100">
            <input type="file" name="gambar">
          </div>

          <button type="submit" name="edituser" class="btn btn-primary">Submit</button>
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