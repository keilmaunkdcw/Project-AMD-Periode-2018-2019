<?php
session_start();
error_reporting(0);
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Explore! Sulawesi Selatan</title><link rel="icon" href="../../icon.png">
    <link rel="stylesheet" href="bootstrap.css">
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <style media="screen">
    .image{
      width: 100%;
      height: 180px;
      overflow: hidden;
    }
    .nama-lokasi{
      min-height: 160px;
    }F
  </style>
  <body class="bg-dark">

  <?php include 'jumbotron.php'; ?>

  <!-- konten -->
  <section class="konten">
    <div class="container">
      <div class="row">
        <div class="container">
            <form method="POST" action="" class="cari">
              <input type="text" name="search" class="form-control" placeholder="cari lokasi"/>
              <input type="submit"  name="cari" value="cari" class="btn btn-primary"/> <br>
              <?php
                $query = $_POST['search'];
              ?>
            </form>
        </div><br>

        <?php 
          $ambil = $koneksi->query("SELECT * FROM wisata");
                if ($query != ''){
                  $ambil = mysqli_query($koneksi, "SELECT *FROM wisata where id like '%".$query."%' or nama like '%".$query."%' or lokasi like '%".$query."%' ");
                }
                else{
                  $ambil = mysqli_query($koneksi, 'SELECT *from wisata where id');
                }
                while($perproduk = $ambil->fetch_assoc()) {
         ?>
          <div class="col-md-4">
            <div class="thumbnail" style="background-color: rgba(59, 59, 59, 0.47);">
              <div class="image">
              <img src= "foto_lokasi/<?php echo $perproduk['foto_lokasi']; ?>" width="100%">
            </div>
              <div class="caption nama-lokasi">
                <h3 style="color: #ECECEC"><?php echo $perproduk['nama']; ?></h3>
                <h5 style="color: #ECECEC">Lokasi <?php echo $perproduk['lokasi']; ?></h5>
                <a href="detail.php?id=<?php  echo $perproduk["id"]; ?>"class="btn btn-default">detail</a>
              </div>
            </div>
          </div>
      <?php } ?>


      </div>
    </div>
  </section>
  </body>
</html>