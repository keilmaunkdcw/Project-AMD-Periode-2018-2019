<?php 
include'../koneksi.php';
if(isset($_POST['kirim'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $nohp = $_POST['nohp'];
  // $level= $_POST['level'];
  $query_cek_user = mysqli_query($koneksi,"INSERT INTO hubungi_kami (nama, email, no_hp )
                                              VALUES ('$nama','$email','$nohp')");

    if ($query_cek_user) {
      echo'<script>alert("berhasil Menambah Data"); window.location="./index.php?page=kontak-kami";</script>';

    }else{
        echo "<script>alert('Cek kembali data yang dimasukkan!')</script>";
    }
}
?>

<!-- Bootstrap core CSS -->
     <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!-- SS -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
              <form class="form-signin" action="" method="post">
      <h1 class="h3 mb-3 font-weight-normal text-center">Silahkan registrasi</h1>
      <label for="inputnama" class="sr-only">Nama</label>
      <input type="name" name="nama" id="inputnama" class="form-control" placeholder="Nama Anda..." required autofocus>
      <label for="inputemail" class="sr-only">Email</label>
      <input type="Email" name="email" id="inputPassword" class="form-control" placeholder="Email Anda..." required>
      
      <label for="inputPassword" class="sr-only">No Hp</label>
      <input type="text" name="nohp" id="inputPassword" class="form-control" placeholder="No hp Anda..." required>

</div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="kirim">kirim</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form>
     </div>
    </div>
  </div>

