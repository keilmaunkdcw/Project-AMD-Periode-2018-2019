<?php 
include'./koneksi.php';
if(isset($_POST['daftar'])){
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

 


    $query_cek_user = mysqli_query($koneksi,"SELECT * FROM user WHERE email='".$email."' AND level='2'");

    $count = mysqli_num_rows($query_cek_user);
    if ($count==1) {
      echo "<script>alert('Email Sudah Digunakan');</script>";
      echo "<script>location='index.php?page=registrasi';</script>";

    }


else{

  $query_cek_user = mysqli_query($koneksi,"INSERT INTO user (nama, email, password, level)
                                             VALUES ('$nama','$email','$password','2')");

   if ($query_cek_user) {
       echo'<script>alert("berhasil Menambah Data"); window.location="index.php?page=login";</script>';

     }else{
         echo "<script>alert('Cek kembali data yang dimasukkan!')</script>";
     }
  
}

}
?>

<!-- Bootstrap core CSS -->
  <!--   <link href="./css/bootstrap.min.css" rel="stylesheet"> -->

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
      
      <label for="inputPassword" class="sr-only">Kata Sandi</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Kata Sandi Anda.." required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="daftar">daftar</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form>
     </div>
    </div>
  </div>


















