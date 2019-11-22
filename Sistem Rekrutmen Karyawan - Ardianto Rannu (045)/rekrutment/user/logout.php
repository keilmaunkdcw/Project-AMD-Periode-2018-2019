<?php
session_start();
if(!isset($_SESSION['user']) && !isset($_SESSION['pass']))
{
header('location: ../index.php');
}

unset($_SESSION['user']);
unset($_SESSION['pass']);

unset($_SESSION['nama']);
unset($_SESSION['tgllahir']);
unset($_SESSION['email']);
unset($_SESSION['nik']);
unset($_SESSION['nohp']);
unset($_SESSION['alamat']);
unset($_SESSION['agama']); 

header('location: ../login.php');
?>