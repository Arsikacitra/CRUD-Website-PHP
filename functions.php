<?php 

//Koneksi database

$conn = mysqli_connect('localhost', 'root', '','master');


function registrasi ($data)
{
    //memanggil database
    global $conn;

    //mengambil data yang diinputkan

    $email = $data['email'];
    $username = $data['username'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    //JIKA USERNAME SUDAH ADA
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $result = mysqli_num_rows($query);
    if($result > 0){
        echo "<script> 
                alert('Username sudah ada!');
                document.location.href = 'index.php';
              </script>";
        return false;
    }else {
       mysqli_query($conn, "INSERT INTO admin VALUES('','$email','$username','$password')");
       echo "<script> 
                alert('sukses,silahkan login');
                document.location.href = 'index.php';
            </script>";
       return mysqli_affected_rows($conn);
      
    }
}

function login($data){
    //mengambil data base 
    global $conn;

    //MENGAMBIL DATA    
    $username = $data['username'];
    $password = $data ['password'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    $result = mysqli_num_rows($query);
    if($result > 0){
        $row = mysqli_fetch_assoc($query); //mengambil data dalam row tabel
        if(password_verify($password,$row['password'])){
          $_SESSION['login'] = 1;
          $_SESSION['username']= $username;
          echo "<script>
                alert('anda berhasil login!');
                document.location.href = 'admin2.php';
              </script>";
        }else{
            echo "<script> 
                alert('Gagal Login');
                document.location.href = 'index.php';
              </script>";
        }
        }else{
            echo "<script> 
            alert('anda belum terdaftar');
            document.location.href = 'login.php';
          </script>";}
    }

    function uploadUser(){
      $nama_file = $_FILES['gambar']['name'];
      $tmp_file = $_FILES['gambar']['tmp_name'];
      $error = $_FILES['gambar']['error'];

      if($error == 4){
        return 'nophoto.jpg';
      } else{
        move_uploaded_file($tmp_file, 'img/' . $nama_file);
        return $nama_file;
      }
    }

    function tambahuser($data)
    {
        //memanggil database
    global $conn;

    //mengambil data yang diinputkan
    $username = $data['username'];
    $email = $data['email'];
    $alamat = $data['alamat'];
    $no_telp = $data['no_telp'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    $gambar = uploadUser();

    //JIKA USERNAME SUDAH ADA
    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE username = '$username'");
    $result = mysqli_num_rows($query);
    if($result > 0){
        echo "<script> 
                alert('Username sudah ada!');
                document.location.href = 'formuser2.php';
              </script>";
        return false;
    }else {
       mysqli_query($conn, "INSERT INTO pengguna VALUES('','$gambar','$username','$email','$alamat','$no_telp','$password')");
       echo "<script> 
                alert('data berhasil ditambahkan');
                document.location.href = 'admin2.php';
            </script>";
       return mysqli_affected_rows($conn);
      
    }

    }

    function uploadBarang(){
      $nama_file = $_FILES['gambar_barang']['name'];
      $tmp_file = $_FILES['gambar_barang']['tmp_name'];
      $error = $_FILES['gambar_barang']['error'];

      if($error == 4){
        return 'nophoto.jpg';
      } else{
        move_uploaded_file($tmp_file, 'img/' . $nama_file);
        return $nama_file;
      }
    }

    function tambahbarang ($data){
    global $conn;

  //menangkap data
  $kodebarang = $data['kode_barang'];
  $namabarang = $data['nama_barang'];
  $jenisbarang = $data['jenis_barang'];
  $hargabarang = $data['harga_barang'];
  $stokbarang = $data['stok_barang'];

  $gambar_barang = uploadBarang();

    //menambahkan data ke db
    mysqli_query($conn, "INSERT INTO barang VALUES ('$kodebarang','$gambar_barang','$namabarang','$jenisbarang','$hargabarang','$stokbarang')");
    echo "<script> 
                alert('data berhasil ditambahkan');
                document.location.href = 'databarang2.php';
            </script>";
    return mysqli_affected_rows($conn);
    }

    function query($query){
      global $conn;
      $result = mysqli_query($conn,$query);
      $rows = [];
      while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
      }

      return $rows;
    }
  
    function edituser($data){
      global $conn;
      $id_user = $data["id_user"];
      $username = $data["username"];
      $email = $data["email"];
      $alamat = $data["alamat"];
      $no_telp = $data["no_telp"];
      $password = $data["password"];
      $gambar_lama = $data["gambar_lama"];

      $gambar = uploadUser();
      if($gambar == 'nophoto.jpg'){
        $gambar = $gambar_lama;
      }

      $password = password_hash($data["password"], PASSWORD_DEFAULT);
      
      $query = "UPDATE pengguna SET
                gambar = '$gambar',
                username = '$username',
                email = '$email',
                alamat = '$alamat',
                no_telp = '$no_telp',
                password = '$password'
                WHERE id_user = $id_user
      ";
      mysqli_query($conn,$query);

      return mysqli_affected_rows($conn);
    }

    function hapususer($id_user){
      global $conn;
      $query = "DELETE FROM pengguna WHERE id_user = $id_user";
      mysqli_query($conn,$query);

      return mysqli_affected_rows($conn);

    }


    function editbarang($data){
    global $conn;
    $kode_barang = $data["kode_barang"];
    $nama_barang = $data["nama_barang"];
    $jenis_barang = $data["jenis_barang"];
    $harga_barang = $data["harga_barang"];
    $stok_barang = $data["stok_barang"];
    $gambar_lama = $data["gambar_lama"];

    $gambar_barang = uploadBarang();
    if($gambar_barang == 'nophoto.jpg'){
      $gambar_barang = $gambar_lama;
    }

    $query = "UPDATE barang SET 
              kode_barang = '$kode_barang',
              gambar_barang = '$gambar_barang',
              nama_barang = '$nama_barang',
              jenis_barang = '$jenis_barang',
              harga_barang = '$harga_barang',
              stok_barang = '$stok_barang'
              WHERE kode_barang = '$kode_barang'
              ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
  }

  function hapusbarang($kode_barang){
    global $conn;
    $query = "DELETE FROM barang WHERE kode_barang = '$kode_barang'";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
  }



?>