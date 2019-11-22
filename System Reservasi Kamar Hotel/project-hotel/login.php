<?php
include './koneksi.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query_cek_user = mysqli_query($koneksi,"SELECT * FROM user WHERE email='".$email."' AND password='".$password."' AND level='2'");

    $count = mysqli_num_rows($query_cek_user);
    $data_user = mysqli_fetch_array($query_cek_user);

    if ($count == 1) {
      //pendeklarasian variable SESSION
      $_SESSION['id'] = $data_user['id'];
      $_SESSION['nama'] = $data_user['nama'];
      $_SESSION['level_member'] = $data_user['level'];
      $_SESSION['email_member'] = $data_user['email'];

      header("location: ./index.php?page=beranda");
    }else{
        echo "<script>alert('Cek kembali data yang dimasukkan!')</script>";
    }
}
?>

<!-- Bootstrap core CSS -->
<!--  <link href="./css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- \\Custom styles for this template -->
    <!-- <link href="./css/sign.css" rel="stylesheet"> -->

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="form-signin" action="" method="post">
        <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        <p class="mt-5 text-center text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </div>
</div>