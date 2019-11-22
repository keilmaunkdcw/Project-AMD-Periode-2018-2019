<?php
session_start();
include '../koneksi.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query_cek_user = mysqli_query($koneksi,"SELECT * FROM user WHERE email='".$email."' AND password='".$password."'");

    $count = mysqli_num_rows($query_cek_user);
    $data_user = mysqli_fetch_array($query_cek_user);

    if ($count == 1) {
      //pendeklarasian variable SESSION
      $_SESSION['email'] = $data_user['email'];
      $_SESSION['level'] = $data_user['level'];

      header("location: ./index.php");
    }else{
        echo "<script>alert('Cek kembali data yang dimasukkan!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>log in hotel E&Y</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sign.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      <p class="mt-2 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
  </body>
</html>
