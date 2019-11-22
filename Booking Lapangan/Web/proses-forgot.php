<?php
 include 'cf.php';
 if (isset($_POST['btnReset'])) 
 {
  $email = $_POST['email'];
  $cek = mysqli_query($con, "SELECT email FROM admin WHERE email = '$email' ");
  if (mysqli_num_rows($cek) == 1 ) 
  {
   $password   = $_POST['password'];
   $repassword = $_POST['repassword'];
   if($password != $repassword)
   {
    ?>
     <script>
      alert("Inputan password tidak sama");
      window.location.href = 'index.php';
     </script>
    <?php
   }else
   {
    $pwd = password_hash($password, PASSWORD_DEFAULT);
    $sql = mysqli_query($con, "UPDATE admin SET password = '$pwd' WHERE email = '$email' ");
    if ($sql) 
    {
     ?>
      <script>
       alert("Password telah di perbarui");
       window.location.href = 'index.php';
      </script>
     <?php
    }else
    {
     ?>
      <script>
       alert("Password gagal diperbaharui");
      </script>
     <?php
    }
   }
  }else
  {
   ?>
    <script>
     alert("Pastikan username yang anda masukan benar!");
     window.location.href = 'index.php';
    </script>
   <?php
  }
 }
?>