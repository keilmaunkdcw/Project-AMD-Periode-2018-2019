<?php
include "koneksi.php";
$nama_admin = $_POST['nama_admin'];
$password = $_POST['password'];
if (empty($nama_admin)){
echo "<script>alert('Nama Admin belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}else if (empty($password)){
echo "<script>alert('Password belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}else{
session_start();
$login_admin = mysql_query("select * from admin where nama_admin='$nama_admin' and password='$password'");
if (mysql_num_rows($login_admin) > 0){
$_SESSION['nama_admin'] = $nama_admin;
$_SESSION['password'] = $password;
header("location: dashboard/index.php");
}else{
echo "<script>alert('Nama atau Password salah')</script>";
echo "<meta http-equiv='refresh' content='1 url=index.php'>";
}
}

?>