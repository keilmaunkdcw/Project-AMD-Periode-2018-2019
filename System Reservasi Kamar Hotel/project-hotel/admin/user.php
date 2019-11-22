<?php
		include '../koneksi.php';
	$no =1;
?>
<a href="index.php?page=tambah-user"><button class="btn btn-primary">Tambah</button></a>
<table border="1" rules="all" class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Email</th>
			<!-- <th>Kata Sandi</th> -->
			<th>Sebagai</th>
			<th>Action</th>
		</tr>
		<?php
			$query	="SELECT * FROM `user` ORDER BY id DESC";
			$execute = mysqli_query($koneksi,$query);

			while ($data = mysqli_fetch_assoc($execute)){
		?>
		 <tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $data['nama'];?></td>
			<td><?php echo $data['email'];?></td>
			<!-- <td><?php echo $data['password'];?></td> -->
			<td>
				
				<?php 
					if ($data['level']=='1') {
						echo "Admin";
					} else {
						echo "user";
					}
					

				 ?>
				
			</td>

			<td>
				<a href="./index.php?page=edit-user&edit=<?php echo $data['id'] ?>">Edit</a>
				<a href="./index.php?page=hapus-user&hapus=<?php echo $data['id'] ?>">Hapus</a>
			</td>
	<?php }?>


	</table>