<?php
require 'functions.php';
session_start();
$_SESSION['login'] = 0;

//kondisi tombol login sudah ditekan 

if (isset($_POST['login'])) {
  login($_POST);
}
//kondisi ketika tombol submit sudah diclick
if (isset($_POST['registrasi'])) {
  registrasi($_POST);
}
$barang = mysqli_query($conn, "SELECT * FROM barang");
//ketika tombol cari di tekan
if (isset($_POST['cari'])) {
  $cari = $_POST['keyword'];
  $barang = mysqli_query($conn, "SELECT * FROM barang WHERE 
                                  nama_barang LIKE '%$cari%' OR
                                  harga_barang LIKE '%$cari%' 
                          ");
} else {
  $barang = mysqli_query($conn, "SELECT * FROM barang");
}


?>
<!doctype html>
<html lang="en">

<head>
  <!-- MY-CSS -->
  <link rel="stylesheet" href="styles.css">
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
  <!-- Header-Promo -->
  <div class="promo">
    BUY 5 CLOTH MASK SAVE 10% OFF!
  </div>

  <!-- Brand -->
  <div class="brand">
    <div class="row my-row1">
      <div class="col-9 my-brand">
        <h1>Fashionable</h1>
      </div>
      <div class="col-3 my-navigation">
        <li class="icons">
          <a href="">
            <span>IDR</span>
          </a>
          <a href="" data-toggle="modal" data-target="#exampleModal3">
            <span>
              <i class="fas fa-search"></i>
            </span>
          </a>
          <a href="" data-toggle="modal" data-target="#exampleModal">
            <span>
              <i class="fas fa-user"></i>
            </span>
          </a>
          <!-- Modal Login -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="exampleUsername1">Username</label>
                      <input type="text" name="username" autofocus required autocomplete="off" class="form-control" id="exampleUsername1" aria-describedby="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
                    </div>

                </div>
                <div class="modal-footer">
                  Belum punya akun? <a href="" style="color: blue;" data-toggle="modal" data-target="#exampleModal2" data-dismiss="modal">Registrasi</a>
                  <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal Registrasi-->
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="exampleEmail1">Email</label>
                      <input type="email" name="email" autofocus autocomplete="off" required class="form-control" id="exampleEmail1" aria-describedby="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleUsername1">Username</label>
                      <input type="text" name="username" autocomplete="off" required class="form-control" id="exampleUsername1" aria-describedby="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="registrasi">Registrasi</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal searching-->
          <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Search</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="keyword" size="50" placeholder="Masukkan Keyword Pencarian..." style="border: 3px solid #D25E5E; border-radius: 10px;height: 40px;">
                    <button type="submit" name="cari" class=" btn btn-secondary">Cari</button>
                  </form>
                </div>

              </div>
            </div>
          </div>

          <a href="" data-toggle="modal" data-target="#exampleModal4">
            <span>
              <i class="fas fa-shopping-bag"></i>
            </span>
          </a>
          <!-- Modal Shopping chart-->
          <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Shopping chart</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <br>
                  <center>
                    <h6 style="font-style: italic; font-weight:lighter;">your cart is currently empty</h6>
                    <br><br>
                  </center>

                </div>

              </div>
            </div>
          </div>
        </li>
      </div>
    </div>
  </div>



  <!-- Menu -->
  <div class="menu">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="link.php">New In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bestseller.php">Best Seller</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Collaboration</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Clothing
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Outerwear</a>
          <a class="dropdown-item" href="#">Tunic</a>
          <a class="dropdown-item" href="#">Blouse</a>
          <a class="dropdown-item" href="#">Bottom</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hijab
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Basic</a>
          <a class="dropdown-item" href="#">Pattern</a>
          <a class="dropdown-item" href="#">Pashmina</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sleepwear</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: red;">SALE</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Accessories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Pin</a>
          <a class="dropdown-item" href="#">Scraf</a>
          <a class="dropdown-item" href="#">Brooch</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Payment Confirmation</a>
      </li>
    </ul>
  </div>



  <!-- Content-image -->
  <div class="product" style="margin-left:30px;">
    <div class="container-fluid">
      <div class="row" style="margin-left:60px;">
        <div class="col-5">
          <div class="card">
            <img src="img/gamis Cropped.jpg" class="card-img-top" alt="...">
          </div>
        </div>
        <div class="col-7 barang">
          <br><br>
          <h4>Gamis</h4>
          <i class="fas fa-star" style="color:gold;"></i>
          <i class="fas fa-star" style="color:gold;"></i>
          <i class="fas fa-star" style="color:gold;"></i>
          <i class="fas fa-star" style="color:gold;"></i>
          <i class="far fa-star"></i>
          <br><br>
          <div class="quantity">
            Quantity
            <br>
            <br>
            <button type="button" class="btn">-</button>&nbsp;1 &nbsp;<button type="button" class="btn">+</button>
            <br><br>
            <h3>Rp 250.000</h3>
            <br>
            <button type="button" style="width:50%;" class="btn btn-secondary">Add to chart</button>
          </div>



        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <div class="footer">
    <div class="row">
      <div class="col-3">
        <p class="link">
          About Us
          <br>
          <a href="">Fashionable's History</a>
        </p>
      </div>
      <div class="col-3">
        <p class="link">
          Contact
          <br>
          <a href="">Contact Us</a><br>
          <a href="">Store Location</a><br>
          <a href="">Career</a>
        </p>
      </div>
      <div class="col-3">
        <p class="link">
          Help
          <br>
          <a href="">FAQ</a>
          <a href="">Payment & Delivery</a><br>
          <a href="">Return & Refund</a>
        </p>
      </div>
      <!-- Sosial Media -->
      <div class="row">
        <div class="col-2">
          <a href="">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
        <div class="col-2">
          <a href="">
            <i class="fab fa-twitter"></i></i>
          </a>
        </div>
        <div class="col-2">
          <a href="">
            <i class="fab fa-instagram"></i>
          </a>
        </div>
        <div class="col-2">
          <a href="">
            <i class="fab fa-youtube"></i></i>
          </a>
        </div>
        <div class="col-2">
          <a href="">
            <i class="fab fa-linkedin"></i>
          </a>
        </div>
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