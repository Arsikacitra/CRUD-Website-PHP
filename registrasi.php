<?php
require 'functions.php';

//kondisi ketika tombol submit sudah diclick
if ( isset($_POST['registrasi'])){
    registrasi($_POST);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
</head>
<body>
<h2>Registrasi</h2>
<h3>Ecommerce</h3>
<form action="" method="POST">
    <label>
    Email :
    <input type="email" name="email" autofocus autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Username :
    <input type="text" name="username"autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Password :
    <input type="password" name="password"required>
    </label>
    <br>
    <br>
    <button type="submit" name="registrasi">Submit</button>
</form>
    
    
    
 



    
</body>
</html>