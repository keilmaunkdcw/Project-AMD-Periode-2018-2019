
<?php 
if (!isset($_SESSION['email_member']) && !isset($_SESSION['level_member'])) {
  echo '<script> alert ("anda harus login");
      window.location = "./index.php?page=login";</script>';
}

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <caption>Hallo, <strong><?php echo $_SESSION['nama']?></strong>!</caption>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tanggal Masuk</th>
      <th scope="col">Tanggal Keluar</th>
      <th scope="col">Jumlah Hari</th>
      <th scope="col">Kamar</th>
      <th scope="col">Jumlah Kamar</th>
      <th scope="col">Total Bayar</th>
      <th scope="col">Status Pembayaran</th>
      <th scope="col">Bayar</th>
    </tr>

  </thead>
  <tbody>
    <?php
    include './koneksi.php';
    $no=1;
      $query  ="SELECT  bk.id as id_booking,bk.*,km.id as id_kamar,km.nama FROM `booking` `bk` INNER JOIN `kamar` `km` ON `bk`.`kamar_id`=`km`.`id` WHERE `bk`.`user_id`='".$_SESSION['id']."' ORDER BY bk.id DESC";
      $execute = mysqli_query($koneksi,$query);

      while ($data = mysqli_fetch_assoc($execute)){

        $awal  = date_create();
        $akhir = date_create($data['tgl_keluar']);
        $diff  = date_diff( $awal, $akhir );
    ?>
     <tr>
      <td><?php echo $no++;?></td>
      <td><?php echo $data['tgl_masuk'];?></td>
      <td><?php echo $data['tgl_keluar'];?></td>
      <td><?php echo $diff->d+=1;?></td>
      <td><?php echo $data['nama'];?></td>
      <td><?php echo $data['jumlah_kamar'];?></td>
      <td><?php echo $data['total_bayar'];?></td>
      <td>
        <?php 
            if ($data['status_bayar']=='1') {
              echo "Belum Lunas";
            } 
            elseif ($data['status_bayar']=='2') {
              echo "Lunas";
            }
            else {
              echo "Belum Lunas";
            }
            

         ?>
       </td>
      <td>

        <?php 
            if ($data['status_bayar']=='1') {
              echo "Menunggu Konfirmasi Admin";
            } 
            elseif ($data['status_bayar']=='2') {
              echo "<a href='index.php?page=lihat-konfirmasi&id-booking=".$data['id']."'>Lihat Bukti</a>";
            }
            else {
              echo "<a href='index.php?page=konfirmasi-bayar&id-booking=".$data['id']."'>Konfirmasi Bayar</a>";
            }
            

         ?>
      </td>
    </tr>
      <!-- <td>
        <a href="./index.php?page=edit-kamar&edit=<?php echo $data['id'] ?>">Edit</a>
        <a href="./index.php?page=hapus-kamar&hapus=<?php echo $data['id'] ?>">Hapus</a>
      </td> -->
  <?php }?>

  </tbody>
</table>
    </div>
  </div>
</div>