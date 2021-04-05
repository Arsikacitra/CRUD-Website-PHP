<?php
    session_start();
    if($_SESSION['login'] != 1){
        header("Location: login.php");
    }
    require 'functions.php';

    $id_user = $_GET["id_user"];
    $user = query("SELECT * FROM pengguna WHERE id_user = $id_user")[0];

    //jika tombol submit diclick
    if(isset($_POST['edituser'])){
        if(edituser($_POST) > 0){
            echo "
                <script>
                    alert('Data berhasil diperbarui')
                    document.location.href = 'admin.php';
                </script>
            ";
        } else{
            echo "
                <script>
                    alert('Data gagal diperbarui')
                </script>
            ";
            die;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit User</title>
</head>
<body>
<h2>FORM EDIT USER</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">
    <label>
    Username :
    <input type="text" name="username"autofocus autocomplete="off" value="<?= $user["username"]; ?>">
    </label>
    <br>
    <br>
    <label>
    Email :
    <input type="email" name="email"  autocomplete="off" value="<?= $user["email"]; ?>">
    </label>
    <br>
    <br>
    <label>
    Alamat :
    <input type="text" name="alamat"  autocomplete="off" value="<?= $user["alamat"]; ?>">
    </label>
    <br>
    <br>
    <label>
    No Telp :
    <input type="text" name="no_telp"  autocomplete="off" value="<?= $user["no_telp"]; ?>">
    </label>
    <br>
    <br>
    <label>
    Password :
    <input type="password" name="password" value="<?= $user["password"]; ?>">
    </label>
    <br>
    <br>
    <label>
    Gambar :
    </label>
    <input type="hidden" name="gambar_lama" value="<?= $user["gambar"] ?>">
    <img src="img/<?= $user["gambar"] ?>" style="display: block;" width="100">
    <input type="file" name="gambar">
    <br>
    <br>
    <button type="submit" name="edituser">Submit</button>

</form>

    
</body>
</html>