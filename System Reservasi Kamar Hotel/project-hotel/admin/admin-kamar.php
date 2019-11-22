<?php
		include '../koneksi.php';
	$no =1;
?>
<a href="index.php?page=tambah-kamar"><button class="btn btn-primary">Tambah</button></a>
<table border="1" rules="all" class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Action</th>
		</tr>
		<?php
			$query	="SELECT * FROM `kamar` ORDER BY id DESC";
			$execute = mysqli_query($koneksi,$query);

			while ($data = mysqli_fetch_assoc($execute)){
		?>
		 <tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $data['nama'];?></td>
			<td><?php echo $data['harga'];?></td>
			<td>
				<a href="./index.php?page=edit-kamar&edit=<?php echo $data['id'] ?>">Edit</a>
				<a href="./index.php?page=hapus-kamar&hapus=<?php echo $data['id'] ?>">Hapus</a>
			</td>
	<?php }?>


	</table>