<?php
session_start();

$koneksi = new  mysqli("localhost","root","","wisata");
$query="SELECT * FROM admin";
$ayam = mysqli_query($koneksi,$query);
$row=mysqli_fetch_array($ayam);
$data=$row['nama'];

if (!isset($_SESSION['admin']))
{
  echo "<script>alert['Anda harus login'];</script>";
  echo "<script>location='login.php';</script>";
  header('location: login.php');
  exit();

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Daftar</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Tambah Admin</h3>
            </div>
            <div class="panel-body">
              <form method="post" class="form-horizontal" >
                <div class="form-group" >
                  <label class="control-label col-md-3">nama</label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="nama"
                    required>
                  </div>
                </div>
                <div class="form-group" >
                  <label class="control-label col-md-3">username</label>
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="username"
                    required>
                  </div>
                </div>
                <div class="form-group" >
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-7">
                    <input type="password" class="form-control" name="password"
                    reqiure>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-7 col-md-offset-3" >
                    <button class="btn btn-primary" name="daftar">Daftar</button>
                  </div>
                </div>

              </form>
              <?php
                if (isset($_POST["daftar"]))
                {
                  $nama = $_POST["nama"];
                  $user = $_POST["username"];
                  $password = $_POST["password"];

                  $password = mysqli_real_escape_string($koneksi, $password);
                    $koneksi->query("INSERT INTO admin (nama,username,password) VALUES ('$nama','$user','$password')");
                    echo "<script>alert('admin  berhasil ditambahkan');</script>";
                    echo "<script>location='login.php'</script>";
                  }
               ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
