<?php 
include ("./auth.php");
include ("config.php");

    if(!isset($_GET['id'])){
        die("Error: id Tidak Dimasukkan");
    }
    $query = $db->prepare("SELECT * FROM `booking` WHERE idbooking = :id");
    $query->bindParam(":id", $_GET['id']);
    $id = $_GET['id'];
    $query->execute();
    if($query->rowCount() == 0){
        die("Error: ID Tidak Ditemukan");
    }else{
        $data = $query->fetch();
    }
    if(isset($_POST['submit'])){
        $rbstatus = htmlentities($_POST['rbstatus']);
        $query = $db->prepare("UPDATE `booking` SET `status`=:rbstatus WHERE idbooking=:id");
        $query->bindParam(":rbstatus", $rbstatus);
        $query->bindParam(":id", $_GET['id']);
        $query->execute();
        echo "<script type='text/javascript'>
            window.alert('Berhasil Edit data'); 
            window.location =('edit-book.php?id=$id')</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Futsal Apps Admin - Edit Booking</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Futsal Apps Admin - Edit Booking</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">  
  </ul>
</div>

<!--sidebar-menu-->

<div id="sidebar"><a href="frame.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class=""><a href="frame.php?home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
        <li class="active"> <a href="booking.php"><i class="icon icon-signal"></i> <span>Module Booking</span></a> </li>
    <li><a href="lapangan.php"><i class="icon icon-th"></i> <span>Module Lapangan</span></a></li>
    <li><a href="member.php"><i class="icon icon-fullscreen"></i> <span>Module Member</span></a></li>
    <li><a href="logout.php"><i class="icon icon-signout"></i> <span>Log Out</span></a></li>
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Booking</a> </div>
    <h1>Edit Booking</h1>
  </div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Invoice</h5>
        </div>
         <div class="widget-content nopadding">
          <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                    </tr><tr>
                      <td class="width30">Kode Unik</td>
                      <?php echo"
                      <td class='width70'><strong>$data[kodeunik]</strong></td></tr>
          <tr>
          <td>Status Bayar</td>
          <td>";
           if($data['status']=="L"){
            echo"<label class='label label-success'>LUNAS</label>";
           }else{
            echo "<label class='label label-important'>Belum Lunas</label>";
           }
           echo"
          </td>
          </tr>
                    <tr>
                      <td>Tanggal Booking :</td>
                      <td><strong>$data[tgl_sewa]</strong></td>
                    </tr>
                    <tr>
                      <td>Waktu Booking :</td>
                      <td><strong>$data[jammulai] - $data[jamselesai]</strong></td>
                    </tr>
          <tr>
          <td>Atas Nama :</td>
                    <td>
             $data[nama]                
                    </td>
          </tr>
          <tr>
          <td>Alamat :</td>
                    <td>
            $data[alamat]                
                    </td>
          </tr>
          <tr>
            <td>Kontak :</td>
                    <td>
            $data[notelp]                
                    </td>
          </tr>
          <tr>
            <td>Ubah Status Pembayaran :</td>
                    <td> 
                    <form action='' method='post'>         
            ";
            if($data['status']=="L"){
              echo"
              <select name='rbstatus'>
              <option value='L' selected>Lunas</option>
              <option value='B'>Belum Lunas</option>
              </select>
              ";
              }else{
                echo "
                <select name='rbstatus'>
                <option value='B' selected>Belum Lunas</option>
                  <option value='L'>Lunas</option>
                  </select>
                ";
              }
            ?>
                    </td>
          </tr>
          <tr>
          <td>Simpan</td>
          <td><button type="submit" name="submit" class="btn btn-primary btn-large pull-right"><i class="icon-save"></i>&nbsp; Simpan Perubahan</button></td>
          </form>
          </tr>
                  
                    </tbody>
        </div>
      </div>
        
<!--Footer-part-->
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>