<?php
if (!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login.php';</script>";

}
 ?>

<h2>tambah data</h2>
<form  method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="nama" required >
  </div>
  <div class="form-group">
    <label>Lokasi</label>
    <input type="text" class="form-control" name="lokasi" required>
  </div>
  <div class="form-group">
    <label>Deskripsi</label>
    <textarea class="form-control" name="deskripsi" rows="10" required ></textarea>
  </div>
  <div class="form-group">
    <label>Foto</label>
    <input type="file" class="form-control" name="file"  >
  </div>
  <div class="form-group">
    <label>Maps</label>
    <input type="text" class="form-control" name="maps" required >
  </div>
  <!-- <button class="btn btn-primary" name="save">simpan</button> -->
  <input type="submit" name="submit" value="submit">

</form>

<?php

if (isset($_POST['submit']))
{
  $nama = $_FILES['file']['name'];
  $lokasi = $_FILES['file']['tmp_name'];
  move_uploaded_file($lokasi,"../foto_lokasi/".$nama);

  $namalokasi = $_POST['nama'];
  $hargalokasi = $_POST['lokasi'];
  $fotolokasi = $nama;
  $descriptionlokasi = $_POST['deskripsi'];
  $maps = $_POST['maps'];

  $sql = "INSERT INTO wisata(nama, lokasi, foto_lokasi,  deskripsi, maps)
          VALUES ('$namalokasi', '$hargalokasi', '$fotolokasi', '$descriptionlokasi', '$maps')";

  if($koneksi->query($sql)){
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data'>";
  }else{
    echo "<div class='alert alert-danger'>data gagal tersimpan</div>";
  }
}
 ?>
