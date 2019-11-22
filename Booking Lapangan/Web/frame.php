<?php 
include"./auth.php";
include("cf.php");
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Futsal Apps</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/mainstyle.css" />
<link rel="stylesheet" href="css/assets/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/assets/bootstrap.min.css">
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="#">Futsal Apps Admin</a></h1>
</div>

<div id="user-nav" class="navbar navbar-inverse">
</div>



<div id="sidebar"><a href="frame.php" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
        <li class="active"><a href="#"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="booking.php"><i class="icon icon-th"></i> <span>Module Booking</span></a></li>
    <li><a href="lapangan.php"><i class="icon icon-th"></i> <span>Module Lapangan</span></a></li>
    <li><a href="member.php"><i class="icon icon-fullscreen"></i> <span>Module Member</span></a></li>
    <li><a href="logout.php"><i class="icon icon-signout"></i> <span>Log Out</span></a></li>
 
  
   
 
     </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div class="row-fluid">
<div class="alert alert-info" role="alert">
<h1>Selamat Datang <?php echo  $_SESSION["user"]["username"] ?></h1>
</div>
<div class="row" style="margin-bottom: 30px;">

    <div class="offset-lg-1 col-lg-5 col-md-6 col-sm-12 col-xs-12">
      <div class="card card-1">
        <div class="card-block info-box">
          <i class="fa fa-users"></i>
          <div class="count">
            <?php
              $qry = mysqli_query($con,"SELECT id FROM admin");
              $count = mysqli_num_rows($qry);
              if ($count == 0) {
                echo "0";
              }
              else {
                echo $count;
              }
            ?>
          </div>
          <div class="title">Jumlah Admin</div>
        </div>
      </div>
    </div>

    <div class="offset-lg-0 col-lg-5 col-md-6 col-sm-12 col-xs-12">
      <div class="card card-2">
        <div class="card-block info-box">
          <i class="fa fa-shopping-cart"></i>
          <div class="count">
            <?php
            $qry = mysqli_query($con,"SELECT idbooking FROM booking");
            $count = mysqli_num_rows($qry);
            if ($count == 0) {
              echo "0";
            }
            else {
              echo $count;
            }
            ?>
          </div>
          <div class="title">Jumlah Data Booking</div>
        </div>
      </div>
    </div>

    <div class="offset-lg-1 col-lg-5 col-md-6 col-sm-12 col-xs-12">
      <div class="card card-3">
        <div class="card-block info-box">
          <i class="fa fa-money"></i>
          <div class="count">
            <?php
              $qry = mysqli_query($con,"SELECT sum(total) as jumlah FROM booking");
              $data = mysqli_fetch_array($qry);
              echo "Rp.".number_format($data['jumlah'],0,',','.');
            ?>
          </div>
          <div class="title">Total Pengahasilan</div>
        </div>
      </div>
    </div>

    <div class="offset-lg-0 col-lg-5 col-md-6 col-sm-12 col-xs-12">
      <div class="card card-4">
        <div class="card-block info-box">
          Futsal <br>Apps
        </div>
      </div>
    </div>
</div>
  
<!--End-breadcrumbs-->

<!--Action boxes-->
  
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</div>

<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy; Futsal Apps Design By : <a href="#">Kurniawan</a> </div>
</div>
<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 



</body>
</html>
