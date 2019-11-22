<?php
include 'koneksi.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AW Computershop</title>
    <link rel="icon" href="icon.png">
    <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./css/shop-homepage.css" rel="stylesheet">

  </head>
  <body>
<div class="container">
<p class="text-center" style="font-size: 25px; " >Silahkan Buat Akun Untuk Berbelanja Ditoko Kami</p>
<hr>

  <div class="card bg-light" style="height: 380px;">
<article class="card-body mx-auto" style="width: 450px;">
	<h4 class="card-title mt-3 text-center">Buat Akun</h4>
	<form method="post">
	<div class="form-group input-group">
        <input type="text" name="nama" required class="form-control" placeholder="Nama Lengkap" type="text">
    </div>
    <div class="form-group input-group">
        <input type="email" name="email" required class="form-control" placeholder="Email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<input type="password" name="password" required class="form-control" minlength="8" placeholder="Password">
    </div>
      <div class="form-group input-group">
        <input class="form-control"  required placeholder="Nomor HP" name="telepon" type="text">
    </div>
    <div class="form-group input-group">
      <textarea placeholder="Alamat Lengkap" required name="alamat" class="form-control"></textarea>
    </div>
  </div>
    <div class="form-group">
        <button class="btn btn-dark btn-block" name="daftar"> Buat Akun  </button>
    </div>
</form>
<p class="text-center">Sudah Punya Akun? <a href="login.php">Silahkan Login</a> </p>


<?php
if (isset($_POST['daftar'])) {
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];

  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
  $yangcocok = $ambil->num_rows;
  if ($yangcocok==1) {
    echo "<script>alert('Email Sudah Digunakan');</script>";
    echo "<script>location='daftar.php';</script>";
  }
  else {
    $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan)
    VALUES ('$email','$password','$nama','$telepon','$alamat')");
    echo "<script>alert('Pendaftaran Sukses! Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
  }
}
 ?>
</article>
</div>
</div>

<br><br>
  </body>
</html>
