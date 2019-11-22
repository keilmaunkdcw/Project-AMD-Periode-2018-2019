<?php 
include '../koneksi.php';
$id =$_GET['id'];
$id_booking =$_GET['id-booking'];

$query= mysqli_query($koneksi,"UPDATE konfirmasi_bayar SET status='1' WHERE id='$id' ");
if ($query) {
	 mysqli_query($koneksi,"UPDATE booking SET status_bayar='2' WHERE id='$id_booking' ");
	 echo'<script>alert("Berhasil Konfirmasi"); window.location="index.php?page=konfirmasi_pembayaran";</script>';
} else {
	 echo'<script>alert("Gagal Konfirmasi"); window.location="index.php?page=konfirmasi_pembayaran";</script>';
}

 ?>