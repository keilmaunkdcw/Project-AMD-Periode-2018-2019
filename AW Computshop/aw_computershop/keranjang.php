<?php

session_start();

// echo "<pre>";
// print_r($_SESSION['keranjang']);
// echo "</pre>";

include 'koneksi.php';
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])) {
  echo "<script> alert('Keranjang Kosong');</script>";
  echo "<script>location='index.php';</script>";
}

 ?>
 <!DOCTYPE html>
 <html>
   <head>
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
    <a class="nav-linknew" href="index.php">Beranda</a>
    <a class="nav-linkaktif" href="keranjang.php">Keranjang</a>
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
    <a class="nav-linkaktif" href="keranjang.php">Keranjang</a>
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


<section class="konten">
  <div class="container">
    <br>
    <h1><center>KERANJANG BELANJA</center></h1>
    <hr>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Subtotal</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) { ?>
      <!-- menampilkan produk yang dbeli -->
      <?php
      $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
      $pecah = $ambil->fetch_assoc();
      $subharga = $pecah["harga_produk"] * $jumlah;
       ?>
    <tr>
      <td><?php echo $pecah["nama_produk"]; ?></td>
      <td><?php echo number_format($pecah["harga_produk"]); ?> </td>
      <td><?php echo $jumlah ?></td>
      <td><?php echo number_format($subharga); ?></td>
      <td>
        <a href="hapuskeranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-sm">Hapus</a>
        <a href="detail.php?id=<?php echo $id_produk; ?>" class="btn btn-dark btn-sm" style=" width: 60px;" >Edit</a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<a href="index.php" class="btn btn-dark">Lanjutkan Belanja</a>
<a href="checkout.php" class="btn btn-light">Checkout</a>

  </div>
</section>

   </body>
 </html>
