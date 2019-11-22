<?php
		include '../koneksi.php';
	$no =1;
?>
<table border="1" rules="all" class="table table-border">
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Email</th>
			<th>NO.HP</th>
			<th>Pesan</th>
			<!-- <th>Action</th> -->
		</tr>
		<?php
			$query	="SELECT * FROM `hubungi_kami` ORDER BY id DESC";
			$execute = mysqli_query($koneksi,$query);

			while ($data = mysqli_fetch_assoc($execute)){
		?>
		 <tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $data['nama'];?></td>
			<td><?php echo $data['email'];?></td>
			<td><?php echo $data['no_hp'];?></td>
			<td><?php echo $data['pesan'];?></td>
			<!-- td>
				<a href="./editkontak.php?<?php echo 'edit='.$data['id'] ?>">Edit</a>
				<a href="./hapuskontak.php?<?php echo 'hapus='.$data['id'] ?>">Hapus</a>
			</td> -->

		</tr>

	<?php }?>


	</table>