
<?php
		include '../koneksi.php';
	$no =1;
?>
<table border="1" rules="all" class="table table-bordered">
	<h3>Sudah di Konfir</h3>
		<tr>
			<th>No.</th>
			<!-- <th>Booking Id</th> -->
			<th>Tanggal</th>
			<th>Nama Pengirim</th>
			<th>Nomor Rekening</th>
			<th>Status</th>
			<th>Action</th>

		</tr>
		<?php
			$query	="SELECT * FROM `konfirmasi_bayar` WHERE status='1' ORDER BY id DESC";
			$execute = mysqli_query($koneksi,$query);

			while ($data = mysqli_fetch_assoc($execute)){
		?>
		 <tr>
			<td><?php echo $no++;?></td>
			<!-- <td><?php echo $data['booking_id'];?></td> -->
			<td><?php echo date("d-m-Y", strtotime($data['tanggal']));?></td>
      
      
			<td><?php echo $data['nama_pengirim'];?></td>
			<td><?php echo $data['no_req'];?></td>
			<td><?php echo ($data['status']=='1'?'Sudah Check':'belum Check');?></td>
			<td>
				 <?php 
            if ($data['status']=='1') {
              echo "Sudah Konfirmasi ";
            }
            
            else {
            	 echo "<a href='konfirmasi-bayar.php?id=".$data['id']."&id-booking=".$data['booking_id']."'>Konfirmasi Bayar</a>";
             
                }
            

         ?>
			</td>
	<?php }?>


	</table>