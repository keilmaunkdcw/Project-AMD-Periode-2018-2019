<?php

session_start();
include 'koneksi.php';
 // <!-- jika tidak ada user login -->
  if (!isset($_SESSION['pelanggan'])) {
    echo "<script>alert('Silahkan Login Dulu');</script>";
    echo "<script>location='login.php';</script>";
  }
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
     <!-- Bootstrap core CSS -->
     <link href="./vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="./css/shop-homepage.css" rel="stylesheet">

   </head>
   <body>
<!-- Navigation -->
<nav class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <!-- <a class="navbar-brand" href="#"><img src="#"></a> -->
  <div class="container">
    <a class="nav-linknew" href="index.php">Beranda</a>
    <a class="nav-linknew" href="keranjang.php">Keranjang</a>
    <a class="nav-linkaktif" href="checkout.php">Checkout</a>
    <a class="nav-linknew" href="cekpembayaran.php">Cek Pembayaran</a>
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
     <section class="konten">
       <div class="container">
         <br>
         <h1><center>CHECKOUT</center></h1>
         <hr>
         <table class="table">
       <thead class="thead-dark">
         <tr>
           <th scope="col">No</th>
           <th scope="col">Produk</th>
           <th scope="col">Harga</th>
           <th scope="col">Jumlah</th>
           <th scope="col">Subtotal</th>
         </tr>
       </thead>
       <tbody>
         <?php $totalbelanja=0; ?>
         <?php $nomor=1; ?>
         <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) { ?>
           <!-- menampilkan produk yang dbeli -->
           <?php
           $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
           $pecah = $ambil->fetch_assoc();
           $subharga = $pecah["harga_produk"] * $jumlah;
            ?>
         <tr>
           <th scope="row"><?php echo $nomor; ?></th>
           <td><?php echo $pecah["nama_produk"]; ?></td>
           <td><?php echo number_format($pecah["harga_produk"]); ?> </td>
           <td><?php echo $jumlah ?></td>
           <td><?php echo number_format($subharga); ?></td>
         </tr>
       <?php $nomor++; ?>
       <?php $totalbelanja+=$subharga; ?>
       <?php } ?>
       </tbody>
       <tfoot>
         <tr>
           <th colspan="4">Total Belanja</th>
           <th>Rp. <?php echo number_format($totalbelanja); ?> </th>
         </tr>
       </tfoot>
     </table>

     <form method="post">
       <div class="row">
         <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>">
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" readonly value="<?php echo $_SESSION['pelanggan']['email_pelanggan']; ?>">
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan']; ?>">
            </div>
         </div>
       </div>
          <div class="form-group">
            <input type="text" class="form-control" readonly value="<?php echo $_SESSION['pelanggan']['alamat_pelanggan']; ?>">
          </div>
      <button class="btn btn-dark" name="checkout">Checkout</button>
     </form>
     <br>
     <div class="alert alert-secondary" role="alert">
       Ongkos Kirim Ditanggung Pembeli Dan Dibayar Ditempat Saat Barang Datang!!
     </div>

     <?php
     if (isset($_POST['checkout'])) {
       $id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
       $tanggal_pembelian = date("Y-m-d");

       // simpan data ke tabel
       $koneksi->query("INSERT INTO pembelian (id_pelanggan,tanggal_pembelian,status_pembelian,total_pembelian)
          VALUES ('$id_pelanggan','$tanggal_pembelian','Tidak Disetujui','$totalbelanja') ");

      //mendapatkan id pembelian barusan terjadi
      $id_pembelian_barusan = $koneksi->insert_id;

      foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,jumlah)
        VALUES ('$id_pembelian_barusan','$id_produk','$jumlah')");

      }
      //mengkosongkan keranjang
      unset($_SESSION['keranjang']);
      // lalu alihkan tampilan ke halaman nota
      echo "<script>alert('Pembelian Sukses');</script>";
      echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
     }
      ?>

   </div>
</section>

   </body>
 </html>
