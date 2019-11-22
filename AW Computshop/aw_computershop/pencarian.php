<?php
session_start();
include 'koneksi.php';
 ?>
 <?php
$keyword = $_GET['keyword'];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
  $semuadata[]=$pecah;
}
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>AW Computershop</title>
    <link rel="icon" href="icon.png">
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
    <a class="nav-linknew" href="index.php">Beranda</a>
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
      <h1><center>HASIL PENCARIAN : <?php echo $keyword; ?></center></h1>
      <hr>
      <?php
      if (empty($semuadata)) {?>
        <div class="alert alert-danger"> Pencarian <?php echo $keyword; ?> Tidak Ditemukan

        </div>
      <?php } ?>
        <div class="row">
          <!-- /.col-lg-3 -->
            <div class="row"> 
              <?php foreach ($semuadata as $key => $value) {?>
              <div style="max-width: 400px; min-width: 250px;" class="col-lg-3 col-md-5 mb-3">
                <div class="card h-100">
                  <img class="card-img-top" src="image/produk/<?php echo $value['foto_produk']; ?>" alt="">
                  <div class="card-body">
                    <h5><?php echo $value["nama_produk"]; ?> </h5>
                    <h6>Rp. <?php echo number_format($value['harga_produk']); ?></h6>
                  </div>
                  <div class="card-footer">
                      <a href="beli.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-dark" style=" width: 60px;" >Beli</a>
                      <a href="detail.php?id=<?php echo $value["id_produk"]; ?>" class="btn btn-light"> Detail </a>
                  </div>
                </div>
              </div>
            <?php } ?>

            </div>
          </div>
        </div>
    </section>
