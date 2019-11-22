<?php
session_start();
include 'koneksi.php';

$id_produk = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AW Computershop</title>
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href=".css">
    <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./css/shop-homepage.css" rel="stylesheet">
  </head>
  <body>
<!-- Navigation -->
<nav class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<!-- navbar -->
  <div class="container">
 <?php if (isset($_SESSION['pelanggan'])) : ?>
    <a class="nav-linkaktif" href="index.php">Beranda</a>
    <a class="nav-linknew" href="keranjang.php">Keranjang</a>
    <a class="nav-linknew" href="checkout.php">Checkout</a>
    <a class="nav-linknew" href="cekpembayaran.php">Cek Pembayaran</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <form action="pencarian.php" method="get" class="form-inline">
          <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Cari Disini" aria-label="Search">
          <button class="btn  btn-outline-light my-2 my-sm-0">Cari</button>
        </form>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" >Logout</a>
        </li>
  <?php else : ?>
    <a class="nav-linkaktif" href="index.php">Beranda</a>
    <a class="nav-linknew" href="keranjang.php">Keranjang</a>
    <a class="nav-linknew" href="checkout.php">Checkout</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <form action="pencarian.php" method="get" class="form-inline">
          <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Cari Disini" aria-label="Search">
          <button class="btn  btn-outline-light my-2 my-sm-0">Cari</button>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar.php" >Daftar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" >Login</a>
      </li>
   <?php endif ?>
      </ul>
    </div>
  </div>
</nav>

<br>

<section class="konten">
  <div class="container">
    <div class="row">
      <div style="margin-top: 50px" class="col-md-6">
        <img src="image/produk/<?php echo $detail['foto_produk']; ?>" alt="" class="img-responsive" width="500px">
      </div>
      <div class="col-md-6">
        <br><br>
        <h2><?php echo $detail['nama_produk']; ?></h2>
        <h4>Rp. <?php echo number_format($detail['harga_produk']); ?></h4>
        <form method="post">
          <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Masukkan Jumlah"min="1" aria-describedby="button-addon2" name="jumlah">
            <div class="input-group-append">
              <button class="btn btn-outline-dark" id="button-addon2" name="beli">Beli</button>
            </div>
          </div>
        </form>
        <!-- jika dipencet tombol beli -->
        <?php
        if (isset($_POST['beli'])) {
          // mendapatkan jumlah yang diinputkan
          $jumlah = $_POST['jumlah'];
          // masukkan di keranjang
          $_SESSION['keranjang'][$id_produk] = $jumlah ;

          echo "<script>alert('Produk Masuk Ke Keranjang Anda');</script>";
          echo "<script>location='keranjang.php';</script>";
        } ?>
        <p><?php echo $detail['deskripsi_produk']; ?></p>
      </div>

    </div>
  </div>
</section>

  </body>
</html>
