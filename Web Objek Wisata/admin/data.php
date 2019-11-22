<?php
if (!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login.php';</script>";

}
 ?>
<h2>Informasi Data</h2>
<a href="index.php?halaman=tambahdata" class="btn btn-primary">tambah Data</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Lokasi</th>
      <th>Tempat</th>
      <th>Deskripsi</th>
      <th>Foto Lokasi</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil = $koneksi->query("SELECT * FROM wisata"); ?>
    <?php while($pecah = $ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama']; ?></td>
      <td><?php echo $pecah['lokasi'];?></td>
      <td><?php echo $pecah['deskripsi'];?></td>
      <td><img src="../foto_lokasi/<?php echo $pecah['foto_lokasi']; ?>" width="100px"></td>
      <td>
        <a href="index.php?halaman=hapusdata&id=<?php echo $pecah['id'];?>" class="btn btn-danger">hapus</a>
        <a href="index.php?halaman=ubahdata&id=<?php echo $pecah['id'];?>" class="btn btn-warning">ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
</table>

