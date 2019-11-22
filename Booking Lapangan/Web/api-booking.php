<?php 
include("config.php");
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		//Random string kode unik
		include "/proses/random.php";
   		$random = random_string(0);

		//Mendapatkan Nilai Variable
		$nama = $_POST['nama'];
		$notelp = $_POST['no_Hp'];
		$alamat = $_POST['alamat'];
		$lapangan = $_POST['lapangan'];
		$tgl_sewa = $_POST['tgl_sewa'];
		$jammulai = $_POST['jam_mulai'];
		$jamselesai = $_POST['jam_selesai'];
		
		
		//Pembuatan Syntax SQL
		$sql = "INSERT INTO booking (nama,kodeunik,notelp,alamat,tgl_sewa,jammulai,jamselesai) VALUES (:nama, :random', :notelp, :alamat, :tgl_sewa, :jammulai, :jamselesai, :total)";
		
		// eksekusi query untuk menyimpan ke database    
    	$params = array(
    	":kdunik" => $random,
    	":nama" => $nama,
    	":notelp" => $notelp,
    	":alamat" => $alamat,
    	":tgl_sewa" => $tgl_sewa,
    	":jammulai" => $jammulai,
    	":jamselesai" => $jamselesai,
    	":total" => $total,

    	);

    	$saved = $stmt->execute($params);

    	// jika query simpan berhasil, maka lapangan sudah ditambah
     	if( $saved ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        echo "BERHASIL Booking Lapangan
        	  <br>
        	  Silahkan Melakukan Pembayaran melalui Rek BNI 04492032
        	  <br>
        	  Kode Unik:"."$random";
    	} else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        echo "Gagal Booking Lapangan";
    	}
?>