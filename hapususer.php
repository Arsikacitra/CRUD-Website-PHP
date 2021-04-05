<?php 
require 'functions.php';

$id_user = $_GET["id_user"];
if(hapususer($id_user) > 0 ){
	echo "
		<script>
			alert('Data berhasil dihapus');
			document.location.href = 'admin2.php';
		</script>
	";
} else{
	echo "
		<script>
			alert('Data gagal dihapus');
			document.location.href = 'admin2.php';
		</script>
	";
}

 ?>