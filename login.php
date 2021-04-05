<?php 
require 'functions.php';
session_start();
$_SESSION['login'] = 0;

//kondisi tombol login sudah ditekan 

if ( isset($_POST['login'])){
   login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>

<h2>Log In</h2>
<h3>Ecommerce</h3>
<form action="" method="POST">
    <label>
    Username :
    <input type="text" name="username" autofocus autocomplete="off" required>
    </label>
    <br>
    <br>
    <label>
    Password :
    <input type="password" name="password"required>
    </label>
    <br>
    <br>
    belum punya akun? <a href="registrasi.php">Regist</a>
    <button type="submit" name="login">login</button>
</form>
    
</body>
</html>