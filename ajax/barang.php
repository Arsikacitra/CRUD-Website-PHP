<?php 

require '../functions.php';

$cari = $_GET["keyword"];
$barang = mysqli_query($conn, "SELECT * FROM barang WHERE 
                                  kode_barang LIKE '%$cari%' OR
                                  nama_barang LIKE '%$cari%' OR
                                  jenis_barang LIKE '%$cari%' OR
                                  harga_barang LIKE '%$cari%' OR
                                  stok_barang LIKE '%$cari%'
                          ");

 ?>

 <table border="1" cellpadding="10" cellspacing="0">
  
  <tr>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Jenis Barang</th>
    <th>Harga Barang</th>
    <th>Stock Barang</th>
    <th>Aksi</th>
  </tr>
  <?php foreach($barang as $isi) : ?>
  <tr>
  <td><?= $isi['kode_barang']?></td>
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