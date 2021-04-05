<?php 

require '../functions.php';

$cari = $_GET["keyword"];
$user = mysqli_query($conn, "SELECT * FROM pengguna WHERE 
                                username LIKE '%$cari%' OR
                                email LIKE '%$cari%' OR
                                alamat LIKE '%$cari%' OR
                                no_telp LIKE '%$cari%'
                        ");

 ?>

 <table border="1" cellpadding="10" cellspacing="0">
  
  <tr>
    <th>id_user</th>
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