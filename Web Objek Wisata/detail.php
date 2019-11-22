<?php session_start();
 include 'koneksi.php';
 $id_wisata = $_GET['id'];
 $ambil=$koneksi->query("SELECT * FROM wisata WHERE id ='$id_wisata'");
 $detail = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Explore! | Detail Lokasi</title>
     <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="index.css">
   </head>
   <body>
     <?php include 'jumbotron.php'; ?>
        <section class="konten">
          <div class="container" >
            <div class="row" style="background-color: rgba(59, 59, 59, 0.47); box-shadow: 1px 1px 5px 5px rgba(0, 0, 0, 0.39);">
              <div class="col-md-6">
                <br><img src="foto_lokasi/<?php echo $detail["foto_lokasi"]; ?>" alt="" class="img-responsive">
              </div>
              <div class="col-md-6">
                <h1 style="color: #EFEFEF"><?php echo $detail["nama"] ?></h1>
                <h4 style="color: #EFEFEF">Lokasi <?php echo $detail["lokasi"] ?></h4><hr>
                <p style="color: #EFEFEF"><?php echo $detail["deskripsi"]; ?></p><br>
                <p style="color: #EFEFEF">Temukan di Maps :</p>
                <iframe src=<?php echo $detail["maps"]; ?> width="400" height="450" frameborder="0" style="border:0px "zallowfullscreen"></iframe>
              </div>
            </div>
          </div>
        </section>
  </body>
</html>
