<?php 
session_start();
if($_SESSION['login'] != 1 ){
    header("Location: login.php");
}
require 'functions.php';

//ketika tombol cari di tekan
if( isset($_POST['cari']))
{
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
  <a href="admin.php"><button type="submit" name="datauser"autofocus>Data User</button></a>
  <a href="databarang.php"><button type="submit" name="databarang">Data Barang</button></a>
  <a href="formuser.php"><button type= "submit">Tambah Data User</button></a>
  <br>
  <br>
 <form action=""method="POST">
    <input type="text" name= "keyword" size="30"autofocus placeholder="Masukkan keyword pencarian.."autocomplete="off"autofocus class="keyword">
    <button type="submit"name="cari" class="tombol-cari">cari</button>
  </form>
  <br>
  <div class="container">
  <table border="1" cellpadding="10" cellspacing="0">
  
  <tr>
    <th>id_user</th>
    <th>gambar</th>
    <th>username</th>
    <th>email</th>
    <th>alamat</th>
    <th>no telp</th>
    <th>password</th>
    <th>aksi</th>
  </tr>
  <?php foreach($user as $isi) : ?>
  <tr>
  <td><?= $isi['id_user']?></td>
  <td>
    <img src="img/<?= $isi['gambar'] ?>" width="100">
  </td>
  <td><?= $isi['username']?></td>
  <td><?= $isi['email']?></td>
  <td><?= $isi['alamat']?></td>
  <td><?= $isi['no_telp']?></td>
  <td><?= $isi['password']?></td>
  <td>
    <a href="edituser.php?id_user=<?= $isi["id_user"]; ?>">Edit</a> |  
    <a href="hapususer.php?id_user=<?= $isi["id_user"]; ?>" onclick="return confirm('Hapus data?');">Hapus</a>
  </td>
  </tr>
  <?php endforeach ?>
  </table>
  </div>

  <script src="js/scriptUser.js"></script>
</body>
</html>