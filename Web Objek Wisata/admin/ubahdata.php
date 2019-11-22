<h2>Ubah Data Wisata</h2>
<?php
if (!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login.php';</script>";

}
$ambil=$koneksi->query("SELECT * FROM wisata WHERE id ='$_GET[id]'");
$pecah= $ambil->fetch_assoc();
 ?>

 <form method="post" enctype="multipart/form-data">
   <div class="form-group">
     <label>Nama</label>
     <input type="text" class="form-control" name="nama" required value="<?php echo $pecah['nama']; ?>">
   </div>
   <div class="form-group">
     <label>Lokasi</label>
     <input type="text" class="form-control" name="lokasi" required value="<?php echo $pecah['lokasi']; ?>">
   </div>
   <div class="form-group">
     <label>Deskripsi</label>
     <textarea class="form-control" name="deskripsi" rows="10" required><?=$pecah['deskripsi']; ?></textarea>
   </div>
   <div class="form-group">
     <label>Maps</label>
     <textarea class="form-control" name="maps" rows="10" required><?=$pecah['maps']; ?></textarea>
   </div>
   <div class="form-group">
     <img src="../foto_lokasi/<?=$pecah['foto_lokasi']; ?>" alt="">
   </div>
   <div class="form-group">
     <label>ganti foto</label>
     <input type="file" class="form-control" name="file">
   </div>
   <!-- <button class="btn btn-primary" name="save">simpan</button> -->
   <input type="submit" name="submit" value="ubah" class="btn btn-primary">


 </form>

 <?php

 if (isset($_POST['submit']))
 {
   $nama = $_POST['nama'];
   $lokasi = $_POST['lokasi'];
   $description = $_POST['deskripsi'];
   $maps = $_POST['maps'];

   if($_FILES['file']['size'] !== 0){
     unlink("../foto_lokasi/".$pecah['foto_lokasi']);
     $nama = $_FILES['file']['name'];
     $lokasi = $_FILES['file']['tmp_name'];
     move_uploaded_file($lokasi, "../foto_lokasi/".$nama);

     $fotolokasi = $nama;
     $sql = "UPDATE wisata SET nama = '$nama', lokasi = '$lokasi', foto_lokasi = '$fotolokasi' ,  deskripsi = '$description' , maps = '$maps' WHERE id = '$pecah[id]'";
  }else{
    $sql = "UPDATE wisata SET nama = '$nama', lokasi = '$lokasi',  deskripsi = '$description' , maps = '$maps' WHERE id = '$pecah[id]'";
  }
  echo $sql;

   if($koneksi->query($sql)){
     echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=data'>";
   }else{
     echo $koneksi->error;
     echo "<div class='alert alert-danger'>data gagal tersimpan</div>";
   }
 }
  ?>
