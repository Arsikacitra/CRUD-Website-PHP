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



?>
<!doctype html>
<html lang="en">

<head>
  <!-- MY-CSS -->
  <link rel="stylesheet" href="tampilan.css">
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
      <div class="col-lg-4 col-sm-0 my-brands d-flex justify-content-center align-items-center">

      </div>
      <div class="col-lg-4 col-sm-12 my-brand d-flex justify-content-center align-items-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-block d-md-none d-lg-none">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
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
              <li class="nav-item">
                <a class="nav-link" href="#">Sleepwear</a>
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
        </nav>
        <h1>Fashionable</h1>
      </div>
      <div class="col-lg-4 my-navigation d-none d-lg-block ">
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
                  <input type="text" name="keyword" size="50" placeholder="Masukkan Keyword Pencarian..." style="border: 3px solid #D25E5E; border-radius: 10px; height: 40px;">
                  <button type="button" class="btn btn-secondary">Cari</button>
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
  <!-- Menu navbar -->

  <!-- Menu -->
  <div class="menu d-none d-md-block d-lg-block justify-content-center">
    <ul class="nav  d-flex flex-column flex-sm-column flex-md-row flex-lg-row justify-content-center">
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

  <!-- Slide Gambar -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/Gambar1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/Gambar2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/Gambar3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- Content-Video -->
  <div class="video">
    <center>
      <iframe width="90%" height="600" src="https://www.youtube.com/embed/k7fF3wOK_mI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </center>
  </div>

  <!-- Content-image -->
  <div class="product">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 col-md-3 col-sm-6 col-lg-3">
          <div class="card" style="width: 100%;">
            <img src="img/product1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <a href="produk.php">Pashmina <br> 150.000,00</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-sm-6 col-lg-3">
          <div class="card" style="width: 100%;">
            <img src="img/product2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <a href="">Basic Skirt <br> 250.000,00</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-sm-6 col-lg-3">
          <div class="card" style="width: 100%;">
            <img src="img/product3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <a href="">Grey Outer <br> 100.000,00</a>
              </p>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-sm-6 col-lg-3">
          <div class="card" style="width: 100%;">
            <img src="img/product4.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">
                <a href="">Blouse <br> 175.000,00</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <div class="row">
      <div class="col-md-3">
        <p class="link">
          About Us
          <br>
          <a href="">Fashionable's History</a>
        </p>
      </div>
      <div class="col-md-3">
        <p class="link">
          Contact
          <br>
          <a href="">Contact Us</a><br>
          <a href="">Store Location</a><br>
          <a href="">Career</a>
        </p>
      </div>
      <div class="col-md-3">
        <p class="link">
          Help
          <br>
          <a href="">FAQ</a>
          <a href="">Payment & Delivery</a><br>
          <a href="">Return & Refund</a>
        </p>
      </div>
      <div class="col-md-3">
        <!-- Sosial Media -->
        <div class="row sosmed">
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
  </div>


































  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>