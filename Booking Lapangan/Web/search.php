<?php
require_once('dbConnect.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
  $search = $_POST['search'];
  $sql = "SELECT * FROM booking where nik LIKE '%$search%' ORDER BY nik ASC";
  $res = mysqli_query($con,$sql);
  $result = array();
  while($row = mysqli_fetch_array($res)){
    array_push($result, array('kodeunik'=>$row[1], 'nama'=>$row[2],'notelp'=>$row[3],'alamat'=>$row[4], 'tgl_sewa'=>$row[5],'jammulai'=>$row[6],'jamselesai'=>$row[7],'lapangan'=>$row[8], 'status'=>$row[9],'total'=>$row[10]));
  }
  echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($con);
}