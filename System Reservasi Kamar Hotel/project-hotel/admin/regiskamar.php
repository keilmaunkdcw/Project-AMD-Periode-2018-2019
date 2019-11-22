<?php 
include'../koneksi.php';
if(isset($_POST['Setuju'])){
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];

  $query_cek_user = mysqli_query($koneksi,"INSERT INTO kamar (nama, harga)
                                              VALUES ('$nama','$harga')");

    if ($query_cek_user) {
      echo'<script>alert("berhasil Menambah Data"); window.location="index.php?page=kamar";</script>';

    }else{
        echo "<script>alert('Cek kembali data yang dimasukkan!')</script>";
    }
}
?>
 <!-- Bootstrap core CSS -->
    <!-- <link href="../css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
<!--     <link href="../css/sign.css" rel="stylesheet"> -->

<div class="container">
  <div class="row">
    <div class="col-md-12">
              <form class="form-signin" action="" method="post">
      <h1 class="h3 mb-3 font-weight-normal text-center">Silahkan Regis Kamar</h1>
      <label for="inputnama" class="sr-only">Nama</label>
      <input type="name" name="nama" id="inputnama" class="form-control" placeholder="Nama Kamar..." required autofocus>
      <label for="inputharga" class="sr-only">Harga</label>
      <input type="text" name="harga" id="inputharga" class="form-control" placeholder="Harga..." required>
      <button class="btn btn-lg btn-primary btn-block" type="" name="Setuju">Setuju</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form>
     </div>
    </div>
  </div>

