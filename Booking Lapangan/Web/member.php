<?php 
include("./auth.php");
include("config.php");

$query = $db->prepare("SELECT * FROM admin");
$query->execute();
$data = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Futsal Apps - Member</title>
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
  <h1><a href="dashboard.html">Futsal Apps Admin</a></h1>
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
    <li><a href="frame.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="booking.php"><i class="icon icon-signal"></i> <span>Module Booking</span></a> </li>
        <li><a href="lapangan.php"><i class="icon icon-th"></i> <span>Module Lapangan</span></a></li>
    <li class="active"><a href="member.php"><i class="icon icon-fullscreen"></i> <span>Module Member</span></a></li>
    <li><a href="logout.php"><i class="icon icon-signout"></i> <span>Log Out</span></a></li>
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="frame.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="booking.php" class="current">Member</a> </div>
    <h1>Semua Admin</h1>
  </div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <a href="add-member.php"><button class="btn btn-success"><i class="icon-plus"></i> &nbsp; Tambah Admin</button></a>
         <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Semua Transaksi</h5></div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <?php foreach ($data as $value): ?>
                  <td><?php echo $value['id'] ?></td>
                  <td><?php echo $value['username'] ?></td>
                  <td class="center ">  
                    <a href="edit-member.php?id=<?php echo $value['id']?>"><button class="btn btn-primary"> <i class="icon-pencil"></i> &nbsp; Detail</button></a>
                    <a href="hapus.php?id=<?php echo $value['id']?>"><button class="btn btn-danger"><i class="icon-trash"></i> &nbsp; Delete</button></a>
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