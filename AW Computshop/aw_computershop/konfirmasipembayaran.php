<?php
session_start();
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
<br>

<?php
$keyword = $_GET['keyword'];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
          ON pembelian.id_pelanggan = pelanggan.id_pelanggan
          WHERE pembelian.id_pembelian ='$keyword' AND status_pembelian='Disetujui'");
$detail = $ambil->fetch_assoc();
 ?>

     <section class="konten" >
       <div class="container">
         <h1><center>ID PEMBAYARAN : <?php echo $keyword; ?></center></h1>
         <hr>
         <?php if ($detail) { ?>
             <div class="alert alert-info">
              <p>
              <center>
               <strong>SELAMAT PEMBAYARAN ANDA TELAH DISETUJUI</strong> <hr>
               Pelanggan Atas Nama <?php echo $detail['nama_pelanggan']; ?><br>
               Total Pembelian Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
               Paket Anda Akan Segera Dikirimkan Ke <?php echo $detail['alamat_pelanggan']; ?>
             </p>
         </div>
     <?php } else { ?>
       <div class="alert alert-danger">
        <p>
        <center>
         <strong>ID Pembayaran Anda Tidak Ditemukan</strong>
       </p>
     <?php } ?>
       </div>
     </section>

   </body>
 </html>
