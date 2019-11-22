<?php 

include '../koneksi.php';

$edit = $_GET['edit'];
$query	="SELECT * FROM kamar WHERE id='$edit' ";
$execute =mysqli_query($koneksi,$query); 
$data 	=mysqli_fetch_assoc($execute);

if(isset($_POST['Ubah'])){ 
	$nama	=$_POST['nama']; 
	$harga	=$_POST['harga'];
	$query 	= "UPDATE kamar SET nama='$nama' , harga='$harga' WHERE id='$edit'";
	$execute = mysqli_query($koneksi, $query);

	if($execute){
		echo '<script>
				alert("Berhasil Mengubah Data");
				window.location = "index.php?page=kamar";
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
      <h1 class="h3 mb-3 font-weight-normal">Silahkan Edit Kamar</h1>
      <label for="inputnama" class="sr-only">Nama</label>
      <input type="name" name="nama" id="inputnama" class="form-control" placeholder="Nama Kamar..." required autofocus value="<?php echo $data['nama'] ?>"><br>
      <label for="inputharga" class="sr-only">Harga</label>
      <input type="text" name="harga" id="inputharga" class="form-control" placeholder="Harga..." required value="<?php echo $data['harga'] ?>"><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="Ubah">Ubah</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
