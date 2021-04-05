<?php
    session_start();
    if($_SESSION['login'] != 1){
        header("Location: login.php");
    }
    require 'functions.php';

    //jika tombol submit diclick
    if(isset($_POST['tambahuser'])){
        tambahuser($_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Form User</title>
</head>
<body>
<h2>FORM TAMBAH USER</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <label>
    Username :
    <input type="text" name="username"autofocus autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Email :
    <input type="email" name="email"  autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Alamat :
    <input type="text" name="alamat"  autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    No Telp :
    <input type="text" name="no_telp"  autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Password :
    <input type="password" name="password"required>
    </label>
    <br>
    <br>
    <label>
    Gambar :
    </label>
    <input type="file" name="gambar">
    <br>
    <br>
    <button type="submit" name="tambahuser">Submit</button>

</form>

    
</body>
</html>