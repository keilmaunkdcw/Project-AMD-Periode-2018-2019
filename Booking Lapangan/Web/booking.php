<?php 
include("./auth.php");
include("config.php");

$query = $db->prepare("SELECT * FROM booking");
$query->execute();
$data = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Futsal Apps Admin - Booking</title>
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
  <h1><a href="dashboard.html">Futsal Apps Admin - Booking</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
</div>

<!--sidebar-menu-->

<div id="sidebar"><a href="frame.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class=""><a href="frame.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="active"> <a href="booking.php"><i class="icon icon-signal"></i> <span>Module Booking</span></a> </li>
        <li><a href="lapangan.php"><i class="icon icon-th"></i> <span>Module Lapangan</span></a></li>
    <li><a href="member.php"><i class="icon icon-fullscreen"></i> <span>Module Member</span></a></li>
    <li><a href="logout.php"><i class="icon icon-signout"></i> <span>Log Out</span></a></li>
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="frame.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="booking.php" class="current">Booking</a> </div>
    <h1>Daftar Booking</h1>
  </div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
         <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Semua Transaksi</h5></div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Kode Unik</th>
                  <th>Nama</th>
                  <th>No Telp</th>
                  <th>Tgl Sewa</th>
                  <th>Status</th>
                  <th>Total Bayar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php foreach ($data as $value): ?>
                  <td><?php echo $value['kodeunik'] ?></td>
                  <td><?php echo $value['nama'] ?></td>
                  <td><?php echo $value['notelp'] ?></td>
                  <td><?php echo $value['tgl_sewa'] ?></td>
                  <td><?php if($value['status']=="L"){
                   echo"<center><label class='label label-success'>LUNAS</label></center>";
           }else{
            echo "<center><label class='label label-important'>Belum Lunas</label></center>";
           } ?></td>
                  <td><?php echo "Rp.".number_format($value['total'],0,',','.') ?></td>
                  <td class="center ">  
                    <a href="edit-book.php?id=<?php echo $value['idbooking']?>"><button class="btn btn-primary"> <i class="icon-pencil"></i> &nbsp; Detail</button></a>
                    <a href="hapus-book.php?id=<?php echo $value['idbooking']?>"><button class="btn btn-danger"><i class="icon-trash"></i> &nbsp; Delete</button></a>
                  </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy; Design By Kurniawan </div>
</div>
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