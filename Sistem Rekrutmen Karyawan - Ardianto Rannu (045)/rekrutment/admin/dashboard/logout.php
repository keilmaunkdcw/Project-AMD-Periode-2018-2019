<?php
session_start();
if(!isset($_SESSION['nama_admin']) && !isset($_SESSION['password']))
{
header('location: index.php');
}

unset($_SESSION['nama_admin']);
unset($_SESSION['password']); 

echo "<script>alert('Terima kasih, Anda Berhasil Logout')</script>";
echo "<meta http-equiv='refresh' content='1 url=..index.php'>";
header('location: ../index.php');
?>