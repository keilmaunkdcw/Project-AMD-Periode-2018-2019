<?php
include '../koneksi.php';
$hapus	=$_GET['hapus'];
$query	="DELETE FROM kamar WHERE id=".$hapus;
$hapusdata	=mysqli_query($koneksi,$query);
if ($hapusdata){
	echo '<script>
		alert("berhasil menghapus data");
		window.location="index.php?page=kamar";
		</script>';
}else
echo '<script>
	alert("gagal menghapus data");
	window.history.back();
	</script>';
?>