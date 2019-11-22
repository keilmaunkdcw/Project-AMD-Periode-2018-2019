<?php 
include ("./auth.php");
include ("config.php");

    if(!isset($_GET['id'])){
        die("Error: id Tidak Dimasukkan");
    }
    $query = $db->prepare("SELECT * FROM `tlapangan` WHERE id = :id");
    $query->bindParam(":id", $_GET['id']);
    $query->execute();
    if($query->rowCount() == 0){
        die("Error: ID Tidak Ditemukan");
    }else{
        $data = $query->fetch();
    }
    if(isset($_POST['submit'])){
        $lapangan = htmlentities($_POST['lapangan']);
        $harga = htmlentities($_POST['harga']);
        $query = $db->prepare("UPDATE `tlapangan` SET `lapangan`=:lapangan,`harga`=:harga WHERE id=:id");
        $query->bindParam(":lapangan", $lapangan);
        $query->bindParam(":harga", $harga);
        $query->bindParam(":id", $_GET['id']);
        $query->execute();
        echo "<script type='text/javascript'>
            window.alert('Berhasil Edit data'); 
            window.location =('lapangan.php')</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Futsal Apps Admin - Edit Lapangan</title>
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
  <h1><a href="dashboard.html">Futsal Apps Admin - Edit Lapangan</a></h1>
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
    <li class=""><a href="frame.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="booking.php"><i class="icon icon-signal"></i> <span>Module Booking</span></a> </li>
        <li class="active"><a href="lapangan.php"><i class="icon icon-th"></i> <span>Module Lapangan</span></a></li>
    <li><a href="member.php"><i class="icon icon-fullscreen"></i> <span>Module Member</span></a></li>
    <li><a href="logout.php"><i class="icon icon-signout"></i> <span>Log Out</span></a></li>
  </ul>
</div>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Lapangan</a> </div>
    <h1>Edit Lapangan</h1>
  </div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Lapangan</h5>
        </div>
         <div class="widget-content nopadding">
          <form method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">ID Lapangan</label>
              <div class="controls">
                <input type="text" class="span11" name="id" value="<?php echo $data['id'] ?>" readonly="readonly"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nomor Lapangan</label>
              <div class="controls">
                <input type="text" class="span11" name="lapangan" value="<?php echo $data['lapangan'] ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Harga PerJam</label>
              <div class="controls">
                <input type="text" class="span11" name="harga" value="<?php echo $data['harga'] ?>" />
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="submit" class="btn btn-success">Edit Data</button>
            </div>
          </form>
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
