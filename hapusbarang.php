<?php 
require 'functions.php';

$kode_barang = $_GET["kode_barang"];

if(hapusbarang($kode_barang) > 0) {
	echo "
            <script>
                alert('data berhasil dihapus')
                document.location.href = 'databarang2.php';
            </script>
        ";
} else{
    var_dump($kode_barang);
	echo "
            <script>
                alert('data gagal dihapus')
                document.location.href = 'databarang2.php';
            </script>
        ";
}

 ?>