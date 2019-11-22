<?php 

include("cf.php");

if($_SERVER['REQUEST_METHOD']=='POST'){

	$response = array();

	//Random string kode unik
	include ("/proses/random.php");
   	 	$random = random_string(0);
	
	//mendapatkan data
	$nama = $_POST['nama'];
	$nik = $_POST['nik'];
	$notelp = $_POST['notelp'];
	$alamat = $_POST['alamat'];
	$lapangan = $_POST['lapangan'];
	$tgl_sewa = $_POST['tgl_sewa'];
	$jammulai = $_POST['jammulai'];
	$jamselesai = $_POST['jamselesai'];

	$sql = "SELECT * FROM booking where tgl_sewa = $tgl_sewa between  jammulai > $jammulai AND  jamselesai < $jamselesai";
	$check = mysqli_fetch_array(mysqli_query($con,$sql));
	if(isset($check)){
		$response["value"] = 1;
		$response["message"] = "Lapangan sudah di booking orang!";
		echo json_encode($response);
	}else{
		$sql = "INSERT INTO booking (nama,nik,kodeunik,notelp,alamat,tgl_sewa,jammulai,jamselesai,lapangan,status,total) VALUES ('$nama','$nik','$random','$notelp','$alamat','$tgl_sewa','$jammulai','$jamselesai','$lapangan','B',100000)";
		if(mysqli_query($con,$sql)){
			$response["value"] = 1;
			$response["message"] = "Sukses Booking Lapangan";
			echo json_encode($response);
		}else{
			$response["value"] = 0;
			$response["message"] = "Oops! Coba Lagi!";
			echo json_encode($response);
		}
		}

		mysqli_close($con);
	} else {
		$response["value"] = 0;
		$response["message"] = "Oops! cobaki lagi!";
		echo json_encode($response);
	}


?>