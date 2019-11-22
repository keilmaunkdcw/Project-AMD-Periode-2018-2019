<!-- data booking -->

<?php
    include '../koneksi.php';
  $no =1;
?>
<!-- <a href="index.php?page="><button class="btn btn-primary">Tambah</button></a> -->
<table border="1" rules="all" class="table table-bordered">

  <h3>user belum lunas</h3>
    <tr>
      <th>No.</th>
      <th>User</th>
      <!-- <th>User Id</th> -->
      <th>Tanggal Masuk</th>
      <th>Tanggal Keluar</th>
      <!-- <th>Id Kamar</th> -->
      <th>Jumlah Kamar</th>
      <th>Total Bayar</th>
      <th>Status Pembayaran</th>
    </tr>
    <?php
      $query  ="SELECT * FROM booking INNER JOIN user ON booking.user_id = user.id WHERE status_bayar='0' ORDER BY booking.id DESC";
      $execute = mysqli_query($koneksi,$query);

      while ($data = mysqli_fetch_assoc($execute)){
    ?>
     <!-- <tr> -->
      <td><?php echo $no++;?></td>
      <td><?php echo $data['nama'];?></td>
      <!-- <td><?php echo $data['user_id'];?></td> -->
      <td><?php echo date("d-m-Y", strtotime($data['tgl_masuk']));?></td>
      <td><?php echo date("d-m-Y", strtotime($data['tgl_keluar']));?></td>
      
      <!-- <td><?php echo $data['kamar_id'];?></td> -->
      <td><?php echo $data['jumlah_kamar'];?></td>
      <td><?php echo $data['total_bayar'];?></td>
      
      <td>
         <?php 
            if ($data['status_bayar']=='1') {
              echo "Menunggu Konfirmasi Admin";
            } 
            elseif ($data['status_bayar']=='2') {
              echo "Lunas";
            }
            else {
              echo "Belum Bayar";
            }
            

         ?>
          
      </td>
    </tr>
      <!-- <td>
        <a href="./index.php?page=edit-kamar&edit=<?php echo $data['id'] ?>">Edit</a>
        <a href="./index.php?page=hapus-kamar&hapus=<?php echo $data['id'] ?>">Hapus</a>
      </td> -->
  <?php }?>
