<?php 
if (!isset($_SESSION['email_member']) && !isset($_SESSION['level_member'])) {
  echo '<script> alert ("anda harus login");
      window.location = "./index.php?page=login";</script>';
}
include'./koneksi.php';
$query  ="SELECT * FROM `konfirmasi_bayar` WHERE booking_id='".$_GET['id-booking']."' ORDER BY id DESC";
$execute = mysqli_query($koneksi,$query);
$data = mysqli_fetch_assoc($execute);

$query2  ="SELECT total_bayar,jumlah_kamar,kamar_id FROM `booking` WHERE id='".$_GET['id-booking']."' ORDER BY id DESC";
$execute2 = mysqli_query($koneksi,$query2);
$data2 = mysqli_fetch_assoc($execute2);

$query3  ="SELECT nama FROM `kamar` WHERE id='".$data2['kamar_id']."' ORDER BY id DESC";
$execute3 = mysqli_query($koneksi,$query3);
$data3 = mysqli_fetch_assoc($execute3);
?>



<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo date("d-m-Y", strtotime($data['tanggal']));?>">
          </div>
        </div>
        
        <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nama Rekening</label>
              <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data['nama_pengirim']?>">
              </div>
        </div>

          <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Rekening</label>
              <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data['no_req']?>">
              </div>
          </div>    

          <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Nama Kamar</label>
              <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data3['nama']?>">
              </div>
          </div>



          <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Total Kamar</label>
              <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data2['jumlah_kamar']?>">
              </div>
          </div>

          <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Total Bayar</label>
              <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data2['total_bayar']?>">
              </div>
          </div>
      
          <!-- <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Nomor Rekening</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $data['']?>">
          </div> -->
        
            <div>
              <a href="index.php?page=history-booking" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        

      </form>
    </div>
  </div>
</div>