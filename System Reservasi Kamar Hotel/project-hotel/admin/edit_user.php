<?php 

include '../koneksi.php';

$edit = $_GET['edit'];
$query	="SELECT * FROM user WHERE id='$edit' ";
$execute =mysqli_query($koneksi,$query); 
$data 	=mysqli_fetch_assoc($execute);

if(isset($_POST['Ubah'])){ 
	$nama	=$_POST['nama']; 
	$email	=$_POST['email'];
	$password = md5($_POST['password']);
	if ($_POST['password'] != '') {
		$query 	= "UPDATE user SET nama='$nama',email='$email',password='$password' WHERE id='$edit'";
	}else{
		$query 	= "UPDATE user SET nama='$nama',email='$email' WHERE id='$edit'";
	}
	$execute = mysqli_query($koneksi, $query);

	if($execute){
		echo '<script>
				alert("Berhasil Mengubah Data");
				window.location = "index.php?page=user";
				</script>';
	}else{
			echo '<script>
				alert("Gagal Mengubah Data");
				window.history.back();
				</script>';
	}
}

?>

<form class="form-signin" action="" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Silahkan Edit registrasi</h1>
      <label for="inputnama" class="sr-only">Nama</label>
      <input type="name" name="nama" id="inputnama" class="form-control" placeholder="Nama Anda..." required autofocus value="<?php echo $data['nama'] ?>"><br>
      <label for="inputemail" class="sr-only">Email</label>
      <input type="Email" name="email" id="inputPassword" class="form-control" placeholder="Email Anda..." required value="<?php echo $data['email'] ?>"><br>
      
      <label for="inputPassword" class="sr-only">Kata Sandi</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Kata Sandi Anda.." value=""><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="Ubah">Ubah</button>
      <p class="col-md-12  mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form>
