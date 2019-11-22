<?php 
session_start();

include '../koneksi.php';

$edit = $_GET['edit'];
$query	="SELECT * FROM hubungi_kami WHERE id='$edit' ";
$execute =mysqli_query($koneksi,$query); 
$data 	=mysqli_fetch_assoc($execute);

if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $email =$_POST['email'];
    $nohp =$_POST['nohp'];
    $pesan =$_POST['pesan'];

	$query 	= "UPDATE hubungi_kami SET nama='$nama',email='$email',no_hp='$nohp',pesan='$pesan' WHERE id='$edit'";
	$execute = mysqli_query($koneksi, $query);

	if($execute){
		echo '<script>
				alert("Berhasil Mengubah Data");
				window.location = "./index.php?page=kontak-kami";
				</script>';
	}else{
			echo '<script>
				alert("Gagal Mengubah Data");
				window.history.back();
				</script>';
	}
}

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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/pricing.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Hotel E&Y</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php">Beranda</a>
        <a class="p-2 text-dark" href="fasilitas.php">Fasilitas</a>
        <a class="p-2 text-dark" href="kamar.php">Kamar</a>
        <a class="p-2 text-dark" href="kontak.php">Kontak</a>
      </nav>
      <a class="btn btn-outline-primary" href="#">Sign up</a>
    </div>
<!--kontak-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form method="POST" action="">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputnama4">Nama</label>
      <input type="text" name="nama" class="form-control" id="inputnama4" placeholder="Nama" required value="<?php echo $data['nama'] ?>"><br>
    </div>
    <div class="form-group col-md-4">
      <label for="inputemail4">Email</label>
        <input type="Email" name="email" class="form-control" id="inputemail4" placeholder="Email" required value="<?php echo $data['email'] ?>"><br>
    </div>
    <div class="form-group col-md-4">
      <label for="inputnohp">No Hp</label>
      <input type="text" name="nohp" class="form-control" id="inputemail4" placeholder="no hp anda.." required value="<?php echo $data['no_hp'] ?>"><br>
    </div>
    <div class="form-group col-md-12">
      <label for="inputpesan">pesan</label>
     <!--  <input type="input" name="message" <textareae   name="message" style="width:700px; height:60px;" class="form-control" id="inputpesan" placeholder="pesan...." required=""> </textarea>

 -->
    <textarea class="form-control" name="pesan" id="inputpesan" rows="3" placeholder="pesan...." name="pesan" ><?php echo $data['pesan'] ?></textarea>
  </div>

     </div>


     <button class="btn btn-primary" name="kirim">kirim</button>




  </div>
</form>

    </div>
  </div>

</div>


</body>
</html>