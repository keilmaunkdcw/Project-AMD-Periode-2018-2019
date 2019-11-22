<?php
session_start();
if (!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login.php';</script>";

}
echo "string";
$ambil = $koneksi->query("SELECT * FROM wisata WHERE id ='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotolokasi = $pecah['foto_lokasi'];
if (file_exists("../foto_data/$fotolokasi"))
{
  unlink("../foto_lokasi/$fotolokasi");
}

$koneksi->query("DELETE FROM wisata WHERE id ='$_GET[id]'");

echo "<script>alert('data berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=data';</script>";

 ?>
