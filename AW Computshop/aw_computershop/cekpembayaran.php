<?php
session_start();

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
<!-- Navigation -->
<nav class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <!-- <a class="navbar-brand" href="#"><img src="#"></a> -->
  <div class="container">
    <a class="nav-linknew" href="index.php">Beranda</a>
    <a class="nav-linknew" href="keranjang.php">Keranjang</a>
    <a class="nav-linknew" href="checkout.php">Checkout</a>
    <a class="nav-linkaktif" href="cekpembayaran.php">Cek Pembayaran</a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <form action="pencarian.php" method="get" class="form-inline">
          <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Cari Disini" aria-label="Search">
          <button class="btn  btn-outline-light my-2 my-sm-0">Cari</button>
        </form>
      </li>
      <?php if (isset($_SESSION['pelanggan'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" >Logout</a>
        </li>
    <?php else : ?>
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

    <!-- todo container -->
    <div class="container">
      <br>
     <h1><center>CEK PEMBAYARAN</center></h1>
    	<div class="row">
    		<div style=" margin-top: 20px; margin-left: 415px;" class="text-lg-center">
          <form action="konfirmasipembayaran.php" method="get" class="form-inline">
            <input class="form-control mr-lg-2" style="width: 250px; height: 45px; border-radius: 15px;" type="text" name="keyword" placeholder="Masukkan ID Pembayaran" aria-label="Search">
            <button class="btn  btn-info my-2 my-sm-0" style="width: 60px; height: 45px; border-radius: 15px;">Cari</button>
          </form>
    		</div>
    	</div>
    </div>
  </body>
</html>
