<?php
require_once('cf.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
	$sql = "SELECT * FROM booking";
	$res = mysqli_query($con,$sql);
	$result = array();
	while($row = mysqli_fetch_array($res)){
		array_push($result, array('idbooking'=>$row[0],'kodeunik'=>$row[1], 'nama'=>$row[2], 'nik'=>$row[3], 'no_hp'=>$row[4],'alamat'=>$row[5], 'tgl_sewa'=>$row[6],'jammulai'=>$row[7],'jamselesai'=>$row[8],'lapangan'=>$row[9], 'status'=>$row[10],'total'=>$row[11]));
	}
	echo json_encode(array("value"=>1,"result"=>$result));
	mysqli_close($con);
}

?>

