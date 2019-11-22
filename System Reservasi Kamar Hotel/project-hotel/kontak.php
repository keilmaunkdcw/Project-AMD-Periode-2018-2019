<?php
include './koneksi.php';
if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $email =$_POST['email'];
    $nohp =$_POST['nohp'];
    $pesan =$_POST['pesan'];
  
    $query_cek_user = mysqli_query($koneksi,"INSERT INTO hubungi_kami (nama, email, no_hp, pesan)
                                              VALUES ('$nama','$email','$nohp','$pesan')");

    if ($query_cek_user) {
      echo'<script>alert("berhasil Menambah Data"); window.location="./index.php?page=hubungi-kami";</script>';

    }else{
        echo "<script>alert('Cek kembali data yang dimasukkan!')</script>";
    }
}
?>

<!-- Bootstrap core CSS -->
    <!-- <link href="./css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <!-- <link href="./css/sign.css" rel="stylesheet"> -->
<!--kontak-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form method="POST" action="">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputnama4">Nama</label>
      <input type="text" name="nama" class="form-control" id="inputnama4" placeholder="Nama" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputemail4">Email</label>
      <input type="Email" name="email" class="form-control" id="inputemail4" placeholder="Email" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputnohp">No Hp</label>
      <input type="text" name="nohp" class="form-control" id="inputnohp" placeholder="nomor Hp" required onkeypress="return hanyaAngka(event)">
    </div>
    <div class="form-group col-md-12">
      <label for="inputpesan">pesan</label>
     <!--  <input type="input" name="message" <textareae   name="message" style="width:700px; height:60px;" class="form-control" id="inputpesan" placeholder="pesan...." required=""> </textarea>

 -->
    <textarea class="form-control" name="pesan" id="inputpesan" rows="3" placeholder="pesan...." name="pesan"></textarea>
  </div>

     </div>


     <button class="btn btn-primary" name="kirim">kirim</button>




  </div>
</form>
<script>
  function hanyaAngka(evt){
    var charCode = event.keyCode;
    if (charCode > 31 &&(charCode < 48 || charCode > 57 ))
        return false;
      return true;
    }
</script>
    </div>
  </div>

</div>





<!-- <textarea name="message" style="width:700px; height:60px;">The cat was playing in the garden.
</textarea> -->