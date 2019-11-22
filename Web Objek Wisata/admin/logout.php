<?php
session_start();

echo "<script>alert('anda telah logout')</script>";
echo "<script>location='login.php';</script>";

session_destroy();
?>
