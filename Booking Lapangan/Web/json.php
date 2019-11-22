<?php
header("Content-Type: application/json");
require_once('cf.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
  $sql = "SELECT * FROM tlapangan";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('lapangan'=>"Lapangan ".$row[1],'harga'=>"Rp.".number_format($row[2],0,',','.'), 'gambar'=>"http://192.168.43.124/futsalapps/img/".$row[3], 'jenis_lapangan'=>$row[4]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}

?>

