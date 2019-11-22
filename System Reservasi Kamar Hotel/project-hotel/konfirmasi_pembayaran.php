<?php 
if (!isset($_SESSION['email_member']) && !isset($_SESSION['level_member'])) {
  echo '<script> alert ("anda harus login");
      window.location = "./index.php?page=login";</script>';
}
include'./koneksi.php';
if(isset($_POST['Konfir'])){
  $Tanggal = $_POST['Tanggal1'];
  $nama = $_POST['nama'];
  $norek = $_POST['norek'];
  $booking_id = $_POST['id'];


  $query_cek_user = mysqli_query($koneksi,"INSERT INTO konfirmasi_bayar (tanggal ,  nama_pengirim ,  no_req, booking_id)
                                             VALUES ('$Tanggal','$nama','$norek',$booking_id)");

    if ($query_cek_user) {
      $query=mysqli_query($koneksi,"UPDATE booking SET status_bayar='1' WHERE id=$booking_id");
      echo'<script>alert("berhasil Menambah Data"); window.location="index.php?page=history-booking";</script>';

    }else{
        echo "<script>alert('Cek kembali data yang dimasukkan!')</script>";
    }
}


?>


<div class="container">
<div class="rows">
<form action="" method="post">
  <div class="form-group">
    <label for="Tanggal">Tanggal Pembayaran</label>
    <input type="date" class="form-control" id="Tanggal" name="Tanggal1" required>
    <input type="hidden" name="id" value="<?php echo $_GET['id-booking'] ?>">
  </div>
   <div class="form-group">
    <label for="nama">Nama Pengirim</label>
    <input type="name" class="form-control" id="nama" name="nama"  required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Nomor Rekening</label>
    <input type="text" name="norek" placeholder="norek...." required class="form-control">
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="Konfir">Konfir</button>
  </div>
</div>
</div>
</form>