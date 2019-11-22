<?php  
if (!isset($_SESSION['email_member']) && !isset($_SESSION['level_member'])) {
  echo '<script> alert ("anda harus login");
      window.location = "./index.php?page=login";</script>';
}
include'./koneksi.php';
$query=mysqli_query($koneksi,"SELECT * FROM kamar");

if(isset($_POST['Booking'])){
  $harga = mysqli_query($koneksi,"SELECT * FROM kamar WHERE id='".$_POST['Jenis']."'");
  $ambil_harga = mysqli_fetch_assoc($harga);

  // $Tanggal1 = $_POST['Tanggal1'];
  $Tanggal2 = $_POST['Tanggal2'];
  $Jenis = $_POST['Jenis'];
  $jumlah = $_POST['jumlah'];
  $user_id =  $_SESSION['id'];
        $awal  = date_create();
        $akhir = date_create($Tanggal2);
        $diff  = date_diff( $awal, $akhir );
        $hari = $diff->d+=1;
        
  $total = $jumlah * $ambil_harga['harga'] * $hari;


  $query_cek_user = mysqli_query($koneksi,"INSERT INTO booking (tgl_masuk ,  tgl_keluar ,  kamar_id ,jumlah_kamar,user_id, total_bayar )
                                             VALUES (now(),'$Tanggal2','$Jenis','$jumlah',$user_id,$total)");

    if ($query_cek_user) {
      echo'<script>alert("berhasil Menambah Data"); window.location="index.php?page=history-booking";</script>';

    }else{
        echo "<script>alert('Cek kembali data yang dimasukkan!')</script>";
    }
}


?>


<div class="container">
<div class="rows">
<form action="" method="post">
  <!-- <div class="form-group">
    <label for="Tanggal">Tanggal Masuk</label>
    <input type="date" class="form-control" id="Tanggal" name="Tanggal1" required>
  </div> -->
   <div class="form-group">
    <label for="Tanggal">Tanggal Keluar</label>
    <input type="date" class="form-control" id="Tanggal" name="Tanggal2"  required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Jenis Kamar</label>
    <select class="form-control" id="exampleFormControlSelect1" required name="Jenis">
      <?php 
        while ($data = mysqli_fetch_assoc($query)){
            echo "<option value=".$data['id'].">".$data['nama'].'| RP. '.$data['harga']."</option>";
        }
       ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="nomor">Berapa Kamar</label>
    <input type="number" name="jumlah" min="1" class="form-control" id="nomor" required>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="Booking">Booking</button>
  </div>
</div>
</div>
</form>