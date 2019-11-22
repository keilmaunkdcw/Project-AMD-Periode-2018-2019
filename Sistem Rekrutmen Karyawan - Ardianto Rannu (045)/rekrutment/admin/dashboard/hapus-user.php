<?php

include 'koneksi.php';

	$hapus		= $_GET['hapus']; //dari url hapus=1
	$query		= "delete from user where id = ".$hapus;
	$hapusdata	= mysqli_query($koneksi, $query);

	if ($hapusdata) {
		echo '<script>
				alert("Berhasil Menghapus Data User");
				window.location = "user.php";
				</script>';

	} else echo  '<script>
				alert("Gagal Menghapus Data");
				window.history.back();
				</script>';
?>