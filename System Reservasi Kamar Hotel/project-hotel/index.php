<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>hotelE&Y</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/pricing.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
  </head>

  <body>

    <!-- Navigasi Start -->
    <?php 
    include "theme/navbar.php ";

     ?>

    <!-- end Navigasi -->


    <!--Start content  -->
    <?php
          $page = (isset($_GET['page']) ? $_GET['page']:'');
          if ($page == 'beranda') {
            include "beranda.php";
          }
          elseif ($page=='kamar2') {
            include 'kamar.php';
          }
          elseif ($page == 'fasilitas') {
            include "fasilitas.php";
          }
          elseif ($page == 'hubungi-kami') {
            include "kontak.php";
          }
          elseif ($page == 'registrasi') {
            include "registrasi.php";
          }
          elseif ($page == 'form-booking') {
            include "form_booking.php";
          }
          elseif ($page == 'login') {
            include "./login.php";
          }
          elseif ($page == 'history-booking') {
            include "./history-booking.php";
          }
          elseif ($page == 'konfirmasi-bayar') {
            include "./konfirmasi_pembayaran.php";
          }
          elseif ($page == 'lihat-konfirmasi') {
            include "./lihat_konfirmasi.php";
          }
          else{
            include "beranda.php";
          }

            ?>

<!-- <div class="container">
<div class="row">
<div class="col-md-12">
 -->
    <!--End content -->
<!-- </div>
</div>
</div> -->
<script type="text/javascript" src="./js/bootstrap.min.js"></script>
  </body>
</html>
